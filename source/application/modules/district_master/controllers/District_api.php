<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class District_api extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Bismilla Sanade				Date: 27 Feb 20
	-------------------------------------------------------------
	*/

	public function __construct()
  	{
	    parent::__construct(); 
        $this->load->model('standard/standard_model');
        //$this->load->model('/district_model');

    }

    /*
        function for set district data.
    */
	public function _setdistrict($details=null) 
    {
        $user_id= $this->session->userdata('user_id');

        $details = $this->decryptArray($details);
        $validation_error='';
        if(isset($details['district_id']) && !empty($details['district_id']))
        {
            $flag=1;
        }
        
        else
        {
            $flag=0;
        }
        
        if($this->validation_district_details($details,$flag))
        { 
        
            if($details)
            {
                $district_data=array(
                    'district_name'=>$details['district_name'],
                    'district_description'=>$details['district_description'],
                    'code'=>$details['code'],
                    'modified_by'=>$user_id,
                    'modified_on'=>date('Y-m-d H:i:s'),
                    'district_id'=>isset($details['district_id'])?$details['district_id']:NULL

                );
                // $district_data['inserted_by']=1;
                // $district_data['inserted_on']=date('Y-m-d H:i:s');
                // $district_id = $this->standard_model->single_insert('tbl_district',$district_data);
                // $district_data['district_id']=$district_id;
                // $district_data= $this->encryptArray($district_data);
               
                // return array(
                //       'msg'=>'District Saved!',
                //       'state'=>true,
                //       'details'=>$district_data
                // );
                $error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
                if($flag==0)
                {
                    $district_data['inserted_by']=$user_id;
                    $district_data['inserted_on']=date('Y-m-d H:i:s');
                    $district_data['display']='Y';
                    $district_data['in_use']='Y';
                    $district_id= $this->standard_model->single_insert('tbl_district',$district_data);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Add District!',
                            'details'=>$error_msg
                        );
                    }
                    else
                    {
                        $district_data['district_id']=$district_id;
                        $district_data= $this->encryptArray($district_data);
                        return array(
                            'state'=>true,
                            'msg'=>'District Added Successfully!',
                            'details'=>$district_data
                        );
                    }
                }
                else
                {                                                   
                    $district_id= $this->standard_model->single_insert('tbl_district',$district_data);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Update District!',
                            'details'=>$error_msg
                            );
                    }
                    else
                    {
                        $district_data['district_id']=$district_id;
                        $district_data= $this->encryptArray($district_data);                
                        return array(
                            'state'=>true,
                            'msg'=>'District Updated Successfully!',
                            'details'=>$district_data
                            );
                    }
                }       
            }
            else
            {
                return array(
                    'msg'=>'District Failed to Saved!',
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
                $validation_error = "Duplicate Entry For District Name.";
            }
            return array(
                  'msg'=>$validation_error,
                  'state'=>False,
                  'details'=>'Validation is failed'
            );
        }
         

    }	
    /*
        function for hide district data.
    */
    public function _hidedistrict($details=null)
    {
        $details = $this->decryptArray($details);
        if(isset($details['district_id']))
        {
            $district_id=$details['district_id'];

            $district_data=array(
                'in_use'=>'N'
            );
            $result=$this->standard_model->updateRecord('tbl_district','district_id',$district_id,$district_data);
            if($result)
            {
                $resdata = $this->standard_model->selectAllWhr('tbl_district','district_id',$details['district_id']);
               
                foreach ($resdata as $res) {
                    # code...
                }
                $resdata=$this->encryptArray($res);
               // $result= $this->encryptArray($resdata);
                return array(
                   'msg'=>'Record Hide Successfully!',
                   'state'=>true,
                   'details'=>$resdata
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to hide District!';
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
               'msg'=>'district_id Required!',
               'details'=>false
            );
        }
       
    }
    /*
        function for restore district data.
    */
    public function _restoredistrict($details=null)
    {
        $details = $this->decryptArray($details);
        if(isset($details['district_id']))
        {
            $district_id=$details['district_id'];

            $district_data=array(
                'in_use'=>'Y'
            );
            $result=$this->standard_model->updateRecord('tbl_district','district_id',$district_id,$district_data);
            if($result)
            {
                $resdata = $this->standard_model->selectAllWhr('tbl_district','district_id',$details['district_id']);
                foreach ($resdata as $res) {
                    # code...
                }
                $district_data= $this->encryptArray($res);
                return array(
                      'msg'=>'Record Restore Successfully!',
                      'state'=>true,
                      'details'=>$district_data
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to restore District!';
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
               'msg'=>'district_id Required!',
               'details'=>false
            );
        }
        

    }
    
    /*
        function for delete district data.
    */
    public function _deletedistrict($details=null)
    {
        
        if(isset($details['district_id']))
        {
            $details = $this->decryptArray($details);
            $district_id=$details['district_id'];

            $district_data=array(
                'display'=>'N',
            );
            $result=$this->standard_model->updateRecord('tbl_district','district_id',$district_id,$district_data);
            if($result)
            {
                $district_id = $this->encryptArray($details);
                return array(
                      'msg'=>'Record Delete Successfully!',
                      'state'=>true,
                      'details'=>$district_id
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to delete District!';
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
               'msg'=>'district_id Required!',
               'details'=>false
            );
        }
    

    }
    
    /*
        function for fetch district data.
    */
    public function _getdistrict($details=false)
    {
        $details = $this->decryptArray($details);
        
        if(isset($details['all']))
        {
            $results = $this->standard_model->selectAll('tbl_district');
        }
        else if(isset($details['state_id']))
        {
            $results = $this->standard_model->selectAllWhr('tbl_district','state_id',$details['state_id']);
        }
        else if(isset($details['district_id']))
        {
            $results = $this->standard_model->selectAllWhr('tbl_district','district_id',$details['district_id']);
        }
        else
        {
            $results = $this->standard_model->selectAll('tbl_district','in_use','Y');
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
        
        }
        else
        {
             return array(
                'msg'=>'Unable Fetch Record!',
                'state'=>false,
                'details'=>$details['district_id']
            );
 
        }
       
    }
    /*
        function for validate district data.
    */

    public function validation_district_details($details,$flag)
    {
        $this->form_validation->set_error_delimiters('','');
        
           
        $this->form_validation->set_data(
            array(
                'district_id'=>isset($details['district_id']) ? $details['district_id'] :'',
                'district_name'=>isset($details['district_name']) ? $details['district_name'] :'',
                'code'=>isset($details['code']) ? $details['code'] :'',
                'district_description'=>isset($details['district_description']) ? $details['district_description'] :'',
                      
            )
        );
       if($flag==0)
       {            
            $this->form_validation->set_rules('district_name','district name ',
            array('required','max_length[30]','regex_match[/^([A-Za-z ][A-Za-z ]{1,30})$/]'),
                array(
                        'required'=>'district name is Required',
                        'max_length'=>'maximum length should be 30 for name',
                        'regex_match'=>'Only alphabets are allowed for name.'                        
                )
            );

            $district_name = $details['district_name'];
            $flag1 = $this->standard_model->check_is_unique('tbl_district','district_name',$district_name);
       }
       else
       {
         $this->form_validation->set_rules('district_name','district name ',
            array('required','max_length[30]','regex_match[/^([A-Za-z ][A-Za-z ]{1,30})$/]'),
                array(
                        'required'=>'district name is Required',
                        'max_length'=>'maximum length should be 30 for name',
                        'regex_match'=>'Only alphabets are allowed for name.'
                        
                )
            );
       }
        $this->form_validation->set_rules('district_description','description description',
            array('regex_match[/^[a-zA-Z0-9 _ * @]+$/]'),
                array(
                    'regex_match'=>'Only alphabets are allowed description.'
                )
        );
        $this->form_validation->set_rules('district_id','district_id',
        array('min_length[1]','max_length[5]','regex_match[/^([0-9][0-9]{0,4})$/]'),
            array(
                    'min_length'=>'district_id should have at Least 1 Number',
                    'max_length'=>'district_id should not have more than 5 Number',
                    'regex_match'=>'Only numbers are allowed in district_id.',
            )
        );       
        
        $this->form_validation->set_rules('code','code',
                array('min_length[1]','max_length[6]','regex_match[/^([0-9][0-9]{0,4})$/]'),
                array(
            'min_length'=>'code should have at Least 1 Number',
            'max_length'=>'code should not have more than 6 Number',
            'regex_match'=>'Only numbers are allowed.',
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
