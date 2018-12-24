<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Listing extends CC_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('directory_models/listing_model', 'list_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Listing';
        $data['all_listing'] = $this->list_mdl->get_all_listing();
        $data['recent_listing'] = $this->list_mdl->get_recent_listing();
        $data['popular_listing'] = $this->list_mdl->get_popural_listing();
        $data['main_content'] = $this->load->view('directory_views/listing/listing_content_v', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

    /*===================================================================*/
    /*Load more listing click */
    /*===================================================================*/

    public function load_more_listing() {
        $listing_id = $this->input->post('id', TRUE);
        $listing_info = $this->list_mdl->more_listing($listing_id);

        $output = '';
        $id = '';
        if (count($listing_info) > 0) {
            foreach ($listing_info as $v_listing) {
                $company_logo = '';
                if (!empty($v_listing['company_logo'])) {
                    $company_logo = "assets/uploaded_files/company_logo/resize/" . $v_listing['company_logo'];
                } else {
                    $company_logo = "assets/uploaded_files/company_logo/logo_not_available.png";
                }
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <img src="' . base_url($company_logo) . '" width="270" alt="' . $v_listing['company_name'] . '"/>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('listing/listing_details/' . $v_listing['listing_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
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
                                <h6><a href="' . base_url('listing/listing_details/' . $v_listing['listing_id'] . '.html') . '">' . character_limiter($v_listing['company_name'], 15) . '</a></h6>
                            </div>
                            <div class="listing-disc">
                                <p>' . character_limiter($v_listing['about_company'], 250) . '</p>
                            </div>
                            <div class="listing-location pull-left"><!-- location-->
                                <a href="#"><i class="fa fa-briefcase"></i> ' . character_limiter($v_listing['company_name'], 24) . '</a>
                                <a href="#"><i class="fa fa-map-marker"></i> ' . $v_listing['address'] . ", " . $v_listing['state'] . ", " . $v_listing['city_name'] . ", " . $v_listing['zip'] . '</a>
                            </div><!-- location end-->
                            <div class="star-rating pull-right"><!-- rating-->
                                <!--<div class="score-callback" data-score="5"></div>-->
                            </div><!-- rating end-->
                        </div>
                    </div>
                    <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_listing['listing_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="" data-link="listing/load_more_listing" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No listing available </button>
                    </center>
                </div>';
        }
        echo $output;
    }
    /*----------------------------------------------------------------------- */

    

    /*===================================================================*/
    /*Caterogoty listing menu click */
    /*===================================================================*/
    public function category_listing($category_id = NULL) {
        $data = array();
        $data['category_info'] = $this->list_mdl->get_category_info_by_category_id($category_id);
        if (!empty($data['category_info'])) {
            $data['title'] = 'Listing by Category';
            $data['all_listing'] = $this->list_mdl->get_all_listing_by_category_id($category_id);
            $data['main_content'] = $this->load->view('directory_views/listing/category_listing_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }

    /*----------------------------------------------------------------------- */


    /*===================================================================*/
    /*Load more catagory button click*/
    /*===================================================================*/

    public function load_more_category_listing() {
        $listing_id = $this->input->post('id', TRUE);
        $category_id = $this->input->post('cid', TRUE);
        $listing_info = $this->list_mdl->more_category_listing($listing_id, $category_id);

        $output = '';
        $id = '';
        if (count($listing_info) > 0) {
            foreach ($listing_info as $v_listing) {
                $company_logo = '';
                if (!empty($v_listing['company_logo'])) {
                    $company_logo = "assets/uploaded_files/company_logo/resize/" . $v_listing['company_logo'];
                } else {
                    $company_logo = "assets/uploaded_files/company_logo/logo_not_available.png";
                }
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <img src="' . base_url($company_logo) . '" width="270" alt="' . $v_listing['company_name'] . '"/>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('listing/listing_details/' . $v_listing['listing_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
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
                                <h6><a href="' . base_url('listing/listing_details/' . $v_listing['listing_id'] . '.html') . '">' . character_limiter($v_listing['company_name'], 15) . '</a></h6>
                            </div>
                            <div class="listing-disc">
                                <p>' . character_limiter($v_listing['about_company'], 250) . '</p>
                            </div>
                            <div class="listing-location pull-left"><!-- location-->
                                <a href="#"><i class="fa fa-briefcase"></i> ' . character_limiter($v_listing['company_name'], 24) . '</a>
                                <a href="#"><i class="fa fa-map-marker"></i> ' . $v_listing['address'] . ", " . $v_listing['state'] . ", " . $v_listing['city_name'] . ", " . $v_listing['zip'] . '</a>
                            </div><!-- location end-->
                            <div class="star-rating pull-right"><!-- rating-->
                                <!--<div class="score-callback" data-score="5"></div>-->
                            </div><!-- rating end-->
                        </div>
                    </div>
                    <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_listing['listing_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="' . $category_id . '" data-link="listing/load_more_category_listing" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No listing available </button>
                    </center>
                </div>';
        }
        echo $output;
    }
    /*----------------------------------------------------------------------- */



    /*===================================================================*/
    /*Search reslt by city name */
    /*===================================================================*/
    
    public function location_listing($city_id = NULL) {
        $data = array();
        $data['city_info'] = $this->list_mdl->get_city_info_by_city_id($city_id);
        if (!empty($data['city_info'])) {
            $data['title'] = 'Listing by Category';
            $data['all_listing'] = $this->list_mdl->get_all_listing_by_city_id($city_id);
            $data['main_content'] = $this->load->view('directory_views/listing/location_listing_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }

    /*--------------------------------------------------------------------------*/

    /*===================================================================*/
    /*Load more location listing click */
    /*===================================================================*/

    public function load_more_location_listing() {
        $listing_id = $this->input->post('id', TRUE);
        $city_id = $this->input->post('cid', TRUE);
        $listing_info = $this->list_mdl->more_city_listing($listing_id, $city_id);

        $output = '';
        $id = '';
        if (count($listing_info) > 0) {
            foreach ($listing_info as $v_listing) {
                $company_logo = '';
                if (!empty($v_listing['company_logo'])) {
                    $company_logo = "assets/uploaded_files/company_logo/resize/" . $v_listing['company_logo'];
                } else {
                    $company_logo = "assets/uploaded_files/company_logo/logo_not_available.png";
                }
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <img src="' . base_url($company_logo) . '" width="270" alt="' . $v_listing['company_name'] . '"/>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('listing/listing_details/' . $v_listing['listing_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
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
                                <h6><a href="' . base_url('listing/listing_details/' . $v_listing['listing_id'] . '.html') . '">' . character_limiter($v_listing['company_name'], 15) . '</a></h6>
                            </div>
                            <div class="listing-disc">
                                <p>' . character_limiter($v_listing['about_company'], 250) . '</p>
                            </div>
                            <div class="listing-location pull-left"><!-- location-->
                                <a href="#"><i class="fa fa-briefcase"></i> ' . character_limiter($v_listing['company_name'], 24) . '</a>
                                <a href="#"><i class="fa fa-map-marker"></i> ' . $v_listing['address'] . ", " . $v_listing['state'] . ", " . $v_listing['city_name'] . ", " . $v_listing['zip'] . '</a>
                            </div><!-- location end-->
                            <div class="star-rating pull-right"><!-- rating-->
                                <!--<div class="score-callback" data-score="5"></div>-->
                            </div><!-- rating end-->
                        </div>
                    </div>
                    <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_listing['listing_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="' . $city_id . '" data-link="listing/load_more_location_listing" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No listing available </button>
                    </center>
                </div>';
        }
        echo $output;
    }
    /*----------------------------------------------------------------------- */

    

    /*===================================================================*/
    /*showing all data details about the lisitg*/
    /*===================================================================*/
    public function listing_details($listing_id = NULL) {
        $data = array();
        $data['listing_info'] = $this->list_mdl->get_listing_info_by_listing_id($listing_id);
        if (!empty($data['listing_info'])) {
            $data['title'] = $data['listing_info']['company_name'];
            // count all
            $data['total_images'] = $this->list_mdl->count_total_images_by_listing_id($listing_id);
            $data['total_videos'] = $this->list_mdl->count_total_videos_by_listing_id($listing_id);
            $data['total_products'] = $this->list_mdl->count_total_products_by_listing_id($listing_id);
            $data['total_services'] = $this->list_mdl->count_total_services_by_listing_id($listing_id);
            $data['total_articles'] = $this->list_mdl->count_total_articles_by_listing_id($listing_id);
            $data['recent_articles'] = $this->list_mdl->get_recent_articles_by_listing_id($listing_id);
            $data['recent_images'] = $this->list_mdl->get_recent_images_by_listing_id($listing_id);
            $data['recent_videos'] = $this->list_mdl->get_recent_videos_by_listing_id($listing_id);
            // update total views
            $total_views = $data['listing_info']['total_views'] + 1;
            $this->list_mdl->update_total_views($listing_id, $total_views);
            $data['main_content'] = $this->load->view('directory_views/listing/listing_details_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }
    /*--------------------------------------------------------------------*/


    public function images($listing_id = NULL) {
        $data = array();
        $data['listing_info'] = $this->list_mdl->get_listing_info_by_listing_id($listing_id);
        if (!empty($data['listing_info'])) {
            $data['title'] = $data['listing_info']['company_name'];
            $data['images_info'] = $this->list_mdl->get_images_by_listing_id($listing_id);
            $data['recent_articles'] = $this->list_mdl->get_recent_articles_by_listing_id($listing_id);
            // count all
            $data['total_images'] = $this->list_mdl->count_total_images_by_listing_id($listing_id);
            $data['total_videos'] = $this->list_mdl->count_total_videos_by_listing_id($listing_id);
            $data['total_products'] = $this->list_mdl->count_total_products_by_listing_id($listing_id);
            $data['total_services'] = $this->list_mdl->count_total_services_by_listing_id($listing_id);
            $data['total_articles'] = $this->list_mdl->count_total_articles_by_listing_id($listing_id);
            $data['main_content'] = $this->load->view('directory_views/listing/images_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }
    
    public function products($listing_id = NULL) {
        $data = array();
        $data['listing_info'] = $this->list_mdl->get_listing_info_by_listing_id($listing_id);
        if (!empty($data['listing_info'])) {
            $data['title'] = $data['listing_info']['company_name'];
            $data['products_info'] = $this->list_mdl->get_products_by_listing_id($listing_id);
            $data['recent_articles'] = $this->list_mdl->get_recent_articles_by_listing_id($listing_id);
            // count all
            $data['total_images'] = $this->list_mdl->count_total_images_by_listing_id($listing_id);
            $data['total_videos'] = $this->list_mdl->count_total_videos_by_listing_id($listing_id);
            $data['total_products'] = $this->list_mdl->count_total_products_by_listing_id($listing_id);
            $data['total_services'] = $this->list_mdl->count_total_services_by_listing_id($listing_id);
            $data['total_articles'] = $this->list_mdl->count_total_articles_by_listing_id($listing_id);
            $data['main_content'] = $this->load->view('directory_views/listing/products_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }
    
    public function services($listing_id = NULL) {
        $data = array();
        $data['listing_info'] = $this->list_mdl->get_listing_info_by_listing_id($listing_id);
        if (!empty($data['listing_info'])) {
            $data['title'] = $data['listing_info']['company_name'];
            $data['services_info'] = $this->list_mdl->get_services_by_listing_id($listing_id);
            $data['recent_articles'] = $this->list_mdl->get_recent_articles_by_listing_id($listing_id);
            // count all
            $data['total_images'] = $this->list_mdl->count_total_images_by_listing_id($listing_id);
            $data['total_videos'] = $this->list_mdl->count_total_videos_by_listing_id($listing_id);
            $data['total_products'] = $this->list_mdl->count_total_products_by_listing_id($listing_id);
            $data['total_services'] = $this->list_mdl->count_total_services_by_listing_id($listing_id);
            $data['total_articles'] = $this->list_mdl->count_total_articles_by_listing_id($listing_id);
            $data['main_content'] = $this->load->view('directory_views/listing/services_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }
    
    public function articles($listing_id = NULL) {
        $data = array();
        $data['listing_info'] = $this->list_mdl->get_listing_info_by_listing_id($listing_id);
        if (!empty($data['listing_info'])) {
            $data['title'] = $data['listing_info']['company_name'];
            $data['articles_info'] = $this->list_mdl->get_articles_by_listing_id($listing_id);
            // count all
            $data['total_images'] = $this->list_mdl->count_total_images_by_listing_id($listing_id);
            $data['total_videos'] = $this->list_mdl->count_total_videos_by_listing_id($listing_id);
            $data['total_products'] = $this->list_mdl->count_total_products_by_listing_id($listing_id);
            $data['total_services'] = $this->list_mdl->count_total_services_by_listing_id($listing_id);
            $data['total_articles'] = $this->list_mdl->count_total_articles_by_listing_id($listing_id);
            $data['main_content'] = $this->load->view('directory_views/listing/articles_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }
    
    public function videos($listing_id = NULL) {
        $data = array();
        $data['listing_info'] = $this->list_mdl->get_listing_info_by_listing_id($listing_id);
        if (!empty($data['listing_info'])) {
            $data['title'] = $data['listing_info']['company_name'];
            $data['videos_info'] = $this->list_mdl->get_videos_by_listing_id($listing_id);
            $data['recent_articles'] = $this->list_mdl->get_recent_articles_by_listing_id($listing_id);
            // count all
            $data['total_images'] = $this->list_mdl->count_total_images_by_listing_id($listing_id);
            $data['total_videos'] = $this->list_mdl->count_total_videos_by_listing_id($listing_id);
            $data['total_products'] = $this->list_mdl->count_total_products_by_listing_id($listing_id);
            $data['total_services'] = $this->list_mdl->count_total_services_by_listing_id($listing_id);
            $data['total_articles'] = $this->list_mdl->count_total_articles_by_listing_id($listing_id);
            $data['main_content'] = $this->load->view('directory_views/listing/videos_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }

}
