<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lib_datatables
{
	public function datatable($query,$search,$order,$clause,$cnt=NULL)
    {
    	$CI =& get_instance();     
		$CI->load->database('database');
        if($_POST['search']['value']) 
        {
            $search_str='( ';
            foreach ($search as $column)
            {
                $key=$_POST['search']['value']; $search_str= $search_str."".$column." LIKE '%".$key."%' OR ";
            }
            $search_str=substr($search_str, 0, -3); $search_str=$search_str." )";
        }
        if(isset($search_str) && !empty($search_str)) {$last_query=$query." AND ".$search_str." ".$clause; } else {$last_query=$query." ".$clause; }
        if(isset($_POST['order'])) {$last_query=$last_query." order by ". $search[$_POST['order']['0']['column']]." ".$_POST['order']['0']['dir']; }else{$last_query=$last_query." order by ".$order." "; }


        if(!isset($cnt) && empty($cnt)) {if($_POST['length'] != -1) $last_query=$last_query." LIMIT ".$_POST['start']." , ".$_POST['length']." "; }
        
        $query1= $CI->db->query($last_query);
        return $query1->result();
    }

    public function buttons($id,$url,$url1)
    { 
        $html = '<center><span style="cursor: pointer;" class="tooltips editRecord" rel='.$id.' rev='.$url.' title="Edit Record"><i class="fa fa-edit"></i></span> ';  
        $html .= ' <span style="cursor: pointer;" class="tooltips deleteRecord"  rev='.$url1.' rel='. $id .' data-original-title="Delete" data-placement="top"><i class="fa fa-trash-o"></i></span></center>';
        return $html;
    }

    public function output($query,$search,$order,$clause,$data)
    {
    	$CI =& get_instance();     
		$CI->load->database('database');
        $last_query=$query." ".$clause;
        $query1=$CI->db->query($last_query);
        $cnt=$CI->lib_datatables->datatable($query,$search,$order,$clause,1);
        $output = array("draw" => $_POST['draw'],
                        "recordsTotal" =>$query1->num_rows(),
                        "recordsFiltered" => (isset($cnt) && !empty($cnt))?count($cnt):'0',
                        "data" => $data);
        return $output;
    }

}