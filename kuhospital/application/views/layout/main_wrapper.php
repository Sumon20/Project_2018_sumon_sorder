<?php defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?= ($this->session->userdata('title')!=null?$this->session->userdata('title'):"Demo"); ?> - <?php echo (!empty($title)?$title:null) ?></title>

        <link rel="shortcut icon" href="<?= base_url($this->session->userdata('favicon')) ?>">

        <!-- jquery-ui -->
        <link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap colockpicker -->
        <link href="<?php echo base_url(); ?>assets/css/jquery-ui-timepicker-addon.min.css" rel="stylesheet" type="text/css"/>
        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url(); ?>assets/css/metisMenu.css" rel="stylesheet" type="text/css"/>
        <!-- mCustomScrollbar css -->
        <link href="<?php echo base_url(); ?>assets/css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css"/>
        <!-- font-awesome -->
        <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <!-- flaticon css -->
        <link href="<?php echo base_url(); ?>assets/css/flaticon.css" rel="stylesheet" type="text/css"/>

        <!-- semantic css -->
        <link href="<?php echo base_url(); ?>assets/css/semantic.min.css" rel="stylesheet" type="text/css"/> 
        <!-- select2 css -->
        <link href="<?php echo base_url(); ?>assets/css/select2.min.css" rel="stylesheet" type="text/css"/> 


        <!-- DataTables CSS -->
        <link href="<?= base_url('assets/datatables/css/jquery.dataTables.min.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/datatables/css/responsive/dataTables.responsive.css" rel="stylesheet" type="text/css"/> 
        <link href="<?= base_url('assets/datatables/css/button/buttons.dataTables.min.css') ?>" rel="stylesheet" type="text/css"/> 

        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
        
        <!-- google fonts -->
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,700i|Open+Sans:400,600,700,800" rel="stylesheet">  

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?php echo base_url() ?>assets/js/jquery.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <?php $this->load->view('includes/navbar'); ?>

            <div id="page-wrapper">

                <div class="row">
                    <!-- page header --> 
                    <div class="col-sm-12"> 
                        <div class="page-header">
                            <?php if($this->session->userdata('user_role') == 1 && $this->uri->segment(3) == $this->session->userdata('user_id')): ?>
                            <h1>Admin <small>
                            <?php else: ?>
                                <h1><?php echo ucfirst($this->uri->segment(1)) ?> <small>
                            <?php endif; ?>
                            <?php echo (!empty($title)?$title:null) ?></small></h1>
                        </div>
                    </div>

                    <!-- alert message -->
                    <div class="col-sm-12"> 
                        <?php if ($this->session->flashdata('message') != null) {  ?>
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo $this->session->flashdata('message'); ?>
                        </div> 
                        <?php } ?>
                        
                        <?php if ($this->session->flashdata('exception') != null) {  ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo $this->session->flashdata('exception'); ?>
                        </div>
                        <?php } ?>
                        
                        <?php if (validation_errors()) {  ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo validation_errors(); ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>


                <!-- content -->
            	<?php echo (!empty($content)?$content:null) ?>
            </div> <!-- /#page-wrapper -->
        </div>
        <!-- Footer area
        ======================================================================== -->
        <footer class="ng-scope">
            <div class="container">
                <?= ($this->session->userdata('footer_text')!=null?$this->session->userdata('footer_text'):null) ?>
            </div>
        </footer>


        <!-- jQuery -->
        <script src="<?php echo base_url() ?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url() ?>assets/js/metisMenu.js" type="text/javascript"></script>
        <!-- mCustomScrollbar js -->
        <script src="<?php echo base_url() ?>assets/js/jquery.mCustomScrollbar.concat.min.js" type="text/javascript"></script>
        <!-- canvas js -->
        <script src="<?php echo base_url() ?>assets/js/canvasjs.min.js" type="text/javascript"></script> 
        <!-- semantic js -->
        <script src="<?php echo base_url() ?>assets/js/semantic.min.js" type="text/javascript"></script>
        <!-- select2 js -->
        <script src="<?php echo base_url() ?>assets/js/select2.min.js" type="text/javascript"></script>
        
        <!-- DataTables JavaScript -->
        <script src="<?php echo base_url("assets/datatables/js/button/jquery.dataTables.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/datatables/js/button/dataTables.buttons.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/datatables/js/button/buttons.flash.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/datatables/js/button/jszip.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/datatables/js/button/pdfmake.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/datatables/js/button/vfs_fonts.js") ?>"></script>
        <script src="<?php echo base_url("assets/datatables/js/button/buttons.html5.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/datatables/js/button/buttons.print.min.js") ?>"></script>
        <script src="<?php echo base_url() ?>assets/datatables/js/responsive/dataTables.responsive.js" type="text/javascript"></script>  

        <!-- tinymce texteditor -->
        <script src="<?php echo base_url() ?>assets/tinymce/tinymce.min.js" type="text/javascript"></script> 
        <!-- bootstrap timepicker -->
        <script src="<?php echo base_url() ?>assets/js/jquery-ui-sliderAccess.js" type="text/javascript"></script> 
        <script src="<?php echo base_url() ?>assets/js/jquery-ui-timepicker-addon.min.js" type="text/javascript"></script> 

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url() ?>assets/js/custom.js" type="text/javascript"></script>
    </body>

</html>
