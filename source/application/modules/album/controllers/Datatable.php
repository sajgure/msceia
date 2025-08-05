<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 21 apr 20
	-------------------------------------------------------------
	*/
	public function __construct() 
    {
        parent::__construct();  
        $this->load->library('lib_datatables');
        $this->load->library('Encryptdecryptstring'); 
        
    }
    public function album_master_table()
    {
       $query = "SELECT * FROM tbl_album ta  WHERE ta.display='Y'";
		$search = array('ta.album_name','ta.album_desc','ta.album_id');
		$clause=''; $order = "ta.album_id DESC";
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
				$row[] = '<span  class="font-green-haze bold">'.((isset($key->album_name) && !empty($key->album_name))?$key->album_name:'');
				$row[] = ((isset($key->album_desc) && !empty($key->album_desc)) ? $key->album_desc:'');
				
                $album_id = $this->encryptdecryptstring->encrypt_string($key->album_id);
				
				if($key->in_use=='Y')
                { 
                	
                    $row[]='<span class="tbl_action" data-col="album_id"><center><a rel="'.((isset($key->album_id) && !empty($key->album_id)) ? $key->album_id:'').'" rev="hide-album" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-album/'.((isset($album_id) && !empty($album_id)) ? $album_id:'').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-album/'.((isset($key->album_id) && !empty($key->album_id)) ? $key->album_id:'').'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';

                }
                else
                {                                                     
                    $row[]='<span class="tbl_action" data-col="album_id"><center><a rel="'.((isset($key->album_id) && !empty($key->album_id)) ? $key->album_id:'').'" rev="restore-album" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'add-album/'.((isset($album_id) && !empty($album_id)) ? $album_id:'').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-album/'.((isset($key->album_id) && !empty($key->album_id)) ? $key->album_id:'').'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }

				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}