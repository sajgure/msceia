<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 17 apr 20
	-------------------------------------------------------------
	*/
	public function __construct() 
    {
        parent::__construct();  
        $this->load->library('lib_datatables');
    }
    public function objective_slider_table()
    {
       $query = "SELECT * FROM tbl_objective_book_slider tobs  WHERE tobs.display='Y'";
		$search = array('tobs.slider_name','tobs.visibility','tobs.slider_description','tobs.image_upload');
		$clause=''; $order = "tobs.slider_id Asc";
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
				$row[] = '<span style="color: #3598dc; font-weight: bold;">'.((isset($key->slider_name) && !empty($key->slider_name))?$key->slider_name:'');
				if($key->visibility=='Y')
				{
					 $visibility='<center><span class="label bg-yellow-gold bold" style="padding:5px;">Enable</span></center>';
				}
				else
				{
					$visibility='<center><span class="label bg-red-thunderbird bold" style="padding:5px;">Disable</span></center>';
				}
				$row[] =((isset($visibility) && !empty($visibility)) ? $visibility:'');
				$row[] = ((isset($key->slider_description) && !empty($key->slider_description)) ? $key->slider_description:'');
				$row[] ='<center><img style="width:100px;" src="'.base_url().'uploads/objective_slider_photos/'.((isset($key->image_upload) && !empty($key->image_upload)) ? $key->image_upload:'default.png').'"></center>';

				if($key->in_use=='Y')
                { 
                	
                    $row[]='<span class="tbl_action" data-col="slider_id"><center><a rel="'.((isset($key->slider_id) && !empty($key->slider_id)) ? $key->slider_id:'default.png').'" rev="hide-objective-book-slider" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-objective-slider/'.((isset($key->slider_id) && !empty($key->slider_id)) ? $key->slider_id:'default.png').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-objective-book-slider/'.((isset($key->slider_id) && !empty($key->slider_id)) ? $key->slider_id:'default.png').'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                	

                }
                else
                {                                                     
                    $row[]='<span class="tbl_action" data-col="slider_id"><center><a rel="'.((isset($key->slider_id) && !empty($key->slider_id)) ? $key->slider_id:'default.png').'" rev="restore-objective-book-slider" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'add-objective-slider/'.((isset($key->slider_id) && !empty($key->slider_id)) ? $key->slider_id:'default.png').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-objective-book-slider/'.((isset($key->slider_id) && !empty($key->slider_id)) ? $key->slider_id:'default.png').'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }

                


				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}