<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Apurva Bandelwar				Date: 29-09-2022
	-------------------------------------------------------------
	*/
	public function __construct() 
    {
        parent::__construct();  
        $this->load->library('lib_datatables');
    }
    public function objective_book_notice_table()
    {
        $query = "SELECT * FROM tbl_objective_book_notice tbn  WHERE tbn.display='Y'";
		$search = array('tbn.objective_notice_id','tbn.objective_notice_name','tbn.objective_notice_desc','tbn.visibility');
		$clause=''; $order = "tbn.objective_notice_id DESC";
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
				$row[] = '<span  class="font-green-haze bold">'.((isset($key->objective_notice_name) && !empty($key->objective_notice_name))?$key->objective_notice_name:'');
				$row[] = ((isset($key->objective_notice_desc) && !empty($key->objective_notice_desc)) ? $key->objective_notice_desc:'');
				if($key->visibility=='Y')
				{
					$visibility = '<center><span class="label bg-yellow-gold">Enable</span></center>';
				}
				else
				{
					$visibility = '<center><span class="label bg-red-thunderbird">Disable</span></center>';
				}
				$row[] =((isset($visibility) && !empty($visibility))?$visibility:'');
				$objective_notice_id = $this->encryptdecryptstring->encrypt_string($key->objective_notice_id);
				if($key->in_use=='Y')
                { 
                    $row[]='<span class="tbl_action" data-col="objective_notice_id"><center><a rel="'.((isset($key->objective_notice_id) && !empty($key->objective_notice_id)) ? $key->objective_notice_id:'').'" rev="hide-objective-notice-master" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-objective-book-notice/'.$objective_notice_id.'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'permanent-delete-objective-notice/'.((isset($key->objective_notice_id) && !empty($key->objective_notice_id))?$key->objective_notice_id:'').'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }
                else
                {                                                     
                    $row[]='<span class="tbl_action" data-col="objective_notice_id"><center><a rel="'.((isset($key->objective_notice_id) && !empty($key->objective_notice_id)) ? $key->objective_notice_id:'').'" rev="restore-objective-notice-master" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'add-objective-book-notice/'.$objective_notice_id.'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'permanent-delete-objective-notice/'.((isset($key->objective_notice_id) && !empty($key->objective_notice_id)) ? $key->objective_notice_id:'').'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }
				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}