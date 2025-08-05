<?php defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)album']="album/album_rest/album";
$route['(?i)hide-album']="album/album_rest/hide_album";
$route['(?i)restore-album']="album/album_rest/restore_album";
$route['(?i)delete-album/:num']="album/album_rest/permanent_delete_album/$1";


$route['(?i)album-list']="album/album_web/album_list";
$route['(?i)add-album']="album/album_web/add_album";
$route['(?i)add-album/(:any)']="album/album_web/add_album/$1";
$route['(?i)album_master_table']="album/Datatable/album_master_table";




  










