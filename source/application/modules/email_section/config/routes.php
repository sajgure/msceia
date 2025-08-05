<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['(?i)email-section']="email_section/email_section_rest/email_section";
$route['(?i)hide-email-section']="email_section/email_section_rest/hide_email_section";
$route['(?i)restore-email-section']="email_section/email_section_rest/restore_email_section";
$route['(?i)delete-email-section/(:any)']="email_section/email_section_rest/delete_email_section/$1";
$route['(?i)email-list']="email_section/email_section_web/email_list";
$route['(?i)add-email']="email_section/email_section_web/add_email";
$route['(?i)add-email/(:any)']="email_section/email_section_web/add_email/$1";
$route['(?i)attachment']="email_section/email_section_web/attachment";
$route['(?i)email_master_table']="email_section/datatable/email_master_table";
