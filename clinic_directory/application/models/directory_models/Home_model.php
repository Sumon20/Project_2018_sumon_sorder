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

class Home_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_cat = 'dir_categories';
    private $_cities = 'dir_cities';
    private $_listing = 'dir_listing';
    private $_articles = 'dir_articles';
    private $_products = 'dir_products';

    public function get_one_lead_news() {
        $result = $this->db->limit(1, 0)->order_by('news_id', 'desc')->get_where($this->_news, array('is_featured' => 1, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function get_featured_listing() {
        $this->db->select('listing.listing_id, listing.company_name, listing.company_logo, cat.category_name, cat.category_id, cat.icon_name, cat.color_name')
                ->from('dir_listing as listing')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('listing.is_featured', 1)
                ->where('listing.deletion_status', 0)
                ->where('listing.publication_status', 1)
                ->order_by('listing.listing_id', 'desc')
                ->limit(12);
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function count_total_listing() {
        $result = $this->db->get_where($this->_listing, array('deletion_status' => 0));
        return $result->num_rows();
    }

    public function count_total_city() {
        $result = $this->db->get_where($this->_cities, array('deletion_status' => 0));
        return $result->num_rows();
    }

    public function count_total_product() {
        $result = $this->db->get_where($this->_products, array('deletion_status' => 0));
        return $result->num_rows();
    }

    public function count_total_article() {
        $result = $this->db->get_where($this->_articles, array('deletion_status' => 0));
        return $result->num_rows();
    }

}
