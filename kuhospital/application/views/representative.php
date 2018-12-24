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
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Sex</th>
                            <th>Action</th>
                            <th>Blood Group</th>
                            <th>Date of birth</th>
                            <th>User role</th> 
                            <th>Create date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($representatives)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($representatives as $representative) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><img src="<?php echo $representative->picture; ?>" alt="" class="img-thumbnail" width="80"/></td>
                                    <td><?php echo $representative->firstname; ?></td>
                                    <td><?php echo $representative->lastname; ?></td>
                                    <td><?php echo $representative->email; ?></td>
                                    <td><?php echo $representative->phone; ?></td>
                                    <td><?php echo $representative->mobile; ?></td>
                                    <td><?php echo $representative->address; ?></td>
                                    <td><?php echo $representative->sex; ?></td>
                                    <td class="center">
                                        <a href="<?php echo base_url("representative/edit/$representative->user_id") ?>" class="btn btn-xs block btn-warning">Edit</a> 
                                        <a href="<?php echo base_url("representative/delete/$representative->user_id") ?>" class="btn btn-xs block btn-danger" onclick="return confirm('Are you sure ?')">Delete</a> 
                                    </td>
                                    <td><?php echo $representative->blood_group; ?></td>
                                    <td><?php echo $representative->date_of_birth; ?></td>
                                    <td><?php echo (($representative->user_role == 3)?"Representative":null) ?></td>
                                    <td><?php echo $representative->create_date; ?></td>
                                    <td><?php echo (($representative->status==1)?"Active":"Inactive"); ?></td>
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