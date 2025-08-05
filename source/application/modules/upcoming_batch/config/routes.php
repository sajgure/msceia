<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//API
$route['(?i)upcoming-batch'] ='upcoming_batch/upcoming_batch_rest/upcoming_batch';

//WEB

$route['(?i)upcoming-batch-master'] ='upcoming_batch/upcoming_batch_web/add_upcoming_batch';
$route['(?i)upcoming-batch-master/(:any)'] ='upcoming_batch/upcoming_batch_web/add_upcoming_batch/$1';



