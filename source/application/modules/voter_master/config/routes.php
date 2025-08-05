<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['voter-master-list'] ='voter_master/voter_master_web/voter_list';
$route['add-voter'] ='voter_master/voter_master_web/add_voter';
$route['add-voter/(:any)'] ='voter_master/voter_master_web/add_voter/$1';
$route['delete_voter'] ='voter_master/voter_master_web/delete_voter';
$route['edit_voter'] ='voter_master/voter_master_web/edit_voter';

$route['(?i)voter-master']="voter_master/voter_master_rest/voter_master";
$route['(?i)hide-voter-master']="voter_master/voter_master_rest/hide_voter_master";
$route['(?i)restore-voter-master']="voter_master/voter_master_rest/restore_voter_master";
$route['(?i)delete-voter-master/(:any)']="voter_master/voter_master_rest/delete_voter_master/$1";

$route['voter_master_table'] ='voter_master/datatable/voter_master_table';

$route['upload_voter_master_file'] ='voter_master/voter_master_web/upload_voter_master_file';
