<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default panel-form">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?= form_open_multipart('website/slider/create','class="form-inner"') ?>
                            
                            <input type="hidden" name="id" value="<?= $slider->id ?>">
 

                            <div class="form-group row">
                                <label for="title" class="col-xs-3 col-form-label">Title </label>
                                <div class="col-xs-9">
                                    <input name="title"  type="text" class="form-control" id="title" placeholder="Title" value="<?= $slider->title ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="subtitle" class="col-xs-3 col-form-label">Sub Title </label>
                                <div class="col-xs-9">
                                    <input name="subtitle"  type="text" class="form-control" id="subtitle" placeholder="Sub Title" value="<?= $slider->subtitle ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-xs-3 col-form-label">Description / Sub Title</label>
                                <div class="col-xs-9">
                                    <textarea name="description" class="form-control tinymce"  placeholder="Section Description"  rows="7"><?= $slider->description ?></textarea>
                                </div>
                            </div>

                            <!-- if featured image is already uploaded -->
                            <?php if(!empty($slider->image)) {  ?>
                            <div class="form-group row">
                                <label for="logoPreview" class="col-xs-3 col-form-label"></label>
                                <div class="col-xs-9">
                                    <img src="<?= base_url($slider->image) ?>" alt="Logo" class="img-thumbnail" />
                                </div>
                            </div>
                            <?php } ?>

                            <div class="form-group row">
                                <label for="image" class="col-xs-3 col-form-label">Image <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="image"  type="file" id="image" >
                                    <input type="hidden" name="old_image" value="<?= $slider->image ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="position" class="col-xs-3 col-form-label">Slide Position </label>
                                <div class="col-xs-9">
                                    <input name="position"  type="text" class="form-control" id="position" placeholder="Slide Position" value="<?= (!empty($slider->position)?$slider->position:1) ?>">
                                </div>
                            </div>


                            <!--Radios-->
                            <div class="form-group row">
                                <label class="col-sm-3">Status</label>
                                <div class="col-xs-9"> 
                                    <div class="form-check">
                                        <label class="radio-inline">
                                            <input type="radio" name="status" value="1" <?= set_radio('status', '1', true); ?> >Active
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="status" value="0" <?= set_radio('status', '0'); ?> >Inactive
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="ui buttons">
                                        <button class="ui button">Cancel</button>
                                        <div class="or"></div>
                                        <button class="ui positive button">Save</button>
                                    </div>
                                </div>
                            </div>

                        <?= form_close() ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>