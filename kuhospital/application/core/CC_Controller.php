<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class CI_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        date_default_timezone_set('Asia/Dhaka');
        
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    }

    public function user_login_authentication() {
        if ($this->session->userdata('logged_info') == FALSE) {
            redirect('cms', 'refresh');
        }
    }

    public function super_admin_authentication_only() {
        $access_label = $this->session->userdata('access_label');
        if ($access_label != 1) {
            redirect('dashboard', 'refresh');
        }
    }

    public function super_admin_news_editor_and_news_reporter_authentication_only() {
        $access_label = $this->session->userdata('access_label');
        if ($access_label == 1 || $access_label == 2 || $access_label == 3) {
            return True;
        } else {
            redirect('admin-dashboard', 'refresh');
        }
    }

    public function super_admin_and_news_editor_authentication_only() {
        $access_label = $this->session->userdata('access_label');
        if ($access_label == 1 || $access_label == 2) {
            return True;
        } else {
            redirect('admin-dashboard', 'refresh');
        }
    }

    public function super_admin_and_news_reporter_authentication_only() {
        $access_label = $this->session->userdata('access_label');
        if ($access_label == 1 || $access_label == 3) {
            return True;
        } else {
            redirect('admin-dashboard', 'refresh');
        }
    }

    public function super_admin_and_comment_reviewer_authentication_only() {
        $access_label = $this->session->userdata('access_label');
        if ($access_label == 1 || $access_label == 4) {
            return True;
        } else {
            redirect('admin-dashboard', 'refresh');
        }
    }

}
