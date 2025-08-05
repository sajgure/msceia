<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Committee_master_api extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Bismilla Sanade				Date: 27 Feb 20
	-------------------------------------------------------------
	*/

	public function __construct()
  	{
	    parent::__construct(); 
        $this->load->model('standard/standard_model');
    }

    /*
        function for set committee master data.
    */
	public function _setsetcommittee_master($details=null) 
    {
        $details = $this->decryptArray($details);
        $validation_error='';
        if(isset($details['committee_id']) && !empty($details['committee_id']))
        {
            $flag=1;
        }
        else
        {
            $flag=0;
        }
        if($this->validation_commitee_details($details))
        { 
        
            if($details)
            {

                $committee_data=array(
                    'member_name'=>$details['member_name'],
                    'member_description'=>$details['member_description'],
                    'member_image'=>$details['member_image'],
                    'modified_by'=>1,
                    'modified_on'=>date('Y-m-d H:i:s'),
                    'committee_id'=>isset($details['committee_id'])?$details['committee_id']:NULL

                );
            //     $committee_data['inserted_by']=1;
            //     $committee_data['inserted_on']=date('Y-m-d H:i:s');
            //     $committee_id = $this->standard_model->single_insert('tbl_committee',$committee_data);
            //     $committee_data['committee_id']=$committee_id;
            //     $committee_data= $this->encryptArray($committee_data);
            //     return array(
            //         'msg'=>'Committee Saved!',
            //         'state'=>true,
            //         'details'=>$committee_data
            //     );
                
            // }
            // else
            // {
            //     return array(
            //         'msg'=>'Committee Failed to Saved!',
            //         'state'=>False, 
            //         'details'=>false
            //     );
            // }
                $error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
                if($flag==0)
                {
                    $committee_data['inserted_by']=1;
                    $committee_data['inserted_on']=date('Y-m-d H:i:s');
                    $committee_data['display']='Y';
                    $committee_data['in_use']='Y';
                    $committee_id= $this->standard_model->single_insert('tbl_committee',$committee_data);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Add committee_data!',
                            'details'=>$error_msg
                        );
                    }
                    else
                    {
                        $committee_data['committee_id']=$committee_id;
                        $committee_data= $this->encryptArray($committee_data);
                        return array(
                            'state'=>true,
                            'msg'=>'Committee Member Added Successfully!',
                            'details'=>$committee_data
                        );
                    }
                }
                else
                {                                                   
                    $committee_id= $this->standard_model->single_insert('tbl_committee',$committee_data);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Update committee_data!',
                            'details'=>$error_msg
                            );
                    }
                    else
                    {
                        $committee_data['committee_id']=$committee_id;
                        $committee_data= $this->encryptArray($committee_data);                
                        return array(
                            'state'=>true,
                            'msg'=>'Committee Member Updated Successfully!',
                            'details'=>$committee_data
                            );
                    }
                }             
            }
           else
            {
                 return array(
                     'msg'=>'Committee Failed to Saved!',
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
        function for hide committee master data.
    */
    public function _hidecommittee($details=null)
    {   
        $details = $this->decryptArray($details);
       // print_r($details);
        if(isset($details['committee_id']))
        {

            $committee_id=$details['committee_id'];
            $committee_data=array(
                'in_use'=>'N',
            );
            $result=$this->standard_model->updateRecord('tbl_committee','committee_id',$committee_id,$committee_data);

            if($result)
            {
                $resdata = $this->standard_model->selectAllWhr('tbl_committee','committee_id',$details['committee_id']);
                foreach ($resdata as $res) {
                    # code...
                }
                $resdata= $this->encryptArray($res);
                return array(
                   'msg'=>'Record Hide Successfully!',
                   'state'=>true,
                   'details'=>$resdata
                );
               
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide commitee master';
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
               'msg'=>'commitee master id Required!',
               'details'=>false
            );
        }
        
    }
    /*
        function for restore committee master data.
    */
    public function _restorecommittee($details=null)
    {
        $details = $this->decryptArray($details);
        if(isset($details['committee_id']))
        {


            $committee_id=$details['committee_id'];

            $committee_data=array(
                'in_use'=>'Y'
            );
            $result=$this->standard_model->updateRecord('tbl_committee','committee_id',$committee_id,$committee_data);
            if($result)
            {
                $resdata = $this->standard_model->selectAllWhr('tbl_committee','committee_id',$details['committee_id']);
                foreach ($resdata as $res) {
                    # code...
                }
                $committee_data = $this->encryptArray($res);
                return array(
                      'msg'=>'Record Restore Successfully!',
                      'state'=>true,
                      'details'=>$committee_data
                );
               
            }
            else
            {
                    $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to restore commitee master';
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
               'msg'=>'commitee master id Required!',
               'details'=>false
            );
        }
        
    }
     /*
        function for delete committee master data.
    */
    public function _deletecommittee($details=null)
    {
         
        if(isset($details['committee_id']))
        {
             $details = $this->decryptArray($details);
            $committee_id=$details['committee_id'];

            $committee_data=array(
                'display'=>'N',
            );
            $result=$this->standard_model->updateRecord('tbl_committee','committee_id',$committee_id,$committee_data);
            if($result)
            {
                $result = $this->encryptArray($details);
                return array(
                      'msg'=>'Record Delete Successfully!',
                      'state'=>true,
                      'details'=>$result

                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to delete commitee master';
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
               'msg'=>'commitee master id Required!',
               'details'=>false
            );
        }
        

    }

     /*
        function for fetch committee master data.
    */
    public function _getcommittee($details=false)
    {   
        $details = $this->decryptArray($details);
       // print_r($details);
        if(isset($details['all']))
        {
            $results = $this->standard_model->selectAll('tbl_committee');
        }
        else if(isset($details['committee_id']))
        {
            $results = $this->standard_model->selectAllWhr('tbl_committee','committee_id',$details['committee_id']);
        }
        else
        {
            $results = $this->standard_model->selectAll('tbl_committee','in_use','Y');
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
            $result= $this->encryptArray($result);
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
        function for validate committee data.
    */

    public function validation_commitee_details($details)
    {
        $this->form_validation->set_error_delimiters('','');
        $this->form_validation->set_data(
            array(
              'committee_id'=>isset($details['committee_id']) ? $details['committee_id'] :'',
              'member_name'=>isset($details['member_name']) ? $details['member_name'] :'',
              'member_description'=>isset($details['member_description']) ? $details['member_description'] :'',
            )
        );

           
        $this->form_validation->set_rules('member_name','member name ',
        array('required','max_length[30]','regex_match[/^([A-Za-z ][A-Za-z ]{1,30})$/]'),
            array(
                'required'=>'member name is Required',
                'max_length'=>'maximum length should be 30 for name',
                'regex_match'=>'Only alphabets are allowed for name.'
            )
        );
        $this->form_validation->set_rules('member_description','member description',
        array('max_length[200]'),
            array(
              
               'max_length'=>'maximum length should be 200 for name',
            )
        );
        $this->form_validation->set_rules('committee_id','committe id',
        array('min_length[1]','max_length[5]','regex_match[/^([0-9][0-9]{0,4})$/]'),
            array(
                'min_length'=>'committee id should have at Least 1 Number',
                'max_length'=>'committee id should not have more than 5 Number',
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
    
}
