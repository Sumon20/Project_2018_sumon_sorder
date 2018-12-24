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

class Upgrade_package extends CC_Controller {

    public function __construct() {
        parent::__construct();

        $user_id = $this->session->userdata('user_id');
        if ($user_id == NULL) {
            redirect('user/login', 'refresh');
        }

        $this->load->model('user_models/Upgrade_packages_model', 'up_pack_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Upgrade Package';
        $package_id = $this->session->userdata('package_id');
        $package_info = $this->up_pack_mdl->get_package_by_package_id($package_id);
        $data['packages_info'] = $this->up_pack_mdl->get_all_packages_info($package_info['price']);
        $data['main_content'] = $this->load->view('directory_views/user/packages/upgrade_packages_v', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

    public function upgrade($package_id = NULL) {
        $data['package_info'] = $this->up_pack_mdl->get_package_by_package_id($package_id);
        if (!empty($data['package_info'])) {
            $affected_row = $this->up_pack_mdl->update_user_package_info($this->session->userdata('user_id'), $package_id);
            if (!empty($affected_row)) {
                $this->load->view('directory_views/user/registration/htmlWebsiteStandardPayment', $data);
            } else {
                $sdata['exception'] = 'Something went wrong!! Please try again.';
                $this->session->set_userdata($sdata);
                redirect('user/upgrade_package/index', 'refresh');
            }
        } else {
            redirect('user/dashboard', 'refresh');
        }
    }

}
