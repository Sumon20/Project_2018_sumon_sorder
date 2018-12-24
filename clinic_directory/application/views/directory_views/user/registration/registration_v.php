<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--================================PAGE TITLE==========================================-->
<div class="page-title-wrap bgblue-1 padding-top-30 padding-bottom-30"><!-- section title -->
    <h4 class="white">Registration</h4>
</div><!-- section title end -->
<div class="sc-page"><!--sc-page-->	

    <!--================================PRICING PLAN SECTION 2==========================================-->

    <section class="pricing-section padding-top-70 padding-bottom-40">
        <div class="container"><!-- section container -->
            <div class="row pricing-wrap style-1 clearfix">

                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><!-- .pricing -->
                    <div class="pricing shadow-1 clearfix">

                        <div class="price-plan bggreen-2">
                            <p class="currency white">$</p>
                            <p class="price white"><?php echo $package_info['price']; ?></p>
                            <!--<p class="duration white">/ month</p>-->
                        </div>
                        <div class="price-title bggreen-4">
                            <h4 class="white"><?php echo $package_info['package_name']; ?></h4>
                        </div>
                        <div class="pricing-content">
                            <ul>
                                <li>Highlighted listing</li>
                                <li>Top listing placement on:
                                    <p class="margin-top-10"><i class="fa fa-circle"></i> Search results</p>
                                    <p><i class="fa fa-circle"></i> Selected categories</p>
                                    <p><i class="fa fa-circle"></i> Added keywords</p>
                                </li>
                                <li><?php echo $package_info['listing']; ?> &nbsp; &nbsp; &nbsp; Listing</li>
                                <li><?php echo $package_info['images']; ?> &nbsp; &nbsp; &nbsp; Images</li>
                                <li><?php echo $package_info['videos']; ?> &nbsp; &nbsp; &nbsp; Videos</li>
                                <li><?php echo $package_info['products']; ?> &nbsp; &nbsp; &nbsp; Products</li>
                                <li><?php echo $package_info['services']; ?> &nbsp; &nbsp; &nbsp; Services</li>
                                <li><?php echo $package_info['articles']; ?> &nbsp; &nbsp; &nbsp; Articles</li>
                                <li><?php echo $package_info['keywords']; ?> &nbsp; &nbsp; &nbsp; Keywords</li>
                            </ul>
                        </div>
                    </div>
                </div><!-- pricing end -->

                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8"><!-- .pricing -->
                    <div class="pricing shadow-1 clearfix">
                        <div class="price-title bggreen-2 margin-bottom-15">
                            <h4 class="white">Business Account Registration</h4>
                        </div>
                        <div class="pricing-content">
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
                                    echo "<span class='notification-message'>Please fill out the fields below to create your account. We will send your account information to the email address you enter. Your email address and information will NOT be sold or shared with any 3rd party. <a style='text-align:left;' href='". base_url('user/login.html')."'>Already have an account.</a></span>";
                                }
                                ?>
                            </div>
                            <form class="custom-form" action="<?php echo base_url('user/registration/create_account.html'); ?>" method="post">
                                <hr>
                                <h6 class="green-4">Contact Information</h6>
                                <hr>
                                <div class="form-group">
                                    <label for="first_name">First Name <span class="required-field">*</span></label>
                                    <input type="hidden" name="package_id" value="<?php echo $package_info['package_id']; ?>">
                                    <input type="text" name="first_name" value="<?php echo set_value('first_name'); ?>" class="form-control margin-top-5" id="first_name" placeholder="Enter first name">
                                    <span class="error-message"><?php echo form_error('first_name'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name <span class="required-field">*</span></label>
                                    <input type="text" name="last_name" value="<?php echo set_value('last_name'); ?>" class="form-control margin-top-5" id="last_name" placeholder="Enter last name">
                                    <span class="error-message"><?php echo form_error('last_name'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="email_address">Email Address <span class="required-field">*</span></label>
                                    <input type="text" name="email_address" value="<?php echo set_value('email_address'); ?>" class="form-control margin-top-5" id="email_address" placeholder="Enter email address">
                                    <span class="error-message"><?php echo form_error('email_address'); ?></span>
                                </div>
                                <hr>
                                <h6 class="green-4">Account Information</h6>
                                <hr>
                                <div class="form-group">
                                    <label for="username">Username <span class="required-field">*</span></label>
                                    <input type="text" name="username" value="<?php echo set_value('username'); ?>" class="form-control margin-top-5" id="username" placeholder="Enter username">
                                    <span class="error-message"><?php echo form_error('username'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password <span class="required-field">*</span></label>
                                    <input type="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control margin-top-5" id="password" placeholder="Enter password">
                                    <span class="error-message"><?php echo form_error('password'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password <span class="required-field">*</span></label>
                                    <input type="password" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>" class="form-control margin-top-5" id="confirm_password" placeholder="Enter confirm password">
                                    <span class="error-message"><?php echo form_error('confirm_password'); ?></span>
                                </div>
                                <hr>
                                <h6 class="green-4">Security Control</h6>
                                <hr>
                                <div class="form-group">
                                    <label for="confirm_security_code">
                                        <span>
                                            <?php
                                            $this->load->helper('string');
                                            echo $number_one = random_string('nozero', 1);
                                            echo ' + ';
                                            echo $number_two = random_string('numeric', 1);
                                            echo ' = ';
                                            ?>
                                        </span>
                                        <span class="required-field">*</span></label>
                                    <input type="hidden" name="security_code" value="<?php echo $number_one + $number_two; ?>">
                                    <input type="number" name="confirm_security_code" class="form-control margin-top-5" id="confirm_security_code" placeholder="Enter result">
                                    <span class="error-message"><?php echo form_error('confirm_security_code'); ?></span>
                                </div>
                                <button type="submit" class="btn bggreen-2 white">Create Account</button>
                            </form>
                        </div>
                    </div>
                </div><!-- pricing end -->
            </div><!-- pricing end -->
        </div><!-- .row pricing end -->
</div><!-- container end -->
</section>
</div><!--/sc-page-->