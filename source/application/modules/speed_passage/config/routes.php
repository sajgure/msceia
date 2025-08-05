<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['(?i)speed-passage']="speed_passage/speed_passage_rest/speed_passage";
$route['(?i)hide-speed-passage']="speed_passage/speed_passage_rest/hide_speed_passage";
$route['(?i)restore-speed-passage']="speed_passage/speed_passage_rest/restore_speed_passage";
$route['(?i)delete-speed-passage/(:any)']="speed_passage/speed_passage_rest/delete_speed_passage/$1";
$route['(?i)speed-passage-list']="speed_passage/speed_passage_web/speed_passage_list";
$route['(?i)add-speed-passage']="speed_passage/speed_passage_web/add_speed_passage";
$route['(?i)add-speed-passage/(:any)']="speed_passage/speed_passage_web/add_speed_passage/$1";
$route['(?i)speed_passage_table']="speed_passage/datatable/speed_passage_table";

