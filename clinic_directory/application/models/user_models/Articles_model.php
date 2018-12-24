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

class Articles_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_listing = 'dir_listing';
    private $_articles = 'dir_articles';

    public function store_article_info($data) {
        $this->db->insert($this->_articles, $data);
        return $this->db->insert_id();
    }

    public function get_all_articles($user_id) {
        $this->db->select('article.*, listing.company_name')
                ->from('dir_articles as article')
                ->join('dir_listing as listing', 'article.listing_id = listing.listing_id')
                ->where('article.user_id', $user_id)
                ->where('article.deletion_status', 0)
                ->where('article.publication_status', 1)
                ->order_by('article.article_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_all_listing($user_id) {
        $result = $this->db->order_by('listing_id', 'desc')->get_where($this->_listing, array('user_id' => $user_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->result_array();
    }

    public function count_all_articles_by_user_id($user_id) {
        $result = $this->db->get_where($this->_articles, array('user_id' => $user_id, 'deletion_status' => 0));
        return $result->num_rows();
    }

    public function get_article_by_article_id_and_user_id($user_id, $article_id) {
        $result = $this->db->get_where($this->_articles, array('user_id' => $user_id, 'article_id' => $article_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function update_article_info($article_id, $data) {
        $this->db->update($this->_articles, $data, array('article_id' => $article_id));
        return $this->db->affected_rows();
    }

    public function remove_article_by_id($article_id) {
        $this->db->update($this->_articles, array('deletion_status' => 1), array('article_id' => $article_id));
        return $this->db->affected_rows();
    }

}
