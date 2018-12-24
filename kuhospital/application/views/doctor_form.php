<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default panel-form">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-9 col-sm-12">
                        <?php echo form_open_multipart('doctor/create','class="form-inner"') ?> 

                            <?php echo form_hidden('user_id',$doctor->user_id) ?>

                            <div class="form-group row">
                                <label for="firstname" class="col-xs-3 col-form-label">First Name <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="firstname" type="text" class="form-control" id="firstname" placeholder="First Name" value="<?php echo $doctor->firstname ?>" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastname" class="col-xs-3 col-form-label">Last Name <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="lastname" type="text" class="form-control" id="lastname" placeholder="Last Name" value="<?php echo $doctor->lastname ?>" >
                                </div>
                            </div>

                            <!-- display in edit mode -->
                            <?php if (empty($doctor->user_id)) { ?>
                            <div class="form-group row">
                                <label for="email" class="col-xs-3 col-form-label">Email <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="email" class="form-control" type="text" placeholder="Email" id="email"  value="<?php echo $doctor->email ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-xs-3 col-form-label">Password <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="password" class="form-control" type="password" placeholder="Password" id="password" >
                                </div>
                            </div>
                            <?php } ?>
                            <!-- ends of display edit mode-->
 

                            <div class="form-group row">
                                <label for="designation" class="col-xs-3 col-form-label">Designation</label>
                                <div class="col-xs-9">
                                    <input name="designation" type="text" class="form-control" id="designation" placeholder="Designation" value="<?php echo $doctor->designation ?>" >
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="department_id" class="col-xs-3 col-form-label">Department </label>
                                <div class="col-xs-9">
                                    <?php echo form_dropdown('department_id',$department_list,$doctor->department_id,'class="form-control" id="department_id"') ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-xs-3 col-form-label">Address <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <textarea name="address" class="form-control"  placeholder="Address" maxlength="140" rows="7" id="address"><?php echo $doctor->address ?></textarea>
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="phone" class="col-xs-3 col-form-label">Phone</label>
                                <div class="col-xs-9">
                                    <input name="phone" class="form-control" type="text" placeholder="Phone" id="phone" value="<?php echo $doctor->phone ?>" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile" class="col-xs-3 col-form-label">Mobile <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="mobile" class="form-control" type="text" placeholder="Mobile" id="mobile" value="<?php echo $doctor->mobile ?>" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="short_biography" class="col-xs-3 col-form-label">Short Biography</label>
                                <div class="col-xs-9">
                                    <textarea name="short_biography" class="tinymce form-control" placeholder="Address" id="short_biography" maxlength="140" rows="7"><?php echo $doctor->short_biography ?></textarea>
                                </div>
                            </div> 


                            <!-- if representative picture is already uploaded -->
                            <?php if(!empty($doctor->picture)) {  ?>
                            <div class="form-group row">
                                <label for="picturePreview" class="col-xs-3 col-form-label"></label>
                                <div class="col-xs-9">
                                    <img src="<?php echo base_url($doctor->picture) ?>" alt="Picture" class="img-thumbnail" />
                                </div>
                            </div>
                            <?php } ?>

                            <div class="form-group row">
                                <label for="picture" class="col-xs-3 col-form-label">Picture</label>
                                <div class="col-xs-9">
                                    <input type="file" name="picture" placeholder="Picture" id="picture" value="<?php echo $doctor->picture ?>">
                                    <input type="hidden" name="old_picture" value="<?php echo $doctor->picture ?>">
                                </div>
                            </div>




                            <div class="form-group row">
                                <label for="specialist" class="col-xs-3 col-form-label">Specialist</label>
                                <div class="col-xs-9">
                                    <input type="text" name="specialist" class="form-control" placeholder="Specialist" id="specialist" value="<?php echo $doctor->specialist ?>" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date_of_birth" class="col-xs-3 col-form-label">Date of birth</label>
                                <div class="col-xs-9">
                                    <input name="date_of_birth" class="datepicker form-control" type="text" placeholder="Date of birth" id="date_of_birth" value="<?php echo $doctor->date_of_birth ?>" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3">Sex <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <label class="radio-inline">
                                        <input type="radio" name="sex" value="Male" <?php echo  set_radio('sex', 'Male', TRUE); ?> >Male
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="sex" value="Female" <?php echo  set_radio('sex', 'Female'); ?> >Female
                                        </label> 
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="blood_group" class="col-xs-3 col-form-label">Blood Group</label>
                                <div class="col-xs-9"> 
                                    <?php
                                        $bloodList = [
                                            ''   => 'Select Option',
                                            'A+' => 'A+',
                                            'A-' => 'A-',
                                            'B+' => 'B+',
                                            'B-' => 'B-',
                                            'O+' => 'O+',
                                            'O-' => 'O-',
                                            'AB+' => 'AB+',
                                            'AB-' => 'AB-'
                                        ];
                                        echo form_dropdown('blood_group', $bloodList, $doctor->blood_group, 'class="form-control" id="blood_group" ');

                                    ?>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="city_id" class="col-xs-3 col-form-label">City</label>
                                <div class="col-xs-9"> 
                                    <?php
                                        $cityList = [
                                            ''   => 'Select Option',
                                            '1' => 'Dhaka',
                                            '3' => 'Khulna',
                                            '7' => 'Barisal',
                                            '8' => 'Chittagong',
                                            '4' => 'Rajshai',
                                            '2' => 'Rangpur',
                                            
                                            
                                            
                                        ];
                                        echo form_dropdown('city_id', $cityList, $doctor->city_id, 'class="form-control" id="city_id" ');

                                    ?>
                                </div>
                            </div>



                            


                            <div class="form-group row">
                                <label for="degree" class="col-xs-3 col-form-label">Education/Degree</label>
                                <div class="col-xs-9">
                                    <textarea name="degree" class="tinymce form-control" placeholder="Education/Degree" id="degree" maxlength="140" rows="7"><?php echo $doctor->degree ?></textarea>
                                </div>
                            </div> 

                            

                            

                            <div class="form-group row">
                                <label for="lat" class="col-xs-3 col-form-label">Latitude</label>
                                <div class="col-xs-9">
                                    <input type="text" name="lat" class="form-control" placeholder="latitude" id="lat" value="<?php echo $doctor->lat ?>" >
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="lng" class="col-xs-3 col-form-label">Longitude</label>
                                <div class="col-xs-9">
                                    <input type="text" name="lng" class="form-control" placeholder="Longitude" id="lng" value="<?php echo $doctor->lng ?>" >
                                </div>
                            </div>
 
                            <div class="form-group row">
                                <label class="col-sm-3">Status</label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <label class="radio-inline">
                                        <input type="radio" name="status" value="1" <?php echo  set_radio('status', '1', TRUE); ?> >Active
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="status" value="0" <?php echo  set_radio('status', '0'); ?> >Inactive
                                        </label>
                                    </div>
                                </div>
                            </div>


                            

                   


                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="ui buttons">
                                        <button class="ui button">Cancel</button>
                                        <div class="or"></div>
                                        <button class="ui positive button">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>

</div>


