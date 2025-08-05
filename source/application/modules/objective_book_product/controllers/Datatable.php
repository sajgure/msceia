<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 18 apr 20
	-------------------------------------------------------------
	*/
	public function __construct() 
    {
        parent::__construct();  
        $this->load->library('lib_datatables');
    }
    public function objective_product_table()
    {
       $query = "SELECT tobp.*,tobc.category_name FROM tbl_objective_book_product tobp LEFT JOIN tbl_objective_book_category tobc ON tobp.category_id=tobc.category_id  WHERE tobp.display='Y'";
		$search = array('tobc.category_name','tobp.product_name','tobp.product_image','tobp.product_price');
		$clause=''; $order = "tobp.product_id Asc";
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
				$row[] = '<span style="color: #3598dc; font-weight: bold;">'.((isset($key->product_name) && !empty($key->product_name))?$key->product_name:'');
				
				$row[] = ((isset($key->category_name) && !empty($key->category_name)) ? $key->category_name:'');
				$row[] ='<center><img style="width:100px;" src="'.base_url().'uploads/objective_product_photos/'.((isset($key->product_image) && !empty($key->product_image)) ? $key->product_image:'default.png').'"></center>';
				$row[] = ((isset($key->product_price) && !empty($key->product_price)) ? $key->product_price:'');
				if($key->in_use=='Y')
                { 
                	
                    $row[]='<span class="tbl_action" data-col="product_id"><center><a rel="'.((isset($key->product_id) && !empty($key->product_id)) ? $key->product_id:'default.png').'" rev="hide-objective-book-product" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-objective-product/'.((isset($key->product_id) && !empty($key->product_id)) ? $key->product_id:'default.png').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-objective-book-product/'.((isset($key->product_id) && !empty($key->product_id)) ? $key->product_id:'default.png').'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                	

                }
                else
                {                                                     
                    $row[]='<span class="tbl_action" data-col="product_id"><center><a rel="'.((isset($key->product_id) && !empty($key->product_id)) ? $key->product_id:'default.png').'" rev="restore-objective-book-product" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'add-objective-product/'.((isset($key->product_id) && !empty($key->product_id)) ? $key->product_id:'default.png').'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'delete-objective-book-product/'.((isset($key->product_id) && !empty($key->product_id)) ? $key->product_id:'default.png').'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }

                


				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}