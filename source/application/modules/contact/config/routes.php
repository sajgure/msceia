<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(?i)contact']="contact/contact_rest/contact";
$route['(?i)hide-contact']="contact/contact_rest/hide_contact";
$route['(?i)restore-contact']="contact/contact_rest/restore_contact";
$route['(?i)permanent-delete-contact/:num']="contact/contact_rest/permanent_delete_contact/$1";

$route['(?i)contact_table']="contact/datatable/contact_table";
$route['(?i)contact-list']="contact/contact_web/contacts_list";
$route['(?i)reply_contact']="contact/contact_web/reply_contact";
$route['(?i)sent_message']="contact/contact_web/sent_message";

