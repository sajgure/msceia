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
    public function district_master_table()
    {
       $query = "SELECT * FROM tbl_district td  WHERE td.display='Y'";
		$search = array('td.district_name','td.code','td.district_description','td.district_id');
		$clause=''; $order = "td.district_id Asc";
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
				$row[] = '<span class="font-green-haze bold" >'.((isset($key->district_name) && !empty($key->district_name))?$key->district_name:'');
				$row[] =((isset($key->code) && !empty($key->code)) ? $key->code:'');
				$row[] = ((isset($key->district_description) && !empty($key->district_description)) ? $key->district_description:'');
				
                $district_id = $this->encryptdecryptstring->encrypt_string($key->district_id);
				if($key->in_use=='Y')
                { 
                	
                    $row[]='<span class="tbl_action" data-col="district_id"><center><a rel="'.$key->district_id.'" rev="hide-district" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-district/'.$district_id.'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-district/'.$key->district_id.'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                	

                }
                else
                {    
                	                                                 
                    $row[]='<span class="tbl_action" data-col="district_id"><center><a rel="'.$key->district_id.'" rev="restore-district" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'add-district/'.$district_id.'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-district/'.$key->district_id.'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }

                


				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}