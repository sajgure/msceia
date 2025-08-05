<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['add-slider'] ='slider_master/slider_master_web/add_slider';
$route['add-slider/(:any)'] ='slider_master/slider_master_web/add_slider/$1';

$route['slider-list'] ='slider_master/slider_master_web/slider_list';



$route['(?i)slider-master']="slider_master/slider_master_rest/slider_master";
$route['(?i)hide-slider-master']="slider_master/slider_master_rest/hide_slider_master";
$route['(?i)restore-slider-master']="slider_master/slider_master_rest/restore_slider_master";
$route['(?i)permanent-delete-slider-master/:num']="slider_master/slider_master_rest/permanent_delete_slider_master/$1";

$route['upload_slider_image'] ='slider_master/slider_master_web/upload_slider_image';
$route['slider_master_table'] ='slider_master/Datatable/slider_master_table';

