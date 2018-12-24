<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row content-title">
    <div class="col-md-6 col-sm-6 col-xs-6">
        <h6 class="pull-left"> Manage Profile</h6>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
        <ul class="list-inline pull-right">
            <li><a href="<?php echo base_url('user/dashboard.html'); ?>"><i class="fa fa-home"></i> Dashboard</a></li> >
            <li><a class="active"> Manage Profile</a></li>
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
    <div class="col-md-12 col-sm-12 col-xs-12 padding-top-10">

        <form name="edit_profile_form" class="custom-form" action="<?php echo base_url('user/profile/update_profile_details.html'); ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="picture_name">Upload Picture <span class="required-field">*</span></label>
                        <input name="picture_name" class="margin-top-5" type="file" id="picture_name">
                        <span class="help-block"><strong>Note:</strong> Only .jpg .png .jpeg .gif allowed (maximum <strong>5MB</strong>).</span>
                        <span class="error-message"><?php echo form_error('picture_name'); ?></span>
                    </div>
                </div>
                <!-- End Col -->
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <input name="current_picture" type="hidden" value="<?php echo $user_info['avatar']; ?>">
                        <?php
                        $profile_picture = '';
                        if (!empty($user_info['avatar'])) {
                            $profile_picture = base_url() . "assets/uploaded_files/profile_img/resize/" . $user_info['avatar'];
                        } else {
                            $profile_picture = base_url() . "assets/uploaded_files/profile_img/resize/user4-128x128.jpg";
                        }
                        ?>
                        <img src="<?php echo$profile_picture; ?>" width="128" class="img-responsive pull-right" alt="<?php echo $profile_picture; ?>">
                    </div>
                </div>
                <!-- End Col -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group custom-group">
                        <label for="first_name">First Name <span class="required-field">*</span></label>
                        <input type="text" name="first_name" value="<?php echo $user_info['first_name']; ?>" class="form-control margin-top-5" id="first_name" placeholder="Enter first name">
                        <span class="error-message"><?php echo form_error('first_name'); ?></span>
                    </div>
                </div>
                <!-- End Col -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group custom-group">
                        <label for="last_name">Last Name <span class="required-field">*</span></label>
                        <input type="text" name="last_name" value="<?php echo $user_info['last_name']; ?>" class="form-control margin-top-5" id="last_name" placeholder="Enter last name">
                        <span class="error-message"><?php echo form_error('last_name'); ?></span>
                    </div>
                </div>
                <!-- End Col -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group custom-group">
                        <label for="email_address">Email Address <span class="required-field">*</span></label>
                        <input type="text" value="<?php echo $user_info['email_address']; ?>" class="form-control margin-top-5" disabled>
                    </div>
                </div>
                <!-- End Col -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group custom-group">
                        <label for="username">Username <span class="required-field">*</span></label>
                        <input type="text" value="<?php echo $user_info['username']; ?>" class="form-control margin-top-5" disabled>
                    </div>
                </div>
                <!-- End Col -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group custom-group">
                        <label for="mobile_number">Mobile Number <span class="required-field">*</span></label>
                        <input type="text" name="mobile_number" value="<?php echo $user_info['mobile_number']; ?>" class="form-control margin-top-5" id="mobile_number" placeholder="Enter mobile number">
                        <span class="error-message"><?php echo form_error('mobile_number'); ?></span>
                    </div>
                </div>
                <!-- End Col -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="gender">Gender <span class="required-field">*</span></label>
                        <select name="gender" class="form-control margin-top-5" id="gender">
                            <option value="" selected="" disabled="">Select one</option>
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                        </select>
                        <span class="error-message"><?php echo form_error('gender'); ?></span>
                    </div>
                </div>
                <!-- End Col -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <hr>
                    <a href="<?php echo base_url('user/profile.html'); ?>" class="btn btn-danger btn-custom"><i class="fa fa-remove"></i> Cancel</a>
                    <button type="submit" class="btn btn-success btn-custom"><i class="fa fa-plus"></i> Update Info</button>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </form>

    </div>
</div>
<!-- End Add Container -->

<script type="text/javascript">
    document.forms['edit_profile_form'].elements['gender'].value = '<?php echo $user_info['gender']; ?>';
</script>