<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)client-list'] = "our_client/our_client_web/client_list";
$route['(?i)add-client'] = "our_client/our_client_web/add_client";
$route['(?i)add-client/(:any)'] = "our_client/our_client_web/add_client/$1";
$route['(?i)upload_client_image'] = "our_client/our_client_web/upload_client_image";
$route['(?i)client_master_table'] = "our_client/Datatable/client_master_table";



$route['(?i)our-client']="our_client/our_client_rest/our_client";
$route['(?i)hide-our-client']="our_client/our_client_rest/hide_our_client";
$route['(?i)restore-our-client']="our_client/our_client_rest/restore_our_client";
$route['(?i)delete-our-client/(:any)']="our_client/our_client_rest/delete_our_client/$1";
    