<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row content-title">
    <div class="col-md-6 col-sm-6 col-xs-6">
        <h6 class="pull-left"> Add Listing</h6>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
        <ul class="list-inline pull-right">
            <li><a href="<?php echo base_url('user/dashboard.html'); ?>"><i class="fa fa-home"></i> Dashboard</a></li> >
            <li><a href="<?php echo base_url('user/listing.html'); ?>"> Manage Listing</a></li> > 
            <li><a class="active"> Add Listing</a></li>
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
        <?php
        $package_info = package_info();
        if ($count_listing < $package_info['listing']) {
            ?>
            <form name="add_business_form" class="custom-form" action="<?php echo base_url('user/listing/store_company_details.html'); ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h6 class="brown-1"> Details</h6>
                        <hr>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group custom-group">
                            <label for="company_name"> Name <span class="required-field">*</span></label>
                            <input type="text" name="company_name" value="<?php echo set_value('company_name'); ?>" class="form-control margin-top-5" id="company_name" placeholder="Enter name of the item doctor or blood or hospital">
                            <span class="error-message"><?php echo form_error('company_name'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="category_id">Category Name <span class="required-field">*</span></label>
                            <select name="category_id" class="form-control margin-top-5" id="category_id">
                                <option value="" selected="" disabled="">Select one</option>
                                <?php
                                foreach ($categories_info as $v_category_info) {
                                    echo "<option value='" . $v_category_info['category_id'] . "'>" . $v_category_info['category_name'] . "</option>";
                                }
                                ?>
                            </select>
                            <span class="error-message"><?php echo form_error('category_id'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="registration_code">Registration Code</label>
                            <input type="text" name="registration_code" value="<?php echo set_value('registration_code'); ?>" class="form-control margin-top-5" id="registration_code" placeholder="Enter registration code">
                            <span class="error-message"><?php echo form_error('registration_code'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="vat_registration">VAT Registration</label>
                            <input type="text" name="vat_registration" value="<?php echo set_value('vat_registration'); ?>" class="form-control margin-top-5" id="vat_registration" placeholder="Enter vat registration">
                            <span class="error-message"><?php echo form_error('vat_registration'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <!-- <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="company_manager">Company Manager</label>
                            <input type="text" name="company_manager" value="<?php echo set_value('company_manager'); ?>" class="form-control margin-top-5" id="company_manager" placeholder="Enter office time">
                            <span class="error-message"><?php echo form_error('company_manager'); ?></span>
                        </div>
                    </div> -->
                    <!-- End Col -->
                    <!-- <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="employees">Employees </label>
                            <select name="employees" class="form-control margin-top-5" id="employees">
                                <option value="" selected="" disabled="">Select one</option>
                                <option value="1-5">1-5</option>
                                <option value="6-10">6-10</option>
                                <option value="11-15">11-15</option>
                                <option value="16-25">16-25</option>
                                <option value="26-50">26-50</option>
                                <option value="51-100">51-100</option>
                                <option value="101-200">101-200</option>
                                <option value="201-500">201-500</option>
                                <option value="501-1000">501-1000</option>
                                <option value="1001-2000">1001-2000</option>
                                <option value="2001-3000">2001-3000</option>
                                <option value="3001-4000">3001-4000</option>
                                <option value="4001-5000">4001-5000</option>
                            </select>
                            <span class="error-message"><?php echo form_error('employees'); ?></span>
                        </div>
                    </div> -->
                    <!-- End Col -->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="establishment_year">Birth Year</label>
                            <select name="establishment_year" class="form-control margin-top-5" id="establishment_year">
                                <option value="" selected="" disabled="">Select one</option>
                                <?php
                                $i = 1800;
                                for ($j = date("Y"); $j >= $i; $j--) {
                                    echo "<option value='" . $j . "'>" . $j . "</option>";
                                }
                                ?>
                            </select>
                            <span class="error-message"><?php echo form_error('establishment_year'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="about_company">About <span class="required-field">*</span></label>
                            <textarea rows="4" name="about_company" class="form-control margin-top-5" id="about_company" placeholder="About"><?php echo set_value('about_company'); ?></textarea>
                            <span class="error-message"><?php echo form_error('about_company'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="company_logo">Company Logo</label>
                            <input name="company_logo" class="margin-top-5" type="file" id="company_logo">
                            <span class="help-block"><strong>Note:</strong> Only .jpg .png .jpeg .gif allowed. <br>(width image will better view such as <strong>320x480</strong> pixel)</span>
                            <span class="error-message"><?php echo form_error('company_logo'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                        <h6 class="brown-1">Contact Details</h6>
                        <hr>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="city_id">City <span class="required-field">*</span></label>
                            <select name="city_id" class="form-control margin-top-5" id="city_id">
                                <option value="" selected="" disabled="">Select one</option>
                                <?php
                                foreach ($cities_info as $v_city_info) {
                                    echo "<option value='" . $v_city_info['city_id'] . "'>" . $v_city_info['city_name'] . "</option>";
                                }
                                ?>
                            </select>
                            <span class="error-message"><?php echo form_error('city_id'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="state">State<span class="required-field">*</span></label>
                            <input type="text" name="state" value="<?php echo set_value('state'); ?>" class="form-control margin-top-5" id="state" placeholder="Enter state">
                            <span class="error-message"><?php echo form_error('state'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="address">Address <span class="required-field">*</span></label>
                            <input type="text" name="address" value="<?php echo set_value('address'); ?>" class="form-control margin-top-5" id="address" placeholder="Enter address">                          
                            <span class="error-message"><?php echo form_error('address'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="zip">Zip <span class="required-field">*</span></label>
                            <input type="text" name="zip" value="<?php echo set_value('zip'); ?>" class="form-control margin-top-5" id="zip" placeholder="Enter zip code">                               
                            <span class="error-message"><?php echo form_error('zip'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="mobile">Mobile <span class="required-field">*</span></label>
                            <input type="text" name="mobile" value="<?php echo set_value('mobile'); ?>" class="form-control margin-top-5" id="mobile" placeholder="Enter mobile number">                              
                            <span class="error-message"><?php echo form_error('mobile'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="email">Email <span class="required-field">*</span></label>
                            <input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control margin-top-5" id="email" placeholder="Enter email address">                                
                            <span class="error-message"><?php echo form_error('email'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="fax">Fax</label>
                            <input type="text" name="fax" value="<?php echo set_value('fax'); ?>" class="form-control margin-top-5" id="fax" placeholder="Enter fax number">                                
                            <span class="error-message"><?php echo form_error('fax'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" value="<?php echo set_value('phone'); ?>" class="form-control margin-top-5" id="phone" placeholder="Enter phone number">                                
                            <span class="error-message"><?php echo form_error('phone'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" name="website" value="<?php echo set_value('website'); ?>" class="form-control margin-top-5" id="website" placeholder="Enter website name">                                
                            <span class="error-message"><?php echo form_error('website'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="contact_person">Contact Person <span class="required-field">*</span></label>
                            <input type="text" name="contact_person" value="<?php echo set_value('contact_person'); ?>" class="form-control margin-top-5" id="contact_person" placeholder="Enter contact person">                              
                            <span class="error-message"><?php echo form_error('contact_person'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    













                    <!-- End Col -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                        <h6 class="brown-1">Working Hours</h6>
                        <hr>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="saturday">Saturday</label>
                            <input type="text" name="saturday" value="<?php echo set_value('saturday'); ?>" class="form-control margin-top-5" id="saturday" placeholder="Enter office time">                                
                            <span class="error-message"><?php echo form_error('saturday'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="sunday">Sunday</label>
                            <input type="text" name="sunday" value="<?php echo set_value('sunday'); ?>" class="form-control margin-top-5" id="sunday" placeholder="Enter office time">                                
                            <span class="error-message"><?php echo form_error('sunday'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="monday">Monday</label>
                            <input type="text" name="monday" value="<?php echo set_value('monday'); ?>" class="form-control margin-top-5" id="monday" placeholder="Enter office time">                                
                            <span class="error-message"><?php echo form_error('monday'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="tuesday">Tuesday</label>
                            <input type="text" name="tuesday" value="<?php echo set_value('tuesday'); ?>" class="form-control margin-top-5" id="tuesday" placeholder="Enter office time">                               
                            <span class="error-message"><?php echo form_error('tuesday'); ?></span>
                        </div>

                    </div>
                    <!-- End Col -->
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="wednesday">Wednesday</label>
                            <input type="text" name="wednesday" value="<?php echo set_value('wednesday'); ?>" class="form-control margin-top-5" id="wednesday" placeholder="Enter office time">                               
                            <span class="error-message"><?php echo form_error('wednesday'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="thursday">Thursday</label>
                            <input type="text" name="thursday" value="<?php echo set_value('thursday'); ?>" class="form-control margin-top-5" id="thursday" placeholder="Enter office time">                               
                            <span class="error-message"><?php echo form_error('thursday'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="friday">Friday</label>
                            <input type="text" name="friday" value="<?php echo set_value('friday'); ?>" class="form-control margin-top-5" id="friday" placeholder="Enter office time">                                
                            <span class="error-message"><?php echo form_error('friday'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                        <h6 class="brown-1">Location Map</h6>
                        <hr>
                    </div>
                    <!-- End Col -->

                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="lat">Latitude <span class="required-field">*</span></label>
                            <input type="text" name="lat" value="<?php echo set_value('lat'); ?>" class="form-control margin-top-5" id="lat" placeholder="">                                
                            <span class="error-message"><?php echo form_error('lat'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="lng">Longitude <span class="required-field">*</span></label>
                            <input type="text" name="lng" value="<?php echo set_value('lng'); ?>" class="form-control margin-top-5" id="lng" placeholder="">                              
                            <span class="error-message"><?php echo form_error('lng'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group custom-group">
                            <div id="map"></div>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                        <a href="<?php echo base_url('user/listing.html'); ?>" class="btn btn-danger btn-custom"><i class="fa fa-remove"></i> Cancel</a>
                        <button type="submit" class="btn btn-success btn-custom"><i class="fa fa-plus"></i> Add Info</button>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </form>
        <?php } else { ?>
            <p>You need to upgrade your package for add more business. Please upgrade your package.</p>
        <?php } ?>

    </div>
</div>
<!-- End Add Container -->
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCruIR-E1OQ9TEh5pABARsl8drCCc2PASs&callback=initMap"></script>

<script>
    function initMap() {
        var uluru = {lat: 25.7458153578196, lng: 89.26883062744139}


        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map,
            draggable: true
        });
        google.maps.event.addListener(marker, 'dragend', function () {
            //console.log(marker.getPosition().lat());
            //console.log(marker.getPosition().lng());

            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();
            $('#lat').val(lat);
            $('#lng').val(lng);
        });
        // var searchBox = new google.maps.places.SearchBox(document.getElementById('mapsearch'));

    }
</script>
<script type="text/javascript">
    document.forms['add_business_form'].elements['category_id'].value = '<?php echo set_value('category_id'); ?>';
    document.forms['add_business_form'].elements['employees'].value = '<?php echo set_value('employees'); ?>';
    document.forms['add_business_form'].elements['establishment_year'].value = '<?php echo set_value('establishment_year'); ?>';
    document.forms['add_business_form'].elements['city_id'].value = '<?php echo set_value('city_id'); ?>';
</script>