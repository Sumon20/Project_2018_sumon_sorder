<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default">
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>ID NO</th>
                            <th>Picture</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Sex</th>
                            <th>Blood Group</th>
                            <th>Action</th>
                            <th>Date of birth</th> 
                            <th>Create date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($patients)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($patients as $patient) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $patient->patient_id; ?></td>
                                    <td><img src="<?php echo $patient->picture; ?>" alt="" class="img-thumbnail" width="80"/></td>
                                    <td><?php echo $patient->firstname; ?></td>
                                    <td><?php echo $patient->lastname; ?></td>
                                    <td><?php echo $patient->phone; ?></td>
                                    <td><?php echo $patient->mobile; ?></td>
                                    <td><?php echo $patient->address; ?></td>
                                    <td><?php echo $patient->sex; ?></td>
                                    <td><?php echo $patient->blood_group; ?></td>
                                    <td class="center">
                                        <a href="<?php echo base_url("patient/profile/$patient->id") ?>" class="btn btn-xs block btn-success">View</a> 
                                        <a href="<?php echo base_url("patient/edit/$patient->id") ?>" class="btn btn-xs block btn-warning">Edit</a> 
                                        <a href="<?php echo base_url("patient/delete/$patient->id") ?>" class="btn btn-xs block btn-danger" onclick="return confirm('Are you sure ?')">Delete</a> 
                                    </td>
                                    <td><?php echo $patient->date_of_birth; ?></td> 
                                    <td><?php echo $patient->create_date; ?></td>
                                    <td><?php echo (($patient->status==1)?"Active":"Inactive"); ?></td>
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