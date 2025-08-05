<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_web extends Base_Controller 
{

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 18 apr 20
	-------------------------------------------------------------
	*/

	public function __construct()
  	{
	    parent::__construct(); 
        $this->load->model('order_model');
        $this->load->model('common_model');
        $this->load->library('report_creation');
        $this->load->library('pdf/pdf');
    }
    public function objective_order()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
    	$data['pending_amount_data']=$this->order_model->total_pending_amount();
    	$data['pending_order_data']=$this->order_model->Pending_orders();
    	$data['complete_order_data']=$this->order_model->complete_orders();
    	$data['received_amount_data']=$this->order_model->total_received_amount();
    	$this->load->view('objective_order',$data);
    }
    public function accept_order()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata']= $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $data['pending'] = $this->common_model->selectAllWhr('tbl_order','order_status','PENDING'); 
        $this->load->view('accept_order',$data);
    }
    public function manual_order_creation()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $id=$this->input->post('id');
        $data['manual_order_data']=$this->common_model->selectDetailsWhr('tbl_institute','institute_id',$id);
        $data['institute_data']=$this->common_model->fetchDataAsc('tbl_institute','institute_id');
        $data['product_data']=$this->common_model->fetchDataAsc('tbl_objective_book_product','product_id');
        $data['keydata']=$this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $this->load->view('manual_order_creation',$data);
    }
    public function order_details($id)
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['order_data']=$this->order_model->order_data($id);
        $data['order_detail']=$this->common_model->selectAllWhr('tbl_order_details','order_id',$id);
        $this->load->view('order_details',$data);
    }
    public function objective_print_invoice($id)
    {
        $data['order_data']=$this->order_model->order_data($id);
        $data['order_detail']=$this->common_model->selectAllWhr('tbl_order_details','order_id',$id);
        $pdfname='Invoice';
        $view=$this->load->view('print_invoice',$data,TRUE);
        //$this->report_creation->create_pdf_a5($view,$pdfname);
        $config = array (
            'margin_top'=>20,
            'margin_right'=>20,
            'margin_bottom'=>20,
            'margin_left'=>20,
            'footer_margin'=>5,
            'header_margin'=>5,
            'output'=>'O',
            'format'=>'A4',
        );
        return $this->pdf->write($view,$config); 
    }
    public function objective_print_slip($id)
    {
        $data['order_data']=$this->order_model->order_data($id);
        $data['order_detail']=$this->common_model->selectAllWhr('tbl_order_details','order_id',$id);
        $pdfname='Slip';
        $view=$this->load->view('print_slip',$data,TRUE);
        //$this->report_creation->create_pdf_a5($view,$pdfname);
        $config = array (
            'margin_top'=>20,
            'margin_right'=>20,
            'margin_bottom'=>20,
            'margin_left'=>20,
            'footer_margin'=>5,
            'header_margin'=>5,
            'output'=>'O',
            'format'=>'A4',
        );
        return $this->pdf->write($view,$config);
    }
    public function getproduct()
    {
        $id=$this->input->post('id');
        $product_details_data=$this->common_model->selectDetailsWhr('tbl_objective_book_product','product_id',$id);
        $this->json->jsonReturn(array(
            'valid'=>true,
            'price'=>$product_details_data->selling_prices,
            'name'=>$product_details_data->product_name,
            'desc'=>$product_details_data->short_description,
            'img'=>$product_details_data->product_image,
            'pp'=>$product_details_data->product_price

        ));
    }

    public function objective_edit_status()
    {      
        $id = $this->input->post('id'); 
        $data['order_data']=$this->common_model->selectDetailsWhr('view_obj_order','order_id',$id);
        $view=$this->load->view('edit_status',$data,true); 
        $this->json->jsonReturn(array(
                'valid'=>true,
                'view'=>$view
            ));
    }

    public function objective_edit_status1()
    {
        $id = $this->input->post('id');
        $inst_id = $this->input->post('inst_id');
        $order_status = $this->input->post('order_status');
        $send_by = $this->input->post('send_by');
        $courier_partner = $this->input->post('courier_partner');
        $tracking_id = $this->input->post('tracking_id');
        $order_comment = $this->input->post('order_comment');

        $data = array('order_status'=>$order_status, 'send_by'=>$send_by, 'courier_partner'=>$courier_partner, 'tracking_id'=>$tracking_id, 'order_comment'=>$order_comment);
        
        if(isset($id) && !empty($id) && ($id>0)) 
        {
            $result = $this->common_model->updateDetails('tbl_order','order_id',$id,$data);
            if($result)  
            {
                if($order_status=='SHIPPED')
                {
                    $order = 'OD'.str_pad($id, 6,'0',STR_PAD_LEFT);
                    if($send_by=='Other')
                    {
                        $send = $courier_partner;
                    }
                    else
                    {
                        $send = $send_by;
                    }
                    $inst_data = $this->common_model->selectDetailsWhr('view_inst','inst_id',$inst_id);
                    $mob_msg='Shipped. Your order ID '.$order.' has been shipped by '.$send.' and tracking ID is '.$tracking_id.'.';
                    sendSms($inst_data->inst_contact,$mob_msg);
                }
                $this->json->jsonReturn(array(
                    'state'=>true,
                    'msg'=>'Order Status Updated Successfully!'
                ));
            }
            else
            {
                $this->json->jsonReturn(array(
                    'state'=>FALSE,
                    'msg'=>'<strong>Error!</strong> While Updating Order Status!'
                ));
            }
        }
    }
}