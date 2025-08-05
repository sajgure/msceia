<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institute_activity_api extends Base_Controller 
{

  	public function __construct()
  	{
    	parent::__construct(); 

    	$this->load->model('standard/standard_model');      
  	}//construct close

  	/*
  	-------------------------------------------------------------
  	Author  : Archana Patil      Date: 19-11-2021
  	-------------------------------------------------------------
  	*/

  	function _getInstituteActivityData($details=false)
  	{
    	$details = $this->decryptArray($details);
    	if(isset($details['institute_activity_id']))
    	{
     		$id=$details['institute_activity_id']; 
      		$result = $this->standard_model->selectAllWhr('tbl_institute_activity','      institute_activity_id',$id);
    	}
    	elseif (isset($details['all'])) {
      		$result= $this->standard_model->selectAll('tbl_institute_activity');
    	}
    	else
    	{
      		$result= $this->standard_model->selectAll('tbl_institute_activity','in_use','Y');
    	}
    	
    	
    	if($result)
    	{
      		
    		$data=array();
    		foreach ($result as $results)
    		{
    			$data[] = (array)$results;
    		}
    		if(isset($data) && is_array($data))
    		{
                $results = $this->encryptArray($data);
            }
            return array(
                'msg'=>'Succesfully Fetch Record!',
                'state'=>true,
                'details'=>$results
            ); 

    	}
    	else
    	{
      		return array(
                'msg'=>'Unable Fetch Record!',
                'state'=>false,
                'details'=>false
            );
    	}
  	}// _getInstituteActivityData function close

  	/*
  	-------------------------------------------------------------
  	Author  : Archana Patil      Date: 19-11-2021
  	-------------------------------------------------------------
  	*/

	function _setInstituteActivityData($details = false)
	{
	  	//$details = $this->input->post();
	  	$details = $this->decryptArray($details);

      $user_id= $this->session->userdata('user_id'); 

	  	if($this->validation_form($details))
	    {
	    	
	  		if($details)
	      	{    	        	    
	  			if(empty($details['institute_activity_id']))
	  			{
	  				$data=array(
		  				'institute_activity_id'=>isset($details['institute_activity_id'])?$details['institute_activity_id']:NULL,	  				
		  				'constant' => $details['constant'],	  				
		  				'title' => $details['title'],
		                'description' => $details['description'],                          
		  				'in_use'=>'Y',  							
		  				'modified_by'=>$user_id,
		  				'modified_on'=>date('Y-m-d H:i:s'),
		  				'display'=>'Y'	                
		  			);
	  			}
	  			else
	  			{
	  				$data=array(
		  				'institute_activity_id'=>isset($details['institute_activity_id'])?$details['institute_activity_id']:NULL,		  					  				
		  				'title' => $details['title'],
		                'description' => $details['description'],                          
		  				'in_use'=>'Y',  							
		  				'modified_by'=>$user_id,
		  				'modified_on'=>date('Y-m-d H:i:s'),
		  				'display'=>'Y'	                
		  			);
	  			}
	  			  
	  			//print_r($data);	  			

	        	if(empty($details['institute_activity_id']))
        		{
          			$data['inserted_by']=$user_id;
          			$data['inserted_on']=date('Y-m-d H:i:s');
        		}          			 

	        	$institute_activity_id = $this->standard_model->single_insert('tbl_institute_activity',$data);
	        	$data['institute_activity_id']=$institute_activity_id;
	        	$data= $this->encryptArray($data);
	        	if(isset($details['institute_activity_id']) && !empty($details['institute_activity_id']))
	        	{
	          		return array(
	                    'state'=>true,
	                    'msg'=>'Institute Activity Records Updated Succesfully!',
	                    'details'=>$data
	                );
	        	} 
	        	else
	        	{
	          		return array(
	                    'state'=>true,
	                    'msg'=>'Institute Activity Registered Succesfully!',
	                    'details'=>$data
	                );
	        	}
	      	}
	      	else 
	      	{
	        	return array(
	                'state'=>False,
	                'msg'=>'Failed to Saved!',
	                'details'=>false
	            );
	      	}// details if-else close      
	   	}
	    else
	    {
	      	$validation_error = validation_errors();
          if(""==$validation_error)
          {
            $validation_error = "Duplicate Entry For Constant";
          }
	      	return array(
	            'state'=>False,
	            'msg'=>$validation_error,
	            'details'=>'Validation is failed'
	        );
	    } //validation if--else close
	}// _setInstituteActivityData function close

	/*
  -------------------------------------------------------------
  Author  : Archana Patil      Date: 19-11-2021
  -------------------------------------------------------------
  	*/

	public function _hideInstituteActivity($details=false)
  {
    
    	$details = $this->decryptArray($details); 
    	 	
    	if(isset($details['institute_activity_id']))
    	{
      		$id=$details['institute_activity_id'];  
      		$records= array('in_use'=>'N');
      		$result = $this->standard_model->updateRecord('tbl_institute_activity','institute_activity_id',$id,$records);
      		if($result)
      		{ 
        		$result = $this->encryptArray($details);
        		return array(
                    'state'=>true,
                    'msg'=>'Institute Activity Records Hidden!',
                    'details'=>$result
                );
      		}
      		else
      		{
        		$message = isset($this->standard_model->error )?$this->standard_model->error['message']:'Unable To Hide Institute Activity Records';
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
                'msg'=>'institute_activity_id Required!',
                'details'=>false
            );
    	}      
  }// _hideInstituteActivity function close

  	/*
  	-------------------------------------------------------------
  	Author  : Archana Patil      Date: 19-11-2021
  	-------------------------------------------------------------
  	*/

  	public function _retoreInstituteActivity($details=false)
  	{
    	$details = $this->decryptArray($details);
    	if(isset($details['institute_activity_id']))
    	{
      		$id=$details['institute_activity_id'];
      		$records= array('in_use'=>'Y');
      		$result = $this->standard_model->updateRecord('tbl_institute_activity','institute_activity_id',$id,$records);
      		if($result)
      		{
        		$result = $this->encryptArray($details);
        		return array(
                    'state'=>true,
                    'msg'=>'Institute Activity Records Restore!',
                    'details'=>$result
                );
      		}
      		else
      		{
        		$message = isset($this->standard_model->error )?$this->standard_model->error['message']:'Unable To Restore Institute Activity Records';
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
                'msg'=>'institute_activity_id Required!',
                'details'=>false
            );
    	}      
  	}// _retoreInstituteActivity function close

  	/*
  	-------------------------------------------------------------
  	Author  : Archana Patil      Date: 19-11-2021
  	-------------------------------------------------------------
  	*/

  	public function _permanentDeleteInstituteActivity($details=null)
  	{
    	//echo "inside _permanentDeleteInstituteActivity function";
    	$details = $this->decryptArray($details);  
    	if(isset($details['institute_activity_id']))
    	{    
      		$id=$details['institute_activity_id'];
      		$data=array('display'=>'N');
      		$results = $this->standard_model->updateRecord('tbl_institute_activity','institute_activity_id',$id,$data);
      		if($results)
      		{
        		$results = $this->encryptArray($details);
        		return array(
                    'state'=>true,
                    'msg'=>'Record Deleted Succesfully!',
                    'details'=>$results
                );
      		}
      		else
      		{
        		$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Delete Record';
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
                'msg'=>'institute_activity_id Required!',
            );
    	}
  	}// _permanentDeleteInstituteActivity function close


  	/*
  	-------------------------------------------------------------
  	Author  : Archana Patil      Date: 19-11-2021
  	-------------------------------------------------------------
  	*/

	public function validation_form($details) 
  {
  		$this->form_validation->set_error_delimiters('','');
  		$this->form_validation->set_data(
  			array(
  				'institute_activity_id' => isset($details['institute_activity_id']) ? $details['institute_activity_id'] :'',
  				'constant'=>isset($details['constant']) ? $details['constant'] :'',
        		'title'=>isset($details['title']) ? $details['title'] :'',
                'description'=> isset($details['description']) ? $details['description'] :''         
            )
  		);

      if(!empty($details['institute_activity_id']))
      {
        $flag=1;
      }
      else
      {
        $flag=0;
      }

  		$this->form_validation->set_rules('institute_activity_id','institute_activity_id',
	    	array('min_length[1]','max_length[5]','regex_match[/^([0-9][0-9]{0,4})$/]'),
	    	array(	        
	        'min_length'=>'Min 1 Char Allowed For institute_activity_id',
	        'max_length'=>'Max 5 Char Allowed For institute_activity_id',
	        'regex_match'=>'institute_activity_id Should Not Have More Than 5 Char and Less Than 1 Char'
	        )
	    );

      if(0 == $flag)
      {        
        $this->form_validation->set_rules('constant','Constant',
        array('required','min_length[1]','max_length[10]','regex_match[/^[A-Z]+$/]'),
        array(
          'required'=>'Constant Is Required',
          'min_length'=>'Min 1 Char Allowed For Constant',
          'max_length'=>'Max 10 char Allowed For Constant',
          'regex_match'=>'Constant Should Have Only Capital Letters And No Space Are Allowed'        
          )
        );

        $constant = $details['constant'];
        $flag1 = $this->standard_model->check_is_unique('tbl_institute_activity','constant',$constant);
      }
      else
      {
        $this->form_validation->set_rules('constant','Constant',
        array('required','min_length[1]','max_length[10]','regex_match[/^[A-Z]+$/]'),
        array(
          'required'=>'Constant Is Required',
          'min_length'=>'Min 1 Char Allowed For Constant',
          'max_length'=>'Max 10 char Allowed For Constant',
          'regex_match'=>'Constant Should Have Only Capital Letters And No Space Are Allowed'
          )
        ); 
      }

  		

	    $this->form_validation->set_rules('title','Title',
	    	array('required','min_length[2]','max_length[80]','regex_match[/^([A-Za-z0-9][A-Za-z0-9\&\(\)\\\-\_\;\'\:\"\[\]\{\}\,\.\/\<\>\|\s]{1,79})$/]'),
	    	array(
	        'required'=>'Title Is Required',
	        'min_length'=>'Min 2 Char Allowed For Title',
	        'max_length'=>'Max 80 Char Allowed For Title',
	        'regex_match'=>'Title Should Have Alphanumeric And Special Char & ( ) \ - _ ; : " [ ] { }  , . / <  > | Space Allowed,Single Quote Allowed.'
	        )
	    );     

	    $this->form_validation->set_rules('description','Description',
	    	array('required','min_length[2]','max_length[200]'),
	    	array(
	        'required'=>'Description Is Required',
	        'min_length'=>'Min 2 Char Allowed For Description',
	        'max_length'=>'Max 200 Char Allowed For Description',	        
	        )
	    );

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
  }// validation_institute_activity close 
  
}//class close

