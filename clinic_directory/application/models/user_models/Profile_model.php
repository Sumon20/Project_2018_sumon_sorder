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

class Profile_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_users = 'tbl_users';

    public function get_user_info($user_id) {
        $result = $this->db->get_where($this->_users, array('user_id' => $user_id, 'activation_status' => 1, 'deletion_status' => 0));
        return $result->row_array();
    }
    
    public function check_current_password($user_id, $current_password){
        $result = $this->db->get_where($this->_users, array('user_id' => $user_id, 'password' => $current_password));
        return $result->row_array();
    }

    public function update_user_info($user_id, $data){
        $this->db->update($this->_users, $data, array('user_id' => $user_id));
        return $this->db->affected_rows();
    }
   

}
