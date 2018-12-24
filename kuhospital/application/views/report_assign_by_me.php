<div class="row">
    <div class="col-sm-12">
        <div  class="panel panel-default">
            <div class="panel-body">

                <form class="form-inline" action="<?php echo base_url('report/assign_by_me') ?>">

                    <div class="form-group">
                        <label class="sr-only" for="start_date">Start Date</label>
                        <input type="date" name="start_date" class="form-control datepicker" id="start_date" placeholder="Start Date" value="<?php echo $user->start_date ?>">
                    </div>  
                    <div class="form-group">
                        <label class="sr-only" for="end_date">End Date</label>
                        <input type="date" name="end_date" class="form-control datepicker" id="end_date" placeholder="End Date" value="<?php echo $user->end_date ?>">
                    </div>  

                    <button type="submit" class="btn btn-default">Filter</button>

                </form>

            </div>
        </div>
    </div>


    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default">
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Appointment ID</th>
                            <th>Patient ID</th>
                            <th>Department</th>
                            <th>Doctor Name</th>
                            <th>Serial No</th>
                            <th>Problem</th>
                            <th>Date</th>
                            <th>Status</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($appointments)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($appointments as $appointment) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $appointment->appointment_id; ?></td>
                                    <td><?php echo $appointment->patient_id; ?></td>
                                    <td><?php echo $appointment->name; ?></td>
                                    <td><?php echo $appointment->firstname.' '.$appointment->lastname; ?></td>
                                    <td><?php echo $appointment->serial_no; ?></td>
                                    <td><?php echo $appointment->problem; ?></td>
                                    <td><?php echo $appointment->date; ?></td>
                                    <td><?php echo (($appointment->status==1)?"Active":"Inactive"); ?></td> 
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
            </div>
        </div>
    </div>
</div>