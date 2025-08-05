<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['(?i)download-master-list']="download_link_master/download_master_web/download_master_list";
$route['(?i)add-download-master']="download_link_master/download_master_web/add_download_master";
$route['(?i)add-download-master/(:any)']="download_link_master/download_master_web/add_download_master/$1";
$route['(?i)upload_download_master_file']="download_link_master/download_master_web/upload_download_master_file";
$route['(?i)download_master_table']="download_link_master/Datatable/download_master_table";

/* API Routes */
$route['(?i)download-link-master']="download_link_master/download_link_master_rest/download_link_master";
$route['(?i)hide-download-link-master']="download_link_master/download_link_master_rest/hide_download_link_master";
$route['(?i)restore-download-link-master']="download_link_master/download_link_master_rest/restore_download_link_master";
$route['(?i)delete-download-link-master/:num']="download_link_master/download_link_master_rest/permanent_delete_download_link_master/$1";