<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Course_master_api extends Base_Controller 
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
	Purpose: Get list for course_master 
	return array(
	 	'state'=>TRUE,
		'msg'=>'Records Found!',
	 	'details'=>array(
	 		array(
	 		"course_master_id":"1",
            "course_master_name":"English 30 WPM",
            "course_master_desc": "Computer Typing English 30 WPM"
	 		)
	 	)
	 );
    */
	public function _get_course_master($details=false)
    {
		$details = $this->decryptArray($details);
		if(isset($details['course_master_id']))
		{
		 $results = $this->standard_model->alljoin2tbl_whr('tbl_course_master','tbl_course_master','course_master_id','course_master_id',$details['course_master_id']);
		}
		else if(isset($details['all'])){
		$results= $this->standard_model->selectAllJoin('tbl_course_master','tbl_course_master','course_master_id');
		}
		else {
		$results= $this->standard_model->selectAllJoin('tbl_course_master','tbl_course_master','course_master_id','in_use','Y');
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
                  'details'=>false
            );
        }
	}
	/*
	=================================================================================
    Author:Mrudul Thite                 Date:29/2/2020
	=================================================================================
	Purpose: Save course_master
	return array(
			'state'=>TRUE,
			'msg'=>'New course_master added!',
			'details'=>$details
		);
    */
    public function _set_course_master($details=false)
	{
	  	$validation_error='';
        $details = $this->decryptArray($details);
    if(isset($details['course_master_id']) && !empty($details['course_master_id']))
    {
      $flag=1;
    }
    else
    {
      $flag=0;
    }
        if($this->validation_course_master_details($details))
	    {
            if($details)
            {
                $user_id= $this->session->userdata('user_id');
                $course_master = array(
                          'course_name'=>$details['course_name'],
                          'course_desc'=>$details['course_desc'],
                          'modified_by'=>1,
                          'modified_on'=>date('Y-m-d H:i:s'),
                          'course_master_id'=>isset($details['course_master_id'])?$details['course_master_id']:'');
                // if(!isset($details['course_master_id']) && empty($details['course_master_id']))
                // {
                //     $course_master['inserted_by']=1;
                //     $course_master['inserted_on']=date('Y-m-d H:i:s');
                // }
                // $course_master_id = $this->standard_model->single_insert('tbl_course_master',$course_master);
                // $course_master['course_master_id']=$course_master_id;
                // $course_master= $this->encryptArray($course_master);
                // if($flag==0)
                // {
                // 	return array(
                //             'state'=>true,
                //             'msg'=>'New course_master added!',
                //             'details'=>$course_master
                //             );
                // }else{
                // 	return array(
                //             'state'=>true,
                //             'msg'=>' course_master updated!',
                //             'details'=>$course_master
                //             );
                // }	
                $error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
				if($flag==0)
				{
					$course_master['inserted_by']=1;
					$course_master['inserted_on']=date('Y-m-d H:i:s');
					$course_master['display']='Y';
					$course_master['in_use']='Y';
					$course_master_id= $this->standard_model->single_insert('tbl_course_master',$course_master);
					if($error_msg && !empty($error_msg) )
					{                                                       
						return array(
							'state'=>false,
							'msg'=>'Unable to Add Course Master!',
							'details'=>$error_msg
						);
					}
					else
					{
						$course_master['course_master_id']=$course_master_id;
						$course_master= $this->encryptArray($course_master);
						return array(
							'state'=>true,
							'msg'=>'Course Master Added Successfully!',
							'details'=>$course_master
						);
					}
				}
				else
				{													
					$course_master_id= $this->standard_model->single_insert('tbl_course_master',$course_master);
					if($error_msg && !empty($error_msg) )
					{                                                       
						return array(
							'state'=>false,
							'msg'=>'Unable to Update Course Master!',
							'details'=>$error_msg
							);
					}
					else
					{
						$course_master['course_master_id']=$course_master_id;
						$course_master= $this->encryptArray($course_master);        		
						return array(
							'state'=>true,
							'msg'=>'Course Master Updated Successfully!',
							'details'=>$course_master
							);
					}
				}   	
            }
            else
            {
                return array(
                'state'=>False,
                'msg'=>'course_master_ Failed to Saved!',
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
	Purpose: validation for course_master
	*/
	function validation_course_master_details($details)
    {
	 	$this->form_validation->set_error_delimiters('','');
		$this->form_validation->set_data(
		array(
			'course_master_id'=>isset($details['course_master_id']) ? $details['course_master_id'] :'',
            'course_name'=>isset($details['course_name']) ? $details['course_name'] :'',
            'course_desc'=>isset($details['course_desc']) ? $details['course_desc'] :''
		)
		); 
		
		$this->form_validation->set_rules('course_master_id','course_master_id', array('min_length[1]','max_length[5]',"regex_match[/^([0-9][0-9]{0,4})$/]"),
		array(    
			'min_length'=>'course_master_id:Min 2 Number Required.',
			'max_length'=>'course_master_id:Max 5 Number allowed.',
			'regex_match'=>'course_master_id Should Have Only Numbers'
		)
		);
		
		 $this->form_validation->set_rules('course_name','course_name',array('required','min_length[2]','max_length[25]','regex_match[/^([A-Z0-9a-z][A-Z0-9a-z\(\)\&\-\.\,\_\'\/\[\]\"\:\;\s]{1,24})$/]'),
            array(
                'required'=>'course name is Required',
                'min_length'=>'course_name:Min 2 char required.',
                'max_length'=>'course_name:Max 25 char allowed.',
                'regex_match'=>'Only alphanumeric chars and special char & ( ) / . ,  - _ | [ ] " : ; space are allowed.'
		 )
		 );
		 $this->form_validation->set_rules('course_desc','course_desc',array('required','max_length[200]'),
          array(
              'required'=>'course_desc is Required',
              'max_length'=>'course_desc:Max 200 char allowed '
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
	 Author:Mrudul Thite                 Date:29/2/2020
	=================================================================================
	Purpose: Hide course_master
	return array(
	 		'state'=>TRUE,
	 		'msg'=>'course_master hidden!',
	 		'details'=>$details
	 	);
	*/
	public function _hide_course_master($details=false)
	{
		$details = $this->decryptArray($details);			
		if(isset($details['course_master_id']))
		{
			$id=$details['course_master_id'];
			$course_master=array(
				'in_use'=>'N',
			);
			$results = $this->standard_model->updateRecord('tbl_course_master','course_master_id',$id,$course_master);
			$resdata = $this->standard_model->selectAllWhr('tbl_course_master','course_master_id',$details['course_master_id']);
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
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide course_master';
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
			'msg'=>'course_master_id Required!',
			);
		}
	}
	/*
	=================================================================================
	Author:Mrudul Thite                 Date:29/2/2020
	=================================================================================
	Purpose: Restore course_master
	return array(
		'state'=>TRUE,
		'msg'=>'course_master restored!',
		'details'=>$details
	);
	*/
	public function _restore_course_master($details=false)
	{
		$details = $this->decryptArray($details);			
		if(isset($details['course_master_id']))
		{	
		    $id=$details['course_master_id'];
			$course_master=array(
				'in_use'=>'Y',
			);
			$results = $this->standard_model->updateRecord('tbl_course_master','course_master_id',$id,$course_master);
			$resdata = $this->standard_model->selectAllWhr('tbl_course_master','course_master_id',$details['course_master_id']);
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
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Restore course_master';
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
			'msg'=>'course_master_id Required!',
			);
		}
	}
	/*
	=================================================================================
	Author:Mrudul Thite                 Date:29/2/2020
	=================================================================================
	Purpose:Delete course_master
	/*return array(
		'state'=>TRUE,
		'msg'=>'course_master deleted!',
		'details'=>$details
	);
	*/
	public function _delete_course_master($details=null)
	{  
		$details = $this->decryptArray($details);
		if(isset($details['course_master_id']))
		{    
			
			$id=$details['course_master_id'];
			 
			$course_master=array(
					'display'=>'N',
				);
			$results = $this->standard_model->updateRecord('tbl_course_master','course_master_id',$id,$course_master);
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
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Delete course_master';
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
			'msg'=>'course_master_id Required!',
			);
		}
	}
}