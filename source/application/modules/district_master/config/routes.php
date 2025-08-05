<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)districts-list'] ='district_master/district_master_web/district_list';
$route['(?i)add-district'] ='district_master/district_master_web/add_district';
$route['(?i)add-district/(:any)'] ='district_master/district_master_web/add_district/$1';


$route['(?i)district'] ='district_master/district_rest/district';
$route['(?i)hide-district'] ='district_master/district_rest/hidedistrict';
$route['(?i)restore-district']='district_master/district_rest/restoredistrict';
$route['(?i)delete-district/(:any)']='district_master/district_rest/deletedistrict/$1';

$route['(?i)district_master_table'] ='district_master/datatable/district_master_table';

