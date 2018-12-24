<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Sub-category
        <small>Add Sub-category</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard.html'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-cogs"></i> Directory</a></li>
        <li><a href="<?php echo base_url('directory/sub_categories.html'); ?>"><i class="fa fa-cogs"></i> Manage Sub_categories</a></li>
        <li><a class="active"><i class="fa fa-cogs"></i> Add Sub-category</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Add Sub-category</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>

        <!-- form start -->
        <form role="form" name="sub_category_add_form" action="<?php echo base_url('admin/directory/sub_categories/create_sub_category.html'); ?>" method="post">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sub_category_name">Sub-category Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <input type="text" name="sub_category_name" value="<?php echo set_value('sub_category_name'); ?>" class="form-control" id="sub_category_name" placeholder="Enter sub_category name">
                            </div>
                            <span class="help-block error-message"><?php echo form_error('sub_category_name'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category_id">Category Name</label>
                            <select name="category_id" class="form-control" id="category_id">
                                <option value="" selected="" disabled="">Select one</option>
                                <?php foreach ($categories_info as $v_category_info){ ?>
                                <option value="<?php echo $v_category_info['category_id']; ?>"><?php echo $v_category_info['category_name']; ?></option>
                                <?php } ?>
                            </select>
                            <span class="help-block error-message"><?php echo form_error('publication_status'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" id="description" placeholder="Enter sub_category description" rows="4"><?php echo set_value('description'); ?></textarea>
                            <span class="help-block error-message"><?php echo form_error('description'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="publication_status">Publication Status</label>
                            <select name="publication_status" class="form-control" id="publication_status">
                                <option value="" selected="" disabled="">Select one</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                            <span class="help-block error-message"><?php echo form_error('publication_status'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="<?php echo base_url('directory/sub_categories.html'); ?>" class="btn btn-danger" data-toggle="tooltip" title="Go back"><i class="fa fa-remove"></i> Cancel</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Add Info</button>
            </div>
        </form>
        <!-- /.form -->
    </div>
</section>
<script type="text/javascript">
    document.forms['sub_category_add_form'].elements['category_id'].value = '<?php echo set_value('category_id'); ?>';
    document.forms['sub_category_add_form'].elements['publication_status'].value = '<?php echo set_value('publication_status'); ?>';
</script>