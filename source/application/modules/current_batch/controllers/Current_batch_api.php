<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Current_batch_api extends Base_Controller 
{
    public function __construct()
  	{
		parent::__construct();
		$this->load->model('standard/standard_model');
	}

    /*
	=================================================================================
    Author:Tukaram Gavade                        Date:20/11/2021
	=================================================================================
	Purpose: Save current batch master THIS METHOD USED ONLY
	return array(
			'state'=>TRUE,
			'msg'=>'Current batch Master added!',
			'details'=>$details
		);
    */
    public function _set_current_batch($details=false)
	{
	  	$validation_error='';
		$details = $this->decryptArray($details);
	
		if(isset($details['current_batch_id']) && !empty($details['current_batch_id']))
		{
			$flag=1;
		}
		else
		{
			$flag=0;
		}
        if($this->validationCurrentBatch($details))
		{
			if($details)
            { 
			
                $user_id= $this->session->userdata('user_id');								
				$currentBatch = array(
					'current_batch_id'=>isset($details['current_batch_id'])?$details['current_batch_id']:NULL,				
					'batch_id'=>$details['batch_id'],
					'user_id'=>$details['user_id'],				
					'modified_by'=>1,
					'modified_on'=>date('Y-m-d H:i:s')
				);
				
    			$error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
				if($flag==0)
				{
					$currentBatch['inserted_by']=1;
					$currentBatch['inserted_on']=date('Y-m-d H:i:s');
					$currentBatch['display']='Y';
					$currentBatch['in_use']='Y';
					$current_batch_id= $this->standard_model->once_insert_multitime_update('tbl_current_batch',$currentBatch);
					
					if($error_msg && !empty($error_msg) )
					{                                                       
						return array(
							'state'=>false,
							'msg'=>'Unable to Add Current Batch!',
							'details'=>$error_msg
						);
					}
					else
					{   
						if(false == $current_batch_id)
						{
							$error_msg = 'Record already Exist in The DB, Only First Time Record Inserted';
							return array(
								'state'=>false,
								'msg'=>'Unable to Add Current Batch!',
								'details'=>$error_msg
							);
						}
						else
						{
							$currentBatch['current_batch_id']=$current_batch_id;
							$currentBatch= $this->encryptArray($currentBatch);
							return array(
								'state'=>true,
								'msg'=>'Current Batch Added Successfully!',
								'details'=>$currentBatch
							);
						}
						
					}
				}
				else
				{													
					$current_batch_id= $this->standard_model->single_insert('tbl_current_batch',$currentBatch);
					if($error_msg && !empty($error_msg) )
					{                                                       
						return array(
							'state'=>false,
							'msg'=>'Unable to Update Current Batch!',
							'details'=>$error_msg
							);
					}
					else
					{
						$currentBatch['current_batch_id']=$current_batch_id;
						$currentBatch= $this->encryptArray($currentBatch);        		
						return array(
							'state'=>true,
							'msg'=>'Current Batch Updated Successfully!',
							'details'=>$currentBatch
							);
					}
				}  
            }
            else
            {
                return array(
                'state'=>False,
                'msg'=>'Current Batch Failed to Saved!',
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
	Author:Tukaram Gavade                       Date:20/11/2021
	=================================================================================
	Purpose: validation for Current Batch
	*/
	function validationCurrentBatch($details)
    {
        $this->form_validation->set_error_delimiters('','');
        $this->form_validation->set_data(
            array(
                'current_batch_id'=>isset($details['current_batch_id']) ? $details['current_batch_id'] :'',
                'batch_id'=>isset($details['batch_id']) ? $details['batch_id'] :'',                
            )
        ); 
        $this->form_validation->set_rules('current_batch_id', 'current_batch_id', array('min_length[1]','max_length[11]',"regex_match[/^([0-9][0-9]{0,10})$/]"),
            array(                                                                                      
                'min_length'=>'fees_exemption_id Min 1 Number Required.',
                'max_length'=>'fees_exemption_id Max 11 Number allowed.',
                'regex_match'=>'fees_exemption_id Should Have Only Numbers'
            )
        );

		$this->form_validation->set_rules('batch_id', 'batch_id', array('min_length[1]','max_length[11]',"regex_match[/^([0-9][0-9]{0,10})$/]"),
            array(                                                                                      
                'min_length'=>'fees_exemption_id Min 1 Number Required.',
                'max_length'=>'fees_exemption_id Max 11 Number allowed.',
                'regex_match'=>'fees_exemption_id Should Have Only Numbers'
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
    Author:Tukaram Gavade                     Date:20/11/2021
    =================================================================================
	Purpose: Get Current Batch
	return array(
	 	'state'=>TRUE,
		'msg'=>'Records Found!',
	 	'details'=>array(
	 		array(
	 		"current_batch_id": "7yPXy",
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
	public function _get_current_batch($details=false)
    {
		$details = $this->decryptArray($details);
		if(isset($details['all']))
        {
            $results = $this->standard_model->selectAll('tbl_current_batch');
		}
		else if(isset($details['current_batch_id']))
        {
            $results = $this->standard_model->selectAllWhr('tbl_current_batch','current_batch_id',$details['current_batch_id']);
        }
        else
        {
            $results = $this->standard_model->selectAll('tbl_current_batch','in_use','Y');
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
	Author:Tukaram  Gavade                        Date:20/11/2021
	=================================================================================
	Purpose: Hide current batch
	return array(
			'state'=>TRUE,
			'msg'=>'Current Batch hidden!',
			'details'=>$details
		);
	*/
	public function _hide_current_batch($details=false)
	{
		$details = $this->decryptArray($details);
		if(isset($details['current_batch_id']))
	    {
			$id=$details['current_batch_id'];
			// $details = $this->decryptArray($details);
			$currentBatch=array(
				'in_use'=>'N',
			);
			$results = $this->standard_model->updateRecord('tbl_current_batch','current_batch_id',$id,$currentBatch);
			if($results)
			{
				$fetchdata = $this->standard_model->selectAllWhr('tbl_current_batch','current_batch_id',$details['current_batch_id']);
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
		        $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide Current Batch';
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
            'msg'=>'current_batch_id Required!',
		   );
	    }
	}

    /*
	=================================================================================
	Author:Tukaram Gavade                        Date:20/11/2021
	=================================================================================
	Purpose: Restore current Batch Master
	return array(
			'state'=>TRUE,
			'msg'=>'current Batch Master restored!',
			'details'=>$details
		);
	*/
	public function _restore_current_batch($details=false)
	{
		$details = $this->decryptArray($details);
		if(isset($details['current_batch_id']))
	    {
			$id=$details['current_batch_id'];
			// $details = $this->decryptArray($details);
			$currentBatch=array(
				'in_use'=>'Y',
			);
			$results = $this->standard_model->updateRecord('tbl_current_batch','current_batch_id',$id,$currentBatch);
			if($results)
			{
				$fetchdata = $this->standard_model->selectAllWhr('tbl_current_batch','current_batch_id',$details['current_batch_id']);
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
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Restore Fees exemption record';
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
			'msg'=>'current_batch_id Required!',
			'details'=>false
			);
		}
	}

    /*
	=================================================================================
	Author:Tukaram Gavade                           Date:19/11/2021
	=================================================================================
	Purpose:Delete gallery Master
		return array(
			'state'=>TRUE,
			'msg'=>'gallery Master deleted!',
			'details'=>$details
		);
	*/
	public function _delete_fees_exemption($details=null)
    {  
        $details = $this->decryptArray($details);
       
        if(isset($details['current_batch_id']))
        {    
            $id=$details['fees_exemption_id'];
            $feesExemption=array(
                'display'=>'N',
            );
            $results = $this->standard_model->updateRecord('tbl_current_batch','fees_exemption_id',$id,$feesExemption);
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
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Delete fees_exemption_record';
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
             'msg'=>'fees_exemption_id Required!',
             'details'=>false
            );
        }
    }
}