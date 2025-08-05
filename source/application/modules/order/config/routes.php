<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)order'] ='order/order_rest/order';
$route['(?i)hide-order'] ='order/order_rest/hideorder';
$route['(?i)restore-order'] ='order/order_rest/restoreorder';
$route['(?i)delete-order/:num'] ='order/order_rest/deleteorder/$1';
$route['(?i)add-cart']='order/order_rest/add_cart';
$route['(?i)remove-cart']='order/order_rest/remove_cart';
$route['(?i)get-cart']='order/order_rest/get_cart';
$route['(?i)manual-order'] ='order/order_rest/manual_order';
$route['(?i)hide-manual-order']='order/order_rest/hideorder';
$route['(?i)restore-manual-order'] ='order/order_rest/restoreorder';
$route['(?i)delete-manual-order/:num'] ='order/order_rest/deleteorder/$1';

$route['(?i)order-approved'] ='order/order_rest/order_approved';
$route['(?i)order-cancel'] ='order/order_rest/order_cancelled';


$route['(?i)objective-order'] ='order/order_web/objective_order';
$route['(?i)objective_order_table'] ='order/Datatable/objective_order_table';
$route['(?i)accept-order'] ='order/order_web/accept_order';
$route['(?i)manual-order-creation'] ='order/order_web/manual_order_creation';
$route['(?i)order-details/(:any)'] ='order/order_web/order_details/$1';
$route['(?i)objective_print_invoice/(:any)'] ='order/order_web/objective_print_invoice/$1';
$route['(?i)objective_print_slip/(:any)'] ='order/order_web/objective_print_slip/$1';
$route['(?i)getproduct'] ='order/order_web/getproduct';
$route['(?i)objective_edit_status1']='order/order_web/objective_edit_status1';
$route['(?i)objective_edit_status']='order/order_web/objective_edit_status';


