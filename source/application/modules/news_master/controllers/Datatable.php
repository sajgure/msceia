<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Apurva Bandelwar				Date: 12-03-2021
	-------------------------------------------------------------
	*/
	public function __construct() 
    {
        parent::__construct();  
        $this->load->library('lib_datatables');
    }
    public function news_master_table()
    {
        $query = "SELECT * FROM tbl_news_master tnm  WHERE tnm.display='Y'";
		$search = array('tnm.news_name','tnm.news_desc','tnm.visibility','tnm.news_id');
		$clause=''; $order = "tnm.news_id DESC";
		$result = $this->lib_datatables->datatable($query,$search,$order,$clause);
		$data =array();
		if(isset($result) && !empty($result))
		{
			$no = $_POST['start'];
			foreach ($result as $key)
			{
				$no++;
				$row = array();
				$row[] = '<center>'.$no.'</center>';
				$row[] = '<span  class="font-green-haze bold">'.((isset($key->news_name) && !empty($key->news_name))?$key->news_name:'');
				$row[] = ((isset($key->news_desc) && !empty($key->news_desc)) ? $key->news_desc:'');
				if($key->visibility=='Y')
				{
					 $visibility='<center><span class="label bg-yellow-gold">Enable</span></center>';
				}
				else
				{
					$visibility='<center><span class="label bg-red-thunderbird">Disable</span></center>';
				}
				$row[] =((isset($visibility) && !empty($visibility)) ? $visibility:'');
				$news_id = $this->encryptdecryptstring->encrypt_string($key->news_id);
				if($key->in_use=='Y')
                { 
                    $row[]='<span class="tbl_action" data-col="news_id"><center><a rel="'.((isset($key->news_id) && !empty($key->news_id)) ? $key->news_id:'').'" rev="hide-news-master" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>'.'
                    <a href="'.base_url().'add-news/'.$news_id.'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'permanent-delete-news-master/'.((isset($key->news_id) && !empty($key->news_id)) ? $key->news_id:'').'" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }
                else
                {                                                     
                    $row[]='<span class="tbl_action" data-col="news_id"><center><a rel="'.((isset($key->news_id) && !empty($key->news_id)) ? $key->news_id:'').'" rev="restore-news-master" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>'.'
                    <a href="'.base_url().'add-news/'.$news_id.'" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>'.'
                	<a rev="'.'permanent-delete-news-master/'.((isset($key->news_id) && !empty($key->news_id)) ? $key->news_id:'').'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span>';
                }

				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}