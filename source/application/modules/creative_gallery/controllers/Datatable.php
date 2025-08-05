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
    public function creative_gallery_table()
    {
       $query = "SELECT * FROM tbl_creative_gallery tcg  WHERE tcg.display='Y'";
		$search = array('tcg.album_name','tcg.image_name','tcg.image_upload','tcg.creative_gallery_id');
		$clause=''; $order = "tcg.creative_gallery_id DESC";
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
				$row[] = '<span class="font-green-haze bold">'.((isset($key->album_name) && !empty($key->album_name))?$key->album_name:'');
				$row[] = ((isset($key->image_name) && !empty($key->image_name)) ? $key->image_name:'');
				$row[] ='<center><img style="width:100px;" src="'.base_url().'uploads/creative_gallery_photos/'.((isset($key->image_upload) && !empty($key->image_upload)) ? $key->image_upload:'default.png').'"></center>';

                $creative_gallery_id = $this->encryptdecryptstring->encrypt_string($key->creative_gallery_id);
				

				if($key->in_use=='Y')
                { 
                	
                    $row[]='<span class="tbl_action" data-col="creative_gallery_id"><center><a rel="'.((isset($key->creative_gallery_id) && !empty($key->creative_gallery_id)) ? $key->creative_gallery_id:'default.png').'" rev="hide-creative-gallery" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-creative-gallery/'.((isset($creative_gallery_id) && !empty($creative_gallery_id)) ? $creative_gallery_id:'default.png').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-creative-gallery/'.((isset($key->creative_gallery_id) && !empty($key->creative_gallery_id)) ? $key->creative_gallery_id:'default.png').'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                	

                }
                else
                {                                                     
                    $row[]='<span class="tbl_action" data-col="creative_gallery_id"><center><a rel="'.((isset($key->creative_gallery_id) && !empty($key->creative_gallery_id)) ? $key->creative_gallery_id:'default.png').'" rev="restore-creative-gallery" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'add-creative-gallery/'.((isset($creative_gallery_id) && !empty($creative_gallery_id)) ? $creative_gallery_id:'default.png').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-creative-gallery/'.((isset($key->creative_gallery_id) && !empty($key->creative_gallery_id)) ? $key->creative_gallery_id:'default.png').'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }

                


				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}