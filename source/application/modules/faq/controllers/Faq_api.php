<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Faq_api extends Base_Controller 
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
	Purpose: Get User FAQ
	return array(
	 	'state'=>TRUE,
		'msg'=>'Records Found!',
	 	'details'=>array(
	 		array(
	 		"topic_name": "membership",
            "question_name": "How to register new Institute?",
            "answer": "1. Go to link msceia.in.\n2. On Home page click on Sign Up button.",
            "modified_by": 1,
            "faq_id": 4,
            "created_by": 1,
            "created_on": "2020-02-28 18:21:30"
	 		)
	 	)
	 );
    */
	public function _get_faq($details=false)
    {
		$details = $this->decryptArray($details);
		if(isset($details['faq_id']))
        {
        $results = $this->standard_model->alljoin2tbl_whr('tbl_faq','tbl_faq_topics','faq_topic_id','faq_id',$details['faq_id']);
        }
        else if(isset($details['all'])){
        $results= $this->standard_model->selectAllJoin('tbl_faq','tbl_faq_topics','faq_topic_id','faq_id');
        }
        else {
          $results= $this->standard_model->selectAllJoin('tbl_faq','tbl_faq_topics','faq_topic_id','in_use','Y');
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
	Purpose: Save user FAQ
	return array(
			'state'=>TRUE,
			'msg'=>'New FAQ added!',
			'details'=>$details
		);
    */
    public function _set_faq($details=false)
	{
	  	
		$validation_error='';
		$details = $this->decryptArray($details);
		if(isset($details['faq_id']) && !empty($details['faq_id']))
      	{
      		$flag=1;
      	}
      	else
      	{
      		$flag=0;
		}
		$faq_top_id=$details['faq_topic_id'];
		$faq_topic_id=$this->standard_model->selectAllWhr('tbl_faq_topics','faq_topic_id',$faq_top_id);
		if(isset($faq_topic_id) && !empty($faq_topic_id))
		{
			if($this->validationFaqMasterDetails($details))
			{
				if($details)
				{
					$user_id= $this->session->userdata('user_id');
					$faq = array(
						'faq_id'=>isset($details['faq_id'])?$details['faq_id']:NULL,
							'faq_topic_id'=>$faq_top_id,
							'question_name'=>$details['question_name'],
							'answer'=>$details['answer'],
							'modified_by'=>1,
							'modified_on'=>date('Y-m-d H:i:s')
							);
					// if(!isset($details['faq_id']) && empty($details['faq_id']))
					// {
					// 	$faq['inserted_by']=1;
					// 	$faq['inserted_on']=date('Y-m-d H:i:s');
					// }
					// $faq_id = $this->standard_model->single_insert('tbl_faq',$faq);
					// $faq['faq_id']=$faq_id;
					// $faq= $this->encryptArray($faq);
					// if(isset($details['faq_id']) && !empty($details['faq_id']))
					// {
					// return array(
					// 			'state'=>true,
					// 			'msg'=>'Update Record!',
					// 			'details'=>$faq
					// 			);
					// }
					// else{
					// 	return array(
					// 		'state'=>true,
					// 		'msg'=>'new FAQ Added!',
					// 		'details'=>$faq
					// 		);
					// }
					$error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
				if($flag==0)
				{
					$faq['inserted_by']=1;
					$faq['inserted_on']=date('Y-m-d H:i:s');
					$faq['display']='Y';
					$faq['in_use']='Y';
					$faq_id= $this->standard_model->single_insert('tbl_faq',$faq);
					if($error_msg && !empty($error_msg) )
					{                                                       
						return array(
							'state'=>false,
							'msg'=>'Unable to Add Faq!',
							'details'=>$error_msg
						);
					}
					else
					{
						$faq['faq_id']=$faq_id;
						$faq= $this->encryptArray($faq);
						return array(
							'state'=>true,
							'msg'=>'FAQ Added Successfully!',
							'details'=>$faq
						);
					}
				}
				else
				{													
					$faq_id= $this->standard_model->single_insert('tbl_faq',$faq);
					if($error_msg && !empty($error_msg) )
					{                                                       
						return array(
							'state'=>false,
							'msg'=>'Unable to Update Faq!',
							'details'=>$error_msg
							);
					}
					else
					{
						$faq['faq_id']=$faq_id;
						$faq= $this->encryptArray($faq);        		
						return array(
							'state'=>true,
							'msg'=>'FAQ Updated Successfully!',
							'details'=>$faq
							);
					}
				}   	
				}
				else
				{
					return array(
					'state'=>False,
					'msg'=>'FAQ Failed to Saved!',
					'details'=>false
					);
				}
			}
			else
			{
				$validation_error = validation_errors();
				return array(
					'state'=>False,
					'msg'=>$validation_error,
					'details'=>'Validation is failed'
				);
			}	
		}
		else{
			return array(
				'state'=>false,
				'msg'=>'foreign key constraint fails',
				'details'=>false
				);
		}
    }
    /*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	Purpose: validation for Faq
	*/
	function validationFaqMasterDetails($details)
    {
		$var1="'";
	 	$var2='"';
	 	$this->form_validation->set_error_delimiters('','');
        $this->form_validation->set_data(
        array(
			'faq_id'=>isset($details['faq_id'])?$details['faq_id'] :'',
	 		'faq_topic_id'=>isset($details['faq_topic_id'])?$details['faq_topic_id'] :'',
            'question_name'=>isset($details['question_name'])?$details['question_name'] :'',
	 		'answer'=>isset($details['answer'])?$details['answer'] :'',
       	)
	 	); 
	   $this->form_validation->set_rules('faq_id','faq_id', array('min_length[1]','max_length[11]',"regex_match[/^([0-9][0-9]{0,10})$/]"),
	   array(    
		   'min_length'=>'faq_id Min 1 Number Required.',
		   'max_length'=>'faq_id Max 11 Number allowed.',
		   'regex_match'=>'faq_id Should Have Only Numbers'
	   )
	   );
	   $this->form_validation->set_rules('faq_topic_id','faq_topic_id', array('required','min_length[1]','max_length[11]',"regex_match[/^([0-9][0-9]{0,10})$/]"),
		array(  
			    'required'=>'faq_topic_id  Required',                                                                                    
				'min_length'=>'faq_topic_id Min 1 Number Required.',
				'max_length'=>'faq_topic_id Max 11 Number allowed.',
				'regex_match'=>'faq_topic_id Should Have Only Numbers'
		)
		);
		$this->form_validation->set_rules('answer','answer',array('required','min_length[2]','max_length[500]'),
		array(
			'required'=>'Answer  Required',  
			'min_length'=>'Answer Min 2 Character Required.',
			'max_length'=>'Answer Max 500 Character Allowed.',
		   )
		);
	   $this->form_validation->set_rules('question_name','question_name',array('required','min_length[2]','max_length[500]','regex_match[/^([A-Za-z0-9][A-Za-z0-9\,\.\|\(\)\-\_\'\"\?\:\;\&\s]{1,254})$/]'),
	   array(
			'required'=>'Question Name Required',
			'min_length'=>'Question Name Min 2 Character Required.',
			'max_length'=>'Question Name Max 255 Character Allowed.',
			'regex_match'=>'Question Name Should Have Only Alphanumeric character and Special Character ,'.$var1.'( )'.$var2.' - \ & _ : ; | & Space are Allowed'
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
	Purpose: Hide FAQ
	return array(
	 		'state'=>TRUE,
	 		'msg'=>'FAQ hidden!',
	 		'details'=>$details
	 	);
	*/
	public function _hide_faq($details=false)
	{
		$details = $this->decryptArray($details);
		if(isset($details['faq_id']))
		{
			$id=$details['faq_id'];
			$faq=array(
				'in_use'=>'N',
			);
			$results = $this->standard_model->updateRecord('tbl_faq','faq_id',$id,$faq);
			if($results)
			{
				$fetchdata = $this->standard_model->selectAllWhr('tbl_faq','faq_id',$details['faq_id']);
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
						'msg'=>'Record Hide Successfully!',
						'state'=>true,
						'details'=>$result
						);
		        }
			}
			else
			{
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide Faq';
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
			'msg'=>'faq_topic_id Required!',
			);
		}
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:31/01/2020
	=================================================================================
	Purpose: Restore FAQ
	return array(
		'state'=>TRUE,
		'msg'=>'FAQ restored!',
		'details'=>$details
	);
	*/
	public function _restore_faq($details=false)
	{
		$details = $this->decryptArray($details);
		if(isset($details['faq_id']))
		{	
		    $id=$details['faq_id'];
			// $details = $this->decryptArray($details);
			$faq=array(
				'in_use'=>'Y',
			);
			$results = $this->standard_model->updateRecord('tbl_faq','faq_id',$id,$faq);
			if($results)
			{
				$fetchdata = $this->standard_model->selectAllWhr('tbl_faq','faq_id',$details['faq_id']);
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
						'msg'=>'Record Restore Successfully!',
						'state'=>true,
						'details'=>$result
						);
		        }
			}
			else
			{
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide Faq';
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
			'msg'=>'faq_topic_id Required!',
			);
		}
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:31/01/2020
	=================================================================================
	Purpose:Delete FAQ
	/*return array(
		'state'=>TRUE,
		'msg'=>'FAQ deleted!',
		'details'=>$details
	);
	*/
	public function _delete_faq($details=null)
	{  
		$details = $this->decryptArray($details);
		if(isset($details['faq_id']))
		{    
			$id=$details['faq_id'];
			
			$faq=array(
					'display'=>'N',
				);
			$results = $this->standard_model->updateRecord('tbl_faq','faq_id',$id,$faq);
			if($results)
			{
				$results = $this->encryptArray($details);
				return array(
					'state'=>true,
					'msg'=>'Record Delete Successfully!',
					'details'=>$results
				);
			}
			else
			{
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Delete Faq';
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
			'msg'=>'faq_id Required!',
			);
		}
	}
}