<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 10 apr 20
	-------------------------------------------------------------
	*/
	public function __construct() 
    {
        parent::__construct();  
        $this->load->library('lib_datatables');
        $this->load->library('Encryptdecryptstring'); 

    }
    public function faq_topic_table()
    {
       $query = "SELECT * FROM tbl_faq_topics tft  WHERE tft.display='Y'";
		$search = array('tft.faq_topic_name','tft.faq_topic_description','tft.faq_topic_id');
		$clause=''; $order = "tft.faq_topic_id DESC";
		$result = $this->lib_datatables->datatable($query,$search,$order,$clause);
		$data =array();
		if(isset($result) && !empty($result))
		{
			$no = $_POST['start'];
			foreach ($result as $key)
			{
				$no++;
				$row = array();
				$row[] = '<center>'.$no.'</center>';
				$row[] = '<span class="font-green-haze bold">'.((isset($key->faq_topic_name) && !empty($key->faq_topic_name))?$key->faq_topic_name:'');
				$row[] = ((isset($key->faq_topic_description) && !empty($key->faq_topic_description)) ? $key->faq_topic_description:'');

                $faq_topic_id = $this->encryptdecryptstring->encrypt_string($key->faq_topic_id);
				
				
				if($key->in_use=='Y')
                { 
                	
                    $row[]='<span class="tbl_action" data-col="faq_topic_id"><center><a rel="'.((isset($key->faq_topic_id) && !empty($key->faq_topic_id)) ? $key->faq_topic_id:'').'" rev="hide-faq-topics" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-faq-topic/'.((isset($faq_topic_id) && !empty($faq_topic_id)) ? $faq_topic_id:'').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-faq-topics/'.((isset($key->faq_topic_id) && !empty($key->faq_topic_id)) ? $key->faq_topic_id:'').'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                	

                }
                else
                {                                                     
                    $row[]='<span class="tbl_action" data-col="faq_topic_id"><center><a rel="'.((isset($key->faq_topic_id) && !empty($key->faq_topic_id)) ? $key->faq_topic_id:'').'" rev="restore-faq-topics" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'add-faq-topic/'.((isset($faq_topic_id) && !empty($faq_topic_id)) ? $faq_topic_id:'').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-faq-topics/'.((isset($key->faq_topic_id) && !empty($key->faq_topic_id)) ? $key->faq_topic_id:'').'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }

                


				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}