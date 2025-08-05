<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Renewal_api extends Base_Controller 
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
	Purpose: Get list for renewal 
	return array(
	 	'state'=>TRUE,
		'msg'=>'Records Found!',
	 	'details'=>array(
	 		 array(
                  'renewal_id'=>'1',
                  'renewal_name'=>'English 30 WPM',
                  'renewal_desc'=> 'Computer Typing English 30 WPM'
                    ),
	 	)
	 );
    */
	public function _get_renewal($details=false)
    {
		$details = $this->decryptArray($details);
		if(isset($details['renewal_id']))
		{
		 $results = $this->standard_model->alljoin2tbl_whr('tbl_renewal','tbl_renewal','renewal_id','renewal_id',$details['renewal_id']);
		}
		else if(isset($details['all'])){
		$results= $this->standard_model->selectAllJoin('tbl_renewal','tbl_renewal','renewal_id');
		}
		else {
		$results= $this->standard_model->selectAllJoin('tbl_renewal','tbl_renewal','renewal_id','in_use','Y');
		}
        if($results)
        {
        	$data=array();


                foreach ($results as $result)
                {
                  
                  // $result->inst_reg_date=changeDateFormat($result->inst_reg_date));
                  $result->net_pmt_date=$this->changeDateFormat($result->net_pmt_date);
                  $result->net_paid_date=$this->changeDateFormat($result->net_paid_date);
                  $result->submission_date=$this->changeDateFormat($result->submission_date);
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
                  'details'=>$details['renewal_id']
            );
        }
	}

    function changeDateFormat($originalDate)
          {
            
            return date('d-m-Y', strtotime($originalDate));
          }
	/*
	=================================================================================
    Author:Mrudul Thite                 Date:29/2/2020
	=================================================================================
	Purpose: Save renewal
	return array(
			'state'=>TRUE,
			'msg'=>'New renewal added!',
			'details'=>$details
		);
    */
    public function _set_renewal($details=false)
	{
	  	$validation_error='';
        $details = $this->decryptArray($details);
        if(isset($details['renewal_id']) && !empty($details['renewal_id']))
        {
            $flag=1;
        }
        else
        {
            $flag=0;
        }
        if($this->validation_renewal_details($details))
	    {
            if($details)
            {
                $user_id= $this->session->userdata('user_id');
                $renewal = array(
            'institute_id'=>$details['institute_id'],
            // $id = $details['renewal_id'],
            'years' => $details['years'],
            'area_name' => $details['area_name'],
            'district' => $details['district'],
            'msceia_code' => $details['msceia_code'],
            'pp_code' => $details['pp_code'],
            'inst_name_addr' => $details['inst_name_addr'],
            'principal_name' => $details['principal_name'],
            'typing_approval_no' => $details['typing_approval_no'],
            'computer_approval_no' => $details['computer_approval_no'],
            'eng_30' => $details['eng_30'],
            'eng_40' => $details['eng_40'],
            'mar_30' => $details['mar_30'],
            'mar_40' => $details['mar_40'],
            'hindi_30'  => $details['hindi_30'],
            'hindi_40' => $details['hindi_40'],
            'm_from' => $details['m_from'],
            'm_to' => $details['m_to'],
            'a_from' => $details['a_from'],
            'a_to' => $details['a_to'],
            'time' => $details['time'],
            'property' => $details['property'],
            'place_agree' => $details['place_agree'],
            // 'agreement' => $details['agreement'],
            'rooms '=> $details['rooms'],
            'area_sqft' => $details['area_sqft'],
            'area_enough' => $details['area_enough'],
            'light' => $details['light'],
            // 'wr' => $details['wr'],
            'b_entry_fee' => $details['b_entry_fee'],
            'b_monthly_fee' => $details['b_monthly_fee'],
            'b_exam_fee '=> $details['b_exam_fee'],
            'b_lab_fee' => $details['b_lab_fee'],
            'b_total_fee' => $details['b_total_fee'],
            's_entry_fee' => $details['s_entry_fee'],
            's_monthly_fee' => $details['s_monthly_fee'],
            's_exam_fee' => $details['s_exam_fee'],
            's_lab_fee' => $details['s_lab_fee'],
            's_total_fee' => $details['s_total_fee'],
            'server' => $details['server'],
            'client' => $details['client'],
            'scanner' => $details['scanner'],
            'inkjet' => $details['inkjet'],
            'laser' => $details['laser'],
            'both_printers' => $details['both_printers'],
            'ups' => $details['ups'],
            'inverter' => $details['inverter'],
            'both_ups' => $details['both_ups'],
            'headphone' => $details['headphone'],
            'purchase' => $details['purchase'],
            'lan' => $details['lan'],
            'internet' => $details['internet'],
            'internet_speed' => $details['internet_speed'],
            'net_payment' => $details['net_payment'],
            'net_pmt_amount' => $details['net_pmt_amount'],
            'net_pmt_date' => $details['net_pmt_date'],
            'net_pmt_paid' => $details['net_pmt_paid'],
            'net_paid_amount' => $details['net_paid_amount'],
            'net_paid_date' => $details['net_paid_date'],
            'inst_setup' => $details['inst_setup'],
            'director_1' => $details['director_1'],
            'quali_1' => $details['quali_1'],
            'busi_1' => $details['busi_1'],
            'mob_1 '=> $details['mob_1'],
            'director_2 '=> $details['director_2'],
            'quali_2' => $details['quali_2'],
            'busi_2 '=> $details['busi_2'],
            'mob_2' => $details['mob_2'],
            'director_3 '=> $details['director_3'],
            'quali_3' => $details['quali_3'],
            'busi_3' => $details['busi_3'],
            'mob_3' => $details['mob_3'],
            'chairs' => $details['chairs'],
            'tables' => $details['tables'],
            'stools' => $details['stools'],
            'cupboards' => $details['cupboards'],
            'sheleves' => $details['sheleves'],
            'noticeboards' => $details['noticeboards'],
            'item_1' => $details['item_1'],
            'count_1 '=> $details['count_1'],
            'item_2' => $details['item_2'],
            'count_2' => $details['count_2'],
            'item_3 '=> $details['item_3'],
            'count_3' => $details['count_3'],
            'book_eng' => $details['book_eng'],
            'book_mar' => $details['book_mar'],
            'book_hin '=> $details['book_hin'],
            'gen_registration'=>$this->enum($details['gen_registration']),
            'stud_attendence '=>$this->enum($details['stud_attendence']), 
            'stud_application'=>$this->enum($details['stud_application']),
            'ex_ent' =>$this->enum($details['ex_ent']),
            'ex_reg' =>$this->enum($details['ex_reg']),
            'cert_record '=>$this->enum($details['cert_record']),
            'd_practice' =>$this->enum($details['d_practice']),
            'comp_atd '=>$this->enum($details['comp_atd']),
            'att_book '=>$this->enum($details['att_book']),
            'salary_slip' =>$this->enum($details['salary_slip']),
            'servent_info' =>$this->enum($details['servent_info']),
            'fee_book' =>$this->enum($details['fee_book']),
            'fee_reg' =>$this->enum($details['fee_reg']),
            'hvy_dut_book' =>$this->enum($details['hvy_dut_book']),
            'letter_file '=>$this->enum($details['letter_file']),
            'visit_reg' =>$this->enum($details['visit_reg']),
            'res_mon_1 '=> $details['res_mon_1'],
            'res_mon_2' => $details['res_mon_2'],
            'res_yr_1' => $details['res_yr_1'],
            'res_yr_2' => $details['res_yr_2'],
            'eng_30_1' => $details['eng_30_1'],
            'eng_30_2' => $details['eng_30_2'],
            'eng_40_1' => $details['eng_40_1'],
            'eng_40_2' => $details['eng_40_2'],
            'mar_30_1' => $details['mar_30_1'],
            'mar_30_2' => $details['mar_30_2'],
            'mar_40_1' => $details['mar_40_1'],
            'mar_40_2 '=> $details['mar_40_2'],
            'hin_30_1' => $details['hin_30_1'],
            'hin_30_2' => $details['hin_30_2'],
            'hin_40_1' => $details['hin_40_1'],
            'hin_40_2' => $details['hin_40_2'],
            's_res_yr_1 '=> $details['s_res_yr_1'],
            's_res_yr_2 '=> $details['s_res_yr_2'],
            's_res_per_1' => $details['s_res_per_1'],
            's_res_per_2' => $details['s_res_per_2'],
            'invst_info' => $details['invst_info'],
            'invst_info_detail' => $details['invst_info_detail'],
            'stud_in_yr' => $details['stud_in_yr'],
            'extra_stud' =>$this->enum($details['extra_stud']),
            'officer_name '=> $details['officer_name'],
            'officer_desig' => $details['officer_desig'],
            'officer_appro' =>$this->enum($details['officer_appro']),
            'submission_date' => $details['submission_date'],
            'submission_place' => $details['submission_place'],
            'officer_name_1 '=> $details['officer_name_1'],
            'de_name' => $details['de_name'],
            'officer_desig_2' => $details['officer_desig_2'],
            'de_mob' => $details['de_mob'],
            'officer_mob' => $details['officer_mob'],
            'modified_by'=>1,
            'modified_on'=>date('Y-m-d H:i:s'),
            'renewal_id'=>isset($details['renewal_id'])?$details['renewal_id']:NULL);
            
                if(empty($details['place_authority']))
                {
                    $renewal['place_authority']='owner';
                }else
                {
                     $renewal['place_authority']=$details['place_authority'];
                }

                if(empty($details['agreement']))
                {
                    $renewal['agreement']='N';
                }else
                {
                     $renewal['agreement']=$details['agreement'];
                }

                if(empty($details['wr']))
                {
                    $renewal['wr']='N';
                }else
                {
                     $renewal['wr']=$details['wr'];
                }

                if(empty($details['property ']))
                {
                    $renewal['property  ']='Proprietor';
                }else
                {
                     $renewal['property ']=$details['property'];
                }


                if(empty($details['area_enough ']))
                {
                    $renewal['area_enough']='Enough';
                }else
                {
                     $renewal['area_enough']=$details['area_enough'];
                }

                if(empty($details['light']))
                {
                    $renewal['light']='N';
                }else
                {
                     $renewal['light']=$details['light'];
                }

                if(empty($details['purchase']))
                {
                    $renewal['purchase']='N';
                }else
                {
                     $renewal['purchase']=$details['purchase'];
                }

                if(empty($details['lan']))
                {
                    $renewal['lan']='N';
                }else
                {
                     $renewal['lan']=$details['lan'];
                }

                 if(empty($details['internet']))
                {
                    $renewal['internet']='N';
                }else
                {
                     $renewal['internet']=$details['internet'];
                }

                 if(empty($details['net_payment']))
                {
                    $renewal['net_payment']='N';
                }else
                {
                     $renewal['net_payment']=$details['net_payment'];
                }

                if(empty($details['net_pmt_paid']))
                {
                    $renewal['net_pmt_paid']='N';
                }else
                {
                     $renewal['net_pmt_paid']=$details['net_pmt_paid'];
                }

                if(empty($details['satisfactory']))
                {
                    $renewal['satisfactory']='satisfactory';
                }else
                {
                     $renewal['satisfactory ']=$details['satisfactory'];
                }

                if(!isset($details['renewal_id']) && empty($details['renewal_id']))
                {
                    $renewal['inserted_by']=1;
                    $renewal['inserted_on']=date('Y-m-d H:i:s');
                }
                if(isset($details['typing_approval_no']) && !empty($details['typing_approval_no']))
	            {
	                $renewal['typing_approval_no']=date('Y-m-d',strtotime($details['typing_approval_no']));
	            }
	            else
	            {
	                $renewal['typing_approval_no']=NULL;
	            }     
	            if(isset($details['computer_approval_no']) && !empty($details['computer_approval_no']))
	            {
	                $renewal['computer_approval_no']=date('Y-m-d',strtotime($details['computer_approval_no']));
	            }
	            else
	            {
	                $renewal['computer_approval_no']=NULL;
	            }   

	            if(isset($details['net_pmt_date']) && !empty($details['net_pmt_date']))
	            {
	                $renewal['net_pmt_date']=$this->changeDateFormatSet($details['net_pmt_date']);
	            }
	            else
	            {
	                $renewal['net_pmt_date']=NULL;
	            } 

                if(isset($details['net_paid_date']) && !empty($details['net_paid_date']))
                {
                    $renewal['net_paid_date']=$this->changeDateFormatSet($details['net_paid_date']);
                }
                else
                {
                    $renewal['net_paid_date']=NULL;
                } 

                if(isset($details['submission_date']) && !empty($details['submission_date']))
                {
                    $renewal['submission_date']=$this->changeDateFormatSet($details['submission_date']);
                }
                else
                {
                    $renewal['net_paid_date']=NULL;
                } 

                // $renewal_id = $this->standard_model->single_insert('tbl_renewal',$renewal);
                // $renewal['renewal_id']=$renewal_id;
                // $renewal= $this->encryptArray($renewal);
                // return array(
                //             'state'=>true,
                //             'msg'=>'New renewal added!',
                //             'details'=>$renewal
                //             );
                 $error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
                if($flag==0)
                {
                    $renewal['inserted_by']=1;
                    $renewal['inserted_on']=date('Y-m-d H:i:s');
                    $renewal['display']='Y';
                    $renewal['in_use']='Y';
                    $renewal_id= $this->standard_model->single_insert('tbl_renewal',$renewal);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Add Renewal!',
                            'details'=>$error_msg
                        );
                    }
                    else
                    {
                        $renewal['renewal_id']=$renewal_id;
                        $renewal= $this->encryptArray($renewal);
                        return array(
                            'state'=>true,
                            'msg'=>'Renewal Form Saved Successfully!',
                            'details'=>$renewal
                        );
                    }
                }
                else
                {                                                   
                    $renewal_id= $this->standard_model->single_insert('tbl_renewal',$renewal);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Update Renewal!',
                            'details'=>$error_msg
                            );
                    }
                    else
                    {
                        $renewal['renewal_id']=$renewal_id;
                        $renewal= $this->encryptArray($renewal);                
                        return array(
                            'state'=>true,
                            'msg'=>'Renewal Form Updated Successfully!',
                            'details'=>$renewal
                            );
                    }
                }  
            }
            else
            {
                return array(
                'state'=>False,
                'msg'=>'renewal_ Failed to Saved!',
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

     function enum($val)
                {
                    if(isset($val)&&!empty($val))
                    {
                        return $val;
                        // print_r($val);
                    }
                    elseif(empty($val))
                    {
                        return 'N';
                        
                        // print_r("N");
                    }

                }
        function changeDateFormatSet($originalDate)
          {
            
            return date('Y-m-d', strtotime($originalDate));
          }

    /*
	=================================================================================
	Author:Mrudul Thite                 Date:29/2/2020
	=================================================================================
	Purpose: validation for renewal
	*/
	function validation_renewal_details($details)
    {
	 	$this->form_validation->set_error_delimiters('','');
		$this->form_validation->set_data(
		array(
			'renewal_id'=>isset($details['renewal_id']) ? $details['renewal_id'] :'',
            'years'=>isset($details['years']) ? $details['years'] :'',
            'area_name'=>isset($details['area_name']) ? $details['area_name'] :'',
            'district'=>isset($details['district']) ? $details['district'] :'',
            // 'b_exam_fee'=>isset($details['b_exam_fee']) ? $details['b_exam_fee'] :'',
            'msceia_code'=>isset($details['msceia_code']) ? $details['msceia_code'] :'',
            'pp_code'=>isset($details['pp_code']) ? $details['pp_code'] :'',
            'inst_name_addr'=>isset($details['inst_name_addr']) ? $details['inst_name_addr'] :'',
            // 'principal_name'=>isset($details['principal_name']) ? $details['principal_name'] :'',
        //   'eng_30'=>isset($details['eng_30']) ? $details['eng_30'] :'',
        //   'eng_40'=>isset($details['eng_40']) ? $details['eng_40'] :'',
        //   'mar_30'=>isset($details['mar_30']) ? $details['mar_30'] :'',
        //   'mar_40'=>isset($details['mar_40']) ? $details['mar_40'] :'',
        //   'hindi_30'=>isset($details['hindi_30']) ? $details['hindi_30'] :'',
        //   'hindi_40'=>isset($details['hindi_40']) ? $details['hindi_40'] :'',
        //   'm_from'=>isset($details['m_from']) ? $details['m_from'] :'',
        //   'm_to'=>isset($details['m_to']) ? $details['m_to'] :'',
        //   'a_from'=>isset($details['a_from']) ? $details['a_from'] :'',
        //   'a_to'=>isset($details['a_to']) ? $details['a_to'] :'',
        //   'time'=>isset($details['time']) ? $details['time'] :'',
        //   'rooms'=>isset($details['rooms']) ? $details['rooms'] :'',
        //   'area_sqft'=>isset($details['area_sqft']) ? $details['area_sqft'] :'',
        //   'typing_approval_no'=>isset($details['typing_approval_no']) ? $details['typing_approval_no'] :'',
        //   'computer_approval_no'=>isset($details['computer_approval_no']) ? $details['computer_approval_no'] :'',

        //   'b_entry_fee'=>isset($details['b_entry_fee']) ? $details['b_entry_fee'] :'',
        //   'b_monthly_fee'=>isset($details['b_monthly_fee']) ? $details['b_monthly_fee'] :'',
          'institute_id'=>isset($details['institute_id']) ? $details['institute_id'] :'',
        //   's_lab_fee'=>isset($details['s_lab_fee']) ? $details['s_lab_fee'] :'',
        //   'b_lab_fee'=>isset($details['b_lab_fee']) ? $details['b_lab_fee'] :'',
        //   'b_total_fee'=>isset($details['b_total_fee']) ? $details['b_total_fee'] :'',
        //   's_entry_fee'=>isset($details['s_entry_fee']) ? $details['s_entry_fee'] :'',
        //   's_monthly_fee'=>isset($details['s_monthly_fee']) ? $details['s_monthly_fee'] :'',
        //   's_exam_fee'=>isset($details['s_exam_fee']) ? $details['s_exam_fee'] :'',
        //   's_total_fee'=>isset($details['s_total_fee']) ? $details['s_total_fee'] :'',
        //   'server'=>isset($details['server']) ? $details['server'] :'',
        //   'client'=>isset($details['client']) ? $details['client'] :'',
        //   'scanner'=>isset($details['scanner']) ? $details['scanner'] :'',
        //   'inkjet'=>isset($details['inkjet']) ? $details['inkjet'] :'',
        //   'laser'=>isset($details['laser']) ? $details['laser'] :'',
        //   'both_printers'=>isset($details['both_printers']) ? $details['both_printers'] :'',
        //   'ups'=>isset($details['ups']) ? $details['ups'] :'',
        //   'inverter'=>isset($details['inverter']) ? $details['inverter'] :'',
        //   'both_ups'=>isset($details['both_ups']) ? $details['both_ups'] :'',
        //   'headphone'=>isset($details['headphone']) ? $details['headphone'] :'',
        //   'internet_speed'=>isset($details['internet_speed']) ? $details['internet_speed'] :'',
        //   'net_pmt_amount'=>isset($details['net_pmt_amount']) ? $details['net_pmt_amount'] :'',
        //   'net_pmt_date'=>isset($details['net_pmt_date']) ? $details['net_pmt_date'] :'',
        //   'net_paid_amount'=>isset($details['net_paid_amount']) ? $details['net_paid_amount'] :'',
        //   'net_paid_date'=>isset($details['net_paid_date']) ? $details['net_paid_date'] :'',
        //   'director_1'=>isset($details['director_1']) ? $details['director_1'] :'',
        //   'director_2'=>isset($details['director_2']) ? $details['director_2'] :'',
        //   'director_3'=>isset($details['director_3']) ? $details['director_3'] :'',
        //   'quali_1'=>isset($details['quali_1']) ? $details['quali_1'] :'',
        //   'quali_2'=>isset($details['quali_2']) ? $details['quali_2'] :'',
        //   'quali_3'=>isset($details['quali_3']) ? $details['quali_3'] :'',
        //   'busi_1'=>isset($details['busi_1']) ? $details['busi_1'] :'',
        //   'busi_2'=>isset($details['busi_2']) ? $details['busi_2'] :'',
        //   'busi_3'=>isset($details['busi_3']) ? $details['busi_3'] :'',
        //   'mob_1'=>isset($details['mob_1']) ? $details['mob_1'] :'',
        //   'mob_2'=>isset($details['mob_2']) ? $details['mob_2'] :'',
        //   'mob_3'=>isset($details['mob_3']) ? $details['mob_3'] :'',
        //   'item_1'=>isset($details['item_1']) ? $details['item_1'] :'',
        //   'item_2'=>isset($details['item_2']) ? $details['item_2'] :'',
        //   'item_3'=>isset($details['item_3']) ? $details['item_3'] :'',
        //   'count_1'=>isset($details['count_1']) ? $details['count_1'] :'',
        //   'count_2'=>isset($details['count_2']) ? $details['count_2'] :'',
        //   'count_3'=>isset($details['count_3']) ? $details['count_3'] :'',
        //   'res_mon_1'=>isset($details['res_mon_1']) ? $details['res_mon_1'] :'',
        //   'res_mon_2'=>isset($details['res_mon_2']) ? $details['res_mon_2'] :'',
        //   'eng_30_1'=>isset($details['eng_30_1']) ? $details['eng_30_1'] :'',
        //   'eng_30_2'=>isset($details['eng_30_2']) ? $details['eng_30_2'] :'',
        //   'eng_40_1'=>isset($details['eng_40_1']) ? $details['eng_40_1'] :'',
        //   'eng_40_2'=>isset($details['eng_40_2']) ? $details['eng_40_2'] :'',
        //   'mar_30_1'=>isset($details['mar_30_1']) ? $details['mar_30_1'] :'',
        //   'mar_30_2'=>isset($details['mar_30_2']) ? $details['mar_30_2'] :'',
        //   'mar_40_1'=>isset($details['mar_40_1']) ? $details['mar_40_1'] :'',
        //   'mar_40_2'=>isset($details['mar_40_2']) ? $details['mar_40_2'] :'',
        //   'hin_30_1'=>isset($details['hin_30_1']) ? $details['hin_30_1'] :'',
        //   'hin_30_2'=>isset($details['hin_30_2']) ? $details['hin_30_2'] :'',
        //   'hin_40_1'=>isset($details['hin_40_1']) ? $details['hin_40_1'] :'',
        //   'hin_40_2'=>isset($details['hin_40_2']) ? $details['hin_40_2'] :'',
        //   's_res_yr_1'=>isset($details['s_res_yr_1']) ? $details['s_res_yr_1'] :'',
        //   's_res_yr_2'=>isset($details['s_res_yr_2']) ? $details['s_res_yr_2'] :'',
        //   's_res_per_1'=>isset($details['s_res_per_1']) ? $details['s_res_per_1'] :'',
        //   's_res_per_2'=>isset($details['s_res_per_2']) ? $details['s_res_per_2'] :'',
        //   'invst_info_detail'=>isset($details['invst_info_detail']) ? $details['invst_info_detail'] :'',
        //   'book_eng'=>isset($details['book_eng']) ? $details['book_eng'] :'',
        //   'book_mar'=>isset($details['book_mar']) ? $details['book_mar'] :'',
        //   'book_hin'=>isset($details['book_hin']) ? $details['book_hin'] :'',
        //   'officer_name'=>isset($details['officer_name']) ? $details['officer_name'] :'',
        //   'officer_desig'=>isset($details['officer_desig']) ? $details['officer_desig'] :'',
        //   'officer_appro'=>isset($details['officer_appro']) ? $details['officer_appro'] :'',
        //   // 'officer_desig_1'=>isset($details['officer_desig_1']) ? $details['officer_desig_1'] :'',
        //   'officer_desig_2'=>isset($details['officer_desig_2']) ? $details['officer_desig_2'] :'',
        //   'submission_place'=>isset($details['submission_place']) ? $details['submission_place'] :'',
        //   'de_name'=>isset($details['de_name']) ? $details['de_name'] :'',
        //   'stud_in_yr'=>isset($details['stud_in_yr']) ? $details['stud_in_yr'] :'',
        //   'extra_stud'=>isset($details['extra_stud']) ? $details['extra_stud'] :'',
        //   'de_name'=>isset($details['de_name']) ? $details['de_name'] :'',
        //   'officer_name_1'=>isset($details['officer_name_1']) ? $details['officer_name_1'] :'',
        //   'res_yr_1'=>isset($details['res_yr_1']) ? $details['res_yr_1'] :'',
        //   'res_yr_2'=>isset($details['res_yr_2']) ? $details['res_yr_2'] :'',
        //   'submission_date'=>isset($details['submission_date']) ? $details['submission_date'] :'',
        //   'de_mob'=>isset($details['de_mob']) ? $details['de_mob'] :'',
        //   'officer_mob'=>isset($details['officer_mob']) ? $details['officer_mob'] :'',
        //   'chairs'=>isset($details['chairs']) ? $details['chairs'] :'',
        //   'tables'=>isset($details['tables']) ? $details['tables'] :'',
        //   'stools'=>isset($details['stools']) ? $details['stools'] :'',
        //   'cupboards'=>isset($details['cupboards']) ? $details['cupboards'] :'',
        //   'sheleves'=>isset($details['sheleves']) ? $details['sheleves'] :'',
        //   'noticeboards'=>isset($details['noticeboards']) ? $details['noticeboards'] :''
          
		)
		); 
	      if(isset($details['renewal_id']) && $details['renewal_id'] !='' ){
        $this->form_validation->set_rules('renewal_id', 'renewal_id',array('required','min_length[1]','max_length[5]','regex_match[/^([0-9][0-9]{0,4})$/]'),
        array(
                      'required'=>'renewal_id is Required',
                      'min_length'=>'Min 1 char required. ',
                      'max_length'=>'Max 5 char allowed. ',
                      'regex_match'=>'Only numbers are allowed.'
        )
        );
        }else{
            
        }

        $this->form_validation->set_rules('institute_id', 'institute_id',array('required','min_length[1]','max_length[18]','regex_match[/^([0-9][0-9]{0,5})$/]'),
            array(
                  'required'=>'institute_id	is Required', 
                  'max_length'=>'Max 18 char allowed. ',
                  'regex_match'=>'Only numbers are allowed.'
                  ));

        $this->form_validation->set_rules('years', 'years',array('required'),
                 array(
                  'required'=>'years is Required'
                  ));
        
    	$this->form_validation->set_rules('area_name', 'area_name',array('required'),
                                                                                                                
        	array(
                'required'=>'area_name is Required'
          ));
    	$this->form_validation->set_rules('district', 'district',array('required'),
                                                                                                                
          array(
                'required'=>'district  is Required'
          ));
      
    // 	$this->form_validation->set_rules('b_exam_fee', 'b_exam_fee',array('required'),
    //               array(
    //                 'required'=>'b_exam_fee is Required'
    //               ));
    // 	$this->form_validation->set_rules('rooms', 'rooms',array('required'),
    //               array(
    //                 'required'=>'rooms is Required'
    //               ));
    //  	$this->form_validation->set_rules('b_lab_fee', 'b_lab_fee',array('required'),
    //               array(
    //                 'required'=>'b_lab_fee is Required'
    //               ));
		$this->form_validation->set_rules('msceia_code', 'msceia_code',array('required'),
                                                                                                                
          array(
                'required'=>'msceia_code  is Required'
          ));
    	$this->form_validation->set_rules('pp_code', 'pp_code',array('required'),
                                                                                                                
          array(
                'required'=>'pp_code  is Required'
          ));
    	$this->form_validation->set_rules('inst_name_addr', 'inst_name_addr',array('required'),
            array(
            'required'=>'inst_name_addr is Required'
            ));

    //  	$this->form_validation->set_rules('principal_name', 'principal_name',array('required'),
    //              array(
    //               'required'=>'principal_name is Required'
    //               ));
    //   	$this->form_validation->set_rules('eng_30', 'eng_30',array('required'),
    //              array(
    //               'required'=>'eng_30 is Required'
    //               ));
    //   	$this->form_validation->set_rules('eng_40', 'eng_40',array('required'),
    //              array(
    //               'required'=>'eng_40 is Required'
    //               ));
    //     $this->form_validation->set_rules('mar_30', 'mar_30',array('required'),
    //              array(
    //               'required'=>'mar_30 is Required'
    //               ));
    //     $this->form_validation->set_rules('mar_40', 'mar_40',array('required'),
    //              array(
    //               'required'=>'mar_40 is Required'
    //               ));
    //     $this->form_validation->set_rules('hindi_30', 'hindi_30',array('required'),
    //              array(
    //               'required'=>'hindi_30 is Required'
    //               ));
    //     $this->form_validation->set_rules('hindi_40', 'hindi_40',array('required'),
    //              array(
    //               'required'=>'hindi_40 is Required'
    //               ));
    //     $this->form_validation->set_rules('m_from', 'm_from',array('required'),
    //              array(
    //               'required'=>'m_from is Required'
    //               ));
    //     $this->form_validation->set_rules('m_to', 'm_to',array('required'),
    //              array(
    //               'required'=>'m_to is Required'
    //               ));
    //     $this->form_validation->set_rules('a_from', 'a_from',array('required'),
    //              array(
    //               'required'=>'a_from is Required'
    //               ));
    //     $this->form_validation->set_rules('a_to', 'a_to',array('required'),
    //              array(
    //               'required'=>'a_to is Required'
    //               ));
    //     $this->form_validation->set_rules('time', 'time',array('required'),
    //              array(
    //               'required'=>'time is Required'
    //               ));
    //     $this->form_validation->set_rules('area_sqft', 'area_sqft',array('required'),
                                                                                                                
		  //       array(
		  //              'required'=>'area_sqft  is Required'
		  //       ));
    //     $this->form_validation->set_rules('typing_approval_no','typing_approval_no',array('required'),
    //              array(
    //           	        'required'=>'typing_approval_no is Required' 
      
    //              ));
    //  	$this->form_validation->set_rules('computer_approval_no','computer_approval_no',array('required'),
    //              array(
    //              		'required'=>'computer_approval_no is Required' 
      
    //              ));
    //     $this->form_validation->set_rules('b_entry_fee', 'b_entry_fee',array('required'),
                                                                                                                
    //       		 array(
		  //              'required'=>'b_entry_fee is Required'
    //       		 ));
    // 	$this->form_validation->set_rules('b_monthly_fee', 'b_monthly_fee',array('required'),
                                                                                                                
		  //       array(
		  //              'required'=>'b_monthly_fee  is Required'
		  //       ));
      
    // 	$this->form_validation->set_rules('stools', 'stools',array('required'),
    //               array(
	   //                 'required'=>'stools is Required'
    //               ));
    // 	$this->form_validation->set_rules('s_lab_fee', 's_lab_fee',array('required'),
                                                                    
    //               array(
		  //              'required'=>'s_lab_fee  is Required'
    //       		  ));
    // 	$this->form_validation->set_rules('b_total_fee', 'b_total_fee',array('required'),
                                                                                                                
		  //        array(
		  //              'required'=>'b_total_fee  is Required'
		  //        ));
    // 	$this->form_validation->set_rules('s_entry_fee', 's_entry_fee',array('required'),
		  //        array(
			 //           'required'=>'s_entry_fee is Required'
		  //        ));
    //  	$this->form_validation->set_rules('s_monthly_fee', 's_monthly_fee',array('required'),
    //               array(
		  //                'required'=>'s_monthly_fee is Required'
    //               ));
    //   	$this->form_validation->set_rules('s_exam_fee', 's_exam_fee',array('required'),
    //               array(
		  //                'required'=>'s_exam_fee is Required'
    //               ));
       
    //     $this->form_validation->set_rules('s_total_fee', 's_total_fee',array('required'),
    //               array(
	   //               'required'=>'s_total_fee is Required'
    //               ));
        
    //     $this->form_validation->set_rules('server', 'server',array('required'),
    //               array(
	   //               'required'=>'server is Required'
    //               ));
    //     $this->form_validation->set_rules('client', 'client',array('required'),
    //               array(
	   //               'required'=>'client is Required'
    //               ));
    //     $this->form_validation->set_rules('scanner', 'scanner',array('required'),
    //               array(
	   //               'required'=>'scanner is Required'
    //               ));
    //     $this->form_validation->set_rules('inkjet', 'inkjet',array('required'),
    //               array(
	   //               'required'=>'inkjet is Required'
    //               ));
  
    //     $this->form_validation->set_rules('laser', 'laser',array('required'),
    //               array(
	   //               'required'=>'laser is Required'
    //               ));
    //     $this->form_validation->set_rules('both_printers', 'both_printers',array('required'),
    //               array(
	   //               'required'=>'both_printers is Required'
    //               ));
    //     $this->form_validation->set_rules('ups', 'ups',array('required'),
    //               array(
	   //               'required'=>'ups is Required'
    //               ));
    //     $this->form_validation->set_rules('inverter', 'inverter',array('required'),
    //               array(
	   //               'required'=>'inverter is Required'
    //   	          ));
    //     $this->form_validation->set_rules('both_ups', 'both_ups',array('required'),
    //               array(
	   //               'required'=>'both_ups is Required' 
    //               ));
                  
    //     $this->form_validation->set_rules('headphone', 'headphone',array('required'),
    //               array(
	   //               'required'=>'headphone is Required' 
    //               ));

    //     $this->form_validation->set_rules('internet_speed', 'internet_speed',array('required'),
    //               array(
	   //               'required'=>'internet_speed is Required'
    //               ));
    //     $this->form_validation->set_rules('net_pmt_amount', 'net_pmt_amount',array('required'),
    //               array(
	   //               'required'=>'net_pmt_amount is Required' 
    //               ));
    //     $this->form_validation->set_rules('net_paid_amount', 'net_paid_amount',array('required'),
    //               array(
	   //               'required'=>'net_paid_amount is Required'
    //               ));
    //  	$this->form_validation->set_rules('net_pmt_date', 'net_pmt_date',array('required'),
    //               array(
	   //               'required'=>'net_pmt_date is Required' 
    //               ));
    //     $this->form_validation->set_rules('net_paid_date', 'net_paid_date',array('required'),
    //               array(
	   //               'required'=>'net_paid_date is Required' 
    //               ));
    //     $this->form_validation->set_rules('director_1', 'director_1',array('required'),
    //               array(
	   //               'required'=>'director_1 is Required' 
    //               ));
    //     $this->form_validation->set_rules('director_2', 'director_2',array('required'),
    //               array(
	   //               'required'=>'director_2 is Required'
    //               ));
    //     $this->form_validation->set_rules('director_3', 'director_3',array('required'),
    //               array(
	   //               'required'=>'director_3 is Required' 
    //               ));
    //     $this->form_validation->set_rules('quali_1', 'quali_1',array('required'),
    //               array(
	   //               'required'=>'quali_1 is Required' 
    //               ));
    //     $this->form_validation->set_rules('quali_2', 'quali_2',array('required'),
    //               array(
	   //               'required'=>'quali_2 is Required' 
    //               ));
    //     $this->form_validation->set_rules('quali_3', 'quali_3',array('required'),
    //               array(
	   //               'required'=>'quali_3 is Required' 
    //               ));
    //     $this->form_validation->set_rules('busi_1', 'busi_1',array('required'),
    //               array(
	   //               'required'=>'busi_1 is Required' 
    //               ));
    //     $this->form_validation->set_rules('busi_2', 'busi_2',array('required'),
    //               array(
	   //               'required'=>'busi_2 is Required'
    //               ));
    //     $this->form_validation->set_rules('busi_3', 'busi_3',array('required'),
    //               array(
	   //               'required'=>'busi_3 is Required'
    //               ));

    //     $this->form_validation->set_rules('mob_1', 'mob_1',array('required'),
    //               array(
	   //               'required'=>'mob_1 is Required' 
    //               ));
    //     $this->form_validation->set_rules('mob_2', 'mob_2',array('required'),
    //               array(
	   //               'required'=>'mob_2 is Required'
    //               ));
    //     $this->form_validation->set_rules('mob_3', 'mob_3',array('required'),
    //               array(
	   //               'required'=>'mob_3 is Required'
    //               ));
    //     $this->form_validation->set_rules('item_1', 'item_1',array('required'),
    //               array(
	   //               'required'=>'item_1 is Required' 
    //               ));
    //     $this->form_validation->set_rules('item_2', 'item_2',array('required'),
    //               array(
	   //               'required'=>'item_2 is Required'
    //               ));
    //     $this->form_validation->set_rules('item_3', 'item_3',array('required'),
    //               array(
	   //               'required'=>'item_3 is Required' 
    //               ));
    //     $this->form_validation->set_rules('count_1', 'count_1',array('required'),
    //               array(
	   //               'required'=>'count_1 is Required'
    //               ));
    //     $this->form_validation->set_rules('count_2', 'count_2',array('required'),
    //               array(
	   //               'required'=>'count_2 is Required' 
    //               ));
    //     $this->form_validation->set_rules('count_3', 'count_3',array('required'),
    //               array(
	   //               'required'=>'count_3 is Required' 
    //               ));
    //     $this->form_validation->set_rules('res_mon_1', 'res_mon_1',array('required'),
    //               array(
	   //               'required'=>'res_mon_1 is Required'
    //               ));
    //     $this->form_validation->set_rules('res_mon_2', 'res_mon_2',array('required'),
    //               array(
	   //               'required'=>'res_mon_2 is Required' 
    //               ));

    //     $this->form_validation->set_rules('eng_30_1', 'eng_30_1',array('required'),
    //               array(
	   //               'required'=>'eng_30_1 is Required' 
    //               ));
    //     $this->form_validation->set_rules('eng_30_2', 'eng_30_2',array('required'),
    //               array(
	   //               'required'=>'eng_30_2 is Required' 
    //               ));
               
    //     $this->form_validation->set_rules('eng_40_1', 'eng_40_1',array('required'),
    //               array(
	   //               'required'=>'eng_40_1 is Required' 
    //               ));
    //     $this->form_validation->set_rules('eng_40_2', 'eng_40_2',array('required'),
    //              array(
    //               'required'=>'busi_2 is Required' 
    //               ));

    //     $this->form_validation->set_rules('mar_30_1', 'mar_30_1',array('required'),
    //              array(
    //               'required'=>'mar_30_1 is Required' 
    //               ));
    //     $this->form_validation->set_rules('mar_30_2', 'mar_30_2',array('required'),
    //              array(
    //               'required'=>'mar_30_2 is Required'
    //               ));

    //     $this->form_validation->set_rules('mar_40_1', 'mar_40_1',array('required'),
    //              array(
    //               'required'=>'mar_40_1 is Required' 
    //               ));
    //     $this->form_validation->set_rules('mar_40_2', 'mar_40_2',array('required'),
    //              array(
    //               'required'=>'mar_40_2 is Required'
    //               ));
    //     $this->form_validation->set_rules('hin_40_1', 'hin_40_1',array('required'),
    //              array(
    //               'required'=>'hin_40_1 is Required'
    //               ));
    //     $this->form_validation->set_rules('hin_40_2', 'hin_40_2',array('required'),
    //              array(
    //               'required'=>'hin_40_2 is Required'
    //               ));
    //     $this->form_validation->set_rules('hin_30_1', 'hin_30_1',array('required'),
    //              array(
    //               'required'=>'hin_30_1 is Required'
    //               ));
    //     $this->form_validation->set_rules('hin_30_2', 'hin_30_2',array('required'),
    //              array(
    //               'required'=>'busi_2 is Required'
    //               ));

    //     $this->form_validation->set_rules('s_res_yr_1', 's_res_yr_1',array('required'),
    //              array(
    //                   'required'=>'s_res_yr_1 is Required'
    //                   ));
    //     $this->form_validation->set_rules('s_res_yr_2', 's_res_yr_2',array('required'),
    //              array(
    //               'required'=>'s_res_yr_2 is Required' 
    //               ));
    //     $this->form_validation->set_rules('s_res_per_1', 's_res_per_1',array('required'),
    //              array(
    //               'required'=>'s_res_per_1 is Required'
    //               ));
    //     $this->form_validation->set_rules('s_res_per_2', 's_res_per_2',array('required'),
    //              array(
    //               'required'=>'s_res_per_2 is Required'
    //               ));

    //     $this->form_validation->set_rules('invst_info_detail', 'invst_info_detail',array('required'),
    //              array(
    //               'required'=>'invst_info_detail is Required' 
    //               ));
    //     $this->form_validation->set_rules('book_eng', 'book_eng',array('required'),
    //              array(
    //               'required'=>'book_eng is Required' 
    //               ));
    //     $this->form_validation->set_rules('book_mar', 'book_mar',array('required'),
    //              array(
    //               'required'=>'book_mar is Required'
    //               ));
    //     $this->form_validation->set_rules('book_hin', 'book_hin',array('required'),
    //              array(
    //               'required'=>'book_hin is Required' 
    //               ));

    //     $this->form_validation->set_rules('officer_name', 'officer_name',array('required'),
    //              array(
    //               'required'=>'officer_name is Required'
    //               ));
    //     $this->form_validation->set_rules('officer_desig', 'officer_desig',array('required'),
    //              array(
    //               'required'=>'officer_desig is Required'
    //               ));
    //     $this->form_validation->set_rules('officer_desig_2', 'officer_desig_2',array('required'),
    //              array(
    //               'required'=>'officer_desig_2 is Required'
    //               ));
    //     $this->form_validation->set_rules('submission_place', 'submission_place',array('required'),
    //              array(
    //               'required'=>'submission_place is Required'
    //               ));
    //     $this->form_validation->set_rules('de_name', 'de_name',array('required'),
    //              array(
    //               'required'=>'de_name is Required'
    //               ));
    //     $this->form_validation->set_rules('stud_in_yr', 'stud_in_yr',array('required'),
    //              array(
    //               'required'=>'stud_in_yr is Required'
    //               ));

    //     $this->form_validation->set_rules('res_yr_1', 'res_yr_1',array('required'),
    //              array(
    //               'required'=>'res_yr_1 is Required'
    //               ));

    //     $this->form_validation->set_rules('res_yr_2', 'res_yr_2',array('required'),
    //              array(
    //               'required'=>'res_yr_2 is Required' 
    //               ));

    //     $this->form_validation->set_rules('officer_name_1', 'officer_name_1',array('required'),
    //              array(
    //               'required'=>'officer_name_1 is Required'
    //               ));

    //     $this->form_validation->set_rules('officer_appro', 'officer_appro',array('required'),
    //              array(
    //               'required'=>'officer_appro is Required'
    //               ));

    //     $this->form_validation->set_rules('submission_date', 'submission_date',array('required'),
    //              array(
    //               'required'=>'submission_date is Required'
    //               ));
    //     $this->form_validation->set_rules('de_mob', 'de_mob',array('required'),
    //              array(
    //               'required'=>'de_mob is Required' 
    //               ));
    //     $this->form_validation->set_rules('officer_mob', 'officer_mob',array('required'),
    //              array(
    //               'required'=>'officer_mob is Required' 
    //               ));

    //     $this->form_validation->set_rules('chairs', 'chairs',array('required'),                             
    //              array(
    //             'required'=>'chairs  is Required'
    //              ));

    //     $this->form_validation->set_rules('tables', 'tables',array('required'),
    //              array(
    //               'required'=>'tables is Required'
    //               ));
      
    // 	$this->form_validation->set_rules('cupboards', 'cupboards',array('required'),
    //               array(
    //                 'required'=>'cupboards is Required'
    //               ));
    // 	$this->form_validation->set_rules('s_lab_fee', 's_lab_fee',array('required','min_length[2]','max_length[200]',"regex_match[/^([0-9][0-9]{0,4})$/]"),
                                                                                                                
    //       array(
    //             'required'=>'s_lab_fee  is Required',
    //             'min_length'=>'Min 2 char required.',
    //             'max_length'=>'Max 200 char allowed.',
    //             'regex_match'=>'Only numbers are allowed.'
    //       ));
		   
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
	Purpose: Hide renewal
	return array(
	 		'state'=>TRUE,
	 		'msg'=>'renewal hidden!',
	 		'details'=>$details
	 	);
	*/
	public function _hide_renewal($details=false)
	{
		$details = $this->decryptArray($details);			
		if(isset($details['renewal_id']))
		{
			$id=$details['renewal_id'];
			$renewal=array(
				'in_use'=>'N',
			);
			$results = $this->standard_model->updateRecord('tbl_renewal','renewal_id',$id,$renewal);
			if($results)
			{
				$results = $this->encryptArray($details);
					return array(
						'state'=>true,
						'msg'=>'Hide Record!',
						'details'=>$results
					);
			}
			else
			{
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide renewal';
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
			'msg'=>'renewal_id Required!',
			);
		}
	}
	/*
	=================================================================================
	Author:Mrudul Thite                 Date:29/2/2020
	=================================================================================
	Purpose: Restore renewal
	return array(
		'state'=>TRUE,
		'msg'=>'renewal restored!',
		'details'=>$details
	);
	*/
	public function _restore_renewal($details=false)
	{
		$details = $this->decryptArray($details);			
		if(isset($details['renewal_id']))
		{	
		    $id=$details['renewal_id'];
			$renewal=array(
				'in_use'=>'Y',
			);
			$results = $this->standard_model->updateRecord('tbl_renewal','renewal_id',$id,$renewal);
			if($results)
			{
				$results = $this->encryptArray($details);
					return array(
						'state'=>true,
						'msg'=>'Restore Record !',
						'details'=>$results
					);
			}
			else
			{
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide renewal';
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
			'msg'=>'renewal_id Required!',
			);
		}
	}
	/*
	=================================================================================
	Author:Mrudul Thite                 Date:29/2/2020
	=================================================================================
	Purpose:Delete renewal
	/*return array(
		'state'=>TRUE,
		'msg'=>'renewal deleted!',
		'details'=>$details
	);
	*/
	public function _permanent_delete_renewal($details=null)
	{  
		$details = $this->decryptArray($details);
		if(isset($details['renewal_id']))
		{    
			
			$id=$details['renewal_id'];
			 
			$renewal=array(
					'display'=>'N',
				);
			$results = $this->standard_model->updateRecord('tbl_renewal','renewal_id',$id,$renewal);
			if($results)
			{
			    $results = $this->encryptArray($details);
				return array(
					'state'=>true,
					'msg'=>'Renewal Delete!',
					'details'=>$results
				);
			}
			else
			{
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Delete renewal';
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
			'msg'=>'renewal_id Required!',
			);
		}
	}
}