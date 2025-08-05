<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)fees-report'] ='reports/report_web/fees_report';
$route['(?i)certificate-print'] ='reports/report_web/certificate_print';
$route['(?i)get_fees_report'] ='reports/report_web/get_fees_report';
$route['(?i)print_fees_report'] ='reports/report_web/print_fees_report';
$route['(?i)institute-count'] ='reports/report_web/institute_count';
$route['(?i)get_table_inst_count'] ='reports/report_web/get_table_inst_count';
$route['(?i)institute_count_pdf/(:any)/(:any)'] ='reports/report_web/institute_count_pdf/$1/$2';
$route['(?i)institute_count_excel/(:any)/(:any)'] ='reports/report_web/institute_count_excel/$1/$2';
$route['(?i)certificate/(:any)'] ='reports/report_web/certificate/$1';
$route['(?i)certificate-pdf/(:any)/(:any)'] ='reports/report_web/certificate_pdf/$1/$2';
$route['(?i)ssd-certificate-pdf/(:any)/(:any)'] ='reports/report_web/ssd_certificate_pdf/$1/$2';
$route['(?i)pass-student-list/(:any)'] = 'reports/report_web/pass_student_list/$1';
$route['(?i)payment-details/(:any)'] ='reports/report_web/payment_details/$1';

$route['(?i)all-pass-student-list'] = 'reports/report_web/all_pass_student_list';


$route['(?i)institute_count_table/(:any)/(:any)'] ='reports/datatable/institute_count_table/$1/$2';
$route['(?i)certificate_list'] ='reports/datatable/certificate_list';
$route['(?i)student_information_table'] ='reports/datatable/student_information_table';
$route['(?i)fees_report_table/(:any)'] ='reports/datatable/fees_report_table/$1';
