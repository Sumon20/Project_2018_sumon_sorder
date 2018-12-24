<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy_policy extends CC_Controller {
   

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
        $data['title'] = 'Privacy and Policy';
        $data['main_content'] = $this->load->view('directory_views/privacy_policy/privacy_policy_v', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

}
