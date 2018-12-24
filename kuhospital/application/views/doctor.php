<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default">
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Picture</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Department</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Phone</th>
                            <th>Action</th>
                            <th>Address</th>
                            <th>Sex</th>
                            <th>Blood Group</th>
                            <th>Date of birth</th>
                            <th>User role</th> 
                            <th>Create date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($doctors)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($doctors as $doctor) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><img src="<?php echo base_url($doctor->picture); ?>" alt="" class="img-thumbnail" width="80"/></td>
                                    <td><?php echo $doctor->firstname; ?></td>
                                    <td><?php echo $doctor->lastname; ?></td>
                                    <td><?php echo $doctor->name; ?></td>
                                    <td><?php echo $doctor->email; ?></td>
                                    <td><?php echo $doctor->mobile; ?></td>
                                    <td><?php echo $doctor->phone; ?></td>
                                    <td class="center">
                                        <a href="<?php echo base_url("doctor/profile/$doctor->user_id") ?>" class="btn btn-xs block btn-success">View</a> 
                                        <a href="<?php echo base_url("doctor/edit/$doctor->user_id") ?>" class="btn btn-xs block btn-warning">Edit</a> 
                                        <a href="<?php echo base_url("doctor/delete/$doctor->user_id") ?>" class="btn btn-xs block btn-danger" onclick="return confirm('Are you sure ?')">Delete</a> 
                                    </td>
                                    <td><?php echo $doctor->address; ?></td>
                                    <td><?php echo $doctor->sex; ?></td>
                                    <td><?php echo $doctor->blood_group; ?></td>
                                    <td><?php echo $doctor->date_of_birth; ?></td>
                                    <td><?php echo (($doctor->user_role == 2)?"Doctor":null) ?></td> 
                                    <td><?php echo $doctor->create_date; ?></td>
                                    <td><?php echo (($doctor->status==1)?"Active":"Inactive"); ?></td>
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

