<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gcc_tbc_book_order_api extends Base_Controller {

	/*
    -------------------------------------------------------------
    Author  : Apurva Bandelwar              Date: 27-01-2022
    -------------------------------------------------------------
    */
	public function __construct()
  	{
	    parent::__construct(); 
        $this->load->model('standard/standard_model');
        $this->load->model('gcc_order_model');
        $this->load->model('common_model');
    }
    /* 
    -------------------------------------------------------------
    Purpose : Accept GCC TBC Book Order.
    ------------------------------------------------------------- 
    */
    public function _booksOrderApproved($details=FALSE)
    {
        $order_id = $details['order_id'];
        $data = array( 'order_status'=>'ACCEPTED' );
        $cnt = count($order_id);
        $this->db->trans_start();
        for($i=0; $i < $cnt; $i++)
        {
            $this->common_model->updateDetails('tbl_gcc_tbc_order','order_id',$order_id[$i],$data);
        }
        $result =$this->db->trans_complete();
        if($result)
        {
            return array(
                'msg'=>'Order Accepted Succcessfully!',
                'state'=>true,
                'details'=>$result
            );
        }
        else
        {
            return array(
                'msg'=>'Oops Something Went Wrong!',
                'state'=>false,
                'details'=>false
            );
        }
    }
    /* 
    -------------------------------------------------------------
    Purpose : Cancel GCC TBC Book Order.
    ------------------------------------------------------------- 
    */
    public function _booksOrderCancel($details=FALSE)
    {
        $order_id = $details['order_id'];
        $data = array( 'order_status'=>'CANCELED' );
        $result = $this->common_model->updateDetails('tbl_gcc_tbc_order','order_id',$order_id,$data);
        if($result)
        {
            return array(
                'msg'=>'Order Cancelled Succcessfully!',
                'state'=>true,
                'details'=>$result
            );
        }
        else
        {
            return array(
                'msg'=>'Oops Something Went Wrong!',
                'state'=>false,
                'details'=>false
            );
        }
    }
}
