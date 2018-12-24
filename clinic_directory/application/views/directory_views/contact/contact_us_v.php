<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$settings_info = settings_info();
?>
<style type="text/css">
    .error_message p{
        color: #cc0000;
        text-align: left;
        padding-bottom: 5px
    }
</style>
<!--================================PAGE TITLE==========================================-->
<div class="page-title-wrap bgorange-1 padding-top-30 padding-bottom-30"><!-- section title -->
    <h4 class="white">contact us</h4>
</div><!-- section title end -->
<!--================================MAP SECTION==========================================-->

<!--<section id="google-map">
    <div class="container-fluid">
        <div id="map"></div>
    </div> container-fluid end 
</section>-->

<!--================================CONTACT===========================================-->
<section id="contact-form" class="margin-top-70 margin-bottom-40">
    <div class="container">
        <div class="row info-box-wrap clearfix">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><!-- infobox -->
                <div class="info-box bgwhite shadow-1 clearfix">
                    <div class="info-icon">
                        <i class="fa fa-phone bgblue-1 white"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-title">

                            <h6>Contact numbers</h6>
                        </div>
                        <div class="info-disc">
                            <p><?php echo $settings_info['mobile_number']; ?> <br><?php echo $settings_info['phone_number']; ?></p>
                        </div>
                    </div>
                </div>
            </div><!-- infobox end -->
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><!-- infobox -->
                <div class="info-box bgwhite shadow-1 clearfix">
                    <div class="info-icon">
                        <i class="fa fa-envelope bggreen-1 white"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-title">

                            <h6>email Address</h6>
                        </div>
                        <div class="info-disc">
                            <p><?php echo $settings_info['email_address']; ?> <br> <?php echo $settings_info['web']; ?></p>
                        </div>
                    </div>
                </div>
            </div><!-- infobox end -->
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><!-- infobox -->
                <div class="info-box bgwhite shadow-1 clearfix">
                    <div class="info-icon">
                        <i class="fa fa-map-marker bgyallow-1 white"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-title">

                            <h6>Address</h6>
                        </div>
                        <div class="info-disc">
                            <p><?php echo $settings_info['address']; ?> <br> <?php echo $settings_info['state'] . " , " . $settings_info['city'] . " , " . $settings_info['postal_code']; ?></p>
                        </div>
                    </div>
                </div>
            </div><!-- infobox end -->
        </div><!-- .row .info-box-wrap end -->

        <div class="contact-form-wrap margin-top-30"><!--.contact-form-wrap -->
            <form action="<?php echo base_url('contact/send.html'); ?>" method="post">
                <div id="contact_form" class="row contact-form"><!-- .row .contact-form -->

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!-- form-field -->
                        <h5 style="padding: 0px 0px 10px 10px; text-align: left; font-weight: normal; color: green;">
                            <?php
                            $success = $this->session->userdata('success');
                            $exception = $this->session->userdata('exception');
                            if (!empty($success)) {
                                echo $success;
                                $this->session->unset_userdata('success');
                            } else if (!empty($exception)) {
                                echo $exception;
                                $this->session->unset_userdata('exception');
                            }
                            ?>
                        </h5>
                    </div><!-- form-field  end-->

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!-- form-field -->
                        <span class="error_message"><?php echo form_error('full_name'); ?></span>
                        <input class="input-field" type="text" value="<?php echo set_value('full_name'); ?>" placeholder="FULL NAME" name="full_name" required="required">
                    </div><!-- form-field  end-->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!-- form-field -->
                        <span class="error_message"><?php echo form_error('email_address'); ?></span>
                        <input class="input-field" type="email" value="<?php echo set_value('email_address'); ?>" placeholder="EMAIL ADDRESS" name="email_address" required="required">
                    </div><!-- form-field  end-->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!-- form-field -->
                        <span class="error_message"><?php echo form_error('subject'); ?></span>
                        <input class="input-field" type="text" value="<?php echo set_value('subject'); ?>" placeholder="SUBJECT" name="subject" required="required">
                    </div><!-- form-field  end-->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!-- form-field -->
                        <span class="error_message"><?php echo form_error('message'); ?></span>
                        <textarea class="input-field" placeholder="MESSAGE" name="message" required="required"><?php echo set_value('message'); ?></textarea>
                    </div><!-- form-field  end-->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!-- form-field -->
                        <h5 style="padding: 0px 0px 10px 10px; text-align: left; font-weight: normal">
                            <span>
                                <?php
                                $this->load->helper('string');
                                echo $number_one = random_string('nozero', 1);
                                echo ' + ';
                                echo $number_two = random_string('numeric', 1);
                                echo ' = ';
                                ?>
                            </span>
                        </h5>
                    </div><!-- form-field  end-->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!-- form-field -->
                        <span class="error_message"><?php echo form_error('confirm_security_code'); ?></span>
                        <input type="hidden" name="security_code" value="<?php echo $number_one + $number_two; ?>">
                        <input type="number" name="confirm_security_code" class="input-field" placeholder="ANSWER" required="required">
                    </div><!-- form-field  end-->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!-- form-btn -->
                        <input class="contact-btn bgblue-1" type="submit" value="SUBMIT MESSAGE" id="submit_btn">
                    </div><!-- form-btn  end-->
                </div><!-- .row .contact-form end -->
            </form>
        </div><!--.contact-form-wrap end -->
    </div><!-- container end -->
</section>