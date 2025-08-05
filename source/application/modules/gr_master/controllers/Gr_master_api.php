<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gr_master_api extends Base_Controller 
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
	Purpose: Get User gr master
	return array(
	 	'state'=>TRUE,
		'msg'=>'Records Found!',
	 	'details'=>array(
	 		array(
	 		"gr_master_id": "2",
            "gr_master_title": "gr master",
            "gr_master_description": "gr master",
            "gr_master_file": "gr.txt",
            "display": "Y",
            "in_use": "Y",
            "created_by": "1",
            "created_on": "2020-02-28 13:19:26",
            "modified_by": "1",
            "modified_on": "2020-02-28 13:19:26"
	 		)
	 	)
	 );
    */
	public function _get_gr_master($details=false)
    {
		$details = $this->decryptArray($details);
       if(isset($details['gr_master_id'])){
		$results = $this->standard_model->selectAllWhr('tbl_gr_master','gr_master_id',$details['gr_master_id']);
	   }
	   else if(isset($details['all'])){
		$results= $this->standard_model->selectAll('tbl_gr_master');
	   }
	   else{
		$results=$this->standard_model->selectAll('tbl_gr_master','in_use','Y');
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
	Purpose: Save user gr master
	return array(
			'state'=>TRUE,
			'msg'=>'New gr Master added!',
			'details'=>$details
		);
    */
    public function _set_gr_master($details=false)
	{
	  	$validation_error='';
		$details = $this->decryptArray($details);
		if(isset($details['gr_master_id']) && !empty($details['gr_master_id']))
      	{
      		$flag=1;
      	}
      	else
      	{
      		$flag=0;
		}
		if($this->validationGrMasterDetails($details))
		{
			if($details)
			{
				$user_id= $this->session->userdata('user_id');
				$gr_master = array(
					'gr_master_id'=>isset($details['gr_master_id'])?$details['gr_master_id']:NULL,	
					'gr_master_title'=>$details['gr_master_title'],
						'gr_master_description'=>$details['gr_master_description'],
						'gr_master_file'=>$details['gr_master_file'],
						'modified_by'=>1,
						'modified_on'=>date('Y-m-d H:i:s')
						);
				// // if(!isset($details['gr_master_id']) && empty($details['gr_master_id']))
				// // {
				// 	$gr_master['inserted_by']=1;
				// 	$gr_master['inserted_on']=date('Y-m-d H:i:s');
				// // }
				// $gr_master_id = $this->standard_model->single_insert('tbl_gr_master',$gr_master);
				// $gr_master['gr_master_id']=$gr_master_id;
				// $gr_master= $this->encryptArray($gr_master);
				// if(isset($details['gr_master_id']) && !empty($details['gr_master_id']))
				// {
				// return array(
				// 			'state'=>true,
				// 			'msg'=>'Update Record!',
				// 			'details'=>$gr_master
				// 			);
				// 		}
				// else{
				// 	return array(
				// 		'state'=>true,
				// 		'msg'=>'GR Master registered!',
				// 		'details'=>$gr_master
				// 		);
				// }
				$error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
				if($flag==0)
				{
					$gr_master['inserted_by']=1;
					$gr_master['inserted_on']=date('Y-m-d H:i:s');
					$gr_master['display']='Y';
					$gr_master['in_use']='Y';
					$gr_master_id= $this->standard_model->single_insert('tbl_gr_master',$gr_master);
					if($error_msg && !empty($error_msg) )
					{                                                       
						return array(
							'state'=>false,
							'msg'=>'Unable to Add Gr Master!',
							'details'=>$error_msg
						);
					}
					else
					{
						$gr_master['gr_master_id']=$gr_master_id;
						$gr_master= $this->encryptArray($gr_master);
						return array(
							'state'=>true,
							'msg'=>'GR Master Added Successfully!',
							'details'=>$gr_master
						);
					}
				}
				else
				{													
					$gr_master_id= $this->standard_model->single_insert('tbl_gr_master',$gr_master);
					if($error_msg && !empty($error_msg) )
					{                                                       
						return array(
							'state'=>false,
							'msg'=>'Unable to Update Gr Master!',
							'details'=>$error_msg
							);
					}
					else
					{
						$gr_master['gr_master_id']=$gr_master_id;
						$gr_master= $this->encryptArray($gr_master);        		
						return array(
							'state'=>true,
							'msg'=>'GR Master Updated Successfully!',
							'details'=>$gr_master
							);
					}
				}   	
			}
			else
			{
				return array(
				'state'=>False,
				'msg'=>'GR Master Failed to Saved!',
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
	 function validationGrMasterDetails($details)
    {
		$var1="'";
		$var2='"';
		$this->form_validation->set_error_delimiters('','');
        $this->form_validation->set_data(
        array(
			'gr_master_id'=>isset($details['gr_master_id']) ? $details['gr_master_id'] :'',
            'gr_master_title'=>isset($details['gr_master_title']) ? $details['gr_master_title'] :'',
			'gr_master_description'=>isset($details['gr_master_description']) ? $details['gr_master_description'] :'',
           	)
		); 
		$this->form_validation->set_rules('gr_master_id', 'gr_master_id', array('min_length[1]','max_length[11]',"regex_match[/^([0-9][0-9]{0,10})$/]"),
		array(    
		        'min_length'=>'gr_master_id Min 1 Number Required.',
				'max_length'=>'gr_master_id Max 11 Number allowed.',
				'regex_match'=>'gr_master_id Should Have Only Numbers'
		)
		);
		$this->form_validation->set_rules('gr_master_title','gr_master_title',array('required','min_length[2]','max_length[255]'/*,"regex_match[/^([A-Za-z0-9][A-Za-z0-9\,\(\)\-\'\/\@\!\.\*\_\"\:\;\&\|\s]{1,254})$/]"*/),
		array(
			    'required'=>'Gr Master Title Required.',
				'min_length'=>'Gr Master Title Min 2 Character Required.',
				'max_length'=>'Gr Master Title Max 255 Character Allowed.',
				/*'regex_match'=>'Gr Master Title  Should Have Only Alphanumeric charcter and Special Character ,'.$var1.' ( )'.$var2.' _- & / . ! @ \ : ; * | & Space are Allowed'*/
			)
        );
		$this->form_validation->set_rules('gr_master_description','gr_master_description',array('min_length[2]','max_length[1000]'),
		array(
			    'min_length'=>'Gr Master Description Min 2 Character Required.',
			   	'max_length'=>'Gr Master Description Max 500 Character Allowed.'				
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
	Author:Shubhangi Jagadale                        Date:29/02/2020
	=================================================================================
	Purpose: Hide Gr Master
	return array(
			'state'=>TRUE,
			'msg'=>'GR Master hidden!',
			'details'=>$details
		);
	*/
	public function _hide_gr_master($details=false)
	{

        if(isset($details['gr_master_id']))
		{
			$details = $this->decryptArray($details);
			$id=$details['gr_master_id'];
			// $details = $this->decryptArray($details);
			$gr_master=array(
				'in_use'=>'N',
			);
			$results = $this->standard_model->updateRecord('tbl_gr_master','gr_master_id',$id,$gr_master);
			if($results)
			{
				$fetchdata = $this->standard_model->selectAllWhr('tbl_gr_master','gr_master_id',$details['gr_master_id']);
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
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide GR Master!';
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
		   'msg'=>'gr_master_id Required!',
		    );
	    }
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:29/02/2020
	=================================================================================
	Purpose: Restore Gr Master
	return array(
			'state'=>TRUE,
			'msg'=>'GR Master restored!',
			'details'=>$details
		);
	*/
	public function _restore_gr_master($details=false)
	{
		if(isset($details['gr_master_id']))
		{
			$details = $this->decryptArray($details);
			$id=$details['gr_master_id'];
			// $details = $this->decryptArray($details);
			$gr_master=array(
				'in_use'=>'Y',
			);
			$results = $this->standard_model->updateRecord('tbl_gr_master','gr_master_id',$id,$gr_master);
			if($results)
			{
				$fetchdata = $this->standard_model->selectAllWhr('tbl_gr_master','gr_master_id',$details['gr_master_id']);
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
						$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Restore GR Master!';
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
		   'msg'=>'gr_master_id Required!',
		    );
	    }
	}
    /*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:29/02/2020
	=================================================================================
	Purpose:Delete Gr Master
		/*return array(
			'state'=>TRUE,
			'msg'=>'GR Master deleted!',
			'details'=>$details
		);
	*/
	 public function _delete_gr_master($details=null)
    {    
		$details = $this->decryptArray($details);
		if(isset($details['gr_master_id']))
		{ 
			$id=$details['gr_master_id'];
		
			$gr_master=array(
				'display'=>'N',
			);
			$results = $this->standard_model->updateRecord('tbl_gr_master','gr_master_id',$id,$gr_master);
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
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Delete GR Master!';
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
		   'msg'=>'gr_master_id Required!',
		    );
	    }
	}
}