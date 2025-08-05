<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)inspectionss']="inspection/inspection_rest/inspection";
// $route['(?i)hide-inspection']="inspection/inspection_rest/hide_inspection";
// $route['(?i)restore-inspection']="inspection/inspection_rest/restore_inspection";
$route['(?i)permanent-delete-inspection/(:any)']="inspection/inspection_rest/permanent_delete_inspection/$1";
       