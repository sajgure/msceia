<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*=============================== API ROUTING ==============================*/

$route['(?i)gcc-tbc-book-product'] ='gcc_tbc_book_product/gcc_tbc_book_product_rest/gcc_tbc_book_product';
$route['(?i)hide-gcc-tbc-book-product'] ='gcc_tbc_book_product/gcc_tbc_book_product_rest/hidegcc_tbc_book_product';
$route['(?i)restore-gcc-tbc-book-product'] ='gcc_tbc_book_product/gcc_tbc_book_product_rest/restoregcc_tbc_book_product';
$route['(?i)delete-gcc-tbc-book-product/(:any)'] ='gcc_tbc_book_product/gcc_tbc_book_product_rest/deletegcc_tbc_book_product/$1';

/*=============================== WEB ROUTING ==============================*/

$route['(?i)gcc-tbc-book-product-list'] ='gcc_tbc_book_product/gcc_tbc_book_product_web/gcc_tbc_book_product_list';
$route['(?i)add-gcc-tbc-book-product'] ='gcc_tbc_book_product/gcc_tbc_book_product_web/add_gcc_tbc_book_product';
$route['(?i)add-gcc-tbc-book-product/(:any)'] ='gcc_tbc_book_product/gcc_tbc_book_product_web/add_gcc_tbc_book_product/$1';
$route['(?i)upload_gcc_tbc_book_image'] ='gcc_tbc_book_product/gcc_tbc_book_product_web/upload_gcc_tbc_book_image';

/*=============================== Datatable ROUTING ==============================*/

$route['(?i)gcc_tbc_book_product_table'] ='gcc_tbc_book_product/Datatable/gcc_tbc_book_product_table';

?>