<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default">
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr> 
                            <th>Serial</th>
                            <th>Doctor Name</th>
                            <th>Department Name</th>
                            <th>Day</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Per Patient Time</th>
                            <th>Serial Visibility</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($schedules)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($schedules as $schedule) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $schedule->firstname; ?> <?php echo $schedule->lastname; ?></td>
                                    <td><?php echo $schedule->name; ?></td>
                                    <td><?php echo $schedule->available_days; ?></td>
                                    <td><?php echo $schedule->start_time; ?></td>
                                    <td><?php echo $schedule->end_time; ?></td>
                                    <td><?php echo $schedule->per_patient_time; ?></td>
                                    <td><?php echo (($schedule->serial_visibility_type==1)?"Sequential":"Timestamp"); ?></td>
                                    <td><?php echo (($schedule->status==1)?"Active":"Inactive"); ?></td>
                                    <td class="center">
                                        <a href="<?php echo base_url("schedule/edit_by_doctor/$schedule->schedule_id") ?>" class="btn btn-xs block btn-warning">Edit</a> 
                                        <a href="<?php echo base_url("schedule/delete_by_doctor/$schedule->schedule_id") ?>" onclick="return confirm('Are you sure ?')" class="btn btn-xs block btn-danger">Delete</a> 
                                    </td>
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