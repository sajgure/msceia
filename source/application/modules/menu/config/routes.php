<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)menu'] ='menu/menu_rest/menu';
$route['(?i)hide-menu'] ='menu/menu_rest/hidemenu';
$route['(?i)restore-menu'] ='menu/menu_rest/restoremenu';
$route['(?i)delete-menu/(:any)'] ='menu/menu_rest/deletemenu/$1';
$route['(?i)menu-list'] ='menu/menu_web/menu_list';
$route['(?i)add-menu'] ='menu/menu_web/add_menu';
$route['(?i)add-menu/(:any)'] ='menu/menu_web/add_menu/$1';
$route['(?i)menu_table'] ='menu/datatable/menu_table';
