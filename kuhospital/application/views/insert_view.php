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
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/insert.css" />
    </head>

    
    <body id="page-top">
        <!-- Loader icon -->
        <div class="se-pre-con"></div> 

        <!-- Header section-->
        <?php @$this->load->view('website/includes/header') ?>



<div id="container">
   <?php echo form_open('insert_ctrl'); ?>
<h1>Doctor Sign Up</h1><hr/>
<?php if (isset($message)) { ?>
<CENTER><h3 style="color:green;">Docotr registered successfully</h3></CENTER><br>
<?php } ?>



<?php echo form_label('First Name :'); ?> <?php echo form_error('firstname'); ?><br />
<?php echo form_input(array('id' => 'firstname', 'name' => 'firstname')); ?><br />

<?php echo form_label('Last Name :'); ?> <?php echo form_error('lastname'); ?><br />
<?php echo form_input(array('id' => 'lastname', 'name' => 'lastname')); ?><br />

<?php echo form_label('Email :'); ?> <?php echo form_error('email'); ?><br />
<?php echo form_input(array('id' => 'email', 'name' => 'email')); ?><br />

<?php echo form_label('Password :'); ?> <?php echo form_error('password'); ?><br />
<?php echo form_input(array('id' => 'password', 'name' => 'password')); ?><br />

<?php echo form_label('Mobile No. :'); ?> <?php echo form_error('mobile'); ?><br />
<?php echo form_input(array('id' => 'mobile', 'name' => 'mobile', 'placeholder' => '10 Digit Mobile No.')); ?><br />

<?php echo form_label('Address :'); ?> <?php echo form_error('address'); ?><br />
<?php echo form_input(array('id' => 'address', 'name' => 'address')); ?><br />








<?php echo form_submit(array('id' => 'submit', 'value' => 'Submit')); ?>

<?php echo form_close(); ?><br/>
<div id="fugo">

</div>
</div>

        
       

      


        



        
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