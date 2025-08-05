<?php defined('BASEPATH') OR exit('No direct script access allowed');
Class Standard extends Base_Controller
{
	/*
	==============================================================================================================
		AUTHOR : Rupali Bora 
	==============================================================================================================
	*/
	public function __construct()
  	{
	    parent::__construct(); 
	    $this->load->model('standard/standard_model');
    }
    /*-----------------------------------------------------------------------------------------------------
		Author : Rupali Bora 							Date : 16-11-2017
		Description : update common used column value
	-----------------------------------------------------------------------------------------------------*/
	public function _setRecordUsed($details=false)
	{
		if(isset($details) && !empty($details))
		{
			$details = $this->decryptArray($details);
			$update_data = array('used'=>'1');
			foreach ($details as $key => $value) 
			{
				$this->standard_model->update_record($value['table_name'],$update_data,$value['column_name'],$value['id']);
			}
		}
	}
}
