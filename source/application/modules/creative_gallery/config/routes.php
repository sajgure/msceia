<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)creative-gallery-list'] ='creative_gallery/Creative_gallery_web/creative_gallery_list';
$route['(?i)add-creative-gallery'] ='creative_gallery/Creative_gallery_web/add_creative_gallery';
$route['(?i)add-creative-gallery/(:any)'] ='creative_gallery/Creative_gallery_web/add_creative_gallery/$1';
$route['(?i)creative-gallery']='creative_gallery/creative_gallery_rest/creative_gallery';
$route['(?i)hide-creative-gallery']='creative_gallery/creative_gallery_rest/hidecreative_gallery';
$route['(?i)restore-creative-gallery']='creative_gallery/creative_gallery_rest/restorecreative_gallery';

$route['(?i)delete-creative-gallery/(:any)']='creative_gallery/creative_gallery_rest/deletecreative_gallery/$1';
$route['(?i)upload_creative_gallery_image'] ='creative_gallery/Creative_gallery_web/upload_creative_gallery_image';
$route['(?i)creative_gallery_table'] ='creative_gallery/datatable/creative_gallery_table';

