<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Apurva Bandelwar				Date: 10-03-2021
	-------------------------------------------------------------
	*/
	public function __construct() 
    {
        parent::__construct();  
        $this->load->library('lib_datatables');
        $this->load->library('Encryptdecryptstring'); 
        
    }
    public function home_page_master_table()
    {
        $query = "SELECT * FROM tbl_home_page_commitee thp  WHERE thp.display='Y'";
		$search = array('thp.name','thp.designation','thp.home_page_commitee_id','thp.photo');
		$clause=''; 
		$order = "thp.home_page_commitee_id DESC";
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
				$row[] = '<span  class="font-green-haze bold">'.((isset($key->name) && !empty($key->name))?$key->name:'');
				$row[] = ((isset($key->designation) && !empty($key->designation)) ? $key->designation:'');
				$row[] = '<center>'.((isset($key->sequence_no) && !empty($key->sequence_no)) ? $key->sequence_no:'').'</center>';
				$row[] ='<center><img style="width:150px;height:100px;" src="'.base_url().'uploads/member_photos/'.((isset($key->photo) && !empty($key->photo)) ? $key->photo:'default.png').'"></center>';
				
                $home_page_commitee_id = $this->encryptdecryptstring->encrypt_string($key->home_page_commitee_id);
				if($key->in_use=='Y')
                { 
                	
                    $row[]='<span class="tbl_action" data-col="home_page_commitee_id"><center><a rel="'.((isset($key->home_page_commitee_id) && !empty($key->home_page_commitee_id)) ? $key->home_page_commitee_id:'').'" rev="hide-home-page-commitee" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-home-page-committee/'.((isset($home_page_commitee_id) && !empty($home_page_commitee_id)) ? $home_page_commitee_id:'').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-home-page-commitee/'.((isset($key->home_page_commitee_id) && !empty($key->home_page_commitee_id)) ? $key->home_page_commitee_id:'').'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';

                }
                else
                {                                                     
                    $row[]='<span class="tbl_action" data-col="home_page_commitee_id"><center><a rel="'.((isset($key->home_page_commitee_id) && !empty($key->home_page_commitee_id)) ? $key->home_page_commitee_id:'').'" rev="restore-home-page-commitee" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'add-home-page-committee/'.((isset($home_page_commitee_id) && !empty($home_page_commitee_id)) ? $home_page_commitee_id:'').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-home-page-commitee/'.((isset($key->home_page_commitee_id) && !empty($key->home_page_commitee_id)) ? $key->home_page_commitee_id:'').'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }

				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}