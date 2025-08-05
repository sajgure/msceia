<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 27 mar 20
	-------------------------------------------------------------
	*/
	public function __construct() 
    {
        parent::__construct();  
        $this->load->library('lib_datatables');
    }

    public function contact_table()
    {
       	$query =  "SELECT * FROM tbl_contact tc where tc.display='Y'";
		$search = array('tc.name','tc.email','tc.mobile_number','tc.message','tc.reply','tc.status','tc.contact_id');
		$clause=''; $order = "tc.contact_id DESC";
		$result = $this->lib_datatables->datatable($query,$search,$order,$clause);
		$data = array();
		if(isset($result) && !empty($result))
		{
			$no = $_POST['start'];
			foreach ($result as $key)
			{
				$no++;
				$row = array();
				$row[] = '<center>'.$no.'</center>';
				$row[] = '<span class="font-green-haze bold">'.((isset($key->name) && !empty($key->name)) ? $key->name:'').'</span>';
				$row[] = ((isset($key->mobile_number) && !empty($key->mobile_number))?$key->mobile_number:'');
				$row[] = ((isset($key->email) && !empty($key->email)) ? $key->email:'');
				$row[] = ((isset($key->message) && !empty($key->message)) ? $key->message:'');
				$row[] = ((isset($key->reply) && !empty($key->reply)) ? $key->reply:'');
				$row[] = ((isset($key->status) && !empty($key->status)) ? $key->status:'');
				$row[] = '<a rel="'.((isset($key->contact_id) && !empty($key->contact_id)) ? $key->contact_id:'').'" rev="reply_contact" data-title="Contact Form" class="btn btn-success btn-sm popup_save">Reply</a>';
				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }    
}