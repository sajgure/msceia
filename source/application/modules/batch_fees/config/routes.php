<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['(?i)batch-fees']="batch_fees/batch_fees_rest/batch_fees";
$route['(?i)hide-batch-fees']="batch_fees/batch_fees_rest/hide_batch_fees";
$route['(?i)restore-batch-fees']="batch_fees/batch_fees_rest/restore_batch_fees";
$route['(?i)delete-batch-fees/(:any)']="batch_fees/batch_fees_rest/delete_batch_fees/$1";


$route['(?i)batch-fees-list']="batch_fees/batch_fees_web/batch_fees_list";
$route['(?i)add-batch-fees']="batch_fees/batch_fees_web/add_batch_fees";
$route['(?i)add-batch-fees/(:any)']="batch_fees/batch_fees_web/add_batch_fees/$1";
$route['(?i)batch_fees_table']="batch_fees/Datatable/batch_fees_table";

