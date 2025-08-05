<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Media extends Base_Controller {
	
	protected $config_details = '';
	/*function _remap()
	{
		show404();
	}*/
	/*
	------------------------------------------------------------
	Author : Rupali Bora               Date :20/05/2016
	------------------------------------------------------------
	*/
	public function __construct()
  	{
	    parent::__construct(); 
	    $this->load->model('media_model');
	    $this->config->load('media/file_upload', TRUE);
      	$this->config_details = $this->config->item('file_upload');
      	$this->load->module('user_mgmt/auth_api');
    }
    /*
	------------------------------------------------------------
	Author : Rupali Bora               Date :20/05/2016
	------------------------------------------------------------
	*/
	public function upload_files($files,$file_setting=FALSE,$dbObj='')
	{
		if( isset($files['user_id']) && !empty($files['user_id'])){
			$user_id =$files['user_id'];
		}else{
			$user_id=1;
		}
			
			
			$thumb_details = array();
			if(isset($files) && !empty($files))
			{
				$media_array = FALSE;
				foreach ($files['files'] as $control_key => $control_value) 
				{
					$root=$this->media->getRootPath();
					$upload_config['upload_path'] =join(DIRECTORY_SEPARATOR,array($root,$file_setting['folder'],$file_setting['id'],''));
					$upload_config['allowed_types'] = $this->config_details['file_extensions'];
					$this->load->library('upload', $upload_config);
					$images = array();
					if(($upload_config['upload_path'] !='') && (!file_exists($upload_config['upload_path'])))
					{
						mkdir($upload_config['upload_path'], 0777, true);
					}
					$files_upload=$files['files'][$control_key];
					if(sizeof($files_upload['name'])==1 && !(is_array($files_upload['name'])))
					{
						$single_file=array();
						$single_file['name']= $files_upload['name'];
						$single_file['type']= $files_upload['type'];
			            $single_file['tmp_name']= $files_upload['tmp_name'];
			            $single_file['error']= $files_upload['error'];
	            		$single_file['size']= $files_upload['size'];
	            		$single_file['media_file']=$files_upload['name'];
	            		$single_file['upload_config']=$upload_config;

						$upload_details = $this->single_file_upload($single_file,$file_setting);
						if($upload_details['result'])
						{
							$media_array[$control_key][] =$upload_details;  
						}
					}
					else
					{
						foreach ($files_upload['name'] as $key => $media_file) 
						{
							$single_file=array();
							$single_file['name']= $files_upload['name'][$key];
							$single_file['type']= $files_upload['type'][$key];
				            $single_file['tmp_name']= $files_upload['tmp_name'][$key];
				            $single_file['error']= $files_upload['error'][$key];
		            		$single_file['size']= $files_upload['size'][$key];
		            		$single_file['media_file']=$media_file;
		            		$single_file['upload_config']=$upload_config;

							$upload_details = $this->single_file_upload($single_file,$file_setting);
							if($upload_details['result'])
							{
								$media_array[$control_key][] = $upload_details;
							}
						}
					}
				}
				$media_ids = array('state'=>'','media_id'=>'');
				if (isset($media_array[$control_key]) && !empty($media_array[$control_key])) 
				{
					foreach ($media_array[$control_key] as $key => $sfile) 
					{
						$randomString=$this->createMedianNumber();
						$media_no = substr($randomString, 0,7) ;		
						$insertdata = array('user_file_name'=>$sfile['original_file_name'],
											'extension'=>$sfile['extension'],
											'system_file_name'=>$sfile['system_generate_file_name'],
											'file_path'=>$sfile['full_system_path'],
											'inserted_by'=> $user_id,
											'inserted_on'=>date('Y-m-d H:i:s'),
											'modified_by'=> $user_id
										);
						if($dbObj)
						{
							$media_id = $this->standard_model->save_record_dbObj('tbl_media',$insertdata,$dbObj);
						}
						else
						{
							$media_id = $this->standard_model->save_record('tbl_media',$insertdata);
						}
						if ($media_id['state']) 
						{
							$media_ids['media_id'][]=$media_id['id'];
							$media_ids['state'][]=$media_id['state'];
						}
					}
				}
				else
				{
					$media_ids = array('state'=>FALSE,'msg'=>$upload_details['msg']);
				}
				return $media_ids;
			}
	}
	/*
	------------------------------------------------------------
	Author : Rupali Bora               Date :20/05/2016
	------------------------------------------------------------
	*/
	private function single_file_upload($files_upload,$file_setting)
	{
		$return_array = array();
		if(isset($file_setting['restricted']) && !empty($file_setting['restricted']))
		{
			$standard_file_size = $this->checkFileSize($files_upload,$file_setting);
			if($standard_file_size)
			{
				$return_array = $this->upload_single_file($files_upload,$file_setting);
			}
			else
			{
				$return_array = array('result'=>FALSE,'msg'=>'File size is not standard');
			}
		}
		else
		{
			$return_array = $this->upload_single_file($files_upload,$file_setting);
		}
		return $return_array;
	}

	public function upload_single_file($files_upload,$file_setting)
	{
		$return_array = array();
		$this->load->helper('string');
		$orig_file_name = explode('.', $files_upload['media_file']); 
        $arr_len = count($orig_file_name) - 1; 
        $ext =strtolower(substr(strrchr($files_upload['media_file'], '.'),1));
        $upload_config=$files_upload['upload_config'];
      	$renamed_files=$this->get_file_name($files_upload['media_file']);
      	$upload_config['file_name']=$renamed_files['file_new_name'].'.'.$ext;
     	$type = $this->get_file_type($ext);

		$_FILES['images[]']['name']= $files_upload['name'];
		$_FILES['images[]']['type']= $files_upload['type'];
        $_FILES['images[]']['tmp_name']= $files_upload['tmp_name'];
        $_FILES['images[]']['error']= $files_upload['error'];
		$_FILES['images[]']['size']= $files_upload['size'];
		
		$this->upload->initialize($upload_config);
		if($this->upload->do_upload('images[]'))
		{ 
			$data_file =  $this->upload->data();
			$newfilename = $data_file['file_name'];
			$system_file_name = $upload_config['file_name'];
			$full_new_path= $upload_config['upload_path'].$upload_config['file_name'];
			if (isset($file_setting['compress']) && $file_setting['compress']) {
				if(strtolower($ext)=='jpg' || strtolower( $ext) == 'png' ||  strtolower( $ext)=='jpeg'){
					//$resize=$this->resize_uploaded_image($full_new_path,$full_new_path);
					$this->compressFile( $full_new_path,$full_new_path,$file_setting['folder_prefix']);
				}
			}
			if (isset($file_setting['thumb_size']) && sizeof($file_setting['thumb_size'])>0) {
				
				$file_setting['origin'] =$full_new_path;
				if(isset($file_setting['origin']) && !empty($file_setting['origin']))
				{
					$this->multiple_thumbnail($file_setting);
				}
			}
			$return_array = array('result'=>TRUE,
									'original_file_name'=>$files_upload['media_file'],
									'extension'=>$ext,
									'full_original_path'=>$upload_config['upload_path'].$files_upload['media_file'],
									'system_generate_file_name'=>$upload_config['file_name'],
									'full_system_path'=>$upload_config['upload_path'].$upload_config['file_name'],
									'msg'=>'Uplaod successfully');
		}
		else
		{
			$return_array= array('result'=>FALSE,'msg'=>'Unsupported file format');
		}
		// print_r($this->upload->display_errors());
		return $return_array;
	}
	/*
	------------------------------------------------------------
	Author : Rupali Bora               Date :18/09/2017
	------------------------------------------------------------
	*/
	private function checkFileSize($files_upload,$file_setting)
	{
		if(isset($file_upload['tmp_name']) || (isset($file_setting['restricted']) && !empty($file_setting['restricted'])) )
		{
			$height=0;$width=0;$flag=false;
			$size = getimagesize($files_upload['tmp_name']);
			if($size)
			{
				$width = $size[0];
				$height = $size[1];
			}
			$res_height=isset($file_setting['restricted']['height'])?$file_setting['restricted']['height']:0;
			$res_width=isset($file_setting['restricted']['width'])?$file_setting['restricted']['width']:0;
			if($res_height!=0)
			{
				if($height >= $res_height)
				{
					$flag = true;
				}
			}

			if($res_width!=0)
			{
				if($width >= $res_width)
				{
					$flag = true;
				}
			}
		}
		else
		{
			$flag = true;
		}
		return $flag;
	}
	/*
	------------------------------------------------------------
	Author : Rupali Bora               Date :20/05/2016
	------------------------------------------------------------
	*/
	public function get_file_name($file_name)
	{
		$return['file_name']=str_replace(array("(",")","/",":","*","?","<",">","|","\\","\""), '-', $file_name);
		$return['file_new_name']=sha1(md5($file_name.date('Y-m-d_H-i-s')));
		return $return;
	}
	/*
	------------------------------------------------------------
	Author : Rupali Bora               Date :20/05/2016
	------------------------------------------------------------
	*/
	private function get_file_type($extention)
	{
		switch ($extention) 
		{
			case 'png': 
			case 'PNG': 
			case 'jpg': 
			case 'JPG': 
			case 'jpeg': 
			case 'JPEG': 
			case 'bmp': 
			case 'BMP': $type = 'I';
						break;
			case 'Webm': 
			case 'wmv': 
			case 'Mkv': 
			case 'Flv': 
			case 'Gifv': 
			case 'Avi': $type = 'V';
						break;
			default: $type='O';
					break;
		}
		return $type;
	}
	/*
	------------------------------------------------------------
	Author : Rupali Bora               Date :20/05/2016
	------------------------------------------------------------
	*/
	public function fetch_media_details($media_id)
	{
		if(isset($media_id) && !empty($media_id))
		{
			$this->load->model('media_model');
			$result = $this->media_model->get_media_details($media_id);
			$this->output_file($result);
		}
	}
	/*
	------------------------------------------------------------
	Author : Rupali Bora               Date :20/05/2016
	------------------------------------------------------------
	*/
	public function output_file($file_details)
	{
		$file_details['path'];
		$file_details['extension'];
		if(!is_readable($file_details['path'])) die('File not found or inaccessible!');
		$size = filesize($file_details['path']);
		$file_details['user_file_name'] = rawurldecode($file_details['user_file_name']);
		$known_mime_types=array(
		    "pdf" => "application/pdf",
		    "csv" => "application/csv",
		    "txt" => "text/plain",
		    "html" => "text/html",
		    "htm" => "text/html",
		    "exe" => "application/octet-stream",
		    "zip" => "application/zip",
		    "doc" => "application/msword",
		    "xls" => "application/vnd.ms-excel",
		    "ppt" => "application/vnd.ms-powerpoint",
		    "gif" => "image/gif",
		    "png" => "image/png",
		    "jpeg"=> "image/jpg",
		    "jpg" =>  "image/jpg",
		    "xlsx" =>  "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
		    "php" => "text/plain"
		 );
		 if(isset($file_details['extension']) && $file_details['extension']!='')
		 {
		     if(array_key_exists($file_details['extension'], $known_mime_types))
		     {
		        $file_details['extension']=$known_mime_types[$file_details['extension']];
		     } 
		     else 
		     {
		        $file_details['extension']="application/force-download";
		     }
		 }
		 header('Content-Type:'.$file_details['extension']);
		 header("Content-Length: ".$size);

		 $fp =fopen($file_details['path'], 'rb');
		 fpassthru($fp);
	}
	/*
    -------------------------------------------------------------
        AUTHOR : Rupali Bora             Date: 24/06/2016
        AUTHOR : Sumit D.				 Date: 12/04/2016
    -------------------------------------------------------------
    */
	public function unlink($media_array)
	{
		if(isset($media_array) && !empty($media_array) && is_array($media_array))
		{
			$return = array();
			foreach ($media_array as $media_id) 
			{
				$file = $this->media_model->fetch_filename($media_id); 
				$tablename = 'tbl_media';
				$result = $this->standard_model->permanant_delete_record('media_id',$media_id,$tablename);
				if($result)
				{
			        @unlink($file->file_path);
			        $this->unlink_all_thumbnail($file->system_file_name);
					array_push($return,$result);
				}
			}
			if(in_array(TRUE, $return))
				{return TRUE; }
			else
				{return FALSE; }
		}
		else
			{return FALSE; }
	}
	/*
    -----------------------------------------------------------
        AUTHOR : Rupali Bora           Date: 24-06-2016
        AUTHOR : Sumit D.              Date: 12-04-2017
    -----------------------------------------------------------
    */
	public function unlink_all_thumbnail($file_name)
	{
		if(isset($this->config_details['thumbnail_resolution'])){
		
		$thumbnail_resolution = $this->config_details['thumbnail_resolution'];
		if(isset($thumbnail_resolution)){
			foreach ($thumbnail_resolution as $key => $value) 
			{
				@unlink($this->config_details['thumbnail_path'].$value['width'].'_'.$value['height'].'/'.$file_name);
			}
		}
		}
	}
	/*
    -----------------------------------------------------------
        AUTHOR : Rupali Bora           Date: 22-06-2016
    -----------------------------------------------------------
    */
	public function multiple_thumbnail($options)
	{
		foreach ($options['thumb_size'] as $media_key => $thumb) 
		{ 
			$this->generate_single_thumbnail($thumb,$options);
		}
	}
	/*
	------------------------------------------------------------
	Author : Rupali Bora               Date :22/06/2016
	------------------------------------------------------------
	*/
	public function generate_single_thumbnail($thumb,$options)
	{
		/*
		array(
			'origan' =>$new_file_path,
			'thumbnails' =>$options['thumb_size']
		);*/
		$root=$this->getRootPath();
		if (isset($options['id']) && !empty($options['id'])) 
		{
			$thumb_name='';
			if(isset($thumb['height']) && isset($thumb['width']))
			{
				$thumb_name = "width=".$thumb['width']."&"."height=".$thumb['height'];
			}
			elseif(isset($thumb['height']))
			{
				$thumb_name = "height=".$thumb['height'];
			}
			elseif(isset($thumb['width']))
			{
				$thumb_name = "width=".$thumb['width'];
			}
			if(isset( $thumb) && !empty($thumb)){
	            /*$thumb['path']=join(DIRECTORY_SEPARATOR,array($root,$options['folder'],$options['id'],$options['folder_prefix'].'_'.$options['thumb_folder'],$thumb['width'].'_'.$thumb['height'],''));*/
				if (isset($options['file_const']) && !empty($options['file_const'])) 
				{
					$thumb['path']=join(DIRECTORY_SEPARATOR,array($root,$options['folder'],$options['folder_prefix'].$options['id'],$options['file_const'],$options['folder_prefix'].$options['thumb_folder'],$thumb_name,''));
				}
				else
				{
					$thumb['path']=join(DIRECTORY_SEPARATOR,array($root,$options['folder'],$options['folder_prefix'].$options['id'],$options['folder_prefix'].$options['thumb_folder'],$thumb_name,''));
				}
				
	       	}
		}
		else
		{
			$thumb_name='';
			if(isset($thumb['height']) && isset($thumb['width']))
			{
				$thumb_name = "width=".$thumb['width']."&"."height=".$thumb['height'];
			}
			elseif(isset($thumb['height']))
			{
				$thumb_name = "height=".$thumb['height'];
			}
			elseif(isset($thumb['width']))
			{
				$thumb_name = "width=".$thumb['width'];
			}
			if(isset( $thumb) && !empty($thumb))
			{
	            $thumb['path']=join(DIRECTORY_SEPARATOR,array($root,$options['folder'],$options['folder_prefix'].$options['thumb_folder'],$thumb_name,''));
	       	}
		}
		if($thumb)
		{
			$this->thumbnail_directory_create($thumb['path']);
			$new_thumb_path = $thumb['path'];
			$original_path = $options['fullpath'];
		    $thumbs_path = $new_thumb_path;

		   	$filenm = substr(strrchr($options['fullpath'], "/"), 1);
			$thumb_config = array(
			    'source_image'      => $original_path, //path to the uploaded image
			    'new_image'         => $new_thumb_path, //path to
			    'maintain_ratio'    => TRUE,    
			    'image_library'     =>'gd2',
			    'create_thumb'	    => false
			);
			$calculate=$this->_setFileResolution(array('destination'=>$original_path,'thumb_size'=>$thumb));
			if(isset($calculate['width'])){

				$thumb_config['width']=$calculate['width'];
			}
			if(isset($calculate['height'])){
				
				$thumb_config['height']=$calculate['height'];
			}
			$this->load->library('image_lib');
			$this->image_lib->initialize($thumb_config);
    		if(!$this->image_lib->resize())
    		{
    			print_r($this->image_lib->display_errors());
    		}
		}
		$this->image_lib->clear();
	}
	/*
	-------------------------------------------------------------
	Author 	: Sumit Darbeshwar				Date: 17 Sep 17
	-------------------------------------------------------------
	Purpose: set image height width as per configration and as per image resoltion and ratio
	ToDo:
	*/
	private function _setFileResolution($imageInformation){
		if(!$imageInformation)
		{
			return FALSE;
		}
		else
		{
			$resolution=false;
			list($iwidth, $iheight, $type, $attr) = getimagesize($imageInformation['destination']);		
			$imgConfigWidth=$imageInformation['thumb_size']['width'];
				
			if($iwidth>$iheight && $iwidth>$imgConfigWidth)
			{
				//Image is wide
				$width=$imgConfigWidth;
				//$height=$iheight;			
				return array("width"=>$width );				
			}
			else if($iwidth<$iheight && $iwidth>$imgConfigWidth)
			{	
				//Image is vertical
				//$height=$imgConfigWidth;
				$width=$imgConfigWidth; 
				return array("width"=>$width );								
			}
			else if($iwidth==$iheight && $iwidth>$imgConfigWidth)
			{
				//Square image
				$width=$imgConfigWidth;$height=$imgConfigWidth;	
				return array("width"=>$width,"height"=>$height);						
			}
			else
			{
				$width=$iwidth;$height=$iheight;	
				return array("width"=>$width,"height"=>$height);						
			}
			
		}
		
	}
	/*
	------------------------------------------------------------
	Author : Rupali Bora               Date :22/06/2016
	------------------------------------------------------------
	*/
	public function thumbnail_directory_create($thumb_path)
	{
		if (!file_exists($thumb_path)) 
		{
			mkdir($thumb_path, 0777, true);
		}
	}
	/*
	------------------------------------------------------------
	Author : Rupali Bora               Date :22/06/2016
	------------------------------------------------------------
	*/
	public function thumbnail_access($media_id,$file_size)
	{
		$media_details = $this->media_model->fetch_file_details($media_id);
		if(isset($media_details))
		{
			if(!file_exists($this->config_details['root'].$file_size."/".$media_details['system_file_name']))
			{
				$this->generate_single_thumbnail($media_id);
			}
		}
	}
	
	/*
	-------------------------------------------------------------------------------------------------------------------
	Author 	: Sumit Darbeshwar																Date: 04 Apr 17
	-------------------------------------------------------------------------------------------------------------------
	*/	
	public function updateAttachments($option)
    {
    	$this->load->module('hashids');
    	$user_data = $this->auth_api->_getUser();
		$userid = $user_data['user_id'];
    	$this->load->model('standard/standard_model');

    	$insert_array['tbl_media'][0]['fields']=array('user_file_name'=>$option['file_name'],
                                                        'system_file_name'=>$option['file_new_name'],
                                                        'file_path'=>$option['relative_path'].$option['file_new_name'],
                                                        'extension'=>$option['ext'],
                                                    );
    	if(isset($option['id']) && is_numeric($option['id']))
		{
			$file_details[]=array(
										$option['key']=>$option['id'],
										'inserted_by'=>$userid,
				        				'inserted_on'=>date('Y-m-d H:i:s')
									 );
				if (isset($option['attachment_id']) && !empty($option['attachment_id'])) 
				{
						$file_details[0]['attachment_id'] =$option['attachment_id'];
				}
		 		$insert_array['tbl_media'][0]['dependency'][$option['dp_table']] = $file_details;
		 		$insert_array['tbl_media'][0]['dependency']['fields'] = Array ('media_id');
		 }
 		
        $this->_defaultFields( $insert_array['tbl_media'][0]['fields']);
        
        $save_media=$this->standard_model->singleRecordMultiTableMultiRecordBatchInsert($insert_array);
        if($save_media['state'] == TRUE)
        {
        	if (isset($option['key']) && $option['key'] =='user_id' && $option['id'] ) 
        	{
	 			$userprofile=array(
	 								'media_id'=>$save_media['insert_id'],
	 								'media_encrypt'=>$this->hashids->encrypt($save_media['insert_id']),
	 							  ); 
	 			$this->standard_model->update_record('tbl_user',$userprofile,'user_id',$option['id']);
	 		}
            $data_return['media_id'] = $save_media['insert_id'];
            $data_return['extension'] = $option['ext'];
            $data_return=$this->encryptArray($data_return);
            return $data_return;
        }
        else
        {
            return FALSE;
        }
    }
	/*
	-------------------------------------------------------------------------------------------------------------------
	Author 	: Sumit Darbeshwar																Date: 28 Mar 17
	-------------------------------------------------------------------------------------------------------------------
	*/
	public function getRootPath(){
		$this->load->config('media/file_upload',TRUE);
        $this->mediaConfig = $this->config->item('file_upload');
        $mode=$this->mediaConfig['mode'];
        return $this->mediaConfig['route_path'][$mode];
	} 
	/*
	-------------------------------------------------------------------------------------------------------------------
	Author 	: Rupali B     																     Date: 26 Sep 17
	-------------------------------------------------------------------------------------------------------------------
	*/
	public function getThumbPathDetails(){
		$this->load->config('media/file_upload',TRUE);
        $this->mediaConfig = $this->config->item('file_upload');
        $mode=$this->mediaConfig['mode'];
        $root_path = $this->mediaConfig['route_path'][$mode];
        $thumb_config = isset($this->mediaConfig['product'])?$this->mediaConfig['product']:'';
        if(isset($thumb_config['thumb_size']) && !empty($thumb_config['thumb_size'])) 
        {
			return $thumb_config['thumb_size'];
        }
        else
        {
        	return false;
        }
	} 
	/*
	--------------------------------------------------------------------------------------------------------------
		AUTHOR :Mahadev Mandole											Date:20-06-2017
		Description:
	--------------------------------------------------------------------------------------------------------------
	*/
	private function createMedianNumber()
	{
		return bin2hex(openssl_random_pseudo_bytes(4));
	}
	/*
	-------------------------------------------------------------------------------------------------------------------
	Author 	: Sumit Darbeshwar																Date: 03 Apr 17
	-------------------------------------------------------------------------------------------------------------------
	*/	
	public function plUpload($options)
	{
			//echo "<pre>";print_r($_FILES);
			
		/**
		 *
		 * Copyright 2013, Moxiecode Systems AB
		 * Released under GPL License.
		 *
		 * License: http://www.plupload.com/license
		 * Contributing: http://www.plupload.com/contributing
		 */

		#!! IMPORTANT: 
		#!! this file is just an example, it doesn't incorporate any security checks and 
		#!! is not recommended to be used in production environment as it is. Be sure to 
		#!! revise it and customize to your needs.


		// Make sure file is not cached (as it happens for example on iOS devices)
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");

		/* 
		// Support CORS
		header("Access-Control-Allow-Origin: *");
		// other CORS headers if any...
		if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
			exit; // finish preflight CORS requests here
		}
		*/

		// 5 minutes execution time
		@set_time_limit(5 * 60);

		// Uncomment this one to fake upload time
		// usleep(5000);

		// Settings
		//$targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
		$targetDir = $options['upload_path'];
		$cleanupTargetDir = true; // Remove old files
		$maxFileAge = 5 * 3600; // Temp file age in seconds


		// Create target dir
		if (!file_exists($targetDir)) {
			@mkdir($targetDir,0755,TRUE);
		}

		// Get a file name
		if (isset($_REQUEST["name"])) {
			$fileName = $_REQUEST["name"];
		} elseif (!empty($_FILES)) {
			$fileName = $_FILES["FileInput"]["name"];
		} else {
			$fileName = uniqid("file_");
		}
	
		$filePath = $targetDir . $fileName;

		// Chunking might be enabled
		$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
		$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;


		// Remove old temp files	
		if ($cleanupTargetDir) {
			if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
			}

			while (($file = readdir($dir)) !== false) {
				$tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

				// If temp file is current file proceed to the next
				if ($tmpfilePath == "{$filePath}.part") {
					continue;
				}

				// Remove temp file if it is older than the max age and is not the current file
				if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge)) {
					@unlink($tmpfilePath);
				}
			}
			closedir($dir);
		}	


		// Open temp file
		if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) {
			die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
		}

		if (!empty($_FILES)) {
			if ($_FILES["FileInput"]["error"] || !is_uploaded_file($_FILES["FileInput"]["tmp_name"])) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
			}

			// Read binary input stream and append it to temp file
			if (!$in = @fopen($_FILES["FileInput"]["tmp_name"], "rb")) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
			}
		} else {	
			if (!$in = @fopen("php://input", "rb")) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
			}
		}

		while ($buff = fread($in, 4096)) {
			fwrite($out, $buff);
		}

		@fclose($out);
		@fclose($in);

		// Check if file has been uploaded
		if (!$chunks || $chunk == $chunks - 1) {
			// Strip the temp .part suffix off 
			rename("{$filePath}.part", $filePath);
			$old_file=pathinfo($filePath);
			$genrate_file_names=$this->get_file_name($old_file['filename']);
			$new_file_path=$old_file['dirname'].'/'.$genrate_file_names['file_new_name'].'.'.$old_file['extension'];
			rename("{$filePath}", $new_file_path);
			if (isset($options['compress']) && $options['compress']) {
				if(strtolower($old_file['extension'])=='jpg' || strtolower($old_file['extension']) == 'png' ||  strtolower($old_file['extension'])=='jpeg'){
					$this->compressFile($new_file_path, $new_file_path);
				}
			}
			if (isset($options['thumb_size']) && $options['thumb_size']>0) {
				
				$options['origan'] = $new_file_path;
				if(isset($thumb_details) && !empty($thumb_details))
				{
					$this->multiple_thumbnail($options);
				}
			}
			
			return array('file_info'=>array('filename'=>($genrate_file_names['file_name'].'.'.$old_file['extension']) ,
											'file_new_name'=>($genrate_file_names['file_new_name'].'.'.$old_file['extension'] ),
											'extension'=> $old_file['extension']
											),'path'=>$new_file_path); 

		}
		die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
	}
public function plUpload1($options)
	{
		/**
		 * upload.php
		 *
		 * Copyright 2013, Moxiecode Systems AB
		 * Released under GPL License.
		 *
		 * License: http://www.plupload.com/license
		 * Contributing: http://www.plupload.com/contributing
		 */

		#!! IMPORTANT: 
		#!! this file is just an example, it doesn't incorporate any security checks and 
		#!! is not recommended to be used in production environment as it is. Be sure to 
		#!! revise it and customize to your needs.


		// Make sure file is not cached (as it happens for example on iOS devices)
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");

		/* 
		// Support CORS
		header("Access-Control-Allow-Origin: *");
		// other CORS headers if any...
		if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
			exit; // finish preflight CORS requests here
		}
		*/

		// 5 minutes execution time
		@set_time_limit(5 * 60);

		// Uncomment this one to fake upload time
		// usleep(5000);

		// Settings
		//$targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
		$targetDir = $options['upload_path'];
		$cleanupTargetDir = true; // Remove old files
		$maxFileAge = 5 * 3600; // Temp file age in seconds


		// Create target dir
		if (!file_exists($targetDir)) {
			@mkdir($targetDir,0755,TRUE);
		}

		// Get a file name
		if (isset($_REQUEST["name"])) {
			$fileName = $_REQUEST["name"];
		} elseif (!empty($_FILES)) {
			$fileName = $_FILES["file"]["name"];
		} else {
			$fileName = uniqid("file_");
		}

		$filePath = $targetDir . $fileName;

		// Chunking might be enabled
		$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
		$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;


		// Remove old temp files	
		if ($cleanupTargetDir) {
			if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
			}

			while (($file = readdir($dir)) !== false) {
				$tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

				// If temp file is current file proceed to the next
				if ($tmpfilePath == "{$filePath}.part") {
					continue;
				}

				// Remove temp file if it is older than the max age and is not the current file
				if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge)) {
					@unlink($tmpfilePath);
				}
			}
			closedir($dir);
		}	


		// Open temp file
		if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) {
			die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
		}

		if (!empty($_FILES)) {
			if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
			}

			// Read binary input stream and append it to temp file
			if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
			}
		} else {	
			if (!$in = @fopen("php://input", "rb")) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
			}
		}

		while ($buff = fread($in, 4096)) {
			fwrite($out, $buff);
		}

		@fclose($out);
		@fclose($in);

		// Check if file has been uploaded
		if (!$chunks || $chunk == $chunks - 1) {
			// Strip the temp .part suffix off 
			rename("{$filePath}.part", $filePath);
			$old_file=pathinfo($filePath);
			$genrate_file_names=$this->get_file_name($old_file['filename']);
			$new_file_path=$old_file['dirname'].'/'.$genrate_file_names['file_new_name'].'.'.$old_file['extension'];
			rename("{$filePath}", $new_file_path);
			if (isset($options['compress']) && $options['compress']) {
				if(strtolower($old_file['extension'])=='jpg' || strtolower($old_file['extension']) == 'png' ||  strtolower($old_file['extension'])=='jpeg'){

					$this->compressFile($new_file_path, $new_file_path,$options['folder_prefix']);
				}
			}
			if (isset($options['thumb_size']) && $options['thumb_size']>0) {
				
				$options['origin'] = $new_file_path;
				if(isset($options['origin']) && !empty($options['origin']))
				{
					$this->multiple_thumbnail($options);
				}
			}
			$randomString=$this->createMedianNumber();
			$media_no = substr($randomString, 0,7) ;
			$insertdata = array(
								'user_file_name'=> ($genrate_file_names['file_name'].'.'.$old_file['extension']),
								'extension'=>$old_file['extension'],
								'system_file_name'=>($genrate_file_names['file_new_name'].'.'.$old_file['extension'] ),
								'file_path'=>$new_file_path,
								'media_no'=>$media_no,
								'inserted_by'=>$options['user_id'],
								'inserted_on'=>date('Y-m-d H:i:s'),
								'modified_by'=>$options['user_id']
								);
			$media_id = $this->standard_model->save_record('tbl_media',$insertdata);
			if ($media_id['state']) {
				return array('state'=>$media_id['state'],'media_id'=>$media_id['id']);
			}
			else
			{
				return array('state'=>FALSE);
			}
			
			/*return array('file_info'=>array('filename'=>($genrate_file_names['file_name'].'.'.$old_file['extension']) ,
											'file_new_name'=>($genrate_file_names['file_new_name'].'.'.$old_file['extension'] ),
											'extension'=> $old_file['extension']
											),'path'=>$new_file_path); */

		}
		die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
	}
		/*
	--------------------------------------------------------------
	Author 	: Sumit Darbeshwar					Date: 27 Mar 2017
	--------------------------------------------------------------
	*/
	public function _chunkFileUpload($option){
		require_once APPPATH."/third_party/uploader/vendor/autoload.php";
        $config = new \Flow\Config();
        $request = new \Flow\Request(null,$option['file']);
        /* if temp folder does not exist create if exist then give file permissions */
        if(!file_exists(APPPATH.'temp')){
        	mkdir(APPPATH.'temp',0755,TRUE);
        }
        else{
        	chmod(APPPATH.'temp', 0755);
        }

        $config->setTempDir(APPPATH.'temp');
        $file = new \Flow\File($config,$request);
        $get=$this->input->get();
        $post=$this->input->post();
        
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($file->checkChunk()) {
                header("HTTP/1.1 200 Ok");
            } else {
                header("HTTP/1.1 204 No Content");
                return ;
            }
        } else {
          if ($file->validateChunk()) {
              $file->saveChunk();
              
          } else {
              // error, invalid chunk upload request, retry
              header("HTTP/1.1 400 Bad Request");
              return ;
          }
        }
        
        if ($file->validateFile() && $file->save($option['fullpath'],$config,$request)) 
        {
        	if ($option['compress'] && $option['ext'] !='pdf') {
        		$this->_keepOrignalCpy($option['fullpath'],$option['folder_prefix']);
        		 $this->compressFile($option['fullpath'], $option['fullpath'],$option['folder_prefix']);
        	}
        	if (isset($option['thumb_size']) && !empty($option['thumb_size']) && $option['ext'] !='pdf') 
        	{
        		$this->multiple_thumbnail($option);
        	}
           $return=$this->updateAttachments($option);
            if(is_array($return))
            {
                $this->json->jsonReturn(array(
                                    'success' => true,
                                    'files' => $_FILES,
                                    'get' => $get,
                                    'post' => $post,
                                    'attachment'=>isset($return)?$return:false,
                                ));
            }
            else
            {
                $this->json->jsonReturn(array(
                                    'success' => false,
                                    'files' => $_FILES,
                                    'get' => $get,
                                    'post' => $post,
                                    'attachment'=>false
                                ));
            }
               
        } 
        else 
        {
            // This is not a final chunk, continue to upload 
        }
	}
	/*
	--------------------------------------------------------------------------------------------------------------
		AUTHOR :Mahadev Mandole											Date:26-06-2017
		Description:
	--------------------------------------------------------------------------------------------------------------
	*/
	public function resize_uploaded_image($source, $destination)
	{
		$this->load->library('image_lib');
		$this->load->helper('string');			
		list($iwidth, $iheight, $type, $attr) = getimagesize($source);
		if($iheight>300)
		{
			if($iwidth>$iheight && $iwidth>700)
			{
				$width=700;$height=$iheight;							
			}
			else if($iwidth<$iheight && $iwidth>700)
			{	
				$width=700;$height=$iheight;								
			}
			else if($iwidth==$iheight && $iwidth>700)
			{
				$width=700;$height=700;							
			}
			else
			{
				$width=$iwidth;$height=$iheight;							
			}
			$resize_conf = array(   
					'image_library' => 'gd2',                
                    'source_image'  => $source,                    
                    'new_image'     =>$destination,
                   	'quality'		=>'90%',                   
                   	'maintain_ratio'=> TRUE,
                   	'width'=>$width,
                   	'height'=>$height
                    );

			$this->image_lib->clear();
			$this->image_lib->initialize($resize_conf);
			$this->image_lib->resize();
			return true;
		}
		else
		{
			@unlink($source);	
			return false;
			
		}
	
	}
	
	/*
	-------------------------------------------------------------------------------------------------------------------
	Author 	: Sumit Darbeshwar																Date: 28 Mar 17
	-------------------------------------------------------------------------------------------------------------------
	Purpose: calculate the percentage of compress
	*/
	public function compressFile($source, $destination,$prefix)
    {
        if(file_exists($source)){
            $totalsize=filesize($source)/1024;
            if( $totalsize>1024)
            { 
                $x = (int)((1024/$totalsize)*100);
                $this->compress($source, $destination, $x,$prefix); 
                $compresssize=filesize($destination)/1024; 
                 
            }
        }
    }
	/*
	-------------------------------------------------------------------------------------------------------------------
	Author 	: Sumit Darbeshwar																Date: 28 Mar 17
	-------------------------------------------------------------------------------------------------------------------
	Purpose: Compress file with given quality and save to desination folder
	*/

    public function compress($source, $destination, $quality,$prefix) {

        $info = getimagesize($source);

        if ($info['mime'] == 'image/jpeg') 
            $image = imagecreatefromjpeg($source);

        elseif ($info['mime'] == 'image/gif') 
            $image = imagecreatefromgif($source);

        elseif ($info['mime'] == 'image/png') 
            $image = imagecreatefrompng($source);
        else
        	return true;
        $this->_keepOrignalCpy($source,$prefix);
        imagejpeg($image, $destination,90);

        return $destination;
    }
	/*
	-------------------------------------------------------------------------------------------------------------------
	Author 	: Sumit Darbeshwar																Date: 28 Mar 17
	-------------------------------------------------------------------------------------------------------------------
	Purpose:Keeps an orignal copy of given file in orignal directory in same folder
	*/ 
	public function _keepOrignalCpy($filePath,$prefix){
	 	$dir=dirname($filePath);
        $file=basename($filePath);
        $original_dir=join(DIRECTORY_SEPARATOR,array($dir,$prefix.'original',''));
        $dest=join(DIRECTORY_SEPARATOR, array($dir,$file,'')); 
        if (!file_exists($original_dir)) 
	    {
            mkdir($original_dir,0755,TRUE);
        }
        if (file_exists($filePath)) 
        {
            copy($filePath,join(DIRECTORY_SEPARATOR, array($original_dir,$file)));
        }
	}   
	public function getEncrytedKeys() // testing function
	{
		$id = array('1','3'); // y27iK
		$this->load->module('hashids');
		$en_id = $this->hashids->encrypt(array('1','3'));
		/*echo "<pre>";
		print_r ($en_id);
		echo "</pre>";*/
	}
	/*-----------------------------------------------------------------------------------------------------------------
		Author 	: Rupali Bora															Date: 16-06-2017
		Description : get file path and load image 
		Parameter : encryption of (media_id,reference_id)
					image of (product/discussion/user/comment etc)
					thumbnail
					thumbnail size
		Modified Author : Rupali Bora													Date: 15-09-2017
		Description : set default image of user if image not found
	-------------------------------------------------------------------------------------------------------------------*/
	public function getFilePath() 
	{
		$option = func_get_args();
		// $option = Array('default','user');
		$file_details = array();
		$file_path_array = array();
		$id_array = array();$file_path='';
		if(is_array($option))
		{
			if(!empty($option[0]))
			{
				$this->load->module('hashids');
				$imageOf = (isset($option[1]) && !empty($option[1])?$option[1]:'');
				if(isset($imageOf) && !empty($imageOf))
				{
					$config_details = $this->load->config('media/file_upload');
					$mode = $config_details['mode'];
					$route_path = $config_details['route_path'][$mode];
					$folder_array = $config_details[$imageOf];
					
					if($option[0] == 'default')
					{			
						if($imageOf == 'user')
						{
							$this->setDefaultImagePath($imageOf);	
						}
					}
					else
					{		
						$id_array = $this->hashids->decrypt($option[0],FALSE);
						$media_id = $id_array[0];
						if(sizeof($id_array)>1)
						{
							$reference_id = $id_array[1];
						}
						$media_details = $this->media_model->fetchMediaDetails($media_id);
						if($media_details)
						{
							$user_file_name = $media_details['user_file_name'];
							$system_file_name = $media_details['system_file_name'];	

						
							if(sizeof($id_array)>1)
							{
								$route_path = $route_path.$folder_array['folder'].'/'.$reference_id.'/';
							}
							else
							{
								$route_path = $route_path.$folder_array['folder'].'/';
							}
							if(sizeof($option)==2)
							{
								$file_path = $route_path.$system_file_name;
							}
							elseif(sizeof($option) > 2)
							{
								$thumb_size = $option[2];
								if(isset($thumb_size) && !empty($thumb_size))
								{
									$file_path = $route_path.$folder_array['folder_prefix'].$folder_array['thumb_folder'].'/'.$thumb_size.'/'.$system_file_name;
								}
							}							
						}
						else
						{
							if((isset($imageOf) && !empty($imageOf) && $imageOf =='user'))
							{
								$this->setDefaultImagePath($imageOf);	
							}
							else
							{
								return FALSE; // records not found in media
							}
						}
					}

				}
				else
				{
					return FALSE; // insufficient data
				}
				if(file_exists($file_path))
				{
					$file_details['path']= trim($file_path);
					$file_details['extension'] = trim($media_details['extension']);
			    	$file_details['user_file_name'] = trim($media_details['system_file_name']);
			    	$this->output_file($file_details);	
				}
				else
				{
					if((isset($imageOf) && !empty($imageOf) && $imageOf =='user'))
					{
						$this->setDefaultImagePath($imageOf);	
					}
					// load default image					
				}
			}
			else{return FALSE;}
		}
		else
		{
			return FALSE;
		}
	}
	/*-----------------------------------------------------------------------------------------------------------------
		Author 	: Rupali Bora															Date: 18-09-2017
		Description : get file path and load image 
		Parameter : encryption of (media_id,reference_id)
					image of (product/discussion/user/comment etc)
					thumbnail
					thumbnail size
	-------------------------------------------------------------------------------------------------------------------*/
	public function getFilePathThumb() 
	{
		$option = func_get_args();
		$get = $this->input->get();
		// $option = Array('default','user');
		$file_details = array();
		$file_path_array = array();
		$id_array = array();$file_path='';
		if(is_array($option))
		{
			$imageOf = (isset($option[1]) && !empty($option[1])?$option[1]:'');
			if(!empty($option[0]) || $option[0]!=0)
			{
				$this->load->module('hashids');
				if(isset($imageOf) && !empty($imageOf))
				{
					$config_details = $this->load->config('media/file_upload');
					$mode = $config_details['mode'];
					$route_path = $config_details['route_path'][$mode];
					$folder_array = $config_details[$imageOf];
					if($option[0] == 'default')
					{	
						$this->setDefaultImagePath($imageOf);	
					}
					else
					{		
						$id_array = $this->hashids->decrypt($option[0],FALSE);
						$media_id = $id_array[0];
						if(sizeof($id_array)>1)
						{
							$reference_id = $id_array[1];
						}
						$media_details = $this->media_model->fetchMediaDetails($media_id);
						if($media_details)
						{
							$user_file_name = $media_details['user_file_name'];
							$system_file_name = $media_details['system_file_name'];	

							if(sizeof($id_array)>1)
							{
								$route_path = $route_path.$folder_array['folder'].'/'.$reference_id.'/';
								$thumb_name='';
								if(isset($get['height']) && isset($get['width']))
								{
									$thumb_name = "height=".$get['height'].'&'."width=".$get['width'];
								}
								elseif(isset($get['height']) && isset($get['height']))
								{
									$thumb_name = "height=".$get['height'];
								}
								elseif(isset($get['width']))
								{
									$thumb_name = "width=".$get['width'];
								}
								if(isset($thumb_name) && !empty($thumb_name))
								{
									$file_path = $route_path.$folder_array['folder_prefix'].$folder_array['thumb_folder'].'/'.$thumb_name.'/'.$system_file_name;
								}
							}
							else{return FALSE;}												
						}
						else
						{
							if(isset($imageOf) && !empty($imageOf))
							{
								$this->setDefaultImagePath($imageOf);
							}	
							else
							{
								return FALSE; // records not found in media
							}
						}
					}

				}
				else
				{
					return FALSE; // insufficient data
				}
				/*echo "<pre>";
				print_r ($file_path);die;
				echo "</pre>";*/
				if(file_exists($file_path))
				{
					$file_details['path']= trim($file_path);
					$file_details['extension'] = trim($media_details['extension']);
			    	$file_details['user_file_name'] = trim($media_details['system_file_name']);
			    	$this->output_file($file_details);	
				}
				else
				{
					// load default image					
					if(isset($imageOf) && !empty($imageOf))
					{
						$this->setDefaultImagePath($imageOf);
					}	
					else
					{
						return FALSE; 
					}
				}
			}
			else
			{
				if(isset($imageOf) && !empty($imageOf))
				{
					$this->setDefaultImagePath($imageOf);
				}	
				else
				{
					return FALSE; 
				}
			}
		}
		else
		{
			return FALSE;
		}
	}
	/*-----------------------------------------------------------------------------------------------------------------
		Author 	: Rupali Bora															Date: 19-09-2017
		Description : set default image path
	-------------------------------------------------------------------------------------------------------------------*/
	public function setDefaultImagePath($imageOf=false)
	{
		$this->load_default_image('.ui/common/assets/images/favicon.jpg');
		/*if(isset($imageOf) && !empty($imageOf))
		{
			switch ($imageOf) 
			{
				case 'user': 		$this->load_default_image('./images/user/user.png');
									break;
				case 'discussion': 	$this->load_default_image('./images/default/discussion-not-found.png');
									break;
				case 'comment': 	$this->load_default_image('./images/default/thumb-attachment-not-found.png');
									break;
				default: break;
			}	
		}
		else{return false;}*/
	}
	/*-----------------------------------------------------------------------------------------------------------------
		Author 	: Rupali Bora															Date: 14-09-2017
		Description : load default user photo
	-------------------------------------------------------------------------------------------------------------------*/
	public function load_default_image($path=false)
	{
		if($path)
		{
			$path_array = explode('/',$path);
			if($path_array)
			{
				$user_file_name = $path_array[sizeof($path_array)-1];
			}
			$extension = pathinfo($user_file_name, PATHINFO_EXTENSION);
			$file_details['path']= $path;
			$file_details['extension'] = $extension;
	    	$file_details['user_file_name'] = $user_file_name;
	    	$this->output_file($file_details);
	    }
	    else
	    {
	    	// show_404();
	    	return false;
	    }
	}

	/*
	| Date : 23/06/2017
	| Author : Aditya Gurav
	Modified By : Mahadev Mandole
	| Description : upload user profile (if exist upload dir then unlink).
	*/

	public function uploadUserProfilePicture()
	{
		$isAccess = $this->auth_api->_isAccess();
		if($isAccess['state'])
		{	
			$this->load->model('standard/standard_model');
			$this->load->module('hashids');
			/* get logged userdata from session */
			$user_data = $this->auth_api->_getUser();
			$user_id = $user_data['user_id'];

			/* set file settings */
			$file_setting = $this->config_details['user'];
			$file_setting['id'] = $user_id;

			/* if user profile dir exist then unlink */
			$root= $this->getRootPath();
			$unlink_path =join(DIRECTORY_SEPARATOR,array($root,$file_setting['folder'],$file_setting['id'],''));
			
			$imgBase64=$this->input->post('imgBase64');
			$imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imgBase64));
			if(isset($imageData) && $imageData!='') 
			{
				if(file_exists($unlink_path))
				{
					if ($this->remove_directory($unlink_path)) {
						mkdir($unlink_path, 0777, true);
					}
				}
				else {
					mkdir($unlink_path, 0777, true);
				}
				$file = 'user_profile'.date('Y-m-d H:i:s').$user_id;
				$rename_name = md5(sha1(md5($file)));
				$file_name = $_FILES['inputfiles']['name'];
				$ext = pathinfo($file_name, PATHINFO_EXTENSION);
				$new_name = $rename_name.'.'.$ext;
				file_put_contents($unlink_path.$new_name, $imageData);
				if(file_exists($unlink_path.$new_name))
				{
					if (isset($file_setting['thumb_size']) && sizeof($file_setting['thumb_size'])>0) 
					{
						$file_setting['origin'] =$unlink_path.$new_name;
						$this->multiple_thumbnail($file_setting);
					}
					$randomString=$this->createMedianNumber();
					$media_no = substr($randomString, 0,7) ;		
					$insertdata = array('user_file_name'=>$file_name, 'extension'=>$ext, 'system_file_name'=>$new_name, 'media_no'=>$media_no, 'file_path'=>$unlink_path.$new_name, 'inserted_by'=> $user_id, 'inserted_on'=>date('Y-m-d H:i:s'), 'modified_by'=> $user_id );
					$media_id = $this->standard_model->save_record('tbl_media',$insertdata);
					if ($media_id['state']) 
					{
						$update_data = array( 'media_id'=>$media_id['id'], 'media_encrypt'=>$this->hashids->encrypt(array($media_id['id'],$user_id)) );
			 	 		$updateResult = $this->standard_model->update_record('tbl_user',$update_data,'user_id',$user_id);
			 	 		$result = array(
 	 						'state' =>TRUE,
 	 						'msg' => 'Your profile picture has been set successfully.'
 	 					);
					}else{ $result = array('state' => FALSE,'msg' => 'Sorry, but your profile picture could not be set. please try again.'); }
				}else{ $result = array('state' => FALSE,'msg' => 'Sorry, but your profile picture could not be set. please try again.'); }
			}else{ $result = array('state' => FALSE,'msg' => 'Sorry, but your profile picture could not be set. please try again.'); }
			
	 	 	echo json_encode($result);

		}
	}

	/*
	--------------------------------------------------------------------------------------------------------------
		AUTHOR :Mahadev Mandole											Date:14-11-2017
		Description:
	--------------------------------------------------------------------------------------------------------------
	*/
	public function remove_directory($dir)
	{
		if(isset($dir) && !empty($dir)){
		   	$files = array_diff(scandir($dir), array('.','..'));
		    foreach ($files as $file) {
		      (is_dir("$dir/$file")) ? $this->remove_directory("$dir/$file") : unlink("$dir/$file");
		    }
		    return @rmdir($dir);
		}
		else{
			return FALSE;
		}
	}
/*
--------------------------------------------------------------------------------------------------------------
	AUTHOR :Mahadev Mandole											Date:13-11-2017
	Description:
--------------------------------------------------------------------------------------------------------------
*/
	public function newGetFilePath() 
	{
		$option = func_get_args();
		$file_details = array();
		$file_path_array = array();
		$temp_path = ''; $path = ''; $semi_path = '';$file_name  ='';$file_name_index='';
		$sizeof = sizeof($option);
		if(isset($option) && is_array($option))
		{
			$media_id = $option[1];
			$config = $option[0];
			
			if(!empty($media_id) && !empty($config))
			{
				$this->load->module('hashids');
				$media_id = $this->hashids->decrypt($media_id);
				if($media_id==false)
				{
					show_404();
					return FALSE;
				}
				$file_setting=$this->config_details[$config];

				if (isset($config) && $config !='product' && $config !='purchase' ){
					$media_details = $this->media_model->fetchMediaDetails($media_id,$file_setting);
				}
				else
				{

					$media_details = $this->media_model->fetch_file_details($media_id,$file_setting);
				}

				if(isset($media_details) && !empty($media_details))
				{

					$root=$this->getRootPath();
					if (isset($config) && $config !='product' &&  $config !='purchase') {
						$path=join(DIRECTORY_SEPARATOR,array($root,$file_setting['folder'],$file_setting['folder_prefix'].$media_details['id'],$media_details['file_const'],''));
					}
					else
					{
						$thumb_folder=$file_setting['folder_prefix'].$file_setting['thumb_folder'];
						$thumb_name = "width=500&height=500"; //this is temporary
						if (isset($media_details) && $media_details['extension'] == 'pdf') 
						{
							$path=join(DIRECTORY_SEPARATOR,array($root,$file_setting['folder'],$file_setting['folder_prefix'].$media_details['id'],''));
						}else
						{
							$path=join(DIRECTORY_SEPARATOR,array($root,$file_setting['folder'],$file_setting['folder_prefix'].$media_details['id'],$thumb_folder,$thumb_name,''));
						}
						
					}

					$file_path=$path.$media_details['system_file_name'];
					if(file_exists($file_path))
					{

						$file_details['path']= trim($file_path);
						$file_details['extension'] = trim($media_details['extension']);
				    	$file_details['user_file_name'] = trim($media_details['system_file_name']);
				    	$this->output_file($file_details);	
					}
					else
					{
						$this->load_default_image('../common/assets/images/favicon.jpg');	
					}
					
				}
				else{$this->load_default_image('..common/assets/images/favicon.jpg');}
			}
			else{return FALSE;}
		}
		else
		{
			return FALSE;
		}
	}
/* --------------------------------------------------------------------------------------------------------------
	AUTHOR :Rupali B								Date:30-12-2017
--------------------------------------------------------------------------------------------------------------*/
	public function newGetFilePathPayment() 
	{
		$option = func_get_args();
		$file_details = array();
		$file_path_array = array();
		$temp_path = ''; $path = ''; $semi_path = '';$file_name  ='';$file_name_index='';
		$sizeof = sizeof($option);
		if(isset($option) && is_array($option))
		{
			$media_id = $option[1];
			$config = $option[0];
			if(!empty($media_id) && !empty($config))
			{
				$this->load->module('hashids');
				$media_id = $this->hashids->decrypt($media_id);
				if($media_id==false)
				{
					show_404();
					return FALSE;
				}
				$file_setting=$this->config_details[$config];
				if (isset($config) &&$config =='payment_attachment') {
					$media_details = $this->media_model->fetch_file_details_payment($media_id);
				}
				if(isset($media_details) && !empty($media_details))
				{
					$root=$this->getRootPath();
					
					if (isset($config) && $config =='payment_attachment') {
						if($media_details['extension']!='pdf')
						{
							$thumbnail_resolution = isset($this->config_details['payment_attachment']['thumb_size'])?$this->config_details['payment_attachment']['thumb_size']:'';
							if(isset($thumbnail_resolution) && !empty($thumbnail_resolution))
							{
								$height = $this->config_details['payment_attachment']['thumb_size'][0]['height'];
								$width = $this->config_details['payment_attachment']['thumb_size'][0]['width'];
								if(!empty($height) && !empty($width))
								{
									$path=join(DIRECTORY_SEPARATOR,array($root,$file_setting['folder'],$file_setting['folder_prefix'].'temp',$file_setting['folder_prefix'].$file_setting['thumb_folder'],'width='.$width.'&height='.$height,'')); // thumb path
								}
								else
								{
									$path=join(DIRECTORY_SEPARATOR,array($root,$file_setting['folder'],$file_setting['folder_prefix'].'temp','')); // regular path
								}
							}
							else 
							{
								$path=join(DIRECTORY_SEPARATOR,array($root,$file_setting['folder'],$file_setting['folder_prefix'].'temp','')); // regular path
							}
						}
						else
						{
							$path=join(DIRECTORY_SEPARATOR,array($root,$file_setting['folder'],$file_setting['folder_prefix'].'temp','')); // regular path
						}
					}
					$file_path=$path.$media_details['system_file_name'];
					if(file_exists($file_path))
					{
						$file_details['path']= trim($file_path);
						$file_details['extension'] = trim($media_details['extension']);
				    	$file_details['user_file_name'] = trim($media_details['system_file_name']);
				    	$this->output_file($file_details);	
					}
					else
					{
						$this->load_default_image('../common/assets/images/favicon.jpg');	
					}
				} else{$this->load_default_image('..common/assets/images/favicon.jpg');}
			} else{return FALSE;}
		} else {return FALSE; }
	}
	/*
    -------------------------------------------------------------
        AUTHOR : Rupali Bora             Date: 24/06/2016
        AUTHOR : Sumit D.				 Date: 12/04/2016
    -------------------------------------------------------------
    */
	public function unlink_payment($media_array)
	{
		if(isset($media_array) && !empty($media_array) && is_array($media_array))
		{
			$return = array();
			foreach ($media_array as $media) 
			{
				$file = $this->media_model->fetch_filename($media['media_id']); 
				$tablename = 'tbl_media';
				$result = $this->standard_model->permanant_delete_record('media_id',$media['media_id'],$tablename);

				if($result)
				{
			        @unlink($file->file_path);
			        $this->unlink_all_payment_thumbnail($file->system_file_name);
					array_push($return,$result);
				}
			}
			if(in_array(TRUE, $return))
				{return TRUE; }
			else
				{return FALSE; }
		} else {return FALSE; }
	}
	/*
    -----------------------------------------------------------
        AUTHOR : Rupali Bora           Date: 24-06-2016
        AUTHOR : Sumit D.              Date: 12-04-2017
    -----------------------------------------------------------
    */
	public function unlink_all_payment_thumbnail($file_name)
	{
		/*echo "<pre>";
		print_r ($this->config_details);die;
		echo "</pre>";*/
		if(isset($this->config_details['payment_attachment']['thumb_size']))
		{
			$root=$this->getRootPath();
			$thumbnail_resolution = $this->config_details['payment_attachment']['thumb_size'];
			if(isset($thumbnail_resolution) && !empty($thumbnail_resolution))
			{
				foreach ($this->config_details['payment_attachment']['thumb_size'] as $key => $value) 
				{
					$path='';$original_copy_path='';
					$path=$root.$this->config_details['payment_attachment']['folder'].'/'.$this->config_details['payment_attachment']['folder_prefix'].'temp/'.$this->config_details['payment_attachment']['folder_prefix'].$this->config_details['payment_attachment']['thumb_folder'].'/width='.$value['width'].'&height='.$value['height'].'/'.$file_name;
					
					$original_copy_path=$root.$this->config_details['payment_attachment']['folder'].'/'.$this->config_details['payment_attachment']['folder_prefix'].'temp/'.$this->config_details['payment_attachment']['folder_prefix'].'original/'.$file_name;
					if(file_exists($path))@unlink($path);
					if(file_exists($original_copy_path))@unlink($original_copy_path);
				}
			}
		}
	}
	/*-----------------------------------------------------------------------------------------------------------------
		Author 	: Rupali Bora															Date: 03-01-2018
		Description : get file path and load image 
					  set default image of user if image not found
		Parameter : encryption of (media_id,reference_id)
					image of (product/discussion/user/comment etc)
					thumbnail
					thumbnail size
	-------------------------------------------------------------------------------------------------------------------*/
	public function getFilePathPayment() 
	{
		$option = func_get_args();
		$file_details = array();
		$file_path_array = array();
		$id_array = array();$file_path='';
		if(is_array($option))
		{
			if(!empty($option[0]))
			{
				$this->load->module('hashids');
				$imageOf = (isset($option[1]) && !empty($option[1])?$option[1]:'');
				if(isset($imageOf) && !empty($imageOf))
				{
					$config_details = $this->load->config('media/file_upload');
					$mode = $config_details['mode'];
					$route_path = $config_details['route_path'][$mode];
					$folder_array = $config_details[$imageOf];
					
					if($option[0] == 'default')
					{			
						if($imageOf == 'user')
						{
							$this->setDefaultImagePath($imageOf);	
						}
					}
					else
					{		
						$id_array = $this->hashids->decrypt($option[0],FALSE);
						$media_id = $id_array[0];
						if(sizeof($id_array)>1)
						{
							$reference_id = $id_array[1];
						}
						$media_details = $this->media_model->fetch_file_details_payment($media_id);
						if($media_details)
						{
							$user_file_name = $media_details['user_file_name'];
							$system_file_name = $media_details['system_file_name'];	
							if(sizeof($id_array)>1)
							{
								$route_path = $route_path.$folder_array['folder'].'/'.$folder_array['folder_prefix'].$reference_id.'/';
							}
							else
							{
								$route_path = $route_path.$folder_array['folder'].'/';
							}
							if(sizeof($option)==2)
							{
								$file_path = $route_path.$system_file_name;
							}
							elseif(sizeof($option) > 2)
							{
								$thumb_size = $option[2];
								if(isset($thumb_size) && !empty($thumb_size))
								{
									$file_path = $route_path.$folder_array['folder_prefix'].$folder_array['thumb_folder'].'/'.$thumb_size.'/'.$system_file_name;
								}
							}							
						}
						else
						{
							if((isset($imageOf) && !empty($imageOf) && $imageOf =='user'))
							{
								$this->setDefaultImagePath($imageOf);	
							} else {return FALSE;} // records not found in media
						}
					}
				} else {return FALSE;} // insufficient data
				if(file_exists($file_path))
				{
					$file_details['path']= trim($file_path);
					$file_details['extension'] = trim($media_details['extension']);
			    	$file_details['user_file_name'] = trim($media_details['system_file_name']);
			    	$this->output_file($file_details);	
				}
				else
				{
					if((isset($imageOf) && !empty($imageOf) && $imageOf =='user'))
					{
						$this->setDefaultImagePath($imageOf);	
					}
					// load default image					
				}
			}else{return FALSE;}
		} else {return FALSE; }
	}
	/*-----------------------------------------------------------------------------------------------------------------
		Author 	: Rupali Bora															Date: 16-04-2018
		Description : get file path and load image 
		Parameter : encryption of (media_id,reference_id)
	-------------------------------------------------------------------------------------------------------------------*/
	public function getDailyStockFilePath() 
	{
		
		$option=$file_path='';
		$file_details=$media_details=$file_path_array=$id_array=array();
		$option = func_get_args();
		if(is_array($option))
		{
			if(!empty($option[0]))
			{
				$this->load->module('hashids');
				$config_details = $this->load->config('media/file_upload');
				$mode = $config_details['mode'];
				$route_path = $config_details['route_path'][$mode];
				$folder_array = $config_details[$option[0]];
				
				$id_array = $this->hashids->decrypt($option[1],FALSE);
				$media_id = $id_array[0];
				if(sizeof($id_array)>1)
				{
					$reference_id = $id_array[1];
				}

				if(sizeof($option)>3)
				{
					$dbObj=array();
            		$this->load->module('create_database/database_connection');
            		$option[3] = $this->hashids->decrypt($option[3]);
					$dbObj = $this->database_connection->dbConnect($option[3]);
                	if(isset($dbObj->database) && !empty($dbObj->database))
                	{
						$media_details = $this->media_model->fetch_file_details_daily_stock($media_id,$dbObj);
                	}
				}
				else
				{
					$media_details = $this->media_model->fetch_file_details_daily_stock($media_id);
				}
				if($media_details)
				{
					$user_file_name = $media_details['user_file_name'];
					$extension = $media_details['extension'];
					$route_path = $route_path.$folder_array['folder'].'/';
					if(sizeof($option)>3)
					{
						$file_path = $route_path.$option[2].'/'.$option[3].'/'.$user_file_name.'.'.$extension;
					}
					else
					{
						$file_path = $route_path.$option[2].'/'.$user_file_name.'.'.$extension;
					}		
				} else {return FALSE; }
				if(file_exists($file_path))
				{
					
					$file_details['path']= trim($file_path);
					$file_details['extension'] = trim($media_details['extension']);
			    	$file_details['user_file_name'] = trim($media_details['user_file_name']);
			    	$this->output_file($file_details);	
				} else {return FALSE; }
			}else{return FALSE;}
		} else {return FALSE; }
	}
} //EOF