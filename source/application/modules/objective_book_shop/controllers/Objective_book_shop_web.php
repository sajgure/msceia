<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Objective_book_shop_web extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	:vaishali chavan				Date: 26 march 2021
	-------------------------------------------------------------
	*/
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->model('site/site_model');
        $this->load->model('objective_book_shop/shop_model');
        $this->load->library('cart');
    }
    public function terms_condition()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $this->load->view('terms-condition',$data);
    }
    public function my_orders()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $institute_id=$this->session->userdata('institute_id');  
        $data['order_data'] = $this->common_model->selectAllWhr('tbl_order','institute_id',$institute_id);
        // echo $this->db->last_query(); die;
        $this->load->view('my_orders',$data);
    }
    public function objective_shop()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['slider_data1'] = $this->common_model->fetch_visible_data('tbl_objective_book_slider','slider_id');
        $data['book_shop_data'] = $this->common_model->fetchDataASClimit('tbl_objective_book_product', 'product_id', 10);
        $data['objective_notice_data']= $this->common_model->fetch_visible_data('tbl_objective_book_notice','objective_notice_id');
        $this->load->view('objective-shop',$data);
    }
    public function objective_book_shop_checkout()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $id = $this->session->userdata('institute_id');
        $data['user_data']=$this->site_model->institute_details($id);
        $this->load->view('objective-book-shop-checkout',$data);
    }
  
    public function objective_add_to_cart()
    {  
        $type = $this->input->post('type');
        if($type == 'objective_books')
        {
            $id=$this->input->post('id');
            $qty=$this->input->post('qty');
            //$delivery_type=$this->input->post('delivery_type');
            $cnt = count($id);
            $this->db->trans_start();
            for ($i=0; $i <$cnt ; $i++)
            {
                $cart_data = $this->common_model->selectDetailsWhr('tbl_objective_book_product','product_id',$id[$i]);
                //$shipping_data=$this->common_model->selectDetailsWhr('tbl_delivery','delivery_id',$delivery_type);
                $data = array(
                    'id' => $id[$i], 
                    'name'=> $cart_data->product_name,
                    'qty'=> $qty[$i], 
                    'price'=> $cart_data->selling_prices, 
                    'desc'=> $cart_data->short_description, 
                    'product_image'=> $cart_data->product_image, 
                    'cat_id'=>$cart_data->category_id,
                    'options' => array('type' => $type)
                );
                $cart = $this->cart->contents(); 
                $flag=0;
                if(isset($cart) && !empty($cart)) { 
                    foreach($cart as $items) 
                    { 
                        if($items['cat_id']!=$cart_data->category_id)
                        {
                            $flag=1;
                        }
                    }
                    if($flag)
                    {
                        $this->cart->destroy();
                        $this->cart->insert($data);
                        $msg='Add only GCC-TBC or Objective Books in Cart!';
                    }
                    else
                    {
                        $this->cart->insert($data);
                        $msg='Product Successfully Added To Cart!';
                    }
                } 
                else 
                {
                    $this->cart->insert($data);
                    $msg='Product Successfully Added To Cart!';
                } 
            }
            $result=$this->db->trans_complete();
            if($result)
            {
                $this->json->jsonReturn(array(
                    'state'=>true,
                    'msg'=>$msg
                ));
            }
            else
            {
                $this->json->jsonReturn(array(
                    'state'=>false,
                    'msg'=>'While Product Adding Intto Cart!'
                ));
            }
        }
        elseif($type == 'gcc_tbc_books')
        {
            $id=$this->input->post('id');
            $qty=$this->input->post('qty');
            $cnt = count($id);
            $this->db->trans_start();
            for ($i=0; $i <$cnt ; $i++)
            {
                $cart_data = $this->common_model->selectDetailsWhr('tbl_gcc_tbc_book_product','product_id',$id[$i]);
                $data = array(
                    'id' => $id[$i], 
                    'name'=> $cart_data->product_name,
                    'qty'=> $qty[$i], 
                    'price'=> $cart_data->selling_prices, 
                    'desc'=> $cart_data->short_description, 
                    'product_image'=> $cart_data->product_image, 
                    'cat_id'=>$cart_data->category_id,
                    'options' => array('type' => $type)
                );
                $cart = $this->cart->contents(); 
                $flag=0;
                if(isset($cart) && !empty($cart)) { 
                    foreach($cart as $items) 
                    { 
                        if($items['cat_id']!=$cart_data->category_id)
                        {
                            $flag=1;
                        }
                    }
                    if($flag)
                    {
                        $this->cart->destroy();
                        $this->cart->insert($data);
                        $msg='Add only GCC-TBC or Objective Books in Cart!';
                    }
                    else
                    {
                        $this->cart->insert($data);
                        $msg='GCC-TBC Product Successfully Added To Cart!';
                    }
                } 
                else 
                {
                    $this->cart->insert($data);
                    $msg='GCC-TBC Product Successfully Added To Cart!';
                } 
            }
            $result=$this->db->trans_complete();
            if($result)
            {
                $this->json->jsonReturn(array(
                    'state'=>true,
                    'msg'=>$msg
                ));
            }
            else
            {
                $this->json->jsonReturn(array(
                    'state'=>false,
                    'msg'=>'While Product Adding Intto Cart!'
                ));
            }
        }
    }

    public function objective_remove_cart() 
    { 
        $id = $this->input->post('id');
        $data = array('rowid' => $id,'qty'=> 0);
        $result=$this->cart->update($data);

        if($result)
        {           
            $this->json->jsonReturn(array(
                'state'=>true,
                'msg'=>'Product Remove Successfully From Your Cart',
                'redirect'=>base_url().'objective-shop'
            )); 
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>false,
                'msg'=>'While Removing cart Product !'         
            ));
        }    
    }
    public function objective_book_shop_view_cart()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $this->load->view('objective-book-shop-view-cart',$data);
    }

    public function update_cart($row_id)
    {        
        $qty = $this->input->post('qty');
        $data = array('rowid' => $row_id,'qty'=>$qty);
        $data=$this->cart->update($data); 
    }

    public function view_single_order($id)
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['order_data']=$this->common_model->selectDetailsWhr('view_obj_order','order_id',$id);
        $data['order_detail']=$this->common_model->selectAllWhr('tbl_order_details','order_id',$id);
        // echo $this->db->last_query();die;
        $this->load->view('view-single-order',$data);
    }

    public function objective_book_print_invoice($id)
    {
        $data['order_data']=$this->common_model->selectDetailsWhr('view_obj_order','order_id',$id);
        $data['order_detail']=$this->common_model-> selectAllWhr('tbl_order_details','order_id',$id);
        $pdfname='Invoice';
        $view=$this->load->view('print_obj_invoice',$data,TRUE);
        $this->report_creation->create_pdf_a5($view,$pdfname);
    }

    public function objective_book_online_order()
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
            foreach ($cart as $key) {


                $order_data[] = array('order_id'=>'',
                            'product_id'=>$key['id'],
                            'product_name'=>$key['name'],
                            'product_qty'=>$key['qty'],
                            'product_price'=>$key['price'],
                            'product_desc'=>$key['desc'],
                            'product_image'=>$key['product_image'],
                            'inserted_on'=>date('Y-m-d H:i:s'),
                            'inserted_by'=>$id);                
            }
        }

        
        $result = $this->shop_model->saveobjectiveOrdertempData($data,$order_data);
        // $this->session->set_userdata('order_data',$order_data);
        // $this->session->set_userdata('personal_data',$data);
        $this->load->library('Payumoney_lib');
        $this->payumoney_lib->onlinePaymentobjectiveShop($cust_full_name,$data,$result);            
    }

    public function objective_shop_order_success()
    {
        // $order_data = $this->session->userdata('order_data');
        // $personal_data = $this->session->userdata('personal_data');
        // print_r($_POST); die;
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
        $order_temp_data = $this->common_model->selectDetailsWhr("tbl_order_temp", "order_id", $udf2);
        $order_temp_details_data = $this->common_model->selectAllWhr("tbl_order_temp_details", "order_id", $udf2);               
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
            foreach ($order_temp_details_data as $row) {
                $order_data[] = array('order_id'=>'', 'product_id'=>$row->product_id, 'product_name'=>$row->product_name, 'product_qty'=>$row->product_qty, 'product_price'=>$row->product_price, 'product_desc'=>$row->product_desc, 'product_image'=>$row->product_image, 'inserted_on'=>date('Y-m-d H:i:s'), 'inserted_by'=>$row->inserted_by);
            }
        }
        // print_r($order_data); die;
        $username = $institute_data->institute_code;
        $password = $institute_data->institute_password;
        $roleId = $institute_data->role_id;
        $this->authentication->login($username,$password,$roleId);
        
        $salt="49dPT9dUss";
        
        $retHashSeq = $salt.'|'.$status.'|||||||||'.$udf2.'|'.$udf1.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

        $hash = hash("sha512", $retHashSeq);
        
        if ($hash != $posted_hash) 
        {
            $this->load->view('order_failure_without_hash');
            // echo "Invalid Transaction. Please try again";
         }
         else
         {
            $this->shop_model->deleteobjectiveOrdertempData($order_temp_data->order_id);
            $result =  $this->shop_model->saveobjectiveOrderData($data,$order_data);
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
            
            redirect(base_url()."objective_shop_confirmation/".$id); 
         } 
    }

    public function objective_shop_order_failure()
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
        //$salt="kQutChXjLZ";
        //$salt="dG1v6G373V";
        $salt="49dPT9dUss";
        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        $hash = hash("sha512", $retHashSeq);          
        if ($hash != $posted_hash) {
            $this->load->view('order_failure_without_hash');
           // echo "Invalid Transaction. Please try again";
        }
        else {
            $data['status'] = $status;
            $data['txnid'] = $txnid;
            $this->load->view('order_failure_with_hash',$data);
            // echo "<center><h3>Your order status is ". $status .".</h3></center>";
            // echo "<center><h4>Your transaction id for this transaction is ".$txnid.".<br>You may try again by clicking <a href='".base_url()."objective_checkout'>here</a>.</h4></center>";                             
        } 
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

    public function objective_shop_confirmation($order_id)
    {       
        $id = $this->encryptdecryptstring->decrypt_string($order_id);
        $data['personal_data'] = $this->common_model->selectDetailsWhr('tbl_order','order_id',$id);
        $data['order_data'] =  $this->common_model->selectAllWhr('tbl_order_details','order_id',$id);
        $this->load->view('confirmation',$data);
    }
}