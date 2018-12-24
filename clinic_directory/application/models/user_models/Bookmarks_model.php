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

class Bookmarks_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_listing = 'dir_listing';
    private $_bookmarks = 'dir_bookmarks';

    public function create_bookmark($data) {
        $this->db->insert($this->_bookmarks, $data);
        return $this->db->insert_id();
    }

    public function count_listing_info_by_listing_id($listing_id) {
        $result = $this->db->get_where($this->_listing, array('listing_id' => $listing_id));
        return $result->num_rows();
    }

    public function count_bookmark_by_user_id_and_listing_id($user_id, $listing_id) {
        $result = $this->db->get_where($this->_bookmarks, array('user_id' => $user_id, 'listing_id' => $listing_id));
        return $result->num_rows();
    }

    public function get_bookmarks_info_by_user_id($user_id) {
        $this->db->select('listing.listing_id, listing.company_name, listing.company_logo, listing.about_company, bookmarks.bookmark_id, city.city_name')
                ->from('dir_bookmarks as bookmarks')
                ->join('dir_listing as listing', 'bookmarks.listing_id = listing.listing_id')
                ->join('dir_cities as city', 'listing.city_id = city.city_id')
                ->where('bookmarks.user_id', $user_id)
                ->where('bookmarks.deletion_status', 0)
                ->where('listing.publication_status', 1)
                ->where('listing.deletion_status', 0)
                ->where('city.publication_status', 1)
                ->where('city.deletion_status', 0)
                ->order_by('bookmarks.date_added', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }
    
    public function get_bookmark_by_bookmark_id_and_user_id($user_id, $bookmark_id){
        $result = $this->db->get_where($this->_bookmarks, array('user_id' => $user_id, 'bookmark_id' => $bookmark_id));
        return $result->row_array();
    }
    
    public function remove_bookmark_by_id($bookmark_id){
        $this->db->update($this->_bookmarks, array('deletion_status' => 1), array('bookmark_id' => $bookmark_id));
        return $this->db->affected_rows();
    }

}
