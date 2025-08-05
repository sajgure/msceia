<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)objective-book-product'] ='objective_book_product/objective_book_product_rest/Objective_book_product';
$route['(?i)hide-objective-book-product'] ='objective_book_product/objective_book_product_rest/hideObjective_book_product';
$route['(?i)restore-objective-book-product'] ='objective_book_product/objective_book_product_rest/restoreObjective_book_product';
$route['(?i)delete-objective-book-product/(:any)'] ='objective_book_product/objective_book_product_rest/deleteObjective_book_product/$1';
$route['(?i)objective-product-list'] ='objective_book_product/objective_book_product_web/objective_product_list';
$route['(?i)add-objective-product'] ='objective_book_product/objective_book_product_web/add_objective_product';
$route['(?i)add-objective-product/(:any)'] ='objective_book_product/objective_book_product_web/add_objective_product/$1';
$route['(?i)upload_objective_product_image'] ='objective_book_product/objective_book_product_web/upload_objective_product_image';
$route['(?i)objective_product_table'] ='objective_book_product/Datatable/objective_product_table';
