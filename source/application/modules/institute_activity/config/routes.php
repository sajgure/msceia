<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Web Controller Routes
$route['(?i)institute-activity-list']="institute_activity/institute_activity_web/institute_activity_list";
$route['(?i)add-institute-activity']="institute_activity/institute_activity_web/add_institute_activity";
$route['(?i)add-institute-activity/(:any)']="institute_activity/institute_activity_web/add_institute_activity/$1";

// Rest Controller Routes  
$route['(?i)institute-activity']="institute_activity/institute_activity_rest/institute_activity";
$route['(?i)hide-institute-activity']="institute_activity/institute_activity_rest/hide_institute_activity";
$route['(?i)restore-institute-activity']="institute_activity/institute_activity_rest/restore_institute_activity";
$route['(?i)delete-institute-activity/(:any)']="institute_activity/institute_activity_rest/permanent_delete_institute_activity/$1";

// Datatable Controller Routes


