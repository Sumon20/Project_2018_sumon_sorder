<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div class="panel panel-default thumbnail">
            <div class="panel-heading">
                <dl class="dl-horizontal">
                    <dt>Full Name</dt><dd><?= $enquiry->name ?></dd>
                    <dt>Email Address</dt><dd><?= $enquiry->email ?></dd>
                    <dt>Phone Number</dt><dd><?= $enquiry->phone ?></dd>
                    <dt>Read</dt><dd><?php echo (!empty($enquiry->checked)?"<span class='label label-success'>Yes</label>":"<span class='label label-danger'>No</label>"); ?></dd>
                    <dt>Ip Address</dt><dd><?= $enquiry->ip_address ?></dd>
                    <dt>User Agent</dt><dd><?= $enquiry->user_agent ?></dd>
                    <dt>Checked By</dt><dd><?= $enquiry->firstname." ".$enquiry->lastname ?></dd>
                    <dt>Enquiry Date</dt><dd><?= $enquiry->created_date ?></dd>
                </dl>
            </div>
            <div class="panel-body">
                <h3 class="heading">Enquiry</h3>
                <?= $enquiry->enquiry ?>
            </div>
            <div class="panel-footer">
                <div class="btn-group">
                    <a href="<?php echo base_url("enquiry") ?>" class="btn btn btn-primary">Enquires</a> 
                    <a href="<?php echo base_url("enquiry/delete/$enquiry->enquiry_id") ?>" class="btn btn btn-danger" onclick="return confirm('Are you sure ?')">Delete</a> 
                </div>
            </div>
        </div>
    </div>
</div>
 
 







