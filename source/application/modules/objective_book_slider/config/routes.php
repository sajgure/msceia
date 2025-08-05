<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)objective-book-slider'] ='objective_book_slider/objective_book_slider_rest/Objective_book_slider';
$route['(?i)hide-objective-book-slider'] ='objective_book_slider/objective_book_slider_rest/hideObjective_book_slider';
$route['(?i)restore-objective-book-slider'] ='objective_book_slider/objective_book_slider_rest/restoreObjective_book_slider';
$route['(?i)delete-objective-book-slider/(:any)'] ='objective_book_slider/objective_book_slider_rest/deleteObjective_book_slider/$1';
/*=============================== WEB ROUTING ==============================*/
$route['(?i)objective-slider-list'] ='objective_book_slider/Objective_book_slider_web/objective_slider_list';
$route['(?i)add-objective-slider'] ='objective_book_slider/Objective_book_slider_web/add_objective_slider';
$route['(?i)add-objective-slider/(:any)'] ='objective_book_slider/Objective_book_slider_web/add_objective_slider/$1';
$route['(?i)upload_objective_slider_image'] ='objective_book_slider/Objective_book_slider_web/upload_objective_slider_image';
$route['(?i)objective_slider_table'] ='objective_book_slider/Datatable/objective_slider_table';
