<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row content-title">
    <div class="col-md-6 col-sm-6 col-xs-6">
        <h6 class="pull-left"> Dashboard</h6>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
        <ul class="list-inline pull-right">
            <li><a href="#"> <i class="fa fa-home"></i> Dashboard</a></li>
        </ul>
    </div>
</div>

<div class="row category-section-wrap cat-style-3 clearfix">
    <div class="col-md-4 col-sm-6 col-xs-12 main-wrap"><!-- category column -->
        <a href="" class="cat-wrap shadow-1">
            <p><i class="fa fa-dashboard bgblue-1 white"></i></p>
            <h5>Dashboard</h5>
        </a>
        <div class="listing-border-bottom bgbrown-1"></div>
    </div><!-- category column end -->
    <div class="col-md-4 col-sm-6 col-xs-12 main-wrap"><!-- category column -->
        <a href="<?php echo base_url('user/listing.html'); ?>" class="cat-wrap shadow-1">
            <p><i class="fa fa-briefcase bgbrown-1 white"></i></p>
            <h5>Listing</h5>
        </a>
        <div class="listing-border-bottom bgbrown-1"></div>
    </div><!-- category column end -->
    

    <div class="col-md-4 col-sm-6 col-xs-12 main-wrap"><!-- category column -->
        <a href="<?php echo base_url('user/keywords.html'); ?>" class="cat-wrap shadow-1">
            <p><i class="fa fa-search bggreen-2 white"></i></p>
            <h5>Keywords</h5>
        </a>
        <div class="listing-border-bottom bggreen-2"></div>
    </div><!-- category column end -->
   
</div>