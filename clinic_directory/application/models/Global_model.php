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

class Global_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_packages = 'dir_packages';
    private $_listing = 'dir_listing';
    private $_images = 'dir_images';
    private $_videos = 'dir_videos';
    private $_products = 'dir_products';
    private $_services = 'dir_services';
    private $_articles = 'dir_articles';
    private $_keywords = 'dir_keywords';
    private $_bookmarks = 'dir_bookmarks';


    private $_cat = 'dir_categories';
    private $_cities = 'dir_cities';
    private $_settings = 'tbl_settings';
    

    public function get_settings_info() {
        $result = $this->db->get_where($this->_settings);
        return $result->row_array();
    }
    
    public function get_package_info_by_package_id($package_id) {
        $result = $this->db->get_where($this->_packages, array('package_id' => $package_id));
        return $result->row_array();
    }

    public function count_total_listing_by_user_id($user_id) {
        $result = $this->db->get_where($this->_listing, array('user_id' => $user_id, 'deletion_status' => 0));
        return $result->num_rows();
    }

    public function count_total_images_by_user_id($user_id) {
        $result = $this->db->get_where($this->_images, array('user_id' => $user_id, 'deletion_status' => 0));
        return $result->num_rows();
    }

    public function count_total_videos_by_user_id($user_id) {
        $result = $this->db->get_where($this->_videos, array('user_id' => $user_id, 'deletion_status' => 0));
        return $result->num_rows();
    }

    public function count_total_products_by_user_id($user_id) {
        $result = $this->db->get_where($this->_products, array('user_id' => $user_id, 'deletion_status' => 0));
        return $result->num_rows();
    }

    public function count_total_services_by_user_id($user_id) {
        $result = $this->db->get_where($this->_services, array('user_id' => $user_id, 'deletion_status' => 0));
        return $result->num_rows();
    }

    public function count_total_articles_by_user_id($user_id) {
        $result = $this->db->get_where($this->_articles, array('user_id' => $user_id, 'deletion_status' => 0));
        return $result->num_rows();
    }

    public function count_total_keywords_by_user_id($user_id) {
        $result = $this->db->get_where($this->_keywords, array('user_id' => $user_id, 'deletion_status' => 0));
        return $result->num_rows();
    }

    public function count_total_bookmarks_by_user_id($user_id) {
        $result = $this->db->get_where($this->_bookmarks, array('user_id' => $user_id, 'deletion_status' => 0));
        return $result->num_rows();
    }

    public function get_all_categories() {
        $result = $this->db->limit(25)->order_by('category_name', 'asc')->get_where($this->_cat, array('publication_status' => 1, 'deletion_status' => 0));
        return $result->result_array();
    }

    public function get_all_cities() {
        $result = $this->db->limit(25)->order_by('city_name', 'asc')->get_where($this->_cities, array('publication_status' => 1, 'deletion_status' => 0));
        return $result->result_array();
    }

}
