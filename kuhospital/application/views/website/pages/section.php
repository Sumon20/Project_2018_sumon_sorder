<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default">
 
            <div class="panel-heading">
                <a href="<?= base_url('website/section/create') ?>" class="btn btn-sm btn-info">New Section</a>
            </div>

            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Photo</th>
                            <th>Menu Name</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($sections)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($sections as $section) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><img src="<?php echo (!empty($section->featured_image)?base_url($section->featured_image):null); ?>" alt="" class="img-responsive img-thumbnail" width="120"></td>
                                    <td><?php echo $section->name; ?></td>
                                    <td><?php echo $section->title; ?></td>
                                    <td><?php echo character_limiter($section->description, 120); ?></td>
                                    <td class="center">
                                        <a href="<?php echo base_url("website/section/edit/$section->id") ?>" class="btn btn-xs block btn-warning">Edit</a> 
                                        <a href="<?php echo base_url("website/section/delete/$section->id") ?>" onclick="return confirm('Are you sure ?')" class="btn btn-xs block btn-danger">Delete</a> 
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