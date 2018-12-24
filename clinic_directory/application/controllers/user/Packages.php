<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Packages extends CC_Controller {

    public function __construct() {
        parent::__construct();
        
        $user_id = $this->session->userdata('user_id');
        if ($user_id != NULL) {
            redirect('user/dashboard', 'refresh');
        }

        $this->load->model('user_models/packages_model', 'packages_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Packages';
        $data['packages_info'] = $this->packages_mdl->get_all_packages_info();
        $data['main_content'] = $this->load->view('directory_views/user/packages/packages_v', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

}
