<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 02 may 20
	-------------------------------------------------------------
	*/
	public function __construct() 
    {
        parent::__construct();  
        $this->load->library('lib_datatables');
        $this->load->library('Encryptdecryptstring'); 

    }
    public function sub_menu_table()
    {
       $query = "SELECT ts.*,tm.menu_name FROM tbl_submenu ts LEFT JOIN tbl_menu tm ON ts.menu_id=tm.menu_id WHERE ts.display='Y'";
		$search = array('tm.menu_name','ts.submenu_name','ts.action','ts.icon');
		$clause=''; $order = "ts.submenu_id DESC";
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
				$row[] = '<span class="font-green-haze bold">'.((isset($key->menu_name) && !empty($key->menu_name)) ? $key->menu_name:'');
				$row[] = ((isset($key->submenu_name) && !empty($key->submenu_name)) ? $key->submenu_name:'');
				$row[] = ((isset($key->action) && !empty($key->action))?$key->action:'');
				$row[] = '<center><i style="font-size:20px;" class="'.((isset($key->icon) && !empty($key->icon)) ? $key->icon:'').'"><center>';

                $submenu_id = $this->encryptdecryptstring->encrypt_string($key->submenu_id);
				
				
				if($key->in_use=='Y')
                { 
                	
                    $row[]='<span class="tbl_action" data-col="submenu_id"><center><a rel="'.((isset($key->submenu_id) && !empty($key->submenu_id)) ? $key->submenu_id:'').'" rev="hide-submenu" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-sub-menu/'.((isset($submenu_id) && !empty($submenu_id)) ? $submenu_id:'').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-submenu/'.((isset($key->submenu_id) && !empty($key->submenu_id)) ? $key->submenu_id:'').'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                	

                }
                else
                {                                                     
                    $row[]='<span class="tbl_action" data-col="submenu_id"><center><a rel="'.((isset($key->submenu_id) && !empty($key->submenu_id)) ? $key->submenu_id:'').'" rev="restore-submenu" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'add-sub-menu/'.((isset($submenu_id) && !empty($submenu_id)) ? $submenu_id:'').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-submenu/'.((isset($key->submenu_id) && !empty($key->submenu_id)) ? $key->submenu_id:'').'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }

                


				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}