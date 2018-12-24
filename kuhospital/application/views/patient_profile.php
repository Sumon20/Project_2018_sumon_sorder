<div class="row">

    <div class="col-sm-12" id="PrintMe">
        <div  class="panel panel-info"> 

            <div class="panel-body">  
                <div class="row">
                    <div class="col-sm-12" align="center">  
                        <h1>Patient Information</h1>
                    <br>
                    </div>

                    <div class="col-sm-3" align="center"> 
                        <img alt="Picture" src="<?php echo (!empty($profile->picture)?base_url($profile->picture):base_url("assets/images/no-img.png")) ?>" class="img-thumbnail img-responsive">
                        <h3><?php echo "$profile->firstname $profile->lastname " ?></h3>
                    </div> 

                    <div class="col-sm-9"> 
                        <dl class="dl-horizontal">
                            <dt>Patient ID</dt><dd><?php echo $profile->patient_id ?></dd> 
                            <dt>Date of Birth</dt><dd><?php echo date('d M Y',strtotime($profile->date_of_birth)) ?></dd> 
                            <dt>Age</dt><dd><?php echo date_diff(date_create($profile->date_of_birth), date_create('now'))->y; ?> Years</dd> 
                            <dt>Blood Group</dt><dd><?php echo $profile->blood_group ?></dd> 
                            <dt>Sex</dt><dd><?php echo $profile->sex ?></dd> 
                            <dt>Phone No</dt><dd><?php echo $profile->phone ?></dd> 
                            <dt>Mobile No</dt><dd><?php echo $profile->mobile ?></dd> 
                            <dt>Address</dt><dd><?php echo $profile->address ?></dd> 
                            <dt>Created Date</dt><dd><?php echo $profile->create_date ?></dd> 
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
