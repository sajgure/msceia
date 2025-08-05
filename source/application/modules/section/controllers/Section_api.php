<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Section_api extends Base_Controller 
{
    public function __construct()
  	{
		parent::__construct();
		$this->load->model('standard/standard_model');
	}
	/*
    =================================================================================
    Author:Shubhangi Jagadale                        Date:28/02/2020
    =================================================================================
	Purpose: Get User section
	return array(
	 	'state'=>TRUE,
		'msg'=>'Records Found!',
	 	'details'=>array(
	 		array(
	 		"name": "membership",
            "description": "How to register new Institute?",
            "answer": "1. Go to link msceia.in.\n2. On Home page click on Sign Up button.",
            "modified_by": 1,
            "section_id": 4,
            "created_by": 1,
            "created_on": "2020-02-28 18:21:30"
	 		)
	 	)
	 );
    */
	public function _get_section($details=false)
    {
		$details = $this->decryptArray($details);
		if(isset($details['section_id']))
		{
		 $results = $this->standard_model->selectAllWhr('tbl_section','section_id',$details['section_id']);
		}
		else if(isset($details['all'])){
		 $results= $this->standard_model->selectAll('tbl_section');
		}
		else {
		   $results= $this->standard_model->selectAll('tbl_section','in_use','Y');
		}
        if($results)
        {
			$data=array();
			foreach ($results as $result)
			{
				$data[] = (array)$result;  
			}
			if(isset($data) && is_array($data))
			{
				$result = $this->encryptArray($data);
			}
			return array(
			'msg'=>'Record Found!',
			'state'=>true,
			'details'=>$result
			);
			$result= $this->encryptArray($result);
        }
		else
		{
			return array(
			'msg'=>'Record not Found!',
			'state'=>false,
			'details'=>false
			);
        }
    } 
	/*
	=================================================================================
    Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	Purpose: Save user section
	return array(
			'state'=>TRUE,
			'msg'=>'New section added!',
			'details'=>$details
		);
    */
    public function _set_section($details=false)
	{
	  	$validation_error='';
        $details = $this->decryptArray($details);
        if(isset($details['section_id']) && !empty($details['section_id']))
        {
            $flag=1;
        }
        else
        {
            $flag=0;
        }
        if($this->validationsectionMasterDetails($details))
		{
            if($details)
            {
                $user_id= $this->session->userdata('user_id');
                $section = array(
					'section_id'=>isset($details['section_id'])?$details['section_id']:NULL,	
					'name'=>$details['name'],
                        'description'=>$details['description'],
						'modified_by'=>1,
						'modified_on'=>date('Y-m-d H:i:s')
                        );
                // if(!isset($details['section_id']) && empty($details['section_id']))
                // {
                //     $section['inserted_by']=1;
                //     $section['inserted_on']=date('Y-m-d H:i:s');
                // }
                // $section_id = $this->standard_model->single_insert('tbl_section',$section);
                // $section['section_id']=$section_id;
                // $section= $this->encryptArray($section);
                // return array(
                //             'state'=>true,
                //             'msg'=>'section registered!',
                //             'details'=>$section
                //             );
                $error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
                if($flag==0)
                {
                    $section['inserted_by']=1;
                    $section['inserted_on']=date('Y-m-d H:i:s');
                    $section['display']='Y';
                    $section['in_use']='Y';
                    $section_id= $this->standard_model->single_insert('tbl_section',$section);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Add Section!',
                            'details'=>$error_msg
                        );
                    }
                    else
                    {
                        $section['section_id']=$section_id;
                        $section= $this->encryptArray($section);
                        return array(
                            'state'=>true,
                            'msg'=>'Section Added Successfully!',
                            'details'=>$section
                        );
                    }
                }
                else
                {                                                   
                    $section_id= $this->standard_model->single_insert('tbl_section',$section);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Update Section!',
                            'details'=>$error_msg
                            );
                    }
                    else
                    {
                        $section['section_id']=$section_id;
                        $section= $this->encryptArray($section);                
                        return array(
                            'state'=>true,
                            'msg'=>'Section Updated!',
                            'details'=>$section
                            );
                    }
                }   
            }
            else
            {
                return array(
                'state'=>False,
                'msg'=>'section Failed to Saved!',
                'details'=>false
                );
            }
        }
		else
		{
		    $validation_error = validation_errors();
		    return array(
				'state'=>False,
				'details'=>'Validation is failed',
				'msg'=>$validation_error
		    );
		}	
    }
    /*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	Purpose: validation for section
	*/
	function validationsectionMasterDetails($details)
    {
	 	$var1="'";
	 	$var2='"';
	 	$this->form_validation->set_error_delimiters('','');
		$this->form_validation->set_data(
		array(
			'section_id'=>isset($details['section_id']) ? $details['section_id'] :'',
			'name'=>isset($details['name']) ? $details['name'] :'',
			'description'=>isset($details['description']) ? $details['description'] :''
		)
		); 
		$this->form_validation->set_rules('section_id','section_id', array('min_length[1]','max_length[11]',"regex_match[/^([0-9][0-9]{0,10})$/]"),
		array(    
			'min_length'=>'Min 2 Number Required.',
			'max_length'=>'Max 11 Number allowed.',
			'regex_match'=>'section_id Should Have Only Numbers'
		)
		);
		$this->form_validation->set_rules('name','name',array('required','min_length[2]','max_length[255]',"regex_match[/^([A-Za-z0-9][A-Za-z0-9\,\(\)\-\'\"\:\;\&\|\s]{1,254})$/]"),
		array(
			'required'=>'Required the String',
			'min_length'=>'Min 2 Character Required.',
			'max_length'=>'Max 255 Character Allowed.',
			'regex_match'=>'Name Should Have Only Alphanumeric Character and Special Character ,'.$var1.' ( )'.$var2.' - & \ : ; | & Space are Allowed'
		)
		);
	    $this->form_validation->set_rules('description','description',array('min_length[2]','max_length[500]'),
		array(
			'min_length'=>'Description Min 2 Character Required.',
			'max_length'=>'Description Max 500 Character Allowed.',
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
	=================================================================================
	 Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	Purpose: Hide section
	return array(
	 		'state'=>TRUE,
	 		'msg'=>'section hidden!',
	 		'details'=>$details
	 	);
	*/
	public function _hide_section($details=false)
	{
		$details = $this->decryptArray($details);
		if(isset($details['section_id']))
		{
			$id=$details['section_id'];
			// $details = $this->decryptArray($details);
			$section=array(
				'in_use'=>'N',
			);
			$results = $this->standard_model->updateRecord('tbl_section','section_id',$id,$section);
			if($results)
			{
				$fetchdata = $this->standard_model->selectAllWhr('tbl_section','section_id',$details['section_id']);
				if($fetchdata)
				{
				   $data=array();
					foreach ($fetchdata as $result)
					{
						$data[] = (array)$result;  
					}
					if(isset($data) && is_array($data)){
					$result = $this->encryptArray($data);
					}
					return array(
					'msg'=>'Hide Record!',
					'state'=>true,
					'details'=>$result
					);
		        }
			}
			else
			{
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide section';
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
			'msg'=>'section_topic_id Required!',
			);
		}
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:31/01/2020
	=================================================================================
	Purpose: Restore section
	return array(
		'state'=>TRUE,
		'msg'=>'section restored!',
		'details'=>$details
	);
	*/
	public function _restore_section($details=false)
	{
		$details = $this->decryptArray($details);
		if(isset($details['section_id']))
		{	
		    $id=$details['section_id'];
			// $details = $this->decryptArray($details);
			$section=array(
				'in_use'=>'Y',
			);
			$results = $this->standard_model->updateRecord('tbl_section','section_id',$id,$section);
			if($results)
			{
				$fetchdata = $this->standard_model->selectAllWhr('tbl_section','section_id',$details['section_id']);
				if($fetchdata)
				{
				   $data=array();
					foreach ($fetchdata as $result)
					{
						$data[] = (array)$result;  
					}
					if(isset($data) && is_array($data)){
					$result = $this->encryptArray($data);
					}
					return array(
					'msg'=>'Restore Record!',
					'state'=>true,
					'details'=>$result
					);
		        }
			}
			else
			{
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide section';
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
			'msg'=>'section_topic_id Required!',
			);
		}
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:31/01/2020
	=================================================================================
	Purpose:Delete section
	/*return array(
		'state'=>TRUE,
		'msg'=>'section deleted!',
		'details'=>$details
	);
	*/
	public function _delete_section($details=null)
	{  
		$details = $this->decryptArray($details);
		if(isset($details['section_id']))
		{    
			$id=$details['section_id'];
    		$section=array(
					'display'=>'N',
				);
			$results = $this->standard_model->updateRecord('tbl_section','section_id',$id,$section);
			if($results)
			{
				$results = $this->encryptArray($details);
				return array(
					'state'=>true,
					'msg'=>'Section Delete!',
					'details'=>$results
				);
			}
			else
			{
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Delete section';
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
			'msg'=>'section_id Required!',
			);
		}
	}
}