<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Download_link_master_api extends Base_Controller 
{
	public function __construct()
  	{
	    parent::__construct();    
    $this->load->module('download_link_master/download_link_master_api');
    $this->load->model('standard/standard_model');
    }
    /*  
    =================================================================================
    Author:Mrudul Thite                 Date:17/03/2021
    =================================================================================
    Purpose: Get list for download_link_master 
    parameter:none,all,user_id 
	  response:return array(
          'state'=>TRUE,
          'msg'=>'Records Found!',
          'details'=>array(
              array(
                  'download_link_master_id'=>'1',
                  'download_link_name'=>'photo',
                  'download_link_description'=> 'photo desc'
                    ),
              array(
                  'download_link_master_id'=>'2',
                  'download_link_name'=>'download_link_master',
                  'download_link_description'=> 'download_link_master desc'
              )
          )
        );
	  */
    
    public function _get_download_link_master($details=false)
   {
     $details = $this->decryptArray($details);
      if(isset($details['download_link_master_id']))
      {
      $results = $this->standard_model->selectAllWhr('tbl_download_link_master','download_link_master_id',$details['download_link_master_id']);
      }
      else if(isset($details['all'])){
      $results= $this->standard_model->selectAll('tbl_download_link_master');
      }
      else {
        $results= $this->standard_model->selectAll('tbl_download_link_master','in_use','Y');
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
          'msg'=>'Succesfully Fetch Record!',
          'state'=>true,
          'details'=>$result
        );
        $result= $this->encryptArray($result);
      }
      else
      {
        return array(
          'msg'=>'Unable Fetch Record!',
          'state'=>false,
          'details'=>false
        );
     }
  }
  /*
  =================================================================================
  Author:Mrudul Thite                 Date:17/03/2021
  =================================================================================
  Purpose: Save download_link_master 
  parameter:download_link_name,download_link_description,download_link_master_id
	response:
	 return array(
      'state'=>TRUE,
      'msg'=>'New download_link_master added!',
      'details'=>$details
    );
  */
  public function _set_download_link_master($details=false)
  {
    $user_id= $this->session->userdata('user_id');

    $validation_error='';
    
      $details = $this->decryptArray($details);
    if(isset($details['download_link_master_id']) && !empty($details['download_link_master_id']))
    {
      $flag=1;
    }
    else
    {
      $flag=0;
    }
        if($this->validationdownload_link_masterdetails($details,$flag))
		{
      if($details)
      {
          $user_id= $this->session->userdata('user_id');
          $download_link_master = array(
                       'download_link_master_id'=>isset($details['download_link_master_id'])?$details['download_link_master_id']:'',
                      'download_link_name' =>$details['download_link_name'],
                      'download_link_description' =>$details['download_link_description'],
                      'download_link' =>$details['download_link'],
                      'upload_user_guide' =>$details['upload_user_guide'],
                      'visibility'=>isset($details['visibility'])?$details['visibility']:"N",
                      'modified_by'=>$user_id,
                      'modified_on'=>date('Y-m-d H:i:s'),
                     );
          // if(!isset($details['download_link_master_id']) && empty($details['download_link_master_id']))
          // {
          //     $download_link_master['inserted_by']=1;
          //     $download_link_master['inserted_on']=date('Y-m-d H:i:s');
          // }
          // $download_link_master_id = $this->standard_model->single_insert('tbl_download_link_master',$download_link_master);
          // $download_link_master['download_link_master_id']=$download_link_master_id;
          // $download_link_master= $this->encryptArray($download_link_master);
          // if($flag==0)
          // {
          // return array(
          //             'state'=>true,
          //             'msg'=>'download_link_master added!',
          //             'details'=>$download_link_master
          //             );
          // }else{
          // return array(
          //             'state'=>true,
          //             'msg'=>'download_link_master updated!',
          //             'details'=>$download_link_master
          //             );
          // }
        $error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
        if($flag==0)
        {
          $download_link_master['inserted_by']=$user_id;
          $download_link_master['inserted_on']=date('Y-m-d H:i:s');
          $download_link_master['display']='Y';
          $download_link_master['in_use']='Y';
          $download_link_master_id= $this->standard_model->single_insert('tbl_download_link_master',$download_link_master);
          if($error_msg && !empty($error_msg) )
          {                                                       
            return array(
              'state'=>false,
              'msg'=>'Unable to Add Download Link Master!',
              'details'=>$error_msg
            );
          }
          else
          {
            $download_link_master['download_link_master_id']=$download_link_master_id;
            $download_link_master= $this->encryptArray($download_link_master);
            return array(
              'state'=>true,
              'msg'=>'Download Link Master Added Successfully!',
              'details'=>$download_link_master
            );
          }
        }
        else
        {                         
          $download_link_master_id= $this->standard_model->single_insert('tbl_download_link_master',$download_link_master);
          if($error_msg && !empty($error_msg) )
          {                                                       
            return array(
              'state'=>false,
              'msg'=>'Unable to Update Download Link Master!',
              'details'=>$error_msg
              );
          }
          else
          {
            $download_link_master['download_link_master_id']=$download_link_master_id;
            $download_link_master= $this->encryptArray($download_link_master);            
            return array(
              'state'=>true,
              'msg'=>'Download Link Master Updated Successfully!',
              'details'=>$download_link_master
              );
          }
        }   
      }
      else
      {
          return array(
          'state'=>False,
          'msg'=>'Download Link Master Failed to Saved!',
          'details'=>false
          );
      }
    }
		else
		{
		    $validation_error = validation_errors();
    
		    return array(
				'state'=>False,
				'msg'=>$validation_error,
				'details'=>'Validation is failed'
		    );
		}	
  }
  /*
  =================================================================================
  Author:Mrudul Thite                 Date:17/03/2021
  =================================================================================
  validation in download_link_master
  */
	function validationdownload_link_masterdetails($details,$flag)
  {
    $this->form_validation->set_error_delimiters('','');
    
    $var1="'";
    $var2='"';
    
    $this->form_validation->set_data(
      array(
          'download_link_master_id'=>isset($details['download_link_master_id']) ? $details['download_link_master_id'] :'',
          'download_link_name'=>isset($details['download_link_name']) ? $details['download_link_name'] :'',
          'download_link_description'=>isset($details['download_link_description']) ? $details['download_link_description'] :''
              )
        );
    $this->form_validation->set_rules('download_link_master_id', 'download_link_master_id',array('min_length[1]','max_length[5]','regex_match[/^([0-9][0-9]{0,4})$/]'),
    array(
      'min_length'=>'Min 1 char required. ',
      'max_length'=>'Max 5 char allowed. ',
      'regex_match'=>'download_link_master_id Only numbers are allowed.'
    ));
     // if($flag==0)
     //  {
        $this->form_validation->set_rules('download_link_name', 'download_link_name',array('required','max_length[100]','regex_match[/^([A-Z0-9a-z][A-Z0-9a-z\(\)\&\-\.\,\/\_\"\|\ :\;\s]{1,99})$/]'),
          array(
            'required'=>'Download Link Name is Required',
            'max_length'=>'Max 100 char allowed.',
            'regex_match'=>'Only alphanumeric and special char & ( ) . , / - _ .$var1..$var2. & are allowed for Download Link Name'  
            
        ));

        // $download_link_name = $details['download_link_name'];
        // $flag2 = $this->standard_model->check_is_unique('tbl_download_link_master','download_link_name',$download_link_name);
        // print_r($flag2);die();
    //   }else{
    //     $this->form_validation->set_rules('download_link_name', 'download_link_name',array('required','max_length[100]','regex_match[/^([A-Z0-9a-z][A-Z0-9a-z\(\)\&\-\.\,\_\/\"\|\ :\;\s]{1,99})$/]'),
    // array(
    //         'required'=>'Download Link Name is Required',
    //         'max_length'=>'Max 100 char allowed.',
    //         'regex_match'=>' Only alphanumeric and special char & ( ) . , / - _ .$var1..$var2. & are allowed for Download Link Name',
            
    // ));
    //   }
    
    $this->form_validation->set_rules('download_link_description', 'download_link_description',array('required','max_length[200]','regex_match[/^([A-Z0-9a-z][A-Z0-9a-z\(\)\&\-\.\,\_\'\/\[\]\"\:\;\s]{2,199})$/]'),
    array(
        'required'=>'Download Link Description is Required',
        'max_length'=>'Max 200 char allowed ',
        'regex_match'=>'Only alphanumeric  and special char & ( ) / . ,  - _ | [ ] " : ; space are allowed.',
       
    ));
    // if($this->form_validation->run()==true)
    // {
    //   if(true==$flag2)
    //   {
    //     return true;
    //   }   
    //   else
    //   {
    //     return false;
    //   }
    // }
    // else
    // {
    //     return false;
    // }
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
  Author:Mrudul Thite                 Date:17/03/2021
  =================================================================================
  Purpose:- To hide download_link_master data.
	parameter:download_link_master_id
  response:
   return array(
      'state'=>TRUE,
      'msg'=>'download_link_master hidden!',
      'details'=>$details
    );
  */
  public function _hide_download_link_master($details=false)
  {
   $details = $this->decryptArray($details);
    if(isset($details['download_link_master_id']))
		{
			$id=$details['download_link_master_id'];
		
			$download_link_master=array(
				'in_use'=>'N',
			);
			$results = $this->standard_model->updateRecord('tbl_download_link_master','download_link_master_id',$id,$download_link_master);
      $resdata = $this->standard_model->selectAllWhr('tbl_download_link_master','download_link_master_id',$details['download_link_master_id']);
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
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide download_link_master';
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
			'msg'=>'download_link_master_id Required!',
			);
		}
  }
  /*
  =================================================================================
  Author:Mrudul Thite                 Date:17/03/2021
  =================================================================================
  Purpose:- To restore download_link_master.
  parameter:download_link_master_id
  response: return array(
      'state'=>TRUE,
      'msg'=>'download_link_master restored!',
      'details'=>$details
    );
  */
  public function _restore_download_link_master($details=false)
  {
    $details = $this->decryptArray($details);
    if(isset($details['download_link_master_id']))
		{
	  	$id=$details['download_link_master_id'];
    	$download_link_master=array(
				'in_use'=>'Y',
			);
			$results = $this->standard_model->updateRecord('tbl_download_link_master','download_link_master_id',$id,$download_link_master);
       $resdata = $this->standard_model->selectAllWhr('tbl_download_link_master','download_link_master_id',$details['download_link_master_id']);
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
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to restore download_link_master!';
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
			'msg'=>'download_link_master_id Required!',
			);
		}
   
  }
    /*
  =================================================================================
  Author:Mrudul Thite                 Date:17/03/2021
  =================================================================================
  Purpose:- To Permanent delete download_link_master 
	parameter:download_link_master_id
	response:
	return array(
      'state'=>TRUE,
      'msg'=>'download_link_master deleted!',
      'details'=>$details
    );
	
  */
  
	public function _permanent_delete_download_link_master($details=null)
	{  
    $details = $this->decryptArray($details);
		if(isset($details['download_link_master_id']))
		{    
			$id=$details['download_link_master_id'];
			$download_link_master=array(
					'display'=>'N',
				);
			$results = $this->standard_model->updateRecord('tbl_download_link_master','download_link_master_id',$id,$download_link_master);
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
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Delete download_link_master';
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
			'msg'=>'download_link_master_id Required!',
			);
		}
	}
} 













