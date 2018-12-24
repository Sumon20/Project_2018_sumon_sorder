<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Load city and category function in global model
$cities_info = cities_info();
$categories_info = categories_info();
?>
<style type="text/css">
    .share-container{
        background: #ffffff;
        padding: 25px 0px;
    }
    .share-container .share-title{
        width: 100%;
    }
    .share-container .share-title h5{
        letter-spacing: 2px;
        font-weight: 400;
        text-align: left;
        color: #444;
        padding: 0px 0px 25px 25px;
    }
    .share-container .share-icon ul{
        list-style: none;
        text-align: left;
        padding: 0px 30px;
    }
    .share-container .share-icon ul li{
        display: inline-block;
        padding: 0px 5px;
    }
    .share-container .share-icon ul li a .fa:hover{
        color:#cccccc;
    }

    .share-container .bookmark-heart ul{
        list-style: none;
        text-align: right;
        padding: 0px 30px;
    }
    .share-container .bookmark-heart ul li{
        display: inline-block;
        padding: 0px 5px;
    }
    .share-container .bookmark-heart ul li a .fa:hover{
        color:#cccccc;
    }
    .comments-notification{
        background: #fff; 
        padding: 25px;
    }
</style>
<!--================================PAGE TITLE==========================================-->
<div class="page-title-wrap bgorange-1 padding-top-30 padding-bottom-30"><!-- section title -->
    <h4 class="white"><?php echo $article_info['article_name']; ?></h4>
</div><!-- section title end -->

<!--================================listing SECTION==========================================-->

<section class="aside-layout-section padding-top-70 padding-bottom-40">
    <div class="container"><!-- section container -->
        <div class="row"><!-- row -->
            <div class="col-md-9 col-sm-8 col-xs-12 main-wrap"><!-- content area column -->
                <div class="blog-section padding-bottom-40">
                    <div class="entry-wrap shadow-1"><!-- blog entry -->
                        <div class="entry-figure">
                            <img src="<?php echo base_url('assets/uploaded_files/company_articles/' . $article_info['image_path']); ?>" width="100%" alt="blog entry">
                        </div>
                        <div class="entry-content">
                            <div class="entry-title">
                                <h4><?php echo $article_info['article_name']; ?></h4>
                            </div>
                            <div class="entry-metas">
                                <ul>
                                    <li><i class="fa fa-user green-1"></i>Posted by: <a><?php echo $article_info['company_name']; ?></a></li>
                                    <li><i class="fa fa-clock-o blue-1"></i> <a><?php echo date("d F Y - h:ia", strtotime($article_info['date_added'])); ?></a></li>
                                    <li><i class="fa fa-comment yallow-1"></i><a><?php echo $total_comments; ?> &nbsp; Comments</a></li>
                                    <li><i class="fa fa-heart red-1"></i><a><?php echo $total_hearts; ?> &nbsp; People loves it</a></li>
                                    <li><i class="fa fa-eye blue-4"></i><a><?php echo $article_info['total_views']; ?> &nbsp; Total views</a></li>
                                </ul>
                            </div>
                            <div class="entry-disc">
                                <p></p>
                            </div>
                        </div>
                    </div><!-- blog entry end -->

                    <div class="share-container margin-bottom-30 shadow-1">
                        <div class="share-title">
                            <h5 class="green-1">social share</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="share-icon">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook-square fa-3x blue-3"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter-square fa-3x blue-1"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus-square fa-3x orange-1"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="bookmark-heart">
                                    <ul>
                                        <?php
                                        if (!empty($this->session->userdata('user_id'))) {
                                            if ($check_heart == 0) {
                                                echo "<li><a href='" . base_url('articles/give_heart/' . $article_info['article_id'] . ".html") . "'><i class = 'fa fa-heart fa-3x red-1'></i> </a></li>";
                                            }
                                            if ($check_bookmark == 0) {
                                                echo " <li><a href='" . base_url('user/bookmarks/make_bookmark/' . $article_info['listing_id'] . ".html") . "'><i class = 'fa fa-bookmark fa-3x green-2'></i></a></li>";
                                            }
                                        } else {
                                            echo "<li><a href='#' class='login' data-toggle='modal' data-target='#login'><i class='fa fa-heart fa-3x red-1'></i></a></li>";
                                            echo "<li><a href='#' class='login' data-toggle='modal' data-target='#login'><i class='fa fa-bookmark fa-3x green-2'></i></a></li>";
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Owner information-->
                    <div class="listing-owner-section shadow-1">
                        <div class="listing-owner-section-title">
                            <h5 class="green-1">owner information</h5>
                        </div>
                        <div class="listing-owner-wrapper clearfix">
                            <div class="listing-owner-figure pull-left">
                                <?php
                                $company_logo = '';
                                if (!empty($article_info['company_logo'])) {
                                    $company_logo = "assets/uploaded_files/company_logo/resize/" . $article_info['company_logo'];
                                } else {
                                    $company_logo = "assets/uploaded_files/company_logo/logo_not_available.png";
                                }
                                ?>
                                <img src="<?php echo base_url($company_logo); ?>" width="100%" class="img-responsive" alt="<?php echo $article_info['company_name']; ?>">

                            </div>
                            <div class="listing-owner-content pull-right">
                                <a class="user" href="#"><i class="fa fa-briefcase bgblue-1 white"></i><?php echo $article_info['company_name']; ?></a>
                                <a class="contact-number"><i class="fa fa-phone bgblue-1 white"></i><?php echo $article_info['mobile']; ?></a>
                                <a class="owner-adress"><i class="fa fa-map-marker bgblue-1 white"></i><?php echo $article_info['address'] . ", " . $article_info['state'] . ", " . $article_info['city_name'] . ", " . $article_info['zip']; ?></a>
                                <a class="view-profile white bgblue-1" href="<?php echo base_url('listing/listing_details/' . $article_info['listing_id']); ?>">view profile</a>
                            </div>
                        </div>
                    </div>

                    <!--Comment Section-->
                    <div class="comments-wrap margin-top-20">
                        <div class="comments-main-title">
                            <h5 class="tx-left green-1"><?php echo $total_comments; ?> comments</h5>
                        </div>
                        <div class="comments">
                            <ul>
                                <?php foreach ($comments_info as $v_comment_info) { ?>
                                    <li>
                                        <div class="comment-box shadow-1">
                                            <div class="row clearfix">
                                                <div class="col-md-2 col-sm-3 col-xs-12 comment-figure">
                                                    <?php
                                                    $profile_picture = '';
                                                    if (!empty($v_comment_info['avatar'])) {
                                                        $profile_picture = base_url() . "assets/uploaded_files/profile_img/resize/" . $v_comment_info['avatar'];
                                                    } else {
                                                        $profile_picture = base_url() . "assets/uploaded_files/profile_img/resize/user4-128x128.jpg";
                                                    }
                                                    ?>
                                                    <img src="<?php echo $profile_picture; ?>" alt="<?php echo $profile_picture; ?>">
                                                </div>
                                                <div class="col-md-10 col-sm-9 col-xs-12 comment-content tx-left">
                                                    <div class="comment-content">
                                                        <div class="comment-author-name">
                                                            <h5 class="tx-left"><?php echo $v_comment_info['first_name'] . " " . $v_comment_info['last_name']; ?></h5>
                                                            <p class="tx-left"><?php echo date("d F Y - h:ia", strtotime($v_comment_info['date_added'])); ?></p>
                                                        </div>
                                                        <div class=" comment-disc">
                                                            <p class="tx-left"><?php echo $v_comment_info['comment']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php if (!empty($this->session->userdata('user_id'))) { ?>
                            <div class="comments-main-title padding-top-30">
                                <h5 class="tx-left green-1">Leave a comment</h5>
                            </div>
                            <?php
                            $success = $this->session->userdata('success');
                            $exception = $this->session->userdata('exception');
                            if (!empty($success)) {
                                echo "<div class='comments-notification margin-top-30'>
                                        <div class='notification'>
                                            <span class='success-message'>" . $success . "</span>
                                        </div>
                                    </div>";
                                $this->session->unset_userdata('success');
                            } else if (!empty($exception)) {
                                echo "<div class='comments-notification margin-top-30'>
                                        <div class='notification'>
                                            <span class='success-message'>" . $exception . "</span>
                                        </div>
                                    </div>";
                                $this->session->unset_userdata('exception');
                            }
                            ?>
                            <div class="contact-form-wrap margin-top-30"><!--.contact-form-wrap -->
                                <form class="row contact-form" action="<?php echo base_url('articles/submit_comment/' . $article_info['article_id'] . '.html'); ?>" method="post"><!-- .row .contact-form -->
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!-- form-field -->
                                        <textarea class="input-field" placeholder="MESSAGE" name="comment"></textarea>
                                    </div><!-- form-field  end-->
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!-- form-field -->
                                        <label for="confirm_security_code">
                                            <?php
                                            $this->load->helper('string');
                                            echo $number_one = random_string('nozero', 1);
                                            echo ' + ';
                                            echo $number_two = random_string('numeric', 1);
                                            echo ' = ';
                                            ?>
                                        </label>
                                        <input type="hidden" name="security_code" value="<?php echo $number_one + $number_two; ?>">
                                        <input class="input-field margin-top-10" id="confirm_security_code" name="confirm_security_code" type="number" placeholder="ANSWER">
                                    </div><!-- form-field  end-->
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-right"><!-- form-btn -->
                                        <input class="contact-btn" type="submit" value="SUBMIT MESSAGE">
                                    </div><!-- form-btn  end-->
                                </form><!-- .row .contact-form end -->

                            </div><!--.contact-form-wrap end -->
                        <?php } else { ?>
                            <div class="comments-main-title padding-top-30">
                                <h5 class="tx-left green-1">Login for comment</h5>
                            </div>
                            <div class="contact-form-wrap margin-top-30"><!--.contact-form-wrap -->
                                <form class="row contact-form" action="<?php echo base_url('user/login/check_user_login/' . $article_info['article_id'] . '/articles.html'); ?>" method="post"><!-- .row .contact-form -->
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!-- form-field -->
                                        <input class="input-field" type="text" placeholder="USERNAME OR EMAIL" name="username_or_email_address">
                                    </div><!-- form-field  end-->
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!-- form-field -->
                                        <input class="input-field" type="password" placeholder="PASSWORD" name="password">
                                    </div><!-- form-field  end-->
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-right"><!-- form-btn -->
                                        <input class="contact-btn" type="submit" value="LOGIN">
                                    </div><!-- form-btn  end-->
                                </form><!-- .row .contact-form end -->
                                <div class="bottom-links">
                                    <p>not a member?<a href="<?php echo base_url('user/packages.html'); ?>">create account</a></p>
                                </div>
                            </div><!--.contact-form-wrap end -->
                        <?php } ?>
                    </div>
                </div>
            </div><!-- content area end -->
            <div class="col-md-3 col-sm-4 col-xs-12"><!-- sidebar column -->
                <div class="sidebar sidebar-wrap">
                    <div class="sidebar-widget shadow-1">
                        <div class="sidebar-widget-title">
                            <h5><span class="bgorange-1"></span>category list</h5>
                        </div>
                        <div class="sidebar-widget-content category-widget clearfix">
                            <div class="sidebar-category-widget-wrap">
                                <ul>
                                    <?php
                                    foreach ($categories_info as $v_category_info) {
                                        echo "<li><a href='" . base_url('articles/category_articles/' . $v_category_info['category_id'] . '.html') . "'><i class='fa fa-".$v_category_info['icon_name']." ".$v_category_info['color_name']." white'></i>" . $v_category_info['category_name'] . "</a></li>";
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
                                        echo "<li><a class='nohover' href='" . base_url('articles/location_articles/' . $v_city_info['city_id'] . '.html') . "'><i class='fa fa-map-marker blue-1'></i>" . $v_city_info['city_name'] . "</a></li>";
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



<!-- Modal login form -->
<div class = "modal fade" id = "login" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
    <div class = "listing-modal-1 modal-dialog">
        <div class = "modal-content">
            <div class = "modal-header">
                <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                <h4 class = "modal-title" id = "myModalLabel"> LOGIN</h4>
            </div>
            <div class = "modal-body">
                <div class=" listing-login-form">
                    <form action="<?php echo base_url('user/login/check_user_login/' . $article_info['article_id'] . '/articles.html'); ?>" method="post">
                        <div class="listing-form-field">
                            <i class="fa fa-user blue-1"></i>
                            <input class="form-field bgwhite" type="text" name="username_or_email_address" placeholder="enter username or email" />
                        </div>
                        <div class="listing-form-field">
                            <i class="fa fa-lock blue-1"></i>
                            <input class="form-field bgwhite" type="password" name="password" placeholder="enter password"  />
                        </div>
                        <div class="listing-form-field clearfix margin-top-20 margin-bottom-20">
                            <input type="checkbox" id="checkbox-1-1" class="regular-checkbox" /><label for="checkbox-1-1"></label>
                            <label class="checkbox-lable">Remember me</label>
                            <a href="<?php echo base_url(); ?>">forgot password?</a>
                        </div>
                        <div class="listing-form-field">
                            <input class="form-field submit bgblue-1" type="submit"  value="login" />
                        </div>
                    </form>
                    <div class="bottom-links">
                        <p>not a member?<a href="<?php echo base_url('user/packages.html'); ?>">create account</a></p>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->