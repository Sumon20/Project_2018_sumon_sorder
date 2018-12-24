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

class Products_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_listing = 'dir_listing';
    private $_products = 'dir_products';

    public function store_product_info($data) {
        $this->db->insert($this->_products, $data);
        return $this->db->insert_id();
    }

    public function get_all_products($user_id) {
        $this->db->select('product.*, listing.company_name')
                ->from('dir_products as product')
                ->join('dir_listing as listing', 'product.listing_id = listing.listing_id')
                ->where('product.user_id', $user_id)
                ->where('product.deletion_status', 0)
                ->where('product.publication_status', 1)
                ->order_by('product.product_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_all_listing($user_id) {
        $result = $this->db->order_by('listing_id', 'desc')->get_where($this->_listing, array('user_id' => $user_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->result_array();
    }

    public function count_all_products_by_user_id($user_id) {
        $result = $this->db->get_where($this->_products, array('user_id' => $user_id, 'deletion_status' => 0));
        return $result->num_rows();
    }

    public function get_product_by_product_id_and_user_id($user_id, $product_id) {
        $result = $this->db->get_where($this->_products, array('user_id' => $user_id, 'product_id' => $product_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function update_product_info($product_id, $data) {
        $this->db->update($this->_products, $data, array('product_id' => $product_id));
        return $this->db->affected_rows();
    }

    public function remove_product_by_id($product_id) {
        $this->db->update($this->_products, array('deletion_status' => 1), array('product_id' => $product_id));
        return $this->db->affected_rows();
    }

}
