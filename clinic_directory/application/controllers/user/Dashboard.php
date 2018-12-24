<?php

defined('BASEPATH') OR exit('No direct script access allowed');




class Dashboard extends CC_Controller {

    public function __construct() {
        parent::__construct();
        
         $user_id = $this->session->userdata('user_id');
        
        if ($user_id == NULL) {
            redirect('user/login', 'refresh');
        }
        
        $this->load->model('user_models/dashboard_model', 'dash_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Dashboard';
        $data['user_content'] = $this->load->view('directory_views/user/dashboard/dashboard_v', $data, TRUE);
        $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }
}
