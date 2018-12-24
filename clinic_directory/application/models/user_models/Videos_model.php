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

class Videos_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_listing = 'dir_listing';
    private $_videos = 'dir_videos';

    public function store_video_info($data) {
        $this->db->insert($this->_videos, $data);
        return $this->db->insert_id();
    }

    public function get_all_videos($user_id) {
        $this->db->select('video.*, listing.company_name')
                ->from('dir_videos as video')
                ->join('dir_listing as listing', 'video.listing_id = listing.listing_id')
                ->where('video.user_id', $user_id)
                ->where('video.deletion_status', 0)
                ->where('video.publication_status', 1)
                ->order_by('video.video_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_all_listing($user_id) {
        $result = $this->db->order_by('listing_id', 'desc')->get_where($this->_listing, array('user_id' => $user_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->result_array();
    }

    public function count_all_videos_by_user_id($user_id) {
        $result = $this->db->get_where($this->_videos, array('user_id' => $user_id, 'deletion_status' => 0));
        return $result->num_rows();
    }

    public function get_video_by_video_id_and_user_id($user_id, $video_id) {
        $result = $this->db->get_where($this->_videos, array('user_id' => $user_id, 'video_id' => $video_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function update_video_info($video_id, $data) {
        $this->db->update($this->_videos, $data, array('video_id' => $video_id));
        return $this->db->affected_rows();
    }

    public function remove_video_by_id($video_id) {
        $this->db->update($this->_videos, array('deletion_status' => 1), array('video_id' => $video_id));
        return $this->db->affected_rows();
    }

}
