<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
-------------------------------------------------------------
Author  : Mohammad Shafi              Date: 08 apr 20
-------------------------------------------------------------
*/

class stud_batch_change_master_web extends Base_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->library('Encryptdecryptstring'); 
    }

    public function stud_batch_change_list()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        // $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $data['batch_data'] = $this->common_model->fetchDataASC('tbl_batch','batch_id');
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $this->load->view('stud_batch_change_list',$data);
    }

    public function add_demo($id=NULL)
    {
        $id = $this->encryptdecryptstring->decrypt_string($id);
        if($id)
        {
            $data['demo_data']=$this->common_model->selectDetailsWhr('tbl_demo','demo_id',$id);
        }
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $this->load->view('add-demo',$data);
    }
    public function index_get()
    {
        echo "Hello World";
    }

    public function index_add()
    {
        
        $this->load->model('District_model');
        $data=[
            'demo_name' => $this->input->post('demo_name')
        ];
        $result=$this->District_model->insertdemo($data);
        // $this->response($data,200);
        
    }
    public function upload_demo_image()
    {
        if($_FILES['file']['name'] != '')
        {
            $test =explode(".", $_FILES['file']['name']);
            $extension = end($test);
            $name = rand(100000, 999999) . '.' . $extension;
            $location = './uploads/demo/'.$name;
            move_uploaded_file($_FILES['file']['tmp_name'], $location);
            $img_path = base_url().'uploads/demo/'.$name;
            $img =  '<img src="'.$img_path.'" style="height: 150px; width: 200px;" class="img-thumbnail"/>';
            echo $img;
        }
    }
    public function upload_demo_master_file()
    {
        if($_FILES['file']['name'] != '')
        {
            $test =explode(".", $_FILES['file']['name']);
            $extension = end($test);
            $name = 'abc'.rand(100000000, 999999999) . '.' . $extension;
            $location = './uploads/demo_master_file/'.$name;
            move_uploaded_file($_FILES['file']['tmp_name'], $location);
            $file_path = base_url().'uploads/demo_master_file/'.$name;
            echo $name;
        }
    }
    public function sessionstrainer_by_batch() {
        //$val_id=$_POST['shed_no'];
		
        $this->load->model('Student_batch_change_model');
        $data = $this->Student_batch_change_model->getsessionsBybatch();
        // echo json_encode($data);  
   // $data['title'];
        $change = array('key1' => $data);
      echo json_encode($change);

        // print_r($data);
    //    exit;
      // $data['shed_sr_no'];
      
      
  }
  public function sessionstrainer_by_batchupdate() {
    //$val_id=$_POST['shed_no'];
    
    $this->load->model('Student_batch_change_model');
    $data = $this->Student_batch_change_model->getsessionsBybatchupdate();
    // echo json_encode($data);  
// $data['title'];
    $change = array('key1' => $data);
  echo json_encode($change);

    // print_r($data);
//    exit;
  // $data['shed_sr_no'];
  
  
}
  public function sessionstrainer_by_batch_students() {
    //$val_id=$_POST['shed_no'];
    
    $this->load->model('Student_batch_change_model');
    $data = $this->Student_batch_change_model->getsessionsBybatchstudent();
    // echo json_encode($data);  
// $data['title'];
    // $change = array('key1' => $data);
  echo json_encode($data);

    // print_r($data);
//    exit;
  // $data['shed_sr_no'];
  
  
}
public function student_details(){
    $this->load->model('Student_batch_change_model');
    // $id = $this->input->post("student_id"); // this will return the hid POST parameter
    $data=$this->Student_batch_change_model->updateView();
    echo json_encode($data);
    // print_r($data);
    // exit;
}
  
}

