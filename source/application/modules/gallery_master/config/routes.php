<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['add-gallery'] ='gallery_master/gallery_master_web/add_gallery';
$route['add-gallery/(:any)'] ='gallery_master/gallery_master_web/add_gallery/$1';

$route['gallery-list'] ='gallery_master/gallery_master_web/gallery_list';

$route['(?i)gallery-master']="gallery_master/gallery_master_rest/gallery_master";
$route['(?i)hide-gallery-master']="gallery_master/gallery_master_rest/hide_gallery_master";
$route['(?i)restore-gallery-master']="gallery_master/gallery_master_rest/restore_gallery_master";
$route['(?i)delete-gallery-master/(:any)']="gallery_master/gallery_master_rest/delete_gallery_master/$1";

$route['upload_gallery_image'] ='gallery_master/gallery_master_web/upload_gallery_image';
$route['gallery_master_table'] ='gallery_master/datatable/gallery_master_table';
