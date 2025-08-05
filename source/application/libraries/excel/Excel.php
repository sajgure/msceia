<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH."/third_party/PHPExcel.php"; 

class Excel extends PHPExcel { 
    public function __construct() { 
        parent::__construct(); 
    } 

    function generate_report($report)
    {
    	$CI =& get_instance(); 
    	/*date_default_timezone_set('Asia/kolkata');*/
    	$CI->load->library('excel');
    	PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );
		// Set document properties
		$CI->excel->getProperties()->setCreator("ITwizz Pvt. Ltd")
							 	   ->setLastModifiedBy("ITwizz Pvt. Ltd")
							 	   ->setTitle("Exam Fee Report")
							 	   ->setSubject("Exam Fee Report")
							 	   ->setDescription("System Generated File.")
							 	   ->setKeywords("office 2007")
							 	   ->setCategory("Confidential");

		$allborders = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN, ), ), );


		//activate worksheet number 1
		$CI->excel->setActiveSheetIndex(0);
		$CI->excel->getActiveSheet()->getStyle("A1:I3")->getAlignment()->setWrapText(true);
		$CI->excel->getActiveSheet()->setTitle('Exam Fee Report');
		$CI->excel->getActiveSheet()->mergeCells('A1:I1') ->getStyle() ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('EEEEEEEE');
		$CI->excel->getActiveSheet()->getStyle('A1:I1')->applyFromArray($allborders);
		$CI->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$CI->excel->getActiveSheet()->setCellValue('A2', 'Exam Fee Report');
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setName('Bookman Old Style');
        $CI->excel->getActiveSheet()->getRowDimension('2')->setRowHeight(40);
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
		$CI->excel->getActiveSheet()->mergeCells('A2:I2') ->getStyle() ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('EEEEEEEE');
		$CI->excel->getActiveSheet()->getStyle('A2:I3')->applyFromArray($allborders);	
		$CI->excel->getActiveSheet()->getStyle('A2:I3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		
 		$CI->excel->getActiveSheet()->setCellValue('A3', 'Sr. No.');
		$CI->excel->getActiveSheet()->setCellValue('B3', 'Institute Name');		
		$CI->excel->getActiveSheet()->setCellValue('C3', 'Institute Code');
		$CI->excel->getActiveSheet()->setCellValue('D3', 'Depositer Name');	
		$CI->excel->getActiveSheet()->setCellValue('E3', 'Deposite Date');
		$CI->excel->getActiveSheet()->setCellValue('F3', 'Total Student');
		$CI->excel->getActiveSheet()->setCellValue('G3', 'Total Amount');
		$CI->excel->getActiveSheet()->setCellValue('H3', 'Payment Mode');
		$CI->excel->getActiveSheet()->setCellValue('I3', 'UTR/DD/Transaction Number');

		 

		$CI->excel->getActiveSheet()->getRowDimension('3')->setRowHeight(40);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(1)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(2)->setWidth(40);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(3)->setWidth(40);							
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(4)->setWidth(20);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(5)->setWidth(40);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(6)->setWidth(40);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(7)->setWidth(40);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(8)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(9)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(10)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(11)->setWidth(60);
		$CI->excel->getActiveSheet()->getStyle('A3:I3')->getFont()->setName('Bookman Old Style');
		$CI->excel->getActiveSheet()->getStyle('A3:I3')->getFont()->setSize(10);
		$CI->excel->getActiveSheet()->getStyle('A2:I3')->getFont()->setBold(true);															
		$CI->excel->getActiveSheet()->getStyle('A3:I3')->getFont()->getColor()->setRGB('FFFFFFFF');
		$CI->excel->getActiveSheet()->getStyle('A3:I3') ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('FF428bca');
		$CI->excel->getActiveSheet()->getStyle('A3:I3')->applyFromArray($allborders);
		$CI->excel->getActiveSheet()->getStyle('A3:I3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

		if(isset($report) && !empty($report))
		{
			$i=3;			
			$sr=0;
			foreach ($report as $key ) 
			{
				$sr++;
				$i++;
				$CI->excel->getActiveSheet()->setCellValue('A'.$i, $sr);
				$CI->excel->getActiveSheet()->setCellValue('B'.$i, $key->institute_name);
				$CI->excel->getActiveSheet()->setCellValue('C'.$i, $key->institute_code);
				$CI->excel->getActiveSheet()->setCellValue('D'.$i, $key->depositer_name);		
				$CI->excel->getActiveSheet()->setCellValue('E'.$i, date('d-m-Y',strtotime($key->deposite_date)));
				 
				$CI->excel->getActiveSheet()->setCellValue('F'.$i, $key->total_student);
				$CI->excel->getActiveSheet()->setCellValue('G'.$i, $key->total_amount);
				$CI->excel->getActiveSheet()->setCellValue('H'.$i, $key->payment_mode);
				//$CI->excel->getActiveSheet()->setCellValue('I'.$i, $key->transaction_no);
				if(isset($key->dd_number) && !empty($key->dd_number))
				{ 
					$CI->excel->getActiveSheet()->setCellValue('I'.$i, $key->dd_number);
				} 
				else if(isset($key->utr_number) && !empty($key->utr_number)) 
				{ 
					$CI->excel->getActiveSheet()->setCellValue('I'.$i, $key->utr_number);
				}
				else
				{
					$CI->excel->getActiveSheet()->setCellValue('I'.$i, $key->transaction_no);
				}

				$CI->excel->getActiveSheet()->getStyle('A'.$i.':I'.$i)->applyFromArray($allborders);				
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':I'.$i)->getFont()->setName('Bookman Old Style');
		        $CI->excel->getActiveSheet()->getStyle('A'.$i.':I'.$i)->getFont()->setSize(10);
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':I'.$i)->applyFromArray($allborders);							
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':I'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER) ->setWrapText(true);
			}
		}

		//$filename='due_date.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="Fee_Report.xls"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache

		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		             
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($CI->excel, 'Excel5');  
		//force user to download the Excel file without writing it to server's HD
		//$objWriter->save(str_replace(__FILE__,'./upload/report',__FILE__));
		$objWriter->save('php://output'); 
    }

    function institute_count_excel($institute_count_data)
    {
    	$CI =& get_instance(); 
    	/*date_default_timezone_set('Asia/kolkata');*/
    	$CI->load->library('excel');
    	PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );
		// Set document properties
		$CI->excel->getProperties()->setCreator("ITwizz Pvt. Ltd")
							 	   ->setLastModifiedBy("ITwizz Pvt. Ltd")
							 	   ->setTitle("Institute Count Report")
							 	   ->setSubject("Institute Count Report")
							 	   ->setDescription("System Generated File.")
							 	   ->setKeywords("office 2007")
							 	   ->setCategory("Confidential");

		$allborders = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN, ), ), );


		//activate worksheet number 1
		$CI->excel->setActiveSheetIndex(0);
		$CI->excel->getActiveSheet()->getStyle("A1:G3")->getAlignment()->setWrapText(true);
		$CI->excel->getActiveSheet()->setTitle('Institute Count Report');
		$CI->excel->getActiveSheet()->mergeCells('A1:G1') ->getStyle() ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('EEEEEEEE');
		$CI->excel->getActiveSheet()->getStyle('A1:G1')->applyFromArray($allborders);
		$CI->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$CI->excel->getActiveSheet()->setCellValue('A2', 'Institute Count Report');
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setName('Bookman Old Style');
        $CI->excel->getActiveSheet()->getRowDimension('2')->setRowHeight(40);
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
		$CI->excel->getActiveSheet()->mergeCells('A2:G2') ->getStyle() ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('EEEEEEEE');
		$CI->excel->getActiveSheet()->getStyle('A2:G3')->applyFromArray($allborders);	
		$CI->excel->getActiveSheet()->getStyle('A2:G3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		
 		$CI->excel->getActiveSheet()->setCellValue('A3', 'Sr. No.');
		$CI->excel->getActiveSheet()->setCellValue('B3', 'Owner Name');		
		$CI->excel->getActiveSheet()->setCellValue('C3', 'Institute Name');
		$CI->excel->getActiveSheet()->setCellValue('D3', 'Email Id/Mobile No');	
		$CI->excel->getActiveSheet()->setCellValue('E3', 'District/Taluka');
		$CI->excel->getActiveSheet()->setCellValue('F3', 'Address');
		$CI->excel->getActiveSheet()->setCellValue('G3', 'Paid Student');

		 

		$CI->excel->getActiveSheet()->getRowDimension('3')->setRowHeight(40);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(1)->setWidth(30);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(2)->setWidth(40);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(3)->setWidth(30);							
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(4)->setWidth(30);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(5)->setWidth(40);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(6)->setWidth(30);
		$CI->excel->getActiveSheet()->getStyle('A3:G3')->getFont()->setName('Bookman Old Style');
		$CI->excel->getActiveSheet()->getStyle('A3:G3')->getFont()->setSize(10);
		$CI->excel->getActiveSheet()->getStyle('A2:G3')->getFont()->setBold(true);															
		$CI->excel->getActiveSheet()->getStyle('A3:G3')->getFont()->getColor()->setRGB('FFFFFFFF');
		$CI->excel->getActiveSheet()->getStyle('A3:G3') ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('FF428bca');
		$CI->excel->getActiveSheet()->getStyle('A3:G3')->applyFromArray($allborders);
		$CI->excel->getActiveSheet()->getStyle('A3:G3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

		if(isset($institute_count_data) && !empty($institute_count_data))
		{
			$i=3;			
			$sr=0;
			foreach ($institute_count_data as $key ) 
			{
				$sr++;
				$i++;
				$CI->excel->getActiveSheet()->setCellValue('A'.$i, $sr);
				$CI->excel->getActiveSheet()->setCellValue('B'.$i, ((isset($key->institute_owner_name) && !empty($key->institute_owner_name))?$key->institute_owner_name:''));
				$CI->excel->getActiveSheet()->setCellValue('C'.$i, ((isset($key->institute_name) && !empty($key->institute_name))?$key->institute_name:"").'/'.((isset($key->institute_code) && !empty($key->institute_code))?$key->institute_code:''));
				$CI->excel->getActiveSheet()->setCellValue('D'.$i,((isset($key->institute_mail) && !empty($key->institute_mail))?$key->institute_mail:'').'/'.((isset($key->institute_contact) && !empty($key->institute_contact))?$key->institute_contact:''));		
				$CI->excel->getActiveSheet()->setCellValue('E'.$i, ((isset($key->district_name) && !empty($key->district_name))?$key->district_name:'').'/'.((isset($key->institute_taluka) && !empty($key->institute_taluka))?$key->institute_taluka:''));
				 
				$CI->excel->getActiveSheet()->setCellValue('F'.$i, ((isset($key->institute_address) && !empty($key->institute_address))?$key->institute_address:''));
				$CI->excel->getActiveSheet()->setCellValue('G'.$i, ((isset($key->paid_student) && !empty($key->paid_student))?$key->paid_student:'0'));
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':G'.$i)->applyFromArray($allborders);				
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':G'.$i)->getFont()->setName('Bookman Old Style');
		        $CI->excel->getActiveSheet()->getStyle('A'.$i.':G'.$i)->getFont()->setSize(10);
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':G'.$i)->applyFromArray($allborders);							
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':G'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER) ->setWrapText(true);
			}
		}

		//$filename='due_date.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="institute_count_report.xls"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache

		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		             
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($CI->excel, 'Excel5');  
		//force user to download the Excel file without writing it to server's HD
		//$objWriter->save(str_replace(__FILE__,'./upload/report',__FILE__));
		$objWriter->save('php://output'); 
    }
    function institute_excel($instCountData)
    {
    	$CI =& get_instance(); 
    	/*date_default_timezone_set('Asia/kolkata');*/
    	$CI->load->library('excel');
    	PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );
		// Set document properties
		$CI->excel->getProperties()->setCreator("ITwizz Pvt. Ltd")
							 	   ->setLastModifiedBy("ITwizz Pvt. Ltd")
							 	   ->setTitle("Exam Fee Report")
							 	   ->setSubject("Exam Fee Report")
							 	   ->setDescription("System Generated File.")
							 	   ->setKeywords("office 2007")
							 	   ->setCategory("Confidential");

		$allborders = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN, ), ), );


		//activate worksheet number 1
		$CI->excel->setActiveSheetIndex(0);
		$CI->excel->getActiveSheet()->getStyle("A1:J3")->getAlignment()->setWrapText(true);
		$CI->excel->getActiveSheet()->setTitle('Exam Fee Report');
		$CI->excel->getActiveSheet()->mergeCells('A1:J1') ->getStyle() ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('EEEEEEEE');
		$CI->excel->getActiveSheet()->getStyle('A1:J1')->applyFromArray($allborders);
		$CI->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$CI->excel->getActiveSheet()->setCellValue('A2', 'Institute List Report');
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setName('Bookman Old Style');
        $CI->excel->getActiveSheet()->getRowDimension('2')->setRowHeight(40);
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
		$CI->excel->getActiveSheet()->mergeCells('A2:J2') ->getStyle() ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('EEEEEEEE');
		$CI->excel->getActiveSheet()->getStyle('A2:J3')->applyFromArray($allborders);	
		$CI->excel->getActiveSheet()->getStyle('A2:J3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		
 		$CI->excel->getActiveSheet()->setCellValue('A3', 'Sr. No.');
		$CI->excel->getActiveSheet()->setCellValue('B3', 'Institute Name');		
		$CI->excel->getActiveSheet()->setCellValue('C3', 'Institute Code');		
		$CI->excel->getActiveSheet()->setCellValue('D3', 'EmailID');
		$CI->excel->getActiveSheet()->setCellValue('E3', 'Mobile');	
		$CI->excel->getActiveSheet()->setCellValue('F3', 'District Name');
		$CI->excel->getActiveSheet()->setCellValue('G3', 'Taluka');
		$CI->excel->getActiveSheet()->setCellValue('H3', 'User Name');
		$CI->excel->getActiveSheet()->setCellValue('I3', 'Password');
		$CI->excel->getActiveSheet()->setCellValue('J3', 'Institute Status');

		 

		$CI->excel->getActiveSheet()->getRowDimension('3')->setRowHeight(40);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(1)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(2)->setWidth(40);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(3)->setWidth(40);							
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(4)->setWidth(20);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(5)->setWidth(40);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(6)->setWidth(40);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(7)->setWidth(40);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(8)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(9)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(10)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(11)->setWidth(60);
		$CI->excel->getActiveSheet()->getStyle('A3:J3')->getFont()->setName('Bookman Old Style');
		$CI->excel->getActiveSheet()->getStyle('A3:J3')->getFont()->setSize(10);
		$CI->excel->getActiveSheet()->getStyle('A2:J3')->getFont()->setBold(true);															
		$CI->excel->getActiveSheet()->getStyle('A3:J3')->getFont()->getColor()->setRGB('FFFFFFFF');
		$CI->excel->getActiveSheet()->getStyle('A3:J3') ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('FF428bca');
		$CI->excel->getActiveSheet()->getStyle('A3:J3')->applyFromArray($allborders);
		$CI->excel->getActiveSheet()->getStyle('A3:J3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

		if(isset($instCountData) && !empty($instCountData))
		{
			$i=3;			
			$sr=0;
			foreach ($instCountData as $key ) 
			{
				$sr++;
				$i++;
				$CI->excel->getActiveSheet()->setCellValue('A'.$i, $sr);
				$CI->excel->getActiveSheet()->setCellValue('B'.$i, $key->institute_name);
				$CI->excel->getActiveSheet()->setCellValue('C'.$i, $key->institute_code);
				$CI->excel->getActiveSheet()->setCellValue('D'.$i, $key->institute_mail);
				$CI->excel->getActiveSheet()->setCellValue('E'.$i, $key->institute_contact);		
				$CI->excel->getActiveSheet()->setCellValue('F'.$i, $key->district_name);
				$CI->excel->getActiveSheet()->setCellValue('G'.$i, $key->institute_taluka);
				$CI->excel->getActiveSheet()->setCellValue('H'.$i, $key->institute_code);
				$CI->excel->getActiveSheet()->setCellValue('I'.$i, $key->institute_password);
				$CI->excel->getActiveSheet()->setCellValue('J'.$i, $key->institute_status);
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':J'.$i)->applyFromArray($allborders);				
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':J'.$i)->getFont()->setName('Bookman Old Style');
		        $CI->excel->getActiveSheet()->getStyle('A'.$i.':J'.$i)->getFont()->setSize(10);
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':J'.$i)->applyFromArray($allborders);							
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':J'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER) ->setWrapText(true);
			}
		}

		//$filename='due_date.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="Institute_list.xls"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache

		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		             
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($CI->excel, 'Excel5');  
		//force user to download the Excel file without writing it to server's HD
		//$objWriter->save(str_replace(__FILE__,'./upload/report',__FILE__));
		$objWriter->save('php://output'); 
    }

    function print_payment_excel($payment_data)
    {
    	$CI =& get_instance(); 
    	/*date_default_timezone_set('Asia/kolkata');*/
    	$CI->load->library('excel');
    	PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );
		// Set document properties
		$CI->excel->getProperties()->setCreator("ITwizz Pvt. Ltd")
							 	   ->setLastModifiedBy("ITwizz Pvt. Ltd")
							 	   ->setTitle("Payment Report")
							 	   ->setSubject("Payment Report")
							 	   ->setDescription("System Generated File.")
							 	   ->setKeywords("office 2007")
							 	   ->setCategory("Confidential");

		$allborders = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN, ), ), );


		//activate worksheet number 1
		$CI->excel->setActiveSheetIndex(0);
		$CI->excel->getActiveSheet()->getStyle("A1:H3")->getAlignment()->setWrapText(true);
		$CI->excel->getActiveSheet()->setTitle('Payment Report');
		$CI->excel->getActiveSheet()->mergeCells('A1:H1') ->getStyle() ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('EEEEEEEE');
		$CI->excel->getActiveSheet()->getStyle('A1:H1')->applyFromArray($allborders);
		$CI->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$CI->excel->getActiveSheet()->setCellValue('A2', 'Payment Report');
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setName('Bookman Old Style');
        $CI->excel->getActiveSheet()->getRowDimension('2')->setRowHeight(40);
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
		$CI->excel->getActiveSheet()->mergeCells('A2:H2') ->getStyle() ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('EEEEEEEE');
		$CI->excel->getActiveSheet()->getStyle('A2:H3')->applyFromArray($allborders);	
		$CI->excel->getActiveSheet()->getStyle('A2:H3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		
 		$CI->excel->getActiveSheet()->setCellValue('A3', 'Sr. No.');
		$CI->excel->getActiveSheet()->setCellValue('B3', 'Order_id');		
		$CI->excel->getActiveSheet()->setCellValue('C3', 'Institute Name');
		$CI->excel->getActiveSheet()->setCellValue('D3', 'Institute Code');	
		$CI->excel->getActiveSheet()->setCellValue('E3', 'Order Date');	
		$CI->excel->getActiveSheet()->setCellValue('F3', 'Order Amount');
		$CI->excel->getActiveSheet()->setCellValue('G3', 'Order Status');
		$CI->excel->getActiveSheet()->setCellValue('H3', 'Payment Status');
		 

		$CI->excel->getActiveSheet()->getRowDimension('3')->setRowHeight(40);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(1)->setWidth(40);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(2)->setWidth(20);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(3)->setWidth(20);							
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(4)->setWidth(20);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(5)->setWidth(20);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(6)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(7)->setWidth(20);
		$CI->excel->getActiveSheet()->getStyle('A3:H3')->getFont()->setName('Bookman Old Style');
		$CI->excel->getActiveSheet()->getStyle('A3:H3')->getFont()->setSize(10);
		$CI->excel->getActiveSheet()->getStyle('A2:H3')->getFont()->setBold(true);															
		$CI->excel->getActiveSheet()->getStyle('A3:H3')->getFont()->getColor()->setRGB('FFFFFFFF');
		$CI->excel->getActiveSheet()->getStyle('A3:H3') ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('FF428bca');
		$CI->excel->getActiveSheet()->getStyle('A3:H3')->applyFromArray($allborders);
		$CI->excel->getActiveSheet()->getStyle('A3:H3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

		if(isset($payment_data) && !empty($payment_data))
		{
			$i=3;			
			$sr=0;
			foreach ($payment_data as $key ) 
			{
				$sr++;
				$i++;
				$CI->excel->getActiveSheet()->setCellValue('A'.$i, $sr);
				$CI->excel->getActiveSheet()->setCellValue('B'.$i, str_pad($key->order_id, 6,'0',STR_PAD_LEFT));
				$CI->excel->getActiveSheet()->setCellValue('C'.$i, (isset($key->institute_name) && !empty($key->institute_name))?$key->institute_name:'');
				$CI->excel->getActiveSheet()->setCellValue('D'.$i, (isset($key->institute_code) && !empty($key->institute_code))?$key->institute_code:'' );		
				$CI->excel->getActiveSheet()->setCellValue('E'.$i, (isset($key->inserted_on) && !empty($key->inserted_on))?$key->inserted_on:'');		
				$CI->excel->getActiveSheet()->setCellValue('F'.$i, (isset($key->order_price) && !empty($key->order_price))?$key->order_price:'' );
				$CI->excel->getActiveSheet()->setCellValue('G'.$i, (isset($key->order_status) && !empty($key->order_status))?$key->order_status:'');
				$CI->excel->getActiveSheet()->setCellValue('H'.$i, (isset($key->payment_status) && !empty($key->payment_status))?$key->payment_status:'');

				$CI->excel->getActiveSheet()->getStyle('A'.$i.':H'.$i)->applyFromArray($allborders);				
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':H'.$i)->getFont()->setName('Bookman Old Style');
		        $CI->excel->getActiveSheet()->getStyle('A'.$i.':H'.$i)->getFont()->setSize(10);
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':H'.$i)->applyFromArray($allborders);							
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':H'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER) ->setWrapText(true);
			}
		}

		//$filename='due_date.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="payment_report.xls"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache

		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		             
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($CI->excel, 'Excel5');  
		//force user to download the Excel file without writing it to server's HD
		//$objWriter->save(str_replace(__FILE__,'./upload/report',__FILE__));
		$objWriter->save('php://output'); 
    }

    function district_view_excel($district_wise_data)
    {
    	
    	$district=$district_wise_data[0]->district_name;
    	$CI =& get_instance(); 
    	$CI->load->library('excel');
    	PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );
		$CI->excel->getProperties()->setCreator("ITwizz Pvt. Ltd")
							 	   ->setLastModifiedBy("ITwizz Pvt. Ltd")
							 	   ->setTitle($district." Book Report")
							 	   ->setSubject($district." Book Report")
							 	   ->setDescription("System Generated File.")
							 	   ->setKeywords("office 2007")
							 	   ->setCategory("Confidential");
		$allborders = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN, ), ), );
		$CI->excel->setActiveSheetIndex(0);
		$CI->excel->getActiveSheet()->getStyle("A1:C3")->getAlignment()->setWrapText(true);
		$CI->excel->getActiveSheet()->setTitle($district.' Book Report');
		$CI->excel->getActiveSheet()->mergeCells('A1:C1') ->getStyle() ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('EEEEEEEE');
		$CI->excel->getActiveSheet()->getStyle('A1:C1')->applyFromArray($allborders);
		$CI->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$CI->excel->getActiveSheet()->setCellValue('A2', $district.' Book Report');
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setName('Bookman Old Style');
        $CI->excel->getActiveSheet()->getRowDimension('2')->setRowHeight(40);
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
		$CI->excel->getActiveSheet()->mergeCells('A2:C2') ->getStyle() ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('EEEEEEEE');
		$CI->excel->getActiveSheet()->getStyle('A2:C3')->applyFromArray($allborders);	
		$CI->excel->getActiveSheet()->getStyle('A2:C3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		
 		$CI->excel->getActiveSheet()->setCellValue('A3', 'Sr. No.');
		$CI->excel->getActiveSheet()->setCellValue('B3', 'Product Name');		
		$CI->excel->getActiveSheet()->setCellValue('C3', 'Quantity');	 

		$CI->excel->getActiveSheet()->getRowDimension('3')->setRowHeight(40);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(1)->setWidth(40);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(2)->setWidth(20);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(3)->setWidth(20);							
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(4)->setWidth(20);	
		$CI->excel->getActiveSheet()->getStyle('A3:C3')->getFont()->setName('Bookman Old Style');
		$CI->excel->getActiveSheet()->getStyle('A3:C3')->getFont()->setSize(10);
		$CI->excel->getActiveSheet()->getStyle('A2:H3')->getFont()->setBold(true);															
		$CI->excel->getActiveSheet()->getStyle('A3:C3')->getFont()->getColor()->setRGB('FFFFFFFF');
		$CI->excel->getActiveSheet()->getStyle('A3:C3') ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('FF428bca');
		$CI->excel->getActiveSheet()->getStyle('A3:C3')->applyFromArray($allborders);
		$CI->excel->getActiveSheet()->getStyle('A3:C3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

		if(isset($district_wise_data) && !empty($district_wise_data))
		{
			$i=3;			
			$sr=0;
			$total=0;
			foreach ($district_wise_data as $key ) 
			{
				$sr++;
				$i++;
				$total=$total+$key->qty;
				$CI->excel->getActiveSheet()->setCellValue('A'.$i, $sr);
				$CI->excel->getActiveSheet()->setCellValue('B'.$i, (isset($key->product_desc) && !empty($key->product_desc))?$key->product_desc:'');
				$CI->excel->getActiveSheet()->setCellValue('C'.$i, (isset($key->qty) && !empty($key->qty))?$key->qty:'');
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':C'.$i)->applyFromArray($allborders);				
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':C'.$i)->getFont()->setName('Bookman Old Style');
		        $CI->excel->getActiveSheet()->getStyle('A'.$i.':C'.$i)->getFont()->setSize(10);
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':C'.$i)->applyFromArray($allborders);							
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':C'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER) ->setWrapText(true);
			}
			$i++;
			$CI->excel->getActiveSheet()->setCellValue('A'.$i, '');
			$CI->excel->getActiveSheet()->setCellValue('B'.$i, 'total');
			$CI->excel->getActiveSheet()->setCellValue('C'.$i, (isset($total) && !empty($total))?$total:'');
			$CI->excel->getActiveSheet()->getStyle('A'.$i.':C'.$i)->applyFromArray($allborders);				
			$CI->excel->getActiveSheet()->getStyle('A'.$i.':C'.$i)->getFont()->setName('Bookman Old Style');
	        $CI->excel->getActiveSheet()->getStyle('A'.$i.':C'.$i)->getFont()->setSize(10);
			$CI->excel->getActiveSheet()->getStyle('A'.$i.':C'.$i)->applyFromArray($allborders);							
			$CI->excel->getActiveSheet()->getStyle('A'.$i.':C'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER) ->setWrapText(true);
		}
		header('Content-Type: application/vnd.ms-excel'); 
		header('Content-Disposition: attachment;filename="district_wise_report.xls"'); 
		header('Cache-Control: max-age=0'); 
		header('Cache-Control: max-age=1');
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
		header ('Cache-Control: cache, must-revalidate'); 
		header ('Pragma: public'); 
		$objWriter = PHPExcel_IOFactory::createWriter($CI->excel, 'Excel5');
		$objWriter->save('php://output'); 
    }
    function district_details_report_ex($district_details_data)
    {
    	$district=$district_details_data[0]->district_name;
    	$CI =& get_instance(); 
    	/*date_default_timezone_set('Asia/kolkata');*/
    	$CI->load->library('excel');
    	PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );
		// Set document properties
		$CI->excel->getProperties()->setCreator("ITwizz Pvt. Ltd")
							 	   ->setLastModifiedBy("ITwizz Pvt. Ltd")
							 	   ->setTitle($district."District Report")
							 	   ->setSubject($district."District Report")
							 	   ->setDescription("System Generated File.")
							 	   ->setKeywords("office 2007")
							 	   ->setCategory("Confidential");

		$allborders = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN, ), ), );


		//activate worksheet number 1
		$CI->excel->setActiveSheetIndex(0);
		$CI->excel->getActiveSheet()->getStyle("A1:I3")->getAlignment()->setWrapText(true);
		$CI->excel->getActiveSheet()->setTitle($district.'District Report');
		$CI->excel->getActiveSheet()->mergeCells('A1:I1') ->getStyle() ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('EEEEEEEE');
		$CI->excel->getActiveSheet()->getStyle('A1:I1')->applyFromArray($allborders);
		$CI->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$CI->excel->getActiveSheet()->setCellValue('A2', $district.'District Report');
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setName('Bookman Old Style');
        $CI->excel->getActiveSheet()->getRowDimension('2')->setRowHeight(40);
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
		$CI->excel->getActiveSheet()->mergeCells('A2:I2') ->getStyle() ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('EEEEEEEE');
		$CI->excel->getActiveSheet()->getStyle('A2:I3')->applyFromArray($allborders);	
		$CI->excel->getActiveSheet()->getStyle('A2:I3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		
 		$CI->excel->getActiveSheet()->setCellValue('A3', 'Sr. No.');
		$CI->excel->getActiveSheet()->setCellValue('B3', 'Order_id');		
		$CI->excel->getActiveSheet()->setCellValue('C3', 'order date');
		$CI->excel->getActiveSheet()->setCellValue('D3', 'Customer');	
		$CI->excel->getActiveSheet()->setCellValue('E3', 'Amount');	
		$CI->excel->getActiveSheet()->setCellValue('F3', 'Product');
		$CI->excel->getActiveSheet()->setCellValue('G3', 'Quantity');
		$CI->excel->getActiveSheet()->setCellValue('H3', 'Total Qty');
		$CI->excel->getActiveSheet()->setCellValue('I3', 'Status');
		 

		$CI->excel->getActiveSheet()->getRowDimension('3')->setRowHeight(40);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(1)->setWidth(40);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(2)->setWidth(20);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(3)->setWidth(20);							
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(4)->setWidth(20);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(5)->setWidth(60);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(6)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(7)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(8)->setWidth(20);
		$CI->excel->getActiveSheet()->getStyle('A3:I3')->getFont()->setName('Bookman Old Style');
		$CI->excel->getActiveSheet()->getStyle('A3:I3')->getFont()->setSize(10);
		$CI->excel->getActiveSheet()->getStyle('A2:I3')->getFont()->setBold(true);															
		$CI->excel->getActiveSheet()->getStyle('A3:I3')->getFont()->getColor()->setRGB('FFFFFFFF');
		$CI->excel->getActiveSheet()->getStyle('A3:I3') ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('FF428bca');
		$CI->excel->getActiveSheet()->getStyle('A3:I3')->applyFromArray($allborders);
		$CI->excel->getActiveSheet()->getStyle('A3:I3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

		if(isset($district_details_data) && !empty($district_details_data))
		{
			$i=3;			
			$sr=0;
			foreach ($district_details_data as $key ) 
			{
				$quantity_data=$CI->common_model->selectAllWhr('tbl_order_details','order_id',$key->order_id); 
				$sr++;
				$i++;
				$CI->excel->getActiveSheet()->setCellValue('A'.$i, $sr);
				$CI->excel->getActiveSheet()->setCellValue('B'.$i, (isset($key->order_id) && !empty($key->order_id))?$key->order_id:'');
				$CI->excel->getActiveSheet()->setCellValue('C'.$i, (isset($key->inserted_on) && !empty($key->inserted_on))?date('d-m-Y',strtotime($key->inserted_on)):'');
				$CI->excel->getActiveSheet()->setCellValue('D'.$i, (isset($key->customer_name) && !empty($key->customer_name))?$key->customer_name:'' );
				$CI->excel->getActiveSheet()->setCellValue('E'.$i, (isset($key->order_price) && !empty($key->order_price))?$key->order_price:'');
				if(isset($quantity_data) && !empty($quantity_data))
				{ $j=0; $tbook=0;
					foreach ($quantity_data as $row ) 
					{ $j++; $tbook=$tbook+$row->product_qty;
						$CI->excel->getActiveSheet()->setCellValue('F'.$i, (isset($row->product_name) && !empty($row->product_name))?$row->product_name:'');
						$CI->excel->getActiveSheet()->setCellValue('G'.$i, (isset($row->product_qty) && !empty($row->product_qty))?$row->product_qty:'');
						$i++;
					}
					$i--;
					$m=$i-$j+1;
					$n=$i;
					$CI->excel->getActiveSheet()->setCellValue('H'.$m, $tbook);
					$CI->excel->getActiveSheet()->setCellValue('I'.$m, (isset($key->order_status) && !empty($key->order_status))?$key->order_status:'');
					$CI->excel->getActiveSheet()->mergeCells('A'.$m.':A'.$n);
					$CI->excel->getActiveSheet()->mergeCells('B'.$m.':B'.$n);
					$CI->excel->getActiveSheet()->mergeCells('C'.$m.':C'.$n);
					$CI->excel->getActiveSheet()->mergeCells('D'.$m.':D'.$n);
					$CI->excel->getActiveSheet()->mergeCells('E'.$m.':E'.$n);
					$CI->excel->getActiveSheet()->mergeCells('H'.$m.':H'.$n);
					$CI->excel->getActiveSheet()->mergeCells('I'.$m.':I'.$n);

					$CI->excel->getActiveSheet()->getStyle('A'.$m.':I'.$n)->getAlignment()->setWrapText(true);
					$CI->excel->getActiveSheet()->getStyle('A'.$m.':I'.$n)->getFont()->setName('Bookman Old Style');
			        $CI->excel->getActiveSheet()->getStyle('A'.$m.':I'.$n)->getFont()->setSize(10);
					//$CI->excel->getActiveSheet()->getStyle('A'.$i.':V'.$i)->getFont()->setBold(true);															
					$CI->excel->getActiveSheet()->getStyle('A'.$m.':I'.$n)
												->getFill()
												->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
												
					$CI->excel->getActiveSheet()->getStyle('A'.$m.':I'.$n)->applyFromArray($allborders);							
					$CI->excel->getActiveSheet()->getStyle('A'.$m.':I'.$n)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
																				->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
				}
				

				$CI->excel->getActiveSheet()->getStyle('A'.$i.':I'.$i)->applyFromArray($allborders);				
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':I'.$i)->getFont()->setName('Bookman Old Style');
		        $CI->excel->getActiveSheet()->getStyle('A'.$i.':I'.$i)->getFont()->setSize(10);
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':I'.$i)->applyFromArray($allborders);							
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':I'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER) ->setWrapText(true);
			}
		}

		//$filename='due_date.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="district_report.xls"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache

		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		             
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($CI->excel, 'Excel5');  
		//force user to download the Excel file without writing it to server's HD
		//$objWriter->save(str_replace(__FILE__,'./upload/report',__FILE__));
		$objWriter->save('php://output'); 
    }

    function all_details_institute_excel($institute_details)
    {
    	$CI =& get_instance(); 
    	/*date_default_timezone_set('Asia/kolkata');*/
    	$CI->load->library('excel');
    	PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );
		// Set document properties
		$CI->excel->getProperties()->setCreator("ITwizz Pvt. Ltd")
							 	   ->setLastModifiedBy("ITwizz Pvt. Ltd")
							 	   ->setTitle("All Institute Details Report")
							 	   ->setSubject("All Institute Details Report")
							 	   ->setDescription("System Generated File.")
							 	   ->setKeywords("office 2007")
							 	   ->setCategory("Confidential");

		$allborders = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN, ), ), );


		//activate worksheet number 1
		$CI->excel->setActiveSheetIndex(0);
		$CI->excel->getActiveSheet()->getStyle("A1:AD3")->getAlignment()->setWrapText(true);
		$CI->excel->getActiveSheet()->setTitle('All Institute Details Report');
		$CI->excel->getActiveSheet()->mergeCells('A1:AD1') ->getStyle() ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('EEEEEEEE');
		$CI->excel->getActiveSheet()->getStyle('A1:AD1')->applyFromArray($allborders);
		$CI->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$CI->excel->getActiveSheet()->setCellValue('A2', 'Institute List Report');
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setName('Bookman Old Style');
        $CI->excel->getActiveSheet()->getRowDimension('2')->setRowHeight(40);
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
		$CI->excel->getActiveSheet()->mergeCells('A2:AD2') ->getStyle() ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('EEEEEEEE');
		$CI->excel->getActiveSheet()->getStyle('A2:AD3')->applyFromArray($allborders);	
		$CI->excel->getActiveSheet()->getStyle('A2:AD3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		
 		$CI->excel->getActiveSheet()->setCellValue('A3', 'Sr. No.');
		$CI->excel->getActiveSheet()->setCellValue('B3', 'Institute Name');		
		$CI->excel->getActiveSheet()->setCellValue('C3', 'Institute Code');		
		$CI->excel->getActiveSheet()->setCellValue('D3', 'User Name');
		$CI->excel->getActiveSheet()->setCellValue('E3', 'Password');
		$CI->excel->getActiveSheet()->setCellValue('F3', 'Institute Address');
		$CI->excel->getActiveSheet()->setCellValue('G3', 'District Name');
		$CI->excel->getActiveSheet()->setCellValue('H3', 'Taluka');
		$CI->excel->getActiveSheet()->setCellValue('I3', 'Pincode');
		$CI->excel->getActiveSheet()->setCellValue('J3', 'Mobile');	
		$CI->excel->getActiveSheet()->setCellValue('K3', 'Alternate No.');	
		$CI->excel->getActiveSheet()->setCellValue('L3', 'EmailID');
		$CI->excel->getActiveSheet()->setCellValue('M3', 'Owner Name');
		$CI->excel->getActiveSheet()->setCellValue('N3', 'Owner DOB');
		$CI->excel->getActiveSheet()->setCellValue('O3', 'Owner Age');
		$CI->excel->getActiveSheet()->setCellValue('P3', 'Owner Qualification');
		$CI->excel->getActiveSheet()->setCellValue('Q3', 'Principle Name');
		$CI->excel->getActiveSheet()->setCellValue('R3', 'Principle Age');
		$CI->excel->getActiveSheet()->setCellValue('S3', 'Principle Qualification');
		$CI->excel->getActiveSheet()->setCellValue('T3', 'Institute Registration Date');
		$CI->excel->getActiveSheet()->setCellValue('U3', 'Institute Status');
		$CI->excel->getActiveSheet()->setCellValue('V3', 'DB Status');
		$CI->excel->getActiveSheet()->setCellValue('W3', 'Download Status');
		$CI->excel->getActiveSheet()->setCellValue('X3', 'Nominee Name');
		$CI->excel->getActiveSheet()->setCellValue('Y3', 'Nominee Age');
		$CI->excel->getActiveSheet()->setCellValue('Z3', 'Nominee Relation');
		$CI->excel->getActiveSheet()->setCellValue('AA3', 'Total Student');
		$CI->excel->getActiveSheet()->setCellValue('AB3', 'Paid Student');
		$CI->excel->getActiveSheet()->setCellValue('AC3', 'Appear Student');
		$CI->excel->getActiveSheet()->setCellValue('AD3', 'Not Appear Student');

		 

		$CI->excel->getActiveSheet()->getRowDimension('3')->setRowHeight(40);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(1)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(2)->setWidth(20);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(3)->setWidth(20);							
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(4)->setWidth(20);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(5)->setWidth(40);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(6)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(7)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(8)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(9)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(10)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(11)->setWidth(30);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(12)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(13)->setWidth(20);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(14)->setWidth(20);							
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(15)->setWidth(20);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(16)->setWidth(20);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(17)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(18)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(19)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(20)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(21)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(22)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(23)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(24)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(25)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(26)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(27)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(28)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(29)->setWidth(20);
		$CI->excel->getActiveSheet()->getStyle('A3:AD3')->getFont()->setName('Bookman Old Style');
		$CI->excel->getActiveSheet()->getStyle('A3:AD3')->getFont()->setSize(10);
		$CI->excel->getActiveSheet()->getStyle('A2:AD3')->getFont()->setBold(true);															
		$CI->excel->getActiveSheet()->getStyle('A3:AD3')->getFont()->getColor()->setRGB('FFFFFFFF');
		$CI->excel->getActiveSheet()->getStyle('A3:AD3') ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('FF428bca');
		$CI->excel->getActiveSheet()->getStyle('A3:AD3')->applyFromArray($allborders);
		$CI->excel->getActiveSheet()->getStyle('A3:AD3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

		if(isset($institute_details) && !empty($institute_details))
		{
			$i=3;			
			$sr=0;
			foreach ($institute_details as $key ) 
			{
				$sr++;
				$i++;
				$CI->excel->getActiveSheet()->setCellValue('A'.$i, $sr);
				$CI->excel->getActiveSheet()->setCellValue('B'.$i, $key->institute_name);
				$CI->excel->getActiveSheet()->setCellValue('C'.$i, $key->institute_code);
				$CI->excel->getActiveSheet()->setCellValue('D'.$i, $key->institute_code);
				$CI->excel->getActiveSheet()->setCellValue('E'.$i, $key->institute_password);		
				$CI->excel->getActiveSheet()->setCellValue('F'.$i, $key->institute_address);
				$CI->excel->getActiveSheet()->setCellValue('G'.$i, $key->district_name);
				$CI->excel->getActiveSheet()->setCellValue('H'.$i, $key->institute_taluka);
				$CI->excel->getActiveSheet()->setCellValue('I'.$i, $key->institute_pincode);
				$CI->excel->getActiveSheet()->setCellValue('J'.$i, $key->institute_contact);
				$CI->excel->getActiveSheet()->setCellValue('K'.$i, $key->institute_alternate_contact);
				$CI->excel->getActiveSheet()->setCellValue('L'.$i, $key->institute_mail);
				$CI->excel->getActiveSheet()->setCellValue('M'.$i, $key->institute_owner_name);
				$CI->excel->getActiveSheet()->setCellValue('N'.$i, $key->institute_owner_dob);
				$CI->excel->getActiveSheet()->setCellValue('O'.$i, $key->owner_age);
				$CI->excel->getActiveSheet()->setCellValue('P'.$i, $key->institute_owner_qualification);
				$CI->excel->getActiveSheet()->setCellValue('Q'.$i, $key->institute_principal_name);
				$CI->excel->getActiveSheet()->setCellValue('R'.$i, $key->principal_age);
				$CI->excel->getActiveSheet()->setCellValue('S'.$i, $key->institute_principal_qualification);
				$CI->excel->getActiveSheet()->setCellValue('T'.$i, $key->institute_registration_date);
				$CI->excel->getActiveSheet()->setCellValue('U'.$i, $key->institute_status);
				$CI->excel->getActiveSheet()->setCellValue('V'.$i, $key->db_status);
				$CI->excel->getActiveSheet()->setCellValue('W'.$i, $key->download_status);
				$CI->excel->getActiveSheet()->setCellValue('X'.$i, $key->nominee_name);
				$CI->excel->getActiveSheet()->setCellValue('Y'.$i, $key->nominee_age);
				$CI->excel->getActiveSheet()->setCellValue('Z'.$i, $key->relation);
				$CI->excel->getActiveSheet()->setCellValue('AA'.$i, $key->total_student);
				$CI->excel->getActiveSheet()->setCellValue('AB'.$i, $key->paid_student);
				$CI->excel->getActiveSheet()->setCellValue('AC'.$i, $key->stud_appear);
				$CI->excel->getActiveSheet()->setCellValue('AD'.$i, $key->stud_not_appear);
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':AD'.$i)->applyFromArray($allborders);				
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':AD'.$i)->getFont()->setName('Bookman Old Style');
		        $CI->excel->getActiveSheet()->getStyle('A'.$i.':AD'.$i)->getFont()->setSize(10);
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':AD'.$i)->applyFromArray($allborders);							
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':AD'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER) ->setWrapText(true);
			}
		}

		//$filename='due_date.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="all_institute_details_report.xls"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache

		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		             
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($CI->excel, 'Excel5');  
		//force user to download the Excel file without writing it to server's HD
		//$objWriter->save(str_replace(__FILE__,'./upload/report',__FILE__));
		$objWriter->save('php://output'); 
    }

     function batch_wise_institute_report($instCountData)
    {
    	$CI =& get_instance(); 
    	/*date_default_timezone_set('Asia/kolkata');*/
    	$CI->load->library('excel');
    	PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );
		// Set document properties
		$CI->excel->getProperties()->setCreator("ITwizz Pvt. Ltd")
							 	   ->setLastModifiedBy("ITwizz Pvt. Ltd")
							 	   ->setTitle("Batch wise Institute Report")
							 	   ->setSubject("Batch wise Institute Report")
							 	   ->setDescription("System Generated File.")
							 	   ->setKeywords("office 2007")
							 	   ->setCategory("Confidential");

		$allborders = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN, ), ), );


		//activate worksheet number 1
		$CI->excel->setActiveSheetIndex(0);
		$CI->excel->getActiveSheet()->getStyle("A1:Z3")->getAlignment()->setWrapText(true);
		$CI->excel->getActiveSheet()->setTitle('Batch wise Institute Report');
		$CI->excel->getActiveSheet()->mergeCells('A1:Z1') ->getStyle() ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('EEEEEEEE');
		$CI->excel->getActiveSheet()->getStyle('A1:Z1')->applyFromArray($allborders);
		$CI->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$CI->excel->getActiveSheet()->setCellValue('A2', 'Institute List Report');
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setName('Bookman Old Style');
        $CI->excel->getActiveSheet()->getRowDimension('2')->setRowHeight(40);
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
		$CI->excel->getActiveSheet()->mergeCells('A2:Z2') ->getStyle() ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('EEEEEEEE');
		$CI->excel->getActiveSheet()->getStyle('A2:Z3')->applyFromArray($allborders);	
		$CI->excel->getActiveSheet()->getStyle('A2:Z3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		
 		$CI->excel->getActiveSheet()->setCellValue('A3', 'Sr. No.');
		$CI->excel->getActiveSheet()->setCellValue('B3', 'Institute Name');		
		$CI->excel->getActiveSheet()->setCellValue('C3', 'Institute Code');		
		$CI->excel->getActiveSheet()->setCellValue('D3', 'EmailID');
		$CI->excel->getActiveSheet()->setCellValue('E3', 'Mobile');	
		$CI->excel->getActiveSheet()->setCellValue('F3', 'District Name');
		$CI->excel->getActiveSheet()->setCellValue('G3', 'Taluka');
		$CI->excel->getActiveSheet()->setCellValue('H3', 'User Name');
		$CI->excel->getActiveSheet()->setCellValue('I3', 'Password');
		$CI->excel->getActiveSheet()->setCellValue('J3', 'Institute Status');

		$CI->excel->getActiveSheet()->setCellValue('K3', 'Batch');
		$CI->excel->getActiveSheet()->setCellValue('L3', 'Total Students');
		$CI->excel->getActiveSheet()->setCellValue('M3', 'Paid Students');
		$CI->excel->getActiveSheet()->setCellValue('N3', 'Appear Students');
		$CI->excel->getActiveSheet()->setCellValue('O3', 'Not Appear Students');
		$CI->excel->getActiveSheet()->setCellValue('P3', 'Upload Students');
		$CI->excel->getActiveSheet()->setCellValue('Q3', 'Exam Status');
		$CI->excel->getActiveSheet()->setCellValue('R3', 'DB Status');
		$CI->excel->getActiveSheet()->setCellValue('S3', 'Download Status');

		$CI->excel->getActiveSheet()->setCellValue('T3', 'Owner Name');
		$CI->excel->getActiveSheet()->setCellValue('U3', 'Owner DOB');
		$CI->excel->getActiveSheet()->setCellValue('V3', 'Owner Age');
		$CI->excel->getActiveSheet()->setCellValue('W3', 'Owner Qualification');
		$CI->excel->getActiveSheet()->setCellValue('X3', 'Principle Name');
		
		$CI->excel->getActiveSheet()->setCellValue('Y3', 'Principle Qualification');
		$CI->excel->getActiveSheet()->setCellValue('Z3', 'Institute Registration Date');

		 

		$CI->excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(1)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(2)->setWidth(40);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(3)->setWidth(40);							
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(4)->setWidth(20);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(5)->setWidth(40);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(6)->setWidth(40);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(7)->setWidth(40);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(8)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(9)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(10)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(11)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(12)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(13)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(14)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(15)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(16)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(17)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(18)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(19)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(20)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(21)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(22)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(23)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(24)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(25)->setWidth(20);
		$CI->excel->getActiveSheet()->getStyle('A3:Z3')->getFont()->setName('Bookman Old Style');
		$CI->excel->getActiveSheet()->getStyle('A3:Z3')->getFont()->setSize(10);
		$CI->excel->getActiveSheet()->getStyle('A2:Z3')->getFont()->setBold(true);															
		$CI->excel->getActiveSheet()->getStyle('A3:Z3')->getFont()->getColor()->setRGB('FFFFFFFF');
		$CI->excel->getActiveSheet()->getStyle('A3:Z3') ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('FF428bca');
		$CI->excel->getActiveSheet()->getStyle('A3:Z3')->applyFromArray($allborders);
		$CI->excel->getActiveSheet()->getStyle('A3:Z3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

		if(isset($instCountData) && !empty($instCountData))
		{
			
			$i=3;			
			$sr=0;
			foreach ($instCountData as $key ) 
			{
				$sr++;
				$i++;
				$CI->excel->getActiveSheet()->setCellValue('A'.$i, $sr);
				$CI->excel->getActiveSheet()->setCellValue('B'.$i, $key->institute_name);
				$CI->excel->getActiveSheet()->setCellValue('C'.$i, $key->institute_code);
				$CI->excel->getActiveSheet()->setCellValue('D'.$i, $key->institute_mail);
				$CI->excel->getActiveSheet()->setCellValue('E'.$i, $key->institute_contact);		
				$CI->excel->getActiveSheet()->setCellValue('F'.$i, $key->district_name);
				$CI->excel->getActiveSheet()->setCellValue('G'.$i, $key->institute_taluka);
				$CI->excel->getActiveSheet()->setCellValue('H'.$i, $key->institute_code);
				$CI->excel->getActiveSheet()->setCellValue('I'.$i, $key->institute_password);
				$CI->excel->getActiveSheet()->setCellValue('J'.$i, $key->institute_status);

				$CI->excel->getActiveSheet()->setCellValue('K'.$i, $key->batch_name);
				$CI->excel->getActiveSheet()->setCellValue('L'.$i, $key->total_student);
				$CI->excel->getActiveSheet()->setCellValue('M'.$i, $key->paid_student);
				$CI->excel->getActiveSheet()->setCellValue('N'.$i, $key->stud_appear);
				$CI->excel->getActiveSheet()->setCellValue('O'.$i, $key->stud_not_appear);
				$CI->excel->getActiveSheet()->setCellValue('P'.$i, $key->upload_student);
				$CI->excel->getActiveSheet()->setCellValue('Q'.$i, $key->exam_status);
				$CI->excel->getActiveSheet()->setCellValue('R'.$i, $key->db_status);
				$CI->excel->getActiveSheet()->setCellValue('S'.$i, $key->download_status);

				$CI->excel->getActiveSheet()->setCellValue('T'.$i, $key->institute_principal_name);
				$CI->excel->getActiveSheet()->setCellValue('U'.$i, $key->institute_owner_dob);
				$CI->excel->getActiveSheet()->setCellValue('V'.$i, $key->owner_age);
				$CI->excel->getActiveSheet()->setCellValue('W'.$i, $key->institute_principal_qualification);
				$CI->excel->getActiveSheet()->setCellValue('X'.$i, $key->institute_principal_name);
				$CI->excel->getActiveSheet()->setCellValue('Y'.$i, $key->institute_principal_qualification);
				$CI->excel->getActiveSheet()->setCellValue('Z'.$i, $key->institute_registration_date);
				
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':Z'.$i)->applyFromArray($allborders);				
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':Z'.$i)->getFont()->setName('Bookman Old Style');
		        $CI->excel->getActiveSheet()->getStyle('A'.$i.':Z'.$i)->getFont()->setSize(10);
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':Z'.$i)->applyFromArray($allborders);							
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':Z'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER) ->setWrapText(true);
			}
		}

		//$filename='due_date.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="Institute_list.xls"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache

		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		             
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($CI->excel, 'Excel5');  
		//force user to download the Excel file without writing it to server's HD
		//$objWriter->save(str_replace(__FILE__,'./upload/report',__FILE__));
		$objWriter->save('php://output'); 
    }
}