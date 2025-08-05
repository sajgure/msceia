<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 22 apr 20
	-------------------------------------------------------------
	*/
	public function __construct() 
    {
        parent::__construct();  
        $this->load->library('lib_datatables');
        $this->load->library('Encryptdecryptstring'); 
        
    }
    public function batch_master_table()
    {
       $query = "SELECT * FROM tbl_batch tb  WHERE tb.display='Y'";
		$search = array('tb.batch_name','tb.batch_description','tb.seat_no_prefix','tb.batch_id');
		$clause=''; $order = "tb.batch_id DESC";
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
				$row[] = '<span class="font-green-haze bold">'.((isset($key->batch_name) && !empty($key->batch_name))?$key->batch_name:'');
				$row[] = ((isset($key->batch_description) && !empty($key->batch_description)) ? $key->batch_description:'');
				$row[] = ((isset($key->seat_no_prefix) && !empty($key->seat_no_prefix)) ? $key->seat_no_prefix:'');
				$row[] = '<center>'.((isset($key->start_date) && !empty($key->start_date)) ?date('d-m-Y',strtotime($key->start_date)):'').'</center>';
				$row[] = '<center>'.((isset($key->end_date) && !empty($key->end_date)) ?date('d-m-Y',strtotime($key->end_date)):'').'</center>';
				$row[] = '<center>'.((isset($key->exam_time) && !empty($key->exam_time)) ?$key->exam_time:'').'</center>';
				
                $batch_id = $this->encryptdecryptstring->encrypt_string($key->batch_id);
				
				if($key->in_use=='Y')
                { 
                	
                    $row[]='<span class="tbl_action" data-col="batch_id"><center><a rel="'.((isset($key->batch_id) && !empty($key->batch_id)) ? $key->batch_id:'').'" rev="hide-batch" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-batch/'.((isset($batch_id) && !empty($batch_id)) ? $batch_id:'').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'permanent-delete-batch/'.((isset($key->batch_id) && !empty($key->batch_id)) ? $key->batch_id:'').'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';

                }
                else
                {                                                     
                    $row[]='<span class="tbl_action" data-col="batch_id"><center><a rel="'.((isset($key->batch_id) && !empty($key->batch_id)) ? $key->batch_id:'').'" rev="restore-batch" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'add-batch/'.((isset($batch_id) && !empty($batch_id)) ? $batch_id:'').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'permanent-delete-batch/'.((isset($key->batch_id) && !empty($key->batch_id)) ? $key->batch_id:'').'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }

				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}