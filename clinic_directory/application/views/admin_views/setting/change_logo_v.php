<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Setting
        <small>Change logo and favicon</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard.html'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-cogs"></i> Setting</a></li>
        <li class="active"><i class="fa fa-circle-o"></i> Change logo</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Change Logo</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>

                <!-- form start -->
                <form name="edit_setting_form" action="<?php echo base_url('admin/settings/update_site_logo/' . $settings_info['setting_id'] . '.html'); ?>" method="post" enctype="multipart/form-data">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <?php
                            $img_error = $this->session->userdata('error');
                            if (!empty($img_error)) {
                                echo "<div class='col-md-12'>
                            <div class='alert alert-warning alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                <h4><i class='icon fa fa-warning'></i> Warning !</h4>
                                " . $img_error . "
                            </div>
                        </div>";
                                $this->session->unset_userdata('error');
                            }
                            ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="logo_name">Logo</label>
                                    <input class="input-file uniform_on" name="logo" id="logo" type="file">
                                    <!--<input type="file" id="logo" name="logo">-->
                                    <p class="help-block" style="color: #f39c12;"><b>Note:</b> Only .jpg .png .jpeg .gif allowed. <br>(width image will better view such as <b>320x480</b> pixel)</p>
                                    <span class="help-block error-message"><?php echo form_error('logo_name'); ?></span>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" name="current_logo" value="<?php echo $settings_info['site_logo']; ?>">
                                    <?php
                                    $logo = $settings_info['site_logo'];
                                    if (!empty($logo)) {
                                        $site_logo = base_url('assets/logo/thumb/' . $logo);
                                    } else {
                                        $site_logo = base_url('assets/backend/dist/img/user4-128x128.jpg');
                                    }
                                    ?>
                                    <img src="<?php echo $site_logo; ?>" alt="" class="img-responsive" width="180">
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="<?php echo base_url('change_logo.html'); ?>" class="btn btn-danger" data-toggle="tooltip" title="Go back"><i class="fa fa-remove"></i> Cancel</a>
                        <button type="submit" class="btn btn-success">Update Logo</button>
                    </div>
                </form>
                <!-- /.form -->
            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Change Favicon</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>

                <!-- form start -->
                <form name="edit_setting_form" action="<?php echo base_url('admin/settings/update_site_favicon/' . $settings_info['setting_id'] . '.html'); ?>" method="post" enctype="multipart/form-data">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <?php
                            $img_error = $this->session->userdata('error');
                            if (!empty($img_error)) {
                                echo "<div class='col-md-12'>
                            <div class='alert alert-warning alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                <h4><i class='icon fa fa-warning'></i> Warning !</h4>
                                " . $img_error . "
                            </div>
                        </div>";
                                $this->session->unset_userdata('error');
                            }
                            ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="favicon_name">Favicon</label>
                                    <input class="input-file uniform_on" name="favicon" id="favicon" type="file">
                                    <!--<input type="file" id="favicon" name="favicon">-->
                                    <p class="help-block" style="color: #f39c12;"><b>Note:</b> Only .jpg .png .jpeg .gif allowed. <br>(width image will better view such as <b>320x480</b> pixel)</p>
                                    <span class="help-block error-message"><?php echo form_error('favicon_name'); ?></span>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" name="current_favicon" value="<?php echo $settings_info['site_favicon']; ?>">
                                    <?php
                                    $favicon = $settings_info['site_favicon'];
                                    if (!empty($favicon)) {
                                        $site_favicon = base_url('assets/favicon/thumb/' . $favicon);
                                    } else {
                                        $site_favicon = base_url('assets/backend/dist/img/user4-128x128.jpg');
                                    }
                                    ?>
                                    <img src="<?php echo $site_favicon; ?>" alt="" class="img-responsive" width="32">
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="<?php echo base_url('change_logo.html'); ?>" class="btn btn-danger" data-toggle="tooltip" title="Go back"><i class="fa fa-remove"></i> Cancel</a>
                        <button type="submit" class="btn btn-success">Update Logo</button>
                    </div>
                </form>
                <!-- /.form -->
            </div>
        </div>
    </div>
</section>