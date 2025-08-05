<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_master_api extends Base_Controller {

  public function __construct()
  {
      parent::__construct(); 
     
      $this->load->model('standard/standard_model');
  
  }
 /*
  -------------------------------------------------------------
  Author  : Apurva Bandelwar        Date: 12-03-2021
  -------------------------------------------------------------
  */
  public function _get_news_master($details=false)
    {
        $details = $this->decryptArray($details);
        //$id=$details['news_id'];
        //$result = $this->standard_model->selectAllWhr('tbl_news_master','news_id',$id);

        if(isset($details['news_id']))
        {
          $id=$details['news_id']; 
          $result = $this->standard_model->selectAllWhr('tbl_news_master','news_id',$id);
        }
        elseif (isset($details['all'])) 
        {
          $result= $this->standard_model->selectAll('tbl_news_master');
        }
        else
        {
          $result= $this->standard_model->selectAll('tbl_news_master','in_use','Y');
        }

        if($result)
        {
            return array(
                  'msg'=>'Record Fetch Successfully!',
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
	-------------------------------------------------------------
	Author  : Apurva Bandelwar        Date: 12-03-2021
	-------------------------------------------------------------
	*/
  public function _set_news_master($details=false)
  {
      $validation_error='';
      $details = $this->decryptArray($details);
      $user_id= $this->session->userdata('user_id'); 
      if(isset($details['news_id']) && !empty($details['news_id']))
        {
            $flag=1;
        }
        else
        {
            $flag=0;
        }
     
        if($this->validation_news_master($details))
        {
        if(!isset($details['visibility']) && empty($details['visibility']))
        {
          $details['visibility']= "N";
        }
        if($details)
        {
          $news = array(
                           'news_name'=>$details['news_name'],
                           'news_desc'=>$details['news_desc'],
                           'visibility'=>$details['visibility'],
                           'modified_by'=>$user_id,
                           'modified_on'=>date('Y-m-d H:i:s'),
                           'news_id'=>isset($details['news_id'])?$details['news_id']:''
                          );
          $error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
          if($flag==0)
          {
              $news['inserted_by']=$user_id;
              $news['inserted_on']=date('Y-m-d H:i:s');
              $news['display']='Y';
              $news['in_use']='Y';
              $news_id= $this->standard_model->single_insert('tbl_news_master',$news);
              if($error_msg && !empty($error_msg) )
              {                                                       
                  return array(
                      'state'=>false,
                      'msg'=>'Unable to Add News!',
                      'details'=>$error_msg
                  );
              }
              else
              {
                  $news['news_id']=$news_id;
                  $news= $this->encryptArray($news);
                  return array(
                      'state'=>true,
                      'msg'=>'News Added Successfully!',
                      'details'=>$news
                  );
              }
          }
          else
          {                                                   
              $news_id= $this->standard_model->single_insert('tbl_news_master',$news);
              if($error_msg && !empty($error_msg) )
              {                                                       
                  return array(
                      'state'=>false,
                      'msg'=>'Unable to Update News!',
                      'details'=>$error_msg
                      );
              }
              else
              {
                  $news['news_id']=$news_id;
                  $news= $this->encryptArray($news);                
                  return array(
                      'state'=>true,
                      'msg'=>'News Updated Successfully!',
                      'details'=>$news
                      );
              }
          }   
        }
        else
        {
          return array(
              'msg'=>'News Master Failed to Saved!',
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
  Author  : Apurva Bandelwar        Date: 12-03-2021
  -------------------------------------------------------------
  */
  public function _hide_news_master($details=false)
  {
    $details = $this->decryptArray($details);
    if(isset($details['news_id']))
    {
      $id=$details['news_id'];
      $records= array('in_use'=>'N');
      $result = $this->standard_model->updateRecord('tbl_news_master','news_id',$id,$records);
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
        $message = isset($this->standard_model->error )?$this->standard_model->error['message']:'Unable to hide News Master';
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
                      'msg'=>'news_id Required!',
                      'details'=>false
                     );
      }
  }


  /*
  -------------------------------------------------------------
  Author  : Apurva Bandelwar        Date: 12-03-2021
  -------------------------------------------------------------
  */
  public function _restore_news_master($details=false)
  {
    $details = $this->decryptArray($details);
    if(isset($details['news_id']))
    {
      $id=$details['news_id'];
      $records= array('in_use'=>'Y');
      $result = $this->standard_model->updateRecord('tbl_news_master','news_id',$id,$records);
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
        $message = isset($this->standard_model->error )?$this->standard_model->error['message']:'Unable to restore News Master';
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
                      'msg'=>'news_id Required!',
                      'details'=>false
                     );
      }    
  }
  /*
  -------------------------------------------------------------
  Author  : Apurva Bandelwar        Date: 12-03-2021
  -------------------------------------------------------------
  */
  public function _permanent_delete_news_master($details=false)
  {          
    $details = $this->decryptArray($details); 
    $id=$details['news_id'];
    $records=array('display'=>'N');
    $result=$this->standard_model->updateRecord('tbl_news_master','news_id',$id,$records);
    if($result)
    {
         $result = $this->encryptArray($details);
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
                      'msg'=>'news  Failed to delete!',
                      'details'=>false
                    );
        }
  }
  /*
  -------------------------------------------------------------
  Author  : Apurva Bandelwar        Date: 12-03-2021
  -------------------------------------------------------------
  */
  public function validation_news_master($details)
  {
    $this->form_validation->set_error_delimiters('','');
    $this->form_validation->set_data(
    array(
        'news_name'=>isset($details['news_name']) ? $details['news_name'] :'',
        'news_desc'=>isset($details['news_desc']) ? $details['news_desc'] :'',
        )
    );
    $this->form_validation->set_rules('news_name','news_name ',
    array('required'),
    array(
        'required'=>'News name is Required',
       
        )
    );
    $this->form_validation->set_rules('news_desc','news_desc',
    array('required','max_length[500]'),
    array(
          'required'=>'News Descripation is Required',
          'max_length'=>'News Descripation should not have more than 500 Number',
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

