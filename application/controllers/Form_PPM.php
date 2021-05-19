<?php
defined('BASEPATH') OR exit('No direct script access allowed');//ob_clean();
class Form_PPM extends CI_Controller  
{



  public function __construct()
  {

    parent::__construct();
    $this->load->database();
    $this->load->library('session');
    $this->load->library('datatables');
    $this->load->library('pagination');
    $this->load->model('Admin_model','Admin'); 
    $this->load->model('Dbase_lookup','lookup');
    $this->load->helper('Lookup_helper'); //helpers




    // $base_img = 'https://scanner.gadingtech.com/qr_code/nav/details_item/';

  }

  /* START AGENT */
  public function List_Computer()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Form_PPM/Computer/List',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }



  public function List_Computer_Type()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Form_PPM/Computer/List',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }



  public function List_Server_Type()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Form_PPM/Computer/List',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }



  public function List_Hardware()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Form_PPM/Hardware/List',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }


  public function List_Network_Type()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Form_PPM/Hardware/List',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }


  public function List_Printer_Type()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Form_PPM/Hardware/List',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }





  public function PPM_Form_Computer()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Form_PPM/Computer/Form_Computer',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }


  public function PPM_Form_Network()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Form_PPM/Hardware/Form_Network',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }


  public function PPM_Form_Printer()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Form_PPM/Hardware/Form_Printer_Scanner',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }



  public function Load_balance()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Form_PPM/Hardware/Form/load_balance',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }



  public function Ups()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Form_PPM/Hardware/Form/ups',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }


  public function Controller()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Form_PPM/Hardware/Form/controller',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }




  public function Firewall()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Form_PPM/Hardware/Form/Firewall',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }



  public function Switch_PPM()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Form_PPM/Hardware/Form/switch',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }



  public function Access_point()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Form_PPM/Hardware/Form/access_point',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }


  function Printer()
  {
      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Form_PPM/Hardware/Form_PS/printer',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      } 
  }


  function Scanner()
  {
      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Form_PPM/Hardware/Form_PS/scanner',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      } 
  }



  function Card_Reader()
  {
      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Form_PPM/Hardware/Form_PS/card_reader',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      } 
  }

  function Computer()
  {
      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Form_PPM/Computer/Form/Computer',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      } 
  }


  function Notebook()
  {
      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Form_PPM/Computer/Form/Notebook',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      } 
  }


  function PPM_Form_Server_Storage()
  {
      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Form_PPM/Computer/Form/Server_Storage',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      } 
  }



  function Add_Computer()
  {

    //exit();
    $ppm_id = $this->input->post('ppm_id');

    $type_ppm = $this->input->post('type_ppm');
    $type_device = $this->input->post('type_device');

    //$responsible = $this->input->post('responsible');
    $responsible = $this->session->userdata('first_name');

    $hostname = $this->input->post('hostname');
    $location = $this->input->post('location');
    $level = $this->input->post('level');
    $department = $this->input->post('department');
    $brand = $this->input->post('brand');
    $processor_type = $this->input->post('processor_type');
    $model = $this->input->post('model');
    $ram = $this->input->post('ram');
    $serial_number = $this->input->post('serial_number');
    $monitor_brand = $this->input->post('monitor_brand');
    $monitor_model = $this->input->post('monitor_model');
    $monitor_serial_number = $this->input->post('monitor_serial_number');
    $ups_brand = $this->input->post('ups_brand');
    $ups_model = $this->input->post('ups_model');
    $ups_serial_no = $this->input->post('ups_serial_no');
    $port = $this->input->post('port');
    $type_ip = $this->input->post('type_ip');
    $ip = $this->input->post('ip');
    $device_tag = $this->input->post('device_tag');
    $need_replacement = $this->input->post('need_replacement');
    $date_replacement = $this->input->post('date_replacement');
    $ppm_tag = $this->input->post('ppm_tag');


    $checklist_1 = $this->input->post('checklist_1');
    $checklist_2 = $this->input->post('checklist_2');
    $checklist_3 = $this->input->post('checklist_3');
    $checklist_4 = $this->input->post('checklist_4');
    $checklist_5 = $this->input->post('checklist_5');
    $checklist_6 = $this->input->post('checklist_6');
    $checklist_7 = $this->input->post('checklist_7');
    $checklist_8 = $this->input->post('checklist_8');
    $checklist_9 = $this->input->post('checklist_9');

    $physical_1 = $this->input->post('physical_1');
    $physical_2 = $this->input->post('physical_2');
    $physical_3 = $this->input->post('physical_3');
    $physical_4 = $this->input->post('physical_4');
    $physical_5 = $this->input->post('physical_5');
    $physical_6 = $this->input->post('physical_6');
    $physical_7 = $this->input->post('physical_7');
    $physical_8 = $this->input->post('physical_8');


    $defrag_1 = $this->input->post('defrag_1');
    $defrag_2 = $this->input->post('defrag_2');
    $defrag_3 = $this->input->post('defrag_3');
    $defrag_4 = $this->input->post('defrag_4');
    $defrag_5 = $this->input->post('defrag_5');
    $defrag_6 = $this->input->post('defrag_6');


    $analysis = $this->input->post('analysis');
    $type_defrag = $this->input->post('type_defrag');
    $win_update = $this->input->post('win_update');
    $check_antivirus = $this->input->post('check_antivirus');
    $perform_antivirus = $this->input->post('perform_antivirus');


    $comment = $this->input->post('comment');

    $customer = $this->input->post('customer');
    $acknowledge = $this->input->post('acknowledge');

    $id_number = rand();

    //default data 
    $updateBy = $this->session->userdata('userid'); // id yang login system
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("H:i");
    $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    $datetime = $dateReg.' '.$timeReg; //current date 



    //generated_code 
    $code = 'C';
    $number  = '1';
    $ref = str_pad($number,6,"0",STR_PAD_LEFT); // 0001

    $check = $this->Admin->check_id_ppm($code);

    if(!empty($check)){
      $number = intval($check) + 1;
      $ref = str_pad($number,6,"0",STR_PAD_LEFT); // 0001
    }

    $id_reference = $ref;

    
    $endorse = $this->input->post('acknowledge');

    if($endorse!=''){
      $status='Endorse';
    } else {
      if($customer!=''){
        $status='Endorse';
      } else {
        $status='Ordered';
      }
    }

    $room_name = $this->input->post('room_name');

    $year = $this->input->post('year');
    if(empty($year)){$year=date("Y");}


    //var_dump($location); exit();

    $perform_date = $this->input->post('perform_date');

    //var_dump($perform_date); exit();


    /* CHECK BOX */
    $cb_1 = $this->input->post('cb_1'); if(empty($cb_1)){$cb_1='';}
    $cb_2 = $this->input->post('cb_2'); if(empty($cb_2)){$cb_2='';}
    $cb_3 = $this->input->post('cb_3'); if(empty($cb_3)){$cb_3='';}
    $cb_4 = $this->input->post('cb_4'); if(empty($cb_4)){$cb_4='';}
    $cb_5 = $this->input->post('cb_5'); if(empty($cb_5)){$cb_5='';}
    $cb_6 = $this->input->post('cb_6'); if(empty($cb_6)){$cb_6='';}
    $cb_7 = $this->input->post('cb_7'); if(empty($cb_7)){$cb_7='';}
    $cb_8 = $this->input->post('cb_8'); if(empty($cb_8)){$cb_8='';}
    $cb_9 = $this->input->post('cb_9'); if(empty($cb_9)){$cb_9='';}
    $cb_10 = $this->input->post('cb_10'); if(empty($cb_10)){$cb_10='';}
    $cb_11 = $this->input->post('cb_11'); if(empty($cb_11)){$cb_11='';}
    $cb_12 = $this->input->post('cb_12'); if(empty($cb_12)){$cb_12='';}
    $cb_13 = $this->input->post('cb_13'); if(empty($cb_13)){$cb_13='';}
    $cb_14 = $this->input->post('cb_14'); if(empty($cb_14)){$cb_14='';}
    $cb_15 = $this->input->post('cb_15'); if(empty($cb_15)){$cb_15='';}
    $cb_16 = $this->input->post('cb_16'); if(empty($cb_16)){$cb_16='';}
    $cb_17 = $this->input->post('cb_17'); if(empty($cb_17)){$cb_17='';}
    $cb_18 = $this->input->post('cb_18'); if(empty($cb_18)){$cb_18='';}


    // ppm_computer_device
    $ppm_list_checkbox = array(
                    "id_number"=>$id_number,
                    "cb_1"=>$cb_1,
                    "cb_2"=>$cb_2,
                    "cb_3"=>$cb_3,
                    "cb_4"=>$cb_4,
                    "cb_5"=>$cb_5,
                    "cb_6"=>$cb_6,
                    "cb_7"=>$cb_7,
                    "cb_8"=>$cb_8,
                    "cb_9"=>$cb_9,
                    "cb_10"=>$cb_10,
                    "cb_11"=>$cb_11,
                    "cb_12"=>$cb_12,
                    "cb_13"=>$cb_13,
                    "cb_14"=>$cb_14,
                    "cb_15"=>$cb_15,
                    "cb_16"=>$cb_16,
                    "cb_17"=>$cb_17,
                    "cb_18"=>$cb_18
                 );

    $this->db->insert('ppm_list_checkbox',$ppm_list_checkbox);
    /* CHECK BOX */


    $data = array(
                    "hostname"=>$hostname,
                    "location"=>$location,
                    "year"=> $year,
                    "ppm_type"=>$type_ppm,
                    "ppm_device"=>$type_device,
                    "responsible"=>$responsible,
                    "id_number"=>$id_number,
                    "acknowledge"=>$customer,
                    "created_date"=>$datetime,
                    "status"=>$status,
                    "id_reference"=>$id_reference,
                    "code_reference"=>$code,
                    "endorse"=>$endorse,
                    'type_ppm_activity'=>$ppm_id,
                    'status_ppm'=>'Performed',
                    'department'=>$department,
                    'perform_date'=>$perform_date
                 );

   #var_dump($data); exit();

    $this->db->insert('ppm_register',$data);


    // ppm_computer_device
    $data2 = array(
                    "id_number"=>$id_number,
                    "ppm_type"=>$type_ppm,
                    "hostname"=>$hostname,
                    "location"=>$location,
                    "brand"=>$brand,
                    "department"=>$department,
                    "cpu_brand"=>$brand,
                    "cpu_level"=>$level,
                    "cpu_serial_number"=>$serial_number,
                    "cpu_processor_type"=>$processor_type,
                    "cpu_ram"=>$ram,
                    "cpu_model"=>$model,
                    "monitor_brand"=>$monitor_brand,
                    "monitor_model"=>$monitor_model,
                    "monitor_serial_number"=>$monitor_serial_number,
                    "ups_brand"=>$ups_brand,
                    "ups_model"=>$ups_model,
                    "ups_serial_number"=>$ups_serial_no,
                    "network_port"=>$port,
                    "network_type"=>$type_ip,
                    "network_ip"=>$ip,
                    "tagging_device"=>$device_tag,
                    "tagging_date"=>$date_replacement,
                    "tagging_replace"=>$need_replacement,
                    "tagging_tag"=>$ppm_tag,
                    "room_name"=>$room_name
                 );

    $this->db->insert('ppm_computer_device',$data2);


    // ppm_computer_checklist

    $data3 = array(
                    "id_number"=>$id_number,
                    "checklist_1"=>$checklist_1,
                    "checklist_2"=>$checklist_2,
                    "checklist_3"=>$checklist_3,
                    "checklist_4"=>$checklist_4,
                    "checklist_5"=>$checklist_5,
                    "checklist_6"=>$checklist_6,
                    "checklist_7"=>$checklist_7,
                    "checklist_8"=>$checklist_8,
                    "checklist_9"=>$checklist_9,
                    "physical_1"=>$physical_1,
                    "physical_2"=>$physical_2,
                    "physical_3"=>$physical_3,
                    "physical_4"=>$physical_4,
                    "physical_5"=>$physical_5,
                    "physical_6"=>$physical_6,
                    "physical_7"=>$physical_7,
                    "physical_8"=>$physical_8,
                    "defrag_1"=>$defrag_1,
                    "defrag_2"=>$defrag_2,
                    "defrag_3"=>$defrag_3,
                    "defrag_4"=>$defrag_4,
                    "defrag_5"=>$defrag_5,
                    "defrag_6"=>$defrag_6,
                    "analysis"=>$analysis,
                    "type_defrag"=>$type_defrag,
                    "win_update"=>$win_update,
                    "check_antivirus"=>$check_antivirus,
                    "perform_antivirus"=>$perform_antivirus


                 ); 

    $this->db->insert('ppm_computer_checklist',$data3);

    $data4 = array(
                    "id_number"=>$id_number,
                    "comment"=>$comment
                  );

    $this->db->insert('ppm_comment',$data4);



    //update computer
    $data_asset = array(
                    "location"=>$location,
                    "CPU"=>$brand,
                    "cpu_model"=>$model,
                    "serial_number"=>$serial_number,
                    "ram"=>$ram,
                    "processor_type"=>$processor_type,
                    "monitor_brand"=>$monitor_brand,
                    "monitor_model"=>$monitor_model,
                    "monitor_serial_no"=>$monitor_serial_number,
                    "ups_brand"=>$ups_brand,
                    "ups_model"=>$ups_model,
                    "ups_serial_no"=>$ups_serial_no,
                    "network_port"=>$port,
                    "ip"=>$ip,
                 );

    $this->db->where('name',$hostname);
    $this->db->update('computer',$data_asset);

    
    $data_location = array("department"=>$department,"level"=>$level,"room_name"=>$room_name);
    $this->db->where('name',$location);
    $this->db->update('location',$data_location);


    $data_asset= array("department"=>$department);
    $this->db->where('name',$hostname);
    $this->db->update('ppm_worksation_asset',$data_asset);

    //redirect('Form_PPM/List_Computer');
    redirect('Form_PPM/data_workstation/'.$ppm_id);

  }

  function Update_Computer()
  {
    
    $id_number = $this->input->post('id');
    // $id_number = hex2bin($id_number);
    //var_dump($id_number);
    //exit();
    $get_agent = $this->get_agent($id_number);

    

    $type_ppm = $this->input->post('type_ppm');
    $type_device = $this->input->post('type_device');
    //$responsible = $this->input->post('responsible');
    $responsible = $this->session->userdata('first_name');

    $hostname = $this->input->post('hostname');
    $location = $this->input->post('location');
    $level = $this->input->post('level');
    $department = $this->input->post('department');
    $brand = $this->input->post('brand');
    $processor_type = $this->input->post('processor_type');
    $model = $this->input->post('model');
    $ram = $this->input->post('ram');
    $serial_number = $this->input->post('serial_number');
    $monitor_brand = $this->input->post('monitor_brand');
    $monitor_model = $this->input->post('monitor_model');
    $monitor_serial_number = $this->input->post('monitor_serial_number');
    $ups_brand = $this->input->post('ups_brand');
    $ups_model = $this->input->post('ups_model');
    $ups_serial_no = $this->input->post('ups_serial_no');
    $port = $this->input->post('port');
    $type_ip = $this->input->post('type_ip');
    $ip = $this->input->post('ip');
    $device_tag = $this->input->post('device_tag');
    $need_replacement = $this->input->post('need_replacement');
    $date_replacement = $this->input->post('date_replacement');
    $ppm_tag = $this->input->post('ppm_tag');


    $checklist_1 = $this->input->post('checklist_1');
    $checklist_2 = $this->input->post('checklist_2');
    $checklist_3 = $this->input->post('checklist_3');
    $checklist_4 = $this->input->post('checklist_4');
    $checklist_5 = $this->input->post('checklist_5');
    $checklist_6 = $this->input->post('checklist_6');
    $checklist_7 = $this->input->post('checklist_7');
    $checklist_8 = $this->input->post('checklist_8');
    $checklist_9 = $this->input->post('checklist_9');

    $physical_1 = $this->input->post('physical_1');
    $physical_2 = $this->input->post('physical_2');
    $physical_3 = $this->input->post('physical_3');
    $physical_4 = $this->input->post('physical_4');
    $physical_5 = $this->input->post('physical_5');
    $physical_6 = $this->input->post('physical_6');
    $physical_7 = $this->input->post('physical_7');
    $physical_8 = $this->input->post('physical_8');


    $defrag_1 = $this->input->post('defrag_1');
    $defrag_2 = $this->input->post('defrag_2');
    $defrag_3 = $this->input->post('defrag_3');
    $defrag_4 = $this->input->post('defrag_4');
    $defrag_5 = $this->input->post('defrag_5');
    $defrag_6 = $this->input->post('defrag_6');

    $analysis = $this->input->post('analysis');
    $type_defrag = $this->input->post('type_defrag');

    $win_update = $this->input->post('win_update');
    $check_antivirus = $this->input->post('check_antivirus');
    $perform_antivirus = $this->input->post('perform_antivirus');


    $comment = $this->input->post('comment');

    $customer = $this->input->post('customer');
    $acknowledge = $this->input->post('acknowledge');

    $id_number = $this->input->post('id');

    //default data 
    $updateBy = $this->session->userdata('userid'); // id yang login system
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("H:i");
    $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    $datetime = $dateReg.' '.$timeReg; //current date 



    $endorse = $this->input->post('acknowledge');

    if($endorse!=''){
      $status='Endorse';
    } else {
      if($customer!=''){
        $status='Endorse';
      } else {
        $status='Ordered';
      }
    }


    $reject_ppm_task = $this->input->post('reject_ppm_task');
    $reason_reject = $this->input->post('reason_reject');

    if($reject_ppm_task=='Yes'){
      $status='Rejected';

      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $date_reject= $dateReg.' '.$timeReg; //current date 
    } else {
      $date_reject = '';
    }

    if($reject_ppm_task=='No'){
      $status='Done';
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $date_endorse = $dateReg.' '.$timeReg; //current date 
    } else {
      $date_endorse = '';
    }



    /* CHECK BOX */
    $cb_1 = $this->input->post('cb_1'); if(empty($cb_1)){$cb_1='';}
    $cb_2 = $this->input->post('cb_2'); if(empty($cb_2)){$cb_2='';}
    $cb_3 = $this->input->post('cb_3'); if(empty($cb_3)){$cb_3='';}
    $cb_4 = $this->input->post('cb_4'); if(empty($cb_4)){$cb_4='';}
    $cb_5 = $this->input->post('cb_5'); if(empty($cb_5)){$cb_5='';}
    $cb_6 = $this->input->post('cb_6'); if(empty($cb_6)){$cb_6='';}
    $cb_7 = $this->input->post('cb_7'); if(empty($cb_7)){$cb_7='';}
    $cb_8 = $this->input->post('cb_8'); if(empty($cb_8)){$cb_8='';}
    $cb_9 = $this->input->post('cb_9'); if(empty($cb_9)){$cb_9='';}
    $cb_10 = $this->input->post('cb_10'); if(empty($cb_10)){$cb_10='';}
    $cb_11 = $this->input->post('cb_11'); if(empty($cb_11)){$cb_11='';}
    $cb_12 = $this->input->post('cb_12'); if(empty($cb_12)){$cb_12='';}
    $cb_13 = $this->input->post('cb_13'); if(empty($cb_13)){$cb_13='';}
    $cb_14 = $this->input->post('cb_14'); if(empty($cb_14)){$cb_14='';}
    $cb_15 = $this->input->post('cb_15'); if(empty($cb_15)){$cb_15='';}
    $cb_16 = $this->input->post('cb_16'); if(empty($cb_16)){$cb_16='';}
    $cb_17 = $this->input->post('cb_17'); if(empty($cb_17)){$cb_17='';}
    $cb_18 = $this->input->post('cb_18'); if(empty($cb_18)){$cb_18='';}


    // ppm_computer_device
    $ppm_list_checkbox = array(
                    "cb_1"=>$cb_1,
                    "cb_2"=>$cb_2,
                    "cb_3"=>$cb_3,
                    "cb_4"=>$cb_4,
                    "cb_5"=>$cb_5,
                    "cb_6"=>$cb_6,
                    "cb_7"=>$cb_7,
                    "cb_8"=>$cb_8,
                    "cb_9"=>$cb_9,
                    "cb_10"=>$cb_10,
                    "cb_11"=>$cb_11,
                    "cb_12"=>$cb_12,
                    "cb_13"=>$cb_13,
                    "cb_14"=>$cb_14,
                    "cb_15"=>$cb_15,
                    "cb_16"=>$cb_16,
                    "cb_17"=>$cb_17,
                    "cb_18"=>$cb_18
                 );

    //var_dump($ppm_list_checkbox); exit();
    $this->db->where('id_number',$id_number);
    $this->db->update('ppm_list_checkbox',$ppm_list_checkbox);
    /* CHECK BOX */

    //exit();


    //if($get_agent==$this->session->userdata('first_name')){

    $perform_date = $this->input->post('perform_date');

    $room_name = $this->input->post('room_name');

      $year = $this->input->post('year');
      if(empty($year)){$year=date("Y");}
      
      $this->db->where("id_number",$id_number);
      $data = array(
                      "hostname"=>$hostname,
                      "location"=>$location,
                      "year"=> $year,
                      "ppm_type"=>$type_ppm,
                      "ppm_device"=>$type_device,
                      // "responsible"=>$responsible,
                      "acknowledge"=>$customer,
                      "status"=>$status,
                      "endorse"=>$acknowledge,
                      "reject_ppm_task"=>$reject_ppm_task,
                      "reason_reject"=>$reason_reject,
                      "date_endorse"=>$date_endorse,
                      "date_reject"=>$date_reject,
                      "department"=>$department,
                      "perform_date"=>$perform_date
                   );

      //var_dump($data); 
      //exit();

      $this->db->update('ppm_register',$data);


      // ppm_computer_device
      $this->db->where("id_number",$id_number);
      $data2 = array(
                      "ppm_type"=>$type_ppm,
                      "hostname"=>$hostname,
                      "location"=>$location,
                      "brand"=>$brand,
                      "department"=>$department,
                      "cpu_brand"=>$brand,
                      "cpu_level"=>$level,
                      "cpu_serial_number"=>$serial_number,
                      "cpu_processor_type"=>$processor_type,
                      "cpu_ram"=>$ram,
                      "cpu_model"=>$model,
                      "monitor_brand"=>$monitor_brand,
                      "monitor_model"=>$monitor_model,
                      "monitor_serial_number"=>$monitor_serial_number,
                      "ups_brand"=>$ups_brand,
                      "ups_model"=>$ups_model,
                      "ups_serial_number"=>$ups_serial_no,
                      "network_port"=>$port,
                      "network_type"=>$type_ip,
                      "network_ip"=>$ip,
                      "tagging_device"=>$device_tag,
                      "tagging_date"=>$date_replacement,
                      "tagging_replace"=>$need_replacement,
                      "tagging_tag"=>$ppm_tag,
                      "room_name"=>$room_name
                   );

      // var_dump($data2); 
      // exit();


      $this->db->update('ppm_computer_device',$data2);


      // ppm_computer_checklist

      $this->db->where("id_number",$id_number);
      $data3 = array(
                      "checklist_1"=>$checklist_1,
                      "checklist_2"=>$checklist_2,
                      "checklist_3"=>$checklist_3,
                      "checklist_4"=>$checklist_4,
                      "checklist_5"=>$checklist_5,
                      "checklist_6"=>$checklist_6,
                      "checklist_7"=>$checklist_7,
                      "checklist_8"=>$checklist_8,
                      "checklist_9"=>$checklist_9,
                      "physical_1"=>$physical_1,
                      "physical_2"=>$physical_2,
                      "physical_3"=>$physical_3,
                      "physical_4"=>$physical_4,
                      "physical_5"=>$physical_5,
                      "physical_6"=>$physical_6,
                      "physical_7"=>$physical_7,
                      "physical_8"=>$physical_8,
                      "defrag_1"=>$defrag_1,
                      "defrag_2"=>$defrag_2,
                      "defrag_3"=>$defrag_3,
                      "defrag_4"=>$defrag_4,
                      "defrag_5"=>$defrag_5,
                      "defrag_6"=>$defrag_6,
                      "analysis"=>$analysis,
                      "type_defrag"=>$type_defrag,
                      "win_update"=>$win_update,
                      "check_antivirus"=>$check_antivirus,
                      "perform_antivirus"=>$perform_antivirus


                   ); 

      $this->db->update('ppm_computer_checklist',$data3);

      $this->db->where("id_number",$id_number);
      $data4 = array(
                      "comment"=>$comment
                    );

      $this->db->update('ppm_comment',$data4);



      //echo 'Diri sendiri';
    // } else {
    //   //echo 'Orang lain';

    //   $this->db->where("id_number",$id_number);
    //   $data = array(
                      
    //                   "status"=>$status,
    //                   "reject_ppm_task"=>$reject_ppm_task,
    //                   "reason_reject"=>$reason_reject,
    //                   "date_endorse"=>$date_endorse,
    //                   "date_reject"=>$date_reject,
    //                );

    //   #var_dump($data); exit();

    //   $this->db->update('ppm_register',$data);

      


    // } 


    //update computer
    $data_asset = array(
                    "location"=>$location,
                    "CPU"=>$brand,
                    "cpu_model"=>$model,
                    "serial_number"=>$serial_number,
                    "ram"=>$ram,
                    "processor_type"=>$processor_type,
                    "monitor_brand"=>$monitor_brand,
                    "monitor_model"=>$monitor_model,
                    "monitor_serial_no"=>$monitor_serial_number,
                    "ups_brand"=>$ups_brand,
                    "ups_model"=>$ups_model,
                    "ups_serial_no"=>$ups_serial_no,
                    "network_port"=>$port,
                    "ip"=>$ip,
                 );

    $this->db->where('name',$hostname);
    $this->db->update('computer',$data_asset);

    
    $data_location = array("department"=>$department,"level"=>$level,"room_name"=>$room_name);
    $this->db->where('name',$location);
    $this->db->update('location',$data_location);


    $data_asset= array("department"=>$department);
    $this->db->where('name',$hostname);
    $this->db->update('ppm_worksation_asset',$data_asset);

    //var_dump($data_asset); exit();

    //redirect('Form_PPM/List_Computer');
    $get_from_id = $this->input->post('get_from_id');
    $ppm_id = $this->input->post('ppm_id');
    redirect('Form_PPM/data_workstation/'.$ppm_id);

  }


  function get_agent($id_number)
  {
      $this->db->where('id_number',$id_number);
      $query =  $this->db->get('ppm_register')->result();
      foreach ($query as $data) 
      {
        return $data->responsible;
      }
  }


  function get_person_verify($id_number)
  {
      $this->db->where('id_number',$id_number);
      $query =  $this->db->get('ppm_register')->result();
      foreach ($query as $data) 
      {
        return $data->acknowledge;
      }
  }


  function Add_Notebook()
  {

    $ppm_id = $this->input->post('ppm_id');

    $type_ppm = $this->input->post('type_ppm');
    $type_device = $this->input->post('type_device');
    
    //$responsible = $this->input->post('responsible');
    $responsible = $this->session->userdata('first_name');

    $hostname = $this->input->post('hostname');
    $location = $this->input->post('location');
    $level = $this->input->post('level');
    $department = $this->input->post('department');
    $brand = $this->input->post('brand');
    $processor_type = $this->input->post('processor_type');
    $model = $this->input->post('model');
    $ram = $this->input->post('ram');
    $serial_number = $this->input->post('serial_number');
    $monitor_brand = $this->input->post('monitor_brand');
    $monitor_model = $this->input->post('monitor_model');
    $monitor_serial_number = $this->input->post('monitor_serial_number');
    $ups_brand = $this->input->post('ups_brand');
    $ups_model = $this->input->post('ups_model');
    $ups_serial_no = $this->input->post('ups_serial_no');
    $port = $this->input->post('port');
    $type_ip = $this->input->post('type_ip');
    $ip = $this->input->post('ip');
    $device_tag = $this->input->post('device_tag');
    $need_replacement = $this->input->post('need_replacement');
    $date_replacement = $this->input->post('date_replacement');
    $ppm_tag = $this->input->post('ppm_tag');


    $checklist_1 = $this->input->post('checklist_1');
    $checklist_2 = $this->input->post('checklist_2');
    $checklist_3 = $this->input->post('checklist_3');
    $checklist_4 = $this->input->post('checklist_4');
    $checklist_5 = $this->input->post('checklist_5');
    $checklist_6 = $this->input->post('checklist_6');
    $checklist_7 = $this->input->post('checklist_7');
    $checklist_8 = $this->input->post('checklist_8');

    $physical_1 = $this->input->post('physical_1');
    $physical_2 = $this->input->post('physical_2');
    $physical_3 = $this->input->post('physical_3');
    $physical_4 = $this->input->post('physical_4');
    $physical_5 = $this->input->post('physical_5');
    $physical_6 = $this->input->post('physical_6');
    $physical_7 = $this->input->post('physical_7');

    $analysis = $this->input->post('analysis');
    $type_defrag = $this->input->post('type_defrag');

    $win_update = $this->input->post('win_update');
    $check_antivirus = $this->input->post('check_antivirus');
    $perform_antivirus = $this->input->post('perform_antivirus');


    $defrag_1 = $this->input->post('defrag_1');
    $defrag_2 = $this->input->post('defrag_2');
    $defrag_3 = $this->input->post('defrag_3');
    $defrag_4 = $this->input->post('defrag_4');
    $defrag_5 = $this->input->post('defrag_5');
    $defrag_6 = $this->input->post('defrag_6');


    $comment = $this->input->post('comment');

    $customer = $this->input->post('customer');
    $acknowledge = $this->input->post('acknowledge');

    $id_number = rand();

    //default data 
    $updateBy = $this->session->userdata('userid'); // id yang login system
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("H:i");
    $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    $datetime = $dateReg.' '.$timeReg; //current date 


    //generated_code 
    $code = 'N';
    $number  = '1';
    $ref = str_pad($number,6,"0",STR_PAD_LEFT); // 0001

    $check = $this->Admin->check_id_ppm($code);

    if(!empty($check)){
      $number = intval($check) + 1;
      $ref = str_pad($number,6,"0",STR_PAD_LEFT); // 0001
    }

    $id_reference = $ref;


    $endorse = $this->input->post('acknowledge');

    if($endorse!=''){
      $status='Endorse';
    } else {
      if($customer!=''){
        $status='Need Verify';
      } else {
        $status='Ordered';
      }
    }


    $room_name = $this->input->post('room_name');

    $year = $this->input->post('year');
    if(empty($year)){$year=date("Y");}


    $ppm_id = $this->input->post('ppm_id');


    $perform_date = $this->input->post('perform_date');


    /* CHECK BOX */
    $cb_1 = $this->input->post('cb_1'); if(empty($cb_1)){$cb_1='';}
    $cb_2 = $this->input->post('cb_2'); if(empty($cb_2)){$cb_2='';}
    $cb_3 = $this->input->post('cb_3'); if(empty($cb_3)){$cb_3='';}
    $cb_4 = $this->input->post('cb_4'); if(empty($cb_4)){$cb_4='';}
    $cb_5 = $this->input->post('cb_5'); if(empty($cb_5)){$cb_5='';}
    $cb_6 = $this->input->post('cb_6'); if(empty($cb_6)){$cb_6='';}
    $cb_7 = $this->input->post('cb_7'); if(empty($cb_7)){$cb_7='';}
    $cb_8 = $this->input->post('cb_8'); if(empty($cb_8)){$cb_8='';}
    $cb_9 = $this->input->post('cb_9'); if(empty($cb_9)){$cb_9='';}
    $cb_10 = $this->input->post('cb_10'); if(empty($cb_10)){$cb_10='';}
    $cb_11 = $this->input->post('cb_11'); if(empty($cb_11)){$cb_11='';}
    $cb_12 = $this->input->post('cb_12'); if(empty($cb_12)){$cb_12='';}


    $ppm_list_checkbox = array(
                    "id_number"=>$id_number,
                    "cb_1"=>$cb_1,
                    "cb_2"=>$cb_2,
                    "cb_3"=>$cb_3,
                    "cb_4"=>$cb_4,
                    "cb_5"=>$cb_5,
                    "cb_6"=>$cb_6,
                    "cb_7"=>$cb_7,
                    "cb_8"=>$cb_8,
                    "cb_9"=>$cb_9,
                    "cb_10"=>$cb_10,
                    "cb_11"=>$cb_11,
                    "cb_12"=>$cb_12
                 );

    $this->db->insert('ppm_list_checkbox',$ppm_list_checkbox);
    /* CHECK BOX */



    $data = array(
                    "hostname"=>$hostname,
                    "location"=>$location,
                    "year"=> $year,
                    "ppm_type"=>$type_ppm,
                    "ppm_device"=>$type_device,
                    "responsible"=>$responsible,
                    "id_number"=>$id_number,
                    "acknowledge"=>$customer,
                    "created_date"=>$datetime,
                    "status"=>$status,
                    "id_reference"=>$id_reference,
                    "code_reference"=>$code,
                    "endorse"=>$acknowledge,
                    "type_ppm_activity"=>$ppm_id,
                    'status_ppm'=>'Performed',
                    "department"=>$department,
                    "perform_date"=>$perform_date
                 );

    $this->db->insert('ppm_register',$data);

    // ppm_computer_device
    $data2 = array(
                    "id_number"=>$id_number,
                    "ppm_type"=>$type_ppm,
                    "hostname"=>$hostname,
                    "location"=>$location,
                    "brand"=>$brand,
                    "department"=>$department,
                    "cpu_brand"=>$brand,
                    "cpu_level"=>$level,
                    "cpu_serial_number"=>$serial_number,
                    "cpu_processor_type"=>$processor_type,
                    "cpu_ram"=>$ram,
                    "cpu_model"=>$model,
                    "monitor_brand"=>$monitor_brand,
                    "monitor_model"=>$monitor_model,
                    "monitor_serial_number"=>$monitor_serial_number,
                    "ups_brand"=>$ups_brand,
                    "ups_model"=>$ups_model,
                    "ups_serial_number"=>$ups_serial_no,
                    "network_port"=>$port,
                    "network_type"=>$type_ip,
                    "network_ip"=>$ip,
                    "tagging_device"=>$device_tag,
                    "tagging_date"=>$date_replacement,
                    "tagging_replace"=>$need_replacement,
                    "tagging_tag"=>$ppm_tag,
                    "room_name"=>$room_name
                 );

    $this->db->insert('ppm_computer_device',$data2);

    // ppm_computer_checklist

    $data3 = array(
                    "id_number"=>$id_number,
                    "checklist_1"=>$checklist_1,
                    "checklist_2"=>$checklist_2,
                    "checklist_3"=>$checklist_3,
                    "checklist_4"=>$checklist_4,
                    "checklist_5"=>$checklist_5,
                    "checklist_6"=>$checklist_6,
                    "checklist_7"=>$checklist_7,
                    "checklist_8"=>$checklist_8,
                    "physical_1"=>$physical_1,
                    "physical_2"=>$physical_2,
                    "physical_3"=>$physical_3,
                    "physical_4"=>$physical_4,
                    "physical_5"=>$physical_5,
                    "physical_6"=>$physical_6,
                    "physical_7"=>$physical_7,
                    "defrag_1"=>$defrag_1,
                    "defrag_2"=>$defrag_2,
                    "defrag_3"=>$defrag_3,
                    "defrag_4"=>$defrag_4,
                    "defrag_5"=>$defrag_5,
                    "defrag_6"=>$defrag_6,
                    "analysis"=>$analysis,
                    "type_defrag"=>$type_defrag,
                    "win_update"=>$win_update,
                    "check_antivirus"=>$check_antivirus,
                    "perform_antivirus"=>$perform_antivirus


                 ); 

    $this->db->insert('ppm_computer_checklist',$data3);

    $data4 = array(
                    "id_number"=>$id_number,
                    "comment"=>$comment
                  );

    $this->db->insert('ppm_comment',$data4);


    // $hostname = $this->input->post('hostname');
    // $location = $this->input->post('location');
    // $level = $this->input->post('level');
    // $department = $this->input->post('department');
    // $brand = $this->input->post('brand');
    // $processor_type = $this->input->post('processor_type');
    // $model = $this->input->post('model');
    // $ram = $this->input->post('ram');
    // $serial_number = $this->input->post('serial_number');
    // $monitor_brand = $this->input->post('monitor_brand');
    // $monitor_model = $this->input->post('monitor_model');
    // $monitor_serial_number = $this->input->post('monitor_serial_number');
    // $ups_brand = $this->input->post('ups_brand');
    // $ups_model = $this->input->post('ups_model');
    // $ups_serial_no = $this->input->post('ups_serial_no');
    // $port = $this->input->post('port');
    // $type_ip = $this->input->post('type_ip');
    // $ip = $this->input->post('ip');
    // $device_tag = $this->input->post('device_tag');
    // $need_replacement = $this->input->post('need_replacement');
    // $date_replacement = $this->input->post('date_replacement');
    // $ppm_tag = $this->input->post('ppm_tag');

    //update computer
    $data_asset = array(
                    "location"=>$location,
                    "CPU"=>$brand,
                    "cpu_model"=>$model,
                    "cpu_serial_no"=>$serial_number,
                    "ram"=>$ram,
                    "processor_type"=>$processor_type,
                    "monitor_brand"=>$monitor_brand,
                    "monitor_model"=>$monitor_model,
                    "monitor_serial_no"=>$monitor_serial_number,
                    "ups_brand"=>$ups_brand,
                    "ups_model"=>$ups_model,
                    "ups_serial_no"=>$ups_serial_no,
                    "network_port"=>$port,
                    "ip"=>$ip,
                 );

    $this->db->where('name',$hostname);
    $this->db->update('computer',$data_asset);

    
    $data_location = array("department"=>$department,"level"=>$level,"room_name"=>$room_name);
    $this->db->where('name',$location);
    $this->db->update('location',$data_location);


    $data_asset= array("department"=>$department);
    $this->db->where('name',$hostname);
    $this->db->update('ppm_worksation_asset',$data_asset);

    //redirect('Form_PPM/List_Computer');
    redirect('Form_PPM/data_workstation/'.$ppm_id);
  }

  function Update_Notebook()
  {


    $id_number = $this->input->post('id');
    $get_agent = $this->get_agent($id_number);

    $type_ppm = $this->input->post('type_ppm');
    $type_device = $this->input->post('type_device');
    
    $responsible = $this->input->post('responsible');


    $hostname = $this->input->post('hostname');
    $location = $this->input->post('location');
    $level = $this->input->post('level');
    $department = $this->input->post('department');
    $brand = $this->input->post('brand');
    $processor_type = $this->input->post('processor_type');
    $model = $this->input->post('model');
    $ram = $this->input->post('ram');
    $serial_number = $this->input->post('serial_number');
    $monitor_brand = $this->input->post('monitor_brand');
    $monitor_model = $this->input->post('monitor_model');
    $monitor_serial_number = $this->input->post('monitor_serial_number');
    $ups_brand = $this->input->post('ups_brand');
    $ups_model = $this->input->post('ups_model');
    $ups_serial_no = $this->input->post('ups_serial_no');
    $port = $this->input->post('port');
    $type_ip = $this->input->post('type_ip');
    $ip = $this->input->post('ip');
    $device_tag = $this->input->post('device_tag');
    $need_replacement = $this->input->post('need_replacement');
    $date_replacement = $this->input->post('date_replacement');
    $ppm_tag = $this->input->post('ppm_tag');


    $checklist_1 = $this->input->post('checklist_1');
    $checklist_2 = $this->input->post('checklist_2');
    $checklist_3 = $this->input->post('checklist_3');
    $checklist_4 = $this->input->post('checklist_4');
    $checklist_5 = $this->input->post('checklist_5');
    $checklist_6 = $this->input->post('checklist_6');
    $checklist_7 = $this->input->post('checklist_7');
    $checklist_8 = $this->input->post('checklist_8');
    $checklist_9 = $this->input->post('checklist_9');

    $physical_1 = $this->input->post('physical_1');
    $physical_2 = $this->input->post('physical_2');
    $physical_3 = $this->input->post('physical_3');
    $physical_4 = $this->input->post('physical_4');
    $physical_5 = $this->input->post('physical_5');
    $physical_6 = $this->input->post('physical_6');
    $physical_7 = $this->input->post('physical_7');

    $analysis = $this->input->post('analysis');
    $type_defrag = $this->input->post('type_defrag');

    $win_update = $this->input->post('win_update');
    $check_antivirus = $this->input->post('check_antivirus');
    $perform_antivirus = $this->input->post('perform_antivirus');


    $defrag_1 = $this->input->post('defrag_1');
    $defrag_2 = $this->input->post('defrag_2');
    $defrag_3 = $this->input->post('defrag_3');
    $defrag_4 = $this->input->post('defrag_4');
    $defrag_5 = $this->input->post('defrag_5');
    $defrag_6 = $this->input->post('defrag_6');


    $comment = $this->input->post('comment');

    $customer = $this->input->post('customer');
    $acknowledge = $this->input->post('acknowledge');

    $id_number = $this->input->post('id');

    // var_dump($id_number);
    // exit();
    //default data 
    $updateBy = $this->session->userdata('userid'); // id yang login system
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("H:i");
    $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    $datetime = $dateReg.' '.$timeReg; //current date 


    $endorse = $this->input->post('acknowledge');

    if($endorse!=''){
      $status='Endorse';
    } else {
      if($customer!=''){
        $status='Need Verify';
      } else {
        $status='Ordered';
      }
    }


    $reject_ppm_task = $this->input->post('reject_ppm_task');
    $reason_reject = $this->input->post('reason_reject');

    if($reject_ppm_task=='Yes'){
      $status='Rejected';

      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $date_reject= $dateReg.' '.$timeReg; //current date 
    } else {
      $date_reject = '';
    }

    if($reject_ppm_task=='No'){
      $status='Done';
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $date_endorse = $dateReg.' '.$timeReg; //current date 
    } else {
      $date_endorse = '';
    }

    $room_name = $this->input->post('room_name');

    $year = $this->input->post('year');
    if(empty($year)){$year=date("Y");}

    $perform_date = $this->input->post('perform_date');


    $type_ip = $this->input->post('type_ip');

    //var_dump($type_ip); exit();


    //if($get_agent==$this->session->userdata('first_name')){
    
    /* CHECK BOX */
    $cb_1 = $this->input->post('cb_1'); if(empty($cb_1)){$cb_1='';}
    $cb_2 = $this->input->post('cb_2'); if(empty($cb_2)){$cb_2='';}
    $cb_3 = $this->input->post('cb_3'); if(empty($cb_3)){$cb_3='';}
    $cb_4 = $this->input->post('cb_4'); if(empty($cb_4)){$cb_4='';}
    $cb_5 = $this->input->post('cb_5'); if(empty($cb_5)){$cb_5='';}
    $cb_6 = $this->input->post('cb_6'); if(empty($cb_6)){$cb_6='';}
    $cb_7 = $this->input->post('cb_7'); if(empty($cb_7)){$cb_7='';}
    $cb_8 = $this->input->post('cb_8'); if(empty($cb_8)){$cb_8='';}
    $cb_9 = $this->input->post('cb_9'); if(empty($cb_9)){$cb_9='';}
    $cb_10 = $this->input->post('cb_10'); if(empty($cb_10)){$cb_10='';}
    $cb_11 = $this->input->post('cb_11'); if(empty($cb_11)){$cb_11='';}
    $cb_12 = $this->input->post('cb_12'); if(empty($cb_12)){$cb_12='';}

    $ppm_list_checkbox = array(
                    "cb_1"=>$cb_1,
                    "cb_2"=>$cb_2,
                    "cb_3"=>$cb_3,
                    "cb_4"=>$cb_4,
                    "cb_5"=>$cb_5,
                    "cb_6"=>$cb_6,
                    "cb_7"=>$cb_7,
                    "cb_8"=>$cb_8,
                    "cb_9"=>$cb_9,
                    "cb_10"=>$cb_10,
                    "cb_11"=>$cb_11,
                    "cb_12"=>$cb_12
                 );

    //var_dump($ppm_list_checkbox); exit();
    $this->db->where('id_number',$id_number);
    $this->db->update('ppm_list_checkbox',$ppm_list_checkbox);


      $this->db->where("id_number",$id_number);
      $data = array(
                      "hostname"=>$hostname,
                      "location"=>$location,
                      "year"=>$year,
                      "ppm_type"=>$type_ppm,
                      "ppm_device"=>$type_device,
                      "responsible"=>$responsible,
                      "acknowledge"=>$customer,
                      "status"=>$status,
                      "endorse"=>$acknowledge,
                      "reject_ppm_task"=>$reject_ppm_task,
                      "reason_reject"=>$reason_reject,
                      "date_endorse"=>$date_endorse,
                      "date_reject"=>$date_reject,
                      "department"=>$department,
                      "perform_date"=>$perform_date
                   );

      #var_dump($data); exit();

      $this->db->update('ppm_register',$data);


      // ppm_computer_device
      $this->db->where("id_number",$id_number);
      $data2 = array(
                      "ppm_type"=>$type_ppm,
                      "hostname"=>$hostname,
                      "location"=>$location,
                      "brand"=>$brand,
                      "department"=>$department,
                      "cpu_brand"=>$brand,
                      "cpu_level"=>$level,
                      "cpu_serial_number"=>$serial_number,
                      "cpu_processor_type"=>$processor_type,
                      "cpu_ram"=>$ram,
                      "cpu_model"=>$model,
                      "monitor_brand"=>$monitor_brand,
                      "monitor_model"=>$monitor_model,
                      "monitor_serial_number"=>$monitor_serial_number,
                      "ups_brand"=>$ups_brand,
                      "ups_model"=>$ups_model,
                      "ups_serial_number"=>$ups_serial_no,
                      "network_port"=>$port,
                      "network_type"=>$type_ip,
                      "network_ip"=>$ip,
                      "tagging_device"=>$device_tag,
                      "tagging_date"=>$date_replacement,
                      "tagging_replace"=>$need_replacement,
                      "tagging_tag"=>$ppm_tag,
                      "room_name"=>$room_name
                   );

      $this->db->update('ppm_computer_device',$data2);


      // ppm_computer_checklist

      $this->db->where("id_number",$id_number);
      $data3 = array(
                      "checklist_1"=>$checklist_1,
                      "checklist_2"=>$checklist_2,
                      "checklist_3"=>$checklist_3,
                      "checklist_4"=>$checklist_4,
                      "checklist_5"=>$checklist_5,
                      "checklist_6"=>$checklist_6,
                      "checklist_7"=>$checklist_7,
                      "checklist_8"=>$checklist_8,
                      "checklist_9"=>$checklist_9,
                      "physical_1"=>$physical_1,
                      "physical_2"=>$physical_2,
                      "physical_3"=>$physical_3,
                      "physical_4"=>$physical_4,
                      "physical_5"=>$physical_5,
                      "physical_6"=>$physical_6,
                      "physical_7"=>$physical_7,
                      "defrag_1"=>$defrag_1,
                      "defrag_2"=>$defrag_2,
                      "defrag_3"=>$defrag_3,
                      "defrag_4"=>$defrag_4,
                      "defrag_5"=>$defrag_5,
                      "defrag_6"=>$defrag_6,
                      "analysis"=>$analysis,
                      "type_defrag"=>$type_defrag,
                      "win_update"=>$win_update,
                      "check_antivirus"=>$check_antivirus,
                      "perform_antivirus"=>$perform_antivirus


                   ); 

      $this->db->update('ppm_computer_checklist',$data3);


      $this->db->where("id_number",$id_number);
      $data4 = array(
                      "comment"=>$comment
                    );

      $this->db->update('ppm_comment',$data4);

    // } else {



    //   $this->db->where("id_number",$id_number);
    //   $data = array(
    //                   "status"=>$status,
    //                   "reject_ppm_task"=>$reject_ppm_task,
    //                   "reason_reject"=>$reason_reject,
    //                   "date_endorse"=>$date_endorse,
    //                   "date_reject"=>$date_reject,
    //                );

    //   #var_dump($data); exit();

    //   $this->db->update('ppm_register',$data);


      

    //   //redirect('Form_PPM/List_Computer'); 

    //   redirect('Form_PPM/data_workstation/1');

    // }



    //update computer
    $data_asset = array(
                  "location"=>$location,
                  "CPU"=>$brand,
                  "cpu_model"=>$model,
                  "cpu_serial_no"=>$serial_number,
                  "ram"=>$ram,
                  "processor_type"=>$processor_type,
                  "monitor_brand"=>$monitor_brand,
                  "monitor_model"=>$monitor_model,
                  "monitor_serial_no"=>$monitor_serial_number,
                  "ups_brand"=>$ups_brand,
                  "ups_model"=>$ups_model,
                  "ups_serial_no"=>$ups_serial_no,
                  "network_port"=>$port,
                  "ip"=>$ip,
               );

    $this->db->where('name',$hostname);
    $this->db->update('computer',$data_asset);


    $data_location = array("department"=>$department,"level"=>$level,"room_name"=>$room_name);
    $this->db->where('name',$location);
    $this->db->update('location',$data_location);


    $data_asset= array("department"=>$department);
    $this->db->where('name',$hostname);
    $this->db->update('ppm_worksation_asset',$data_asset);

    $ppm_id = $this->input->post('ppm_id');
    redirect('Form_PPM/data_workstation/'.$ppm_id);


  }


  function Update_Computer_Outside()
  {


    $u = $this->input->post('u');
    $ppm_id = $this->input->post('ppm_id');

    $d = $this->input->post('d');
    $t = $this->input->post('t');
    $s = $this->input->post('s');

    $idn =  $this->input->post('get_from_id');

    //var_dump($idn); exit();
    
      

    $this->db->where('id_number',$idn);
    $data = array('status_ppm'=>'Acknowledge');
    $this->db->update('ppm_register',$data);

    $sql = base_url()."Form_PPM/Form_PPM_Client_Work/1?q=".$ppm_id."&u=".$u."&t=".$t."&d=".$d."&s=".$s;

    redirect($sql);
  }

  function Update_Notebook_Outside()
  {


    $u = $this->input->post('u');
    $ppm_id = $this->input->post('ppm_id');

    $d = $this->input->post('d');
    $t = $this->input->post('t');
    $s = $this->input->post('s');

    $idn =  $this->input->post('get_from_id');

    //var_dump($idn); exit();



    $this->db->where('id_number',$idn);
    $data = array('status_ppm'=>'Acknowledge');
    $this->db->update('ppm_register',$data);

    $sql = base_url()."Form_PPM/Form_PPM_Client_Work/1?q=".$ppm_id."&u=".$u."&t=".$t."&d=".$d."&s=".$s;

    redirect($sql);
  }


  function Update_Printer_Outside()
  {


    $u = $this->input->post('u');
    $ppm_id = $this->input->post('ppm_id');

    $d = $this->input->post('d');
    $t = $this->input->post('t');
    $s = $this->input->post('s');

    $idn =  $this->input->post('get_from_id');

    //var_dump($idn); exit();
    
      

    $this->db->where('id_number',$idn);
    $data = array('status_ppm'=>'Acknowledge');
    $this->db->update('ppm_register',$data);

    $sql = base_url()."Form_PPM/Form_PPM_Client_Work/1?q=".$ppm_id."&u=".$u."&t=".$t."&d=".$d."&s=".$s;

    redirect($sql);
  }

  function Add_Server()
  {

    $ppm_id = $this->input->post('ppm_id');

    //var_dump($ppm_id); exit();

    $type_ppm = $this->input->post('type_ppm');
    $type_device = $this->input->post('type_device');
    $quarter = $this->input->post('quarter');
    //$responsible = $this->input->post('responsible');

    $responsible = $this->session->userdata('first_name');

    $hostname = $this->input->post('hostname');
    $location = $this->input->post('location');
    $level = $this->input->post('level');
    $department = $this->input->post('department');
    $brand = $this->input->post('brand');
    $processor_type = $this->input->post('processor_type');
    $model = $this->input->post('model');
    $ram = $this->input->post('ram');
    $serial_number = $this->input->post('cpu_serial_number');
    $monitor_brand = $this->input->post('monitor_brand');
    $monitor_model = $this->input->post('monitor_model');
    $monitor_serial_number = $this->input->post('monitor_serial_number');
    $ups_brand = $this->input->post('ups_brand');
    $ups_model = $this->input->post('ups_model');
    $ups_serial_no = $this->input->post('ups_serial_no');
    $port = $this->input->post('port');
    $type_ip = $this->input->post('type_ip');
    $ip = $this->input->post('ip');
    $device_tag = $this->input->post('device_tag');
    $need_replacement = $this->input->post('need_replacement');
    $date_replacement = $this->input->post('date_replacement');
    $ppm_tag = $this->input->post('ppm_tag');

    $os = $this->input->post('os');
    $mac_address = $this->input->post('mac_address');

    $manufacturer = $this->input->post('manufacturer');

    // $checklist_1 = $this->input->post('checklist_1');
    // $checklist_2 = $this->input->post('checklist_2');
    // $checklist_3 = $this->input->post('checklist_3');
    // $checklist_4 = $this->input->post('checklist_4');
    // $checklist_5 = $this->input->post('checklist_5');
    // $checklist_6 = $this->input->post('checklist_6');
    // $checklist_7 = $this->input->post('checklist_7');
    // $checklist_8 = $this->input->post('checklist_8');

    $physical_1 = $this->input->post('physical_1');
    $physical_2 = $this->input->post('physical_2');
    $physical_3 = $this->input->post('physical_3');
    $physical_4 = $this->input->post('physical_4');
    $physical_5 = $this->input->post('physical_5');
    $physical_6 = $this->input->post('physical_6');
    $physical_7 = $this->input->post('physical_7');
    $physical_8 = $this->input->post('physical_8');
    $physical_9 = $this->input->post('physical_9');
    $physical_10 = $this->input->post('physical_10');
    $physical_11 = $this->input->post('physical_11');
    $physical_12 = $this->input->post('physical_12');
    $physical_13 = $this->input->post('physical_13');
    $physical_14 = $this->input->post('physical_14');
    $physical_15 = $this->input->post('physical_15');
    $physical_16 = $this->input->post('physical_16');
    $physical_17 = $this->input->post('physical_17');
    $physical_18 = $this->input->post('physical_18');
    $physical_19 = $this->input->post('physical_19');
    $physical_20 = $this->input->post('physical_20');
    $physical_21 = $this->input->post('physical_21');
    $physical_22 = $this->input->post('physical_22');
    $physical_23 = $this->input->post('physical_23');
    $physical_24 = $this->input->post('physical_24');
    $physical_25 = $this->input->post('physical_25');
    $physical_26 = $this->input->post('physical_26');


    $setting_1 = $this->input->post('setting_1');
    $setting_2 = $this->input->post('setting_2');
    $setting_3 = $this->input->post('setting_3');
    $setting_4 = $this->input->post('setting_4');
    $setting_5 = $this->input->post('setting_5');
    $setting_6 = $this->input->post('setting_6');
    $setting_7 = $this->input->post('setting_7');
    $setting_8 = $this->input->post('setting_8');
    $setting_9 = $this->input->post('setting_9');
    $setting_10 = $this->input->post('setting_10');
    $setting_11 = $this->input->post('setting_11');
    $setting_12 = $this->input->post('setting_12');
    $setting_13 = $this->input->post('setting_13');
    $setting_14 = $this->input->post('setting_14');
    $setting_15 = $this->input->post('setting_15');
    $setting_16 = $this->input->post('setting_16');
    $setting_17 = $this->input->post('setting_17');



    $setting_18 = $this->input->post('setting_18');
    $setting_19 = $this->input->post('setting_19');
    $setting_20 = $this->input->post('setting_20');
    $setting_21 = $this->input->post('setting_21');
    $setting_22 = $this->input->post('setting_22');
    $setting_23 = $this->input->post('setting_23');

    $house_keeping_1 = $this->input->post('house_keeping_1');
    $house_keeping_2 = $this->input->post('house_keeping_2');
    $house_keeping_3 = $this->input->post('house_keeping_3');
    $house_keeping_4 = $this->input->post('house_keeping_4');
    $house_keeping_5 = $this->input->post('house_keeping_5');
    $house_keeping_6 = $this->input->post('house_keeping_6');
    $house_keeping_7 = $this->input->post('house_keeping_7');

    $security_1 = $this->input->post('security_1');
    $security_2 = $this->input->post('security_2');
    $security_3 = $this->input->post('security_3');
    $security_4 = $this->input->post('security_4');
    $security_5 = $this->input->post('security_5');
    $security_6 = $this->input->post('security_6');
    $security_7 = $this->input->post('security_7');
    $security_8 = $this->input->post('security_8');
    $security_9 = $this->input->post('security_9');
    $security_10 = $this->input->post('security_10');
    $security_11 = $this->input->post('security_11');
    $security_12 = $this->input->post('security_12');


    $physical_27 = $this->input->post('physical_27');
    $cpu_speed = $this->input->post('cpu_speed');
    $capacity = $this->input->post('capacity');
    $sn_kvm = $this->input->post('sn_kvm');
    $sn_tape = $this->input->post('sn_tape');
    $service_pack = $this->input->post('service_pack');
    $need_replacement_houskeeping = $this->input->post('need_replacement_houskeeping');


    //new 
    $house_keeping_8 = $this->input->post('house_mouse_3');
    $house_keeping_9 = $this->input->post('house_ppm_tag_3');


    // $defrag_1 = $this->input->post('defrag_1');
    // $defrag_2 = $this->input->post('defrag_2');
    // $defrag_3 = $this->input->post('defrag_3');
    // $defrag_4 = $this->input->post('defrag_4');
    // $defrag_5 = $this->input->post('defrag_5');
    // $defrag_6 = $this->input->post('defrag_6');


    $comment = $this->input->post('comment');

    $customer = $this->input->post('customer');
    $acknowledge = $this->input->post('acknowledge');

    $id_number = rand();

    //default data 
    $updateBy = $this->session->userdata('userid'); // id yang login system
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("H:i:s");
    $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    $datetime = $dateReg.' '.$timeReg; //current date 


    //generated_code 
    if($type_device=='Physical'){
      $code = 'P';
    } else if($type_device=='Virtual'){
      $code = 'V';
    } else if($type_device=='Storage'){
      $code = 'S';
    } else {
      $code = 'SV';
    }

    
    $number  = '1';
    $ref = str_pad($number,6,"0",STR_PAD_LEFT); // 0001

    $check = $this->Admin->check_id_ppm($code);

    if(!empty($check)){
      $number = intval($check) + 1;
      $ref = str_pad($number,6,"0",STR_PAD_LEFT); // 0001
    }


    $id_reference = $ref;
    

    $endorse = $this->input->post('acknowledge');

    if($endorse!=''){
      $status='Endorse';
    } else {
      if($customer!=''){
        $status='Need Verify';
      } else {
        $status='Ordered';
      }
    }


    $year = $this->input->post('year');
    if(empty($year)){$year=date("Y");}


    $ppm_id = $this->input->post('ppm_id');

    $type_direction = $this->input->post('type_direction');
    if($type_direction=='send_perfomed'){
      $status_ppm = 'Performed';
    } else if($type_direction=='send_endorse'){
      $status_ppm = 'Endorse';
    } else if($type_direction=='send_verify'){
      $status_ppm = 'Verified';
    }


    //var_dump($type_direction); exit();

    $perform_date = $this->input->post('perform_date');


    $data = array(
                    "hostname"=>$hostname,
                    "location"=>$location,
                    "year"=> $year,
                    "ppm_type"=>$type_ppm,
                    "ppm_device"=>$type_device,
                    "responsible"=>$responsible,
                    "id_number"=>$id_number,
                    "acknowledge"=>$customer,
                    "created_date"=>$datetime,
                    "status"=>$status,
                    "id_reference"=>$id_reference,
                    "code_reference"=>$code,
                    "endorse"=>$acknowledge,
                    "quarter"=>$quarter,
                    "type_ppm_activity"=>$ppm_id,
                    'status_ppm'=>$status_ppm,
                    "department"=>$department,
                    "perform_date"=>$perform_date
                 );

    $this->db->insert('ppm_register',$data);


    // update asset 
    $data_update = array(
                          "cpu_serial_no"=>$serial_number,
                          "cpu_model"=>$model,
                          "operating_system"=>$os,
                          "ip"=>$ip,
                          "location"=>$location,
                        );
    $this->db->where('name',$hostname);
    $this->db->update('computer',$data_update);


    // ppm_computer_device
    $data2 = array(
                    "id_number"=>$id_number,
                    "ppm_type"=>$type_ppm,
                    "hostname"=>$hostname,
                    "location"=>$location,
                    "brand"=>$brand,
                    "department"=>$department,
                    "cpu_brand"=>$brand,
                    "cpu_level"=>$level,
                    "cpu_serial_number"=>$serial_number,
                    "cpu_processor_type"=>$processor_type,
                    "cpu_ram"=>$ram,
                    "cpu_model"=>$model,
                    "monitor_brand"=>$monitor_brand,
                    "monitor_model"=>$monitor_model,
                    "monitor_serial_number"=>$monitor_serial_number,
                    "ups_brand"=>$ups_brand,
                    "ups_model"=>$ups_model,
                    "ups_serial_number"=>$ups_serial_no,
                    "network_port"=>$port,
                    "network_type"=>$type_ip,
                    "network_ip"=>$ip,
                    "tagging_device"=>$device_tag,
                    "tagging_date"=>$date_replacement,
                    "tagging_replace"=>$need_replacement,
                    "tagging_tag"=>$ppm_tag,
                    'os'=>$os,
                    'mac_address'=>$mac_address,
                    'manufacturer'=>$manufacturer
                 );

    $this->db->insert('ppm_computer_device',$data2);


    /// update ppm 
    $data_update = array('ip'=>$ip,
                        'operating_system'=>$os,
                        'CPU'=>$brand,
                        'model'=>$model,
                        'monitor_brand'=>$monitor_brand,
                        'monitor_model'=>$monitor_model,
                        'monitor_serial_no'=>$monitor_serial_number,
                        "ups_brand"=>$ups_brand,
                        "ups_model"=>$ups_model,
                        "ups_serial_no"=>$ups_serial_no,
                        "network_port"=>$port,
                        "Ram"=>$ram,
                        "serial_number"=>$serial_number,
                      );
    $this->db->where('name',$hostname);
    $this->db->update('computer',$data_update);

    $data3 = array(
                    "id_number"=>$id_number,
                    "physical_1"=>$physical_1,
                    "physical_2"=>$physical_2,
                    "physical_3"=>$physical_3,
                    "physical_4"=>$physical_4,
                    "physical_5"=>$physical_5,
                    "physical_6"=>$physical_6,
                    "physical_7"=>$physical_7,
                    "physical_8"=>$physical_8,
                    "physical_9"=>$physical_9,
                    "physical_10"=>$physical_10,
                    "physical_11"=>$physical_11,
                    "physical_12"=>$physical_12,
                    "physical_13"=>$physical_13,
                    "physical_14"=>$physical_14,
                    "physical_15"=>$physical_15,
                    "physical_16"=>$physical_16,
                    "physical_17"=>$physical_17,
                    "physical_18"=>$physical_18,
                    "physical_19"=>$physical_19,
                    "physical_20"=>$physical_20,
                    "physical_21"=>$physical_21,
                    "physical_22"=>$physical_22,
                    "physical_23"=>$physical_23,
                    "physical_24"=>$physical_24,
                    "physical_25"=>$physical_25,
                    "physical_26"=>$physical_26,
                    "setting_1"=>$setting_1,
                    "setting_2"=>$setting_2,
                    "setting_3"=>$setting_3,
                    "setting_4"=>$setting_4,
                    "setting_5"=>$setting_5,
                    "setting_6"=>$setting_6,
                    "setting_7"=>$setting_7,
                    "setting_8"=>$setting_8,
                    "setting_9"=>$setting_9,
                    "setting_10"=>$setting_10,
                    "setting_11"=>$setting_11,
                    "setting_12"=>$setting_12,
                    "setting_13"=>$setting_13,
                    "setting_14"=>$setting_14,
                    "setting_15"=>$setting_15,
                    "setting_16"=>$setting_16,
                    "setting_17"=>$setting_17,

                    "setting_18"=>$setting_18,
                    "setting_19"=>$setting_19,
                    "setting_20"=>$setting_20,
                    "setting_21"=>$setting_21,
                    "setting_22"=>$setting_22,
                    "setting_23"=>$setting_23,

                    "house_keeping_1"=>$house_keeping_1,
                    "house_keeping_2"=>$house_keeping_2,
                    "house_keeping_3"=>$house_keeping_3,
                    "house_keeping_4"=>$house_keeping_4,
                    "house_keeping_5"=>$house_keeping_5,
                    "house_keeping_6"=>$house_keeping_6,
                    "house_keeping_7"=>$house_keeping_7,
                    "house_keeping_8"=>$house_keeping_8,
                    "house_keeping_9"=>$house_keeping_9,
                    "security_1"=>$security_1,
                    "security_2"=>$security_2,
                    "security_3"=>$security_3,
                    "security_4"=>$security_4,
                    "security_5"=>$security_5,
                    "security_6"=>$security_6,
                    "security_7"=>$security_7,
                    "security_8"=>$security_8,
                    "security_9"=>$security_9,
                    "security_10"=>$security_10,
                    "security_11"=>$security_11,
                    "security_12"=>$security_12,
                    "physical_27"=>$physical_27,
                    "cpu_speed"=>$cpu_speed,
                    "capacity"=>$capacity,
                    "sn_kvm"=>$sn_kvm,
                    "sn_tape"=>$sn_tape,
                    "service_pack"=>$service_pack,
                    "need_replacement_houskeeping"=>$need_replacement_houskeeping
                  );

    $this->db->insert('ppm_server_checklist',$data3);

    $data4 = array(
                    "id_number"=>$id_number,
                    "comment"=>$comment
                  );

    $this->db->insert('ppm_comment',$data4);


    $data_asset= array("location"=>$location);
    $this->db->where('name',$hostname);
    $this->db->update('ppm_server_asset',$data_asset);


    // redirect('Form_PPM/List_Computer');
    redirect('Form_PPM/data_server/'.$ppm_id);

  }

  function get_full_name($userid)
  {
    $where = "SELECT * FROM agent WHERE userid='$userid'";
    $query = $this->db->query($where);
    if ($query->num_rows() >0){ 
        foreach ($query->result() as $character) {
            $first_name = $character->first_name;
            $last_name = $character->last_name;

            $data_name = $first_name.' '.$last_name;
            return $data_name;
        }
    }
  }

  function Update_Server()
  {

    $id_number = $this->input->post('id');
    $get_agent = $this->get_agent($id_number);

    $type_ppm = $this->input->post('type_ppm');
    $type_device = $this->input->post('type_device');
    $quarter = $this->input->post('quarter');
    $responsible = $this->input->post('responsible');
    $hostname = $this->input->post('hostname');
    $location = $this->input->post('location');
    $level = $this->input->post('level');
    $department = $this->input->post('department');
    $brand = $this->input->post('brand');
    $processor_type = $this->input->post('processor_type');
    $model = $this->input->post('model');
    $ram = $this->input->post('ram');
    $serial_number = $this->input->post('cpu_serial_number');
    $monitor_brand = $this->input->post('monitor_brand');
    $monitor_model = $this->input->post('monitor_model');
    $monitor_serial_number = $this->input->post('monitor_serial_number');
    $ups_brand = $this->input->post('ups_brand');
    $ups_model = $this->input->post('ups_model');
    $ups_serial_no = $this->input->post('ups_serial_no');
    $port = $this->input->post('port');
    $type_ip = $this->input->post('type_ip');
    $ip = $this->input->post('ip');
    $device_tag = $this->input->post('device_tag');
    $need_replacement = $this->input->post('need_replacement');
    $date_replacement = $this->input->post('date_replacement');
    $ppm_tag = $this->input->post('ppm_tag');


    $manufacturer = $this->input->post('manufacturer');


    // $checklist_1 = $this->input->post('checklist_1');
    // $checklist_2 = $this->input->post('checklist_2');
    // $checklist_3 = $this->input->post('checklist_3');
    // $checklist_4 = $this->input->post('checklist_4');
    // $checklist_5 = $this->input->post('checklist_5');
    // $checklist_6 = $this->input->post('checklist_6');
    // $checklist_7 = $this->input->post('checklist_7');
    // $checklist_8 = $this->input->post('checklist_8');

    $physical_1 = $this->input->post('physical_1');
    $physical_2 = $this->input->post('physical_2');
    $physical_3 = $this->input->post('physical_3');
    $physical_4 = $this->input->post('physical_4');
    $physical_5 = $this->input->post('physical_5');
    $physical_6 = $this->input->post('physical_6');
    $physical_7 = $this->input->post('physical_7');
    $physical_8 = $this->input->post('physical_8');
    $physical_9 = $this->input->post('physical_9');
    $physical_10 = $this->input->post('physical_10');
    $physical_11 = $this->input->post('physical_11');
    $physical_12 = $this->input->post('physical_12');
    $physical_13 = $this->input->post('physical_13');
    $physical_14 = $this->input->post('physical_14');
    $physical_15 = $this->input->post('physical_15');
    $physical_16 = $this->input->post('physical_16');
    $physical_17 = $this->input->post('physical_17');
    $physical_18 = $this->input->post('physical_18');
    $physical_19 = $this->input->post('physical_19');
    $physical_20 = $this->input->post('physical_20');
    $physical_21 = $this->input->post('physical_21');
    $physical_22 = $this->input->post('physical_22');
    $physical_23 = $this->input->post('physical_23');
    $physical_24 = $this->input->post('physical_24');
    $physical_25 = $this->input->post('physical_25');
    $physical_26 = $this->input->post('physical_26');


    $setting_1 = $this->input->post('setting_1');
    $setting_2 = $this->input->post('setting_2');
    $setting_3 = $this->input->post('setting_3');
    $setting_4 = $this->input->post('setting_4');
    $setting_5 = $this->input->post('setting_5');
    $setting_6 = $this->input->post('setting_6');
    $setting_7 = $this->input->post('setting_7');
    $setting_8 = $this->input->post('setting_8');
    $setting_9 = $this->input->post('setting_9');
    $setting_10 = $this->input->post('setting_10');
    $setting_11 = $this->input->post('setting_11');
    $setting_12 = $this->input->post('setting_12');
    $setting_13 = $this->input->post('setting_13');
    $setting_14 = $this->input->post('setting_14');
    $setting_15 = $this->input->post('setting_15');
    $setting_16 = $this->input->post('setting_16');
    $setting_17 = $this->input->post('setting_17');


    $setting_18 = $this->input->post('setting_18');
    $setting_19 = $this->input->post('setting_19');
    $setting_20 = $this->input->post('setting_20');
    $setting_21 = $this->input->post('setting_21');
    $setting_22 = $this->input->post('setting_22');
    $setting_23 = $this->input->post('setting_23');

    $house_keeping_1 = $this->input->post('house_keeping_1');
    $house_keeping_2 = $this->input->post('house_keeping_2');
    $house_keeping_3 = $this->input->post('house_keeping_3');
    $house_keeping_4 = $this->input->post('house_keeping_4');
    $house_keeping_5 = $this->input->post('house_keeping_5');
    $house_keeping_6 = $this->input->post('house_keeping_6');
    $house_keeping_7 = $this->input->post('house_keeping_7');

    $house_keeping_8 = $this->input->post('house_mouse_3');
    $house_keeping_9 = $this->input->post('house_ppm_tag_3');

    $security_1 = $this->input->post('security_1');
    $security_2 = $this->input->post('security_2');
    $security_3 = $this->input->post('security_3');
    $security_4 = $this->input->post('security_4');
    $security_5 = $this->input->post('security_5');
    $security_6 = $this->input->post('security_6');
    $security_7 = $this->input->post('security_7');
    $security_8 = $this->input->post('security_8');
    $security_9 = $this->input->post('security_9');
    $security_10 = $this->input->post('security_10');
    $security_11 = $this->input->post('security_11');
    $security_12 = $this->input->post('security_12');




    $physical_27 = $this->input->post('physical_27');
    $cpu_speed = $this->input->post('cpu_speed');
    $capacity = $this->input->post('capacity');
    $sn_kvm = $this->input->post('sn_kvm');
    $sn_tape = $this->input->post('sn_tape');
    $service_pack = $this->input->post('service_pack');
    $need_replacement_houskeeping = $this->input->post('need_replacement_houskeeping');


    $os = $this->input->post('os');


    $mac_address = $this->input->post('mac_address');

    // $defrag_1 = $this->input->post('defrag_1');
    // $defrag_2 = $this->input->post('defrag_2');
    // $defrag_3 = $this->input->post('defrag_3');
    // $defrag_4 = $this->input->post('defrag_4');
    // $defrag_5 = $this->input->post('defrag_5');
    // $defrag_6 = $this->input->post('defrag_6');


    $comment = $this->input->post('comment');

    $customer = $this->input->post('customer');
    $acknowledge = $this->input->post('acknowledge');

    $id_number = $this->input->post('id');

    //default data 
    $updateBy = $this->session->userdata('userid'); // id yang login system
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("H:i:s");
    $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    $datetime = $dateReg.' '.$timeReg; //current date 


    $endorse = $this->input->post('acknowledge');

    // if($endorse!=''){
    //   $status='Endorse';
    // } else {
    //   if($customer!=''){
    //     $status='Need Verify';
    //   } else {
    //     $status='Ordered';
    //   }
    // }

    // check agent module 
    // agent_module
    // $sql = 'SELECT * FROM agent_module WHERE  module="PPM_Verify" AND agent="'.$updateBy.'"';
    // $query = $this->db->query($sql);
    // $check = $query->num_rows();

    // var_dump($sql); exit();


    $type_direction = $this->input->post('type_direction');

    // var_dump($type_direction);
    // exit();


    // if($type_direction=='send_perfomed'){
    //   $status_ppm = 'Performed';
    // } else if($type_direction=='send_endorse'){
    //   $status_ppm = 'Endorse';

    //   $user = $this->get_full_name($this->session->userdata('userid'));
    //   date_default_timezone_set("Asia/Kuala_Lumpur");
    //   $timeReg =date("H:i:s");
    //   $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    //   $this->db->where('id_number',$id_number);
    //   $data_user = array('endorse'=>$user,'date_endorse'=>$dateReg.' '.$timeReg);
    //   $this->db->update('ppm_register',$data_user);

    // } else if($type_direction=='send_verify'){
    //   $status_ppm = 'Verified';

    //   $user = $this->get_full_name($this->session->userdata('userid'));
    //   date_default_timezone_set("Asia/Kuala_Lumpur");
    //   $timeReg =date("H:i:s");
    //   $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    //   $this->db->where('id_number',$id_number);
    //   $data_user = array('acknowledge'=>$user,'date_verify'=>$dateReg.' '.$timeReg);
    //   $this->db->update('ppm_register',$data_user);
    //   // get_details_verified 
    // }



    if($type_direction=='send_perfomed'){
      $status_ppm = 'Performed';


      $user_id = $this->session->userdata('userid');

      // add komen 
      $this->db->where('id_number',$id_number);
      $data4 = array(
                      "comment"=>$comment,
                      "created_by"=>$user_id
                    );

      $this->db->update('ppm_comment',$data4);


    } else if($type_direction=='send_endorse'){
      $status_ppm = 'Endorse';

      $user = $this->get_full_name($this->session->userdata('userid'));
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i:s");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $this->db->where('id_number',$id_number);
      $data_user = array('endorse'=>$user,'date_endorse'=>$dateReg.' '.$timeReg,'date_endorsed'=>$dateReg.' '.$timeReg);
      $this->db->update('ppm_register',$data_user);



      $user_id = $this->session->userdata('userid');

      // add komen 
      $this->db->where('id_number',$id_number);
      $data4 = array(
                      "comment_endorse"=>$comment,
                      "created_by_endorse"=>$user_id
                    );

      $this->db->update('ppm_comment',$data4);


    } else if($type_direction=='send_verify'){
      $status_ppm = 'Verified';

      $user = $this->get_full_name($this->session->userdata('userid'));
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i:s");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $this->db->where('id_number',$id_number);
      $data_user = array('acknowledge'=>$user,'date_verify'=>$dateReg.' '.$timeReg,'date_acknowledge'=>$dateReg.' '.$timeReg);
      $this->db->update('ppm_register',$data_user);
      // get_details_verified 

      $user_id = $this->session->userdata('userid');

      // add komen 
      $this->db->where('id_number',$id_number);
      $data4 = array(
                      "comment_verifier"=>$comment,
                      "created_by_verifier"=>$user_id
                    );

      $this->db->update('ppm_comment',$data4);


    }

//
    //var_dump($data_user); exit();


    $reject_ppm_task = $this->input->post('reject_ppm_task');
    $reason_reject = $this->input->post('reason_reject');

    if($reject_ppm_task=='Yes'){
      $status='Rejected';

      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $date_reject= $dateReg.' '.$timeReg; //current date 
    } else {
      $date_reject = '';
    }

    if($reject_ppm_task=='No'){
      $status='Done';
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $date_endorse = $dateReg.' '.$timeReg; //current date 
    } else {
      $date_endorse = '';
    }

  
    $this->db->where('id_number',$id_number);

    $year = $this->input->post('year');
    if(empty($year)){$year=date("Y");}


    $id_number = $this->input->post('id');
    $get_agent = $this->get_agent($id_number);





    // if($get_agent==$this->session->userdata('first_name')){
      $status = '';
      if($endorse!=''){
        $status='Endorse';
      } else {
        if($customer!=''){
          $status='Need Verify';
        } else {
          $status='Ordered';
        }
      }

      $perform_date = $this->input->post('perform_date');

      $this->db->where('id_number',$id_number);
      $data = array(
                      "hostname"=>$hostname,
                      "location"=>$location,
                      "year"=> $year,
                      "ppm_type"=>$type_ppm,
                      "ppm_device"=>$type_device,
                      // "acknowledge"=>$customer,
                      "status"=>$status,
                      // "endorse"=>$acknowledge,
                      "reject_ppm_task"=>$reject_ppm_task,
                      "reason_reject"=>$reason_reject,
                      "quarter"=>$quarter,
                      'status_ppm'=>$status_ppm,
                      "department"=>$department,
                      "perform_date"=>$perform_date
                   );

      $this->db->update('ppm_register',$data);


      // update asset 
      $data_update = array(
                            "cpu_serial_no"=>$serial_number,
                            "cpu_model"=>$model,
                            "operating_system"=>$os,
                            "ip"=>$ip,
                            "location"=>$location,
                          );
      $this->db->where('name',$hostname);
      $this->db->update('computer',$data_update);


      // if(($type_direction=='send_perfomed')||($type_direction=='send_endorse')){
      if($type_direction=='send_perfomed'){
        //echo 'b';
      
      //exit();

        $this->db->where('id_number',$id_number);
        // ppm_computer_device
        $data2 = array(
                        "ppm_type"=>$type_ppm,
                        "hostname"=>$hostname,
                        "location"=>$location,
                        "brand"=>$brand,
                        "department"=>$department,
                        "cpu_brand"=>$brand,
                        "cpu_level"=>$level,
                        "cpu_serial_number"=>$serial_number,
                        "cpu_processor_type"=>$processor_type,
                        "cpu_ram"=>$ram,
                        "cpu_model"=>$model,
                        "monitor_brand"=>$monitor_brand,
                        "monitor_model"=>$monitor_model,
                        "monitor_serial_number"=>$monitor_serial_number,
                        "ups_brand"=>$ups_brand,
                        "ups_model"=>$ups_model,
                        "ups_serial_number"=>$ups_serial_no,
                        "network_port"=>$port,
                        "network_type"=>$type_ip,
                        "network_ip"=>$ip,
                        "tagging_device"=>$device_tag,
                        "tagging_date"=>$date_replacement,
                        "tagging_replace"=>$need_replacement,
                        "tagging_tag"=>$ppm_tag,
                        "os"=>$os,
                        "mac_address"=>$mac_address,
                        "manufacturer"=>$manufacturer
                     );

        $this->db->update('ppm_computer_device',$data2);


        /// update ppm 
        $data_update = array('ip'=>$ip,
                            'operating_system'=>$os,
                            'CPU'=>$brand,
                            'model'=>$model,
                            'monitor_brand'=>$monitor_brand,
                            'monitor_model'=>$monitor_model,
                            'monitor_serial_no'=>$monitor_serial_number,
                            "ups_brand"=>$ups_brand,
                            "ups_model"=>$ups_model,
                            "ups_serial_no"=>$ups_serial_no,
                            "network_port"=>$port,
                            "Ram"=>$ram,
                            "serial_number"=>$serial_number,
                          );
        $this->db->where('name',$hostname);
        $this->db->update('computer',$data_update);


        $this->db->where('id_number',$id_number);

        $data3 = array(
                        "physical_1"=>$physical_1,
                        "physical_2"=>$physical_2,
                        "physical_3"=>$physical_3,
                        "physical_4"=>$physical_4,
                        "physical_5"=>$physical_5,
                        "physical_6"=>$physical_6,
                        "physical_7"=>$physical_7,
                        "physical_8"=>$physical_8,
                        "physical_9"=>$physical_9,
                        "physical_10"=>$physical_10,
                        "physical_11"=>$physical_11,
                        "physical_12"=>$physical_12,
                        "physical_13"=>$physical_13,
                        "physical_14"=>$physical_14,
                        "physical_15"=>$physical_15,
                        "physical_16"=>$physical_16,
                        "physical_17"=>$physical_17,
                        "physical_18"=>$physical_18,
                        "physical_19"=>$physical_19,
                        "physical_20"=>$physical_20,
                        "physical_21"=>$physical_21,
                        "physical_22"=>$physical_22,
                        "physical_23"=>$physical_23,
                        "physical_24"=>$physical_24,
                        "physical_25"=>$physical_25,
                        "physical_26"=>$physical_26,
                        "setting_1"=>$setting_1,
                        "setting_2"=>$setting_2,
                        "setting_3"=>$setting_3,
                        "setting_4"=>$setting_4,
                        "setting_5"=>$setting_5,
                        "setting_6"=>$setting_6,
                        "setting_7"=>$setting_7,
                        "setting_8"=>$setting_8,
                        "setting_9"=>$setting_9,
                        "setting_10"=>$setting_10,
                        "setting_11"=>$setting_11,
                        "setting_12"=>$setting_12,
                        "setting_13"=>$setting_13,
                        "setting_14"=>$setting_14,
                        "setting_15"=>$setting_15,
                        "setting_16"=>$setting_16,
                        "setting_17"=>$setting_17,

                        "setting_18"=>$setting_18,
                        "setting_19"=>$setting_19,
                        "setting_20"=>$setting_20,
                        "setting_21"=>$setting_21,
                        "setting_22"=>$setting_22,
                        "setting_23"=>$setting_23,

                        "house_keeping_1"=>$house_keeping_1,
                        "house_keeping_2"=>$house_keeping_2,
                        "house_keeping_3"=>$house_keeping_3,
                        "house_keeping_4"=>$house_keeping_4,
                        "house_keeping_5"=>$house_keeping_5,
                        "house_keeping_6"=>$house_keeping_6,
                        "house_keeping_7"=>$house_keeping_7,
                        "house_keeping_8"=>$house_keeping_8,
                        "house_keeping_9"=>$house_keeping_9,
                        "security_1"=>$security_1,
                        "security_2"=>$security_2,
                        "security_3"=>$security_3,
                        "security_4"=>$security_4,
                        "security_5"=>$security_5,
                        "security_6"=>$security_6,
                        "security_7"=>$security_7,
                        "security_8"=>$security_8,
                        "security_9"=>$security_9,
                        "security_10"=>$security_10,
                        "security_11"=>$security_11,
                        "security_12"=>$security_12,
                        "physical_27"=>$physical_27,
                        "cpu_speed"=>$cpu_speed,
                        "capacity"=>$capacity,
                        "sn_kvm"=>$sn_kvm,
                        "sn_tape"=>$sn_tape,
                        "service_pack"=>$service_pack,
                        "need_replacement_houskeeping"=>$need_replacement_houskeeping
                      );

        $this->db->update('ppm_server_checklist',$data3);


        // $this->db->where('id_number',$id_number);
        // $data4 = array(
        //                 "comment"=>$comment
        //               );

        // $this->db->update('ppm_comment',$data4);


        $data_asset= array("location"=>$location);
        $this->db->where('name',$hostname);
        $this->db->update('ppm_server_asset',$data_asset);

      }


    //redirect('Form_PPM/List_Computer');
    $ppm_id = $this->input->post('ppm_id');
    redirect('Form_PPM/data_server/'.$ppm_id);
  }


  function Add_load_balance()
  {
    $ppm_id = $this->input->post('ppm_id');

    $type_ppm = $this->input->post('type_ppm');
    $type_device = $this->input->post('type_device');
    $quarter = $this->input->post('quarter');
    
    //$responsible = $this->input->post('responsible');
    $responsible = $this->session->userdata('first_name');

    $hostname = $this->input->post('hostname');
    $model = $this->input->post('model');
    $serial_number = $this->input->post('serial_number');
    $mac_address = $this->input->post('mac_address');
    $location = $this->input->post('location');
    $manufacture = $this->input->post('manufacture');
    $ip = $this->input->post('ip');
    $firmware = $this->input->post('firmware');

    $physical_1 = $this->input->post('physical_1');
    $physical_2 = $this->input->post('physical_2');
    $physical_3 = $this->input->post('physical_3');
    $physical_4 = $this->input->post('physical_4');
    $physical_5 = $this->input->post('physical_5');
    $physical_6 = $this->input->post('physical_6');
    $physical_7 = $this->input->post('physical_7');
    $physical_8 = $this->input->post('physical_8');
    $physical_9 = $this->input->post('physical_9');
    $physical_10 = $this->input->post('physical_10');
    $physical_11 = $this->input->post('physical_11');
    $physical_12 = $this->input->post('physical_12');
    $physical_13 = $this->input->post('physical_13');

    $setting_1 = $this->input->post('setting_1');
    $setting_2 = $this->input->post('setting_2');
    $setting_3 = $this->input->post('setting_3');
    $setting_4 = $this->input->post('setting_4');
    $setting_5 = $this->input->post('setting_5');
    $setting_6 = $this->input->post('setting_6');
    $setting_7 = $this->input->post('setting_7');
    $setting_8 = $this->input->post('setting_8');
    $setting_9 = $this->input->post('setting_9');
    $setting_10 = $this->input->post('setting_10');


    $load_balance_1 = $this->input->post('load_balance_1');
    $load_balance_2 = $this->input->post('load_balance_2'); 
    $load_balance_3 = $this->input->post('load_balance_3');


    $temperature = $this->input->post('temperature');
    $port = $this->input->post('port');
    $memory = $this->input->post('memory');
    $cpu = $this->input->post('cpu');
    $snmp_string = $this->input->post('snmp_string');
    $hard_disk_usage = $this->input->post('hard_disk_usage');


    $comment = $this->input->post('comment');

    $customer = $this->input->post('acknowledge');
    $acknowledge = $this->input->post('acknowledge');

    $id_number = rand();

    //default data 
    $updateBy = $this->session->userdata('userid'); // id yang login system
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("H:i:s");
    $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    $datetime = $dateReg.' '.$timeReg; //current date 


    //generated_code 
    $code = 'LB';
    $number  = '1';
    $ref = str_pad($number,6,"0",STR_PAD_LEFT); // 0001

    $check = $this->Admin->check_id_ppm($code);

    if(!empty($check)){
      $number = intval($check) + 1;
      $ref = str_pad($number,6,"0",STR_PAD_LEFT); // 0001
    }


    $id_reference = $ref;


    $endorse = $this->input->post('acknowledge');

    if($endorse!=''){
      $status='Endorse';
    } else {
      if($customer!=''){
        $status='Need Verify';
      } else {
        $status='Ordered';
      }
    }



    $type_direction = $this->input->post('type_direction');
    // if($type_direction=='send_perfomed'){
    //   $status_ppm = 'Performed';
    // } else if($type_direction=='send_endorse'){
    //   $status_ppm = 'Endorse';
    // } else if($type_direction=='send_verify'){
    //   $status_ppm = 'Verified';
    // }


    if($type_direction=='send_perfomed'){
      $status_ppm = 'Performed';
    } else if($type_direction=='send_endorse'){
      $status_ppm = 'Endorse';

      $user = $this->get_full_name($this->session->userdata('userid'));
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i:s");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $this->db->where('id_number',$id_number);
      $data_user = array('endorse'=>$user,'date_endorse'=>$dateReg.' '.$timeReg);
      $this->db->update('ppm_register',$data_user);

    } else if($type_direction=='send_verify'){
      $status_ppm = 'Verified';

      $user = $this->get_full_name($this->session->userdata('userid'));
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i:s");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $this->db->where('id_number',$id_number);
      $data_user = array('acknowledge'=>$user,'date_verify'=>$dateReg.' '.$timeReg);
      $this->db->update('ppm_register',$data_user);
      // get_details_verified 
    }


    $year = $this->input->post('year');
    if(empty($year)){$year=date("Y");}

    $ppm_id = $this->input->post('ppm_id');


    $perform_date = $this->input->post('perform_date');

    $data = array(
                    "hostname"=>$hostname,
                    "location"=>$location,
                    "quarter"=>$quarter,
                    "year"=> $year,
                    "ppm_type"=>$type_ppm,
                    "ppm_device"=>$type_device,
                    "responsible"=>$responsible,
                    "id_number"=>$id_number,
                    "acknowledge"=>$customer,
                    "created_date"=>$datetime,
                    "status"=>$status,
                    "id_reference"=>$id_reference,
                    "code_reference"=>$code,
                    "endorse"=>$endorse,
                    "type_ppm_activity"=>$ppm_id,
                    'status_ppm'=>$status_ppm,
                    "perform_date"=>$perform_date
                 );

    $this->db->insert('ppm_register',$data);


    //ppm_hardware_device
    $data2 = array(
                    "id_number"=>$id_number,
                    "type_ppm"=>$type_ppm,
                    "type_device"=>$type_device,
                    "quarter"=>$quarter,
                    "responsible"=>$responsible,
                    "hostname"=>$hostname,
                    "model"=>$model,
                    "serial_number"=>$serial_number,
                    "mac_address"=>$mac_address,
                    "location"=>$location,
                    "manufacture"=>$manufacture,
                    "ip"=>$ip,
                    "firmware"=>$firmware,
                  );

    $this->db->insert('ppm_hardware_device',$data2);


    // update hardware 
      $data_update = array(
                          'model'=>$model,
                          'serial_number'=>$serial_number,
                          'ip_address'=>$ip,
                          'firmware_version'=>$firmware,
                          'location'=>$location
                        );
      $this->db->where('name',$hostname);
      $this->db->update('hardware',$data_update);


    $data3 = array(
                    "id_number"=>$id_number,
                    "physical_1"=>$physical_1,
                    "physical_2"=>$physical_2,
                    "physical_3"=>$physical_3,
                    "physical_4"=>$physical_4,
                    "physical_5"=>$physical_5,
                    "physical_6"=>$physical_6,
                    "physical_7"=>$physical_7,
                    "physical_8"=>$physical_8,
                    "physical_9"=>$physical_9,
                    "physical_10"=>$physical_10,
                    "physical_11"=>$physical_11,
                    "physical_12"=>$physical_12,
                    "physical_13"=>$physical_13,
                    "setting_1"=>$setting_1,
                    "setting_2"=>$setting_2,
                    "setting_3"=>$setting_3,
                    "setting_4"=>$setting_4,
                    "setting_5"=>$setting_5,
                    "setting_6"=>$setting_6,
                    "setting_7"=>$setting_7,
                    "setting_8"=>$setting_8,
                    "setting_9"=>$setting_9,
                    "setting_10"=>$setting_10,
                    "load_balance_1"=>$load_balance_1,
                    "load_balance_2"=>$load_balance_2,
                    "load_balance_3"=>$load_balance_3,
                    "temperature"=>$temperature,
                    "port"=>$port,
                    "memory"=>$memory,
                    "cpu"=>$cpu,
                    "snmp_string"=>$snmp_string,
                    "hard_disk_usage"=>$hard_disk_usage,
                  );


    $this->db->insert('ppm_hardware_checklist',$data3);

    $data4 = array(
                    "id_number"=>$id_number,
                    "comment"=>$comment
                  );

    $this->db->insert('ppm_comment',$data4);

    $data_asset= array("location"=>$location);
    $this->db->where('name',$hostname);
    $this->db->update('ppm_network_asset',$data_asset);

    // redirect('Form_PPM/List_Hardware');
    redirect('Form_PPM/data_network/'.$ppm_id);

  }

  function Update_Load_Balance()
  {

    $id_number = $this->input->post('id');
    $get_agent = $this->get_agent($id_number);

    $type_ppm = $this->input->post('type_ppm');
    $type_device = $this->input->post('type_device');
    $quarter = $this->input->post('quarter');
    //$responsible = $this->input->post('responsible');
    $responsible = $this->session->userdata('first_name');

    $hostname = $this->input->post('hostname');
    $model = $this->input->post('model');
    $serial_number = $this->input->post('serial_number');
    $mac_address = $this->input->post('mac_address');
    $location = $this->input->post('location');
    $manufacture = $this->input->post('manufacture');
    $ip = $this->input->post('ip');
    $firmware = $this->input->post('firmware');

    $physical_1 = $this->input->post('physical_1');
    $physical_2 = $this->input->post('physical_2');
    $physical_3 = $this->input->post('physical_3');
    $physical_4 = $this->input->post('physical_4');
    $physical_5 = $this->input->post('physical_5');
    $physical_6 = $this->input->post('physical_6');
    $physical_7 = $this->input->post('physical_7');
    $physical_8 = $this->input->post('physical_8');
    $physical_9 = $this->input->post('physical_9');
    $physical_10 = $this->input->post('physical_10');
    $physical_11 = $this->input->post('physical_11');
    $physical_12 = $this->input->post('physical_12');
    $physical_13 = $this->input->post('physical_13');

    $setting_1 = $this->input->post('setting_1');
    $setting_2 = $this->input->post('setting_2');
    $setting_3 = $this->input->post('setting_3');
    $setting_4 = $this->input->post('setting_4');
    $setting_5 = $this->input->post('setting_5');
    $setting_6 = $this->input->post('setting_6');
    $setting_7 = $this->input->post('setting_7');
    $setting_8 = $this->input->post('setting_8');
    $setting_9 = $this->input->post('setting_9');
    $setting_10 = $this->input->post('setting_10');


    $load_balance_1 = $this->input->post('load_balance_1');
    $load_balance_2 = $this->input->post('load_balance_2'); 
    $load_balance_3 = $this->input->post('load_balance_3');

    $temperature = $this->input->post('temperature');
    $port = $this->input->post('port');
    $memory = $this->input->post('memory');
    $cpu = $this->input->post('cpu');
    $snmp_string = $this->input->post('snmp_string');
    $hard_disk_usage = $this->input->post('hard_disk_usage');

    $comment = $this->input->post('comment');

    $customer = $this->input->post('acknowledge');
    $acknowledge = $this->input->post('acknowledge');

    $id_number = $this->input->post('id');

    //default data 
    $updateBy = $this->session->userdata('userid'); // id yang login system
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("H:i:s");
    $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    $datetime = $dateReg.' '.$timeReg; //current date 


    $endorse = $this->input->post('acknowledge');

    if($endorse!=''){
      $status='Endorse';
    } else {
      if($customer!=''){
        $status='Need Verify';
      } else {
        $status='Ordered';
      }
    }


    $type_direction = $this->input->post('type_direction');
    // if($type_direction=='send_perfomed'){
    //   $status_ppm = 'Performed';
    // } else if($type_direction=='send_endorse'){
    //   $status_ppm = 'Endorse';
    // } else if($type_direction=='send_verify'){
    //   $status_ppm = 'Verified';
    // }



    // if($type_direction=='send_perfomed'){
    //   $status_ppm = 'Performed';
    // } else if($type_direction=='send_endorse'){
    //   $status_ppm = 'Endorse';

    //   $user = $this->get_full_name($this->session->userdata('userid'));
    //   date_default_timezone_set("Asia/Kuala_Lumpur");
    //   $timeReg =date("H:i:s");
    //   $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    //   $this->db->where('id_number',$id_number);
    //   $data_user = array('endorse'=>$user,'date_endorse'=>$dateReg.' '.$timeReg);
    //   $this->db->update('ppm_register',$data_user);

    // } else if($type_direction=='send_verify'){
    //   $status_ppm = 'Verified';

    //   $user = $this->get_full_name($this->session->userdata('userid'));
    //   date_default_timezone_set("Asia/Kuala_Lumpur");
    //   $timeReg =date("H:i:s");
    //   $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    //   $this->db->where('id_number',$id_number);
    //   $data_user = array('acknowledge'=>$user,'date_verify'=>$dateReg.' '.$timeReg);
    //   $this->db->update('ppm_register',$data_user);
    //   // get_details_verified 
    // }



    if($type_direction=='send_perfomed'){
      $status_ppm = 'Performed';


      $user_id = $this->session->userdata('userid');

      // add komen 
      $this->db->where('id_number',$id_number);
      $data4 = array(
                      "comment"=>$comment,
                      "created_by"=>$user_id
                    );

      $this->db->update('ppm_comment',$data4);


    } else if($type_direction=='send_endorse'){
      $status_ppm = 'Endorse';

      $user = $this->get_full_name($this->session->userdata('userid'));
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i:s");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $this->db->where('id_number',$id_number);
      $data_user = array('endorse'=>$user,'date_endorse'=>$dateReg.' '.$timeReg,'date_endorsed'=>$dateReg.' '.$timeReg);
      $this->db->update('ppm_register',$data_user);



      $user_id = $this->session->userdata('userid');

      // add komen 
      $this->db->where('id_number',$id_number);
      $data4 = array(
                      "comment_endorse"=>$comment,
                      "created_by_endorse"=>$user_id
                    );

      $this->db->update('ppm_comment',$data4);


    } else if($type_direction=='send_verify'){
      $status_ppm = 'Verified';

      $user = $this->get_full_name($this->session->userdata('userid'));
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i:s");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $this->db->where('id_number',$id_number);
      $data_user = array('acknowledge'=>$user,'date_verify'=>$dateReg.' '.$timeReg,'date_acknowledge'=>$dateReg.' '.$timeReg);
      $this->db->update('ppm_register',$data_user);
      // get_details_verified 

      $user_id = $this->session->userdata('userid');

      // add komen 
      $this->db->where('id_number',$id_number);
      $data4 = array(
                      "comment_verifier"=>$comment,
                      "created_by_verifier"=>$user_id
                    );

      $this->db->update('ppm_comment',$data4);


    }


    $reject_ppm_task = $this->input->post('reject_ppm_task');
    $reason_reject = $this->input->post('reason_reject');

    // if($reject_ppm_task=='Yes'){
    //   $status='Rejected';

    //   date_default_timezone_set("Asia/Kuala_Lumpur");
    //   $timeReg =date("H:i");
    //   $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    //   $date_reject= $dateReg.' '.$timeReg; //current date 
    // } else {
    //   $date_reject = '';
    // }

    // if($reject_ppm_task=='No'){
    //   $status='Done';
    //   date_default_timezone_set("Asia/Kuala_Lumpur");
    //   $timeReg =date("H:i");
    //   $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    //   $date_endorse = $dateReg.' '.$timeReg; //current date 
    // } else {
    //   $date_endorse = '';
    // }


    $this->db->where('id_number',$id_number);


    $year = $this->input->post('year');
    if(empty($year)){$year=date("Y");}


    // if($get_agent==$this->session->userdata('first_name')){

    $perform_date = $this->input->post('perform_date');

    if($type_direction=='send_perfomed'){

      

      $data = array(
                      "hostname"=>$hostname,
                      "location"=>$location,
                      "quarter"=>$quarter,
                      "year"=> $year,
                      "ppm_type"=>$type_ppm,
                      "ppm_device"=>$type_device,
                      "status"=>$status,
                      'status_ppm'=>$status_ppm,
                      "perform_date"=>$perform_date
                   );

      $this->db->update('ppm_register',$data);


      $this->db->where('id_number',$id_number);

      //ppm_hardware_device
      $data2 = array(
                      "type_ppm"=>$type_ppm,
                      "type_device"=>$type_device,
                      "quarter"=>$quarter,
                      "responsible"=>$responsible,
                      "hostname"=>$hostname,
                      "model"=>$model,
                      "serial_number"=>$serial_number,
                      "mac_address"=>$mac_address,
                      "location"=>$location,
                      "manufacture"=>$manufacture,
                      "ip"=>$ip,
                      "firmware"=>$firmware,
                    );

      $this->db->update('ppm_hardware_device',$data2);


      // update hardware 
      $data_update = array(
                          'model'=>$model,
                          'serial_number'=>$serial_number,
                          'ip_address'=>$ip,
                          'firmware_version'=>$firmware,
                          'location'=>$location
                        );
      $this->db->where('name',$hostname);
      $this->db->update('hardware',$data_update);


      $this->db->where('id_number',$id_number);


      $data3 = array(
                      "physical_1"=>$physical_1,
                      "physical_2"=>$physical_2,
                      "physical_3"=>$physical_3,
                      "physical_4"=>$physical_4,
                      "physical_5"=>$physical_5,
                      "physical_6"=>$physical_6,
                      "physical_7"=>$physical_7,
                      "physical_8"=>$physical_8,
                      "physical_9"=>$physical_9,
                      "physical_10"=>$physical_10,
                      "physical_11"=>$physical_11,
                      "physical_12"=>$physical_12,
                      "physical_13"=>$physical_13,
                      "setting_1"=>$setting_1,
                      "setting_2"=>$setting_2,
                      "setting_3"=>$setting_3,
                      "setting_4"=>$setting_4,
                      "setting_5"=>$setting_5,
                      "setting_6"=>$setting_6,
                      "setting_7"=>$setting_7,
                      "setting_8"=>$setting_8,
                      "setting_9"=>$setting_9,
                      "setting_10"=>$setting_10,
                      "load_balance_1"=>$load_balance_1,
                      "load_balance_2"=>$load_balance_2,
                      "load_balance_3"=>$load_balance_3,
                      "temperature"=>$temperature,
                      "port"=>$port,
                      "memory"=>$memory,
                      "cpu"=>$cpu,
                      "snmp_string"=>$snmp_string,
                      "hard_disk_usage"=>$hard_disk_usage,
                    );


      $this->db->update('ppm_hardware_checklist',$data3);


      // $this->db->where('id_number',$id_number);

      // $data4 = array(
      //                 "comment"=>$comment
      //               );

      // $this->db->update('ppm_comment',$data4);

      $data_asset= array("location"=>$location);
      $this->db->where('name',$hostname);
      $this->db->update('ppm_network_asset',$data_asset);
    } else {

      $data = array(
                      "status"=>$status,
                      'status_ppm'=>$status_ppm,
                   );

      $this->db->update('ppm_register',$data);
    }



    // redirect('Form_PPM/List_Hardware');
    $ppm_id = $this->input->post('ppm_id');
    redirect('Form_PPM/data_network/'.$ppm_id);

  }


  function Add_access_point()
  {
    $type_ppm = $this->input->post('type_ppm');
    $type_device = $this->input->post('type_device');
    $quarter = $this->input->post('quarter');
    
    //$responsible = $this->input->post('responsible');
    $responsible = $this->session->userdata('first_name');

    $hostname = $this->input->post('hostname');
    $model = $this->input->post('model');
    $serial_number = $this->input->post('serial_number');
    $mac_address = $this->input->post('mac_address');
    $location = $this->input->post('location');
    $manufacture = $this->input->post('manufacture');
    $ip = $this->input->post('ip');
    $firmware = $this->input->post('firmware');

    $physical_1 = $this->input->post('physical_1');
    $physical_2 = $this->input->post('physical_2');
    $physical_3 = $this->input->post('physical_3');
    $physical_4 = $this->input->post('physical_4');
    $physical_5 = $this->input->post('physical_5');
    $physical_6 = $this->input->post('physical_6');
    $physical_7 = $this->input->post('physical_7');
    $physical_8 = $this->input->post('physical_8');
    $physical_9 = $this->input->post('physical_9');
    $physical_10 = $this->input->post('physical_10');
    $physical_11 = $this->input->post('physical_11');
    $physical_12 = $this->input->post('physical_12');
    $physical_13 = $this->input->post('physical_13');

    $setting_1 = $this->input->post('setting_1');
    $setting_2 = $this->input->post('setting_2');
    $setting_3 = $this->input->post('setting_3');
    $setting_4 = $this->input->post('setting_4');
    $setting_5 = $this->input->post('setting_5');
    $setting_6 = $this->input->post('setting_6');
    $setting_7 = $this->input->post('setting_7');
    $setting_8 = $this->input->post('setting_8');
    $setting_9 = $this->input->post('setting_9');
    $setting_10 = $this->input->post('setting_10');


    $temperature = $this->input->post('temperature');
    $port = $this->input->post('port');
    $memory = $this->input->post('memory');
    $cpu = $this->input->post('cpu');
    $snmp_string = $this->input->post('snmp_string');

    $comment = $this->input->post('comment');

    $customer = $this->input->post('customer');
    $acknowledge = $this->input->post('acknowledge');

    $id_number = rand();

    //default data 
    $updateBy = $this->session->userdata('userid'); // id yang login system
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("H:i:s");
    $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    $datetime = $dateReg.' '.$timeReg; //current date 


    //generated_code 
    $code = 'AP';
    $number  = '1';
    $ref = str_pad($number,6,"0",STR_PAD_LEFT); // 0001

    $check = $this->Admin->check_id_ppm($code);

    if(!empty($check)){
      $number = intval($check) + 1;
      $ref = str_pad($number,6,"0",STR_PAD_LEFT); // 0001
    }


    $id_reference = $ref;


    $endorse = $this->input->post('acknowledge');

    if($endorse!=''){
      $status='Endorse';
    } else {
      if($customer!=''){
        $status='Need Verify';
      } else {
        $status='Ordered';
      }
    }


    $type_direction = $this->input->post('type_direction');
    if($type_direction=='send_perfomed'){
      $status_ppm = 'Performed';
    } else if($type_direction=='send_endorse'){
      $status_ppm = 'Endorse';
    } else if($type_direction=='send_verify'){
      $status_ppm = 'Verified';
    }



    $year = $this->input->post('year');
    if(empty($year)){$year=date("Y");}

    $ppm_id = $this->input->post('ppm_id');

    $perform_date = $this->input->post('perform_date');

    $data = array(
                    "hostname"=>$hostname,
                    "location"=>$location,
                    "quarter"=>$quarter,
                    "year"=> $year,
                    "ppm_type"=>$type_ppm,
                    "ppm_device"=>$type_device,
                    "responsible"=>$responsible,
                    "id_number"=>$id_number,
                    "acknowledge"=>$customer,
                    "created_date"=>$datetime,
                    "status"=>$status,
                    "id_reference"=>$id_reference,
                    "code_reference"=>$code,
                    "endorse"=>$endorse,
                    "type_ppm_activity"=>$ppm_id,
                    'status_ppm'=>$status_ppm,
                    "perform_date"=>$perform_date
                 );

    $this->db->insert('ppm_register',$data);


    //ppm_hardware_device
    $data2 = array(
                    "id_number"=>$id_number,
                    "type_ppm"=>$type_ppm,
                    "type_device"=>$type_device,
                    "quarter"=>$quarter,
                    "responsible"=>$responsible,
                    "hostname"=>$hostname,
                    "model"=>$model,
                    "serial_number"=>$serial_number,
                    "mac_address"=>$mac_address,
                    "location"=>$location,
                    "manufacture"=>$manufacture,
                    "ip"=>$ip,
                    "firmware"=>$firmware,
                  );

    $this->db->insert('ppm_hardware_device',$data2);


    // update hardware 
    $data_update = array(
                          'model'=>$model,
                          'serial_number'=>$serial_number,
                          'ip_address'=>$ip,
                          'firmware_version'=>$firmware,
                          'location'=>$location
                        );
    $this->db->where('name',$hostname);
    $this->db->update('hardware',$data_update);



    $data3 = array(
                    "id_number"=>$id_number,
                    "physical_1"=>$physical_1,
                    "physical_2"=>$physical_2,
                    "physical_3"=>$physical_3,
                    "physical_4"=>$physical_4,
                    "physical_5"=>$physical_5,
                    "physical_6"=>$physical_6,
                    "physical_7"=>$physical_7,
                    "physical_8"=>$physical_8,
                    "physical_9"=>$physical_9,
                    "physical_10"=>$physical_10,
                    "physical_11"=>$physical_11,
                    "physical_12"=>$physical_12,
                    "physical_13"=>$physical_13,
                    "setting_1"=>$setting_1,
                    "setting_2"=>$setting_2,
                    "setting_3"=>$setting_3,
                    "setting_4"=>$setting_4,
                    "setting_5"=>$setting_5,
                    "setting_6"=>$setting_6,
                    "setting_7"=>$setting_7,
                    "setting_8"=>$setting_8,
                    "setting_9"=>$setting_9,
                    "setting_10"=>$setting_10,
                    "temperature"=>$temperature,
                    "port"=>$port,
                    "memory"=>$memory,
                    "cpu"=>$cpu,
                    "snmp_string"=>$snmp_string,
                  );


    $this->db->insert('ppm_hardware_checklist',$data3);

    $data4 = array(
                    "id_number"=>$id_number,
                    "comment"=>$comment
                  );

    $this->db->insert('ppm_comment',$data4);


    $data_asset= array("location"=>$location);
    $this->db->where('name',$hostname);
    $this->db->update('ppm_network_asset',$data_asset);

    // redirect('Form_PPM/List_Hardware');
    redirect('Form_PPM/data_network/1');


  }


  function Update_Access_Point()
  {

    $id_number = $this->input->post('id');
    $get_agent = $this->get_agent($id_number);

    $type_ppm = $this->input->post('type_ppm');
    $type_device = $this->input->post('type_device');
    $quarter = $this->input->post('quarter');
    //$responsible = $this->input->post('responsible');
    $responsible = $this->session->userdata('first_name');

    $hostname = $this->input->post('hostname');
    $model = $this->input->post('model');
    $serial_number = $this->input->post('serial_number');
    $mac_address = $this->input->post('mac_address');
    $location = $this->input->post('location');
    $manufacture = $this->input->post('manufacture');
    $ip = $this->input->post('ip');
    $firmware = $this->input->post('firmware');

    $physical_1 = $this->input->post('physical_1');
    $physical_2 = $this->input->post('physical_2');
    $physical_3 = $this->input->post('physical_3');
    $physical_4 = $this->input->post('physical_4');
    $physical_5 = $this->input->post('physical_5');
    $physical_6 = $this->input->post('physical_6');
    $physical_7 = $this->input->post('physical_7');
    $physical_8 = $this->input->post('physical_8');
    $physical_9 = $this->input->post('physical_9');
    $physical_10 = $this->input->post('physical_10');
    $physical_11 = $this->input->post('physical_11');
    $physical_12 = $this->input->post('physical_12');
    $physical_13 = $this->input->post('physical_13');

    $setting_1 = $this->input->post('setting_1');
    $setting_2 = $this->input->post('setting_2');
    $setting_3 = $this->input->post('setting_3');
    $setting_4 = $this->input->post('setting_4');
    $setting_5 = $this->input->post('setting_5');
    $setting_6 = $this->input->post('setting_6');
    $setting_7 = $this->input->post('setting_7');
    $setting_8 = $this->input->post('setting_8');
    $setting_9 = $this->input->post('setting_9');
    $setting_10 = $this->input->post('setting_10');

    $temperature = $this->input->post('temperature');
    $port = $this->input->post('port');
    $memory = $this->input->post('memory');
    $cpu = $this->input->post('cpu');
    $snmp_string = $this->input->post('snmp_string');

    $comment = $this->input->post('comment');

    $customer = $this->input->post('customer');
    $acknowledge = $this->input->post('acknowledge');

    $id_number = $this->input->post('id');

    //default data 
    $updateBy = $this->session->userdata('userid'); // id yang login system
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("H:i:s");
    $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    $datetime = $dateReg.' '.$timeReg; //current date 


    $endorse = $this->input->post('acknowledge');

    if($endorse!=''){
      $status='Endorse';
    } else {
      if($customer!=''){
        $status='Need Verify';
      } else {
        $status='Ordered';
      }
    }


    $type_direction = $this->input->post('type_direction');
    // if($type_direction=='send_perfomed'){
    //   $status_ppm = 'Performed';
    // } else if($type_direction=='send_endorse'){
    //   $status_ppm = 'Endorse';
    // } else if($type_direction=='send_verify'){
    //   $status_ppm = 'Verified';
    // }


    if($type_direction=='send_perfomed'){
      $status_ppm = 'Performed';


      $user_id = $this->session->userdata('userid');

      // add komen 
      $this->db->where('id_number',$id_number);
      $data4 = array(
                      "comment"=>$comment,
                      "created_by"=>$user_id
                    );

      $this->db->update('ppm_comment',$data4);


    } else if($type_direction=='send_endorse'){
      $status_ppm = 'Endorse';

      $user = $this->get_full_name($this->session->userdata('userid'));
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i:s");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $this->db->where('id_number',$id_number);
      $data_user = array('endorse'=>$user,'date_endorse'=>$dateReg.' '.$timeReg,'date_endorsed'=>$dateReg.' '.$timeReg);
      $this->db->update('ppm_register',$data_user);



      $user_id = $this->session->userdata('userid');

      // add komen 
      $this->db->where('id_number',$id_number);
      $data4 = array(
                      "comment_endorse"=>$comment,
                      "created_by_endorse"=>$user_id
                    );

      $this->db->update('ppm_comment',$data4);


    } else if($type_direction=='send_verify'){
      $status_ppm = 'Verified';

      $user = $this->get_full_name($this->session->userdata('userid'));
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i:s");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $this->db->where('id_number',$id_number);
      $data_user = array('acknowledge'=>$user,'date_verify'=>$dateReg.' '.$timeReg,'date_acknowledge'=>$dateReg.' '.$timeReg);
      $this->db->update('ppm_register',$data_user);
      // get_details_verified 

      $user_id = $this->session->userdata('userid');

      // add komen 
      $this->db->where('id_number',$id_number);
      $data4 = array(
                      "comment_verifier"=>$comment,
                      "created_by_verifier"=>$user_id
                    );

      $this->db->update('ppm_comment',$data4);


    }


    $reject_ppm_task = $this->input->post('reject_ppm_task');
    $reason_reject = $this->input->post('reason_reject');

    if($reject_ppm_task=='Yes'){
      $status='Rejected';

      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $date_reject= $dateReg.' '.$timeReg; //current date 
    } else {
      $date_reject = '';
    }

    if($reject_ppm_task=='No'){
      $status='Done';
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $date_endorse = $dateReg.' '.$timeReg; //current date 
    } else {
      $date_endorse = '';
    }

    $year = $this->input->post('year');
    if(empty($year)){$year=date("Y");}


    $perform_date = $this->input->post('perform_date');
    

    if($type_direction=='send_perfomed'){
      $this->db->where('id_number',$id_number);
      $data = array(
                      "hostname"=>$hostname,
                      "location"=>$location,
                      "quarter"=>$quarter,
                      "year"=> $year,
                      "ppm_type"=>$type_ppm,
                      "ppm_device"=>$type_device,
                      "status"=>$status,
                      'status_ppm'=>$status_ppm,
                      "perform_date"=>$perform_date
                   );

      $this->db->update('ppm_register',$data);


      //ppm_hardware_device
      $this->db->where('id_number',$id_number);
      $data2 = array(
                      "type_ppm"=>$type_ppm,
                      "type_device"=>$type_device,
                      "quarter"=>$quarter,
                      "responsible"=>$responsible,
                      "hostname"=>$hostname,
                      "model"=>$model,
                      "serial_number"=>$serial_number,
                      "mac_address"=>$mac_address,
                      "location"=>$location,
                      "manufacture"=>$manufacture,
                      "ip"=>$ip,
                      "firmware"=>$firmware,
                    );

      $this->db->update('ppm_hardware_device',$data2);


      // update hardware 
      $data_update = array(
                          'model'=>$model,
                          'serial_number'=>$serial_number,
                          'ip_address'=>$ip,
                          'firmware_version'=>$firmware,
                          'location'=>$location
                        );
      $this->db->where('name',$hostname);
      $this->db->update('hardware',$data_update);



      $this->db->where('id_number',$id_number);
      $data3 = array(
                      "physical_1"=>$physical_1,
                      "physical_2"=>$physical_2,
                      "physical_3"=>$physical_3,
                      "physical_4"=>$physical_4,
                      "physical_5"=>$physical_5,
                      "physical_6"=>$physical_6,
                      "physical_7"=>$physical_7,
                      "physical_8"=>$physical_8,
                      "physical_9"=>$physical_9,
                      "physical_10"=>$physical_10,
                      "physical_11"=>$physical_11,
                      "physical_12"=>$physical_12,
                      "physical_13"=>$physical_13,
                      "setting_1"=>$setting_1,
                      "setting_2"=>$setting_2,
                      "setting_3"=>$setting_3,
                      "setting_4"=>$setting_4,
                      "setting_5"=>$setting_5,
                      "setting_6"=>$setting_6,
                      "setting_7"=>$setting_7,
                      "setting_8"=>$setting_8,
                      "setting_9"=>$setting_9,
                      "setting_10"=>$setting_10,
                      "temperature"=>$temperature,
                      "port"=>$port,
                      "memory"=>$memory,
                      "cpu"=>$cpu,
                      "snmp_string"=>$snmp_string,
                    );


      $this->db->update('ppm_hardware_checklist',$data3);


      // $this->db->where('id_number',$id_number);
      // $data4 = array(
      //                 "comment"=>$comment
      //               );

      // $this->db->update('ppm_comment',$data4);

    


      $data_asset= array("location"=>$location);
      $this->db->where('name',$hostname);
      $this->db->update('ppm_network_asset',$data_asset);

    } else {
      $this->db->where('id_number',$id_number);
      $data = array(
                      'status_ppm'=>$status_ppm,
                   );

      $this->db->update('ppm_register',$data);
    }

    // redirect('Form_PPM/List_Hardware');
    redirect('Form_PPM/data_network/1');


  }



  function Add_Controller()
  {
    $ppm_id = $this->input->post('ppm_id');

    $type_ppm = $this->input->post('type_ppm');
    $type_device = $this->input->post('type_device');
    $quarter = $this->input->post('quarter');
    
    //$responsible = $this->input->post('responsible');
    $responsible = $this->session->userdata('first_name');

    $hostname = $this->input->post('hostname');
    $model = $this->input->post('model');
    $serial_number = $this->input->post('serial_number');
    $mac_address = $this->input->post('mac_address');
    $location = $this->input->post('location');
    $manufacture = $this->input->post('manufacture');
    $ip = $this->input->post('ip');
    $firmware = $this->input->post('firmware');

    $physical_1 = $this->input->post('physical_1');
    $physical_2 = $this->input->post('physical_2');
    $physical_3 = $this->input->post('physical_3');
    $physical_4 = $this->input->post('physical_4');
    $physical_5 = $this->input->post('physical_5');
    $physical_6 = $this->input->post('physical_6');
    $physical_7 = $this->input->post('physical_7');
    $physical_8 = $this->input->post('physical_8');
    $physical_9 = $this->input->post('physical_9');
    $physical_10 = $this->input->post('physical_10');
    $physical_11 = $this->input->post('physical_11');
    $physical_12 = $this->input->post('physical_12');
    $physical_13 = $this->input->post('physical_13');

    $setting_1 = $this->input->post('setting_1');
    $setting_2 = $this->input->post('setting_2');
    $setting_3 = $this->input->post('setting_3');
    $setting_4 = $this->input->post('setting_4');
    $setting_5 = $this->input->post('setting_5');
    $setting_6 = $this->input->post('setting_6');
    $setting_7 = $this->input->post('setting_7');
    $setting_8 = $this->input->post('setting_8');
    $setting_9 = $this->input->post('setting_9');
    $setting_10 = $this->input->post('setting_10');


    $temperature = $this->input->post('temperature');
    $port = $this->input->post('port');
    $memory = $this->input->post('memory');
    $cpu = $this->input->post('cpu');
    $snmp_string = $this->input->post('snmp_string');

    $comment = $this->input->post('comment');

    $customer = $this->input->post('acknowledge');
    $acknowledge = $this->input->post('acknowledge');

    $id_number = rand();

    //default data 
    $updateBy = $this->session->userdata('userid'); // id yang login system
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("H:i:s");
    $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    $datetime = $dateReg.' '.$timeReg; //current date 


    //generated_code 
    $code = 'AP';
    $number  = '1';
    $ref = str_pad($number,6,"0",STR_PAD_LEFT); // 0001

    $check = $this->Admin->check_id_ppm($code);

    if(!empty($check)){
      $number = intval($check) + 1;
      $ref = str_pad($number,6,"0",STR_PAD_LEFT); // 0001
    }


    $id_reference = $ref;


    $endorse = $this->input->post('acknowledge');

    if($endorse!=''){
      $status='Endorse';
    } else {
      if($customer!=''){
        $status='Need Verify';
      } else {
        $status='Ordered';
      }
    }



    $type_direction = $this->input->post('type_direction');
    if($type_direction=='send_perfomed'){
      $status_ppm = 'Performed';
    } else if($type_direction=='send_endorse'){
      $status_ppm = 'Endorse';
    } else if($type_direction=='send_verify'){
      $status_ppm = 'Verified';
    }


    $year = $this->input->post('year');
    if(empty($year)){$year=date("Y");}


    $ppm_id = $this->input->post('ppm_id');

    $perform_date = $this->input->post('perform_date');


    $data = array(
                    "hostname"=>$hostname,
                    "location"=>$location,
                    "quarter"=>$quarter,
                    "year"=> $year,
                    "ppm_type"=>$type_ppm,
                    "ppm_device"=>$type_device,
                    "responsible"=>$responsible,
                    "id_number"=>$id_number,
                    "acknowledge"=>$customer,
                    "created_date"=>$datetime,
                    "status"=>$status,
                    "id_reference"=>$id_reference,
                    "code_reference"=>$code,
                    "endorse"=>$endorse,
                    "type_ppm_activity"=>$ppm_id,
                    'status_ppm'=>$status_ppm,
                    "perform_date"=>$perform_date
                 );

    $this->db->insert('ppm_register',$data);


    //ppm_hardware_device
    $data2 = array(
                    "id_number"=>$id_number,
                    "type_ppm"=>$type_ppm,
                    "type_device"=>$type_device,
                    "quarter"=>$quarter,
                    "responsible"=>$responsible,
                    "hostname"=>$hostname,
                    "model"=>$model,
                    "serial_number"=>$serial_number,
                    "mac_address"=>$mac_address,
                    "location"=>$location,
                    "manufacture"=>$manufacture,
                    "ip"=>$ip,
                    "firmware"=>$firmware,
                  );

    $this->db->insert('ppm_hardware_device',$data2);


    // update hardware 
    $data_update = array(
                          'model'=>$model,
                          'serial_number'=>$serial_number,
                          'ip_address'=>$ip,
                          'firmware_version'=>$firmware,
                          'location'=>$location
                        );
    $this->db->where('name',$hostname);
    $this->db->update('hardware',$data_update);


    $data3 = array(
                    "id_number"=>$id_number,
                    "physical_1"=>$physical_1,
                    "physical_2"=>$physical_2,
                    "physical_3"=>$physical_3,
                    "physical_4"=>$physical_4,
                    "physical_5"=>$physical_5,
                    "physical_6"=>$physical_6,
                    "physical_7"=>$physical_7,
                    "physical_8"=>$physical_8,
                    "physical_9"=>$physical_9,
                    "physical_10"=>$physical_10,
                    "physical_11"=>$physical_11,
                    "physical_12"=>$physical_12,
                    "physical_13"=>$physical_13,
                    "setting_1"=>$setting_1,
                    "setting_2"=>$setting_2,
                    "setting_3"=>$setting_3,
                    "setting_4"=>$setting_4,
                    "setting_5"=>$setting_5,
                    "setting_6"=>$setting_6,
                    "setting_7"=>$setting_7,
                    "setting_8"=>$setting_8,
                    "setting_9"=>$setting_9,
                    "setting_10"=>$setting_10,
                    "temperature"=>$temperature,
                    "port"=>$port,
                    "memory"=>$memory,
                    "cpu"=>$cpu,
                    "snmp_string"=>$snmp_string,
                  );


    $this->db->insert('ppm_hardware_checklist',$data3);

    $data4 = array(
                    "id_number"=>$id_number,
                    "comment"=>$comment
                  );

    $this->db->insert('ppm_comment',$data4);

    $data_asset= array("location"=>$location);
    $this->db->where('name',$hostname);
    $this->db->update('ppm_network_asset',$data_asset);

    // redirect('Form_PPM/List_Hardware');

    redirect('Form_PPM/data_network/'.$ppm_id);


  }


  function Update_Controller()
  {

    $id_number = $this->input->post('id');
    $get_agent = $this->get_agent($id_number);

    $type_ppm = $this->input->post('type_ppm');
    $type_device = $this->input->post('type_device');
    $quarter = $this->input->post('quarter');
    //$responsible = $this->input->post('responsible');
    $responsible = $this->session->userdata('first_name');

    $hostname = $this->input->post('hostname');
    $model = $this->input->post('model');
    $serial_number = $this->input->post('serial_number');
    $mac_address = $this->input->post('mac_address');
    $location = $this->input->post('location');
    $manufacture = $this->input->post('manufacture');
    $ip = $this->input->post('ip');
    $firmware = $this->input->post('firmware');

    $physical_1 = $this->input->post('physical_1');
    $physical_2 = $this->input->post('physical_2');
    $physical_3 = $this->input->post('physical_3');
    $physical_4 = $this->input->post('physical_4');
    $physical_5 = $this->input->post('physical_5');
    $physical_6 = $this->input->post('physical_6');
    $physical_7 = $this->input->post('physical_7');
    $physical_8 = $this->input->post('physical_8');
    $physical_9 = $this->input->post('physical_9');
    $physical_10 = $this->input->post('physical_10');
    $physical_11 = $this->input->post('physical_11');
    $physical_12 = $this->input->post('physical_12');
    $physical_13 = $this->input->post('physical_13');

    $setting_1 = $this->input->post('setting_1');
    $setting_2 = $this->input->post('setting_2');
    $setting_3 = $this->input->post('setting_3');
    $setting_4 = $this->input->post('setting_4');
    $setting_5 = $this->input->post('setting_5');
    $setting_6 = $this->input->post('setting_6');
    $setting_7 = $this->input->post('setting_7');
    $setting_8 = $this->input->post('setting_8');
    $setting_9 = $this->input->post('setting_9');
    $setting_10 = $this->input->post('setting_10');

    $temperature = $this->input->post('temperature');
    $port = $this->input->post('port');
    $memory = $this->input->post('memory');
    $cpu = $this->input->post('cpu');
    $snmp_string = $this->input->post('snmp_string');

    $comment = $this->input->post('comment');

    $customer = $this->input->post('acknowledge');
    $acknowledge = $this->input->post('acknowledge');

    $id_number = $this->input->post('id');

    //default data 
    $updateBy = $this->session->userdata('userid'); // id yang login system
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("H:i:s");
    $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    $datetime = $dateReg.' '.$timeReg; //current date 


    $endorse = $this->input->post('acknowledge');

    if($endorse!=''){
      $status='Endorse';
    } else {
      if($customer!=''){
        $status='Need Verify';
      } else {
        $status='Ordered';
      }
    }

    $reject_ppm_task = $this->input->post('reject_ppm_task');
    $reason_reject = $this->input->post('reason_reject');

    if($reject_ppm_task=='Yes'){
      $status='Rejected';

      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $date_reject= $dateReg.' '.$timeReg; //current date 
    } else {
      $date_reject = '';
    }

    if($reject_ppm_task=='No'){
      $status='Done';
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $date_endorse = $dateReg.' '.$timeReg; //current date 
    } else {
      $date_endorse = '';
    }


    $type_direction = $this->input->post('type_direction');
    // if($type_direction=='send_perfomed'){
    //   $status_ppm = 'Performed';
    // } else if($type_direction=='send_endorse'){
    //   $status_ppm = 'Endorse';
    // } else if($type_direction=='send_verify'){
    //   $status_ppm = 'Verified';
    // }
    

    // if($type_direction=='send_perfomed'){
    //   $status_ppm = 'Performed';
    // } else if($type_direction=='send_endorse'){
    //   $status_ppm = 'Endorse';

    //   $user = $this->get_full_name($this->session->userdata('userid'));
    //   date_default_timezone_set("Asia/Kuala_Lumpur");
    //   $timeReg =date("H:i:s");
    //   $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    //   $this->db->where('id_number',$id_number);
    //   $data_user = array('endorse'=>$user,'date_endorse'=>$dateReg.' '.$timeReg);
    //   $this->db->update('ppm_register',$data_user);

    // } else if($type_direction=='send_verify'){
    //   $status_ppm = 'Verified';

    //   $user = $this->get_full_name($this->session->userdata('userid'));
    //   date_default_timezone_set("Asia/Kuala_Lumpur");
    //   $timeReg =date("H:i:s");
    //   $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    //   $this->db->where('id_number',$id_number);
    //   $data_user = array('acknowledge'=>$user,'date_verify'=>$dateReg.' '.$timeReg);
    //   $this->db->update('ppm_register',$data_user);
    //   // get_details_verified 
    // }




    if($type_direction=='send_perfomed'){
      $status_ppm = 'Performed';


      $user_id = $this->session->userdata('userid');

      // add komen 
      $this->db->where('id_number',$id_number);
      $data4 = array(
                      "comment"=>$comment,
                      "created_by"=>$user_id
                    );

      $this->db->update('ppm_comment',$data4);


    } else if($type_direction=='send_endorse'){
      $status_ppm = 'Endorse';

      $user = $this->get_full_name($this->session->userdata('userid'));
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i:s");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $this->db->where('id_number',$id_number);
      $data_user = array('endorse'=>$user,'date_endorse'=>$dateReg.' '.$timeReg,'date_endorsed'=>$dateReg.' '.$timeReg);
      $this->db->update('ppm_register',$data_user);



      $user_id = $this->session->userdata('userid');

      // add komen 
      $this->db->where('id_number',$id_number);
      $data4 = array(
                      "comment_endorse"=>$comment,
                      "created_by_endorse"=>$user_id
                    );

      $this->db->update('ppm_comment',$data4);


    } else if($type_direction=='send_verify'){
      $status_ppm = 'Verified';

      $user = $this->get_full_name($this->session->userdata('userid'));
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i:s");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $this->db->where('id_number',$id_number);
      $data_user = array('acknowledge'=>$user,'date_verify'=>$dateReg.' '.$timeReg,'date_acknowledge'=>$dateReg.' '.$timeReg);
      $this->db->update('ppm_register',$data_user);
      // get_details_verified 

      $user_id = $this->session->userdata('userid');

      // add komen 
      $this->db->where('id_number',$id_number);
      $data4 = array(
                      "comment_verifier"=>$comment,
                      "created_by_verifier"=>$user_id
                    );

      $this->db->update('ppm_comment',$data4);


    }


    $year = $this->input->post('year');
    if(empty($year)){$year=date("Y");}
    

    // if($get_agent==$this->session->userdata('first_name')){
    if($type_direction=='send_perfomed'){

      $perform_date = $this->input->post('perform_date');

      $this->db->where('id_number',$id_number);
      $data = array(
                      "hostname"=>$hostname,
                      "location"=>$location,
                      "quarter"=>$quarter,
                      "year"=> $year,
                      "ppm_type"=>$type_ppm,
                      "ppm_device"=>$type_device,
                      "status"=>$status,
                      'status_ppm'=>$status_ppm,
                      "perform_date"=>$perform_date
                   );

      $this->db->update('ppm_register',$data);


      //ppm_hardware_device
      $this->db->where('id_number',$id_number);
      $data2 = array(
                      "type_ppm"=>$type_ppm,
                      "type_device"=>$type_device,
                      "quarter"=>$quarter,
                      "responsible"=>$responsible,
                      "hostname"=>$hostname,
                      "model"=>$model,
                      "serial_number"=>$serial_number,
                      "mac_address"=>$mac_address,
                      "location"=>$location,
                      "manufacture"=>$manufacture,
                      "ip"=>$ip,
                      "firmware"=>$firmware,
                    );

      $this->db->update('ppm_hardware_device',$data2);


      // update hardware 
      $data_update = array(
                          'model'=>$model,
                          'serial_number'=>$serial_number,
                          'ip_address'=>$ip,
                          'firmware_version'=>$firmware,
                          'location'=>$location
                        );
      $this->db->where('name',$hostname);
      $this->db->update('hardware',$data_update);


      $this->db->where('id_number',$id_number);
      $data3 = array(
                      "physical_1"=>$physical_1,
                      "physical_2"=>$physical_2,
                      "physical_3"=>$physical_3,
                      "physical_4"=>$physical_4,
                      "physical_5"=>$physical_5,
                      "physical_6"=>$physical_6,
                      "physical_7"=>$physical_7,
                      "physical_8"=>$physical_8,
                      "physical_9"=>$physical_9,
                      "physical_10"=>$physical_10,
                      "physical_11"=>$physical_11,
                      "physical_12"=>$physical_12,
                      "physical_13"=>$physical_13,
                      "setting_1"=>$setting_1,
                      "setting_2"=>$setting_2,
                      "setting_3"=>$setting_3,
                      "setting_4"=>$setting_4,
                      "setting_5"=>$setting_5,
                      "setting_6"=>$setting_6,
                      "setting_7"=>$setting_7,
                      "setting_8"=>$setting_8,
                      "setting_9"=>$setting_9,
                      "setting_10"=>$setting_10,
                      "temperature"=>$temperature,
                      "port"=>$port,
                      "memory"=>$memory,
                      "cpu"=>$cpu,
                      "snmp_string"=>$snmp_string,
                    );


      $this->db->update('ppm_hardware_checklist',$data3);


      // $this->db->where('id_number',$id_number);
      // $data4 = array(
      //                 "comment"=>$comment
      //               );

      // $this->db->update('ppm_comment',$data4);

      $data_asset= array("location"=>$location);
      $this->db->where('name',$hostname);
      $this->db->update('ppm_network_asset',$data_asset);
    } else {

      $this->db->where('id_number',$id_number);
      $data = array(
                      'status_ppm'=>$status_ppm,
                   );

      $this->db->update('ppm_register',$data);

    }

    

    // redirect('Form_PPM/List_Hardware');
    $ppm_id = $this->input->post('ppm_id');
    redirect('Form_PPM/data_network/'.$ppm_id);


  }



  function Add_firewall()
  {


    $ppm_id = $this->input->post('ppm_id');

    $type_ppm = $this->input->post('type_ppm');
    $type_device = $this->input->post('type_device');
    $quarter = $this->input->post('quarter');
    //$responsible = $this->input->post('responsible');
    $responsible = $this->session->userdata('first_name');

    $hostname = $this->input->post('hostname');
    $model = $this->input->post('model');
    $serial_number = $this->input->post('serial_number');
    $mac_address = $this->input->post('mac_address');
    $location = $this->input->post('location');
    $manufacture = $this->input->post('manufacture');
    $ip = $this->input->post('ip');
    $firmware = $this->input->post('firmware');

    $physical_1 = $this->input->post('physical_1');
    $physical_2 = $this->input->post('physical_2');
    $physical_3 = $this->input->post('physical_3');
    $physical_4 = $this->input->post('physical_4');
    $physical_5 = $this->input->post('physical_5');
    $physical_6 = $this->input->post('physical_6');
    $physical_7 = $this->input->post('physical_7');
    $physical_8 = $this->input->post('physical_8');
    $physical_9 = $this->input->post('physical_9');
    $physical_10 = $this->input->post('physical_10');
    $physical_11 = $this->input->post('physical_11');
    $physical_12 = $this->input->post('physical_12');
    $physical_13 = $this->input->post('physical_13');

    $setting_1 = $this->input->post('setting_1');
    $setting_2 = $this->input->post('setting_2');
    $setting_3 = $this->input->post('setting_3');
    $setting_4 = $this->input->post('setting_4');
    $setting_5 = $this->input->post('setting_5');
    $setting_6 = $this->input->post('setting_6');
    $setting_7 = $this->input->post('setting_7');
    $setting_8 = $this->input->post('setting_8');
    $setting_9 = $this->input->post('setting_9');
    $setting_10 = $this->input->post('setting_10');

    $firewall_1 = $this->input->post('firewall_1');
    $firewall_2 = $this->input->post('firewall_2');
    $firewall_3 = $this->input->post('firewall_3');
    $firewall_4 = $this->input->post('firewall_4');
    $firewall_5 = $this->input->post('firewall_5');
    $firewall_6 = $this->input->post('firewall_6');
    $firewall_7 = $this->input->post('firewall_7');
    $firewall_8 = $this->input->post('firewall_8');
    $firewall_9 = $this->input->post('firewall_9');
    $firewall_10 = $this->input->post('firewall_10');

    $security_1 = $this->input->post('security_1');
    $security_2 = $this->input->post('security_2');
    $security_3 = $this->input->post('security_3');
    $security_4 = $this->input->post('security_4');
    $security_5 = $this->input->post('security_5');
    $security_6 = $this->input->post('security_6');
    $security_7 = $this->input->post('security_7');
    $security_8 = $this->input->post('security_8');
    $security_9 = $this->input->post('security_9');
    $security_10 = $this->input->post('security_10');
    $security_11 = $this->input->post('security_11');
    $security_12 = $this->input->post('security_12');



    $firewall_24 = $this->input->post('firewall_24');
    $firewall_25 = $this->input->post('firewall_25');
    $firewall_26 = $this->input->post('firewall_26');


    $temperature = $this->input->post('temperature');
    $port = $this->input->post('port');
    $memory = $this->input->post('memory');
    $cpu = $this->input->post('cpu');
    $snmp_string = $this->input->post('snmp_string');

    $unit_management_ip = $this->input->post('unit_management_ip');
    $percentage_connection = $this->input->post('percentage_connection');
    $system_uptime = $this->input->post('system_uptime');
    $snmp_string_firewall = $this->input->post('snmp_string_firewall');
    $unique_firewall = $this->input->post('unique_firewall');


    $comment = $this->input->post('comment');

    $customer = $this->input->post('acknowledge');
    $acknowledge = $this->input->post('acknowledge');

    $id_number = rand();

    //default data 
    $updateBy = $this->session->userdata('userid'); // id yang login system
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("H:i:s");
    $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    $datetime = $dateReg.' '.$timeReg; //current date 


    //generated_code 
    $code = 'FW';
    $number  = '1';
    $ref = str_pad($number,6,"0",STR_PAD_LEFT); // 0001

    $check = $this->Admin->check_id_ppm($code);

    if(!empty($check)){
      $number = intval($check) + 1;
      $ref = str_pad($number,6,"0",STR_PAD_LEFT); // 0001
    }


    $id_reference = $ref;


    $endorse = $this->input->post('acknowledge');

    if($endorse!=''){
      $status='Endorse';
    } else {
      if($customer!=''){
        $status='Need Verify';
      } else {
        $status='Ordered';
      }
    }



    $type_direction = $this->input->post('type_direction');
    if($type_direction=='send_perfomed'){
      $status_ppm = 'Performed';
    } else if($type_direction=='send_endorse'){
      $status_ppm = 'Endorse';
    } else if($type_direction=='send_verify'){
      $status_ppm = 'Verified';
    }

    $year = $this->input->post('year');
    if(empty($year)){$year=date("Y");}

    $ppm_id = $this->input->post('ppm_id');

    $perform_date = $this->input->post('perform_date');


    $data = array(
                    "hostname"=>$hostname,
                    "location"=>$location,
                    "quarter"=>$quarter,
                    "year"=> $year,
                    "ppm_type"=>$type_ppm,
                    "ppm_device"=>$type_device,
                    "responsible"=>$responsible,
                    "id_number"=>$id_number,
                    "acknowledge"=>$customer,
                    "created_date"=>$datetime,
                    "status"=>$status,
                    "id_reference"=>$id_reference,
                    "code_reference"=>$code,
                    "endorse"=>$endorse,
                    "type_ppm_activity"=>$ppm_id,
                    'status_ppm'=>$status_ppm,
                    "perform_date"=>$perform_date
                 );

    // echo '<pre>';
    // var_dump($data);
    // echo '</pre>';
    // exit();

    $this->db->insert('ppm_register',$data);


    //ppm_hardware_device
    $data2 = array(
                    "id_number"=>$id_number,
                    "type_ppm"=>$type_ppm,
                    "type_device"=>$type_device,
                    "quarter"=>$quarter,
                    "responsible"=>$responsible,
                    "hostname"=>$hostname,
                    "model"=>$model,
                    "serial_number"=>$serial_number,
                    "mac_address"=>$mac_address,
                    "location"=>$location,
                    "manufacture"=>$manufacture,
                    "ip"=>$ip,
                    "firmware"=>$firmware,
                  );

    $this->db->insert('ppm_hardware_device',$data2);


    // update hardware 
    $data_update = array(
                          'model'=>$model,
                          'serial_number'=>$serial_number,
                          'ip_address'=>$ip,
                          'firmware_version'=>$firmware,
                          'location'=>$location
                        );
    $this->db->where('name',$hostname);
    $this->db->update('hardware',$data_update);

    $data3 = array(
                    "id_number"=>$id_number,
                    "physical_1"=>$physical_1,
                    "physical_2"=>$physical_2,
                    "physical_3"=>$physical_3,
                    "physical_4"=>$physical_4,
                    "physical_5"=>$physical_5,
                    "physical_6"=>$physical_6,
                    "physical_7"=>$physical_7,
                    "physical_8"=>$physical_8,
                    "physical_9"=>$physical_9,
                    "physical_10"=>$physical_10,
                    "physical_11"=>$physical_11,
                    "physical_12"=>$physical_12,
                    "physical_13"=>$physical_13,
                    "setting_1"=>$setting_1,
                    "setting_2"=>$setting_2,
                    "setting_3"=>$setting_3,
                    "setting_4"=>$setting_4,
                    "setting_5"=>$setting_5,
                    "setting_6"=>$setting_6,
                    "setting_7"=>$setting_7,
                    "setting_8"=>$setting_8,
                    "setting_9"=>$setting_9,
                    "setting_10"=>$setting_10,
                    "firewall_1"=>$firewall_1,
                    "firewall_2"=>$firewall_2,
                    "firewall_3"=>$firewall_3,
                    "firewall_4"=>$firewall_4,
                    "firewall_5"=>$firewall_5,
                    "firewall_6"=>$firewall_6,
                    "firewall_7"=>$firewall_7,
                    "firewall_8"=>$firewall_8,
                    "firewall_9"=>$firewall_9,
                    "firewall_10"=>$firewall_10,
                    "firewall_11"=>$security_1,
                    "firewall_12"=>$security_2,
                    "firewall_13"=>$security_3,
                    "firewall_14"=>$security_4,
                    "firewall_15"=>$security_5,
                    "firewall_16"=>$security_6,
                    "firewall_17"=>$security_7,
                    "firewall_18"=>$security_8,
                    "firewall_19"=>$security_9,
                    "firewall_20"=>$security_10,
                    "firewall_21"=>$security_11,
                    "firewall_22"=>$security_12,
                    "temperature"=>$temperature,
                    "port"=>$port,
                    "memory"=>$memory,
                    "cpu"=>$cpu,
                    "snmp_string"=>$unit_management_ip,
                    "unit_management_ip"=>$unit_management_ip,
                    "percentage_connection"=>$percentage_connection,
                    "system_uptime"=>$system_uptime,
                    "snmp_string_firewall"=>$snmp_string_firewall,
                    "unique_firewall"=>$unique_firewall,
                    "firewall_24"=>$firewall_24,
                    "firewall_25"=>$firewall_25,
                    "firewall_26"=>$firewall_26,
                  );


    $this->db->insert('ppm_hardware_checklist',$data3);

    $data4 = array(
                    "id_number"=>$id_number,
                    "comment"=>$comment
                  );

    $this->db->insert('ppm_comment',$data4);

    $data_asset= array("location"=>$location);
    $this->db->where('name',$hostname);
    $this->db->update('ppm_network_asset',$data_asset);

    // redirect('Form_PPM/List_Hardware');
    redirect('Form_PPM/data_network/'.$ppm_id);
  }


  function Update_Firewall()
  {

    $id_number = $this->input->post('id');
    $get_agent = $this->get_agent($id_number);

    $type_ppm = $this->input->post('type_ppm');
    $type_device = $this->input->post('type_device');
    $quarter = $this->input->post('quarter');
    //$responsible = $this->input->post('responsible');
    $responsible = $this->session->userdata('first_name');

    $hostname = $this->input->post('hostname');
    $model = $this->input->post('model');
    $serial_number = $this->input->post('serial_number');
    $mac_address = $this->input->post('mac_address');
    $location = $this->input->post('location');
    $manufacture = $this->input->post('manufacture');
    $ip = $this->input->post('ip');
    $firmware = $this->input->post('firmware');

    $physical_1 = $this->input->post('physical_1');
    $physical_2 = $this->input->post('physical_2');
    $physical_3 = $this->input->post('physical_3');
    $physical_4 = $this->input->post('physical_4');
    $physical_5 = $this->input->post('physical_5');
    $physical_6 = $this->input->post('physical_6');
    $physical_7 = $this->input->post('physical_7');
    $physical_8 = $this->input->post('physical_8');
    $physical_9 = $this->input->post('physical_9');
    $physical_10 = $this->input->post('physical_10');
    $physical_11 = $this->input->post('physical_11');
    $physical_12 = $this->input->post('physical_12');
    $physical_13 = $this->input->post('physical_13');

    $setting_1 = $this->input->post('setting_1');
    $setting_2 = $this->input->post('setting_2');
    $setting_3 = $this->input->post('setting_3');
    $setting_4 = $this->input->post('setting_4');
    $setting_5 = $this->input->post('setting_5');
    $setting_6 = $this->input->post('setting_6');
    $setting_7 = $this->input->post('setting_7');
    $setting_8 = $this->input->post('setting_8');
    $setting_9 = $this->input->post('setting_9');
    $setting_10 = $this->input->post('setting_10');

    $firewall_1 = $this->input->post('firewall_1');
    $firewall_2 = $this->input->post('firewall_2');
    $firewall_3 = $this->input->post('firewall_3');
    $firewall_4 = $this->input->post('firewall_4');
    $firewall_5 = $this->input->post('firewall_5');
    $firewall_6 = $this->input->post('firewall_6');
    $firewall_7 = $this->input->post('firewall_7');
    $firewall_8 = $this->input->post('firewall_8');
    $firewall_9 = $this->input->post('firewall_9');
    $firewall_10 = $this->input->post('firewall_10');

    $security_1 = $this->input->post('security_1');
    $security_2 = $this->input->post('security_2');
    $security_3 = $this->input->post('security_3');
    $security_4 = $this->input->post('security_4');
    $security_5 = $this->input->post('security_5');
    $security_6 = $this->input->post('security_6');
    $security_7 = $this->input->post('security_7');
    $security_8 = $this->input->post('security_8');
    $security_9 = $this->input->post('security_9');
    $security_10 = $this->input->post('security_10');
    $security_11 = $this->input->post('security_11');
    $security_12 = $this->input->post('security_12');

    $temperature = $this->input->post('temperature');
    $port = $this->input->post('port');
    $memory = $this->input->post('memory');
    $cpu = $this->input->post('cpu');
    $snmp_string = $this->input->post('snmp_string');

    $unit_management_ip = $this->input->post('unit_management_ip');
    $percentage_connection = $this->input->post('percentage_connection');
    $system_uptime = $this->input->post('system_uptime');
    $snmp_string_firewall = $this->input->post('snmp_string_firewall');
    $unique_firewall = $this->input->post('unique_firewall');

    $comment = $this->input->post('comment');

    $customer = $this->input->post('acknowledge');
    $acknowledge = $this->input->post('acknowledge');

    $id_number = $this->input->post('id');

    //default data 
    $updateBy = $this->session->userdata('userid'); // id yang login system
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("H:i:s");
    $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    $datetime = $dateReg.' '.$timeReg; //current date 


    $firewall_24 = $this->input->post('firewall_24');
    $firewall_25 = $this->input->post('firewall_25');
    $firewall_26 = $this->input->post('firewall_26');


    $endorse = $this->input->post('acknowledge');

    if($endorse!=''){
      $status='Endorse';
    } else {
      if($customer!=''){
        $status='Need Verify';
      } else {
        $status='Ordered';
      }
    }


    // $type_direction = $this->input->post('type_direction');
    // if($type_direction=='send_perfomed'){
    //   $status_ppm = 'Performed';
    // } else if($type_direction=='send_endorse'){
    //   $status_ppm = 'Endorse';
    // } else if($type_direction=='send_verify'){
    //   $status_ppm = 'Verified';
    // }

    $type_direction = $this->input->post('type_direction');
    // if($type_direction=='send_perfomed'){
    //   $status_ppm = 'Performed';
    // } else if($type_direction=='send_endorse'){
    //   $status_ppm = 'Endorse';

    //   $user = $this->get_full_name($this->session->userdata('userid'));
    //   date_default_timezone_set("Asia/Kuala_Lumpur");
    //   $timeReg =date("H:i:s");
    //   $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    //   $this->db->where('id_number',$id_number);
    //   $data_user = array('endorse'=>$user,'date_endorse'=>$dateReg.' '.$timeReg);
    //   $this->db->update('ppm_register',$data_user);

    // } else if($type_direction=='send_verify'){
    //   $status_ppm = 'Verified';

    //   $user = $this->get_full_name($this->session->userdata('userid'));
    //   date_default_timezone_set("Asia/Kuala_Lumpur");
    //   $timeReg =date("H:i:s");
    //   $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    //   $this->db->where('id_number',$id_number);
    //   $data_user = array('acknowledge'=>$user,'date_verify'=>$dateReg.' '.$timeReg);
    //   $this->db->update('ppm_register',$data_user);
    //   // get_details_verified 
    // }





    if($type_direction=='send_perfomed'){
      $status_ppm = 'Performed';


      $user_id = $this->session->userdata('userid');

      // add komen 
      $this->db->where('id_number',$id_number);
      $data4 = array(
                      "comment"=>$comment,
                      "created_by"=>$user_id
                    );

      $this->db->update('ppm_comment',$data4);


    } else if($type_direction=='send_endorse'){
      $status_ppm = 'Endorse';

      $user = $this->get_full_name($this->session->userdata('userid'));
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i:s");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $this->db->where('id_number',$id_number);
      $data_user = array('endorse'=>$user,'date_endorse'=>$dateReg.' '.$timeReg,'date_endorsed'=>$dateReg.' '.$timeReg);
      $this->db->update('ppm_register',$data_user);



      $user_id = $this->session->userdata('userid');

      // add komen 
      $this->db->where('id_number',$id_number);
      $data4 = array(
                      "comment_endorse"=>$comment,
                      "created_by_endorse"=>$user_id
                    );

      $this->db->update('ppm_comment',$data4);


    } else if($type_direction=='send_verify'){
      $status_ppm = 'Verified';

      $user = $this->get_full_name($this->session->userdata('userid'));
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i:s");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $this->db->where('id_number',$id_number);
      $data_user = array('acknowledge'=>$user,'date_verify'=>$dateReg.' '.$timeReg,'date_acknowledge'=>$dateReg.' '.$timeReg);
      $this->db->update('ppm_register',$data_user);
      // get_details_verified 

      $user_id = $this->session->userdata('userid');

      // add komen 
      $this->db->where('id_number',$id_number);
      $data4 = array(
                      "comment_verifier"=>$comment,
                      "created_by_verifier"=>$user_id
                    );

      $this->db->update('ppm_comment',$data4);


    }




    $reject_ppm_task = $this->input->post('reject_ppm_task');
    $reason_reject = $this->input->post('reason_reject');

    if($reject_ppm_task=='Yes'){
      $status='Rejected';

      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $date_reject= $dateReg.' '.$timeReg; //current date 
    } else {
      $date_reject = '';
    }

    if($reject_ppm_task=='No'){
      $status='Done';
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $date_endorse = $dateReg.' '.$timeReg; //current date 
    } else {
      $date_endorse = '';
    }


    $year = $this->input->post('year');
    if(empty($year)){$year=date("Y");}

    if($type_direction=='send_perfomed'){


      $perform_date = $this->input->post('perform_date');

      $this->db->where('id_number',$id_number);
      $data = array(
                      "hostname"=>$hostname,
                      "location"=>$location,
                      "quarter"=>$quarter,
                      "year"=> $year,
                      "ppm_type"=>$type_ppm,
                      "ppm_device"=>$type_device,
                      "status"=>$status,
                      'status_ppm'=>$status_ppm,
                      "perform_date"=>$perform_date
                   );

      $this->db->update('ppm_register',$data);


      //ppm_hardware_device
      $this->db->where('id_number',$id_number);
      $data2 = array(
                      "type_ppm"=>$type_ppm,
                      "type_device"=>$type_device,
                      "quarter"=>$quarter,
                      "responsible"=>$responsible,
                      "hostname"=>$hostname,
                      "model"=>$model,
                      "serial_number"=>$serial_number,
                      "mac_address"=>$mac_address,
                      "location"=>$location,
                      "manufacture"=>$manufacture,
                      "ip"=>$ip,
                      "firmware"=>$firmware,
                    );

      $this->db->update('ppm_hardware_device',$data2);


      // update hardware 
      $data_update = array(
                            'model'=>$model,
                            'serial_number'=>$serial_number,
                            'ip_address'=>$ip,
                            'firmware_version'=>$firmware,
                            'location'=>$location
                          );
      $this->db->where('name',$hostname);
      $this->db->update('hardware',$data_update);

      $this->db->where('id_number',$id_number);
      $data3 = array(
                      "physical_1"=>$physical_1,
                      "physical_2"=>$physical_2,
                      "physical_3"=>$physical_3,
                      "physical_4"=>$physical_4,
                      "physical_5"=>$physical_5,
                      "physical_6"=>$physical_6,
                      "physical_7"=>$physical_7,
                      "physical_8"=>$physical_8,
                      "physical_9"=>$physical_9,
                      "physical_10"=>$physical_10,
                      "physical_11"=>$physical_11,
                      "physical_12"=>$physical_12,
                      "physical_13"=>$physical_13,
                      "setting_1"=>$setting_1,
                      "setting_2"=>$setting_2,
                      "setting_3"=>$setting_3,
                      "setting_4"=>$setting_4,
                      "setting_5"=>$setting_5,
                      "setting_6"=>$setting_6,
                      "setting_7"=>$setting_7,
                      "setting_8"=>$setting_8,
                      "setting_9"=>$setting_9,
                      "setting_10"=>$setting_10,
                      "firewall_1"=>$firewall_1,
                      "firewall_2"=>$firewall_2,
                      "firewall_3"=>$firewall_3,
                      "firewall_4"=>$firewall_4,
                      "firewall_5"=>$firewall_5,
                      "firewall_6"=>$firewall_6,
                      "firewall_7"=>$firewall_7,
                      "firewall_8"=>$firewall_8,
                      "firewall_9"=>$firewall_9,
                      "firewall_10"=>$firewall_10,
                      "firewall_11"=>$security_1,
                      "firewall_12"=>$security_2,
                      "firewall_13"=>$security_3,
                      "firewall_14"=>$security_4,
                      "firewall_15"=>$security_5,
                      "firewall_16"=>$security_6,
                      "firewall_17"=>$security_7,
                      "firewall_18"=>$security_8,
                      "firewall_19"=>$security_9,
                      "firewall_20"=>$security_10,
                      "firewall_21"=>$security_11,
                      "firewall_22"=>$security_12,
                      "temperature"=>$temperature,
                      "port"=>$port,
                      "memory"=>$memory,
                      "cpu"=>$cpu,
                      "snmp_string"=>$snmp_string,
                      "unit_management_ip"=>$unit_management_ip,
                      "percentage_connection"=>$percentage_connection,
                      "system_uptime"=>$system_uptime,
                      "snmp_string_firewall"=>$snmp_string_firewall,
                      "unique_firewall"=>$unique_firewall,
                      "firewall_24"=>$firewall_24,
                      "firewall_25"=>$firewall_25,
                      "firewall_26"=>$firewall_26,
                    );


      $this->db->update('ppm_hardware_checklist',$data3);


      // $this->db->where('id_number',$id_number);
      // $data4 = array(
      //                 "comment"=>$comment
      //               );

      // $this->db->update('ppm_comment',$data4);

    

        $data_asset= array("location"=>$location);
        $this->db->where('name',$hostname);
        $this->db->update('ppm_network_asset',$data_asset);

        
    } else {
      $this->db->where('id_number',$id_number);
      $data = array(
                      'status_ppm'=>$status_ppm,
                   );

      $this->db->update('ppm_register',$data);
    }

    // redirect('Form_PPM/List_Hardware');
    $ppm_id = $this->input->post('ppm_id');
    redirect('Form_PPM/data_network/'.$ppm_id);
  }


  function Add_ups()
  {
    $ppm_id = $this->input->post('ppm_id');

    $type_ppm = $this->input->post('type_ppm');
    $type_device = $this->input->post('type_device');
    $quarter = $this->input->post('quarter');
    //$responsible = $this->input->post('responsible');
    $responsible = $this->session->userdata('first_name');


    $hostname = $this->input->post('hostname');
    $model = $this->input->post('model');
    $serial_number = $this->input->post('serial_number');
    $mac_address = $this->input->post('mac_address');
    $location = $this->input->post('location');
    $manufacture = $this->input->post('manufacture');
    $ip = $this->input->post('ip');
    $firmware = $this->input->post('firmware');

    $physical_1 = $this->input->post('physical_1');
    $physical_2 = $this->input->post('physical_2');
    $physical_3 = $this->input->post('physical_3');
    $physical_4 = $this->input->post('physical_4');
    $physical_5 = $this->input->post('physical_5');
    $physical_6 = $this->input->post('physical_6');
    $physical_7 = $this->input->post('physical_7');
    $physical_8 = $this->input->post('physical_8');
    $physical_9 = $this->input->post('physical_9');
    $physical_10 = $this->input->post('physical_10');
    $physical_11 = $this->input->post('physical_11');
    $physical_12 = $this->input->post('physical_12');
    $physical_13 = $this->input->post('physical_13');

    $setting_1 = $this->input->post('setting_1');
    $setting_2 = $this->input->post('setting_2');
    $setting_3 = $this->input->post('setting_3');
    $setting_4 = $this->input->post('setting_4');
    $setting_5 = $this->input->post('setting_5');
    $setting_6 = $this->input->post('setting_6');
    $setting_7 = $this->input->post('setting_7');
    $setting_8 = $this->input->post('setting_8');
    $setting_9 = $this->input->post('setting_9');
    $setting_10 = $this->input->post('setting_10');

    $ups_1 = $this->input->post('ups_1');
    $ups_2 = $this->input->post('ups_2');
    $ups_3 = $this->input->post('ups_3');
    $ups_4 = $this->input->post('ups_4');
    $ups_5 = $this->input->post('ups_5');


    $temperature = $this->input->post('temperature');
    $port = $this->input->post('port');
    $memory = $this->input->post('memory');
    $cpu = $this->input->post('cpu');
    $snmp_string = $this->input->post('snmp_string');

    $data_ol = $this->input->post('data_ol');
    $data_bc = $this->input->post('data_bc');
    $data_bt = $this->input->post('data_bt');
    $data_rt = $this->input->post('data_rt');


    $comment = $this->input->post('comment');

    $customer = $this->input->post('acknowledge');
    $acknowledge = $this->input->post('acknowledge');

    $id_number = rand();

    //default data 
    $updateBy = $this->session->userdata('userid'); // id yang login system
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("H:i:s");
    $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    $datetime = $dateReg.' '.$timeReg; //current date 

    //generated_code 
    $code = 'U';
    $number  = '1';
    $ref = str_pad($number,6,"0",STR_PAD_LEFT); // 0001

    $check = $this->Admin->check_id_ppm($code);

    if(!empty($check)){
      $number = intval($check) + 1;
      $ref = str_pad($number,6,"0",STR_PAD_LEFT); // 0001
    }


    $id_reference = $ref;

    $endorse = $this->input->post('acknowledge');

    if($endorse!=''){
      $status='Endorse';
    } else {
      if($customer!=''){
        $status='Need Verify';
      } else {
        $status='Ordered';
      }
    }



    $type_direction = $this->input->post('type_direction');
    if($type_direction=='send_perfomed'){
      $status_ppm = 'Performed';
    } else if($type_direction=='send_endorse'){
      $status_ppm = 'Endorse';
    } else if($type_direction=='send_verify'){
      $status_ppm = 'Verified';
    }


    $year = $this->input->post('year');
    if(empty($year)){$year=date("Y");}

    $ppm_id = $this->input->post('ppm_id');

    $perform_date = $this->input->post('perform_date');

    $data = array(
                    "hostname"=>$hostname,
                    "location"=>$location,
                    "quarter"=>$quarter,
                    "year"=> $year,
                    "ppm_type"=>$type_ppm,
                    "ppm_device"=>$type_device,
                    "responsible"=>$responsible,
                    "id_number"=>$id_number,
                    "acknowledge"=>$customer,
                    "created_date"=>$datetime,
                    "status"=>$status,
                    "id_reference"=>$id_reference,
                    "code_reference"=>$code,
                    "endorse"=>$endorse,
                    "type_ppm_activity"=>$ppm_id,
                    'status_ppm'=>$status_ppm,
                    "perform_date"=>$perform_date
                 );

    $this->db->insert('ppm_register',$data);


    //ppm_hardware_device
    $data2 = array(
                    "id_number"=>$id_number,
                    "type_ppm"=>$type_ppm,
                    "type_device"=>$type_device,
                    "quarter"=>$quarter,
                    "responsible"=>$responsible,
                    "hostname"=>$hostname,
                    "model"=>$model,
                    "serial_number"=>$serial_number,
                    "mac_address"=>$mac_address,
                    "location"=>$location,
                    "manufacture"=>$manufacture,
                    "ip"=>$ip,
                    "firmware"=>$firmware,
                  );

    $this->db->insert('ppm_hardware_device',$data2);

    // update hardware 
    $data_update = array(
                          'model'=>$model,
                          'serial_number'=>$serial_number,
                          'ip_address'=>$ip,
                          'firmware_version'=>$firmware,
                          'location'=>$location
                        );
    $this->db->where('name',$hostname);
    $this->db->update('hardware',$data_update);



    $data3 = array(
                    "id_number"=>$id_number,
                    "physical_1"=>$physical_1,
                    "physical_2"=>$physical_2,
                    "physical_3"=>$physical_3,
                    "physical_4"=>$physical_4,
                    "physical_5"=>$physical_5,
                    "physical_6"=>$physical_6,
                    "physical_7"=>$physical_7,
                    "physical_8"=>$physical_8,
                    "physical_9"=>$physical_9,
                    "physical_10"=>$physical_10,
                    "physical_11"=>$physical_11,
                    "physical_12"=>$physical_12,
                    "physical_13"=>$physical_13,
                    "setting_1"=>$setting_1,
                    "setting_2"=>$setting_2,
                    "setting_3"=>$setting_3,
                    "setting_4"=>$setting_4,
                    "setting_5"=>$setting_5,
                    "setting_6"=>$setting_6,
                    "setting_7"=>$setting_7,
                    "setting_8"=>$setting_8,
                    "setting_9"=>$setting_9,
                    "setting_10"=>$setting_10,
                    "ups_1"=>$ups_1,
                    "ups_2"=>$ups_2,
                    "ups_3"=>$ups_3,
                    "ups_4"=>$ups_4,
                    "ups_5"=>$ups_5,
                    "temperature"=>$temperature,
                    "port"=>$port,
                    "memory"=>$memory,
                    "cpu"=>$cpu,
                    "snmp_string"=>$snmp_string,
                    "data_ol"=>$data_ol,
                    "data_bc"=>$data_bc,
                    "data_bt"=>$data_bt,
                    "data_rt"=>$data_rt,
                  );


    $this->db->insert('ppm_hardware_checklist',$data3);

    $data4 = array(
                    "id_number"=>$id_number,
                    "comment"=>$comment
                  );

    $this->db->insert('ppm_comment',$data4);

    $data_asset= array("location"=>$location);
    $this->db->where('name',$hostname);
    $this->db->update('ppm_network_asset',$data_asset);

    // redirect('Form_PPM/List_Hardware');
    redirect('Form_PPM/data_network/'.$ppm_id);
  }

  function Update_UPS()
  {

    $id_number = $this->input->post('id');
    $get_agent = $this->get_agent($id_number);


    $type_ppm = $this->input->post('type_ppm');
    $type_device = $this->input->post('type_device');
    $quarter = $this->input->post('quarter');
    //$responsible = $this->input->post('responsible');
    $responsible = $this->session->userdata('first_name');

    $hostname = $this->input->post('hostname');
    $model = $this->input->post('model');
    $serial_number = $this->input->post('serial_number');
    $mac_address = $this->input->post('mac_address');
    $location = $this->input->post('location');
    $manufacture = $this->input->post('manufacture');
    $ip = $this->input->post('ip');
    $firmware = $this->input->post('firmware');

    $physical_1 = $this->input->post('physical_1');
    $physical_2 = $this->input->post('physical_2');
    $physical_3 = $this->input->post('physical_3');
    $physical_4 = $this->input->post('physical_4');
    $physical_5 = $this->input->post('physical_5');
    $physical_6 = $this->input->post('physical_6');
    $physical_7 = $this->input->post('physical_7');
    $physical_8 = $this->input->post('physical_8');
    $physical_9 = $this->input->post('physical_9');
    $physical_10 = $this->input->post('physical_10');
    $physical_11 = $this->input->post('physical_11');
    $physical_12 = $this->input->post('physical_12');
    $physical_13 = $this->input->post('physical_13');

    $setting_1 = $this->input->post('setting_1');
    $setting_2 = $this->input->post('setting_2');
    $setting_3 = $this->input->post('setting_3');
    $setting_4 = $this->input->post('setting_4');
    $setting_5 = $this->input->post('setting_5');
    $setting_6 = $this->input->post('setting_6');
    $setting_7 = $this->input->post('setting_7');
    $setting_8 = $this->input->post('setting_8');
    $setting_9 = $this->input->post('setting_9');
    $setting_10 = $this->input->post('setting_10');

    $ups_1 = $this->input->post('ups_1');
    $ups_2 = $this->input->post('ups_2');
    $ups_3 = $this->input->post('ups_3');
    $ups_4 = $this->input->post('ups_4');
    $ups_5 = $this->input->post('ups_5');

    $temperature = $this->input->post('temperature');
    $port = $this->input->post('port');
    $memory = $this->input->post('memory');
    $cpu = $this->input->post('cpu');
    $snmp_string = $this->input->post('snmp_string');

    $data_ol = $this->input->post('data_ol');
    $data_bc = $this->input->post('data_bc');
    $data_bt = $this->input->post('data_bt');
    $data_rt = $this->input->post('data_rt');

    $comment = $this->input->post('comment');

    $customer = $this->input->post('acknowledge');
    $acknowledge = $this->input->post('acknowledge');

    // $id_number = $this->db->input('id');

    //default data 
    $updateBy = $this->session->userdata('userid'); // id yang login system
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("H:i:s");
    $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    $datetime = $dateReg.' '.$timeReg; //current date 


    $endorse = $this->input->post('acknowledge');

    if($endorse!=''){
      $status='Endorse';
    } else {
      if($customer!=''){
        $status='Need Verify';
      } else {
        $status='Ordered';
      }
    }

    $type_direction = $this->input->post('type_direction');
    // if($type_direction=='send_perfomed'){
    //   $status_ppm = 'Performed';
    // } else if($type_direction=='send_endorse'){
    //   $status_ppm = 'Endorse';

    //   $user = $this->get_full_name($this->session->userdata('userid'));
    //   date_default_timezone_set("Asia/Kuala_Lumpur");
    //   $timeReg =date("H:i:s");
    //   $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    //   $this->db->where('id_number',$id_number);
    //   $data_user = array('endorse'=>$user,'date_endorse'=>$dateReg.' '.$timeReg);
    //   $this->db->update('ppm_register',$data_user);

    // } else if($type_direction=='send_verify'){
    //   $status_ppm = 'Verified';

    //   $user = $this->get_full_name($this->session->userdata('userid'));
    //   date_default_timezone_set("Asia/Kuala_Lumpur");
    //   $timeReg =date("H:i:s");
    //   $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    //   $this->db->where('id_number',$id_number);
    //   $data_user = array('acknowledge'=>$user,'date_verify'=>$dateReg.' '.$timeReg);
    //   $this->db->update('ppm_register',$data_user);
    //   // get_details_verified 
    // }



    if($type_direction=='send_perfomed'){
      $status_ppm = 'Performed';


      $user_id = $this->session->userdata('userid');

      // add komen 
      $this->db->where('id_number',$id_number);
      $data4 = array(
                      "comment"=>$comment,
                      "created_by"=>$user_id
                    );

      $this->db->update('ppm_comment',$data4);


    } else if($type_direction=='send_endorse'){
      $status_ppm = 'Endorse';

      $user = $this->get_full_name($this->session->userdata('userid'));
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i:s");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $this->db->where('id_number',$id_number);
      $data_user = array('endorse'=>$user,'date_endorse'=>$dateReg.' '.$timeReg,'date_endorsed'=>$dateReg.' '.$timeReg);
      $this->db->update('ppm_register',$data_user);



      $user_id = $this->session->userdata('userid');

      // add komen 
      $this->db->where('id_number',$id_number);
      $data4 = array(
                      "comment_endorse"=>$comment,
                      "created_by_endorse"=>$user_id
                    );

      $this->db->update('ppm_comment',$data4);


    } else if($type_direction=='send_verify'){
      $status_ppm = 'Verified';

      $user = $this->get_full_name($this->session->userdata('userid'));
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i:s");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $this->db->where('id_number',$id_number);
      $data_user = array('acknowledge'=>$user,'date_verify'=>$dateReg.' '.$timeReg,'date_acknowledge'=>$dateReg.' '.$timeReg);
      $this->db->update('ppm_register',$data_user);
      // get_details_verified 

      $user_id = $this->session->userdata('userid');

      // add komen 
      $this->db->where('id_number',$id_number);
      $data4 = array(
                      "comment_verifier"=>$comment,
                      "created_by_verifier"=>$user_id
                    );

      $this->db->update('ppm_comment',$data4);


    }



    $reject_ppm_task = $this->input->post('reject_ppm_task');
    $reason_reject = $this->input->post('reason_reject');

    if($reject_ppm_task=='Yes'){
      $status='Rejected';

      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $date_reject= $dateReg.' '.$timeReg; //current date 
    } else {
      $date_reject = '';
    }

    if($reject_ppm_task=='No'){
      $status='Done';
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $date_endorse = $dateReg.' '.$timeReg; //current date 
    } else {
      $date_endorse = '';
    }

    $year = $this->input->post('year');
    if(empty($year)){$year=date("Y");}

    if($type_direction=='send_perfomed'){


      $perform_date = $this->input->post('perform_date');

      $this->db->where('id_number',$id_number);
      $data = array(
                      "hostname"=>$hostname,
                      "location"=>$location,
                      "quarter"=>$quarter,
                      "year"=> $year,
                      "ppm_type"=>$type_ppm,
                      "ppm_device"=>$type_device,
                      "status"=>$status,
                      'status_ppm'=>$status_ppm,
                      "perform_date"=>$perform_date
                   );

      $this->db->update('ppm_register',$data);


      //ppm_hardware_device
      $this->db->where('id_number',$id_number);
      $data2 = array(
                      "type_ppm"=>$type_ppm,
                      "type_device"=>$type_device,
                      "quarter"=>$quarter,
                      "responsible"=>$responsible,
                      "hostname"=>$hostname,
                      "model"=>$model,
                      "serial_number"=>$serial_number,
                      "mac_address"=>$mac_address,
                      "location"=>$location,
                      "manufacture"=>$manufacture,
                      "ip"=>$ip,
                      "firmware"=>$firmware,
                    );

      $this->db->update('ppm_hardware_device',$data2);


      $this->db->where('id_number',$id_number);
      $data3 = array(
                      "physical_1"=>$physical_1,
                      "physical_2"=>$physical_2,
                      "physical_3"=>$physical_3,
                      "physical_4"=>$physical_4,
                      "physical_5"=>$physical_5,
                      "physical_6"=>$physical_6,
                      "physical_7"=>$physical_7,
                      "physical_8"=>$physical_8,
                      "physical_9"=>$physical_9,
                      "physical_10"=>$physical_10,
                      "physical_11"=>$physical_11,
                      "physical_12"=>$physical_12,
                      "physical_13"=>$physical_13,
                      "setting_1"=>$setting_1,
                      "setting_2"=>$setting_2,
                      "setting_3"=>$setting_3,
                      "setting_4"=>$setting_4,
                      "setting_5"=>$setting_5,
                      "setting_6"=>$setting_6,
                      "setting_7"=>$setting_7,
                      "setting_8"=>$setting_8,
                      "setting_9"=>$setting_9,
                      "setting_10"=>$setting_10,
                      "ups_1"=>$ups_1,
                      "ups_2"=>$ups_2,
                      "ups_3"=>$ups_3,
                      "ups_4"=>$ups_4,
                      "ups_5"=>$ups_5,
                      "temperature"=>$temperature,
                      "port"=>$port,
                      "memory"=>$memory,
                      "cpu"=>$cpu,
                      "snmp_string"=>$snmp_string,
                      "data_ol"=>$data_ol,
                      "data_bc"=>$data_bc,
                      "data_bt"=>$data_bt,
                      "data_rt"=>$data_rt,
                    );


      $this->db->update('ppm_hardware_checklist',$data3);


      // $this->db->where('id_number',$id_number);
      // $data4 = array(
      //                 "comment"=>$comment
      //               );

      // $this->db->update('ppm_comment',$data4);

    


      $data_asset= array("location"=>$location);
      $this->db->where('name',$hostname);
      $this->db->update('ppm_network_asset',$data_asset);
    } else {

      $this->db->where('id_number',$id_number);
      $data = array(
                      'status_ppm'=>$status_ppm,
                   );

      $this->db->update('ppm_register',$data);
    }

    $ppm_id = $this->input->post('ppm_id');
    redirect('Form_PPM/data_network/'.$ppm_id);
  }

  function Add_switch()
  {
    $ppm_id = $this->input->post('ppm_id');

    $type_ppm = $this->input->post('type_ppm');
    $type_device = $this->input->post('type_device');
    $quarter = $this->input->post('quarter');
    //$responsible = $this->input->post('responsible');
    $responsible = $this->session->userdata('first_name');

    $hostname = $this->input->post('hostname');
    $model = $this->input->post('model');
    $serial_number = $this->input->post('serial_number');
    $mac_address = $this->input->post('mac_address');
    $location = $this->input->post('location');
    $manufacture = $this->input->post('manufacture');
    $ip = $this->input->post('ip');
    $firmware = $this->input->post('firmware');

    $physical_1 = $this->input->post('physical_1');
    $physical_2 = $this->input->post('physical_2');
    $physical_3 = $this->input->post('physical_3');
    $physical_4 = $this->input->post('physical_4');
    $physical_5 = $this->input->post('physical_5');
    $physical_6 = $this->input->post('physical_6');
    $physical_7 = $this->input->post('physical_7');
    $physical_8 = $this->input->post('physical_8');
    $physical_9 = $this->input->post('physical_9');
    $physical_10 = $this->input->post('physical_10');
    $physical_11 = $this->input->post('physical_11');
    $physical_12 = $this->input->post('physical_12');
    $physical_13 = $this->input->post('physical_13');

    $setting_1 = $this->input->post('setting_1');
    $setting_2 = $this->input->post('setting_2');
    $setting_3 = $this->input->post('setting_3');
    $setting_4 = $this->input->post('setting_4');
    $setting_5 = $this->input->post('setting_5');
    $setting_6 = $this->input->post('setting_6');
    $setting_7 = $this->input->post('setting_7');
    $setting_8 = $this->input->post('setting_8');
    $setting_9 = $this->input->post('setting_9');
    $setting_10 = $this->input->post('setting_10');



    $temperature = $this->input->post('temperature');
    $port = $this->input->post('port');
    $memory = $this->input->post('memory');
    $cpu = $this->input->post('cpu');
    $snmp_string = $this->input->post('snmp_string');

    $comment = $this->input->post('comment');

    $customer = $this->input->post('acknowledge');
    $acknowledge = $this->input->post('acknowledge');

    $id_number = rand();

    //default data 
    $updateBy = $this->session->userdata('userid'); // id yang login system
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("H:i:s");
    $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    $datetime = $dateReg.' '.$timeReg; //current date 


    //generated_code 
    $code = 'SW';
    $number  = '1';
    $ref = str_pad($number,6,"0",STR_PAD_LEFT); // 0001

    $check = $this->Admin->check_id_ppm($code);

    if(!empty($check)){
      $number = intval($check) + 1;
      $ref = str_pad($number,6,"0",STR_PAD_LEFT); // 0001
    }


    $id_reference = $ref;

    $endorse = $this->input->post('acknowledge');

    if($endorse!=''){
      $status='Endorse';
    } else {
      if($customer!=''){
        $status='Need Verify';
      } else {
        $status='Ordered';
      }
    }



    $type_direction = $this->input->post('type_direction');
    if($type_direction=='send_perfomed'){
      $status_ppm = 'Performed';
    } else if($type_direction=='send_endorse'){
      $status_ppm = 'Endorse';
    } else if($type_direction=='send_verify'){
      $status_ppm = 'Verified';
    }


    $year = $this->input->post('year');
    if(empty($year)){$year=date("Y");}

    $ppm_id = $this->input->post('ppm_id');

    $perform_date = $this->input->post('perform_date');

    $data = array(
                    "hostname"=>$hostname,
                    "location"=>$location,
                    "quarter"=>$quarter,
                    "year"=> $year,
                    "ppm_type"=>$type_ppm,
                    "ppm_device"=>$type_device,
                    "responsible"=>$responsible,
                    "id_number"=>$id_number,
                    "acknowledge"=>$customer,
                    "created_date"=>$datetime,
                    "status"=>$status,
                    "id_reference"=>$id_reference,
                    "code_reference"=>$code,
                    "endorse"=>$endorse,
                    "type_ppm_activity"=>$ppm_id,
                    'status_ppm'=>$status_ppm,
                    "perform_date"=>$perform_date
                 );

    $this->db->insert('ppm_register',$data);

    //ppm_hardware_device
    $data2 = array(
                    "id_number"=>$id_number,
                    "type_ppm"=>$type_ppm,
                    "type_device"=>$type_device,
                    "quarter"=>$quarter,
                    "responsible"=>$responsible,
                    "hostname"=>$hostname,
                    "model"=>$model,
                    "serial_number"=>$serial_number,
                    "mac_address"=>$mac_address,
                    "location"=>$location,
                    "manufacture"=>$manufacture,
                    "ip"=>$ip,
                    "firmware"=>$firmware,
                  );

    $this->db->insert('ppm_hardware_device',$data2);

    // update hardware 
    $data_update = array(
                          'model'=>$model,
                          'serial_number'=>$serial_number,
                          'ip_address'=>$ip,
                          'firmware_version'=>$firmware,
                          'location'=>$location
                        );
    $this->db->where('name',$hostname);
    $this->db->update('hardware',$data_update);

    $data3 = array(
                    "id_number"=>$id_number,
                    "physical_1"=>$physical_1,
                    "physical_2"=>$physical_2,
                    "physical_3"=>$physical_3,
                    "physical_4"=>$physical_4,
                    "physical_5"=>$physical_5,
                    "physical_6"=>$physical_6,
                    "physical_7"=>$physical_7,
                    "physical_8"=>$physical_8,
                    "physical_9"=>$physical_9,
                    "physical_10"=>$physical_10,
                    "physical_11"=>$physical_11,
                    "physical_12"=>$physical_12,
                    "physical_13"=>$physical_13,
                    "setting_1"=>$setting_1,
                    "setting_2"=>$setting_2,
                    "setting_3"=>$setting_3,
                    "setting_4"=>$setting_4,
                    "setting_5"=>$setting_5,
                    "setting_6"=>$setting_6,
                    "setting_7"=>$setting_7,
                    "setting_8"=>$setting_8,
                    "setting_9"=>$setting_9,
                    "setting_10"=>$setting_10,
                    "temperature"=>$temperature,
                    "port"=>$port,
                    "memory"=>$memory,
                    "cpu"=>$cpu,
                    "snmp_string"=>$snmp_string,

                  );


    $this->db->insert('ppm_hardware_checklist',$data3);

    $data4 = array(
                    "id_number"=>$id_number,
                    "comment"=>$comment
                  );

    $this->db->insert('ppm_comment',$data4);


    $data_asset= array("location"=>$location);
    $this->db->where('name',$hostname);
    $this->db->update('ppm_network_asset',$data_asset);

    // redirect('Form_PPM/List_Hardware');
    redirect('Form_PPM/data_network/'.$ppm_id);
  }


  function Update_Switch()
  {
    $id_number = $this->input->post('id');
    $get_agent = $this->get_agent($id_number);


    $type_ppm = $this->input->post('type_ppm');
    $type_device = $this->input->post('type_device');
    $quarter = $this->input->post('quarter');
    //$responsible = $this->input->post('responsible');
    $responsible = $this->session->userdata('first_name');

    $hostname = $this->input->post('hostname');
    $model = $this->input->post('model');
    $serial_number = $this->input->post('serial_number');
    $mac_address = $this->input->post('mac_address');
    $location = $this->input->post('location');
    $manufacture = $this->input->post('manufacture');
    $ip = $this->input->post('ip');
    $firmware = $this->input->post('firmware');

    $physical_1 = $this->input->post('physical_1');
    $physical_2 = $this->input->post('physical_2');
    $physical_3 = $this->input->post('physical_3');
    $physical_4 = $this->input->post('physical_4');
    $physical_5 = $this->input->post('physical_5');
    $physical_6 = $this->input->post('physical_6');
    $physical_7 = $this->input->post('physical_7');
    $physical_8 = $this->input->post('physical_8');
    $physical_9 = $this->input->post('physical_9');
    $physical_10 = $this->input->post('physical_10');
    $physical_11 = $this->input->post('physical_11');
    $physical_12 = $this->input->post('physical_12');
    $physical_13 = $this->input->post('physical_13');

    $setting_1 = $this->input->post('setting_1');
    $setting_2 = $this->input->post('setting_2');
    $setting_3 = $this->input->post('setting_3');
    $setting_4 = $this->input->post('setting_4');
    $setting_5 = $this->input->post('setting_5');
    $setting_6 = $this->input->post('setting_6');
    $setting_7 = $this->input->post('setting_7');
    $setting_8 = $this->input->post('setting_8');
    $setting_9 = $this->input->post('setting_9');
    $setting_10 = $this->input->post('setting_10');


    $temperature = $this->input->post('temperature');
    $port = $this->input->post('port');
    $memory = $this->input->post('memory');
    $cpu = $this->input->post('cpu');
    $snmp_string = $this->input->post('snmp_string');


    $comment = $this->input->post('comment');

    $customer = $this->input->post('acknowledge');
    $acknowledge = $this->input->post('acknowledge');

    $id_number = $this->input->post('id');
    //default data 
    $updateBy = $this->session->userdata('userid'); // id yang login system
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("H:i:s");
    $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    $datetime = $dateReg.' '.$timeReg; //current date 


    $endorse = $this->input->post('acknowledge');

    if($endorse!=''){
      $status='Endorse';
    } else {
      if($customer!=''){
        $status='Need Verify';
      } else {
        $status='Ordered';
      }
    }
      

    $type_direction = $this->input->post('type_direction');
    // if($type_direction=='send_perfomed'){
    //   $status_ppm = 'Performed';
    // } else if($type_direction=='send_endorse'){
    //   $status_ppm = 'Endorse';

    //   $user = $this->get_full_name($this->session->userdata('userid'));
    //   date_default_timezone_set("Asia/Kuala_Lumpur");
    //   $timeReg =date("H:i:s");
    //   $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    //   $this->db->where('id_number',$id_number);
    //   $data_user = array('endorse'=>$user,'date_endorse'=>$dateReg.' '.$timeReg);
    //   $this->db->update('ppm_register',$data_user);

    // } else if($type_direction=='send_verify'){
    //   $status_ppm = 'Verified';

    //   $user = $this->get_full_name($this->session->userdata('userid'));
    //   date_default_timezone_set("Asia/Kuala_Lumpur");
    //   $timeReg =date("H:i:s");
    //   $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    //   $this->db->where('id_number',$id_number);
    //   $data_user = array('acknowledge'=>$user,'date_verify'=>$dateReg.' '.$timeReg);
    //   $this->db->update('ppm_register',$data_user);
    //   // get_details_verified 
    // }


    if($type_direction=='send_perfomed'){
      $status_ppm = 'Performed';


      $user_id = $this->session->userdata('userid');

      // add komen 
      $this->db->where('id_number',$id_number);
      $data4 = array(
                      "comment"=>$comment,
                      "created_by"=>$user_id
                    );

      $this->db->update('ppm_comment',$data4);


    } else if($type_direction=='send_endorse'){
      $status_ppm = 'Endorse';

      $user = $this->get_full_name($this->session->userdata('userid'));
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i:s");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $this->db->where('id_number',$id_number);
      $data_user = array('endorse'=>$user,'date_endorse'=>$dateReg.' '.$timeReg,'date_endorsed'=>$dateReg.' '.$timeReg);
      $this->db->update('ppm_register',$data_user);



      $user_id = $this->session->userdata('userid');

      // add komen 
      $this->db->where('id_number',$id_number);
      $data4 = array(
                      "comment_endorse"=>$comment,
                      "created_by_endorse"=>$user_id
                    );

      $this->db->update('ppm_comment',$data4);


    } else if($type_direction=='send_verify'){
      $status_ppm = 'Verified';

      $user = $this->get_full_name($this->session->userdata('userid'));
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i:s");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $this->db->where('id_number',$id_number);
      $data_user = array('acknowledge'=>$user,'date_verify'=>$dateReg.' '.$timeReg,'date_acknowledge'=>$dateReg.' '.$timeReg);
      $this->db->update('ppm_register',$data_user);
      // get_details_verified 

      $user_id = $this->session->userdata('userid');

      // add komen 
      $this->db->where('id_number',$id_number);
      $data4 = array(
                      "comment_verifier"=>$comment,
                      "created_by_verifier"=>$user_id
                    );

      $this->db->update('ppm_comment',$data4);


    }

    $reject_ppm_task = $this->input->post('reject_ppm_task');
    $reason_reject = $this->input->post('reason_reject');

    if($reject_ppm_task=='Yes'){
      $status='Rejected';

      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $date_reject= $dateReg.' '.$timeReg; //current date 
    } else {
      $date_reject = '';
    }

    if($reject_ppm_task=='No'){
      $status='Done';
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $date_endorse = $dateReg.' '.$timeReg; //current date 
    } else {
      $date_endorse = '';
    }


    $year = $this->input->post('year');
    if(empty($year)){$year=date("Y");}

    if($type_direction=='send_perfomed'){

      $perform_date = $this->input->post('perform_date');

      $this->db->where('id_number',$id_number);
      $data = array(
                      "hostname"=>$hostname,
                      "location"=>$location,
                      "quarter"=>$quarter,
                      "year"=> $year,
                      "ppm_type"=>$type_ppm,
                      "ppm_device"=>$type_device,
                      "status"=>$status,
                      'status_ppm'=>$status_ppm,
                      "perform_date"=>$perform_date
                   );

      $this->db->update('ppm_register',$data);

      //ppm_hardware_device
      $this->db->where('id_number',$id_number);
      $data2 = array(
                      "type_ppm"=>$type_ppm,
                      "type_device"=>$type_device,
                      "quarter"=>$quarter,
                      "responsible"=>$responsible,
                      "hostname"=>$hostname,
                      "model"=>$model,
                      "serial_number"=>$serial_number,
                      "mac_address"=>$mac_address,
                      "location"=>$location,
                      "manufacture"=>$manufacture,
                      "ip"=>$ip,
                      "firmware"=>$firmware,
                    );

      $this->db->update('ppm_hardware_device',$data2);


      // update hardware 
      $data_update = array(
                            'model'=>$model,
                            'serial_number'=>$serial_number,
                            'ip_address'=>$ip,
                            'firmware_version'=>$firmware,
                            'location'=>$location
                          );
      $this->db->where('name',$hostname);
      $this->db->update('hardware',$data_update);

      $this->db->where('id_number',$id_number);
      $data3 = array(
                      "physical_1"=>$physical_1,
                      "physical_2"=>$physical_2,
                      "physical_3"=>$physical_3,
                      "physical_4"=>$physical_4,
                      "physical_5"=>$physical_5,
                      "physical_6"=>$physical_6,
                      "physical_7"=>$physical_7,
                      "physical_8"=>$physical_8,
                      "physical_9"=>$physical_9,
                      "physical_10"=>$physical_10,
                      "physical_11"=>$physical_11,
                      "physical_12"=>$physical_12,
                      "physical_13"=>$physical_13,
                      "setting_1"=>$setting_1,
                      "setting_2"=>$setting_2,
                      "setting_3"=>$setting_3,
                      "setting_4"=>$setting_4,
                      "setting_5"=>$setting_5,
                      "setting_6"=>$setting_6,
                      "setting_7"=>$setting_7,
                      "setting_8"=>$setting_8,
                      "setting_9"=>$setting_9,
                      "setting_10"=>$setting_10,
                      "temperature"=>$temperature,
                      "port"=>$port,
                      "memory"=>$memory,
                      "cpu"=>$cpu,
                      "snmp_string"=>$snmp_string,
                    );


      $this->db->update('ppm_hardware_checklist',$data3);

      // $this->db->where('id_number',$id_number);
      // $data4 = array(
      //                 "comment"=>$comment
      //               );

      // $this->db->update('ppm_comment',$data4);

      $data_asset= array("location"=>$location);
      $this->db->where('name',$hostname);
      $this->db->update('ppm_network_asset',$data_asset);

    } else {
      $this->db->where('id_number',$id_number);
      $data = array(
                      'status_ppm'=>$status_ppm,
                   );

      $this->db->update('ppm_register',$data);
    }


    

    $ppm_id = $this->input->post('ppm_id');
    redirect('Form_PPM/data_network/'.$ppm_id);
  }

  function Add_printer()
  {
    $toner_percent = $this->input->post('toner_percent');
    // var_dump($toner_percent);exit();

    $ppm_id = $this->input->post('ppm_id');

    $type_ppm = $this->input->post('type_ppm');
    $type_device = $this->input->post('type_device');
    //$responsible = $this->input->post('responsible');
    $responsible = $this->session->userdata('first_name');

    $ppm_type = $this->input->post('ppm_type');

    $hostname = $this->input->post('hostname');
    $location = $this->input->post('location');
    $level = $this->input->post('level');
    $department = $this->input->post('department');
    $model = $this->input->post('model');
    $serial_number = $this->input->post('serial_number');
    $brand = $this->input->post('brand');
    $local = $this->input->post('local');
    $ip = $this->input->post('ip');
    $port = $this->input->post('port');
    $device_tag = $this->input->post('device_tag');
    $need_replacement = $this->input->post('need_replacement');
    $date_replaced = $this->input->post('date_replaced');
    $ppm_tag = $this->input->post('ppm_tag');

    $checklist_1 = $this->input->post('checklist_1');
    $checklist_2 = $this->input->post('checklist_2');
    $checklist_3 = $this->input->post('checklist_3');
    $checklist_4 = $this->input->post('checklist_4');
    $checklist_5 = $this->input->post('checklist_5');
    $checklist_6 = $this->input->post('checklist_6');
    $checklist_7 = $this->input->post('checklist_7');
    $checklist_8 = $this->input->post('checklist_8');

    $comment = $this->input->post('comment');

    $customer = $this->input->post('acknowledge');
    $acknowledge = $this->input->post('acknowledge');

    $id_number = rand();

    //default data 
    $updateBy = $this->session->userdata('userid'); // id yang login system
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("H:i:s");
    $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    $datetime = $dateReg.' '.$timeReg; //current date 


    //generated_code 
    $code = 'PR';
    $number  = '1';
    $ref = str_pad($number,6,"0",STR_PAD_LEFT); // 0001

    $check = $this->Admin->check_id_ppm($code);

    if(!empty($check)){
      $number = intval($check) + 1;
      $ref = str_pad($number,6,"0",STR_PAD_LEFT); // 0001
    }


    $id_reference = $ref;


    $endorse = $this->input->post('endorse');

    // if($endorse!=''){
    //   $status='Endorse';
    // } else {
    //   if($customer!=''){
    //     $status='Need Verify';
    //   } else {
    //     $status='Ordered';
    //   }
    // }


    if($endorse!=''){
      $status='Endorse';
    } else {
      $status='Ordered';
    }



    $ppm_id = $this->input->post('ppm_id');

    $room_name = $this->input->post('room_name');

    $perform_date = $this->input->post('perform_date');

    $year = $this->input->post('year');
    if(empty($year)){$year=date("Y");}

    // $data = array(
    //                 "hostname"=>$hostname,
    //                 "location"=>$location,
    //                 "year"=> $year,
    //                 "ppm_type"=>$type_ppm,
    //                 "ppm_device"=>$type_device,
    //                 "responsible"=>$responsible,
    //                 "id_number"=>$id_number,
    //                 "acknowledge"=>$customer,
    //                 "created_date"=>$datetime,
    //                 "status"=>$status,
    //                 "id_reference"=>$id_reference,
    //                 "code_reference"=>$code,
    //                 "endorse"=>$endorse
    //              );
    $data = array(
                    "hostname"=>$hostname,
                    "location"=>$location,
                    "year"=> $year,
                    "ppm_type"=>$type_ppm,
                    "ppm_device"=>$type_device,
                    "responsible"=>$responsible,
                    "id_number"=>$id_number,
                    "acknowledge"=>$acknowledge,
                    "created_date"=>$datetime,
                    "status"=>$status,
                    "id_reference"=>$id_reference,
                    "code_reference"=>$code,
                    "endorse"=>$endorse,
                    "type_ppm_activity"=>$ppm_id,
                    'status_ppm'=>'Performed',
                    "perform_date"=>$perform_date
                 );

    //var_dump($data); exit();

    $this->db->insert('ppm_register',$data);


/* CHECK BOX */
    $cb_1 = $this->input->post('cb_1'); if(empty($cb_1)){$cb_1='';}
    $cb_2 = $this->input->post('cb_2'); if(empty($cb_2)){$cb_2='';}
    $cb_3 = $this->input->post('cb_3'); if(empty($cb_3)){$cb_3='';}
    $cb_4 = $this->input->post('cb_4'); if(empty($cb_4)){$cb_4='';}
    $cb_5 = $this->input->post('cb_5'); if(empty($cb_5)){$cb_5='';}
    $cb_6 = $this->input->post('cb_6'); if(empty($cb_6)){$cb_6='';}
    $cb_7 = $this->input->post('cb_7'); if(empty($cb_7)){$cb_7='';}
    $cb_8 = $this->input->post('cb_8'); if(empty($cb_8)){$cb_8='';}
    $cb_9 = $this->input->post('cb_9'); if(empty($cb_9)){$cb_9='';}
    $cb_10 = $this->input->post('cb_10'); if(empty($cb_10)){$cb_10='';}
    $cb_11 = $this->input->post('cb_11'); if(empty($cb_11)){$cb_11='';}
    $cb_12 = $this->input->post('cb_12'); if(empty($cb_12)){$cb_12='';}


    // ppm_computer_device
    $ppm_list_checkbox = array(
                    "id_number"=>$id_number,
                    "cb_1"=>$cb_1,
                    "cb_2"=>$cb_2,
                    "cb_3"=>$cb_3,
                    "cb_4"=>$cb_4,
                    "cb_5"=>$cb_5,
                    "cb_6"=>$cb_6,
                    "cb_7"=>$cb_7,
                    "cb_8"=>$cb_8,
                    "cb_9"=>$cb_9,
                    "cb_10"=>$cb_10,
                    "cb_11"=>$cb_11,
                    "cb_12"=>$cb_12
                 );

    $this->db->insert('ppm_list_checkbox',$ppm_list_checkbox);
    /* CHECK BOX */


    //ppm_hardware_device
    $data2 = array(
                    "id_number"=>$id_number,
                    "ppm_type"=>$ppm_type,
                    "location"=>$location,
                    "level"=>$level,
                    "department"=>$department,
                    "model"=>$model,
                    "serial_number"=>$serial_number,
                    "brand"=>$brand,
                    "local"=>$local,
                    "network_ip"=>$ip,
                    "port"=>$port,
                    "device_tag"=>$device_tag,
                    "need_replacement"=>$need_replacement,
                    "date_replacement"=>$date_replaced,
                    "ppm_tag"=>$ppm_tag,
                    "room_name"=>$room_name
                  );

    $this->db->insert('ppm_printer_device',$data2);

    $data3 = array(
                    "id_number"=>$id_number,
                    "checklist_1"=>$checklist_1,
                    "checklist_2"=>$checklist_2,
                    "checklist_3"=>$checklist_3,
                    "checklist_4"=>$checklist_4,
                    "checklist_5"=>$checklist_5,
                    "checklist_6"=>$checklist_6,
                    "checklist_7"=>$checklist_7,
                    "checklist_8"=>$checklist_8,
                    "toner_percent"=>$toner_percent
                  );

    $this->db->insert('ppm_printer_checklist',$data3);


    $data4 = array(
                    "id_number"=>$id_number,
                    "comment"=>$comment
                  );

    $this->db->insert('ppm_comment',$data4);


    //update computer
    $data_asset = array(
                  "location"=>$location,
                  "model"=>$model,
                  "serial_number"=>$serial_number,
                  "ip_address"=>$ip,
                  "network_port"=>$port,
               );

    $this->db->where('name',$hostname);
    $this->db->update('hardware',$data_asset);


    $data_location = array("department"=>$department,"level"=>$level,"room_name"=>$room_name);
    $this->db->where('name',$location);
    $this->db->update('location',$data_location);

    $data_asset= array("department"=>$department);
    $this->db->where('name',$hostname);
    $this->db->update('ppm_worksation_asset',$data_asset);

    //redirect('Form_PPM/List_Hardware');
    redirect('Form_PPM/data_workstation/'.$ppm_id);

  }


  function Update_Printer()
  {
    $toner_percent = $this->input->post('toner_percent');

    $id_number = $this->input->post('id');
    $get_agent = $this->get_agent($id_number);

    $type_ppm = $this->input->post('type_ppm');
    $type_device = $this->input->post('type_device');
    //$responsible = $this->input->post('responsible');
    
    $responsible = $this->session->userdata('first_name');

    $ppm_type = $this->input->post('ppm_type');

    $hostname = $this->input->post('hostname');
    $location = $this->input->post('location');
    $level = $this->input->post('level');
    $department = $this->input->post('department');
    $model = $this->input->post('model');
    $serial_number = $this->input->post('serial_number');
    $brand = $this->input->post('brand');
    $local = $this->input->post('local');
    $ip = $this->input->post('ip');
    $port = $this->input->post('port');
    $device_tag = $this->input->post('device_tag');
    $need_replacement = $this->input->post('need_replacement');
    $date_replaced = $this->input->post('date_replaced');
    $ppm_tag = $this->input->post('ppm_tag');

    $checklist_1 = $this->input->post('checklist_1');
    $checklist_2 = $this->input->post('checklist_2');
    $checklist_3 = $this->input->post('checklist_3');
    $checklist_4 = $this->input->post('checklist_4');
    $checklist_5 = $this->input->post('checklist_5');
    $checklist_6 = $this->input->post('checklist_6');
    $checklist_7 = $this->input->post('checklist_7');
    $checklist_8 = $this->input->post('checklist_8');

    $comment = $this->input->post('comment');

    $customer = $this->input->post('acknowledge');
    $acknowledge = $this->input->post('acknowledge');

    $id_number = $this->input->post('id');

    //default data 
    $updateBy = $this->session->userdata('userid'); // id yang login system
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("H:i:s");
    $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    $datetime = $dateReg.' '.$timeReg; //current date 


    $endorse = $this->input->post('endorse');

    // if($endorse!=''){
    //   $status='Endorse';
    // } else {
    //   if($customer!=''){
    //     $status='Need Verify';
    //   } else {
    //     $status='Ordered';
    //   }
    // }

    if($endorse!=''){
      $status='Endorse';
    } else {
      $status='Ordered';
    }


    $reject_ppm_task = $this->input->post('reject_ppm_task');
    $reason_reject = $this->input->post('reason_reject');

    if($reject_ppm_task=='Yes'){
      $status='Rejected';

      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $date_reject= $dateReg.' '.$timeReg; //current date 
    } else {
      $date_reject = '';
    }

    if($reject_ppm_task=='No'){
      $status='Done';
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $date_endorse = $dateReg.' '.$timeReg; //current date 
    } else {
      $date_endorse = '';
    }

    $room_name = $this->input->post('room_name');

    $year = $this->input->post('year');
    if(empty($year)){$year=date("Y");}

    //if($get_agent==$this->session->userdata('first_name')){

      $this->db->where('id_number',$id_number);
      // $data = array(
      //                 "hostname"=>$hostname,
      //                 "location"=>$location,
      //                 "year"=> $year,
      //                 "ppm_type"=>$type_ppm,
      //                 "ppm_device"=>$type_device,
      //                 "acknowledge"=>$customer,
      //                 "status"=>$status,
      //                 "endorse"=>$endorse,
      //              );

      $perform_date = $this->input->post('perform_date');

      $id_reference = $this->input->post('id_reference');
      $code = $this->input->post('code');

       $data = array(
                    "hostname"=>$hostname,
                    "location"=>$location,
                    "year"=> $year,
                    "ppm_type"=>$type_ppm,
                    "ppm_device"=>$type_device,
                    "responsible"=>$responsible,
                    "id_number"=>$id_number,
                    "acknowledge"=>$acknowledge,
                    "created_date"=>$datetime,
                    "status"=>$status,
                    "id_reference"=>$id_reference,
                    "code_reference"=>$code,
                    "endorse"=>$endorse,
                    "perform_date"=>$perform_date
                 );


      $this->db->update('ppm_register',$data);

/* CHECK BOX */
    $cb_1 = $this->input->post('cb_1'); if(empty($cb_1)){$cb_1='';}
    $cb_2 = $this->input->post('cb_2'); if(empty($cb_2)){$cb_2='';}
    $cb_3 = $this->input->post('cb_3'); if(empty($cb_3)){$cb_3='';}
    $cb_4 = $this->input->post('cb_4'); if(empty($cb_4)){$cb_4='';}
    $cb_5 = $this->input->post('cb_5'); if(empty($cb_5)){$cb_5='';}
    $cb_6 = $this->input->post('cb_6'); if(empty($cb_6)){$cb_6='';}
    $cb_7 = $this->input->post('cb_7'); if(empty($cb_7)){$cb_7='';}
    $cb_8 = $this->input->post('cb_8'); if(empty($cb_8)){$cb_8='';}
    $cb_9 = $this->input->post('cb_9'); if(empty($cb_9)){$cb_9='';}
    $cb_10 = $this->input->post('cb_10'); if(empty($cb_10)){$cb_10='';}
    $cb_11 = $this->input->post('cb_11'); if(empty($cb_11)){$cb_11='';}
    $cb_12 = $this->input->post('cb_12'); if(empty($cb_12)){$cb_12='';}


    // ppm_computer_device
    $ppm_list_checkbox = array(
                    "cb_1"=>$cb_1,
                    "cb_2"=>$cb_2,
                    "cb_3"=>$cb_3,
                    "cb_4"=>$cb_4,
                    "cb_5"=>$cb_5,
                    "cb_6"=>$cb_6,
                    "cb_7"=>$cb_7,
                    "cb_8"=>$cb_8,
                    "cb_9"=>$cb_9,
                    "cb_10"=>$cb_10,
                    "cb_11"=>$cb_11,
                    "cb_12"=>$cb_12
                 );

    //var_dump($ppm_list_checkbox); exit();
    $this->db->where('id_number',$id_number);
    $this->db->update('ppm_list_checkbox',$ppm_list_checkbox);
    /* CHECK BOX */


      //ppm_hardware_device
      $this->db->where('id_number',$id_number);
      $data2 = array(
                      "ppm_type"=>$ppm_type,
                      "location"=>$location,
                      "level"=>$level,
                      "department"=>$department,
                      "model"=>$model,
                      "serial_number"=>$serial_number,
                      "brand"=>$brand,
                      "local"=>$local,
                      "network_ip"=>$ip,
                      "port"=>$port,
                      "device_tag"=>$device_tag,
                      "need_replacement"=>$need_replacement,
                      "date_replacement"=>$date_replaced,
                      "ppm_tag"=>$ppm_tag,
                      "room_name"=>$room_name
                    );

      $this->db->update('ppm_printer_device',$data2);


      
      $data3 = array(
                      "checklist_1"=>$checklist_1,
                      "checklist_2"=>$checklist_2,
                      "checklist_3"=>$checklist_3,
                      "checklist_4"=>$checklist_4,
                      "checklist_5"=>$checklist_5,
                      "checklist_6"=>$checklist_6,
                      "checklist_7"=>$checklist_7,
                      "checklist_8"=>$checklist_8,
                      "toner_percent"=>$toner_percent,  
                    );
      $this->db->where('id_number',$id_number);
      $this->db->update('ppm_printer_checklist',$data3);


      

      if(!empty($comment)){
        $this->db->where('id_number',$id_number);
        $data4 = array(
                      "comment"=>$comment
                    );

        $this->db->update('ppm_comment',$data4);
      }
      

    // } else {


    //   $get_person_verify = $this->get_person_verify($id_number);

    //   if($get_person_verify==$this->session->userdata('first_name')){

    //     $this->db->where('id_number',$id_number);
    //     $data = array(
                        
    //                     "status"=>$status,
    //                     "endorse"=>$acknowledge,
    //                     "reject_ppm_task"=>$reject_ppm_task,
    //                     "reason_reject"=>$reason_reject,
    //                     "date_endorse"=>$date_endorse,
    //                     "date_reject"=>$date_reject,
    //                  );

    //   } else {

    //     $this->db->where('id_number',$id_number);
    //     $data = array(
                      
    //                     "status"=>$status,
    //                     "reject_ppm_task"=>$reject_ppm_task,
    //                     "reason_reject"=>$reason_reject,
    //                     "date_endorse"=>$date_endorse,
    //                     "date_reject"=>$date_reject,
    //                  );

    //   }

    //   $this->db->update('ppm_register',$data);


    //}


    //update computer
    $data_asset = array(
                  "location"=>$location,
                  "model"=>$model,
                  "serial_number"=>$serial_number,
                  "ip_address"=>$ip,
                  "network_port"=>$port,
               );

    $this->db->where('name',$hostname);
    $this->db->update('hardware',$data_asset);


    $data_location = array("department"=>$department,"level"=>$level,"room_name"=>$room_name);
    $this->db->where('name',$location);
    $this->db->update('location',$data_location);

    $data_asset= array("department"=>$department);
    $this->db->where('name',$hostname);
    $this->db->update('ppm_worksation_asset',$data_asset);

    //redirect('Form_PPM/List_Hardware');
    $ppm_id = $this->input->post('ppm_id');
    redirect('Form_PPM/data_workstation/'.$ppm_id);

  }

  function Add_scanner()
  {
    $ppm_id = $this->input->post('ppm_id');

    $type_ppm = $this->input->post('type_ppm');
    $type_device = $this->input->post('type_device');
    //$responsible = $this->input->post('responsible');
    
    $responsible = $this->session->userdata('first_name');

    $ppm_type = $this->input->post('ppm_type');

    $hostname = $this->input->post('hostname');
    $location = $this->input->post('location');
    $level = $this->input->post('level');
    $department = $this->input->post('department');
    $model = $this->input->post('model');
    $serial_number = $this->input->post('serial_number');
    $brand = $this->input->post('brand');
    $local = $this->input->post('local');
    $ip = $this->input->post('ip');
    $port = $this->input->post('port');
    $device_tag = $this->input->post('device_tag');
    $need_replacement = $this->input->post('need_replacement');
    $date_replaced = $this->input->post('date_replaced');
    $ppm_tag = $this->input->post('ppm_tag');

    $checklist_1 = $this->input->post('checklist_1');
    $checklist_2 = $this->input->post('checklist_2');
    $checklist_3 = $this->input->post('checklist_3');
    $checklist_4 = $this->input->post('checklist_4');
    $checklist_5 = $this->input->post('checklist_5');
    $checklist_6 = $this->input->post('checklist_6');

    $comment = $this->input->post('comment');

    $customer = $this->input->post('acknowledge');
    $acknowledge = $this->input->post('acknowledge');

    $id_number = rand();

    //default data 
    $updateBy = $this->session->userdata('userid'); // id yang login system
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("H:i:s");
    $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    $datetime = $dateReg.' '.$timeReg; //current date 

    //generated_code 
    $code = 'SC';
    $number  = '1';
    $ref = str_pad($number,6,"0",STR_PAD_LEFT); // 0001

    $check = $this->Admin->check_id_ppm($code);

    if(!empty($check)){
      $number = intval($check) + 1;
      $ref = str_pad($number,6,"0",STR_PAD_LEFT); // 0001
    }


    $id_reference = $ref;

    $endorse = $this->input->post('endorse');

    // if($endorse!=''){
    //   $status='Endorse';
    // } else {
    //   if($customer!=''){
    //     $status='Need Verify';
    //   } else {
    //     $status='Ordered';
    //   }
    // }

    if($endorse!=''){
      $status='Endorse';
    } else {
      $status='Ordered';
    }


    $room_name = $this->input->post('room_name');

    $year = $this->input->post('year');
    if(empty($year)){$year=date("Y");}


    $ppm_id = $this->input->post('ppm_id');


    $perform_date = $this->input->post('perform_date');

    // $data = array(
    //                 "hostname"=>$hostname,
    //                 "location"=>$location,
    //                 "year"=> $year,
    //                 "ppm_type"=>$type_ppm,
    //                 "ppm_device"=>$type_device,
    //                 "responsible"=>$responsible,
    //                 "id_number"=>$id_number,
    //                 "acknowledge"=>$customer,
    //                 "created_date"=>$datetime,
    //                 "status"=>$status,
    //                 "id_reference"=>$id_reference,
    //                 "code_reference"=>$code,
    //                 "endorse"=>$endorse
    //              );
    $data = array(
                    "hostname"=>$hostname,
                    "location"=>$location,
                    "year"=> $year,
                    "ppm_type"=>$type_ppm,
                    "ppm_device"=>$type_device,
                    "responsible"=>$responsible,
                    "id_number"=>$id_number,
                    "acknowledge"=>$acknowledge,
                    "created_date"=>$datetime,
                    "status"=>$status,
                    "id_reference"=>$id_reference,
                    "code_reference"=>$code,
                    "endorse"=>$endorse,
                    "type_ppm_activity"=>$ppm_id,
                    'status_ppm'=>'Performed',
                    'perform_date'=>$perform_date
                 );

    $this->db->insert('ppm_register',$data);

/* CHECK BOX */
    $cb_1 = $this->input->post('cb_1'); if(empty($cb_1)){$cb_1='';}
    $cb_2 = $this->input->post('cb_2'); if(empty($cb_2)){$cb_2='';}
    $cb_3 = $this->input->post('cb_3'); if(empty($cb_3)){$cb_3='';}
    $cb_4 = $this->input->post('cb_4'); if(empty($cb_4)){$cb_4='';}
    $cb_5 = $this->input->post('cb_5'); if(empty($cb_5)){$cb_5='';}
    $cb_6 = $this->input->post('cb_6'); if(empty($cb_6)){$cb_6='';}
    $cb_7 = $this->input->post('cb_7'); if(empty($cb_7)){$cb_7='';}
    $cb_8 = $this->input->post('cb_8'); if(empty($cb_8)){$cb_8='';}
    $cb_9 = $this->input->post('cb_9'); if(empty($cb_9)){$cb_9='';}
    $cb_10 = $this->input->post('cb_10'); if(empty($cb_10)){$cb_10='';}
    $cb_11 = $this->input->post('cb_11'); if(empty($cb_11)){$cb_11='';}
    $cb_12 = $this->input->post('cb_12'); if(empty($cb_12)){$cb_12='';}


    // ppm_computer_device
    $ppm_list_checkbox = array(
                    "id_number"=>$id_number,
                    "cb_1"=>$cb_1,
                    "cb_2"=>$cb_2,
                    "cb_3"=>$cb_3,
                    "cb_4"=>$cb_4,
                    "cb_5"=>$cb_5,
                    "cb_6"=>$cb_6,
                    "cb_7"=>$cb_7,
                    "cb_8"=>$cb_8,
                    "cb_9"=>$cb_9,
                    "cb_10"=>$cb_10,
                    "cb_11"=>$cb_11,
                    "cb_12"=>$cb_12
                 );

    $this->db->insert('ppm_list_checkbox',$ppm_list_checkbox);
    /* CHECK BOX */


    //ppm_hardware_device
    $data2 = array(
                    "id_number"=>$id_number,
                    "ppm_type"=>$ppm_type,
                    "location"=>$location,
                    "level"=>$level,
                    "department"=>$department,
                    "model"=>$model,
                    "serial_number"=>$serial_number,
                    "brand"=>$brand,
                    "local"=>$local,
                    "network_ip"=>$ip,
                    "port"=>$port,
                    "device_tag"=>$device_tag,
                    "need_replacement"=>$need_replacement,
                    "date_replacement"=>$date_replaced,
                    "ppm_tag"=>$ppm_tag,
                    "room_name"=>$room_name
                  );

    $this->db->insert('ppm_printer_device',$data2);



    $data3 = array(
                    "id_number"=>$id_number,
                    "checklist_1"=>$checklist_1,
                    "checklist_2"=>$checklist_2,
                    "checklist_3"=>$checklist_3,
                    "checklist_4"=>$checklist_4,
                    "checklist_5"=>$checklist_5,
                    "checklist_6"=>$checklist_6,
                  );

    $this->db->insert('ppm_printer_checklist',$data3);

    $data4 = array(
                    "id_number"=>$id_number,
                    "comment"=>$comment
                  );

    $this->db->insert('ppm_comment',$data4);




    //update computer
    $data_asset = array(
                  "location"=>$location,
                  "model"=>$model,
                  "serial_number"=>$serial_number,
                  "ip_address"=>$ip,
                  "network_port"=>$port,
               );

    $this->db->where('name',$hostname);
    $this->db->update('hardware',$data_asset);


    $data_location = array("department"=>$department,"level"=>$level,"room_name"=>$room_name);
    $this->db->where('name',$location);
    $this->db->update('location',$data_location);

    $data_asset= array("department"=>$department);
    $this->db->where('name',$hostname);
    $this->db->update('ppm_worksation_asset',$data_asset);

    //redirect('Form_PPM/List_Hardware');
    redirect('Form_PPM/data_workstation/'.$ppm_id);
  }


  function Update_Scanner()
  {
    $id_number = $this->input->post('id');
    $get_agent = $this->get_agent($id_number);

    $type_ppm = $this->input->post('type_ppm');
    $type_device = $this->input->post('type_device');
    //$responsible = $this->input->post('responsible');

    $responsible = $this->session->userdata('first_name');

    $ppm_type = $this->input->post('ppm_type');

    $hostname = $this->input->post('hostname');
    $location = $this->input->post('location');
    $level = $this->input->post('level');
    $department = $this->input->post('department');
    $model = $this->input->post('model');
    $serial_number = $this->input->post('serial_number');
    $brand = $this->input->post('brand');
    $local = $this->input->post('local');
    $ip = $this->input->post('ip');
    $port = $this->input->post('port');
    $device_tag = $this->input->post('device_tag');
    $need_replacement = $this->input->post('need_replacement');
    $date_replaced = $this->input->post('date_replaced');
    $ppm_tag = $this->input->post('ppm_tag');

    $checklist_1 = $this->input->post('checklist_1');
    $checklist_2 = $this->input->post('checklist_2');
    $checklist_3 = $this->input->post('checklist_3');
    $checklist_4 = $this->input->post('checklist_4');
    $checklist_5 = $this->input->post('checklist_5');
    $checklist_6 = $this->input->post('checklist_6');

    $comment = $this->input->post('comment');

    $customer = $this->input->post('acknowledge');
    $acknowledge = $this->input->post('acknowledge');

    $id_number = $this->input->post('id');

    //default data 
    $updateBy = $this->session->userdata('userid'); // id yang login system
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("H:i:s");
    $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    $datetime = $dateReg.' '.$timeReg; //current date 

    $endorse = $this->input->post('endorse');

    // if($endorse!=''){
    //   $status='Endorse';
    // } else {
    //   if($customer!=''){
    //     $status='Need Verify';
    //   } else {
    //     $status='Ordered';
    //   }
    // }

    if($endorse!=''){
      $status='Endorse';
    } else {
      $status='Ordered';
    }

    $reject_ppm_task = $this->input->post('reject_ppm_task');
    $reason_reject = $this->input->post('reason_reject');

    if($reject_ppm_task=='Yes'){
      $status='Rejected';

      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $date_reject= $dateReg.' '.$timeReg; //current date 
    } else {
      $date_reject = '';
    }

    if($reject_ppm_task=='No'){
      $status='Done';
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $date_endorse = $dateReg.' '.$timeReg; //current date 
    } else {
      $date_endorse = '';
    }


    $room_name = $this->input->post('room_name');

    $perform_date = $this->input->post('perform_date');

    $year = $this->input->post('year');
    if(empty($year)){$year=date("Y");}

    //if($get_agent==$this->session->userdata('first_name')){

      $this->db->where('id_number',$id_number);
      // $data = array(
      //                 "hostname"=>$hostname,
      //                 "location"=>$location,
      //                 "year"=> $year,
      //                 "ppm_type"=>$type_ppm,
      //                 "ppm_device"=>$type_device,
      //                 "id_number"=>$id_number,
      //                 "acknowledge"=>$customer,
      //                 "status"=>$status,
      //                 "endorse"=>$endorse,
      //              );
      $data = array(
                      "hostname"=>$hostname,
                      "location"=>$location,
                      "year"=> $year,
                      "ppm_type"=>$type_ppm,
                      "ppm_device"=>$type_device,
                      "id_number"=>$id_number,
                      "acknowledge"=>$acknowledge,
                      "status"=>$status,
                      "endorse"=>$endorse,
                      "perform_date"=>$perform_date
                   );

      $this->db->update('ppm_register',$data);

      //ppm_hardware_device
      $this->db->where('id_number',$id_number);
      $data2 = array(
                      "ppm_type"=>$ppm_type,
                      "location"=>$location,
                      "level"=>$level,
                      "department"=>$department,
                      "model"=>$model,
                      "serial_number"=>$serial_number,
                      "brand"=>$brand,
                      "local"=>$local,
                      "network_ip"=>$ip,
                      "port"=>$port,
                      "device_tag"=>$device_tag,
                      "need_replacement"=>$need_replacement,
                      "date_replacement"=>$date_replaced,
                      "ppm_tag"=>$ppm_tag,
                      "room_name"=>$room_name
                    );

      $this->db->update('ppm_printer_device',$data2);


      $this->db->where('id_number',$id_number);
      $data3 = array(
                      "checklist_1"=>$checklist_1,
                      "checklist_2"=>$checklist_2,
                      "checklist_3"=>$checklist_3,
                      "checklist_4"=>$checklist_4,
                      "checklist_5"=>$checklist_5,
                      "checklist_6"=>$checklist_6,
                    );

      $this->db->update('ppm_printer_checklist',$data3);

      $this->db->where('id_number',$id_number);
      $data4 = array(
                      "comment"=>$comment
                    );

      $this->db->update('ppm_comment',$data4);

    // } else {


    //   $get_person_verify = $this->get_person_verify($id_number);

    //   if($get_person_verify==$this->session->userdata('first_name')){

    //     $this->db->where('id_number',$id_number);
    //     $data = array(
                        
    //                     "status"=>$status,
    //                     "endorse"=>$acknowledge,
    //                     "reject_ppm_task"=>$reject_ppm_task,
    //                     "reason_reject"=>$reason_reject,
    //                     "date_endorse"=>$date_endorse,
    //                     "date_reject"=>$date_reject,
    //                  );

    //   } else {

    //     $this->db->where('id_number',$id_number);
    //     $data = array(
                      
    //                     "status"=>$status,
    //                     "reject_ppm_task"=>$reject_ppm_task,
    //                     "reason_reject"=>$reason_reject,
    //                     "date_endorse"=>$date_endorse,
    //                     "date_reject"=>$date_reject,
    //                  );

    //   }

    //   $this->db->update('ppm_register',$data);


    // }


/* CHECK BOX */
    $cb_1 = $this->input->post('cb_1'); if(empty($cb_1)){$cb_1='';}
    $cb_2 = $this->input->post('cb_2'); if(empty($cb_2)){$cb_2='';}
    $cb_3 = $this->input->post('cb_3'); if(empty($cb_3)){$cb_3='';}
    $cb_4 = $this->input->post('cb_4'); if(empty($cb_4)){$cb_4='';}
    $cb_5 = $this->input->post('cb_5'); if(empty($cb_5)){$cb_5='';}
    $cb_6 = $this->input->post('cb_6'); if(empty($cb_6)){$cb_6='';}
    $cb_7 = $this->input->post('cb_7'); if(empty($cb_7)){$cb_7='';}
    $cb_8 = $this->input->post('cb_8'); if(empty($cb_8)){$cb_8='';}
    $cb_9 = $this->input->post('cb_9'); if(empty($cb_9)){$cb_9='';}
    $cb_10 = $this->input->post('cb_10'); if(empty($cb_10)){$cb_10='';}
    $cb_11 = $this->input->post('cb_11'); if(empty($cb_11)){$cb_11='';}
    $cb_12 = $this->input->post('cb_12'); if(empty($cb_12)){$cb_12='';}


    // ppm_computer_device
    $ppm_list_checkbox = array(
                    "cb_1"=>$cb_1,
                    "cb_2"=>$cb_2,
                    "cb_3"=>$cb_3,
                    "cb_4"=>$cb_4,
                    "cb_5"=>$cb_5,
                    "cb_6"=>$cb_6,
                    "cb_7"=>$cb_7,
                    "cb_8"=>$cb_8,
                    "cb_9"=>$cb_9,
                    "cb_10"=>$cb_10,
                    "cb_11"=>$cb_11,
                    "cb_12"=>$cb_12
                 );

    //var_dump($ppm_list_checkbox); exit();
    $this->db->where('id_number',$id_number);
    $this->db->update('ppm_list_checkbox',$ppm_list_checkbox);
    /* CHECK BOX */


    //update computer
    $data_asset = array(
                  "location"=>$location,
                  "model"=>$model,
                  "serial_number"=>$serial_number,
                  "ip_address"=>$ip,
                  "network_port"=>$port,
               );

    $this->db->where('name',$hostname);
    $this->db->update('hardware',$data_asset);


    $data_location = array("department"=>$department,"level"=>$level,"room_name"=>$room_name);
    $this->db->where('name',$location);
    $this->db->update('location',$data_location);

    $data_asset= array("department"=>$department);
    $this->db->where('name',$hostname);
    $this->db->update('ppm_worksation_asset',$data_asset);

    //redirect('Form_PPM/List_Hardware'); 
    $ppm_id = $this->input->post('ppm_id');
    redirect('Form_PPM/data_workstation/'.$ppm_id);

  }


  function Dtable_list_computer()
  {
    header('Content-Type: application/json');
    $type = $this->input->post('type');
    echo $this->Admin->Dtable_list_computer($type);
  }


  function Dtable_list_computer_only()
  {
    header('Content-Type: application/json');
    $type = $this->input->post('type');
    echo $this->Admin->Dtable_list_computer_only($type);
  }


  function Dtable_list_server_only()
  {
    header('Content-Type: application/json');
    $type = $this->input->post('type');
    echo $this->Admin->Dtable_list_server_only($type);
  }


  function Dtable_list_hardware()
  {
    header('Content-Type: application/json');
    $type = $this->input->post('type');
    echo $this->Admin->Dtable_list_hardware($type);
  }

  function Dtable_list_network_only()
  {
    header('Content-Type: application/json');
    $type = $this->input->post('type');
    echo $this->Admin->Dtable_list_network_only($type);
  }


  function Dtable_list_printer_only()
  {
    header('Content-Type: application/json');
    $type = $this->input->post('type');
    echo $this->Admin->Dtable_list_printer_only($type);
  }

  function Go_Details()
  {
    $id = $this->uri->segment(3);
    $type = $this->uri->segment(4);
    $code = $this->Admin->check_code_ppm($id);

    //var_dump($code); exit();

    switch ($code) {

      case 'SV':
        redirect('Form_PPM/PPM_Form_Server_Stroage/Update/'.$id.'/'.$type);
        break;

      case 'P':
        redirect('Form_PPM/PPM_Form_Server_Stroage/Update/'.$id.'/'.$type);
        break;

      case 'V':
        redirect('Form_PPM/PPM_Form_Server_Stroage/Update/'.$id.'/'.$type);
        break;

      case 'S':
        redirect('Form_PPM/PPM_Form_Server_Stroage/Update/'.$id.'/'.$type);
        break;

      case 'C':
        redirect('Form_PPM/PPM_Form_Computer/Update/'.$id.'/'.$type);
        break;

      case 'N':
        redirect('Form_PPM/Notebook/Update/'.$id.'/'.$type);
        break;


      case 'SW':
        redirect('Form_PPM/Switch_PPM/Update/'.$id.'/'.$type);
        break;


      case 'U':
        redirect('Form_PPM/UPS/Update/'.$id.'/'.$type);
        break;


      case 'FW':
        redirect('Form_PPM/Firewall/Update/'.$id.'/'.$type);
        break;


      case 'LB':
        redirect('Form_PPM/Load_balance/Update/'.$id.'/'.$type);
        break;


      case 'AP':
        redirect('Form_PPM/Access_point/Update/'.$id.'/'.$type);
        break;


      case 'PR':
        redirect('Form_PPM/Printer/Update/'.$id.'/'.$type);
        break;


      case 'SC':
        redirect('Form_PPM/Scanner/Update/'.$id.'/'.$type);
        break;
      
      default:
        # code...
        break;
    }
  }



  function detail_ppm()
  {
      $id = $this->input->post('id');  
      $query = $this->Admin->detail_ppm($id);

      if(empty($query)){
        echo 'Tiada Data Ditemui';
      } else {
        foreach ($query as $data) 
        {
        
        }
        echo json_encode($data);
      }
  }


  function detail_computer()
  {
      $id = $this->input->post('id');  
      $query = $this->Admin->detail_computer($id);

      if(empty($query)){
        echo 'Tiada Data Ditemui';
      } else {
        foreach ($query as $data) 
        {
        
        }
        echo json_encode($data);
      }
  }


  function detail_server()
  {
      $id = $this->input->post('id');  
      $query = $this->Admin->detail_server($id);

      if(empty($query)){
        echo 'Tiada Data Ditemui';
      } else {
        foreach ($query as $data) 
        {
        
        }
        echo json_encode($data);
      }
  }


  function detail_network()
  {
      $id = $this->input->post('id');  
      $query = $this->Admin->detail_network($id);

      if(empty($query)){
        echo 'Tiada Data Ditemui';
      } else {
        foreach ($query as $data) 
        {
        
        }
        echo json_encode($data);
      }
  }


  function detail_printer()
  {
      $id = $this->input->post('id');  
      $query = $this->Admin->detail_printer($id);

      if(empty($query)){
        echo 'Tiada Data Ditemui';
      } else {
        foreach ($query as $data) 
        {
        
        }
        echo json_encode($data);
      }
  }





  function PDF_Computer()
  {
    $data = [];
    $data['id'] = $this->uri->segment(3);
    $hostname = $this->get_hostname($this->uri->segment(3));
    $act = $this->uri->segment(4);
    

    $id = $this->uri->segment(3);
    $code = $this->Admin->check_code_ppm($id);
    $title = '';
    switch ($code) {

      case 'SV':
        $data['data'] = $this->Admin->detail_server($id);
        $data['comment_user'] = $this->Admin->comment_user($id);
        $html=$this->load->view('template/body/Form_PPM/Computer/PDF/Server', $data, true);
        $title = 'Server_';
        break;

      case 'P':
        $data['data'] = $this->Admin->detail_server($id);
        $data['comment_user'] = $this->Admin->comment_user($id);
        $html=$this->load->view('template/body/Form_PPM/Computer/PDF/Server', $data, true);
        $title = 'Physical_';
        break;

      case 'V':
        $data['data'] = $this->Admin->detail_server($id);
        $data['comment_user'] = $this->Admin->comment_user($id);
        $html=$this->load->view('template/body/Form_PPM/Computer/PDF/Server', $data, true);
        $title = 'Virtual_';
        break;

      case 'S':
        $data['data'] = $this->Admin->detail_server($id);
        $data['comment_user'] = $this->Admin->comment_user($id);
        $html=$this->load->view('template/body/Form_PPM/Computer/PDF/Server', $data, true);
        $title = 'Storage_';
        break;

      case 'C':
        $data['data'] = $this->Admin->detail_computer($id);
        $data['comment_user'] = $this->Admin->comment_user($id);

        //var_dump($query);exit();
        $html=$this->load->view('template/body/Form_PPM/Computer/PDF/Computer', $data, true);
        $title = 'Computer_';
        break;

      case 'N':
        $data['data'] = $this->Admin->detail_computer($id);
        $data['comment_user'] = $this->Admin->comment_user($id);
        $html=$this->load->view('template/body/Form_PPM/Computer/PDF/Notebook', $data, true);
        $title = 'Notebook_';
        break;
      
      default:
        # code...
        break;
    }

   //echo $html;
   //var_dump($html); 
   //exit();
    
    $this->generate_pdf($html,$title,$hostname,$act);
  }

  function PDF_Hardware()
  {
    $data = [];
    $data['id'] = $this->uri->segment(3);
    $hostname = $this->get_hostname($this->uri->segment(3));
    $act = $this->uri->segment(4);
    // $html=$this->load->view('template/body/Form_PPM/Hardware/PDF/UPS', $data, true);
    //$html=$this->load->view('template/body/Form_PPM/Hardware/PDF/Printer/Printer', $data, true);

    $id = $this->uri->segment(3);
    //var_dump($id); exit();
    $code = $this->Admin->check_code_ppm($id);

    $title = '';
    //var_dump($code); exit();
    switch ($code) {


      case 'SW':
        $data['data'] = $this->Admin->detail_network($id);
        $data['comment_user'] = $this->Admin->comment_user($id);
        $html=$this->load->view('template/body/Form_PPM/Hardware/PDF/Switch', $data, true);
        $title = 'switch_';
        break;


      case 'U':
        $data['data'] = $this->Admin->detail_network($id);
        $data['comment_user'] = $this->Admin->comment_user($id);
        $html=$this->load->view('template/body/Form_PPM/Hardware/PDF/UPS', $data, true);
        $title = 'ups_';
        break;


      case 'FW':
        $data['data'] = $this->Admin->detail_network($id);
        $data['comment_user'] = $this->Admin->comment_user($id);
        $html=$this->load->view('template/body/Form_PPM/Hardware/PDF/Firewall', $data, true);
        $title = 'firewall_';
        break;


      case 'LB':
        $data['data'] = $this->Admin->detail_network($id);
        $data['comment_user'] = $this->Admin->comment_user($id);
        $html=$this->load->view('template/body/Form_PPM/Hardware/PDF/Load_Balance', $data, true);
        $title = 'load_balancer_';
        break;


      case 'AP':
        $data['data'] = $this->Admin->detail_network($id);
        $data['comment_user'] = $this->Admin->comment_user($id); //var_dump($data); exit();
        $html=$this->load->view('template/body/Form_PPM/Hardware/PDF/Access_point', $data, true);
        // $title = 'access_point_';
        $title = 'network_';
        break;


      case 'PR':
        $data['data'] = $this->Admin->detail_printer($id);
        $data['comment_user'] = $this->Admin->comment_user($id);
        $html=$this->load->view('template/body/Form_PPM/Hardware/PDF/Printer/Printer', $data, true);
        $title = 'printer_';
        break;


      case 'SC':
        $data['data'] = $this->Admin->detail_printer($id);
        $data['comment_user'] = $this->Admin->comment_user($id);
        $html=$this->load->view('template/body/Form_PPM/Hardware/PDF/Printer/Scanner', $data, true);
        $title = 'scanner_';
        break;
      
      default:
        # code...
        break;
    }

    $this->generate_pdf($html,$title,$hostname,$act);
  }

  function generate_pdf($html,$title,$hostname,$act)
  {


    $rand = rand();
    //$pdfFilePath = $title.$rand.".pdf";
    $pdfFilePath = $act.'-'.$hostname.".pdf";
    $this->load->library('M_pdf');
    $stylesheet = file_get_contents('asset_template/beauty/css/bootstrap.min.css');
    $this->m_pdf->pdf->WriteHTML($stylesheet, 1); // CSS Script goes here.
    $this->m_pdf->pdf->WriteHTML($html);
    $this->m_pdf->pdf->Output($pdfFilePath, "D");
  }


  function Main_PPM()
  {
    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
    { 
        $this->data['site_title'] = 'Add_Agent';
        $this->load->view('template/header/header');
        $this->load->view('template/body/asset_v3_ppm',$this->data);
        $this->load->view('template/footer/footer');

    } else { 
        $this->load->view('login');
    }  
  }


  function List_activity_workstation($rowno=0)
  {
    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
    { 
        
        $this->load->library('pagination');

        $search_text = '';
        if($this->input->post('submit') != NULL ){
          $search_text = $this->input->post('search');
          $this->session->set_userdata(array('search'=>$search_text));
        } else {
          if($this->session->userdata('search') != NULL){
            $search_text = $this->session->userdata('search');
          }
        }

        $rowperpage = 10;
        if($rowno != 0){
          $rowno = ($rowno-1) * $rowperpage;
        }


        $allcount = $this->Admin->List_activity_workstation_Count($search_text);
        $users_record = $this->Admin->List_activity_workstation_Data($rowno,$rowperpage,$search_text);


        $segment1 = $this->uri->segment(1);
        $segment2 = $this->uri->segment(2);


        $config['base_url'] = base_url().$segment1.'/'.$segment2;
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;


        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li class="paginate_button page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '«';
        $config['prev_tag_open'] = '<li class="paginate_button page-item prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '»';
        $config['next_tag_open'] = '<li paginate_button page-item >';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li paginate_button page-item >';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="paginate_button page-item active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li paginate_button page-item >';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);


        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $users_record;
        $data['row'] = $rowno;
        $data['search'] = $search_text;

        $this->session->set_userdata(array('id_activity'=>NULL));

        $this->load->view('template/header/header');
        $this->load->view('template/body/Form_PPM_v2/List_activity_workstation',$data);
        $this->load->view('template/footer/footer');

    } else { 
        $this->load->view('login');
    }  
  }



  function List_activity_server($rowno=0)
  {
    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
    { 
        
        $this->load->library('pagination');

        $search_text = '';
        if($this->input->post('submit') != NULL ){
          $search_text = $this->input->post('search');
          $this->session->set_userdata(array('search'=>$search_text));
        } else {
          if($this->session->userdata('search') != NULL){
            $search_text = $this->session->userdata('search');
          }
        }

        $rowperpage = 10;
        if($rowno != 0){
          $rowno = ($rowno-1) * $rowperpage;
        }


        $allcount = $this->Admin->List_activity_server_Count($search_text);
        $users_record = $this->Admin->List_activity_server_Data($rowno,$rowperpage,$search_text);


        $segment1 = $this->uri->segment(1);
        $segment2 = $this->uri->segment(2);


        $config['base_url'] = base_url().$segment1.'/'.$segment2;
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;


        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li class="paginate_button page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '«';
        $config['prev_tag_open'] = '<li class="paginate_button page-item prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '»';
        $config['next_tag_open'] = '<li paginate_button page-item >';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li paginate_button page-item >';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="paginate_button page-item active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li paginate_button page-item >';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $this->session->set_userdata(array('id_activity'=>NULL));


        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $users_record;
        $data['row'] = $rowno;
        $data['search'] = $search_text;


        $this->load->view('template/header/header');
        $this->load->view('template/body/Form_PPM_v2/List_activity_server',$data);
        $this->load->view('template/footer/footer');

    } else { 
        $this->load->view('login');
    }  
  }


  function List_activity_network($rowno=0)
  {
    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
    { 
        
        $this->load->library('pagination');

        $search_text = '';
        if($this->input->post('submit') != NULL ){
          $search_text = $this->input->post('search');
          $this->session->set_userdata(array('search'=>$search_text));
        } else {
          if($this->session->userdata('search') != NULL){
            $search_text = $this->session->userdata('search');
          }
        }

        $rowperpage = 10;
        if($rowno != 0){
          $rowno = ($rowno-1) * $rowperpage;
        }


        $allcount = $this->Admin->List_activity_network_Count($search_text);
        $users_record = $this->Admin->List_activity_network_Data($rowno,$rowperpage,$search_text);


        $segment1 = $this->uri->segment(1);
        $segment2 = $this->uri->segment(2);


        $config['base_url'] = base_url().$segment1.'/'.$segment2;
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;


        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li class="paginate_button page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '«';
        $config['prev_tag_open'] = '<li class="paginate_button page-item prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '»';
        $config['next_tag_open'] = '<li paginate_button page-item >';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li paginate_button page-item >';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="paginate_button page-item active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li paginate_button page-item >';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);


        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $users_record;
        $data['row'] = $rowno;
        $data['search'] = $search_text;

        $this->session->set_userdata(array('id_activity'=>NULL));


        $this->load->view('template/header/header');
        $this->load->view('template/body/Form_PPM_v2/List_activity_network',$data);
        $this->load->view('template/footer/footer');

    } else { 
        $this->load->view('login');
    }  
  }


  function List_activity_workstation_add()
  {
    $this->load->view('template/header/header');
    $this->load->view('template/body/Form_PPM_v2/List_activity_workstation_add');
    $this->load->view('template/footer/footer');
  }

  function List_activity_workstation_update()
  {
    $this->load->view('template/header/header');
    $this->load->view('template/body/Form_PPM_v2/List_activity_workstation_update');
    $this->load->view('template/footer/footer');
  }




  function List_activity_network_add()
  {
    $this->load->view('template/header/header');
    $this->load->view('template/body/Form_PPM_v2/List_activity_network_add');
    $this->load->view('template/footer/footer');
  }

  function List_activity_network_update()
  {
    $this->load->view('template/header/header');
    $this->load->view('template/body/Form_PPM_v2/List_activity_network_update');
    $this->load->view('template/footer/footer');
  }




  function List_activity_server_add()
  {
    $this->load->view('template/header/header');
    $this->load->view('template/body/Form_PPM_v2/List_activity_server_add');
    $this->load->view('template/footer/footer');
  }

  function List_activity_server_update()
  {
    $this->load->view('template/header/header');
    $this->load->view('template/body/Form_PPM_v2/List_activity_server_update');
    $this->load->view('template/footer/footer');
  }





  function add_List_activity_submit()
  {
    $activitiy_name = $this->input->post('activitiy_name');
    $description_activity = $this->input->post('description_activity');
    $type_ppm = $this->input->post('type_ppm');
    $start_date = $this->input->post('start_date');
    $end_date = $this->input->post('end_date');
    $project_id = $this->session->userdata('project_id');

    $year = $this->input->post('year');

    $quarter = $this->input->post('quarter');

    $uid = $this->session->userdata('userid');
    
    $type = $this->input->post('type');

    $data = array(
                  'activitiy_name' => $activitiy_name,
                  
                  'description_activity' => $description_activity,
                  
                  'type_ppm' => $type_ppm,
                  
                  'start_date' => $start_date,
                  
                  'end_date' => $end_date,
                  
                  'created_by' => $uid,

                  'type' =>$type,

                  'year' =>$year,

                  'quarter' =>$quarter
              );

    $this->db->insert('ppm2_activity',$data);

    $type = $this->input->post('type');
    if($type=='1'){
      redirect('Form_PPM/List_activity_workstation');
    } else if($type=='2'){
      redirect('Form_PPM/List_activity_server');
    } else if($type=='3'){
      redirect('Form_PPM/List_activity_network');
    } else {
      redirect('Form_PPM/List_activity_workstation');
    }

    
  }


  function update_List_activity_submit()
  {
    $activitiy_name = $this->input->post('activitiy_name');

    $description_activity = $this->input->post('description_activity');

    $type_ppm = $this->input->post('type_ppm');

    $start_date = $this->input->post('start_date');

    $end_date = $this->input->post('end_date');

    $uid = $this->session->userdata('userid');

    $type = $this->input->post('type');

    $year = $this->input->post('year');

    $quarter = $this->input->post('quarter');

    $data = array(
                  'activitiy_name' => $activitiy_name,

                  'description_activity' => $description_activity,

                  'type_ppm' => $type_ppm,

                  'start_date' => $start_date,

                  'end_date' => $end_date,

                  'created_by' => $uid, 

                  'type' =>$type, 

                  'year' =>$year,

                  'quarter' =>$quarter
                 );

    $id = $this->uri->segment(3);

    //var_dump($id); exit();

    $this->db->where('id',$id);

    $this->db->update('ppm2_activity',$data);

    $type = $this->input->post('type');
    if($type=='1'){
      redirect('Form_PPM/List_activity_workstation');
    } else if($type=='2'){
      redirect('Form_PPM/List_activity_server');
    } else if($type=='3'){
      redirect('Form_PPM/List_activity_network');
    } else {
      redirect('Form_PPM/List_activity_workstation');
    }
                      
  }


  function List_activity_details()
  {
    $id = $this->input->post('id');
    $query = $this->Admin->List_activity_details($id);

    if(empty($query)){
      echo 'Tiada Data Ditemui';
    } else {
    foreach ($query as $data) 
    {

    }
      echo json_encode($data);
    }
  }


  // function data_workstation($rowno=0)
  // {

  //   // if(!empty($this->session->userdata('id_activity'))){

  //   // } else {
  //   //   redirect('Form_PPM/data_workstation/1');
  //   // }

  //   $paging_by_find = 10;

  //   $idModule = $this->session->userdata('idModule');
  //   if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
  //   { 
        
  //       $this->load->library('pagination');

  //       $search_text = '';

  //       $paging_by_find = '';
  //       $type_devices_find = '';
  //       $user_find = '';
  //       $department_find = '';
  //       $status_find = '';


  //       $status_find = $this->input->post('status_find');
  //       // var_dump($user_find); exit();
  //       if(!empty($status_find)){
  //         $paging_by_find = $this->input->post('paging_by_find');
  //         $type_devices_find = $this->input->post('type_devices_find');
  //         $user_find = $this->input->post('user_find');
  //         $department_find = $this->input->post('department_find');
  //         // var_dump($user_find); exit();

  //         $this->session->set_flashdata('paging_by_find', $paging_by_find);
  //         $this->session->set_flashdata('type_devices_find', $type_devices_find);
  //         $this->session->set_flashdata('user_find', $user_find);
  //         $this->session->set_flashdata('status', $status_find);
  //         $this->session->set_flashdata('department_find', $department_find);
  //         redirect('form_ppm/work_station_list');
  //       }


  //       $ppm_id_find = $this->input->post('ppm_id_find');

  //       if($this->input->post('submit') != NULL ){
  //         $search_text = $this->input->post('search');

  //         $paging_by_find = $this->input->post('paging_by_find');
  //         $type_devices_find = $this->input->post('type_devices_find');
  //         $user_find = $this->input->post('user_find');
  //         $department_find = $this->input->post('department_find');
  //         $status_find = $this->input->post('status_find');

  //         $this->session->set_userdata(array('search'=>$search_text,'paging_by_find'=>$paging_by_find,'type_devices_find'=>$type_devices_find,'user_find'=>$user_find,'department_find'=>$department_find,'status_find'=>$status_find));
  //       } else {
  //         if($this->session->userdata('search') != NULL){
  //           $search_text = $this->session->userdata('search');

  //           $paging_by_find = $this->session->userdata('paging_by_find');
  //           $type_devices_find = $this->session->userdata('type_devices_find');
  //           $user_find = $this->session->userdata('user_find');
  //           $department_find = $this->session->userdata('department_find');
  //           $status_find = $this->session->userdata('status_find');
  //         }
  //       }

  //       if(empty($paging_by_find)){
  //         $paging_by_find=10;
  //       } else {
  //         $paging_by_find = $this->session->userdata('paging_by_find');
  //       }

  //       //var_dump($paging_by_find); exit();

  //       $rowperpage = $paging_by_find;
  //       if($rowno != 0){
  //         $rowno = ($rowno-1) * $rowperpage;
  //       }


  //       $allcount = $this->Admin->count_workstation($search_text,$type_devices_find,$department_find,$ppm_id_find,$status_find);
  //       $users_record = $this->Admin->data_workstation($rowno,$rowperpage,$search_text,$type_devices_find,$department_find,$ppm_id_find,$status_find);

  //       //$data = $this->Admin->data_workstation();
  //       //$count = $this->Admin->count_workstation();
  //       //var_dump($count);


  //       $segment1 = $this->uri->segment(1);
  //       $segment2 = $this->uri->segment(2);


  //       $config['base_url'] = base_url().$segment1.'/'.$segment2;
  //       $config['use_page_numbers'] = TRUE;
  //       $config['total_rows'] = $allcount;
  //       $config['per_page'] = $rowperpage;


  //       // integrate bootstrap pagination
  //       $config['full_tag_open'] = '<ul class="pagination">';
  //       $config['full_tag_close'] = '</ul>';
  //       $config['first_link'] = false;
  //       $config['last_link'] = false;
  //       $config['first_tag_open'] = '<li class="paginate_button page-item">';
  //       $config['first_tag_close'] = '</li>';
  //       $config['prev_link'] = '«';
  //       $config['prev_tag_open'] = '<li class="paginate_button page-item prev">';
  //       $config['prev_tag_close'] = '</li>';
  //       $config['next_link'] = '»';
  //       $config['next_tag_open'] = '<li paginate_button page-item >';
  //       $config['next_tag_close'] = '</li>';
  //       $config['last_tag_open'] = '<li paginate_button page-item >';
  //       $config['last_tag_close'] = '</li>';
  //       $config['cur_tag_open'] = '<li class="paginate_button page-item active"><a href="#">';
  //       $config['cur_tag_close'] = '</a></li>';
  //       $config['num_tag_open'] = '<li paginate_button page-item >';
  //       $config['num_tag_close'] = '</li>';

  //       $this->pagination->initialize($config);


  //       $data['pagination'] = $this->pagination->create_links();
  //       $data['result'] = $users_record;
  //       $data['row'] = $rowno;
  //       $data['search'] = $search_text;

  //       $id_activity = $this->input->post('id_activity');

        // if($this->session->userdata('id_activity') != NULL)
        // {

        // } else {
        //   $this->session->set_userdata(array('id_activity'=>$id_activity));
        // }

        

  //       $data['id_activity'] = $id_activity;



  //       $this->load->view('template/header/header');
  //       $this->load->view('template/body/Form_PPM_v2/List_data_workstation',$data);
  //       $this->load->view('template/footer/footer');

  //   } else { 
  //       $this->load->view('login');
  //   } 

    
  // }

  function data_workstation()
  {
      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 

          //var_dump($this->uri->segment(3)); exit();


          $ppm_id = $this->input->post('ppm_id_find');
          if(empty($ppm_id)){
            $ppm_id = $this->uri->segment(3);
            $this->session->set_flashdata('id_activity', $ppm_id);
            $data['id_activity'] = $ppm_id;
          }



          if($this->session->userdata('id_activity') != NULL)
          {

          } else {
            $this->session->set_userdata(array('id_activity'=>$ppm_id));
          }

          // data here 
          $search_text = '';
          $paging_by_find = '';
          $type_devices_find = '';
          $user_find = '';
          $department_find = '';
          $status_find = '';

          $search_text = $this->input->post('search_text');
          $paging_by_find = $this->input->post('paging_by_find');
          $type_devices_find = $this->input->post('type_devices_find');
          $user_find = $this->input->post('user_find');
          $department_find = $this->input->post('department_find');
          $status_find = $this->input->post('status_find');
          
          //var_dump($type_devices_find); exit();

          $this->session->set_flashdata('search_text', $search_text);

          $this->session->set_flashdata('paging_by_find', $paging_by_find);
          $this->session->set_flashdata('type_devices_find', $type_devices_find);
          $this->session->set_flashdata('user_find', $user_find);
          $this->session->set_flashdata('status', $status_find);
          $this->session->set_flashdata('department_find', $department_find);

          if((!empty($user_find))||(!empty($status_find)))
          {
            if($status_find=='Not Yet'){
              $this->data['site_title'] = 'Add_Agent';
              $this->load->view('template/header/header');
              $this->load->view('template/body/Form_PPM_v2/List_data_workstation',$this->data);
              $this->load->view('template/footer/footer');
            } else {
              redirect('Form_PPM/work_station_list/'.$ppm_id);
            }
            
          } else {
            $this->data['site_title'] = 'Add_Agent';
            $this->load->view('template/header/header');
            $this->load->view('template/body/Form_PPM_v2/List_data_workstation',$this->data);
            $this->load->view('template/footer/footer');
          }

          

      } else { 
          $this->load->view('login');
      }  
  }



  // function data_server($rowno=0)
  // {
  //   $idModule = $this->session->userdata('idModule');
  //   if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
  //   { 
        
  //       $this->load->library('pagination');

  //       $search_text = '';
  //       if($this->input->post('submit') != NULL ){
  //         $search_text = $this->input->post('search');
  //         $this->session->set_userdata(array('search'=>$search_text));
  //       } else {
  //         if($this->session->userdata('search') != NULL){
  //           $search_text = $this->session->userdata('search');
  //         }
  //       }

  //       $rowperpage = 10;
  //       if($rowno != 0){
  //         $rowno = ($rowno-1) * $rowperpage;
  //       }


  //       $allcount = $this->Admin->count_server($search_text);
  //       $users_record = $this->Admin->data_server($rowno,$rowperpage,$search_text);

  //       //$data = $this->Admin->data_workstation();
  //       //$count = $this->Admin->count_workstation();
  //       //var_dump($count);


  //       $segment1 = $this->uri->segment(1);
  //       $segment2 = $this->uri->segment(2);


  //       $config['base_url'] = base_url().$segment1.'/'.$segment2;
  //       $config['use_page_numbers'] = TRUE;
  //       $config['total_rows'] = $allcount;
  //       $config['per_page'] = $rowperpage;


  //       // integrate bootstrap pagination
  //       $config['full_tag_open'] = '<ul class="pagination">';
  //       $config['full_tag_close'] = '</ul>';
  //       $config['first_link'] = false;
  //       $config['last_link'] = false;
  //       $config['first_tag_open'] = '<li class="paginate_button page-item">';
  //       $config['first_tag_close'] = '</li>';
  //       $config['prev_link'] = '«';
  //       $config['prev_tag_open'] = '<li class="paginate_button page-item prev">';
  //       $config['prev_tag_close'] = '</li>';
  //       $config['next_link'] = '»';
  //       $config['next_tag_open'] = '<li paginate_button page-item >';
  //       $config['next_tag_close'] = '</li>';
  //       $config['last_tag_open'] = '<li paginate_button page-item >';
  //       $config['last_tag_close'] = '</li>';
  //       $config['cur_tag_open'] = '<li class="paginate_button page-item active"><a href="#">';
  //       $config['cur_tag_close'] = '</a></li>';
  //       $config['num_tag_open'] = '<li paginate_button page-item >';
  //       $config['num_tag_close'] = '</li>';

  //       $this->pagination->initialize($config);


  //       $data['pagination'] = $this->pagination->create_links();
  //       $data['result'] = $users_record;
  //       $data['row'] = $rowno;
  //       $data['search'] = $search_text;


  //       $id_activity = $this->input->post('id_activity');

  //       if($this->session->userdata('id_activity') != NULL)
  //       {

  //       } else {
  //         $this->session->set_userdata(array('id_activity'=>$id_activity));
  //       }


  //       $this->load->view('template/header/header');
  //       $this->load->view('template/body/Form_PPM_v2/List_data_server',$data);
  //       $this->load->view('template/footer/footer');

  //   } else { 
  //       $this->load->view('login');
  //   } 
  // }



  function data_server()
  {
      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 

          //var_dump($this->uri->segment(3)); exit();


          $ppm_id = $this->input->post('ppm_id_find');
          if(empty($ppm_id)){
            $ppm_id = $this->uri->segment(3);
            $this->session->set_flashdata('id_activity', $ppm_id);
            $data['id_activity'] = $ppm_id;
          }



          if($this->session->userdata('id_activity') != NULL)
          {

          } else {
            $this->session->set_userdata(array('id_activity'=>$ppm_id));
          }

          // data here 
          $search_text = '';
          $paging_by_find = '';
          $type_devices_find = '';
          $user_find = '';
          $department_find = '';
          $status_find = '';

          $search_text = $this->input->post('search_text');
          $paging_by_find = $this->input->post('paging_by_find');
          $type_devices_find = $this->input->post('type_devices_find');
          $user_find = $this->input->post('user_find');
          $department_find = $this->input->post('department_find');
          $status_find = $this->input->post('status_find');
          
          //var_dump($type_devices_find); exit();

          $this->session->set_flashdata('search_text', $search_text);

          $this->session->set_flashdata('paging_by_find', $paging_by_find);
          $this->session->set_flashdata('type_devices_find', $type_devices_find);
          $this->session->set_flashdata('user_find', $user_find);
          $this->session->set_flashdata('status', $status_find);
          $this->session->set_flashdata('department_find', $department_find);


          if((!empty($user_find))||(!empty($status_find)))
          {
            if($status_find=='Not Yet'){
              $this->data['site_title'] = 'Add_Agent';
              $this->load->view('template/header/header');
              $this->load->view('template/body/Form_PPM_v2/List_data_server',$this->data);
              $this->load->view('template/footer/footer');
            } else {
              redirect('Form_PPM/work_server_list/'.$ppm_id);
            }
            
          } else {
            $this->data['site_title'] = 'Add_Agent';
            $this->load->view('template/header/header');
            $this->load->view('template/body/Form_PPM_v2/List_data_server',$this->data);
            $this->load->view('template/footer/footer');
          }

          

      } else { 
          $this->load->view('login');
      }  
  }



  // function data_network($rowno=0)
  // {
  //   $idModule = $this->session->userdata('idModule');
  //   if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
  //   { 
        
  //       $this->load->library('pagination');

  //       $search_text = '';
  //       if($this->input->post('submit') != NULL ){
  //         $search_text = $this->input->post('search');
  //         $this->session->set_userdata(array('search'=>$search_text));
  //       } else {
  //         if($this->session->userdata('search') != NULL){
  //           $search_text = $this->session->userdata('search');
  //         }
  //       }

  //       $rowperpage = 10;
  //       if($rowno != 0){
  //         $rowno = ($rowno-1) * $rowperpage;
  //       }


  //       $allcount = $this->Admin->count_network($search_text);
  //       $users_record = $this->Admin->data_network($rowno,$rowperpage,$search_text);

  //       //$data = $this->Admin->data_workstation();
  //       //$count = $this->Admin->count_workstation();
  //       //var_dump($count);


  //       $segment1 = $this->uri->segment(1);
  //       $segment2 = $this->uri->segment(2);


  //       $config['base_url'] = base_url().$segment1.'/'.$segment2;
  //       $config['use_page_numbers'] = TRUE;
  //       $config['total_rows'] = $allcount;
  //       $config['per_page'] = $rowperpage;


  //       // integrate bootstrap pagination
  //       $config['full_tag_open'] = '<ul class="pagination">';
  //       $config['full_tag_close'] = '</ul>';
  //       $config['first_link'] = false;
  //       $config['last_link'] = false;
  //       $config['first_tag_open'] = '<li class="paginate_button page-item">';
  //       $config['first_tag_close'] = '</li>';
  //       $config['prev_link'] = '«';
  //       $config['prev_tag_open'] = '<li class="paginate_button page-item prev">';
  //       $config['prev_tag_close'] = '</li>';
  //       $config['next_link'] = '»';
  //       $config['next_tag_open'] = '<li paginate_button page-item >';
  //       $config['next_tag_close'] = '</li>';
  //       $config['last_tag_open'] = '<li paginate_button page-item >';
  //       $config['last_tag_close'] = '</li>';
  //       $config['cur_tag_open'] = '<li class="paginate_button page-item active"><a href="#">';
  //       $config['cur_tag_close'] = '</a></li>';
  //       $config['num_tag_open'] = '<li paginate_button page-item >';
  //       $config['num_tag_close'] = '</li>';

  //       $this->pagination->initialize($config);


  //       $data['pagination'] = $this->pagination->create_links();
  //       $data['result'] = $users_record;
  //       $data['row'] = $rowno;
  //       $data['search'] = $search_text;

  //       $id_activity = $this->input->post('id_activity');

  //       if($this->session->userdata('id_activity') != NULL)
  //       {

  //       } else {
  //         $this->session->set_userdata(array('id_activity'=>$id_activity));
  //       }


  //       $this->load->view('template/header/header');
  //       $this->load->view('template/body/Form_PPM_v2/List_data_network',$data);
  //       $this->load->view('template/footer/footer');

  //   } else { 
  //       $this->load->view('login');
  //   } 
  // }


  function data_network()
  {
      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 

          //var_dump($this->uri->segment(3)); exit();


          $ppm_id = $this->input->post('ppm_id_find');
          if(empty($ppm_id)){
            $ppm_id = $this->uri->segment(3);
            $this->session->set_flashdata('id_activity', $ppm_id);
            $data['id_activity'] = $ppm_id;
          }


          //var_dump($ppm_id);


          if($this->session->userdata('id_activity') != NULL)
          {

          } else {
            $this->session->set_userdata(array('id_activity'=>$ppm_id));
          }

          // data here 
          $search_text = '';
          $paging_by_find = '';
          $type_devices_find = '';
          $user_find = '';
          $department_find = '';
          $status_find = '';

          $search_text = $this->input->post('search_text');
          $paging_by_find = $this->input->post('paging_by_find');
          $type_devices_find = $this->input->post('type_devices_find');
          $user_find = $this->input->post('user_find');
          $department_find = $this->input->post('department_find');
          $status_find = $this->input->post('status_find');
          
          //var_dump($type_devices_find); exit();

          $this->session->set_flashdata('search_text', $search_text);

          $this->session->set_flashdata('paging_by_find', $paging_by_find);
          $this->session->set_flashdata('type_devices_find', $type_devices_find);
          $this->session->set_flashdata('user_find', $user_find);
          $this->session->set_flashdata('status', $status_find);
          $this->session->set_flashdata('department_find', $department_find);


          if((!empty($user_find))||(!empty($status_find)))
          {
            if($status_find=='Not Yet'){
              $this->data['site_title'] = 'Add_Agent';
              $this->load->view('template/header/header');
              $this->load->view('template/body/Form_PPM_v2/List_data_network',$this->data);
              $this->load->view('template/footer/footer');
            } else {
              redirect('Form_PPM/work_network_list/'.$ppm_id);
            }
            
          } else {
            $this->data['site_title'] = 'Add_Agent';
            $this->load->view('template/header/header');
            $this->load->view('template/body/Form_PPM_v2/List_data_network',$this->data);
            $this->load->view('template/footer/footer');
          }

          

      } else { 
          $this->load->view('login');
      }  
  }


  function check_ppm_register()
  {
    $id = $this->input->post('id');
    $name = $this->input->post('name');
    $check = $this->Admin->check_ppm_register($id,$name);
    echo $check;
  }

  function get_id_number_ppm()
  {
    $id = $this->input->post('id');
    $name = $this->input->post('name');
    $check = $this->Admin->get_id_number_ppm($id,$name);
    echo $check;
  }


  function fix_bugs($user_find,$ppm_id)
  {
    $nameFile_zip = time().'F'.rand();
    
    $hostname = array();
    $this->db->where('acknowledge',$user_find);
    $this->db->where('type_ppm_activity',$ppm_id);
    $query =  $this->db->get('ppm_register')->result();
    foreach ($query as $data) 
    {
      $type_f = $data->ppm_type;
      $type = bin2hex($type_f);

      $id_number = $data->id_number;

      $h = $data->hostname;


      $link_url = bin2hex($h);
      $link_ppm = bin2hex($ppm_id);



      $ppm_device = $data->ppm_device;

      if($ppm_device=='Computer'){
        $type = 'PDF_Computer';
      } else if($ppm_device=='Notebook'){
        $type = 'PDF_Computer';
      } else if($ppm_device=='Printer'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='Scanner'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='Server(Physical)'){
        $type = 'PDF_Computer';
      } else if($ppm_device=='Server(Virtual)'){
        $type = 'PDF_Computer';
      } else if($ppm_device=='Switch'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='Controller'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='Load Balance'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='Firewall'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='UPS'){
        $type = 'PDF_Hardware';
      } else if($ppm_device==''){

      } 

      //var_dump($type_f); 

      // var_dump($link_url);
      //$type = 'PDF_Computer';
      $this->test_download($type,$id_number,$nameFile_zip);


      echo $id_number; echo '<br>';
 
      $hostname[]=$h;
    }
  }


  function Workstation_Send_Email()
  {
    $ppm_id = $this->input->post('ppm_id');
    $user_find = $this->input->post('user_find');

    //$this->fix_bugs($user_find,$ppm_id);
    //exit();
    // find email by username

    $d = $this->input->post('d');
    $t = $this->input->post('t');
    $s = $this->input->post('s');

    // $user_find = bin2hex($user_find);
    // var_dump($user_find);
    // exit();


    if($t=='Desktop'){
      $t='Computer';
    }

    if($t=='Laptop'){
      $t='Notebook';
    }

    $email = '';
    $this->db->where('first_name',$user_find);
    $query =  $this->db->get('customer_user')->result();
    foreach ($query as $data) 
    {
      $email = $data->email;
    }

    //var_dump($email);


    //$email = 'mediummyofficial@gmail.com';
    //$email = 'sufianmohdhassan19@gmail.com';
    // $data_array = array();
    // $role = $this->session->userdata('idModule');
    // for($i=0;$i<count($role); $i++){
    //   $data_array[] = $role[$i];
    // }

    // if (in_array("PPM_Endorse", $data_array)) 
    // { 
    //   //var_dump($data_array); exit();
    //   // $this->workstation_acknowledge_email($ppm_id,$user_find,$d,$t,$s,$email);
    //   //$this->workstation_acknowledge_email_2($ppm_id,$user_find,$d,$t,$s,$email);
      
    //   // status verified 
    //   // verified 
    //   // attachment 

    // } else {
    //   //var_dump($data_array); exit();
    //   // $this->workstation_verified_send_email($ppm_id,$user_find,$d,$t,$s,$email);
    //   //$this->workstation_verified_send_email_2($ppm_id,$user_find,$d,$t,$s,$email);
      
    //   // status performed 
    //   // attachment tu link 

    // }





    $this->send_email_workstation($ppm_id,$user_find,$d,$t,$s,$email);





  }




  function send_email_workstation($ppm_id,$user_find,$d,$t,$s,$email)
  {
    $this->workstation_acknowledge_email_2($ppm_id,$user_find,$d,$t,$s,$email);
    $this->workstation_verified_send_email_2($ppm_id,$user_find,$d,$t,$s,$email);
  }



  function workstation_acknowledge_email_2($ppm_id,$user_find,$d,$t,$s,$email)
  {
    //echo 'acknowledge';




    //$email = 'sufianmohdhassan19@gmail.com';


    //$subject = 'Verify Nex-Desk';
    $this->db->where('id',$ppm_id);
    $query2 =  $this->db->get('ppm2_activity')->result();
    foreach ($query2 as $data2) 
    {
      $activitiy_name = $data2->activitiy_name;
      $activitiy_name = str_replace(' ', '_', $activitiy_name);
      $activitiy_name = str_replace('(', '_', $activitiy_name);
      $activitiy_name = str_replace(')', '_', $activitiy_name);

      $activitiy_name = $activitiy_name.'-'.rand();
    }

    $subject = $activitiy_name;

    $u = bin2hex($user_find);
    // var_dump($user_find);
    // exit();

    $s = 'Performed';
    $body = 'Assalamualaikum dan selamat sejahtera, kami dari Pihak IT Hospital Tunku Azizah telah menyelenggara perkakas "Computer" mengikut jadual yang ditetapkan.<br><br>
      <a href="'.base_url().'Form_PPM/Form_PPM_Client_Work/1?q='.$ppm_id.'&d='.$d.'&t='.$t.'&s='.$s.'&u='.$u.'">Sila klik disini untuk lihat dan buat tindakan</a>. <br><br>';


    //var_dump($body);
    //Load email library
    $this->load->library('email');
    
    //SMTP & mail configuration
    $config = array(
        'protocol'  => 'smtp',
        'smtp_host' => '72.18.130.33',
        'smtp_port' => 587,
        'smtp_user' => 'hafiz@nexquadrant.com',
        'smtp_pass' => 'Abc@123',
        'mailtype'  => 'html',
        'charset'   => 'utf-8'
    );
    $this->email->initialize($config);
    $this->email->set_mailtype("html");
    $this->email->set_newline("\r\n");


    $this->email->from('hafiz@nexquadrant.com');

    //$subject='testing email';
    //$email='hafiz.shahipurullah@bit.com.my';

    //var_dump($email);

    $this->email->to($email);  // replace it with receiver mail id
    $this->email->subject($subject); // replace it with relevant subject


        // $body = $this->load->view('email/reset_password.php',$data,TRUE);
        
    //var_dump($body);

    //$body = '<h1>Computer/Notebook anda telah diselengara oleh Pihak ICT Hospital Tunku Azizah.  Sila tekan <a href="'.base_url().'Form_PPM/PDF_Computer/9681" download>Disini</a> untuk muaturun bukti selengaraan </h1>';
        
    $this->email->message($body);  
    if($this->email->send()){
      echo 'sent';
    } else {
      echo 'xsent';
    }
    echo $this->email->print_debugger();



    $this->db->where('status_ppm','Performed');
    $this->db->where('type_ppm_activity',$ppm_id);
    $query =  $this->db->get('ppm_register')->result();
    foreach ($query as $data) 
    {
      $hostname = $data->hostname;
      //echo $hostname.'<br>';

      $data_update = array('status_ppm'=>'Performed & Send');
      $this->db->where('type_ppm_activity',$ppm_id);
      $this->db->where('hostname',$hostname);
      $this->db->where('status_ppm','Performed');
      $this->db->update('ppm_register',$data_update);
    }


  }



  function workstation_verified_send_email_2($ppm_id,$user_find,$d,$t,$s,$email)
  {
    //echo 'verified';
    //var_dump($ppm_id);

    //$email = 'sufianmohdhassan19@gmail.com';


    $subject = 'PPM - '.rand();


    $body = 'Assalamualaikum dan selamat sejahtera, kami dari Pihak IT Hospital Tunku Azizah telah menyelengara perkakas "Computer" mengikut jadual yang ditetapkan.<br><br>
      Sila log masuk ke Nex-Desk dan klik senarai rujukkan lampiran dibawah bagi salinan penyelengaraan <br><br>';


    $nameFile_zip = time().'F'.rand();
    $folder = 'folder_'.rand();

    $link2='';

    $this->db->where('status_ppm','Verified');
    $this->db->where('type_ppm_activity',$ppm_id);
    $query =  $this->db->get('ppm_register')->result();
    foreach ($query as $data) 
    {
      $hostname = $data->hostname;
      //echo $hostname.'<br>';



      $data_update = array('status_ppm'=>'Verified & Send');
      $this->db->where('type_ppm_activity',$ppm_id);
      $this->db->where('hostname',$hostname);
      $this->db->where('status_ppm','Verified');
      $this->db->update('ppm_register',$data_update);



      $h = $hostname;
      $link_url = bin2hex($h);
      $link_ppm = bin2hex($ppm_id);



      $type_f = $data->ppm_type;
      $type = bin2hex($type_f);

      $id_number = $data->id_number;


      $ppm_device = $data->ppm_device;

      $type_ppm_activity = $data->type_ppm_activity;


      //var_dump($type_f);



      $activitiy_name = rand();

      $this->db->where('id',$type_ppm_activity);
      $query2 =  $this->db->get('ppm2_activity')->result();
      foreach ($query2 as $data2) 
      {
        $activitiy_name = $data2->activitiy_name;
        $activitiy_name = str_replace(' ', '_', $activitiy_name);
        $activitiy_name = str_replace('(', '_', $activitiy_name);
        $activitiy_name = str_replace(')', '_', $activitiy_name);

        $activitiy_name = $activitiy_name.'-'.$h.'-'.rand();


        $subject = $activitiy_name.'-'.rand();
      }


      //var_dump($ppm_device);

      if($ppm_device=='Computer'){
        $type = 'PDF_Computer';
      } else if($ppm_device=='Notebook'){
        $type = 'PDF_Computer';
      } else if($ppm_device=='Printer'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='Scanner'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='Server(Physical)'){
        $type = 'PDF_Computer';
      } else if($ppm_device=='Server(Virtual)'){
        $type = 'PDF_Computer';
      } else if($ppm_device=='Switch'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='Controller'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='Load Balance'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='Firewall'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='UPS'){
        $type = 'PDF_Hardware';
      } else if($ppm_device==''){

      } 


      $this->test_download2($type,$id_number,$activitiy_name,$h,$folder);






    }



    $this->zip_folder($folder);


    $zip = $_SERVER["DOCUMENT_ROOT"].'/nex-desk/zip/'.$folder.'.zip';
    $this->send_email($email,$subject,$body,$zip);




  }














  function workstation_verified_send_email($ppm_id,$user_find,$d,$t,$s,$email)
  {


    // update to Performed & send
    $data = array('status_ppm'=>'Performed & Send');

    if(!empty($d)){
      $this->db->like('department',$d);
    }

    if(!empty($t)){
      $this->db->like('ppm_device',$t);
    }


    if(!empty($s)){
      $this->db->like('status_ppm',$s);
    }

    $this->db->where('type_ppm_activity',$ppm_id);
    $this->db->where('acknowledge',$user_find);
    $this->db->where('status_ppm','Performed');
    $this->db->update('ppm_register',$data);


    //echo 'Verify';
    //$subject = $this->input->post('subject');
    $subject = 'Verify Nex-Desk';
    $body = 'Assalamualaikum dan selamat sejahtera, kami dari Pihak IT Hospital Tunku Azizah telah menyelengara perkakas "computer" mengikut jadual yang ditetapkan.<br><br>
      <a href="'.base_url().'Form_PPM/Form_PPM_Client_Work/1?q='.$ppm_id.'&d='.$d.'&t='.$t.'&s='.$s.'&u=">Sila klik disini untuk lihat dan buat tindakan</a>. <br><br>';


     //Load email library
      $this->load->library('email');
      
      //SMTP & mail configuration
      $config = array(
          'protocol'  => 'smtp',
          'smtp_host' => '72.18.130.33',
          'smtp_port' => 587,
          'smtp_user' => 'hafiz@nexquadrant.com',
          'smtp_pass' => 'Abc@123',
          'mailtype'  => 'html',
          'charset'   => 'utf-8'
      );
      $this->email->initialize($config);
      $this->email->set_mailtype("html");
      $this->email->set_newline("\r\n");


      $this->email->from('hafiz@nexquadrant.com');

      //$subject='testing email';
      //$email='hafiz.shahipurullah@bit.com.my';

      //var_dump($email);

      $this->email->to($email);  // replace it with receiver mail id
      $this->email->subject($subject); // replace it with relevant subject


          // $body = $this->load->view('email/reset_password.php',$data,TRUE);
          
      //var_dump($body);

      //$body = '<h1>Computer/Notebook anda telah diselengara oleh Pihak ICT Hospital Tunku Azizah.  Sila tekan <a href="'.base_url().'Form_PPM/PDF_Computer/9681" download>Disini</a> untuk muaturun bukti selengaraan </h1>';
          
      $this->email->message($body);  
      if($this->email->send()){
        echo 'sent';
      } else {
        echo 'xsent';
      }
      echo $this->email->print_debugger();

  }


  function workstation_acknowledge_email($ppm_id,$user_find,$d,$t,$s,$email)
  {
    //echo 'Acknowledge';


    $subject = 'Endorse HTA';
    $body = 'Assalamualaikum dan selamat sejahtera, kami dari Pihak IT Hospital Tunku Azizah telah menyelengara perkakas "workstation" mengikut jadual yang ditetapkan.<br><br>
      Sila log masuk ke Nex-Desk dan klik senarai rujukkan lampiran dibawah bagi salinan penyelengaraan <br><br>';
    

    
    


    if(!empty($d)){
      $this->db->like('department',$d);
    }

    if(!empty($t)){
      $this->db->like('ppm_device',$t);
    }


    if(!empty($s)){
      $this->db->like('status_ppm',$s);
    }


    $h = rand();


    $hostname = array();
    $this->db->where('acknowledge',$user_find);
    $this->db->where('type_ppm_activity',$ppm_id);
    $query =  $this->db->get('ppm_register')->result();
    foreach ($query as $data) 
    {
      $type_f = $data->ppm_type;
      $type = bin2hex($type_f);

      $id_number = $data->id_number;

      $h = $data->hostname;


      $link_url = bin2hex($h);
      $link_ppm = bin2hex($ppm_id);

      // var_dump($link_url);
      //$type = 'PDF_Computer';
      $ppm_device = $data->ppm_device;

      if($ppm_device=='Computer'){
        $type = 'PDF_Computer';
      } else if($ppm_device=='Notebook'){
        $type = 'PDF_Computer';
      } else if($ppm_device=='Printer'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='Scanner'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='Server(Physical)'){
        $type = 'PDF_Computer';
      } else if($ppm_device=='Server(Virtual)'){
        $type = 'PDF_Computer';
      } else if($ppm_device=='Switch'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='Controller'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='Load Balance'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='Firewall'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='UPS'){
        $type = 'PDF_Hardware';
      } else if($ppm_device==''){

      } 


      $this->test_download($type,$id_number,$nameFile_zip);

      $hostname[]=$h;




      // update to Verify & send
      $data = array('status_ppm'=>'Verify & Send');

      // if(!empty($d)){
      // $this->db->like('department',$d);
      // }

      // if(!empty($t)){
      // $this->db->like('ppm_device',$t);
      // }


      // if(!empty($s)){
      // $this->db->like('status_ppm',$s);
      // }

      $this->db->where('hostname',$h);
      // $this->db->where('acknowledge',$user_find);
      $this->db->where('status_ppm','Verify');
      $this->db->update('ppm_register',$data);



    }


    $nameFile_zip = $h;

    //var_dump($hostname); exit();

    $this->zip($ppm_id,$type,$id_number,$nameFile_zip,$hostname);

    $this->send_email($email,$subject,$body,$nameFile_zip);

  }




  function Server_Send_Email()
  {
    $ppm_id = $this->input->post('ppm_id');
    $hostname = $this->input->post('hostname');
    $email_selected = $this->input->post('email_selected');

    //var_dump($hostname);
    //$email_selected = 'mediummyofficial@gmail.com';

    $email = $email_selected;
    $subject = $this->input->post('subject');
    $body = 'Assalamualaikum dan selamat sejahtera, kami dari Pihak IT Hospital Tunku Azizah telah menyelengara perkakas "server" mengikut jadual yang ditetapkan.<br><br>
      Sila log masuk ke Nex-Desk dan klik senarai rujukkan lampiran dibawah bagi salinan penyelengaraan <br><br>';
    

    //$h = rand();
    $nameFile_zip = time().'F'.rand();

    $link2='';
    $folder = 'folder_'.rand();
    for($i=0;$i<count($hostname);$i++){
      $h = $hostname[$i];
      $link_url = bin2hex($h);
      $link_ppm = bin2hex($ppm_id);
      // $url = '<br><a href="'.base_url().'Form_PPM/'.$link_url.'&ppm_id='.$link_ppm.'">'.$h.'</a>';



      $type_f = '';
      $type = '';
      $this->db->where('hostname',$h);
      //$this->db->where('status_ppm','Endorse');
      $this->db->where('type_ppm_activity',$ppm_id);
      $query =  $this->db->get('ppm_register')->result();
      foreach ($query as $data) 
      {
        $type_f = $data->ppm_type;
        $type = bin2hex($type_f);

        $id_number = $data->id_number;


        $type_ppm_activity = $data->type_ppm_activity;

        //$type = 'PDF_Computer';
        $ppm_device = $data->ppm_device;
        //var_dump($ppm_device);

        $activitiy_name = rand();

        $this->db->where('id',$type_ppm_activity);
        $query2 =  $this->db->get('ppm2_activity')->result();
        foreach ($query2 as $data2) 
        {
          $activitiy_name = $data2->activitiy_name;
          $activitiy_name = str_replace(' ', '_', $activitiy_name);
          $activitiy_name = str_replace('(', '_', $activitiy_name);
          $activitiy_name = str_replace(')', '_', $activitiy_name);

          $activitiy_name = $activitiy_name.'-'.$h.'-'.rand();
        }

        //var_dump($activitiy_name); exit();

        //var_dump($id_number); exit();

        // update to Verify & send
        
        // unrun temprorary
        $data_status = array('status_ppm'=>'Endorse & Send');
        $this->db->where('id_number',$id_number);
        $this->db->where('status_ppm','Endorse');
        $this->db->update('ppm_register',$data_status);

      }


      

      if($ppm_device=='Computer'){
        $type = 'PDF_Computer';
      } else if($ppm_device=='Notebook'){
        $type = 'PDF_Computer';
      } else if($ppm_device=='Printer'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='Scanner'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='Server(Physical)'){
        $type = 'PDF_Computer';
      } else if($ppm_device=='Server(Virtual)'){
        $type = 'PDF_Computer';
      } else if($ppm_device=='Switch'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='Controller'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='Load Balance'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='Firewall'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='UPS'){
        $type = 'PDF_Hardware';
      } else if($ppm_device==''){

      } 



      $this->test_download2($type,$id_number,$activitiy_name,$h,$folder);

    }


    $this->zip_folder($folder);
    //$this->zip($ppm_id,$type,$id_number,$nameFile_zip,$hostname);
    

  
    //var_dump($body); exit();
    $zip = $_SERVER["DOCUMENT_ROOT"].'/nex-desk/zip/'.$folder.'.zip';
    
    $this->send_email($email,$subject,$body,$zip);
  }



  function Network_Send_Email()
  {
    $ppm_device = '';
    $ppm_id = $this->input->post('ppm_id');
    $hostname = $this->input->post('hostname');
    $email_selected = $this->input->post('email_selected');

    //var_dump($hostname);
    //$email_selected = 'mediummyofficial@gmail.com';

    $email = $email_selected;
    $subject = $this->input->post('subject');
    $body = 'Assalamualaikum dan selamat sejahtera, kami dari Pihak IT Hospital Tunku Azizah telah menyelengara perkakas "network" mengikut jadual yang ditetapkan.<br><br>
      Sila log masuk ke Nex-Desk dan klik senarai rujukkan lampiran dibawah bagi salinan penyelengaraan <br><br>';
    

    
    $nameFile_zip = time().'F'.rand();
    $folder = 'folder_'.rand();

    $link2='';
    for($i=0;$i<count($hostname);$i++){
      $h = $hostname[$i];
      $link_url = bin2hex($h);
      $link_ppm = bin2hex($ppm_id);
      // $url = '<br><a href="'.base_url().'Form_PPM/'.$link_url.'&ppm_id='.$link_ppm.'">'.$h.'</a>';



      $type_f = '';
      $type = '';
      $this->db->where('hostname',$h);
      //$this->db->where('status_ppm','Endorse');
      $this->db->where('type_ppm_activity',$ppm_id);
      $query =  $this->db->get('ppm_register')->result();
      foreach ($query as $data) 
      {

        //var_dump($data); 
        $type_f = $data->ppm_type;
        $type = bin2hex($type_f);

        $id_number = $data->id_number;


        $ppm_device = $data->ppm_device;

        $type_ppm_activity = $data->type_ppm_activity;


        // update to Verify & send
        // $data_status = array('status_ppm'=>'Endorse & Send');
        // $this->db->where('id_number',$id_number);
        // $this->db->where('status_ppm','Endorse');
        // $this->db->update('ppm_register',$data_status);


         $activitiy_name = rand();

        $this->db->where('id',$type_ppm_activity);
        $query2 =  $this->db->get('ppm2_activity')->result();
        foreach ($query2 as $data2) 
        {
          $activitiy_name = $data2->activitiy_name;
          $activitiy_name = str_replace(' ', '_', $activitiy_name);
          $activitiy_name = str_replace('(', '_', $activitiy_name);
          $activitiy_name = str_replace(')', '_', $activitiy_name);

          //$activitiy_name = $activitiy_name.'-'.$h.'-'.rand();

        }




      }


      //$type = 'PDF_Hardware';
      //var_dump($ppm_device); exit();

      if($ppm_device=='Computer'){
        $type = 'PDF_Computer';
      } else if($ppm_device=='Notebook'){
        $type = 'PDF_Computer';
      } else if($ppm_device=='Printer'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='Scanner'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='Server(Physical)'){
        $type = 'PDF_Computer';
      } else if($ppm_device=='Server(Virtual)'){
        $type = 'PDF_Computer';
      } else if($ppm_device=='Switch'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='Controller'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='Load Balance'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='Firewall'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='Access Point'){
        $type = 'PDF_Hardware';
      } else if($ppm_device=='UPS'){
        $type = 'PDF_Hardware';
      } else if($ppm_device==''){

      } 


      //var_dump($type); exit();

      $hostname = $this->get_hostname($id_number);
      $activitiy_name = $activitiy_name.'-'.$hostname.'-'.rand();
      //$this->test_download($type,$id_number,$h);
      $this->test_download2($type,$id_number,$activitiy_name,$h,$folder);

    }


    $this->zip_folder($folder);
    //$this->zip($ppm_id,$type,$id_number,$nameFile_zip,$hostname);
    

  
    //var_dump($body); exit();
    
    $zip = $_SERVER["DOCUMENT_ROOT"].'/nex-desk/zip/'.$folder.'.zip';
    $this->send_email($email,$subject,$body,$zip);
  }


  function get_hostname($id_number)
  {
    $hostname = rand();
    $this->db->where('id_number',$id_number);
    $query =  $this->db->get('ppm_register')->result();
    foreach ($query as $data) 
    {

      //var_dump($data); 
      $hostname = $data->hostname;
    }

    return $hostname;
  }


  function test_download2($type,$id_number,$nameFile_zip,$h,$folder)
  {

    
    //var_dump($nameFile_zip); exit();


    //var_dump($nameFile_zip); exit();
    // Initialize a file URL to the variable 
    // $url = 'http://10.0.20.81/nex-desk/Form_PPM/PDF_Hardware/11204';

    $url = 'http://10.0.20.81/nex-desk/Form_PPM/'.$type.'/'.$id_number; 

    //var_dump($url); exit();
    // $url = 'http://localhost/nex-desk_hta/Form_PPM/'.$type.'/'.$id_number; 

    // var_dump($type);
    // var_dump($url);
    // exit();

      
    // Use basename() function to return the base name of file  
    $file_name = basename($url);

    $filename = $_SERVER["DOCUMENT_ROOT"].'/nex-desk/zip/'.$folder;
    // $filename = $_SERVER["DOCUMENT_ROOT"].'/nex-desk_hta/zip/'.$nameFile_zip;

    if (!file_exists($filename)) {
      mkdir($filename);
      echo 'create file '.$filename.'<br>';
    } 

    $root = $_SERVER["DOCUMENT_ROOT"].'/nex-desk/zip/'.$folder.'/'.$nameFile_zip.'.pdf';
    // $root = $_SERVER["DOCUMENT_ROOT"].'/nex-desk_hta/zip/'.$nameFile_zip.'/'.$file_name.'.pdf';
    //var_dump($root); exit();


    if(file_put_contents($root,file_get_contents($url))) { 
        echo "File downloaded successfully<br>"; 
        echo $url;
        
    } 
    else { 
        echo "File downloading failed.<br>"; 
    } 
  }


  function zip_folder($folder)
  {
    $rootPath = $_SERVER["DOCUMENT_ROOT"].'/nex-desk/zip/'.$folder;
    $zip = $_SERVER["DOCUMENT_ROOT"].'/nex-desk/zip/'.$folder.'.zip';

        // Get real path for our folder
    //$rootPath = realpath('folder-to-zip');

    // Initialize archive object
    $zip = new ZipArchive();
    $zip->open('zip/'.$folder.'.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

    // Create recursive directory iterator
    /** @var SplFileInfo[] $files */
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($rootPath),
        RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($files as $name => $file)
    {
        // Skip directories (they would be added automatically)
        if (!$file->isDir())
        {
            // Get real and relative path for current file
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($rootPath) + 1);

            // Add current file to archive
            $zip->addFile($filePath, $relativePath);
        }
    }

    // Zip archive will be created only after closing object
    $zip->close();

  }


  function test_download($type,$id_number,$nameFile_zip,$h)
  {


    //var_dump($nameFile_zip); exit();
    // Initialize a file URL to the variable 
    // $url = 'http://10.0.20.81/nex-desk/Form_PPM/PDF_Hardware/11204';

    $url = 'http://10.0.20.81/nex-desk/Form_PPM/'.$type.'/'.$id_number; 

    //var_dump($url); exit();
    // $url = 'http://localhost/nex-desk_hta/Form_PPM/'.$type.'/'.$id_number; 

    // var_dump($type);
    // var_dump($url);
    // exit();

      
    // Use basename() function to return the base name of file  
    $file_name = basename($url);

    $filename = $_SERVER["DOCUMENT_ROOT"].'/nex-desk/zip/'.$nameFile_zip;
    // $filename = $_SERVER["DOCUMENT_ROOT"].'/nex-desk_hta/zip/'.$nameFile_zip;

    if (!file_exists($filename)) {
      mkdir($filename);
      echo 'create file '.$filename.'<br>';
    } 

    $root = $_SERVER["DOCUMENT_ROOT"].'/nex-desk/zip/'.$nameFile_zip.'/'.$h.'.pdf';
    // $root = $_SERVER["DOCUMENT_ROOT"].'/nex-desk_hta/zip/'.$nameFile_zip.'/'.$file_name.'.pdf';
    //var_dump($root); exit();


    if(file_put_contents($root,file_get_contents($url))) { 
        echo "File downloaded successfully<br>"; 
        echo $url;
        
    } 
    else { 
        echo "File downloading failed.<br>"; 
    } 
  }



  function zip($ppm_id,$type,$id_number,$nameFile_zip,$hostname)
  {
    // $file_folder = $_SERVER["DOCUMENT_ROOT"].'/nex-desk/zip/test/test.pdf'; // folder untuk
    for($i=0;$i<count($hostname);$i++){
      $h = $hostname[$i];
      // $url = '<br><a href="'.base_url().'Form_PPM/'.$link_url.'&ppm_id='.$link_ppm.'">'.$h.'</a>';



      $type_f = '';
      $type = '';
      $this->db->where('hostname',$h);
      $this->db->where('type_ppm_activity',$ppm_id);
      $query =  $this->db->get('ppm_register')->result();
      foreach ($query as $data) 
      {
        $type_f = $data->ppm_type;
        $type = bin2hex($type_f);

        $id_number = $data->id_number;
      }

      $file_name = $id_number;


      //$file_folder = 'http://10.0.20.81/nex-desk/Form_PPM/'.$type.'/'.$id_number; 
      $file_folder = $_SERVER["DOCUMENT_ROOT"].'/nex-desk/zip/'.$nameFile_zip.'/'.$file_name.'.pdf';
      //$file_folder = $_SERVER["DOCUMENT_ROOT"].'/nex-desk_hta/zip/'.$nameFile_zip.'/'.$file_name.'.pdf';
      

      var_dump($file_folder);

      $tmpName = $file_folder;
      $fp      = fopen($tmpName, 'r');
      $isiFile = fread($fp, filesize($tmpName));
      fclose($fp);

      $namaFile = time();
      $zip = new ZipArchive();

      //$nameFile = 'Test';
      $nameFile = $file_name;

      $fileKompresi = $_SERVER["DOCUMENT_ROOT"].'/nex-desk/zip/'.$nameFile_zip.'/'.$nameFile_zip.".zip";
      //$fileKompresi = $_SERVER["DOCUMENT_ROOT"].'/nex-desk_hta/zip/'.$nameFile_zip.'/'.$nameFile_zip.".zip";

      $kompresi = $zip->open($fileKompresi, ZIPARCHIVE::CREATE);
      if ($kompresi)
      {
         $zip->addFromString($nameFile.".pdf", $isiFile);
         $zip->close();
         echo "Kompresi Sukses";
      }
      else echo "Kompresi Gagal";
      

    }

      


  } 




  // function create_zip($files = array(),$destination = '',$overwrite = false) 
  // {
  //   //if the zip file already exists and overwrite is false, return false   
  //   if(file_exists($destination) && !$overwrite) { return false; }  
  //   //vars  $valid_files = array();     
  //   //if files were passed in...  
  //   if(is_array($files)) {
  //     //cycle through each file     
  //     foreach($files as $file) 
  //     {
  //       //make sure the file exists
  //       if(file_exists($file)) { 
  //         $valid_files[] = $file; 
  //       }   
  //     }   
  //   }elseif(is_dir($files)){    
  //     if ($handle = opendir($files))      
  //     {
  //       while (false !== ($entry = readdir($handle)))           
  //       {
  //         if ($entry != "." && $entry != ".." && !is_dir($files.'/' . $entry))  
  //         {                 
  //           $valid_files[] = $files.'/' . $entry;
  //         }
  //       }
  //       closedir($handle);      
  //     }
  //   } 
  //   //if we have good files...
  //   if(count($valid_files)) { 
  //     //create the archive
  //     $zip = new ZipArchive(); 
  //     if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) { 
  //       return false;     
  //     } 
  //     //add the files
  //     foreach($valid_files as $file) {    
  //       $zip->addFile($file,$file);     
  //     }         
  //     //close the zip -- done!
  //     $zip->close();
  //     //check to make sure the file exists
  //     return file_exists($destination);
  //   }
  //   else
  //   {
  //     return false;
  //   }
  // }



  function send_email($email,$subject,$body,$nameFile_zip)
  {
            //Load email library
          $this->load->library('email');
          
          //SMTP & mail configuration
          $config = array(
              'protocol'  => 'smtp',
              'smtp_host' => '72.18.130.33',
              'smtp_port' => 587,
              'smtp_user' => 'hafiz@nexquadrant.com',
              'smtp_pass' => 'Abc@123',
              'mailtype'  => 'html',
              'charset'   => 'utf-8'
          );
          $this->email->initialize($config);
          $this->email->set_mailtype("html");
          $this->email->set_newline("\r\n");

       
            $this->email->from('hafiz@nexquadrant.com');

            //$subject='testing email';
            //$email='hafiz.shahipurullah@bit.com.my';
        
            //$this->email->to('sufianmohdhassan19@gmail.com');
            $this->email->to($email);  // replace it with receiver mail id
            $this->email->subject($subject); // replace it with relevant subject

            $nameFile = 'Test';

            $fileKompresi = $nameFile_zip;

           // $fileKompresi = $_SERVER["DOCUMENT_ROOT"].'/nex-desk/zip/'.$nameFile_zip.'/'.$nameFile_zip.".zip";
            //$fileKompresi = $_SERVER["DOCUMENT_ROOT"].'/nex-desk_hta/zip/'.$nameFile_zip.'/'.$nameFile_zip.".zip";

            $this->email->attach($fileKompresi);
           
                // $body = $this->load->view('email/reset_password.php',$data,TRUE);
                
            //var_dump($body);

            //$body = '<h1>Computer/Notebook anda telah diselengara oleh Pihak ICT Hospital Tunku Azizah.  Sila tekan <a href="'.base_url().'Form_PPM/PDF_Computer/9681" download>Disini</a> untuk muaturun bukti selengaraan </h1>';
                
            $this->email->message($body);  
            if($this->email->send()){
              echo 'sent';
            } else {
              echo 'xsent';
            }
            echo $this->email->print_debugger();
  }


  function Form_PPM_Client_Work($rowno=0)
  {


    

    $paging_by_find = 10;


        
    $this->load->library('pagination');

    $search_text = '';

    $paging_by_find = '';
    $type_devices_find = '';
    $user_find = '';
    $department_find = '';
    $status_find = '';

    $ppm_id_find = $this->input->post('ppm_id_find');

    if($this->input->post('submit') != NULL ){
      $search_text = $this->input->post('search');

      $paging_by_find = $this->input->post('paging_by_find');
      $type_devices_find = $this->input->post('type_devices_find');
      $user_find = $this->input->post('user_find');
      $department_find = $this->input->post('department_find');
      $status_find = $this->input->post('status_find');

      $this->session->set_userdata(array('search'=>$search_text,'paging_by_find'=>$paging_by_find,'type_devices_find'=>$type_devices_find,'user_find'=>$user_find,'department_find'=>$department_find,'status_find'=>$status_find));
    } else {
      if($this->session->userdata('search') != NULL){
        $search_text = $this->session->userdata('search');

        $paging_by_find = $this->session->userdata('paging_by_find');
        $type_devices_find = $this->session->userdata('type_devices_find');

        $user_find = $this->session->userdata('user_find');
        $department_find = $this->session->userdata('department_find');
        $status_find = $this->session->userdata('status_find');
      }
    }

    if(empty($paging_by_find)){
      $paging_by_find=10;
    } else {
      $paging_by_find = $this->session->userdata('paging_by_find');
    }

    //var_dump($paging_by_find); exit();

    $rowperpage = $paging_by_find;
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }


    //var_dump($_GET['q']); exit();
    if(!empty($_GET['q'])){
      $ppm_id = $_GET['q'];
      $this->session->set_userdata(array('q'=>$ppm_id));
    } else {
      $ppm_id = $this->session->userdata('q');
      $this->session->set_userdata(array('q'=>$ppm_id));
    }


    if(!empty($_GET['u'])){
      $user_id = $_GET['u'];
      $this->session->set_userdata(array('u'=>$user_id));
    } else {
      $user_id = $this->session->userdata('u');
      $this->session->set_userdata(array('u'=>$user_id));
    }


    if(!empty($_GET['t'])){
      $type = $_GET['t'];
      $this->session->set_userdata(array('t'=>$type));
    } else {
      //$type = $this->session->userdata('t');
      $type='';
      $this->session->set_userdata(array('t'=>''));
    }


    if(!empty($_GET['d'])){
      $department = $_GET['d'];
      $this->session->set_userdata(array('d'=>$department));
    } else {
      //$department = $this->session->userdata('d');
      $department ='';
      $this->session->set_userdata(array('d'=>''));
    }




    if(!empty($_GET['s'])){
      $status = $_GET['s'];
      $this->session->set_userdata(array('s'=>$status));
    } else {
      //$department = $this->session->userdata('d');
      $status ='';
      $this->session->set_userdata(array('s'=>''));
    }

    //var_dump($type);
    //exit();

    $user = $this->session->userdata('u');


    //var_dump($ppm_id); exit();

    $allcount = $this->Admin->user_count_workstation($search_text,$type_devices_find,$department_find,$ppm_id,$user,$type,$department,$status);
    $users_record = $this->Admin->user_data_workstation($rowno,$rowperpage,$search_text,$type_devices_find,$department_find,$ppm_id,$user,$type,$department,$status);

    //$data = $this->Admin->data_workstation();
    //$count = $this->Admin->count_workstation();
    //var_dump($count);


    //  var_dump($users_record); exit();

    $segment1 = $this->uri->segment(1);
    $segment2 = $this->uri->segment(2);


    

    //var_dump($ppm_id); exit();

    $config['base_url'] = base_url().$segment1.'/'.$segment2;


    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;


    // integrate bootstrap pagination
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['first_link'] = false;
    $config['last_link'] = false;
    $config['first_tag_open'] = '<li class="paginate_button page-item">';
    $config['first_tag_close'] = '</li>';
    $config['prev_link'] = '«';
    $config['prev_tag_open'] = '<li class="paginate_button page-item prev">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '»';
    $config['next_tag_open'] = '<li paginate_button page-item >';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li paginate_button page-item >';
    $config['last_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="paginate_button page-item active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li paginate_button page-item >';
    $config['num_tag_close'] = '</li>';

    $this->pagination->initialize($config);


    $data['pagination'] = $this->pagination->create_links();
    $data['result'] = $users_record;
    $data['row'] = $rowno;
    $data['search'] = $search_text;

    $id_activity = $this->input->post('id_activity');

    if($this->session->userdata('id_activity') != NULL)
    {

    } else {
      $this->session->set_userdata(array('id_activity'=>$id_activity));
    }

    

    $data['id_activity'] = $id_activity;


    // var_dump($data); 


    $this->load->view('template/user_ppm/header/header');
    $this->load->view('template/user_ppm/body/List_data_workstation',$data);
    $this->load->view('template/user_ppm/footer/footer');

  }

    
  function User_Computer()
  {
      $this->data['site_title'] = 'Add_Agent';
      $this->load->view('template/user_ppm/header/header');
      $this->load->view('template/body/Form_PPM/Computer/Form/Computer',$this->data);
      $this->load->view('template/user_ppm/footer/footer');

  }


  function User_Notebook()
  {

      $this->data['site_title'] = 'Add_Agent';
      $this->load->view('template/user_ppm/header/header');
      $this->load->view('template/body/Form_PPM/Computer/Form/Notebook',$this->data);
      $this->load->view('template/user_ppm/footer/footer');

  }


  public function User_PPM_Form_Printer()
  {


      $this->data['site_title'] = 'Add_Agent';
      $this->load->view('template/user_ppm/header/header');
      $this->load->view('template/body/Form_PPM/Hardware/Form_Printer_Scanner',$this->data);
      $this->load->view('template/user_ppm/footer/footer');

  }


  function User_Printer()
  {
   
      $this->data['site_title'] = 'Add_Agent';
      $this->load->view('template/user_ppm/header/header');
      $this->load->view('template/body/Form_PPM/Hardware/Form_PS/printer',$this->data);
      $this->load->view('template/user_ppm/footer/footer');

  }


  function User_Scanner()
  {
     
      $this->data['site_title'] = 'Add_Agent';
      $this->load->view('template/user_ppm/header/header');
      $this->load->view('template/body/Form_PPM/Hardware/Form_PS/scanner',$this->data);
      $this->load->view('template/user_ppm/footer/footer');

  }


  function Form_PPM_Client_Acknowlege()
  {
      $hidden_ppm_id = $this->input->post('hidden_ppm_id');
      $hidden_user_id = $this->input->post('hidden_user_id');
      $user_id = hex2bin($hidden_user_id);
      $id_number = $this->input->post('id_number');


      $d = $this->input->post('d');
      $t = $this->input->post('t');
      $s = $this->input->post('s');

      //var_dump($id_number);

      for($i=0;$i<count($id_number); $i++){
        //echo $id_number[$i].'<br>';
        
        $idn = $id_number[$i];
        $this->db->where('id_number',$idn);

        $updateBy = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date 


        $data = array('status_ppm'=>'Acknowledge','date_acknowledge'=>$datetime);
        $this->db->update('ppm_register',$data);

        //var_dump($idn);
      }

      //exit();
      //redirect('Form_PPM/Form_PPM_Client_Work/'); 

      $sql = base_url()."Form_PPM/Form_PPM_Client_Work/1?q=".$hidden_ppm_id."&u=".$hidden_user_id."&d=".$d."&t=".$t."&s=".$s;

      redirect($sql);

  }


  function Form_PPM_Client_Acknowledge_From_Details()
  {

      // add comment 
      $id = $this->input->post('id');
      $comment = $this->input->post('comment');

      $acknowledge = '';
      $this->db->where('id_number',$id);
      $query =  $this->db->get('ppm_register')->result();
      foreach ($query as $data) 
      {
        $acknowledge = $data->acknowledge;
      } 

      if(!empty($comment)){
        $data_comment = array('comment_acknowledge'=>$comment,'created_by_acknowledge'=>$acknowledge);
        $this->db->where('id_number',$id);
        $this->db->update('ppm_comment',$data_comment);

      }
      // end



      $updateBy = $this->session->userdata('userid'); // id yang login system
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $datetime = $dateReg.' '.$timeReg; //current date 


      // $first_name = $this->session->userdata('first_name');
      // $last_name = $this->session->userdata('last_name');

      // $fname = $first_name.' '.$last_name;
      


      $id = $this->input->post('id');
      $this->db->where('id_number',$id);
      $data = array('status_ppm'=>'Acknowledge','date_acknowledge'=>$datetime);
      $this->db->update('ppm_register',$data);
  }


  function work_station_list()
  {
      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 

          $ppm_id = $this->input->get('ppm_id');


          // data here 
          $search_text = '';
          $paging_by_find = '';
          $type_devices_find = '';
          $user_find = '';
          $department_find = '';
          $status_find = '';

         $s1 = $this->session->flashdata('paging_by_find');
         $s2 = $this->session->flashdata('type_devices_find');
         $s3 = $this->session->flashdata('user_find');
         $s4 = $this->session->flashdata('status');
         $s5 = $this->session->flashdata('department_find');

          if((!empty($s1))||(!empty($s2))||(!empty($s3))||(!empty($s4))||(!empty($s5))||(!empty($s6))){

            $this->session->set_flashdata('paging_by_find', $s1);
            $this->session->set_flashdata('type_devices_find', $s2);
            $this->session->set_flashdata('user_find', $s3);
            $this->session->set_flashdata('status', $s4);
            $this->session->set_flashdata('department_find', $s5);

          } else {

            $paging_by_find = $this->input->post('paging_by_find');
            $type_devices_find = $this->input->post('type_devices_find');
            $user_find = $this->input->post('user_find');
            $department_find = $this->input->post('department_find');
            $status_find = $this->input->post('status_find');

            $this->session->set_flashdata('paging_by_find', $paging_by_find);
            $this->session->set_flashdata('type_devices_find', $type_devices_find);
            $this->session->set_flashdata('user_find', $user_find);
            $this->session->set_flashdata('status', $status_find);
            $this->session->set_flashdata('department_find', $department_find);

          }

          

          if($status_find=='Not Yet'){
            $active = $this->uri->segment(3);
            redirect('Form_PPM/data_workstation/'.$active);
          } else {
            $this->data['site_title'] = 'Add_Agent';
            $this->load->view('template/header/header');
            $this->load->view('template/body/Form_PPM_v2/Endorse_data_workstation',$this->data);
            $this->load->view('template/footer/footer');
          }

          // var_dump($user_find); exit();

          

          

      } else { 
          $this->load->view('login');
      }  
  }


  function work_server_list()
  {
      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 

          $ppm_id = $this->input->get('ppm_id');


          // data here 
          $search_text = '';
          $paging_by_find = '';
          $type_devices_find = '';
          $user_find = '';
          $department_find = '';
          $status_find = '';

         $s1 = $this->session->flashdata('paging_by_find');
         $s2 = $this->session->flashdata('type_devices_find');
         $s3 = $this->session->flashdata('user_find');
         $s4 = $this->session->flashdata('status');
         $s5 = $this->session->flashdata('department_find');

          if((!empty($s1))||(!empty($s2))||(!empty($s3))||(!empty($s4))||(!empty($s5))||(!empty($s6))){

            $this->session->set_flashdata('paging_by_find', $s1);
            $this->session->set_flashdata('type_devices_find', $s2);
            $this->session->set_flashdata('user_find', $s3);
            $this->session->set_flashdata('status', $s4);
            $this->session->set_flashdata('department_find', $s5);

          } else {

            $paging_by_find = $this->input->post('paging_by_find');
            $type_devices_find = $this->input->post('type_devices_find');
            $user_find = $this->input->post('user_find');
            $department_find = $this->input->post('department_find');
            $status_find = $this->input->post('status_find');

            $this->session->set_flashdata('paging_by_find', $paging_by_find);
            $this->session->set_flashdata('type_devices_find', $type_devices_find);
            $this->session->set_flashdata('user_find', $user_find);
            $this->session->set_flashdata('status', $status_find);
            $this->session->set_flashdata('department_find', $department_find);

          }

          
          // var_dump($user_find); exit();

          

          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Form_PPM_v2/Endorse_data_server',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }  
  }


  function work_network_list()
  {
      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 

          $ppm_id = $this->input->get('ppm_id');


          // data here 
          $search_text = '';
          $paging_by_find = '';
          $type_devices_find = '';
          $user_find = '';
          $department_find = '';
          $status_find = '';

         $s1 = $this->session->flashdata('paging_by_find');
         $s2 = $this->session->flashdata('type_devices_find');
         $s3 = $this->session->flashdata('user_find');
         $s4 = $this->session->flashdata('status');
         $s5 = $this->session->flashdata('department_find');

          if((!empty($s1))||(!empty($s2))||(!empty($s3))||(!empty($s4))||(!empty($s5))||(!empty($s6))){

            //echo 'B';
            $this->session->set_flashdata('paging_by_find', $s1);
            $this->session->set_flashdata('type_devices_find', $s2);
            $this->session->set_flashdata('user_find', $s3);
            $this->session->set_flashdata('status', $s4);
            $this->session->set_flashdata('department_find', $s5);

          } else {
            //echo 'B';
            $paging_by_find = $this->input->post('paging_by_find');
            $type_devices_find = $this->input->post('type_devices_find');
            $user_find = $this->input->post('user_find');
            $department_find = $this->input->post('department_find');
            $status_find = $this->input->post('status_find');

            $this->session->set_flashdata('paging_by_find', $paging_by_find);
            $this->session->set_flashdata('type_devices_find', $type_devices_find);
            $this->session->set_flashdata('user_find', $user_find);
            $this->session->set_flashdata('status', $status_find);
            $this->session->set_flashdata('department_find', $department_find);

          }

          //$type_devices_find = $this->input->post('type_devices_find');
          $type_devices_find = $this->session->flashdata('type_devices_find');
          //var_dump($type_devices_find); exit();

          

          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Form_PPM_v2/Endorse_data_network',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }  
  }








  function work_station_list_asset($rowno='')
  {
      


      $ppm_id = $this->input->post('ppm_id');


      // data here 
      $search_text = '';
      $paging_by_find = '';
      $type_devices_find = '';
      $user_find = '';
      $department_find = '';
      $status_find = '';


      $search_text = $this->input->post('search_text');

      $paging_by_find = $this->input->post('paging_by_find');
      $type_devices_find = $this->input->post('type_devices_find');
      $user_find = $this->input->post('user_find');
      $department_find = $this->input->post('department_find');
      $status_find = $this->input->post('status_find');
      // var_dump($user_find); exit();

      $this->session->set_flashdata('search_text', $search_text);
      $this->session->set_flashdata('paging_by_find', $paging_by_find);
      $this->session->set_flashdata('type_devices_find', $type_devices_find);
      $this->session->set_flashdata('user_find', $user_find);
      $this->session->set_flashdata('status_find', $status_find);
      $this->session->set_flashdata('department_find', $department_find);


      if(!empty($paging_by_find)){
        // Row per page
        $rowperpage = $paging_by_find;
      } else {
        // Row per page
        $rowperpage = 10;
      }
      

      // Row position
      if($rowno != 0){
        $rowno = ($rowno-1) * $rowperpage;
      } 
      
      // All records count
      $allcount = $this->Admin->work_station_list_data_c_asset($ppm_id,$search_text,$type_devices_find,$department_find,$status_find,$user_find);

      // Get records
      $users_record = $this->Admin->work_station_list_data_d_asset($rowno,$rowperpage,$ppm_id,$search_text,$type_devices_find,$department_find,$status_find,$user_find);
   
      // Pagination Configuration
      $config['base_url'] = base_url().'form_ppm/work_station_list';
      $config['use_page_numbers'] = TRUE;
      $config['total_rows'] = $allcount;
      $config['per_page'] = $rowperpage;


      // integrate bootstrap pagination
      $config['full_tag_open'] = '<ul class="pagination">';
      $config['full_tag_close'] = '</ul>';
      $config['first_link'] = false;
      $config['last_link'] = false;
      $config['first_tag_open'] = '<li class="paginate_button page-item">';
      $config['first_tag_close'] = '</li>';
      $config['prev_link'] = '«';
      $config['prev_tag_open'] = '<li class="paginate_button page-item prev">';
      $config['prev_tag_close'] = '</li>';
      $config['next_link'] = '»';
      $config['next_tag_open'] = '<li paginate_button page-item >';
      $config['next_tag_close'] = '</li>';
      $config['last_tag_open'] = '<li paginate_button page-item >';
      $config['last_tag_close'] = '</li>';
      $config['cur_tag_open'] = '<li class="paginate_button page-item active"><a href="#">';
      $config['cur_tag_close'] = '</a></li>';
      $config['num_tag_open'] = '<li paginate_button page-item >';
      $config['num_tag_close'] = '</li>';

      $this->pagination->initialize($config);


      // Initialize
      $this->pagination->initialize($config);

      // Initialize $data Array
      $data['pagination'] = $this->pagination->create_links();
      $data['result'] = $users_record;
      $data['row'] = $rowno;

      echo json_encode($data);
  }


  function work_station_list_data($rowno='')
  {
      


      $ppm_id = $this->input->post('ppm_id');


      // data here 
      $search_text = '';
      $paging_by_find = '';
      $type_devices_find = '';
      $user_find = '';
      $department_find = '';
      $status_find = '';



      $paging_by_find = $this->input->post('paging_by_find');
      $type_devices_find = $this->input->post('type_devices_find');
      $user_find = $this->input->post('user_find');
      $department_find = $this->input->post('department_find');
      $status_find = $this->input->post('status_find');
      // var_dump($department_find); exit();


      if($type_devices_find=='Desktop'){
        $type_devices_find='Computer';
      } else if($type_devices_find=='Laptop'){
        $type_devices_find='Notebook';
      }


      // $this->session->set_flashdata('paging_by_find', $paging_by_find);
      // $this->session->set_flashdata('type_devices_find', $type_devices_find);
      // $this->session->set_flashdata('user_find', $user_find);
      // $this->session->set_flashdata('status_find', $status_find);
      // $this->session->set_flashdata('department_find', $department_find);


      if(!empty($paging_by_find)){
        // Row per page
        $rowperpage = $paging_by_find;
      } else {
        // Row per page
        $rowperpage = 10;
      }
      

      // Row position
      if($rowno != 0){
        $rowno = ($rowno-1) * $rowperpage;
      } 
      
      // All records count
      $allcount = $this->Admin->work_station_list_data_c($ppm_id,$search_text,$type_devices_find,$department_find,$status_find,$user_find);

      // Get records
      $users_record = $this->Admin->work_station_list_data_d($rowno,$rowperpage,$ppm_id,$search_text,$type_devices_find,$department_find,$status_find,$user_find);
   
      // Pagination Configuration
      $config['base_url'] = base_url().'form_ppm/work_station_list';
      $config['use_page_numbers'] = TRUE;
      $config['total_rows'] = $allcount;
      $config['per_page'] = $rowperpage;


      // integrate bootstrap pagination
      $config['full_tag_open'] = '<ul class="pagination">';
      $config['full_tag_close'] = '</ul>';
      $config['first_link'] = false;
      $config['last_link'] = false;
      $config['first_tag_open'] = '<li class="paginate_button page-item">';
      $config['first_tag_close'] = '</li>';
      $config['prev_link'] = '«';
      $config['prev_tag_open'] = '<li class="paginate_button page-item prev">';
      $config['prev_tag_close'] = '</li>';
      $config['next_link'] = '»';
      $config['next_tag_open'] = '<li paginate_button page-item >';
      $config['next_tag_close'] = '</li>';
      $config['last_tag_open'] = '<li paginate_button page-item >';
      $config['last_tag_close'] = '</li>';
      $config['cur_tag_open'] = '<li class="paginate_button page-item active"><a href="#">';
      $config['cur_tag_close'] = '</a></li>';
      $config['num_tag_open'] = '<li paginate_button page-item >';
      $config['num_tag_close'] = '</li>';

      $this->pagination->initialize($config);


      // Initialize
      $this->pagination->initialize($config);

      // Initialize $data Array
      $data['pagination'] = $this->pagination->create_links();
      $data['result'] = $users_record;
      $data['row'] = $rowno;

      echo json_encode($data);
  }



  function work_server_list_data($rowno='')
  {
      


      $ppm_id = $this->input->post('ppm_id');


      // data here 
      $search_text = '';
      $paging_by_find = '';
      $type_devices_find = '';
      $user_find = '';
      $department_find = '';
      $status_find = '';



      $paging_by_find = $this->input->post('paging_by_find');
      $type_devices_find = $this->input->post('type_devices_find');
      $user_find = $this->input->post('user_find');
      $department_find = $this->input->post('department_find');
      $status_find = $this->input->post('status_find');
      // var_dump($user_find); exit();

      // $this->session->set_flashdata('paging_by_find', $paging_by_find);
      // $this->session->set_flashdata('type_devices_find', $type_devices_find);
      // $this->session->set_flashdata('user_find', $user_find);
      // $this->session->set_flashdata('status_find', $status_find);
      // $this->session->set_flashdata('department_find', $department_find);


      if($type_devices_find=='Desktop'){
        $type_devices_find='Computer';
      } else if($type_devices_find=='Laptop'){
        $type_devices_find='Notebook';
      }
      


      if(!empty($paging_by_find)){
        // Row per page
        $rowperpage = $paging_by_find;
      } else {
        // Row per page
        $rowperpage = 10;
      }
      

      // Row position
      if($rowno != 0){
        $rowno = ($rowno-1) * $rowperpage;
      } 
      
      // All records count
      $allcount = $this->Admin->server_list_data_c($ppm_id,$search_text,$type_devices_find,$department_find,$status_find,$user_find);

      // Get records
      $users_record = $this->Admin->server_list_data_d($rowno,$rowperpage,$ppm_id,$search_text,$type_devices_find,$department_find,$status_find,$user_find);
   
      // Pagination Configuration
      $config['base_url'] = base_url().'form_ppm/work_server_list';
      $config['use_page_numbers'] = TRUE;
      $config['total_rows'] = $allcount;
      $config['per_page'] = $rowperpage;


      // integrate bootstrap pagination
      $config['full_tag_open'] = '<ul class="pagination">';
      $config['full_tag_close'] = '</ul>';
      $config['first_link'] = false;
      $config['last_link'] = false;
      $config['first_tag_open'] = '<li class="paginate_button page-item">';
      $config['first_tag_close'] = '</li>';
      $config['prev_link'] = '«';
      $config['prev_tag_open'] = '<li class="paginate_button page-item prev">';
      $config['prev_tag_close'] = '</li>';
      $config['next_link'] = '»';
      $config['next_tag_open'] = '<li paginate_button page-item >';
      $config['next_tag_close'] = '</li>';
      $config['last_tag_open'] = '<li paginate_button page-item >';
      $config['last_tag_close'] = '</li>';
      $config['cur_tag_open'] = '<li class="paginate_button page-item active"><a href="#">';
      $config['cur_tag_close'] = '</a></li>';
      $config['num_tag_open'] = '<li paginate_button page-item >';
      $config['num_tag_close'] = '</li>';

      $this->pagination->initialize($config);


      // Initialize
      $this->pagination->initialize($config);

      // Initialize $data Array
      $data['pagination'] = $this->pagination->create_links();
      $data['result'] = $users_record;
      $data['row'] = $rowno;

      echo json_encode($data);
  }


  function work_network_list_data($rowno='')
  {
      


      $ppm_id = $this->input->post('ppm_id');


      // data here 
      $search_text = '';
      $paging_by_find = '';
      $type_devices_find = '';
      $user_find = '';
      $department_find = '';
      $status_find = '';



      $paging_by_find = $this->input->post('paging_by_find');
      $type_devices_find = $this->input->post('type_devices_find');
      $user_find = $this->input->post('user_find');
      $department_find = $this->input->post('department_find');
      $status_find = $this->input->post('status_find');
      // var_dump($user_find); exit();

      // $this->session->set_flashdata('paging_by_find', $paging_by_find);
      // $this->session->set_flashdata('type_devices_find', $type_devices_find);
      // $this->session->set_flashdata('user_find', $user_find);
      // $this->session->set_flashdata('status_find', $status_find);
      // $this->session->set_flashdata('department_find', $department_find);


      if(!empty($paging_by_find)){
        // Row per page
        $rowperpage = $paging_by_find;
      } else {
        // Row per page
        $rowperpage = 10;
      }
      

      // Row position
      if($rowno != 0){
        $rowno = ($rowno-1) * $rowperpage;
      } 
      
      // All records count
      $allcount = $this->Admin->server_list_data_c($ppm_id,$search_text,$type_devices_find,$department_find,$status_find,$user_find);

      // Get records
      $users_record = $this->Admin->server_list_data_d($rowno,$rowperpage,$ppm_id,$search_text,$type_devices_find,$department_find,$status_find,$user_find);
   
      // Pagination Configuration
      $config['base_url'] = base_url().'form_ppm/work_network_list';
      $config['use_page_numbers'] = TRUE;
      $config['total_rows'] = $allcount;
      $config['per_page'] = $rowperpage;


      // integrate bootstrap pagination
      $config['full_tag_open'] = '<ul class="pagination">';
      $config['full_tag_close'] = '</ul>';
      $config['first_link'] = false;
      $config['last_link'] = false;
      $config['first_tag_open'] = '<li class="paginate_button page-item">';
      $config['first_tag_close'] = '</li>';
      $config['prev_link'] = '«';
      $config['prev_tag_open'] = '<li class="paginate_button page-item prev">';
      $config['prev_tag_close'] = '</li>';
      $config['next_link'] = '»';
      $config['next_tag_open'] = '<li paginate_button page-item >';
      $config['next_tag_close'] = '</li>';
      $config['last_tag_open'] = '<li paginate_button page-item >';
      $config['last_tag_close'] = '</li>';
      $config['cur_tag_open'] = '<li class="paginate_button page-item active"><a href="#">';
      $config['cur_tag_close'] = '</a></li>';
      $config['num_tag_open'] = '<li paginate_button page-item >';
      $config['num_tag_close'] = '</li>';

      $this->pagination->initialize($config);


      // Initialize
      $this->pagination->initialize($config);

      // Initialize $data Array
      $data['pagination'] = $this->pagination->create_links();
      $data['result'] = $users_record;
      $data['row'] = $rowno;

      echo json_encode($data);
  }



  function work_server_list_asset($rowno='')
  {
      


      $ppm_id = $this->input->post('ppm_id');


      // data here 
      $search_text = '';
      $paging_by_find = '';
      $type_devices_find = '';
      $user_find = '';
      $department_find = '';
      $status_find = '';


      $search_text = $this->input->post('search_text');

      $paging_by_find = $this->input->post('paging_by_find');
      $type_devices_find = $this->input->post('type_devices_find');
      $user_find = $this->input->post('user_find');
      $department_find = $this->input->post('department_find');
      $status_find = $this->input->post('status_find');
      // var_dump($user_find); exit();

      $this->session->set_flashdata('search_text', $search_text);
      $this->session->set_flashdata('paging_by_find', $paging_by_find);
      $this->session->set_flashdata('type_devices_find', $type_devices_find);
      $this->session->set_flashdata('user_find', $user_find);
      $this->session->set_flashdata('status_find', $status_find);
      $this->session->set_flashdata('department_find', $department_find);


      if(!empty($paging_by_find)){
        // Row per page
        $rowperpage = $paging_by_find;
      } else {
        // Row per page
        $rowperpage = 10;
      }
      

      // Row position
      if($rowno != 0){
        $rowno = ($rowno-1) * $rowperpage;
      } 
      
      // All records count
      $allcount = $this->Admin->work_server_list_data_c_asset($ppm_id,$search_text,$type_devices_find,$department_find,$status_find,$user_find);

      // Get records
      $users_record = $this->Admin->work_server_list_data_d_asset($rowno,$rowperpage,$ppm_id,$search_text,$type_devices_find,$department_find,$status_find,$user_find);
   
      // Pagination Configuration
      $config['base_url'] = base_url().'form_ppm/work_network_list';
      $config['use_page_numbers'] = TRUE;
      $config['total_rows'] = $allcount;
      $config['per_page'] = $rowperpage;


      // integrate bootstrap pagination
      $config['full_tag_open'] = '<ul class="pagination">';
      $config['full_tag_close'] = '</ul>';
      $config['first_link'] = false;
      $config['last_link'] = false;
      $config['first_tag_open'] = '<li class="paginate_button page-item">';
      $config['first_tag_close'] = '</li>';
      $config['prev_link'] = '«';
      $config['prev_tag_open'] = '<li class="paginate_button page-item prev">';
      $config['prev_tag_close'] = '</li>';
      $config['next_link'] = '»';
      $config['next_tag_open'] = '<li paginate_button page-item >';
      $config['next_tag_close'] = '</li>';
      $config['last_tag_open'] = '<li paginate_button page-item >';
      $config['last_tag_close'] = '</li>';
      $config['cur_tag_open'] = '<li class="paginate_button page-item active"><a href="#">';
      $config['cur_tag_close'] = '</a></li>';
      $config['num_tag_open'] = '<li paginate_button page-item >';
      $config['num_tag_close'] = '</li>';

      $this->pagination->initialize($config);


      // Initialize
      $this->pagination->initialize($config);

      // Initialize $data Array
      $data['pagination'] = $this->pagination->create_links();
      $data['result'] = $users_record;
      $data['row'] = $rowno;

      echo json_encode($data);
  }


  function work_network_list_asset($rowno='')
  {
      


      $ppm_id = $this->input->post('ppm_id');


      // data here 
      $search_text = '';
      $paging_by_find = '';
      $type_devices_find = '';
      $user_find = '';
      $department_find = '';
      $status_find = '';


      $search_text = $this->input->post('search_text');

      $paging_by_find = $this->input->post('paging_by_find');
      $type_devices_find = $this->input->post('type_devices_find');
      $user_find = $this->input->post('user_find');
      $department_find = $this->input->post('department_find');
      $status_find = $this->input->post('status_find');
      // var_dump($user_find); exit();

      $this->session->set_flashdata('search_text', $search_text);
      $this->session->set_flashdata('paging_by_find', $paging_by_find);
      $this->session->set_flashdata('type_devices_find', $type_devices_find);
      $this->session->set_flashdata('user_find', $user_find);
      $this->session->set_flashdata('status_find', $status_find);
      $this->session->set_flashdata('department_find', $department_find);


      if(!empty($paging_by_find)){
        // Row per page
        $rowperpage = $paging_by_find;
      } else {
        // Row per page
        $rowperpage = 10;
      }
      

      // Row position
      if($rowno != 0){
        $rowno = ($rowno-1) * $rowperpage;
      } 
      
      // All records count
      $allcount = $this->Admin->work_network_list_data_c_asset($ppm_id,$search_text,$type_devices_find,$department_find,$status_find,$user_find);

      // Get records
      $users_record = $this->Admin->work_network_list_data_d_asset($rowno,$rowperpage,$ppm_id,$search_text,$type_devices_find,$department_find,$status_find,$user_find);
   
      // Pagination Configuration
      $config['base_url'] = base_url().'form_ppm/work_station_list';
      $config['use_page_numbers'] = TRUE;
      $config['total_rows'] = $allcount;
      $config['per_page'] = $rowperpage;


      // integrate bootstrap pagination
      $config['full_tag_open'] = '<ul class="pagination">';
      $config['full_tag_close'] = '</ul>';
      $config['first_link'] = false;
      $config['last_link'] = false;
      $config['first_tag_open'] = '<li class="paginate_button page-item">';
      $config['first_tag_close'] = '</li>';
      $config['prev_link'] = '«';
      $config['prev_tag_open'] = '<li class="paginate_button page-item prev">';
      $config['prev_tag_close'] = '</li>';
      $config['next_link'] = '»';
      $config['next_tag_open'] = '<li paginate_button page-item >';
      $config['next_tag_close'] = '</li>';
      $config['last_tag_open'] = '<li paginate_button page-item >';
      $config['last_tag_close'] = '</li>';
      $config['cur_tag_open'] = '<li class="paginate_button page-item active"><a href="#">';
      $config['cur_tag_close'] = '</a></li>';
      $config['num_tag_open'] = '<li paginate_button page-item >';
      $config['num_tag_close'] = '</li>';

      $this->pagination->initialize($config);


      // Initialize
      $this->pagination->initialize($config);

      // Initialize $data Array
      $data['pagination'] = $this->pagination->create_links();
      $data['result'] = $users_record;
      $data['row'] = $rowno;

      echo json_encode($data);
  }

  function get_description()
  { 
    $hostname = $this->input->post('hostname');
    $type = $this->input->post('type');
    $this->db->where('name',$hostname);

    if(($type=='Computer')||($type=='Desktop')){
      $query =  $this->db->get('computer')->result();
      foreach ($query as $data) 
      {
        echo $data->description;
      }
    }

    if(($type=='Laptop')||($type=='laptop')){
      $query =  $this->db->get('computer')->result();
      foreach ($query as $data) 
      {
        echo $data->description;
      }
    }


    if(($type=='Notebook')||($type=='notebook')){

      $query =  $this->db->get('computer')->result();
      foreach ($query as $data) 
      {
        echo $data->description;
      }
    }


    if(($type=='Printer')||($type=='printer')){
      $query =  $this->db->get('hardware')->result();
      foreach ($query as $data) 
      {
        echo $data->description;
      }
    }


    if(($type=='Scanner')||($type=='scanner')){
      $query =  $this->db->get('hardware')->result();
      foreach ($query as $data) 
      {
        echo $data->description;
      }
    }

    
    
  }


  function get_type()
  { 
    $hostname = $this->input->post('hostname');
    $type = $this->input->post('type');
    $this->db->where('name',$hostname);

    if(($type=='Computer')||($type=='Desktop')){
      $query =  $this->db->get('computer')->result();
      foreach ($query as $data) 
      {
        echo $data->type;
      }
    }


    if(($type=='Laptop')||($type=='laptop')){

      $query =  $this->db->get('computer')->result();
      foreach ($query as $data) 
      {
        echo $data->type;
      }
    }


    if(($type=='Notebook')||($type=='notebook')){

      $query =  $this->db->get('computer')->result();
      foreach ($query as $data) 
      {
        echo $data->type;
      }
    }


    if(($type=='Printer')||($type=='printer')){
      $query =  $this->db->get('hardware')->result();
      foreach ($query as $data) 
      {
        echo $data->type;
      }
    }


    if(($type=='Scanner')||($type=='scanner')){
      $query =  $this->db->get('hardware')->result();
      foreach ($query as $data) 
      {
        echo $data->type;
      }
    }
  }



  function get_url()
  { 
    $hostname = $this->input->post('hostname');
    $ppm_id = $this->input->post('ppm_id');
    //var_dump($ppm_id);
    $type = $this->input->post('type');
    $this->db->where('name',$hostname);

    if(($type=='Computer')||($type=='Desktop')){
      $query =  $this->db->get('computer')->result();
      foreach ($query as $data) 
      {
        $type = $data->type;

        $hostname = bin2hex($hostname);
        $ppm_id = bin2hex($ppm_id);
        $type = bin2hex($type);

        echo '<a href="'.base_url().'Form_PPM/Computer?hostname='.$hostname.'&ppm_id='.$ppm_id.'&type='.$type.'" target="_blank"><i class="fa fa-edit"></i></a>';
      }
    }


    if(($type=='Laptop')||($type=='laptop')){

      $query =  $this->db->get('computer')->result();
      foreach ($query as $data) 
      {
        $type = $data->type;

        $hostname = bin2hex($hostname);
        $ppm_id = bin2hex($ppm_id);
        $type = bin2hex($type);

        echo '<a href="'.base_url().'Form_PPM/Notebook?hostname='.$hostname.'&ppm_id='.$ppm_id.'&type='.$type.'" target="_blank"><i class="fa fa-edit"></i></a>';
      }
    }


    if(($type=='Notebook')||($type=='notebook')){

      $query =  $this->db->get('computer')->result();
      foreach ($query as $data) 
      {
        $type = $data->type;

        $hostname = bin2hex($hostname);
        $ppm_id = bin2hex($ppm_id);
        $type = bin2hex($type);

        echo '<a href="'.base_url().'Form_PPM/Notebook?hostname='.$hostname.'&ppm_id='.$ppm_id.'&type='.$type.'" target="_blank"><i class="fa fa-edit"></i></a>';
      }
    }


    if(($type=='Printer')||($type=='printer')){
      $query =  $this->db->get('hardware')->result();
      foreach ($query as $data) 
      {
        $type = $data->type;

        $hostname = bin2hex($hostname);
        $ppm_id = bin2hex($ppm_id);
        $type = bin2hex($type);

        echo '<a href="'.base_url().'Form_PPM/PPM_Form_Printer?hostname='.$hostname.'&ppm_id='.$ppm_id.'&type='.$type.'" target="_blank"><i class="fa fa-edit"></i></a>';
      }
    }


    if(($type=='Scanner')||($type=='scanner')){
      $query =  $this->db->get('hardware')->result();
      foreach ($query as $data) 
      {
        $type = $data->type;

        $hostname = bin2hex($hostname);
        $ppm_id = bin2hex($ppm_id);
        $type = bin2hex($type);

        echo '<a href="'.base_url().'Form_PPM/Scanner?hostname='.$hostname.'&ppm_id='.$ppm_id.'&type='.$type.'" target="_blank"><i class="fa fa-edit"></i></a>';
      }
    }



    if(($type=='Card Reader')||($type=='card reader')){
      $query =  $this->db->get('hardware')->result();
      foreach ($query as $data) 
      {
        $type = $data->type;

        $hostname = bin2hex($hostname);
        $ppm_id = bin2hex($ppm_id);
        $type = bin2hex($type);

        echo '<a href="'.base_url().'Form_PPM/Card_Reader?hostname='.$hostname.'&ppm_id='.$ppm_id.'&type='.$type.'" target="_blank"><i class="fa fa-edit"></i></a>';
      }
    }



    if(($type=='Server(Physical)')||($type=='Server(Virtual)')||($type=='Storage')){
      $query =  $this->db->get('computer')->result();
      foreach ($query as $data) 
      {
        $type = $data->type;

        $hostname = bin2hex($hostname);
        $ppm_id = bin2hex($ppm_id);
        $type = bin2hex($type);

        echo '<a href="'.base_url().'Form_PPM/PPM_Form_Server_Storage?hostname='.$hostname.'&ppm_id='.$ppm_id.'&type='.$type.'" target="_blank"><i class="fa fa-edit"></i></a>';
      }
    }


    //('Switch','Load Balancer','Access Point','Controller','Firewall','Router')
    if(($type=='Switch')||($type=='Load Balancer')||($type=='Access Point')||($type=='Controller')||($type=='Firewall')||($type=='UPS')){
      $query =  $this->db->get('hardware')->result();
      foreach ($query as $data) 
      {
        $type_f = $data->type;

        $hostname = bin2hex($hostname);
        $ppm_id = bin2hex($ppm_id);
        $type = bin2hex($type);

        //var_dump(hex2bin($ppm_id)); exit();

        //var_dump($type_f); exit();

        if($type_f=='Switch'){
          echo '<a href="'.base_url().'Form_PPM/Switch_PPM?hostname='.$hostname.'&ppm_id='.$ppm_id.'&type='.$type.'" target="_blank"><i class="fa fa-edit"></i></a>';
        } else if($type_f=='Load Balancer'){
          echo '<a href="'.base_url().'Form_PPM/Load_balance?hostname='.$hostname.'&ppm_id='.$ppm_id.'&type='.$type.'" target="_blank"><i class="fa fa-edit"></i></a>';
        } else if($type_f=='Access Point'){
          echo '<a href="'.base_url().'Form_PPM/Access_point?hostname='.$hostname.'&ppm_id='.$ppm_id.'&type='.$type.'" target="_blank"><i class="fa fa-edit"></i></a>';
        } else if($type_f=='Controller'){
          echo '<a href="'.base_url().'Form_PPM/Controller?hostname='.$hostname.'&ppm_id='.$ppm_id.'&type='.$type.'" target="_blank"><i class="fa fa-edit"></i></a>';
        } else if($type_f=='Firewall'){
          echo '<a href="'.base_url().'Form_PPM/Firewall?hostname='.$hostname.'&ppm_id='.$ppm_id.'&type='.$type.'" target="_blank"><i class="fa fa-edit"></i></a>';
        } else if($type_f=='UPS'){
          echo '<a href="'.base_url().'Form_PPM/Ups?hostname='.$hostname.'&ppm_id='.$ppm_id.'&type='.$type.'" target="_blank"><i class="fa fa-edit"></i></a>';
        } else {
          echo '<a href="'.base_url().'Form_PPM/PPM_Form_Network?hostname='.$hostname.'&ppm_id='.$ppm_id.'&type='.$type.'" target="_blank"><i class="fa fa-edit"></i></a>';
        }

        
      }
    }

  }


  function get_print()
  { 
    $hostname = $this->input->post('hostname');
    $ppm_id = $this->input->post('ppm_id');
    $type = $this->input->post('type');
    $this->db->where('name',$hostname);

    $id_number = "'".ppm_2_id_number($ppm_id,$hostname)."'";

    if(($type=='Computer')||($type=='Desktop')){
      $query =  $this->db->get('computer')->result();
      foreach ($query as $data) 
      {
        $type = $data->type;

        $hostname = bin2hex($hostname);
        $ppm_id = bin2hex($ppm_id);
        $type = bin2hex($type);

        echo '<a onclick="printIcon('.$id_number.')"><i class="fa fa-print"></i></a>';
      }
    }


    if(($type=='Laptop')||($type=='laptop')){

      $query =  $this->db->get('computer')->result();
      foreach ($query as $data) 
      {
        $type = $data->type;

        $hostname = bin2hex($hostname);
        $ppm_id = bin2hex($ppm_id);
        $type = bin2hex($type);

        echo '<a onclick="printIcon('.$id_number.')"><i class="fa fa-print"></i></a>';
      }
    }


    if(($type=='Notebook')||($type=='notebook')){

      $query =  $this->db->get('computer')->result();
      foreach ($query as $data) 
      {
        $type = $data->type;

        $hostname = bin2hex($hostname);
        $ppm_id = bin2hex($ppm_id);
        $type = bin2hex($type);

        echo '<a onclick="printIcon('.$id_number.')"><i class="fa fa-print"></i></a>';
      }
    }


    if(($type=='Printer')||($type=='printer')){
      $query =  $this->db->get('hardware')->result();
      foreach ($query as $data) 
      {
        $type = $data->type;

        $hostname = bin2hex($hostname);
        $ppm_id = bin2hex($ppm_id);
        $type = bin2hex($type);

        echo '<a onclick="printIcon2('.$id_number.')"><i class="fa fa-print"></i></a>';
      }
    }


    if(($type=='Scanner')||($type=='scanner')){
      $query =  $this->db->get('hardware')->result();
      foreach ($query as $data) 
      {
        $type = $data->type;

        $hostname = bin2hex($hostname);
        $ppm_id = bin2hex($ppm_id);
        $type = bin2hex($type);

        echo '<a onclick="printIcon2('.$id_number.')"><i class="fa fa-print"></i></a>';
      }
    }



    if(($type=='Card Reader')||($type=='card reader')){
      $query =  $this->db->get('hardware')->result();
      foreach ($query as $data) 
      {
        $type = $data->type;

        $hostname = bin2hex($hostname);
        $ppm_id = bin2hex($ppm_id);
        $type = bin2hex($type);

        echo '<a onclick="printIcon2('.$id_number.')"><i class="fa fa-print"></i></a>';
      }
    }



    if(($type=='Server(Virtual)')||($type=='Server(Physical)')||($type=='Storage')){
      $query =  $this->db->get('computer')->result();
      foreach ($query as $data) 
      {
        $type = $data->type;

        $hostname = bin2hex($hostname);
        $ppm_id = bin2hex($ppm_id);
        $type = bin2hex($type);

        echo '<a onclick="printIcon('.$id_number.')"><i class="fa fa-print"></i></a>';
      }
    }



    if(($type=='Firewall')||($type=='firewall')||($type=='UPS')||($type=='Ups')||($type=='Load Balancer')||($type=='load balancer')||($type=='Access Point')||($type=='Access point')||($type=='Controller')||($type=='controller')||($type=='Switch')||($type=='switch')){
      $query =  $this->db->get('hardware')->result();
      foreach ($query as $data) 
      {
        $type = $data->type;

        $hostname = bin2hex($hostname);
        $ppm_id = bin2hex($ppm_id);
        $type = bin2hex($type);

        echo '<a onclick="printIcon2('.$id_number.')"><i class="fa fa-print"></i></a>';
      }
    }



  }


  function get_acknowlegde()
  {
    $hostname = $this->input->post('hostname');
    $ppm_id = $this->input->post('ppm_id');
    $type = $this->input->post('type');

    $return = '';

    $this->db->where('hostname',$hostname);
    $this->db->where('type_ppm_activity',$ppm_id);

    $query =  $this->db->get('ppm_register')->result();
    foreach ($query as $data) 
    {
      $return = $data->acknowledge;
    }

    echo $return;
  }


  function get_status()
  {
    $hostname = $this->input->post('hostname');
    $ppm_id = $this->input->post('ppm_id');
    $type = $this->input->post('type');

    $return = '';

    $this->db->where('hostname',$hostname);
    $this->db->where('type_ppm_activity',$ppm_id);

    $query =  $this->db->get('ppm_register')->result();
    foreach ($query as $data) 
    {
      $return = $data->status_ppm;
    }

    echo $return;
  }


  function get_perform_date()
  {
    $hostname = $this->input->post('hostname');
    $ppm_id = $this->input->post('ppm_id');
    $type = $this->input->post('type');

    $return = '';

    $this->db->where('hostname',$hostname);
    $this->db->where('type_ppm_activity',$ppm_id);

    $query =  $this->db->get('ppm_register')->result();
    foreach ($query as $data) 
    {
      // $return = $data->created_date;
      $return = $data->perform_date;
    }

    echo $return;
  }


  function get_location()
  { 
    $hostname = $this->input->post('hostname');
    $type = $this->input->post('type');
    $this->db->where('name',$hostname);

    if(($type=='Computer')||($type=='Desktop')){
      $query =  $this->db->get('computer')->result();
      foreach ($query as $data) 
      {
        echo $data->location;
      }
    }


    if(($type=='Laptop')||($type=='laptop')||($type=='Server(Physical)')||($type=='Server(Virtual)')||($type=='Storage')){

      $query =  $this->db->get('computer')->result();
      foreach ($query as $data) 
      {
        echo $data->location;
      }
    }


    if(($type=='Notebook')||($type=='notebook')){

      $query =  $this->db->get('computer')->result();
      foreach ($query as $data) 
      {
        echo $data->location;
      }
    }


    if(($type=='Printer')||($type=='printer')){
      $query =  $this->db->get('hardware')->result();
      foreach ($query as $data) 
      {
        echo $data->location;
      }
    }


    if(($type=='Scanner')||($type=='scanner')){
      $query =  $this->db->get('hardware')->result();
      foreach ($query as $data) 
      {
        echo $data->location;
      }
    }



    if(($type=='Scanner')||($type=='scanner')){
      $query =  $this->db->get('network')->result();
      foreach ($query as $data) 
      {
        echo $data->location;
      }
    }



    if(($type=='Controller')||($type=='Firewall')||($type=='UPS')||($type=='Load Balancer')||($type=='Switch')){
      $query =  $this->db->get('hardware')->result();
      foreach ($query as $data) 
      {
        echo $data->location;
      }
    }
  }


  function get_department()
  { 
    $hostname = $this->input->post('hostname');
    $type = $this->input->post('type');
    $this->db->where('name',$hostname);

    $location = '';

    if(($type=='Computer')||($type=='Desktop')){
      $query =  $this->db->get('computer')->result();
      foreach ($query as $data) 
      {
        $location = $data->location;
      }
    }


    if(($type=='Laptop')||($type=='laptop')||($type=='Server(Physical)')||($type=='Server(Virtual)')||($type=='Storage')){

      $query =  $this->db->get('computer')->result();
      foreach ($query as $data) 
      {
        $location = $data->location;
      }
    }


    if(($type=='Notebook')||($type=='notebook')){

      $query =  $this->db->get('computer')->result();
      foreach ($query as $data) 
      {
        $location = $data->location;
      }
    }


    if(($type=='Printer')||($type=='printer')){
      $query =  $this->db->get('hardware')->result();
      foreach ($query as $data) 
      {
        $location = $data->location;
      }
    }


    if(($type=='Scanner')||($type=='scanner')){
      $query =  $this->db->get('hardware')->result();
      foreach ($query as $data) 
      {
        $location = $data->location;
      }
    }


    if(($type=='Controller')||($type=='Firewall')||($type=='UPS')||($type=='Load Balancer')||($type=='Switch')){
      $query =  $this->db->get('hardware')->result();
      foreach ($query as $data) 
      {
        $location = $data->location;
      }
    }


    $this->db->where('name',$location);
      $query =  $this->db->get('location')->result();
    $ack = '';
    foreach ($query as $data) 
    {
      $ack = $data->department;
    }

    echo $ack;
  }


  function Update_Computer_Verify()
  {
      // $id = $this->input->get('id');
      // $ppm_id = $this->input->get('ppm_id');
      // var_dump($ppm_id);
      // exit();

      // add comment 
      $id = $this->input->get('id');
      $comment = $this->input->get('comment');

      $acknowledge = '';
      $user_id = $this->session->userdata('userid');

      if(!empty($comment)){
        $data_comment = array('comment_verifier'=>$comment,'created_by_verifier'=>$user_id);
        $this->db->where('id_number',$id);
        $this->db->update('ppm_comment',$data_comment);
      }
      // end




      $updateBy = $this->session->userdata('userid'); // id yang login system
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $datetime = $dateReg.' '.$timeReg; //current date 


      $first_name = $this->session->userdata('first_name');
      $last_name = $this->session->userdata('last_name');

      $fname = $first_name.' '.$last_name;


      $id = $this->input->get('id');
      $ppm_id = $this->input->get('ppm_id');

      $this->db->where('id_number ',$id);
      $this->db->where('type_ppm_activity ',$ppm_id);
      $data = array('status_ppm'=>'Verified','endorse'=>$fname,'date_verifier'=>$datetime);
      $this->db->update('ppm_register',$data);

      redirect('form_ppm/work_station_list');
  }



  function person_inack()
  {
    $hostname = $this->input->post('hostname');
    $ppm_id = $this->input->post('ppm_id');
    $u = $this->ppm_2_ackowledge($ppm_id,$hostname);
    $u = bin2hex($u);

    $q = $this->input->post('ppm_id');

    echo '<a href="'.base_url().'Form_PPM/Form_PPM_Client_Work/1?q='.$q.'&u='.$u.'"><i class="fa fa-user"></i></a>';
  }


  function ppm_2_ackowledge($ppm_id,$hostname)
  {
    $this->db->where('hostname',$hostname);
      $this->db->where('type_ppm_activity',$ppm_id);
      $query =  $this->db->get('ppm_register')->result();
    $ack = '';
    foreach ($query as $data) 
    {
      $ack = $data->acknowledge;
    }

    return $ack;

  }



  // function get_department_ppm()
  // {
  //   $location = $this->input->post('location');

  //   var_dump($location); exit();
  //   $this->db->where('name',$location);
  //     $query =  $this->db->get('location')->result();
  //   $ack = '';
  //   foreach ($query as $data) 
  //   {
  //     $ack = $data->department;
  //   }

  //   return $ack;
  // }


  function get_location_ppm()
  {
    $hostname = $this->input->post('hostname');
    $ppm_id = $this->input->post('ppm_id');
    $type = $this->input->post('type');

    $return = '';

    $this->db->where('hostname',$hostname);
    $this->db->where('type_ppm_activity',$ppm_id);

    $query =  $this->db->get('ppm_register')->result();
    foreach ($query as $data) 
    {
      $return = $data->location;
    }

    echo $return;
  }



  function get_department_ppm()
  {
    $hostname = $this->input->post('hostname');
    $ppm_id = $this->input->post('ppm_id');
    $type = $this->input->post('type');

    $return = '';

    $this->db->where('hostname',$hostname);
    $this->db->where('type_ppm_activity',$ppm_id);

    $query =  $this->db->get('ppm_register')->result();
    foreach ($query as $data) 
    {
      $return = $data->department;
    }

    echo $return;
  }


  function test_email()
  {

    $this->load->library('email');
    $config['protocol']='smtp';
    $config['smtp_host']='72.18.130.33';
    $config['smtp_port']='587';
    $config['smtp_timeout']='30';
    $config['smtp_user']='support@nexquadrant.com';
    $config['smtp_pass']='Abc$1234567';
    $config['charset']='utf-8';
    $config['newline']="\r\n";
    $config['wordwrap'] = TRUE;
    $config['mailtype'] = 'html';
    $this->email->initialize($config);
   
    $to = 'hafiz.shahipurullah@bit.com.my';
    $subject = 'Nex-Desk Testing Email';
    $message = 'This is for testing email ! I try to send !';


    $this->email->from('support@nexquadrant.com', 'ITD Support');
    $this->email->to($to);
     
    $this->email->subject('Email Test');
    $this->email->message('Testing the email class.');

    if($this->email->send()) 
      echo 'Success';
    else 
      var_dump($this->email->print_debugger());


  }


  function deleteActivity()
  {
    $id = $this->input->post('id');
    $user_id = $this->session->userdata('userid');

    $data = array('userid'=>$user_id,'activity'=>'Delete PPM ID '.$id);
    $this->db->insert('user_log',$data);

    $this->db->where('id',$id);
    $this->db->delete('ppm2_activity');
  }




  function list_comment()
  {
    $id = $this->input->post('id');


    // $this->db->where('hostname',$id);

    // $query =  $this->db->get('ppm_register')->result();
    // foreach ($query as $data) 
    // {
    //   $id_number = $data->id_number;
    // }

    //var_dump($id); exit();

    $query = $this->Admin->list_comment($id);

    if(empty($query)){
      echo 'Tiada Data Ditemui';
    } else {
      foreach ($query as $data) 
      {
      
      }
      echo json_encode($data);
    }
  }



  function get_name_user()
  {
    $id = $this->input->post('id');

    $query = $this->Admin->get_name_user($id);

    if(empty($query)){
      echo 'Tiada Data Ditemui';
    } else {
      foreach ($query as $data) 
      {
      
      }
      echo json_encode($data);
    }
  }


  function list_checkbox()
  {
    $id_number = $this->input->post('id_number');

    $query = $this->Admin->list_checkbox($id_number);

    if(empty($query)){
      echo 'Tiada Data Ditemui';
    } else {
      foreach ($query as $data) 
      {
      
      }
      echo json_encode($data);
    }

  }
}