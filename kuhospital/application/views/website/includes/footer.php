<footer id="contact">
    <div class="container">
        <div class="row"> 

            <div class="col-sm-12">
               <div class="output hide alert"></div>
            </div>

            <div class="col-sm-9">
                <div class="appointment-link">
                    <div class="ap-inner">
                        <div class="ap-icon">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </div>
                        <div class="ap-text">
                            <h3>Need a Doctor for Check-up?</h3>
                            <h2>JUST MAKE AN APPOINTMENT & YOU'RE DONE ! </h2>
                        </div>
                    </div>
                    <div class="ap-btn">
                        <a href="<?= base_url('#appointment') ?>" class="thm-btn page-scroll">get an appointment</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-3"> 
                <?= form_open('enquiry/create', 'id="enquiryForm"') ?>
                  <div class="form-group">
                    <input type="name" name="name" class="form-control" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input type="phone" name="phone" class="form-control" placeholder="Phone">
                  </div>
                  <div class="form-group">
                    <textarea name="enquiry" class="form-control" placeholder="Enquiry"></textarea> 
                  </div> 
                  <div class="form-group"> 
                    <button type="submit" class="thm-btn page-scroll pull-right">Submit</button>
                  </div>  
                <?= form_close(); ?>
            </div>   
        </div>
        <div class="row">
            <!-- Address -->
            <div class="col-md-3 col-sm-6">
                <div class="footer-box address-inner">
                    <img src="<?= (!empty($setting->logo)?base_url($setting->logo):base_url('assets_web/images/icons/logo.png')) ?>" alt="">
                    <p><?= (!empty($setting->description)?character_limiter($setting->description,100):null) ?></p>
                    <div class="address">
                        <?php if (!empty($setting->address)): ?>
                        <i class="flaticon-placeholder"></i>
                        <p><?= $setting->address ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="address">
                        <?php if (!empty($setting->phone)): ?>
                        <i class="flaticon-customer-service"></i>
                        <p><?= $setting->phone ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="address">
                        <?php if (!empty($setting->email)): ?>
                        <i class="flaticon-mail"></i>
                        <p><a href="mailto:<?= $setting->email ?>"><?= $setting->email ?></a> </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            
            
            
            
            
        </div>
    </div>
</footer> 

<div class="sub-footer">
    <div class="container">
        <div class="row">
            <p><?= (!empty($setting->copyright_text)?$setting->copyright_text:null) ?></p>
        </div>
    </div>
</div>