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
    public function speed_passage_table()
    {
       $query = "SELECT tsp.*,tcm.course_name FROM tbl_speed_passage tsp LEFT JOIN tbl_course_master tcm ON tsp.course_master_id=tcm.course_master_id  WHERE tsp.display='Y'";
		$search = array('tcm.course_name','tsp.exam_type','tsp.description');
		$clause=''; $order = "tsp.speed_passage_id Asc";
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
				$row[] = '<center>'.((isset($key->exam_type) && !empty($key->exam_type)) ? $key->exam_type:'').'</center>';
				$row[] = ((isset($key->description) && !empty($key->description)) ? $key->description:'');

                $speed_passage_id = $this->encryptdecryptstring->encrypt_string($key->speed_passage_id);


				if($key->in_use=='Y')
                { 
                	
                    $row[]='<span class="tbl_action" data-col="speed_passage_id"><center><a rel="'.$key->speed_passage_id.'" rev="hide-speed-passage" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-speed-passage/'.$speed_passage_id.'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-speed-passage/'.$key->speed_passage_id.'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                	

                }
                else
                {                                                     
                    $row[]='<span class="tbl_action" data-col="speed_passage_id"><center><a rel="'.$key->speed_passage_id.'" rev="restore-speed-passage" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'add-speed-passage/'.$speed_passage_id.'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-speed-passage/'.$key->speed_passage_id.'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }

                


				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}