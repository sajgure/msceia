<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)section']="section/section_rest/section";
$route['(?i)hide-section']="section/section_rest/hide_section";
$route['(?i)restore-section']="section/section_rest/restore_section";
$route['(?i)delete-section/(:any)']="section/section_rest/delete_section/$1";
$route['(?i)section-list']="section/section_web/section_list";
$route['(?i)add-section']="section/section_web/add_section";
$route['(?i)add-section/(:any)']="section/section_web/add_section/$1";
$route['(?i)section_table']="section/datatable/section_table";
