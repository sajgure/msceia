<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 08 apr 20
	-------------------------------------------------------------
	*/
	public function __construct() 
    {
        parent::__construct();  
        $this->load->library('lib_datatables');
        $this->load->library('Encryptdecryptstring'); 

    }
    public function voter_master_table()
    {
       $query = "SELECT * FROM tbl_voter_master tgm  WHERE tgm.display='Y'";
		$search = array('tgm.voter_master_title','tgm.file','tgm.voter_master_description','tgm.voter_master_id');
		$clause=''; $order = "tgm.voter_master_id DESC";
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
				$row[] = '<span class="font-green-haze bold" style="word-break: break-all;">'.((isset($key->voter_master_title) && !empty($key->voter_master_title))?$key->voter_master_title:'').'</span>';
				$row[] ='<center><a style="text-decoration:none;color:black" target="_blank" href="'.base_url().'uploads/voter_uploads/'.((isset($key->voter_master_file) && !empty($key->voter_master_file)) ? $key->voter_master_file:'default.png').'">'. ((isset($key->voter_master_file) && !empty($key->voter_master_file)) ? $key->voter_master_file:'').'</a></center>';
				$row[] = '<span style="word-break: break-all;">'.((isset($key->voter_master_description) && !empty($key->voter_master_description)) ? $key->voter_master_description:'').'</span>';
				
                $voter_master_id = $this->encryptdecryptstring->encrypt_string($key->voter_master_id);
				
				if($key->in_use=='Y')
                { 
                	
                    $row[]='<span class="tbl_action" data-col="voter_master_id"><center><a rel="'.$key->voter_master_id.'" rev="hide-voter-master" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-voter/'.$voter_master_id.'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-voter-master/'.$key->voter_master_id.'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                	

                }
                else
                {                                                     
                    $row[]='<span class="tbl_action" data-col="voter_master_id"><center><a rel="'.$key->voter_master_id.'" rev="restore-voter-master" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'add-voter/'.$voter_master_id.'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-voter-master/'.$key->voter_master_id.'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }

                


				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}