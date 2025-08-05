<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['add-faq'] ='faq/faq_web/add_faq';
$route['add-faq/(:any)']='faq/faq_web/add_faq/$1';
$route['faq-list'] ='faq/faq_web/faq_list';

$route['(?i)faq']="faq/faq_rest/faq";
$route['(?i)hide-faq']="faq/faq_rest/hide_faq";
$route['(?i)restore-faq']="faq/faq_rest/restore_faq";
$route['(?i)delete-faq/(:any)']="faq/faq_rest/delete_faq/$1";
$route['faq_table'] ='faq/datatable/faq_table';

