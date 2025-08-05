<?php defined('BASEPATH') OR exit('No direct script access allowed');
Class Standard_model extends CI_Model
{
     /*
    --------------------------------------------------------------------------------------------------------------
        AUTHOR : Gaurav Chavan                                    Date:29/06/2016
    --------------------------------------------------------------------------------------------------------------
    */
    private $returnarray;
    public $dependancy_fields;

    public function __construct() 
    {
        parent::__construct();
        $this->error=false;
        $this->returnarray = array();
    }
    /*
    --------------------------------------------------------------------------------------------------------------
        AUTHOR :Mahadev Mandole                                            Date:11-12-2017
        Description:
    --------------------------------------------------------------------------------------------------------------
    */
    public function setDbConnectionObject($obj) {
        if ($obj)  {
            $this->db=$obj;
            return TRUE;
        }
        return false;
    }
    /*
    --------------------------------------------------------------------------------------------------------------
        AUTHOR : Rupali Bora                                      Date:29/06/2016
    --------------------------------------------------------------------------------------------------------------
    */
    public function save_record($tablename,$insertdata)
    {
        $returnarray = array();
       $this->db->trans_start();
        try 
        {
            $result = $this->db->insert($tablename,$insertdata);
            $error = $this->db->error(); 
            $id = $this->db->insert_id();
            $this->db->trans_complete();
            if($result)
            {
               
                if($id)
                {
                    $returnarray['id'] = $id;
                    $returnarray['state'] = TRUE;
                   
                }
                else
                {
                    $returnarray['errormsg'] = "Unknown Error";
                    $returnarray['error_code'] = $error['code'];
                    $returnarray['state'] = FALSE;
                }
            }
            else
            {
                if($error['code'] === 1062)
                {
                    $errormsg = "Record already exists !";
                }
                else
                {
                    $errormsg = "Unknown Database error !";
                }
                $returnarray['errormsg'] = $errormsg;
                $returnarray['error_code'] = $error['code'];
                $returnarray['state'] = FALSE;
            }
        } 
        catch (Exception $e) 
        {
            $returnarray['errormsg'] ="Unlnown Error 2";
            $returnarray['state'] = FALSE;
            
        }
        return $returnarray;
        
    }
    /*
    --------------------------------------------------------------------------------------------------------------
        AUTHOR : Rupali Bora                                    Date:12-06-2016
    --------------------------------------------------------------------------------------------------------------
    */
    public function add_delete_record($columnname,$id,$tablename,$changedata)
    {
        $this->db->trans_start();
        $this->db->WHERE($columnname,$id)
                 ->UPDATE($tablename,$changedata);
        $this->db->trans_complete();
        if ($this->db->affected_rows() == 1) 
        {
            return TRUE;
        } 
        else 
        {
            if ($this->db->trans_status() === FALSE) 
            {
                return false;
            }
            return true;
        }
    }
    /*
    --------------------------------------------------------------------------------------------------------------
        AUTHOR : Rupali Bora                                    Date: 13-06-2016
    --------------------------------------------------------------------------------------------------------------
    */
    public function insert_batch($tablename,&$insertdata,$transaction=TRUE)
    {
        if($transaction == TRUE)
        {
            if(!empty($insertdata) && $insertdata && is_array($insertdata) && count($insertdata))
            {
                $this->db->trans_start();
                $this->db->insert_batch($tablename,$insertdata);
                
                $insertDetails=array(
                        'first_insert_id'=>$this->db->insert_id(),
                        'no_records'=> $this->db->affected_rows()
                    );
                $this->error=$this->db->error();
                $this->db->trans_complete();
                if($this->db->trans_status()===FALSE)
                {
                    echo $this->error;
                    log_message('error', 'DB transaction failed Table:'.$tablename.' Details');
                    log_message('debug',print_r($insertdata,TRUE));    
                    return FALSE;
                }
                else
                {
                    $insertedIds = $this->_getLastInsertedIds($tablename,$insertdata,$insertDetails);
                    // print_r($insertdata);
                    return $insertdata;
                }
            }
            else
            {
                
                return FALSE;
            }
        }
        else
        {
            if(!empty($insertdata) && $insertdata && is_array($insertdata) && count($insertdata))
            {
                $q = $this->db->insert_batch($tablename,$insertdata);

                $insertDetails=array(
                        'first_insert_id'=>$this->db->insert_id(),
                        'no_records'=> $this->db->affected_rows()
                    );
                 $array=$this->_getLastInsertedIds($tablename,$insertdata,$insertDetails);
                return $q;
            }
            else
            {
                return FALSE;
            }
        }
    }
         /*
    --------------------------------------------------------------------------------------------------------------
        AUTHOR : Rupali Bora                                    Date: 12-07-2016
    --------------------------------------------------------------------------------------------------------------
    */
    public function insert_batch_multiple_tables($insertdata)
    {
        if(!empty($insertdata) && $insertdata && is_array($insertdata) && count($insertdata))
        {
            $this->db->trans_start();
            foreach ($insertdata as $key => $value) 
            {
                if(isset($key) && isset($value) && !empty($key) && !empty($value)) {
                    $this->db->insert_batch($key,$value);
                    if($this->db->trans_status()===FALSE)
                    {
                        $this->db->trans_rollback();
                    }
                }
            }
            $this->db->trans_complete();
            if($this->db->trans_status() === TRUE)
            {
                $this->returnarray['state']=TRUE;
                $this->returnarray['msg']="Saved successfully";
            }
            else
            {
                $this->returnarray['state']=FALSE;
                $this->returnarray['msg']='Unknown error occured';
            }
            return $this->returnarray;
        }
        else
        {
            $this->returnarray['state']=FALSE;
            $this->returnarray['msg']='Unknown error occured';
        }

    }
    /*
    --------------------------------------------------------------------------------------------------------------
        AUTHOR : Rupali Bora                                    Date: 13-06-2016
        AUTHOR : Sumit D                                        Date: 01-05-2017
        Changes: wrong transaction statements corrected 
    --------------------------------------------------------------------------------------------------------------
    */
    public function update_batch($tablename,$updatedata,$field_name,$transaction=TRUE)
    {
        if(!empty($updatedata) && $updatedata && is_array($updatedata) && count($updatedata))
        {
            if($transaction)
            {
                $this->db->trans_start();
                $this->db->update_batch($tablename, $updatedata,$field_name); 
                //The first parameter will contain the table name, the second is an associative array of values, the third parameter is the where key.
                $this->db->trans_complete();
                if($this->db->trans_status()===FALSE)
                {
                    log_message('error',$this->db->_error_message());
                    return FALSE;
                }
                else
                {
                    return TRUE;
                }
            }else{
               $result = $this->db->update_batch($tablename, $updatedata,$field_name);
               return $result;
            }
        }
        else
        {
            return FALSE;
        }
    }
    /*
    --------------------------------------------------------------------------------------------------------------
        AUTHOR : Rupali Bora                                    Date: 13-06-2016
        AUTHOR : Sumit D.                                     Date: 13-04-2017
    Correction: Removed trasnaction statements as they are not required for fetching
    --------------------------------------------------------------------------------------------------------------
    $type: true to return array else retruns object 
    */
    public function fetch_record($tablename,$where,$type=FALSE)
    {
        $this->db->where($where);
        if(isset($this->order_by)){
            $this->db->ORDER_BY($this->order_by);
        }
        $sql = $this->db->get($tablename);
        if($sql && $sql->num_rows()>0)
        {
            if($type){
            return $sql->result_array();
            }else{
            return $sql->result();
            }
        }
        else
        {
            return FALSE;
        }
    }
    /*
    --------------------------------------------------------------------------------------------------------------
        AUTHOR : Rupali Bora                                    Date: 13-06-2016
        AUTHOR : Sumit D                                         Date: 13-04-2017
        Correction: removed trasnaction committ and roll back trasnaction statement as they are auto
    --------------------------------------------------------------------------------------------------------------
    */
    public function delete_batch($tablename,$column_name,$id)
    {
        $this->db->trans_start();
        $sql = $this->db->where($column_name, $id)
                ->delete($tablename); 
        $this->db->trans_complete();
        if($sql)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    /*
    --------------------------------------------------------------------------------------------------------------
        AUTHOR : Rupali Bora                                    Date: 14-06-2016
    --------------------------------------------------------------------------------------------------------------
    */
    /*public function update_record($tablename,$update_data,$columnname,$id)
    {
        try
        { 
            // $this->db->trans_start();
            $result = $this->db->update($tablename,$update_data,array($columnname=>$id));
            $error = $this->db->error();

            if($result)
            { 
                $num=$this->db->affected_rows();
                if($num>0)
                {
                    $this->returnarray['state']=TRUE;
                }
                else
                {
                    $this->returnarray['state']=FALSE;
                    $this->returnarray['msg']='No changes made';
                }
               
           }
           else
           {
           
               if($error['code'])
               {
                    $this->returnarray['state']=FALSE;
                    $this->returnarray['msg']=$error['message'];
               }
               else
               {
                    $this->returnarray['state']=FALSE;
                    $this->returnarray['msg']='Unknown error occured';
               }
           }
           return $this->returnarray;  
        }
        catch (Exception $e) 
        {
            // $this->db->trans_complete();
            $this->returnarray['state'] = FALSE;
            $this->returnarray['msg']='Unknown exception occured';
            return $this->returnarray;
        }  
    }*/
     /*
    --------------------------------------------------------------------------------------------------------------
        AUTHOR : Rupali Bora                                    Date: 14-06-2016
    --------------------------------------------------------------------------------------------------------------
    */
    public function update_record($tablename,$update_data,$columnname,$id)
    {
        try
        { 
            // $this->db->trans_start();
            // $result = $this->db->update($tablename,$update_data,array($columnname=>$id));
            // $error = $this->db->error();
            $where = array($columnname=>$id);
            $result = $this->update($tablename,$update_data,$where);
            $this->error = $this->db->error();
            return $result;
           /* if($result)
            { 
                $num=$this->db->affected_rows();
                if($num>0)
                {
                    $this->returnarray['state']=TRUE;
                }
                else
                {
                    $this->returnarray['state']=FALSE;
                    $this->returnarray['msg']='No changes made';
                }
               
           }
           else
           {
           
               if($error['code'])
               {
                    $this->returnarray['state']=FALSE;
                    $this->returnarray['msg']=$error['message'];
               }
               else
               {
                    $this->returnarray['state']=FALSE;
                    $this->returnarray['msg']='Unknown error occured';
               }
           }
           return $this->returnarray;  */
        }
        catch (Exception $e) 
        {
            // $this->db->trans_complete();
            $this->returnarray['state'] = FALSE;
            $this->returnarray['msg']='Unknown exception occured';
            return $this->returnarray;
        }  
    }
    /*--------------------------------------------------------------------------------------------------------------
        AUTHOR : Rupali Bora                                    Date: 02-05-2016
    --------------------------------------------------------------------------------------------------------------*/
    public function update($tablename,$update_data,$where)
    {
        if(!empty($where))
        {
            $this->db->WHERE($where);
            $result = $this->db->update($tablename,$update_data);
            $error = $this->db->error();
            if($result)
            { 
                $num=$this->db->affected_rows();
                if($num>0)
                {
                    $this->returnarray['state']=TRUE;
                }
                else
                {
                    $this->returnarray['state']=FALSE;
                    $this->returnarray['msg']='No changes made';
                }
           }
           else
           {
               if($error['code'])
               {
                    $this->returnarray['state']=FALSE;
                    $this->returnarray['msg']=$error['message'];
               }
               else
               {
                    $this->returnarray['state']=FALSE;
                    $this->returnarray['msg']='Unknown error occured';
               }
           }
           return $this->returnarray;
        }
        else{return false;}
    }
    /* 
    --------------------------------------------------------------------------------------------------------------
        AUTHOR : Amol Kodgire                                    Date: 01-07-2016
        Modified by :Mahadev Mandole                             Date: 16-12-2017
    --------------------------------------------------------------------------------------------------------------
    */
    public function multiple_where_update($tablename,$update_data,$where)
    {
        try
        { 
            if (isset($where)  && !empty($where) && is_array($where)) 
            {
               $result = $this->db->update($tablename,$update_data,$where);

                if($result)
                { 
                    $num=$this->db->affected_rows();
                    if($num>0)
                    {
                        $this->returnarray['state']=TRUE;
                    }
                    else
                    {
                        $this->returnarray['state']=FALSE;
                        $this->returnarray['msg']='No changes made';
                    }
                   
               }
               else
               {
               
                   if($error['code'])
                   {
                        $this->returnarray['state']=FALSE;
                        $this->returnarray['msg']=$error['message'];
                   }
                   else
                   {
                        $this->returnarray['state']=FALSE;
                        $this->returnarray['msg']='Unknown error occured';
                   }
               }
            }
            else
            {
                $this->returnarray['state']=FALSE;
                $this->returnarray['msg']='parameters missing';
            }
            

           return $this->returnarray;  
        }
        catch (Exception $e) 
        {
            $this->db->trans_complete();
            $this->returnarray['state'] = FALSE;
            $this->returnarray['msg']='Unknown exception occured';
            return $this->returnarray;
        }  
    }
    public function permanant_delete_record($columnname,$id,$tablename)
    {
        if (isset($id)) 
        {
            $result = $this->db->where($columnname, $id)
                                ->delete($tablename); 
            if($result && $this->db->affected_rows()>0)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
    }
    public function permanant_delete_record_two($where,$tablename)
    {
        if (isset($where)) 
        {
            $result = $this->db->where($where)
                                ->delete($tablename); 
            if($result && $this->db->affected_rows()>0)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
    }
    /*
    --------------------------------------------------------------------------------------------------------------
        AUTHOR : Rupali Bora                                    Date: 01-07-2016
    --------------------------------------------------------------------------------------------------------------
    */
    public function permanant_delete_with_multiple_where($where,$tablename)
    {
        if (isset($where)) 
        {
            foreach ($where as $key => $value) 
            {
                $this->db->where($key,$value);
            }
            $result = $this->db->delete($tablename);
            if($result && $this->db->affected_rows()>0)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
    }
    /* 
    ------------------------------------------------------------
    Author : Rupali Bora               Date : 10/08/2016
    ------------------------------------------------------------
    */
    public function fetch_city_wise_state_conutry()
    {
        $sql = $this->db->SELECT('ct.city_id,ct.city_name,st.state_id,st.state_name,cn.country_id,cn.country_name')
                        ->FROM('tbl_city as ct')
                        ->JOIN('tbl_state as st',"st.state_id = ct.state_id")
                        ->JOIN('tbl_country as cn',"cn.country_id = st.country_id")
                        ->ORDER_BY('ct.city_name')
                        ->GET();
        if($sql && $sql->num_rows()>0)
        {
            return $sql->result();
        }
        else
        {
            return FALSE;
        }
    }
    /* 
    ------------------------------------------------------------
    Author : Amol Kodgire                 Date : 01/07/2016
    ------------------------------------------------------------
    */
    public function fetch_city()
    {
        $q = $this->db->WHERE('display','Y')->order_by('tc.city_name')->get('tbl_city as tc');

        if($q && $q->num_rows()>0)
        {
            return $q->result();
        }
        else
        {
            return FALSE;
        }
    }
    /* 
    ------------------------------------------------------------
    Author : Amol Kodgire                 Date : 01/07/2016
    ------------------------------------------------------------
    */
    public function fetch_state()
    {
        $q = $this->db->WHERE('display','Y')->order_by('ts.state_name')->get('tbl_state as ts');

        if($q && $q->num_rows()>0)
        {
            return $q->result();
        }
        else
        {
            return FALSE;
        }
    }
    /* 
    ------------------------------------------------------------
    Author : Amol Kodgire                 Date : 01/07/2016
    ------------------------------------------------------------
    */
    public function fetch_country()
    {
        $q = $this->db->WHERE('display','Y')->order_by('cnt.country_name')->get('tbl_country as cnt');

        if($q && $q->num_rows()>0)
        {
            return $q->result();
        }
        else
        {
            return FALSE;
        }
    }
    /* 
    ------------------------------------------------------------
    Author : Amol Kodgire                 Date : 01/07/2016
    ------------------------------------------------------------
    */
    public function fetch_language()
    {
        $q = $this->db->WHERE('display','Y')->get('tbl_languages');

        if($q && $q->num_rows()>0)
        {
            return $q->result();
        }
        else
        {
            return FALSE;
        }
    }
    /* 
    ------------------------------------------------------------
    Author : Amol Kodgire                 Date : 01/07/2016
    ------------------------------------------------------------
    */
    public function fetch_blood_group()
    {
        $q = $this->db->WHERE('display','Y')->get('tbl_blood_group');

        if($q && $q->num_rows()>0)
        {
            return $q->result();
        }
        else
        {
            return FALSE;
        }
    }
    /* 
    ------------------------------------------------------------
    Author : Amol Kodgire                 Date : 01/07/2016
    ------------------------------------------------------------
    */
    public function fetch_timezone()
    {
        $q = $this->db->WHERE('display','Y')->get('tbl_timezone');

        if($q && $q->num_rows()>0)
        {
            return $q->result();
        }
        else
        {
            return FALSE;
        }
    }
    /*
    --------------------------------------------------------------------------------------------------------------
        AUTHOR : Rupali Bora                                    Date: 01-07-2016
    --------------------------------------------------------------------------------------------------------------
    */
    /* SAMPLE ARRAY */
   /* $insert_array = array('tbl_media'=> array(
                                                                                'fields'=> array('user_file_name'=>$option['file_name'],
                                                                                                    'system_file_name'=>$option['file_new_name'],
                                                                                                    'file_path'=>$option['relative_path'].$option['file_new_name'],
                                                                                                    'extension'=>$option['ext'],
                                                                                                    'inserted_by'=>1,
                                                                                                    'inserted_on'=>date('Y-m-d H:i:s'), 
                                                                                                    'modified_by'=>1
                                                                                                ),
                                                                                'dependency'=> array(
                                                                                            
                                                                                                        array('table'=>'tbl_temp_media',
                                                                                                                'fields'=>
                                                                                                                    array('media_id')
                                                                                                              )                                                                                                
                                                                                                    )                                                                           
                                                                            ),
                                            'tbl_temp_media'=> array(
                                                                                'fields'=> array(   
                                                                                                    'register_mobile_id'=>$option['register_mobile_id'],
                                                                                                    'title'=>$option['title'],
                                                                                                    'media_id'=>''
                                                                                                )
                                                                             )
                                        );*/
                
    public function insert_dependant_record(&$insert_array,$transaction=TRUE)
    {
        $insert_id=0;
        $table_inserted_id = array();
        if(isset($insert_array) && !empty($insert_array))
        {
            if($transaction){
                $this->db->trans_start();             
            }
           // $this->db->trans_begin();
             $failure=array();
            foreach ($insert_array as $key => &$value) 
            {
                
                $insert_id = $this->single_insert($key,$value['fields']);
                $this->returnarray['tables'][$key] = $insert_id;
                if ($insert_id == FALSE) 
                {
                    $failure[]=FALSE;
                    break;   
                }
                if(isset($value['dependency']))
                {
                    foreach ($value['dependency'] as &$dependency) 
                    {
                        $dependancy_table = $dependency['table'];
                        $dependancy_fields = $dependency['fields'];
                        $this->manage_dependancy($insert_array[$dependancy_table]['fields'],$dependancy_fields,$insert_id);
                    }
                }
            }
           // print_r($this->db->error());
            //echo "<pre>";print_r(count($failure));echo"</pre>";
            if($transaction){
               $this->db->trans_complete();
               if($this->db->trans_status()==TRUE){

                    $this->returnarray['state']=TRUE;
                    $this->returnarray['msg']="Saved successfully";

               }else{

                    log_message('error',print_r($this->db->error(),TRUE));
                    $this->returnarray['state']=FALSE;
                    $this->returnarray['msg']='Unknown error occured';
               }
            }
            else{
                if (count($failure)) {
                    $this->returnarray['state']=FALSE;
                    $this->returnarray['msg']='Unknown error occured';

                } else {
             
                    $this->returnarray['state']=TRUE;
                    $this->returnarray['msg']="Saved successfully";
                    /*if($insert_id)$this->returnarray['id']=$insert_id;*//*id sent in respective table name and Id*/

                }
            }
            return $this->returnarray;
        }
    }
    /*
    --------------------------------------------------------------------------------------------------------------
        AUTHOR : Rupali Bora                                    Date: 01-07-2016
        AUTHOR : Sumit D.                                       Date: 21-04-2017
        Change: insert and update auto detedt depending on the primery key of the table and return primery key
    --------------------------------------------------------------------------------------------------------------
    */
    public function single_insert($tablename,&$fields)
    {
        $pk=$this->getPrimeryKey($tablename);
        if(isset($fields[$pk]) && $fields[$pk]==TRUE)
        {
            $id=$fields[$pk];
            unset($fields[$pk]);
            $this->update_record($tablename,$fields,$pk,$id); 
            return $id;
        }
        else
        {
            $q = $this->db->insert($tablename,$fields);
            if($q)
            {
                $id = $this->db->insert_id();
                $fields[$pk]=$id;
                return $id;
            }
            else
            {
                $this->error = $this->db->error();
                return FALSE;
            }
        }
    }

    /*
    --------------------------------------------------------------------------------------------------------------
        AUTHOR : Archana Patil                                  Date: 09-12-2021
        
    --------------------------------------------------------------------------------------------------------------
    */

    public function check_is_unique($tablename,$field,$comparisonstring)
    {
        $query = $this->db->query("SELECT * FROM $tablename WHERE `display`='Y' AND $field='$comparisonstring'");        
        if($query->num_rows() > 0)
        {
            return false;
        }
        else
        {
            return true;
        }
            
    }
    /*
    --------------------------------------------------------------------------------------------------------------
        AUTHOR : Rupali Bora                                    Date: 01-07-2016
    --------------------------------------------------------------------------------------------------------------
    */
    public function manage_dependancy(&$dependancy_table_fields,$dependancy_fields,$insert_id)
    {
        if(is_array($dependancy_table_fields))
        {
            if(isset($dependancy_fields))
            {   
                foreach ($dependancy_fields as  $column) 
                {
                    $this->dependancy_fields[$column] = $insert_id;  
                    $dependancy_table_fields[$column] = $insert_id;
                }
            }
        }
    }
    /*
    --------------------------------------------------------------------------------------------------------------
        AUTHOR : Rupali Bora                                    Date: 13-07-2016
    --------------------------------------------------------------------------------------------------------------
    */
    /*
        EXAMPLE - array(    ['tablename']=> array('column_name'=>'', 'id'=>''),
                            ['tablename']=> array('column_name'=>'', 'id'=>''),
                       );
        NOTE -  sequence of array should be from child to parent
    */
    public function delete_multiple_records($records)
    {
        if(isset($records) && !empty($records))
        {
            $this->db->trans_start();
            foreach ($records as $key => $value) 
            {
                $this->db->where($value['column_name'], $value['id'])
                        ->delete($key); 
            }
            $this->db->trans_complete();
            if($this->db->trans_status())
            {
                $this->returnarray['state']=TRUE;
                $this->returnarray['msg']="Saved successfully";
            }
            else
            {
                $this->returnarray['state']=FALSE;
                $this->returnarray['msg']='Unknown error occured';
            }
            return $this->returnarray;
        }
        else
        {
            $this->returnarray['state']=FALSE;
            $this->returnarray['msg']='Unknown error occured';
        }
    }
    /*
    --------------------------------------------------------------------------------------------------------------
        AUTHOR : Aditya Gurav                                     Date: 02-07-2016
        Modified by :   Mahadev Mandole                           Date: 16-12-2017
    --------------------------------------------------------------------------------------------------------------
    */
    public function fetch_single_record($tablename,$where,$type=false,$field=false)
    {
        $sql = $this->db->get_where($tablename,$where);
        if($sql && $sql->num_rows()>0)
        {   
            if (isset($field) && !empty($field)) {
                return $sql->row_array()[$field];
            }
            if (isset($type) && $type) {
               return $sql->row_array();
            }else{ return $sql->row(); }
            
        }
        else
        {
            return FALSE;
        }
    }

    /*
    --------------------------------------------------------------------------------------------------------------
        AUTHOR : Amol Kodgire                                     Date: 25-11-2016
    --------------------------------------------------------------------------------------------------------------
    */
    public function insert_single_record_to_multi_dependant($fielddata)
    {
        if(isset($fielddata) && !empty($fielddata))
        {
            $this->db->trans_start();
            foreach ($fielddata as $key => $value) 
            {
                $insert_id = $this->single_insert($key,$value['fields']);
            }   
            foreach ($fielddata as $key => &$record_value) 
            {                
                if(isset($record_value['dependency']))
                {
                    $dependancy_table = key($record_value['dependency']);
                    $dependency_columns = $record_value['dependency']['fields'];
                    $insert_array=&$record_value['dependency'][$dependancy_table];
                    $insert_array_1 = $this->multi_dependancy($insert_array,$dependency_columns,$insert_id);
                    $this->insert_batch($dependancy_table,$insert_array_1,TRUE);
                }
            }
            $this->db->trans_complete();
            if($this->db->trans_status())
            {
                $this->returnarray['state']=TRUE;
                $this->returnarray['msg']="Saved successfully";
            }
            else
            {
                $this->returnarray['state']=FALSE;
                $this->returnarray['msg']='Unknown error occured';
            }
            return $this->returnarray;
        }
    }
    /*
    --------------------------------------------------------------------------------------------------------------
        AUTHOR : Rupali Bora                                     Date: 14-07-2016
    --------------------------------------------------------------------------------------------------------------
    */
    /*
        EXAMPLE :   Array
                            (
                                [tbl_blog] => Array
                                    (
                                        [0] => Array
                                            (
                                                [fields] => Array
                                                    (
                                                        [user_id] => 1
                                                        [title] => ccccccc
                                                        [content] => dddd
                                                        [blog_images] => Desert.jpg
                                                        [system_generate_filename] => 4c3bdd51cc7063a2e4eb816ce24026789e2a31f0.jpg

                                                        [alt_value] => x
                                                        [blog_cat_id] => 3
                                                        [link_hits_count] => 20
                                                        [publish_date] => 2016-07-14
                                                        [inserted_on] => 2016-07-14 15:48:41
                                                        [inserted_by] => 1
                                                        [modified_by] => 1
                                                        [status] => published
                                                        [display] => Y
                                                    )

                                                [dependency] => Array
                                                    (
                                                        [tbl_blog_tags] => Array
                                                            (
                                                                [0] => Array
                                                                    (
                                                                        [blog_id] => 
                                                                        [tag_id] => 75
                                                                        [display] => Y
                                                                        [inserted_on] => 2016-07-14 15:48:41
                                                                        [inserted_by] => 1
                                                                        [modified_by] => 1
                                                                    )

                                                                [1] => Array
                                                                    (
                                                                        [blog_id] => 
                                                                        [tag_id] => 76
                                                                        [display] => Y
                                                                        [inserted_on] => 2016-07-14 15:48:41
                                                                        [inserted_by] => 1
                                                                        [modified_by] => 1
                                                                    )

                                                            )

                                                        [fields] => Array
                                                            (
                                                                [0] => blog_id
                                                            )

                                                    )

                                            )

                                        [1] => Array
                                            (
                                                [fields] => Array
                                                    (
                                                        [user_id] => 1
                                                        [title] => dummy
                                                        [content] => dummy
                                                        [blog_images] => Desert.jpg
                                                        [system_generate_filename] => 4c3bdd51cc7063a2e4eb816ce24026789e2a31f0.jpg

                                                        [alt_value] => x
                                                        [blog_cat_id] => 3
                                                        [link_hits_count] => 20
                                                        [publish_date] => 2016-07-14
                                                        [inserted_on] => 2016-07-14 15:48:41
                                                        [inserted_by] => 1
                                                        [modified_by] => 1
                                                        [status] => published
                                                        [display] => Y
                                                    )

                                                [dependency] => Array
                                                    (
                                                        [tbl_blog_tags] => Array
                                                            (
                                                                [0] => Array
                                                                    (
                                                                        [blog_id] => 
                                                                        [tag_id] => 75
                                                                        [display] => Y
                                                                        [inserted_on] => 2016-07-14 15:48:41
                                                                        [inserted_by] => 1
                                                                        [modified_by] => 1
                                                                    )

                                                                [1] => Array
                                                                    (
                                                                        [blog_id] => 
                                                                        [tag_id] => 76
                                                                        [display] => Y
                                                                        [inserted_on] => 2016-07-14 15:48:41
                                                                        [inserted_by] => 1
                                                                        [modified_by] => 1
                                                                    )

                                                            )

                                                        [fields] => Array
                                                            (
                                                                [0] => blog_id
                                                            )

                                                    )

                                            )

                                    )

                            )
    */
    public function insert_single_to_multi_dependant($fielddata)
    {
        if(isset($fielddata) && !empty($fielddata))
        {
            $insert_ids=array();
            $this->db->trans_start();
            foreach ($fielddata as $key => &$value) 
            {
                foreach ($value as $record_key => &$record_value) 
                {
                    $insert_id = $this->single_insert($key,$record_value['fields']);
                     $insert_ids[]=$insert_id;      
                    if(isset($record_value['dependency']))
                    {
                        $dependancy_table = key($record_value['dependency']);
                        $dependency_columns = $record_value['dependency']['fields'];
                        $insert_array=&$record_value['dependency'][$dependancy_table];
                        $this->multi_dependancy($insert_array,$dependency_columns,$insert_id);
                        $this->insert_batch($dependancy_table,$insert_array,FALSE);
                    }
                }
            }
                    
            $this->db->trans_complete();
            if($this->db->trans_status())
            {
                $this->returnarray['state']=TRUE;
                $this->returnarray['insert_ids']= $insert_ids;
                $this->returnarray['msg']="Saved successfully";
            }
            else
            {
                $this->returnarray['state']=FALSE;
                $this->returnarray['msg']='Unknown error occured';
            }
            return $this->returnarray;
        }
    }
    /*
    --------------------------------------------------------------------------------------------------------------
        AUTHOR : Rupali Bora                                     Date: 14-07-2016
    --------------------------------------------------------------------------------------------------------------
    */
    public function multi_dependancy(&$insert_array,$dependency_columns,$insert_id)
    {
        if(is_array($insert_array))
        {
            if(isset($dependency_columns))
            {   
              
                foreach ($insert_array as $index => $value)
                {
                    
                    foreach ($dependency_columns as $column) 
                    {
                        $insert_array[$index][$column] = $insert_id;
                    }
                }
                return $insert_array;
                
            }
        }
    }
    /* 
    ------------------------------------------------------------
    Author : Mahadev Mandole            Date : 16/08/2016
    ------------------------------------------------------------
    */
    public function single_city_wise_state_conutry($city_id)
    {
        $sql = $this->db->SELECT('ct.city_id,ct.city_name,st.state_id,st.state_name,cn.country_id,cn.country_name')
                        ->FROM('tbl_city as ct')
                        ->JOIN('tbl_state as st',"st.state_id = ct.state_id")
                        ->JOIN('tbl_country as cn',"cn.country_id = st.country_id")
                        ->where('ct.city_id',$city_id)
                        ->GET();
        if($sql && $sql->num_rows()>0)
        {
            return $sql->row();
        }
        else
        {
            return FALSE;
        }
    }
    /* 
    ------------------------------------------------------------
    Author : Mahadev Mandole            Date : 17/11/2016
    ------------------------------------------------------------
    */
    public function fetch_all_records($tablename)
    {
        $sql = $this->db->GET($tablename);
        if($sql && $sql->num_rows()>0)
        {
            return $sql->result();
        }
        else
        {
            return FALSE;
        }
    }
    /* 
    ----------------------------------------------------------------------------------------
    Author : Rupali Bora                                    Date : 17-11-2016
    ----------------------------------------------------------------------------------------
    */
    public function fetch_all_org_list($condition='',$return_array=false)
    {
        $result ='';
        if(!empty($condition) && $condition == 'dept')
        {
            $this->db->SELECT('tog.org_id,tog.org_name,tog.org_short_name,CONCAT(tog.org_short_name,' - ',tog.org_name) as display_name');
            $this->db->FROM('tbl_org as tog');
            $this->db->JOIN('tbl_org_dept as tod','tod.org_id = tog.org_id');
            $this->db->JOIN('tbl_org_desig as todg','todg.org_id = tog.org_id');
        }
        else if(!empty($condition) && $condition == 'emp')
        {
            $this->db->SELECT('tog.org_id,tog.org_name,tog.org_short_name,CONCAT(tog.org_short_name,' - ',tog.org_name) as display_name');
            $this->db->FROM('tbl_org as tog');
            $this->db->JOIN(' tbl_org_dept as tod','tod.org_id = tog.org_id');
            $this->db->JOIN('tbl_org_desig as todg','todg.org_id = tog.org_id');
            $this->db->JOIN('tbl_org_dept_desig as todd','todd.org_desig_id = todg.org_desig_id');
            $this->db->JOIN('tbl_user_system_info as tu','tu.org_dept_desig_id = todd.org_dept_desig_id');
        }
        else
        {
            $this->db->SELECT('tog.org_id,tog.org_name,tog.org_short_name,CONCAT(tog.org_short_name,' - ',tog.org_name) as display_name');
            $this->db->FROM('tbl_org as tog');
        }
        $this->db->WHERE('tog.display','Y');
        $this->db->GROUP_BY('tog.org_name');
        $this->db->ORDER_BY('tog.org_name');
        $sql = $this->db->get();
        if($sql && $sql->num_rows()>0)
        {
            if($return_array)
            {
                return $sql->result_array();
            }
            else
            {
                return $sql->result();
            }
        }
        else
        {
            return FALSE;
        }
    }
    /*--------------------------------------------------------------------------------------------
    Sample array for singleRecordMultiTableMultiRecordBatchInsert()
        $insert_array = array
                            (
                                'tbl_student' => array
                                    (
                                            array(
                                                'fields' => Array
                                                    (
                                                        'hostel_id'=>'1',
                                                        'first_name'=>'Soham',
                                                        'middle_name'=>'S',
                                                        'last_name'=>'Kapur',
                                                        'gender_id'=>'2',
                                                        'dob'=>'1999-02-03',
                                                        'caste_id'=>'1',
                                                        'student_type'=>'1',
                                                        'register_mobile_id'=>'1',
                                                        'blood_group'=>'O+',
                                                        'email'=>'mayank@gmail.com',
                                                        'adharcard_card_no'=>'08765431284',
                                                        'status'=>'UR'
                                                    ),
                                                'dependency' => Array
                                                    (
                                                        'tbl_stud_academic' => array
                                                            (
                                                                array
                                                                    (
                                                                        'student_id'=>'',
                                                                        'college_id'=>'1',
                                                                        'college_course_id'=>'1',
                                                                        'specialization'=>'Maths',
                                                                        'roll_no'=>'1001',
                                                                        'last_appear_exam'=>'12',
                                                                        'year'=>'2017',
                                                                        'percentage'=>'89'
                                                                    )
                                                            ),
                                                        'tbl_stud_subject' => Array
                                                            (
                                                                array
                                                                    (
                                                                       'student_id'=>'1',
                                                                        'sub_name'=>'Maths'
                                                                    ),
                                                                array
                                                                    (
                                                                       'student_id'=>'1',
                                                                        'sub_name'=>'Maths'
                                                                    )
                                                            ),
                                                        'fields' => Array ('student_id')

                                                    )

                                            )

                                    )

                            );
    -------------------------------------------------------------------------------------------- */
    function singleRecordMultiTableMultiRecordBatchInsert(&$records){

        $insert=FALSE;
        $insert_id =FALSE;
        if(isset($records) && !empty($records))
        {
           $this->db->trans_start();
            foreach ($records as $table_name => &$records) 
            {
                foreach ($records as  &$singleRecord) 
                {
                    $state= $this->_getOperation($singleRecord['fields'],$table_name);
                    if( is_array($state) && ($state['operation']=='insert') ){
                         $insert_id =$this->single_insert($table_name,$singleRecord['fields']); 
                         if (isset($insert_id) && $insert_id) {
                            
                             if (isset($this->insertIds)) {
                                 # code...
                                $this->insertIds[]=$insert_id;
                             }else
                             {
                                $this->insertIds=array();
                                $this->insertIds[]=$insert_id;


                             }
                             
                         }
                    }else if(is_array($state) &&  ($state['operation'] =='update')){
                        $column=($state['primary_key']);
                        $insert_id =$singleRecord['fields'][$column];
                       
                        unset($singleRecord['fields'][$column]);
                        $this->update_record($table_name,$singleRecord['fields'],$column,$insert_id ); 
                    }else{
                       
                       return false;
                    }
                     
                    
                    if(isset($singleRecord['dependency']))
                    {
                        if(isset($singleRecord['dependency']['fields']))
                        {
                            $x=($singleRecord['dependency']['fields']);
                            $dependency_columns=$singleRecord['dependency']['fields'];
                            unset($x);
                            unset($singleRecord['dependency']['fields']);
                            foreach ($singleRecord['dependency'] as $dependancy_table => &$insert_array) {
                                
                                $this->multi_dependancy($insert_array,$dependency_columns,$insert_id);
                                $update_records = $this->checkInsertUpdate($insert_array, $dependancy_table );
                               /* if(sizeof($insert_array)){*/
                                    $this->insert_batch($dependancy_table,$insert_array,FALSE);
                               /* }*/
                                if(isset($update_records)&& is_array($update_records) && sizeof($update_records)){
                                    foreach ($update_records as $updateTable => &$updateRecord) {
                                        $field_name=$updateRecord['primary_key'];
                                        unset($update_records[$updateTable]['primary_key']);
                                        $this->update_batch($updateTable,$updateRecord,$field_name,FALSE);
                                    }
                                }
                                /*print_r($update_records);*/
                            }
                        }
                    }
                }
            }
            $this->db->trans_complete();
            if($this->db->trans_status())
            {
                $this->returnarray['state']=TRUE;
                $this->returnarray['msg']="Saved successfully";
                $this->returnarray['insert_id']=$insert_id;
            }
            else
            {
                $this->returnarray['state']=FALSE;
                $this->returnarray['msg']='Unknown error occured';
            }
            return $this->returnarray;
        }

    }

    /*
    --------------------------------------------------------------------------------------------------------------
        AUTHOR : Rupali Bora                                    Date: 13-06-2016
    --------------------------------------------------------------------------------------------------------------
    */
    public function delete_mulitple_ids_from_single_table($tablename,$id_column,$id_array)
    {
        // print_r($tablename);die;
        // $this->db->trans_start();
        $sql = $this->db->where_in($id_column,$id_array)
                ->delete($tablename); 
        // $this->db->trans_commit();
        if($sql)
        {
            // $this->db->trans_commit();
            return TRUE;
        }
        else
        {
            // $this->db->trans_rollback();
            return FALSE;
        }
    }
    /*
    -------------------------------------------------------------------------------------------------------------------
    Author     : Sumit Darbeshwar                                                                Date: 25 Mar 17
    -------------------------------------------------------------------------------------------------------------------
    */
    private function getPrimeryKey($tableName){
        $sql=$this->db->query('SHOW KEYS FROM '.$tableName.' WHERE Key_name = \'PRIMARY\'');
        if($sql && $sql->num_rows() ){
            try{

                $result=$sql->row()->Column_name;
                return $result;

            }catch(Exception $e){
                
                return FALSE;
            }
        }
        else{
            return FALSE;
        }
    }
    /*
    -------------------------------------------------------------------------------------------------------------------
    Author     : Sumit Darbeshwar                                                                Date: 25 Mar 17
    -------------------------------------------------------------------------------------------------------------------
    */
    private function checkInsertUpdate(&$records, $dependancy_table ){
        
        $update_record=false;
        foreach ($records as $key => &$record) 
        {
            $state=$this->_getOperation($record,$dependancy_table);
            if(isset($state) && is_array($state) && $state['operation']=='update')
            {
                $column=$state['primary_key'];
                $update_record[$dependancy_table][]=$record;
                $update_record[$dependancy_table]['primary_key']=$column;
                unset($records[$key]);
            }
             
        }  
        return ($update_record);   
    } 
    /*
    -------------------------------------------------------------------------------------------------------------------
    Author     : Sumit Darbeshwar                                                                Date: 25 Mar 17
    -------------------------------------------------------------------------------------------------------------------
    if primary key is found returns update, if primary key does not foumd then returns insesrt else return false 
    */
    private function _getOperation($singleRecord,$table)
    {
        $column=$this->getPrimeryKey($table);
        $debug=FALSE;
        if($debug){
           /* echo "_getOperation";
            print_r($singleRecord);
            echo $column;*/
        }

        if(isset($singleRecord) && isset($table)){
            if(isset($singleRecord[$column]) && $singleRecord[$column]!=''){
               
               return array('operation' => 'update','primary_key'=>$column);
            }
            else{
                return array('operation' =>'insert','primary_key'=>$column);
            }
        }
        else{
            return FALSE;
        }
    }
    /*
    -------------------------------------------------------------------------------------------------------------------
    Author     : Sumit Darbeshwar                                                                Date: 27 March 17
    -------------------------------------------------------------------------------------------------------------------
    Purpose:  accept following mixed array send them to sorting and then reflect in Db 
    Note: Primary key is required to table
    $records=array(
        'table_name'=>array(
            array(
                    'id'=>1,
                    'column 1'=>'',
                    'column 2'=>'',
                    'column 3'=>'',
                    'column 4'=>'',
            ),
            array(
                    'id'=>1,
                    'column 1'=>'',
                    'column 2'=>'',
                    'column 3'=>'',
                    'column 4'=>'',
            ),
            array(
                    'id'=>1,
                    'column 1'=>'',
                    'column 2'=>'',
                    'column 3'=>'',
                    'column 4'=>'',
            ),
        ),
        'table_name'=>array(
            array(
                    'id'=>1,
                    'column 1'=>'',
                    'column 2'=>'',
                    'column 3'=>'',
                    'column 4'=>'',
            ),array(
                    'id'=>1,
                    'column 1'=>'',
                    'column 2'=>'',
                    'column 3'=>'',
                    'column 4'=>'',
            ),array(
                    'id'=>1,
                    'column 1'=>'',
                    'column 2'=>'',
                    'column 3'=>'',
                    'column 4'=>'',
            ),
        )

    );    
    */
    public function _setBatchRecord(&$records){
        $updateRecords=FALSE;
        if(is_array($records) && sizeof($records)>0){
            foreach ($records as $table => &$tableRecords) 
            {
               $this->_setBatchRecordChecking($tableRecords,$table,$updateRecords);
            }
            
            $state=$this->_setBatchRecordDb($records,$updateRecords);
            if($state){
                return array('msg'=>'','state'=>TRUE); 
            }else{
                return array('msg'=>'Invalid parameter passed','state'=>FALSE); 
            }
        }else{

            return array('msg'=>'Invalid parameter passed','state'=>FALSE); 
        }
        
    } 
    /*
    -------------------------------------------------------------------------------------------------------------------
    Author     : Sumit Darbeshwar                                                                Date: 27 Mar 16
    -------------------------------------------------------------------------------------------------------------------
    purpose:filter out update records and insert records
    */
    private function _setBatchRecordChecking(&$records,$tableName, &$update_records){
       
        if(is_array($records)){
            foreach ($records as $index => $singleRecord) 
            {
                $operation=$this->_getOperation($singleRecord,$tableName);
                if($operation['operation']=='update')
                {
                    $update_records[$tableName][]=$singleRecord;
                    $update_records[$tableName]['primary_key']=$operation['primary_key'];
                    unset($records[$index]);
                }
            }            
        }
        return $update_records;
    }
    /*
    -------------------------------------------------------------------------------------------------------------------
    Author     : Sumit Darbeshwar                                                                Date: 27 Mar 16
    -------------------------------------------------------------------------------------------------------------------
    Purpose: save the records in the db insert batch and insert update
    */
    private function _setBatchRecordDb(&$insertData,&$updateData){
       
        $mode="run";
        if($mode=="run")
        {$this->db->trans_start();}
        if(is_array($insertData) && sizeof($insertData)>0){
            foreach ($insertData as $table => &$insertRecords) 
            {
               
                if(is_array($insertRecords) && sizeof($insertRecords)>0){
                   if($mode=="run") 
                  { $insertResult=$this->insert_batch($table,$insertRecords,FALSE);}
                }
               
            }
        }

        if(is_array($updateData)&& sizeof($updateData)>0){
            foreach ($updateData as $table => &$updateRecords) {
               
                if(is_array($updateRecords) && sizeof($updateRecords) && isset($updateRecords['primary_key']))
                {
                    $column=$updateRecords['primary_key'];
                    unset($updateRecords['primary_key']);
                    if($mode=="run")
                    {$updateResult=$this->update_batch($table,$updateRecords,$column,FALSE); }
                }
            }
        }
        if($mode=="run")
        {$this->db->trans_complete();}
        if($this->db->trans_status()===TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
       
    }  
    /*
     -------------------------------------------------------------
     Author     : Sumit Darbeshwar                Date: 07-Apr-17
     -------------------------------------------------------------
     Purpose: return inserted ids
     ToDo:
     */ 
     protected function _getLastInsertedIds($tablename,&$arrayRecords,$lastInsertDetails){
        $column=$this->getPrimeryKey($tablename);
        if ($column) {
            if(sizeof($arrayRecords)>0){
                $firstInsertId=$lastInsertDetails['first_insert_id'];
                foreach ($arrayRecords as $key => &$singleRecord) {
                    $singleRecord[$column]=$firstInsertId++;
                }
                return TRUE;
            }else{
                return FALSE;
            }

        }else{
            return FALSE;
        }
     }
    /*
     -------------------------------------------------------------
     Author     : Sumit Darbeshwar                Date: 07 Apr 17
     -------------------------------------------------------------
     Purpose:
     ToDo:
     */ 
     public function getTableList(){
        $tables = $this->db->list_tables();
        if($tables){
            return $tables;
        }else{
            return FALSE;
        }
     }
    /*
    -------------------------------------------------------------
     Author     : Sumit Darbeshwar                Date: 07 Apr 17
    -------------------------------------------------------------
    Purpose:
    ToDo:
    */
    public function getTableKeys(){
        $table_keys=FALSE;
        $tables=$this->getTableList();
      
        foreach ($tables as $key => $table) 
        {
             $column=$this->getPrimeryKey($table);
            if($column)
            {
                $table_keys[]='"'.$column.'"';
            }
        }
        return $table_keys;
    }
        /*
    -------------------------------------------------------------
    Author     : Sumit Darbeshwar                Date: 21 Jun 17
    -------------------------------------------------------------
    Purpose: sort the parent child array
    ToDo:
    Expected parameter: 
        $flatArray: array()
        $config:array()
            $config['id']: name of primary key column
            $config['parent']:name of parent column
            $config['children']:name of children column where sorted children inserted 
        Sample flat array 
        $flat=array(
            array("id"=>'1','other_column1'=>1,'other_column2'=>2,'parent'=>0,'children'=>array())
            array("id"=>'2','other_column1'=>1,'other_column2'=>2,'parent'=>1,'children'=>array())
            array("id"=>'3','other_column1'=>1,'other_column2'=>2,'parent'=>0,'children'=>array())
            array("id"=>'4','other_column1'=>1,'other_column2'=>2,'parent'=>2,'children'=>array())
        )
    */
    function hierarchicArray($flatArray,$config=FALSE)
    {
        /*$flat=array(
            array("id"=>'1','other_column1'=>1,'other_column2'=>2,'parent'=>0,'children'=>array()),
            array("id"=>'2','other_column1'=>1,'other_column2'=>2,'parent'=>1,'children'=>array())
            array("id"=>'3','other_column1'=>1,'other_column2'=>2,'parent'=>0,'children'=>array())
            array("id"=>'4','other_column1'=>1,'other_column2'=>2,'parent'=>2,'children'=>array())
        )*/
       /* echo "<pre>";
        print_r ($flatArray);
        echo "</pre>";*/
        $id =$parent =$children=''; 
        if(is_array($config))
        {
            if(isset($config['id'])){
                $id=$config['id'];
            }else{
                $id="id";
            }

            if(isset($config['parent']))
            {
                $parent=$config['parent'];                
            }else{
                $parent="parent";
            }

            if(isset($config['children']))
            {
                $children=$config['children'];
            }else{
                $children="children";
            }
        }else{
            $id='id';
            $parent='parent';
            $children='children';
        }
        $refs = array();
        $result = array();

        while(count($flatArray) > 0){
           
            for ($i=count($flatArray)-1; $i>=0; $i--){

                if ($flatArray[$i][$parent]==0){
                    $result[$flatArray[$i][$id]] = $flatArray[$i]; 
                    $refs[$flatArray[$i][$id]] = &$result[$flatArray[$i][$id]];
                    unset($flatArray[$i]);
                    $flatArray = array_values($flatArray);
                }
                else if ($flatArray[$i][$parent] != 0)
                {
                    if (array_key_exists($flatArray[$i][$parent], $refs))
                    {
                        $o = $flatArray[$i];
                        $refs[$flatArray[$i][$id]] = $o;
                        $refs[$flatArray[$i][$parent]][$children][] = &$refs[$flatArray[$i][$id]];
                        unset($flatArray[$i]);
                        $flatArray = array_values($flatArray);
                    }
                }
            }
      }
      $this->load->helper('cstring');
       $result=fix_keys( $result);
      return $result;
    }
    /*
    --------------------------------------------------------------------------------------------------------------
        AUTHOR :Rupali B                                     Date:13-10-2017
        Description:check for details changed in tbl_user
    --------------------------------------------------------------------------------------------------------------
    */
    public function checkForDetailsChanged($user_id=false,$check_array=false)
    {
        if(isset($user_id) && !empty($user_id))
        {
            if(isset($check_array) && !empty($check_array) && is_array($check_array))
            {
                $select = array();
                foreach ($check_array as $key => $value) 
                {
                    array_push($select, $key);
                    $this->db->OR_WHERE("$key like '$value'");     
                }
                $this->db->SELECT($select);
                $this->db->WHERE("user_id",$user_id);     
                $sql= $this->db->get("tbl_user");
                if($sql && $sql->num_rows()>0)
                {
                    return $sql->row_array();
                }else{return false;}
            }
        }
    }
    /*--------------------------------------------------------------------------------------------------------------
        AUTHOR : Rupali Bora                                      Date:08/12/2017
    -------------------------------------------------------------------------------------------------------------- */
    public function save_record_dbObj($tablename,$insertdata,$dbObj='')
    {
        $returnarray = array();
        $dbObj->trans_start();
        try 
        {
            $result = $dbObj->insert($tablename,$insertdata);
            $error = $dbObj->error(); 
            $id = $dbObj->insert_id();
            $dbObj->trans_complete();
            if($result)
            {
               
                if($id)
                {
                    $returnarray['id'] = $id;
                    $returnarray['state'] = TRUE;
                   
                }
                else
                {
                    $returnarray['errormsg'] = "Unknown Error";
                    $returnarray['error_code'] = $error['code'];
                    $returnarray['state'] = FALSE;
                }
            }
            else
            {
                if($error['code'] === 1062)
                {
                    $errormsg = "Record already exists !";
                }
                else
                {
                    $errormsg = "Unknown Database error !";
                }
                $returnarray['errormsg'] = $errormsg;
                $returnarray['error_code'] = $error['code'];
                $returnarray['state'] = FALSE;
            }
        } 
        catch (Exception $e) 
        {
            $returnarray['errormsg'] ="Unlnown Error 2";
            $returnarray['state'] = FALSE;
        }
        return $returnarray;
    }
    /*-------------------------------------------------------------------------------------------------------
        Author : Rupali Bora                            Date : 08-12-2017
        Description : get current db name (HO db name)
    -------------------------------------------------------------------------------------------------------*/
    public function fetchDbName()
    {
        $sql=$this->db->query('SELECT DATABASE() as db_name');
        if($sql && $sql->num_rows() )
        {
            $result=$sql->row()->db_name;
            return $result;
        }
        else{return false; }
    }
     /*-------------------------------------------------------------------------------------------------------
        Author : Bismilla Sanade                           Date : 27-02-2020
        Description : update table value (use for hide,restore,delete table row)
    -------------------------------------------------------------------------------------------------------*/
    
    public function updateRecord($tblname,$where,$condition,$data) 
    {
        $this->db->where($where, $condition); 
        $query = $this->db->update($tblname, $data); 
        if($query)
        {
            if($this->db->affected_rows()>0)
            {
            return true;
            }
            else
            {
            $this->error=array('message' =>"No Changes Made.",'code'=>0);
            return false;
            }
        }
       else
        {
            return false;
        } 

     
    }
     /*-------------------------------------------------------------------------------------------------------
        Author : Bismilla Sanade                           Date : 28-02-2020
        Description : permanant delete record.
    -------------------------------------------------------------------------------------------------------*/
    
    public function permenantDelete($tblname,$where,$condition) 
    {
        $this->db->where($where, $condition); 
        $query = $this->db->delete($tblname);
       
        if($query && $this->db->affected_rows()>0)
        {
            return $query;
        }
        else
        {
            return false;
        }
       
    }
     /*-------------------------------------------------------------------------------------------------------
        Author : Bismilla Sanade                           Date : 28-02-2020
        Description : select table records with where condition.
        Modified By : Mrudul Thite                                        Date: 31-03-2020
        Correction:  return query change.
    --------------------------------removed-----------------------------------------------------------------------*/
    
    public function selectAllWhr($tblname,$where,$condition)
    {
       # $this->db2 = $this->load->database('database2', TRUE);
        $this->db->where($where,$condition);
        $this->db->where('display','Y');
        $query = $this->db->get($tblname);
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;
        }
        else
        {
            return false;
        }       
    }
    /*-------------------------------------------------------------------------------------------------------
        Author : Bismilla Sanade                           Date : 28-02-2020
        Description : select all records from table.
    -------------------------------------------------------------------------------------------------------*/
    
    public function selectAll($tblname,$where=0,$condition=0,$limit=0)
    {
        $this->db->where('display','Y');
        if($where && $condition)
        {
          $this->db->where($where,$condition);
        }

        $query = $this->db->get($tblname);
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;
        }
        else
        {
            return false;
        }       
    }
    /*-------------------------------------------------------------------------------------------------------
   	    Author : Bismilla Sanade                           Date : 28-02-2020
    	Description : fetch data in ascending order.
    -------------------------------------------------------------------------------------------------------*/
    public function fetchDataASC($table_name, $asc_by_col_name)
    {       
        $this->db2 = $this->load->database('database2', TRUE);
        $this->db2->select('*')->from($table_name)->where('display', 'Y')->order_by($asc_by_col_name, "ASC");  
        $qry = $this->db2->get();
        if($qry->num_rows()>0)
        {
            foreach ($qry->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;
        }
        else
        {
            return false;
        }
    }
    /*-------------------------------------------------------------------------------------------------------
   	    Author : Shubhangi Jagadale                          Date : 04-03-2020
    	Description :Join Two Table with where condition.
    -------------------------------------------------------------------------------------------------------*/
    public function alljoin2tbl_whr($tbl1,$tbl2,$where,$condition,$id)
	{
		$query=$this->db->query("SELECT * from $tbl1 tbl1 left join $tbl2 tbl2 on tbl1.$where=tbl2.$where where tbl1.$condition=$id AND tbl1.display='Y' AND tbl2.display='Y'");
		if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;
        }
        else
        {
        	return false;
        }
    }
    /*-------------------------------------------------------------------------------------------------------
   	    Author : Shubhangi Jagadale                           Date : 04-03-2020
    	Description : Join Two Table 
    -------------------------------------------------------------------------------------------------------*/
    public function selectAllJoin($tbl1,$tbl2,$where=0,$condition=0,$value=0)
    {
        $whr='';
        if($condition && $value)
        {
          $whr="AND tbl1.".$condition."='".$value."'";
        }
        $query =$this->db->query("SELECT *, tbl1.in_use as in_use from $tbl1 tbl1 left join $tbl2 tbl2 on tbl1.$where=tbl2.$where where  tbl1.display='Y' AND tbl2.display='Y' $whr");
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;
        }
        else
        {
            return false;
        }       
    }
    /*-------------------------------------------------------------------------------------------------------
   	    Author : Shubhangi Jagadale                          Date : 18-03-2020
    	Description :Join Three Table with where condition.
    -------------------------------------------------------------------------------------------------------*/
    public function alljoin3tbl_whr($tbl1,$tbl2,$tbl3,$where1,$where2,$condition,$id)
	{
		$query=$this->db->query("SELECT * from $tbl1 tbl1 left join $tbl2 tbl2 on tbl1.$where1=tbl2.$where1 left join $tbl3 tbl3 on tbl1.$where2=tbl3.$where2 where tbl1.$condition=$id AND tbl1.display='Y' AND tbl2.display='Y' AND tbl3.display='Y'");
		if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;
        }
        else
        {
        	return false;
        }
    }
    /*-------------------------------------------------------------------------------------------------------
   	    Author : Shubhangi Jagadale                           Date : 18-03-2020
    	Description : Join Three Table(all and none) 
    -------------------------------------------------------------------------------------------------------*/
    public function selectAll3Join($tbl1,$tbl2,$tbl3,$where1=0,$where2=0,$condition=0,$value=0)
    {
        $whr='';
        if($condition && $value)
        {
          $whr="AND tbl1.".$condition."='".$value."'";
        }
        $query =$this->db->query("SELECT *, tbl1.in_use as in_use from $tbl1 tbl1 left join $tbl2 tbl2 on tbl1.$where1=tbl2.$where1 left join $tbl3 tbl3 on tbl1.$where2=tbl3.$where2 where  tbl1.display='Y' AND tbl2.display='Y' $whr");
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;
        }
        else
        {
            return false;
        }       
    }
    /*-------------------------------------------------------------------------------------------------------
        Author : Mrudul Thite                           Date : 4-04-2020
        Description : get institute owner birthdate in month and day format 
    -------------------------------------------------------------------------------------------------------*/
     public function fetch_instiste_owner_birthdate($details=FALSE)
    {
      $date=date("m-d");
      $query = $this->db->SELECT('institute_id,institute_owner_name,institute_owner_dob,institute_contact ')
                        ->FROM('tbl_institute')
                        ->WHERE('DATE_FORMAT(institute_owner_dob,"%m-%d")',$date)
                        ->GET();
      
      if($query)
      { 
          $admin_details =  $query->result_array();
          if($admin_details)
          {
            return $admin_details;
          }
          else
          {
            return false;

          }
      }
    
    }
    public function fetch_student_birthdate($details=FALSE)
    {
        $date=date("m-d");
        $query=$this->db->SELECT("first_name,institute_name,institute_code,email,course_full_name,institute_taluka,district_name,date_of_birth,mobile_no,student_id")
        ->FROM('view_student')
        ->WHERE('DATE_FORMAT(date_of_birth,"%m-%d")',$date)
        ->GET();
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;
        }
        else
        {
            return false;
        }

    }

     /*
    ===============================================================================================
    
    Author:Bismilla S                                                              Date:05/08/2020 
    ===============================================================================================
    */
    public function hide_table_details($details=false,$primary_key=false,$table_name=false)
    {
        if(isset($details))
        {
            $update=$this->db->SET('in_use','N')
                             ->WHERE($primary_key,$details[$primary_key])
                             ->UPDATE($table_name);
            //echo "<pre>".$this->db->last_query(); die;   
            $error=$this->db->error();             
            if($update)
            {
            $data=$this->get_table_details_ID($details,$primary_key,$table_name);
            //print_r($data);
                if($this->db->affected_rows()>0)
                {
                    return $data;
                }
                else
                {
                    $this->error=array('message' =>"No Changes Made.",'code'=>0);
                    return false;
                }
            }
            else 
            {
                $this->error=$error['message'];
                return false;
            }
        }
    }
     /*
    ===============================================================================================
    
    Author:Bismilla S                                                              Date:05/08/2020 
    ===============================================================================================
    */
     public function get_table_details_ID($details=false,$primary_key=false,$table_name=false)
    {
        $sql=$this->db->SELECT("*")
                      ->FROM($table_name)
                      ->WHERE($primary_key,$details[$primary_key])
                      ->GET();
        //print_r($details[$primary_key]);
        $error=$this->db->error();
        if($sql && $sql->num_rows()>0)
        {
            return $sql->result_array();
        }
        else
        {
            $this->error=$error['message'];
            return false;
        }       
        
    }     
    /*
    ===============================================================================================
    Author:Rakshanda K                                                             Date:18/05/2020
    Author:Ritesh B                                                                Date:16/03/2020 
    Author:Bismila S                                                               Date:24/04/2020
    ===============================================================================================
    */
    public function restore_table_details($details=false,$primary_key,$table_name)
    {
        if(isset($details))
        {
            $update=$this->db->SET('in_use','Y')
                             ->WHERE($primary_key,$details[$primary_key])
                             ->UPDATE($table_name);
            $error=$this->db->error();
            if($update)
            {
                $data=$this->get_table_details_ID($details,$primary_key,$table_name);
                 if($this->db->affected_rows()>0)
                {
                    return $data;
                }
                else
                {
                    $this->error=array('message' =>"No Changes Made.",'code'=>0);
                    return false;
                }
            }
            else
            {
                $this->error=$error['message'];
                return false;
            }
        }
    }
    public function permanenent_delete_table_details($details=false,$primary_key,$table_name)
    {
        if(isset($details))
        {
            $update=$this->db->delete($table_name,array($primary_key=>$details[$primary_key]));
            $error=$this->db->error();
            if($update)
            {
                 if($this->db->affected_rows()>0)
                {
                return true;
                }
                else
                {
                $this->error=array('message' =>"No Changes Made.",'code'=>0);
                return false;
                }
                    return true; 
            }
            else 
            {
                $this->error=$error['message'];
                return false;
            }
        }
    }

    /*
    ===============================================================================================    
    Author:Tukaram Gavade                                                          Date:22/11/2021 
    ===============================================================================================
    */

    public function once_insert_multitime_update($tablename,&$fields)
    {
        
        $query = $this->db->get($tablename);
        $pk=$this->getPrimeryKey($tablename);
        if ($query->num_rows() > 0) {          
            if(isset($fields[$pk]) && $fields[$pk]==TRUE)
            {
                $id=$fields[$pk];
                unset($fields[$pk]);
                $this->update_record($tablename,$fields,$pk,$id); 
               return $id;              
            }else{
                $this->error = $this->db->error();               
                return FALSE;                
            }          
        } 
        else
        {
            $q = $this->db->insert($tablename,$fields);
            if($q)
            {
                $id = $this->db->insert_id();
                $fields[$pk]=$id;
                return $id;
            }
            else
            {
                $this->error = $this->db->error();
                return FALSE;
            }
        }       
    }
   
}
