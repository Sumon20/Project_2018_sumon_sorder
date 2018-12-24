<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CC_Controller {
    

    public function __construct() {
        parent::__construct();
        $this->load->model('directory_models/services_model', 'img_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Services';
        $data['all_services'] = $this->img_mdl->get_all_services();
        $data['recent_services'] = $this->img_mdl->get_recent_services();
        $data['popular_services'] = $this->img_mdl->get_popural_services();
        $data['main_content'] = $this->load->view('directory_views/services/services_content_v', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

    public function load_more_services() {
        $service_id = $this->input->post('id', TRUE);
        $services_info = $this->img_mdl->more_services($service_id);

        $output = '';
        $id = '';
        if (count($services_info) > 0) {
            foreach ($services_info as $v_service_info) {
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <img src="' . base_url('assets/uploaded_files/company_services/resize/' . $v_service_info['image_path']) . '" width="270" alt="' . $v_service_info['service_name'] . '"/>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('services/service_details/' . $v_service_info['service_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
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
                                    <h6><a href="' . base_url('services/service_details/' . $v_service_info['service_id'] . '.html') . '">' . character_limiter($v_service_info['service_name'], 15) . '</a></h6>
                                </div>
                                <div class="listing-disc">
                                    <p></p>
                                </div>
                                <div class="listing-location pull-left"><!-- location-->
                                    <a href="#"><i class="fa fa-briefcase"></i>' . character_limiter($v_service_info['company_name'], 24) . '</a>
                                    <a href="#"><i class="fa fa-map-marker"></i>' . $v_service_info['address'] . ", " . $v_service_info['state'] . ", " . $v_service_info['city_name'] . ", " . $v_service_info['zip'] . '</a>
                                </div><!-- location end-->
                                <div class="star-rating pull-right"><!-- rating-->
                                    <!--<div class="score-callback" data-score="5"></div>-->
                                </div><!-- rating end-->
                            </div>
                        </div>
                        <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_service_info['service_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="" data-link="services/load_more_services" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No service available </button>
                    </center>
                </div>';
        }
        echo $output;
    }

    public function category_services($category_id = NULL) {
        $data = array();
        $data['category_info'] = $this->img_mdl->get_category_info_by_category_id($category_id);
        if (!empty($data['category_info'])) {
            $data['title'] = 'Services by Category';
            $data['all_services'] = $this->img_mdl->get_all_services_by_category_id($category_id);
            $data['main_content'] = $this->load->view('directory_views/services/category_services_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }
    
    public function load_more_category_services(){
        $service_id = $this->input->post('id', TRUE);
        $category_id = $this->input->post('cid', TRUE);
        $services_info = $this->img_mdl->more_category_services($service_id, $category_id);

        $output = '';
        $id = '';
        if (count($services_info) > 0) {
            foreach ($services_info as $v_service_info) {
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <img src="' . base_url('assets/uploaded_files/company_services/resize/' . $v_service_info['image_path']) . '" width="270" alt="' . $v_service_info['service_name'] . '"/>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('services/service_details/' . $v_service_info['service_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
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
                                    <h6><a href="' . base_url('services/service_details/' . $v_service_info['service_id'] . '.html') . '">' . character_limiter($v_service_info['service_name'], 15) . '</a></h6>
                                </div>
                                <div class="listing-disc">
                                    <p></p>
                                </div>
                                <div class="listing-location pull-left"><!-- location-->
                                    <a href="#"><i class="fa fa-briefcase"></i>' . character_limiter($v_service_info['company_name'], 24) . '</a>
                                    <a href="#"><i class="fa fa-map-marker"></i>' . $v_service_info['address'] . ", " . $v_service_info['state'] . ", " . $v_service_info['city_name'] . ", " . $v_service_info['zip'] . '</a>
                                </div><!-- location end-->
                                <div class="star-rating pull-right"><!-- rating-->
                                    <!--<div class="score-callback" data-score="5"></div>-->
                                </div><!-- rating end-->
                            </div>
                        </div>
                        <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_service_info['service_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="'.$category_id.'" data-link="services/load_more_category_services" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No service available </button>
                    </center>
                </div>';
        }
        echo $output;
    }

    public function location_services($city_id = NULL) {
        $data = array();
        $data['city_info'] = $this->img_mdl->get_city_info_by_city_id($city_id);
        if (!empty($data['city_info'])) {
            $data['title'] = 'Services by Category';
            $data['all_services'] = $this->img_mdl->get_all_services_by_city_id($city_id);
            $data['main_content'] = $this->load->view('directory_views/services/location_services_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }
    
    public function load_more_location_services(){
        $service_id = $this->input->post('id', TRUE);
        $city_id = $this->input->post('cid', TRUE);
        $services_info = $this->img_mdl->more_city_services($service_id, $city_id);

        $output = '';
        $id = '';
        if (count($services_info) > 0) {
            foreach ($services_info as $v_service_info) {
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <img src="' . base_url('assets/uploaded_files/company_services/resize/' . $v_service_info['image_path']) . '" width="270" alt="' . $v_service_info['service_name'] . '"/>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('services/service_details/' . $v_service_info['service_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
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
                                    <h6><a href="' . base_url('services/service_details/' . $v_service_info['service_id'] . '.html') . '">' . character_limiter($v_service_info['service_name'], 15) . '</a></h6>
                                </div>
                                <div class="listing-disc">
                                    <p></p>
                                </div>
                                <div class="listing-location pull-left"><!-- location-->
                                    <a href="#"><i class="fa fa-briefcase"></i>' . character_limiter($v_service_info['company_name'], 24) . '</a>
                                    <a href="#"><i class="fa fa-map-marker"></i>' . $v_service_info['address'] . ", " . $v_service_info['state'] . ", " . $v_service_info['city_name'] . ", " . $v_service_info['zip'] . '</a>
                                </div><!-- location end-->
                                <div class="star-rating pull-right"><!-- rating-->
                                    <!--<div class="score-callback" data-score="5"></div>-->
                                </div><!-- rating end-->
                            </div>
                        </div>
                        <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_service_info['service_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="'.$city_id.'" data-link="services/load_more_location_services" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No service available </button>
                    </center>
                </div>';
        }
        echo $output;
    }

    public function service_details($service_id = NULL) {
        $data = array();
        $data['service_info'] = $this->img_mdl->get_service_info_by_service_id($service_id);
        $user_id = $this->session->userdata('user_id');
        if (!empty($user_id)) {
            $data['check_heart'] = $this->img_mdl->count_heart_by_user_id_and_service_id($user_id, $service_id);
            $data['check_bookmark'] = $this->img_mdl->count_bookmark_by_user_id_and_listing_id($user_id, $data['service_info']['listing_id']);
        }
        if (!empty($data['service_info'])) {
            $data['title'] = $data['service_info']['service_name'];
            $data['comments_info'] = $this->img_mdl->get_comments_info_by_service_id($service_id);
            $data['total_hearts'] = $this->img_mdl->count_hearts_by_service_id($service_id);
            $data['total_comments'] = $this->img_mdl->count_comments_by_service_id($service_id);
            $total_views = $data['service_info']['total_views'] + 1;
            $this->img_mdl->update_total_views($service_id, $total_views);
            $data['main_content'] = $this->load->view('directory_views/services/service_details_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }

    public function give_heart($service_id = NULL) {
        $data['user_id'] = $this->session->userdata('user_id');
        $data['service_id'] = $service_id;
        $service_check = $this->img_mdl->get_service_info_by_service_id($service_id);
        $heart_check = $this->img_mdl->count_heart_by_user_id_and_service_id($data['user_id'], $service_id);
        if (!empty($service_check) && !empty($data['user_id']) && $heart_check == 0) {
            $data['date_added'] = date('Y-m-d H:i:s');
            $result = $this->img_mdl->give_heart_by_user_id_and_service_id($data);
            if (!empty($result)) {
                redirect('services/service_details/' . $service_id);
            } else {
                redirect('services/service_details/' . $service_id);
            }
        } else {
            redirect();
        }
    }

    public function submit_comment($service_id = NULL) {
        $data['user_id'] = $this->session->userdata('user_id');
        $data['service_id'] = $service_id;
        $service_check = $this->img_mdl->get_service_info_by_service_id($service_id);
        if (!empty($service_check) && !empty($data['user_id'])) {
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
                redirect('services/service_details/' . $service_id);
            } else {
                $data['comment'] = $this->input->post('comment', TRUE);
                $data['date_added'] = date('Y-m-d H:i:s');
                $result = $this->img_mdl->store_service_comment($data);
                $sdata = array();
                if (!empty($result)) {
                    $sdata['success'] = 'Comment published successfully.';
                    $this->session->set_userdata($sdata);
                    redirect('services/service_details/' . $service_id);
                } else {
                    $sdata['exception'] = 'Operation failed! Please try again.';
                    $this->session->set_userdata($sdata);
                    redirect('services/service_details/' . $service_id);
                }
            }
        } else {
            redirect();
        }
    }

}
