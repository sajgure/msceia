<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_master_api extends Base_Controller {

  public function __construct()
  {
      parent::__construct(); 
     
      $this->load->model('standard/standard_model');
  
  }
 /*
  -------------------------------------------------------------
  Author  : Nikhil Swami        Date: 28/02/2020
  -------------------------------------------------------------
  */
  public function _get_slider_master($details=false)
    {
        // $details = $this->decryptArray($details);
        // $id=$details['slider_master_id'];
        // $result = $this->standard_model->selectAllWhr('tbl_slider_master','slider_master_id',$id);
        // if($result)
        // {
        //     return array(
        //           'msg'=>'Succesfully Fetch Record!',
        //           'state'=>true,
        //           'details'=>$result
        //     );
        //     $result= $this->encryptArray($result);
        // }
        // else
        // {
        //      return array(
        //           'msg'=>'Unable Fetch Record!',
        //           'state'=>false,
        //           'details'=>false
        //     );
        // }
       $details = $this->decryptArray($details);
      if(isset($details['slider_master_id']))
      {
      $results = $this->standard_model->selectAllWhr('tbl_slider_master','slider_master_id',$details['slider_master_id']);
      }
      else if(isset($details['all'])){
      $results= $this->standard_model->selectAll('tbl_slider_master');
      }
      else {
        $results= $this->standard_model->selectAll('tbl_slider_master','in_use','Y');
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
	-------------------------------------------------------------
	Author 	: Nikhil Swami				Date: 28/02/2020
	-------------------------------------------------------------
	*/
  public function _set_slider_master($details=false)
  {
      $validation_error='';
      $details = $this->decryptArray($details);
      if(isset($details['slider_master_id']) && !empty($details['slider_master_id']))
        {
            $flag=1;
        }
        else
        {
            $flag=0;
        }
     
      if($this->validation_slider_master($details))
      {
        if(!isset($details['visibility']) && empty($details['visibility']))
        {
          $details['visibility']= "N";
        }
        if($details)
        {
          $slider = array(
                           'slider_name'=>$details['slider_name'],
                           'slider_descripation'=>$details['slider_descripation'],
                           'visibility'=>$details['visibility'],
                           'image'=>$details['image'],
                           'modified_by'=>1,
                           'modified_on'=>date('Y-m-d H:i:s'),
                           'slider_master_id'=>isset($details['slider_master_id'])?$details['slider_master_id']:''
                          );
          //      if(!isset($details['slider_master_id']) && empty($details['slider_master_id']))
          //      {
          //        $slider['inserted_by']=1;
          //        $slider['inserted_on']=date('Y-m-d');
          //      }
          // $slider_master_id = $this->standard_model->single_insert('tbl_slider_master',$slider);
          // $slider['slider_master_id']=$slider_master_id;
          // $slider= $this->encryptArray($slider);
          // if(isset($details['slider_master_id']) && !empty($details['slider_master_id']))
          // {
          //   return array(
          //               'state'=>true,
          //               'msg'=>'Update Record!',
          //               'details'=>$slider
          //               );
          // }
          // else{
          //   return array(
          //     'state'=>true,
          //     'msg'=>'Slider Master registered!',
          //     'details'=>$slider
          //     );
          // }
          $error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
          if($flag==0)
          {
              $slider['inserted_by']=1;
              $slider['inserted_on']=date('Y-m-d H:i:s');
              $slider['display']='Y';
              $slider['in_use']='Y';
              $slider_master_id= $this->standard_model->single_insert('tbl_slider_master',$slider);
              if($error_msg && !empty($error_msg) )
              {                                                       
                  return array(
                      'state'=>false,
                      'msg'=>'Unable to Add Slider!',
                      'details'=>$error_msg
                  );
              }
              else
              {
                  $slider['slider_master_id']=$slider_master_id;
                  $slider= $this->encryptArray($slider);
                  return array(
                      'state'=>true,
                      'msg'=>'Slider Added Successfully!',
                      'details'=>$slider
                  );
              }
          }
          else
          {                                                   
              $slider_master_id= $this->standard_model->single_insert('tbl_slider_master',$slider);
              if($error_msg && !empty($error_msg) )
              {                                                       
                  return array(
                      'state'=>false,
                      'msg'=>'Unable to Update Slider!',
                      'details'=>$error_msg
                      );
              }
              else
              {
                  $slider['slider_master_id']=$slider_master_id;
                  $slider= $this->encryptArray($slider);                
                  return array(
                      'state'=>true,
                      'msg'=>'Slider Updated Successfully!',
                      'details'=>$slider
                      );
              }
          }   
        }
        else
        {
          return array(
              'msg'=>'Slider Master Failed to Saved!',
              'state'=>False, 
              'details'=>false
            );
        }
      }
       else
       {
          $validation_error = validation_errors();
          return array(
            'msg'=>$validation_error,
            'state'=>False,
            'details'=>'Validation is failed'
          );
      }
  }
  /*
  -------------------------------------------------------------
  Author  : Nikhil Swami        Date: 28/02/2020
  -------------------------------------------------------------
  */
  public function _hide_slider_master($details=false)
  {
    $details = $this->decryptArray($details);
    if(isset($details['slider_master_id']))
    {
      $id=$details['slider_master_id'];
      $records= array('in_use'=>'N');
      $result = $this->standard_model->updateRecord('tbl_slider_master','slider_master_id',$id,$records);
      if($result)
        { 
        $result = $this->encryptArray($details);
        return array(
                      'state'=>true,
                      'msg'=>'Record Hide Successfully!',
                      'details'=>$result,
                    

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
                      'msg'=>'slider_master_id Required!',
                      'details'=>false
                     );
      }
  }


  /*
  -------------------------------------------------------------
  Author  : Nikhil Swami        Date: 28/02/2020
  -------------------------------------------------------------
  */
  public function _restore_slider_master($details=false)
  {
    $details = $this->decryptArray($details);
    if(isset($details['slider_master_id']))
    {
      $id=$details['slider_master_id'];
      $records= array('in_use'=>'Y');
      $result = $this->standard_model->updateRecord('tbl_slider_master','slider_master_id',$id,$records);
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
                      'msg'=>'slider_master_id Required!',
                      'details'=>false
                     );
      }    
  }
  /*
  -------------------------------------------------------------
  Author  : Nikhil Swami        Date: 28/02/2020
  -------------------------------------------------------------
  */
  public function _permanent_delete_slider_master($details=false)
  {
    $id=$details['slider_master_id'];
    $records=array('display'=>'N');
    $result=$this->standard_model->updateRecord('tbl_slider_master','slider_master_id',$id,$records);
    if($result)
    {
         return array(
                      'state'=>true,
                      'msg'=>'Record Delete Successfully!',
                      'details'=>$result    
                    );
    }
    else
       {
          return array(
                      'state'=>false,
                      'msg'=>'Slider  Failed to delete!',
                      'details'=>false
                    );
        }
  }
  /*
  -------------------------------------------------------------
  Author  : Nikhil Swami        Date: 28/02/2020
  -------------------------------------------------------------
  */
  public function validation_slider_master($details)
  {
    $this->form_validation->set_error_delimiters('','');
    $this->form_validation->set_data(
    array(
        'slider_name'=>isset($details['slider_name']) ? $details['slider_name'] :'',
        'slider_descripation'=>isset($details['slider_descripation']) ? $details['slider_descripation'] :'',
        )
    );
    $this->form_validation->set_rules('slider_name','slider_name ',
    array('required'),
    array(
        'required'=>'Slider name is Required',
       
        )
    );
    $this->form_validation->set_rules('slider_descripation','slider descripation',
    array('required','max_length[500]'),
    array(
          'required'=>'Slider descripation is Required',
          'max_length'=>'Slider descripation should not have more than 500 Number',
          )
    );
    if($this->form_validation->run()==true)
      {
        return true;
      }else{
        return false;
      }
  }
}

