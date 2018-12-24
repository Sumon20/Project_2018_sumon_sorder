<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--================================PAGE TITLE==========================================-->
<div class="page-title-wrap bgblue-1 padding-top-30 padding-bottom-30"><!-- section title -->
    <h4 class="white">Our Pricing</h4>
</div><!-- section title end -->
<div class="sc-page"><!--sc-page-->	

    <!--================================PRICING PLAN SECTION 2==========================================-->

    <section class="pricing-section padding-top-70 padding-bottom-40">
        <div class="container"><!-- section container -->
            <div class="row pricing-wrap style-2 clearfix">

                <?php foreach ($packages_info as $v_package_info) { ?>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><!-- .pricing -->
                        <div class="pricing shadow-1 clearfix">

                            <div class="price-plan bggreen-2">
                                <p class="currency white">$</p>
                                <p class="price white"><?php echo $v_package_info['price']; ?></p>
                                <!--<p class="duration white">/ month</p>-->
                            </div>
                            <div class="price-title bggreen-4">
                                <h4 class="white"><?php echo $v_package_info['package_name']; ?></h4>
                            </div>
                            <div class="pricing-content">
                                <ul>
                                    <li>Highlighted listing</li>
                                    <li>Top listing placement on:
                                        <p class="margin-top-10"><i class="fa fa-circle"></i> Search results</p>
                                        <p><i class="fa fa-circle"></i> Selected categories</p>
                                        <p><i class="fa fa-circle"></i> Added keywords</p>
                                    </li>
                                    <li><?php echo $v_package_info['listing']; ?> &nbsp; &nbsp; &nbsp; Listing</li>
                                    <li><?php echo $v_package_info['images']; ?> &nbsp; &nbsp; &nbsp; Images</li>
                                    <li><?php echo $v_package_info['videos']; ?> &nbsp; &nbsp; &nbsp; Videos</li>
                                    <li><?php echo $v_package_info['products']; ?> &nbsp; &nbsp; &nbsp; Products</li>
                                    <li><?php echo $v_package_info['services']; ?> &nbsp; &nbsp; &nbsp; Services</li>
                                    <li><?php echo $v_package_info['articles']; ?> &nbsp; &nbsp; &nbsp; Articles</li>
                                    <li><?php echo $v_package_info['keywords']; ?> &nbsp; &nbsp; &nbsp; Keywords</li>
                                </ul>
                                <div class="btn-1 margin-top-30">
                                    <a class="white bggreen-2" href="<?php echo base_url('user/registration/index/' . $v_package_info['package_id'] . '.html'); ?>">Create Listing</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- pricing end -->
                <?php } ?>

            </div><!-- .row pricing end -->
        </div><!-- container end -->
    </section>
</div><!--/sc-page-->