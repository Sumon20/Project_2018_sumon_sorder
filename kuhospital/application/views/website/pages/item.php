<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default">
 
            <div class="panel-heading">
                <a href="<?= base_url('website/item/create') ?>" class="btn btn-sm btn-info">New Item</a>
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
                            <th>Position</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($items)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($items as $item) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><img src="<?php echo (!empty($item->icon_image)?base_url($item->icon_image):base_url('assets_web/images/icons/no-img.png')); ?>" alt="" class="img-responsive img-thumbnail" width="48"></td>
                                    <td><?php echo $item->name; ?></td>
                                    <td><?php echo $item->title; ?></td>
                                    <td><?php echo character_limiter($item->description,100); ?></td>
                                    <td><?php echo $item->position; ?></td>
                                    <td><?php echo date('d, M Y',strtotime($item->date)); ?></td>
                                    <td class="center">
                                        <a href="<?php echo base_url("website/item/edit/$item->id") ?>" class="btn btn-xs block btn-warning">Edit</a> 
                                        <a href="<?php echo base_url("website/item/delete/$item->id") ?>" onclick="return confirm('Are you sure ?')" class="btn btn-xs block btn-danger">Delete</a> 
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