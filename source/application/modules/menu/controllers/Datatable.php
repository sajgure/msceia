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
    public function menu_table()
    {
       $query = "SELECT * FROM tbl_menu tm WHERE tm.display='Y'";
		$search = array('tm.menu_name','tm.action','tm.icon');
		$clause=''; $order = "tm.menu_id DESC";
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
				$row[] = '<center><i style="font-size:20px;" class="'.((isset($key->icon) && !empty($key->icon)) ? $key->icon:'').'"><center>';

                $menu_id = $this->encryptdecryptstring->encrypt_string($key->menu_id);
				
				
				if($key->in_use=='Y')
                { 
                	
                    $row[]='<span class="tbl_action" data-col="menu_id"><center><a rel="'.((isset($key->menu_id) && !empty($key->menu_id)) ? $key->menu_id:'').'" rev="hide-menu" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-menu/'.((isset($menu_id) && !empty($menu_id)) ? $menu_id:'').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-menu/'.((isset($key->menu_id) && !empty($key->menu_id)) ? $key->menu_id:'').'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                	

                }
                else
                {                                                     
                    $row[]='<span class="tbl_action" data-col="menu_id"><center><a rel="'.((isset($key->menu_id) && !empty($key->menu_id)) ? $key->menu_id:'').'" rev="restore-menu" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'add-menu/'.((isset($menu_id) && !empty($menu_id)) ? $menu_id:'').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-menu/'.((isset($key->menu_id) && !empty($key->menu_id)) ? $key->menu_id:'').'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }

                


				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}