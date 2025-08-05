<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)course-master']="course_master/course_master_rest/course_master";
$route['(?i)hide-course-master']="course_master/course_master_rest/hide_course_master";
$route['(?i)restore-course-master']="course_master/course_master_rest/restore_course_master";
$route['(?i)delete-course-master/(:any)']="course_master/course_master_rest/delete_course_master/$1";

$route['(?i)course-list']="course_master/course_master_web/course_list";
$route['(?i)add-course']="course_master/course_master_web/add_course";
$route['(?i)add-course/(:any)']="course_master/course_master_web/add_course/$1";
$route['(?i)course_master_table']="course_master/Datatable/course_master_table";

    