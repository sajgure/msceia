<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*=============================== WEB ROUTING ==============================*/

$route['(?i)gcc-tbc-orders'] ='gcc_tbc_book_order/gcc_tbc_book_order_web/gcc_tbc_order';
$route['(?i)gcc-tbc-accept-order'] ='gcc_tbc_book_order/gcc_tbc_book_order_web/gcc_tbc_accept_order';
$route['(?i)gcc-tbc-order-details/(:any)'] ='gcc_tbc_book_order/gcc_tbc_book_order_web/gcc_tbc_order_details/$1';
$route['(?i)gcc-tbc-print-invoice/(:any)'] ='gcc_tbc_book_order/gcc_tbc_book_order_web/gcc_tbc_print_invoice/$1';
$route['(?i)gcc-tbc-print-slip/(:any)'] ='gcc_tbc_book_order/gcc_tbc_book_order_web/gcc_tbc_print_slip/$1';
$route['(?i)gcc_tbc_getproduct'] ='gcc_tbc_book_order/gcc_tbc_book_order_web/gcc_tbc_getproduct';
$route['(?i)gcc_tbc_edit_status1']='gcc_tbc_book_order/gcc_tbc_book_order_web/gcc_tbc_edit_status1';
$route['(?i)gcc_tbc_edit_status']='gcc_tbc_book_order/gcc_tbc_book_order_web/gcc_tbc_edit_status';

/*=============================== Datatable ROUTING ==============================*/

$route['(?i)gcc_tbc_order_table'] ='gcc_tbc_book_order/Datatable/gcc_tbc_order_table';

/*=============================== API ROUTING ==============================*/

$route['(?i)books-order-approved'] ='gcc_tbc_book_order/gcc_tbc_book_order_rest/books_order_approved';
$route['(?i)book-order-cancel'] ='gcc_tbc_book_order/gcc_tbc_book_order_rest/books_order_cancelled';



