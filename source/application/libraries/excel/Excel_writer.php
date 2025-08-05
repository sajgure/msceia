<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel_writer
{
	protected $CI,$config_excel,$counter;
	function __construct() 
	{
	    $this->CI =& get_instance();   
   		$this->CI->load->library('excel/excel');
   		$this->CI->config->load('excel', TRUE);
      	$this->config_excel=$this->CI->config->item('excel');
      
	}

	function createExcel($title,$description,$inputdata,$filename,$mode='O')
	{
					
		$excel = new PHPExcel();
		$excel->getProperties()->setTitle($title)->setDescription($description);
		$this->removeSheet( $excel,0);
		foreach ($inputdata as $sheet_data)
		{	
			$this->counter=false;	
			$newsheet=$this->addSheet($excel,$sheet_data['sheet']);
			$this->fillSheet($newsheet,$sheet_data);
			$this->autoSize($newsheet);
			// $this->wordWrap($newsheet);
		}
		return $this->excelWriter($excel,$filename,$mode);
	}
	function addSheet(&$excel, $title)
	{
		$newsheet = $excel->createSheet();
		$this->setValidTitle($title);
		$newsheet->setTitle($title);
		return $newsheet;
	}
	function setValidTitle(&$title)
	{
		if(strlen($title)>32)
		{
			$title=substr($title, 0,30);
		}
		$this->replace_Charector($title);
	}
	function replace_Charector(&$title)
	{
		
		$restricted=array(array('restricted'=>'[','replace'=>'('),
						array('restricted'=>']','replace'=>')'),
						array('restricted'=>':','replace'=>'-'),
						array('restricted'=>'*','replace'=>' '),
						array('restricted'=>'?','replace'=>' '),
						array('restricted'=>'/','replace'=>'-'),
						array('restricted'=>'\\','replace'=>'-')
			);
		foreach ($restricted as $char )
		{
			$title=str_replace($char['restricted'], $char['replace'],$title );
		}
		

	}
	function removeSheet(&$excel,$index)
	{
		$excel->removeSheetByIndex(0);
		return $excel;
	}

	function fillSheet(&$sheet,$sheet_data)
	{
		$style=array();
		$headinh_range=FALSE;
		if(isset($sheet_data['headings']))
		{
			if(isset($sheet_data['style']['heading']) && is_array($sheet_data['style']['heading']))
			{
				$style['heading']=$sheet_data['style']['heading'];
			}
			$this->fillCellArray($sheet,$sheet_data['headings']);
			$headingHeight=count($sheet_data['headings']);
			$max_range=$sheet->getHighestColumn();
			$letters = range('A','Z');
			$headinh_range=$letters[0].'1:'.$max_range.$headingHeight;
		}
		if(isset($sheet_data['records']))
		{
			if(isset($sheet_data['style']['record']) && is_array($sheet_data['style']['record']))
			{
				$style['record']=$sheet_data['style']['record'];
			}
			$sheet = $this->fillCellArray($sheet,$sheet_data['records']);
		}
		if(isset($style['record']))
		{
			$style_calculate=$this->styleArray($style['record']);
			$this->allCellFormat($sheet,$style_calculate);
		}

		if(isset($style['heading']))
		{
			$style_calculate=$this->styleArray($style['heading']);
			if($headinh_range)
			{
				$this->applyStyle($sheet,$style_calculate,$headinh_range);
			}
		}
		return $sheet;
	}
	function fillCell(&$sheet,$dataRow,$style=false)
	{
		if(is_array($dataRow)&& count($dataRow)>0)
		{
			$s=0;
			$letters = range('A','Z');
			$Start=($sheet->getHighestRow()==1)?0:$sheet->getHighestRow();
			foreach ($dataRow as $heading)
			{
				$col=0;
				if($Start==0)
				 {$row =1;$Start=1; }
				else
				 {$row=$sheet->getHighestRow()+1;}
				
				if(is_array($heading) && count($heading)>0)
				{
					$style_array=$this->styleArray($style);
					foreach ($heading as $value)
					{
						$sheet->setCellValueByColumnAndRow($col, $row, $value);
						if($style_array)
						{
							$sheet->getStyle($letters[$col].$row)->applyFromArray($style_array);
						}
						$col++;
					}
				}
			}
		}
		return $sheet;
	}
	function fillCellArray(&$sheet,$dataRow)
	{
		
		if(is_array($dataRow)&& count($dataRow)>0)
		{
			$letters = range('A','Z');
			$col=0;
			if(!$this->counter)
			 {
			 	$row =1;
			 	$this->counter=TRUE;
			 }
			else
			 {$row=$sheet->getHighestRow()+1;}
			$dataRow=array_values($dataRow);
			$sheet->fromArray($dataRow, null, $letters[$col].$row,TRUE);
			
		}
		return $sheet;
	}
	function excelWriter(&$excel,$filename,$mode)
	{
		$this->fileName($filename,$mode);

		if($mode=='O')
		{
			$sheet_writer = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="'.$filename);
			header('Cache-Control: max-age=0');
			$sheet_writer->save('php://output');
			
		}
		else
		{	
			if(($this->config_excel['file_path']!='')&& (!file_exists($this->config_excel['file_path'])))
			{
				mkdir($this->config_excel['file_path'], 0777, true);
				
			}
			$sheet_writer = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
			$sheet_writer->save($filename);
			return $filename;		 
		}
	}
	function fileName(&$filename,$mode)
	{

		$dir=$this->getDir($filename);
		$file=basename($filename);
		
		$file=$this->str_lreplace('.xlsx', '', $file);
		if($this->config_excel['f_prepend']!=false)
		{
			$file =date($this->config_excel['f_prepend']['format']).$file;
		}
		if($this->config_excel['f_append']!=false)
		{
			$file =$file.date($this->config_excel['f_append']['format']);
		}
		$pos = strrpos($file, '.xlsx');
		if($pos==FALSE)
		{
			$file.='.xlsx';
		}
		if($mode=='F')
		{
			$file=$dir.'/'.$file;
			if(file_exists($file ))
			{
				$filename=$this->str_lreplace('.xlsx','',$file);
				$filename.=date('dmYGis').'.xlsx';
			}
			else
			{
				$filename=$file;
			}
		}
		else
		{
			 $filename=$file;
		}
		
	}
	function getDir(&$filename)
	{
		$dir=dirname($filename);
		if(!file_exists($dir))
		{
			mkdir( $dir,0755, true);
		}
		if($dir=='.')
		{
			$dir=$this->config_excel['file_path'];
			if(!file_exists($dir))
			{
				mkdir( $dir,0755, true);
			}
			else
			{
				chmod( $dir,0755);
			}
		}
		return $dir;
	}

	function autoSize(&$sheet)
	{
		$max_range=$sheet->getHighestColumn();
		foreach(range('A',$max_range) as $columnID)
		{
		    $sheet->getColumnDimension($columnID)->setAutoSize(true);
		}
	}
	function wordWrap(&$sheet)
	{
		$max_column=$sheet->getHighestColumn();
		$max_height=$sheet->getHighestRow();
		$letters = range('A','Z');
		$range=$letters[0].'1:'.$max_column.$max_height;
		$sheet->getStyle($range)->getAlignment()->setWrapText(true);
	}
	function allCellFormat(&$sheet,$style)
	{
		if(is_array($style))
		{
			$range=$sheet->calculateWorksheetDimension();
			$this->applyStyle($sheet,$style,$range);
		}
	}
	function applyStyle(&$sheet,$style,$range)
	{
		if(is_array($style) && isset($range))
		{
			$sheet->getStyle($range)->applyFromArray($style);
		}
	}
	function styleArray($style)
	{
		if(is_array($style))
		{
			$formating=array();
			foreach ($style as $key=>$attr) 
			{
				switch ($attr) {
					case 'bold':
						$formating['font']['bold']=TRUE;
						break;
	                case 'italic':
	                	$formating['font']['italic']=TRUE;
	                	break;
	                case 'superScript':
	                	$formating['font']['superScript']=TRUE;
	                	break;
	                case 'subScript':
	                	$formating['font']['subScript']=TRUE;
	                	break;
	                case 'underline':
	                	$formating['font']['underline']=TRUE;
	                	break;
	                case 'strike':
	                	$formating['font']['strike']=TRUE;
	                	break;
				
					default:
						switch ($key)
						{
							case 'font':
								$formating['font']['name']=$attr;
							break;
							case 'border':
								$this->getBorder($formating,$attr);
							break;
							case 'numberformat':
							break;
							case 'size':
		                		$formating['font']['size']=$attr;
		                	break;
		                	case 'color':
		                		$formating['font']['color']['rgb']=$attr;
		                	break;
		                	case'background':
		                		$this->backgroundColor($formating,$attr);
		                	break;						
						}
						break;
				}
			}
			return $formating;
		}
		else
		{
			return FALSE;
		}

	}
	function getBorder(&$formating,$border)
	{
		if(is_array($border))
		{
			foreach ($border as $key => $value) 
			{
				$types=explode(' ', $value);
				if(is_array($types) && count($types)==2)
				{
					switch ($key) {
						case 'all':
							$formating['borders']['allborders']=array('style'=>$this->borderContant($types[0]),'color'=>array('rgb'=>$types[1]));
							break;
						case 'top':
			                $formating['borders']['top' ]= array('style'=>$types[0],'color'=>array('rgb'=>$types[1]));
							break;				
						case 'right':
							$formating['borders']['right']= array('style'=>$types[0],'color'=>array('rgb'=>$types[1]));
							break;				
						case 'bottom':
							 $formating['borders']['bottom']= array('style'=>$types[0],'color'=>array('rgb'=>$types[1]));
							break;					
						case 'left':
							$formating['borders']['left']= array('style'=>$types[0],'color'=>array('rgb'=>$types[1]));
							break;
						default:
							break;
					}
				}
			}
		}	
	}
	function borderContant($borderStyle)
	{
		switch ($borderStyle) 
		{
			case 'dashDot':
               return  PHPExcel_Style_Border::BORDER_DASHDOT;
                break;
            case 'dashDotDot':
                return PHPExcel_Style_Border::BORDER_DASHDOTDOT ;
                break;                
            case 'dashed':
                return PHPExcel_Style_Border::BORDER_DASHED;
                break;                
            case 'dotted':
                return PHPExcel_Style_Border::BORDER_DOTTED;
                break;                
            case 'double':
                return PHPExcel_Style_Border::BORDER_DOUBLE;
                break;                
            case 'hair':
                return PHPExcel_Style_Border::BORDER_HAIR;
                break;                
            case 'medium':
                return PHPExcel_Style_Border::BORDER_MEDIUM;
                break;                
            case 'mediumDashDot':
                return PHPExcel_Style_Border::BORDER_MEDIUMDASHDOT;
                break;                
            case 'mediumDashDotDot':
                return PHPExcel_Style_Border::BORDER_MEDIUMDASHDOTDOT;
                break;                
            case 'mediumDashed':
                return PHPExcel_Style_Border::BORDER_MEDIUMDASHED;
                break;                
            case 'slantDashDot':
                return PHPExcel_Style_Border::BORDER_SLANTDASHDOT;
                break;                
            case 'thick':
                return PHPExcel_Style_Border::BORDER_THICK;
                break;                
            case 'thin':
                return PHPExcel_Style_Border::BORDER_THIN;
                break; 
            default:
				return PHPExcel_Style_Border::BORDER_NONE;
				break;    

			}
	}
	function backgroundColor(&$formating,$bgcolor)
	{
		$fill_style=explode(' ', trim($bgcolor));
		if(is_array($fill_style))
		{
			$type=$this->getBackground($fill_style[0]);
			$formating['fill']=array(
									'type'=>$type,
									'color'=>array(
													'rgb'=>$fill_style[1]
													)
									);
		}

	}	
	function getBackground($fill_type)
	{
		switch($fill_type)
		{
				case 'solid':		            
		        	return PHPExcel_Style_Fill::FILL_SOLID;
		        break;
				case 'linear':                    
		        	return PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR;
		        break;
				case 'path':                    
		        	return PHPExcel_Style_Fill::FILL_GRADIENT_PATH;
		        break;
				case 'darkDown':                    
		        	return PHPExcel_Style_Fill::FILL_PATTERN_DARKDOWN;
		        break;
				case 'darkGray':                    
		        	return PHPExcel_Style_Fill::FILL_PATTERN_DARKGRAY;
		        break;
				case 'darkGrid':                    
		        	return PHPExcel_Style_Fill::FILL_PATTERN_DARKGRID;
		        break;
				case 'darkHorizontal':                    
		        	return PHPExcel_Style_Fill::FILL_PATTERN_DARKHORIZONTAL;
		        break;
				case'darkTrellis':                    
		        	return PHPExcel_Style_Fill::FILL_PATTERN_DARKTRELLIS;
		        break;
				case'darkUp':                    
		        	return PHPExcel_Style_Fill::FILL_PATTERN_DARKUP;
		        break;
				case'darkVertical':                    
		        	return PHPExcel_Style_Fill::FILL_PATTERN_DARKVERTICAL;
		        break;
				case'gray0625':                    
		        	return PHPExcel_Style_Fill::FILL_PATTERN_GRAY0625;
		        break;
				case'gray125':                    
		        	return PHPExcel_Style_Fill::FILL_PATTERN_GRAY125;
		        break;
				case 'lightDown':                    
		        	return PHPExcel_Style_Fill::FILL_PATTERN_LIGHTDOWN;
		        break;
				case 'lightGray':                    
		        	return PHPExcel_Style_Fill::FILL_PATTERN_LIGHTGRAY;
		        break;
				case 'lightGrid':                    
		        	return PHPExcel_Style_Fill::FILL_PATTERN_LIGHTGRID;
		        break;
				case'lightHorizontal':                    
		        	return PHPExcel_Style_Fill::FILL_PATTERN_LIGHTHORIZONTAL;
		        break;
				case 'lightTrellis':                    
		        	return PHPExcel_Style_Fill::FILL_PATTERN_LIGHTTRELLIS;
		        break;
				case'lightUp':                    
		        	return PHPExcel_Style_Fill::FILL_PATTERN_LIGHTUP;
		        break;
				case'lightVertical':                    
		        	return PHPExcel_Style_Fill::FILL_PATTERN_LIGHTVERTICAL;
		        break;
				case'mediumGray':                    
		        	return PHPExcel_Style_Fill::FILL_PATTERN_MEDIUMGRAY;
		        break;
		        default:		
		        	return PHPExcel_Style_Fill::FILL_NONE;
		        break;
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
}