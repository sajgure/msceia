<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Inspection_api extends Base_Controller 
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
	Purpose: Get list for inspection
	return array(
	 	'state'=>TRUE,
          'msg'=>'Records Found!',
          'details'=>array(
           array(
                "inspection_id"=>"1",
                "photo"=>"a.jpg",
                "name"=>"Mr.Prakash Karale",
                "designation"=>"adhyaksh",
               ),
            )  
	 );
    */
	public function _get_inspection($details=false)
    {
		$details = $this->decryptArray($details);
		if(isset($details['inspection_id']))
		{
		 $results = $this->standard_model->selectAllWhr('tbl_inspection','inspection_id',$details['inspection_id']);
		}
		else if(isset($details['all'])){
		 $results= $this->standard_model->selectAll('tbl_inspection');
		}
		else {
		   $results= $this->standard_model->selectAll('tbl_inspection','in_use','Y');
		}
        if($results)
        {
        	$data=array();


                foreach ($results as $result)
                {
                  
                  $result->inst_reg_date=date('d-m-Y',strtotime($result->inst_reg_date));
                  $result->first_reg_date=date('d-m-Y',strtotime($result->first_reg_date));
                  $result->reg_date=date('d-m-Y',strtotime($result->reg_date));
                  $result->visite_date=date('d-m-Y',strtotime($result->visite_date));
                  $result->receipt1_date=date('d-m-Y',strtotime($result->receipt1_date));
                  $result->receipt2_date=date('d-m-Y',strtotime($result->receipt2_date));
                  $result->receipt3_date=date('d-m-Y',strtotime($result->receipt3_date));
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
			// $result= $this->encryptArray($result);
        }
        else
        {
             return array(
                  'msg'=>'No record found!',
                  'state'=>false,
                  'details'=>$details['inspection_id']
            );
        }
    }
	/*
	=================================================================================
    Author:Mrudul Thite                        Date:28/02/2020
	=================================================================================
	Purpose: Save user inspection
	return array(
			'state'=>TRUE,
			'msg'=>'New inspection added!',
			'details'=>$details
		);
    */
    public function _set_inspection($details=false)
	{
	  	$validation_error='';
        $details = $this->decryptArray($details);
        // echo $details['agreement']; die;
    if(isset($details['inspection_id']) && !empty($details['inspection_id']))
    {
      $flag=1;
    }
    else
    {
      $flag=0;
    }
       
        if($this->validationinspectionDetails($details))
		{
            if($details)
            {
                $user_id= $this->session->userdata('user_id');
                $inspection = array(
                          'institute_id'=>$details['institute_id'],
            // $id = $details['inspection_id'],
            'inst_name' => $details['inst_name'],
            'inst_address' => $details['inst_address'],
            'inst_reg_date' => $details['inst_reg_date'],
            'inst_reg_no' => $details['inst_reg_no'],
            'first_reg_date' => $details['first_reg_date'],
            'first_reg_no' => $details['first_reg_no'],
            'mar_30' => $details['mar_30'],
            'mar_40' => $details['mar_40'],
            'hin_30'  => $details['hin_30'],
            'hin_40' => $details['hin_40'],
            'eng_30' => $details['eng_30'],
            'eng_40' => $details['eng_40'],
            's_skill' => $details['s_skill'],
            'reg_date' => $details['reg_date'],
            'reg_no' => $details['reg_no'],
            'reg_no2' => $details['reg_no2'],
            'owner_name'=> $details['owner_name'],
            'officer_desc' => $details['officer_desc'],
            'visite_date' => $details['visite_date'],
            // 'visite_time '=> $details['visite_time'],
            'server_before' => $details['server_before'],
            'server_after' => $details['server_after'],
            'server_remark' => $details['server_remark'],
            'client_before' => $details['client_before'],
            'client_after' => $details['client_after'],
            'client_remark' => $details['client_remark'],
            'scanner_before' => $details['scanner_before'],
            'scanner_after' => $details['scanner_after'],
            'scanner_remark' => $details['scanner_remark'],
            'printer_before' => $details['printer_before'],
            'printer_after' => $details['printer_after'],
            'printer_remark' => $details['printer_remark'],
            'chair_before' => $details['chair_before'],
            'chair_after' => $details['chair_after'],
            'chair_remark' => $details['chair_remark'],
            'table_before' => $details['table_before'],
            'table_after' => $details['table_after'],
            'table_remark' => $details['table_remark'],
            'stool_before' => $details['stool_before'],
            'stool_after' => $details['stool_after'],
            'stool_remark' => $details['stool_remark'],
            'cabinet_before' => $details['cabinet_before'],
            'cabinet_after' => $details['cabinet_after'],
            'cabinet_remark' => $details['cabinet_remark'],
            'rack_before' => $details['rack_before'],
            'rack_after' => $details['rack_after'],
            'rack_remark' => $details['rack_remark'],
            'other_before' => $details['other_before'],
            'other_after' => $details['other_after'],
            'other_remark' => $details['other_remark'],
            'receipt1' => $details['receipt1'],
            'receipt2' => $details['receipt2'],
            'receipt3' => $details['receipt3'],
            'receipt1_date' => $details['receipt1_date'],
            'receipt2_date' => $details['receipt2_date'],
            'receipt3_date' => $details['receipt3_date'],
            'receipt1' => $details['receipt1'],
            'receipt2' => $details['receipt2'],
            'receipt3' => $details['receipt3'],
            'instructor_qual1' => $details['instructor_qual1'],
            'instructor_qual2' => $details['instructor_qual2'],
            'instructor_qual' => $details['instructor_qual'],
            'setup_allow' => $details['setup_allow'],
            'setup_done' => $details['setup_done'],
            'total_setup' => $details['total_setup'],
            'inst_owner' => $details['inst_owner'],
            'inst_owner_pos' => $details['inst_owner_pos'],
            // 'owner_qual'=> $details['owner_qual'],
            'form_date' => $details['form_date'],
            'place '=> $details['place'],
            'officer_name '=> $details['officer_name'],
            'officer_name2' => $details['officer_name2'],
            'officer_position' => $details['officer_position'],
            'mobile1 '=> $details['mobile1'],
            'mobile2' => $details['mobile2'],
            'modified_by'=>$user_id,
            'modified_on'=>date('Y-m-d H:i:s'),
            'inspection_id'=>isset($details['inspection_id'])?$details['inspection_id']:NULL);
              if(!isset($details['inspection_id']) && empty($details['inspection_id']))
              {
                    $inspection['inserted_by']=$user_id;
                    $inspection['inserted_on']=date('Y-m-d H:i:s');
              }
              if(isset($details['form_date']) && !empty($details['form_date']))
              {
                  $inspection['form_date']=date('Y-m-d',strtotime($details['form_date']));
              }
              else
              {
                  $inspection['form_date']=NULL;
              } 
              if(isset($details['inst_reg_date']) && !empty($details['inst_reg_date']))
	            {
	                $inspection['inst_reg_date']=date('Y-m-d',strtotime($details['inst_reg_date']));
	            }
	            else
	            {
	                $inspection['inst_reg_date']=NULL;
	            } 
              
              if(isset($details['first_reg_date']) && !empty($details['first_reg_date']))
              {
                  $inspection['first_reg_date']=date('Y-m-d',strtotime($details['first_reg_date']));
              }
              else
              {
                  $inspection['first_reg_date']=NULL;
              } 

              if(isset($details['reg_date']) && !empty($details['reg_date']))
              {
                  $inspection['reg_date']=date('Y-m-d',strtotime($details['reg_date']));
              }
              else
              {
                  $inspection['reg_date']=NULL;
              } 

              if(isset($details['visite_date']) && !empty($details['visite_date']))
              {
                  $inspection['visite_date']=date('Y-m-d',strtotime($details['visite_date']));
              }
              else
              {
                  $inspection['visite_date']=NULL;
              } 

              if(isset($details['receipt1_date']) && !empty($details['receipt1_date']))
              {
                  $inspection['receipt1_date']=date('Y-m-d',strtotime($details['receipt1_date']));
              }
              else
              {
                  $inspection['receipt1_date']=NULL;
              } 

              if(isset($details['receipt2_date']) && !empty($details['receipt2_date']))
              {
                  $inspection['receipt2_date']=date('Y-m-d',strtotime($details['receipt2_date']));
              }
              else
              {
                  $inspection['receipt2_date']=NULL;
              } 

              if(isset($details['receipt3_date']) && !empty($details['receipt3_date']))
              {
                  $inspection['receipt3_date']=date('Y-m-d',strtotime($details['receipt3_date']));
              }
              else
              {
                  $inspection['receipt3_date']=NULL;
              }
              if($details['agreement']=='Y')
              {
                $inspection['agreement']= $details['agreement'];
              }
              else
              {
                $inspection['agreement']= 'N';
              }
              if($details['internet']=='Y')
              {
                $inspection['internet']= $details['internet'];
              }
              else
              {
                $inspection['internet']= 'N';
              }

              if($details['inverter']=='Y')
              {
                $inspection['inverter']= $details['inverter'];
              }
              else
              {
                $inspection['inverter']= 'N';
              }

              if($details['area']=='Y')
              {
                $inspection['area']= $details['area'];
              }
              else
              {
                $inspection['area']= 'N';
              }

              if($details['instructor']=='Y')
              {
                $inspection['instructor']= $details['instructor'];
              }
              else
              {
                $inspection['instructor']= 'N';
              }



            //     $inspection_id = $this->standard_model->single_insert('tbl_inspection',$inspection);
            //     $inspection['inspection_id']=$inspection_id;
            //     $inspection= $this->encryptArray($inspection);
            // if($flag==0)
            //     {
            //     return array(
            //                 'state'=>true,
            //                 'msg'=>'inspection added!',
            //                 'details'=>$inspection
            //                 );
            //     }else
            //     {
            //     return array(
            //                 'state'=>true,
            //                 'msg'=>'inspection updated!',
            //                 'details'=>$inspection
            //                 );

            //     }
              $error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
              if($flag==0)
              {
                $inspection['inserted_by']=$user_id;
                $inspection['inserted_on']=date('Y-m-d H:i:s');
                $inspection['display']='Y';
                $inspection['in_use']='Y';
                $inspection_id= $this->standard_model->single_insert('tbl_inspection',$inspection);
                if($error_msg && !empty($error_msg) )
                {                                                       
                  return array(
                    'state'=>false,
                    'msg'=>'Unable to Add Inspection!',
                    'details'=>$error_msg
                  );
                }
                else
                {
                  $inspection['inspection_id']=$inspection_id;
                  $inspection= $this->encryptArray($inspection);
                  return array(
                    'state'=>true,
                    'msg'=>'Advanced Computer Setup Form Saved Successfully!',
                    'details'=>$inspection
                  );
                }
              }
              else
              {                         
                $inspection_id= $this->standard_model->single_insert('tbl_inspection',$inspection);
                if($error_msg && !empty($error_msg) )
                {                                                       
                  return array(
                    'state'=>false,
                    'msg'=>'Unable to Update Inspection!',
                    'details'=>$error_msg
                    );
                }
                else
                {
                  $inspection['inspection_id']=$inspection_id;
                  $inspection= $this->encryptArray($inspection);            
                  return array(
                    'state'=>true,
                    'msg'=>'Advanced Computer Setup Form Updated Successfully!!',
                    'details'=>$inspection
                    );
                }
              }   
            }
            else
            {
                return array(
                'state'=>False,
                'msg'=>'inspection Failed to Saved!',
                'details'=>false
                );
            }
        }
		else
		{
		    $validation_error = validation_errors();
        if(""==$validation_error)
        {
          $validation_error = "Duplicate Entry For institute_id";
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
	Author:Mrudul Thite                        Date:28/02/2020
	=================================================================================
	Purpose: validation for inspection
	*/
	function validationinspectionDetails($details)
    {
	 	
	 	$this->form_validation->set_error_delimiters('','');
     if(isset($details['inspection_id']) && !empty($details['inspection_id']))
    {
      $falg=1;
    }
    else
    {
      $falg=0;
    }
	 	$this->form_validation->set_data(
        array(
          
       'inspection_id'=>isset($details['inspection_id']) ? $details['inspection_id'] :'',
       'institute_id'=>isset($details['institute_id']) ? $details['institute_id'] :'',
       'inst_name'=>isset($details['inst_name']) ? $details['inst_name'] :'',
          'inst_address'=>isset($details['inst_address']) ? $details['inst_address'] :'',
          'inst_reg_date'=>isset($details['inst_reg_date']) ? $details['inst_reg_date'] :'',
          'inst_reg_no'=>isset($details['inst_reg_no']) ? $details['inst_reg_no'] :'',
          'first_reg_date'=>isset($details['first_reg_date']) ? $details['first_reg_date'] :'',
          'first_reg_no'=>isset($details['first_reg_no']) ? $details['first_reg_no'] :'',
          'mar_30'=>isset($details['mar_30']) ? $details['mar_30'] :'',
          'mar_40'=>isset($details['mar_40']) ? $details['mar_40'] :'',
          'hin_30'=>isset($details['hin_30']) ? $details['hin_30'] :'',
          'hin_40'=>isset($details['hin_40']) ? $details['hin_40'] :'',
          'eng_30'=>isset($details['eng_30']) ? $details['eng_30'] :'',
          'eng_40'=>isset($details['eng_40']) ? $details['eng_40'] :'',
          's_skill'=>isset($details['s_skill']) ? $details['s_skill'] :'',
          'reg_date'=>isset($details['reg_date']) ? $details['reg_date'] :'',
          'reg_no'=>isset($details['reg_no']) ? $details['reg_no'] :'',
          'reg_no2'=>isset($details['reg_no2']) ? $details['reg_no2'] :'',
          'owner_name'=>isset($details['owner_name']) ? $details['owner_name'] :'',
          'officer_desc'=>isset($details['officer_desc']) ? $details['officer_desc'] :'',
          'visite_date'=>isset($details['visite_date']) ? $details['visite_date'] :'',
          // 'visite_time'=>isset($details['visite_time']) ? $details['visite_time'] :'',
          'server_before'=>isset($details['server_before']) ? $details['server_before'] :'',
          'server_after'=>isset($details['server_after']) ? $details['server_after'] :'',
          'server_remark'=>isset($details['server_remark']) ? $details['server_remark'] :'',
          'client_before'=>isset($details['client_before']) ? $details['client_before'] :'',
          'client_after'=>isset($details['client_after']) ? $details['client_after'] :'',
          'client_remark'=>isset($details['client_remark']) ? $details['client_remark'] :'',
          'scanner_before'=>isset($details['scanner_before']) ? $details['scanner_before'] :'',
          'scanner_after'=>isset($details['scanner_after']) ? $details['scanner_after'] :'',
          'scanner_remark'=>isset($details['scanner_remark']) ? $details['scanner_remark'] :'',
          'printer_before'=>isset($details['printer_before']) ? $details['printer_before'] :'',
          'printer_after'=>isset($details['printer_after']) ? $details['printer_after'] :'',
          'printer_remark'=>isset($details['printer_remark']) ? $details['printer_remark'] :'',
          'chair_before'=>isset($details['chair_before']) ? $details['chair_before'] :'',
          'chair_after'=>isset($details['chair_after']) ? $details['chair_after'] :'',
          'chair_remark'=>isset($details['chair_remark']) ? $details['chair_remark'] :'',
          'table_before'=>isset($details['table_before']) ? $details['table_before'] :'',
          'table_after'=>isset($details['table_after']) ? $details['table_after'] :'',
          'table_remark'=>isset($details['table_remark']) ? $details['table_remark'] :'',
          'stool_before'=>isset($details['stool_before']) ? $details['stool_before'] :'',
          'stool_after'=>isset($details['stool_after']) ? $details['stool_after'] :'',
          'stool_remark'=>isset($details['stool_remark']) ? $details['stool_remark'] :'',
          'cabinet_before'=>isset($details['cabinet_before']) ? $details['cabinet_before'] :'',
          'cabinet_after'=>isset($details['cabinet_after']) ? $details['cabinet_after'] :'',
          'cabinet_remark'=>isset($details['cabinet_remark']) ? $details['cabinet_remark'] :'',
          'rack_before'=>isset($details['rack_before']) ? $details['rack_before'] :'',
          'rack_after'=>isset($details['rack_after']) ? $details['rack_after'] :'',
          'rack_remark'=>isset($details['rack_remark']) ? $details['rack_remark'] :'',
          'other_before'=>isset($details['other_before']) ? $details['other_before'] :'',
          'other_after'=>isset($details['other_after']) ? $details['other_after'] :'',
          'other_remark'=>isset($details['other_remark']) ? $details['other_remark'] :'',
          'receipt1'=>isset($details['receipt1']) ? $details['receipt1'] :'',
          'receipt2'=>isset($details['receipt2']) ? $details['receipt2'] :'',
          'receipt3'=>isset($details['receipt3']) ? $details['receipt3'] :'',
          'receipt1_date'=>isset($details['receipt1_date']) ? $details['receipt1_date'] :'',
          'receipt2_date'=>isset($details['receipt2_date']) ? $details['receipt2_date'] :'',
          'receipt3_date'=>isset($details['receipt3_date']) ? $details['receipt3_date'] :'',
          'instructor_qual1'=>isset($details['instructor_qual1']) ? $details['instructor_qual1'] :'',
          'instructor_qual2'=>isset($details['instructor_qual2']) ? $details['instructor_qual2'] :'',
          'instructor_qual'=>isset($details['instructor_qual']) ? $details['instructor_qual'] :'',
          'setup_allow'=>isset($details['setup_allow']) ? $details['setup_allow'] :'',
          'setup_done'=>isset($details['setup_done']) ? $details['setup_done'] :'',
          'total_setup'=>isset($details['total_setup']) ? $details['total_setup'] :'',
          'inst_owner'=>isset($details['inst_owner']) ? $details['inst_owner'] :'',
          'inst_owner_pos'=>isset($details['inst_owner_pos']) ? $details['inst_owner_pos'] :'',
          // 'owner_qual'=>isset($details['owner_qual']) ? $details['owner_qual'] :'',
          'form_date'=>isset($details['form_date']) ? $details['form_date'] :'',
          'place'=>isset($details['place']) ? $details['place'] :'',
          'officer_name'=>isset($details['officer_name']) ? $details['officer_name'] :'',
          'officer_name2'=>isset($details['officer_name2']) ? $details['officer_name2'] :'',
          'officer_position'=>isset($details['officer_position']) ? $details['officer_position'] :'',
          'mobile1'=>isset($details['mobile1']) ? $details['mobile1'] :'',
          'mobile2'=>isset($details['mobile2']) ? $details['mobile2'] :'',

              )
        );

        if(isset($details['inspection_id']) && $details['inspection_id'] !='' ){
		 $this->form_validation->set_rules('inspection_id', 'inspection_id',array('required'),
                    array(
                      'required'=>'inspection_id is Required'
                    )
		); 
		}else{
            
        }
		
    if($falg==0){
      $this->form_validation->set_rules('institute_id', 'institute_id',array('required','is_unique[tbl_inspection.institute_id]'),
                                                                                                                
          array(
                'required'=>'institute_id  is Required'                
          ));
          $institute_id = $details['institute_id'];
          $flag1 = $this->standard_model->check_is_unique('tbl_inspection','institute_id',$institute_id);
    }else{
      $this->form_validation->set_rules('institute_id', 'institute_id',array('required'),
                                                                                                                
          array(
                'required'=>'institute_id  is Required'
          ));
    }
		$this->form_validation->set_rules('inst_name', 'inst_name',array('required'),
                                                                                                                
        	array(
                'required'=>'inst_name is Required'
          ));
	    $this->form_validation->set_rules('inst_address', 'inst_address',array('required'),
                                                                                                                
          array(
                'required'=>'inst_address is Required'
          ));

		$this->form_validation->set_rules('inst_reg_date', 'inst_reg_date',array('required'),
                 array(
                  'required'=>'inst_reg_date is Required' 
                  ));
     	$this->form_validation->set_rules('inst_reg_no', 'inst_reg_no',array('required'),
                 array(
                  'required'=>'inst_reg_no is Required'
                  ));
     	$this->form_validation->set_rules('first_reg_date', 'first_reg_date',array('required'),
                 array(
                  'required'=>'first_reg_date is Required'
                  ));
     	$this->form_validation->set_rules('first_reg_no', 'first_reg_no',array('required'),
                 array(
                  'required'=>'first_reg_no is Required'
                  ));

    	$this->form_validation->set_rules('mar_30', 'mar_30',array('required'),
                 array(
                  'required'=>'mar_30 is Required'
                  ));
        $this->form_validation->set_rules('mar_40', 'mar_40',array('required'),
                 array(
                  'required'=>'mar_40 is Required'
                  ));

        $this->form_validation->set_rules('hin_30', 'hin_30',array('required'),
                 array(
                  'required'=>'hin_30 is Required'
                  ));
        $this->form_validation->set_rules('hin_40', 'hin_40',array('required'),
                 array(
                  'required'=>'hin_40 is Required'
                  ));
        $this->form_validation->set_rules('eng_30', 'eng_30',array('required'),
                 array(
                  'required'=>'eng_30 is Required'
                  ));
        $this->form_validation->set_rules('eng_40', 'eng_40',array('required'),
                 array(
                  'required'=>'eng_40 is Required'
                  ));
       $this->form_validation->set_rules('s_skill', 's_skill',array('required'),
                 array(
                  'required'=>'s_skill is Required'
                  ));
        $this->form_validation->set_rules('reg_date', 'reg_date',array('required'),
                 array(
                  'required'=>'reg_date is Required' 
                  ));
        $this->form_validation->set_rules('reg_no', 'reg_no',array('required'),
                 array(
                  'required'=>'reg_no is Required'
                  // 'regex_match'=>'rN Only alphanumeric chars are allowed.'
                  ));
        $this->form_validation->set_rules('reg_no2', 'reg_no2',array('required'),
                 array(
                  'required'=>'reg_no2 is Required'
                  // 'regex_match'=>'A Only alphanumeric chars are allowed.'
                  ));
        $this->form_validation->set_rules('owner_name', 'owner_name',array('required'),
                 array(
                  'required'=>'owner_name is Required' 
                  ));
        $this->form_validation->set_rules('officer_desc', 'officer_desc',array('required'),
                 array(
                  'required'=>'officer_desc is Required'
                  // 'regex_match'=>'Only alphanumeric chars are allowed.'
                  ));
        $this->form_validation->set_rules('visite_date', 'visite_date',array('required'),
                 array(
                  'required'=>'visite_date is Required'
                  ));
        // $this->form_validation->set_rules('visite_time', 'visite_time',array('required'),
        //           array(
        //             'required'=>'visite_time is Required'
                    
        //           ));
		$this->form_validation->set_rules('server_before', 'server_before',array('required'),
                                                                                                                
          array(
                'required'=>'server_before  is Required'
          ));
    	$this->form_validation->set_rules('server_after', 'server_after',array('required'),
                                                                                                                
          array(
                'required'=>'server_after  is Required'
          ));
    	$this->form_validation->set_rules('server_remark', 'server_remark',array('required'),
                                                                                                                
          array(
                'required'=>'server_remark  is Required'
                
          ));
                  
    	$this->form_validation->set_rules('client_before', 'client_before',array('required'),
                                                                                                                
          array(
                'required'=>'client_before  is Required'
          ));
    	$this->form_validation->set_rules('client_after', 'client_after',array('required'),
                                                                                                                
          array(
                'required'=>'client_after  is Required'
          ));
    	$this->form_validation->set_rules('client_remark', 'client_remark',array('required'),
                                                                                                                
          array(
                'required'=>'client_remark  is Required'
          ));
		$this->form_validation->set_rules('scanner_before', 'scanner_before',array('required'),
                                                                                                                
          array(
                'required'=>'scanner_before  is Required'
          ));
    	$this->form_validation->set_rules('scanner_after', 'scanner_after',array('required'),
                                                                                                                
          array(
                'required'=>'scanner_after  is Required'
          ));
    	$this->form_validation->set_rules('scanner_remark', 'scanner_remark',array('required'),
                                                                                                                
          array(
                'required'=>'scanner_remark  is Required'
          ));
    	$this->form_validation->set_rules('printer_before', 'printer_before',array('required'),
                                                                                                                
          array(
                'required'=>'printer_before  is Required'
          ));
    	$this->form_validation->set_rules('printer_after', 'printer_after',array('required'),
                                                                                                                
          array(
                'required'=>'printer_after  is Required'
          ));
    	$this->form_validation->set_rules('printer_remark', 'printer_remark',array('required'),
                                                                                                                
          array(
                'required'=>'printer_remark  is Required'
          ));
    	$this->form_validation->set_rules('chair_before', 'chair_before',array('required'),
                                                                                                                
          array(
                'required'=>'chair_before  is Required'
          ));
    	$this->form_validation->set_rules('chair_after', 'chair_after',array('required'),
                                                                                                                
          array(
                'required'=>'chair_after  is Required'
          ));
    	$this->form_validation->set_rules('chair_remark', 'chair_remark',array('required'),
                                                                                                                
          array(
                'required'=>'chair_remark  is Required'
          ));
    	$this->form_validation->set_rules('table_before', 'table_before',array('required'),
                                                                                                                
          array(
                'required'=>'table_before  is Required'
                
          ));
    	$this->form_validation->set_rules('table_after', 'table_after',array('required'),
                                                                                                                
          array(
                'required'=>'table_after  is Required'
          ));
    	$this->form_validation->set_rules('table_remark', 'table_remark',array('required'),
                                                                                                                
          array(
                'required'=>'table_remark  is Required'
          ));
    	$this->form_validation->set_rules('stool_before', 'stool_before',array('required'),
                                                                                                                
          array(
                'required'=>'stool_before  is Required'
          ));
    	$this->form_validation->set_rules('stool_after', 'stool_after',array('required'),
                                                                                                                
          array(
                'required'=>'stool_after  is Required'
          ));
    	$this->form_validation->set_rules('stool_remark', 'stool_remark',array('required'),
                                                                                                                
          array(
                'required'=>'stool_remark  is Required'
          ));
    	$this->form_validation->set_rules('cabinet_before', 'cabinet_before',array('required'),
                                                                                                                
          array(
                'required'=>'cabinet_before  is Required'
          ));
    	$this->form_validation->set_rules('cabinet_after', 'cabinet_after',array('required'),
                                                                                                                
          array(
                'required'=>'cabinet_after  is Required'
          ));
    	$this->form_validation->set_rules('cabinet_remark', 'cabinet_remark',array('required'),
                                                                                                                
          array(
                'required'=>'cabinet_remark  is Required'
          ));
  		$this->form_validation->set_rules('rack_before', 'rack_before',array('required'),
                                                                                                                
          array(
                'required'=>'rack_before  is Required'
          ));
    	$this->form_validation->set_rules('rack_after', 'rack_after',array('required'),
                                                                                                                
          array(
                'required'=>'rack_after  is Required'
          ));
    	$this->form_validation->set_rules('rack_remark', 'rack_remark',array('required'),
                                                                                                                
          array(
                'required'=>'rack_remark  is Required'
          ));
    	$this->form_validation->set_rules('other_before', 'other_before',array('required'),
                                                                                                                
          array(
                'required'=>'other_before  is Required'
          ));
    	$this->form_validation->set_rules('other_after', 'other_after',array('required'),
                                                                                                                
          array(
                'required'=>'other_after  is Required'
          ));
    	$this->form_validation->set_rules('other_remark', 'other_remark',array('required'),
                                                                                                                
          array(
                'required'=>'other_remark  is Required'
          ));
    	$this->form_validation->set_rules('receipt1', 'receipt1',array('required'),
                                                                                                                
          array(
                'required'=>'receipt1  is Required'
          ));
    	$this->form_validation->set_rules('receipt2', 'receipt2',array('required'),
                                                                                                                
          array(
                'required'=>'receipt2  is Required'
          ));
    	$this->form_validation->set_rules('receipt3', 'receipt3',array('required'),
                                                                                                                
          array(
                'required'=>'receipt3  is Required'
          ));
     	$this->form_validation->set_rules('receipt1_date', 'receipt1_date',array('required'),
                 array(
                  'required'=>'receipt1_date is Required' 
                  ));
      	$this->form_validation->set_rules('receipt2_date', 'receipt2_date',array('required'),
                 array(
                  'required'=>'receipt2_date is Required' 
                  ));
       	$this->form_validation->set_rules('receipt3_date', 'receipt3_date',array('required'),
                 array(
                  'required'=>'receipt3_date is Required' 
                  ));
        $this->form_validation->set_rules('instructor_qual1', 'instructor_qual1',array('required'),
                 array(
                  'required'=>'instructor_qual1 is Required' 
                  ));
        $this->form_validation->set_rules('instructor_qual2', 'instructor_qual2',array('required'),
                 array(
                  'required'=>'instructor_qual2 is Required' 
                  ));
        $this->form_validation->set_rules('setup_allow', 'setup_allow',array('required'),
                 array(
                  'required'=>'setup_allow is Required' 
                  ));
        $this->form_validation->set_rules('setup_done', 'setup_done',array('required'),
                 array(
                  'required'=>'setup_done is Required' 
                  ));
        $this->form_validation->set_rules('total_setup', 'total_setup',array('required'),
                 array(
                  'required'=>'total_setup is Required' 
                  ));
        $this->form_validation->set_rules('inst_owner', 'inst_owner',array('required'),
                 array(
                  'required'=>'inst_owner is Required' 
                  ));
        $this->form_validation->set_rules('inst_owner_pos', 'inst_owner_pos',array('required'),
                 array(
                  'required'=>'inst_owner_pos is Required' 
                  ));
        // $this->form_validation->set_rules('owner_qual', 'owner_qual',array('required'),
        //          array(
        //           'required'=>'owner_qual is Required' 
        //           ));
        $this->form_validation->set_rules('form_date', 'form_date',array('required'),
                 array(
                  'required'=>'form_date is Required' 
                  ));
        $this->form_validation->set_rules('place', 'place',array('required'),
                 array(
                  'required'=>'place is Required' 
                  ));
        $this->form_validation->set_rules('officer_name', 'officer_name',array('required'),
                 array(
                  'required'=>'officer_name is Required' 
                  ));
        $this->form_validation->set_rules('officer_name2', 'officer_name2',array('required'),
                 array(
                  'required'=>'officer_name2 is Required' 
                  ));
        $this->form_validation->set_rules('officer_position', 'officer_position',array('required'),
                 array(
                  'required'=>'officer_position is Required' 
                  ));
        $this->form_validation->set_rules('mobile1', 'mobile1',array('required'),
                 array(
                  'required'=>'mobile1 is Required' 
                  ));
        $this->form_validation->set_rules('mobile2', 'mobile2',array('required'),
                 array(
                  'required'=>'mobile2 is Required' 
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
	 Author:Mrudul Thite                        Date:28/02/2020
	=================================================================================
	Purpose: Hide inspection
	return array(
	 		'state'=>TRUE,
	 		'msg'=>'inspection hidden!',
	 		'details'=>$details
	 	);
	*/
	// public function _hide_inspection($details=false)
	// {
	// 	$details = $this->decryptArray($details);
	// 	if(isset($details['inspection_id']))
	// 	{
	// 		$id=$details['inspection_id'];
	// 		$inspection=array(
	// 			'in_use'=>'N',
	// 		);
	// 		$results = $this->standard_model->updateRecord('tbl_inspection','inspection_id',$id,$inspection);
	// 		if($results)
	// 		{
	// 			$results = $this->encryptArray($details);
	// 				return array(
	// 					'state'=>true,
	// 					'msg'=>'inspection Hidden!',
	// 					'details'=>$results
	// 				);
	// 		}
	// 		else
	// 		{
	// 			$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide inspection';
	// 			return array(
	// 				'state'=>false,
	// 				'msg'=>$message,
	// 				'details'=>false
	// 		    );
	// 		}
	// 	}
	// 	else
	// 	{
	// 		return array(
	// 		'state'=>false,
	// 		'msg'=>'inspection_id Required!',
	// 		);
	// 	}
	// }
	/*
	=================================================================================
	Author:Mrudul Thite                        Date:31/01/2020
	=================================================================================
	Purpose: Restore inspection
	return array(
		'state'=>TRUE,
		'msg'=>'inspection restored!',
		'details'=>$details
	);
	*/
	// public function _restore_inspection($details=false)
	// {
	// 	$details = $this->decryptArray($details);
	// 	if(isset($details['inspection_id']))
	// 	{	
	// 	    $id=$details['inspection_id'];
	// 		// $details = $this->decryptArray($details);
	// 		$inspection=array(
	// 			'in_use'=>'Y',
	// 		);
	// 		$results = $this->standard_model->updateRecord('tbl_inspection','inspection_id',$id,$inspection);
	// 		if($results)
	// 		{
	// 			$results = $this->encryptArray($details);
	// 				return array(
	// 					'state'=>true,
	// 					'msg'=>'inspection Restore!',
	// 					'details'=>$results
	// 				);
	// 		}
	// 		else
	// 		{
	// 			$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide inspection';
	// 			return array(
	// 					'state'=>false,
	// 					'msg'=>$message,
	// 					'details'=>false
	// 			);
	// 		}
	// 	}
	// 	else
	// 	{
	// 		return array(
	// 		'state'=>false,
	// 		'msg'=>'inspection_topic_id Required!',
	// 		);
	// 	} 
	// }
	/*
	=================================================================================
	Author:Mrudul Thite                        Date:31/01/2020
	=================================================================================
	Purpose:Delete inspection
	/*return array(
		'state'=>TRUE,
		'msg'=>'inspection deleted!',
		'details'=>$details
	);
	*/
	public function _permanent_delete_inspection($details=null)
	{  
		if(isset($details['inspection_id']))
		{    
			$details = $this->decryptArray($details);
			$id=$details['inspection_id'];
			$inspection=array(
					'display'=>'N',
				);
			$results = $this->standard_model->updateRecord('tbl_inspection','inspection_id',$id,$inspection);
			if($results)
			{
				$results = $this->encryptArray($details);
				return array(
					'state'=>true,
					'msg'=>'Inspection Delete!',
					'details'=>$results
				);
			}
			else
			{
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Delete inspection';
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
			'msg'=>'inspection_id Required!',
			);
		}
	}
}