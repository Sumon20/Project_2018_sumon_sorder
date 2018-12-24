<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Listing extends CC_Controller {

    public function __construct() {
        parent::__construct();

        $user_id = $this->session->userdata('user_id');
        if ($user_id == NULL) {
            redirect('user/login', 'refresh');
        }

        $this->load->model('user_models/listing_model', 'listing_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Manage Business';
        $data['listing_info'] = $this->listing_mdl->get_all_listing($this->session->userdata('user_id'));
        $data['user_content'] = $this->load->view('directory_views/user/listing/manage_listing_v.php', $data, TRUE);
        $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

    public function add_listing() {
        $data = array();
        $data['title'] = 'Add Listing';
        $data['count_listing'] = $this->listing_mdl->count_all_listing_by_user_id($this->session->userdata('user_id'));
        $data['categories_info'] = $this->listing_mdl->get_all_categories();
        $data['cities_info'] = $this->listing_mdl->get_all_cities();
        $data['user_content'] = $this->load->view('directory_views/user/listing/add_listing_v.php', $data, TRUE);
        $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

    
    public function store_company_details() {
        $config = array(
            array(
                'field' => 'company_name',
                'label' => 'company name',
                'rules' => 'trim|max_length[100]'
            ),
            array(
                'field' => 'registration_code',
                'label' => 'registration code',
                'rules' => 'trim|max_length[50]'
            ),
            array(
                'field' => 'vat_registration',
                'label' => 'publication status',
                'rules' => 'trim|max_length[50]'
            ),
            array(
                'field' => 'company_manager',
                'label' => 'company manager name',
                'rules' => 'trim|max_length[100]'
            ),
            array(
                'field' => 'category_id',
                'label' => 'category name',
                'rules' => 'trim'
            ),
            array(
                'field' => 'employees',
                'label' => 'employees',
                'rules' => 'trim'
            ),
            array(
                'field' => 'establishment_year',
                'label' => 'establishment year',
                'rules' => 'trim'
            ),
            array(
                'field' => 'about_company',
                'label' => 'company about',
                'rules' => 'trim'
            ),
            array(
                'field' => 'city_id',
                'label' => 'category name',
                'rules' => 'trim'
            ),
            array(
                'field' => 'state',
                'label' => 'publication status',
                'rules' => 'trim|max_length[50]'
            ),
            array(
                'field' => 'address',
                'label' => 'address',
                'rules' => 'trim|max_length[250]'
            ),
            array(
                'field' => 'zip',
                'label' => 'zip code',
                'rules' => 'trim|max_length[25]'
            ),
            array(
                'field' => 'mobile',
                'label' => 'mobile number',
                'rules' => 'trim|max_length[25]'
            ),
            array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'trim|max_length[100]'
            ),
            array(
                'field' => 'fax',
                'label' => 'fax',
                'rules' => 'trim|max_length[25]'
            ),
            array(
                'field' => 'phone',
                'label' => 'phone',
                'rules' => 'trim|max_length[25]'
            ),
            array(
                'field' => 'website',
                'label' => 'website',
                'rules' => 'trim|valid_url'
            ),
            array(
                'field' => 'contact_person',
                'label' => 'contact person name',
                'rules' => 'trim|max_length[100]'
            ),
            array(
                'field' => 'saturday',
                'label' => 'working hour',
                'rules' => 'trim|max_length[20]'
            ),
            array(
                'field' => 'sunday',
                'label' => 'working hour',
                'rules' => 'trim|max_length[20]'
            ),
            array(
                'field' => 'monday',
                'label' => 'working hour',
                'rules' => 'trim|max_length[20]'
            ),
            array(
                'field' => 'tuesday',
                'label' => 'working hour',
                'rules' => 'trim|max_length[20]'
            ),
            array(
                'field' => 'wednesday',
                'label' => 'working hour',
                'rules' => 'trim|max_length[20]'
            ),
            array(
                'field' => 'thursday',
                'label' => 'working hour',
                'rules' => 'trim|max_length[20]'
            ),
            array(
                'field' => 'friday',
                'label' => 'working hour',
                'rules' => 'trim|max_length[20]'
            ),
            array(
                'field' => 'lat',
                'label' => 'location map',
                'rules' => 'trim|max_length[250]'
            ),
            array(
                'field' => 'lng',
                'label' => 'location map',
                'rules' => 'trim|max_length[250]'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->add_listing();
        } else {
            $data['company_name'] = $this->input->post('company_name', TRUE);
            $data['category_id'] = $this->input->post('category_id', TRUE);
            $data['registration_code'] = $this->input->post('registration_code', TRUE);
            $data['vat_registration'] = $this->input->post('vat_registration', TRUE);
            $data['company_manager'] = $this->input->post('company_manager', TRUE);
            $data['employees'] = $this->input->post('employees', TRUE);
            $data['establishment_year'] = $this->input->post('establishment_year', TRUE);
            $data['about_company'] = $this->input->post('about_company', TRUE);
            $data['city_id'] = $this->input->post('city_id', TRUE);
            $data['state'] = $this->input->post('state', TRUE);
            $data['address'] = $this->input->post('address', TRUE);
            $data['zip'] = $this->input->post('zip', TRUE);
            $data['mobile'] = $this->input->post('mobile', TRUE);
            $data['email'] = $this->input->post('email', TRUE);
            $data['fax'] = $this->input->post('fax', TRUE);
            $data['phone'] = $this->input->post('phone', TRUE);
            $data['website'] = $this->input->post('website', TRUE);
            $data['contact_person'] = $this->input->post('contact_person', TRUE);
            $data['saturday'] = $this->input->post('saturday', TRUE);
            $data['sunday'] = $this->input->post('sunday', TRUE);
            $data['monday'] = $this->input->post('monday', TRUE);
            $data['tuesday'] = $this->input->post('tuesday', TRUE);
            $data['wednesday'] = $this->input->post('wednesday', TRUE);
            $data['thursday'] = $this->input->post('thursday', TRUE);
            $data['friday'] = $this->input->post('friday', TRUE);
            $data['lat'] = $this->input->post('lat', TRUE);
            $data['lng'] = $this->input->post('lng', TRUE);
            $data['date_added'] = date('Y-m-d H:i:s');
            $data['publication_status'] =1;
            $data['verification_status'] =1;
            $data['is_featured'] =1;
            $data['user_id'] = $this->session->userdata('user_id');

            if (isset($_FILES['company_logo']['name']) && !empty($_FILES['company_logo']['name'])) {
                $data['company_logo'] = $this->add_company_logo();
            }

            $insert_id = $this->listing_mdl->store_company_info($data);

            
            if (!empty($insert_id)) {
                $sdata['success'] = 'Congratulation!! Information data add successfully. ';
                $this->session->set_userdata($sdata);
                redirect('user/listing', 'refresh');
            } else {
                $sdata['exception'] = 'Something went wrong!! Please try again.';
                $this->session->set_userdata($sdata);
                redirect('user/listing/add_listing', 'refresh');
            }
        }
    }

    public function add_company_logo() {
        if (isset($_FILES['company_logo']['name']) && !empty($_FILES['company_logo']['name'])) {
            $config['upload_path'] = 'assets/uploaded_files/company_logo/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = '2048'; //kb
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';
            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = TRUE;
            $config['file_ext_tolower'] = TRUE;

            $fdata = array();
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('company_logo')) {
                $sdata['exception'] = $this->upload->display_errors();
                $this->session->set_userdata($sdata);
                redirect('user/listing/add_listing', 'refresh');
            } else {
                $fdata = $this->upload->data();
                $company_logo = $fdata['file_name'];
                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['full_path'];
                $file = $data['upload_data']['file_name'];
                $this->logo_resize($path, $file);
                return $company_logo;
            }
        }
    }

    public function logo_resize($path, $file) {
        $config_resize = array();
        $config_resize['image_library'] = 'gd2';
        $config_resize['source_image'] = $path;
        $config_resize['create_thumb'] = FALSE;
        $config_resize['maintain_ratio'] = FALSE;
        $config_resize['overwrite'] = FALSE;
        $config_resize['quality'] = "90%";
        $config_resize['width'] = 270;
        $config_resize['height'] = 220;
        $config_resize['new_image'] = 'assets/uploaded_files/company_logo/resize/' . $file;

        $this->load->library('image_lib', $config_resize);
        if (!$this->image_lib->resize()) {
            $sdata['exception'] = $this->image_lib->display_errors();
            $this->session->set_userdata($sdata);
            redirect('user/listing/add_listing', 'refresh');
        }
        return TRUE;
    }

    public function edit_listing($listing_id = NULL) {
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $data['listing_info'] = $this->listing_mdl->get_listing_by_listing_id_and_user_id($user_id, $listing_id);
        if (!empty($data['listing_info'])) {
            $data['title'] = 'Edit Listing';
            $data['categories_info'] = $this->listing_mdl->get_all_categories();
            $data['cities_info'] = $this->listing_mdl->get_all_cities();
            $data['user_content'] = $this->load->view('directory_views/user/listing/edit_listing_v.php', $data, TRUE);
            $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
//            $sdata = array();
//            $sdata['exception'] = 'Listing not found !';
//            $this->session->set_userdata($sdata);
            redirect('user/listing', 'refresh');
        }
    }

    public function update_company_details($listing_id = NULL) {
        $user_id = $this->session->userdata('user_id');
        $listing_info = $this->listing_mdl->get_listing_by_listing_id_and_user_id($user_id, $listing_id);
        if ($listing_id == NULL || empty($listing_info)) {
            $sdata['exception'] = 'Listing not found !';
            $this->session->set_userdata($sdata);
            redirect('user/listing', 'refresh');
        }
        $config = array(
            array(
                'field' => 'company_name',
                'label' => 'company name',
                'rules' => 'trim|max_length[100]'
            ),
            array(
                'field' => 'registration_code',
                'label' => 'registration code',
                'rules' => 'trim|max_length[50]'
            ),
            array(
                'field' => 'vat_registration',
                'label' => 'publication status',
                'rules' => 'trim|max_length[50]'
            ),
            array(
                'field' => 'company_manager',
                'label' => 'company manager name',
                'rules' => 'trim|max_length[100]'
            ),
            array(
                'field' => 'category_id',
                'label' => 'category name',
                'rules' => 'trim'
            ),
            array(
                'field' => 'employees',
                'label' => 'employees',
                'rules' => 'trim'
            ),
            array(
                'field' => 'establishment_year',
                'label' => 'establishment year',
                'rules' => 'trim'
            ),
            array(
                'field' => 'about_company',
                'label' => 'company about',
                'rules' => 'trim'
            ),
            array(
                'field' => 'city_id',
                'label' => 'category name',
                'rules' => 'trim'
            ),
            array(
                'field' => 'state',
                'label' => 'publication status',
                'rules' => 'trim|max_length[50]'
            ),
            array(
                'field' => 'address',
                'label' => 'address',
                'rules' => 'trim|max_length[250]'
            ),
            array(
                'field' => 'zip',
                'label' => 'zip code',
                'rules' => 'trim|max_length[25]'
            ),
            array(
                'field' => 'mobile',
                'label' => 'mobile number',
                'rules' => 'trim|max_length[25]'
            ),
            array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'trim|max_length[100]'
            ),
            array(
                'field' => 'fax',
                'label' => 'fax',
                'rules' => 'trim|max_length[25]'
            ),
            array(
                'field' => 'phone',
                'label' => 'phone',
                'rules' => 'trim|max_length[25]'
            ),
            array(
                'field' => 'website',
                'label' => 'website',
                'rules' => 'trim|valid_url'
            ),
            array(
                'field' => 'contact_person',
                'label' => 'contact person name',
                'rules' => 'trim|max_length[100]'
            ),
            array(
                'field' => 'saturday',
                'label' => 'working hour',
                'rules' => 'trim|max_length[20]'
            ),
            array(
                'field' => 'sunday',
                'label' => 'working hour',
                'rules' => 'trim|max_length[20]'
            ),
            array(
                'field' => 'monday',
                'label' => 'working hour',
                'rules' => 'trim|max_length[20]'
            ),
            array(
                'field' => 'tuesday',
                'label' => 'working hour',
                'rules' => 'trim|max_length[20]'
            ),
            array(
                'field' => 'wednesday',
                'label' => 'working hour',
                'rules' => 'trim|max_length[20]'
            ),
            array(
                'field' => 'thursday',
                'label' => 'working hour',
                'rules' => 'trim|max_length[20]'
            ),
            array(
                'field' => 'friday',
                'label' => 'working hour',
                'rules' => 'trim|max_length[20]'
            ),
            array(
                'field' => 'location_map',
                'label' => 'location map',
                'rules' => 'trim|max_length[250]'
            ),
            array(
                'field' => 'lat',
                'label' => 'location map',
                'rules' => 'trim|max_length[250]'
            ),
            array(
                'field' => 'lng',
                'label' => 'location map',
                'rules' => 'trim|max_length[250]'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->edit_listing($listing_id);
        } else {
            $data['company_name'] = $this->input->post('company_name', TRUE);
            $data['category_id'] = $this->input->post('category_id', TRUE);
            $data['registration_code'] = $this->input->post('registration_code', TRUE);
            $data['vat_registration'] = $this->input->post('vat_registration', TRUE);
            $data['company_manager'] = $this->input->post('company_manager', TRUE);
            $data['employees'] = $this->input->post('employees', TRUE);
            $data['establishment_year'] = $this->input->post('establishment_year', TRUE);
            $data['about_company'] = $this->input->post('about_company', TRUE);
            $data['city_id'] = $this->input->post('city_id', TRUE);
            $data['state'] = $this->input->post('state', TRUE);
            $data['address'] = $this->input->post('address', TRUE);
            $data['zip'] = $this->input->post('zip', TRUE);
            $data['mobile'] = $this->input->post('mobile', TRUE);
            $data['email'] = $this->input->post('email', TRUE);
            $data['fax'] = $this->input->post('fax', TRUE);
            $data['phone'] = $this->input->post('phone', TRUE);
            $data['website'] = $this->input->post('website', TRUE);
            $data['contact_person'] = $this->input->post('contact_person', TRUE);
            $data['saturday'] = $this->input->post('saturday', TRUE);
            $data['sunday'] = $this->input->post('sunday', TRUE);
            $data['monday'] = $this->input->post('monday', TRUE);
            $data['tuesday'] = $this->input->post('tuesday', TRUE);
            $data['wednesday'] = $this->input->post('wednesday', TRUE);
            $data['thursday'] = $this->input->post('thursday', TRUE);
            $data['friday'] = $this->input->post('friday', TRUE);
            $data['lat'] = $this->input->post('lat', TRUE);
            $data['lng'] = $this->input->post('lng', TRUE);
            $data['last_updated'] = date('Y-m-d H:i:s');

            if (isset($_FILES['company_logo']['name']) && !empty($_FILES['company_logo']['name'])) {
                $data['company_logo'] = $this->update_company_logo($listing_id);
            }
            

            $result = $this->listing_mdl->update_company_info($listing_id, $data);
            if (!empty($result)) {
                $sdata['success'] = ' update successfully. ';
                $this->session->set_userdata($sdata);
                redirect('user/listing', 'refresh');
            } else {
                $sdata['exception'] = 'Something went wrong!! Please try again.';
                $this->session->set_userdata($sdata);
                redirect('user/listing/edit_listing/' . $listing_id, 'refresh');
            }
        }
    }

    public function update_company_logo($listing_id) {
        $current_logo = $this->input->post('current_logo', TRUE);
        if (isset($_FILES['company_logo']['name']) && !empty($_FILES['company_logo']['name'])) {
            $config['upload_path'] = 'assets/uploaded_files/company_logo/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = '2048'; //kb
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';
            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = TRUE;
            $config['file_ext_tolower'] = TRUE;

            $fdata = array();
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('company_logo')) {
                $sdata['exception'] = $this->upload->display_errors();
                $this->session->set_userdata($sdata);
                redirect('user/listing/edit_listing/' . $listing_id, 'refresh');
            } else {
                $fdata = $this->upload->data();
                $company_logo = $fdata['file_name'];
                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['full_path'];
                $file = $data['upload_data']['file_name'];
                $this->update_logo_resize($path, $file, $listing_id);
                if (!empty($current_logo)) {
                    unlink('assets/uploaded_files/company_logo/' . $current_logo);
                    unlink('assets/uploaded_files/company_logo/resize/' . $current_logo);
                }
                return $company_logo;
            }
        } else {
            return $current_logo;
        }
    }

    public function update_logo_resize($path, $file, $listing_id) {
        $config_resize = array();
        $config_resize['image_library'] = 'gd2';
        $config_resize['source_image'] = $path;
        $config_resize['create_thumb'] = FALSE;
        $config_resize['maintain_ratio'] = FALSE;
        $config_resize['overwrite'] = FALSE;
        $config_resize['quality'] = "90%";
        $config_resize['width'] = 270;
        $config_resize['height'] = 220;
        $config_resize['new_image'] = 'assets/uploaded_files/company_logo/resize/' . $file;

        $this->load->library('image_lib', $config_resize);
        if (!$this->image_lib->resize()) {
            $sdata['exception'] = $this->image_lib->display_errors();
            $this->session->set_userdata($sdata);
            redirect('user/listing/edit_listing/' . $listing_id, 'refresh');
        }
        return TRUE;
    }

}
