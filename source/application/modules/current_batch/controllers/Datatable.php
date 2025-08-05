<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Tukaram Gavade 			20/11/2021
	-------------------------------------------------------------
	*/
	public function __construct() 
    {
        parent::__construct();  
        $this->load->library('lib_datatables');
        $this->load->library('Encryptdecryptstring'); 

    }
    public function current_batch_table()
    {
       $query = "SELECT `fees_exemption_id`, `constant`, `title`, `description`,`in_use` FROM `tbl_fees_exemption` WHERE `display` = 'Y'";
	
	   $search = array('constant','title','description');
	   $clause=''; 
	   $order = "fees_exemption_id DESC";
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
				$row[] = '<span class="font-green-haze bold">'.((isset($key->constant) && !empty($key->constant)) ? $key->constant:'');
				$row[] = ((isset($key->title) && !empty($key->title)) ? $key->title:'');
				$row[] = ((isset($key->description) && !empty($key->description))?$key->description:'');
			

                $fees_exemption_id = $this->encryptdecryptstring->encrypt_string($key->fees_exemption_id);
				
				
				if($key->in_use=='Y')
                { 
                	
                    $row[]='<span class="tbl_action" data-col="fees_exemption_id"><center><a rel="'.((isset($key->fees_exemption_id) && !empty($key->fees_exemption_id)) ? $key->fees_exemption_id:'').'" rev="hide-fees-exemption" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'new-fees-exemption/'.((isset($fees_exemption_id) && !empty($fees_exemption_id)) ? $fees_exemption_id:'').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-fees-exemption/'.((isset($key->fees_exemption_id) && !empty($key->fees_exemption_id)) ? $key->fees_exemption_id:'').'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                	

                }
                else
                {                                                     
                    $row[]='<span class="tbl_action" data-col="fees_exemption_id"><center><a rel="'.((isset($key->fees_exemption_id) && !empty($key->fees_exemption_id)) ? $key->fees_exemption_id:'').'" rev="restore-fees-exemption" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'new-fees-exemption/'.((isset($fees_exemption_id) && !empty($fees_exemption_id)) ? $fees_exemption_id:'').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-fees-exemption/'.((isset($key->fees_exemption_id) && !empty($key->fees_exemption_id)) ? $key->fees_exemption_id:'').'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }

                


				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}