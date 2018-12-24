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

class Registration_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_packages = 'dir_packages';
    private $_users = 'tbl_users';
    private $_settings = 'tbl_settings';
    private $_payments = 'dir_payments';
    

    public function get_package_info_by_id($package_id) {
        $result = $this->db->get_where($this->_packages, array('package_id' => $package_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->row_array();
    }
    
    public function store_user_registration_info($data){
        $this->db->insert($this->_users, $data);
        return $this->db->insert_id();
    }
    
    public function get_settings_info(){
        $result = $this->db->get($this->_settings);
        return $result->row_array();
    }
    
    public function add_payment_report($data){
        $this->db->insert($this->_payments, $data);
        return $this->db->insert_id();
    }

}
