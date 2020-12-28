<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
//$route['404_override'] = '';
$route['404_override'] = 'Custom404';
$route['translate_uri_dashes'] = FALSE;

// admin

$route['admin'] = "admin/dashboard";
$route['admin/sub-categories'] = "admin/categories/sub_categories";
$route['logout'] = "login/logout";
$route['admin/account'] = "admin/dashboard/account";
$route['admin/reset-password'] = "admin/dashboard/reset_password";
$route['admin/services/view/(:any)'] = "admin/services/view/$1";

