<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cities_info = cities_info();
$categories_info = categories_info();
?>
<!--================================PAGE TITLE==========================================-->
<div class="page-title-wrap bggreen-1 padding-top-30 padding-bottom-30"><!-- section title -->
    <h4 class="white">Search Results</h4>
</div><!-- section title end -->
<div class="sc-page padding-top-100 padding-bottom-20"><!--sc-page-->
    <!--================================SEARCH FORM SECTION ==========================================-->

    <section id="search-form" class="padding-top-20">
        <div class="container">
            <div class="search-form-wrap">
                <form class="clearfix" action="<?php echo base_url('search/search_result.html'); ?>" method="post">
                    <div class="input-field-wrap pull-left">
                        <input class="search-form-input" name="keyword_name" placeholder="enter keyword" type="text"/>
                    </div>
                    <div class="select-field-wrap pull-left">
                        <select class="search-form-select" name="city_id" >
                            <option class="options" value="">all locations</option>
                            <?php
                            foreach ($cities_info as $v_city_info) {
                                echo "<option class='options' value='". $v_city_info['city_id'] ."'>" . $v_city_info['city_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="select-field-wrap pull-left">
                        <select class="search-form-select" name="category_id" >
                            <option class="options" value="">all categories</option>
                            <?php
                            foreach ($categories_info as $v_category_info) {
                                echo "<option class='options' value='" . $v_category_info['category_id'] . "'>" . $v_category_info['category_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="submit-field-wrap pull-left">
                        <input class="search-form-submit bgyallow-1 white" name="key-word" type="submit"/>
                    </div>
                </form>
            </div>
        </div>
    </section>

</div><!--/sc-page-->

<!--================================CATEGOTY SECTION==========================================-->

<section class="aside-layout-section padding-bottom-40">
    <div class="container"><!-- section container -->
        <div class="row"><!-- row -->
            <div class="col-md-12 col-sm-12 col-xs-12 main-wrap"><!-- content area column -->
                <div class="listing-section">
                    <div class=""><!-- section container -->
                        <div class="add-listing-wrapper">
                            <div class="add-listing-nav shadow-1">
                                <div class="row clearfix">
                                    <div class="col-md-9 col-sm-9 col-xs-9 pull-left">
                                        <div class="listing-tabs">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a data-toggle="tab"> Search Results</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-3 pull-right">
                                        <div class="view-switcher">
                                            <ul>
                                                <li class="gridview gridview"><i class="fa fa-th"></i></li>
                                                <li class="listview"><i class="fa fa-th-list"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="listing-main listview tab-content padding-top-30">
                                <div id="recent-images" class="tab-pane active">
                                    <div class="listing-wrapper three-column row">

                                        <?php if (!empty($search_result)) { ?>
                                            <?php foreach ($search_result as $v_listing_info) { ?>
                                                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                                                    <div class="listing-item clearfix">
                                                        <div class="figure">
                                                            <?php
                                                            $company_logo = '';
                                                            if (!empty($v_listing_info['company_logo'])) {
                                                                $company_logo = "assets/uploaded_files/company_logo/resize/" . $v_listing_info['company_logo'];
                                                            } else {
                                                                $company_logo = "assets/uploaded_files/company_logo/logo_not_available.png";
                                                            }
                                                            ?>
                                                            <img src="<?php echo base_url($company_logo); ?>" width="270" alt="<?php echo $v_listing_info['company_name']; ?>"/>

                                                            <div class="listing-overlay">
                                                                <div class="listing-overlay-inner bgbrown-1">
                                                                    <div class="overlay-content">
                                                                        <ul class="listing-links">
                                                                            <li><a class="bgwhite nohover" href="<?php echo base_url('user/listing/view_listing/' . $v_listing_info['listing_id'] . '.html'); ?>"><i class="fa fa-search green-1 "></i></a></li>
                                                                            <li><a class="bgwhite nohover" href="<?php echo base_url('user/listing/edit_listing/' . $v_listing_info['listing_id'] . '.html'); ?>"><i class="fa fa-edit blue-1"></i></a></li>
                                                                            <li><a class="bgwhite nohover" href="<?php echo base_url('user/listing/remove_listing/' . $v_listing_info['listing_id'] . '.html'); ?>"><i class="fa fa-trash yallow-1"></i></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="listing-content clearfix">
                                                            <div class="listing-meta-cat">
                                                                <a class="bgbrown-1" href="#"><i class="fa fa-briefcase white"></i></a>
                                                            </div>
                                                            <div class="listing-title">
                                                                <h6><a href="<?php echo base_url('home/image_details.html'); ?>"><?php echo $v_listing_info['company_name']; ?></a></h6>
                                                            </div>
                                                            <div class="listing-disc">
                                                                <p><?php echo $v_listing_info['about_company']; ?></p>
                                                            </div>
                                                            <div class="listing-location pull-left"><!-- location-->
                                                                <a href="#"><i class="fa fa-map-marker"></i> <?php echo $v_listing_info['city_name']; ?></a>
                                                                <a href="#"><i class="fa fa-map-marker"></i> <?php echo $v_listing_info['address']; ?></a>
                                                            </div>
                                                            <!-- location end-->
                                                            <!--<div class="star-rating pull-right"> rating
                                                                <div class="score-callback" data-score="5"></div>
                                                            </div>-->
                                                            <!-- rating end-->
                                                        </div>
                                                    </div>
                                                    <div class="listing-border-bottom bgblue-1"></div>
                                                </div><!-- /.ITEM -->
                                            <?php } ?>
                                        <?php } else { ?>
                                            <div class="item col-md-12 col-sm-12 col-xs-12"><!-- .ITEM -->
                                                <h5 style="text-align: center; ">No result found !</h5>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- section container end -->
                </div>
            </div>	
        </div>
    </div><!-- section container end -->
</section>