<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 05 may 20
	-------------------------------------------------------------
	*/
	public function __construct() 
    {
        parent::__construct();  
        $this->load->library('lib_datatables');
    }
	public function institute_queries_table()
	{
		$query = "SELECT tq.*, ti.institute_name, ti.institute_code, ti.institute_contact FROM tbl_query tq Left join tbl_institute ti on tq.institute_id=ti.institute_id where tq.display='Y' ";
		$search = array('ti.institute_name', 'ti.institute_code', 'ti.institute_contact', 'tq.inserted_by', 'tq.inserted_on', 'tq.query', 'tq.message', 'tq.query_status', 'tq.query_id');
		$clause=''; $order = "tq.inserted_on Desc";
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
				$row[] = ((isset($key->institute_name) && !empty($key->institute_name))?$key->institute_name:'').'<br>'.((isset($key->institute_code) && !empty($key->institute_code))?$key->institute_code:'');
				$row[] = ((isset($key->institute_contact) && !empty($key->institute_contact)) ? $key->institute_contact:'');
				$row[] = ((isset($key->inserted_by) && !empty($key->inserted_by)) ? $key->inserted_by:'');
				$row[] = ((isset($key->inserted_on) && !empty($key->inserted_on)) ? $key->inserted_on:'');
				$row[] = ((isset($key->query) && !empty($key->query)) ? $key->query:'');
				$row[] = ((isset($key->message) && !empty($key->message)) ? $key->message:'');
				/*$row[] = '<div class="rateit" data-rateit-resetable="false" data-rateit-mode="font"  data-rateit-readonly="true" data-rateit-max="3" data-rateit-value="'.$key->query_status.'"></div>';*/
				if($key->query_status==1)
				{
					$pending = 'Pending';
					$row[] = '<center><span class="label label-sm label-danger">'.$pending.'</span></center>';
				}
				elseif ($key->query_status==2)
				{
					$callback= 'CallBack';
					$row[] = '<center><span class="label label-sm label-primary">'.$callback.'</span></center>';
				}
				else
				{
					$solved = 'Solved';
					$row[] = '<center><span class="label label-sm label-success">'.$solved.'</span></center>';

				}
				if($key->in_use=='Y')
                { 
                	
                    $row[]='<span class="tbl_action" data-col="query_id"><center><a rel="'.((isset($key->query_id) && !empty($key->query_id)) ? $key->query_id:'').'" rev="hide-query" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-queries/'.((isset($key->query_id) && !empty($key->query_id)) ? $key->query_id:'').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-query/'.((isset($key->query_id) && !empty($key->query_id)) ? $key->query_id:'').'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                	

                }
                else
                {                                                     
                    $row[]='<span class="tbl_action" data-col="query_id"><center><a rel="'.((isset($key->query_id) && !empty($key->query_id)) ? $key->query_id:'').'" rev="restore-query" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'add-queries/'.((isset($key->query_id) && !empty($key->query_id)) ? $key->query_id:'').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-query/'.((isset($key->query_id) && !empty($key->query_id)) ? $key->query_id:'').'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }
				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
	}
}