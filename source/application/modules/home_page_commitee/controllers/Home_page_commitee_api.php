<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home_page_commitee_api extends Base_Controller 
{
    public function __construct()
  	{
		parent::__construct();
		$this->load->model('standard/standard_model');
	}
	/*   
    =================================================================================
    Author:Mrudul Thite                        Date:28/02/2020
    =================================================================================
	Purpose: Get list for home_page_commitee
	return array(
	 	'state'=>TRUE,
          'msg'=>'Records Found!',
          'details'=>array(
           array(
                "home_page_commitee_id"=>"1",
                "photo"=>"a.jpg",
                "name"=>"Mr.Prakash Karale",
                "designation"=>"adhyaksh",
               ),
            )  
	 );
    */
	public function _get_home_page_commitee($details=false)
    {
		$details = $this->decryptArray($details);
		if(isset($details['home_page_commitee_id']))
		{
		 $results = $this->standard_model->selectAllWhr('tbl_home_page_commitee','home_page_commitee_id',$details['home_page_commitee_id']);
		}
		else if(isset($details['all'])){
		 $results= $this->standard_model->selectAll('tbl_home_page_commitee');
		}
		else {
		   $results= $this->standard_model->selectAll('tbl_home_page_commitee','in_use','Y');
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
                  'details'=>$details['home_page_commitee_id']
            );
        }
    }
	/*
	=================================================================================
    Author:Mrudul Thite                        Date:28/02/2020
	=================================================================================
	Purpose: Save user home_page_commitee
	return array(
			'state'=>TRUE,
			'msg'=>'New home_page_commitee added!',
			'details'=>$details
		);
    */
    public function _set_home_page_commitee($details=false)
	{

	  	$validation_error='';
        $details = $this->decryptArray($details);
		    if(isset($details['home_page_commitee_id']) && !empty($details['home_page_commitee_id']))
		    {
		      $flag=1;
		    }
		    else
		    {
		      $flag=0;
		    }
		    if($this->validationhome_page_commiteeMasterDetails($details))
			{

	            if($details)
	            {
	                $user_id= $this->session->userdata('user_id');
	       			$query=$this->db->query("select * from tbl_home_page_commitee where name='".$details['name']."'AND designation='".$details['designation']."'");
	            	        	
	                $home_page_commitee = array(
	                		'home_page_commitee_id'=>isset($details['home_page_commitee_id'])?$details['home_page_commitee_id']:'',
	                        'photo' =>$details['photo'],
	                        'name' =>$details['name'],
	                        'designation' =>$details['designation'],
	                        'sequence_no' =>$details['sequence_no'],
	                        'modified_by'=>1
	                          );
	                if(!isset($details['home_page_commitee_id']) && empty($details['home_page_commitee_id']))
	                {
	                    $home_page_commitee['inserted_by']=1;
	                    $home_page_commitee['inserted_on']=date('Y-m-d H:i:s');
	                }
	               	$error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
					if($flag==0)
					{
						if(!$query->num_rows() > 0)
		        		{ 
							$home_page_commitee['inserted_by']=1;
							$home_page_commitee['inserted_on']=date('Y-m-d H:i:s');
							$home_page_commitee['display']='Y';
							$home_page_commitee['in_use']='Y';
							$home_page_commitee_id= $this->standard_model->single_insert('tbl_home_page_commitee',$home_page_commitee);
							if($error_msg && !empty($error_msg) )
							{                                                       
								return array(
									'state'=>false,
									'msg'=>'Unable to Add Home Page Commitee!',
									'details'=>$error_msg
								);
							}
							else
							{
								$home_page_commitee['home_page_commitee_id']=$home_page_commitee_id;
								$home_page_commitee= $this->encryptArray($home_page_commitee);
								return array(
									'state'=>true,
									'msg'=>'Home Page Commitee Added Successfully!',
									'details'=>$home_page_commitee
								);
							}
						}	
			            else
			            {
			             	return array(
			                'state'=>False,
			                'msg'=>'Name with same designation present in table',
			                'details'=>false
			                );
			            }
					}
					else
					{													
						$home_page_commitee_id= $this->standard_model->single_insert('tbl_home_page_commitee',$home_page_commitee);
						if($error_msg && !empty($error_msg) )
						{                                                       
							return array(
								'state'=>false,
								'msg'=>'Unable to Update Home Page Commitee!',
								'details'=>$error_msg
								);
						}
						else
						{
							$home_page_commitee['home_page_commitee_id']=$home_page_commitee_id;
							$home_page_commitee= $this->encryptArray($home_page_commitee);        		
							return array(
								'state'=>true,
								'msg'=>'Home Page Commitee Updated Successfully!',
								'details'=>$home_page_commitee
								);
						}
					}   
		        }
		        else
		        {
	                return array(
	                'state'=>False,
	                'msg'=>'Home Page Commitee Failed to Saved!',
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
	Author:Mrudul Thite                        Date:28/02/2020
	=================================================================================
	Purpose: validation for home_page_commitee
	*/
	function validationhome_page_commiteeMasterDetails($details)
    {
	 	$var1="'";  
	 	$var2='"';
	 	$this->form_validation->set_error_delimiters('','');
	 	$this->form_validation->set_data(
        array(
	          	'home_page_commitee_id'=>isset($details['home_page_commitee_id']) ? $details['home_page_commitee_id'] :'',
	    		'name'=>isset($details['name']) ? $details['name'] :'',
	    		'photo'=>isset($details['photo']) ? $details['photo'] :'',
	    		'designation'=>isset($details['designation']) ? $details['designation'] :''
              ));
        if(isset($details['home_page_commitee_id']) && $details['home_page_commitee_id'] !='' )
        {
			$this->form_validation->set_rules('home_page_commitee_id', 'home_page_commitee_id',array('required','min_length[1]','max_length[5]','regex_match[/^([0-9][0-9]{0,4})$/]'),
                    array(
                      'required'=>'home_page_commitee_id is Required',
                      'min_length'=>'Min 1 char required. ',
                      'max_length'=>'Max 5 char allowed. ',
                      'regex_match'=>'Only numbers are allowed.'
                    )); 
		}else
		{
            
        }
		
		$this->form_validation->set_rules('designation', 'designation',array('required','max_length[80]'),array(
			 	'required'=>'designation is Required',
	            'max_length'=>'Max 80 char allowed '
		));

		$this->form_validation->set_rules('photo', 'photo',array('required','regex_match[/^[^\?]+\.(jpg|jpeg|gif|png)(?:\?|$)/]'),
		array(
		 	'required'=>'photo is Required',
            'regex_match'=>'Only jpg|png|gif are allowed.'
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
	 Author:Mrudul Thite                        Date:28/02/2020
	=================================================================================
	Purpose: Hide home_page_commitee
	return array(
	 		'state'=>TRUE,
	 		'msg'=>'home_page_commitee hidden!',
	 		'details'=>$details
	 	);
	*/
	public function _hide_home_page_commitee($details=false)
    {
        $details = $this->decryptArray($details);
        if(isset($details['home_page_commitee_id']))
        {
            $id=$details['home_page_commitee_id'];
            $records= array('in_use'=>'N');
            $result = $this->standard_model->updateRecord('tbl_home_page_commitee','home_page_commitee_id',$id,$records);
            if($result)
            { 
                $result = $this->encryptArray($details);
                return array(
                    'state'=>true,
                    'msg'=>'Record Hide Succesfully!',
                    'details'=>$result
                );
            }
            else
            {
                $message = isset($this->standard_model->error )?$this->standard_model->error['message']:'Unable to hide home page Commitee';
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
                'msg'=>'batch_id Required!',
                'details'=>false
            );
        }      
    }
	/*
	=================================================================================
	Author:Mrudul Thite                        Date:31/01/2020
	=================================================================================
	Purpose: Restore home_page_commitee
	return array(
		'state'=>TRUE,
		'msg'=>'home_page_commitee restored!',
		'details'=>$details
	);
	*/
	public function _restore_home_page_commitee($details=false)
    {
        $details = $this->decryptArray($details);
        if(isset($details['home_page_commitee_id']))
        {
            $id=$details['home_page_commitee_id'];
            $records= array('in_use'=>'Y');
            $result = $this->standard_model->updateRecord('tbl_home_page_commitee','home_page_commitee_id',$id,$records);
            if($result)
            {
                $result = $this->encryptArray($details);
                return array(
                    'state'=>true,
                    'msg'=>'Record Restore Succesfully!',
                    'details'=>$result
                );
            }
            else
            {
                $message = isset($this->standard_model->error )?$this->standard_model->error['message']:'Unable to restore home_page_commitee';
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
                'msg'=>'batch_id Required!',
                'details'=>false
            );
        }      
    }
	/*
	=================================================================================
	Author:Mrudul Thite                        Date:31/01/2020
	=================================================================================
	Purpose:Delete home_page_commitee
	/*return array(
		'state'=>TRUE,
		'msg'=>'home_page_commitee deleted!',
		'details'=>$details
	);
	*/
	public function _permanent_delete_home_page_commitee($details=null)
	{  
		if(isset($details['home_page_commitee_id']))
		{    
			$details = $this->decryptArray($details);
			$id=$details['home_page_commitee_id'];
			$home_page_commitee=array(
					'display'=>'N',
				);
			$results = $this->standard_model->updateRecord('tbl_home_page_commitee','home_page_commitee_id',$id,$home_page_commitee);
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
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Delete home_page_commitee';
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
			'msg'=>'home_page_commitee_id Required!',
			);
		}
	}
}