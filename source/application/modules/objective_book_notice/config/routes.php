<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)objective-book-notice-list']="objective_book_notice/objective_book_notice_web/objective_book_notice_list";
$route['(?i)add-objective-book-notice']="objective_book_notice/objective_book_notice_web/add_objective_book_notice";
$route['(?i)add-objective-book-notice/(:any)']="objective_book_notice/objective_book_notice_web/add_objective_book_notice/$1";
$route['(?i)objective_book_notice_table']="objective_book_notice/Datatable/objective_book_notice_table";

$route['(?i)objective-notice-master']="objective_book_notice/objective_book_notice_rest/objective_book_notice";
$route['(?i)hide-objective-notice-master']="objective_book_notice/objective_book_notice_rest/hide_objective_book_notice";
$route['(?i)restore-objective-notice-master']="objective_book_notice/objective_book_notice_rest/restore_objective_book_notice";
$route['(?i)permanent-delete-objective-notice/(:any)']="objective_book_notice/objective_book_notice_rest/permanent_delete_objective_book_notice/$1";