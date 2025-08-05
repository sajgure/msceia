<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."/third_party/hashids/vendor/autoload.php"; 
class Hashids extends Base_Controller 
{
	private $hashids='';
	function __construct()
	{
	    parent::__construct();
   		$this->config->load('hashids/encrypt', TRUE);
      	$this->config_encrypt=$this->config->item('encrypt');
      	$this->hashids = new Hashids\Hashids($this->config_encrypt['salt']);


	}
	/*
	-------------------------------------------------------------
	Author 	: Sumit Darbeshwar				Date: 17 Jun 16
	-------------------------------------------------------------
	Purpose: if opertaion is succesful then returns encrypted string else same data will be return
	ToDo:
	*/
 	public function encrypt($plainText)
 	{
	 	$cipherText = $this->hashids->encode($plainText);
	 	if($cipherText){
	 		return $cipherText;
	 	}else{
	 		log_message('error','Failed to encrypt:'.__FILE__ .' Line'.__LINE__);
	 		return $plainText;
	 	}
 	}
	/*
	-------------------------------------------------------------
	Author 	: Sumit Darbeshwar				Date: 17 Jun 16
	-------------------------------------------------------------
	Purpose:
	ToDo:
	*/ 	
 	public function decrypt($cipherText,$single_flag=TRUE)
 	{
 		if($single_flag == TRUE)
 		{
 			$single_decrypt = $this->hashids->decode($cipherText);
 			if(isset($single_decrypt)&& is_array($single_decrypt) && sizeof($single_decrypt)>0 ){
 				return $single_decrypt[0];
 			}else{
	 			log_message('error','Failed to decrypt:'.__FILE__ .' Line'.__LINE__);
 				return $cipherText;
 			}
 		}
 		else
 		{
 			$plaintext = $this->hashids->decode($cipherText);
 			if($plaintext){
 				return $plaintext;
 			}else{
 				return $cipherText;
 			} 
 		}
 	}
 	/*
	-------------------------------------------------------------
	Author 	: Sumit Darbeshwar				Date: 07 Apr 17
	-------------------------------------------------------------
	Purpose: create encryption file if missing
	ToDo:
	*/
	private function detectHashFile(){
		$config_file = $this->config_encrypt['hash_config_path'];
		$handle =null;
		log_message("info","file does not exist! creating at:".$config_file);
		$handle = fopen($config_file, 'w') or die('Cannot open file:  '.$config_file);
		$data['keys']=$this->getHashFields();
		if($data['keys']){
			$file_content=$this->load->view('hashids/config_structure', $data, TRUE);
			fwrite($handle, $file_content);
			fclose($handle);
		}
		else{
			log_message("error","No table Primery key found or db setting missing");
			return FALSE;
		}
	}
	/*
	-------------------------------------------------------------
	Author 	: Sumit Darbeshwar				Date: 07 Apr 17
	-------------------------------------------------------------
	Purpose: create file config
	ToDo:
	*/
	protected function getHashFields(){
		$this->load->model('standard/standard_model');
		$table_keys=$this->standard_model->getTableKeys();
		if($table_keys){
			return (join(',',$table_keys));
		}
		else{
			return FALSE;
		}
	}
	/*
	-------------------------------------------------------------
	Author 	: Sumit Darbeshwar				Date: 07 Apr 17
	-------------------------------------------------------------
	Purpose: recursivly conver arry element to encrypt or decrypt 
	it as per method passed
	$array=array(
			array(
				"aca_fee_structure_id"=>'2nWpd',
			  	"aca_fee_structure_details_id"=>'7yPXy'),
			array(
				"aca_fee_structure_id"=>'518Yn',
			  	"aca_fee_structure_details_id"=>'Ly2ad',
			  	"subject"=>array(
			  			"aca_fee_structure_id"=>'2nWpd',
			  			"aca_fee_structure_details_id"=>'7yPXy'
			  		)
			  	)
		);
	ToDo:
	*/
	function arrayEnD(&$array,$method){
		$file=$this->config_encrypt['hash_config_path'];
		if($file==TRUE && !file_exists($file))
		{
			$this->detectHashFile();
		}
		elseif($file==TRUE && file_exists($file))
		{
			$this->config->load('hashids/hash_config', TRUE,TRUE);
	      	$this->hash_config=$this->config->item('hash_config'); 

			if($this->config_encrypt['encryptArray']){
					if(isset($this->hash_config['keys']))
					{
						array_walk_recursive($array, array($this,'singleEnD'),array($this->hash_config['keys'],$method));
					}
					else
					{
						log_message('info','keys are missing or db setting error file'.__FILE__.' Line Number:'.__LINE__);
					}
				}
		}
		return($array);
	}
	/*
	-------------------------------------------------------------
	Author 	: Sumit Darbeshwar				Date: 17 Jun 16
	-------------------------------------------------------------
	Purpose:work at itmes of the array either encrypt it or decrypt it
	ToDo:
	*/
	private function singleEnD(&$item,$key,$hash_config)
	{
		if(in_array($key, $hash_config[0])){
			if($item==TRUE)
			{
				$item=$this->{$hash_config[1]}($item);
			}
			else
			{
				log_message('debug','empty value ignored '.__FILE__.' Line'.__LINE__);
			}
		}
	}	

}
/* End of file Hashids.php */
/* Location: ./application/modules/hashids/controllers/Hashids.php */