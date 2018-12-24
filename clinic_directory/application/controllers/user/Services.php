<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Services extends CC_Controller {

    public function __construct() {
        parent::__construct();

        $user_id = $this->session->userdata('user_id');
        if ($user_id == NULL) {
            redirect('user/login', 'refresh');
        }

        $this->load->model('user_models/services_model', 'services_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Manage Services';
        $data['services_info'] = $this->services_mdl->get_all_services($this->session->userdata('user_id'));
        $data['user_content'] = $this->load->view('directory_views/user/services/manage_services_v.php', $data, TRUE);
        $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

    public function add_service() {
        $data = array();
        $data['listing_info'] = $this->services_mdl->get_all_listing($this->session->userdata('user_id'));
        if (!empty($data['listing_info'])) {
            $data['title'] = 'Add Service';
            $data['count_services'] = $this->services_mdl->count_all_services_by_user_id($this->session->userdata('user_id'));
            $data['user_content'] = $this->load->view('directory_views/user/services/add_service_v.php', $data, TRUE);
            $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            $sdata['exception'] = 'Please first add your business.';
            $this->session->set_userdata($sdata);
            redirect('user/listing/add_listing', 'refresh');
        }
    }

    public function store_service_details() {
        $config = array(
            array(
                'field' => 'service_name',
                'label' => 'service name',
                'rules' => 'trim|required|max_length[150]'
            ),
            array(
                'field' => 'service_details',
                'label' => 'service details',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'listing_id',
                'label' => 'business name',
                'rules' => 'trim|required'
            )
        );
        if (empty($_FILES['picture_name']['name'])) {
            $this->form_validation->set_rules('picture_name', 'picture', 'required');
        }
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->add_service();
        } else {
            $data['service_name'] = $this->input->post('service_name', TRUE);
            $data['service_details'] = $this->input->post('service_details', TRUE);
            $data['listing_id'] = $this->input->post('listing_id', TRUE);
            $data['date_added'] = date('Y-m-d H:i:s');
            $data['user_id'] = $this->session->userdata('user_id');
            $data['image_path'] = $this->add_picture();

            $insert_id = $this->services_mdl->store_service_info($data);
            if (!empty($insert_id)) {
                $sdata['success'] = 'Service add successfully. ';
                $this->session->set_userdata($sdata);
                redirect('user/services', 'refresh');
            } else {
                $sdata['exception'] = 'Something went wrong!! Please try again.';
                $this->session->set_userdata($sdata);
                redirect('user/services/add_services', 'refresh');
            }
        }
    }

    public function add_picture() {
        if (isset($_FILES['picture_name']['name']) && !empty($_FILES['picture_name']['name'])) {
            $config['upload_path'] = 'assets/uploaded_files/company_services/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = '2048'; //kb
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';
            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = TRUE;
            $config['file_ext_tolower'] = TRUE;

            $fdata = array();
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('picture_name')) {
                $sdata['exception'] = $this->upload->display_errors();
                $this->session->set_userdata($sdata);
                redirect('user/services/add_service', 'refresh');
            } else {
                $fdata = $this->upload->data();
                $picture_name = $fdata['file_name'];
                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['full_path'];
                $file = $data['upload_data']['file_name'];
                $this->picture_resize($path, $file);
                return $picture_name;
            }
        } else {
            $sdata['exception'] = 'Picture is required. Please <b>upload a picture</b> and try again !';
            $this->session->set_userdata($sdata);
            redirect('user/services/add_service', 'refresh');
        }
    }

    public function picture_resize($path, $file) {
        $config_resize = array();
        $config_resize['image_library'] = 'gd2';
        $config_resize['source_image'] = $path;
        $config_resize['create_thumb'] = FALSE;
        $config_resize['maintain_ratio'] = FALSE;
        $config_resize['overwrite'] = FALSE;
        $config_resize['quality'] = "90%";
        $config_resize['width'] = 270;
        $config_resize['height'] = 220;
        $config_resize['new_image'] = 'assets/uploaded_files/company_services/resize/' . $file;

        $this->load->library('image_lib', $config_resize);
        if (!$this->image_lib->resize()) {
            $sdata['exception'] = $this->image_lib->display_errors();
            $this->session->set_userdata($sdata);
            redirect('user/services/add_service', 'refresh');
        }
        return TRUE;
    }

    public function edit_service($service_id = NULL) {
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $data['service_info'] = $this->services_mdl->get_service_by_service_id_and_user_id($user_id, $service_id);
        if (!empty($data['service_info'])) {
            $data['title'] = 'Edit Service';
            $data['listing_info'] = $this->services_mdl->get_all_listing($user_id);
            $data['user_content'] = $this->load->view('directory_views/user/services/edit_service_v.php', $data, TRUE);
            $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
//            $sdata['exception'] = 'Content not found !';
//            $this->session->set_userdata($sdata);
            redirect('user/services', 'refresh');
        }
    }

    public function update_service_details($service_id = NULL) {
        $user_id = $this->session->userdata('user_id');
        $services_info = $this->services_mdl->get_service_by_service_id_and_user_id($user_id, $service_id);
        if ($service_id == NULL || empty($services_info)) {
            $sdata['exception'] = 'Service not found !';
            $this->session->set_userdata($sdata);
            redirect('user/services', 'refresh');
        }
        $config = array(
            array(
                'field' => 'service_name',
                'label' => 'service name',
                'rules' => 'trim|required|max_length[150]'
            ),
            array(
                'field' => 'service_details',
                'label' => 'service details',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'listing_id',
                'label' => 'business name',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->edit_service($service_id);
        } else {
            $data['service_name'] = $this->input->post('service_name', TRUE);
            $data['service_details'] = $this->input->post('service_details', TRUE);
            $data['listing_id'] = $this->input->post('listing_id', TRUE);
            $data['last_updated'] = date('Y-m-d H:i:s');

            if (isset($_FILES['picture_name']['name']) && !empty($_FILES['picture_name']['name'])) {
                $data['image_path'] = $this->update_picture($service_id);
            }

            $insert_id = $this->services_mdl->update_service_info($service_id, $data);
            if (!empty($insert_id)) {
                $sdata['success'] = 'Service update successfully. ';
                $this->session->set_userdata($sdata);
                redirect('user/services', 'refresh');
            } else {
                $sdata['exception'] = 'Something went wrong!! Please try again.';
                $this->session->set_userdata($sdata);
                redirect('user/services/edit_service/' . $service_id, 'refresh');
            }
        }
    }

    public function update_picture($service_id) {
        $current_picture = $this->input->post('current_picture', TRUE);
        if (isset($_FILES['picture_name']['name']) && !empty($_FILES['picture_name']['name'])) {
            $config['upload_path'] = 'assets/uploaded_files/company_services/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = '2048'; //kb
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';
            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = TRUE;
            $config['file_ext_tolower'] = TRUE;

            $fdata = array();
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('picture_name')) {
                $sdata['exception'] = $this->upload->display_errors();
                $this->session->set_userdata($sdata);
                redirect('user/services/edit_service/' . $service_id, 'refresh');
            } else {
                $fdata = $this->upload->data();
                $picture_name = $fdata['file_name'];
                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['full_path'];
                $file = $data['upload_data']['file_name'];
                $this->update_picture_resize($path, $file, $service_id);
                if (!empty($current_picture)) {
                    unlink('assets/uploaded_files/company_services/' . $current_picture);
                    unlink('assets/uploaded_files/company_services/resize/' . $current_picture);
                }
                return $picture_name;
            }
        } else {
            return $current_picture;
        }
    }

    public function update_picture_resize($path, $file, $service_id) {
        $config_resize = array();
        $config_resize['image_library'] = 'gd2';
        $config_resize['source_image'] = $path;
        $config_resize['create_thumb'] = FALSE;
        $config_resize['maintain_ratio'] = FALSE;
        $config_resize['overwrite'] = FALSE;
        $config_resize['quality'] = "90%";
        $config_resize['width'] = 270;
        $config_resize['height'] = 220;
        $config_resize['new_image'] = 'assets/uploaded_files/company_services/resize/' . $file;

        $this->load->library('image_lib', $config_resize);
        if (!$this->image_lib->resize()) {
            $sdata['exception'] = $this->image_lib->display_errors();
            $this->session->set_userdata($sdata);
            redirect('user/services/edit_service/' . $service_id, 'refresh');
        }
        return TRUE;
    }

    public function remove_service($service_id = NULL) {
        $user_id = $this->session->userdata('user_id');
        $service_info = $this->services_mdl->get_service_by_service_id_and_user_id($user_id, $service_id);
        if (!empty($service_info)) {
            $result = $this->services_mdl->remove_service_by_id($service_id);
            if (!empty($result)) {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('user/services', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('user/services', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('user/services', 'refresh');
        }
    }

}
