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

class Services_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_listing = 'dir_listing';
    private $_services = 'dir_services';

    public function store_service_info($data) {
        $this->db->insert($this->_services, $data);
        return $this->db->insert_id();
    }

    public function get_all_services($user_id) {
        $this->db->select('service.*, listing.company_name')
                ->from('dir_services as service')
                ->join('dir_listing as listing', 'service.listing_id = listing.listing_id')
                ->where('service.user_id', $user_id)
                ->where('service.deletion_status', 0)
                ->where('service.publication_status', 1)
                ->order_by('service.service_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_all_listing($user_id) {
        $result = $this->db->order_by('listing_id', 'desc')->get_where($this->_listing, array('user_id' => $user_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->result_array();
    }

    public function count_all_services_by_user_id($user_id) {
        $result = $this->db->get_where($this->_services, array('user_id' => $user_id, 'deletion_status' => 0));
        return $result->num_rows();
    }

    public function get_service_by_service_id_and_user_id($user_id, $service_id) {
        $result = $this->db->get_where($this->_services, array('user_id' => $user_id, 'service_id' => $service_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function update_service_info($service_id, $data) {
        $this->db->update($this->_services, $data, array('service_id' => $service_id));
        return $this->db->affected_rows();
    }

    public function remove_service_by_id($service_id) {
        $this->db->update($this->_services, array('deletion_status' => 1), array('service_id' => $service_id));
        return $this->db->affected_rows();
    }

}
