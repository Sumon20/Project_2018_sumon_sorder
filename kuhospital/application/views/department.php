<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default">
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Department Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($departments)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($departments as $department) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $department->name; ?></td>
                                    <td><?php echo character_limiter($department->description, 120); ?></td>
                                    <td><?php echo (($department->status==1)?"Active":"Inactive"); ?></td>
                                    <td class="center">
                                        <a href="<?php echo base_url("department/edit/$department->dprt_id") ?>" class="btn btn-xs block btn-warning">Edit</a> 
                                        <a href="<?php echo base_url("department/delete/$department->dprt_id") ?>" onclick="return confirm('Are you sure ?')" class="btn btn-xs block btn-danger">Delete</a> 
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