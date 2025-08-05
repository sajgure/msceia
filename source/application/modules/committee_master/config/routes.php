<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)add-committee'] ='committee_master/Committee_master_web/add_committee';
$route['(?i)add-committee/(:any)']='committee_master/Committee_master_web/add_committee/$1';
$route['(?i)committee-master-list'] ='committee_master/Committee_master_web/committee_list';
$route['(?i)committee'] ='committee_master/committee_master_rest/committee_master';
$route['(?i)hide-committee'] ='committee_master/committee_master_rest/hidecommittee_master';
$route['(?i)restore-committee'] ='committee_master/committee_master_rest/restorecommittee_master';
$route['(?i)delete-committee/(:any)'] ='committee_master/committee_master_rest/deletecommittee_master/$1';
//$route['(?i)upload_committee_image']="committee_master/committee_master/upload_committee_image";
$route['(?i)upload_committee_image'] ='committee_master/Committee_master_web/upload_committee_image';
$route['(?i)committee_master_table'] ='committee_master/datatable/committee_master_table';


#$route['(?i)get-committee'] ='committee_master/committee_master_rest/getcommittee_master';
	