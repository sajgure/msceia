<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Voter_master_api extends Base_Controller 
{
    public function __construct()
  	{
		parent::__construct();
		$this->load->model('standard/standard_model');
	}

	public function _get_voter_master($details=false)
    {
		$details = $this->decryptArray($details);
       if(isset($details['voter_master_id'])){
		$results = $this->standard_model->selectAllWhr('tbl_voter_master','voter_master_id',$details['voter_master_id']);
	   }
	   else if(isset($details['all'])){
		$results= $this->standard_model->selectAll('tbl_voter_master');
	   }
	   else{
		$results=$this->standard_model->selectAll('tbl_voter_master','in_use','Y');
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

  public function _set_voter_master($details=false)
	{
	  	$validation_error='';
		$details = $this->decryptArray($details);
		if(isset($details['voter_master_id']) && !empty($details['voter_master_id']))
      	{
      		$flag=1;
      	}
      	else
      	{
      		$flag=0;
		}
		if($this->validationVoterMasterDetails($details))
		{
			if($details)
			{
				$user_id= $this->session->userdata('user_id');
				$voter_master = array(
					'voter_master_id'=>isset($details['voter_master_id'])?$details['voter_master_id']:NULL,	
					'voter_master_title'=>$details['voter_master_title'],
						'voter_master_description'=>$details['voter_master_description'],
						'voter_master_file'=>$details['voter_master_file'],
						'modified_by'=>1,
						'modified_on'=>date('Y-m-d H:i:s')
						);

				$error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
				if($flag==0)
				{
					$voter_master['inserted_by']=1;
					$voter_master['inserted_on']=date('Y-m-d H:i:s');
					$voter_master['display']='Y';
					$voter_master['in_use']='Y';
					$voter_master_id= $this->standard_model->single_insert('tbl_voter_master',$voter_master);
					if($error_msg && !empty($error_msg) )
					{                                                       
						return array(
							'state'=>false,
							'msg'=>'Unable to Add Voter Master!',
							'details'=>$error_msg
						);
					}
					else
					{
						$voter_master['voter_master_id']=$voter_master_id;
						$voter_master= $this->encryptArray($voter_master);
						return array(
							'state'=>true,
							'msg'=>'Voter Master Added Successfully!',
							'details'=>$voter_master
						);
					}
				}
				else
				{													
					$voter_master_id= $this->standard_model->single_insert('tbl_voter_master',$voter_master);
					if($error_msg && !empty($error_msg) )
					{                                                       
						return array(
							'state'=>false,
							'msg'=>'Unable to Update Voter Master!',
							'details'=>$error_msg
							);
					}
					else
					{
						$voter_master['voter_master_id']=$voter_master_id;
						$voter_master= $this->encryptArray($voter_master);        		
						return array(
							'state'=>true,
							'msg'=>'Voter Master Updated Successfully!',
							'details'=>$voter_master
							);
					}
				}   	
			}
			else
			{
				return array(
				'state'=>False,
				'msg'=>'Voter Master Failed to Saved!',
				'details'=>false
				);
			}
		}
		else
		{
			$validation_error= validation_errors();
			return array(
				'state'=>False,
				'details'=>'Validation Error',
				'msg'=>$validation_error
		
			);
		}
	}
	 /*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	Purpose: validation for Bank Master
	*/
	 function validationVoterMasterDetails($details)
    {
		$var1="'";
		$var2='"';
		$this->form_validation->set_error_delimiters('','');
        $this->form_validation->set_data(
        array(
			'voter_master_id'=>isset($details['voter_master_id']) ? $details['voter_master_id'] :'',
            'voter_master_title'=>isset($details['voter_master_title']) ? $details['voter_master_title'] :'',
			'voter_master_description'=>isset($details['voter_master_description']) ? $details['voter_master_description'] :'',
           	)
		); 
		$this->form_validation->set_rules('voter_master_id', 'voter_master_id', array('min_length[1]','max_length[11]',"regex_match[/^([0-9][0-9]{0,10})$/]"),
		array(    
		        'min_length'=>'voter_master_id Min 1 Number Required.',
				'max_length'=>'voter_master_id Max 11 Number allowed.',
				'regex_match'=>'voter_master_id Should Have Only Numbers'
		)
		);
		$this->form_validation->set_rules('voter_master_title','voter_master_title',array('required','min_length[2]','max_length[255]'/*,"regex_match[/^([A-Za-z0-9][A-Za-z0-9\,\(\)\-\'\/\@\!\.\*\_\"\:\;\&\|\s]{1,254})$/]"*/),
		array(
			    'required'=>'Voter Master Title Required.',
				'min_length'=>'Voter Master Title Min 2 Character Required.',
				'max_length'=>'Voter Master Title Max 255 Character Allowed.',
				/*'regex_match'=>'Voter Master Title  Should Have Only Alphanumeric charcter and Special Character ,'.$var1.' ( )'.$var2.' _- & / . ! @ \ : ; * | & Space are Allowed'*/
			)
        );
		$this->form_validation->set_rules('voter_master_description','voter_master_description',array('min_length[2]','max_length[1000]'),
		array(
			    'min_length'=>'Voter Master Description Min 2 Character Required.',
			   	'max_length'=>'Voter Master Description Max 500 Character Allowed.'				
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

	public function _hide_voter_master($details=false)
	{

        if(isset($details['voter_master_id']))
		{
			$details = $this->decryptArray($details);
			$id=$details['voter_master_id'];
			// $details = $this->decryptArray($details);
			$voter_master=array(
				'in_use'=>'N',
			);
			$results = $this->standard_model->updateRecord('tbl_voter_master','voter_master_id',$id,$voter_master);
			if($results)
			{
				$fetchdata = $this->standard_model->selectAllWhr('tbl_voter_master','voter_master_id',$details['voter_master_id']);
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
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide Voter Master!';
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
		   'msg'=>'voter_master_id Required!',
		    );
	    }
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:29/02/2020
	=================================================================================
	Purpose: Restore Voter Master
	return array(
			'state'=>TRUE,
			'msg'=>'Voter Master restored!',
			'details'=>$details
		);
	*/
	public function _restore_voter_master($details=false)
	{
		if(isset($details['voter_master_id']))
		{
			$details = $this->decryptArray($details);
			$id=$details['voter_master_id'];
			// $details = $this->decryptArray($details);
			$voter_master=array(
				'in_use'=>'Y',
			);
			$results = $this->standard_model->updateRecord('tbl_voter_master','voter_master_id',$id,$voter_master);
			if($results)
			{
				$fetchdata = $this->standard_model->selectAllWhr('tbl_voter_master','voter_master_id',$details['voter_master_id']);
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
						$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Restore Voter Master!';
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
		   'msg'=>'voter_master_id Required!',
		    );
	    }
	}
    /*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:29/02/2020
	=================================================================================
	Purpose:Delete Voter Master
		/*return array(
			'state'=>TRUE,
			'msg'=>'Voter Master deleted!',
			'details'=>$details
		);
	*/
	 public function _delete_voter_master($details=null)
    {    
		$details = $this->decryptArray($details);
		if(isset($details['voter_master_id']))
		{ 
			$id=$details['voter_master_id'];
		
			$voter_master=array(
				'display'=>'N',
			);
			$results = $this->standard_model->updateRecord('tbl_voter_master','voter_master_id',$id,$voter_master);
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
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Delete Voter Master!';
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
		   'msg'=>'voter_master_id Required!',
		    );
	    }
	}
}