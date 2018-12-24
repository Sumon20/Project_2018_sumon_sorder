<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends CC_Controller {
    

    public function __construct() {
        parent::__construct();
        $this->load->model('directory_models/videos_model', 'img_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Videos';
        $data['all_videos'] = $this->img_mdl->get_all_videos();
        $data['recent_videos'] = $this->img_mdl->get_recent_videos();
        $data['popular_videos'] = $this->img_mdl->get_popural_videos();
        $data['main_content'] = $this->load->view('directory_views/videos/videos_content_v', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

    public function load_more_videos() {
        $video_id = $this->input->post('id', TRUE);
        $videos_info = $this->img_mdl->more_videos($video_id);

        $output = '';
        $id = '';
        if (count($videos_info) > 0) {
            foreach ($videos_info as $v_video_info) {
                $current_url = $v_video_info['video_url'];
                $current_word = array('youtu.be');
                $replace_with = array('www.youtube.com/embed');
                $converted_url = str_replace($current_word, $replace_with, $current_url);
                
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <iframe width="270"  src="' . $converted_url . '" frameborder="0" allowfullscreen></iframe>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('videos/video_details/' . $v_video_info['video_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="listing-content clearfix">
                                <div class="listing-meta-cat">
                                    <a class="bgyallow-1" href="#"><i class="fa fa-suitcase white"></i></a>
                                </div>
                                <div class="listing-title">
                                    <h6><a href="' . base_url('videos/video_details/' . $v_video_info['video_id'] . '.html') . '">' . character_limiter($v_video_info['video_name'], 15) . '</a></h6>
                                </div>
                                <div class="listing-disc">
                                    <p></p>
                                </div>
                                <div class="listing-location pull-left"><!-- location-->
                                    <a href="#"><i class="fa fa-briefcase"></i>' . character_limiter($v_video_info['company_name'], 24) . '</a>
                                    <a href="#"><i class="fa fa-map-marker"></i>' . $v_video_info['address'] . ", " . $v_video_info['state'] . ", " . $v_video_info['city_name'] . ", " . $v_video_info['zip'] . '</a>
                                </div><!-- location end-->
                                <div class="star-rating pull-right"><!-- rating-->
                                    <!--<div class="score-callback" data-score="5"></div>-->
                                </div><!-- rating end-->
                            </div>
                        </div>
                        <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_video_info['video_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="" data-link="videos/load_more_videos" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No video available </button>
                    </center>
                </div>';
        }
        echo $output;
    }

    public function category_videos($category_id = NULL) {
        $data = array();
        $data['category_info'] = $this->img_mdl->get_category_info_by_category_id($category_id);
        if (!empty($data['category_info'])) {
            $data['title'] = 'Videos by Category';
            $data['all_videos'] = $this->img_mdl->get_all_videos_by_category_id($category_id);
            $data['main_content'] = $this->load->view('directory_views/videos/category_videos_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }

    public function load_more_category_videos() {
        $video_id = $this->input->post('id', TRUE);
        $category_id = $this->input->post('cid', TRUE);
        $videos_info = $this->img_mdl->more_category_videos($video_id, $category_id);

        $output = '';
        $id = '';
        if (count($videos_info) > 0) {
            foreach ($videos_info as $v_video_info) {
                $current_url = $v_video_info['video_url'];
                $current_word = array('youtu.be');
                $replace_with = array('www.youtube.com/embed');
                $converted_url = str_replace($current_word, $replace_with, $current_url);
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <iframe width="270"  src="' . $converted_url . '" frameborder="0" allowfullscreen></iframe>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('videos/video_details/' . $v_video_info['video_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="listing-content clearfix">
                                <div class="listing-meta-cat">
                                    <a class="bgyallow-1" href="#"><i class="fa fa-suitcase white"></i></a>
                                </div>
                                <div class="listing-title">
                                    <h6><a href="' . base_url('videos/video_details/' . $v_video_info['video_id'] . '.html') . '">' . character_limiter($v_video_info['video_name'], 15) . '</a></h6>
                                </div>
                                <div class="listing-disc">
                                    <p></p>
                                </div>
                                <div class="listing-location pull-left"><!-- location-->
                                    <a href="#"><i class="fa fa-briefcase"></i>' . character_limiter($v_video_info['company_name'], 24) . '</a>
                                    <a href="#"><i class="fa fa-map-marker"></i>' . $v_video_info['address'] . ", " . $v_video_info['state'] . ", " . $v_video_info['city_name'] . ", " . $v_video_info['zip'] . '</a>
                                </div><!-- location end-->
                                <div class="star-rating pull-right"><!-- rating-->
                                    <!--<div class="score-callback" data-score="5"></div>-->
                                </div><!-- rating end-->
                            </div>
                        </div>
                        <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_video_info['video_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="' . $category_id . '" data-link="videos/load_more_category_videos" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No video available </button>
                    </center>
                </div>';
        }
        echo $output;
    }

    public function location_videos($city_id = NULL) {
        $data = array();
        $data['city_info'] = $this->img_mdl->get_city_info_by_city_id($city_id);
        if (!empty($data['city_info'])) {
            $data['title'] = 'Videos by Category';
            $data['all_videos'] = $this->img_mdl->get_all_videos_by_city_id($city_id);
            $data['main_content'] = $this->load->view('directory_views/videos/location_videos_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }

    public function load_more_location_videos() {
        $video_id = $this->input->post('id', TRUE);
        $city_id = $this->input->post('cid', TRUE);
        $videos_info = $this->img_mdl->more_city_videos($video_id, $city_id);

        $output = '';
        $id = '';
        if (count($videos_info) > 0) {
            foreach ($videos_info as $v_video_info) {
                $current_url = $v_video_info['video_url'];
                $current_word = array('youtu.be');
                $replace_with = array('www.youtube.com/embed');
                $converted_url = str_replace($current_word, $replace_with, $current_url);
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <iframe width="270"  src="' . $converted_url . '" frameborder="0" allowfullscreen></iframe>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('videos/video_details/' . $v_video_info['video_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="listing-content clearfix">
                                <div class="listing-meta-cat">
                                    <a class="bgyallow-1" href="#"><i class="fa fa-suitcase white"></i></a>
                                </div>
                                <div class="listing-title">
                                    <h6><a href="' . base_url('videos/video_details/' . $v_video_info['video_id'] . '.html') . '">' . character_limiter($v_video_info['video_name'], 15) . '</a></h6>
                                </div>
                                <div class="listing-disc">
                                    <p></p>
                                </div>
                                <div class="listing-location pull-left"><!-- location-->
                                    <a href="#"><i class="fa fa-briefcase"></i>' . character_limiter($v_video_info['company_name'], 24) . '</a>
                                    <a href="#"><i class="fa fa-map-marker"></i>' . $v_video_info['address'] . ", " . $v_video_info['state'] . ", " . $v_video_info['city_name'] . ", " . $v_video_info['zip'] . '</a>
                                </div><!-- location end-->
                                <div class="star-rating pull-right"><!-- rating-->
                                    <!--<div class="score-callback" data-score="5"></div>-->
                                </div><!-- rating end-->
                            </div>
                        </div>
                        <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_video_info['video_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="' . $city_id . '" data-link="videos/load_more_location_videos" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No video available </button>
                    </center>
                </div>';
        }
        echo $output;
    }

    public function video_details($video_id = NULL) {
        $data = array();
        $data['video_info'] = $this->img_mdl->get_video_info_by_video_id($video_id);
        $user_id = $this->session->userdata('user_id');
        if (!empty($user_id)) {
            $data['check_heart'] = $this->img_mdl->count_heart_by_user_id_and_video_id($user_id, $video_id);
            $data['check_bookmark'] = $this->img_mdl->count_bookmark_by_user_id_and_listing_id($user_id, $data['video_info']['listing_id']);
        }
        if (!empty($data['video_info'])) {
            $data['title'] = $data['video_info']['video_name'];
            $data['comments_info'] = $this->img_mdl->get_comments_info_by_video_id($video_id);
            $data['total_hearts'] = $this->img_mdl->count_hearts_by_video_id($video_id);
            $data['total_comments'] = $this->img_mdl->count_comments_by_video_id($video_id);
            $total_views = $data['video_info']['total_views'] + 1;
            $this->img_mdl->update_total_views($video_id, $total_views);
            $data['main_content'] = $this->load->view('directory_views/videos/video_details_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }

    public function give_heart($video_id = NULL) {
        $data['user_id'] = $this->session->userdata('user_id');
        $data['video_id'] = $video_id;
        $video_check = $this->img_mdl->get_video_info_by_video_id($video_id);
        $heart_check = $this->img_mdl->count_heart_by_user_id_and_video_id($data['user_id'], $video_id);
        if (!empty($video_check) && !empty($data['user_id']) && $heart_check == 0) {
            $data['date_added'] = date('Y-m-d H:i:s');
            $result = $this->img_mdl->give_heart_by_user_id_and_video_id($data);
            if (!empty($result)) {
                redirect('videos/video_details/' . $video_id);
            } else {
                redirect('videos/video_details/' . $video_id);
            }
        } else {
            redirect();
        }
    }

    public function submit_comment($video_id = NULL) {
        $data['user_id'] = $this->session->userdata('user_id');
        $data['video_id'] = $video_id;
        $video_check = $this->img_mdl->get_video_info_by_video_id($video_id);
        if (!empty($video_check) && !empty($data['user_id'])) {
            $config = array(
                array(
                    'field' => 'comment',
                    'label' => 'message',
                    'rules' => 'trim|required|max_length[1000]'
                ),
                array(
                    'field' => 'security_code',
                    'label' => 'ans',
                    'rules' => 'trim'
                ),
                array(
                    'field' => 'confirm_security_code',
                    'label' => 'result',
                    'rules' => 'trim|required|matches[security_code]'
                )
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
                $sdata['exception'] = validation_errors();
                $this->session->set_userdata($sdata);
                redirect('videos/video_details/' . $video_id);
            } else {
                $data['comment'] = $this->input->post('comment', TRUE);
                $data['date_added'] = date('Y-m-d H:i:s');
                $result = $this->img_mdl->store_video_comment($data);
                $sdata = array();
                if (!empty($result)) {
                    $sdata['success'] = 'Comment published successfully.';
                    $this->session->set_userdata($sdata);
                    redirect('videos/video_details/' . $video_id);
                } else {
                    $sdata['exception'] = 'Operation failed! Please try again.';
                    $this->session->set_userdata($sdata);
                    redirect('videos/video_details/' . $video_id);
                }
            }
        } else {
            redirect();
        }
    }

}
