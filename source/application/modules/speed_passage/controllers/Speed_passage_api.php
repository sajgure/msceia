<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class speed_passage_api extends Base_Controller 
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
	Purpose: Get User speed_passage
	return array(
	 	'state'=>TRUE,
		'msg'=>'Records Found!',
	 	'details'=>array(
	 		array(
	 		"course_master_id": "membership",
            "exam_type": "How to register new Institute?",
            "description": "1. Go to link msceia.in.\n2. On Home page click on Sign Up button.",
            "modified_by": 1,
            "speed_passage_id": 4,
            "created_by": 1,
            "created_on": "2020-02-28 18:21:30"
	 		)
	 	)
	 );
    */
	public function _get_speed_passage($details=false)
    {
		$details = $this->decryptArray($details);
		if(isset($details['speed_passage_id']))
		{
		 $results = $this->standard_model->alljoin2tbl_whr('tbl_speed_passage','tbl_course_master','course_master_id','speed_passage_id',$details['speed_passage_id']);
		}
		else if(isset($details['all'])){
		 $results= $this->standard_model->selectAllJoin('tbl_speed_passage','tbl_course_master','course_master_id');
		}
		else {
		   $results= $this->standard_model->selectAllJoin('tbl_speed_passage','tbl_course_master','course_master_id','in_use','Y');
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
	Purpose: Save user speed_passage
	return array(
			'state'=>TRUE,
			'msg'=>'New speed_passage added!',
			'details'=>$details
		);
    */
    public function _set_speed_passage($details=false)
	{ 
	  	$validation_error='';
		$details = $this->decryptArray($details);
		if(isset($details['speed_passage_id']) && !empty($details['speed_passage_id']))
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
			if($this->validationSpeedPassageMasterDetails($details))
			{
				if($details)
				{
					$user_id= $this->session->userdata('user_id');
					$speed_passage = array(
						'speed_passage_id'=>isset($details['speed_passage_id'])?$details['speed_passage_id']:NULL,
							'course_master_id'=>$details['course_master_id'],
							'exam_type'=>$details['exam_type'],
							'description'=>$details['description'],
							'modified_by'=>1,
							'modified_on'=>date('Y-m-d H:i:s')
						);
					if(!isset($details['speed_passage_id']) && empty($details['speed_passage_id']))
					{
						$speed_passage['inserted_by']=1;
						$speed_passage['inserted_on']=date('Y-m-d H:i:s');
					}
					// $speed_passage_id = $this->standard_model->single_insert('tbl_speed_passage',$speed_passage);
					// $speed_passage['speed_passage_id']=$speed_passage_id;
					// $speed_passage= $this->encryptArray($speed_passage);
					// if(isset($details['speed_passage_id']) && !empty($details['speed_passage_id']))
					// {
					// 	return array(
					// 				'state'=>true,
					// 				'msg'=>'Update Record!',
					// 				'details'=>$speed_passage
					// 				);
					// }
					// else{
					// 	return array(
					// 		'state'=>true,
					// 		'msg'=>'speed_passage registered!',
					// 		'details'=>$speed_passage
					// 		);
					// }
					$error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
	                if($flag==0)
	                {
	                    $speed_passage['inserted_by']=1;
	                    $speed_passage['inserted_on']=date('Y-m-d H:i:s');
	                    $speed_passage['display']='Y';
	                    $speed_passage['in_use']='Y';
	                    $speed_passage_id= $this->standard_model->single_insert('tbl_speed_passage',$speed_passage);
	                    if($error_msg && !empty($error_msg) )
	                    {                                                       
	                        return array(
	                            'state'=>false,
	                            'msg'=>'Unable to Add Speed Passage!',
	                            'details'=>$error_msg
	                        );
	                    }
	                    else
	                    {
	                        $speed_passage['speed_passage_id']=$speed_passage_id;
	                        $speed_passage= $this->encryptArray($speed_passage);
	                        return array(
	                            'state'=>true,
	                            'msg'=>'Speed Passage Added Successfully!',
	                            'details'=>$speed_passage
	                        );
	                    }
	                }
	                else
	                {                                                   
	                    $speed_passage_id= $this->standard_model->single_insert('tbl_speed_passage',$speed_passage);
	                    if($error_msg && !empty($error_msg) )
	                    {                                                       
	                        return array(
	                            'state'=>false,
	                            'msg'=>'Unable to Update Speed Passage!',
	                            'details'=>$error_msg
	                            );
	                    }
	                    else
	                    {
	                        $speed_passage['speed_passage_id']=$speed_passage_id;
	                        $speed_passage= $this->encryptArray($speed_passage);                
	                        return array(
	                            'state'=>true,
	                            'msg'=>'Speed Passage Updated!',
	                            'details'=>$speed_passage
	                            );
	                    }
	                }   
				}
				else
				{
					return array(
					'state'=>False,
					'msg'=>'speed_passage Failed to Saved!',
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
		else{
			return array(
				'state'=>False,
				'msg'=>'foreign key constraint fails',
				'details'=>false
				);
		}
    }
    /*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	Purpose: validation for speed_passage
	*/
	function validationSpeedPassageMasterDetails($details)
    {
	 	$var1="'";
	 	$var2='"';
	 	$this->form_validation->set_error_delimiters('','');
		$this->form_validation->set_data(
		array(
			'speed_passage_id'=>isset($details['speed_passage_id']) ? $details['speed_passage_id'] :'',
			'course_master_id'=>isset($details['course_master_id']) ? $details['course_master_id'] :'',
			'description'=>isset($details['description']) ? $details['description'] :'',
			'exam_type'=>isset($details['exam_type']) ? $details['exam_type'] :''
		)
		); 
		$this->form_validation->set_rules('speed_passage_id','speed_passage_id', array('min_length[1]','max_length[11]',"regex_match[/^([0-9][0-9]{0,10})$/]"),
		array(    
			'min_length'=>'speed_passage_id Min 1 Number Required.',
			'max_length'=>'speed_passage_id Max 11 Number allowed.',
			'regex_match'=>'speed_passage_id Should Have Only Numbers'
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
		$this->form_validation->set_rules('exam_type','exam_type',array('required','min_length[2]','max_length[255]','regex_match[/^([A-Za-z][A-Za-z0-9\,\.\|\(\)\-\_\'\"\:\;\&\s]{1,254})$/]'),
		array(
		'required'=>'Exam Type Required',
		'min_length'=>'Exam Type Min 2 Character Required.',
		'max_length'=>'Exam Type Max 255 Character Allowed.',
		'regex_match'=>'Exam Type Should Have Only Alphanumric Character and Special Character ,'.$var1.'( )'.$var2.' - \ & _ : ; | & Space are Allowed'
		)
		);
		$this->form_validation->set_rules('description','description',array('min_length[2]','max_length[1000]'),
		array(
			'min_length'=>'Description Min 2 Character Required.',
			'max_length'=>'Description Max 1000 Character Allowed.',
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
	Purpose: Hide speed_passage
	return array(
	 		'state'=>TRUE,
	 		'msg'=>'speed_passage hidden!',
	 		'details'=>$details
	 	);
	*/
	public function _hide_speed_passage($details=false)
	{
		if(isset($details['speed_passage_id']))
		{
			$details = $this->decryptArray($details);
			$id=$details['speed_passage_id'];
			$details = $this->decryptArray($details);
			$speed_passage=array(
				'in_use'=>'N',
			);
			$results = $this->standard_model->updateRecord('tbl_speed_passage','speed_passage_id',$id,$speed_passage); 
			if($results)
			{
				$fetchdata = $this->standard_model->selectAllWhr('tbl_speed_passage','speed_passage_id',$details['speed_passage_id']);
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
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide speed_passage';
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
			'msg'=>'speed_passage_id Required!',
			);
		}
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:31/01/2020
	=================================================================================
	Purpose: Restore speed_passage
	return array(
		'state'=>TRUE,
		'msg'=>'speed_passage restored!',
		'details'=>$details
	);
	*/
	public function _restore_speed_passage($details=false)
	{
		$details = $this->decryptArray($details);
		if(isset($details['speed_passage_id']))
		{	
		    $id=$details['speed_passage_id'];
			$speed_passage=array(
				'in_use'=>'Y',
			);
			$results = $this->standard_model->updateRecord('tbl_speed_passage','speed_passage_id',$id,$speed_passage);
			if($results)
			{
				$fetchdata = $this->standard_model->selectAllWhr('tbl_speed_passage','speed_passage_id',$details['speed_passage_id']);
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
						 'state'=>true,
						 'msg'=>'Restore Record!',
						 'details'=>$result
					);
				}
			}
			else
			{
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to restore speed_passage';
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
			'msg'=>'speed_passage_id Required!',
			);
		}
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:31/01/2020
	=================================================================================
	Purpose:Delete speed_passage
	/*return array(
		'state'=>TRUE,
		'msg'=>'speed_passage deleted!',
		'details'=>$details
	);
	*/
	public function _delete_speed_passage($details=null)
	{
		$details = $this->decryptArray($details);
		if(isset($details['speed_passage_id']))
		{    
			$id=$details['speed_passage_id'];
		
			$speed_passage=array(
					'display'=>'N',
				);
			$results = $this->standard_model->updateRecord('tbl_speed_passage','speed_passage_id',$id,$speed_passage);
			if($results)
			{
				$results = $this->encryptArray($details);
				return array(
					'state'=>true,
					'msg'=>'Speed Passage Delete!',
					'details'=>$results
				);
			}
			else
			{
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Delete speed_passage';
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
			'msg'=>'speed_passage_id Required!',
			);
		}
	}
}