<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*=============================== API ROUTING ==============================*/

$route['(?i)gcc-tbc-book-category'] ='gcc_tbc_book_category/gcc_tbc_book_category_rest/gcc_tbc_book_category';
$route['(?i)hide-gcc-tbc-book-category'] ='gcc_tbc_book_category/gcc_tbc_book_category_rest/hidegcc_tbc_book_category';
$route['(?i)restore-gcc-tbc-book-category'] ='gcc_tbc_book_category/gcc_tbc_book_category_rest/restoregcc_tbc_book_category';
$route['(?i)delete-gcc-tbc-book-category/(:any)'] ='gcc_tbc_book_category/gcc_tbc_book_category_rest/deletegcc_tbc_book_category/$1';

/*=============================== WEB ROUTING ==============================*/

$route['(?i)gcc-tbc-book-category-list'] ='gcc_tbc_book_category/gcc_tbc_book_category_web/gcc_tbc_book_category_list';
$route['(?i)add-gcc-tbc-book-category'] ='gcc_tbc_book_category/gcc_tbc_book_category_web/add_gcc_tbc_book_category';
$route['(?i)add-gcc-tbc-book-category/(:any)'] ='gcc_tbc_book_category/gcc_tbc_book_category_web/add_gcc_tbc_book_category/$1';
$route['(?i)upload_gcc_tbc_book_category_image'] ='gcc_tbc_book_category/gcc_tbc_book_category_web/upload_gcc_tbc_book_category_image';

/*=============================== Datatable ROUTING ==============================*/

$route['(?i)gcc_tbc_book_category_table'] ='gcc_tbc_book_category/Datatable/gcc_tbc_book_category_table';

?>