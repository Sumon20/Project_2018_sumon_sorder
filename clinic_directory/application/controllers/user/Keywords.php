<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Keywords extends CC_Controller {

    public function __construct() {
        parent::__construct();

        $user_id = $this->session->userdata('user_id');
        if ($user_id == NULL) {
            redirect('user/login', 'refresh');
        }

        $this->load->model('user_models/keywords_model', 'keywords_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Manage Keywords';
        $data['keywords_info'] = $this->keywords_mdl->get_all_keywords($this->session->userdata('user_id'));
        $data['user_content'] = $this->load->view('directory_views/user/keywords/manage_keywords_v.php', $data, TRUE);
        $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

    public function add_keyword() {
        $data = array();
        $data['listing_info'] = $this->keywords_mdl->get_all_listing($this->session->userdata('user_id'));
        if (!empty($data['listing_info'])) {
            $data['title'] = 'Add Keyword';
            $data['count_keywords'] = $this->keywords_mdl->count_all_keywords_by_user_id($this->session->userdata('user_id'));
            $data['user_content'] = $this->load->view('directory_views/user/keywords/add_keyword_v.php', $data, TRUE);
            $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            $sdata['exception'] = 'Please first add your business.';
            $this->session->set_userdata($sdata);
            redirect('user/listing/add_listing', 'refresh');
        }
    }

    public function store_keyword_details() {
        $config = array(
            array(
                'field' => 'keyword_name',
                'label' => 'keyword',
                'rules' => 'trim|required|max_length[100]'
            ),
            array(
                'field' => 'listing_id',
                'label' => 'business name',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->add_keyword();
        } else {
            $data['keyword_name'] = $this->input->post('keyword_name', TRUE);
            $data['listing_id'] = $this->input->post('listing_id', TRUE);
            $data['date_added'] = date('Y-m-d H:i:s');
            $data['user_id'] = $this->session->userdata('user_id');

            $insert_id = $this->keywords_mdl->store_keyword_info($data);
            if (!empty($insert_id)) {
                $sdata['success'] = 'Keyword add successfully. ';
                $this->session->set_userdata($sdata);
                redirect('user/keywords', 'refresh');
            } else {
                $sdata['exception'] = 'Something went wrong!! Please try again.';
                $this->session->set_userdata($sdata);
                redirect('user/keywords/add_keywords', 'refresh');
            }
        }
    }

    public function edit_keyword($keyword_id = NULL) {
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $data['keyword_info'] = $this->keywords_mdl->get_keyword_by_keyword_id_and_user_id($user_id, $keyword_id);
        if (!empty($data['keyword_info'])) {
            $data['title'] = 'Edit Keyword';
            $data['listing_info'] = $this->keywords_mdl->get_all_listing($user_id);
            $data['user_content'] = $this->load->view('directory_views/user/keywords/edit_keyword_v.php', $data, TRUE);
            $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
//            $sdata['exception'] = 'Content not found !';
//            $this->session->set_userdata($sdata);
            redirect('user/keywords', 'refresh');
        }
    }

    public function update_keyword_details($keyword_id = NULL) {
        $user_id = $this->session->userdata('user_id');
        $keywords_info = $this->keywords_mdl->get_keyword_by_keyword_id_and_user_id($user_id, $keyword_id);
        if ($keyword_id == NULL || empty($keywords_info)) {
            $sdata['exception'] = 'Keyword not found !';
            $this->session->set_userdata($sdata);
            redirect('user/keywords', 'refresh');
        }
        $config = array(
            array(
                'field' => 'keyword_name',
                'label' => 'keyword',
                'rules' => 'trim|required|max_length[100]'
            ),
            array(
                'field' => 'listing_id',
                'label' => 'business name',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->edit_keyword($keyword_id);
        } else {
            $data['keyword_name'] = $this->input->post('keyword_name', TRUE);
            $data['listing_id'] = $this->input->post('listing_id', TRUE);
            $data['last_updated'] = date('Y-m-d H:i:s');

            $insert_id = $this->keywords_mdl->update_keyword_info($keyword_id, $data);
            if (!empty($insert_id)) {
                $sdata['success'] = 'Keyword update successfully. ';
                $this->session->set_userdata($sdata);
                redirect('user/keywords', 'refresh');
            } else {
                $sdata['exception'] = 'Something went wrong!! Please try again.';
                $this->session->set_userdata($sdata);
                redirect('user/keywords/edit_keyword/' . $keyword_id, 'refresh');
            }
        }
    }

    public function remove_keyword($keyword_id = NULL) {
        $user_id = $this->session->userdata('user_id');
        $keyword_info = $this->keywords_mdl->get_keyword_by_keyword_id_and_user_id($user_id, $keyword_id);
        if (!empty($keyword_info)) {
            $result = $this->keywords_mdl->remove_keyword_by_id($keyword_id);
            if (!empty($result)) {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('user/keywords', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('user/keywords', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('user/keywords', 'refresh');
        }
    }

}
