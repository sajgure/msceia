<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)query'] ='query/query_rest/query';
$route['(?i)hide-query'] ='query/query_rest/hidequery';
$route['(?i)restore-query'] ='query/query_rest/restorequery';
$route['(?i)delete-query/(:any)'] ='query/query_rest/deletequery/$1';

$route['(?i)queries-list'] ='query/query_web/queries_list';
$route['(?i)add-queries'] ='query/query_web/add_queries';
$route['(?i)add-queries/(:any)'] ='query/query_web/add_queries/$1';
$route['(?i)institute_queries_table'] ='query/datatable/institute_queries_table';

