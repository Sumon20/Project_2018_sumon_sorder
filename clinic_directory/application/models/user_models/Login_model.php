<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Login_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_users = 'tbl_users';

    public function check_user_login() {
         $username_or_email_address = $this->input->post('username_or_email_address', true);
         $password = $this->input->post('password', true);
        

        $this->db->select('*');
        $this->db->from($this->_users);
        $this->db->where("(username = '$username_or_email_address' OR email_address = '$username_or_email_address')");
        $this->db->where('password', md5($password));
        $this->db->where('activation_status', 1);
        $this->db->where('access_label', 5);
        $this->db->where('deletion_status', 0);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function user_info($email_address){
        $result = $this->db->get_where($this->_users, array('email_address' => $email_address, 'activation_status' => 1));
        return $result->row_array();
    }
    
    public function change_forgot_password($u_id, $password){
        $this->db->update($this->_users, array('password' => $password), array('user_id' => $u_id));
        return $this->db->affected_rows();
    }
    
    public function user_info_by_id($user_id){
        $result = $this->db->get_where($this->_users, array('user_id' => $user_id));
        return $result->row_array();
    }

}
