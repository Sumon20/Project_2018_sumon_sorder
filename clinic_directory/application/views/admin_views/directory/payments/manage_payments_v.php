<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Subscribers
        <small>Manage Payments</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard.html'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-cogs"></i> Directory</a></li>
        <li><a class="active"><i class="fa fa-cogs"></i> Manage Payments</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Payments</h3>

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
                    <table id="example2" class="table table-bordered table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>SL#</th>
                                <th>User Name</th>
                                <th>Package</th>
                                <th>Company Name</th>
                                <th>Payment Purpose</th>
                                <th>Payment Type</th>
                                <th>Amount</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sl = 1; ?>
                            <?php foreach ($paymments_info as $v_paymment_info) { ?>
                                <tr>
                                    <td><?php echo $sl++; ?></td>
                                    <td><?php echo $v_paymment_info['first_name'] . " " . $v_paymment_info['last_name']; ?></td>
                                    <td><?php echo $v_paymment_info['package_name'] . " - " . $v_paymment_info['price'] . "$"; ?></td>
                                    <td><a target="_blank" href="<?php echo base_url('listing/listing_details/' . $v_paymment_info['listing_id'] . '.html'); ?>"><?php echo $v_paymment_info['company_name']; ?></a></td>
                                    <td>
                                        <?php
                                        $payment_purpose = $v_paymment_info['payment_purpose'];
                                        if ($payment_purpose == 1) {
                                            echo 'Buy Package';
                                        } elseif ($payment_purpose == 2) {
                                            echo 'Upgrade Package';
                                        } elseif ($payment_purpose == 3) {
                                            echo 'Featured Business';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($v_paymment_info['payment_type'] == 1) {
                                            echo 'PayPal';
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $v_paymment_info['amount']; ?>$</td>
                                    <td><?php echo date("d F Y", strtotime($v_paymment_info['date_added'])); ?></td>
                                    <td>
                                        <?php if ($v_paymment_info['status'] == 1) { ?>
                                            <a class="btn btn-success btn-xs" data-toggle="tooltip" title="Paid"><i class="fa fa-check"></i> Paid</a>
                                        <?php } else { ?>
                                            <a href="<?php echo base_url('directory/payments/confirm/' . $v_paymment_info['payment_id'] . '.html') ?>" class="btn btn-warning btn-xs check_delete" data-toggle="tooltip" title="Click to confirm"><i class="fa fa-arrow-up"></i> Pending</a>
                                        <?php }
                                        ?>
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