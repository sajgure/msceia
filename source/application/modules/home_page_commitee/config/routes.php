<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)home-page-commitee']="home_page_commitee/home_page_commitee_rest/home_page_commitee";
$route['(?i)hide-home-page-commitee']="home_page_commitee/home_page_commitee_rest/hide_home_page_commitee";
$route['(?i)restore-home-page-commitee']="home_page_commitee/home_page_commitee_rest/restore_home_page_commitee";
$route['(?i)delete-home-page-commitee/(:any)']="home_page_commitee/home_page_commitee_rest/permanent_delete_home_page_commitee/$1";



$route['(?i)home-page-committee-list']="home_page_commitee/home_page_commitee_web/home_page_committee_list";
$route['(?i)add-home-page-committee']="home_page_commitee/home_page_commitee_web/add_home_page_committee";
$route['(?i)add-home-page-committee/(:any)']="home_page_commitee/home_page_commitee_web/add_home_page_committee/$1";
$route['(?i)home_page_master_table']="home_page_commitee/Datatable/home_page_master_table";
$route['(?i)upload_home_committee_image']="home_page_commitee/home_page_commitee_web/upload_home_committee_image";

       