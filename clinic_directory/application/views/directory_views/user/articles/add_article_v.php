<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row content-title">
    <div class="col-md-6 col-sm-6 col-xs-6">
        <h6 class="pull-left"> Add Article</h6>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
        <ul class="list-inline pull-right">
            <li><a href="<?php echo base_url('user/dashboard.html'); ?>"><i class="fa fa-home"></i> Dashboard</a></li> >
            <li><a href="<?php echo base_url('user/articles.html'); ?>"> Manage Articles</a></li> > 
            <li><a class="active"> Add Article</a></li>
        </ul>
    </div>
</div>

<?php
$success = $this->session->userdata('success');
$exception = $this->session->userdata('exception');
if (!empty($success)) {
    echo "<div class='row content-title'>
            <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='notification'>
                    <span class='success-message'>" . $success . "</span>
                </div>
            </div>
        </div>";
    $this->session->unset_userdata('success');
} else if (!empty($exception)) {
    echo "<div class='row content-title'>
            <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='notification'>
                    <span class='error-message'>" . $exception . "</span>
                </div>
            </div>
        </div>";
    $this->session->unset_userdata('exception');
}
?>

<!-- Star Add Container -->
<div class="row manage-container">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <?php
        $package_info = package_info();
        if ($count_articles < $package_info['articles']) {
            ?>
            <form name="add_article_form" class="custom-form" action="<?php echo base_url('user/articles/store_article_details.html'); ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="article_name">Title <span class="required-field">*</span></label>
                            <input type="text" name="article_name" value="<?php echo set_value('article_name'); ?>" class="form-control margin-top-5" id="article_name" placeholder="Enter company name">
                            <span class="error-message"><?php echo form_error('article_name'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="article_details">Article Details <span class="required-field">*</span></label>
                            <textarea rows="4" name="article_details" class="form-control margin-top-5" id="article_details" placeholder="Enter article details"><?php echo set_value('article_details'); ?></textarea>
                            <span class="error-message"><?php echo form_error('article_details'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="listing_id">Company Name <span class="required-field">*</span></label>
                            <select name="listing_id" class="form-control margin-top-5" id="listing_id">
                                <option value="" selected="" disabled="">Select one</option>
                                <?php
                                foreach ($listing_info as $v_listing_info) {
                                    echo "<option value='" . $v_listing_info['listing_id'] . "'>" . $v_listing_info['company_name'] . "</option>";
                                }
                                ?>
                            </select>
                            <span class="error-message"><?php echo form_error('listing_id'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="picture_name">Upload Picture <span class="required-field">*</span></label>
                            <input name="picture_name" class="margin-top-5" type="file" id="picture_name">
                            <span class="help-block"><strong>Note:</strong> Only .jpg .png .jpeg .gif allowed. <br>(width article will better view such as <strong>320x480</strong> pixel)</span>
                            <span class="error-message"><?php echo form_error('picture_name'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                        <a href="<?php echo base_url('user/articles.html'); ?>" class="btn btn-danger btn-custom"><i class="fa fa-remove"></i> Cancel</a>
                        <button type="submit" class="btn btn-success btn-custom"><i class="fa fa-plus"></i> Add Info</button>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </form>
        <?php } else { ?>
            <p>You need to upgrade your package for add more Articles. Please upgrade your package.</p>
        <?php } ?>
    </div>
</div>
<!-- End Add Container -->

<script type="text/javascript">
    document.forms['add_article_form'].elements['listing_id'].value = '<?php echo set_value('listing_id'); ?>';
</script>