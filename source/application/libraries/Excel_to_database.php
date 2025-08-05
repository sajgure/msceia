<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 *  =====================================================
 *  Author     : Prabir Sen 
 *  Purpose    : Insert Data From Excel File To Database
 *  =====================================================
 */  
require_once APPPATH."/third_party/PHPExcel.php"; 
 
class Excel_to_database extends PHPExcel { 
    public function __construct() { 
        parent::__construct(); 
        $CI =& get_instance(); 
       // $CI->load->model('database_excel');    
        $CI->load->model('common_model');    
		//$CI->load->database();     
		//$CI->load->library("session");
    } 

    function excelFileDataToDatabase($inputFileName)
    {
    	$CI =& get_instance();     	
		$CI->load->library('excel_to_database');

		//$inputFileName = 'users_97_2003.xls';  // 97-2003 format Excel File to read
		//$inputFileName = 'users.xlsx';  // New format Excel File to read

		//$inputFileName = $filename;	 
		
	 
	 	//  Read your Excel workbook
		try 
		{
			$inputFileType = PHPExcel_IOFactory::identify($inputFileName); // Excel5 or Excel2007
			$objReader = PHPExcel_IOFactory::createReader($inputFileType);			
			$objPHPExcel = $objReader->load($inputFileName);
		} 
		catch(Exception $e) 
		{
			die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
		}

		//  Get worksheet dimensions
		$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow(); // return integer ex:- 3
		$highestColumn = $sheet->getHighestColumn(); // return highest column ex:- D

		$path_parts = pathinfo($inputFileName); //Array ( [dirname] => ./upload [basename] => users_97_2003.xls [extension] => xls [filename] => users_97_2003 ) 
		$excelFileName = $path_parts['filename']; // users_97_2003
		
		$firstRowData = '';
		$firstRowDataArray = '';
		// Column Name For Database Table
		$firstRowData = $sheet->rangeToArray('A3:' . $highestColumn .'3',NULL,TRUE,FALSE);
	
		$firstRowDataArray = $firstRowData[0];  //Array ( [0] =>
		//$pass=md5(sha1(md5('123456')));

		$num_columns = count($firstRowDataArray);
		$sql = ''; // query
		$rowData = '';
		$DataArr ='';
		$sqlCreate = '';
		$result_insert = '';
		$CI->db->trans_start();
		//echo $highestRow;
		//$user_id1=$CI->session->userdata("user_id");
		for ($row = 3; $row <= $highestRow; $row++)
		{ 
			//  Read a row of data into an array
			$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL,TRUE,FALSE);	
			$DataArr = $rowData[0];			
			$columnVal = '';
			//print_r($DataArr);
			if((isset($DataArr[1]) && !empty($DataArr[1])) && (isset($DataArr[2]) && !empty($DataArr[2])) && (isset($DataArr[3]) && !empty($DataArr[3])) &&  (isset($DataArr[4]) && !empty($DataArr[4])))
			{
			   	$data_tbl_question=array('exam_type'=>$DataArr[1],'batch'=>$DataArr[2],'question'=>$DataArr[4],'course'=>$DataArr[3]);
			   	$query2=$CI->db->insert('tbl_que1',$data_tbl_question);	
				$que_id= $CI->db->insert_id();

			   	$data_tbl_oprion1=array('question_id'=>$que_id,'option'=>$DataArr[5]);
			   	$query3=$CI->db->insert('tbl_opt1',$data_tbl_oprion1);	
				$option_id1= $CI->db->insert_id();

			   	$data_tbl_oprion2=array('question_id'=>$que_id,'option'=>$DataArr[6]);
			   	$query4=$CI->db->insert('tbl_opt1',$data_tbl_oprion2);	
				$option_id2= $CI->db->insert_id();

			   	if((isset($DataArr[7]) && !empty($DataArr[7])))
			   	{
			   		$data_tbl_oprion3=array('question_id'=>$que_id,'option'=>$DataArr[7]);
			   		$query5=$CI->db->insert('tbl_opt1',$data_tbl_oprion3);	
					$option_id3= $CI->db->insert_id();

			   	}
			   	if((isset($DataArr[8]) && !empty($DataArr[8])))
			   	{
			   		$data_tbl_oprion4=array('question_id'=>$que_id,'option'=>$DataArr[8]);
			   		$query6=$CI->db->insert('tbl_opt1',$data_tbl_oprion4);	
					$option_id4= $CI->db->insert_id();
			   	}
			   	if($DataArr[9]==1)
			   	{
			   		$data_tbl_que_ans=array('option_id'=>$option_id1);
			   		$CI->db->where('question_id', $que_id);
					$query7 = $CI->db->update("tbl_que1", $data_tbl_que_ans);
			   	}
			   	if($DataArr[9]==2)
			   	{
			   		$data_tbl_que_ans=array('option_id'=>$option_id2);
			   		$CI->db->where('question_id', $que_id);
					$query7 = $CI->db->update("tbl_que1", $data_tbl_que_ans);
			   	}
			   	if($DataArr[9]==3)
			   	{
			   		$data_tbl_que_ans=array('option_id'=>$option_id3);
			   		$CI->db->where('question_id', $que_id);
					$query7 = $CI->db->update("tbl_que1", $data_tbl_que_ans);
			   	}
			   	if($DataArr[9]==4)
			   	{
			   		$data_tbl_que_ans=array('option_id'=>$option_id4);
			   		$CI->db->where('question_id', $que_id);
					$query7 = $CI->db->update("tbl_que1", $data_tbl_que_ans);
			   	}

			}		
		}
		$result_insert=$CI->db->trans_complete(); 

		if($result_insert)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		} 

	 	//if($result_insert) echo 'Succssfully Inserted '.($highestRow-1).' records to the Database';		
	}
	
}