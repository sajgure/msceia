<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 09 apr 20
	-------------------------------------------------------------
	*/
	public function __construct() 
    {
        parent::__construct();  
        $this->load->library('lib_datatables');
        $this->load->library('Encryptdecryptstring'); 

    }
    public function course_master_table()
    {
       $query = "SELECT * FROM tbl_course_master tcm  WHERE tcm.display='Y'";
		$search = array('tcm.course_name','tcm.course_desc','tcm.course_master_id');
		$clause=''; $order = "tcm.course_master_id DESC";
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
				$row[] = '<span class="font-green-haze bold">'.((isset($key->course_name) && !empty($key->course_name))?$key->course_name:'');
				$row[] = ((isset($key->course_desc) && !empty($key->course_desc)) ? $key->course_desc:'');
				

                $course_master_id = $this->encryptdecryptstring->encrypt_string($key->course_master_id);
				
				if($key->in_use=='Y')
                { 
                	
                    $row[]='<span class="tbl_action" data-col="course_master_id"><center><a rel="'.((isset($key->course_master_id) && !empty($key->course_master_id)) ? $key->course_master_id:'').'" rev="hide-course-master" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-course/'.((isset($course_master_id) && !empty($course_master_id)) ? $course_master_id:'').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-course-master/'.((isset($key->course_master_id) && !empty($key->course_master_id)) ? $key->course_master_id:'').'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                	

                }
                else
                {                                                     
                    $row[]='<span class="tbl_action" data-col="course_master_id"><center><a rel="'.((isset($key->course_master_id) && !empty($key->course_master_id)) ? $key->course_master_id:'').'" rev="restore-course-master" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'add-course/'.((isset($course_master_id) && !empty($course_master_id)) ? $course_master_id:'').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-course-master/'.((isset($key->course_master_id) && !empty($key->course_master_id)) ? $key->course_master_id:'').'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }

                


				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}