<?php defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)user']="user/user_rest/user";
$route['(?i)hide-user']="user/user_rest/hide_user";
$route['(?i)restore-user']="user/user_rest/restore_user";
$route['(?i)delete-user/(:any)']="user/user_rest/permanent_delete_user/$1";
$route['(?i)change-user-password']="user/user_rest/change_user_password";

$route['(?i)user-list']="user/user_web/user_list";
$route['(?i)add-user']="user/user_web/add_user";
$route['(?i)add-user/(:any)']="user/user_web/add_user/$1";
$route['(?i)upload_user_image']="user/user_web/upload_user_image";
