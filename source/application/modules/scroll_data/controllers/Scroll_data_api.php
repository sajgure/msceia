<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Scroll_data_api extends Base_Controller 
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
	Purpose: Get list for scroll_data 
	return array(
	 	'state'=>TRUE,
		'msg'=>'Records Found!',
	 	'details'=>array(
	 		array(
	 		'scroll_data_id'=>'1',
                  'message'=>'५८ वे राज्यस्तरीय अधिवेशन दिनांक २२ आणि २३ फेब्रुवारी २',
	 		)
	 	)
	 );
    */
	public function _get_scroll_data($details=false)
    {
		$details = $this->decryptArray($details);

		if(isset($details['scroll_data_id']))
		{
		 $results = $this->standard_model->alljoin2tbl_whr('tbl_scroll_data','tbl_scroll_data','scroll_data_id','scroll_data_id',$details['scroll_data_id']);
		}
		else if(isset($details['all'])){
		$results= $this->standard_model->selectAllJoin('tbl_scroll_data','tbl_scroll_data','scroll_data_id');
		}
		else {
		$results= $this->standard_model->selectAllJoin('tbl_scroll_data','tbl_scroll_data','scroll_data_id','in_use','Y');
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
                  'details'=>$details['scroll_data_id']
            );
        }
	}
	/*
	=================================================================================
    Author:Mrudul Thite                 Date:29/2/2020
	=================================================================================
	Purpose: Save scroll_data
	return array(
			'state'=>TRUE,
			'msg'=>'New scroll_data added!',
			'details'=>$details
		);
    */
    public function _set_scroll_data($details=false)
	{
	  	$validation_error='';
        $details = $this->decryptArray($details);
        if(isset($details['scroll_data_id']) && !empty($details['scroll_data_id']))
        {
          $flag=1;
        }
        else
        {
         $flag=0;
  		}
        if($this->validation_scroll_data_details($details))
	    {
            if($details)
            {
                $user_id= $this->session->userdata('user_id');
                $scroll_data = array(
                          'message' =>$details['message'],
                          'modified_by'=>1,
                          'modified_on'=>date('Y-m-d H:i:s'),
                          'scroll_data_id'=>isset($details['scroll_data_id'])?$details['scroll_data_id']:'');
                if(!isset($details['scroll_data_id']) && empty($details['scroll_data_id']))
                {
                    $scroll_data['inserted_by']=1;
                    $scroll_data['inserted_on']=date('Y-m-d H:i:s');
                }
             //    $scroll_data_id = $this->standard_model->single_insert('tbl_scroll_data',$scroll_data);
             //    $scroll_data['scroll_data_id']=$scroll_data_id;
             //    $scroll_data= $this->encryptArray($scroll_data);
             //     if($flag==0)
             //    {
             //    return array(
             //                'state'=>true,
             //                'msg'=>'New scroll_data added!',
             //                'details'=>$scroll_data
             //               );
            	// }else{
            	// return array(
             //                'state'=>true,
             //                'msg'=>'scroll_data updated!',
             //                'details'=>$scroll_data
             //               );
            	// }
            $error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
                if($flag==0)
                {
                    $scroll_data['inserted_by']=1;
                    $scroll_data['inserted_on']=date('Y-m-d H:i:s');
                    $scroll_data['display']='Y';
                    $scroll_data['in_use']='Y';
                    $scroll_data_id= $this->standard_model->single_insert('tbl_scroll_data',$scroll_data);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Add Scroll!',
                            'details'=>$error_msg
                        );
                    }
                    else
                    {
                        $scroll_data['scroll_data_id']=$scroll_data_id;
                        $scroll_data= $this->encryptArray($scroll_data);
                        return array(
                            'state'=>true,
                            'msg'=>'Scroll Added Successfully!',
                            'details'=>$scroll_data
                        );
                    }
                }
                else
                {                                                   
                    $scroll_data_id= $this->standard_model->single_insert('tbl_scroll_data',$scroll_data);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Update Scroll!',
                            'details'=>$error_msg
                            );
                    }
                    else
                    {
                        $scroll_data['scroll_data_id']=$scroll_data_id;
                        $scroll_data= $this->encryptArray($scroll_data);                
                        return array(
                            'state'=>true,
                            'msg'=>'Scroll Updated!',
                            'details'=>$scroll_data
                            );
                    }
                }   

            }
            else
            {
                return array(
                'state'=>False,
                'msg'=>'scroll_data_ Failed to Saved!',
                'details'=>false
                );
            }
        }
		else
		{
			$validation_error = validation_errors();
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
	Purpose: validation for scroll_data
	*/
	function validation_scroll_data_details($details)
    {
	 	$this->form_validation->set_error_delimiters('','');
		$this->form_validation->set_data(
		array(
			'scroll_data_id'=>isset($details['scroll_data_id']) ? $details['scroll_data_id'] :'',
	        'message'=>isset($details['message']) ? $details['message'] :'',
	        'course_desc'=>isset($details['course_desc']) ? $details['course_desc'] :''
		)
		); 
		if(isset($details['scroll_data_id']) && $details['scroll_data_id'] !='' ){
          $this->form_validation->set_rules('scroll_data_id', 'scroll_data_id',array('required','min_length[1]','max_length[5]','regex_match[/^([0-9][0-9]{0,4})$/]'),
                    array(
                      'required'=>'scroll_data_id is Required',
                      'min_length'=>'Min 1 char required. ',
                      'max_length'=>'Max 5 char allowed. ',
                      'regex_match'=>'Only numbers are allowed.'
                    ));
        }else{
            
        }
		$this->form_validation->set_rules('message', 'message',array('required','min_length[2]','max_length[200]'),
                                                                                                                
        	array(
                'required'=>'message is Required',
                'min_length'=>'Min 2 char required.',
                'max_length'=>'Max 200 char allowed.'
            ));
		
		
		   
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
	 Author:Mrudul Thite                 Date:29/2/2020
	=================================================================================
	Purpose: Hide scroll_data
	return array(
	 		'state'=>TRUE,
	 		'msg'=>'scroll_data hidden!',
	 		'details'=>$details
	 	);
	*/
	public function _hide_scroll_data($details=false)
	{
		$details = $this->decryptArray($details);			
		if(isset($details['scroll_data_id']))
		{
			$id=$details['scroll_data_id'];
			$scroll_data=array(
				'in_use'=>'N',
			);
			$results = $this->standard_model->updateRecord('tbl_scroll_data','scroll_data_id',$id,$scroll_data);
			$resdata = $this->standard_model->selectAllWhr('tbl_scroll_data','scroll_data_id',$details['scroll_data_id']);
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
	                      'msg'=>'Hide Record !',
	                      'details'=>$result
	                );
	      	}
			else
			{
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide scroll_data';
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
			'msg'=>'email_section_topic_id Required!',
			);
		}
	}
	/*
	=================================================================================
	Author:Mrudul Thite                 Date:29/2/2020
	=================================================================================
	Purpose: Restore scroll_data
	return array(
		'state'=>TRUE,
		'msg'=>'scroll_data restored!',
		'details'=>$details
	);
	*/
	public function _restore_scroll_data($details=false)
	{
		$details = $this->decryptArray($details);			
		if(isset($details['scroll_data_id']))
		{	
		    $id=$details['scroll_data_id'];
			$scroll_data=array(
				'in_use'=>'Y',
			);
			$results = $this->standard_model->updateRecord('tbl_scroll_data','scroll_data_id',$id,$scroll_data);
			$resdata = $this->standard_model->selectAllWhr('tbl_scroll_data','scroll_data_id',$details['scroll_data_id']);
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
	                      'msg'=>'Restore Record !',
	                      'details'=>$result
	                );
	      	}
			else
			{
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Restore scroll_data';
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
			'msg'=>'scroll_data_id Required!',
			);
		}
	}
	/*
	=================================================================================
	Author:Mrudul Thite                 Date:29/2/2020
	=================================================================================
	Purpose:Delete scroll_data
	/*return array(
		'state'=>TRUE,
		'msg'=>'scroll_data deleted!',
		'details'=>$details
	);
	*/
	public function _delete_scroll_data($details=null)
	{  
		$details = $this->decryptArray($details);
		if(isset($details['scroll_data_id']))
		{    
			
			$id=$details['scroll_data_id'];
			 
			$scroll_data=array(
					'display'=>'N',
				);
			$results = $this->standard_model->updateRecord('tbl_scroll_data','scroll_data_id',$id,$scroll_data);
			if($results)
			{
			    $results = $this->encryptArray($details);
				return array(
					'state'=>true,
					'msg'=>'Scroll Data Delete!',
					'details'=>$results
				);
			}
			else
			{
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Delete scroll_data';
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
			'msg'=>'scroll_data_id Required!',
			);
		}
	}
}