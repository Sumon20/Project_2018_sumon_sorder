<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Images extends CC_Controller {
    

    public function __construct() {
        parent::__construct();
        $this->load->model('directory_models/images_model', 'img_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Images';
        $data['all_images'] = $this->img_mdl->get_all_images();
        $data['recent_images'] = $this->img_mdl->get_recent_images();
        $data['popular_images'] = $this->img_mdl->get_popural_images();
        $data['main_content'] = $this->load->view('directory_views/images/images_content_v', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

    public function load_more_images() {
        $image_id = $this->input->post('id', TRUE);
        $images_info = $this->img_mdl->more_images($image_id);

        $output = '';
        $id = '';
        if (count($images_info) > 0) {
            foreach ($images_info as $v_image_info) {
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <img src="' . base_url('assets/uploaded_files/company_img/resize/' . $v_image_info['image_path']) . '" width="270" alt="' . $v_image_info['caption'] . '"/>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('images/image_details/' . $v_image_info['image_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
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
                                    <h6><a href="' . base_url('images/image_details/' . $v_image_info['image_id'] . '.html') . '">' . character_limiter($v_image_info['caption'], 15) . '</a></h6>
                                </div>
                                <div class="listing-disc">
                                    <p></p>
                                </div>
                                <div class="listing-location pull-left"><!-- location-->
                                    <a href="#"><i class="fa fa-briefcase"></i>' . character_limiter($v_image_info['company_name'], 24) . '</a>
                                    <a href="#"><i class="fa fa-map-marker"></i>' . $v_image_info['address'] . ", " . $v_image_info['state'] . ", " . $v_image_info['city_name'] . ", " . $v_image_info['zip'] . '</a>
                                </div><!-- location end-->
                                <div class="star-rating pull-right"><!-- rating-->
                                    <!--<div class="score-callback" data-score="5"></div>-->
                                </div><!-- rating end-->
                            </div>
                        </div>
                        <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_image_info['image_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="" data-link="images/load_more_images" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No image available </button>
                    </center>
                </div>';
        }
        echo $output;
    }

    public function category_images($category_id = NULL) {
        $data = array();
        $data['category_info'] = $this->img_mdl->get_category_info_by_category_id($category_id);
        if (!empty($data['category_info'])) {
            $data['title'] = 'Images by Category';
            $data['all_images'] = $this->img_mdl->get_all_images_by_category_id($category_id);
            $data['main_content'] = $this->load->view('directory_views/images/category_images_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }
    
    public function load_more_category_images(){
        $image_id = $this->input->post('id', TRUE);
        $category_id = $this->input->post('cid', TRUE);
        $images_info = $this->img_mdl->more_category_images($image_id, $category_id);

        $output = '';
        $id = '';
        if (count($images_info) > 0) {
            foreach ($images_info as $v_image_info) {
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <img src="' . base_url('assets/uploaded_files/company_img/resize/' . $v_image_info['image_path']) . '" width="270" alt="' . $v_image_info['caption'] . '"/>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('images/image_details/' . $v_image_info['image_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
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
                                    <h6><a href="' . base_url('images/image_details/' . $v_image_info['image_id'] . '.html') . '">' . character_limiter($v_image_info['caption'], 15) . '</a></h6>
                                </div>
                                <div class="listing-disc">
                                    <p></p>
                                </div>
                                <div class="listing-location pull-left"><!-- location-->
                                    <a href="#"><i class="fa fa-briefcase"></i>' . character_limiter($v_image_info['company_name'], 24) . '</a>
                                    <a href="#"><i class="fa fa-map-marker"></i>' . $v_image_info['address'] . ", " . $v_image_info['state'] . ", " . $v_image_info['city_name'] . ", " . $v_image_info['zip'] . '</a>
                                </div><!-- location end-->
                                <div class="star-rating pull-right"><!-- rating-->
                                    <!--<div class="score-callback" data-score="5"></div>-->
                                </div><!-- rating end-->
                            </div>
                        </div>
                        <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_image_info['image_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="'.$category_id.'" data-link="images/load_more_category_images" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No image available </button>
                    </center>
                </div>';
        }
        echo $output;
    }

    public function location_images($city_id = NULL) {
        $data = array();
        $data['city_info'] = $this->img_mdl->get_city_info_by_city_id($city_id);
        if (!empty($data['city_info'])) {
            $data['title'] = 'Images by Category';
            $data['all_images'] = $this->img_mdl->get_all_images_by_city_id($city_id);
            $data['main_content'] = $this->load->view('directory_views/images/location_images_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }
    
    public function load_more_location_images(){
        $image_id = $this->input->post('id', TRUE);
        $city_id = $this->input->post('cid', TRUE);
        $images_info = $this->img_mdl->more_city_images($image_id, $city_id);

        $output = '';
        $id = '';
        if (count($images_info) > 0) {
            foreach ($images_info as $v_image_info) {
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <img src="' . base_url('assets/uploaded_files/company_img/resize/' . $v_image_info['image_path']) . '" width="270" alt="' . $v_image_info['caption'] . '"/>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('images/image_details/' . $v_image_info['image_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
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
                                    <h6><a href="' . base_url('images/image_details/' . $v_image_info['image_id'] . '.html') . '">' . character_limiter($v_image_info['caption'], 15) . '</a></h6>
                                </div>
                                <div class="listing-disc">
                                    <p></p>
                                </div>
                                <div class="listing-location pull-left"><!-- location-->
                                    <a href="#"><i class="fa fa-briefcase"></i>' . character_limiter($v_image_info['company_name'], 24) . '</a>
                                    <a href="#"><i class="fa fa-map-marker"></i>' . $v_image_info['address'] . ", " . $v_image_info['state'] . ", " . $v_image_info['city_name'] . ", " . $v_image_info['zip'] . '</a>
                                </div><!-- location end-->
                                <div class="star-rating pull-right"><!-- rating-->
                                    <!--<div class="score-callback" data-score="5"></div>-->
                                </div><!-- rating end-->
                            </div>
                        </div>
                        <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_image_info['image_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="'.$city_id.'" data-link="images/load_more_location_images" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No image available </button>
                    </center>
                </div>';
        }
        echo $output;
    }

    public function image_details($image_id = NULL) {
        $data = array();
        $data['image_info'] = $this->img_mdl->get_image_info_by_image_id($image_id);
        $user_id = $this->session->userdata('user_id');
        if (!empty($user_id)) {
            $data['check_heart'] = $this->img_mdl->count_heart_by_user_id_and_image_id($user_id, $image_id);
            $data['check_bookmark'] = $this->img_mdl->count_bookmark_by_user_id_and_listing_id($user_id, $data['image_info']['listing_id']);
        }
        if (!empty($data['image_info'])) {
            $data['title'] = $data['image_info']['caption'];
            $data['comments_info'] = $this->img_mdl->get_comments_info_by_image_id($image_id);
            $data['total_hearts'] = $this->img_mdl->count_hearts_by_image_id($image_id);
            $data['total_comments'] = $this->img_mdl->count_comments_by_image_id($image_id);
            $total_views = $data['image_info']['total_views'] + 1;
            $this->img_mdl->update_total_views($image_id, $total_views);
            $data['main_content'] = $this->load->view('directory_views/images/image_details_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }

    public function give_heart($image_id = NULL) {
        $data['user_id'] = $this->session->userdata('user_id');
        $data['image_id'] = $image_id;
        $image_check = $this->img_mdl->get_image_info_by_image_id($image_id);
        $heart_check = $this->img_mdl->count_heart_by_user_id_and_image_id($data['user_id'], $image_id);
        if (!empty($image_check) && !empty($data['user_id']) && $heart_check == 0) {
            $data['date_added'] = date('Y-m-d H:i:s');
            $result = $this->img_mdl->give_heart_by_user_id_and_image_id($data);
            if (!empty($result)) {
                redirect('images/image_details/' . $image_id);
            } else {
                redirect('images/image_details/' . $image_id);
            }
        } else {
            redirect();
        }
    }

    public function submit_comment($image_id = NULL) {
        $data['user_id'] = $this->session->userdata('user_id');
        $data['image_id'] = $image_id;
        $image_check = $this->img_mdl->get_image_info_by_image_id($image_id);
        if (!empty($image_check) && !empty($data['user_id'])) {
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
                redirect('images/image_details/' . $image_id);
            } else {
                $data['comment'] = $this->input->post('comment', TRUE);
                $data['date_added'] = date('Y-m-d H:i:s');
                $result = $this->img_mdl->store_image_comment($data);
                $sdata = array();
                if (!empty($result)) {
                    $sdata['success'] = 'Comment published successfully.';
                    $this->session->set_userdata($sdata);
                    redirect('images/image_details/' . $image_id);
                } else {
                    $sdata['exception'] = 'Operation failed! Please try again.';
                    $this->session->set_userdata($sdata);
                    redirect('images/image_details/' . $image_id);
                }
            }
        } else {
            redirect();
        }
    }

}
