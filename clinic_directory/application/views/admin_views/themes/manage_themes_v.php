<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Request
        <small>Manage Themes</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard.html'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-cogs"></i> Request</a></li>
        <li><a class="active"><i class="fa fa-cogs"></i>Manage Themes</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Manage Themes</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>

        <!-- form start -->
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo base_url('assets/uploaded_files/themes/default_themes.JPG'); ?>" class="img-responsive img-bordered img-rounded" />
                    <hr>
                    <center><button class="btn btn-default">Default</button></center>
                </div>
                <div class="col-md-4">
                    <center><h3 style="padding-top: 35%">Coming Soon...</h3></center>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer"></div>
    </div>
</section>