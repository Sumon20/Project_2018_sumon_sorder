<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cities_info = cities_info();
$categories_info = categories_info();
?>
<!--================================ STATIC HEADER SECTION==========================================-->

<section class="static-section">
    <div class="container">
        <div class="static-header-content">
            <div class="static-header-text">
                <!--<h4 class="white">WELCOME TO <span class="blue-1"> listing </span> html TEMplate</h4>-->
                <h2 class="white margin-bottom-30">Search  <span class="yallow-1"> directory </span></h2>
            </div>
            <div class="search-form-wrap2">
                <form class="clearfix" action="<?php echo base_url('search/search_result.html'); ?>" method="post">
                    <div class="input-field-wrap pull-left">
                        <input class="search-form-input" name="keyword_name" placeholder="enter keyword" type="text"/>
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
                        <input class="search-form-submit bgblue-1 white" value="Search" type="submit"/>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

<!--================================SERVICES SECTION==========================================-->



<!--================================ FEATURE LISTING SECTION ==========================================-->
<?php if (!empty($featured_listing)) { ?>
    <section class="listing-section padding-bottom-40">
        <div class="container"><!-- section container -->
            <div class="section-title-wrap margin-bottom-50"><!-- section title -->
                <h4>Feature Listing</h4>
                <div class="title-divider">
                    <div class="line"></div>
                    <i class="fa fa-star-o"></i>
                    <div class="line"></div>
                </div>
            </div><!-- section title end -->
            <div class="add-listing-wrapper">
                <div class="listing-main gridview tab-content padding-top-50">
                    <div id="latest-listing" class="tab-pane active">
                        <div class="listing-wrapper row">

                            <?php foreach ($featured_listing as $v_featured_listing) { ?>
                                <div class="item col-md-3 col-sm-6 col-xs-12"><!-- .ITEM -->
                                    <div class="listing-item clearfix">
                                        <div class="figure">
                                            <?php
                                            $company_logo = '';
                                            if (!empty($v_featured_listing['company_logo'])) {
                                                $company_logo = "assets/uploaded_files/company_logo/resize/" . $v_featured_listing['company_logo'];
                                            } else {
                                                $company_logo = "assets/uploaded_files/company_logo/logo_not_available.png";
                                            }
                                            ?>
                                            <a href="<?php echo base_url('listing/listing_details/' . $v_featured_listing['listing_id'] . '.html'); ?>"><img src="<?php echo base_url($company_logo); ?>" width="270" class="img-responsive img-bordered img-rounded" alt="<?php echo $v_featured_listing['company_name']; ?>"/></a>
                                        </div>
                                        <div class="listing-content clearfix">
                                            <div class="listing-meta-cat">
                                                <a class="<?php echo $v_featured_listing['color_name']; ?>" href="#"><i class="fa fa-<?php echo $v_featured_listing['icon_name']; ?> white"></i></a>
                                            </div>
                                            <div class="listing-title">
                                                <h6><a style="color:#ed3b3b; font-weight: bold" href="<?php echo base_url('listing/listing_details/' . $v_featured_listing['listing_id'] . '.html'); ?>"><?php echo character_limiter($v_featured_listing['company_name'], 15); ?></a></h6>
                                            </div>
                                            <div class="listing-location pull-left"><!-- location-->
                                                <a href="<?php echo base_url('listing/category_listing/' . $v_featured_listing['category_id'] . '.html'); ?>"><i class="fa fa-<?php echo $v_featured_listing['icon_name']; ?>"></i> <?php echo character_limiter($v_featured_listing['category_name'], 24); ?></a>
                                            </div><!-- location end-->
                                            <!--<div class="star-rating pull-right">
                                                <div class="score-callback" data-score="5"></div>
                                            </div>-->
                                            <!-- rating end-->
                                        </div>
                                    </div>
                                    <div class="listing-border-bottom <?php echo $v_featured_listing['color_name']; ?>"></div>
                                </div><!-- /.ITEM -->
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- section container end -->
    </section>
<?php } ?>

<!--================================CATEGOTY SECTION==========================================-->


<section class="categories-section padding-top-70 padding-bottom-40">
    <div class="container"><!-- section container -->
        <div class="section-title-wrap margin-bottom-50"><!-- section title -->
            <h4>Classified Category</h4>
            <div class="title-divider">
                <div class="line"></div>
                <i class="fa fa-star-o"></i>
                <div class="line"></div>
            </div>
        </div><!-- section title end -->
        <div class="row category-section-wrap cat-style-3">
            <?php foreach ($categories_info as $v_category_info) { ?>
                <div class="col-md-4 col-sm-6 col-xs-12 main-wrap"><!-- category column -->
                    <div class="cat-wrap shadow-1">
                        <p><i class="fa fa-<?php echo $v_category_info['icon_name'] . " " . $v_category_info['color_name']; ?> white"></i></p>
                        <h5><a href="<?php echo base_url('listing/category_listing/' . $v_category_info['category_id'] . '.html'); ?>"><?php echo $v_category_info['category_name']; ?></a></h5>
                    </div>
                    <div class="listing-border-bottom bgblue-1"></div>
                </div><!-- category column end -->
            <?php } ?>
        </div>
    </div><!-- section container end -->
</section>

<!--================================FUNFACTS COUNTER SECTION==========================================-->





<!--================================LOCATION SECTION==========================================-->

<section class="location-section padding-bottom-40 padding-top-150">
    <div class="container"><!-- section container -->
        <div class="section-title-wrap margin-bottom-50"><!-- section title -->
            <h4>Top location</h4>
            <div class="title-divider">
                <div class="line"></div>
                <i class="fa fa-star-o"></i>
                <div class="line"></div>
            </div>
        </div><!-- section title end -->
        <div class="location-wrapper style2">
            <div class="row">
                <?php foreach ($cities_info as $v_city_info) { ?>
                    <div class="col-md-4 col-sm-4 col-xs-12"><!--location entry column-->
                        <div class="location-entry">
                            <div class="location-content-2 shadow-1 clearfix">
                                <div class="location-icon">
                                    <i class="fa fa-map-marker bgblue-1 white"></i>
                                </div>
                                <div class="location-title-disc">
                                    <h5><a href="<?php echo base_url('listing/location_listing/' . $v_city_info['city_id'] . '.html'); ?>"><?php echo $v_city_info['city_name']; ?></a></h5>
                                    <a class="number-adds" href="#">listing available</a>
                                </div>
                            </div>
                        </div>
                    </div><!--location entry column end-->
                <?php } ?>
            </div>
        </div>
    </div><!-- section container end -->
</section>

<!--================================CALLOUT SECTION==========================================-->




<!--================================ PARTNER SECTION ==========================================-->


