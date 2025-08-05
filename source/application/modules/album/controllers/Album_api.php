<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Album_api extends Base_Controller 
{
	public function __construct()
  	{
	    parent::__construct();    
    $this->load->module('album/album_api');
    $this->load->model('standard/standard_model');
    }
    /*  
    =================================================================================
    Author:Mrudul Thite                 Date:29/2/2020
    =================================================================================
    Purpose: Get list for album 
    parameter:none,all,user_id 
	  response:return array(
          'state'=>TRUE,
          'msg'=>'Records Found!',
          'details'=>array(
              array(
                  'album_id'=>'1',
                  'album_name'=>'photo',
                  'album_desc'=> 'photo desc'
                    ),
              array(
                  'album_id'=>'2',
                  'album_name'=>'album',
                  'album_desc'=> 'album desc'
              )
          )
        );
	  */
    
    public function _get_album($details=false)
   {
     $details = $this->decryptArray($details);
      if(isset($details['album_id']))
      {
      $results = $this->standard_model->selectAllWhr('tbl_album','album_id',$details['album_id']);
      }
      else if(isset($details['all'])){
      $results= $this->standard_model->selectAll('tbl_album');
      }
      else {
        $results= $this->standard_model->selectAll('tbl_album','in_use','Y');
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
  Author:Mrudul Thite                 Date:29/2/2020
  =================================================================================
  Purpose: Save album 
  parameter:album_name,album_desc,album_id
	response:
	 return array(
      'state'=>TRUE,
      'msg'=>'New album added!',
      'details'=>$details
    );
  */
  public function _set_album($details=false)
  {
    $user_id= $this->session->userdata('user_id');
    $validation_error='';
    if(isset($details['album_id']) && !empty($details['album_id']))
    {
      $flag=1;
    }
    else
    {
      $flag=0;
    }
      $details = $this->decryptArray($details);
    if(isset($details['album_id']) && !empty($details['album_id']))
    {
      $flag=1;
    }
    else
    {
      $flag=0;
    }
        if($this->validationalbumdetails($details))
		{
      if($details)
      {
          $user_id= $this->session->userdata('user_id');
          $album = array(
                      'album_name' =>$details['album_name'],
                      'album_desc' =>$details['album_desc'],
                      'modified_by'=>$user_id,
                      'modified_on'=>date('Y-m-d H:i:s'),
                      'album_id'=>isset($details['album_id'])?$details['album_id']:NULL);
          // if(!isset($details['album_id']) && empty($details['album_id']))
          // {
          //     $album['inserted_by']=1;
          //     $album['inserted_on']=date('Y-m-d H:i:s');
          // }
          // $album_id = $this->standard_model->single_insert('tbl_album',$album);
          // $album['album_id']=$album_id;
          // $album= $this->encryptArray($album);
          // if($flag==0)
          // {
          // return array(
          //             'state'=>true,
          //             'msg'=>'album added!',
          //             'details'=>$album
          //             );
          // }else{
          // return array(
          //             'state'=>true,
          //             'msg'=>'album updated!',
          //             'details'=>$album
          //             );
          // }
        $error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
        if($flag==0)
        {
          $album['inserted_by']=$user_id;
          $album['inserted_on']=date('Y-m-d H:i:s');
          $album['display']='Y';
          $album['in_use']='Y';
          $album_id= $this->standard_model->single_insert('tbl_album',$album);
          if($error_msg && !empty($error_msg) )
          {                                                       
            return array(
              'state'=>false,
              'msg'=>'Unable to Add album!',
              'details'=>$error_msg
            );
          }
          else
          {
            $album['album_id']=$album_id;
            $album= $this->encryptArray($album);
            return array(
              'state'=>true,
              'msg'=>'Album Added Successfully!',
              'details'=>$album
            );
          }
        }
        else
        {                         
          $album_id= $this->standard_model->single_insert('tbl_album',$album);
          if($error_msg && !empty($error_msg) )
          {                                                       
            return array(
              'state'=>false,
              'msg'=>'Unable to Update album!',
              'details'=>$error_msg
              );
          }
          else
          {
            $album['album_id']=$album_id;
            $album= $this->encryptArray($album);            
            return array(
              'state'=>true,
              'msg'=>'Album Updated Successfully!',
              'details'=>$album
              );
          }
        }   
      }
      else
      {
          return array(
          'state'=>False,
          'msg'=>'album Failed to Saved!',
          'details'=>false
          );
      }
    }
		else
		{
		    $validation_error = validation_errors();
        if(""==$validation_error)
        {
          $validation_error = "Duplicate Entry For Constant";
        }
		    return array(
				'state'=>False,
				'msg'=>$validation_error,
				'details'=>'Validation is failed'
		    );
		}	
  }
  /*
  =================================================================================
  Author:Mrudul Thite                 Date:29/2/2020
  =================================================================================
  validation in album
  */
	function validationalbumdetails($details)
  {
    $this->form_validation->set_error_delimiters('','');
    
    $var1="'";
    $var2='"';
    if(isset($details['album_id']) && !empty($details['album_id']))
    {
      $flag=1;
    }
    else
    {
      $flag=0;
    }
    $this->form_validation->set_data(
      array(
          'album_id'=>isset($details['album_id']) ? $details['album_id'] :'',
          'album_name'=>isset($details['album_name']) ? $details['album_name'] :'',
          'album_desc'=>isset($details['album_desc']) ? $details['album_desc'] :''
              )
        );
    $this->form_validation->set_rules('album_id', 'album_id',array('min_length[1]','max_length[5]','regex_match[/^([0-9][0-9]{0,4})$/]'),
    array(
      'min_length'=>'Min 1 Char Required. ',
      'max_length'=>'Max 5 Char Required. ',
      'regex_match'=>'album_id Only numbers are allowed.'
    ));
    if($flag==0)
    {       
        $this->form_validation->set_rules('album_name', 'album_name',array('required','max_length[100]','regex_match[/^([A-Z0-9a-z][A-Z0-9a-z\(\)\&\-\.\,\/\_\"\|\ :\;\s]{1,99})$/]'),
          array(
            'required'=>'Album Name is Required',
            'max_length'=>'Max 100 char allowed.',
            'regex_match'=>'Only alphanumeric and special char & ( ) . , / - _ .$var1..$var2. & are allowed for Album name'         
        ));
        $album_name = $details['album_name'];
        $flag1 = $this->standard_model->check_is_unique('tbl_album','album_name',$album_name);
    }else{
        $this->form_validation->set_rules('album_name', 'album_name',array('required','max_length[100]','regex_match[/^([A-Z0-9a-z][A-Z0-9a-z\(\)\&\-\.\,\_\/\"\|\ :\;\s]{1,99})$/]'),
    array(
            'required'=>'Album Name is Required',
            'max_length'=>'Max 100 char allowed.',
            'regex_match'=>' Only alphanumeric and special char & ( ) . , / - _ .$var1..$var2. & are allowed for Album name',
            
    ));
      }
    
    $this->form_validation->set_rules('album_desc', 'album_desc',array('required','max_length[200]','regex_match[/^([A-Z0-9a-z][A-Z0-9a-z\(\)\&\-\.\,\_\'\/\[\]\"\:\;\s]{2,199})$/]'),
    array(
        'required'=>'Album Desc is Required',
        'max_length'=>'Max 200 char allowed ',
        'regex_match'=>'Only alphanumeric  and special char & ( ) / . ,  - _ | [ ] " : ; space are allowed.',
       
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
  Author:Mrudul Thite                 Date:29/2/2020
  =================================================================================
  Purpose:- To hide album data.
	parameter:album_id
  response:
   return array(
      'state'=>TRUE,
      'msg'=>'album hidden!',
      'details'=>$details
    );
  */
  public function _hide_album($details=false)
  {
   $details = $this->decryptArray($details);
    if(isset($details['album_id']))
		{
			$id=$details['album_id'];
		
			$album=array(
				'in_use'=>'N',
			);
			$results = $this->standard_model->updateRecord('tbl_album','album_id',$id,$album);
      $resdata = $this->standard_model->selectAllWhr('tbl_album','album_id',$details['album_id']);
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
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide Album';
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
			'msg'=>'album_id Required!',
			);
		}
  }
  /*
  =================================================================================
  Author:Mrudul Thite                 Date:29/2/2020
  =================================================================================
  Purpose:- To restore album.
  parameter:album_id
  response: return array(
      'state'=>TRUE,
      'msg'=>'album restored!',
      'details'=>$details
    );
  */
  public function _restore_album($details=false)
  {
    $details = $this->decryptArray($details);
    if(isset($details['album_id']))
		{
	  	$id=$details['album_id'];
    	$album=array(
				'in_use'=>'Y',
			);
			$results = $this->standard_model->updateRecord('tbl_album','album_id',$id,$album);
       $resdata = $this->standard_model->selectAllWhr('tbl_album','album_id',$details['album_id']);
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
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to restore Album!';
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
			'msg'=>'album_id Required!',
			);
		}
   
  }
    /*
  =================================================================================
  Author:Mrudul Thite                 Date:29/2/2020
  =================================================================================
  Purpose:- To Permanent delete album 
	parameter:album_id
	response:
	return array(
      'state'=>TRUE,
      'msg'=>'album deleted!',
      'details'=>$details
    );
	
  */
  
	public function _permanent_delete_album($details=null)
	{  
    $details = $this->decryptArray($details);
		if(isset($details['album_id']))
		{    
			$id=$details['album_id'];
			$album=array(
					'display'=>'N',
				);
			$results = $this->standard_model->updateRecord('tbl_album','album_id',$id,$album);
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
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Delete Album';
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
			'msg'=>'album_id Required!',
			);
		}
	}
} 













