<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)get-file/(.*)'] ='media/newGetFilePath/$1/$2';
$route['(?i)getFilePath/(.*)'] ='media/getFilePath/$1';
$route['(?i)getFilePathPayment/(.*)'] ='media/getFilePathPayment/$1';

$route['(?i)User-Profile-Picture'] ='media/uploadUserProfilePicture';
$route['(?i)getFilePathThumb/(.*)'] ='media/getFilePathThumb/$1';

$route['(?i)get-file-payment/(.*)'] ='media/newGetFilePathPayment/$1/$2';	

$route['(?i)getDailyStockFilePath/(.*)'] ='media/getDailyStockFilePath/$1';