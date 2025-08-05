<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gcc_tbc_book_product_api extends Base_Controller {

	/*
    -------------------------------------------------------------
    Author  : Apurva Bandelwar              Date: 24-01-2022
    -------------------------------------------------------------
    */
	public function __construct()
  	{
	    parent::__construct(); 
        $this->load->model('standard/standard_model');
    }
    /*
    -------------------------------------------------------------
        function for fetch gcc tbc book product data.
    -------------------------------------------------------------
    */
    public function _getGcc_tbc_book_product($details=false)
    {
        $details = $this->decryptArray($details);
        if(isset($details['all']))
        {
            $results = $this->standard_model->selectAll('tbl_gcc_tbc_book_product');
        }
        else if(isset($details['product_id']))
        {
            $results = $this->standard_model->selectAllWhr('tbl_gcc_tbc_book_product','product_id',$details['product_id']);
        }
        else
        {
            $results = $this->standard_model->selectAll('tbl_gcc_tbc_book_product','in_use','Y');
        }
        if($results)
        {
            $data=array();
            foreach ($results as $result)
            {
                $data[] = (array)$result;  
            }
            if(isset($data) && is_array($data)){
                $result = $this->encryptArray($data);
            }
            return array(
                'msg'=>'Record Fetch Succesfully!',
                'state'=>true,
                'details'=>$result
            );
            $result= $this->encryptArray($result);
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
    -------------------------------------------------------------
        function for validate gcc tbc book product data.
    -------------------------------------------------------------
    */
    public function validation_Gcc_tbc_book_product_details($details)
    {
        $this->form_validation->set_error_delimiters('','');
        $this->form_validation->set_data(
            array(
                'category_id'=>isset($details['category_id'])?$details['category_id'] :'',
                'product_id'=>isset($details['product_id'])?$details['product_id'] :'',
                'product_name'=>isset($details['product_name'])?$details['product_name'] :'',
                'short_description'=>isset($details['short_description'])?$details['short_description'] :'',
                'delivery_information'=>isset($details['delivery_information'])?$details['delivery_information'] :'',
                'product_price'=>isset($details['product_price'])?$details['product_price'] :'',
                'product_discount'=>isset($details['product_discount'])?$details['product_discount'] :'',
                'selling_prices'=>isset($details['selling_prices'])?$details['selling_prices'] :'',
                'product_image'=>isset($details['product_image'])?$details['product_image'] :'',
                'product_description'=>isset($details['product_description'])?$details['product_description'] :''
            )
        );
        $this->form_validation->set_rules('product_name','product name ',
        array('required','max_length[100]',/*'regex_match[/^([A-Za-z ][A-Za-z ][0-9]{1,100})$/]'*/),
            array(
                'required'=>'Product Name is Required',
                'max_length'=>'Maximum length should be 100 for name',
                'regex_match'=>'Only alphabets are allowed for name.'
            )
        );
        $this->form_validation->set_rules('short_description','short description',
        array('required','max_length[500]'),
            array(
                'required'=>'Short Description is Required',
                'max_length'=>'Maximum length should be 500 for short description'
            )
        );
        $this->form_validation->set_rules('delivery_information','delivery information',
        array('required'),
            array(
                'required'=>'Delivery Information is Required'
            )
        );
        $this->form_validation->set_rules('product_description','product description',
        array('required',/*'max_length[1500]'*/),
            array(
                'required'=>'Product Description is Required',
                'max_length'=>'Maximum length should be 1500 for product description'
            )
        );
        $this->form_validation->set_rules('product_id','product id',
        array('min_length[1]','max_length[5]','regex_match[/^([0-9][0-9]{0,4})$/]'),
            array(
                'min_length'=>'Product id should have at Least 1 Number',
                'max_length'=>'Product id should not have more than 5 Number',
                'regex_match'=>'Only numbers are allowed in Product id.',
            )
        );
        $this->form_validation->set_rules('category_id','category id',
        array('min_length[1]','max_length[5]','regex_match[/^([0-9][0-9]{0,4})$/]'),
            array(
                'min_length'=>'Category id should have at Least 1 Number',
                'max_length'=>'Category id should not have more than 5 Number',
                'regex_match'=>'Only numbers are allowed in category id.',
            )
        );
        $this->form_validation->set_rules('product_price', 'product_price',
        array('min_length[1]','max_length[5]','regex_match[/^([+-]?([0-9]*[.])?[0-9]+)$/]'),
            array( 
                'min_length'=>'Min 1 Number Required.',
                'max_length'=>'Max 5 Number allowed.',
                'regex_match'=>'Product price Should Have Only Numbers '
            )
        );
        $this->form_validation->set_rules('product_discount', 'product_discount',
        array('min_length[1]','max_length[5]','regex_match[/^([+-]?([0-9]*[.])?[0-9]+)$/]'),
            array(   
                'min_length'=>'Min 1 Number Required.',
                'max_length'=>'Max 5 Number allowed.',
                'regex_match'=>'Product discount Should Have Only Numbers'
            )
        );
        $this->form_validation->set_rules('selling_prices', 'selling_prices',
        array('min_length[1]','max_length[5]','regex_match[/^([+-]?([0-9]*[.])?[0-9]+)$/]'),
            array(   
                'min_length'=>'Min 1 Number Required.',
                'max_length'=>'Max 5 Number allowed.',
                'regex_match'=>'Product selling price Should Have Only Numbers'
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
    /*
    -------------------------------------------------------------
        function for set gcc tbc book product data.
    -------------------------------------------------------------
    */
	public function _setGcc_tbc_book_product($details=null)
    {
        $details = $this->decryptArray($details);
        $user_id= $this->session->userdata('user_id'); 
        if(isset($details['product_id']) && !empty($details['product_id']))
        {
            $flag=1;
        }
        else
        {
            $flag=0;
        }
        $validation_error='';
        if($this->validation_Gcc_tbc_book_product_details($details))
        { 
            if($details)
            {
                $book_product_data=array(
                    'product_name'=>$details['product_name'],
                    'category_id'=>$details['category_id'],
                    'product_price'=>$details['product_price'],
                    'product_discount'=>$details['product_discount'],
                    'selling_prices'=>$details['selling_prices'],
                    'product_image'=>$details['product_image'],
                    'product_description'=>$details['product_description'],
                    'short_description'=>$details['short_description'],
                    'delivery_information'=>$details['delivery_information'],
                    'modified_by'=>$user_id,
                    'modified_on'=>date('Y-m-d H:i:s'),
                    'product_id'=>isset($details['product_id'])?$details['product_id']:NULL
                );
                $error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
                if($flag==0)
                {
                    $book_product_data['inserted_by']=$user_id;
                    $book_product_data['inserted_on']=date('Y-m-d H:i:s');
                    $book_product_data['display']='Y';
                    $book_product_data['in_use']='Y';
                    $product_id= $this->standard_model->single_insert('tbl_gcc_tbc_book_product',$book_product_data);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Add Product!',
                            'details'=>$error_msg
                        );
                    }
                    else
                    {
                        $book_product_data['product_id']=$product_id;
                        $book_product_data= $this->encryptArray($book_product_data);
                        return array(
                            'state'=>true,
                            'msg'=>'Product Added Successfully!',
                            'details'=>$book_product_data
                        );
                    }
                }
                else
                {                                                   
                    $product_id= $this->standard_model->single_insert('tbl_gcc_tbc_book_product',$book_product_data);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Update Product!',
                            'details'=>$error_msg
                        );
                    }
                    else
                    {
                        $book_product_data['product_id']=$product_id;
                        $book_product_data= $this->encryptArray($book_product_data);
                        return array(
                            'state'=>true,
                            'msg'=>'Product Updated Successfully!',
                            'details'=>$book_product_data
                        );
                    }
                }   
            }
            else
            {
                return array(
                    'msg'=>'product Failed to Saved!',
                    'state'=>False, 
                    'details'=>false
                );
            }
        }
        else
        {
            $validation_error = validation_errors();
            return array(
                'msg'=>$validation_error,
                'state'=>False,
                'details'=>'Validation is failed'
            );
        }
    }
    /*
    -------------------------------------------------------------
        function for hide gcc tbc book product data.
    -------------------------------------------------------------
    */
    public function _hideGcc_tbc_book_product($details=null)
    {
        $details = $this->decryptArray($details);
        if(isset($details['product_id']))
        {
            $product_id=$details['product_id'];
            $book_product_data = array( 'in_use'=>'N' );
            $result=$this->standard_model->updateRecord('tbl_gcc_tbc_book_product','product_id',$product_id,$book_product_data);
            if($result)
            {
                $resdata = $this->standard_model->selectAllWhr('tbl_gcc_tbc_book_product','product_id',$details['product_id']);
                foreach ($resdata as $res) {
                    # code...
                }
                $book_product_data= $this->encryptArray($res);
                return array(
                   'msg'=>'Hide Record Successfully!',
                   'state'=>true,
                   'details'=>$book_product_data
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide GCC TBC Book Product';
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
               'msg'=>'Product id Required!',
               'details'=>false
            );
        }
    }
    /*
    -------------------------------------------------------------
        function for restore gcc tbc book product data.
    -------------------------------------------------------------
    */
    public function _restoreGcc_tbc_book_product($details=null)
    {
        $details = $this->decryptArray($details);
        if(isset($details['product_id']))
        {
            $product_id=$details['product_id'];
            $book_product_data = array( 'in_use'=>'Y' );
            $result=$this->standard_model->updateRecord('tbl_gcc_tbc_book_product','product_id',$product_id,$book_product_data);
            if($result)
            {
                $resdata = $this->standard_model->selectAllWhr('tbl_gcc_tbc_book_product','product_id',$details['product_id']);
                foreach ($resdata as $res) {
                    # code...
                }
                $book_product_data= $this->encryptArray($res);
                return array(
                    'msg'=>'Restore Record Successfully!',
                    'state'=>true,
                    'details'=>$book_product_data
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Restore GCC TBC Book Product';
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
               'msg'=>'Product id Required!',
               'details'=>false
            );
        }
    }
    /*
    -------------------------------------------------------------
        function for delete gcc tbc book product data.
    -------------------------------------------------------------
    */
    public function _deleteGcc_tbc_book_product($details=null)
    {
        if(isset($details['product_id']))
        {
            $details = $this->decryptArray($details);
            $product_id=$details['product_id'];
            $book_product_data=array( 'display'=>'N' );
            $result=$this->standard_model->updateRecord('tbl_gcc_tbc_book_product','product_id',$product_id,$book_product_data);
            if($result)
            {
                $details= $this->encryptArray($details);
                return array(
                    'msg'=>'Product Delete!',
                    'state'=>true,
                    'details'=>$details
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Delete GCC TBC Book Product';
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
               'msg'=>'Product id Required!',
               'details'=>false
            );
        }
    }
}
