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
    public function slider_master_table()
    {
       $query = "SELECT * FROM tbl_slider_master tsm  WHERE tsm.display='Y'";
		$search = array('tsm.slider_name','tsm.visibility','tsm.slider_descripation','tsm.image','tsm.slider_master_id');
		$clause=''; $order = "tsm.slider_master_id DESC";
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
				$row[] = '<span class="font-green-haze bold">'.((isset($key->slider_name) && !empty($key->slider_name))?$key->slider_name:'');
				if($key->visibility=='Y')
				{
					 $visibility='<center><span class="label bg-yellow-gold">Enable</span></center>';
				}
				else
				{
					$visibility='<center><span class="label bg-red-thunderbird">Disable</span></center>';
				}
				$row[] =((isset($visibility) && !empty($visibility)) ? $visibility:'');
				$row[] = ((isset($key->slider_descripation) && !empty($key->slider_descripation)) ? $key->slider_descripation:'');
				$row[] ='<center><img style="width:150px; height:100px;" src="'.base_url().'uploads/slider_photos/'.((isset($key->image) && !empty($key->image)) ? $key->image:'default.png').'"></center>';
                	
                $slider_master_id = $this->encryptdecryptstring->encrypt_string($key->slider_master_id);

				if($key->in_use=='Y')
                { 
                	
                    $row[]='<span class="tbl_action" data-col="slider_master_id"><center><a rel="'.((isset($key->slider_master_id) && !empty($key->slider_master_id)) ? $key->slider_master_id:'').'" rev="hide-slider-master" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-slider/'.((isset($slider_master_id) && !empty($slider_master_id)) ? $slider_master_id:'').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'permanent-delete-slider-master/'.((isset($key->slider_master_id) && !empty($key->slider_master_id)) ? $key->slider_master_id:'').'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                	

                }
                else
                {                                                     
                    $row[]='<span class="tbl_action" data-col="slider_master_id"><center><a rel="'.((isset($key->slider_master_id) && !empty($key->slider_master_id)) ? $key->slider_master_id:'').'" rev="restore-slider-master" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'add-slider/'.((isset($slider_master_id) && !empty($slider_master_id)) ? $slider_master_id:'').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'permanent-delete-slider-master/'.((isset($key->slider_master_id) && !empty($key->slider_master_id)) ? $key->slider_master_id:'').'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }

                


				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}