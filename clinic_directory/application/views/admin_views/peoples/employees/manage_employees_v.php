<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Employees
        <small>Employees</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard.html'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-cogs"></i> Portfolio</a></li>
        <li><a href="#"><i class="fa fa-cogs"></i> Employees</a></li>
        <li class="active"><i class="fa fa-circle-o"></i> Employees</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Employees</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>

        <!-- form start -->
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-12" >
                    <a href="<?php echo base_url('employees/add_employee.html'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add Employee </a>
                </div>
                <div class="col-md-12" style="margin-top: 25px;">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL#</th>
                                <th>Name</th>
                                <th>Access</th>
                                <th>Username</th>
                                <th>Email Address</th>
                                <th>Mobile</th>
                                <th>Picture</th>
                                <th>Added</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sl = 1; ?>
                            <?php foreach ($employees_info as $v_employee_info) { ?>
                                <?php if ($v_employee_info['access_label'] != 1) { ?>
                                    <tr>
                                        <td><?php echo $sl++; ?></td>
                                        <td><?php echo $v_employee_info['first_name'] . " " . $v_employee_info['last_name']; ?></td>
                                        <td>
                                            <?php
                                            $access_label = $v_employee_info['access_label'];
                                            if($access_label == 1){
                                                echo 'Super Admin';
                                            }elseif ($access_label == 2) {
                                                echo 'Admin';
                                            }else{
                                                echo 'User';
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $v_employee_info['username']; ?></td>
                                        <td><?php echo $v_employee_info['email_address']; ?></td>
                                        <td><?php echo $v_employee_info['mobile_number']; ?></td>
                                        <td>
                                            <?php
                                            $avatar = $v_employee_info['avatar'];
                                            if (!empty($avatar)) {
                                                $profile_picture = base_url('assets/uploaded_files/profile_img/resize/' . $avatar);
                                            } else {
                                                $profile_picture = base_url('assets/backend/dist/img/user4-128x128.jpg');
                                            }
                                            ?>
                                            <img src="<?php echo $profile_picture; ?>" alt="" width="70" class="img-responsive img-bordered img-rounded">
                                        </td>
                                        <td><?php echo date("d F Y", strtotime($v_employee_info['date_added'])); ?></td>
                                        <td>
                                            <?php
                                            $status = $v_employee_info['activation_status'];
                                            if ($status == 1) {
                                                echo "<a href='" . base_url('admin/peoples/deactivate_employee/' . $v_employee_info['user_id'] . '.html') . "' class='btn btn-block btn-success btn-xs' data-toggle='tooltip' title='Click to deactivate'><i class='fa fa-arrow-down'></i> Active</a>";
                                            } else {
                                                echo "<a href='" . base_url('admin/peoples/activate_employee/' . $v_employee_info['user_id'] . '.html') . "' class='btn btn-block btn-warning btn-xs' data-toggle='tooltip' title='Click to activate'><i class='fa fa-arrow-up'></i> Deactive</a>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url('employees/edit_employee/' . $v_employee_info['user_id'] . 'html'); ?>" class="btn btn-info btn-xs" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo base_url('admin/peoples/remove_employee/' . $v_employee_info['user_id'] . '.html') ?>" class="btn btn-danger btn-xs check_delete" data-toggle="tooltip" title="Delete"><i class="fa fa-remove"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- /.table -->
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
</section>