<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Fees_exemption_api extends Base_Controller 
{
    public function __construct()
  	{
		parent::__construct();
		$this->load->model('standard/standard_model');
	}

    /*
	=================================================================================
    Author:Tukaram Gavade                        Date:19/11/2021
	=================================================================================
	Purpose: Save fees exemption master
	return array(
			'state'=>TRUE,
			'msg'=>'Fees exemption Master added!',
			'details'=>$details
		);
    */
    public function _set_fees_exemption($details=false)
	{
	  	$validation_error='';
		$details = $this->decryptArray($details);
		if(isset($details['fees_exemption_id']) && !empty($details['fees_exemption_id']))
		{
			$flag=1;
		}
		else
		{
			$flag=0;
		}
        if($this->validationFeesExemptionMasterDetails($details,$flag))
		{
			if($details)
            {
                $user_id= $this->session->userdata('user_id');
				if('0'==$flag){
					$feesExemptionArr = array(
						'fees_exemption_id'=>isset($details['fees_exemption_id'])?$details['fees_exemption_id']:NULL,   
						'constant'=>$details['constant'],
						'title'=>$details['title'],
						'description'=>$details['description'],
						'modified_by'=>$user_id,
						'modified_on'=>date('Y-m-d H:i:s')
					);
				}else{
					$feesExemptionArr = array(
						'fees_exemption_id'=>isset($details['fees_exemption_id'])?$details['fees_exemption_id']:NULL,   
						// 'constant'=>$details['constant'], Can not update
						'title'=>$details['title'],
						'description'=>$details['description'],
						'modified_by'=>$user_id,
						'modified_on'=>date('Y-m-d H:i:s')
					);
				}
                if(!isset($details['fees_exemption_id']) && empty($details['fees_exemption_id']))
                {
                    $feesExemptionArr['inserted_by']=$user_id;
                    $feesExemptionArr['inserted_on']=date('Y-m-d H:i:s');
                }
    			$error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
				if($flag==0)
				{
					$feesExemptionArr['inserted_by']=$user_id;
					$feesExemptionArr['inserted_on']=date('Y-m-d H:i:s');
					$feesExemptionArr['display']='Y';
					$feesExemptionArr['in_use']='Y';
					$fees_exemption_id= $this->standard_model->single_insert('tbl_fees_exemption',$feesExemptionArr);
					if($error_msg && !empty($error_msg) )
					{                                                       
						return array(
							'state'=>false,
							'msg'=>'Unable to Add Fees Exemption!',
							'details'=>$error_msg
						);
					}
					else
					{
						$feesExemptionArr['fees_exemption_id']=$fees_exemption_id;
						$feesExemptionArr= $this->encryptArray($feesExemptionArr);
						return array(
							'state'=>true,
							'msg'=>'Fees Exemption Master Added Successfully!',
							'details'=>$feesExemptionArr
						);
					}
				}
				else
				{													
					$fees_exemption_id= $this->standard_model->single_insert('tbl_fees_exemption',$feesExemptionArr);
					if($error_msg && !empty($error_msg) )
					{                                                       
						return array(
							'state'=>false,
							'msg'=>'Unable to Update Fees Exemption Master!',
							'details'=>$error_msg
							);
					}
					else
					{
						$feesExemptionArr['fees_exemption_id']=$fees_exemption_id;
						$feesExemptionArr= $this->encryptArray($feesExemptionArr);        		
						return array(
							'state'=>true,
							'msg'=>'Fees Exemption Master Updated Successfully!',
							'details'=>$feesExemptionArr
							);
					}
				}  
            }
            else
            {
                return array(
                'state'=>False,
                'msg'=>'Fees Exemption Master Failed to Saved!',
                'details'=>false
                );
            }
        }
        else
		{
			$validation_error = validation_errors();
			if(""==$validation_error)
	        {
	        	$validation_error = "Duplicate Entry For Constant Name.";
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
	Author:Tukaram Gavade                       Date:19/11/2021
	=================================================================================
	Purpose: validation for Fees Exemption
	*/
	function validationFeesExemptionMasterDetails($details,$flag)
    {
        $var1="'";
        $var2='"';
        $this->form_validation->set_error_delimiters('','');
        $this->form_validation->set_data(
            array(
                'fees_exemption_id'=>isset($details['fees_exemption_id']) ? $details['fees_exemption_id'] :'',
                'constant'=>isset($details['constant']) ? $details['constant'] :'',
                'title'=>isset($details['title']) ? $details['title'] :'',
                'description'=>isset($details['description']) ? $details['description'] :'',
            )
        ); 
        $this->form_validation->set_rules('fees_exemption_id', 'fees_exemption_id', array('min_length[1]','max_length[11]',"regex_match[/^([0-9][0-9]{0,10})$/]"),
            array(                                                                                      
                'min_length'=>'fees_exemption_id Min 1 Number Required.',
                'max_length'=>'fees_exemption_id Max 11 Number allowed.',
                'regex_match'=>'fees_exemption_id Should Have Only Numbers'
            )
        );
        if($flag=='0')
        {
            $this->form_validation->set_rules('constant','constant',array('required','min_length[3]','max_length[10]','regex_match[/^([A-Z])+$/]'),
                array(
                    'required'=>'Constant Name is Required.',
                    'min_length'=>'Constant Name should Min 3 char allowed.',
                    'max_length'=>'Constant Name should Max 10 char allowed.',                    
                    'regex_match'=>'Constant Name acceept only Uppercase Letter'
                )
            );

            $constant = $details['constant'];
        	$flag1 = $this->standard_model->check_is_unique('tbl_fees_exemption','constant',$constant);
        }else{
            $this->form_validation->set_rules('constant','constant',array('required','min_length[3]','max_length[10]','regex_match[/^([A-Z])+$/]'),
				array(
					'required'=>'Constant Name is Required.',
					'min_length'=>'Constant Name should Min 3 char allowed.',
					'max_length'=>'Constant Name should Max 10 char allowed.',              
					'regex_match'=>'Constant Name acceept only Uppercase Letter',
				)
            );
        }

		$this->form_validation->set_rules('title','title',array('required','min_length[2]','max_length[80]','regex_match[/^([A-Z0-9a-z][A-Z0-9a-z\(\)\&\-\.\,\_\'\/\[\]\"\:\;\s]{1,79})$/]'),
			array(
				'required'=>'Title  is Required.',
				'min_length'=>'Title  should Min 2 char allowed.',
				'max_length'=>'Title should Max 40 char allowed.',              
				'regex_match'=>'Only Alphanumric Character and special character & ( ) / . ,  - _ | [ ] " : ; space are allowed.',
				
			)
	    );
       
        
        $this->form_validation->set_rules('description','description',array('min_length[2]','max_length[255]'),
            array(
             'min_length'=>'Description Min 2 Character Required.',
             'max_length'=>'Description Max 255 Character Allowed.',
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
    }

    /*
    =================================================================================
    Author:Tukaram Gavade                     Date:19/11/2021
    =================================================================================
	Purpose: Get Fees Exemption master
	return array(
	 	'state'=>TRUE,
		'msg'=>'Records Found!',
	 	'details'=>array(
	 		array(
	 		"fees_exemption_id": "2nWpd",
            "constant": "JUSTTEST",
            "title": "testing",
            "description": "testing 123ret",
            "in_use": "Y",
            "display": "Y",
            "inserted_by": "1",
            "inserted_on": "2021-11-19",
            "modified_by": "1",
            "modified_on": "2021-11-19 15:07:40"
	 		)
	 	)
	 );
    */
	public function _get_fees_exemption($details=false)
    {
		$details = $this->decryptArray($details);
		if(isset($details['all']))
        {
            $results = $this->standard_model->selectAll('tbl_fees_exemption');
		}
		else if(isset($details['fees_exemption_id']))
        {
            $results = $this->standard_model->selectAllWhr('tbl_fees_exemption','fees_exemption_id',$details['fees_exemption_id']);
        }
        else
        {
            $results = $this->standard_model->selectAll('tbl_fees_exemption','in_use','Y');
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
	Author:Tukaram  Gavade                        Date:19/11/2021
	=================================================================================
	Purpose: Hide Fees Exemption Master
	return array(
			'state'=>TRUE,
			'msg'=>'Fees exemption hidden!',
			'details'=>$details
		);
	*/
	public function _hide_fees_exemption($details=false)
	{
		$details = $this->decryptArray($details);
		if(isset($details['fees_exemption_id']))
	    {
			$id=$details['fees_exemption_id'];
			// $details = $this->decryptArray($details);
			$feesExemption=array(
				'in_use'=>'N',
			);
			$results = $this->standard_model->updateRecord('tbl_fees_exemption','fees_exemption_id',$id,$feesExemption);
			if($results)
			{
				$fetchdata = $this->standard_model->selectAllWhr('tbl_fees_exemption','fees_exemption_id',$details['fees_exemption_id']);
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
		        $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide Fees Exemption Master';
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
		   );
	    }
	}

    /*
	=================================================================================
	Author:Tukaram Gavade                        Date:19/11/2021
	=================================================================================
	Purpose: Restore Fees Exemption Master
	return array(
			'state'=>TRUE,
			'msg'=>'Fees Exemption Master restored!',
			'details'=>$details
		);
	*/
	public function _restore_fees_exemption($details=false)
	{
		$details = $this->decryptArray($details);
		if(isset($details['fees_exemption_id']))
	    {
			$id=$details['fees_exemption_id'];
			// $details = $this->decryptArray($details);
			$feesExemption_master=array(
				'in_use'=>'Y',
			);
			$results = $this->standard_model->updateRecord('tbl_fees_exemption','fees_exemption_id',$id,$feesExemption_master);
			if($results)
			{
				$fetchdata = $this->standard_model->selectAllWhr('tbl_fees_exemption','fees_exemption_id',$details['fees_exemption_id']);
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
			'msg'=>'gallery_master_id Required!',
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
       
        if(isset($details['fees_exemption_id']))
        {    
            $id=$details['fees_exemption_id'];
            $feesExemption=array(
                'display'=>'N',
            );
            $results = $this->standard_model->updateRecord('tbl_fees_exemption','fees_exemption_id',$id,$feesExemption);
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