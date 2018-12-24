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

class Videos extends CC_Controller {

    public function __construct() {
        parent::__construct();

        $user_id = $this->session->userdata('user_id');
        if ($user_id == NULL) {
            redirect('user/login', 'refresh');
        }

        $this->load->model('user_models/videos_model', 'videos_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Manage Videos';
        $data['videos_info'] = $this->videos_mdl->get_all_videos($this->session->userdata('user_id'));
        $data['user_content'] = $this->load->view('directory_views/user/videos/manage_videos_v.php', $data, TRUE);
        $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

    public function add_video() {
        $data = array();
        $data['listing_info'] = $this->videos_mdl->get_all_listing($this->session->userdata('user_id'));
        if (!empty($data['listing_info'])) {
            $data['title'] = 'Add Video';
            $data['count_videos'] = $this->videos_mdl->count_all_videos_by_user_id($this->session->userdata('user_id'));
            $data['user_content'] = $this->load->view('directory_views/user/videos/add_video_v.php', $data, TRUE);
            $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            $sdata['exception'] = 'Please first add your business.';
            $this->session->set_userdata($sdata);
            redirect('user/listing/add_listing', 'refresh');
        }
    }

    public function store_video_details() {
        $config = array(
            array(
                'field' => 'video_name',
                'label' => 'video name',
                'rules' => 'trim|required|max_length[150]'
            ),
            array(
                'field' => 'video_details',
                'label' => 'video details',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'video_url',
                'label' => 'video url',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'listing_id',
                'label' => 'business name',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->add_video();
        } else {
            $data['video_name'] = $this->input->post('video_name', TRUE);
            $data['video_details'] = $this->input->post('video_details', TRUE);
            $data['listing_id'] = $this->input->post('listing_id', TRUE);
            $data['video_url'] = $this->input->post('video_url', TRUE);
            $data['date_added'] = date('Y-m-d H:i:s');
            $data['user_id'] = $this->session->userdata('user_id');

            $insert_id = $this->videos_mdl->store_video_info($data);
            if (!empty($insert_id)) {
                $sdata['success'] = 'Video add successfully. ';
                $this->session->set_userdata($sdata);
                redirect('user/videos', 'refresh');
            } else {
                $sdata['exception'] = 'Something went wrong!! Please try again.';
                $this->session->set_userdata($sdata);
                redirect('user/videos/add_videos', 'refresh');
            }
        }
    }

    public function edit_video($video_id = NULL) {
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $data['video_info'] = $this->videos_mdl->get_video_by_video_id_and_user_id($user_id, $video_id);
        if (!empty($data['video_info'])) {
            $data['title'] = 'Edit Video';
            $data['listing_info'] = $this->videos_mdl->get_all_listing($user_id);
            $data['user_content'] = $this->load->view('directory_views/user/videos/edit_video_v.php', $data, TRUE);
            $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
//            $sdata['exception'] = 'Content not found !';
//            $this->session->set_userdata($sdata);
            redirect('user/videos', 'refresh');
        }
    }

    public function update_video_details($video_id = NULL) {
        $user_id = $this->session->userdata('user_id');
        $videos_info = $this->videos_mdl->get_video_by_video_id_and_user_id($user_id, $video_id);
        if ($video_id == NULL || empty($videos_info)) {
            $sdata['exception'] = 'Video not found !';
            $this->session->set_userdata($sdata);
            redirect('user/videos', 'refresh');
        }
        $config = array(
            array(
                'field' => 'video_name',
                'label' => 'video name',
                'rules' => 'trim|required|max_length[150]'
            ),
            array(
                'field' => 'video_details',
                'label' => 'video details',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'video_url',
                'label' => 'video url',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'listing_id',
                'label' => 'business name',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->edit_video($video_id);
        } else {
            $data['video_name'] = $this->input->post('video_name', TRUE);
            $data['video_details'] = $this->input->post('video_details', TRUE);
            $data['listing_id'] = $this->input->post('listing_id', TRUE);
            $data['video_url'] = $this->input->post('video_url', TRUE);
            $data['last_updated'] = date('Y-m-d H:i:s');

            $insert_id = $this->videos_mdl->update_video_info($video_id, $data);
            if (!empty($insert_id)) {
                $sdata['success'] = 'Video update successfully. ';
                $this->session->set_userdata($sdata);
                redirect('user/videos', 'refresh');
            } else {
                $sdata['exception'] = 'Something went wrong!! Please try again.';
                $this->session->set_userdata($sdata);
                redirect('user/videos/edit_video/' . $video_id, 'refresh');
            }
        }
    }

    public function remove_video($video_id = NULL) {
        $user_id = $this->session->userdata('user_id');
        $video_info = $this->videos_mdl->get_video_by_video_id_and_user_id($user_id, $video_id);
        if (!empty($video_info)) {
            $result = $this->videos_mdl->remove_video_by_id($video_id);
            if (!empty($result)) {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('user/videos', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('user/videos', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('user/videos', 'refresh');
        }
    }

}
