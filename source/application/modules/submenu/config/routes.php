<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)submenu'] ='submenu/submenu_rest/submenu';
$route['(?i)hide-submenu'] ='submenu/submenu_rest/hidesubmenu';
$route['(?i)restore-submenu'] ='submenu/submenu_rest/restoresubmenu';
$route['(?i)delete-submenu/(:any)'] ='submenu/submenu_rest/deletesubmenu/$1';

$route['(?i)sub-menu-list'] ='submenu/submenu_web/sub_menu_list';
$route['(?i)add-sub-menu'] ='submenu/submenu_web/add_sub_menu';
$route['(?i)add-sub-menu/(:any)'] ='submenu/submenu_web/add_sub_menu/$1';
$route['(?i)sub_menu_table'] ='submenu/datatable/sub_menu_table';

