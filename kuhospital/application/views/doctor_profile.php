<div class="row">

    <div class="col-sm-12" id="PrintMe">
        <div  class="panel panel-info"> 
            <div class="panel-body">
                <div class="row">

                    <div class="col-sm-12" align="center">  
                        <h1>Doctor Information</h1>
                    <br>
                    </div>

                    <div class="col-md-3 col-lg-3 " align="center"> 
                        <img alt="Picture" src="<?php echo (!empty($user->picture)?base_url($user->picture):base_url("assets/images/no-img.png")) ?>" class="img-thumbnail img-responsive">
                        <h3>
                            <?php echo $user->firstname.' '.$user->lastname ?> 
                        </h3>
                    </div>

                    <div class="col-md-7 col-lg-7 "> 
                        <dl class="dl-horizontal">
                            <dt>Email</dt><dd><?php echo (!empty($user->email)?$user->email:null) ?></dd>
                            <dt>Designation</dt><dd><?php echo (!empty($user->designation)?$user->designation:null) ?></dd>
                            <dt>Department</dt><dd><?php echo (!empty($user->department)?$user->department:null) ?></dd>
                            <dt>Address</dt><dd><?php echo (!empty($user->address)?$user->address:null) ?></dd>
                            <dt>Phone</dt><dd><?php echo (!empty($user->phone)?$user->phone:null) ?></dd>
                            <dt>Mobile</dt><dd><?php echo (!empty($user->mobile)?$user->mobile:null) ?></dd>
                            <dt>Short Biography</dt><dd><?php echo (!empty($user->short_biography)?$user->short_biography:null) ?></dd>
                            <dt>Specialist</dt><dd><?php echo (!empty($user->specialist)?$user->specialist:null) ?></dd>
                            <dt>Date of birth</dt><dd><?php echo (!empty($user->date_of_birth)?$user->date_of_birth:null) ?></dd>
                            <dt>Sex</dt><dd><?php echo (!empty($user->sex)?$user->sex:null) ?></dd>
                            <dt>Degree</dt><dd><?php echo (!empty($user->degree)?$user->degree:null) ?></dd>
                            <dt>Create date</dt><dd><?php echo (!empty($user->create_date)?$user->create_date:null) ?></dd>
                            <dt>Update date</dt><dd><?php echo (!empty($user->update_date)?$user->update_date:null) ?></dd>
                            <dt>Status</dt><dd><?php echo (!empty($user->status)?
                            "Active":"Inactive") ?></dd>
                        </dl> 
                    </div>
                </div>
            </div> 

            <div class="panel-footer">
                <div class="text-center">
                    <strong><?php echo $this->session->userdata('title') ?></strong>
                    <p class="text-center"><?php echo $this->session->userdata('address') ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
         <div class="btn-group">
            <button type="button" onclick="printContent('PrintMe')" class="btn btn-success" >Print</button> 
        </div>
    </div>

</div>
