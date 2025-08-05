<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['gr-master-list'] ='gr_master/gr_master_web/gr_list';
$route['add-gr'] ='gr_master/gr_master_web/add_gr';
$route['add-gr/(:any)'] ='gr_master/gr_master_web/add_gr/$1';
$route['delete_gr'] ='gr_master/gr_master_web/delete_gr';
$route['edit_gr'] ='gr_master/gr_master_web/edit_gr';

$route['(?i)gr-master']="gr_master/gr_master_rest/gr_master";
$route['(?i)hide-gr-master']="gr_master/gr_master_rest/hide_gr_master";
$route['(?i)restore-gr-master']="gr_master/gr_master_rest/restore_gr_master";
$route['(?i)delete-gr-master/(:any)']="gr_master/gr_master_rest/delete_gr_master/$1";

$route['gr_master_table'] ='gr_master/datatable/gr_master_table';

$route['upload_gr_master_file'] ='gr_master/gr_master_web/upload_gr_master_file';
