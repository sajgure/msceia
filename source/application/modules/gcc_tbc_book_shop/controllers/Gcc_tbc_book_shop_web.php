<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Gcc_tbc_book_shop_web extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author : Apurva Bandelwar				Date: 22-01-2022
	-------------------------------------------------------------
	*/
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->model('site/site_model');
        $this->load->model('gcc_tbc_book_shop/gcc_tbc_shop_model');
    }
    public function gcc_tbc_shop()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['book_slider_data'] = $this->common_model->fetch_visible_data('tbl_gcc_tbc_book_slider','slider_id');
        $data['book_product_data'] = $this->common_model->fetchDataASClimit('tbl_gcc_tbc_book_product', 'product_id', 10);
        $this->load->view('gcc-tbc-shop',$data);
    }
    public function gcc_tbc_my_orders()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $institute_id=$this->session->userdata('institute_id');  
        $data['order_data'] = $this->common_model->selectAllWhr('tbl_gcc_tbc_order','institute_id',$institute_id);
        // echo $this->db->last_query(); die;
        $this->load->view('gcc-tbc-my-orders',$data);
    }
    public function gcc_tbc_book_shop_checkout()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $id = $this->session->userdata('institute_id');
        $data['user_data']=$this->site_model->institute_details($id);
        $this->load->view('gcc-tbc-book-shop-checkout',$data);
    }
    public function gcc_tbc_remove_cart() 
    { 
        $id = $this->input->post('id');
        $data = array(
            'rowid' => $id,
            'qty'=> 0
        );
        $result=$this->cart->update($data);
        if($result)
        {           
            $this->json->jsonReturn(array(
                'state'=>true,
                'msg'=>'Product Remove Successfully From Your Cart',
                'redirect'=>base_url().'gcc-tbc-shop'
            )); 
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>false,
                'msg'=>'Error While Removing Product from Cart!'         
            ));
        }    
    }
    public function gcc_tbc_book_shop_view_cart()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $this->load->view('gcc-tbc-book-shop-view-cart',$data);
    }
    public function gcc_tbc_update_cart($row_id)
    {        
        $qty = $this->input->post('qty');
        $data = array(
            'rowid' => $row_id,
            'qty'=>$qty
        );
        $data=$this->cart->update($data); 
    }
    public function order_details_track($id)
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['order_data']=$this->common_model->selectDetailsWhr('view_gcc_tbc_book_order','order_id',$id);
        $data['order_detail']=$this->common_model->selectAllWhr('tbl_gcc_tbc_order_details','order_id',$id);
        $this->load->view('order-details-track',$data);
    }
    public function gcc_tbc_book_print_invoice($id)
    {
        $data['order_data']=$this->common_model->selectDetailsWhr('view_gcc_tbc_book_order','order_id',$id);
        $data['order_detail']=$this->common_model-> selectAllWhr('tbl_gcc_tbc_order_details','order_id',$id);
        $pdfname='Invoice';
        $view=$this->load->view('print_gcc_tbc_book_invoice',$data,TRUE);
        $this->report_creation->create_pdf_a5($view,$pdfname);
    }
    public function generateRandomString()
    {   
        $day=date ("d");
        $month=date ("m");
        $year=date ("Y");
        $time=time();
        $dmyt=$day+$month+$year+$time;    
        $random = rand(0,10000000);  
        $dmtran= $dmyt+$random;
        $unique=  uniqid();
        $dmtun = $dmtran.$unique;
        $mdun = strtoupper(md5($dmtran.$dmtun));
        $uniqueString = substr($mdun, 5, -15); // getting 12 character length code.
        return $uniqueString;
    }
    // public function gcc_tbc_book_online_order()
    // { 
    //     $id=$this->session->userdata('institute_id');
    //     $cust_full_name=$this->input->post('user_name');
    //     $cust_phone_no=$this->input->post('user_mobile');
    //     $cust_email_address=$this->input->post('user_email');
    //     $address=$this->input->post('address');
    //     $order_price=$this->input->post('order_price');
    //     $sub_total=$this->input->post('sub_total');
    //     $shipping_total=$this->input->post('shipping_total');
    //     $transaction_id=$this->generateRandomString();
    //     $data = array(
    //         'institute_id'=>$id, 
    //         'transaction_id'=>$transaction_id, 
    //         'customer_name'=>$cust_full_name, 
    //         'customer_phone'=>$cust_phone_no, 
    //         'customer_email'=>$cust_email_address,
    //         'customer_payment_mode'=>'Online', 
    //         'sub_total'=>$sub_total, 
    //         'shipping_total'=>$shipping_total, 
    //         'order_price'=>$order_price, 
    //         'address'=>$address, 
    //         'inserted_on'=>date('Y-m-d H:i:s'), 
    //         'inserted_by'=>$id                   
    //     );
    //     $cart = $this->cart->contents();        
    //     $order_data=array();
    //     if(isset($cart) && !empty($cart))
    //     {            
    //         foreach ($cart as $key) 
    //         {
    //             $order_data[] = array(
    //                 'order_id'=>'',
    //                 'product_id'=>$key['id'],
    //                 'product_name'=>$key['name'],
    //                 'product_qty'=>$key['qty'],
    //                 'product_price'=>$key['price'],
    //                 'product_desc'=>$key['desc'],
    //                 'product_image'=>$key['product_image'],
    //                 'inserted_on'=>date('Y-m-d H:i:s'),
    //                 'inserted_by'=>$id
    //             );                
    //         }
    //     }
    //     $result = $this->gcc_tbc_shop_model->saveGcctbcOrdertempData($data,$order_data);
    //     $this->load->library('Payumoney_lib');
    //     $this->payumoney_lib->onlinePaymentGccTbcShop($cust_full_name,$data,$result);
    // }
    public function gcc_tbc_book_online_order()
    { 
        $id=$this->session->userdata('institute_id');
        $cust_full_name=$this->input->post('user_name');
        $cust_phone_no=$this->input->post('user_mobile');
        $cust_email_address=$this->input->post('user_email');
        $address=$this->input->post('address');
        $order_price=$this->input->post('order_price');
        $sub_total=$this->input->post('sub_total');
        $shipping_total=$this->input->post('shipping_total');
        $transaction_id=$this->generateRandomString();
        $data = array(
            'institute_id'=>$id, 
            'transaction_id'=>$transaction_id, 
            'customer_name'=>$cust_full_name, 
            'customer_phone'=>$cust_phone_no, 
            'customer_email'=>$cust_email_address,
            'customer_payment_mode'=>'Online', 
            'sub_total'=>$sub_total, 
            'shipping_total'=>$shipping_total, 
            'order_price'=>$order_price, 
            'address'=>$address, 
            'inserted_on'=>date('Y-m-d H:i:s'), 
            'inserted_by'=>$id                   
        );
        $cart = $this->cart->contents();        
        $order_data=array();
        if(isset($cart) && !empty($cart))
        {            
            foreach ($cart as $key) 
            {
                $order_data[] = array(
                    'order_id'=>'',
                    'product_id'=>$key['id'],
                    'product_name'=>$key['name'],
                    'product_qty'=>$key['qty'],
                    'product_price'=>$key['price'],
                    'product_desc'=>$key['desc'],
                    'product_image'=>$key['product_image'],
                    'inserted_on'=>date('Y-m-d H:i:s'),
                    'inserted_by'=>$id
                );                
            }
        }
        $result = $this->gcc_tbc_shop_model->saveGcctbcOrdertempData($data,$order_data);
        if($result)
        {    
            // $this->cart->destroy();       
            $this->json->jsonReturn(array(
                'state'=>true,
                'msg'=>'Books Ordered Successfully!'
            )); 
        }
        else
        {
            $this->json->jsonReturn(array(
                'state'=>false,
                'msg'=>'Error! While Order Books!'         
            ));
        } 
        // $this->load->library('Payumoney_lib');
        // $this->payumoney_lib->onlinePaymentGccTbcShop($cust_full_name,$data,$result);
    }
    public function gcc_tbc_shop_order_success()
    {
        $status=$_POST["status"];
        $firstname=$_POST["firstname"];
        $amount=$_POST["amount"];
        $txnid=$_POST["txnid"];
        $posted_hash=$_POST["hash"];
        $key=$_POST["key"];
        $productinfo=$_POST["productinfo"];
        $email=$_POST["email"];
        $udf1=$_POST["udf1"];
        $udf2=$_POST["udf2"];
        $institute_data = $this->common_model->selectDetailsWhr("tbl_institute", "institute_id", $udf1);
        $order_temp_data = $this->common_model->selectDetailsWhr("tbl_gcc_tbc_order_temp", "order_id", $udf2);
        $order_temp_details_data = $this->common_model->selectAllWhr("tbl_gcc_tbc_order_temp_details", "order_id", $udf2);               
        $order_data=array();
        $data = array(
            'institute_id'=>$order_temp_data->institute_id, 
            'transaction_id'=>$order_temp_data->transaction_id, 
            'customer_name'=>$order_temp_data->customer_name, 
            'customer_phone'=>$order_temp_data->customer_phone, 
            'customer_email'=>$order_temp_data->customer_email,
            'customer_payment_mode'=>$order_temp_data->customer_payment_mode, 
            'sub_total'=>$order_temp_data->sub_total, 
            'shipping_total'=>$order_temp_data->shipping_total, 
            'order_price'=>$order_temp_data->order_price, 
            'address'=>$order_temp_data->address, 
            'inserted_on'=>date('Y-m-d H:i:s'), 
            'inserted_by'=>$order_temp_data->inserted_by                   
        );
        if(isset($order_temp_details_data) && !empty($order_temp_details_data))
        {            
            foreach ($order_temp_details_data as $row) 
            {
                $order_data[] = array(
                    'order_id'=>'', 
                    'product_id'=>$row->product_id, 
                    'product_name'=>$row->product_name, 
                    'product_qty'=>$row->product_qty, 
                    'product_price'=>$row->product_price, 
                    'product_desc'=>$row->product_desc, 
                    'product_image'=>$row->product_image, 
                    'inserted_on'=>date('Y-m-d H:i:s'), 
                    'inserted_by'=>$row->inserted_by
                );
            }
        }
        $username = $institute_data->institute_code;
        $password = $institute_data->institute_password;
        $roleId = $institute_data->role_id;
        $this->authentication->login($username,$password,$roleId);

        $salt="dG1v6G373V";
        
        $retHashSeq = $salt.'|'.$status.'|||||||||'.$udf2.'|'.$udf1.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        $hash = hash("sha512", $retHashSeq);
        if($hash != $posted_hash) 
        {
            $this->load->view('gcc_tbc_order_failure_without_hash');
        }
        else
        {
            $this->gcc_tbc_shop_model->deleteGcctbcOrdertempData($order_temp_data->order_id);
            $result =  $this->gcc_tbc_shop_model->saveGcctbcOrderData($data,$order_data);
            $id = $this->encryptdecryptstring->encrypt_string($result);
            if($result)
            {
                $this->cart->destroy();
                $this->json->jsonReturn(array(  
                    'valid'=>TRUE,
                    'msg'=>'<div class="alert modify alert-success"><strong></strong> Order Book Successfully!</div>'
                ));
            }
            else
            {
                $this->json->jsonReturn(array(
                    'valid'=>FALSE,
                    'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Booking Order!</div>'
                ));
            }
            redirect(base_url()."gcc-tbc-shop-confirmation/".$id); 
        } 
    }
    public function gcc_tbc_shop_order_failure()
    {
        $status=$_POST["status"];
        $firstname=$_POST["firstname"];
        $amount=$_POST["amount"];
        $txnid=$_POST["txnid"];
        $posted_hash=$_POST["hash"];
        $key=$_POST["key"];
        $productinfo=$_POST["productinfo"];
        $email=$_POST["email"];
        $udf1=$_POST["udf1"];
        $institute_data = $this->common_model->selectDetailsWhr("tbl_institute", "institute_id", $udf1);
        $username = $institute_data->institute_code;
        $password = $institute_data->institute_password;
        $roleId = $institute_data->role_id;
        $this->authentication->login($username,$password,$roleId);

        $salt="kQutChXjLZ";
        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        $hash = hash("sha512", $retHashSeq);          
        if ($hash != $posted_hash) {
            $this->load->view('gcc_tbc_order_failure_without_hash');
        }
        else {
            $data['status'] = $status;
            $data['txnid'] = $txnid;
            $this->load->view('gcc_tbc_order_failure_with_hash',$data);
        } 
    }
    public function gcc_tbc_shop_confirmation($order_id)
    {
        $id = $this->encryptdecryptstring->decrypt_string($order_id);
        $data['personal_data'] = $this->common_model->selectDetailsWhr('tbl_gcc_tbc_order','order_id',$id);
        $data['order_data'] =  $this->common_model->selectAllWhr('tbl_gcc_tbc_order_details','order_id',$id);
        $this->load->view('gcc-tbc-confirmation',$data);
    }
    public function gcc_tbc_payment()
    {
        $this->load->view('gcc-tbc-payment');
    }
}