<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Apurva Bandelwar				Date: 18 Mar 2021
	-------------------------------------------------------------
	*/
	public function __construct() 
    {
        parent::__construct();  
        $this->load->library('lib_datatables');
    }
    public function download_master_table()
    {
       $query = "SELECT * FROM tbl_download_link_master ta  WHERE ta.display='Y'";
		$search = array('ta.download_link_name','ta.download_link_description','ta.download_link','ta.visibility','ta.download_link_master_id','ta.upload_user_guide');
		$clause=''; $order = "ta.download_link_master_id DESC";
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
				$row[] = '<span  class="font-green-haze bold">'.((isset($key->download_link_name) && !empty($key->download_link_name))?$key->download_link_name:'').'</span>';
				$row[] = ((isset($key->download_link_description) && !empty($key->download_link_description)) ? $key->download_link_description:'');
				$row[] = '<span style="word-break:break-all;">'.((isset($key->download_link) && !empty($key->download_link)) ? $key->download_link:'').'</span>';
				$row[] = ((isset($key->upload_user_guide) && !empty($key->upload_user_guide)) ? $key->upload_user_guide:'');
				if($key->visibility=='Y')
				{
					 $visibility='<center><span class="label bg-yellow-gold">Enable</span></center>';
				}
				else
				{
					$visibility='<center><span class="label bg-red-thunderbird">Disable</span></center>';
				}
				$row[] =((isset($visibility) && !empty($visibility)) ? $visibility:'');
				$download_id = $this->encryptdecryptstring->encrypt_string($key->download_link_master_id);
				if($key->in_use=='Y')
                { 
                    $row[]='<span class="tbl_action" data-col="download_link_master_id"><center><a rel="'.((isset($key->download_link_master_id) && !empty($key->download_link_master_id)) ? $key->download_link_master_id:'').'" rev="hide-download-link-master" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-download-master/'.$download_id.'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-download-link-master/'.((isset($key->download_link_master_id) && !empty($key->download_link_master_id)) ? $key->download_link_master_id:'').'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }
                else
                {                                                     
                    $row[]='<span class="tbl_action" data-col="download_link_master_id"><center><a rel="'.((isset($key->download_link_master_id) && !empty($key->download_link_master_id)) ? $key->download_link_master_id:'').'" rev="restore-download-link-master" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'add-download-master/'.$download_id.'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-download-link-master/'.((isset($key->download_link_master_id) && !empty($key->download_link_master_id)) ? $key->download_link_master_id:'').'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }
				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}