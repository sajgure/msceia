<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Batch_fees_api extends Base_Controller 
{
    public function __construct()
  	{
		parent::__construct();
		$this->load->model('standard/standard_model');
		$this->load->model('batch_fees/batch_fees_model');
	}

	/*
    -----------------------------------------------------------------------------------
    Author: SNEHAL KULKARNI                Date: 26 March 2021
    -----------------------------------------------------------------------------------
    Purpose: Save Batch Fees Details
	Response:return array(
						  	{
							    "state": true,
							    "msg": "Batch Fees Added Successfully!",
							    "details": {
							        "batch_fees_id": 1,
							        "batch_id": "2nWpd",
							        "minimum_student": "10",
							        "maximum_student": "20",
							        "minimum_fees": "10000",
							        "maximum_fees": "20000",
							        "modified_by": 1,
							        "modified_on": "2021-03-26 12:12:35",
							        "inserted_by": 1,
							        "inserted_on": "2021-03-26 12:12:35",
							        "display": "Y",
							        "in_use": "Y"
							    }
							}
						  );
    */
	public function _set_batch_fees($details=array())
	{
      	$validation_error='';
      	$details=$this->decryptArray($details);
      	$user_id= $this->session->userdata('user_id');
      	if(isset($details['batch_fees_id']) && !empty($details['batch_fees_id']))
      	{
      		$flag=1;
      	}
      	else
      	{
      		$flag=0;
      	}
      	if(isset($user_id) && !empty($user_id))
      	{
    	  if($this->validationSpeedPassage($details,$flag))
    	  {
      		if($details)
      		{
      	 		$batch_fees = array
		    	(
		    		'batch_fees_id'=>isset($details['batch_fees_id'])?$details['batch_fees_id']:NULL,
		    		'batch_id' =>$details['batch_id'],
		      	 	'minimum_student' =>$details['minimum_student'],
		      	 	'maximum_student' =>$details['maximum_student'],
		      	 	'minimum_fees' =>$details['minimum_fees'],
		      	 	'maximum_fees' =>$details['maximum_fees'],
		      	 	'modified_by'=>$user_id,
                    'modified_on'=>date('Y-m-d H:i:s')
		      	);
		      	
	            if(isset($details['minimum_fees']) && !empty($details['minimum_fees']) && isset($details['maximum_fees']) && !empty($details['maximum_fees']))
	            {
	              	if($details['minimum_fees']>$details['maximum_fees'])
	              	{
	               		 return array(
	                           'state'=>false,
	                           'msg'=>'Minimum Fees Can Not Be Greater Than Maximum Fees!',
	                           'details'=>false
	                           );
	              	}
	            }
		      	if($flag==0)
                {                	
                    $batch_fees['inserted_by']=$user_id;
                    $batch_fees['inserted_on']=date('Y-m-d H:i:s');
                    $batch_fees['display']='Y';
                    $batch_fees['in_use']='Y';
                    $batch_fees_id= $this->standard_model->single_insert('tbl_batch_fees',$batch_fees);
                    $error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
                    if($error_msg && !empty($error_msg) )
		            {
		                    return array(
		                            
		                                  'state'=>false,
		                                  'msg'=>'Unable to Add Batch Fees!',
		                                  'details'=>$error_msg
		                                  );  
		            }
		            else
		            {
		                    $batch_fees['batch_fees_id']=$batch_fees_id;
      						$batch_fees= $this->encryptArray($batch_fees);
      						return array(
                            			'state'=>true,
                            			'msg'=>'Batch Fees Added Successfully!',
                            			'details'=>$batch_fees
                        	    		);
		            }
      	 		}
				else
				{ 
					$batch_fees_id= $this->standard_model->single_insert('tbl_batch_fees',$batch_fees);
					//echo $this->db->last_query();die;
					//print_r($batch_fees_id);
                    //$error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
                    //print_r($error_msg);
              //       if($error_msg && !empty($error_msg) )
		            // {
		            //         return array(
		            //                       'state'=>false,
		            //                       'msg'=>'Unable to Update Batch Fees!',
		            //                       'details'=>$error_msg
		            //                       );  
		            // }
		            // else
		            // {
		                    $batch_fees['batch_fees_id']=$batch_fees_id;
      						$batch_fees= $this->encryptArray($batch_fees);
      						return array(
                            			'state'=>true,
                            			'msg'=>'Batch Fees Updated Successfully!',
                            			'details'=>$batch_fees
                        	    		);
		            //}
				}
			}				
			else
        	{
            	return array(
            			'state'=>False,
            			'msg'=>'Batch Fees Failed to Save!',
            			'details'=>false
            			);
        	}					      	 
    	  }
   		  else
		  {
			$validation_error = validation_errors();
			if(""==$validation_error)
          	{
            	$validation_error = "Duplicate Entry For batch_id";
          	}
			return array(
					'state'=>False,
					'msg'=>$validation_error,
					'details'=>'Validation is Failed'
		 			);
		  }
		}
        else
        {
      	    return array(
                    	   'state'=>false,
                    	   'msg'=>'Please Login! Session Time-Out!',
                    	   'details'=>false
                    	   	);
        }
	}

	/*
	-----------------------------------------------------------------------------------
    Author: SNEHAL KULKARNI               Date: 26 March 2021
    -----------------------------------------------------------------------------------
	Purpose: Validations for Batch Fees
	*/
	public function validationSpeedPassage($details,$flag)
	{
		$this->form_validation->set_error_delimiters('','');
		$this->form_validation->set_data(
        array(
        	'batch_fees_id'=>isset($details['batch_fees_id']) ? $details['batch_fees_id'] :'',
        	'batch_id'=>isset($details['batch_id']) ? $details['batch_id'] :'',
         	'minimum_student'=>isset($details['minimum_student']) ? $details['minimum_student'] :'',
         	'maximum_student'=>isset($details['maximum_student']) ? $details['maximum_student'] :'',
         	'minimum_fees'=>isset($details['minimum_fees']) ? $details['minimum_fees'] :'',
         	'maximum_fees'=>isset($details['maximum_fees']) ? $details['maximum_fees'] :''
		));

		if(!empty($details['batch_fees_id']))
		{
			$flag = 1;
		}
		else
		{
			$flag = 0;
		}

        $this->form_validation->set_rules('batch_fees_id','batch_fees_id', array('min_length[1]','max_length[10]',"regex_match[/^[0-9]*$/]"),
		array(
       			'min_length'=>'batch_fees_id Min 1 Number Required.',
				'max_length'=>'batch_fees _id Max 10 Number allowed.',
				'regex_match'=>'batch_fees_id Should Have Only Numbers'
             ));
        if(0 == $flag)
        {
        	$this->form_validation->set_rules('batch_id','batch_id',array('required','min_length[1]','max_length[10]',"regex_match[/^[0-9]*$/]"),
			array(
					'required'=>'batch_id is Required',
					'min_length'=>'In batch_id Field Min 1 Number Required.',
					'max_length'=>'In batch_id Field Maximum 10 Numberss are Allowed.',
					'regex_match'=>'batch_id Should Have Only Numbers'				
				  ));
	        $batch_id = $details['batch_id'];
	        $flag1 = $this->standard_model->check_is_unique('tbl_batch_fees','batch_id',$batch_id);	
        }
        else
        {
        	$this->form_validation->set_rules('batch_id','batch_id',array('required','min_length[1]','max_length[10]',"regex_match[/^[0-9]*$/]"),
			array(
					'required'=>'batch_id is Required',
					'min_length'=>'In batch_id Field Min 1 Number Required.',
					'max_length'=>'In batch_id Field Maximum 10 Numberss are Allowed.',
					'regex_match'=>'batch_id Should Have Only Numbers'				
				  ));
        	$flag1=true;
        }
        
		$this->form_validation->set_rules('minimum_student','minimum_student',array('required','min_length[1]','max_length[10]',"regex_match[/^[0-9]*$/]"),
		array(
				'required'=>'Minimum Student is Required',
				'min_length'=>'In Minimum Student Field Min 1 Number Required.',
				'max_length'=>'In Minimum Student Field Maximum 10 Characters are Allowed.',
				'regex_match'=>'Minimum Student Should Have Only Numbers'
			  ));
		$this->form_validation->set_rules('maximum_student','maximum_student',array('required','min_length[1]','max_length[10]',"regex_match[/^[0-9]*$/]"),
		array(
				'required'=>'Maximum Student is Required',
				'min_length'=>'In Maximum Student Field Min 1 Number Required.',
				'max_length'=>'In Maximum Student Field Maximum 10 Characters are Allowed.',
				'regex_match'=>'Maximum Student Should Have Only Numbers'
			  ));
		$this->form_validation->set_rules('minimum_fees','minimum_fees',array('required','max_length[15]','regex_match[/^(?!,$)[\d,.]+$/]'),
		array(
				'required'=>'Minimum Fees Required!',
				'max_length'=>'In Minimum Fees Field Maximum 15 Characters are Allowed.',
				'regex_match'=>'Only Numbers and special characters ., ar allowed in Minimum Fees !'
			  ));
		$this->form_validation->set_rules('maximum_fees','maximum_fees',array('required','max_length[15]','regex_match[/^(?!,$)[\d,.]+$/]'),
		array(
				'required'=>'Maximum Fees Required!',
				'max_length'=>'In Maximum Fees Field Maximum 15 Characters are Allowed.',
				'regex_match'=>'Only Numbers and special characters ., ar allowed in Maximum Fees !'
			  ));
        
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

	/*
    -----------------------------------------------------------------------------------
    Author: SNEHAL KULKARNI             Date: 26 March 2021
    -----------------------------------------------------------------------------------
    Purpose: Get Batch Fees Details
    parameter:none,all,batch_fees_id
	Response:return array(
                  			{
							    "msg": "Record Found!",
							    "state": true,
							    "details": [
							        {
							            "batch_fees_id": "1",
							            "batch_id": "2nWpd",
							            "minimum_student": "11",
							            "maximum_student": "20",
							            "minimum_fees": "10000",
							            "maximum_fees": "20000",
							            "inserted_by": "1",
							            "inserted_on": "2021-03-26 12:12:35",
							            "modified_by": "1",
							            "modified_on": "2021-03-26 12:18:12",
							            "in_use": "Y",
							            "display": "Y"
							        }
							    ]
							}
						);
	*/

	public function _get_batch_fees($details=array())
	{
		$details = $this->decryptArray($details);
		$results = $this->batch_fees_model->fetch_batch_fees($details);
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
			$result= $this->encryptArray($details);
        }
        else
        {
        	$result1= $this->encryptArray($details);
            if(isset($result1['batch_fees_id'])) 
        	{
             return array(
                  'msg'=>'Record not Found!',
                  'state'=>false,
                  'details'=>$result1['batch_fees_id']
                  );
        	}
        	else
        	{
        		return array(
                  'msg'=>'Record not Found!',
                  'state'=>false
                  );
        	}
        }
	}

	/*
    -----------------------------------------------------------------------------------
    Author: SNEHAL KULKARNI             Date: 26 March 2021
    -----------------------------------------------------------------------------------
    Purpose: Hide Batch Fees Details
    parameter:batch_fees_id
	Response:return array(
		         			{
							    "state": true,
							    "msg": "Batch Fees Hidden!",
							    "details": [
							        {
							            "batch_fees_id": "1",
							            "batch_id": "2nWpd",
							            "minimum_student": "11",
							            "maximum_student": "20",
							            "minimum_fees": "10000",
							            "maximum_fees": "20000",
							            "modified_by": "1",
							            "modified_on": "2021-03-26 12:25:43",
							            "inserted_by": "1",
							            "inserted_on": "2021-03-26 12:12:35",
							            "display": "Y",
							            "in_use": "N"
							        }
							    ]
							}
		         		);
	*/
	public function _hide_batch_fees($details=array())
	{
		$details=$this->decryptArray($details);
        $table_name='tbl_batch_fees';
        $primary_key='batch_fees_id';
        $data=$this->standard_model->hide_table_details($details,$primary_key,$table_name);
        $resdata = $this->batch_fees_model->getIdDetails($details,$table_name,$primary_key);
			if($resdata)
			{
				$data=array();
		      	foreach ($resdata as $result)
		        {
		            $data[] = (array)$result;  
		        }    
		     	if(isset($data) && is_array($data))
		        {
		         	$result = $this->encryptArray($data);
		        }
		        return array(
		                 	 'state'=>true,
		                 	 'msg'=>'Batch Fees Hidden!',
		                 	 'details'=>$result
						    );
			}
			else
			{
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide Batch Fees!';
				return array(
							'state'=>false,
							'msg'=>$message,
							'details'=>false
			    			);
			}
	}

	/*
    -----------------------------------------------------------------------------------
    Author: SNEHAL KULKARNI             Date: 26 March 2021
    -----------------------------------------------------------------------------------
    Purpose: Restored Batch Fees Details
    parameter:batch_fees_id
	Response:return array(
		         			{
							    "state": true,
							    "msg": "Batch Fees Restored!",
							    "details": [
							        {
							            "batch_fees_id": "1",
							            "batch_id": "2nWpd",
							            "minimum_student": "11",
							            "maximum_student": "20",
							            "minimum_fees": "10000",
							            "maximum_fees": "20000",
							            "modified_by": "1",
							            "modified_on": "2021-03-26 12:27:21",
							            "inserted_by": "1",
							            "inserted_on": "2021-03-26 12:12:35",
							            "display": "Y",
							            "in_use": "Y"
							        }
							    ]
							}
		         			);
	*/
	public function _restore_batch_fees($details=array())
	{
		$details=$this->decryptArray($details);
        $table_name='tbl_batch_fees';
        $primary_key='batch_fees_id';
        $data=$this->standard_model->restore_table_details($details,$primary_key,$table_name);
        $resdata = $this->batch_fees_model->getIdDetails($details,$table_name,$primary_key);
			if($resdata)
			{
					$data=array();
		            foreach ($resdata as $result)
		            {
		                $data[] = (array)$result;  
		            }
		            if(isset($data) && is_array($data)){
		            $result = $this->encryptArray($data);
		            }
		            return array(
		                 		 'state'=>true,
		                 		 'msg'=>'Batch Fees Restored!',
		                 		 'details'=>$result
								);
			}
			else
			{
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Restore Batch Fees';
				return array(
							'state'=>false,
							'msg'=>$message,
							'details'=>false
			    			);
			}
	}

	/*
    -----------------------------------------------------------------------------------
    Author: SNEHAL KULKARNI             Date: 26 March 2021
    -----------------------------------------------------------------------------------
    Purpose: Delete Batch Fees
    parameter:batch_fees_id
	Response: return array(
							{
							    "msg": "Batch Fees Deleted!",
							    "state": true,
							    "details": {
							        "batch_fees_id": "7yPXy"
							    }
							}
							);
	*/
	public function _delete_batch_fees($details=array())
	{  
		$details = $this->decryptArray($details);
		if(isset($details['batch_fees_id']))
		{    
			$id=$details['batch_fees_id'];
		    $batch_fees=array(
							'display'=>'N',
							);
			$results = $this->standard_model->updateRecord('tbl_batch_fees','batch_fees_id',$id,$batch_fees);
			if($results)
			{
				$results = $this->encryptArray($details);
				return array(
							'state'=>true,
							'msg'=>'Batch Fees Record Deleted!',
							'details'=>$results
							);
			}
			else
			{
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Delete Batch Fees Record!';
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
			'msg'=>'batch_fees_id Required!',
			);
		}
	}
}