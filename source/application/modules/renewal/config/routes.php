<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)renewal']="renewal/renewal_rest/renewal";
// $route['(?i)hide-renewal']="renewal/renewal_rest/hide_renewal";
// $route['(?i)restore-renewal']="renewal/renewal_rest/restore_renewal";
$route['(?i)delete-renewal']="renewal/renewal_rest/delete_renewal";
$route['(?i)permanent-delete-renewal/(:any)']="renewal/renewal_rest/permanent_delete_renewal/$1";
      