<?php
defined('BASEPATH') OR exit('No direct script access allowed');//ob_clean();
class User extends CI_Controller  
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


  public function Profile()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/profile',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          //$this->load->view('login');
        redirect('dashboard');
      }   

  }



  public function New_password()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/new_password',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          redirect('dashboard');
      }   

  }



  function ChangeProfile()
  {
        $file_name = $_FILES['userfile']['name'];

        if(!empty($file_name))
        {
            $file_name = rand().$_FILES['userfile']['name'];
            $config = array(
                    'upload_path' => "./user_profile/",
                    //'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'allowed_types' => "gif|jpg|png|jpeg|pdf",
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
                $id = $this->session->userdata('userid');

                $file_name = base_url().'user_profile/'.$file_name;

                $data = array
                        (
                            "user_img"=>$file_name
                        );

                $this->db->where('userid',$id);
                $this->db->update('agent',$data);

                //$data = array("id_topic"=>$id_topic,"name_file"=>$file_name,"status"=>"1");
                //$this->Classroom->update_status_topic($id_topic,$data);

                //redirect('Classroom/Classroom_createtopic');


                redirect('user/profile');
                
            }
            else
            {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error); exit();
                //$this->load->view('custom_view', $error);
            }
        } else {
          echo 'Something error..';
        }
  }


}