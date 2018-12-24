<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Country
        <small>Add Country</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard.html'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-cogs"></i> Directory</a></li>
        <li><a href="<?php echo base_url('directory/countries.html'); ?>"><i class="fa fa-cogs"></i> Manage Countries</a></li>
        <li><a class="active"><i class="fa fa-cogs"></i> Add Country</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Add Country</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>

        <!-- form start -->
        <form role="form" name="country_add_form" action="<?php echo base_url('admin/directory/countries/create_country.html'); ?>" method="post">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="country_name">Country Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <input type="text" name="country_name" value="<?php echo set_value('country_name'); ?>" class="form-control" id="country_name" placeholder="Enter country name">
                            </div>
                            <span class="help-block error-message"><?php echo form_error('country_name'); ?></span>
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" id="description" placeholder="Enter country description" rows="4"><?php echo set_value('description'); ?></textarea>
                            <span class="help-block error-message"><?php echo form_error('description'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="<?php echo base_url('directory/countries.html'); ?>" class="btn btn-danger" data-toggle="tooltip" title="Go back"><i class="fa fa-remove"></i> Cancel</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Add Info</button>
            </div>
        </form>
        <!-- /.form -->
    </div>
</section>
<script type="text/javascript">
    document.forms['country_add_form'].elements['publication_status'].value = '<?php echo set_value('publication_status'); ?>';
</script>