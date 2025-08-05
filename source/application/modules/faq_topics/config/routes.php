<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['faq-topic-list'] ='faq_topics/Faq_topics_web/faq_topic_list';
$route['add-faq-topic'] ='faq_topics/Faq_topics_web/add_faq_topic';
$route['add-faq-topic/(:any)'] ='faq_topics/Faq_topics_web/add_faq_topic/$1';

$route['(?i)faq-topics']="faq_topics/faq_topics_rest/faq_topics";
$route['(?i)hide-faq-topics']="faq_topics/faq_topics_rest/hide_faq_topics";
$route['(?i)restore-faq-topics']="faq_topics/faq_topics_rest/restore_faq_topics";
$route['(?i)delete-faq-topics/(:any)']="faq_topics/faq_topics_rest/delete_faq_topics/$1";

$route['faq_topic_table'] ='faq_topics/datatable/faq_topic_table';

