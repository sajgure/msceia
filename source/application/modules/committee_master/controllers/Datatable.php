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
    public function committee_master_table()
    {
       $query = "SELECT * FROM tbl_committee tc  WHERE tc.display='Y'";
		$search = array('tc.member_name','tc.member_description','tc.member_image','tc.committee_id');
		$clause=''; 
		$order = "tc.committee_id DESC";
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
				$row[] = '<span class="font-green-haze bold">'.((isset($key->member_name) && !empty($key->member_name))?$key->member_name:'');
				$row[] = ((isset($key->member_description) && !empty($key->member_description)) ? $key->member_description:'');
				$row[] ='<center><img style="width:130px;height:130px;" src="'.base_url().'uploads/committee_member_photos/'.((isset($key->member_image) && !empty($key->member_image)) ? $key->member_image:'default.png').'"></center>';
				
                $committee_id = $this->encryptdecryptstring->encrypt_string($key->committee_id);

				if($key->in_use=='Y')
                { 
                	
                    $row[]='<span class="tbl_action" data-col="committee_id"><center><a rel="'.((isset($key->committee_id) && !empty($key->committee_id)) ? $key->committee_id:'').'" rev="hide-committee" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-committee/'.((isset($committee_id) && !empty($committee_id)) ? $committee_id:'').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-committee/'.((isset($key->committee_id) && !empty($key->committee_id)) ? $key->committee_id:'').'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';

                }
                else
                {                                                     
                    $row[]='<span class="tbl_action" data-col="committee_id"><center><a rel="'.((isset($key->committee_id) && !empty($key->committee_id)) ? $key->committee_id:'').'" rev="restore-committee" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.((isset($committee_id) && !empty($committee_id)) ? $committee_id:'').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-committee/'.((isset($key->committee_id) && !empty($key->committee_id)) ? $key->committee_id:'').'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }

				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}