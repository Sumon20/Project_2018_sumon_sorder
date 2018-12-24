<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Load city and category function in global model
//$cities_info = cities_info();
//$categories_info = categories_info();
?>
<!--================================PAGE TITLE==========================================-->
<div class="page-title-wrap bgbrown-1 padding-top-30 padding-bottom-30"><!-- section title -->
    <h4 class="white"><?php echo $listing_info['company_name']; ?></h4>
</div><!-- section title end -->

<!--================================listing SECTION==========================================-->

<section class="aside-layout-section padding-top-70 padding-bottom-40">
    <div class="container"><!-- section container -->
        <div class="row"><!-- row -->
            <div class="col-md-3 col-sm-4 col-xs-12"><!-- sidebar column -->
                <div class="sidebar sidebar-wrap">

                    <!-- start profile picture -->
                    <div class="sidebar-widget shadow-1">
                        <div class="sidebar-widget-content advertise  clearfix">
                            <div class="sidebar-image-ads">
                                <?php
                                $company_logo = '';
                                if (!empty($listing_info['company_logo'])) {
                                    $company_logo = "assets/uploaded_files/company_logo/resize/" . $listing_info['company_logo'];
                                } else {
                                    $company_logo = "assets/uploaded_files/company_logo/logo_not_available.png";
                                }
                                ?>
                                <img src="<?php echo base_url($company_logo); ?>" alt="<?php echo $listing_info['company_name']; ?>">
                            </div>
                        </div>
                        <div class="sidebar-widget-title">
                            <h5><a href="<?php echo base_url('listing/listing_details/' . $listing_info['listing_id'] . '.html'); ?>" class="red-2"><span class="bgblue-1"></span><?php echo $listing_info['company_name']; ?></a></h5>
                        </div>
                    </div><!-- Item end-->

                    <div class="sidebar-widget shadow-1">
                        <div class="sidebar-widget-content category-widget clearfix">
                            <div class="sidebar-category-widget-wrap">
                                <ul>
                                    <li><a href="<?php echo base_url('listing/images/' . $listing_info['listing_id'] . '.html'); ?>"><i class="fa fa-image bggreen-1 white"></i> Images <span>( <?php echo $total_images; ?> )</span></a></li>
                                    <li><a href="<?php echo base_url('listing/videos/' . $listing_info['listing_id'] . '.html'); ?>"><i class="fa fa-video-camera bgpurpal-1 white"></i> Videos <span>( <?php echo $total_videos; ?> )</span></a></li>
                                    <li><a href="<?php echo base_url('listing/products/' . $listing_info['listing_id'] . '.html'); ?>"><i class="fa fa-tags bgyallow-1 white"></i> Products <span>( <?php echo $total_products; ?> )</span></a></li>
                                    <li><a href="<?php echo base_url('listing/services/' . $listing_info['listing_id'] . '.html'); ?>"><i class="fa fa-cogs bgblue-3 white"></i> Services <span>( <?php echo $total_services; ?> )</span></a></li>
                                    <li><a href="<?php echo base_url('listing/articles/' . $listing_info['listing_id'] . '.html'); ?>"><i class="fa fa-book bgorange-1 white"></i> Articles <span>( <?php echo $total_articles; ?> )</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-9 col-sm-8 col-xs-12 main-wrap"><!-- content area column -->
                <div class="listing-single padding-bottom-40">
                    <div class="single-listing-wrap">

                        <div class="listing-details">
                            <div class="tab-content current">
                                <h5>articles</h5>
                            </div>
                        </div>

                        <div class="listing-owner-section margin-top-40">
                            <?php if (!empty($articles_info)) { ?>
                                <div class="listing-wrapper three-column row">
                                    <?php foreach ($articles_info as $v_article_info) { ?>
                                        <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                                            <div class="listing-item clearfix">
                                                <div class="figure">
                                                    <img src="<?php echo base_url('assets/uploaded_files/company_articles/resize/' . $v_article_info['image_path']); ?>" width="270" alt="<?php echo $v_article_info['article_name']; ?>"/>
                                                    <div class="listing-overlay">
                                                        <div class="listing-overlay-inner rgba-bgyallow-1">
                                                            <div class="overlay-content">
                                                                <ul class="listing-links">
                                                                    <li><a class="bgwhite nohover" href="<?php echo base_url('articles/article_details/' . $v_article_info['article_id'] . '.html'); ?>"><i class="fa fa-search green-1 "></i></a></li>
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
                                                        <h6><a href="<?php echo base_url('articles/article_details/' . $v_article_info['article_id'] . '.html'); ?>"><?php echo character_limiter($v_article_info['article_name'], 15); ?></a></h6>
                                                    </div>
                                                    <div class="listing-disc">
                                                        <p></p>
                                                    </div>
                                                    <div class="listing-location pull-left"><!-- location-->
                                                        <a href="#"><i class="fa fa-briefcase"></i> <?php echo character_limiter($v_article_info['company_name'], 24); ?></a>
                                                        <a href="#"><i class="fa fa-map-marker"></i> <?php echo $v_article_info['address'] . ", " . $v_article_info['state'] . ", " . $v_article_info['city_name'] . ", " . $v_article_info['zip']; ?></a>
                                                    </div><!-- location end-->
                                                    <div class="star-rating pull-right"><!-- rating-->
                                                        <!--<div class="score-callback" data-score="5"></div>-->
                                                    </div><!-- rating end-->
                                                </div>
                                            </div>
                                            <div class="listing-border-bottom bgyallow-1"></div>
                                        </div><!-- /.ITEM -->
                                    <?php } ?>
                                </div>
                            <?php } else { ?>
                                <div class="item col-md-12 col-sm-12 col-xs-12"><!-- .ITEM -->
                                    <h5 style="text-align: center; ">Image not found for this location !</h5>
                                </div>
                            <?php } ?>
                        </div>




                    </div>
                </div>
            </div><!-- content area end -->
        </div><!-- content area end -->

    </div>
</div><!-- section container end -->
</section>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCruIR-E1OQ9TEh5pABARsl8drCCc2PASs&callback=initMap"></script>
<script>
    function initMap() {
        var uluru = {lat: <?php echo $listing_info['lat']; ?>, lng: <?php echo $listing_info['lng']; ?>}


        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map,
            draggable: false
        });
        google.maps.event.addListener(marker, 'dragend', function () {
//            //console.log(marker.getPosition().lat());
//            //console.log(marker.getPosition().lng());
//
//            var lat = marker.getPosition().lat();
//            var lng = marker.getPosition().lng();
//            $('#lat').val(lat);
//            $('#lng').val(lng);
        });
        // var searchBox = new google.maps.places.SearchBox(document.getElementById('mapsearch'));

    }
</script>