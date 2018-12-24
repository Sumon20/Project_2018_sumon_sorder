<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Packages
        <small>Edit Package </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard.html'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-cogs"></i> Directory</a></li>
        <li><a href="<?php echo base_url('directory/packages.html'); ?>"><i class="fa fa-cogs"></i> Manage Packages</a></li>
        <li class="active"><i class="fa fa-circle-o"></i> Edit Package </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Package </h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>

        <!-- form start -->
        <form role="form" name="package_edit_form" action="<?php echo base_url('admin/directory/packages/update_package/' . $package_info['package_id'] . '.html'); ?>" method="post">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="package_name">Package Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <input type="text" name="package_name" value="<?php echo $package_info['package_name']; ?>" class="form-control" id="package_name" placeholder="Enter package_name name">
                            </div>
                            <span class="help-block error-message"><?php echo form_error('package_name'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">Price</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                <input type="number" name="price" value="<?php echo $package_info['price']; ?>" class="form-control" id="price" placeholder="Enter price">
                            </div>
                            <span class="help-block error-message"><?php echo form_error('price'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="listing">Listing</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                <input type="number" name="listing" value="<?php echo $package_info['listing']; ?>" class="form-control" id="listing" placeholder="Enter number of listing">
                            </div>
                            <span class="help-block error-message"><?php echo form_error('listing'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="images">Images</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-image"></i></span>
                                <input type="number" name="images" value="<?php echo $package_info['images']; ?>" class="form-control" id="images" placeholder="Enter number of images">
                            </div>
                            <span class="help-block error-message"><?php echo form_error('images'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="videos">Videos</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-video-camera"></i></span>
                                <input type="number" name="videos" value="<?php echo $package_info['videos']; ?>" class="form-control" id="videos" placeholder="Enter number of videos">
                            </div>
                            <span class="help-block error-message"><?php echo form_error('videos'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="products">Products</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <input type="number" name="products" value="<?php echo $package_info['products']; ?>" class="form-control" id="products" placeholder="Enter number of products">
                            </div>
                            <span class="help-block error-message"><?php echo form_error('products'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="services">Services</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-cog"></i></span>
                                <input type="number" name="services" value="<?php echo $package_info['services']; ?>" class="form-control" id="services" placeholder="Enter number of services">
                            </div>
                            <span class="help-block error-message"><?php echo form_error('services'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="articles">Articles</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-book"></i></span>
                                <input type="number" name="articles" value="<?php echo $package_info['articles']; ?>" class="form-control" id="articles" placeholder="Enter number of articles">
                            </div>
                            <span class="help-block error-message"><?php echo form_error('articles'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="keywords">Keywords</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                <input type="number" name="keywords" value="<?php echo $package_info['keywords']; ?>" class="form-control" id="keywords" placeholder="Enter number of keywords">
                            </div>
                            <span class="help-block error-message"><?php echo form_error('keywords'); ?></span>
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
                            <textarea name="description" class="form-control" id="description" placeholder="Enter description" rows="4"><?php echo $package_info['description']; ?></textarea>
                            <span class="help-block error-message"><?php echo form_error('description'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="<?php echo base_url('directory/packages.html'); ?>" class="btn btn-danger" data-toggle="tooltip" title="Go back"><i class="fa fa-remove"></i> Cancel</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Update Info</button>
            </div>
        </form>
        <!-- /.form -->
    </div>
</section>
<script type="text/javascript">
    document.forms['package_edit_form'].elements['publication_status'].value = '<?php echo $package_info['publication_status']; ?>';
</script>