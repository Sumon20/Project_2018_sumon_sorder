<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
  | -------------------------------------------------------------------------
  | URI ROUTING
  | -------------------------------------------------------------------------
  | This file lets you re-map URI requests to specific controller functions.
  |
  | Typically there is a one-to-one relationship between a URL string
  | and its corresponding controller class/method. The segments in a
  | URL normally follow this pattern:
  |
  |	example.com/class/method/id/
  |
  | In some instances, however, you may want to remap this relationship
  | so that a different class/function is called than the one
  | corresponding to the URL.
  |
  | Please see the user guide for complete details:
  |
  |	https://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There are three reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router which controller/method to use if those
  | provided in the URL cannot be matched to a valid route.
  |
  |	$route['translate_uri_dashes'] = FALSE;
  |
  | This is not exactly a route, but allows you to automatically route
  | controller and method names that contain dashes. '-' isn't a valid
  | class or method name character, so it requires translation.
  | When you set this option to TRUE, it will replace ALL dashes in the
  | controller and method URI segments.
  |
  | Examples:	my-controller/index	-> my_controller/index
  |		my-controller/my-method	-> my_controller/my_method
 */
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['cms'] = "admin/admin_login/index";
$route['dashboard'] = "admin/dashboard/index";
$route['profile'] = "admin/profile/index";
$route['logout'] = "admin/logout/index";
$route['forgot_password'] = "admin/forgot_password/index";

// Start Peoples
$route['users'] = "admin/peoples/index";
$route['users/add_user'] = "admin/peoples/add_user";
$route['users/edit_user/(:any)'] = "admin/peoples/edit_user/$1";

$route['employees'] = "admin/peoples/employees";
$route['employees/add_employee'] = "admin/peoples/add_employee";
$route['employees/edit_employee/(:any)'] = "admin/peoples/edit_employee/$1";

// Start Setting
$route['system_settings'] = "admin/settings/index";
$route['privacy_policy_setting'] = "admin/settings/privacy_policy_setting";
$route['change_logo'] = "admin/settings/change_logo";


// Start Mail
$route['compose_mail'] = "admin/mailbox/index";
$route['inbox_mail'] = "admin/mailbox/inbox_mail";
$route['sent_mail'] = "admin/mailbox/sent_mail";
$route['drafts_mail'] = "admin/mailbox/drafts_mail";


// Start Directory //

// Start Directory Categories
$route['directory/categories'] = "admin/directory/categories/index";
$route['directory/categories/add_category'] = "admin/directory/categories/add_category";
$route['directory/categories/edit_category/(:any)'] = "admin/directory/categories/edit_category/$1";

// Start Directory Sub-categories
$route['directory/sub_categories'] = "admin/directory/sub_categories/index";
$route['directory/sub_categories/add_sub_category'] = "admin/directory/sub_categories/add_sub_category";
$route['directory/sub_categories/edit_sub_category/(:any)'] = "admin/directory/sub_categories/edit_sub_category/$1";

// Start Directory Countries
$route['directory/countries'] = "admin/directory/countries/index";
$route['directory/countries/add_country'] = "admin/directory/countries/add_country";
$route['directory/countries/edit_country/(:any)'] = "admin/directory/countries/edit_country/$1";

// Start Directory Cities
$route['directory/cities'] = "admin/directory/cities/index";
$route['directory/cities/add_city'] = "admin/directory/cities/add_city";
$route['directory/cities/edit_city/(:any)'] = "admin/directory/cities/edit_city/$1";

// Start Directory Packages
$route['directory/packages'] = "admin/directory/packages/index";
$route['directory/packages/add_package'] = "admin/directory/packages/add_package";
$route['directory/packages/edit_package/(:any)'] = "admin/directory/packages/edit_package/$1";

// Start Directory Listing
$route['directory/listing'] = "admin/directory/listing/index";
$route['directory/listing/edit_listing/(:any)'] = "admin/directory/listing/edit_listing/$1";

// Start Images
$route['directory/listing/images'] = "admin/directory/images/index";
$route['directory/listing/images/published/(:any)'] = "admin/directory/images/published_image/$1";
$route['directory/listing/images/unpublished/(:any)'] = "admin/directory/images/unpublished_image/$1";
$route['directory/listing/images/remove/(:any)'] = "admin/directory/images/remove_image/$1";

// Start Videos
$route['directory/listing/videos'] = "admin/directory/videos/index";
$route['directory/listing/videos/published/(:any)'] = "admin/directory/videos/published_video/$1";
$route['directory/listing/videos/unpublished/(:any)'] = "admin/directory/videos/unpublished_video/$1";
$route['directory/listing/videos/remove/(:any)'] = "admin/directory/videos/remove_video/$1";

// Start Products
$route['directory/listing/products'] = "admin/directory/products/index";
$route['directory/listing/products/published/(:any)'] = "admin/directory/products/published_product/$1";
$route['directory/listing/products/unpublished/(:any)'] = "admin/directory/products/unpublished_product/$1";
$route['directory/listing/products/remove/(:any)'] = "admin/directory/products/remove_product/$1";

// Start Services
$route['directory/listing/services'] = "admin/directory/services/index";
$route['directory/listing/services/published/(:any)'] = "admin/directory/services/published_service/$1";
$route['directory/listing/services/unpublished/(:any)'] = "admin/directory/services/unpublished_service/$1";
$route['directory/listing/services/remove/(:any)'] = "admin/directory/services/remove_service/$1";

// Start Articles
$route['directory/listing/articles'] = "admin/directory/articles/index";
$route['directory/listing/articles/published/(:any)'] = "admin/directory/articles/published_article/$1";
$route['directory/listing/articles/unpublished/(:any)'] = "admin/directory/articles/unpublished_article/$1";
$route['directory/listing/articles/remove/(:any)'] = "admin/directory/articles/remove_article/$1";


// Start Image Comments
$route['directory/comments/image_comments'] = "admin/comment/image_comments/index";
$route['directory/comments/image_comments/published/(:any)'] = "admin/comment/image_comments/published_comment/$1";
$route['directory/comments/image_comments/unpublished/(:any)'] = "admin/comment/image_comments/unpublished_comment/$1";
$route['directory/comments/image_comments/remove/(:any)'] = "admin/comment/image_comments/remove_comment/$1";

// Start Video Comments
$route['directory/comments/video_comments'] = "admin/comment/video_comments/index";
$route['directory/comments/video_comments/published/(:any)'] = "admin/comment/video_comments/published_comment/$1";
$route['directory/comments/video_comments/unpublished/(:any)'] = "admin/comment/video_comments/unpublished_comment/$1";
$route['directory/comments/video_comments/remove/(:any)'] = "admin/comment/video_comments/remove_comment/$1";

// Start Product Comments
$route['directory/comments/product_comments'] = "admin/comment/product_comments/index";
$route['directory/comments/product_comments/published/(:any)'] = "admin/comment/product_comments/published_comment/$1";
$route['directory/comments/product_comments/unpublished/(:any)'] = "admin/comment/product_comments/unpublished_comment/$1";
$route['directory/comments/product_comments/remove/(:any)'] = "admin/comment/product_comments/remove_comment/$1";

// Start Service Comments
$route['directory/comments/service_comments'] = "admin/comment/service_comments/index";
$route['directory/comments/service_comments/published/(:any)'] = "admin/comment/service_comments/published_comment/$1";
$route['directory/comments/service_comments/unpublished/(:any)'] = "admin/comment/service_comments/unpublished_comment/$1";
$route['directory/comments/service_comments/remove/(:any)'] = "admin/comment/service_comments/remove_comment/$1";

// Start Article Comments
$route['directory/comments/article_comments'] = "admin/comment/article_comments/index";
$route['directory/comments/article_comments/published/(:any)'] = "admin/comment/article_comments/published_comment/$1";
$route['directory/comments/article_comments/unpublished/(:any)'] = "admin/comment/article_comments/unpublished_comment/$1";
$route['directory/comments/article_comments/remove/(:any)'] = "admin/comment/article_comments/remove_comment/$1";

// Start Claim Request
$route['directory/request/claim'] = "admin/request/claim/index";

// Start Featured Request
$route['directory/request/featured'] = "admin/request/featured/index";

// Start Verification Request
$route['directory/request/verification'] = "admin/request/verification/index";

// Start Subscribers
$route['directory/subscribers'] = "admin/subscriber/subscribers/index";
$route['directory/subscribers/remove/(:any)'] = "admin/subscriber/subscribers/remove_subscriber/$1";

// Start Payments
$route['directory/payments'] = "admin/payment/payments/index";
$route['directory/payments/confirm/(:any)'] = "admin/payment/payments/confirm_payment/$1";

// Start Themes
$route['themes'] = "admin/themes/index";