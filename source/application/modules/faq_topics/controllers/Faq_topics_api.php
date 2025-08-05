<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Faq_topics_api extends Base_Controller 
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
	Purpose: Get User faq_topics
	return array(
	 	'state'=>TRUE,
        'msg'=>'Records Found!',
        'details'=>array(
	 		array(
	 		"faq_topic_name": "general question",
            "faq_topic_description": "general question",
            "modified_by": 1,
            "faq_topic_id": 5,
            "created_by": 1,
            "created_on": "2020-02-29 10:25:49"
	 		)
	 	)
	 );
    */
	public function _get_faq_topics($details=false)
    {
		$details = $this->decryptArray($details);
		if(isset($details['faq_topic_id']))
		{
           $results = $this->standard_model->selectAllWhr('tbl_faq_topics','faq_topic_id',$details['faq_topic_id']);
		}
	    else if(isset($details['all']))
	    {
		   $results=$this->standard_model->selectAll('tbl_faq_topics');
	    }
	    else{
		   $results=$this->standard_model->selectAll('tbl_faq_topics','in_use','Y');
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
	Purpose: Save user faq_topics
	return array(
			'state'=>TRUE,
			'msg'=>'New faq_topics added!',
			'details'=>$details
		);
    */
    public function _set_faq_topics($details=false)
	{
	  	$validation_error='';
		$details = $this->decryptArray($details);
		if(isset($details['faq_topic_id']) && !empty($details['faq_topic_id']))
		{
			$flag=1;
		}
		else
		{
			$flag=0;
		}
          if($this->validationFaqTopicsMasterDetails($details, $flag))
		  {
            if($details)
            {
                $user_id= $this->session->userdata('user_id');
                $faq_topics = array(
					'faq_topic_id'=>isset($details['faq_topic_id'])?$details['faq_topic_id']:NULL,
                        'faq_topic_name'=>$details['faq_topic_name'],
                        'faq_topic_description'=>$details['faq_topic_description'],
						'modified_by'=>1,
					    'modified_on'=>date('Y-m-d H:i:s')
                     );
                if(!isset($details['faq_topic_id']) && empty($details['faq_topic_id']))
                {
                    $faq_topics['inserted_by']=1;
                    $faq_topics['inserted_on']=date('Y-m-d H:i:s');
                }
    //             $faq_topic_id = $this->standard_model->single_insert('tbl_faq_topics',$faq_topics);
    //             $faq_topics['faq_topic_id']=$faq_topic_id;
				// $faq_topics= $this->encryptArray($faq_topics);
				// if(isset($details['faq_topic_id']) && !empty($details['faq_topic_id']))
    //             {
    //             return array(
    //                         'state'=>true,
    //                         'msg'=>'Update Record!',
    //                         'details'=>$faq_topics
				// // 			);
				// }
				// else{
				// 	return array(
				// 		'state'=>true,
				// 		'msg'=>'faq_topics registered!',
				// 		'details'=>$faq_topics
				// 		);
				// }
				$error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
				if($flag==0)
				{
					$faq_topics['inserted_by']=1;
					$faq_topics['inserted_on']=date('Y-m-d H:i:s');
					$faq_topics['display']='Y';
					$faq_topics['in_use']='Y';
					$faq_topic_id= $this->standard_model->single_insert('tbl_faq_topics',$faq_topics);
					if($error_msg && !empty($error_msg) )
					{                                                       
						return array(
							'state'=>false,
							'msg'=>'Unable to Add FAQ Topics!',
							'details'=>$error_msg
						);
					}
					else
					{
						$faq_topics['faq_topic_id']=$faq_topic_id;
						$faq_topics= $this->encryptArray($faq_topics);
						return array(
							'state'=>true,
							'msg'=>'FQA Topics Added Successfully!',
							'details'=>$faq_topics
						);
					}
				}
				else
				{													
					$faq_topic_id= $this->standard_model->single_insert('tbl_faq_topics',$faq_topics);
					if($error_msg && !empty($error_msg) )
					{                                                       
						return array(
							'state'=>false,
							'msg'=>'Unable to Update FAQ Topics!',
							'details'=>$error_msg
							);
					}
					else
					{
						$faq_topics['faq_topic_id']=$faq_topic_id;
						$faq_topics= $this->encryptArray($faq_topics);        		
						return array(
							'state'=>true,
							'msg'=>'FQA Topics Updated Successfully!',
							'details'=>$faq_topics
							);
					}
				}  
            }
            else
            {
                return array(
                'state'=>False,
                'msg'=>'faq_topics Failed to Saved!',
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
	Purpose: validation for faq_topics
	*/
	function validationFaqTopicsMasterDetails($details,$flag)
    {
	 	$var1="'";
	 	$var2='"';
	 	$this->form_validation->set_error_delimiters('','');
        $this->form_validation->set_data(
         array(
	 		'faq_topic_id'=>isset($details['faq_topic_id']) ? $details['faq_topic_id'] :'',
            'faq_topic_name'=>isset($details['faq_topic_name']) ? $details['faq_topic_name'] :'',
	 		'faq_topic_description'=>isset($details['faq_topic_description']) ? $details['faq_topic_description'] :'',
       		)
	 	   ); 
	 	$this->form_validation->set_rules('faq_topic_id','faq_topic_id', array('min_length[1]','max_length[11]',"regex_match[/^([0-9][0-9]{0,10})$/]"),
	 	 array(                                                                                      
	 			'min_length'=>'faq_topic_id Min 1 Number Required.',
	 			'max_length'=>'faq_topic_id Max 11 Number allowed.',
	 			'regex_match'=>'faq_topic_id Should Have Only Numbers'
	 		  )
	 		);
	 	$this->form_validation->set_rules('faq_topic_name','faq_topic_name',array('required','min_length[2]','max_length[255]',"regex_match[/^([A-Za-z0-9][A-Za-z0-9\,\(\)\-\'\_\"\:\;\&\|\s]{1,254})$/]"),
	 	 array(
				'required'=>'FAQ Topic Name Required ', 
			    'min_length'=>'FAQ Topic Name Min 2 Character Required.',
	 			'max_length'=>'FAQ Topic Name Max 255 Character Allowed.',
	 			'regex_match'=>'FAQ Topic Name Should Have Only Alphanumeric charcter and Special Character ,'.$var1.' ( )'.$var2.' _- & \ : ; | & Space are Allowed'
	 		)
             );
        $this->form_validation->set_rules('faq_topic_description','faq_topic_description',array('required','min_length[2]','max_length[500]'),
		array(
			'required'=>'FAQ Topic Description Required ', 
			'min_length'=>'FAQ Topic Description Min 2 Character Required.',
			'max_length'=>'FAQ Topic Description Max 500 Character Allowed.',
		//  'regex_match'=>'faq_topic Description Should Have  Only Alphanumeric charcter and Special Character ,'.$var1.'( )'.$var2.' - _ /[]  & : ; | & Space are Allowed.'
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
	Purpose: Hide faq_topics
	return array(
		'state'=>TRUE,
		'msg'=>'faq_topics hidden!',
		'details'=>$details
	);
	*/
	public function _hide_faq_topics($details=false)
	{
		$details = $this->decryptArray($details);
		if(isset($details['faq_topic_id']))
		{
			$id=$details['faq_topic_id'];
			// $details = $this->decryptArray($details);
			$faq_topics=array(
				'in_use'=>'N',
			);
			$results = $this->standard_model->updateRecord('tbl_faq_topics','faq_topic_id',$id,$faq_topics);
			if($results)
			{
				$fetchdata = $this->standard_model->selectAllWhr('tbl_faq_topics','faq_topic_id',$details['faq_topic_id']);
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
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide faq_topics';
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
	Author:Shubhangi Jagadale                        Date:29/02/2020
	=================================================================================
	Purpose: Restore faq_topics
	return array(
		'state'=>TRUE,
		'msg'=>'faq_topics restored!',
		'details'=>$details
	);
	*/
	public function _restore_faq_topics($details=false)
	{
		$details = $this->decryptArray($details);
		if(isset($details['faq_topic_id']))
		{
			$id=$details['faq_topic_id'];
			// $details = $this->decryptArray($details);
			$faq_topics=array(
				'in_use'=>'Y',
			);
			$results = $this->standard_model->updateRecord('tbl_faq_topics','faq_topic_id',$id,$faq_topics);
			if($results)
			{				
				$fetchdata = $this->standard_model->selectAllWhr('tbl_faq_topics','faq_topic_id',$details['faq_topic_id']);
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
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Restore Faq Topics';
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
	Author:Shubhangi Jagadale                        Date:29/02/2020
	=================================================================================
	Purpose:Delete faq_topics
	/*return array(
		'state'=>TRUE,
		'msg'=>'faq_topics deleted!',
		'details'=>$details
	);
	*/
	public function _delete_faq_topics($details=null)
	{     
		$details = $this->decryptArray($details);
		if(isset($details['faq_topic_id']))
		{ 
			$id=$details['faq_topic_id'];
			$faq_topics=array(
				'display'=>'N',
				);
			$results = $this->standard_model->updateRecord('tbl_faq_topics','faq_topic_id',$id,$faq_topics);
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
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Restore Faq Topics';
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
}