<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)current-batch'] ='current_batch/current_batch_rest/current_batch';
$route['(?i)hide-current-batch']="current_batch/current_batch_rest/hide_current_batch";
$route['(?i)restore-current-batch']="current_batch/current_batch_rest/restore_current_batch";

// $route['(?i)current-batch-list'] ='current_batch/current_batch_web/get_all_rows';
$route['(?i)current-batch-master'] ='current_batch/current_batch_web/add_current_batch';
$route['(?i)current-batch-master/(:any)'] ='current_batch/current_batch_web/add_current_batch/$1';



