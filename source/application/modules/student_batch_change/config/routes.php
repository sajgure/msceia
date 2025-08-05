<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)student-batch-change'] ='student_batch_change/student_batch_change_web/student_batch_change';
$route['(?i)get_stud_batch_from'] ='student_batch_change/student_batch_change_web/get_stud_batch_from';
$route['(?i)get_stud_batch_current'] ='student_batch_change/student_batch_change_web/get_stud_batch_current';


$route['(?i)student_batch_change_from/(:any)'] ='student_batch_change/datatable/student_batch_change_from/$1';
$route['(?i)student_batch_change_current/(:any)'] ='student_batch_change/datatable/student_batch_change_current/$1';


$route['(?i)batch-change']="student_batch_change/student_batch_change_rest/batch_change";



