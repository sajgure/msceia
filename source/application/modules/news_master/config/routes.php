<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)news-list']="news_master/news_master_web/news_list";
$route['(?i)add-news']="news_master/news_master_web/add_news";
$route['(?i)add-news/(:any)']="news_master/news_master_web/add_news/$1";
$route['(?i)news_master_table']="news_master/Datatable/news_master_table";

$route['(?i)news-master']="news_master/news_master_rest/news_master";
$route['(?i)hide-news-master']="news_master/news_master_rest/hide_news_master";
$route['(?i)restore-news-master']="news_master/news_master_rest/restore_news_master";
$route['(?i)permanent-delete-news-master/(:any)']="news_master/news_master_rest/permanent_delete_news_master/$1";