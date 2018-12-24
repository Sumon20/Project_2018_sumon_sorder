<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Search_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_search_result($keyword_name = NULL, $category_id = NULL, $city_id = NULL) {
        $this->db->select('keywords.*, cat.category_name, city.city_name, listing.category_id, listing.company_name, listing.about_company,listing.address, listing.company_logo, listing.listing_id as listing-id');
        $this->db->from('dir_listing as listing');
        $this->db->join('dir_keywords as keywords', 'listing.listing_id = keywords.listing_id');
        $this->db->join('dir_categories as cat', 'listing.category_id = cat.category_id');
        $this->db->join('dir_cities as city', 'listing.city_id = city.city_id');
        $this->db->where("(keywords.keyword_name LIKE '%$keyword_name%')");
        $this->db->where("(listing.company_name LIKE '%$keyword_name%' OR keywords.keyword_name LIKE '%$keyword_name%')");
        if (!empty($category_id)) {
            $this->db->where('listing.category_id', $category_id);
        }
        if (!empty($city_id)) {
            $this->db->where('listing.city_id', $city_id);
        }
        $this->db->where('listing.publication_status', 1);
        $this->db->where('listing.deletion_status', 0);
        $this->db->where('cat.deletion_status', 0);
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

}
