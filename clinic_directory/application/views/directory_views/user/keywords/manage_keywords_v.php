<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
    .keyword-table thead tr th{
        font-weight: bold;
        font-size: 14px;
    }
    .keyword-table tbody tr td{
        font-size: 14px;
    }
    .keyword-table tbody tr td a{
        font-size: 14px;
        text-align: left
    }
</style>
<div class="row content-title">
    <div class="col-md-6 col-sm-6 col-xs-6">
        <h6 class="pull-left"> Manage Keyword</h6>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
        <ul class="list-inline pull-right">
            <li><a href="<?php echo base_url('user/dashboard.html'); ?>"><i class="fa fa-home"></i> Dashboard</a></li> >
            <li><a class="active"> Manage Keyword</a></li>
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
    <div class="col-md-12 col-sm-12 col-xs-12 padding-top-10">
        <a href="<?php echo base_url('user/keywords/add_keyword.html'); ?>" class="btn bggreen-2 add-btn"><i class="fa fa-plus"></i> Add keyword</a>
        <br> <br>
        <table class="table table-striped keyword-table">
            <thead>
                <tr>
                    <th>SL#</th>
                    <th>Keyword</th>
                    <th>Company Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $sl = 1; ?>
                <?php foreach ($keywords_info as $v_keyword_info) { ?>
                    <tr>
                        <td><?php echo $sl++; ?></td>
                        <td><?php echo $v_keyword_info['keyword_name']; ?></td>
                        <td><?php echo $v_keyword_info['company_name']; ?></td>
                        <td>
                            <a href="<?php echo base_url('user/keywords/edit_keyword/' . $v_keyword_info['keyword_id'] . '.html'); ?>"><i class="fa fa-edit"></i> Edit</a>
                            <a href="<?php echo base_url('user/keywords/remove_keyword/' . $v_keyword_info['keyword_id'] . '.html'); ?>"><i class="fa fa-remove"></i> Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- End Add Container -->