<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default">
 
            <div class="panel-heading">
                <a href="<?= base_url('website/slider/create') ?>" class="btn btn-sm btn-info">New Slider</a>
            </div>

            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Photo</th>
                            <th>Title</th>
                            <th>Sub Title</th>
                            <th>Description</th>
                            <th>Position</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($sliders)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($sliders as $slider) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><img src="<?php echo (!empty($slider->image)?base_url($slider->image):null); ?>" alt="" class="img-responsive img-thumbnail" height="100"></td>
                                    <td><?php echo $slider->title; ?></td>
                                    <td><?php echo $slider->subtitle; ?></td>
                                    <td><?php echo character_limiter($slider->description,160); ?></td>
                                    <td><?php echo $slider->position; ?></td>
                                    <td><?php echo (($slider->status==1)?"Active":"Inactive"); ?></td>
                                    <td class="center">
                                        <a href="<?php echo base_url("website/slider/edit/$slider->id") ?>" class="btn btn-xs block btn-warning">Edit</a> 
                                        <a href="<?php echo base_url("website/slider/delete/$slider->id") ?>" onclick="return confirm('Are you sure ?')" class="btn btn-xs block btn-danger">Delete</a> 
                                    </td>
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
            </div>
        </div>
    </div>
</div>