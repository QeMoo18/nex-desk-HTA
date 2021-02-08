<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_clean();

  class Classroom extends CI_Controller  {

  public function __construct()
  {

    parent::__construct();
    $this->load->database();
    $this->load->library('session');
    $this->load->library('datatables');
    $this->load->model('Classroom_model','Classroom');
    $this->load->helper('Lookup_helper'); //helpers
  }

  public function Classroom_createtopic()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $this->data['site_title'] = 'Classroom';
      $this->load->view('template/header/header');
      $this->load->view('template/body/Classroom/Classroom',$this->data);
      $this->load->view('template/footer/footer');
    } else {
      redirect('dashboard');
    }
  }

  public function Classroom_Details()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $this->data['site_title'] = 'Classroom';
      $this->load->view('template/header/header');
      $this->load->view('template/body/Classroom/Classroom_Details',$this->data);
      $this->load->view('template/footer/footer');
    } else {
      redirect('dashboard');
    }
  }

  

  public function register_topic()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $id_topic = $this->input->post('id_topic'); 
      $create_topic = $this->input->post('create_topic'); 
      $data = array("id_topic"=>$id_topic,"title_topic"=>$create_topic);
      $this->Classroom->register_topic($data);
    } else {
      redirect('dashboard');
    }
  }

  public function add_topic()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $id_topic = $this->input->post('id_topic'); 
      $subject = $this->input->post('subject'); 
      $type = $this->input->post('type'); 
      $desc_subject = $this->input->post('desc_subject'); 
      $data = array("id_topic"=>$id_topic,"title_subject"=>$subject,"type_file"=>$type,"describe_subject"=>$desc_subject);
      $this->Classroom->add_topic($data);
    } else {
      redirect('dashboard');
    }
  }

  public function list_subject()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $id_topic = $this->input->post('id_topic');
      $this->Classroom->list_subject($id_topic);
    } else {
      redirect('dashboard');
    }
  }

  public function delete_topic()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $id = $this->input->post('id');
      $this->Classroom->delete_topic($id);
    } else {
      redirect('dashboard');
    }
  }

  public function Create_Topic()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $id_topic = $this->input->post('id_topic');
      $classroom_create_img = $this->input->post('userfile');

      $file_name = rand().$_FILES['userfile']['name'];

      $config = array(
                'upload_path' => "./uploads/",
                //'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "5000",
                'max_width' => "5000",
                //'encrypt_name'=>TRUE,
                'remove_spaces'=>TRUE,
                'file_name'=>$file_name
              );

      $this->load->library('upload', $config);
      if($this->upload->do_upload())
      {
        
        
        $name_file = $config['file_name'];
        $data = array('upload_data' => $this->upload->data());
        
        $data = array("id_topic"=>$id_topic,"name_file"=>$file_name,"status"=>"1");
        $this->Classroom->update_status_topic($id_topic,$data);

        redirect('Classroom/Classroom_createtopic');
      }
      else
      {
        $error = array('error' => $this->upload->display_errors());
        var_dump($error); exit();
      //$this->load->view('custom_view', $error);
      }
    } else {
      redirect('dashboard');
    }

  }




  /* LIST */
  public function Classroom_List()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $this->data['site_title'] = 'Classroom';
      $this->load->view('template/header/header');
      $this->load->view('template/body/Classroom/Classroom_List',$this->data);
      $this->load->view('template/footer/footer');
    } else {
      redirect('dashboard');
    }
  }

  public function listdata()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $this->Classroom->listdata();
    } else {
      redirect('dashboard');
    }
  }

  public function listdata_byparam()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $lookup_list = $this->input->post('lookup_list');
      $this->Classroom->listdata_byparam($lookup_list);
    } else {
      redirect('dashboard');
    }
  }

  public function gettitle()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $id = $this->input->post('id');
      $this->Classroom->gettitle($id);
    } else {
      redirect('dashboard');
    }
  }

  public function detailtopic()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      $id = $this->input->post('id');
      $this->Classroom->detailtopic($id);
    } else {
      redirect('dashboard');
    }
  }
  /* END */


}
 	