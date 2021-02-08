<?php
defined('BASEPATH') OR exit('No direct script access allowed');//ob_clean();
class Mobile extends CI_Controller  
{

  public function __construct()
  {

    parent::__construct();
    $this->load->database();
    $this->load->library('session');
    $this->load->library('datatables');
    $this->load->model('Mobile_model','Mobile'); 
    $this->load->model('Dbase_lookup','lookup');
    $this->load->helper('Lookup_helper'); //helpers
  }

  function my_record()
  {
  	header("Access-Control-Allow-Origin: *");
    $id = $this->uri->segment('3');
  	$query = $this->Mobile->my_record($id);
  	echo json_encode($query);
  }

  function created_ticket()
  {
    header("Access-Control-Allow-Origin: *");
    $this->input->raw_input_stream;
    $input_data = json_decode($this->input->raw_input_stream, true);
    $title = $input_data['title'];
    $desc = $input_data['desc'];
    $username = $input_data['username'];
    $type = $input_data['type'];
    
    $status = 'Order';
    $data = array(
                    "title"=>$title,
                    "description"=>$desc,
                    "status"=>$status,
                    "created_by"=>$username,
                    "type_asset"=>$type
                 );

    $query = $this->Mobile->created_ticket($data);
    echo json_encode($query);
  }

  function login()
  {
    header("Access-Control-Allow-Origin: *");

    $this->input->raw_input_stream;
    $input_data = json_decode($this->input->raw_input_stream, true);

    $email = $input_data['email'];
    $password = $input_data['password'];


    $query = $this->Mobile->login($email,$password);
    echo json_encode($query);

  }

  function getDetail()
  {
    header("Access-Control-Allow-Origin: *");
    $id = $this->uri->segment('3');
    $query = $this->Mobile->getDetail($id);
    echo json_encode($query);

  }

  function getUser()
  {
    header("Access-Control-Allow-Origin: *");
    $username = $this->uri->segment('3');
    $query = $this->Mobile->getUser($username);
    echo json_encode($query);

  }

  function new_pwd()
  {
    header("Access-Control-Allow-Origin: *");
    $input_data = json_decode($this->input->raw_input_stream, true);

    $new_pwd = $input_data['new_pwd'];
    $uname = $this->uri->segment('3');
    $query = $this->Mobile->new_pwd($new_pwd,$uname);

  }

  function getInfo()
  {
    header("Access-Control-Allow-Origin: *");
    $id = $this->uri->segment('3');
    $query = $this->Mobile->getInfo($id);
    echo json_encode($query);
  }


  function my_ticket()
  {
    header("Access-Control-Allow-Origin: *");
    $id = $this->uri->segment('3');

    if($id=='undefined'){

    } else {
      $cust_id = $this->Mobile->get_cust_id($id);

      $query = $this->Mobile->my_ticket($cust_id);
      echo json_encode($query);
    }

    
  }

}