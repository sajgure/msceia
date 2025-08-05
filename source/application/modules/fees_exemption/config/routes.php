<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)add-fees-exemption'] ='fees_exemption/fees_exemption_rest/fees_exemption';
$route['(?i)hide-fees-exemption']="fees_exemption/fees_exemption_rest/hide_fees_exemption";
$route['(?i)restore-fees-exemption']="fees_exemption/fees_exemption_rest/restore_fees_exemption";
$route['(?i)delete-fees-exemption/(:any)']="fees_exemption/fees_exemption_rest/delete_fees_exemption/$1";

$route['(?i)fees-exemption-list'] ='fees_exemption/fees_exemption_web/get_all_rows';
$route['(?i)fees_exemption_table'] ='fees_exemption/datatable/fees_exemption_table';
$route['(?i)new-fees-exemption'] ='fees_exemption/fees_exemption_web/add_fees_exemption_form';
$route['(?i)new-fees-exemption/(:any)'] ='fees_exemption/fees_exemption_web/add_fees_exemption_form/$1';




