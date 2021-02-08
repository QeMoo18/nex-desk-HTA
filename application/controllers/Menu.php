<?php
defined('BASEPATH') OR exit('No direct script access allowed');//ob_clean();
class Menu extends CI_Controller  {
	public function __construct()
	{

		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->library('datatables');
		$this->load->model('Ticket_model','Ticket');
		$this->load->model('Dbase_lookup','lookup');
		$this->load->helper('Lookup_helper'); //helpers
	}


  	public function Index()
    {

    	if((!empty($this->session->userdata('logged_in'))))
    	{
    	
	    	$this->data['site_title'] = 'Menu';
	    	$this->load->view('template/header/header');
	    	$this->load->view('template/body/menu',$this->data);
	    	$this->load->view('template/footer/footer');

    	} else { 
	      $this->load->view('login_v2');
	    }

    }


    public function Overview()
    {

    	if((!empty($this->session->userdata('logged_in'))))
    	{
    	
	    	$this->data['site_title'] = 'Menu';
	    	$this->load->view('template/header/header');
	    	// $this->load->view('template/body/menu',$this->data);

	    	if($this->uri->segment(3)=='admin'){
	    		$this->load->view('template/body/admin_v3',$this->data);
	    	} else {
	    		$this->load->view('template/body/asset_v3',$this->data);
	    	}

	    	
	    	$this->load->view('template/footer/footer');

    	} else { 
	      $this->load->view('login_v2');
	    }

    }

  }
