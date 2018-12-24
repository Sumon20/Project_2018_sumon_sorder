<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Setting
        <small>System setting</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard.html'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-cogs"></i> Setting</a></li>
        <li class="active"><i class="fa fa-circle-o"></i> System setting</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">System Setting</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>

        <!-- form start -->
        <form role="form" name="system_setting_form" action="<?php echo base_url('admin/settings/update_system_setting/' . $settings_info['setting_id'] . '.html'); ?>" method="post">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="site_name">Site Name</label>
                            <input type="text" name="site_name" value="<?php echo $settings_info['site_name']; ?>" class="form-control" id="site_name" placeholder="Enter site name">
                            <span class="help-block error-message"><?php echo form_error('site_name'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email_address">Email address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" name="email_address" value="<?php echo $settings_info['email_address']; ?>" class="form-control" placeholder="Enter email address">
                            </div>
                            <span class="help-block error-message"><?php echo form_error('email_address'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="paypal_id">PayPal Email</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" name="paypal_id" value="<?php echo $settings_info['paypal_id']; ?>" class="form-control" placeholder="Enter paypal email address">
                            </div>
                            <span class="help-block error-message"><?php echo form_error('paypal_id'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="web">Web</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                <input type="url" name="web" value="<?php echo $settings_info['web']; ?>" class="form-control" placeholder="Enter web url">
                            </div>
                            <span class="help-block error-message"><?php echo form_error('web'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="language">Language</label>
                            <select name="language" class="form-control" id="language">
                                <option value="" selected disabled>Select one</option>
                                <option value="en">English</option>
                            </select>
                            <span class="help-block error-message"><?php echo form_error('language'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="time_zone">Time Zone</label>
                            <select name="time_zone" class="form-control" id="time_zone">
                                <option value="" selected disabled>Select one</option>
                                <option value="-12" >(GMT -12:00) Eniwetok, Kwajalein</option>
                                <option value="-11" >(GMT -11:00) Midway Island, Samoa</option>
                                <option value="-10" >(GMT -10:00) Hawaii</option>
                                <option value="-9"  >(GMT -9:00) Alaska</option>
                                <option value="-8"  >(GMT -8:00) Pacific Time (US &amp; Canada)</option>
                                <option value="-7"  >(GMT -7:00) Mountain Time (US &amp; Canada)</option>
                                <option value="-6"  >(GMT -6:00) Central Time (US &amp; Canada), Mexico City</option>
                                <option value="-5"  >(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima</option>
                                <option value="-4.5">(GMT -4:30) Caracas</option>
                                <option value="-4"  >(GMT -4:00) Atlantic Time (Canada), La Paz, Santiago</option>
                                <option value="-3.5">(GMT -3:30) Newfoundland</option>
                                <option value="-3"  >(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
                                <option value="-2"  >(GMT -2:00) Mid-Atlantic</option>
                                <option value="-1"  >(GMT -1:00 hour) Azores, Cape Verde Islands</option>
                                <option value="0"   >(GMT) Western Europe Time, London, Lisbon, Casablanca, Greenwich</option>
                                <option value="1"   >(GMT +1:00 hour) Brussels, Copenhagen, Madrid, Paris</option>
                                <option value="2"   >(GMT +2:00) Kaliningrad, South Africa, Cairo</option>
                                <option value="3"   >(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
                                <option value="3.5" >(GMT +3:30) Tehran</option>
                                <option value="4"   >(GMT +4:00) Abu Dhabi, Muscat, Yerevan, Baku, Tbilisi</option>
                                <option value="4.5" >(GMT +4:30) Kabul</option>
                                <option value="5"   >(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
                                <option value="5.5" >(GMT +5:30) Mumbai, Kolkata, Chennai, New Delhi</option>
                                <option value="5.75">(GMT +5:45) Kathmandu</option>
                                <option value="6"   >(GMT +6:00) Almaty, Dhaka, Colombo</option>
                                <option value="6.5" >(GMT +6:30) Yangon, Cocos Islands</option>
                                <option value="7"   >(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
                                <option value="8"   >(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
                                <option value="9"   >(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
                                <option value="9.5" >(GMT +9:30) Adelaide, Darwin</option>
                                <option value="10"  >(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
                                <option value="11"  >(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
                                <option value="12"  >(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
                            </select>
                            <span class="help-block error-message"><?php echo form_error('time_zone'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="time_format">Time Format</label>
                            <select name="time_format" class="form-control" id="time_format">
                                <option value="" selected disabled>Select one</option>
                                <option value="12">12</option>
                                <option value="24">24</option>
                            </select>
                            <span class="help-block error-message"><?php echo form_error('time_format'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="date_format">Date Format</label>
                            <select name="date_format" class="form-control" id="date_format">
                                <option value="" selected disabled>Select one</option>
                                <option value="mm/dd/yyyy">mm/dd/yyyy</option>
                                <option value="mm-dd-yyyy">mm-dd-yyyy</option>
                                <option value="mm.dd.yyyy">mm.dd.yyyy</option>
                                <option value="dd/mm/yyyy">dd/mm/yyyy</option>
                                <option value="dd-mm-yyyy">dd-mm-yyyy</option>
                                <option value="dd.mm.yyyy">dd.mm.yyyy</option>
                            </select>
                            <span class="help-block error-message"><?php echo form_error('date_format'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" value="<?php echo $settings_info['address']; ?>" class="form-control" id="address" placeholder="Enter address">
                            <span class="help-block error-message"><?php echo form_error('address'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" name="state" value="<?php echo $settings_info['state']; ?>" class="form-control" id="state" placeholder="Enter state">
                            <span class="help-block error-message"><?php echo form_error('state'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="city" value="<?php echo $settings_info['city']; ?>" class="form-control" id="city" placeholder="Enter city">
                            <span class="help-block error-message"><?php echo form_error('city'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="postal_code">Postal Code</label>
                            <input type="text" name="postal_code" value="<?php echo $settings_info['postal_code']; ?>" class="form-control" id="postal_code" placeholder="Enter postal code">
                            <span class="help-block error-message"><?php echo form_error('postal_code'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fax">Fax</label>
                            <input type="text" name="fax" value="<?php echo $settings_info['fax']; ?>" class="form-control" id="fax" placeholder="Enter fax">
                            <span class="help-block error-message"><?php echo form_error('fax'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="mobile_number">Mobile Number</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                <input type="text" name="mobile_number" value="<?php echo $settings_info['mobile_number']; ?>" class="form-control" placeholder="Enter mobile number">
                            </div>
                            <span class="help-block error-message"><?php echo form_error('mobile_number'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="text" name="phone_number" value="<?php echo $settings_info['phone_number']; ?>" class="form-control" placeholder="Enter phone number">
                            </div>
                            <span class="help-block error-message"><?php echo form_error('phone_number'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                <input type="url" name="facebook" value="<?php echo $settings_info['facebook']; ?>" class="form-control" placeholder="Enter facebook url">
                            </div>
                            <span class="help-block error-message"><?php echo form_error('facebook'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="twitter">Twitter </label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                                <input type="url" name="twitter" value="<?php echo $settings_info['twitter']; ?>" class="form-control" placeholder="Enter twitter url">
                            </div>
                            <span class="help-block error-message"><?php echo form_error('twitter'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="google_plus">Google+ </label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-google"></i></span>
                                <input type="url" name="google_plus" value="<?php echo $settings_info['google_plus']; ?>" class="form-control" placeholder="Enter google+ url">
                            </div>
                            <span class="help-block error-message"><?php echo form_error('google_plus'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="youtube">Youtube</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-youtube"></i></span>
                                <input type="url" name="youtube" value="<?php echo $settings_info['youtube']; ?>" class="form-control" placeholder="Enter youtube chanel url">
                            </div>
                            <span class="help-block error-message"><?php echo form_error('youtube'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="<?php echo base_url('system_settings.html'); ?>" class="btn btn-danger" data-toggle="tooltip" title="Go back"><i class="fa fa-remove"></i> Cancel</a>
                <button type="submit" class="btn btn-success">Update Info</button>
            </div>
        </form>
        <!-- /.form -->
    </div>
</section>
<script type="text/javascript">
    document.forms['system_setting_form'].elements['language'].value = '<?php echo $settings_info['language']; ?>';
    document.forms['system_setting_form'].elements['time_zone'].value = '<?php echo $settings_info['time_zone']; ?>';
    document.forms['system_setting_form'].elements['time_format'].value = '<?php echo $settings_info['time_format']; ?>';
    document.forms['system_setting_form'].elements['date_format'].value = '<?php echo $settings_info['date_format']; ?>';
</script>