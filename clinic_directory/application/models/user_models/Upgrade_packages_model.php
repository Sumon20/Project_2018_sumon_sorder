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

class Upgrade_packages_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }
    
    private $_packages = 'dir_packages';
    private $_users = 'tbl_users';
    
    


    public function get_all_packages_info($price = 0){
        $result = $this->db->order_by('price', 'desc')->get_where($this->_packages, array('price >' => $price, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->result_array();
    }
    
    public function get_package_by_package_id($package_id){
        $result = $this->db->get_where($this->_packages, array('package_id' => $package_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->row_array();
    }
    
    public function update_user_package_info($user_id, $package_id){
        $this->db->update($this->_users, array('package_id' => $package_id), array('user_id' => $user_id));
        return $this->db->affected_rows();
    }
    
}
