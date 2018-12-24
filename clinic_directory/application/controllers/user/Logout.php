<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Logout extends CC_Controller {

    public function __construct() {
        parent::__construct();

        $user_id = $this->session->userdata('user_id');
        if ($user_id == NULL) {
            redirect('user/login', 'refresh');
        }
    }

    public function index() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('first_name');
        $this->session->unset_userdata('last_name');
        $this->session->unset_userdata('package_id');
        $this->session->unset_userdata('avatar');
//        $this->session->sess_destroy();
//        $sdata['success'] = "Logout successfully. ";
//        $this->session->set_userdata($sdata);
        redirect();
    }

}
