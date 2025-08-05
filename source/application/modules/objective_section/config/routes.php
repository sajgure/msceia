<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)objective-section']="objective_section/objective_section_rest/objective_section";
$route['(?i)hide-objective-section']="objective_section/objective_section_rest/hide_objective_section";
$route['(?i)restore-objective-section']="objective_section/objective_section_rest/restore_objective_section";
$route['(?i)delete-objective-section/(:any)']="objective_section/objective_section_rest/delete_objective_section/$1";
$route['(?i)objective_section_table']="objective_section/datatable/objective_section_table";
$route['(?i)objective-list']="objective_section/objective_section_web/objective_list";
$route['(?i)add-objective-section']="objective_section/objective_section_web/add_objective_section";
$route['(?i)add-objective-section/(:any)']="objective_section/objective_section_web/add_objective_section/$1";
$route['(?i)objective-payment-report']="objective_section/objective_section_web/objective_payment_report";
$route['(?i)search-payment']="objective_section/objective_section_rest/search_payment";
$route['(?i)set-payment-status']="objective_section/objective_section_rest/set_payment_status";
$route['(?i)save-sa-payment']="objective_section/objective_section_rest/save_sa_payment";
$route['(?i)search-district-wise']="objective_section/objective_section_rest/search_district_wise";
$route['(?i)search-district-details']="objective_section/objective_section_rest/search_district_details";
$route['(?i)search-upload_objective_questions'] ='objective_section/objective_section_rest/search_complete_district_report';


$route['(?i)dateWisePaymentExcel/(:any)/(:any)']="objective_section/objective_section_web/dateWisePaymentExcel/$1/$2";
$route['(?i)dateWisePaymentPDF/(:any)/(:any)']="objective_section/objective_section_web/dateWisePaymentPDF/$1/$2";
$route['(?i)objective-district-wise-report']="objective_section/objective_section_web/district_wise_report";
$route['(?i)district_view_excel/(:any)/(:any)/(:any)']="objective_section/objective_section_web/district_view_excel/$1/$2/$3";
$route['(?i)district_wise_pdf/(:any)/(:any)/(:any)']="objective_section/objective_section_web/district_wise_pdf/$1/$2/$3";
$route['(?i)district-details-report']="objective_section/objective_section_web/district_details_report";
$route['(?i)complete-district-report'] ='objective_section/objective_section_web/complete_district_report';
$route['(?i)district_details_report_excel/(:any)/(:any)/(:any)']="objective_section/objective_section_web/district_details_report_excel/$1/$2/$3";
$route['(?i)district_details_report_pdf/(:any)/(:any)/(:any)']="objective_section/objective_section_web/district_details_report_pdf/$1/$2/$3";

/* --- Author  : Apurva Bandelwar      Date: 07/03/2022 --- */

$route['(?i)upload-objective-questions'] ="objective_section/objective_section_web/upload_objective_questions";
$route['(?i)objective-questions-list'] ="objective_section/objective_section_web/objective_questions_list";
$route['(?i)upload_objective_excel'] ="objective_section/objective_section_web/upload_objective_excel";
$route['(?i)fetch_objective_questions_whr'] ="objective_section/objective_section_web/fetch_objective_questions_whr";

$route['(?i)save-upload-objective-questions']="objective_section/objective_section_rest/save_objective_questions";
$route['(?i)delete-objective-question/(:any)']="objective_section/objective_section_rest/delete_objective_question/$1";

$route['(?i)objective_questions_table/(:any)/(:any)'] ="objective_section/datatable/objective_questions_table/$1/$2";




