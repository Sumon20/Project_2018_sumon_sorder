<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Load city and category function in global model
$cities_info = cities_info();
$categories_info = categories_info();
?>
<!--================================PAGE TITLE==========================================-->
<div class="page-title-wrap bggreen-1 padding-top-30 padding-bottom-30"><!-- section title -->
    <h4 class="white"><?php echo $category_info['category_name']; ?></h4>
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
                        <input class="search-form-submit bggreen-1 white" name="key-word" type="submit"/>
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
            <div class="col-md-9 col-sm-8 col-xs-12 main-wrap"><!-- content area column -->
                <div class="listing-section">
                    <div class=""><!-- section container -->
                        <div class="add-listing-wrapper">
                            <div class="add-listing-nav shadow-1">
                                <div class="row clearfix">
                                    <div class="col-md-9 col-sm-9 col-xs-9 pull-left">
                                        <div class="listing-tabs">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a data-toggle="tab"><?php echo $category_info['category_name']; ?> images</a></li>
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
                            <div class="listing-main gridview tab-content padding-top-30">
                                <div id="recent-images" class="tab-pane active">
                                    <div class="listing-wrapper three-column row">

                                        <?php if (!empty($all_images)) { ?>
                                            <div class="row" id="load_data">
                                                <?php foreach ($all_images as $v_image) { ?>
                                                    <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                                                        <div class="listing-item clearfix">
                                                            <div class="figure">
                                                                <img src="<?php echo base_url('assets/uploaded_files/company_img/resize/' . $v_image['image_path']); ?>" width="270" alt="<?php echo $v_image['caption']; ?>"/>
                                                                <div class="listing-overlay">
                                                                    <div class="listing-overlay-inner rgba-bggreen-1">
                                                                        <div class="overlay-content">
                                                                            <ul class="listing-links">
                                                                                <li><a class="bgwhite nohover" href="<?php echo base_url('images/image_details/' . $v_image['image_id'] . '.html'); ?>"><i class="fa fa-search green-1 "></i></a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="listing-content clearfix">
                                                                <div class="listing-meta-cat">
                                                                    <a class="bggreen-1" href="#"><i class="fa fa-image white"></i></a>
                                                                </div>
                                                                <div class="listing-title">
                                                                    <h6><a href="<?php echo base_url('images/image_details/' . $v_image['image_id'] . '.html'); ?>"><?php echo character_limiter($v_image['caption'], 18); ?></a></h6>
                                                                </div>
                                                                <div class="listing-disc">
                                                                    <p></p>
                                                                </div>
                                                                <div class="listing-location pull-left"><!-- location-->
                                                                    <a href="#"><i class="fa fa-briefcase"></i> <?php echo character_limiter($v_image['company_name'], 27); ?></a>
                                                                    <a href="#"><i class="fa fa-map-marker"></i> <?php echo $v_image['address'] . ", " . $v_image['state'] . ", " . $v_image['city_name'] . ", " . $v_image['zip']; ?></a>
                                                                </div><!-- location end-->
                                                                <div class="star-rating pull-right"><!-- rating-->
                                                                    <!--<div class="score-callback" data-score="5"></div>-->
                                                                </div><!-- rating end-->
                                                            </div>
                                                        </div>
                                                        <div class="listing-border-bottom bggreen-1"></div>
                                                    </div><!-- /.ITEM -->
                                                    <?php $image_id = $v_image['image_id']; ?>
                                                <?php } ?>
                                            </div>
                                            <div id="remove_row">
                                                <center>
                                                    <button type="button" name="btn_more" data-id="<?php echo $image_id; ?>" data-cid="<?php echo $category_info['category_id']; ?>" data-link="images/load_more_category_images" id="btn_more" class="btn btn-sm bggreen-1">Load more...</button>
                                                </center>
                                            </div>
                                        <?php } else { ?>
                                            <div class="item col-md-12 col-sm-12 col-xs-12"><!-- .ITEM -->
                                                <h5 style="text-align: center; ">Image not found for this category !</h5>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- section container end -->
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12"><!-- sidebar column -->
                <div class="sidebar sidebar-wrap">
                    <div class="sidebar-widget shadow-1">
                        <div class="sidebar-widget-title">
                            <h5><span class="bggreen-1"></span>category list</h5>
                        </div>
                        <div class="sidebar-widget-content category-widget clearfix">
                            <div class="sidebar-category-widget-wrap">
                                <ul>
                                    <?php
                                    foreach ($categories_info as $v_category_info) {
                                        echo "<li><a href='" . base_url('images/category_images/' . $v_category_info['category_id'] . '.html') . "'><i class='fa fa-".$v_category_info['icon_name']." ".$v_category_info['color_name']." white'></i>" . $v_category_info['category_name'] . "</a></li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-widget shadow-1">
                        <div class="sidebar-widget-title">
                            <h5><span class="bgpurpal-1"></span>location list</h5>
                        </div>
                        <div class="sidebar-widget-content location-widget clearfix">
                            <div class="sidebar-location-widget-wrap">
                                <ul>
                                    <?php
                                    foreach ($cities_info as $v_city_info) {
                                        echo "<li><a class='nohover' href='" . base_url('images/location_images/' . $v_city_info['city_id'] . '.html') . "'><i class='fa fa-map-marker blue-1'></i>" . $v_city_info['city_name'] . "</a></li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>		
        </div>
    </div><!-- section container end -->
</section>