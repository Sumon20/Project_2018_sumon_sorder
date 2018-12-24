<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Listing_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_cat = 'dir_categories';
    private $_cities = 'dir_cities';
    private $_listing = 'dir_listing';
    

    /*================================================================= */
    /* Storing all inputed data to the listing database*/
    /*================================================================== */
    public function store_company_info($data) {
        $this->db->insert($this->_listing, $data);
        return $this->db->insert_id();
    }

    

    /*================================================================= */
    /*Showing listing data according to user id*/
    /*================================================================== */

    public function get_all_listing($user_id) {
        $this->db->select('listing.*, city.city_name')
                ->from('dir_listing as listing')
                ->join('dir_cities as city', 'listing.city_id = city.city_id')
                ->where('listing.user_id', $user_id)
                ->where('listing.deletion_status', 0)
                ->where('listing.publication_status', 1)
                ->order_by('listing.listing_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_all_categories() {
        $result = $this->db->order_by('category_name', 'desc')->get_where($this->_cat, array('publication_status' => 1, 'deletion_status' => 0));
        return $result->result_array();
    }

    public function get_all_cities() {
        $result = $this->db->order_by('city_name', 'desc')->get_where($this->_cities, array('publication_status' => 1, 'deletion_status' => 0));
        return $result->result_array();
    }

    public function count_all_listing_by_user_id($user_id) {
        $result = $this->db->get_where($this->_listing, array('user_id' => $user_id));
        return $result->num_rows();
    }

    public function get_listing_by_listing_id_and_user_id($user_id, $listing_id) {
        $result = $this->db->get_where($this->_listing, array('user_id' => $user_id, 'listing_id' => $listing_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->row_array();
    }
    
    public function update_company_info($listing_id, $data){
        $this->db->update($this->_listing, $data, array('listing_id' => $listing_id));
        return $this->db->affected_rows();
    }

}
