<?php
defined('BASEPATH') OR exit('No direct script access allowed');//ob_clean();
class Ui extends CI_Controller  {

  public function __construct()
  {

    parent::__construct();
    $this->load->database();
    $this->load->library('session');
    $this->load->library('datatables');
    $this->load->model('Architecture_UI','ui');
    $this->load->model('Dbase_lookup','lookup');
    $this->load->helper('Lookup_helper'); //helpers
  }

  public function index()
  { 
    if((!empty($this->session->userdata('logged_in'))))
    {
      $this->load->view('template/header/header');
      $this->load->view('template/body/dashboard');
      $this->load->view('template/footer/footer');
    } else {
      redirect('dashboard');
    }
  }

  public function createmodule()
  { 
    if((!empty($this->session->userdata('logged_in'))))
    {
      $this->load->view('template/header/header');
      $this->load->view('template/body/engine_ui/createmodule');
      $this->load->view('template/footer/footer');
    } else {
      redirect('dashboard');
    }
      
  }

  public function createview()
  { 
    if((!empty($this->session->userdata('logged_in'))))
    {
      $this->load->view('template/header/header');
      $this->load->view('template/body/engine_ui/createview');
      $this->load->view('template/footer/footer');
    } else {
      redirect('dashboard');
    }
    
  }

  public function architecture()
  { 
    if((!empty($this->session->userdata('logged_in'))))
    {
      $this->load->view('template/header/header');
      $this->load->view('template/body/engine_ui/architecture');
      $this->load->view('template/footer/footer');
    } else {
      redirect('dashboard');
    }
    
  }
  

  /* VIEW DISPLAY */
  public function createviewdatatables()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $this->data['site_title'] = 'createviewdatatables';
      $this->load->view('template/header/header');
      $this->load->view('template/body/createviewdatatables/createviewdatatables',$this->data);
      $this->load->view('template/footer/footer');
    } else {
      redirect('dashboard');
    }
    
    
  }
  public function add_column_fielddtables()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $name_column = $this->input->post('name_column');
      $id_view = $this->input->post('id_view');
      $data = array("column_name "=>$name_column,"id_view"=>$id_view);
      $this->ui->add_column_fielddtables($data);
    } else {
      redirect('dashboard');
    }
    

  }
  public function listadded_column()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $id_view = $this->input->post('id_view');
      $this->ui->listadded_column($id_view);
    } else {
      redirect('dashboard');
    }
    
  }
  public function deleteadded_column()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $id = $this->input->post('id');
      $this->ui->deleteadded_column($id);
    } else {
      redirect('dashboard');
    }
  }
  public function createviewnow_datatables()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $name_title = $this->input->post('name_title');
      $name_controller = $this->input->post('name_controller'); 
      $name_function = $this->input->post('name_function'); 
      $name_view = $this->input->post('name_view'); 
      $id_view = $this->input->post('id_view'); 

      $data = array("controller"=>$name_controller,"function"=>$name_function,"view"=>$name_view,'title_form'=>$name_title,'id_view'=>$id_view);
      $save = $this->ui->register_view($data);

      // get title form
      $gettitle = $this->ui->gettitle($id_view);
      // get form view 
      $getcolumn = $this->ui->getcolumn($id_view);
      $this->load->helper('pages_creatorviewdatatables_helper');
      create_new_view($name_view, $name_function, $name_controller,$getcolumn,$gettitle);
    } else {
      redirect('dashboard');
    }
  }
  /* END */

  /* CREATE FORM VIEW */
  public function check_id_field()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $id = $this->input->post('id');
      $this->ui->check_id_field($id);
    } else {
      redirect('dashboard');
    }
  }

  public function check_name_field()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $name = $this->input->post('name'); 
      $this->ui->check_name_field($name);
    } else {
      redirect('dashboard');
    }
  }

  public function addfieldview()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $label = $this->input->post('label'); 
      $type = $this->input->post('type'); 
      $id = $this->input->post('id'); 
      $name = $this->input->post('name'); 
      $id_view = $this->input->post('id_view'); 


      //create code 
      if($type=='text'){
        $code = "<input type='text' class='form-control' name='".$name."' id='".$id."'> ";
      } else if($type=='dropdown'){
        $code = "<select class='form-control' name='".$name."' id='".$id."'><option value=''>< Please Select ></option></select>";
      } else if($type=='textarea'){
        $code = "<textarea class='form-control' rows='3' name='".$name."' id='".$id."'></textarea>";
      } else if($type=='radio'){
        $code = "<input type='radio' name='".$name."' id='".$id."' checked=''> ";
      } else if($type=='checkbox'){
        $code = "<input type='checkbox' name='".$name."' id='".$id."' checked=''> ";
      } 

      $data = array("label"=>$label,"type"=>$type,"id_field"=>$id,"name_field"=>$name,"id_view"=>$id_view,"code"=>$code);
      $this->ui->addfieldview($data);

    } else {
      redirect('dashboard');
    }

  }

  public function listadded()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $id_view = $this->input->post('id_view'); 
      $this->ui->listadded($id_view);

    } else {
      redirect('dashboard');
    }
  }

  public function deleteadded()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $id = $this->input->post('id'); 
      $this->ui->deleteadded($id);
    } else {
      redirect('dashboard');
    }
  }
  
  function check_namefunction()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $name_controller = $this->input->post('name_controller'); 
      $name_function = $this->input->post('name_function'); 
      $this->ui->check_namefunction($name_controller,$name_function);
    } else {
      redirect('dashboard');
    }

  }

  function check_nameview()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $name_view = $this->input->post('name_view'); 
      $this->ui->check_nameview($name_view);
    } else {
      redirect('dashboard');
    }
  }

  function createviewnow()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $name_title = $this->input->post('name_title');
      $name_controller = $this->input->post('name_controller'); 
      $name_function = $this->input->post('name_function'); 
      $name_view = $this->input->post('name_view'); 
      $id_view = $this->input->post('id_view'); 

      $data = array("controller"=>$name_controller,"function"=>$name_function,"view"=>$name_view,'title_form'=>$name_title,'id_view'=>$id_view);
      $save = $this->ui->register_view($data);

      // get title form
      $gettitle = $this->ui->gettitle($id_view);
      // get form view 
      $getform = $this->ui->getform($id_view);
      $this->load->helper('pages_creator_helper');

      $this->load->helper('pages_creatorviewcustom_helper');
      create_new_view($name_view, $name_function, $name_controller,$getform,$gettitle);

      // process create view
    } else {
      redirect('dashboard');
    }

  }
  /* END */


  function check_name_controller()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $name_controller = $this->input->post('name_controller');
      $this->ui->check_name_controller($name_controller);
    } else {
      redirect('dashboard');
    }
  }

  function check_name_model()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $name_model = $this->input->post('name_model'); 
      $this->ui->check_name_model($name_model);
    } else {
      redirect('dashboard');
    }
  }

  function add_module()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $name_controller = $this->input->post('name_controller'); 
      $name_model = $this->input->post('name_model'); 
      $fa_icon = $this->input->post('fa_icon'); 
      $left_show = $this->input->post('left_show'); 

      $data = array("name_register"=>$name_controller,"name_model"=>$name_model,"fa_fa_icon"=>$fa_icon,"status"=>$left_show);
      $this->ui->add_module($data);

      $this->load->helper('pages_creatormodule_helper');
      create_new_page($name_model, $name_controller);
    } else {
      redirect('dashboard');
    }
  }

  /* DROPDOWN */
  function get_menu()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $parent_menu = $this->ui->parent_menu();
    } else {
      redirect('dashboard');
    }
  }

  function get_menu_v2()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $parent_menu = $this->ui->parent_menu_v2();
    } else {
      redirect('dashboard');
    }
  }

  /* END */


  public function Module_Hide_Show()
  {

      $this->data['site_title'] = 'Module_Hide_Show';
      $this->load->view('template/header/header');
      $this->load->view('template/body/Module_Hide_Show/Module_Hide_Show',$this->data);
      $this->load->view('template/footer/footer');

  }

  

}