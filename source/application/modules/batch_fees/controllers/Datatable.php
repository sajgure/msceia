<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Apurva Bandelwar				Date: 27 March 21
	-------------------------------------------------------------
	*/
	public function __construct() 
    {
        parent::__construct();  
        $this->load->library('lib_datatables');
        $this->load->library('Encryptdecryptstring'); 
        
    }
    public function batch_fees_table()
    {
        $query = "SELECT tbf.*, tb.batch_name FROM tbl_batch_fees tbf LEFT JOIN tbl_batch tb ON tb.batch_id = tbf.batch_id WHERE tbf.display='Y' ";
		$search = array('tb.batch_name','tb.minimum_student','tb.maximum_student','tb.minimum_fees','tbf.maximum_fees','tbf.batch_fees_id');
		$clause=''; $order = "tbf.batch_fees_id DESC";
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
				$row[] = '<center><span  class="font-green-haze bold">'.((isset($key->batch_name) && !empty($key->batch_name))?$key->batch_name:'').'</span></center>';
				$row[] = '<center>'.((isset($key->minimum_student) && !empty($key->minimum_student)) ? $key->minimum_student:'').'</center>';
				$row[] = '<center>'.((isset($key->maximum_student) && !empty($key->maximum_student)) ? $key->maximum_student:'').'</center>';
				$row[] = '<center>'.((isset($key->minimum_fees) && !empty($key->minimum_fees)) ? $key->minimum_fees:'').'</center>';
				$row[] = '<center>'.((isset($key->maximum_fees) && !empty($key->maximum_fees)) ? $key->maximum_fees:'').'</center>';
                $batch_fees_id = $this->encryptdecryptstring->encrypt_string($key->batch_fees_id);
				

				if($key->in_use=='Y')
                { 
                	
                    $row[]='<span class="tbl_action" data-col="batch_fees_id"><center><a rel="'.((isset($key->batch_fees_id) && !empty($key->batch_fees_id)) ? $key->batch_fees_id:'').'" rev="hide-batch-fees" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-batch-fees/'.((isset($batch_fees_id) && !empty($batch_fees_id)) ? $batch_fees_id:'').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-batch-fees/'.((isset($key->batch_fees_id) && !empty($key->batch_fees_id)) ? $key->batch_fees_id:'').'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';

                }
                else
                {                                                     
                    $row[]='<span class="tbl_action" data-col="batch_fees_id"><center><a rel="'.((isset($key->batch_fees_id) && !empty($key->batch_fees_id)) ? $key->batch_fees_id:'').'" rev="restore-batch-fees" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'add-batch-fees/'.((isset($batch_fees_id) && !empty($batch_fees_id)) ? $batch_fees_id:'').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-batch-fees/'.((isset($key->batch_fees_id) && !empty($key->batch_fees_id)) ? $key->batch_fees_id:'').'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }

				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}