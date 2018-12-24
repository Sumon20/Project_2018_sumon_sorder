<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Load city and category function in global model
$cities_info = cities_info();
$categories_info = categories_info();
?>
<!--================================PAGE TITLE==========================================-->
<div class="page-title-wrap bgorange-1 padding-top-30 padding-bottom-30"><!-- section title -->
    <h4 class="white">Articles</h4>
</div><!-- section title end -->
<div class="sc-page padding-top-100 padding-bottom-20"><!--sc-page-->
    <!--================================SEARCH FORM SECTION ==========================================-->

    <section id="search-form" class="padding-top-20">
        <div class="container">
            <div class="search-form-wrap">
                <form class="clearfix" action="#">
                    <div class="input-field-wrap pull-left">
                        <input class="search-form-input" name="key-word" placeholder="enter keyword" type="text"/>
                    </div>
                    <div class="select-field-wrap pull-left">
                        <select class="search-form-select" name="location" >
                            <option class="options" value="all-locations">all locations</option>
                            <?php
                            foreach ($cities_info as $v_city_info) {
                                echo "<option class='options' value='america'>" . $v_city_info['city_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="select-field-wrap pull-left">
                        <select class="search-form-select" name="categories" >
                            <option class="options" value="all-categories">all categories</option>
                            <?php
                            foreach ($categories_info as $v_category_info) {
                                echo "<option class='options' value='america'>" . $v_category_info['category_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="submit-field-wrap pull-left">
                        <input class="search-form-submit bgorange-1 white" name="key-word" type="submit"/>
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
                                                <li class="active"><a data-toggle="tab" href="#recent-articles">Recent Articles</a></li>
                                                <li><a data-toggle="tab" href="#popular-articles">Popular Articles</a></li>
                                                <li><a data-toggle="tab" href="#all-articles">All Articles</a></li>
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
                                <div id="recent-articles" class="tab-pane active">
                                    <div class="listing-wrapper three-column row">

                                        <?php foreach ($recent_articles as $v_recent_article) { ?>
                                            <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                                                <div class="listing-item clearfix">
                                                    <div class="figure">
                                                        <img src="<?php echo base_url('assets/uploaded_files/company_articles/resize/' . $v_recent_article['image_path']); ?>" width="270" alt="<?php echo $v_recent_article['article_name']; ?>"/>
                                                        <div class="listing-overlay">
                                                            <div class="listing-overlay-inner rgba-bgorange-1">
                                                                <div class="overlay-content">
                                                                    <ul class="listing-links">
                                                                        <li><a class="bgwhite nohover" href="<?php echo base_url('articles/article_details/' . $v_recent_article['article_id'] . '.html'); ?>"><i class="fa fa-search green-1 "></i></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="listing-content clearfix">
                                                        <div class="listing-meta-cat">
                                                            <a class="bgorange-1" href="#"><i class="fa fa-book white"></i></a>
                                                        </div>
                                                        <div class="listing-title">
                                                            <h6><a href="<?php echo base_url('articles/article_details/' . $v_recent_article['article_id'] . '.html'); ?>"><?php echo character_limiter($v_recent_article['article_name'], 15); ?></a></h6>
                                                        </div>
                                                        <div class="listing-disc">
                                                            <p></p>
                                                        </div>
                                                        <div class="listing-location pull-left"><!-- location-->
                                                            <a href="#"><i class="fa fa-briefcase"></i> <?php echo character_limiter($v_recent_article['company_name'], 24); ?></a>
                                                            <a href="#"><i class="fa fa-map-marker"></i> <?php echo $v_recent_article['address'] . ", " . $v_recent_article['state'] . ", " . $v_recent_article['city_name'] . ", " . $v_recent_article['zip']; ?></a>
                                                        </div><!-- location end-->
                                                        <div class="star-rating pull-right"><!-- rating-->
                                                            <!--<div class="score-callback" data-score="5"></div>-->
                                                        </div><!-- rating end-->
                                                    </div>
                                                </div>
                                                <div class="listing-border-bottom bgorange-1"></div>
                                            </div><!-- /.ITEM -->
                                        <?php } ?>

                                    </div>
                                </div>
                                <div id="popular-articles" class="tab-pane">
                                    <div class="listing-wrapper three-column row">

                                        <?php foreach ($popular_articles as $v_popular_article) { ?>
                                            <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                                                <div class="listing-item clearfix">
                                                    <div class="figure">
                                                        <img src="<?php echo base_url('assets/uploaded_files/company_articles/resize/' . $v_popular_article['image_path']); ?>" width="270" alt="<?php echo $v_popular_article['article_name']; ?>"/>
                                                        <div class="listing-overlay">
                                                            <div class="listing-overlay-inner rgba-bgorange-1">
                                                                <div class="overlay-content">
                                                                    <ul class="listing-links">
                                                                        <li><a class="bgwhite nohover" href="<?php echo base_url('articles/article_details/' . $v_popular_article['article_id'] . '.html'); ?>"><i class="fa fa-search green-1 "></i></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="listing-content clearfix">
                                                        <div class="listing-meta-cat">
                                                            <a class="bgorange-1" href="#"><i class="fa fa-book white"></i></a>
                                                        </div>
                                                        <div class="listing-title">
                                                            <h6><a href="<?php echo base_url('articles/article_details/' . $v_popular_article['article_id'] . '.html'); ?>"><?php echo character_limiter($v_popular_article['article_name'], 15); ?></a></h6>
                                                        </div>
                                                        <div class="listing-disc">
                                                            <p></p>
                                                        </div>
                                                        <div class="listing-location pull-left"><!-- location-->
                                                            <a href="#"><i class="fa fa-briefcase"></i> <?php echo character_limiter($v_popular_article['company_name'], 24); ?></a>
                                                            <a href="#"><i class="fa fa-map-marker"></i> <?php echo $v_popular_article['address'] . ", " . $v_popular_article['state'] . ", " . $v_popular_article['city_name'] . ", " . $v_popular_article['zip']; ?></a>
                                                        </div><!-- location end-->
                                                        <div class="star-rating pull-right"><!-- rating-->
                                                            <!--<div class="score-callback" data-score="5"></div>-->
                                                        </div><!-- rating end-->
                                                    </div>
                                                </div>
                                                <div class="listing-border-bottom bgorange-1"></div>
                                            </div><!-- /.ITEM -->
                                        <?php } ?>

                                    </div>
                                </div>
                                <div id="all-articles" class="tab-pane">
                                    <div class="listing-wrapper three-column row">

                                        <div class="row" id="load_data">
                                            <?php foreach ($all_articles as $v_article) { ?>
                                                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                                                    <div class="listing-item clearfix">
                                                        <div class="figure">
                                                            <img src="<?php echo base_url('assets/uploaded_files/company_articles/resize/' . $v_article['image_path']); ?>" width="270" alt="<?php echo $v_article['article_name']; ?>"/>
                                                            <div class="listing-overlay">
                                                                <div class="listing-overlay-inner rgba-bgorange-1">
                                                                    <div class="overlay-content">
                                                                        <ul class="listing-links">
                                                                            <li><a class="bgwhite nohover" href="<?php echo base_url('articles/article_details/' . $v_article['article_id'] . '.html'); ?>"><i class="fa fa-search green-1 "></i></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="listing-content clearfix">
                                                            <div class="listing-meta-cat">
                                                                <a class="bgorange-1" href="#"><i class="fa fa-book white"></i></a>
                                                            </div>
                                                            <div class="listing-title">
                                                                <h6><a href="<?php echo base_url('articles/article_details/' . $v_article['article_id'] . '.html'); ?>"><?php echo character_limiter($v_article['article_name'], 15); ?></a></h6>
                                                            </div>
                                                            <div class="listing-disc">
                                                                <p></p>
                                                            </div>
                                                            <div class="listing-location pull-left"><!-- location-->
                                                                <a href="#"><i class="fa fa-briefcase"></i> <?php echo character_limiter($v_article['company_name'], 24); ?></a>
                                                                <a href="#"><i class="fa fa-map-marker"></i> <?php echo $v_article['address'] . ", " . $v_article['state'] . ", " . $v_article['city_name'] . ", " . $v_article['zip']; ?></a>
                                                            </div><!-- location end-->
                                                            <div class="star-rating pull-right"><!-- rating-->
                                                                <!--<div class="score-callback" data-score="5"></div>-->
                                                            </div><!-- rating end-->
                                                        </div>
                                                    </div>
                                                    <div class="listing-border-bottom bgorange-1"></div>
                                                </div><!-- /.ITEM -->
                                                <?php $article_id = $v_article['article_id']; ?>
                                            <?php } ?>
                                        </div>
                                        <div id="remove_row">
                                            <center>
                                                <button type="button" name="btn_more" data-id="<?php echo $article_id; ?>" data-cid="" data-link="articles/load_more_articles" id="btn_more" class="btn btn-sm bgorange-1">Load more...</button>
                                            </center>
                                        </div>
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