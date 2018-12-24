<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* #********************************************#
  #                               #
  #*********************************************#
  #                    #
  #          #
  #        #
  #                                             #
  #                           #
  #        #
  #                                             #
  #*********************************************# */

class Images extends CC_Controller {

    public function __construct() {
        parent::__construct();

        $user_id = $this->session->userdata('user_id');
        if ($user_id == NULL) {
            redirect('user/login', 'refresh');
        }

        $this->load->model('user_models/images_model', 'images_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Manage Images';
        $data['images_info'] = $this->images_mdl->get_all_images($this->session->userdata('user_id'));
        $data['user_content'] = $this->load->view('directory_views/user/images/manage_images_v.php', $data, TRUE);
        $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

    public function add_image() {
        $data = array();
        $data['listing_info'] = $this->images_mdl->get_all_listing($this->session->userdata('user_id'));
        if (!empty($data['listing_info'])) {
            $data['title'] = 'Add Image';
            $data['count_images'] = $this->images_mdl->count_all_images_by_user_id($this->session->userdata('user_id'));
            $data['user_content'] = $this->load->view('directory_views/user/images/add_image_v.php', $data, TRUE);
            $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            $sdata['exception'] = 'Please first add your business.';
            $this->session->set_userdata($sdata);
            redirect('user/listing/add_listing', 'refresh');
        }
    }

    public function store_image_details() {
        $config = array(
            array(
                'field' => 'caption',
                'label' => 'caption',
                'rules' => 'trim|required|max_length[150]'
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
            $this->add_image();
        } else {
            $data['caption'] = $this->input->post('caption', TRUE);
            $data['listing_id'] = $this->input->post('listing_id', TRUE);
            $data['date_added'] = date('Y-m-d H:i:s');
            $data['user_id'] = $this->session->userdata('user_id');
            $data['image_path'] = $this->add_picture();

            $insert_id = $this->images_mdl->store_image_info($data);
            if (!empty($insert_id)) {
                $sdata['success'] = 'Image add successfully. ';
                $this->session->set_userdata($sdata);
                redirect('user/images', 'refresh');
            } else {
                $sdata['exception'] = 'Something went wrong!! Please try again.';
                $this->session->set_userdata($sdata);
                redirect('user/images/add_images', 'refresh');
            }
        }
    }

    public function add_picture() {
        if (isset($_FILES['picture_name']['name']) && !empty($_FILES['picture_name']['name'])) {
            $config['upload_path'] = 'assets/uploaded_files/company_img/';
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
                redirect('user/images/add_image', 'refresh');
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
            redirect('user/images/add_image', 'refresh');
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
        $config_resize['new_image'] = 'assets/uploaded_files/company_img/resize/' . $file;

        $this->load->library('image_lib', $config_resize);
        if (!$this->image_lib->resize()) {
            $sdata['exception'] = $this->image_lib->display_errors();
            $this->session->set_userdata($sdata);
            redirect('user/images/add_image', 'refresh');
        }
        return TRUE;
    }

    public function edit_image($image_id = NULL) {
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $data['image_info'] = $this->images_mdl->get_image_by_image_id_and_user_id($user_id, $image_id);
        if (!empty($data['image_info'])) {
            $data['title'] = 'Edit Image';
            $data['listing_info'] = $this->images_mdl->get_all_listing($user_id);
            $data['user_content'] = $this->load->view('directory_views/user/images/edit_image_v.php', $data, TRUE);
            $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
//            $sdata['exception'] = 'Content not found !';
//            $this->session->set_userdata($sdata);
            redirect('user/images', 'refresh');
        }
    }

    public function update_image_details($image_id = NULL) {
        $user_id = $this->session->userdata('user_id');
        $images_info = $this->images_mdl->get_image_by_image_id_and_user_id($user_id, $image_id);
        if ($image_id == NULL || empty($images_info)) {
            $sdata['exception'] = 'Image not found !';
            $this->session->set_userdata($sdata);
            redirect('user/images', 'refresh');
        }
        $config = array(
            array(
                'field' => 'caption',
                'label' => 'caption',
                'rules' => 'trim|required|max_length[150]'
            ),
            array(
                'field' => 'listing_id',
                'label' => 'business name',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->edit_image($image_id);
        } else {
            $data['caption'] = $this->input->post('caption', TRUE);
            $data['listing_id'] = $this->input->post('listing_id', TRUE);
            $data['last_updated'] = date('Y-m-d H:i:s');

            if (isset($_FILES['picture_name']['name']) && !empty($_FILES['picture_name']['name'])) {
                $data['image_path'] = $this->update_picture($image_id);
            }

            $insert_id = $this->images_mdl->update_image_info($image_id, $data);
            if (!empty($insert_id)) {
                $sdata['success'] = 'Image update successfully. ';
                $this->session->set_userdata($sdata);
                redirect('user/images', 'refresh');
            } else {
                $sdata['exception'] = 'Something went wrong!! Please try again.';
                $this->session->set_userdata($sdata);
                redirect('user/images/edit_image/' . $image_id, 'refresh');
            }
        }
    }

    public function update_picture($image_id) {
        $current_picture = $this->input->post('current_picture', TRUE);
        if (isset($_FILES['picture_name']['name']) && !empty($_FILES['picture_name']['name'])) {
            $config['upload_path'] = 'assets/uploaded_files/company_img/';
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
                redirect('user/images/edit_image/' . $image_id, 'refresh');
            } else {
                $fdata = $this->upload->data();
                $picture_name = $fdata['file_name'];
                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['full_path'];
                $file = $data['upload_data']['file_name'];
                $this->update_picture_resize($path, $file, $image_id);
                if (!empty($current_picture)) {
                    unlink('assets/uploaded_files/company_img/' . $current_picture);
                    unlink('assets/uploaded_files/company_img/resize/' . $current_picture);
                }
                return $picture_name;
            }
        } else {
            return $current_picture;
        }
    }

    public function update_picture_resize($path, $file, $image_id) {
        $config_resize = array();
        $config_resize['image_library'] = 'gd2';
        $config_resize['source_image'] = $path;
        $config_resize['create_thumb'] = FALSE;
        $config_resize['maintain_ratio'] = FALSE;
        $config_resize['overwrite'] = FALSE;
        $config_resize['quality'] = "90%";
        $config_resize['width'] = 270;
        $config_resize['height'] = 220;
        $config_resize['new_image'] = 'assets/uploaded_files/company_img/resize/' . $file;

        $this->load->library('image_lib', $config_resize);
        if (!$this->image_lib->resize()) {
            $sdata['exception'] = $this->image_lib->display_errors();
            $this->session->set_userdata($sdata);
            redirect('user/images/edit_image/' . $image_id, 'refresh');
        }
        return TRUE;
    }

    public function remove_image($image_id = NULL) {
        $user_id = $this->session->userdata('user_id');
        $image_info = $this->images_mdl->get_image_by_image_id_and_user_id($user_id, $image_id);
        if (!empty($image_info)) {
            $result = $this->images_mdl->remove_image_by_id($image_id);
            if (!empty($result)) {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('user/images', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('user/images', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('user/images', 'refresh');
        }
    }

}
