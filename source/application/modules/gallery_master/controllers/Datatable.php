<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 10 apr 20
	-------------------------------------------------------------
	*/
	public function __construct() 
    {
        parent::__construct();  
        $this->load->library('lib_datatables');
        $this->load->library('Encryptdecryptstring'); 

    }
    public function gallery_master_table()
    {
       $query = "SELECT * FROM tbl_gallery_master tgm  WHERE tgm.display='Y'";
		$search = array('tgm.image_name','tgm.image_description','tgm.image_upload','tgm.gallery_master_id');
		$clause=''; $order = "tgm.gallery_master_id DESC";
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
				$row[] = '<span class="font-green-haze bold">'.((isset($key->image_name) && !empty($key->image_name))?$key->image_name:'');
				$row[] = ((isset($key->image_description) && !empty($key->image_description)) ? $key->image_description:'');
				$row[] ='<center><img style="width:150px;height:100px;" src="'.base_url().'uploads/gallery_photos/'.((isset($key->image_upload) && !empty($key->image_upload)) ? $key->image_upload:'default.png').'"></center>';
				if($key->visibility=='Y')
				{
					 $visibility='<center><span class="label bg-yellow-gold">Enable</span></center>';
				}
				else
				{
					$visibility='<center><span class="label bg-red-thunderbird">Disable</span></center>';
				}
				$row[] =((isset($visibility) && !empty($visibility)) ? $visibility:'');
                $gallery_master_id = $this->encryptdecryptstring->encrypt_string($key->gallery_master_id);
				
				if($key->in_use=='Y')
                { 
                	
                    $row[]='<span class="tbl_action" data-col="gallery_master_id"><center><a rel="'.((isset($key->gallery_master_id) && !empty($key->gallery_master_id)) ? $key->gallery_master_id:'').'" rev="hide-gallery-master" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-gallery/'.((isset($gallery_master_id) && !empty($gallery_master_id)) ? $gallery_master_id:'').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-gallery-master/'.((isset($key->gallery_master_id) && !empty($key->gallery_master_id)) ? $key->gallery_master_id:'').'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                	

                }
                else
                {                                                     
                    $row[]='<span class="tbl_action" data-col="gallery_master_id"><center><a rel="'.((isset($key->gallery_master_id) && !empty($key->gallery_master_id)) ? $key->gallery_master_id:'').'" rev="restore-gallery-master" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'add-gallery/'.((isset($gallery_master_id) && !empty($gallery_master_id)) ? $gallery_master_id:'').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-gallery-master/'.((isset($key->gallery_master_id) && !empty($key->gallery_master_id)) ? $key->gallery_master_id:'').'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }

                


				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}