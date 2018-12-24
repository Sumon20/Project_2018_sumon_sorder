<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?= (!empty($setting->favicon)?base_url($setting->favicon):base_url('assets_web/images/icons/favicon.png')) ?>"/>
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?= (!empty($setting->title)?$setting->title:null) ?></title>

        <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="<?= base_url('assets_web/css/bootstrap.min.css') ?>" rel="stylesheet">
        <!-- Jquery Ui -->
        <link href="<?= base_url('assets_web/css/jquery-ui.min.css') ?>" rel="stylesheet" type="text/css"/>
        <!-- Font Awesome -->
        <link href="<?= base_url('assets_web/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css"/>
        <!-- Flaticon -->
        <link href="<?= base_url('assets_web/css/flaticon.css') ?>" rel="stylesheet" type="text/css"/>
        <!-- Owl Carousel -->
        <link href="<?= base_url('assets_web/owl-carousel/owl.carousel.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('assets_web/owl-carousel/owl.theme.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('assets_web/owl-carousel/owl.transitions.css') ?>" rel="stylesheet" type="text/css"/>
        <!-- Custom Style Sheet -->
        <link href="<?= base_url('assets_web/css/style.css') ?>" rel="stylesheet" type="text/css"/>
    </head>

    
    <body id="page-top">
        <!-- Loader icon -->
        <div class="se-pre-con"></div> 

        <!-- Header section-->
        <?php @$this->load->view('website/includes/header') ?>

        <section id="about">
            <div class="container"> 
                <div class="row">

                    <div class="col-sm-12" id="PrintMe">
                        <div  class="panel panel-info"> 

                            <div class="panel-body">  
                                <div class="row">
                                    <div class="col-sm-12" align="center">  
                                        <h1>Patient Information</h1>
                                    <br>
                                    </div>

                                    <div class="col-sm-3" align="center"> 
                                        <img alt="Picture" src="<?php echo (!empty($profile->picture)?base_url($profile->picture):base_url("assets/images/no-img.png")) ?>" class="img-thumbnail img-responsive">
                                        <h3><?php echo "$profile->firstname $profile->lastname " ?></h3>
                                    </div> 

                                    <div class="col-sm-9"> 
                                        <dl class="dl-horizontal">
                                            <dt>Patient ID</dt><dd><?php echo $profile->patient_id ?></dd> 
                                            <dt>Date of Birth</dt><dd><?php echo date('d M Y',strtotime($profile->date_of_birth)) ?></dd> 
                                            <dt>Age</dt><dd><?php echo date_diff(date_create($profile->date_of_birth), date_create('now'))->y; ?> Years</dd> 
                                            <dt>Blood Group</dt><dd><?php echo $profile->blood_group ?></dd> 
                                            <dt>Sex</dt><dd><?php echo $profile->sex ?></dd> 
                                            <dt>Phone No</dt><dd><?php echo $profile->phone ?></dd> 
                                            <dt>Mobile No</dt><dd><?php echo $profile->mobile ?></dd> 
                                            <dt>Address</dt><dd><?php echo $profile->address ?></dd> 
                                            <dt>Created Date</dt><dd><?php echo $profile->create_date ?></dd> 
                                        </dl> 
                                    </div>
                                </div>  

                            </div> 

                            <div class="panel-footer">
                                <div class="text-center">
                                    <strong><?= (!empty($setting->title)?$setting->title:null) ?></strong>
                                    <p class="text-center no-print"><?= (!empty($setting->copyright_text)?$setting->copyright_text:null) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                         <div class="btn-group">
                            <button type="button" onclick="printContent('PrintMe')" class="btn btn-success" >Print</button> 
                        </div>
                    </div>


                </div>
            </div>
        </section>


 
        <!-- Footer Section -->
        <?php @$this->load->view('website/includes/footer') ?>



        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?= base_url('assets_web/js/jquery.min.js" type="text/javascript') ?>"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVtjo9eO4klWhYbHwL9jObfuke4rxSWWc"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?= base_url('assets_web/js/bootstrap.min.js') ?>"></script> 
        <!-- owl carousel js -->
        <script src="<?= base_url('assets_web/owl-carousel/owl.carousel.min.js') ?>" type="text/javascript"></script>
        <!-- Plugin JavaScript -->
        <script src="<?= base_url('assets_web/js/jquery.easing.min.js') ?>" type="text/javascript"></script>
        <!-- Jquery Ui -->
        <script src="<?= base_url('assets_web/js/jquery-ui.min.js') ?>" type="text/javascript"></script>
        <!-- Custom Js -->
        <script src="<?= base_url('assets_web/js/custom.js') ?>" type="text/javascript"></script>
    </body>
</html>

 