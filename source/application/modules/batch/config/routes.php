<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)batch']="batch/batch_rest/batch";
$route['(?i)hide-batch']="batch/batch_rest/hide_batch";
$route['(?i)restore-batch']="batch/batch_rest/restore_batch";
$route['(?i)permanent-delete-batch/(:any)']="batch/batch_rest/permanent_delete_batch/$1";

$route['(?i)batch-list']="batch/batch_web/batch_list";
$route['(?i)add-batch']="batch/batch_web/add_batch";
$route['(?i)add-batch/(:any)']="batch/batch_web/add_batch/$1";
$route['(?i)batch_master_table']="batch/Datatable/batch_master_table";


