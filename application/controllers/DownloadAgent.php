<?php
defined('BASEPATH') OR exit('No direct script access allowed');//ob_clean();
class DownloadAgent extends CI_Controller  
{

  public function __construct()
  {

    parent::__construct();
    $this->load->database();
    $this->load->library('session');
    $this->load->library('datatables');
    $this->load->model('Dbase_lookup','lookup');
    //$this->load->model('DataUpload_Model','DataUpload');
    //$this->load->helper('Lookup_helper'); //helpers
  }


  public function Index()
  {
  	$idModule = $this->session->userdata('idModule');
	if((!empty($this->session->userdata('logged_in'))))
	{ 
	  $this->load->view('download_agent');

	} else { 
	  $this->load->view('login');
	} 

  }


  function XP()
  {
    $this->load->view('download_agent');
  }

  function seven()
  {
    $this->load->view('download_agent_7');
  }

}