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
  #      Copyright:  (c) 2016 -   #
  #                                             #
  #*********************************************# */

class Mailer_model extends CI_Model {
    
    private $_settings = 'tbl_settings';

    function sendEmail($data, $templateName) {
        //echo "<pre>";
        //print_r($data);
        $this->load->library('email');
        $this->email->set_mailtype('html');
        $this->email->from($data['from_address'], $data['site_name']);
        $this->email->to($data['to_address']);
        //$this->email->cc($data['cc_address']);
        $this->email->subject($data['subject']);
        $body = $this->load->view('mailer_views/' . $templateName, $data, true);
//        echo $body;
//        exit();
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }
    
    public function get_settings_info() {
        $result = $this->db->get_where($this->_settings);
        return $result->row_array();
    }

}

?>