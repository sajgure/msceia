<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 20 apr 20
	-------------------------------------------------------------
	*/
	public function __construct() 
    {
        parent::__construct();  
        $this->load->library('lib_datatables');
    }
    public function objective_order_table()
    {
       $query = "SELECT * FROM tbl_order WHERE display='Y'";
		$search = array('order_id','inserted_on','sub_total','customer_name','address','order_status');
		$clause=''; 
		$order = "inserted_on Desc";
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
				$row[] = 'AP'.str_pad((isset($key->order_id) && !empty($key->order_id))?$key->order_id:'', 6,'0',STR_PAD_LEFT);
				$row[] = ((isset($key->inserted_on) && !empty($key->inserted_on)) ?date('d-m-Y',strtotime($key->inserted_on)):'');
				$row[] = ((isset($key->sub_total) && !empty($key->sub_total)) ? $key->sub_total:'');
				$row[] = ((isset($key->customer_name) && !empty($key->customer_name)) ? $key->customer_name:'');
				$row[] = ((isset($key->address) && !empty($key->address)) ? $key->address:'');
				if($key->order_status=='PENDING')
				{
					$row[] = '<center><span class="label label-sm label-pending">'.'<b>'.((isset($key->order_status) && !empty($key->order_status)) ? $key->order_status:'').'</b>'.'</span></center>';
				}
				elseif ($key->order_status=='ACCEPTED')
				{
					$row[] = '<center><span class="label label-sm label-success">'.'<b>'.((isset($key->order_status) && !empty($key->order_status)) ? $key->order_status:'').'</b>'.'</span></center>';
				}
				elseif ($key->order_status=='PACKED')
				{
					$row[] = '<center><span class="label label-sm label-purple">'.'<b>'.((isset($key->order_status) && !empty($key->order_status)) ? $key->order_status:'').'</b>'.'</span></center>';
				}
				elseif ($key->order_status=='DISPATCHED')
				{
					$row[] = '<center><span class="label label-sm label-warning">'.'<b>'.((isset($key->order_status) && !empty($key->order_status)) ? $key->order_status:'').'</b>'.'</span></center>';
				}
				elseif ($key->order_status=='IN TRANSIT')
				{
					$row[] = '<center><span class="label label-sm label-warning">'.'<b>'.((isset($key->order_status) && !empty($key->order_status)) ? $key->order_status:'').'</b>'.'</span></center>';
				}
				elseif ($key->order_status=='DELIVERED') 
				{
					$row[] = '<center><span class="label label-sm label-primary">'.'<b>'.((isset($key->order_status) && !empty($key->order_status)) ? $key->order_status:'').'</b>'.'</span></center>';
				}
				elseif ($key->order_status=='COMPLETE')
				{
					$row[] = '<center><span class="label label-sm label-success">'.'<b>'.((isset($key->order_status) && !empty($key->order_status)) ? $key->order_status:'').'</b>'.'</span></center>';
				}
				else
				{
					$row[] = '<center><span class="label label-sm label-danger">'.'<b>'.((isset($key->order_status) && !empty($key->order_status)) ? $key->order_status:''.'</b>').'</span></center>';
				}
				
                $row[]='<span ><center><a href="'.base_url().'order-details/'.$key->order_id.'" class="btn-primary btn-sm">View</a></center></span>';               


				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
    
}