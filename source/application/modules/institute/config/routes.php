<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Web Controller Routes
$route['add-institute'] ='institute/institute_web/add_institute';
$route['institute-list'] ='institute/institute_web/institute_list';
$route['active-download-link'] ='institute/institute_web/active_download_link';
$route['adjust-fees'] ='institute/institute_web/adjust_fees';
$route['upload_fees_image'] ='institute/institute_web/upload_fees_image';
$route['institute-details/(:any)'] ='institute/institute_web/institute_details/$1';
$route['institute_excel'] ='institute/institute_web/institute_excel';
$route['all_details_institute_excel'] ='institute/institute_web/all_details_institute_excel';
$route['institute-birthday'] ='institute/institute_web/institute_birthday';
$route['institute-record-list'] ='institute/institute_web/institute_record_list';
$route['reset-stud-list/(:any)']='institute/institute_web/reset_stud_list/$1';
$route['edit_stud_payment']='institute/institute_web/edit_stud_payment';
$route['(?i)get-selected-bacth-data'] = 'institute/institute_web/get_selected_bacth_data'; 
$route['(?i)institute-excel-report/(:any)'] ='institute/institute_web/institute_excel_report/$1';
$route['(?i)institute-csv-report/(:any)'] ='institute/institute_web/institute_csv_report/$1';

$route['reset-batch-stud-list/(:any)']='institute/institute_web/reset_batch_stud_list/$1';  
$route['reset-batch-student']='institute/institute_web/reset_batch_particular_student'; 
// Rest Controller Routes  
$route['(?i)institute']="institute/institute_rest/institute";
$route['(?i)hide-institute']="institute/institute_rest/hide_institute";
$route['(?i)restore-institute']="institute/institute_rest/restore_institute";
$route['(?i)permanent-delete-institute/:num']="institute/institute_rest/permanent_delete_institute/$1";
$route['(?i)block-institute-status']="institute/institute_rest/block_institute_status";
$route['(?i)active-institute-status']="institute/institute_rest/active_institute_status";
$route['(?i)active-download-status']="institute/institute_rest/active_download_status";
$route['(?i)deactive-download-status']="institute/institute_rest/deactive_download_status";
$route['(?i)pending-db-status']="institute/institute_rest/pending_db_status";
$route['(?i)download-db-status']="institute/institute_rest/download_db_status";
$route['(?i)install-db-status']="institute/institute_rest/install_db_status";
$route['(?i)examDownload-db-status']="institute/institute_rest/examDownload_db_status";
$route['(?i)examInstall-db-status']="institute/institute_rest/examInstall_db_status";
$route['(?i)upload-db-status']="institute/institute_rest/upload_db_status";
$route['(?i)reset-mac-id']="institute/institute_rest/reset_mac_id";
$route['(?i)reset-appear-student']="institute/institute_rest/reset_appear_student";
$route['(?i)get-student']="institute/institute_rest/get_student";
$route['(?i)get-appear-stud-list']="institute/institute_rest/get_appear_stud_list";
$route['(?i)get-appear-stud-count']="institute/institute_rest/get_appear_stud_count";
$route['(?i)set-adjust-fee']="institute/institute_rest/set_adjust_fee";
$route['(?i)instBirthdayWish']="institute/institute_rest/smsSend";//send birthday wish 
$route['active-link'] ='institute/institute_rest/active_link';
$route['deactive-link'] ='institute/institute_rest/deactive_link';
$route['reactive-link'] ='institute/institute_rest/reactive_link';
$route['(?i)change-institute-password']="institute/institute_rest/change_institute_password";


// Datatable Controller Routes
$route['institute_list_table'] ='institute/Datatable/institute_list_table';
$route['institute_record_table'] ='institute/Datatable/institute_record_table';
$route['active_download_link_table'] ='institute/Datatable/active_download_link_table';
$route['institute_birthday_table'] ='institute/Datatable/institute_birthday_table';
$route['student_table'] = 'institute/Datatable/student_table';
$route['(?i)active_download_link_table/(:any)'] ='institute/Datatable/active_download_link_table/$1';

