<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Setting
        <small>Privacy policy & terms conditions setting</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard.html'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-cogs"></i> Setting</a></li>
        <li class="active"><i class="fa fa-circle-o"></i> Privacy policy setting</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Privacy Policy</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>

        <!-- form start -->
        <form role="form" action="<?php echo base_url('admin/settings/update_privacy_policy/' . $settings_info['setting_id'] . '.html'); ?>" method="post">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="editor1"> Terms & Conditions</label>
                            <textarea id="editor1" name="terms_conditions" rows="10" cols="80" style="visibility: hidden; display: none;"><?php echo $settings_info['terms_conditions']; ?></textarea>
                        <span class="help-block error-message"><?php echo form_error('terms_conditions'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="editor2"> Privacy & Policy</label>
                            <textarea id="editor2" name="privacy_policy" rows="10" cols="80" style="visibility: hidden; display: none;"><?php echo $settings_info['privacy_policy']; ?></textarea>
                            <!--<textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">This is my textarea to be replaced with CKEditor.</textarea>-->
                        <span class="help-block error-message"><?php echo form_error('privacy_policy'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="<?php echo base_url('privacy_policy.html'); ?>" class="btn btn-danger" data-toggle="tooltip" title="Go back"><i class="fa fa-remove"></i> Cancel</a>
                <button type="submit" class="btn btn-success">Update Info</button>
            </div>
        </form>
        <!-- /.form -->
    </div>
</section>