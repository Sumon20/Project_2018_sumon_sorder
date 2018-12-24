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
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-sm-6 col-md-8">
                                        <dl class="dl-horizontal">
                                            <dt>Doctor</dt> <dd><?php echo "$appointment->firstname $appointment->lastname"?></dd>
                                            <dt>Department</dt> <dd><?php echo $appointment->department ?></dd>
                                            <dt>Degree</dt> <dd><?php echo $appointment->degree ?></dd>
                                            <dt>Available</dt> <dd><?php echo $appointment->available_days ?></dd>
                                            <dt>Schedule Time </dt> <dd><?php echo "$appointment->start_time - $appointment->end_time" ?></dd>
                                        </dl>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <dl class="dl-horizontal">
                                            <dt>Serial No</dt> <dd>#<?php echo ($appointment->serial_no<=9)?"0$appointment->serial_no":$appointment->serial_no ?></dd>
                                            <dt>Date</dt> <dd><?php echo $appointment->date ?></dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-body">  
                                <div class="row">
                                    <div class="col-sm-12" align="center">  
                                        <h1>Appointment information</h1>
                                    <br>
                                    </div>

                                    <div class="col-sm-3" align="center"> 
                                        <img alt="Picture" src="<?php echo (!empty($appointment->picture)?base_url($appointment->picture):base_url("assets/images/no-img.png")) ?>" class="img-thumbnail img-responsive">
                                        <h3><?php echo "$appointment->pfirstname $appointment->plastname " ?></h3>
                                    </div>

                                    <div class="col-sm-9"> 
                                        <dl class="dl-horizontal">
                                            <dt>Appointment ID</dt><dd><?php echo $appointment->appointment_id ?></dd>
                                            <dt>Full Name</dt><dd><?php echo "$appointment->pfirstname $appointment->plastname " ?></dd>
                                            <dt>Patient ID</dt><dd><?php echo $appointment->patient_id ?></dd> 
                                            <dt>Date of Birth</dt><dd><?php echo date('d M Y',strtotime($appointment->date_of_birth)) ?></dd> 
                                            <dt>Age</dt>
                                                <dd>
                                                    <?php echo date_diff(date_create($appointment->date_of_birth), date_create('now'))->y; ?> Years
                                                    <?php echo date_diff(date_create($appointment->date_of_birth), date_create('now'))->m; ?> Month
                                                </dd> 
                                            <dt>Sex</dt><dd><?php echo $appointment->sex ?></dd> 
                                            <dt>Mobile No</dt><dd><?php echo $appointment->mobile ?></dd> 
                                            <dt>Problem</dt><dd><?php echo $appointment->problem ?></dd> 
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

 