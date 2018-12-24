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

class Images_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_listing = 'dir_listing';
    private $_images = 'dir_images';

    public function store_image_info($data) {
        $this->db->insert($this->_images, $data);
        return $this->db->insert_id();
    }

    public function get_all_images($user_id) {
        $this->db->select('image.*, listing.company_name')
                ->from('dir_images as image')
                ->join('dir_listing as listing', 'image.listing_id = listing.listing_id')
                ->where('image.user_id', $user_id)
                ->where('image.deletion_status', 0)
                ->where('image.publication_status', 1)
                ->order_by('image.image_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_all_listing($user_id) {
        $result = $this->db->order_by('listing_id', 'desc')->get_where($this->_listing, array('user_id' => $user_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->result_array();
    }

    public function count_all_images_by_user_id($user_id) {
        $result = $this->db->get_where($this->_images, array('user_id' => $user_id, 'deletion_status' => 0));
        return $result->num_rows();
    }

    public function get_image_by_image_id_and_user_id($user_id, $image_id) {
        $result = $this->db->get_where($this->_images, array('user_id' => $user_id, 'image_id' => $image_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function update_image_info($image_id, $data) {
        $this->db->update($this->_images, $data, array('image_id' => $image_id));
        return $this->db->affected_rows();
    }

    public function remove_image_by_id($image_id) {
        $this->db->update($this->_images, array('deletion_status' => 1), array('image_id' => $image_id));
        return $this->db->affected_rows();
    }

}
