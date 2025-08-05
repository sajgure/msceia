<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Date_time_settings extends Base_Controller 
{
	function __construct()
    {
        parent::__construct(); 
        $this->config->load('standard/Default_date_time_format',TRUE);
      	$this->format = $this->config->item('Default_date_time_format');
        $this->load->model('date_time_model');
	}
	public function dateFormat($param='') // for format call without parameter , to convert date then call with data
	{
		$date=date_create($param);
		$date_format = $this->date_time_model->getDateFormat();
		if(isset($date_format) && $date_format !='')
		{
			if($param == '')
				return $date_format;
			else
				return date_format($date,$date_format);
		}
		else
		{
			if($param == '')
				return $this->format['default_dateformat'];
			else
				return date_format($date,$this->format['default_dateformat']);
		}
	}
	public function timeFormat($param='')
	{
		$time = explode(':',$param);
		$time_format = $this->date_time_model->getTimeFormat();
		if(isset($time_format) && $time_format !='')
		{	
			if($param == '')
				return $time_format;
			else
				return date($time_format, mktime($time[0],$time[1],$time[2]));
		}
		else
		{
			if($param == '')
				return $this->format['default_timeformat'];
			else
				return date($this->format['default_timeformat'], mktime($time[0],$time[1],$time[2]));
		}
	}
	public function dateTimeFormat($param='')
	{
		$date = date_create($param);
		$format = $this->date_time_model->getDateTimeFormat();
		if(isset($format->date_format) && $format->date_format !='' && isset($format->time_format) && $format->time_format !='')
		{
			if($param == '')
				return $format->date_format.' '.$format->time_format;
			else
				return date_format($date,$format->date_format.' '.$format->time_format);
		}
		else
		{
			if($param == '')
				return $this->format['default_datetimeformat'];
			else
				return date_format($date,$this->format['default_datetimeformat']);
		}
	}

	
}