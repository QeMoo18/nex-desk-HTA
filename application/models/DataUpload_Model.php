<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class DataUpload_Model extends CI_Model
{
	function __construct()
	{
	    // Call the Model constructor
	    parent::__construct();
	    $this->db = $this->load->database('otrs', TRUE);
	}

	function importdata($inserdata,$table_name)
	{
		
		$res = $this->db->insert_batch($table_name,$inserdata);
        if($res){
            return TRUE;
        }else{
            return FALSE;
        }
 

	}
}