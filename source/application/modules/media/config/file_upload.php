<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require(APPPATH."config/mode.php");
/*$config['root']='./uploads/';*/
$config['file_extensions']='png|PNG|jpg|JPG|jpeg|JPEG|pdf|PDF|xls|XLS|xlsx|XLSX|csv|CSV|zip|ZIP|rar|RAR|Webm|wmv|Mkv|Flv|Avi|mp4';

$config['file_size']='30'; //Single file upload size in mb

$config['mode'] = $mode;//test, live,live-test,

$config['route_path']['live']='/home/ms90v57nzyh8/private_upload/saraswati_private_live'; // online live
$config['route_path']['test']='/home/ms90v57nzyh8/private_upload/saraswati_private_test'; // online test

$config['route_path']['local']='./private_upload/'; // local 
