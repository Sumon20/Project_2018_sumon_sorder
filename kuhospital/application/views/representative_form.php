<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default panel-form">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?php echo form_open_multipart('representative/create','class="form-inner"') ?>

                            <?php echo form_hidden('user_id',$representative->user_id) ?>

                            <div class="form-group row">
                                <label for="firstname" class="col-xs-3 col-form-label">First Name <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="firstname" type="text" class="form-control" id="firstname" placeholder="First Name" value="<?php echo $representative->firstname ?>" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastname" class="col-xs-3 col-form-label">Last Name <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="lastname" type="text" class="form-control" id="lastname" placeholder="Last Name" value="<?php echo $representative->lastname ?>">
                                </div>
                            </div>

                            <!-- display in edit mode -->
                            <?php if (empty($representative->user_id)) { ?>
                            <div class="form-group row">
                                <label for="email" class="col-xs-3 col-form-label">Email <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="email" class="form-control" type="text" placeholder="Email" id="email"  value="<?php echo $representative->email ?>">
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
                                <label for="phone" class="col-xs-3 col-form-label">Phone</label>
                                <div class="col-xs-9">
                                    <input name="phone" class="form-control" type="text" placeholder="Phone" id="phone"  value="<?php echo $representative->phone ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile" class="col-xs-3 col-form-label">Mobile <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="mobile" class="form-control" type="text" placeholder="Mobile" id="mobile"  value="<?php echo $representative->mobile ?>">
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
                                        echo form_dropdown('blood_group', $bloodList, $representative->blood_group, 'class="form-control" id="blood_group" ');

                                    ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3">Sex</label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <label class="radio-inline">
                                        <input type="radio" name="sex" value="Male" <?php echo  set_radio('sex', 'Male', TRUE); ?> >Male
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="sex" value="Female" <?php echo  set_radio('sex', 'Female'); ?> >Female
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="sex" value="Other" <?php echo  set_radio('sex', 'Other'); ?> >Other
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="date_of_birth" class="col-xs-3 col-form-label">Date of birth</label>
                                <div class="col-xs-9">
                                    <input name="date_of_birth" class="datepicker form-control" type="text" placeholder="Date of birth" id="date_of_birth"  value="<?php echo $representative->date_of_birth ?>">
                                </div>
                            </div>

                            <!-- if representative picture is already uploaded -->
                            <?php if(!empty($representative->picture)) {  ?>
                            <div class="form-group row">
                                <label for="picturePreview" class="col-xs-3 col-form-label"></label>
                                <div class="col-xs-9">
                                    <img src="<?php echo base_url($representative->picture) ?>" alt="Picture" class="img-thumbnail" />
                                </div>
                            </div>
                            <?php } ?>

                            <div class="form-group row">
                                <label for="picture" class="col-xs-3 col-form-label">Picture</label>
                                <div class="col-xs-9">
                                    <input type="file" name="picture" placeholder="Picture" id="picture" value="<?php echo $representative->picture ?>">
                                    <input type="hidden" name="old_picture" value="<?php echo $representative->picture ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-xs-3 col-form-label">Address <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <textarea name="address" class="form-control" id="address" placeholder="Address" maxlength="140" rows="7"><?php echo $representative->address ?></textarea>
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
                        <?php echo form_close() ?>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>

</div>