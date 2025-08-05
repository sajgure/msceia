<?php 
class Excel_reader{

	public $message='';
	function __construct() 
	{
	    $this->CI =& get_instance();   
   		$this->CI->load->library('Excel/Excel');
   		$this->CI->config->load('excel', TRUE);
      	$this->config_excel=$this->CI->config->item('excel');
	}
	function reader($file)
	{
		$file=$this->getFileObject($file);
		$data=$this->readData($file);
		return $data;
	}
	function getFileObject($file)
	{
		try
		{
			if(file_exists($file))
			{
				$objReader = PHPExcel_IOFactory::createReader('Excel2007');
				$objReader->setReadDataOnly(true); 
				$objPHPExcel = $objReader->load($file); 
				return $objPHPExcel;
			}
			else
			{
				$this->message='File does not exist';
				return false;
			}
		}
		catch(Exception $e)
		{
			$this->message='Unknown error occured';
			return FALSE;
		}
	}
	function readData(&$objPHPExcel)
	{
		#$objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, 8)->getValue();
		$data=array();
		$objWorksheet = $objPHPExcel->getActiveSheet();
		if($objWorksheet)
		{
			foreach ($objWorksheet->getRowIterator() as $row)
			{ 
				$cellIterator = $row->getCellIterator(); 
				$cellIterator->setIterateOnlyExistingCells(false);
				$record=array();
				foreach ($cellIterator as $cell) 
				{
				 	$record[]= $cell->getValue(); 
				} 
				$data[]=$record;
			}
			return $data;
		}
		else
		{
			return false;
		}
	}
	
}
