<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upcoming_batch_api extends Base_Controller 
{
    public function __construct()
  	{
		parent::__construct();
		$this->load->model('standard/standard_model');
	}

    /*
	=================================================================================
    Author:Apurva Bandelwar                        Date:14/12/2021
	=================================================================================
	Purpose: Save Upcoming batch master THIS METHOD USED ONLY
	return array(
			'state'=>TRUE,
			'msg'=>'Upcoming batch Master added!',
			'details'=>$details
		);
    */
    public function _set_upcoming_batch($details=false)
	{
	  	$validation_error='';
		$details = $this->decryptArray($details);
	
		if(isset($details['upcoming_batch_id']) && !empty($details['upcoming_batch_id']))
		{
			$flag=1;
		}
		else
		{
			$flag=0;
		}
        if($this->validationupcomingBatch($details))
		{
			if($details)
            { 
                $user_id= $this->session->userdata('user_id');								
				$upcoming_batch = array(
					'upcoming_batch_id'=>isset($details['upcoming_batch_id'])?$details['upcoming_batch_id']:NULL,				
					'batch_id'=>$details['batch_id'],
					'user_id'=>$details['user_id'],				
					'modified_by'=>$user_id,
					'modified_on'=>date('Y-m-d H:i:s')
				);
				
    			$error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
				if($flag==0)
				{
					$upcoming_batch['inserted_by']=$user_id;
					$upcoming_batch['inserted_on']=date('Y-m-d H:i:s');
					$upcoming_batch['display']='Y';
					$upcoming_batch['in_use']='Y';
					$upcoming_batch_id= $this->standard_model->single_insert('tbl_upcoming_batch',$upcoming_batch);
					if($error_msg && !empty($error_msg) )
					{                                                       
						return array(
							'state'=>false,
							'msg'=>'Unable to Add Upcoming Batch!',
							'details'=>$error_msg
						);
					}
					else
					{   
						if(false == $upcoming_batch_id)
						{
							$error_msg = 'Record already Exist in The DB, Only First Time Record Inserted';
							return array(
								'state'=>false,
								'msg'=>'Unable to Add Upcoming Batch!',
								'details'=>$error_msg
							);
						}
						else
						{
							$upcoming_batch['upcoming_batch_id']=$upcoming_batch_id;
							$upcoming_batch= $this->encryptArray($upcoming_batch);
							return array(
								'state'=>true,
								'msg'=>'Upcoming Batch Added Successfully!',
								'details'=>$upcoming_batch
							);
						}
						
					}
				}
				else
				{					
					$upcoming_batch_id= $this->standard_model->single_insert('tbl_upcoming_batch',$upcoming_batch);
					if($error_msg && !empty($error_msg) )
					{                                                       
						return array(
							'state'=>false,
							'msg'=>'Unable to Update Upcoming Batch!',
							'details'=>$error_msg
							);
					}
					else
					{
						$upcoming_batch['upcoming_batch_id']=$upcoming_batch_id;
						$upcoming_batch= $this->encryptArray($upcoming_batch);        		
						return array(
							'state'=>true,
							'msg'=>'Upcoming Batch Updated Successfully!',
							'details'=>$upcoming_batch
							);
					}
				}  
            }
            else
            {
                return array(
                'state'=>False,
                'msg'=>'Upcoming Batch Failed to Saved!',
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
	Author:Apurva Bandelwar                       Date:14/12/2021
	=================================================================================
	Purpose: validation for Upcoming Batch
	*/
	function validationupcomingBatch($details)
    {
        $this->form_validation->set_error_delimiters('','');
        $this->form_validation->set_data(
            array(
                'upcoming_batch_id'=>isset($details['upcoming_batch_id']) ? $details['upcoming_batch_id'] :'',
                'batch_id'=>isset($details['batch_id']) ? $details['batch_id'] :'',                
            )
        ); 
        $this->form_validation->set_rules('upcoming_batch_id', 'upcoming_batch_id', array('min_length[1]','max_length[11]',"regex_match[/^([0-9][0-9]{0,10})$/]"),
            array(                                                                                      
                'min_length'=>'upcoming_batch_id Min 1 Number Required.',
                'max_length'=>'upcoming_batch_id Max 11 Number allowed.',
                'regex_match'=>'upcoming_batch_id Should Have Only Numbers'
            )
        );

		$this->form_validation->set_rules('batch_id', 'batch_id', array('min_length[1]','max_length[11]',"regex_match[/^([0-9][0-9]{0,10})$/]"),
            array(                                                                                      
                'min_length'=>'upcoming_batch_id Min 1 Number Required.',
                'max_length'=>'upcoming_batch_id Max 11 Number allowed.',
                'regex_match'=>'upcoming_batch_id Should Have Only Numbers'
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
    Author:Apurva Bandelwar                     Date:14/12/2021
    =================================================================================
	Purpose: Get Upcoming Batch
	return array(
	 	'state'=>TRUE,
		'msg'=>'Records Found!',
	 	'details'=>array(
	 		array(
	 		"upcoming_batch_id": "7yPXy",
            "batch_id": "2nWpd",
            "user_id": "71APy",
            "in_use": "Y",
            "display": "Y",
            "inserted_by": "1",
            "inserted_on": "2021-11-20 16:38:29",
            "modified_by": "1",
            "modified_on": "2021-11-20 16:38:29"
	 		)
	 	)
	 );
    */
	public function _get_upcoming_batch($details=false)
    {
		$details = $this->decryptArray($details);
		if(isset($details['all']))
        {
            $results = $this->standard_model->selectAll('tbl_upcoming_batch');
		}
		else if(isset($details['upcoming_batch_id']))
        {
            $results = $this->standard_model->selectAllWhr('tbl_upcoming_batch','upcoming_batch_id',$details['upcoming_batch_id']);
        }
        else
        {
            $results = $this->standard_model->selectAll('tbl_upcoming_batch','in_use','Y');
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
}