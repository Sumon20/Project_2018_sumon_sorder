<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Employees
        <small>Edit Employee</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard.html'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url('employees.html'); ?>"><i class="fa fa-cogs"></i> Employees</a></li>
        <li class="active"><i class="fa fa-circle-o"></i> Edit Employee</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Employee</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>

        <!-- form start -->
        <form role="form" name="employee_edit_form" action="<?php echo base_url('admin/peoples/update_employee/' . $employee_info['user_id'] . '.html'); ?>" method="post" enctype="multipart/form-data">
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
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" value="<?php echo $employee_info['first_name']; ?>" class="form-control" id="first_name" placeholder="Enter first name">
                            <span class="help-block error-message"><?php echo form_error('first_name'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" value="<?php echo $employee_info['last_name']; ?>" class="form-control" id="last_name" placeholder="Enter last name">
                            <span class="help-block error-message"><?php echo form_error('last_name'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Employee Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-employee"></i></span>
                                <input type="text" name="username" value="<?php echo $employee_info['username']; ?>" class="form-control" id="username" placeholder="Enter username">
                            </div>
                            <span class="help-block error-message"><?php echo form_error('username'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email_address">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><strong>@</strong></span>
                                <input type="text" name="email_address" value="<?php echo $employee_info['email_address']; ?>" class="form-control" id="email_address" placeholder="Enter email address">
                            </div>
                            <span class="help-block error-message"><?php echo form_error('email_address'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile_number">Mobile Number</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="text" name="mobile_number" value="<?php echo $employee_info['mobile_number']; ?>" class="form-control" id="mobile_number" placeholder="Enter mobile number">
                            </div>
                            <span class="help-block error-message"><?php echo form_error('mobile_number'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-control" id="gender">
                                <option value="" selected="" disabled="">Select one</option>
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                            </select>
                            <span class="help-block error-message"><?php echo form_error('gender'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="access_label">Access</label>
                            <select name="access_label" class="form-control" id="access_label">
                                <option value="" selected="" disabled="">Select one</option>
                                <option value="2">Admin</option>
                                <option value="5">User</option>
                            </select>
                            <span class="help-block error-message"><?php echo form_error('access_label'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="activation_status">Activation Status</label>
                            <select name="activation_status" class="form-control" id="activation_status">
                                <option value="" selected="" disabled="">Select one</option>
                                <option value="1">Active</option>
                                <option value="0">Deactivate</option>
                            </select>
                            <span class="help-block error-message"><?php echo form_error('activation_status'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="picture_name">Picture</label>
                            <input type="file" id="picture_name" name="picture_name">
                            <p class="help-block" style="color: #f39c12;"><b>Note:</b> Only .jpg .png .jpeg .gif allowed. <br>(width image will better view such as <b>320x480</b> pixel)</p>
                            <span class="help-block error-message"><?php echo form_error('picture_name'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="hidden" name="current_image" value="<?php echo $employee_info['avatar']; ?>">
                            <?php
                            $avatar = $employee_info['avatar'];
                            if (!empty($avatar)) {
                                $profile_picture = base_url('assets/uploaded_files/profile_img/resize/' . $avatar);
                            } else {
                                $profile_picture = base_url('assets/backend/dist/img/user4-128x128.jpg');
                            }
                            ?>
                            <img src="<?php echo $profile_picture; ?>" alt="" width="120" class="img-responsive img-bordered img-rounded">
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="<?php echo base_url('employees.html'); ?>" class="btn btn-danger" data-toggle="tooltip" title="Go back"><i class="fa fa-remove"></i> Cancel</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Update Info</button>
            </div>
        </form>
        <!-- /.form -->
    </div>
</section>
<script type="text/javascript">
    document.forms['employee_edit_form'].elements['activation_status'].value = '<?php echo $employee_info['activation_status']; ?>';
    document.forms['employee_edit_form'].elements['access_label'].value = '<?php echo $employee_info['access_label']; ?>';
    document.forms['employee_edit_form'].elements['gender'].value = '<?php echo $employee_info['gender']; ?>';
</script>