<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        User Profile
        <small>Manage your profile</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard.html'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">User profile</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-success">
                <div class="box-body box-profile">
                    <?php
                    $avatar = $this->session->userdata('admin_avatar');
                    if (!empty($avatar)) {
                        $profile_picture = base_url('assets/uploaded_files/profile_img/resize/' . $avatar);
                    } else {
                        $profile_picture = base_url('assets/backend/dist/img/user4-128x128.jpg');
                    }
                    ?>
                    <img class="profile-user-img img-responsive img-circle" src="<?php echo $profile_picture; ?>" alt="User profile picture">
                    <h3 class="profile-username text-center"><?php echo $user_info['first_name'] . " " . $user_info['last_name'] ?></h3>

                    <p class="text-muted text-center"><?php echo $user_info['work']; ?></p>

                    <!--<ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Followers</b> <a class="pull-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                            <b>Following</b> <a class="pull-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>Friends</b> <a class="pull-right">13,287</a>
                        </li>
                    </ul>

                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->

                </div>
                <!--/.box-body -->
            </div>
            <!--/.box -->

            <!--About Me Box -->
            <div class = "box box-success">
                <div class = "box-header with-border">
                    <h3 class = "box-title">About Me</h3>
                </div>
                <!--/.box-header -->
                <div class = "box-body">
                    <strong><i class = "fa fa-file-text-o margin-r-5"></i> Intro</strong>

                    <p><?php echo $user_info['intro'];
                    ?></p>

                    <hr>

                    <strong><i class="fa fa-briefcase margin-r-5"></i> Work</strong>

                    <p class="text-muted">
                        <?php echo $user_info['work']; ?>
                    </p>
                    
                    <hr>

                    <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                    <p class="text-muted">
                        <?php echo $user_info['education']; ?>
                    </p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                    <p class="text-muted"><?php echo $user_info['address']; ?></p>

                    <hr>

                    <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                    <p>
                        <?php foreach ($skills_info as $v_skill_info) { ?>
                            <span class="label label-info"><?php echo $v_skill_info['skill_name']; ?></span>
                        <?php } ?>
                    </p>
                    <hr>

                    <ul class="social-icon-list">
                        <?php
                        if (!empty($user_info['facebook'])) {
                            echo "<li><a target='_blank' href='" . $user_info['facebook'] . "'><i class='fa fa-facebook'></i></a></li>";
                        }
                        if (!empty($user_info['linkedin'])) {
                            echo "<li><a target='_blank' href='" . $user_info['linkedin'] . "'><i class='fa fa-linkedin'></i></a></li>";
                        }
                        if (!empty($user_info['twitter'])) {
                            echo "<li><a target='_blank' href='" . $user_info['twitter'] . "'><i class='fa fa-twitter'></i></a></li>";
                        }
                        if (!empty($user_info['google_plus'])) {
                            echo "<li><a target='_blank' href='" . $user_info['google_plus'] . "'><i class='fa fa-google-plus'></i></a></li>";
                        }
                        if (!empty($user_info['youtube'])) {
                            echo "<li><a target='_blank' href='" . $user_info['youtube'] . "'><i class='fa fa-youtube'></i></a></li>";
                        }
                        if (!empty($user_info['github'])) {
                            echo "<li><a target='_blank' href='" . $user_info['github'] . "'><i class='fa fa-github'></i></a></li>";
                        }
                        ?>
                    </ul>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
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
            </div>
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#basic_info" data-toggle="tab">Basic Info</a></li>
                    <li><a href="#contact_info" data-toggle="tab">Contact Info</a></li>
                    <li><a href="#social_link" data-toggle="tab">Social Link</a></li>
                    <li><a href="#change_password" data-toggle="tab">Change Password</a></li>
                    <li><a href="#profile_picture" data-toggle="tab">Profile Picture</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="basic_info">
                        <form class="form-horizontal" name="basic_info_form" action="<?php echo base_url('admin/profile/update_basic_info.html'); ?>" method="post">
                            <div class="form-group">
                                <label for="first_name" class="col-sm-2 control-label">First Name</label>

                                <div class="col-sm-10">
                                    <input type="text" name="first_name" value="<?php echo $user_info['first_name']; ?>" class="form-control" id="first_name" placeholder="Enter first name">
                                    <span class="help-block error-message"><?php echo form_error('first_name'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="last_name" class="col-sm-2 control-label">Last Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="last_name" value="<?php echo $user_info['last_name']; ?>" class="form-control" id="last_name" placeholder="Enter last name">
                                    <span class="help-block error-message"><?php echo form_error('last_name'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">Username</label>

                                <div class="col-sm-10">
                                    <input type="text" value="<?php echo $user_info['username']; ?>" class="form-control" id="username" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email_address" class="col-sm-2 control-label">Email</label>

                                <div class="col-sm-10">
                                    <input type="email" value="<?php echo $user_info['email_address']; ?>" class="form-control" id="email_address" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="education" class="col-sm-2 control-label">Education</label>

                                <div class="col-sm-10">
                                    <input type="text" name="education" value="<?php echo $user_info['education']; ?>" class="form-control" id="education" placeholder="Enter education">
                                    <span class="help-block error-message"><?php echo form_error('education'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="work" class="col-sm-2 control-label">Work</label>

                                <div class="col-sm-10">
                                    <input type="text" name="work" value="<?php echo $user_info['work']; ?>" class="form-control" id="work" placeholder="Enter work">
                                    <span class="help-block error-message"><?php echo form_error('work'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="company" class="col-sm-2 control-label">Company</label>

                                <div class="col-sm-10">
                                    <input type="text" name="company" value="<?php echo $user_info['company']; ?>" class="form-control" id="company" placeholder="Enter company">
                                    <span class="help-block error-message"><?php echo form_error('company'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date_of_birth" class="col-sm-2 control-label">Birthday</label>

                                <div class="col-sm-10">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="date_of_birth" value="<?php echo $user_info['date_of_birth']; ?>" class="form-control pull-right" id="datepicker">
                                    </div>
                                    <span class="help-block error-message"><?php echo form_error('date_of_birth'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gender" class="col-sm-2 control-label">Gender</label>

                                <div class="col-sm-10">
                                    <select name="gender" class="form-control" id="">
                                        <option value="<?php echo $user_info['zip_code']; ?>" selected disabled>Select one</option>
                                        <option value="m">Male</option>
                                        <option value="f">Female</option>
                                    </select>
                                    <span class="help-block error-message"><?php echo form_error('gender'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="intro" class="col-sm-2 control-label">Intro</label>

                                <div class="col-sm-10">
                                    <textarea name="intro" class="form-control" id="intro" placeholder="Enter intro"><?php echo $user_info['intro']; ?></textarea>
                                    <span class="help-block error-message"><?php echo form_error('intro'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="about" class="col-sm-2 control-label">About Me</label>

                                <div class="col-sm-10">
                                    <textarea name="about" class="form-control" id="about" rows="3" placeholder="Enter about yourself"><?php echo $user_info['about']; ?></textarea>
                                    <span class="help-block error-message"><?php echo form_error('about'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Update Info</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="contact_info">
                        <form class="form-horizontal" name="contact_info_form" action="<?php echo base_url('admin/profile/update_contact_info.html'); ?>" method="post">
                            <div class="form-group">
                                <label for="mobile_number" class="col-sm-2 control-label">Mobile Number</label>

                                <div class="col-sm-10">
                                    <input type="text" name="mobile_number" value="<?php echo $user_info['mobile_number']; ?>" class="form-control" id="mobile_number" placeholder="Enter mobile number">
                                    <span class="help-block error-message"><?php echo form_error('mobile_number'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-sm-2 control-label">Address</label>

                                <div class="col-sm-10">
                                    <input type="text" name="address" value="<?php echo $user_info['address']; ?>" class="form-control" id="address" placeholder="Enter address">
                                    <span class="help-block error-message"><?php echo form_error('address'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="state" class="col-sm-2 control-label">State</label>

                                <div class="col-sm-10">
                                    <input type="text" name="state" value="<?php echo $user_info['state']; ?>" class="form-control" id="state" placeholder="Enter state">
                                    <span class="help-block error-message"><?php echo form_error('state'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city" class="col-sm-2 control-label">City</label>

                                <div class="col-sm-10">
                                    <input type="text" name="city" value="<?php echo $user_info['city']; ?>" class="form-control" id="city" placeholder="Enter city">
                                    <span class="help-block error-message"><?php echo form_error('city'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="zip_code" class="col-sm-2 control-label">Zip Code</label>

                                <div class="col-sm-10">
                                    <input type="text" name="zip_code" value="<?php echo $user_info['zip_code']; ?>" class="form-control" id="city" placeholder="Enter zip code">
                                    <span class="help-block error-message"><?php echo form_error('zip_code'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country" class="col-sm-2 control-label">Country</label>

                                <div class="col-sm-10">
                                    <select name="country" class="form-control" id="country">
                                        <option value="" selected disabled>Select one</option>
										<option value="AFG">Afghanistan</option>
										<option value="ALA">Åland Islands</option>
										<option value="ALB">Albania</option>
										<option value="DZA">Algeria</option>
										<option value="ASM">American Samoa</option>
										<option value="AND">Andorra</option>
										<option value="AGO">Angola</option>
										<option value="AIA">Anguilla</option>
										<option value="ATA">Antarctica</option>
										<option value="ATG">Antigua and Barbuda</option>
										<option value="ARG">Argentina</option>
										<option value="ARM">Armenia</option>
										<option value="ABW">Aruba</option>
										<option value="AUS">Australia</option>
										<option value="AUT">Austria</option>
										<option value="AZE">Azerbaijan</option>
										<option value="BHS">Bahamas</option>
										<option value="BHR">Bahrain</option>
										<option value="BGD">Bangladesh</option>
										<option value="BRB">Barbados</option>
										<option value="BLR">Belarus</option>
										<option value="BEL">Belgium</option>
										<option value="BLZ">Belize</option>
										<option value="BEN">Benin</option>
										<option value="BMU">Bermuda</option>
										<option value="BTN">Bhutan</option>
										<option value="BOL">Bolivia, Plurinational State of</option>
										<option value="BES">Bonaire, Sint Eustatius and Saba</option>
										<option value="BIH">Bosnia and Herzegovina</option>
										<option value="BWA">Botswana</option>
										<option value="BVT">Bouvet Island</option>
										<option value="BRA">Brazil</option>
										<option value="IOT">British Indian Ocean Territory</option>
										<option value="BRN">Brunei Darussalam</option>
										<option value="BGR">Bulgaria</option>
										<option value="BFA">Burkina Faso</option>
										<option value="BDI">Burundi</option>
										<option value="KHM">Cambodia</option>
										<option value="CMR">Cameroon</option>
										<option value="CAN">Canada</option>
										<option value="CPV">Cape Verde</option>
										<option value="CYM">Cayman Islands</option>
										<option value="CAF">Central African Republic</option>
										<option value="TCD">Chad</option>
										<option value="CHL">Chile</option>
										<option value="CHN">China</option>
										<option value="CXR">Christmas Island</option>
										<option value="CCK">Cocos (Keeling) Islands</option>
										<option value="COL">Colombia</option>
										<option value="COM">Comoros</option>
										<option value="COG">Congo</option>
										<option value="COD">Congo, the Democratic Republic of the</option>
										<option value="COK">Cook Islands</option>
										<option value="CRI">Costa Rica</option>
										<option value="CIV">Côte d'Ivoire</option>
										<option value="HRV">Croatia</option>
										<option value="CUB">Cuba</option>
										<option value="CUW">Curaçao</option>
										<option value="CYP">Cyprus</option>
										<option value="CZE">Czech Republic</option>
										<option value="DNK">Denmark</option>
										<option value="DJI">Djibouti</option>
										<option value="DMA">Dominica</option>
										<option value="DOM">Dominican Republic</option>
										<option value="ECU">Ecuador</option>
										<option value="EGY">Egypt</option>
										<option value="SLV">El Salvador</option>
										<option value="GNQ">Equatorial Guinea</option>
										<option value="ERI">Eritrea</option>
										<option value="EST">Estonia</option>
										<option value="ETH">Ethiopia</option>
										<option value="FLK">Falkland Islands (Malvinas)</option>
										<option value="FRO">Faroe Islands</option>
										<option value="FJI">Fiji</option>
										<option value="FIN">Finland</option>
										<option value="FRA">France</option>
										<option value="GUF">French Guiana</option>
										<option value="PYF">French Polynesia</option>
										<option value="ATF">French Southern Territories</option>
										<option value="GAB">Gabon</option>
										<option value="GMB">Gambia</option>
										<option value="GEO">Georgia</option>
										<option value="DEU">Germany</option>
										<option value="GHA">Ghana</option>
										<option value="GIB">Gibraltar</option>
										<option value="GRC">Greece</option>
										<option value="GRL">Greenland</option>
										<option value="GRD">Grenada</option>
										<option value="GLP">Guadeloupe</option>
										<option value="GUM">Guam</option>
										<option value="GTM">Guatemala</option>
										<option value="GGY">Guernsey</option>
										<option value="GIN">Guinea</option>
										<option value="GNB">Guinea-Bissau</option>
										<option value="GUY">Guyana</option>
										<option value="HTI">Haiti</option>
										<option value="HMD">Heard Island and McDonald Islands</option>
										<option value="VAT">Holy See (Vatican City State)</option>
										<option value="HND">Honduras</option>
										<option value="HKG">Hong Kong</option>
										<option value="HUN">Hungary</option>
										<option value="ISL">Iceland</option>
										<option value="IND">India</option>
										<option value="IDN">Indonesia</option>
										<option value="IRN">Iran, Islamic Republic of</option>
										<option value="IRQ">Iraq</option>
										<option value="IRL">Ireland</option>
										<option value="IMN">Isle of Man</option>
										<option value="ISR">Israel</option>
										<option value="ITA">Italy</option>
										<option value="JAM">Jamaica</option>
										<option value="JPN">Japan</option>
										<option value="JEY">Jersey</option>
										<option value="JOR">Jordan</option>
										<option value="KAZ">Kazakhstan</option>
										<option value="KEN">Kenya</option>
										<option value="KIR">Kiribati</option>
										<option value="PRK">Korea, Democratic People's Republic of</option>
										<option value="KOR">Korea, Republic of</option>
										<option value="KWT">Kuwait</option>
										<option value="KGZ">Kyrgyzstan</option>
										<option value="LAO">Lao People's Democratic Republic</option>
										<option value="LVA">Latvia</option>
										<option value="LBN">Lebanon</option>
										<option value="LSO">Lesotho</option>
										<option value="LBR">Liberia</option>
										<option value="LBY">Libya</option>
										<option value="LIE">Liechtenstein</option>
										<option value="LTU">Lithuania</option>
										<option value="LUX">Luxembourg</option>
										<option value="MAC">Macao</option>
										<option value="MKD">Macedonia, the former Yugoslav Republic of</option>
										<option value="MDG">Madagascar</option>
										<option value="MWI">Malawi</option>
										<option value="MYS">Malaysia</option>
										<option value="MDV">Maldives</option>
										<option value="MLI">Mali</option>
										<option value="MLT">Malta</option>
										<option value="MHL">Marshall Islands</option>
										<option value="MTQ">Martinique</option>
										<option value="MRT">Mauritania</option>
										<option value="MUS">Mauritius</option>
										<option value="MYT">Mayotte</option>
										<option value="MEX">Mexico</option>
										<option value="FSM">Micronesia, Federated States of</option>
										<option value="MDA">Moldova, Republic of</option>
										<option value="MCO">Monaco</option>
										<option value="MNG">Mongolia</option>
										<option value="MNE">Montenegro</option>
										<option value="MSR">Montserrat</option>
										<option value="MAR">Morocco</option>
										<option value="MOZ">Mozambique</option>
										<option value="MMR">Myanmar</option>
										<option value="NAM">Namibia</option>
										<option value="NRU">Nauru</option>
										<option value="NPL">Nepal</option>
										<option value="NLD">Netherlands</option>
										<option value="NCL">New Caledonia</option>
										<option value="NZL">New Zealand</option>
										<option value="NIC">Nicaragua</option>
										<option value="NER">Niger</option>
										<option value="NGA">Nigeria</option>
										<option value="NIU">Niue</option>
										<option value="NFK">Norfolk Island</option>
										<option value="MNP">Northern Mariana Islands</option>
										<option value="NOR">Norway</option>
										<option value="OMN">Oman</option>
										<option value="PAK">Pakistan</option>
										<option value="PLW">Palau</option>
										<option value="PSE">Palestinian Territory, Occupied</option>
										<option value="PAN">Panama</option>
										<option value="PNG">Papua New Guinea</option>
										<option value="PRY">Paraguay</option>
										<option value="PER">Peru</option>
										<option value="PHL">Philippines</option>
										<option value="PCN">Pitcairn</option>
										<option value="POL">Poland</option>
										<option value="PRT">Portugal</option>
										<option value="PRI">Puerto Rico</option>
										<option value="QAT">Qatar</option>
										<option value="REU">Réunion</option>
										<option value="ROU">Romania</option>
										<option value="RUS">Russian Federation</option>
										<option value="RWA">Rwanda</option>
										<option value="BLM">Saint Barthélemy</option>
										<option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
										<option value="KNA">Saint Kitts and Nevis</option>
										<option value="LCA">Saint Lucia</option>
										<option value="MAF">Saint Martin (French part)</option>
										<option value="SPM">Saint Pierre and Miquelon</option>
										<option value="VCT">Saint Vincent and the Grenadines</option>
										<option value="WSM">Samoa</option>
										<option value="SMR">San Marino</option>
										<option value="STP">Sao Tome and Principe</option>
										<option value="SAU">Saudi Arabia</option>
										<option value="SEN">Senegal</option>
										<option value="SRB">Serbia</option>
										<option value="SYC">Seychelles</option>
										<option value="SLE">Sierra Leone</option>
										<option value="SGP">Singapore</option>
										<option value="SXM">Sint Maarten (Dutch part)</option>
										<option value="SVK">Slovakia</option>
										<option value="SVN">Slovenia</option>
										<option value="SLB">Solomon Islands</option>
										<option value="SOM">Somalia</option>
										<option value="ZAF">South Africa</option>
										<option value="SGS">South Georgia and the South Sandwich Islands</option>
										<option value="SSD">South Sudan</option>
										<option value="ESP">Spain</option>
										<option value="LKA">Sri Lanka</option>
										<option value="SDN">Sudan</option>
										<option value="SUR">Suriname</option>
										<option value="SJM">Svalbard and Jan Mayen</option>
										<option value="SWZ">Swaziland</option>
										<option value="SWE">Sweden</option>
										<option value="CHE">Switzerland</option>
										<option value="SYR">Syrian Arab Republic</option>
										<option value="TWN">Taiwan, Province of China</option>
										<option value="TJK">Tajikistan</option>
										<option value="TZA">Tanzania, United Republic of</option>
										<option value="THA">Thailand</option>
										<option value="TLS">Timor-Leste</option>
										<option value="TGO">Togo</option>
										<option value="TKL">Tokelau</option>
										<option value="TON">Tonga</option>
										<option value="TTO">Trinidad and Tobago</option>
										<option value="TUN">Tunisia</option>
										<option value="TUR">Turkey</option>
										<option value="TKM">Turkmenistan</option>
										<option value="TCA">Turks and Caicos Islands</option>
										<option value="TUV">Tuvalu</option>
										<option value="UGA">Uganda</option>
										<option value="UKR">Ukraine</option>
										<option value="ARE">United Arab Emirates</option>
										<option value="GBR">United Kingdom</option>
										<option value="USA">United States</option>
										<option value="UMI">United States Minor Outlying Islands</option>
										<option value="URY">Uruguay</option>
										<option value="UZB">Uzbekistan</option>
										<option value="VUT">Vanuatu</option>
										<option value="VEN">Venezuela, Bolivarian Republic of</option>
										<option value="VNM">Viet Nam</option>
										<option value="VGB">Virgin Islands, British</option>
										<option value="VIR">Virgin Islands, U.S.</option>
										<option value="WLF">Wallis and Futuna</option>
										<option value="ESH">Western Sahara</option>
										<option value="YEM">Yemen</option>
										<option value="ZMB">Zambia</option>
										<option value="ZWE">Zimbabwe</option>
                                    </select>
                                    <span class="help-block error-message"><?php echo form_error('country'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Update Info</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="social_link">
                        <form class="form-horizontal" action="<?php echo base_url('admin/profile/update_social_info.html'); ?>" method="post">
                            <div class="form-group">
                                <label for="facebook" class="col-sm-2 control-label">Facebook</label>

                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                        <input type="url" name="facebook" value="<?php echo $user_info['facebook']; ?>" class="form-control" placeholder="Enter facebook url">
                                    </div>
                                    <span class="help-block error-message"><?php echo form_error('facebook'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="twitter" class="col-sm-2 control-label">Twitter</label>

                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                                        <input type="url" name="twitter" value="<?php echo $user_info['twitter']; ?>" class="form-control" placeholder="Enter twitter url">
                                    </div>
                                    <span class="help-block error-message"><?php echo form_error('twitter'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="google_plus" class="col-sm-2 control-label">Google+</label>

                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-google"></i></span>
                                        <input type="url" name="google_plus" value="<?php echo $user_info['google_plus']; ?>" class="form-control" placeholder="Enter google+ url">
                                    </div>
                                    <span class="help-block error-message"><?php echo form_error('google_plus'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="linkedin" class="col-sm-2 control-label">Linkedin</label>

                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-linkedin"></i></span>
                                        <input type="url" name="linkedin" value="<?php echo $user_info['linkedin']; ?>" class="form-control" placeholder="Enter linkedin url">
                                    </div>
                                    <span class="help-block error-message"><?php echo form_error('linkedin'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="youtube" class="col-sm-2 control-label">Youtube</label>

                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-youtube"></i></span>
                                        <input type="url" name="youtube" value="<?php echo $user_info['youtube']; ?>" class="form-control" placeholder="Enter youtube url">
                                    </div>
                                    <span class="help-block error-message"><?php echo form_error('youtube'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="github" class="col-sm-2 control-label">GitHub</label>

                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-github"></i></span>
                                        <input type="url" name="github" value="<?php echo $user_info['github']; ?>" class="form-control" placeholder="Enter github url">
                                    </div>
                                    <span class="help-block error-message"><?php echo form_error('github'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Update Info</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="change_password">
                        <form class="form-horizontal" action="<?php echo base_url('admin/profile/change_password.html'); ?>" method="post">
                            <div class="form-group">
                                <label for="old_password" class="col-sm-2 control-label">Password</label>

                                <div class="col-sm-10">
                                    <input type="password" name="old_password" class="form-control" id="old_password" placeholder="Enter old password">
                                    <span class="help-block error-message"><?php echo form_error('old_password'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="new_password" class="col-sm-2 control-label">New Password</label>

                                <div class="col-sm-10">
                                    <input type="password" name="new_password" class="form-control" id="new_password" placeholder="Enter new password">
                                    <span class="help-block error-message"><?php echo form_error('new_password'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password" class="col-sm-2 control-label">Confirm Password</label>

                                <div class="col-sm-10">
                                    <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm new password">
                                    <span class="help-block error-message"><?php echo form_error('confirm_password'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Update Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="profile_picture">
                        <form class="form-horizontal" action="<?php echo base_url('admin/profile/update_profile_picture.html'); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="picture_name" class="col-sm-2 control-label">Profile Picture</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="current_image" value="<?php echo $user_info['avatar']; ?>">
                                    <input type="file" id="picture_name" name="picture_name">
                                    <p class="help-block" style="color: #f39c12;"><b>Note:</b> Only .jpg .png .jpeg .gif allowed. <br>(Square image will better view such as <b>100x100</b> pixel)</p>
                                    <span class="help-block error-message"><?php echo form_error('picture_name'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Update Picture</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->
<script type="text/javascript">
    document.forms['basic_info_form'].elements['gender'].value = '<?php echo $user_info['gender']; ?>';
    document.forms['contact_info_form'].elements['country'].value = '<?php echo $user_info['country']; ?>';
</script>