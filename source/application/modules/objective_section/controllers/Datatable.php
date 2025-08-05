<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 16 apr 20
	-------------------------------------------------------------
	*/
	public function __construct() 
    {
        parent::__construct();  
        $this->load->library('lib_datatables');
    }
    public function objective_section_table()
    {
       $query = "SELECT tos.*,ts.name FROM tbl_question tos LEFT JOIN tbl_section ts ON tos.section_id=ts.section_id  WHERE tos.display='Y'";
		$search = array('ts.name','tos.exam_type','tos.question_hindi','tos.question_english','tos.question_marathi','tos.ans_option');
		$clause=''; $order = "tos.question_id Asc";
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
				$row[] = '<span style="color: #3598dc; font-weight: bold;">'.((isset($key->name) && !empty($key->name))?$key->name:'');
				$row[] = ((isset($key->question_english) && !empty($key->question_english)) ? $key->question_english:'');
				$row[] = ((isset($key->question_marathi) && !empty($key->question_marathi)) ? $key->question_marathi:'');
				$row[] = ((isset($key->question_hindi) && !empty($key->question_hindi)) ? $key->question_hindi:'');
				$row[] = ((isset($key->ans_option) && !empty($key->ans_option)) ? $key->ans_option:'');
				$row[] = ((isset($key->exam_type) && !empty($key->exam_type)) ? $key->exam_type:'');
				if($key->in_use=='Y')
                { 
                    $row[]='<span class="tbl_action" data-col="question_id"><center><a rel="'.$key->question_id.'" rev="hide-objective-section" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-objective-section/'.$key->question_id.'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-objective-section/'.$key->question_id.'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }
                else
                {                                                     
                    $row[]='<span class="tbl_action" data-col="question_id"><center><a rel="'.$key->question_id.'" rev="restore-objective-section" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'add-objective-section/'.$key->question_id.'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-objective-section/'.$key->question_id.'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }
				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
    public function objective_questions_table($year,$course)
    {
    	$whr='';
	    if($year)$whr=$whr.'exam_type="'.str_replace("%20"," ",$year).'" AND ';	
	    if($course)$whr=$whr.'course="'.str_replace("%20"," ",$course).'" AND ';
       	$query = "SELECT * FROM tbl_que AS tq LEFT JOIN tbl_opt AS top ON tq.option_id = top.option_id WHERE $whr tq.display='Y'";
		$search = array('tq.question_id','tq.exam_type','tq.batch','tq.course','tq.question','top.option');
		$clause = ""; 
		$order= "tq.question_id DESC";
		$result = $this->lib_datatables->datatable($query,$search,$order,$clause);
		echo '------------';
		$data =array();
		if(isset($result) && !empty($result))
		{
			$no = $_POST['start'];
			foreach ($result as $key)
			{
				$no++;
				$row = array();
				$row[] = '<center>'.$no.'</center>';
				$row[] = '<span class="font-green-haze bold">'.((isset($key->exam_type) && !empty($key->exam_type))?$key->exam_type:'');
				$row[] = ((isset($key->course) && !empty($key->course)) ? $key->course:'');
				$row[] = ((isset($key->batch) && !empty($key->batch)) ? $key->batch:'');
				$row[] = ((isset($key->question) && !empty($key->question)) ? $key->question:'');
				$row[] = ((isset($key->option) && !empty($key->option)) ? $key->option:'');
                $row[]='<center> <a rev="'.'delete-objective-question/'.$key->question_id.'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span></center>';
				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}