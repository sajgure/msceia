<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Objective_section_api extends Base_Controller 
{
    public function __construct()
  	{
		parent::__construct();
		$this->load->model('standard/standard_model');
		$this->load->model('objective_section/objective_section_model');
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:04/03/2020
	=================================================================================
	*/
	public function _set_objective_section($details=false)
	{
		$details = $this->decryptArray($details);
		if($details)
		{
			$user_id= $this->session->userdata('user_id');
			$id=isset($details['question_id'])?$details['question_id']:NULL;
			$ans_option=$details['ans_option'];
			$data = array(
				'question_id'=>isset($details['question_id'])?$details['question_id']:NULL,
				'section_id'=>$details['section_id'],
				'exam_type'=>$details['exam_type'],
				'question_english'=>$details['question_english'],
				'question_marathi'=>$details['question_marathi'],
				'question_hindi'=>$details['question_hindi'],
				// 'ans_option'=>$ans_option,
			    'option_id'=>0,
			    'modified_by'=>$user_id
				);
			if(empty($id))
			{
				$data['inserted_by']=$user_id;
				$data['inserted_on']=date('Y-m-d H:i:s');
			}
			$optioncount=count((array)$details['option']);
			for($i=0;$i<$optioncount;$i++)
			{
				if(isset($details['option'][$i]) && !empty($details['option'][$i]))
                {
					$opt_data[] = array('option'=>$details['option'][$i]);
				}	
			}	
				
			if(isset($id) && !empty($id) && ($id>0)) 
			{
				$option_id=$details['option_id'];
				$result = $this->objective_section_model->update_objective($data,$opt_data,$option_id,$id,$ans_option);
				$result1=$this->common_model->selectDetailsWhr('tbl_question','question_id',$id);
				$option_id = $result1->option_id;
				$result2=$this->common_model->selectDetailsWhr('tbl_option','option_id',$option_id);
				$option = $result2->option;
			    $question = array(	  
			    'ans_option'=>$option);
			    $result3 =  $this->objective_section_model->update_ans_option($id,$question);
                if($result)  
				{
					return array(
						'state'=>true,
						'msg'=>'Question Details Updated Successfully!',
						'details'=>$result
					);
				}	
				else{
					return array(
						'state'=>false,
						'msg'=>'While Updating Question Details!',
						'details'=>false
					);
				}		    
			}
			else{

				$result =  $this->objective_section_model->save_objective($data,$opt_data,$ans_option);
        	    $result1=$this->common_model->selectDetailsWhr('tbl_question','question_id',$result);
        	    $question_id = $result1->question_id;
        	    $option_id = $result1->option_id;
        	    $result2=$this->common_model->selectDetailsWhr('tbl_option','option_id',$option_id);
			    $option = $result2->option;
			    $question = array(	  
			    'ans_option'=>$option);
			    $result3 =  $this->objective_section_model->set_ans_option($question_id,$question);
				if($result)
				{
					return array(
						'state'=>true,
						'msg'=>'Question Details Saved Successfully!',
						'details'=>$result
					);
				}
				else
				{
					return array(
						'state'=>false,
						'msg'=>' While Saving Question Details !',
						'details'=>false
					);
				}
			}
		}
	}
	/*
    =================================================================================
    Author:Shubhangi Jagadale                        Date:04/03/2020
    =================================================================================
    */
	public function _get_objective_section($details=false)
	{
		$details = $this->decryptArray($details);
		if(isset($details['question_id']))
		{
		$results = $this->standard_model->alljoin3tbl_whr('tbl_question','tbl_section','tbl_option','section_id','option_id','question_id',$details['question_id']);
		}
		else if(isset($details['all'])){
		$results= $this->standard_model->selectAll3Join('tbl_question','tbl_section','tbl_option','section_id','option_id','question_id');
		}
		else {
		$results= $this->standard_model->selectAll3Join('tbl_question','tbl_section','tbl_option','section_id','option_id','in_use','Y');
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
    Author:Mohamamd Shafi                        Date:16/03/2021
    =================================================================================
    */
	public function _hide_objective_section($details=false)
	{
	    $details = $this->decryptArray($details);
	    if(isset($details['question_id']))
	    {
	      $id=$details['question_id'];
	      $records= array('in_use'=>'N');
	      $result = $this->standard_model->updateRecord('tbl_question','question_id',$id,$records);
	      if($result)
	        { 
		        $result = $this->encryptArray($details);
		        return array(
	                'state'=>true,
	                'msg'=>'Record Hide Successfully!',
	                'details'=>$result
		        );
	        }
	      	else
	       	{
		        $message = isset($this->standard_model->error )?$this->standard_model->error['message']:'Unable to hide Slider Master';
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
              'msg'=>'question_id Required!',
              'details'=>false
            );
      	}
	}

	public function _restore_objective_section($details=false)
	{
	    $details = $this->decryptArray($details);
	    if(isset($details['question_id']))
	    {
		    $id=$details['question_id'];
		    $records= array('in_use'=>'Y');
		    $result = $this->standard_model->updateRecord('tbl_question','question_id',$id,$records);
		    if($result)
		    {
			    $result= $this->encryptArray($details);
			    return array(
	              'state'=>true,
	              'msg'=>'Record Restore Successfully!',
	              'details'=>$result
	            );
		    }
		    else
	        {
		        $message = isset($this->standard_model->error )?$this->standard_model->error['message']:'Unable to restore Slider Master';
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
              'msg'=>'question_id Required!',
              'details'=>false
            );
	    }    
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:04/03/2020
	=================================================================================
	Purpose:Delete objective_section
	/*return array(
		'state'=>TRUE,
		'msg'=>'objective_section deleted!',
		'details'=>$details
	);
	*/
	public function _delete_objective_section($details=null)
	{  
		 $details = $this->decryptArray($details);
		if(isset($details['question_id']))
		{    
			$id=$details['question_id'];
			$question=array(
					'display'=>'N',
				);
			$results = $this->standard_model->updateRecord('tbl_question','question_id',$id,$question);
			if($results)
			{
				 $results = $this->encryptArray($details);
				return array(
					'state'=>true,
					'msg'=>'question Delete!',
					'details'=>$results
				);
			}
			else
			{
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable question_english Delete question';
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
			'msg'=>'question_id Required!',
			);
		}
	}

	/*
	=================================================================================
	Author:Mohammad Shafi                        Date:30/03/2021
	=================================================================================
	Purpose:Date Wise order payment details
	/*return array(
			'state'=>true,
			'view'=>$view
			);
	*/
	public function _search_payment($details=null)
	{
		$details = $this->decryptArray($details);
		$from_date = $details['from_date'];
		$from_date1 = strtr($from_date,'/','-');
    	$fdate = date('Y-m-d',strtotime($from_date1));
		$to_date = $details['to_date'];
		$to_date1 = strtr($to_date,'/','-');
    	$tdate = date('Y-m-d',strtotime($to_date1));
    	$data['fdate'] = $fdate;
    	$data['tdate'] = $tdate;
    	$data['payment_data']=$this->objective_section_model->payment_data($fdate,$tdate);
    	$view = $this->load->view('payment_view',$data,true);
	    return array(
			'state'=>true,
			'view'=>$view
			);
	}
	/*
	=================================================================================
	Author:Mohammad Shafi                        Date:02/04/2021
	=================================================================================
	Purpose:payment status change
	*/

	public function _save_sa_payment($details=false)
	{
		$details = $this->decryptArray($details);
			if(isset($details['order_id']))
			{
				$order_id = $details['order_id'];
			$cnt = count($order_id);
			$data = array('payment_status'=>'COMPLETE');  
			$this->db->trans_start();
			for ($i=0; $i <$cnt ; $i++) 
			{ 
				$this->common_model->updateDetails('tbl_order','order_id',$order_id[$i],$data);
			}
			$result=$this->db->trans_complete();
			if($result)
			{
				return array(
					'state'=>true,
					'msg'=>'Payment Status Changed Successfully!',
					'details'=>$result
				);
			}
			else
			{
				return array(
					'state'=>false,
					'msg'=>'Oops Something Went Wrong.'
				);
			}
		}
		else
		{
			return array(
				'state'=>false,
				'msg'=>'Order Id Required.'
			);
		}
	}
	/*
	=================================================================================
	Author:Mohammad Shafi                        Date:02/04/2021
	=================================================================================
	Purpose:District Wise product details
	/*return array(
			'state'=>true,
			'view'=>$view
			);
	*/

	public function _search_district_wise($details=false)
    {
    	// $details = $this->decryptArray($details);
    	$district = $details['district'];
    	$from_date = $details['from_date'];
    	$from_date1 = strtr($from_date,'/','-');
    	$fdate = date('Y-m-d',strtotime($from_date1));
    	$to_date = $details['to_date'];
		$to_date1 = strtr($to_date,'/','-');
    	$tdate = date('Y-m-d',strtotime($to_date1));
    	$data['district']=$district;
    	$data['fdate']=$fdate;
    	$data['tdate']=$tdate;
    	$data['district_wise_data']= $this->objective_section_model->district_data($district,$fdate,$tdate);
    	$view = $this->load->view('district_view',$data,true);
    	return array(
    		'state'=>true,
    		'view'=>$view
    	);

    }

    /*
	=================================================================================
	Author:Mohammad Shafi                        Date:02/04/2021
	=================================================================================
	Purpose:District order details report
	/*return array(
			'state'=>true,
			'view'=>$view
			);
	*/

	public function _search_district_details($details=false)
    {
    	// $details = $this->decryptArray($details);
    	$district = $details['district'];
    	$from_date = $details['from_date'];
		$from_date1 = strtr($from_date,'/','-');
    	$fdate = date('Y-m-d',strtotime($from_date1));
		$to_date = $details['to_date'];
		$to_date1 = strtr($to_date,'/','-');
    	$tdate = date('Y-m-d',strtotime($to_date1));
    	$data['fdate'] = $fdate;
    	$data['tdate'] = $tdate;
    	$data['district'] = $district;
    	$data['district_details_data']= $this->objective_section_model->district_details_report($district,$fdate,$tdate);
    	$view = $this->load->view('district_details_view',$data,true);
    	return array(
			'state'=>true,
			'view'=>$view
			);
    }

    /*
	=================================================================================
	 Author:Apurva Bandelwar                        Date:04-03-2021
	=================================================================================
	Purpose:Complete District report
	/*return array(
			'state'=>true,
			'view'=>$view
			);
	*/

	public function _search_complete_district_report()
    {
        $district = $this->input->post('district');
        $from_date = $this->input->post('from_date');
        $from_date1 = strtr($from_date, '/', '-');
        $fdate = date('Y-m-d',strtotime($from_date1));
        $to_date = $this->input->post('to_date');
        $to_date1 = strtr($to_date, '/', '-');
        $tdate = date('Y-m-d',strtotime($to_date1));
        $data['district'] = $district;
        $data['fdate'] = $fdate;
        $data['tdate'] = $tdate;
        $data['district_report_data']= $this->objective_section_model->search_complete_district_data($district,$fdate,$tdate);
        // echo $this->db->last_query(); die;
        $view = $this->load->view('dump_complete_district_report',$data,true);
        return array(
            'state'=>true,
            'view'=>$view
        );    
    }
    /*
	=================================================================================
	 Author:Apurva Bandelwar                        Date:07-03-2022
	=================================================================================
	Purpose:Save objective using excel
	/*return array(
			'state'=>true,
			'view'=>$view
		);
	*/
	public function _save_objective_questions($details=false)
  	{
	    $this->load->library('excel_to_database');    
	    //Code for to take image from form and check isset
	    if(isset($_FILES['objective_excel_file']['name']))
      	{
	        //here [] name attribute
	        $logo=$_FILES['objective_excel_file']['name']; 
	        $logoImg = array(
	        	'upload_path' =>'./uploads/objective_excel/',
                'fieldname' => 'objective_excel_file',
                'encrypt_name' => TRUE,        
                'overwrite' => FALSE,
                'allowed_types' => 'xlsx|xls|csv'
	        );

          	$logo_img = $this->imageupload->image_upload($logoImg);
          	$error= $this->upload->display_errors();
          	if(isset($logo_img) && !empty($logo_img))
          	{
	            $logoData = $this->upload->data();      
	            $objective_excel_file = $logoData['file_name'];
          	}
      	}
      	$path = './uploads/objective_excel/'.$details['objective_excel_file'];
  		$result = $this->excel_to_database->excelFileDataToDatabase($path);
        if($result)
		{
			unlink('uploads/objective_excel/'.$details['objective_excel_file']);
			return array(
				'state'=>true,
				'msg'=>'Objective Data Uploaded Successfully!',
				'details'=>$result
			);
		}
		else
		{
			return array(
				'state'=>false,
				'msg'=>'Error! While Uploading Objective Data.'
			);
		}
 	}
 	public function _delete_objective_question($details=null)
	{  
		$details = $this->decryptArray($details);
		if(isset($details['question_id']))
		{    
			$id=$details['question_id'];
			$question=array(
				'display'=>'N',
			);
			$results = $this->standard_model->updateRecord('tbl_que1','question_id',$id,$question);
			if($results)
			{
				$results = $this->encryptArray($details);
				return array(
					'state'=>true,
					'msg'=>'Question Delete Successfully!',
					'details'=>$results
				);
			}
			else
			{
				$message = isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Delete Question';
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
			'msg'=>'Question Id Required!',
			);
		}
	}
}