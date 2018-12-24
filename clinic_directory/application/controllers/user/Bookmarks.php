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

class Bookmarks extends CC_Controller {

    public function __construct() {
        parent::__construct();

        $user_id = $this->session->userdata('user_id');
        if ($user_id == NULL) {
            redirect('user/login', 'refresh');
        }

        $this->load->model('user_models/bookmarks_model', 'bookmarks_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Manage Bookmarks';
        $data['bookmarks_info'] = $this->bookmarks_mdl->get_bookmarks_info_by_user_id($this->session->userdata('user_id'));
        $data['user_content'] = $this->load->view('directory_views/user/bookmarks/manage_bookmarks_v.php', $data, TRUE);
        $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

    public function make_bookmark($listing_id = NULL) {
        $data['user_id'] = $this->session->userdata('user_id');
        $data['listing_id'] = $listing_id;
        $listing_check = $this->bookmarks_mdl->count_listing_info_by_listing_id($listing_id);
        $bookmark_check = $this->bookmarks_mdl->count_bookmark_by_user_id_and_listing_id($data['user_id'], $listing_id);
        if ($listing_check > 0 && !empty($data['user_id']) && $bookmark_check == 0) {
            $data['date_added'] = date('Y-m-d H:i:s');
            $result = $this->bookmarks_mdl->create_bookmark($data);
            if (!empty($result)) {
                redirect();
            } else {
                redirect();
            }
        } else {
            redirect();
        }
    }

    public function remove_bookmark($bookmark_id) {
        $user_id = $this->session->userdata('user_id');
        $bookmark_info = $this->bookmarks_mdl->get_bookmark_by_bookmark_id_and_user_id($user_id, $bookmark_id);
        if (!empty($bookmark_info)) {
            $result = $this->bookmarks_mdl->remove_bookmark_by_id($bookmark_id);
            if (!empty($result)) {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('user/bookmarks', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('user/bookmarks', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('user/bookmarks', 'refresh');
        }
    }

}
