<?php
defined('BASEPATH') OR exit('No direct script access allowed');//ob_clean();
class Knowledgebase extends CI_Controller  
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
  }

  function index()
  {
  	$rand = rand();
  	redirect('Knowledgebase/search');
  }

  /* START AGENT */

  function library()
  {
    $rand = rand();
    redirect('Knowledgebase/form/'.$rand);
  }

  public function form()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Knowledgebase/form',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }

  /* START AGENT */
  public function update_form()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Knowledgebase/update',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }


  /* START AGENT */
  public function list_form()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Knowledgebase/list',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }


  function add_data()
  {
  	$headline = $this->input->post('headline');
  	$category = $this->input->post('category');
  	$html_link_content= $this->input->post('html_link_content');

  	$updateBy = $this->session->userdata('userid');
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("h:i:s");
    $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    $datetime = $dateReg.' '.$timeReg;

    $id_kb = $this->uri->segment(3);

    $data = array(	"headline"=>$headline,
    				"category"=>$category,
    				"topic"=>$html_link_content,
    				"update_by"=>$updateBy,
    				"id_kb"=>$id_kb
    			);
   	$this->Admin->knowledgebase_add_data($data);
   	redirect('Knowledgebase/list_form');
  }


  function Knowledgebase_details()
  {
    $other_id = $this->input->post('id');  
    $query = $this->Admin->Knowledgebase_details($other_id);

    if(empty($query)){
      echo 'Tiada Data Ditemui';
    } else {
      foreach ($query as $data) 
      {
      
      }
      echo json_encode($data);
    }
  }


  function update_data()
  {
  	$id_update = $this->input->post('id_update');
  	$headline = $this->input->post('headline');
  	$category = $this->input->post('category');
  	$html_link_content= $this->input->post('html_link_content');

  	$updateBy = $this->session->userdata('userid');
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("h:i:s");
    $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    $datetime = $dateReg.' '.$timeReg;

    $id_kb = $this->uri->segment(3);

    $data = array(	"headline"=>$headline,
    				"category"=>$category,
    				"topic"=>$html_link_content,
    				"update_by"=>$updateBy
    			);
   	$this->Admin->knowledgebase_update_data($data,$id_kb);
   	redirect('Knowledgebase/list_form');
  }


  function list_data()
  {
  	$idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
    {

      $headline = $this->input->post('headline');
      $category = $this->input->post('category');

      header('Content-Type: application/json');
      echo $this->Admin->Dtable_knowlegdebase($headline,$category);

      } else { 
      $this->load->view('login');
    }
  }

  function list_user_access()
  {
    $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
    {

      header('Content-Type: application/json');
      echo $this->Admin->Dtable_knowlegdebase_user_access();

      } else { 
      $this->load->view('login');
    }
  }


  public function search()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Knowledgebase/search',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }


  public function filter()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Knowledgebase/search_filter',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }


  public function result()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Knowledgebase/search_data',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }

  function count_knowledgebase_by_search()
  {
      $headline = $this->input->post('headline');
      $category = $this->input->post('category');
      echo $this->Admin->count_knowledgebase_by_search($headline,$category);
  }


  public function topic()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Knowledgebase/read_details',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }


  public function user_access()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Knowledgebase/user_access',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }

}