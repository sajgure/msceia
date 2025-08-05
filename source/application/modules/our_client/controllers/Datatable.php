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
    }
    public function client_master_table()
    {
        $query = "SELECT * FROM tbl_our_client toc  WHERE toc.display='Y'";
		$search = array('toc.name','toc.link','toc.our_client_id','toc.logo');
		$clause=''; $order = "toc.our_client_id DESC";
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
				$row[] = ((isset($key->link) && !empty($key->link)) ? $key->link:'');
				$row[] ='<center><img style="width:150px;height:100px;" src="'.base_url().'uploads/client_photos/'.((isset($key->logo) && !empty($key->logo)) ? $key->logo:'default.png').'"></center>';
				$our_client_id = $this->encryptdecryptstring->encrypt_string($key->our_client_id);
				if($key->in_use=='Y')
                { 
                    $row[]='<span class="tbl_action" data-col="our_client_id"><center><a rel="'.((isset($key->our_client_id) && !empty($key->our_client_id)) ? $key->our_client_id:'').'" rev="hide-our-client" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-client/'.$our_client_id.'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-our-client/'.((isset($key->our_client_id) && !empty($key->our_client_id)) ? $key->our_client_id:'').'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }
                else
                {                                                     
                    $row[]='<span class="tbl_action" data-col="our_client_id"><center><a rel="'.((isset($key->our_client_id) && !empty($key->our_client_id)) ? $key->our_client_id:'').'" rev="restore-our-client" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'add-client/'.$our_client_id.'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-our-client/'.((isset($key->our_client_id) && !empty($key->our_client_id)) ? $key->our_client_id:'').'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }

				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}