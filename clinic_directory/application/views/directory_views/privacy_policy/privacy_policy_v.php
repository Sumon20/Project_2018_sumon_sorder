<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$settings_info = settings_info();
?>
<style type="text/css">
    .info-box .info-content .info-disc p {
    text-align: left;
}
</style>
<!--================================PAGE TITLE==========================================-->
<div class="page-title-wrap bgorange-1 padding-top-30 padding-bottom-30"><!-- section title -->
    <h4 class="white">privacy and policy</h4>
</div><!-- section title end -->
<!--================================MAP SECTION==========================================-->

<!--<section id="google-map">
    <div class="container-fluid">
        <div id="map"></div>
    </div> container-fluid end 
</section>-->

<!--================================CONTACT===========================================-->
<section id="contact-form" class="margin-top-70 margin-bottom-40">
    <div class="container">
        <div class="row info-box-wrap clearfix">            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!-- infobox -->
                <div class="info-box bgwhite shadow-1 clearfix">
                    <div class="info-content">
                        <div class="info-title">
                            <h6 style="text-align: left">Privacy & Policy</h6>
                        </div>
                        <div class="info-disc">
                            <?php echo $settings_info['privacy_policy']; ?>
                        </div>
                    </div>
                </div>
            </div><!-- infobox end -->
        </div><!-- .row .info-box-wrap end -->
    </div><!-- container end -->
</section>