<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row content-title">
    <div class="col-md-6 col-sm-6 col-xs-6">
        <h6 class="pull-left"> Manage Images</h6>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
        <ul class="list-inline pull-right">
            <li><a href="<?php echo base_url('user/dashboard.html'); ?>"><i class="fa fa-home black"></i> Dashboard</a></li> >
            <li><a class="active"> Manage Images</a></li>
        </ul>
    </div>
</div>

<div class="listing-section">
    <div class=""><!-- section container -->
        <div class="add-listing-wrapper">
            <div class="add-listing-nav shadow-1">
                <div class="row clearfix">
                    <div class="col-md-9 col-sm-9 col-xs-9 pull-left">
                        <a href="<?php echo base_url('user/images/add_image.html'); ?>" class="btn bggreen-1 add-btn"><i class="fa fa-plus"></i> Add Image</a>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3 pull-right">
                        <div class="view-switcher">
                            <ul>
                                <li class="gridview"><i class="fa fa-th"></i></li>
                                <li class="listview active"><i class="fa fa-th-list"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $success = $this->session->userdata('success');
            $exception = $this->session->userdata('exception');
            if (!empty($success)) {
                echo "<div class='add-listing-nav shadow-1 margin-top-20'>
                        <div class='row clearfix'>
                            <div class='col-md-12 col-sm-12 col-xs-12'>
                                <div class='notification'>
                                <span class='success-message'>" . $success . "</span>
                                </div>
                            </div>
                        </div>
                    </div>";
                $this->session->unset_userdata('success');
            } else if (!empty($exception)) {
                echo "<div class='add-listing-nav shadow-1 margin-top-20'>
                        <div class='row clearfix'>
                            <div class='col-md-12 col-sm-12 col-xs-12'>
                                <div class='notification'>
                                <span class='error-message'>" . $exception . "</span>
                                </div>
                            </div>
                        </div>
                    </div>";
                $this->session->unset_userdata('exception');
            }
            ?>

            <div class="listing-main gridview tab-content padding-top-30">
                <div id="latest-listing" class="tab-pane active">
                    <div class="listing-wrapper three-column row">

                        <?php foreach ($images_info as $v_image_info) { ?>
                            <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                                <div class="listing-item clearfix">
                                    <div class="figure">
                                        <img src="<?php echo base_url('assets/uploaded_files/company_img/resize/' . $v_image_info['image_path']); ?>" width="270" alt="listing item"/>
                                        <div class="listing-overlay">
                                            <div class="listing-overlay-inner rgba-bggreen-1">
                                                <div class="overlay-content">
                                                    <ul class="listing-links">
                                                        <li><a class="bgwhite nohover" href="<?php echo base_url('images/image_details/' . $v_image_info['image_id'] . '.html'); ?>"><i class="fa fa-search green-1 "></i></a></li>
                                                        <li><a class="bgwhite nohover" href="<?php echo base_url('user/images/edit_image/' . $v_image_info['image_id'] . '.html'); ?>"><i class="fa fa-edit green-1 "></i></a></li>
                                                        <li><a class="bgwhite nohover" href="<?php echo base_url('user/images/remove_image/' . $v_image_info['image_id'] . '.html'); ?>"><i class="fa fa-trash blue-1"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="listing-content clearfix">
                                        <div class="listing-meta-cat">
                                            <a class="bggreen-1"><i class="fa fa-image white"></i></a>
                                        </div>
                                        <div class="listing-title">
                                            <h6><a href="<?php echo base_url('images/image_details/' . $v_image_info['image_id'] . '.html'); ?>"><?php echo character_limiter($v_image_info['caption'], 15); ?></a></h6>
                                        </div>
                                        <div class="listing-disc">
                                            <p></p>
                                        </div>
                                        <div class="listing-location pull-left"><!-- location-->
                                            <a><i class="fa fa-briefcase"></i> <?php echo character_limiter($v_image_info['company_name'], 24); ?></a>
                                        </div><!-- location end-->
                                        <!--<div class="star-rating pull-right"> rating
                                            <div class="score-callback" data-score="5"></div>
                                        </div>-->
                                        <!-- rating end-->
                                    </div>
                                </div>
                                <div class="listing-border-bottom bggreen-1"></div>
                            </div><!-- /.ITEM -->
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- section container end -->
</div>          