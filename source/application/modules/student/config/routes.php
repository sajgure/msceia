<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)student-list'] ='student/student_web/student_list';
$route['(?i)student_list_table/(:any)/(:any)/(:any)'] ='student/datatable/student_list_table/$1/$2/$3';
$route['(?i)get_stud_list'] = 'student/student_web/get_stud_list';
$route['(?i)student-birthday'] ='student/student_web/student_birthday';
$route['(?i)student_birthday_table'] ='student/datatable/student_birthday_table';
$route['(?i)result']='student/student_web/student_result';
$route['(?i)student_result_table/(:any)'] ='student/datatable/student_result_table/$1';
$route['(?i)get_result_list'] = 'student/student_web/get_result_list';
$route['(?i)view-result/(:any)'] = 'student/student_web/view_result/$1';
$route['(?i)download/(:any)/(:any)/(:any)']='student/student_web/download/$1/$2/$3';
$route['(?i)today-registered-students'] ='student/student_web/today_registered_students';
$route['(?i)today_registered_students_table'] ='student/datatable/today_registered_students_table';

$route['(?i)student']="student/student_rest/student";
$route['(?i)hide-student']="student/student_rest/hide_student";
$route['(?i)restore-student']="student/student_rest/restore_student";
$route['(?i)permanent-delete-student/:num']="student/student_rest/permanent_delete_student/$1";
$route['(?i)reset-stud-mac-id']="student/student_rest/reset_mac_id";
$route['(?i)sendBirthdayWish']="student/student_rest/smsSend";//send birthday wish 
$route['(?i)upload-student-records']="student/student_rest/upload";
