<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 hidden-xs hidden-sm">
                <img src="<?= (!empty($section['about']['featured_image'])?base_url($section['about']['featured_image']):null) ?>" class="img-responsive" alt="">
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="about-des">
                <?php 
                if (!empty($items['about'])):
                foreach ($items['about'] as $about):
                ?>   
                    <h3><?= $about['title'] ?></h3>
                    <p><?= character_limiter($about['description'],255) ?></p>
                   
                    <hr>
                <?php
                endforeach;
                endif;
                ?>   
                </div>
            </div>
        </div>
    </div>
</section> 

 