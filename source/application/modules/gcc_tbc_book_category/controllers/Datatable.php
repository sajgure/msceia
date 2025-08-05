<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Apurva Bandelwar				Date: 24-01-2022
	-------------------------------------------------------------
	*/
	public function __construct() 
    {
        parent::__construct();  
        $this->load->library('lib_datatables');
    }
    public function gcc_tbc_book_category_table()
    {
       	$query = "SELECT * FROM tbl_gcc_tbc_book_category gtbc  WHERE gtbc.display='Y'";
		$search = array('gtbc.category_name','gtbc.category_description','gtbc.image_upload');
		$clause=''; 
		$order = "gtbc.category_id Asc";
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
				$row[] = '<span style="color: #3598dc; font-weight: bold;">'.((isset($key->category_name) && !empty($key->category_name))?$key->category_name:'');
				$row[] = ((isset($key->category_description) && !empty($key->category_description)) ? $key->category_description:'');
				$row[] ='<center><img class="img-thumbnail" style="width:120px;height:70px;" src="'.base_url().'uploads/gcc_tbc_category_photos/'.((isset($key->category_image) && !empty($key->category_image)) ? $key->category_image:'default.png').'"></center>';
				if($key->in_use=='Y')
                { 
                    $row[]='<span class="tbl_action" data-col="category_id"><center><a rel="'.((isset($key->category_id) && !empty($key->category_id)) ? $key->category_id:'default.png').'" rev="hide-gcc-tbc-book-category" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-gcc-tbc-book-category/'.((isset($key->category_id) && !empty($key->category_id)) ? $key->category_id:'default.png').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-gcc-tbc-book-category/'.((isset($key->category_id) && !empty($key->category_id)) ? $key->category_id:'default.png').'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }
                else
                {                                                     
                    $row[]='<span class="tbl_action" data-col="category_id"><center><a rel="'.((isset($key->category_id) && !empty($key->category_id)) ? $key->category_id:'default.png').'" rev="restore-gcc-tbc-book-category" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'add-gcc-tbc-book-category/'.((isset($key->category_id) && !empty($key->category_id)) ? $key->category_id:'default.png').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-gcc-tbc-book-category/'.((isset($key->category_id) && !empty($key->category_id)) ? $key->category_id:'default.png').'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }
				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}