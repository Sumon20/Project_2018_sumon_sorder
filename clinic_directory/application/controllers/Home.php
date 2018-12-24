<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CC_Controller {
    

    public function __construct() {
        parent::__construct();
        $this->load->model('directory_models/home_model', 'home_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Home';
        $data['featured_listing'] = $this->home_mdl->get_featured_listing();
        $data['total_listing'] = $this->home_mdl->count_total_listing();
        $data['total_location'] = $this->home_mdl->count_total_city();
        $data['total_product'] = $this->home_mdl->count_total_product();
        $data['total_article'] = $this->home_mdl->count_total_article();
        $data['main_content'] = $this->load->view('directory_views/home_content_v', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

}
