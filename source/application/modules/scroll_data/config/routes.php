<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)scroll-data']="scroll_data/scroll_data_rest/scroll_data";
$route['(?i)hide-scroll-data']="scroll_data/scroll_data_rest/hide_scroll_data";
$route['(?i)restore-scroll-data']="scroll_data/scroll_data_rest/restore_scroll_data";
$route['(?i)delete-scroll-data/(:any)']="scroll_data/scroll_data_rest/delete_scroll_data";
    