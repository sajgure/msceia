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
    public function gcc_tbc_book_product_table()
    {
       	$query = "SELECT gtbp.*,gtbc.category_name FROM tbl_gcc_tbc_book_product gtbp LEFT JOIN tbl_gcc_tbc_book_category gtbc ON gtbp.category_id = gtbc.category_id  WHERE gtbp.display = 'Y'";
		$search = array('gtbc.category_name','gtbp.product_name','gtbp.product_image','gtbp.product_price');
		$clause = ''; 
		$order = "gtbp.product_id Asc";
		$result = $this->lib_datatables->datatable($query,$search,$order,$clause);
		$data = array();
		if(isset($result) && !empty($result))
		{
			$no = $_POST['start'];
			foreach ($result as $key)
			{
				$no++;
				$row = array();
				$row[] = '<center>'.$no.'</center>';
				$row[] = '<span style="color: #3598dc; font-weight: bold;">'.((isset($key->product_name) && !empty($key->product_name))?$key->product_name:'');
				$row[] = ((isset($key->category_name) && !empty($key->category_name))? $key->category_name:'');
				$row[] = '<center><img class="img-thumbnail" style="width:120px;height:70px;" src="'.base_url().'uploads/gcc_tbc_product_photos/'.((isset($key->product_image) && !empty($key->product_image))? $key->product_image:'default.png').'"></center>';
				$row[] = '<center><b>'.((isset($key->product_price) && !empty($key->product_price)) ? $key->product_price:'').'</b></center>';
				if($key->in_use == 'Y')
                { 
                    $row[] = '<span class="tbl_action" data-col="product_id"><center><a rel="'.((isset($key->product_id) && !empty($key->product_id)) ? $key->product_id:'default.png').'" rev="hide-gcc-tbc-book-product" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-gcc-tbc-book-product/'.((isset($key->product_id) && !empty($key->product_id)) ? $key->product_id:'default.png').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-gcc-tbc-book-product/'.((isset($key->product_id) && !empty($key->product_id)) ? $key->product_id:'default.png').'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }
                else
                {                                                     
                    $row[] = '<span class="tbl_action" data-col="product_id"><center><a rel="'.((isset($key->product_id) && !empty($key->product_id)) ? $key->product_id:'default.png').'" rev="restore-gcc-tbc-book-product" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'add-gcc-tbc-book-product/'.((isset($key->product_id) && !empty($key->product_id)) ? $key->product_id:'default.png').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-gcc-tbc-book-product/'.((isset($key->product_id) && !empty($key->product_id)) ? $key->product_id:'default.png').'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }
				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}