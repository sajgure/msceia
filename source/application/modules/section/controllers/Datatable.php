<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 16 apr 20
	-------------------------------------------------------------
	*/
	public function __construct() 
    {
        parent::__construct();  
        $this->load->library('lib_datatables');
    }
    public function section_table()
    {
       $query = "SELECT * FROM tbl_section td  WHERE td.display='Y'";
		$search = array('td.name','td.description');
		$clause=''; $order = "td.section_id Asc";
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
				$row[] = '<span style="color: #3598dc; font-weight: bold;">'.((isset($key->name) && !empty($key->name))?$key->name:'');
				$row[] = ((isset($key->description) && !empty($key->description)) ? $key->description:'');
				
				if($key->in_use=='Y')
                { 
                	
                    $row[]='<span class="tbl_action" data-col="section_id"><center><a rel="'.$key->section_id.'" rev="hide-section" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-section/'.$key->section_id.'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-section/'.$key->section_id.'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                	

                }
                else
                {                                                     
                    $row[]='<span class="tbl_action" data-col="section_id"><center><a rel="'.$key->section_id.'" rev="restore-section" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'add-section/'.$key->section_id.'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-section/'.$key->section_id.'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }

                


				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}