<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * where to send php errors to and from
 *
 * @author Rahul D
 * 05-05-2016
 */
// to enable, set this to true
$config['email_php_errors'] = true;
$config['php_error_from'] = 'test4unicus@gmail.com';
$config['php_error_to'] = 'test4unicus@gmail.com';
// available shortcodes are {{severity}}, {{message}}, {{filepath}}, {{line}}
$config['php_error_subject'] = 'An Error Occurred';
$config['php_error_content'] = 'Severity: {{severity}} --> {{message}} File Path: {{filepath}} Line: {{line}}';
/* End of file email_php_errors.php */
/* Location: ./application/config/email_php_errors.php */