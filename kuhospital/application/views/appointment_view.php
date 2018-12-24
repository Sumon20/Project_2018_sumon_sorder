<div class="row">

    <div class="col-sm-12" id="PrintMe">
        <div  class="panel panel-info"> 
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-6 col-md-8">
                        <dl class="dl-horizontal">
                            <dt>Doctor</dt> <dd><?php echo "$appointment->firstname $appointment->lastname"?></dd>
                            <dt>Department</dt> <dd><?php echo $appointment->department ?></dd>
                            <dt>Degree</dt> <dd><?php echo $appointment->degree ?></dd>
                            <dt>Available</dt> <dd><?php echo $appointment->available_days ?></dd>
                            <dt>Schedule Time </dt> <dd><?php echo "$appointment->start_time - $appointment->end_time" ?></dd>
                        </dl>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <dl class="dl-horizontal">
                            <dt>Serial No</dt> <dd>#<?php echo ($appointment->serial_no<=9)?"0$appointment->serial_no":$appointment->serial_no ?></dd>
                            <dt>Date</dt> <dd><?php echo $appointment->date ?></dd>
                        </dl>
                    </div>
                </div>
            </div>

            <div class="panel-body">  
                <div class="row">
                    <div class="col-sm-12" align="center">  
                        <h1>Appointment information</h1>
                    <br>
                    </div>

                    <div class="col-sm-3" align="center"> 
                        <img alt="Picture" src="<?php echo (!empty($appointment->picture)?base_url($appointment->picture):base_url("assets/images/no-img.png")) ?>" class="img-thumbnail img-responsive">
                        <h3><?php echo "$appointment->pfirstname $appointment->plastname " ?></h3>
                    </div>

                    <div class="col-sm-9"> 
                        <dl class="dl-horizontal">
                            <dt>Appointment ID</dt><dd><?php echo $appointment->appointment_id ?></dd>
                            <dt>Full Name</dt><dd><?php echo "$appointment->pfirstname $appointment->plastname " ?></dd>
                            <dt>Patient ID</dt><dd><?php echo $appointment->patient_id ?></dd> 
                            <dt>Date of Birth</dt><dd><?php echo date('d M Y',strtotime($appointment->date_of_birth)) ?></dd> 
                            <dt>Age</dt><dd><?php echo date_diff(date_create($appointment->date_of_birth), date_create('now'))->y; ?> Years</dd> 
                            <dt>Sex</dt><dd><?php echo $appointment->sex ?></dd> 
                            <dt>Mobile No</dt><dd><?php echo $appointment->mobile ?></dd> 
                            <dt>Problem</dt><dd><?php echo $appointment->problem ?></dd> 
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
