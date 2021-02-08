<?php
defined('BASEPATH') OR exit('No direct script access allowed');//ob_clean();
class Analytic extends CI_Controller  
{

  public function __construct()
  {

    parent::__construct();
    $this->load->database();
    $this->load->library('session');
    $this->load->library('datatables');
    $this->load->model('Admin_model','Admin');
    $this->load->model('Analytic_model','Analytic');
    $this->load->model('Dbase_lookup','lookup');
    $this->load->helper('Lookup_helper'); //helpers
  }

  function ticket()
  {
  	if(!empty($this->session->userdata('logged_in')))
	{ 
	  $this->data['site_title'] = 'Add_Agent';
	  //$this->load->view('template/header/header');
	  $this->load->view('template/body/graph/all_ticket_by_date',$this->data);
	  //$this->load->view('template/footer/footer');

	} else { 
	  $this->load->view('login');
	}  
  }


  function analytic_ticket_realtime()
  {
  	$this->Analytic->analytic_ticket_realtime();
  }
  
}