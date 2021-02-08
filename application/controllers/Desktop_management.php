<?php
defined('BASEPATH') OR exit('No direct script access allowed');//ob_clean();
class Desktop_management extends CI_Controller  
{



  public function __construct()
  {

    parent::__construct();
    $this->load->database();
    $this->load->library('session');
    $this->load->library('datatables');
    $this->load->model('Admin_model','Admin'); 
    $this->load->model('Dbase_lookup','lookup');
    $this->load->helper('Lookup_helper'); //helpers



    // $base_img = 'https://scanner.gadingtech.com/qr_code/nav/details_item/';

  }



  function index()
  {
    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
    { 
        $this->data['site_title'] = 'Add_Agent';
        $this->load->view('template/header/header');
        $this->load->view('template/body/Desktop_management/dashboard',$this->data);
        $this->load->view('template/footer/footer');

    } else { 
        $this->load->view('login');
    }
  }


  function test()
  {
    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
    { 
        $this->data['site_title'] = 'Add_Agent';
        //$this->load->view('template/header/header');
        $this->load->view('template/body/Desktop_management/http_opsi',$this->data);
        //$this->load->view('template/footer/footer');

    } else { 
        $this->load->view('login');
    }
  }

}