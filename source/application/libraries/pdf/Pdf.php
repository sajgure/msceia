<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH."/third_party/vendor/autoload.php";
/*
|	function pdf()
|	{
|		$this->load->library('pdf/pdf');
|		$report=$this->load->view('report/report','',true);
|		$config=array(
|						'margin_top'=>10,
|						'margin_right'=>10,
|						'margin_bottom'=>20,
|						'margin_left'=>30,
|						'footer_margin'=>10,
|						'header_margin'=>10,
|						'password'=>'s',
|						'rights'=>array('print'),
|						'backtoback'=>1,
|						'output'=>'F',
|						'file'=>'one/two/three/four/five/six/2.pdf'
|
|
|			);
|
|		echo $this->pdf->write($report,$config);//optional code
|	}
|	to genrate ownner key use this function and keep safe use only once and add _ infront of funtion
|	function pdf_key()
|	{
|		$this->load->library('pdf/pdf');
|		$key=$this->input->post('key');
|		if(isset($key))
|		{
|			echo 'Copy this into application/config/pdf.php <br/>Key:<input type="text" value="'.$this->pdf->owner_key($key).'" />' ;
|		}
|	}
|  to genrate ownner key use this function and keep safe use only once and add _ infront of funtion
|	function set_key()
|	{
|		$this->load->view('set_key');
|	}
|
*/

class Pdf
{
	protected $config,$ci; 
	function __construct()
	{
		$this->ci=& get_instance();
		$this->ci->config->load('pdf', TRUE);
      	$this->config=$this->ci->config->item('pdf');
	}
	/*
	| Functin returns file name if output==F, output will be redirected to Browser defaultly 
	| file name does not found then Start file name with PDF-fileand<datestamp>.pdf 
	*/
	function write($html,$param=false)
	{
	    //echo $html = '<!DOCTYPE html><html lang="en"><head></head><body>'.$html.'</body></html>';

	    $config= $this->setConfig($param);	
		
		$mpdf=new \Mpdf\Mpdf($config);//['mode'],$config['format'],$config['default_font_size'],$config['default_font'] ,$config ['margin_left'] , $config['margin_right'] , $config['margin_top'] ,$config ['margin_bottom'] ,$config['header_margin'] , $config['footer_margin'],$config['orientation']
		if(isset($param['backtoback']))
		{
			$mpdf->mirroMargins = $param['backtoback'];
		}
		$access=$this->getKeys($param);
		$mpdf->SetProtection($access['rights'],$access['user'],$access['owner']);
		//$mpdf->mirroMargins = true;
		$mpdf->WriteHTML($html);
		return $this->writer($mpdf,$config);
	}
	protected function writer(&$mpdf,$config)
	{
		if(isset($config['output']) && $config['output']=='F')
		{
			$name=$this->getFilenName($config['file']);
			if(file_exists($name))
			{
				$name=$this->str_lreplace('.pdf','',$name);
				$name.=date('dmYGis').'.pdf';
			}

			$mpdf->Output($name,'F');
			return $name;
		}
		else if(isset($config['output']) && $config['output']=='D')
		{
			$name=$this->getFilenName($config['file'],'D');
			$mpdf->Output($name,'D');
		}
		else
		{
			$mpdf->Output();
		}
	}

	protected function setConfig($param)
	{
		$config= array( 'output'=>(isset($param['output']))?$param['output']:'',
						'margin_top'=>(isset($param['margin_top']))?$param['margin_top']:'40',
						'margin_right'=>(isset($param['margin_right']))?$param['margin_right']:'10',
						'margin_bottom'=>(isset($param['margin_bottom']))?$param['margin_bottom']:'20',
						'margin_left'=>(isset($param['margin_left']))?$param['margin_left']:'10',
						'header_margin'=>(isset($param['header_margin']))?$param['header_margin']:'9',
						'footer_margin'=>(isset($param['footer_margin']))?$param['footer_margin']:'9',
						'file'=>(isset($param['file']))?$param['file']:'',
						'mode' =>(isset($param['mode']))?$param['mode']:'',
						'format' =>(isset($param['format']))?$param['format']:'',
						'default_font_size' =>(isset($param['default_font_size']))?$param['default_font_size']:'',
						'default_font'=>(isset($param['default_font']))?$param['default_font']:'', 
						'orientation'=>(isset($param['orientation']))?$param['orientation']:'P', 
			);

		return $config;
	}
	protected function getFilenName($file,$flag=false)
	{
		if(isset($file))
		{
			if($flag)
			{
				$file=basename($file);
			}
			else
			{
				$dir=dirname($file);
				
				if(!file_exists($dir))
				{
					$dir_arrays=explode('/',$dir );
					mkdir( $dir,0755, true);
				}
			}
			return $file;
		}
		else
		{
			return ($this->config['default_name'].date($this->config['date_stamp']).'.pdf');
		}
	}
	protected function str_lreplace($search, $replace, $subject)
	{
	    $pos = strrpos($subject, $search);

	    if($pos !== false)
	    {
	        $subject = substr_replace($subject, $replace, $pos, strlen($search));
	    }

	    return $subject;
	}
	protected function getKeys($param)
	{
		$access=false;
		if(isset($param['password']) && isset($this->config['owner_key']))
		{
			$this->ci->load->library('crypt');
			
			$access['owner']=$this->ci->crypt->decrypt($this->config['owner_key']);
			$access['rights']=(isset($param['rights']))?$param['rights']:$this->config['default_rights'];
			$access['user']=$param['password'];
		}
		return $access;
	}

	function owner_key($key)
	{
		$this->ci->load->library('crypt');
		$owner_key=$this->ci->crypt->encrypt($key);
		return $owner_key;
	}
}