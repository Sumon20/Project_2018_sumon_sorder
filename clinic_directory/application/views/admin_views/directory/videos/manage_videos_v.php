<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Videos
        <small>Manage Videos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard.html'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-cogs"></i> Directory</a></li>
        <li><a class="active"><i class="fa fa-cogs"></i> Manage Videos</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Videos</h3>

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
                                <th>Video Title</th>
                                <th>Company</th>
                                <th>Category</th>
                                <th>City</th>
                                <!--<th>Image</th>-->
                                <th>Date Added</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sl = 1; ?>
                            <?php foreach ($videos_info as $v_video_info) { ?>
                                <tr>
                                    <td><?php echo $sl++; ?></td>
                                    <td><a target="_blank" href="<?php echo base_url('videos/video_details/' . $v_video_info['video_id'] . '.html'); ?>"><?php echo $v_video_info['video_name']; ?></a></td>
                                    <td><a target="_blank" href="<?php echo base_url('listing/listing_details/' . $v_video_info['listing_id'] . '.html'); ?>"><?php echo $v_video_info['company_name']; ?></a></td>
                                    <td><?php echo $v_video_info['category_name']; ?></td>
                                    <td><?php echo $v_video_info['city_name']; ?></td>
                                    <!--<td>
                                        <?php
                                        //https://youtu.be/LKNHVDPKy7g
                                        //https://www.youtube.com/embed/LKNHVDPKy7g
                                        //$current_url = $v_video_info['video_url'];
                                        //$current_word = array('youtu.be');
                                        //$replace_with = array('www.youtube.com/embed');
                                        //$converted_url = str_replace($current_word, $replace_with, $current_url);
                                        ?>
                                        <iframe width="80" height="80"  src="<?php //echo $converted_url; ?>" frameborder="0" allowfullscreen></iframe>
                                    </td>-->
                                    <td><?php echo date("d F Y", strtotime($v_video_info['date_added'])); ?></td>
                                    <td>
                                        <?php
                                        $status = $v_video_info['publication_status'];
                                        if ($status == 1) {
                                            echo "<a href='" . base_url('directory/listing/videos/unpublished/' . $v_video_info['video_id'] . '.html') . "' class='btn btn-block btn-success btn-xs' data-toggle='tooltip' title='Click to unpublished'><i class='fa fa-arrow-down'></i> Published</a>";
                                        } else {
                                            echo "<a href='" . base_url('directory/listing/videos/published/' . $v_video_info['video_id'] . '.html') . "' class='btn btn-block btn-warning btn-xs' data-toggle='tooltip' title='Click to published'><i class='fa fa-arrow-up'></i> Unpublished</a>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('directory/listing/videos/remove/' . $v_video_info['video_id'] . '.html') ?>" class="btn btn-danger btn-xs check_delete" data-toggle="tooltip" title="Delete"><i class="fa fa-remove"></i> Remove</a>
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


