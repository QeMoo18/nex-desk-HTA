<?php
defined('BASEPATH') OR exit('No direct script access allowed');//ob_clean();
class Demo_account extends CI_Controller  {
  public function __construct()
  {

    parent::__construct();
    $this->load->database();
    $this->load->library('session');
    $this->load->library('datatables');
    $this->load->model('Login_model','login');
    $this->load->helper('Lookup_helper'); //helpers
    $this->load->model('Dbase_lookup','lookup');
    $this->load->model('Admin_model','Admin'); 
  }

  function request()
  {
    $user_name = $this->input->post('user_name');
    $contact_number = $this->input->post('contact_number');
    $user_email = $this->input->post('user_email');
    $data = array('name'=>$user_name,'contact_number'=>$contact_number,'email'=>$user_email);
    $this->db->insert('demo_account_request',$data);

    $data = array('request_success'=>'request_success');
    $this->session->set_userdata($data);
    redirect('login');
  }

}