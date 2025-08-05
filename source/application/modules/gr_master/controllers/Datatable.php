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
    public function gr_master_table()
    {
       $query = "SELECT * FROM tbl_gr_master tgm  WHERE tgm.display='Y'";
		$search = array('tgm.gr_master_title','tgm.file','tgm.gr_master_description','tgm.gr_master_id');
		$clause=''; $order = "tgm.gr_master_id DESC";
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
				$row[] = '<span class="font-green-haze bold" style="word-break: break-all;">'.((isset($key->gr_master_title) && !empty($key->gr_master_title))?$key->gr_master_title:'').'</span>';
				$row[] ='<center><a style="text-decoration:none;color:black" target="_blank" href="'.base_url().'uploads/gr_uploads/'.((isset($key->gr_master_file) && !empty($key->gr_master_file)) ? $key->gr_master_file:'default.png').'">'. ((isset($key->gr_master_file) && !empty($key->gr_master_file)) ? $key->gr_master_file:'').'</a></center>';
				$row[] = '<span style="word-break: break-all;">'.((isset($key->gr_master_description) && !empty($key->gr_master_description)) ? $key->gr_master_description:'').'</span>';
				
                $gr_master_id = $this->encryptdecryptstring->encrypt_string($key->gr_master_id);
				
				if($key->in_use=='Y')
                { 
                	
                    $row[]='<span class="tbl_action" data-col="gr_master_id"><center><a rel="'.$key->gr_master_id.'" rev="hide-gr-master" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-gr/'.$gr_master_id.'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-gr-master/'.$key->gr_master_id.'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                	

                }
                else
                {                                                     
                    $row[]='<span class="tbl_action" data-col="gr_master_id"><center><a rel="'.$key->gr_master_id.'" rev="restore-gr-master" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'add-gr/'.$gr_master_id.'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-gr-master/'.$key->gr_master_id.'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }

                


				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}