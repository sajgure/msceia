<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 15 apr 20
	-------------------------------------------------------------
	*/
	public function __construct() 
    {
        parent::__construct();  
        $this->load->library('lib_datatables');
        $this->load->library('Encryptdecryptstring'); 

    }
    public function email_master_table()
    {
       $query = "SELECT tes.*,tcm.course_name FROM tbl_email_section tes LEFT JOIN tbl_course_master tcm ON tes.course_master_id=tcm.course_master_id  WHERE tes.display='Y'";
		$search = array('tcm.course_name','tes.exam_type','tes.to','tes.cc','tes.bcc','tes.subject','tes.message','tes.attachment1','tes.attachment2');
		$clause=''; $order = "tes.email_section_id Asc";
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
				$row[] = '<center><span class="font-green-haze bold">'.((isset($key->course_name) && !empty($key->course_name))?$key->course_name:'').'</span></center>';
				$row[] =((isset($key->to) && !empty($key->to)) ? $key->to:'').'<br>'.((isset($key->cc) && !empty($key->cc)) ? $key->cc:'').'<br>'.((isset($key->bcc) && !empty($key->bcc)) ? $key->bcc:'');
				$row[] = ((isset($key->subject) && !empty($key->subject)) ? $key->subject:'');
				$row[] = ((isset($key->message) && !empty($key->message)) ? $key->message:'');
				$row[] = ((isset($key->attachment1) && !empty($key->attachment1)) ? $key->attachment1:'').'<br>'.((isset($key->attachment2) && !empty($key->attachment2)) ? $key->attachment2:'');
				$row[] = ((isset($key->exam_type) && !empty($key->exam_type)) ? $key->exam_type:'');

                $email_section_id = $this->encryptdecryptstring->encrypt_string($key->email_section_id);
				
				if($key->in_use=='Y')
                { 
                	
                    $row[]='<span class="tbl_action"  data-col="email_section_id"><center><a rel="'.$key->email_section_id.'" rev="hide-email-section" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-email/'.$email_section_id.'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-email-section/'.$key->email_section_id.'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                	

                }
                else
                {                                                     
                    $row[]='<span class="tbl_action"  data-col="email_section_id"><center><a rel="'.$key->email_section_id.'" rev="restore-email-section" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'add-email/'.$email_section_id.'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-email-section/'.$key->email_section_id.'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }

                


				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}