<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*=============================== Site ROUTING ==============================*/

$route['(?i)gcc-tbc-shop']='gcc_tbc_book_shop/gcc_tbc_book_shop_web/gcc_tbc_shop';
$route['(?i)my-book-orders']='gcc_tbc_book_shop/gcc_tbc_book_shop_web/gcc_tbc_my_orders';
$route['(?i)gcc-tbc-book-shop-view-cart']='gcc_tbc_book_shop/gcc_tbc_book_shop_web/gcc_tbc_book_shop_view_cart';
$route['(?i)gcc-tbc-book-shop-checkout']='gcc_tbc_book_shop/gcc_tbc_book_shop_web/gcc_tbc_book_shop_checkout';
$route['(?i)gcc-tbc-add-to-cart']='gcc_tbc_book_shop/gcc_tbc_book_shop_web/gcc_tbc_add_to_cart';
$route['(?i)gcc-tbc-remove-cart']='gcc_tbc_book_shop/gcc_tbc_book_shop_web/gcc_tbc_remove_cart';
$route['(?i)order-details-track/(:any)'] ='gcc_tbc_book_shop/gcc_tbc_book_shop_web/order_details_track/$1';
$route['(?i)gcc_tbc_update_cart/(:any)'] ='gcc_tbc_book_shop/gcc_tbc_book_shop_web/gcc_tbc_update_cart/$1';
$route['(?i)gcc-tbc-book-print-invoice/(:any)']='gcc_tbc_book_shop/gcc_tbc_book_shop_web/gcc_tbc_book_print_invoice/$1';
$route['(?i)gcc-tbc-payment']='gcc_tbc_book_shop/gcc_tbc_book_shop_web/gcc_tbc_payment';

/*=============================== Order ROUTING ==============================*/

$route['gcc_tbc_book_online_order'] = 'gcc_tbc_book_shop/gcc_tbc_book_shop_web/gcc_tbc_book_online_order';
$route['gcc_tbc_shop_order_success'] = 'gcc_tbc_book_shop/gcc_tbc_book_shop_web/gcc_tbc_shop_order_success';
$route['gcc_tbc_shop_order_failure'] = 'gcc_tbc_book_shop/gcc_tbc_book_shop_web/gcc_tbc_shop_order_failure';
$route['gcc-tbc-shop-confirmation/(:any)'] = 'gcc_tbc_book_shop/gcc_tbc_book_shop_web/gcc_tbc_shop_confirmation/$1';
?>