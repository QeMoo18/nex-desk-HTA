<?php
defined('BASEPATH') OR exit('No direct script access allowed');//ob_clean();
class Service extends CI_Controller  {

	public function __construct()
	{

	parent::__construct();
	$this->load->database();
	$this->load->library('session');
	$this->load->library('datatables');
	$this->load->model('Service_model','Service');
	$this->load->model('Dbase_lookup','lookup');
	$this->load->helper('Lookup_helper'); //helpers
	}

	/* Service */
	public function Service_ListView()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Service',$idModule)))
        {

			$this->data['site_title'] = 'Service_ListView';
			$this->load->view('template/header/header');
			$this->load->view('template/body/Service_ListView/Service_ListView',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}

	public function Service_ViewDetails()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Service',$idModule)))
        {

			$this->data['site_title'] = 'Service_ViewDetails';
			$this->load->view('template/header/header');
			$this->load->view('template/body/Service_ViewDetails/Service_ViewDetails',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}
	/* END */

	/* SLA */
	public function SLA_ListView()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Service',$idModule)))
        {

			$this->data['site_title'] = 'SLA_ListView';
			$this->load->view('template/header/header');
			$this->load->view('template/body/SLA_ListView/SLA_ListView',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}

	public function SLA_ViewDetails()
	{

		$idModule = $this->session->userdata('idModule');
   	    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Service',$idModule)))
        {

			$this->data['site_title'] = 'SLA_ViewDetails';
			$this->load->view('template/header/header');
			$this->load->view('template/body/SLA_ViewDetails/SLA_ViewDetails',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}
	/* END */

}
 	