<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Terms_conditions extends CC_Controller {
    

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
        $data['title'] = 'Terms and Conditions';
        $data['main_content'] = $this->load->view('directory_views/terms_conditions/terms_conditions_v', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

}
