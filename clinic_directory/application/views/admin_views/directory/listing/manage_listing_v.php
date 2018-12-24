<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Listing
        <small>Manage Listing</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard.html'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-cogs"></i> Directory</a></li>
        <li><a class="active"><i class="fa fa-cogs"></i> Manage Listing</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Listing</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>

        <!-- form start -->
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL#</th>
                                <th>Listing Name</th>
                                <th>Category Name</th>
                                <th>City Name</th>
                                <th>Logo</th>
                                <th>Date Added</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sl = 1; ?>
                            <?php foreach ($listing_info as $v_listing_info) { ?>
                                <tr>
                                    <td><?php echo $sl++; ?></td>
                                    <td><a target="_blank" href="<?php echo base_url('listing/listing_details/' . $v_listing_info['listing_id'] . '.html'); ?>"><?php echo $v_listing_info['company_name']; ?></a></td>
                                    <td><?php echo $v_listing_info['category_name']; ?></td>
                                    <td><?php echo $v_listing_info['city_name']; ?></td>
                                    <td>
                                        <?php
                                        $company_logo = '';
                                        if (!empty($v_listing_info['company_logo'])) {
                                            $company_logo = "assets/uploaded_files/company_logo/resize/" . $v_listing_info['company_logo'];
                                        } else {
                                            $company_logo = "assets/uploaded_files/company_logo/logo_not_available.png";
                                        }
                                        ?>
                                        <img src="<?php echo base_url($company_logo); ?>" width="70" alt="<?php echo $v_listing_info['company_name']; ?>" class="img-responsive img-bordered img-rounded"/>
                                    </td>
                                    <td><?php echo date("d F Y", strtotime($v_listing_info['date_added'])); ?></td>
                                    <td>
                                        <?php
                                        $verification_status = $v_listing_info['verification_status'];
                                        if ($verification_status == 1) {
                                            echo "<a href='" . base_url('admin/directory/listing/unvrified_listing/' . $v_listing_info['listing_id'] . '.html') . "' class='btn btn-block btn-success btn-xs' data-toggle='tooltip' title='Click to unverified'><i class='fa fa-arrow-down'></i> Vrified</a>";
                                        } else {
                                            echo "<a href='" . base_url('admin/directory/listing/vrified_listing/' . $v_listing_info['listing_id'] . '.html') . "' class='btn btn-block btn-warning btn-xs' data-toggle='tooltip' title='Click to vrified'><i class='fa fa-arrow-up'></i> Unverified</a>";
                                        }
                                        
                                        $is_featured = $v_listing_info['is_featured'];
                                        if ($is_featured == 1) {
                                            echo "<a href='" . base_url('admin/directory/listing/unfeatured_listing/' . $v_listing_info['listing_id'] . '.html') . "' class='btn btn-block btn-success btn-xs' data-toggle='tooltip' title='Click to unfeatured'><i class='fa fa-arrow-down'></i> Featured</a>";
                                        } else {
                                            echo "<a href='" . base_url('admin/directory/listing/featured_listing/' . $v_listing_info['listing_id'] . '.html') . "' class='btn btn-block btn-warning btn-xs' data-toggle='tooltip' title='Click to featured'><i class='fa fa-arrow-up'></i> Unfeatured</a>";
                                        }

                                        $status = $v_listing_info['publication_status'];
                                        if ($status == 1) {
                                            echo "<a href='" . base_url('admin/directory/listing/unpublished_listing/' . $v_listing_info['listing_id'] . '.html') . "' class='btn btn-block btn-success btn-xs' data-toggle='tooltip' title='Click to unpublished'><i class='fa fa-arrow-down'></i> Published</a>";
                                        } else {
                                            echo "<a href='" . base_url('admin/directory/listing/published_listing/' . $v_listing_info['listing_id'] . '.html') . "' class='btn btn-block btn-warning btn-xs' data-toggle='tooltip' title='Click to published'><i class='fa fa-arrow-up'></i> Unpublished</a>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('admin/directory/listing/remove_listing/' . $v_listing_info['listing_id'] . '.html') ?>" class="btn btn-danger btn-xs check_delete" data-toggle="tooltip" title="Delete"><i class="fa fa-remove"></i> Remove</a>
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