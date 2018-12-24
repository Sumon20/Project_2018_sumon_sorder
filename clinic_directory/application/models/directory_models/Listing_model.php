<?php

defined('BASEPATH') OR exit('No direct script access allowed');

  

class Listing_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_cat = 'dir_categories';
    private $_cities = 'dir_cities';
    private $_listing = 'dir_listing';
    private $_images = 'dir_images';
    private $_videos = 'dir_videos';
    private $_products = 'dir_products';
    private $_services = 'dir_services';
    private $_articles = 'dir_articles';
   
    
    /*===================================================================*/
    /*Get all listing data */
    /*===================================================================*/
    public function get_all_listing() {
        $this->db->select('listing.listing_id, listing.company_name, listing.company_logo, listing.about_company, listing.company_logo, listing.address, listing.state, listing.zip, cat.category_name, cities.city_name')
                ->from('dir_listing as listing')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('listing.deletion_status', 0)
                ->where('listing.publication_status', 1)
                ->order_by('listing.listing_id', 'desc')
                ->limit(3);
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }
    /*----------------------------------------------------------------- */

    public function more_listing($listing_id) {
        $this->db->select('listing.listing_id, listing.company_name, listing.company_logo, listing.about_company, listing.company_logo, listing.address, listing.state, listing.zip, cat.category_name, cities.city_name')
                ->from('dir_listing as listing')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('listing.listing_id <', $listing_id)
                ->where('listing.deletion_status', 0)
                ->where('listing.publication_status', 1)
                ->order_by('listing.listing_id', 'desc')
                ->limit(3);
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

     /*===================================================================*/
    /*Showing all recent listing */
    /*===================================================================*/

    public function get_recent_listing() {
        $this->db->select('listing.listing_id, listing.company_name, listing.company_logo, listing.about_company, listing.company_logo, listing.address, listing.state, listing.zip, cat.category_name, cities.city_name')
                ->from('dir_listing as listing')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('listing.deletion_status', 0)
                ->where('listing.publication_status', 1)
                ->limit(30)
                ->order_by('listing.listing_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }
    
     /*===================================================================*/
    /*listing data which is popular */
    /*===================================================================*/

    public function get_popural_listing() {
        $this->db->select('listing.listing_id, listing.company_name, listing.company_logo, listing.about_company, listing.company_logo, listing.address, listing.state, listing.zip, cat.category_name, cities.city_name')
                ->from('dir_listing as listing')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('listing.deletion_status', 0)
                ->where('listing.publication_status', 1)
                ->limit(30)
                ->order_by('listing.total_views', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_category_info_by_category_id($category_id) {
        $result = $this->db->get_where($this->_cat, array('category_id' => $category_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function get_all_listing_by_category_id($category_id) {
        $this->db->select('listing.listing_id, listing.company_name, listing.company_logo, listing.about_company, listing.company_logo, listing.address, listing.state, listing.zip, cat.category_name, cities.city_name')
                ->from('dir_listing as listing')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('listing.category_id', $category_id)
                ->where('listing.deletion_status', 0)
                ->where('listing.publication_status', 1)
                ->limit(30)
                ->order_by('listing.listing_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function more_category_listing($listing_id, $category_id) {
        $this->db->select('listing.listing_id, listing.company_name, listing.company_logo, listing.about_company, listing.company_logo, listing.address, listing.state, listing.zip, cat.category_name, cities.city_name')
                ->from('dir_listing as listing')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->where('listing.category_id', $category_id)
                ->where('listing.listing_id <', $listing_id)
                ->where('listing.deletion_status', 0)
                ->where('listing.publication_status', 1)
                ->limit(3)
                ->order_by('listing.listing_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_city_info_by_city_id($city_id) {
        $result = $this->db->get_where($this->_cities, array('city_id' => $city_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function get_all_listing_by_city_id($city_id) {
        $this->db->select('listing.listing_id, listing.company_name, listing.company_logo, listing.about_company, listing.company_logo, listing.address, listing.state, listing.zip, cat.category_name, cities.city_name')
                ->from('dir_listing as listing')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->where('listing.city_id', $city_id)
                ->where('listing.deletion_status', 0)
                ->where('listing.publication_status', 1)
                ->limit(3)
                ->order_by('listing.listing_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function more_city_listing($listing_id, $city_id) {
        $this->db->select('listing.listing_id, listing.company_name, listing.company_logo, listing.about_company, listing.company_logo, listing.address, listing.state, listing.zip, cat.category_name, cities.city_name')
                ->from('dir_listing as listing')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->where('listing.city_id', $city_id)
                ->where('listing.listing_id <', $listing_id)
                ->where('listing.deletion_status', 0)
                ->where('listing.publication_status', 1)
                ->limit(3)
                ->order_by('listing.listing_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_listing_info_by_listing_id($listing_id) {
        $this->db->select('listing.*, cat.category_name, cities.city_name')
                ->from('dir_listing as listing')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->where('listing.listing_id', $listing_id)
                ->where('listing.deletion_status', 0)
                ->where('listing.publication_status', 1);
        $query_result = $this->db->get();
        $result = $query_result->row_array();
        return $result;
    }

    public function count_total_images_by_listing_id($listing_id) {
        $result = $this->db->get_where($this->_images, array('listing_id' => $listing_id, 'deletion_status' => 0));
        return $result->num_rows();
    }

    public function count_total_videos_by_listing_id($listing_id) {
        $result = $this->db->get_where($this->_videos, array('listing_id' => $listing_id, 'deletion_status' => 0));
        return $result->num_rows();
    }

    public function count_total_products_by_listing_id($listing_id) {
        $result = $this->db->get_where($this->_products, array('listing_id' => $listing_id, 'deletion_status' => 0));
        return $result->num_rows();
    }

    public function count_total_services_by_listing_id($listing_id) {
        $result = $this->db->get_where($this->_services, array('listing_id' => $listing_id, 'deletion_status' => 0));
        return $result->num_rows();
    }

    public function count_total_articles_by_listing_id($listing_id) {
        $result = $this->db->get_where($this->_articles, array('listing_id' => $listing_id, 'deletion_status' => 0));
        return $result->num_rows();
    }

    public function get_recent_articles_by_listing_id($listing_id) {
        $this->db->select('articles.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_articles as articles')
                ->join('dir_listing as listing', 'articles.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('articles.listing_id', $listing_id)
                ->where('articles.deletion_status', 0)
                ->where('articles.publication_status', 1)
                ->limit(5)
                ->order_by('articles.article_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_recent_images_by_listing_id($listing_id) {
        $this->db->select('images.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_images as images')
                ->join('dir_listing as listing', 'images.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('images.listing_id', $listing_id)
                ->where('images.deletion_status', 0)
                ->where('images.publication_status', 1)
                ->limit(3)
                ->order_by('images.image_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_recent_videos_by_listing_id($listing_id) {
        $this->db->select('videos.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_videos as videos')
                ->join('dir_listing as listing', 'videos.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('videos.listing_id', $listing_id)
                ->where('videos.deletion_status', 0)
                ->where('videos.publication_status', 1)
                ->order_by('videos.video_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->row_array();
        return $result;
    }

    public function update_total_views($listing_id, $total_views) {
        $this->db->update($this->_listing, array('total_views' => $total_views), array('listing_id' => $listing_id));
        return $this->db->affected_rows();
    }

    public function get_images_by_listing_id($listing_id) {
        $this->db->select('images.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_images as images')
                ->join('dir_listing as listing', 'images.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('images.listing_id', $listing_id)
                ->where('images.deletion_status', 0)
                ->where('images.publication_status', 1)
                ->order_by('images.image_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_products_by_listing_id($listing_id) {
        $this->db->select('products.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_products as products')
                ->join('dir_listing as listing', 'products.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('products.listing_id', $listing_id)
                ->where('products.deletion_status', 0)
                ->where('products.publication_status', 1)
                ->order_by('products.product_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_services_by_listing_id($listing_id) {
        $this->db->select('services.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_services as services')
                ->join('dir_listing as listing', 'services.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('services.listing_id', $listing_id)
                ->where('services.deletion_status', 0)
                ->where('services.publication_status', 1)
                ->order_by('services.service_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_articles_by_listing_id($listing_id) {
        $this->db->select('articles.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_articles as articles')
                ->join('dir_listing as listing', 'articles.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('articles.listing_id', $listing_id)
                ->where('articles.deletion_status', 0)
                ->where('articles.publication_status', 1)
                ->order_by('articles.article_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_videos_by_listing_id($listing_id) {
        $this->db->select('videos.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_videos as videos')
                ->join('dir_listing as listing', 'videos.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('videos.listing_id', $listing_id)
                ->where('videos.deletion_status', 0)
                ->where('videos.publication_status', 1)
                ->order_by('videos.video_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

}
