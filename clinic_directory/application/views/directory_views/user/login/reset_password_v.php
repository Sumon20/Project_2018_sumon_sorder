<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!--================================LOGIN SECTION==========================================-->
<section class="aside-layout-section padding-top-100 padding-bottom-100">
    <div class="container"><!-- section container -->
        <div class="row"><!-- row -->
            <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">

                <div class="page-title-wrap bgblue-1 padding-top-30 padding-bottom-30"><!-- section title -->
                    <h4 class="white">Reset Password</h4>
                </div><!-- section title end -->

                <hr>
                <div class="notification">
                    <?php
                    $success = $this->session->userdata('success');
                    $exception = $this->session->userdata('exception');
                    if (!empty($success)) {
                        echo "<span class='success-message'>" . $success . "</span>";
                        $this->session->unset_userdata('success');
                    } else if (!empty($exception)) {
                        echo "<span class='error-message'>" . $exception . "</span>";
                        $this->session->unset_userdata('exception');
                    } else {
                        echo "<span class='notification-message'>Create your new password !</span>";
                    }
                    ?>
                </div>
                <hr>

                <div class="listing-login-form">
                    <form action="<?php echo base_url('user/login/create_new_password/' . $user_id . '.html'); ?>" method="post">
                        <div class="listing-form-field">
                            <i class="fa fa-user blue-1"></i>
                            <input class="form-field bgwhite" type="password" name="password" placeholder="new password">
                        </div>
                        <div class="listing-form-field">
                            <i class="fa fa-user blue-1"></i>
                            <input class="form-field bgwhite" type="password" name="confirm_password" placeholder="confirm password">
                        </div>
                        <div class="listing-form-field">
                            <input class="form-field submit bgblue-1" type="submit" value="reset">
                        </div>
                    </form>
                    <div class="bottom-links">
                        <p><a href="<?php echo base_url('user/login.html'); ?>">login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- section container end -->
</section>