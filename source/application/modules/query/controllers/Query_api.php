<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Query_api extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Bismilla Sanade				Date: 04 March 20
	-------------------------------------------------------------
	*/

	public function __construct()
  	{
	    parent::__construct(); 
        $this->load->model('standard/standard_model');
    }

    /*
        function for set query data.
    */
	public function _setquery($details=null) 
    {
         $details = $this->decryptArray($details);
         $user_id= $this->session->userdata('user_id'); 

        $validation_error='';
        if(isset($details['query_id']) && !empty($details['query_id']))
        {
            $flag=1;
        }
        else
        {
            $flag=0;
        }
       
        if($this->validation_query_details($details,$flag))
        { 
            if($details)
            {
                $query_data=array(
                    'query'=>$details['query'],
                    'institute_id'=>$details['institute_id'],
                    //'user_id'=>$this->session->userdata('user_id');
                    'user_id'=>1,
                    'query_status'=>$details['query_status'],
                    'message'=>$details['message'],
                    //'status'=>$details['status'],
                    'modified_by'=>$user_id,
                    'modified_on'=>date('Y-m-d H:i:s'),
                    'query_id'=>isset($details['query_id'])?$details['query_id']:NULL

                );
                // $query_data['inserted_by']=1;
                // $query_data['inserted_on']=date('Y-m-d H:i:s');
                // $id = $this->standard_model->single_insert('tbl_query',$query_data);
                // $query_data['query_id']=$id;
                // $query_data = $this->encryptArray($query_data);
                // return array(
                //     'msg'=>'query Saved!',
                //     'state'=>true,
                //     'details'=>$query_data
                // );
                $error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
                if($flag==0)
                {
                    $query_data['inserted_by']=$user_id;
                    $query_data['inserted_on']=date('Y-m-d H:i:s');
                    $query_data['display']='Y';
                    $query_data['in_use']='Y';
                    $query_id= $this->standard_model->single_insert('tbl_query',$query_data);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Add Query!',
                            'details'=>$error_msg
                        );
                    }
                    else
                    {
                        $query_data['query_id']=$query_id;
                        $query_data= $this->encryptArray($query_data);
                        return array(
                            'state'=>true,
                            'msg'=>'Query Added Successfully!',
                            'details'=>$query_data
                        );
                    }
                }
                else
                {                                                   
                    $query_id= $this->standard_model->single_insert('tbl_query',$query_data);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Update Query!',
                            'details'=>$error_msg
                            );
                    }
                    else
                    {
                        $query_data['query_id']=$query_id;
                        $query_data= $this->encryptArray($query_data);                
                        return array(
                            'state'=>true,
                            'msg'=>'Query Updated!',
                            'details'=>$query_data
                            );
                    }
                }   
            }
            else
            {
                return array(
                    'msg'=>'category Failed to Saved!',
                    'state'=>False, 
                    'details'=>false
                );
            }
        }
        else
        {
            $validation_error = validation_errors();
            if(""==$validation_error)
            {
                $validation_error = "Duplicate Entry For Query.";
            }
            return array(
                  'msg'=>$validation_error,
                  'state'=>False,
                  'details'=>'Validation is failed'
            );
        }
    }	
     /*
        function for hide query data.
    */
    public function _hidequery($details=null)
    {
         $details = $this->decryptArray($details);
        if(isset($details['query_id']))
        {

            $query_id=$details['query_id'];
            $query_data=array(
                'in_use'=>'N'
            );
            $result=$this->standard_model->updateRecord('tbl_query','query_id',$query_id,$query_data);
            #echo $this->db->last_query();
           // $results = $this->standard_model->selectAllWhr('tbl_query','query_id',$details['query_id']);
            if($result)
            {
                $resdata = $this->standard_model->selectAllWhr('tbl_query','query_id',$details['query_id']);
                foreach ($resdata as $res) {
                    # code...
                }
                $query_data = $this->encryptArray($res);
                return array(
                   'msg'=>'Hide Record!',
                   'state'=>true,
                   'details'=>$query_data
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide query';
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
               'msg'=>'query id Required!',
               'details'=>false
            );
        }
       
    }
    /*
        function for restore query data.
    */
    public function _restorequery($details=null)
    {
         $details = $this->decryptArray($details);
        if(isset($details['query_id']))
        {


            $query_id=$details['query_id'];

            $query_data=array(
                'in_use'=>'Y'
            );
            $result=$this->standard_model->updateRecord('tbl_query','query_id',$query_id,$query_data);
            if($result)
            {
                $resdata = $this->standard_model->selectAllWhr('tbl_query','query_id',$details['query_id']);
                foreach ($resdata as $res) {
                    # code...
                }
                $query_data = $this->encryptArray($res);
                return array(
                      'msg'=>'Restore Record!',
                      'state'=>true,
                      'details'=>$query_data
                );
            }
            else
            {
                    $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to restore query';
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
               'msg'=>'query id Required!',
               'details'=>false
            );
        }


    }
     /*
        function for delete query data.
    */
    public function _deletequery($details=null)
    {
        if(isset($details['query_id']))
        {
            $details = $this->decryptArray($details);
       
            $query_id=$details['query_id'];

            $query_data=array(
                'display'=>'N',
            );
            $result=$this->standard_model->updateRecord('tbl_query','query_id',$query_id,$query_data);
            if($result)
            {
                $details = $this->encryptArray($details);
                return array(
                      'msg'=>'Query Delete !',
                      'state'=>true,
                      'details'=>$details
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
        function for fetch query data.
    */
    public function _getquery($details=false)
    {
         $details = $this->decryptArray($details);
        
        if(isset($details['all']))
        {
            $results = $this->standard_model->selectAll('tbl_query');
        }
        else if(isset($details['query_id']))
        {
            $results = $this->standard_model->selectAllWhr('tbl_query','query_id',$details['query_id']);
        }
        else
        {
            $results = $this->standard_model->selectAll('tbl_query','in_use','Y');
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
                  'msg'=>'Succesfully Fetch Record!',
                  'state'=>true,
                  'details'=>$result
            );
            $result= $this->encryptArray($result);
            $result = $this->encryptArray($result);
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
        function for validate query data.
    */

    public function validation_query_details($details,$flag)
    {
        $this->form_validation->set_error_delimiters('','');
        
            
        $this->form_validation->set_data(
            array(
              'query_id'=>isset($details['query_id']) ? $details['query_id'] :'',
              'query'=>isset($details['query']) ? $details['query'] :'',
              'institute_id'=>isset($details['institute_id']) ? $details['institute_id'] :'',
              //'status'=>isset($details['status']) ? $details['status'] :'',
              'query_status'=>isset($details['query_status']) ? $details['query_status'] :'',
              'message'=>isset($details['message']) ? $details['message'] :'',


            
            )
        );
       /* $this->form_validation->set_rules('status','status',
        array('required','max_length[30]','regex_match[/^([A-Za-z ][A-Za-z ]{1,30})$/]'),
            array(
                'required'=>'status is Required',
                'max_length'=>'maximum length should be 30 for status',
                'regex_match'=>'Only alphabets are allowed for message.'
            )
        );*/
        $this->form_validation->set_rules('message','message',
        array('required','max_length[30]','regex_match[/^([A-Za-z ][A-Za-z ]{1,30})$/]'),
            array(
                'required'=>'message is Required',
                'max_length'=>'maximum length should be 30 for message',
                'regex_match'=>'Only alphabets are allowed for message.'
            )
        );
           
        $this->form_validation->set_rules('query_status','query_status',
        array('required','max_length[30]','regex_match[/^([0-9]{1,30})$/]'),
            array(
                'required'=>'query_status is Required',
                'max_length'=>'maximum length should be 30 for query_status',
                'regex_match'=>'Only numbers are allowed for query_status.'
            )
        );
        if($flag == 0)
        {
            $this->form_validation->set_rules('query','query',array('required','max_length[30]'),
            array(
                'required'=>'Query is Required.',
                // 'min_length'=>'Query should Min 3 char allowed.',
                'max_length'=>'Query should Max 30 char allowed.'                
            ));

            $query = $details['query'];
            $flag1 = $this->standard_model->check_is_unique('tbl_query','query',$query);
        }
        else{
            $this->form_validation->set_rules('query','query',array('required','max_length[30]'),
            array(
                'required'=>'Query is Required',
                // 'min_length'=>'Query should Min 3 char allowed',
                'max_length'=>'Query should Max 30 char allowed.',
            ));
        }
        
        
        $this->form_validation->set_rules('query_id','query id',
        array('min_length[1]','max_length[5]','regex_match[/^([0-9][0-9]{0,4})$/]'),
            array(
                'min_length'=>'query id should have at Least 1 Number',
                'max_length'=>'query id should not have more than 5 Number',
                'regex_match'=>'Only numbers are allowed in query id.',
            )
        );
        
        $this->form_validation->set_rules('institute_id','inst id',
        array('min_length[1]','max_length[5]','regex_match[/^([0-9][0-9]{0,4})$/]'),
            array(
                'min_length'=>'inst id should have at Least 1 Number',
                'max_length'=>'inst id should not have more than 5 Number',
                'regex_match'=>'Only numbers are allowed in institute id.',
            )
        );
        if($this->form_validation->run()==true)
        {
            if(true==$flag1)
            {
              return true;
            }   
              else
            {
              return false;
            }
        }
        else
        {
            return false;
        }
        
    }
    
}
