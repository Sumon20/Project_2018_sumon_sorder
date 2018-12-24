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

class Keywords_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_listing = 'dir_listing';
    private $_keywords = 'dir_keywords';

    public function store_keyword_info($data) {
        $this->db->insert($this->_keywords, $data);
        return $this->db->insert_id();
    }

    public function get_all_keywords($user_id) {
        $this->db->select('keyword.*, listing.company_name')
                ->from('dir_keywords as keyword')
                ->join('dir_listing as listing', 'keyword.listing_id = listing.listing_id')
                ->where('keyword.user_id', $user_id)
                ->where('keyword.deletion_status', 0)
                ->where('keyword.publication_status', 1)
                ->order_by('keyword.keyword_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_all_listing($user_id) {
        $result = $this->db->order_by('listing_id', 'desc')->get_where($this->_listing, array('user_id' => $user_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->result_array();
    }

    public function count_all_keywords_by_user_id($user_id) {
        $result = $this->db->get_where($this->_keywords, array('user_id' => $user_id, 'deletion_status' => 0));
        return $result->num_rows();
    }

    public function get_keyword_by_keyword_id_and_user_id($user_id, $keyword_id) {
        $result = $this->db->get_where($this->_keywords, array('user_id' => $user_id, 'keyword_id' => $keyword_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function update_keyword_info($keyword_id, $data) {
        $this->db->update($this->_keywords, $data, array('keyword_id' => $keyword_id));
        return $this->db->affected_rows();
    }

    public function remove_keyword_by_id($keyword_id) {
        $this->db->update($this->_keywords, array('deletion_status' => 1), array('keyword_id' => $keyword_id));
        return $this->db->affected_rows();
    }

}
