<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gallery_master_api extends Base_Controller 
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
	Purpose: Get User gallery master
	return array(
	 	'state'=>TRUE,
		'msg'=>'Records Found!',
	 	'details'=>array(
	 		array(
	 		"gallery_master_id": "2",
            "image_name": "gallery master",
            "image_description": "gallery master",
            "image_upload": "gallery.txt",
            "visibility":"Y",
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
	public function _get_gallery_master($details=false)
    {
		$details = $this->decryptArray($details);
		if(isset($details['all']))
        {
            $results = $this->standard_model->selectAll('tbl_gallery_master');
		}
		else if(isset($details['gallery_master_id']))
        {
            $results = $this->standard_model->selectAllWhr('tbl_gallery_master','gallery_master_id',$details['gallery_master_id']);
        }
        else
        {
            $results = $this->standard_model->selectAll('tbl_gallery_master','in_use','Y');
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
	Purpose: Save user gallery master
	return array(
			'state'=>TRUE,
			'msg'=>'New gallery Master added!',
			'details'=>$details
		);
    */
    public function _set_gallery_master($details=false)
	{
	  	$validation_error='';
		$details = $this->decryptArray($details);
		if(isset($details['gallery_master_id']) && !empty($details['gallery_master_id']))
		{
			$flag=1;
		}
		else
		{
			$flag=0;
		}
        if($this->validationGalleryMasterDetails($details,$flag))
		{
			if(!isset($details['visibility']) && empty($details['visibility']))
	        {
	          $details['visibility']= "N";
	        }
            if($details)
            {
                $user_id= $this->session->userdata('user_id');
                $gallery_master = array(
					'gallery_master_id'=>isset($details['gallery_master_id'])?$details['gallery_master_id']:NULL,   
					'image_name'=>$details['image_name'],
                        'image_description'=>$details['image_description'],
                        'image_upload'=>$details['image_upload'],
                        'visibility'=>$details['visibility'],
						'modified_by'=>$user_id,
						'modified_on'=>date('Y-m-d H:i:s')
                       );
                if(!isset($details['gallery_master_id']) && empty($details['gallery_master_id']))
                {
                    $gallery_master['inserted_by']=$user_id;
                    $gallery_master['inserted_on']=date('Y-m-d H:i:s');
                }
    			$error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
				if($flag==0)
				{
					$gallery_master['inserted_by']=$user_id;
					$gallery_master['inserted_on']=date('Y-m-d H:i:s');
					$gallery_master['display']='Y';
					$gallery_master['in_use']='Y';
					$gallery_master_id= $this->standard_model->single_insert('tbl_gallery_master',$gallery_master);
					if($error_msg && !empty($error_msg) )
					{                                                       
						return array(
							'state'=>false,
							'msg'=>'Unable to Add Gallery Master!',
							'details'=>$error_msg
						);
					}
					else
					{
						$gallery_master['gallery_master_id']=$gallery_master_id;
						$gallery_master= $this->encryptArray($gallery_master);
						return array(
							'state'=>true,
							'msg'=>'Gallery Master Added Successfully!',
							'details'=>$gallery_master
						);
					}
				}
				else
				{													
					$gallery_master_id= $this->standard_model->single_insert('tbl_gallery_master',$gallery_master);
					if($error_msg && !empty($error_msg) )
					{                                                       
						return array(
							'state'=>false,
							'msg'=>'Unable to Update Gallery Master!',
							'details'=>$error_msg
							);
					}
					else
					{
						$gallery_master['gallery_master_id']=$gallery_master_id;
						$gallery_master= $this->encryptArray($gallery_master);        		
						return array(
							'state'=>true,
							'msg'=>'Gallery Master Updated Successfully!',
							'details'=>$gallery_master
							);
					}
				}  
            }
            else
            {
                return array(
                'state'=>False,
                'msg'=>'gallery Master Failed to Saved!',
                'details'=>false
                );
            }
        }
        else
		{
			$validation_error = validation_errors();
			if(""==$validation_error)
          	{
            	$validation_error = "Duplicate Entry For Image Name.";
          	}
			return array(
				'state'=>False,
				'details'=>'Validation is failed',
				'msg'=>$validation_error
			);
		}	
    } 
    /*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:29/02/2020
	=================================================================================
	Purpose: validation for Bank Master
	*/
	 function validationGalleryMasterDetails($details,$flag)
    {
		$var1="'";
		$var2='"';
		$this->form_validation->set_error_delimiters('','');
        $this->form_validation->set_data(
		array(
		'gallery_master_id'=>isset($details['gallery_master_id']) ? $details['gallery_master_id'] :'',
		'image_name'=>isset($details['image_name']) ? $details['image_name'] :'',
		'image_description'=>isset($details['image_description']) ? $details['image_description'] :'',
		//'image_upload'=>isset($details['image_upload']) ? $details['image_upload'] :'',
		)
		); 
		$this->form_validation->set_rules('gallery_master_id', 'gallery_master_id', array('min_length[1]','max_length[11]',"regex_match[/^([0-9][0-9]{0,10})$/]"),
		array(                                                                                      
			'min_length'=>'gallery_master_id Min 1 Number Required.',
			'max_length'=>'gallery_master_id Max 11 Number allowed.',
			'regex_match'=>'gallery_master_id Should Have Only Numbers'
		)
		);
		if($flag == 0)
		{
			$this->form_validation->set_rules('image_name','image_name',array('required','min_length[3]','max_length[250]'),
			array(
				'required'=>'Image Name is Required.',
				'min_length'=>'Image Name should Min 3 char allowed.',
				'max_length'=>'Image Name should Max 250 char allowed.'				
			));

			$image_name = $details['image_name'];
        	$flag1 = $this->standard_model->check_is_unique('tbl_gallery_master','image_name',$image_name);
		}
		else{
			$this->form_validation->set_rules('image_name','image_name',array('required','min_length[3]','max_length[250]'),
			array(
				'required'=>'Image Name is Required',
				'min_length'=>'Image Name should Min 3 char allowed',
				'max_length'=>'Image Name should Max 250 char allowed.',
			));
		}
		$this->form_validation->set_rules('image_description','image_description',array('min_length[2]','max_length[500]'),
		array(
			'min_length'=>'Image Description Min 2 Character Required.',
			'max_length'=>'Image Description Max 500 Character Allowed.',
		   )
		 );
		// $this->form_validation->set_rules('image_upload', 'image_upload',array('required'),
                                                                                                                
		// array(
		// 	  'required'=>'image_upload  is Required'
		// ));
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
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	Purpose: Hide gallery Master
	return array(
			'state'=>TRUE,
			'msg'=>'gallery Master hidden!',
			'details'=>$details
		);
	*/
	public function _hide_gallery_master($details=false)
	{
		$details = $this->decryptArray($details);
		if(isset($details['gallery_master_id']))
	    {
			$id=$details['gallery_master_id'];
			// $details = $this->decryptArray($details);
			$gallery_master=array(
				'in_use'=>'N',
			);
			$results = $this->standard_model->updateRecord('tbl_gallery_master','gallery_master_id',$id,$gallery_master);
			if($results)
			{
				$fetchdata = $this->standard_model->selectAllWhr('tbl_gallery_master','gallery_master_id',$details['gallery_master_id']);
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
		          $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide gallery_master';
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
		   'msg'=>'gallery_master_id Required!',
		   
           );
	   }
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:29/02/2020
	=================================================================================
	Purpose: Restore gallery Master
	return array(
			'state'=>TRUE,
			'msg'=>'gallery Master restored!',
			'details'=>$details
		);
	*/
	public function _restore_gallery_master($details=false)
	{
		$details = $this->decryptArray($details);
		if(isset($details['gallery_master_id']))
	    {
			$id=$details['gallery_master_id'];
			// $details = $this->decryptArray($details);
			$gallery_master=array(
				'in_use'=>'Y',
			);
			$results = $this->standard_model->updateRecord('tbl_gallery_master','gallery_master_id',$id,$gallery_master);
			if($results)
			{
				$fetchdata = $this->standard_model->selectAllWhr('tbl_gallery_master','gallery_master_id',$details['gallery_master_id']);
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
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Restore gallery_master';
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
			'msg'=>'gallery_master_id Required!',
			'details'=>false
			);
		}
	}
    /*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:29/02/2020
	=================================================================================
	Purpose:Delete gallery Master
		/*return array(
			'state'=>TRUE,
			'msg'=>'gallery Master deleted!',
			'details'=>$details
		);
	*/
	 public function _delete_gallery_master($details=null)
    {  
		$details = $this->decryptArray($details);
		if(isset($details['gallery_master_id']))
	    {    
			$id=$details['gallery_master_id'];
			$gallery_master=array(
				'display'=>'N',
				);
			$results = $this->standard_model->updateRecord('tbl_gallery_master','gallery_master_id',$id,$gallery_master);
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
					$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Delete gallery_master';
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
			'msg'=>'gallery_master_id Required!',
			'details'=>false
			);
		}
	}
}