<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['index'] ='site/site/index';
$route['committee-members']='site/site/committee';
$route['gallery']='site/site/gallery';
$route['my-profile']='site/site/my_profile';
$route['my-profilesidebar']='site/site/my_profilesidebar';
$route['change-password']='site/site/change_password';
$route['edit-profile']='site/site/edit_profile';
$route['renewal-form']='site/site/renewal_form';
$route['new-renewal-form']='site/site/new_renewal_form';
$route['new-renewal-form/(:any)']='site/site/new_renewal_form/$1';
$route['suchna'] ='site/site/suchna';
$route['sign-up'] ='site/site/sign_up';
$route['forgot-password'] ='site/site/forgot_password';
$route['student-registration'] ='site/site/student_registration';
$route['faq-que'] ='site/site/faq';
$route['sabhasad'] = 'site/site/sabhasad';
$route['contact-us'] ='site/site/contact_us';
$route['student-result'] ='site/site/student_result';
$route['download-link'] ='site/site/download_link';
$route['fees'] ='site/site/fees';
$route['pariksharthi']='site/site/pariksharthi';
$route['institute-stud-list']='site/site/institute_stud_list';
$route['track-courier']='site/site/track_courier';
$route['edit-renewal-form']='site/site/edit_renewal_form';
$route['sabhasad-list/(:any)'] ='site/site/sabhasad_list/$1';
$route['upload_institute_onwer_image'] ='site/site/upload_institute_onwer_image';
$route['site_logout'] ='site/site/site_logout';
$route['news-details/(:any)'] ='site/site/news_details/$1';
$route['suchna-details/(:any)'] ='site/site/suchna_details/$1';
$route['print_renewal_new_form'] ='site/site/print_renewal_new_form';
$route['msceia-bonafide'] ='site/site/msceia_bonafide';
$route['print_msceia_bonafide/(:any)'] ='site/site/print_msceia_bonafide/$1';
$route['terms-conditions']='site/site/terms_condition';
$route['print_renewal_form'] ='site/site/print_renewal_form';
$route['objective-book-shop-view-cart']='site/site/objective_book_shop_view_cart';
$route['dump_stud_data_batchwise'] ='site/site/dump_stud_data_batchwise';
$route['old-student-list']='site/site/old_student_list';
$route['dump_old_stud_data_batchwise'] ='site/site/dump_old_stud_data_batchwise';
$route['student-registration-using-excel']='site/site/student_registration_excel';
$route['upload_stud_excel'] ='site/site/upload_stud_excel';
$route['upload_student_image'] ='site/site/upload_student_image';
$route['edit-student/(:any)'] ='site/site/edit_student/$1';
$route['add_stud_payment']='site/site/add_stud_payment';
$route['save_online_pay']='site/site/save_online_pay';
$route['order_success']='site/site/order_success';
$route['order_failure']='site/site/order_failure';
$route['confirm/(:any)']='site/site/confirm/$1';
$route['print-payment-receipt/(:any)']='site/site/print_payment_receipt/$1';
$route['appeared-students']='site/site/appeared_students';
$route['check_password']='site/site/check_password';
$route['hallticket']='site/site/hallticket';
$route['hallticket-all/(:any)']='site/site/hallticket_all/$1';
$route['hallticket_student/(:any)']='site/site/hallticket_student/$1';
$route['duplicate']= 'site/site/duplicate';
$route['save_forgot_pass_site']= 'site/site/save_forgot_pass_site';
$route['fetch_result']='site/site/fetch_result';
$route['download-student-result/(:any)']='site/site/download_student_result/$1';
$route['view-student-result/(:any)']='site/site/view_student_result/$1';
$route['print_all_student_result/(:any)']='site/site/print_all_student_result/$1';
$route['download-attendance']='site/site/download_attendance';
$route['check_download_exam']='site/site/check_download_exam';
$route['upload_status/(:any)']='site/site/upload_status/$1';
$route['upload_student_pdf/(:any)']='site/site/upload_student_pdf/$1';
$route['payment-history']='site/site/payment_history';
$route['print_payment_history/(:any)'] ='site/site/print_payment_history/$1';
$route['batch_wise_payment_history']='site/site/batch_wise_payment_history';
$route['QR-code']='site/site/QR_page';
$route['upload_exam_status/(:any)']='site/site/upload_exam_status/$1';
$route['certificates']='site/site/certificates';
$route['(?i)certificates-pdf/(:any)/(:any)'] ='site/site/certificates_pdf/$1/$2';
$route['(?i)ssd-certificates-pdf/(:any)/(:any)'] ='site/site/ssd_certificates_pdf/$1/$2/';
$route['(?i)certificates-pdf-batch/(:any)/(:any)/(:any)'] ='site/site/certificates_pdf_batch/$1/$2/$3';
$route['privacy-policy'] ='site/site/privecy_policy';

// ------------------- Datatable Route ------------------ //

$route['institute_payment_history'] = 'site/Datatable/institute_payment_history';
$route['student_table'] = 'site/Datatable/student_table';
$route['appeared_student_table'] = 'site/Datatable/appeared_student_table';




