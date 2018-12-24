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

    private $_hearts = 'dir_article_hearts';
    private $_comments = 'dir_article_comments';
    private $_bookmarks = 'dir_bookmarks';
    private $_cat = 'dir_categories';
    private $_cities = 'dir_cities';
    private $_articles = 'dir_articles';

    public function get_recent_articles() {
        $this->db->select('articles.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_articles as articles')
                ->join('dir_listing as listing', 'articles.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('articles.deletion_status', 0)
                ->where('articles.publication_status', 1)
                ->limit(30)
                ->order_by('articles.article_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_popural_articles() {
        $this->db->select('articles.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_articles as articles')
                ->join('dir_listing as listing', 'articles.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('articles.deletion_status', 0)
                ->where('articles.publication_status', 1)
                ->limit(30)
                ->order_by('articles.total_views', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_all_articles() {
        $this->db->select('articles.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_articles as articles')
                ->join('dir_listing as listing', 'articles.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('articles.deletion_status', 0)
                ->where('articles.publication_status', 1)
                ->order_by('articles.article_id', 'desc')
                ->limit(3);
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function more_articles($article_id) {
        $this->db->select('articles.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_articles as articles')
                ->join('dir_listing as listing', 'articles.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('articles.article_id <', $article_id)
                ->where('articles.deletion_status', 0)
                ->where('articles.publication_status', 1)
                ->order_by('articles.article_id', 'desc')
                ->limit(3);
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_article_info_by_article_id($article_id) {
        $this->db->select('articles.*, cat.category_name, cities.city_name, listing.listing_id, listing.company_name, listing.mobile, listing.company_logo, listing.state, listing.address, listing.zip')
                ->from('dir_articles as articles')
                ->join('dir_listing as listing', 'articles.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('articles.article_id', $article_id)
                ->where('articles.deletion_status', 0)
                ->where('articles.publication_status', 1);
        $query_result = $this->db->get();
        $result = $query_result->row_array();
        return $result;
    }

    public function get_comments_info_by_article_id($article_id) {
        $this->db->select('comments.comment, comments.date_added, users.first_name, users.last_name, users.avatar')
                ->from('dir_article_comments as comments')
                ->join('tbl_users as users', 'comments.user_id = users.user_id')
                ->where('comments.article_id', $article_id)
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

    public function get_all_articles_by_category_id($category_id) {
        $this->db->select('articles.*, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_articles as articles')
                ->join('dir_listing as listing', 'articles.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->where('listing.category_id', $category_id)
                ->where('articles.deletion_status', 0)
                ->where('articles.publication_status', 1)
                ->limit(3)
                ->order_by('articles.article_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function more_category_articles($article_id, $category_id) {
        $this->db->select('articles.*, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_articles as articles')
                ->join('dir_listing as listing', 'articles.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->where('listing.category_id', $category_id)
                ->where('articles.article_id <', $article_id)
                ->where('articles.deletion_status', 0)
                ->where('articles.publication_status', 1)
                ->limit(3)
                ->order_by('articles.article_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_city_info_by_city_id($city_id) {
        $result = $this->db->get_where($this->_cities, array('city_id' => $city_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function get_all_articles_by_city_id($city_id) {
        $this->db->select('articles.*, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_articles as articles')
                ->join('dir_listing as listing', 'articles.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->where('listing.city_id', $city_id)
                ->where('articles.deletion_status', 0)
                ->where('articles.publication_status', 1)
                ->limit(3)
                ->order_by('articles.article_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function more_city_articles($article_id, $city_id) {
        $this->db->select('articles.*, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_articles as articles')
                ->join('dir_listing as listing', 'articles.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->where('listing.city_id', $city_id)
                ->where('articles.article_id <', $article_id)
                ->where('articles.deletion_status', 0)
                ->where('articles.publication_status', 1)
                ->limit(3)
                ->order_by('articles.article_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function count_hearts_by_article_id($article_id) {
        $result = $this->db->get_where($this->_hearts, array('article_id' => $article_id));
        return $result->num_rows();
    }

    public function count_comments_by_article_id($article_id) {
        $result = $this->db->get_where($this->_comments, array('article_id' => $article_id));
        return $result->num_rows();
    }

    public function count_heart_by_user_id_and_article_id($user_id, $article_id) {
        $result = $this->db->get_where($this->_hearts, array('user_id' => $user_id, 'article_id' => $article_id));
        return $result->num_rows();
    }

    public function count_bookmark_by_user_id_and_listing_id($user_id, $listing_id) {
        $result = $this->db->get_where($this->_bookmarks, array('user_id' => $user_id, 'listing_id' => $listing_id));
        return $result->num_rows();
    }

    public function give_heart_by_user_id_and_article_id($data) {
        $this->db->insert($this->_hearts, $data);
        return $this->db->insert_id();
    }

    public function store_article_comment($data) {
        $this->db->insert($this->_comments, $data);
        return $this->db->insert_id();
    }

    public function update_total_views($article_id, $total_views) {
        $this->db->update($this->_articles, array('total_views' => $total_views), array('article_id' => $article_id));
        return $this->db->affected_rows();
    }

}
