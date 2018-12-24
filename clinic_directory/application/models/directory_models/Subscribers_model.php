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

class Subscribers_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_subscribers = 'dir_subscribers';
    
    public function store_subscriber($data) {
        $this->db->insert($this->_subscribers, $data);
        return $this->db->insert_id();
    }

}
