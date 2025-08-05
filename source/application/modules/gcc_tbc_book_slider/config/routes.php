<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*=============================== API ROUTING ==============================*/

$route['(?i)gcc-tbc-book-slider'] ='gcc_tbc_book_slider/gcc_tbc_book_slider_rest/gcc_tbc_book_slider';
$route['(?i)hide-gcc-tbc-book-slider'] ='gcc_tbc_book_slider/gcc_tbc_book_slider_rest/hidegcc_tbc_book_slider';
$route['(?i)restore-gcc-tbc-book-slider'] ='gcc_tbc_book_slider/gcc_tbc_book_slider_rest/restoregcc_tbc_book_slider';
$route['(?i)delete-gcc-tbc-book-slider/(:any)'] ='gcc_tbc_book_slider/gcc_tbc_book_slider_rest/deletegcc_tbc_book_slider/$1';

/*=============================== WEB ROUTING ==============================*/

$route['(?i)gcc-tbc-book-slider-list'] ='gcc_tbc_book_slider/gcc_tbc_book_slider_web/gcc_tbc_slider_list';
$route['(?i)add-gcc-tbc-book-slider'] ='gcc_tbc_book_slider/gcc_tbc_book_slider_web/add_gcc_tbc_slider';
$route['(?i)add-gcc-tbc-book-slider/(:any)'] ='gcc_tbc_book_slider/gcc_tbc_book_slider_web/add_gcc_tbc_slider/$1';
$route['(?i)upload_gcc_tbc_slider_image'] ='gcc_tbc_book_slider/gcc_tbc_book_slider_web/upload_gcc_tbc_slider_image';

/*=============================== Datatable ROUTING ==============================*/

$route['(?i)gcc_tbc_book_slider_table'] ='gcc_tbc_book_slider/Datatable/gcc_tbc_book_slider_table';

?>