<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default panel-form">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?php echo form_open('enquiry/create','class="form-inner"') ?>

                            <div class="form-group row">
                                <label for="name" class="col-xs-3 col-form-label">Full Name <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="name"  type="text" class="form-control" id="name" placeholder="Full Name" value="<?php echo $enquiry->name ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-xs-3 col-form-label">Email Address <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="email"  type="text" class="form-control" id="email" placeholder="Email Address" value="<?php echo $enquiry->email ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-xs-3 col-form-label">Phone Number </label>
                                <div class="col-xs-9">
                                    <input name="phone"  type="text" class="form-control" id="phone" placeholder="Phone Number" value="<?php echo $enquiry->phone ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="enquiry" class="col-xs-3 col-form-label">Your Enquiry <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <textarea name="enquiry" class="form-control tinymce"  placeholder="Your Enquiry"  rows="7"><?php echo $enquiry->enquiry ?></textarea>
                                </div>
                            </div>

                            <!--Radios-->
                            <div class="form-group row">
                                <label class="col-sm-3">Status</label>
                                <div class="col-xs-9"> 
                                    <div class="form-check">
                                        <label class="radio-inline"><input type="radio" name="status" value="1" checked>Active</label>
                                        <label class="radio-inline"><input type="radio" name="status" value="0">Inactive</label>
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
                </div>
            </div>
        </div>
    </div>

</div>