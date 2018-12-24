<nav class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <?php $logo = $this->session->userdata('logo'); ?>
        <a class="navbar-brand hidden-md hidden-lg hidden-sm" href="<?php //echo base_url() ?>">
            <img src="<?php  echo (!empty($logo)?base_url($logo):base_url("assets/images/logo.png")) ?>" height="25" alt="Logo">
        </a>
    </div>
    <!-- /.navbar-header -->
    <div class="logo hidden-xs">
        <a href="<?php echo base_url('dashboard/home') ?>" title="<?php echo base_url() ?>">
            <img src="<?php echo (!empty($logo)?base_url($logo):base_url("assets/images/logo.png")) ?>" height="25" alt="Logo">
        </a> 

        <div class="menu-options"><span class="menu-action"><i></i></span></div>
    </div> 
    <ul class="nav navbar-top-links navbar-right">
        <li><strong>Setting</strong></li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="menu-icon flaticon-settings"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="<?php echo base_url('dashboard/profile'); ?>"><i class="fa fa-user fa-fw"></i> Profile</a>
                </li>
                <li><a href="<?php echo base_url('logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a></a>
                </li>
            </ul> <!-- /.dropdown-user -->
        </li> <!-- /.dropdown -->
    </ul> <!-- /.navbar-top-links -->



    <!-- sideber area -->
    <div class="sideber-inner navbar-collapse">

        <div class="admin-details hidden-xs">
            <?php $picture = $this->session->userdata('picture'); ?>
            <span><img src="<?php echo (!empty($picture)?base_url($picture):base_url("assets/images/no-img.png")) ?>" alt="" height="60"></span>
            <h3><?php echo $this->session->userdata('fullname') ?></h3>
            <?php $user_role = $this->session->userdata('user_role') ?>
            <i>
                <?php 
                    if ($user_role == 1) {
                        echo "Admin";
                    } elseif ($user_role == 2) {
                        echo "Doctor";
                    } else {
                        echo "Representative";
                    }  
                ?>
            </i> 
        </div>


        <div class="sidebar" role="navigation">
            <div class="sidebar-nav">
                <ul class="nav" id="side-menu">
  
                    <!-- ADMIN  -->
                    <?php if ($this->session->userdata('user_role') == 1) { ?>


                    <li><a href="<?php echo base_url('dashboard/home') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li> 
                    <!-- <li><a href="http://localhost/clinic_directory/user/dashboard.html"><i class="fa fa-dashboard fa-fw"></i>Clinic Listing</a></li>  -->
                    
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Department<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url("department/create") ?>">Add Department</a></li>
                            <li><a href="<?php echo base_url("department") ?>">Department List</a></li>
                        </ul>
                    </li>
                    
                    

                    <li>
                        <a href="#"><i class="fa fa-user-md fa-fw"></i> Doctor<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url("doctor/create") ?>">Add Doctor</a></li> 
                            <li><a href="<?php echo base_url("doctor") ?>">Doctor List</a></li>
                        </ul>
                    </li> 

                     <li>
                        <a href="#"><i class="fa fa-user fa-fw"></i> Representative<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url("representative/create") ?>">Add Representative</a></li>
                            <li><a href="<?php echo base_url("representative") ?>">Representative List</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-wheelchair fa-fw"></i> Patient<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url("patient/create") ?>">Add Patient</a></li> 
                            <li><a href="<?php echo base_url("patient") ?>">Patient List</a></li>
                        </ul>
                    </li>
 
                    <li>
                        <a href="#"><i class="fa fa-calendar fa-fw"></i> Schedule<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url("schedule/create") ?>">Add Schedule</a></li>
                            <li><a href="<?php echo base_url("schedule") ?>">Schedule List</a></li>
                        </ul>
                    </li>

                     <li>
                        <a href="#"><i class="fa fa-files-o fa-fw"></i> Appointment<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url("appointment/create") ?>">Add Appointment</a></li>
                            <li><a href="<?php echo base_url("appointment") ?>">Appointment List</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url('enquiry') ?>"><i class="fa fa-question-circle fa-fw"></i> Enquiry</a></li>
                    <li><a href="<?php echo base_url('setting') ?>"><i class="fa fa-wrench fa-fw"></i> Setting</a></li>


                    <li>
                        <a href="#"><i class="fa fa-pie-chart fa-fw"></i> Appointment Report<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url("report/assign_by_all") ?>"> Assign by All </a></li>
                            <li><a href="<?php echo base_url("report/assign_by_all_doctor") ?>"> Assign by Doctor</a></li>                    
                            <li><a href="<?php echo base_url("report/assign_by_all_representative") ?>"> Assign by Representative </a></li>
                            <li><a href="<?php echo base_url("report/assign_to_all_doctor") ?>"> Assign to Doctor</a></li> 
                        </ul>
                    </li>


                                      

                    
                    <?php } ?>
                    <!-- 
                    --------------------------------------------------
                    -----------ONLY ACCESS BY DOCTOR------------------ 
                    -------------------------------------------------- 
                    -->


                    <?php if ($this->session->userdata('user_role') == 2) { ?>
                    <li><a href="<?php echo base_url("patient/create") ?>"><i class="fa fa-wheelchair fa-fw"></i> Add Patient</a></li> 

                    <li>
                        <a href="#"><i class="fa fa-calendar fa-fw"></i> Schedule<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url("schedule/create_by_doctor") ?>">Add Schedule</a></li>
                            <li><a href="<?php echo base_url("schedule/list_by_doctor") ?>">Schedule List</a></li>
                        </ul>
                    </li> 

                    <li><a href="<?php echo base_url("appointment/create") ?>"><i class="fa fa-files-o fa-fw"></i> Add Appointment</a></li> 

                    <li>
                        <a href="#"><i class="fa fa-pie-chart fa-fw"></i> Report<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url("report/assign_by_me") ?>">Assign by Me</a></li>  
                            <li><a href="<?php echo base_url("report/assign_to_me") ?>"> Assign to Me </a></li>                  
                        </ul>
                    </li>   
                    <?php } ?> 


                    <!-- 
                    --------------------------------------------------
                    -----------ONLY ACCESS BY REPRESENTATIVE---------- 
                    -------------------------------------------------- 
                    -->


                    <?php if ($this->session->userdata('user_role') == 3) { ?>

                    <li><a href="<?php echo base_url("patient/create") ?>"><i class="fa fa-wheelchair fa-fw"></i> Add Patient</a></li> 

                    <li><a href="<?php echo base_url("appointment/create") ?>"><i class="fa fa-files-o fa-fw"></i> Add Appointment</a></li> 

                    <li>
                        <a href="#"><i class="fa fa-pie-chart fa-fw"></i> Report<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url("report/assign_by_me") ?>">Assign by Me</a></li>  
                        </ul>
                    </li>   
                    <?php } ?> 


                    <!-- 
                    --------------------------------------------------
                    -----------      ONLY ACCESS BY ADMIN         ----
                    -------------------------------------------------- 
                    -->


                    <?php if ($this->session->userdata('user_role') == 1) { ?>
                    <li>
                        <a href="#"><i class="fa fa-globe"></i> Website<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url('website/setting') ?>">Setting</a></li>

                            <li><a href="<?php echo base_url('website/slider') ?>">Slider</a></li> 

                            <li><a href="<?php echo base_url('website/section') ?>">Section</a></li> 

                            <li><a href="<?php echo base_url('website/item') ?>">Section Item</a></li> 

                            <li><a href="<?php echo base_url('website/comment') ?>">Comments</a></li> 
                        </ul>
                    </li>   
                    <?php } ?> 
  
 



                  


                    

                </ul>
            </div>
        </div>
    </div>
</nav>



