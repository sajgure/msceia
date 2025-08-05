<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_api extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Bismilla Sanade				Date: 04 March 20
	-------------------------------------------------------------
	*/

	public function __construct()
  	{
	    parent::__construct(); 
        $this->load->model('standard/standard_model');
        $this->load->model('order_model');
        $this->load->model('common_model');
        


    }
    /*
    -------------------------------------------------------------
    Author  : Bismilla Sanade               Date:28 April 20
    Purpose:add order manully               
    -------------------------------------------------------------
    */


    public function _manualOrder($details=null)
    {
         
        $institute_id=$details['institute_id'];
        $results = $this->standard_model->selectAllWhr('view_institute','institute_id',$institute_id);
      
        foreach ($results as $result) {
            $order_data=array(
               'institute_id'=>$result->institute_id,
               'customer_name'=>$result->institute_name,
               'customer_phone'=>$result->institute_contact,
               'customer_email'=>$result->institute_mail,
               'customer_payment_mode'=>$details['customer_payment_mode'],
               'order_status'=>'Pending',
               'payment_status'=>'Pending',
               'order_comment'=>'Null',
               'send_by'=>'Null',
               'courier_partner'=>'Null',
               'tracking_id'=>0,
               'address'=>$result->institute_address.','.$result->institute_taluka.','.$result->institute_pincode,
               'transaction_id'=>$details['transaction_id'],
               'inserted_on'=>date('Y-m-d H:i:s'),
               'inserted_by'=>1,
               'shipping_total'=>0,
               'modified_by'=>1,
              
            );
           
        }
     
        $product_id=$details['product_id'];
       
       
        $index=0;
        $total_item=$order_price=$sub_total=0;
        foreach($product_id as $id)
        {
           $resultsdata = $this->standard_model->selectAllWhr('tbl_objective_book_product','product_id',$id);
        

          foreach ($resultsdata as $cartdata) {
              
             $total_item = $total_item + $details['product_qty'][$index];
            

              $order_details_data[]=array(
                  'product_id'=>$cartdata->product_id,
                  'product_name'=>$cartdata->product_name,
                  'product_qty'=>$details['product_qty'][$index],
                  'product_price'=>$details['product_price'][$index],
                  'product_desc'=>$cartdata->product_description,
                  'product_image'=>$cartdata->product_image,
                  'shipping_charges'=>'null',
                  'shipping_type'=>'null'

              );
          }
          $index++;
          
         $order_data['total_item']=$total_item;
         $order_data['order_price']=$details['order_price'];
         $order_data['sub_total']=$details['order_price'];
       
   

        }
        

       
        $order_result=$this->load->order_model->set_order($order_data,$order_details_data);
       
      
       if($order_result)
       {
             return array(
                    'msg'=>'Order is Saved!',
                    'state'=>TRUE,
                    'details'=>$order_data
            );
       }
       else
       {
             return array(
                    'msg'=>'Unable to save order!',
                    'state'=>FALSE,
                    'details'=>FALSE
            );

       }



    }


    /*
        function for add product details to cart
    */
    public function _addcart($details=null)
    {
       # print_r($details);
        $product_id = $details['product_id'];
        $product_qty = $details['product_qty'];
         
        $cart_data= $this->standard_model->selectAllWhr('tbl_objective_book_product','product_id',$details['product_id']);
      
        if($cart_data)
        {
            foreach ($cart_data as $cart) {
            
            }
           
            $data=array('id'=>$product_id, 'qty'=>$product_qty, 'price'=>$cart->product_price, 'name'=>$cart->product_name, 'product_desc'=>$cart->product_description,'product_photo'=>$cart->product_image, 'category'=>$cart->category_id);
          
           
           $result=$this->cart->insert($data);
            if($result)
            {
                return array(
                        'msg'=>'Product add to Cart!',
                        'state'=>TRUE,
                        'details'=>$this->cart->contents()
                );
                
            }
            else
            {
                return array(
                        'msg'=>'<strong>Oops! </strong> something went wrong!',
                        'state'=>FALSE,
                        'details'=>FALSE
                );
                
            }
        }
        else
        {
            return array(
                        'msg'=>'<strong>Oops! </strong> This product is not avilable.!',
                        'state'=>FALSE,
                        'details'=>FALSE
                );
        }
        
    }
    /*
        function for add product details to cart
    */
    public function _removecart($details=null)
    {
        $row_id=$details['row_id'];
      #  echo $product_id;
        $data=array('rowid'=> $row_id, 'qty'=>0);
       # print_r($data);
        $result=$this->cart->update($data);
       # echo $result;
        if($result)
        { 

            return array(
                    'msg'=>'<strong></strong> 1 Product Remove Successfully From Your Cart</div>',
                    'state'=>TRUE,
                    'details'=>$data
            );
        }
        else
        {

            return array(
                    'msg'=>'<strong>Error!</strong> While Removing cart Product !</div>',
                    'state'=>FALSE,
                    'details'=>FALSE
            );
        }   

    }
    /*
        function for get cart product details
    */
    public function _getcart()
    {
        $cart_data=$this->cart->contents();
        if($cart_data)
        {
            return array(
                    'msg'=>'Cart data fetch succesfully.!',
                    'state'=>TRUE,
                    'details'=>$this->cart->contents()
            );

        }
        else
        {
            return array(
                    'msg'=>'Unable to fetch cart data.!',
                    'state'=>FALSE,
                    'details'=>FALSE
            );
        }
    }
    /*
        function for set order data.
    */
	public function _setorder($details=null) 
    {

        
        $institute_id=1;
        $results = $this->standard_model->selectAllWhr('view_institute','institute_id',$institute_id);
      
        foreach ($results as $result) {
            $order_data=array(
               'institute_id'=>$result->institute_id,
               'customer_name'=>$result->institute_name,
               'customer_phone'=>$result->institute_contact,
               'customer_email'=>$result->institute_mail,
               'customer_payment_mode'=>'online',
               'order_status'=>'Pending',
               'payment_status'=>'Pending',
               'order_comment'=>'Null',
               'send_by'=>'Null',
               'courier_partner'=>'Null',
               'tracking_id'=>0,
               'address'=>$result->institute_address.','.$result->institute_taluka.','.$result->institute_pincode,
               'transaction_id'=>0,
               'inserted_on'=>date('Y-m-d H:i:s'),
               'inserted_by'=>1,
               'shipping_total'=>0
              
            );
            # code...
        }
      
        $cartsdata=$this->cart->contents();
       
        $total_item=$order_price=$sub_total=0;
        foreach ($cartsdata as $cartdata) {
           
            $total_item=$total_item+$cartdata['qty'];
            $order_price=$order_price+$cartdata['price'];
            $sub_total=$sub_total+$cartdata['subtotal'];
           

            $order_details_data[]=array(
                'product_id'=>$cartdata['id'],
                'product_name'=>$cartdata['name'],
                'product_qty'=>$cartdata['qty'],
                'product_price'=>$cartdata['price'],
                'product_desc'=>$cartdata['product_desc'],
                'product_image'=>$cartdata['product_photo'],
                'shipping_charges'=>'null',
                'shipping_type'=>'null'

            );
        }
       
       $order_data['total_item']=$total_item;
       $order_data['order_price']=$order_price;
       $order_data['sub_total']=$sub_total;
       

       $order_result=$this->load->order_model->set_order($order_data,$order_details_data);
       if($order_result)
       {
             return array(
                    'msg'=>'Order is Saved!',
                    'state'=>TRUE,
                    'details'=>$order_data
            );
       }
       else
       {
             return array(
                    'msg'=>'Unable to save order!',
                    'state'=>FALSE,
                    'details'=>FALSE
            );

       }



        

    }	
     /*
        function for hide order data.
    */
    public function _hideorder($details=null)
    {
   
        if(isset($details['order_id']))
        {

            $order_id=$details['order_id'];
            $order_data=array(
                'in_use'=>'N'
            );
            $result=$this->standard_model->updateRecord('tbl_order','order_id',$order_id,$order_data);
            #echo $this->db->last_query();
            if($result)
            {
                return array(
                   'msg'=>'Hide Record!',
                   'state'=>true,
                   'details'=>$order_data
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide order';
                return array(
                    'state'=>false,
                    'msg'=>$message,
                    'details'=>false
                );
            }
        }
        else
        {
            return array(
               'state'=>false,
               'msg'=>'order id Required!',
               'details'=>false
            );
        }
       
    }
    /*
        function for restore order data.
    */
    public function _restoreorder($details=null)
    {
        
        if(isset($details['order_id']))
        {


            $order_id=$details['order_id'];

            $order_data=array(
                'in_use'=>'Y'
            );
            $result=$this->standard_model->updateRecord('tbl_order','order_id',$order_id,$order_data);
            if($result)
            {
                return array(
                      'msg'=>'Restore Record!',
                      'state'=>true,
                      'details'=>$order_data
                );
            }
            else
            {
                    $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to restore order';
                    return array(
                        'state'=>false,
                        'msg'=>$message,
                        'details'=>false
                    );
            }
        }
        else
        {
            return array(
               'state'=>false,
               'msg'=>'order id Required!',
               'details'=>false
            );
        }


    }
     /*
        function for delete order data.
    */
    public function _deleteorder($details=null)
    {
        if(isset($details['order_id']))
        {
       
            $order_id=$details['order_id'];

            $order_data=array(
                'display'=>'N',
            );
            $result=$this->standard_model->updateRecord('tbl_order','order_id',$order_id,$order_data);
            if($result)
            {
                return array(
                      'msg'=>'Order Delete!',
                      'state'=>true,
                      'details'=>$order_id
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to delete category master';
                return array(
                    'state'=>false,
                    'msg'=>$message,
                    'details'=>false
                );
            }
        }
        else
        {
            return array(
               'state'=>false,
               'msg'=>'category master id Required!',
               'details'=>false
            );
        }
  
    }

     /*
        function for fetch order data.
    */
    public function _getorder($details=false)
    {
        
        if(isset($details['all']))
        {
            $result = $this->standard_model->selectAll('tbl_order');
        }
        else if(isset($details['order_id']))
        {
            $result = $this->standard_model->selectAllWhr('tbl_order','order_id',$details['order_id']);
        }
        else
        {
            $result = $this->standard_model->selectAll('tbl_order','in_use','Y');
        }
       
        if($result)
        {
            return array(
               'msg'=>'Succesfully Fetch Record!',
               'state'=>true,
               'details'=>$result
            );
        
        }
        else
        {
             return array(
                'msg'=>'Unable Fetch Record!',
                'state'=>false,
                'details'=>false
            );
        }
   
    }
     
     /*
        function for validate order data.
    */

    public function validation_order_details($details)
    {
        $this->form_validation->set_error_delimiters('','');
        
        $this->form_validation->set_data(
            array(
              'order_id'=>isset($details['order_id']) ? $details['order_id'] :'',
              'order_name'=>isset($details['order_name']) ? $details['order_name'] :'',
              'link'=>isset($details['link']) ? $details['link'] :'',
              'icon'=>isset($details['icon']) ? $details['icon'] :'',
            
            )
        );
           
        $this->form_validation->set_rules('link','order link ',
        array('required','max_length[80]','regex_match[/^\b((http|https):\/\/?)[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|\/?))$/]'),
            array(
                'required'=>'order link is Required',
                'max_length'=>'maximum length should be 80 for link',
                'regex_match'=>'Invalid order link.'
            )
        );

        $this->form_validation->set_rules('icon','order icon ',
        array('required','max_length[30]','regex_match[/^([A-Za-z -][A-Za-z -]{1,30})$/]'),
            array(
                'required'=>'order name is Required',
                'max_length'=>'maximum length should be 30 for icon',
                'regex_match'=>'Only alphabets are allowed for icon.'
            )
        );

        $this->form_validation->set_rules('order_name','order name ',
        array('required','max_length[30]','regex_match[/^([A-Za-z ][A-Za-z ]{1,30})$/]'),
            array(
                'required'=>'order name is Required',
                'max_length'=>'maximum length should be 30 for name',
                'regex_match'=>'Only alphabets are allowed for name.'
            )
        );
        
        $this->form_validation->set_rules('order_id','order id',
        array('min_length[1]','max_length[5]','regex_match[/^([0-9][0-9]{0,4})$/]'),
            array(
                'min_length'=>'order id should have at Least 1 Number',
                'max_length'=>'order id should not have more than 5 Number',
                'regex_match'=>'Only numbers are allowed.',
            )
        );
        
        if($this->form_validation->run()==true)
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }

    /* -------------------------------------------------------------
    Author  : Mohammad Shafi        Date: 17 March 21
    Purpose : Order Accept
    ------------------------------------------------------------- */

    public function _orderApproved($details=FALSE)
    {
      $order_id = $details['order_id'];
      $data = array('order_status'=>'ACCEPTED');
      $cnt = count($order_id);
      $this->db->trans_start();
      for($i=0; $i < $cnt; $i++)
      {
        $this->common_model->updateDetails('tbl_order','order_id',$order_id[$i],$data);
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
    /* -------------------------------------------------------------
    Author  : Mohammad Shafi        Date: 17 March 21
    Purpose : Order Accept
    ------------------------------------------------------------- */

    public function _orderCancelled($details=FALSE)
    {
      $order_id = $details['order_id'];
      $data = array('order_status'=>'CANCELED');
      $result = $this->common_model->updateDetails('tbl_order','order_id',$order_id,$data);
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
