<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Sub_categories
        <small>Manage Sub-categories</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard.html'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-cogs"></i> Directory</a></li>
        <li><a class="active"><i class="fa fa-cogs"></i> Manage Sub-categories</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Sub-categories</h3>

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
                    <a href="<?php echo base_url('directory/sub_categories/add_sub_category.html'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add Sub-category </a>
                </div>
                <div class="col-md-12" style="margin-top: 25px;">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL#</th>
                                <th>Sub-category Name</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Added By</th>
                                <th>Date Added</th>
                                <th>Last Updated</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sl = 1; ?>
                            <?php foreach ($sub_categories_info as $v_sub_category_info) { ?>
                                <tr>
                                    <td><?php echo $sl++; ?></td>
                                    <td><?php echo $v_sub_category_info['sub_category_name']; ?></td>
                                    <td><?php echo $v_sub_category_info['category_name']; ?></td>
                                    <td><?php echo $v_sub_category_info['description']; ?></td>
                                    <td><?php echo $v_sub_category_info['first_name'] . " " . $v_sub_category_info['last_name']; ?></td>
                                    <td><?php echo date("d F Y", strtotime($v_sub_category_info['date_added'])); ?></td>
                                    <td>
                                        <?php
                                        $last_updated = $v_sub_category_info['last_updated'];
                                        if(!empty($last_updated)){
                                            echo date("d F Y", strtotime($last_updated));
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $status = $v_sub_category_info['publication_status'];
                                        if ($status == 1) {
                                            echo "<a href='" . base_url('admin/directory/sub_categories/unpublished_sub_category/' . $v_sub_category_info['sub_category_id'] . '.html') . "' class='btn btn-block btn-success btn-xs' data-toggle='tooltip' title='Click to unpublished'><i class='fa fa-arrow-down'></i> Published</a>";
                                        } else {
                                            echo "<a href='" . base_url('admin/directory/sub_categories/published_sub_category/' . $v_sub_category_info['sub_category_id'] . '.html') . "' class='btn btn-block btn-warning btn-xs' data-toggle='tooltip' title='Click to published'><i class='fa fa-arrow-up'></i> Unpublished</a>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('directory/sub_categories/edit_sub_category/' . $v_sub_category_info['sub_category_id'] . 'html'); ?>" class="btn btn-info btn-xs" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo base_url('admin/directory/sub_categories/remove_sub_category/' . $v_sub_category_info['sub_category_id'] . '.html') ?>" class="btn btn-danger btn-xs check_delete" data-toggle="tooltip" title="Delete"><i class="fa fa-remove"></i></a>
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