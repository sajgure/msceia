<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['(?i)terms-conditions'] ='objective_book_shop/objective_book_shop_web/terms_condition';

$route['(?i)my-orders'] ='objective_book_shop/objective_book_shop_web/my_orders';
$route['(?i)objective-shop'] ='objective_book_shop/objective_book_shop_web/objective_shop';
$route['(?i)objective-book-shop-view-cart'] ='objective_book_shop/objective_book_shop_web/objective_book_shop_view_cart';

$route['(?i)objective-book-shop-checkout'] ='objective_book_shop/objective_book_shop_web/objective_book_shop_checkout';
$route['(?i)objective_add_to_cart'] ='objective_book_shop/objective_book_shop_web/objective_add_to_cart';
$route['(?i)objective_remove_cart'] ='objective_book_shop/objective_book_shop_web/objective_remove_cart';
$route['(?i)view-single-order/(:any)'] ='objective_book_shop/objective_book_shop_web/view_single_order/$1';
$route['(?i)update_cart/(:any)'] ='objective_book_shop/objective_book_shop_web/update_cart/$1';
$route['(?i)objective_book_print_invoice/(:any)']='objective_book_shop/objective_book_shop_web/objective_book_print_invoice/$1';


$route['objective_book_online_order'] = 'objective_book_shop/objective_book_shop_web/objective_book_online_order';
$route['objective_shop_order_success'] = 'objective_book_shop/objective_book_shop_web/objective_shop_order_success';
$route['objective_shop_order_failure'] = 'objective_book_shop/objective_book_shop_web/objective_shop_order_failure';
$route['objective_shop_confirmation/(:any)'] = 'objective_book_shop/objective_book_shop_web/objective_shop_confirmation/$1';