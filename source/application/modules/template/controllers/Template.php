<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends Base_Controller {

	
	public function db_backup()
	{
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        ini_set('memory_limit', '-1');
        
        $fileName='backup-on-'.date('d-m-y H:i').'.zip';
        $path='assets/db_backup/'.$fileName;
        
        $prefs = array(
            'tables'      => array('tbl_payment','tbl_student','tbl_institute'),  // Array of tables to backup.
            'ignore'      => array()           // List of tables to omit from the backup
          );
        
        $backup =& $this->dbutil->backup($prefs);
        write_file($path, $backup);
        force_download($fileName, $backup);
}
}
