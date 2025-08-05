<?php defined('BASEPATH') OR exit('No direct script access allowed');

$route['check_user']='web/web_controller/check_user';
$route['get_msceia_student']='web/web_controller/get_msceia_student';
$route['fetch_video']='web/Web_controller/fetch_video';
$route['get_version']='web/Web_controller/get_version';
$route['redirect_link']='web/Web_controller/redirect_link';
$route['advertise_link']='web/Web_controller/advertise_link';
$route['check_update']='web/Web_controller/check_update';

// $route['app_login']='web/Web_controller/app_login';
$route['check_fek_user']='web/Web_controller/check_fek_user';

// $route['app_login1'] = 'web/web_controller/app_login1';
$route['app_login2'] = 'web/web_controller/app_login2';
$route['ques_data'] = 'web/web_controller/allQuesData';
$route['prev_data'] = 'web/web_controller/allPrevData';
$route['sec_data'] = 'web/web_controller/allSecData';

$route['only_question_data'] = 'web/web_controller/onlyQuesData';
$route['only_option_data'] = 'web/web_controller/onlyOptionData';
$route['only_prev_question_data'] = 'web/web_controller/onlyPrevQuesData';
$route['only_prev_option_data'] = 'web/web_controller/onlyPrevOptionData';

$route['upload_db']='web/Web_controller/upload_db';
$route['upload_batch_db']='web/Web_controller/upload_batch_db';
$route['update_email_marks'] = 'web/web_controller/update_email_marks';
$route['update_speed_marks'] = 'web/web_controller/update_speed_marks';
$route['update_email_mark_new'] = 'web/web_controller/update_email_mark_new';
$route['update_speed_mark_new'] = 'web/web_controller/update_speed_mark_new';
$route['set_result']='web/Web_controller/update_result';

$route['fetch_pin_code_wise_inst'] = 'web/web_controller/fetchPinCodeWiseInst';

$route['elearn_expire']='web/Web_controller/elearn_expire';

$route['upload_exam_data'] = 'web/web_controller/upload_exam_data';
$route['process_json'] = 'web/web_controller/process_json';
$route['pick/(:num)'] = 'web/web_controller/pickAny/$1';

$route['upload_batch_db_failed'] = 'web/web_controller/upload_batch_db_failed';
$route['pick_failed/(:num)'] = 'web/web_controller/pickAny_fromFailed/$1';
$route['process_json_forFailed'] = 'web/web_controller/process_json_forFailed';