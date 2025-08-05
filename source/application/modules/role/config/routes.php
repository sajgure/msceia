<?php defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)role']="role/role_rest/role";
$route['(?i)hide-role']="role/role_rest/hide_role";
$route['(?i)restore-role']="role/role_rest/restore_role";
$route['(?i)delete-role/(:any)']="role/role_rest/permanent_delete_role/$1";

$route['(?i)role-list']="role/role_web/role_list";
$route['(?i)add-role']="role/role_web/add_role";
$route['(?i)add-role/(:any)']="role/role_web/add_role/$1";
$route['(?i)role-management']="role/role_web/role_management";
$route['(?i)fetch_role_config']="role/role_web/fetch_role_config";
$route['(?i)save_role_config']="role/role_web/save_role_config";

