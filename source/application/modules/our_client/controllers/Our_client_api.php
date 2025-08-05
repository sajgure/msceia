<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Our_client_api extends Base_Controller 
{
    public function __construct()
  	{  
		parent::__construct();
		$this->load->model('standard/standard_model');
	}
	/*    
    =================================================================================
    Author:Mrudul Thite                 Date:29/2/2020
    =================================================================================
	Purpose: Get list for our_client 
	return array(
	 	'state'=>TRUE,
		'msg'=>'Records Found!',  
	 	'details'=>array(
	 		array(
	 		"our_client_id":"1",
            "our_client_name":"English 30 WPM",
            "our_client_desc": "Computer Typing English 30 WPM"
	 		)
	 	)
	 );
    */
	public function _get_our_client($details=false)
    {
		$details = $this->decryptArray($details);
		if(isset($details['our_client_id']))
		{
		 $results = $this->standard_model->alljoin2tbl_whr('tbl_our_client','tbl_our_client','our_client_id','our_client_id',$details['our_client_id']);
		}
		else if(isset($details['all'])){
		$results= $this->standard_model->selectAllJoin('tbl_our_client','tbl_our_client','our_client_id');
		}
		else {
		$results= $this->standard_model->selectAllJoin('tbl_our_client','tbl_our_client','our_client_id','in_use','Y');
		}
        if($results)
        {
        	$data=array();
                foreach ($results as $result)
                {
                  $data[] = (array)$result;  
                }
                if(isset($data) && is_array($data)){
                $result = $this->encryptArray($data);
                 }
            return array(
                  'msg'=>'Records found!',
                  'state'=>true,
                  'details'=>$result
			);
			$result= $this->encryptArray($result);
        }
        else
        {
             return array(
                  'msg'=>'No record found!',
                  'state'=>false,
                  'details'=>$details['our_client_id']
            );
        }
	}
	/*
	=================================================================================
    Author:Mrudul Thite                 Date:29/2/2020
	=================================================================================
	Purpose: Save our_client
	return array(
			'state'=>TRUE,
			'msg'=>'New our_client added!',
			'details'=>$details
		);
    */
    public function _set_our_client($details=false)
	{
	  	$validation_error='';
        $details = $this->decryptArray($details);
        if(isset($details['our_client_id']) && !empty($details['our_client_id']))
			{
				$results = $this->standard_model->selectAllWhr('tbl_our_client','our_client_id',$details['our_client_id']); 
	            if(!empty($results))
				{
				$flag=1;
				}
				else
				{
					return array(
                            'state'=>false,
                            'msg'=>'our_client_id not exit!',
                            'details'=>false
                            );
			
				
				}	
			
			
		}
		else
		{
		 $flag=0;	
		}
        if($this->validation_our_client_details($details))
	    {
            if($details)
            {
                $user_id= $this->session->userdata('user_id');
                $our_client = array(
                          'name' =>$details['name'],
                          'logo' =>$details['logo'],
                          'link' =>$details['link'],
                          'modified_by'=>$user_id,
                          'modified_on'=>date('Y-m-d H:i:s'),
                          'our_client_id'=>isset($details['our_client_id'])?$details['our_client_id']:'');
                // if(!isset($details['our_client_id']) && empty($details['our_client_id']))
                // {
                //     $our_client['inserted_by']=1;
                //     $our_client['inserted_on']=date('Y-m-d H:i:s');
                // }
                // $our_client_id = $this->standard_model->single_insert('tbl_our_client',$our_client);
                // $our_client['our_client_id']=$our_client_id;
                // $our_client= $this->encryptArray($our_client);
                // if($flag==0)
                // {
                // return array(
                //             'state'=>true,
                //             'msg'=>'New client added!',
                //             'details'=>$our_client
                //             );
                // }else
                // {
                // return array(
                //             'state'=>true,
                //             'msg'=>'Client updated!',
                //             'details'=>$our_client
                //             );
                // }
                $error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
				if($flag==0)
				{
					$our_client['inserted_by']=$user_id;
					$our_client['inserted_on']=date('Y-m-d H:i:s');
					$our_client['display']='Y';
					$our_client['in_use']='Y';
					$our_client_id= $this->standard_model->single_insert('tbl_our_client',$our_client);
					if($error_msg && !empty($error_msg) )
					{                                                       
						return array(
							'state'=>false,
							'msg'=>'Unable to Add Our Client!',
							'details'=>$error_msg
						);
					}
					else
					{
						$our_client['our_client_id']=$our_client_id;
						$our_client= $this->encryptArray($our_client);
						return array(
							'state'=>true,
							'msg'=>'New Client Added Successfully!',
							'details'=>$our_client
						);
					}
				}
				else
				{													
					$our_client_id= $this->standard_model->single_insert('tbl_our_client',$our_client);
					if($error_msg && !empty($error_msg) )
					{                                                       
						return array(
							'state'=>false,
							'msg'=>'Unable to Update Our Client!',
							'details'=>$error_msg
							);
					}
					else
					{
						$our_client['our_client_id']=$our_client_id;
						$our_client= $this->encryptArray($our_client);        		
						return array(
							'state'=>true,
							'msg'=>'Our Client Updated Successfully!',
							'details'=>$our_client
							);
					}
				}   
            }
            else
            {
                return array(
                'state'=>False,
                'msg'=>'our_client_ Failed to Saved!',
                'details'=>false
                );
            }
        }
		else
		{
			$validation_error = validation_errors();
			if(""==$validation_error)
          	{
            	$validation_error = "Duplicate Entry For Name";
          	}
			return array(
			'state'=>False,
			'details'=>$validation_error,
			'msg'=>'Validation is failed'
			);
		}	
    }
    /*
	=================================================================================
	Author:Mrudul Thite                 Date:29/2/2020
	=================================================================================
	Purpose: validation for our_client
	*/
	function validation_our_client_details($details)
    {
	 	$this->form_validation->set_error_delimiters('','');
	 	if(isset($details['our_client_id']) && !empty($details['our_client_id']))
    {
      $flag=1;
    }
    else
    {
      $flag=0;
    }
		$this->form_validation->set_data(
		array(
			'our_client_id'=>isset($details['our_client_id']) ? $details['our_client_id'] :'',
            'name'=>isset($details['name']) ? $details['name'] :'',
            'link'=>isset($details['link']) ? $details['link'] :'',
            'logo'=>isset($details['logo']) ? $details['logo'] :''
		)
		); 
		 if(isset($details['our_client_id']) && $details['our_client_id'] !='' ){
		$this->form_validation->set_rules('our_client_id','our_client_id', array('min_length[1]','max_length[5]',"regex_match[/^([0-9][0-9]{0,4})$/]"),
		array(    
			'min_length'=>'Min 2 Number Required.',
			'max_length'=>'Max 5 Number allowed.',
			'regex_match'=>'our_client_id Should Have Only Numbers'
		)
		);
		}else{
            
        }  
		if($flag==0)
		{
			$this->form_validation->set_rules('name', 'name',array('required','min_length[2]','max_length[200]','regex_match[/^([A-Z0-9a-z][A-Z0-9a-z\(\)\&\-\.\,\/\_\"\|\$\ :\;\s]{1,99})$/]'),
  				array(
                'required'=>'name is Required',
                'min_length'=>'Min 2 char required.',
                'max_length'=>'Max 200 char allowed.',
				'regex_match'=>'Only alphanumeric and special char & ( ) . , / - _ $ & are allowed for name'
                
          	));
          	$name = $details['name'];
        	$flag1 = $this->standard_model->check_is_unique('tbl_our_client','name',$name);
       }else{
       	$this->form_validation->set_rules('name','name',array('required','min_length[2]','max_length[200]','regex_match[/^([A-Z0-9a-z][A-Z0-9a-z\(\)\&\-\.\,\/\_\"\|\$\ :\;\s]{1,99})$/]'),
                                                                                                  
  			array(
                'required'=>'course name is Required',
                'min_length'=>'Min 2 char required.',
                'max_length'=>'Max 200 char allowed.',
                'regex_match'=>'Only alphanumeric and special char & ( ) . , / - _ $ & are allowed for name'
              
          ));
       }
		$this->form_validation->set_rules('link', 'link',
			array('required','regex_match[/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[A-Za-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/]'),
                                                                                                                
          	array(
                'required'=>'link is Required',
                'regex_match'=>'format should be proper'
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
	=================================================================================
	 Author:Mrudul Thite                 Date:29/2/2020
	=================================================================================
	Purpose: Hide our_client
	return array(
	 		'state'=>TRUE,
	 		'msg'=>'our_client hidden!',
	 		'details'=>$details
	 	);
	*/
	public function _hide_our_client($details=false)
	{
		$details = $this->decryptArray($details);			
		if(isset($details['our_client_id']))
		{
			$id=$details['our_client_id'];
			$our_client=array(
				'in_use'=>'N',
			);
			$results = $this->standard_model->updateRecord('tbl_our_client','our_client_id',$id,$our_client);
			$resdata = $this->standard_model->selectAllWhr('tbl_our_client','our_client_id',$details['our_client_id']);
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
	                      'msg'=>'Record Hide Successfully!',
	                      'details'=>$result
	                );
	      	}
			else
			{
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide our_client';
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
			'msg'=>'our_client_id Required!',
			);
		}
	}
	/*
	=================================================================================
	Author:Mrudul Thite                 Date:29/2/2020
	=================================================================================
	Purpose: Restore our_client
	return array(
		'state'=>TRUE,
		'msg'=>'our_client restored!',
		'details'=>$details
	);
	*/
	public function _restore_our_client($details=false)
	{
		$details = $this->decryptArray($details);			
		if(isset($details['our_client_id']))
		{	
		    $id=$details['our_client_id'];
			$our_client=array(
				'in_use'=>'Y',
			);
			$results = $this->standard_model->updateRecord('tbl_our_client','our_client_id',$id,$our_client);
			$resdata = $this->standard_model->selectAllWhr('tbl_our_client','our_client_id',$details['our_client_id']);
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
	                      'msg'=>'Record Restore Successfully!',
	                      'details'=>$result
	                );
	      	}
			else
			{
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Restore our_client';
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
			'msg'=>'our_client_id Required!',
			);
		}
	}
	/*
	=================================================================================
	Author:Mrudul Thite                 Date:29/2/2020
	=================================================================================
	Purpose:Delete our_client
	/*return array(
		'state'=>TRUE,
		'msg'=>'our_client deleted!',
		'details'=>$details
	);
	*/
	public function _permanent_delete_our_client($details=null)
	{  
		$details = $this->decryptArray($details);
		if(isset($details['our_client_id']))
		{    
			
			$id=$details['our_client_id'];
			 
			$our_client=array(
					'display'=>'N',
				);
			$results = $this->standard_model->updateRecord('tbl_our_client','our_client_id',$id,$our_client);
			if($results)
			{
			    $results = $this->encryptArray($details);
				return array(
					'state'=>true,
					'msg'=>'Record Deleted Successfully!',
					'details'=>$results
				);
			}
			else
			{
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Delete our_client';
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
			'msg'=>'our_client_id Required!',
			);
		}
	}
}