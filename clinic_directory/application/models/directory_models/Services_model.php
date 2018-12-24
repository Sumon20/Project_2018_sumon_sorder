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

    private $_hearts = 'dir_service_hearts';
    private $_comments = 'dir_service_comments';
    private $_bookmarks = 'dir_bookmarks';
    private $_cat = 'dir_categories';
    private $_cities = 'dir_cities';
    private $_services = 'dir_services';

    public function get_recent_services() {
        $this->db->select('services.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_services as services')
                ->join('dir_listing as listing', 'services.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('services.deletion_status', 0)
                ->where('services.publication_status', 1)
                ->limit(30)
                ->order_by('services.service_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_popural_services() {
        $this->db->select('services.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_services as services')
                ->join('dir_listing as listing', 'services.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('services.deletion_status', 0)
                ->where('services.publication_status', 1)
                ->limit(30)
                ->order_by('services.total_views', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_all_services() {
        $this->db->select('services.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_services as services')
                ->join('dir_listing as listing', 'services.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('services.deletion_status', 0)
                ->where('services.publication_status', 1)
                ->order_by('services.service_id', 'desc')
                ->limit(3);
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function more_services($service_id) {
        $this->db->select('services.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_services as services')
                ->join('dir_listing as listing', 'services.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('services.service_id <', $service_id)
                ->where('services.deletion_status', 0)
                ->where('services.publication_status', 1)
                ->order_by('services.service_id', 'desc')
                ->limit(3);
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_service_info_by_service_id($service_id) {
        $this->db->select('services.*, cat.category_name, cities.city_name, listing.listing_id, listing.company_name, listing.mobile, listing.company_logo, listing.state, listing.address, listing.zip')
                ->from('dir_services as services')
                ->join('dir_listing as listing', 'services.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('services.service_id', $service_id)
                ->where('services.deletion_status', 0)
                ->where('services.publication_status', 1);
        $query_result = $this->db->get();
        $result = $query_result->row_array();
        return $result;
    }

    public function get_comments_info_by_service_id($service_id) {
        $this->db->select('comments.comment, comments.date_added, users.first_name, users.last_name, users.avatar')
                ->from('dir_service_comments as comments')
                ->join('tbl_users as users', 'comments.user_id = users.user_id')
                ->where('comments.service_id', $service_id)
                ->where('comments.deletion_status', 0)
                ->where('comments.publication_status', 1)
                ->limit(10)
                ->order_by('comments.comment_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_category_info_by_category_id($category_id) {
        $result = $this->db->get_where($this->_cat, array('category_id' => $category_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function get_all_services_by_category_id($category_id) {
        $this->db->select('services.*, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_services as services')
                ->join('dir_listing as listing', 'services.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->where('listing.category_id', $category_id)
                ->where('services.deletion_status', 0)
                ->where('services.publication_status', 1)
                ->limit(3)
                ->order_by('services.service_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function more_category_services($service_id, $category_id) {
        $this->db->select('services.*, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_services as services')
                ->join('dir_listing as listing', 'services.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->where('listing.category_id', $category_id)
                ->where('services.service_id <', $service_id)
                ->where('services.deletion_status', 0)
                ->where('services.publication_status', 1)
                ->limit(3)
                ->order_by('services.service_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_city_info_by_city_id($city_id) {
        $result = $this->db->get_where($this->_cities, array('city_id' => $city_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function get_all_services_by_city_id($city_id) {
        $this->db->select('services.*, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_services as services')
                ->join('dir_listing as listing', 'services.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->where('listing.city_id', $city_id)
                ->where('services.deletion_status', 0)
                ->where('services.publication_status', 1)
                ->limit(3)
                ->order_by('services.service_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function more_city_services($service_id, $city_id) {
        $this->db->select('services.*, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_services as services')
                ->join('dir_listing as listing', 'services.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->where('listing.city_id', $city_id)
                ->where('services.service_id <', $service_id)
                ->where('services.deletion_status', 0)
                ->where('services.publication_status', 1)
                ->limit(3)
                ->order_by('services.service_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function count_hearts_by_service_id($service_id) {
        $result = $this->db->get_where($this->_hearts, array('service_id' => $service_id));
        return $result->num_rows();
    }

    public function count_comments_by_service_id($service_id) {
        $result = $this->db->get_where($this->_comments, array('service_id' => $service_id));
        return $result->num_rows();
    }

    public function count_heart_by_user_id_and_service_id($user_id, $service_id) {
        $result = $this->db->get_where($this->_hearts, array('user_id' => $user_id, 'service_id' => $service_id));
        return $result->num_rows();
    }

    public function count_bookmark_by_user_id_and_listing_id($user_id, $listing_id) {
        $result = $this->db->get_where($this->_bookmarks, array('user_id' => $user_id, 'listing_id' => $listing_id));
        return $result->num_rows();
    }

    public function give_heart_by_user_id_and_service_id($data) {
        $this->db->insert($this->_hearts, $data);
        return $this->db->insert_id();
    }

    public function store_service_comment($data) {
        $this->db->insert($this->_comments, $data);
        return $this->db->insert_id();
    }

    public function update_total_views($service_id, $total_views) {
        $this->db->update($this->_services, array('total_views' => $total_views), array('service_id' => $service_id));
        return $this->db->affected_rows();
    }

}
