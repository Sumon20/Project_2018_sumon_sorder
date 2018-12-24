<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row content-title">
    <div class="col-md-6 col-sm-6 col-xs-6">
        <h6 class="pull-left"> Change Password</h6>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
        <ul class="list-inline pull-right">
            <li><a href="<?php echo base_url('user/dashboard.html'); ?>"><i class="fa fa-home"></i> Dashboard</a></li> >
            <li><a class="active"> Change Password</a></li>
        </ul>
    </div>
</div>

<?php
$success = $this->session->userdata('success');
$exception = $this->session->userdata('exception');
if (!empty($success)) {
    echo "<div class='row content-title'>
            <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='notification'>
                    <span class='success-message'>" . $success . "</span>
                </div>
            </div>
        </div>";
    $this->session->unset_userdata('success');
} else if (!empty($exception)) {
    echo "<div class='row content-title'>
            <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='notification'>
                    <span class='error-message'>" . $exception . "</span>
                </div>
            </div>
        </div>";
    $this->session->unset_userdata('exception');
}
?>

<!-- Star Add Container -->
<div class="row manage-container">
    <div class="col-md-12 col-sm-12 col-xs-12">
            <form name="add_profile_form" class="custom-form" action="<?php echo base_url('user/profile/update_password.html'); ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="current_password">Current Password <span class="required-field">*</span></label>
                            <input type="password" name="current_password" value="<?php echo set_value('current_password'); ?>" class="form-control margin-top-5" id="current_password" placeholder="Enter current password">
                            <span class="error-message"><?php echo form_error('current_password'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="password">New Password <span class="required-field">*</span></label>
                            <input type="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control margin-top-5" id="password" placeholder="Enter new password">
                            <span class="error-message"><?php echo form_error('password'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password <span class="required-field">*</span></label>
                            <input type="password" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>" class="form-control margin-top-5" id="confirm_password" placeholder="Enter confirm password">
                            <span class="error-message"><?php echo form_error('confirm_password'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                        <a href="<?php echo base_url('user/profile.html'); ?>" class="btn btn-danger btn-custom"><i class="fa fa-remove"></i> Cancel</a>
                        <button type="submit" class="btn btn-success btn-custom"><i class="fa fa-plus"></i> Update Password</button>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </form>
    </div>
</div>
<!-- End Add Container -->

<script type="text/javascript">
    document.forms['add_profile_form'].elements['listing_id'].value = '<?php echo set_value('listing_id'); ?>';
</script>