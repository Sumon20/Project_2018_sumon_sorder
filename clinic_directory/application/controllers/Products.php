<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CC_Controller {
    
   

    public function __construct() {
        parent::__construct();
        $this->load->model('directory_models/products_model', 'img_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Products';
        $data['all_products'] = $this->img_mdl->get_all_products();
        $data['recent_products'] = $this->img_mdl->get_recent_products();
        $data['popular_products'] = $this->img_mdl->get_popural_products();
        $data['main_content'] = $this->load->view('directory_views/products/products_content_v', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

    public function load_more_products() {
        $product_id = $this->input->post('id', TRUE);
        $products_info = $this->img_mdl->more_products($product_id);

        $output = '';
        $id = '';
        if (count($products_info) > 0) {
            foreach ($products_info as $v_product_info) {
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <img src="' . base_url('assets/uploaded_files/company_products/resize/' . $v_product_info['image_path']) . '" width="270" alt="' . $v_product_info['product_name'] . '"/>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('products/product_details/' . $v_product_info['product_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
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
                                    <h6><a href="' . base_url('products/product_details/' . $v_product_info['product_id'] . '.html') . '">' . character_limiter($v_product_info['product_name'], 15) . '</a></h6>
                                </div>
                                <div class="listing-disc">
                                    <p></p>
                                </div>
                                <div class="listing-location pull-left"><!-- location-->
                                    <a href="#"><i class="fa fa-briefcase"></i>' . character_limiter($v_product_info['company_name'], 24) . '</a>
                                    <a href="#"><i class="fa fa-map-marker"></i>' . $v_product_info['address'] . ", " . $v_product_info['state'] . ", " . $v_product_info['city_name'] . ", " . $v_product_info['zip'] . '</a>
                                </div><!-- location end-->
                                <div class="star-rating pull-right"><!-- rating-->
                                    <!--<div class="score-callback" data-score="5"></div>-->
                                </div><!-- rating end-->
                            </div>
                        </div>
                        <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_product_info['product_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="" data-link="products/load_more_products" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No product available </button>
                    </center>
                </div>';
        }
        echo $output;
    }

    public function category_products($category_id = NULL) {
        $data = array();
        $data['category_info'] = $this->img_mdl->get_category_info_by_category_id($category_id);
        if (!empty($data['category_info'])) {
            $data['title'] = 'Products by Category';
            $data['all_products'] = $this->img_mdl->get_all_products_by_category_id($category_id);
            $data['main_content'] = $this->load->view('directory_views/products/category_products_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }
    
    public function load_more_category_products(){
        $product_id = $this->input->post('id', TRUE);
        $category_id = $this->input->post('cid', TRUE);
        $products_info = $this->img_mdl->more_category_products($product_id, $category_id);

        $output = '';
        $id = '';
        if (count($products_info) > 0) {
            foreach ($products_info as $v_product_info) {
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <img src="' . base_url('assets/uploaded_files/company_products/resize/' . $v_product_info['image_path']) . '" width="270" alt="' . $v_product_info['product_name'] . '"/>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('products/product_details/' . $v_product_info['product_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
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
                                    <h6><a href="' . base_url('products/product_details/' . $v_product_info['product_id'] . '.html') . '">' . character_limiter($v_product_info['product_name'], 15) . '</a></h6>
                                </div>
                                <div class="listing-disc">
                                    <p></p>
                                </div>
                                <div class="listing-location pull-left"><!-- location-->
                                    <a href="#"><i class="fa fa-briefcase"></i>' . character_limiter($v_product_info['company_name'], 24) . '</a>
                                    <a href="#"><i class="fa fa-map-marker"></i>' . $v_product_info['address'] . ", " . $v_product_info['state'] . ", " . $v_product_info['city_name'] . ", " . $v_product_info['zip'] . '</a>
                                </div><!-- location end-->
                                <div class="star-rating pull-right"><!-- rating-->
                                    <!--<div class="score-callback" data-score="5"></div>-->
                                </div><!-- rating end-->
                            </div>
                        </div>
                        <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_product_info['product_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="'.$category_id.'" data-link="products/load_more_category_products" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No product available </button>
                    </center>
                </div>';
        }
        echo $output;
    }

    public function location_products($city_id = NULL) {
        $data = array();
        $data['city_info'] = $this->img_mdl->get_city_info_by_city_id($city_id);
        if (!empty($data['city_info'])) {
            $data['title'] = 'Products by Category';
            $data['all_products'] = $this->img_mdl->get_all_products_by_city_id($city_id);
            $data['main_content'] = $this->load->view('directory_views/products/location_products_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }
    
    public function load_more_location_products(){
        $product_id = $this->input->post('id', TRUE);
        $city_id = $this->input->post('cid', TRUE);
        $products_info = $this->img_mdl->more_city_products($product_id, $city_id);

        $output = '';
        $id = '';
        if (count($products_info) > 0) {
            foreach ($products_info as $v_product_info) {
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <img src="' . base_url('assets/uploaded_files/company_products/resize/' . $v_product_info['image_path']) . '" width="270" alt="' . $v_product_info['product_name'] . '"/>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('products/product_details/' . $v_product_info['product_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
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
                                    <h6><a href="' . base_url('products/product_details/' . $v_product_info['product_id'] . '.html') . '">' . character_limiter($v_product_info['product_name'], 15) . '</a></h6>
                                </div>
                                <div class="listing-disc">
                                    <p></p>
                                </div>
                                <div class="listing-location pull-left"><!-- location-->
                                    <a href="#"><i class="fa fa-briefcase"></i>' . character_limiter($v_product_info['company_name'], 24) . '</a>
                                    <a href="#"><i class="fa fa-map-marker"></i>' . $v_product_info['address'] . ", " . $v_product_info['state'] . ", " . $v_product_info['city_name'] . ", " . $v_product_info['zip'] . '</a>
                                </div><!-- location end-->
                                <div class="star-rating pull-right"><!-- rating-->
                                    <!--<div class="score-callback" data-score="5"></div>-->
                                </div><!-- rating end-->
                            </div>
                        </div>
                        <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_product_info['product_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="'.$city_id.'" data-link="products/load_more_location_products" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No product available </button>
                    </center>
                </div>';
        }
        echo $output;
    }

    public function product_details($product_id = NULL) {
        $data = array();
        $data['product_info'] = $this->img_mdl->get_product_info_by_product_id($product_id);
        $user_id = $this->session->userdata('user_id');
        if (!empty($user_id)) {
            $data['check_heart'] = $this->img_mdl->count_heart_by_user_id_and_product_id($user_id, $product_id);
            $data['check_bookmark'] = $this->img_mdl->count_bookmark_by_user_id_and_listing_id($user_id, $data['product_info']['listing_id']);
        }
        if (!empty($data['product_info'])) {
            $data['title'] = $data['product_info']['product_name'];
            $data['comments_info'] = $this->img_mdl->get_comments_info_by_product_id($product_id);
            $data['total_hearts'] = $this->img_mdl->count_hearts_by_product_id($product_id);
            $data['total_comments'] = $this->img_mdl->count_comments_by_product_id($product_id);
            $total_views = $data['product_info']['total_views'] + 1;
            $this->img_mdl->update_total_views($product_id, $total_views);
            $data['main_content'] = $this->load->view('directory_views/products/product_details_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }

    public function give_heart($product_id = NULL) {
        $data['user_id'] = $this->session->userdata('user_id');
        $data['product_id'] = $product_id;
        $product_check = $this->img_mdl->get_product_info_by_product_id($product_id);
        $heart_check = $this->img_mdl->count_heart_by_user_id_and_product_id($data['user_id'], $product_id);
        if (!empty($product_check) && !empty($data['user_id']) && $heart_check == 0) {
            $data['date_added'] = date('Y-m-d H:i:s');
            $result = $this->img_mdl->give_heart_by_user_id_and_product_id($data);
            if (!empty($result)) {
                redirect('products/product_details/' . $product_id);
            } else {
                redirect('products/product_details/' . $product_id);
            }
        } else {
            redirect();
        }
    }

    public function submit_comment($product_id = NULL) {
        $data['user_id'] = $this->session->userdata('user_id');
        $data['product_id'] = $product_id;
        $product_check = $this->img_mdl->get_product_info_by_product_id($product_id);
        if (!empty($product_check) && !empty($data['user_id'])) {
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
                redirect('products/product_details/' . $product_id);
            } else {
                $data['comment'] = $this->input->post('comment', TRUE);
                $data['date_added'] = date('Y-m-d H:i:s');
                $result = $this->img_mdl->store_product_comment($data);
                $sdata = array();
                if (!empty($result)) {
                    $sdata['success'] = 'Comment published successfully.';
                    $this->session->set_userdata($sdata);
                    redirect('products/product_details/' . $product_id);
                } else {
                    $sdata['exception'] = 'Operation failed! Please try again.';
                    $this->session->set_userdata($sdata);
                    redirect('products/product_details/' . $product_id);
                }
            }
        } else {
            redirect();
        }
    }

}
