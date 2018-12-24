<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Load city and category function in global model
$cities_info = cities_info();
$categories_info = categories_info();
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

                                
                               <a href="http://localhost/kuhospital/#appointment" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Make an appointment</a>
                                <ul>
                                
                                    <!-- <li><a href="<?php echo base_url('listing/images/' . $listing_info['listing_id'] . '.html'); ?>"><i class="fa fa-image bggreen-1 white"></i> Images <span>( <?php echo $total_images; ?> )</span></a></li>
                                    <li><a href="<?php echo base_url('listing/videos/' . $listing_info['listing_id'] . '.html'); ?>"><i class="fa fa-video-camera bgpurpal-1 white"></i> Videos <span>( <?php echo $total_videos; ?> )</span></a></li>
                                    <li><a href="<?php echo base_url('listing/products/' . $listing_info['listing_id'] . '.html'); ?>"><i class="fa fa-tags bgyallow-1 white"></i> Products <span>( <?php echo $total_products; ?> )</span></a></li>
                                    <li><a href="<?php echo base_url('listing/services/' . $listing_info['listing_id'] . '.html'); ?>"><i class="fa fa-cogs bgblue-3 white"></i> Services <span>( <?php echo $total_services; ?> )</span></a></li>
                                    <li><a href="<?php echo base_url('listing/articles/' . $listing_info['listing_id'] . '.html'); ?>"><i class="fa fa-book bgorange-1 white"></i> Articles <span>( <?php echo $total_articles; ?> )</span></a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- start recent post -->
                    <div class="sidebar-widget shadow-1">
                        <div class="sidebar-widget-title">
                            <h5><span class="bgyallow-1"></span>recent articles</h5>
                        </div>
                        <div class="sidebar-widget-content recent-post clearfix">

                            <?php foreach ($recent_articles as $v_recent_article) { ?>
                                <div class="recent-post-entry clearfix">
                                    <div class="recent-entry-figure">
                                        <img src="<?php echo base_url('assets/uploaded_files/company_articles/' . $v_recent_article['image_path']); ?>" alt="recent post"/>
                                    </div>
                                    <div class="recent-entry-content">
                                        <p class="recent-entry-title"><a href="<?php echo base_url('articles/article_details/' . $v_recent_article['article_id'] . '.html'); ?>"><?php echo $character = character_limiter($v_recent_article['article_name'], 15); ?></a></p>
                                        <p class="recent-entry-meta date"><?php echo date("d F Y h:ia", strtotime($v_recent_article['date_added'])); ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div><!-- Item end-->

                    <!-- start opening hours -->
                    <!-- <div class="sidebar-widget shadow-1">
                        <div class="sidebar-widget-title">
                            <h5><span class="bggreen-1"></span>opening hours</h5>
                        </div>
                        <div class="sidebar-widget-content opening-hours  clearfix">
                            <div class="sidebar-opening-hours-widget">
                                <div class="opening-hours-field clearfix">
                                    <span>Sunday</span>
                                    <span><?php // echo $listing_info['sunday']; ?></span>
                                </div>
                                <div class="opening-hours-field clearfix">
                                    <span>Monday</span>
                                    <span><?php //echo $listing_info['monday']; ?></span>
                                </div>
                                <div class="opening-hours-field clearfix">
                                    <span>Tuesday</span>
                                    <span><?php //echo $listing_info['tuesday']; ?></span>
                                </div>
                                <div class="opening-hours-field clearfix">
                                    <span>Wednesday</span>
                                    <span><?php //echo $listing_info['wednesday']; ?></span>
                                </div>
                                <div class="opening-hours-field clearfix">
                                    <span>Thursday</span>
                                    <span><?php //echo $listing_info['thursday']; ?></span>
                                </div>
                                <div class="opening-hours-field clearfix">
                                    <span>Friday</span>
                                    <span><?php //echo $listing_info['friday']; ?></span>
                                </div>
                                <div class="opening-hours-field clearfix">
                                    <span>Saturday</span>
                                    <span><?php //echo $listing_info['saturday']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>end item -->

                    <!-- <div class="sidebar-widget shadow-1">
                        <div class="sidebar-widget-title">
                            <h5><span class="bgblue-1"></span>ADVERTISING</h5>
                        </div>
                        <div class="sidebar-widget-content advertise  clearfix">
                            <div class="sidebar-image-ads">
                                <a href="#"><img src="<?//php echo base_url(); ?>assets/frontend/images/01.jpg" alt="custom-image"></a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="col-md-9 col-sm-8 col-xs-12 main-wrap"><!-- content area column -->
                <div class="listing-single padding-bottom-40">
                    <div class="single-listing-wrap">

                        <!-- declare a map -->
                        <div id="map" width="100%"></div>
                        <!-- end a map -->

                        <div class="listing-details padding-top-40">
                            <div class="tab-content current">
                                <h5> description</h5>
                                <p><?php echo $listing_info['about_company']; ?></p>
                            </div>
                        </div>

                        <div class="listing-contact-detail-wrap">
                            <div class="listing-contact-section-title">
                                <h5>contact</h5>
                            </div>
                            <div class="listing-contact-section-table">
                           

                                <div class="listing-contact-table-field">
                                    <ul>
                                        <li class="info">Address</li>
                                        <li class="details"><?php echo $listing_info['address']; ?></li>
                                    </ul>
                                </div>

                                <div class="listing-contact-table-field">
                                    <ul>
                                        <li class="info">Phone</li>
                                        <li class="details"><?php echo $listing_info['phone']; ?></li>
                                    </ul>
                                </div>
                                <div class="listing-contact-table-field">
                                    <ul>
                                        <li class="info">Mobile</li>
                                        <li class="details"><?php echo $listing_info['mobile']; ?></li>
                                    </ul>
                                </div>

                                

                                
                                

                                <div class="listing-contact-table-field">
                                    <ul>
                                        <li class="info">State</li>
                                        <li class="details"><?php echo $listing_info['state']; ?></li>
                                    </ul>
                                </div>
                                <div class="listing-contact-table-field">
                                    <ul>
                                        <li class="info">Zip</li>
                                        <li class="details"><?php echo $listing_info['zip']; ?></li>
                                    </ul>
                                </div>
                                <div class="listing-contact-table-field">
                                    <ul>
                                        <li class="info">Fax</li>
                                        <li class="details"><?php echo $listing_info['fax']; ?></li>
                                    </ul>
                                </div>
                                <div class="listing-contact-table-field">
                                    <ul>
                                        <li class="info">Mobile</li>
                                        <li class="details"><?php echo $listing_info['mobile']; ?></li>
                                    </ul>
                                </div>
                                <div class="listing-contact-table-field">
                                    <ul>
                                        <li class="info">Landline</li>
                                        <li class="details"><?php echo $listing_info['phone']; ?></li>
                                    </ul>
                                </div>
                                <div class="listing-contact-table-field">
                                    <ul>
                                        <li class="info">E-mail</li>
                                        <li class="details"><?php echo $listing_info['email']; ?></li>
                                    </ul>
                                </div>
                                <div class="listing-contact-table-field">
                                    <ul>
                                        <li class="info">Website</li>
                                        <li class="details"><a style="text-align: left; color: #08c2f3" href="<?php echo $listing_info['website']; ?>" target="_blank"><?php echo $listing_info['website']; ?></a></li>
                                    </ul>
                                </div>
                                <div class="listing-contact-table-field">
                                    <ul>
                                        <li class="info">Category</li>
                                        <li class="details"><?php echo $listing_info['category_name']; ?></li>
                                    </ul>
                                </div>
                                <div class="listing-contact-table-field">
                                    <ul>
                                        <li class="info">Location</li>
                                        <li class="details"><?php echo $listing_info['city_name']; ?></li>
                                    </ul>
                                </div>



                                

                                <div class="listing-contact-table-field">
                                    <ul>
                                        <li class="info">Designation</li>
                                        <li class="details"><?php echo $listing_info['designation']; ?></li>
                                    </ul>
                                </div>

                                <div class="listing-contact-table-field">
                                    <ul>
                                        <li class="info">Degree</li>
                                        <li class="details"><?php echo $listing_info['degree']; ?></li>
                                    </ul>
                                </div>

                               
                                <div class="listing-contact-table-field">
                                    <ul>
                                        <li class="info">Short Biography</li>
                                        <li class="details"><?php echo $listing_info['short_biography']; ?></li>
                                    </ul>
                                </div>
                                <div class="listing-contact-table-field">
                                    <ul>
                                        <li class="info">Specialist</li>
                                        <li class="details"><?php echo $listing_info['specialist']; ?></li>
                                    </ul>
                                </div>




                                
            

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