<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_api extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Bismilla Sanade				Date: 04 March 20
	-------------------------------------------------------------
	*/

	public function __construct()
  	{
	    parent::__construct(); 
        $this->load->model('standard/standard_model');
    }

    /*
        function for set menu data.
    */
	public function _setmenu($details=null) 
    {
        $details = $this->decryptArray($details);
        $validation_error='';

        $user_id= $this->session->userdata('user_id'); 

        if(isset($details['menu_id']) && !empty($details['menu_id']))
        {
            $flag=1;
        }
        else
        {
            $flag=0;
        }
       
        if($this->validation_menu_details($details,$flag))
        { 
            if($details)
            {
                $menu_data=array(
                    'menu_name'=>$details['menu_name'],
                    'icon'=>$details['icon'],
                   // 'link'=>$details['link'],
                    // 'modified_by'=>1,
                    // 'modified_on'=>date('Y-m-d H:i:s'),
                    'menu_id'=>isset($details['menu_id'])?$details['menu_id']:NULL

                );
                // $menu_data['inserted_by']=1;
                // $menu_data['inserted_on']=date('Y-m-d H:i:s');
                // $id = $this->standard_model->single_insert('tbl_menu',$menu_data);
                // $menu_data['menu_id']=$id;
                // $menu_data= $this->encryptArray($menu_data);
                // return array(
                //     'msg'=>'menu Saved!',
                //     'state'=>true,
                //     'details'=>$menu_data
                // );
                $error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
                if($flag==0)
                {
                    $menu_data['inserted_by']=$user_id;
                    $menu_data['inserted_on']=date('Y-m-d H:i:s');
                    $menu_data['display']='Y';
                    $menu_data['in_use']='Y';
                    $menu_id= $this->standard_model->single_insert('tbl_menu',$menu_data);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Add Menu!',
                            'details'=>$error_msg
                        );
                    }
                    else
                    {
                        $menu_data['menu_id']=$menu_id;
                        $menu_data= $this->encryptArray($menu_data);
                        return array(
                            'state'=>true,
                            'msg'=>'Menu Added Successfully!',
                            'details'=>$menu_data
                        );
                    }
                }
                else
                {                                                   
                    $menu_id= $this->standard_model->single_insert('tbl_menu',$menu_data);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Update Menu!',
                            'details'=>$error_msg
                            );
                    }
                    else
                    {
                        $menu_data['menu_id']=$menu_id;
                        $menu_data= $this->encryptArray($menu_data);                
                        return array(
                            'state'=>true,
                            'msg'=>'Menu Updated Successfully!',
                            'details'=>$menu_data
                            );
                    }
                }   
            }
            else
            {
                return array(
                    'msg'=>'Menu Failed to Saved!',
                    'state'=>False, 
                    'details'=>false
                );
            }
        }
        else
        {
            $validation_error = validation_errors();
            if(""==$validation_error)
            {
                $validation_error = "Duplicate Entry For Menu Name.";
            }
            return array(
                  'msg'=>$validation_error,
                  'state'=>False,
                  'details'=>'Validation is failed'
            );
        }
    }	
     /*
        function for hide menu data.
    */
    public function _hidemenu($details=null)
    {
        $details = $this->decryptArray($details);
        if(isset($details['menu_id']))
        {

            $menu_id=$details['menu_id'];
            $menu_data=array(
                'in_use'=>'N'
            );
            $result=$this->standard_model->updateRecord('tbl_menu','menu_id',$menu_id,$menu_data);
            #echo $this->db->last_query();
            if($result)
            {
                $resdata = $this->standard_model->selectAllWhr('tbl_menu','menu_id',$details['menu_id']);
                foreach ($resdata as $res) {
                    # code...
                }
              //  $resdata=$this->encryptArray($res);
                $menu_data= $this->encryptArray($res);
                return array(
                   'msg'=>'Record Hide Successfully!',
                   'state'=>true,
                   'details'=>$menu_data
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide Menu';
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
               'msg'=>'menu id Required!',
               'details'=>false
            );
        }
       
    }
    /*
        function for restore menu data.
    */
    public function _restoremenu($details=null)
    {
        $details = $this->decryptArray($details);
        if(isset($details['menu_id']))
        {


            $menu_id=$details['menu_id'];

            $menu_data=array(
                'in_use'=>'Y'
            );
            $result=$this->standard_model->updateRecord('tbl_menu','menu_id',$menu_id,$menu_data);
            if($result)
            {
                $resdata = $this->standard_model->selectAllWhr('tbl_menu','menu_id',$details['menu_id']);
                 foreach ($resdata as $res) {
                    # code...
                }
                 $menu_data= $this->encryptArray($res);
                return array(
                      'msg'=>'Record Restore Successfully!',
                      'state'=>true,
                      'details'=>$menu_data
                );
            }
            else
            {
                    $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to restore menu';
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
               'msg'=>'menu id Required!',
               'details'=>false
            );
        }


    }
     /*
        function for delete menu data.
    */
    public function _deletemenu($details=null)
    {
        if(isset($details['menu_id']))
        {
            $details = $this->decryptArray($details);
            $menu_id=$details['menu_id'];

            $menu_data=array(
                'display'=>'N',
            );
            $result=$this->standard_model->updateRecord('tbl_menu','menu_id',$menu_id,$menu_data);
            if($result)
            {
                $details = $this->encryptArray($details);
                return array(
                      'msg'=>'Record Delete Successfully!',
                      'state'=>true,
                      'details'=>$details
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to delete category master';
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
               'msg'=>'category master id Required!',
               'details'=>false
            );
        }
  
    }

     /*
        function for fetch menu data.
    */
    public function _getmenu($details=false)
    {
        $details = $this->decryptArray($details);
        if(isset($details['all']))
        {
            $results = $this->standard_model->selectAll('tbl_menu');
        }
        else if(isset($details['menu_id']))
        {
            $results = $this->standard_model->selectAllWhr('tbl_menu','menu_id',$details['menu_id']);
        }
        else
        {
            $results = $this->standard_model->selectAll('tbl_menu','in_use','Y');
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
        function for validate menu data.
    */

    public function validation_menu_details($details,$flag)
    {
        $this->form_validation->set_error_delimiters('','');
        
        $this->form_validation->set_data(
            array(
              'menu_id'=>isset($details['menu_id']) ? $details['menu_id'] :'',
              'menu_name'=>isset($details['menu_name']) ? $details['menu_name'] :'',
             // 'link'=>isset($details['link']) ? $details['link'] :'',
              'icon'=>isset($details['icon']) ? $details['icon'] :'',
            
            )
        );
           
       /* $this->form_validation->set_rules('link','menu link ',
        array('required','max_length[80]','regex_match[/^\b((http|https):\/\/?)[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|\/?))$/]'),
            array(
                'required'=>'menu link is Required',
                'max_length'=>'maximum length should be 80 for link',
                'regex_match'=>'Invalid menu link.'
            )
        );*/

        $this->form_validation->set_rules('icon','menu icon ',
        array('required','max_length[30]','regex_match[/^([A-Za-z -_0-9 ][A-Za-z -_0-9 ]{1,30})$/]'),
            array(
                'required'=>'menu name is Required',
                'max_length'=>'maximum length should be 30 for icon',
                'regex_match'=>'Alphanumric and special char _ - allowed for icon.'
            )
        );
        if($flag==0)
        {
            $this->form_validation->set_rules('menu_name','menu name ',
            array('required','max_length[30]','regex_match[/^([A-Za-z ][A-Za-z ]{1,30})$/]'),
                array(
                    'required'=>'menu name is Required',
                    'max_length'=>'maximum length should be 30 for name',
                    'regex_match'=>'Only alphabets are allowed for name.'                    
                )
            );

            $menu_name = $details['menu_name'];
            $flag1 = $this->standard_model->check_is_unique('tbl_menu','menu_name',$menu_name);
        }
        else
        {
            $this->form_validation->set_rules('menu_name','menu name ',
            array('required','max_length[30]','regex_match[/^([A-Za-z ][A-Za-z ]{1,30})$/]'),
                array(
                    'required'=>'menu name is Required',
                    'max_length'=>'maximum length should be 30 for name',
                    'regex_match'=>'Only alphabets are allowed for name.'
                )
            );   
        }
        
        
        $this->form_validation->set_rules('menu_id','menu id',
        array('min_length[1]','max_length[5]','regex_match[/^([0-9][0-9]{0,4})$/]'),
            array(
                'min_length'=>'menu id should have at Least 1 Number',
                'max_length'=>'menu id should not have more than 5 Number',
                'regex_match'=>'Only numbers are allowed.',
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
    
}
