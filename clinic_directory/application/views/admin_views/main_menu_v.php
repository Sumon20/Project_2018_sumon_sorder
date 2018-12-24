<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<li class="header">MAIN NAVIGATION</li>
<!-- Optionally, you can add icons to the links -->
<li class="<?php
if ($active_menu == 'dashboard') {
    echo 'active';
}
?>"><a href="<?php echo base_url('dashboard.html'); ?>"><i class="fa fa-dashboard"></i> <span> Dashboard</span></a></li>
<!--<li class="treeview  <?php
if ($active_menu == 'mailbox') {
    echo 'active';
}
?>">
    <a href="#"><i class="fa fa-envelope"></i> <span>Mailbox</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="<?php
if ($active_sub_menu == 'compose_mail') {
    echo 'active';
}
?>"><a href="<?php echo base_url('compose_mail.html'); ?>"><i class="fa fa-circle-o"></i> Compose</a></li>
        <li class="<?php
if ($active_sub_menu == 'inbox_mail') {
    echo 'active';
}
?>"><a href="<?php echo base_url('inbox_mail.html'); ?>"><i class="fa fa-circle-o"></i> Inbox</a></li>
        <li class="<?php
if ($active_sub_menu == 'sent_mail') {
    echo 'active';
}
?>"><a href="<?php echo base_url('sent_mail.html'); ?>"><i class="fa fa-circle-o"></i> Sent</a></li>
        <li class="<?php
if ($active_sub_menu == 'drafts_mail') {
    echo 'active';
}
?>"><a href="<?php echo base_url('drafts_mail.html'); ?>"><i class="fa fa-circle-o"></i> Drafts</a></li>
    </ul>
</li>-->
<li class="treeview <?php
if ($active_menu == 'peoples') {
    echo 'active';
}
?>">
    <a href="#"><i class="fa fa-user-plus"></i> <span> People</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="<?php
        if ($active_sub_menu == 'employees') {
            echo 'active';
        }
        ?>"><a href="<?php echo base_url('employees.html'); ?>"><i class="fa fa-circle-o"></i> Employees</a></li>
        <li class="<?php
        if ($active_sub_menu == 'users') {
            echo 'active';
        }
        ?>"><a href="<?php echo base_url('users.html'); ?>"><i class="fa fa-circle-o"></i> Users</a></li>
    </ul>
</li>
<li class="<?php
if ($active_menu == 'packages') {
    echo 'active';
}
?>"><a href="<?php echo base_url('directory/packages.html'); ?>"><i class="fa fa-tags"></i> <span>Packages</span></a>
</li>
<li class="treeview <?php
if ($active_menu == 'category') {
    echo 'active';
}
?>">
    <a href="#"><i class="fa fa-tag"></i> <span> Category</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="<?php
        if ($active_sub_menu == 'categories') {
            echo 'active';
        }
        ?>"><a href="<?php echo base_url('directory/categories.html'); ?>"><i class="fa fa-circle-o"></i> Manage Categories</a></li>
        <li class="<?php
        if ($active_sub_menu == 'sub_categories') {
            echo 'active';
        }
        ?>"><a href="<?php echo base_url('directory/sub_categories.html'); ?>"><i class="fa fa-circle-o"></i> Manage Sub-categories</a></li>
    </ul>
</li>
<li class="treeview <?php
if ($active_menu == 'location') {
    echo 'active';
}
?>">
    <a href="#"><i class="fa fa-map-marker"></i> <span> Location</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="<?php
        if ($active_sub_menu == 'countries') {
            echo 'active';
        }
        ?>"><a href="<?php echo base_url('directory/countries.html'); ?>"><i class="fa fa-circle-o"></i> Manage Countries</a></li>
        <li class="<?php
        if ($active_sub_menu == 'cities') {
            echo 'active';
        }
        ?>"><a href="<?php echo base_url('directory/cities.html'); ?>"><i class="fa fa-circle-o"></i> Manage Cities</a></li>
    </ul>
</li>
<li class="treeview <?php
if ($active_menu == 'directory') {
    echo 'active';
}
?>">
    <a href="#"><i class="fa fa-briefcase"></i> <span> Directory</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">

        <li class="<?php
        if ($active_sub_menu == 'listing') {
            echo 'active';
        }
        ?>"><a href="<?php echo base_url('directory/listing.html'); ?>"><i class="fa fa-circle-o"></i> Manage Listing</a>
        </li>

        <li class="<?php
        if ($active_sub_menu == 'addlisting') {
            echo 'active';
        }
        ?>"><a href="<?php echo base_url('directory/listing.html'); ?>"><i class="fa fa-circle-o"></i> Add Listing</a>
        </li>

        <li class="<?php
        if ($active_sub_menu == 'images') {
            echo 'active';
        }
        ?>"><a href="<?php echo base_url('directory/listing/images.html'); ?>"><i class="fa fa-circle-o"></i> Manage Images</a>
        </li>
        <li class="<?php
        if ($active_sub_menu == 'videos') {
            echo 'active';
        }
        ?>"><a href="<?php echo base_url('directory/listing/videos.html'); ?>"><i class="fa fa-circle-o"></i> Manage Videos</a>
        </li>
        <li class="<?php
        if ($active_sub_menu == 'products') {
            echo 'active';
        }
        ?>"><a href="<?php echo base_url('directory/listing/products.html'); ?>"><i class="fa fa-circle-o"></i> Manage Products</a>
        </li>
        <li class="<?php
        if ($active_sub_menu == 'services') {
            echo 'active';
        }
        ?>"><a href="<?php echo base_url('directory/listing/services.html'); ?>"><i class="fa fa-circle-o"></i> Manage Services</a>
        </li>
        <li class="<?php
        if ($active_sub_menu == 'articles') {
            echo 'active';
        }
        ?>"><a href="<?php echo base_url('directory/listing/articles.html'); ?>"><i class="fa fa-circle-o"></i> Manage Articles</a>
        </li>
    </ul>
</li>
<li class="treeview <?php
if ($active_menu == 'comments') {
    echo 'active';
}
?>">
    <a href="#"><i class="fa fa-comments"></i> <span> Comments</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="<?php
        if ($active_sub_menu == 'image_comments') {
            echo 'active';
        }
        ?>"><a href="<?php echo base_url('directory/comments/image_comments.html'); ?>"><i class="fa fa-circle-o"></i> Image Comments</a>
        </li>
        <li class="<?php
        if ($active_sub_menu == 'video_comments') {
            echo 'active';
        }
        ?>"><a href="<?php echo base_url('directory/comments/video_comments.html'); ?>"><i class="fa fa-circle-o"></i> Video Comments</a>
        </li>
        <li class="<?php
        if ($active_sub_menu == 'product_comments') {
            echo 'active';
        }
        ?>"><a href="<?php echo base_url('directory/comments/product_comments.html'); ?>"><i class="fa fa-circle-o"></i> Product Comments</a>
        </li>
        <li class="<?php
        if ($active_sub_menu == 'service_comments') {
            echo 'active';
        }
        ?>"><a href="<?php echo base_url('directory/comments/service_comments.html'); ?>"><i class="fa fa-circle-o"></i> Service Comments</a>
        </li>
        <li class="<?php
        if ($active_sub_menu == 'article_comments') {
            echo 'active';
        }
        ?>"><a href="<?php echo base_url('directory/comments/article_comments.html'); ?>"><i class="fa fa-circle-o"></i> Article Comments</a>
        </li>
    </ul>
</li>
<li class="treeview <?php
if ($active_menu == 'request') {
    echo 'active';
}
?>">
    <a href="#"><i class="fa fa-file-text"></i> <span> Request</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="<?php
        if ($active_sub_menu == 'claim') {
            echo 'active';
        }
        ?>"><a href="<?php echo base_url('directory/request/claim.html'); ?>"><i class="fa fa-circle-o"></i> Claim Request</a>
        </li>
        <li class="<?php
        if ($active_sub_menu == 'featured') {
            echo 'active';
        }
        ?>"><a href="<?php echo base_url('directory/request/featured.html'); ?>"><i class="fa fa-circle-o"></i> Featured Request</a>
        </li>
        <li class="<?php
        if ($active_sub_menu == 'verification') {
            echo 'active';
        }
        ?>"><a href="<?php echo base_url('directory/request/verification.html'); ?>"><i class="fa fa-circle-o"></i> Verification Request</a>
        </li>
    </ul>
</li>

<li class="<?php
if ($active_menu == 'payments') {
    echo 'active';
}
?>"><a href="<?php echo base_url('directory/payments.html'); ?>"><i class="fa fa-dollar"></i> <span>Payment Reports</span></a>
</li>
<li class="<?php
if ($active_menu == 'subscribers') {
    echo 'active';
}
?>"><a href="<?php echo base_url('directory/subscribers.html'); ?>"><i class="fa fa-users"></i> <span>Subscribers</span></a>
</li>
<li class="<?php
if ($active_menu == 'themes') {
    echo 'active';
}
?>"><a href="<?php echo base_url('themes.html'); ?>"><i class="fa fa-desktop"></i> <span>Themes</span></a>
</li>
<li class="treeview <?php
if ($active_menu == 'settings') {
    echo 'active';
}
?>">
    <a href="#"><i class="fa fa-cogs"></i> <span>Settings</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="<?php
        if ($active_sub_menu == 'system_settings') {
            echo 'active';
        }
        ?>"><a href="<?php echo base_url('system_settings.html'); ?>"><i class="fa fa-circle-o"></i> System Settings</a></li>
        <li class="<?php
        if ($active_sub_menu == 'privacy_policy') {
            echo 'active';
        }
        ?>"><a href="<?php echo base_url('privacy_policy_setting.html'); ?>"><i class="fa fa-circle-o"></i> Privacy Policy</a></li>
        <li class="<?php
        if ($active_sub_menu == 'change_logo') {
            echo 'active';
        }
        ?>"><a href="<?php echo base_url('change_logo.html'); ?>"><i class="fa fa-circle-o"></i> Change Logo</a></li>
        <!--        <li class="<?php
        if ($active_sub_menu == 'sms_settings') {
            echo 'active';
        }
        ?>"><a href="<?php echo base_url('sms_settings.html'); ?>"><i class="fa fa-circle-o"></i> SMS Settings</a></li>
                <li class="<?php
        if ($active_sub_menu == 'mail_settings') {
            echo 'active';
        }
        ?>"><a href="<?php echo base_url('mail_settings.html'); ?>"><i class="fa fa-circle-o"></i> Mail Settings</a></li>-->
    </ul>
</li>