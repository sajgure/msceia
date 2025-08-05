<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)objective-book-category'] ='objective_book_category/objective_book_category_rest/Objective_book_category';
$route['(?i)hide-objective-book-category'] ='objective_book_category/objective_book_category_rest/hideObjective_book_category';
$route['(?i)restore-objective-book-category'] ='objective_book_category/objective_book_category_rest/restoreObjective_book_category';
$route['(?i)delete-objective-book-category/(:any)'] ='objective_book_category/objective_book_category_rest/deleteObjective_book_category/$1';
$route['(?i)objective-category-list'] ='objective_book_category/Objective_book_category_web/objective_category_list';
$route['(?i)add-objective-category'] ='objective_book_category/Objective_book_category_web/add_objective_category';
$route['(?i)add-objective-category/(:any)'] ='objective_book_category/Objective_book_category_web/add_objective_category/$1';
$route['(?i)upload_objective_category_image'] ='objective_book_category/Objective_book_category_web/upload_objective_category_image';
$route['(?i)objective_category_table'] ='objective_book_category/Datatable/objective_category_table';