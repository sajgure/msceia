<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class email_section_api extends Base_Controller 
{
    public function __construct()
  	{
		parent::__construct();
		$this->load->model('standard/standard_model');
	}
	/*
    =================================================================================
    Author:Shubhangi Jagadale                        Date:04/03/2020
    =================================================================================
	Purpose: Get User email_section
	return array(
	 	'state'=>TRUE,
		'msg'=>'Records Found!',
	 	'details'=>array(
	 		array(
	 		"email_section_id": "2",
            "course_master_id": "1",
            "exam_type": "maidsn type",
            "to": "shubhangijagdadale@gmail.com",
            "cc": null,
            "bcc": null,
            "subject": "holdiday related",
            "message": "mondady will be hoilday",
            "attachment1": null,
            "attachment2": null,
            "display": "Y",
            "in_use": "Y",
            "created_by": "1",
            "created_on": "2020-02-29 12:18:33",
            "modified_by": "1",
            "modified_on": "2020-02-29 06:48:33",
            "course_name": "Special Skill\t",
            "course_desc": "Special Skill\t"
	 		)
	 	)
	 );
    */
	public function _get_email_section($details=false)
    {
		$details = $this->decryptArray($details);
		if(isset($details['email_section_id']))
		{
		 $results = $this->standard_model->alljoin2tbl_whr('tbl_email_section','tbl_course_master','course_master_id','email_section_id',$details['email_section_id']);
		}
		else if(isset($details['all'])){
		$results= $this->standard_model->selectAllJoin('tbl_email_section','tbl_course_master','course_master_id');
		}
		else {
		$results= $this->standard_model->selectAllJoin('tbl_email_section','tbl_course_master','course_master_id','in_use','Y');
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
    Author:Shubhangi Jagadale                        Date:04/03/2020
	=================================================================================
	Purpose: Save email_section
	return array(
			'state'=>TRUE,
			'msg'=>'New email_section added!',
			'details'=>$details
		);
    */
    public function _set_email_section($details=false)
	{
	  	$validation_error='';
		$details = $this->decryptArray($details);
		if(isset($details['email_section_id']) && !empty($details['email_section_id']))
      	{
      		$flag=1;
      	}
      	else
      	{
      		$flag=0;
		}
		$cour_master_id=$details['course_master_id'];
		$course_master_id=$this->standard_model->selectAllWhr('tbl_course_master','course_master_id',$cour_master_id);
		if(isset($course_master_id) && !empty($course_master_id))
		{
			if($this->validationEmailSectionDetails($details))
			{
				if($details)
				{
					$user_id= $this->session->userdata('user_id');
					$email_section = array(
						'email_section_id'=>isset($details['email_section_id'])?$details['email_section_id']:NULL,
							'course_master_id'=>$cour_master_id,
							'exam_type'=>$details['exam_type'],
							'to'=>$details['to'],
							'cc'=>$details['cc'],
							'bcc'=>$details['bcc'],
							'subject'=>$details['subject'],
							'message'=>$details['message'],
							'attachment1'=>$details['attachment1'],
							'attachment2'=>$details['attachment2'],
							'modified_by'=>1,
							'modified_on'=>date('Y-m-d H:i:s')
					 		);
					// if(!isset($details['email_section_id']) && empty($details['email_section_id']))
					// {
					// 	$email_section['inserted_by']=1;
					// 	$email_section['inserted_on']=date('Y-m-d H:i:s');
					// }
					// $email_section_id = $this->standard_model->single_insert('tbl_email_section',$email_section);
					// $email_section['email_section_id']=$email_section_id;
					// $email_section= $this->encryptArray($email_section);
					// if(isset($details['email_section_id']) && !empty($details['email_section_id']))
					// {
					// 	return array(
					// 		'state'=>true,
					// 		'msg'=>'Update Record!',
					// 		'details'=>$email_section
					// 		);
					// }
					// else
					// {
					// 	return array(
					// 		'state'=>true,
					// 		'msg'=>'email_section registered!',
					// 		'details'=>$email_section
					// 		);
					// }			
					$error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
					if($flag==0)
					{
						$email_section['inserted_by']=1;
						$email_section['inserted_on']=date('Y-m-d H:i:s');
						$email_section['display']='Y';
						$email_section['in_use']='Y';
						$email_section_id= $this->standard_model->single_insert('tbl_email_section',$email_section);
						if($error_msg && !empty($error_msg) )
						{                                                       
							return array(
								'state'=>false,
								'msg'=>'Unable to Add Email Section!',
								'details'=>$error_msg
							);
						}
						else
						{
							$email_section['email_section_id']=$email_section_id;
							$email_section= $this->encryptArray($email_section);
							return array(
								'state'=>true,
								'msg'=>'Email Section Added Successfully!',
								'details'=>$email_section
							);
						}
					}
					else
					{													
						$email_section_id= $this->standard_model->single_insert('tbl_email_section',$email_section);
						if($error_msg && !empty($error_msg) )
						{                                                       
							return array(
								'state'=>false,
								'msg'=>'Unable to Update Email Section!',
								'details'=>$error_msg
								);
						}
						else
						{
							$email_section['email_section_id']=$email_section_id;
							$email_section= $this->encryptArray($email_section);        		
							return array(
								'state'=>true,
								'msg'=>'Email Section Updated!',
								'details'=>$email_section
								);
						}
					}   	
				}
				else
				{
					return array(
					'state'=>False,
					'msg'=>'email_section Failed to Saved!',
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
		else
		{
			return array(
								'state'=>false,
								'msg'=>'foreign key constraint fails',
								'details'=>false
							);
		}      
    	
    }
    /*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:04/03/2020
	=================================================================================
	Purpose: validation for email_section
	*/
	function validationEmailSectionDetails($details)
    {
	 	$var1="'";
	 	$var2='"';
	 	$this->form_validation->set_error_delimiters('','');
		$this->form_validation->set_data(
		array(
			'email_section_id'=>isset($details['email_section_id']) ? $details['email_section_id'] :'',
			'course_master_id'=>isset($details['course_master_id']) ? $details['course_master_id'] :'',
			'to'=>isset($details['to']) ? $details['to'] :'',
			'cc'=>isset($details['cc']) ? $details['cc'] :'',
			'bcc'=>isset($details['bcc']) ? $details['bcc'] :'',
			'exam_type'=>isset($details['exam_type']) ? $details['exam_type'] :'',
			'subject'=>isset($details['subject']) ? $details['subject'] :'',
			'message'=>isset($details['message']) ? $details['message'] :'',
			// 'attachment1'=>isset($details['attachment1']) ? $details['attachment1'] :'',
			// 'attachment2'=>isset($details['attachment2']) ? $details['attachment2'] :''
		)
		); 
		$this->form_validation->set_rules('email_section_id','email_section_id', array('min_length[1]','max_length[11]',"regex_match[/^([0-9][0-9]{0,10})$/]"),
		array(    
			'min_length'=>'email_section_id Min 1 Number Required.',
			'max_length'=>'email_section_id Max 11 Number allowed.',
			'regex_match'=>'email_section_id Should Have Only Numbers'
		)
		);
		$this->form_validation->set_rules('course_master_id','course_master_id', array('required','min_length[1]','max_length[11]',"regex_match[/^([0-9][0-9]{0,10})$/]"),
		array(    
			'required'=>'course_master_id Required',
			'min_length'=>'course_master_id Min 1 Number Required.',
			'max_length'=>'course_master_id Max 11 Number allowed.',
			'regex_match'=>'course_master_id Should Have Only Numbers'
		)
		);
		 $this->form_validation->set_rules('exam_type','exam_type',array('required','min_length[2]','max_length[255]','regex_match[/^([A-Za-z0-9][A-Za-z0-9\,\.\|\(\)\-\_\'\"\:\;\&\s]{1,254})$/]'),
		 array(
		  	'required'=>'Exam  Type Required',
		  	'min_length'=>'Exam Type Min 2 Character Required.',
		  	'max_length'=>'Exam Type Max 255 Character Allowed.',
		  	'regex_match'=>'Exam Type Should Have Only Alphanumeric Character and Special Character ,'.$var1.'( )'.$var2.' - \ & _ : ; | & Space are Allowed'
		 )
		 );
		 $this->form_validation->set_rules('to','to',array('required','regex_match[/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/]'),
		 array(
		   	'required'=>'Required the String',
		   	'regex_match'=>'To Should Have Email Format.'
		 )
		 );
		   $this->form_validation->set_rules('cc','cc',array('regex_match[/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/]'),
		  array(
		       	'regex_match'=>'cc Should Have Email Format.'
		  )
		  );
		  $this->form_validation->set_rules('bcc','bcc',array('regex_match[/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/]'),
		  array(
		    	   	'regex_match'=>'bcc Should Have Email Format.'
		  )
		  );
		$this->form_validation->set_rules('subject','subject',array('required','max_length[255]','regex_match[/^([A-Za-z0-9][A-Za-z0-9\,\.\|\(\)\-\'\"\:\;\&\s]{1,254})$/]'),
		 array(
			 'required'=>'Subject Required.',
			 'min_length'=>'Exam Type Min 2 Character Required.',
			 'max_length'=>'Exam Type Max 255 Character Allowed.',
		 	'regex_match'=>'Subject Should Have  Only Alphanumeric character and Special Character ,'.$var1.'( )'.$var2.' -   : ; | & Space are Allowed'
		 )
		 );
		 $this->form_validation->set_rules('message','message',array('min_length[2]','max_length[500]'),
		 array(
			 'min_length'=>'Message Min 2 Character Required.',
			 'max_length'=>'Message Max 500 Character Allowed.',
		   )
		 );
		//  $this->form_validation->set_rules('attachment1', 'attachment1',array('required'),
                                                                                                                
		//  array(
		// 	   'required'=>'attachment1  is Required'
		//  ));
		//  $this->form_validation->set_rules('attachment2', 'attachment2',array('required'),
                                                                                                                
		//  array(
		// 	   'required'=>'attachment2  is Required'
		//  ));
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
	 Author:Shubhangi Jagadale                        Date:04/03/2020
	=================================================================================
	Purpose: Hide email_section
	return array(
	 		'state'=>TRUE,
	 		'msg'=>'email_section hidden!',
	 		'details'=>$details
	 	);
	*/
	public function _hide_email_section($details=false)
	{
		$details = $this->decryptArray($details);			
		if(isset($details['email_section_id']))
		{
			$id=$details['email_section_id'];
			$email_section=array(
				'in_use'=>'N',
			);
			$results = $this->standard_model->updateRecord('tbl_email_section','email_section_id',$id,$email_section);
			if($results)
			{
				$fetchdata = $this->standard_model->selectAllWhr('tbl_email_section','email_section_id',$details['email_section_id']);
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
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide email_section';
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
			'msg'=>'email_section_topic_id Required!',
			);
		}
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:04/03/2020
	=================================================================================
	Purpose: Restore email_section
	return array(
		'state'=>TRUE,
		'msg'=>'email_section restored!',
		'details'=>$details
	);
	*/
	public function _restore_email_section($details=false)
	{
		$details = $this->decryptArray($details);			
		if(isset($details['email_section_id']))
		{	
		    $id=$details['email_section_id'];
			$email_section=array(
				'in_use'=>'Y',
			);
			$results = $this->standard_model->updateRecord('tbl_email_section','email_section_id',$id,$email_section);
			if($results)
			{
				$fetchdata = $this->standard_model->selectAllWhr('tbl_email_section','email_section_id',$details['email_section_id']);
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
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Restore email_section';
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
			'msg'=>'email_section_topic_id Required!',
			);
		}
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:04/03/2020
	=================================================================================
	Purpose:Delete email_section
	/*return array(
		'state'=>TRUE,
		'msg'=>'email_section deleted!',
		'details'=>$details
	);
	*/
	public function _delete_email_section($details=null)
	{  
		if(isset($details['email_section_id']))
		{ 
			$details = $this->decryptArray($details);   
			$id=$details['email_section_id'];
			$email_section=array(
					'display'=>'N',
				);
			$results = $this->standard_model->updateRecord('tbl_email_section','email_section_id',$id,$email_section);
			if($results)
			{
				$results = $this->encryptArray($details);
				return array(
					'state'=>true,
					'msg'=>'Email Section Delete!',
					'details'=>$results
				);
			}
			else
			{
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Delete email_section';
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
			'msg'=>'email_section_id Required!',
			);
		}
	}
}