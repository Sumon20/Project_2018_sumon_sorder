<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CC_Controller {
    

    public function __construct() {
        parent::__construct();
        $this->load->model('directory_models/search_model', 'search_mdl');
    }

    public function search_result() {
        $keyword_name = $this->input->post('keyword_name', TRUE);
        $category_id = $this->input->post('category_id', TRUE);
//        echo '<pre>';
//       print_r($search_result);
//        exit();
        $data = array();
        $data['title'] = 'Search Result';
        $data['search_result'] = $this->search_mdl->get_search_result($keyword_name, $category_id);
        $data['main_content'] = $this->load->view('directory_views/search/search_result_v', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

}
