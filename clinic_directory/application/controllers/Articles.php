<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CC_Controller {
   

    public function __construct() {
        parent::__construct();
        $this->load->model('directory_models/articles_model', 'img_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Articles';
        $data['all_articles'] = $this->img_mdl->get_all_articles();
        $data['recent_articles'] = $this->img_mdl->get_recent_articles();
        $data['popular_articles'] = $this->img_mdl->get_popural_articles();
        $data['main_content'] = $this->load->view('directory_views/articles/articles_content_v', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

    public function load_more_articles() {
        $article_id = $this->input->post('id', TRUE);
        $articles_info = $this->img_mdl->more_articles($article_id);

        $output = '';
        $id = '';
        if (count($articles_info) > 0) {
            foreach ($articles_info as $v_article_info) {
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <img src="' . base_url('assets/uploaded_files/company_articles/resize/' . $v_article_info['image_path']) . '" width="270" alt="' . $v_article_info['article_name'] . '"/>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('articles/article_details/' . $v_article_info['article_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
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
                                    <h6><a href="' . base_url('articles/article_details/' . $v_article_info['article_id'] . '.html') . '">' . character_limiter($v_article_info['article_name'], 15) . '</a></h6>
                                </div>
                                <div class="listing-disc">
                                    <p></p>
                                </div>
                                <div class="listing-location pull-left"><!-- location-->
                                    <a href="#"><i class="fa fa-briefcase"></i>' . character_limiter($v_article_info['company_name'], 24) . '</a>
                                    <a href="#"><i class="fa fa-map-marker"></i>' . $v_article_info['address'] . ", " . $v_article_info['state'] . ", " . $v_article_info['city_name'] . ", " . $v_article_info['zip'] . '</a>
                                </div><!-- location end-->
                                <div class="star-rating pull-right"><!-- rating-->
                                    <!--<div class="score-callback" data-score="5"></div>-->
                                </div><!-- rating end-->
                            </div>
                        </div>
                        <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_article_info['article_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="" data-link="articles/load_more_articles" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No article available </button>
                    </center>
                </div>';
        }
        echo $output;
    }

    public function category_articles($category_id = NULL) {
        $data = array();
        $data['category_info'] = $this->img_mdl->get_category_info_by_category_id($category_id);
        if (!empty($data['category_info'])) {
            $data['title'] = 'Articles by Category';
            $data['all_articles'] = $this->img_mdl->get_all_articles_by_category_id($category_id);
            $data['main_content'] = $this->load->view('directory_views/articles/category_articles_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }
    
    public function load_more_category_articles(){
        $article_id = $this->input->post('id', TRUE);
        $category_id = $this->input->post('cid', TRUE);
        $articles_info = $this->img_mdl->more_category_articles($article_id, $category_id);

        $output = '';
        $id = '';
        if (count($articles_info) > 0) {
            foreach ($articles_info as $v_article_info) {
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <img src="' . base_url('assets/uploaded_files/company_articles/resize/' . $v_article_info['image_path']) . '" width="270" alt="' . $v_article_info['article_name'] . '"/>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('articles/article_details/' . $v_article_info['article_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
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
                                    <h6><a href="' . base_url('articles/article_details/' . $v_article_info['article_id'] . '.html') . '">' . character_limiter($v_article_info['article_name'], 15) . '</a></h6>
                                </div>
                                <div class="listing-disc">
                                    <p></p>
                                </div>
                                <div class="listing-location pull-left"><!-- location-->
                                    <a href="#"><i class="fa fa-briefcase"></i>' . character_limiter($v_article_info['company_name'], 24) . '</a>
                                    <a href="#"><i class="fa fa-map-marker"></i>' . $v_article_info['address'] . ", " . $v_article_info['state'] . ", " . $v_article_info['city_name'] . ", " . $v_article_info['zip'] . '</a>
                                </div><!-- location end-->
                                <div class="star-rating pull-right"><!-- rating-->
                                    <!--<div class="score-callback" data-score="5"></div>-->
                                </div><!-- rating end-->
                            </div>
                        </div>
                        <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_article_info['article_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="'.$category_id.'" data-link="articles/load_more_category_articles" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No article available </button>
                    </center>
                </div>';
        }
        echo $output;
    }

    public function location_articles($city_id = NULL) {
        $data = array();
        $data['city_info'] = $this->img_mdl->get_city_info_by_city_id($city_id);
        if (!empty($data['city_info'])) {
            $data['title'] = 'Articles by Category';
            $data['all_articles'] = $this->img_mdl->get_all_articles_by_city_id($city_id);
            $data['main_content'] = $this->load->view('directory_views/articles/location_articles_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }
    
    public function load_more_location_articles(){
        $article_id = $this->input->post('id', TRUE);
        $city_id = $this->input->post('cid', TRUE);
        $articles_info = $this->img_mdl->more_city_articles($article_id, $city_id);

        $output = '';
        $id = '';
        if (count($articles_info) > 0) {
            foreach ($articles_info as $v_article_info) {
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <img src="' . base_url('assets/uploaded_files/company_articles/resize/' . $v_article_info['image_path']) . '" width="270" alt="' . $v_article_info['article_name'] . '"/>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('articles/article_details/' . $v_article_info['article_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
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
                                    <h6><a href="' . base_url('articles/article_details/' . $v_article_info['article_id'] . '.html') . '">' . character_limiter($v_article_info['article_name'], 15) . '</a></h6>
                                </div>
                                <div class="listing-disc">
                                    <p></p>
                                </div>
                                <div class="listing-location pull-left"><!-- location-->
                                    <a href="#"><i class="fa fa-briefcase"></i>' . character_limiter($v_article_info['company_name'], 24) . '</a>
                                    <a href="#"><i class="fa fa-map-marker"></i>' . $v_article_info['address'] . ", " . $v_article_info['state'] . ", " . $v_article_info['city_name'] . ", " . $v_article_info['zip'] . '</a>
                                </div><!-- location end-->
                                <div class="star-rating pull-right"><!-- rating-->
                                    <!--<div class="score-callback" data-score="5"></div>-->
                                </div><!-- rating end-->
                            </div>
                        </div>
                        <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_article_info['article_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="'.$city_id.'" data-link="articles/load_more_location_articles" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No article available </button>
                    </center>
                </div>';
        }
        echo $output;
    }

    public function article_details($article_id = NULL) {
        $data = array();
        $data['article_info'] = $this->img_mdl->get_article_info_by_article_id($article_id);
        $user_id = $this->session->userdata('user_id');
        if (!empty($user_id)) {
            $data['check_heart'] = $this->img_mdl->count_heart_by_user_id_and_article_id($user_id, $article_id);
            $data['check_bookmark'] = $this->img_mdl->count_bookmark_by_user_id_and_listing_id($user_id, $data['article_info']['listing_id']);
        }
        if (!empty($data['article_info'])) {
            $data['title'] = $data['article_info']['article_name'];
            $data['comments_info'] = $this->img_mdl->get_comments_info_by_article_id($article_id);
            $data['total_hearts'] = $this->img_mdl->count_hearts_by_article_id($article_id);
            $data['total_comments'] = $this->img_mdl->count_comments_by_article_id($article_id);
            $total_views = $data['article_info']['total_views'] + 1;
            $this->img_mdl->update_total_views($article_id, $total_views);
            $data['main_content'] = $this->load->view('directory_views/articles/article_details_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }

    public function give_heart($article_id = NULL) {
        $data['user_id'] = $this->session->userdata('user_id');
        $data['article_id'] = $article_id;
        $article_check = $this->img_mdl->get_article_info_by_article_id($article_id);
        $heart_check = $this->img_mdl->count_heart_by_user_id_and_article_id($data['user_id'], $article_id);
        if (!empty($article_check) && !empty($data['user_id']) && $heart_check == 0) {
            $data['date_added'] = date('Y-m-d H:i:s');
            $result = $this->img_mdl->give_heart_by_user_id_and_article_id($data);
            if (!empty($result)) {
                redirect('articles/article_details/' . $article_id);
            } else {
                redirect('articles/article_details/' . $article_id);
            }
        } else {
            redirect();
        }
    }

    public function submit_comment($article_id = NULL) {
        $data['user_id'] = $this->session->userdata('user_id');
        $data['article_id'] = $article_id;
        $article_check = $this->img_mdl->get_article_info_by_article_id($article_id);
        if (!empty($article_check) && !empty($data['user_id'])) {
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
                redirect('articles/article_details/' . $article_id);
            } else {
                $data['comment'] = $this->input->post('comment', TRUE);
                $data['date_added'] = date('Y-m-d H:i:s');
                $result = $this->img_mdl->store_article_comment($data);
                $sdata = array();
                if (!empty($result)) {
                    $sdata['success'] = 'Comment published successfully.';
                    $this->session->set_userdata($sdata);
                    redirect('articles/article_details/' . $article_id);
                } else {
                    $sdata['exception'] = 'Operation failed! Please try again.';
                    $this->session->set_userdata($sdata);
                    redirect('articles/article_details/' . $article_id);
                }
            }
        } else {
            redirect();
        }
    }

}
