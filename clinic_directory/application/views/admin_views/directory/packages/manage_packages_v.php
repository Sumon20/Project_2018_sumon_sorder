<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Packages
        <small>Manage Packages</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard.html'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-cogs"></i> Directory</a></li>
        <li><a class="active"><i class="fa fa-cogs"></i> Manage Packages</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Packages</h3>

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
                    <a href="<?php echo base_url('directory/packages/add_package.html'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add Package </a>
                </div>
                <div class="col-md-12" style="margin-top: 25px;">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL#</th>
                                <th>Package Name</th>
                                <th>Price</th>
                                <th>Listing</th>
                                <th>Images</th>
                                <th>Videos</th>
                                <th>Products</th>
                                <th>Services</th>
                                <th>Articles</th>
                                <th>Keywords</th>
                                <!--<th>Added By</th>
                                <th>Date Added</th>
                                <th>Last Updated</th>-->
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sl = 1; ?>
                            <?php foreach ($packages_info as $v_package_info) { ?>
                                <tr>
                                    <td><?php echo $sl++; ?></td>
                                    <td><?php echo $v_package_info['package_name']; ?></td>
                                    <td><?php echo $v_package_info['price']; ?></td>
                                    <td><?php echo $v_package_info['listing']; ?></td>
                                    <td><?php echo $v_package_info['images']; ?></td>
                                    <td><?php echo $v_package_info['videos']; ?></td>
                                    <td><?php echo $v_package_info['products']; ?></td>
                                    <td><?php echo $v_package_info['services']; ?></td>
                                    <td><?php echo $v_package_info['articles']; ?></td>
                                    <td><?php echo $v_package_info['keywords']; ?></td>
                                    <!--<td><?php //echo $v_package_info['first_name'] . " " . $v_package_info['last_name']; ?></td>
                                    <td><?php //echo date("d F Y", strtotime($v_package_info['date_added'])); ?></td>
                                    <td>
                                        <?php
//                                        $last_updated = $v_package_info['last_updated'];
//                                        if(!empty($last_updated)){
//                                            echo date("d F Y", strtotime($last_updated));
//                                        }
                                        ?>
                                    </td>-->
                                    <td>
                                        <?php
                                        $status = $v_package_info['publication_status'];
                                        if ($status == 1) {
                                            echo "<a href='" . base_url('admin/directory/packages/unpublished_package/' . $v_package_info['package_id'] . '.html') . "' class='btn btn-block btn-success btn-xs' data-toggle='tooltip' title='Click to unpublished'><i class='fa fa-arrow-down'></i> Published</a>";
                                        } else {
                                            echo "<a href='" . base_url('admin/directory/packages/published_package/' . $v_package_info['package_id'] . '.html') . "' class='btn btn-block btn-warning btn-xs' data-toggle='tooltip' title='Click to published'><i class='fa fa-arrow-up'></i> Unpublished</a>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('directory/packages/edit_package/' . $v_package_info['package_id'] . 'html'); ?>" class="btn btn-info btn-xs" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo base_url('admin/directory/packages/remove_package/' . $v_package_info['package_id'] . '.html') ?>" class="btn btn-danger btn-xs check_delete" data-toggle="tooltip" title="Delete"><i class="fa fa-remove"></i></a>
                                    </td>
                                </tr>
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