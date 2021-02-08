<?php
ob_start(); //v7
if (ob_get_level() > 0) { ob_end_clean(); } //v7
defined('BASEPATH') OR exit('No direct script access allowed');//ob_clean();
class Report extends CI_Controller  
{

    public function __construct()
    {

      parent::__construct();
      $this->load->database();
      $this->load->library('session');
      $this->load->library('datatables');
      $this->load->model('Report_model','Report');
      $this->load->model('Report_Visual_model','Visual');
      $this->load->model('Dbase_lookup','lookup');
      $this->load->helper('Lookup_helper'); //helpers
    }


    function RFO()
    {
        $rand = rand();
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=DNReport_".$rand.".doc");    
        echo "<html>";
        echo '<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">';
        echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
        echo "<body>";
        //echo "<center> ";
        echo "<b><h1> HOSPITAL SULTANAH BAHIYAH (HSB)<br>Discharge Note Report </h1></b>";
        echo "<br><hr></br>";
        $dataPoints = array(
                    array("y" => 25, "label" => "Sunday"),
                    array("y" => 15, "label" => "Monday"),
                    array("y" => 25, "label" => "Tuesday"),
                    array("y" => 5, "label" => "Wednesday"),
                    array("y" => 10, "label" => "Thursday"),
                    array("y" => 0, "label" => "Friday"),
                    array("y" => 20, "label" => "Saturday")
                  );

        $data = json_encode($dataPoints, JSON_NUMERIC_CHECK);

       // var_dump($data);
          
        echo '
                  
                   
                  
                  <script>
                  window.onload = function () {
                   
                  var chart = new CanvasJS.Chart("chartContainer", {
                    title: {
                      text: "Push-ups Over a Week"
                    },
                    axisY: {
                      title: "Number of Push-ups"
                    },
                    data: [{
                      type: "line",
                      dataPoints: '.$data.'
                    }]
                  });
                  chart.render();
                   
                  }
                  </script>
                  <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                  
             ';
    }

    // function test()
    // {
    //   $this->load->view('test_graph');
    // } 

    // function test_img()
    // {
    //   $this->load->view('test_html_img');
    // }

    // function save_picture()
    // {

    //     // 4 - attachment
    //     $data['ok'] = $this->input->post('pngUrl');
    //     $this->load->view('test_word',$data);
    // }

    // function test_pie()
    // {
    //   $this->load->view('test_pie_chart');
    // }

    // function test_bar()
    // {
    //   $this->load->view('test_bar');
    // }

    // function test_js_chart()
    // {
    //   $this->load->view('test_js_chart');
    // }

    function test_chartjs()
    {
      $this->load->view('test_chatjs');
    }

    function test_piejs()
    {
      $this->load->view('test_piejs');
    }

    function test_word()
    {
      $this->load->view('test_word');
    }

    function test_excel()
    {
      $this->load->library("excel");
      $object = new PHPExcel();

      $object->setActiveSheetIndex(0);

      $table_columns = array("Name", "Address", "Gender", "Designation", "Age");

      $column = 0;

      foreach($table_columns as $field)
      {
         $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
         $column++;
      }

      $excel_row = 2;

      $data = 'No Data';
      $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $data);

      $rand = rand();

      $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="tracker_'.$rand.'.xls"');
      //ob_end_clean();
      //ob_start();
      $object_writer->save('php://output');
    }


    public function Register_Report()
    {
        if((!empty($this->session->userdata('logged_in'))))
        {
          $this->data['site_title'] = 'Register_Report';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Register_Report/Register_Report',$this->data);
          $this->load->view('template/footer/footer');
        } else { 
          $this->load->view('login');
        }
    }


    public function Report_Overview()
    {
        if((!empty($this->session->userdata('logged_in'))))
        {
          $this->data['site_title'] = 'Report_Overview';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Report_Overview/Report_Overview',$this->data);
          $this->load->view('template/footer/footer');
        } else { 
          $this->load->view('login');
        }
    }

    public function Report_Overview_Tracker()
    {
        if((!empty($this->session->userdata('logged_in'))))
        {
          $this->data['site_title'] = 'Report_Overview';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Report_Overview/Report_Overview_Tracker',$this->data);
          $this->load->view('template/footer/footer');
        } else { 
          $this->load->view('login');
        }
    }

    public function Report_Overview_Statistic()
    {
        if((!empty($this->session->userdata('logged_in'))))
        {
          $this->data['site_title'] = 'Report_Overview';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Report_Overview/Report_Overview_Statistic',$this->data);
          $this->load->view('template/footer/footer');
        } else { 
          $this->load->view('login');
        }
    }


    public function Report_Run()
    {
        if((!empty($this->session->userdata('logged_in'))))
        {
          $this->data['site_title'] = 'Report_Run';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Report_Run/Report_Run',$this->data);
          $this->load->view('template/footer/footer');
        } else { 
          $this->load->view('login');
        }
    }

    function Select_ID_By_location()
    {
        $location = $this->input->post('location');
        $this->Report->Select_ID_By_location($location);
    }


    function RFO_Template_Data()
    {
        $id_ticket = '2018081719953';
        $this->Report->RFO_Template_Data($id_ticket);
    }

    function Tracker_Template_Data()
    {
        $id_ticket = '2018081731400';
        $this->Report->Tracker_Template_Data($id_ticket);
    }


    function Statistic_Circuit_Fault_Template_Data()
    {
        $id_ticket = '2018081731400';
        $this->Report->Statistic_Circuit_Fault_Template_Data($id_ticket);
    }


    function Dtable_Data_Set()
    {
      header('Content-Type: application/json');
      $id = $this->input->post('id');
      echo $this->Report->Dtable_Data_Set($id);
    }


    function RFO_Register()
    {
      $col = $this->input->post('id_column');
      $Report_Type = $this->input->post('Report_Type');
      $Report_Location = $this->input->post('Report_Location');
      $Report_Id_Ticket = $this->input->post('Report_Id_Ticket');
      $Report_Name = $this->input->post('Report_Name');
      $Report_Description = $this->input->post('Report_Description');
      // $Report_Format = $this->input->post('Report_Format');
      // $Report_Group = $this->input->post('Report_Group');
      
      $Report_ID = $this->input->post('Report_ID');
      
      // $id_ticket = '2018081719953';
      // $data = $this->Report->RFO_Register($col,$id_ticket);

      // exit();

      $updateBy = $this->session->userdata('userid'); // id yang login system
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i:s");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $datetime = $dateReg.' '.$timeReg; //current date 

      $id_group = $this->input->post('id_group');


      $data = array(
                      "report_type"=>$Report_Type,
                      "report_title"=>$Report_Name,
                      "report_description"=>$Report_Description,
                      "report_id"=>$Report_ID,
                      "created_by"=>$updateBy,
                      "created_date"=>$datetime
                   );
      $ReportInfo = $this->Report->ReportInfo($data);
      $save_col = $this->Report->save_col($col,$Report_ID);
      $access_group = $this->Report->access_group($id_group,$Report_ID);

      redirect('Report/Report_Overview');

    }


    function Dtable_Group_Set()
    {
      header('Content-Type: application/json');
      echo $this->Report->Dtable_Group_Set();
    }

    function Dtable_List_Report()
    {
      header('Content-Type: application/json');
      echo $this->Report->Dtable_List_Report();
    }

    function Dtable_List_Report_Tracker()
    {
      header('Content-Type: application/json');
      echo $this->Report->Dtable_List_Report_Tracker();
    }


    function Dtable_List_Report_DataVisual()
    {
      header('Content-Type: application/json');
      echo $this->Report->Dtable_List_Report_DataVisual();
    }


    function delete_report()
    {
      $id = $this->input->post('id'); 
      $this->Report->delete_report($id);
    }


    function rfo_exceute()
    {
      
    }


    function Report_Details()
    {
        $id = $this->input->post('segment');  
        $getData = $this->Report->Report_Details($id);
        if(empty($getData)){
          echo 'Tiada Data Ditemui';
        } else {
          foreach ($getData as $data) 
          {
          

          }
          echo json_encode($data);

        }
    }

    function Report_ID_Register($Report_ID_Register)
    {
      return $this->Report->Report_ID_Register($Report_ID_Register);
    }


    function Report_Generate()
    {
      
      $Report_ID = $this->input->post('Report_ID');
      $Report_Format = $this->input->post('Report_Format');
      $Report_Id_Ticket = $this->input->post('Report_Id_Ticket');
      $Report_Location = $this->input->post('Report_Location');
      $Report_Type = $this->input->post('type_hidden');
      $Report_Date_End = $this->input->post('Report_Date_End');
      $Report_Date_Start = $this->input->post('Report_Date_Start');
      $Report_Title = $this->input->post('Report_Title');


      $Report_ID_X = $this->Report_ID_Register($Report_ID);

      //var_dump($Report_ID_Register); exit();

      if($Report_Type=='1'){ // RFO

        $this->rfo_word($Report_ID_X,$Report_Id_Ticket);

      } else if($Report_Type=='2'){
        $this->data_tracker_column($Report_Date_Start,$Report_Date_End);
      } else if($Report_Type=='3'){
          $get_img = $this->Report->ImgCanvas($Report_ID,$Report_Type);
          $this->data_statistic_circuit_fault_report_visual($get_img,$Report_ID);
      } else if($Report_Type=='4'){
          $get_img = $this->Report->ImgCanvas($Report_ID,$Report_Type);
          $this->data_statistic_circuit_fault_report_backup_line($get_img,$Report_ID);
      } else if($Report_Type=='5'){
          $get_img = $this->Report->ImgCanvas($Report_ID,$Report_Type);
          $this->data_number_of_occurerence($get_img,$Report_ID);
      } else if($Report_Type=='6'){
          $get_img = $this->Report->ImgCanvas($Report_ID,$Report_Type);
          $this->data_total_hours($get_img,$Report_ID);
      } else {

      }

    }


    function rfo_word($Report_ID,$Report_Id_Ticket)
    {
      $data = $this->Report->RFO_Word($Report_ID,$Report_Id_Ticket);
    }


    function data_tracker($Report_Date_Start,$Report_Date_End)
    {
      

      $this->load->library("excel");
      $object = new PHPExcel();

      $object->setActiveSheetIndex(0);

      $table_columns = array( "Ticket Number", 
                              "Provider Reference", 
                              "Customer ID", 
                              "Location", 
                              "Reference No",
                              "Main Line Status",
                              "Backup Type",
                              "Backup Status",
                              "Problem Description",
                              "Cause Of Fault",
                              "Action Taken",
                              "Remarks",
                              "Provider Reference",
                              "Fault Category Type",
                              "Fault Category Portion",
                              "Current Status",
                              "Time Ticket Created",
                              "Time Closed Ticket",
                              "Outage Valid",
                              "Total Time",
                              "First Level",
                              "Time To Report TM"
                            );

      $column = 0;

      foreach($table_columns as $field)
      {
         $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
         $column++;
      }

      $excel_row = 2;
      $data = 'No Data';


      $query = $this->Report->data_tracker($Report_Date_Start,$Report_Date_End);
      if ($query->num_rows() >0){ 
          foreach ($query->result() as $data) {

            $id_ticket = $data->id_ticket;
            $provider_ref = $data->provider_ref;
            $first_name = $data->first_name;
            $location = $data->location;
            $ref_no = $data->ref_no;
            $main_status = $data->main_status;
            $backup_type = $data->backup_type;
            $backup_status = $data->backup_status;
            $current_state = $data->current_state;
            $created_date = $data->created_date;



            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $id_ticket);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $provider_ref);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $first_name);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $location);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $ref_no);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $main_status);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $backup_type);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $backup_status);

            $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $current_state);
            $object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $created_date);
            
            $query = $this->Report->data_tracker_closed($id_ticket);
            if ($query->num_rows() >0){ 
              foreach ($query->result() as $data) {
                $Problem = $data->Problem;
                $cause_of_fault = $data->cause_of_fault;
                $action_taken = $data->action_taken;
                $text_editor = $data->text_editor;

                $Portion = $data->Portion;
                $Fault_Type = $data->Fault_Type;

                $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $Problem);
                $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $cause_of_fault);
                $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $action_taken);
                $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $text_editor);
                $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $Portion);
                $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $Fault_Type);

                $Ticket_Validation_Outage = $data->Ticket_Validation_Outage;
                $object->getActiveSheet()->setCellValueByColumnAndRow(18, $excel_row, $Ticket_Validation_Outage);
              }
            }


            $query = $this->Report->data_tracker_master($id_ticket);
            if ($query->num_rows() >0){ 
              foreach ($query->result() as $data) {
                $provider_ref = $data->provider_ref;  
                if(empty($provider_ref)){
                  $provider_ref='Not Applicable';
                }
                $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $provider_ref);

                $closed_date = $data->created_date;  
                if(empty($closed_date)){
                  $closed_date='Not Applicable';
                }
                $object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, $closed_date);
                
              }
            } else {

              $null = 'Not Applicable';
              $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $null);
              $object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, $null);
            }


            $query = $this->Report->data_total_time($created_date,$closed_date);
            if ($query->num_rows() >0){ 
                foreach ($query->result() as $data) {
                    $total_time = $data->total_time;
                    $total = $total_time;
                    $seconds = $total;
                    $hours = floor($seconds / 3600);
                    $minutes = floor(($seconds / 60) % 60);
                    $seconds = $seconds % 60;

                    $total = $hours.' : '.$minutes.' : '.$seconds;
                    $object->getActiveSheet()->setCellValueByColumnAndRow(19, $excel_row, $total);

                }
            } 


            $query = $this->Report->data_first_level($id_ticket);
            if ($query->num_rows() >0){ 
                foreach ($query->result() as $data) {
                    $f_level_date = $data->created_date;
                    $object->getActiveSheet()->setCellValueByColumnAndRow(20, $excel_row, $f_level_date);
                }
            }



            $query = $this->Report->data_up2TM($id_ticket);
            if ($query->num_rows() >0){ 
                foreach ($query->result() as $data) {
                    $up2TM = $data->created_date;
                    $object->getActiveSheet()->setCellValueByColumnAndRow(21, $excel_row, $up2TM);
                }
            }


            

            $excel_row++;
          }
      }

      



      
      $rand = rand();
      $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="Tracker_'.$rand.'.xls"');
      //ob_end_clean();
      //ob_start();
      $object_writer->save('php://output');
    }


    function data_tracker_column($Report_Date_Start,$Report_Date_End)
    {



      $this->load->library("excel");
      $object = new PHPExcel();
      $object->setActiveSheetIndex(0);

      $column = 0;

      $id = $this->uri->segment(3);
      $id = $this->Report->get_id_tracker($id);
      $query = $this->Report->find_column_tracker($id);
      if ($query->num_rows() >0){ 
          $combine = array();
          foreach ($query->result() as $data) {
              $col = $data->report_column_id;
              $get_name = $this->Report->get_name_column($col);
              $combine[] = $col;
              $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $get_name);
              $column++;
          }

          $excel_row = 2;
          $data = 'No Data';
          $na = 'Not Applicable';

          $query = $this->Report->data_tracker($Report_Date_Start,$Report_Date_End);
          if ($query->num_rows() >0){ 
              foreach ($query->result() as $data) {

                $sla = $data->sla;
                $id_ticket_find = $data->id_ticket;

                $id_ticket = $data->id_ticket;
                $provider_ref = $data->provider_ref;
                $first_name = $data->sla;
                $location = $data->location;
                $ref_no = $data->ref_no;
                $main_status = $data->main_status;
                $backup_type = $data->backup_type;
                $backup_status = $data->backup_status;
                $current_state = $data->current_state;
                $created_date = $data->created_date;

                if(empty($id_ticket)){ $id_ticket = $na;}
                if(empty($provider_ref)){ $provider_ref = $na;}
                if(empty($first_name)){ $first_name = $na;}
                if(empty($location)){ $location = $na;}
                if(empty($ref_no)){ $ref_no = $na;}
                if(empty($main_status)){ $main_status = $na;}
                if(empty($backup_type)){ $backup_type = $na;}
                if(empty($current_state)){ $current_state = $na;}
                if(empty($created_date)){ $created_date = $na;}


                $num=0;
                foreach($combine as $data_col){
                  //echo $data_col.'<br>';
                
                  if($data_col=='14'){
                    $id_ticket = '"'.$id_ticket.'"';
                    $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $id_ticket);
                    $num++;
                  }


                  if($data_col=='15'){
                    if(empty($provider_ref)){ $provider_ref=$na;}
                    $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $provider_ref);
                    $num++;
                  }

                  if($data_col=='16'){
                    if(empty($first_name)){ $first_name=$na;}
                    $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $first_name);
                    $num++;
                  } 

                  if($data_col=='17'){
                    if(empty($location)){ $location=$na;}
                    $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $location);
                    $num++;
                  } 

                  if($data_col=='18'){
                    if(empty($ref_no)){ $ref_no=$na;}
                    $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $ref_no);
                    $num++;
                  }

                  if($data_col=='19'){
                    if(empty($main_status)){ $main_status=$na;}
                    $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $main_status);
                    $num++;
                  }

                  if($data_col=='20'){
                    if(empty($backup_type)){ $backup_type=$na;}
                    $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $backup_type);
                    $num++;
                  }

                  if($data_col=='21'){
                    if(empty($backup_status)){ $backup_status=$na;}
                    $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $backup_status);
                    $num++;
                  }

                  if($data_col=='35'){
                    if(empty($current_state)){ $current_state = $na;}
                    $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $current_state);
                    $num++;
                  }
                  
                  if($data_col=='29'){
                    $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $created_date);
                    $num++;
                  }


                  $query = $this->Report->data_tracker_closed($id_ticket_find);
                  if ($query->num_rows() >0){ 
                    foreach ($query->result() as $data) {
                      $Problem = $data->Problem;
                      $cause_of_fault = $data->cause_of_fault;
                      $action_taken = $data->action_taken;
                      
                      $text_editor = $data->text_editor;
                      // converter
                      $text_editor = strip_tags($text_editor);
                      $text_editor = substr($text_editor, 0, 110);

                      $Portion = $data->Portion;
                      $Fault_Type = $data->Fault_Type;
                      $Ticket_Validation_Outage = $data->Ticket_Validation_Outage;

                      $total_closed_date = $data->total_time_closed;
                      $total_closed_date = substr($total_closed_date, 0, -4);  

                      $time_closed_date = $data->created_date;
                    }

                    if(empty($Problem)){ $Problem = $na;}
                    if(empty($cause_of_fault)){ $cause_of_fault = $na;}
                    if(empty($action_taken)){ $action_taken = $na;}
                    if(empty($text_editor)){ $text_editor = $na;}
                    if(empty($Portion)){ $Portion = $na;}
                    if(empty($Fault_Type)){ $Fault_Type = $na;}
                    if(empty($Ticket_Validation_Outage)){ $Ticket_Validation_Outage = $na;}

                    if($data_col=='22'){
                      $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $Problem);
                      $num++;
                    }

                    if($data_col=='23'){
                      $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $cause_of_fault);
                      $num++;
                    }

                    if($data_col=='24'){
                      $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $action_taken);
                      $num++;
                    }

                    if($data_col=='25'){
                      $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $text_editor);
                      $num++;
                    }

                    if($data_col=='28'){
                      $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $Portion);
                      $num++;
                    }

                    if($data_col=='27'){
                      $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $Fault_Type); 
                      $num++;
                    }

                    if($data_col=='31'){
                      $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $Ticket_Validation_Outage);
                      $num++;
                    }


                    if($data_col=='32'){
                      $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $total_closed_date);
                      $num++;
                    }

                    if($data_col=='30'){
                      $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $time_closed_date);  
                      $num++;
                    }

                  } else {

                      if($data_col=='22'){
                        $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $na);
                        $num++;
                      }

                      if($data_col=='23'){
                        $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $na);
                        $num++;
                      }

                      if($data_col=='24'){
                        $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $na);
                        $num++;
                      }

                      if($data_col=='25'){
                        $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $na);
                        $num++;
                      }

                      if($data_col=='28'){
                        $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $na);
                        $num++;
                      }

                      if($data_col=='27'){
                        $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $na); 
                        $num++;
                      }

                      if($data_col=='31'){
                        $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $na);
                        $num++;
                      }

                      if($data_col=='32'){
                        $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $na);
                        $num++;
                      }


                      if($data_col=='30'){
                        $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $na);  
                        $num++;
                      }

                  }




                  $query = $this->Report->data_tracker_master($id_ticket_find);
                  if ($query->num_rows() >0){ 
                      foreach ($query->result() as $data) {
                        $provider_ref = $data->provider_ref;  
                        $closed_date = $data->created_date;  
                      }

                      if(empty($provider_ref)){ $provider_ref = $na;}
                      if(empty($closed_date)){ $closed_date = $na;}

                      if($data_col=='26'){
                        $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $provider_ref);
                        $num++;
                      }

                  } else {


                    if($data_col=='26'){
                      $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $na);
                      $num++;
                    }

                  }


                  $query = $this->Report->data_first_level($id_ticket_find);
                  if ($query->num_rows() >0){ 
                      foreach ($query->result() as $data) {
                          $f_level_date = $data->created_date;
                      }

                      if(empty($f_level_date)){ $f_level_date = $na;}

                      if($data_col=='33'){
                        $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $f_level_date);
                        $num++;
                      }
                  } else {

                      if($data_col=='33'){
                        $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $na);
                        $num++;
                      }

                  }


                  $query = $this->Report->data_up2TM($id_ticket_find);
                  if ($query->num_rows() >0){ 
                      foreach ($query->result() as $data) {
                          $up2TM = $data->created_date;
                          
                      }
                      if(empty($up2TM)){ $up2TM = $na;}

                      if($data_col=='34'){
                        $up2TM='';
                        $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $up2TM);
                        $num++;
                      }
                  } else {
                    if($data_col=='34'){
                        $up2TM='';
                        $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $up2TM);
                        $num++;
                      }
                  }


                


                  $get_escalation_1st_response=$this->Report->get_escalation_1st_response($sla);
                  if(empty($get_escalation_1st_response)){

                    if($data_col=='36'){
                      $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $na);
                      $num++;
                    }

                  } else {
                    
                    $query = $this->Report->data_type_first_level($id_ticket_find);
                    if ($query->num_rows() >0){ 
                        foreach ($query->result() as $data) {
                            $type = $data->type_state;
                            $type_1st_date = $data->created_date;
                        }

                        $query = $this->Report->data_type_new_level($id_ticket_find);
                        if ($query->num_rows() >0){ 
                            foreach ($query->result() as $data) {
                                $type = $data->type_state;
                                $type_new_date = $data->created_date;
                            }
                        }


                        $query = $this->Report->data_1st_level($type_new_date,$type_1st_date,$id_ticket_find);
                        if ($query->num_rows() >0){ 
                            foreach ($query->result() as $data) {
                              //var_dump($data);
                                $TOTAL_HARI = $data->HARI;
                                $TOTAL_JAM = $data->JAM;
                                $TOTAL_MINIT = $data->MINIT;
                                $seconds = $data->minit;
                                

                            }
                            
                            $get_escalation_1st_response = $get_escalation_1st_response*60;

                            //var_dump($get_escalation_1st_response); exit();
                            $seconds = $get_escalation_1st_response-$seconds;

                            $hours = floor($seconds / 3600);
                            $minutes = floor(($seconds / 60) % 60);
                            $seconds = $seconds % 60;

                            //$first_response =  $hours.' : '.$minutes.' : '.$seconds;
                            $first_response =  $hours.' : '.$minutes;


                            if($data_col=='36'){
                              $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $first_response);
                              $num++;
                            }
                        }

                    }

                  }


                /*
                  $get_escalation_solution_time=$this->Report->get_escalation_solution_time($sla);
                  if(empty($get_escalation_solution_time)){
                    if($data_col=='37'){
                      $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $na);
                      $num++;
                    }
                  } else {

                    $query = $this->Report->data_working_time($id_ticket_find);
                    if ($query->num_rows() >0){ 
                        foreach ($query->result() as $data) {
                            $working_time_closed = $data->working_time_closed;

                            $hours='';
                            $minutes='';
                            $seconds='';

                            list($h, $m, $s) = explode(':', $working_time_closed);
                            $working_time_closed = ($h * 3600) + ($m * 60) + $s;
                            //$str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $working_time_closed);
                            //sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);
                            //$working_time_closed = $hours * 3600 + $minutes * 60 + $seconds;
                        }
                        //var_dump($get_escalation_solution_time); exit();
                        $get_escalation_solution_time = $get_escalation_solution_time*60;
                        $seconds = $get_escalation_solution_time-$working_time_closed;
                        
                        //$solution_time = $seconds;

                        $hours = floor($seconds / 3600);
                        $minutes = floor(($seconds / 60) % 60);
                        $seconds = $seconds % 60;

                        $solution_time =  $hours.' : '.$minutes.' : '.$seconds;

                        //var_dump($solution_time); exit();
                        if($data_col=='37'){
                          $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $solution_time);
                          $num++;
                        }
                    }

                  }
                  */
                  
                  
                  /* Start Daripada Sini */
                  $get_escalation_solution_time=$this->Report->get_escalation_solution_time($sla);
                  if(empty($get_escalation_solution_time)){
                    if($data_col=='37'){
                      $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $na);
                      $num++;
                    }
                  } else {

                    $query = $this->Report->data_working_time($id_ticket_find);
                    if ($query->num_rows() >0){ 
                        foreach ($query->result() as $data) {
                            $working_time_closed = $data->working_time_closed;

                            $hours='';
                            $minutes='';
                            $seconds='';

                            list($h, $m, $s) = explode(':', $working_time_closed);
                            $working_time_closed = (floatval($h) * 3600) + (floatval($m) * 60) + floatval($s);
                            //$str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $working_time_closed);
                            //sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);
                            //$working_time_closed = $hours * 3600 + $minutes * 60 + $seconds;
                        }
                        //var_dump($get_escalation_solution_time); exit();
                        $get_escalation_solution_time = $get_escalation_solution_time*60;
                        $seconds = $get_escalation_solution_time-$working_time_closed;
                        
                        //$solution_time = $seconds;

                        $hours = floor($seconds / 3600);
                        $minutes = floor(($seconds / 60) % 60);
                        $seconds = $seconds % 60;

                        //$solution_time =  $hours.' : '.$minutes.' : '.$seconds;
                        $solution_time =  $hours.' : '.$minutes;

                        //var_dump($solution_time); exit();
                        if($data_col=='37'){
                          $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $solution_time);
                          $num++;
                        }
                    }

                  }
                  /* Habis sini*/


                  $datetime1 = new DateTime($Report_Date_Start);
                  $datetime2 = new DateTime($Report_Date_End);
                  $days = $datetime2->diff($datetime1)->format('%a');

                  $get_total_time_ticket=$this->Report->get_total_time_ticket($id_ticket_find);
                  if(empty($get_total_time_ticket))
                  {
                    if($data_col=='38'){
                      $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $na);
                      $num++;
                    }
                    
                    if($data_col=='39'){
                      $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $na);
                      $num++;
                    }
                    
                  } else {
                    
                    /* Start Daripada Sini */
                    list($h, $m, $s) = explode(':', $get_total_time_ticket);
                    $get_total_time_ticket = (floatval($h) * 3600) + (floatval($m) * 60) + floatval($s);
                    
                    $ttt = floor($get_total_time_ticket / 60);
                    $day = (60*24*$days);
                    $formula1 = ($ttt/$day);
                    $result = (1-$formula1)*100;
                    
                    $percen = (1-$formula1)*100;
                    $percen = round($percen,2); 
                    /* SINI */
                    //var_dump($result); exit();
                    
                    //var_dump($percen); exit();
                    
                    
                    // list($h, $m, $s) = explode(':', $get_total_time_ticket);
                    // $get_total_time_ticket = ($h * 3600) + ($m * 60) + $s;
                
                    // $ttt = floor(($get_total_time_ticket / 60) % 60);
                    // $day = (60*24*$days);
                    // $formula1 = ($ttt/$day);
                    // $result = (1-$formula1)*100;
                    
                    // $percen = (1-$formula1)*100;
                    // $percen = round($percen,2); 
                    
                    

                    $breach = $this->Report->getBreach($sla);
                    //var_dump($breach); 
                    
                    if(empty($breach)){
                      if($data_col=='38'){
                        $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $na);
                        $num++;
                      }
                    } else {

                      if($result>$breach){
                        $result='Not Applicable';
                      } else if($result<$breach){
                        $result='Breach';
                      } else {
                        $result='Not Applicable';
                      }

                      if($data_col=='38'){
                        $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $result);
                        $num++;
                      }
                    }
                    
                    if($data_col=='39'){
                      $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $percen);
                      $num++;
                    }

                  }
                   // exit();

                  if($data_col=='40'){
                    $nodata = '';
                    $object->getActiveSheet()->setCellValueByColumnAndRow($num, $excel_row, $nodata);
                    $num++;
                  }
                  
                }
                

                if($num=='21'){
                  $num=0;
                } 
                  

                $excel_row++;
              }
          }


      }

      $rand = rand();

      $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="tracker_'.$rand.'.xls"');
      //ob_end_clean();
      //ob_start();
      $object_writer->save('php://output');



    }


    function Statistic_Register()
    {
      $Report_Type = $this->input->post('Report_Type');
      $Statistic_Start_Date = $this->input->post('Statistic_Start_Date');
      $Statistic_End_Date = $this->input->post('Statistic_End_Date');
      $Report_Id_Ticket = $this->input->post('Report_Id_Ticket');
      $Report_Name = $this->input->post('Report_Name');
      $Report_Description = $this->input->post('Report_Description');
      $Report_ID = $this->input->post('Report_ID');

      $updateBy = $this->session->userdata('userid'); // id yang login system
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i:s");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $datetime = $dateReg.' '.$timeReg; //current date 

      $id_group = $this->input->post('id_group');

      $data = array(
                      "report_type"=>$Report_Type,
                      "report_title"=>$Report_Name,
                      "report_description"=>$Report_Description,
                      "report_id"=>$Report_ID,
                      "created_by"=>$updateBy,
                      "created_date"=>$datetime,
                      "start_date"=>$Statistic_Start_Date,
                      "end_date"=>$Statistic_End_Date
                   );
      $ReportInfo = $this->Report->ReportInfo($data);
      $access_group = $this->Report->access_group($id_group,$Report_ID);

      //redirect('report/test_piejs');
      //$this->test_piejs();

    }


    function data_statistic_circuit_fault_report($img,$Report_ID)
    {
      $rand = rand();
      header("Content-type: application/vnd.ms-word");
      header("Content-Disposition: attachment;Filename=report_".$rand.".doc");
      
      echo  '
                <html>
                <head>
                    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
                    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">
                    <style>
                        h2{
                            text-align: center
                        }
                        .mytable{
                            border:1px solid black; 
                            border-collapse: collapse;
                            width: 100%;
                        }
                        .mytable tr th, .mytable tr td{
                            border:1px solid black; 
                            padding: 5px 10px;
                        }
                    </style>
                </head>
                <body>
            ';

      echo '<center>';
      echo '<img src="'.base_url().'asset/nexquadrant_tm.png" width="40px">';
      $this->Report->data_statistic_circuit_fault_report($Report_ID);
      echo $img;
      //$this->test_piejs();
      echo '</center>';
      


      echo '</body> </html>';

    }

    function x()
    {

      $folderPath = "./upload_ticket/";

      $img = $this->input->post('imgBase64');

      $image_parts = explode(";base64,", $img);

      $image_type_aux = explode("image/", $image_parts[0]);

      $image_type = $image_type_aux[1];

      $image_base64 = base64_decode($image_parts[1]);

      $img = uniqid() . '.png';
      $file = $folderPath.$img;



      file_put_contents($file, $image_base64);


      echo base_url()."upload_ticket/".$img;

      $id = $this->input->post('Report_ID');

      $name = base_url()."upload_ticket/".$img;
      $data = array('Report_ID'=>$id,"name"=>$name);
      $this->Report->saveCanvas($data);

    }


    function statistic_backup_line()
    {
      $this->load->view('template/body/Report/statistic_backup_line');
    }


    function data_statistic_circuit_fault_report_backup_line($img,$Report_ID)
    {
      $rand = rand();
      header("Content-type: application/vnd.ms-word");
      header("Content-Disposition: attachment;Filename=report_".$rand.".doc");
      
      echo  '
                <html>
                <head>
                    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
                    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">
                    <style>
                        h2{
                            text-align: center
                        }
                        .mytable{
                            border:1px solid black; 
                            border-collapse: collapse;
                            width: 100%;
                        }
                        .mytable tr th, .mytable tr td{
                            border:1px solid black; 
                            padding: 5px 10px;
                        }
                    </style>
                </head>
                <body>
            ';

      echo '<center>';
      echo '<img src="'.base_url().'asset/nexquadrant_tm.png" width="40px">';
      $this->Visual->data_statistic_circuit_fault_report_backup_line($Report_ID);
      echo $img;
      //$this->test_piejs();
      echo '</center>';
      


      echo '</body> </html>';

    }

    function data_number_of_occurerence($img,$Report_ID)
    {
      $rand = rand();
      header("Content-type: application/vnd.ms-word");
      header("Content-Disposition: attachment;Filename=report_".$rand.".doc");
      
      echo  '
                <html>
                <head>
                    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
                    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">
                    <style>
                        h2{
                            text-align: center
                        }
                        .mytable{
                            border:1px solid black; 
                            border-collapse: collapse;
                            width: 100%;
                        }
                        .mytable tr th, .mytable tr td{
                            border:1px solid black; 
                            padding: 5px 10px;
                        }
                    </style>
                </head>
                <body>
            ';

      echo '<center>';
      echo '<img src="'.base_url().'asset/nexquadrant_tm.png" width="40px">';
      $this->Report->data_number_of_occurerence($Report_ID);
      echo $img;
      //$this->test_piejs();
      echo '</center>';
      


      echo '</body> </html>';

    }


    function data_total_hours($img,$Report_ID)
    {
      $rand = rand();
      header("Content-type: application/vnd.ms-word");
      header("Content-Disposition: attachment;Filename=report_".$rand.".doc");
      
      echo  '
                <html>
                <head>
                    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
                    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">
                    <style>
                        h2{
                            text-align: center
                        }
                        .mytable{
                            border:1px solid black; 
                            border-collapse: collapse;
                            width: 100%;
                        }
                        .mytable tr th, .mytable tr td{
                            border:1px solid black; 
                            padding: 5px 10px;
                        }
                    </style>
                </head>
                <body>
            ';

      echo '<center>';
      echo '<img src="'.base_url().'asset/nexquadrant_tm.png" width="40px">';
      $this->Report->data_total_hours($Report_ID);
      echo $img;
      //$this->test_piejs();
      echo '</center>';
      


      echo '</body> </html>';

    }



    function number_of_occurence_outage()
    {
      $this->load->view('template/body/Report/number_of_occurence_outage');
    }


    function total_hours_of_outage()
    {
      $this->load->view('template/body/Report/total_hours_of_outage');
    }

    function combine_report()
    {
      $rand = rand();
      header("Content-type: application/vnd.ms-word");
      header("Content-Disposition: attachment;Filename=report_".$rand.".doc");
      
      echo  '
                <html>
                <head>
                    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
                    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">
                    <style>
                        h2{
                            text-align: center
                        }
                        .mytable{
                            border:1px solid black; 
                            border-collapse: collapse;
                            width: 100%;
                        }
                        .mytable tr th, .mytable tr td{
                            border:1px solid black; 
                            padding: 5px 10px;
                        }
                    </style>
                </head>
                <body>
            ';

      $id = $this->input->post('id_report');

      $total = count($id);
      $start = 1;
      foreach($id as $data) {
        echo '<img src="'.base_url().'asset/nexquadrant_tm.png" width="40px">';
        $type = $this->Report->getReport_Type($data);
        $report = $this->get_one_by_one_report($data,$type);

        if($start==$total){

        } else {
          echo '<br style="page-break-before: always">';
        }
        

        $start++;
      }

      


      echo '</body> </html>';
      
    }


    function get_one_by_one_report($id,$type)
    {
      if($type=='3'){ // Statistic Of Circuit Fault Report
        $get_img = $this->Report->ImgCanvas($id,$type);
        $this->data_statistic_circuit_fault_report2($get_img,$id);
      } else if($type=='4'){ //Statistic Of Backup Line
        $get_img = $this->Report->ImgCanvas($id,$type);
        $this->data_statistic_circuit_fault_report_backup_line2($get_img,$id);
      } else if($type=='5'){ //Number Of Occurence Outage
        $get_img = $this->Report->ImgCanvas($id,$type);
        $this->data_number_of_occurerence2($get_img,$id);
      } else if($type=='6'){ // Total Hour Outage
        $get_img = $this->Report->ImgCanvas($id,$type);
        $this->data_number_of_occurerence2($get_img,$id);
      } 
    }


    function data_statistic_circuit_fault_report2($img,$Report_ID)
    {
      echo '<br><center>';
      $this->Report->data_statistic_circuit_fault_report($Report_ID);
      echo $img;
      //$this->test_piejs();
      echo '</center>';
    }

    function data_statistic_circuit_fault_report_backup_line2($img,$Report_ID)
    {
      echo '<br><center>';
      $this->Report->data_statistic_circuit_fault_report_backup_line($Report_ID);
      echo $img;
      //$this->test_piejs();
      echo '</center>';
    }

    function data_number_of_occurerence2($img,$Report_ID)
    {
      echo '<br><center>';
      $this->Report->data_number_of_occurerence($Report_ID);
      echo $img;
      //$this->test_piejs();
      echo '</center>';
    }


    function data_statistic_circuit_fault_report_visual($img,$Report_ID)
    {
      $rand = rand();
      header("Content-type: application/vnd.ms-word");
      header("Content-Disposition: attachment;Filename=report_".$rand.".doc");
      
      echo  '
                <html>
                <head>
                    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
                    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">
                    <style>
                        h2{
                            text-align: center
                        }
                        .mytable{
                            border:1px solid black; 
                            border-collapse: collapse;
                            width: 100%;
                        }
                        .mytable tr th, .mytable tr td{
                            border:1px solid black; 
                            padding: 5px 10px;
                        }
                    </style>
                </head>
                <body>
            ';

      echo '<center>';
      echo '<img src="'.base_url().'asset/nexquadrant_tm.png" width="40px">';
      $this->Visual->data_statistic_circuit_fault_report($Report_ID);
      echo $img;
      //$this->test_piejs();
      echo '</center>';
      


      echo '</body> </html>';

    }


    function hospital()
    {

      $id_report_hosp = $this->input->post('id_report_hosp');
      $id_title_hosp = $this->input->post('id_title_hosp');
      $start_report_hosp = $this->input->post('start_report_hosp');
      $end_report_hosp = $this->input->post('end_report_hosp');


      $updateBy = $this->session->userdata('userid'); // id yang login system
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("H:i:s");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $datetime = $dateReg.' '.$timeReg; //current date 

      $type_act = 'Generated Report Type '.$id_report_hosp;
      $data = array('type_activities'=>$type_act,'created_by'=>$updateBy,'created_datetime'=>$datetime);
      $this->Report->log_activities_report($data);


      if($id_report_hosp=='6'){
        $this->hospital_report_sla($start_report_hosp,$end_report_hosp);
      } else {
        $this->hospital_report_same($start_report_hosp,$end_report_hosp,$id_report_hosp);
      }

    }


    function hospital_report_same($start_report_hosp,$end_report_hosp,$id_report_hosp)
    {
      ini_set('max_execution_time', 0);

      $this->load->library("excel");
      $object = new PHPExcel();
      $object->setActiveSheetIndex(0);


      $title = "Non Compliance SLA Incident Log";
      $object->getActiveSheet()->setTitle($title);
          
      $object->getActiveSheet()->setCellValue('A1', 'Issue Log Information');
      $object->getActiveSheet()->getStyle('A1')->getFont()->setSize(10);
      $object->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
      $object->getActiveSheet()->mergeCells('A1:G1');
      $object->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


      $object->getActiveSheet()->setCellValue('H1', 'Solution Information');
      $object->getActiveSheet()->getStyle('H1')->getFont()->setSize(10);
      $object->getActiveSheet()->getStyle('H1')->getFont()->setBold(true);
      $object->getActiveSheet()->mergeCells('H1:L1');
      $object->getActiveSheet()->getStyle('H1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


      $table_columns = array(
                              "Date", 
                              "Report By", 
                              "Location", 
                              "Ticket Number",
                              "Device No", 
                              "Problem Detail",
                              "Log Severity",
                              "Category(Sub-Category)",
                              "Solution Date",
                              "Status",
                              "Elapsed Time",
                              "Solution",
                              "Resolve"
                            );

      $column = 0;

      foreach($table_columns as $field)
      {
         $object->getActiveSheet()->setCellValueByColumnAndRow($column, 3, $field);
         $column++;
      }

      $excel_row = 4;
      $query = $this->Report->hospital_report_same($start_report_hosp,$end_report_hosp,$id_report_hosp);

      if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {

              $id_ticket = $data->id_ticket;

              $query = $this->Report->hospital_report_same_by_id($start_report_hosp,$end_report_hosp,$id_ticket,$id_report_hosp);
                  if ($query->num_rows() >0){ 
                      $x = 0;
                      $date_previous = '';
                      foreach ($query->result() as $data) {

                          //var_dump($data); exit();

                          $date_issue = $data->date_issue;
                          $id_ticket = $data->id_ticket;
                          $id_ticket_remember = $data->id_ticket;



                          $date = $data->date_issue;
                          $report_by = $data->report_by;
                          $location = $data->location;
                          $device_no = $data->device_no;

                          $problem_detail = $data->problem_detail;
                          $problem_detail = strip_tags($problem_detail);
                          $log_severity = $data->log_severity;
                          $subcat = $data->subcat;
                          $solution_date = $data->solution_date;
                          $status = $data->status;
                          $solution = $data->solution;
                          $solution = strip_tags($solution);
                          $responsibilty = $data->responsibility;

                          if($x==0){

                          } else {
                            $date = '';
                            $id_ticket = '';
                            //$solution_date = '';
                            $report_by = '';
                            $location = '';
                            $device_no = '';
                            $problem_detail = '';
                            $subcat = '';
                            $log_severity = '';
                          }

                          $report_by = $this->data_5($report_by);


                          if($status=='New'){
                            $date_diff= '00:00:00';
                          } else {
                            $start = new DateTime($date_previous);
                            $end = new DateTime($solution_date);

                            //var_dump($end);
                            $diff=date_diff($end,$start);
                            $difference = $start->diff($end);
                            $h=$difference->h; 
                            $i=$difference->i;
                            $s=$difference->s;

                            if($h<10){$h='0'.$h;}
                            if($i<10){$i='0'.$i;}
                            if($s<10){$s='0'.$s;}

                            $date_diff = $h.':'.$i.':'.$s;
                          }



                          $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $date);
                          $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $report_by);
                          $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $location);
                          $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $id_ticket);
                          $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $device_no);
                          $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $problem_detail);
                          $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $log_severity);
                          $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $subcat);
                          $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $solution_date);
                          $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $status);
                          $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $date_diff);
                          $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $solution);
                          $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $responsibilty);

                          $excel_row++;


                          $x++;


                          $date_previous = $solution_date;

                      }

                  }

            }
      }

      $rand = rand();
      $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="report5_'.$rand.'.xls"');
      header('Cache-Control: max-age=0');
      //ob_end_clean();
      //ob_start();
      $object_writer->save('php://output');

    }



    function hospital_report_sla($start_report_hosp,$end_report_hosp)
    {
      ini_set('max_execution_time', 0);

      $this->load->library("excel");
      $object = new PHPExcel();
      $object->setActiveSheetIndex(0);


      $title = "Non Compliance SLA Incident Log";
      $object->getActiveSheet()->setTitle($title);
          
      $object->getActiveSheet()->setCellValue('A1', 'Issue Log Information');
      $object->getActiveSheet()->getStyle('A1')->getFont()->setSize(10);
      $object->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
      $object->getActiveSheet()->mergeCells('A1:G1');
      $object->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


      $object->getActiveSheet()->setCellValue('H1', 'Solution Information');
      $object->getActiveSheet()->getStyle('H1')->getFont()->setSize(10);
      $object->getActiveSheet()->getStyle('H1')->getFont()->setBold(true);
      $object->getActiveSheet()->mergeCells('H1:L1');
      $object->getActiveSheet()->getStyle('H1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


      $table_columns = array(
                              "Date", 
                              "Report By", 
                              "Location", 
                              "Ticket Number",
                              "Device No", 
                              "Problem Detail",
                              "Log Severity",
                              "Category(Sub-Category)",
                              "Solution Date",
                              "Status",
                              "Elapsed Time",
                              "Non-compliant Period (dy:hr:mm:ss)",
                              "Solution",
                              "Resolve"
                            );

      $column = 0;

      foreach($table_columns as $field)
      {
         $object->getActiveSheet()->setCellValueByColumnAndRow($column, 3, $field);
         $column++;
      }

      $excel_row = 4;

      $query = $this->Report->hospital_report_sla($start_report_hosp,$end_report_hosp);

      if ($query->num_rows() >0){ 

            $id_ticket_listen = '';

            foreach ($query->result() as $data) {

              $date_issue = $data->date_issue;
              $id_ticket = $data->id_ticket;
              $severity = $data->severity;
              $close_date = $data->solution_date;
              $status = $data->status;

              if($status=='Resolved'){
                $check = $this->check_hit_sla($id_ticket,$date_issue,$close_date,$severity);
                if(!empty($check)){
                  
                  $total = $check;
                  $query = $this->Report->hospital_report_sla_by_id($start_report_hosp,$end_report_hosp,$id_ticket);
                  if ($query->num_rows() >0){ 
                      $x = 0;
                      $date_previous = '';
                      foreach ($query->result() as $data) {

                          $date_issue = $data->date_issue;
                          $close_date = $data->close_date;
                          $id_ticket = $data->id_ticket;
                          $id_ticket_remember = $data->id_ticket;
                          $severity = $data->severity;


                          $date = $data->date_issue;
                          $report_by = $data->report_by;
                          $location = $data->location;
                          $device_no = $data->device_no;

                          $problem_detail = $data->problem_detail;
                          $problem_detail = strip_tags($problem_detail);
                          $log_severity = $data->log_severity;
                          $subcat = $data->subcat;
                          $solution_date = $data->solution_date;
                          $status = $data->status;
                          $solution = $data->solution;
                          $solution = strip_tags($solution);
                          $responsibilty = $data->responsibility;

                          if($x==0){

                          } else {
                            $date = '';
                            $id_ticket = '';
                            //$solution_date = '';
                            $report_by = '';
                            $location = '';
                            $device_no = '';
                            $problem_detail = '';
                            $subcat = '';
                            $log_severity = '';
                          }

                          $report_by = $this->data_5($report_by);


                          if($status=='Resolved'){
                            $total_view = $total;
                          } else {
                            $total_view = '';
                          }
                          // echo $date.'-';
                          // echo $id_ticket.'-';
                          
                          // echo $solution_date.'-';
                          // echo $status.'-';
                          // echo $total_view.'-';

                          // echo '<br><br>';


                          if($status=='New'){
                            $date_diff= '00:00:00';
                          } else {
                            $start = new DateTime($date_previous);
                            $end = new DateTime($solution_date);

                            //var_dump($end);
                            $diff=date_diff($end,$start);
                            $difference = $start->diff($end);
                            $h=$difference->h; 
                            $i=$difference->i;
                            $s=$difference->s;

                            if($h<10){$h='0'.$h;}
                            if($i<10){$i='0'.$i;}
                            if($s<10){$s='0'.$s;}

                            $date_diff = $h.':'.$i.':'.$s;
                          }



                          $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $date);
                          $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $report_by);
                          $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $location);
                          $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $id_ticket);
                          $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $device_no);
                          $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $problem_detail);
                          $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $log_severity);
                          $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $subcat);
                          $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $solution_date);
                          $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $status);
                          $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $date_diff);
                          $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $total_view);
                          $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $solution);
                          $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $responsibilty);

                          $excel_row++;


                          $x++;


                          $date_previous = $solution_date;

                      }

                  }


                }
              }
              

            }
      }
        

      $rand = rand();
      $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="report6_'.$rand.'.xls"');
      header('Cache-Control: max-age=0');
      //ob_end_clean();
      //ob_start();
      $object_writer->save('php://output');

    }


    function check_hit_sla($id_ticket,$date_issue,$close_date,$severity)
    {
      $total_time = $this->Report->get_total_minute($date_issue,$close_date,$id_ticket);
      if($total_time>$severity){ // hit
        $diff_sla_time = $total_time - $severity;
        $seconds = $diff_sla_time * 60;
        $total = $this->secondsToTime($seconds);
      } else {
        $total = '';
      }

      return $total;
    }

    function secondsToTime($seconds) {
        $dtF = new \DateTime('@0');
        $dtT = new \DateTime("@$seconds");
        return $dtF->diff($dtT)->format('%a : %h : %i : %s ');
    }


    function show_sla_report($id_ticket,$date,$status,$total)
    {

    }
  


    function data_1()
    {
        $query = $this->Report->data_1();
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {

              // echo '<pre>';
              // var_dump($data);
              // echo '</pre>';

              $id_ticket = $data->id_ticket;
              $provider_ref = $data->provider_ref;
              $first_name = $data->first_name;
              $location = $data->location;
              $ref_no = $data->ref_no;
              $main_status = $data->main_status;
              $backup_type = $data->backup_type;
              $backup_status = $data->backup_status;
              $current_state = $data->current_state;
              $created_date = $data->created_date;
              $created_by = $data->created_by;

              $severity = $data->severity;
              
              $this->data_2($severity); //severity
              $this->data_3($id_ticket); //parent note
              $this->data_4($id_ticket); // child note
              $this->data_5($created_by); // agent
            }

        }
    }


    function data_2($severity)
    {
        $query = $this->Report->data_2($severity);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {

            }
        }
    }


    function data_3($id_ticket)
    {
        $query = $this->Report->data_3($id_ticket);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
             
            }
        }
    }


    function data_4($id_ticket)
    {
        $query = $this->Report->data_4($id_ticket);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              // echo '<pre>';
              // var_dump($data);
              // echo '</pre>';
            }
        }
    }

    function data_5($created_by)
    {
        $query = $this->Report->data_5($created_by);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              // echo '<pre>';
              // var_dump($data);
              // echo '</pre>';
              return $data->first_name;
            }
        }
    }


    function xdata()
    {

      $this->load->library("excel");
      $object = new PHPExcel();

      $object->setActiveSheetIndex(0);


      $object->getActiveSheet()->setTitle('All Hardware Incident Log');
      
      $object->getActiveSheet()->setCellValue('A1', 'Issue Log Information');
      $object->getActiveSheet()->getStyle('A1')->getFont()->setSize(10);
      $object->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
      $object->getActiveSheet()->mergeCells('A1:G1');
      $object->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


      $object->getActiveSheet()->setCellValue('H1', 'Solution Information');
      $object->getActiveSheet()->getStyle('H1')->getFont()->setSize(10);
      $object->getActiveSheet()->getStyle('H1')->getFont()->setBold(true);
      $object->getActiveSheet()->mergeCells('H1:L1');
      $object->getActiveSheet()->getStyle('H1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


      $table_columns = array(
                              "Date", 
                              "Report By", 
                              "Location", 
                              "Ticket Number",
                              "Device No", 
                              "Problem Detail",
                              "Log Severity",
                              "Category(Sub-Category)",
                              "Solution Date",
                              "Status",
                              "Elapsed Time",
                              "Solution",
                              "Resolve"
                            );

      $column = 0;

      foreach($table_columns as $field)
      {
         $object->getActiveSheet()->setCellValueByColumnAndRow($column, 3, $field);
         $column++;
      }


      $query = $this->Report->data_test();


      $excel_row = 2;


      $date_diff = '';
      $start_elapsed = '';
      $ticket_no_duplicate = '';
      if ($query->num_rows() >0){ 
          foreach ($query->result() as $data) {

            //var_dump($data); exit();

            $date = $data->date_issue;
            $report_by = $data->report_by;
            $location = $data->location;
            $device_no = $data->device_no;
            $device_no_different = $data->device_no;
            $id_ticket = $data->id_ticket;
            $ticket_no_different = $data->id_ticket;
            $problem_detail = $data->problem_detail;
            $problem_detail = strip_tags($problem_detail);
            $log_severity = $data->log_severity;
            $subcat = $data->subcat;
            $solution_date = $data->solution_date;
            $status = $data->status;
            $solution = $data->solution;
            $solution = strip_tags($solution);
            $responsibilty = $data->responsibility;


            if($ticket_no_duplicate==$ticket_no_different){
              // $date = '';
              // $report_by = '';
              // $location = '';
              // $problem_detail = '';
              // $log_severity = '';
              // $subcat = '';
              // $device_no = '';
              // $id_ticket = '';


              $start = new DateTime($start_elapsed);
              $end = new DateTime($solution_date);

              //var_dump($end);
              $diff=date_diff($end,$start);
              $difference = $start->diff($end);
              $h=$difference->h; 
              $i=$difference->i;
              $s=$difference->s;

              if($h<10){$h='0'.$h;}
              if($i<10){$i='0'.$i;}
              if($s<10){$s='0'.$s;}

              $date_diff = $h.':'.$i.':'.$s;
              //var_dump($date_diff); exit();

              // $start = strtotime($start_elapsed); // old date 
              // $end = strtotime($solution_date);

              // $date_diff = $end - $start;

              //echo'<pre>';var_dump($diff);echo '</pre>'; exit();

            } else {
              $start = '';
              $end = '';
              $start_elapsed = '';
              $date_diff = '';
            }


            if($status=='New'){
              $date_diff= '00:00:00';
              $elapsed='00:00:00';

            } else {
              $elapsed = '';
            }

            $report_by = $this->data_5($report_by);

            //var_dump($excel_row); exit();

            // echo 'Ticket No : '.$id_ticket.' | Sol Date :'.$solution_date.' | Status | '.$status.' | Elapsed Time : '.$date_diff;
            // echo '<br><br>';

            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $date);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $report_by);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $location);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $id_ticket);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $device_no);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $problem_detail);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $log_severity);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $subcat);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $solution_date);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $status);
            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $date_diff);
            $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $solution);
            $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $responsibilty);

            $excel_row++;



            $ticket_no_duplicate = $ticket_no_different;

            if($ticket_no_duplicate==$id_ticket){
              $start_elapsed = $solution_date;
              $date_diff='';
            } else {
              $start_elapsed = '';
              $date_diff='';
            }

          }
      }


      $rand = rand();

      $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="report_'.$rand.'.xls"');
      //ob_end_clean();
      //ob_start();
      $object_writer->save('php://output');

    }


    public function Report_Search()
    {
        if((!empty($this->session->userdata('logged_in'))))
        {
          $this->data['site_title'] = 'Register_Report';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Report_Search/Report_Search',$this->data);
          $this->load->view('template/footer/footer');
        } else { 
          $this->load->view('login');
        }
    }

    function generated_report_search()
    {


      $ticket_number = $this->input->post('ticket_number');
      $date1 = $this->input->post('date1');
      $date2 = $this->input->post('date2');
      $subject = $this->input->post('subject');
      $responsible = $this->input->post('responsible');
      $current_state = $this->input->post('current_state');
      $category = $this->input->post('category');

      $query = $this->Report->generated_report_search($ticket_number,$date1,$date2,$subject,$responsible,$current_state,$category);

      
      

      $this->load->library("excel");
      $object = new PHPExcel();

      $object->setActiveSheetIndex(0);

      $table_columns = array( "Ticket ID", 
                              "Current Status", 
                              "Category Ticket", 
                              "ITSM Category", 
                              "Problem Description",
                              "Date Created",
                              "Created By",
                              "Responsibility",
                              "Owner",
                              "Customer Name",
                              "Customer Email",
                              "Location",
                              "SLA",
                              "Subject",
                              "Type Ticket",
                              "Queu",
                              "Parent Note",
                              "Note",
                              "Type State",
                              "Date Note Created",
                              "Note Created By",
                              "Ticket Closed Responsibility",
                              "Action Taken",
                              "Note Closed",
                              "Problem Description",
                              "Fault Type",
                              "Total Time Closed",
                              "Working Time Closed",
                              "Closed By",
                              "Closed date"
                            ); // 27

      $column = 0;

      foreach($table_columns as $field)
      {
         $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
         $column++;
      }

      $excel_row = 2;

      $object->getActiveSheet()->getStyle('A1:AD1')->getFont()->setBold(true);

      $data = 'No Data';
      $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(18, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(19, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(20, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(21, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(22, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(23, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(24, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(25, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(26, $excel_row, $data);
      $object->getActiveSheet()->setCellValueByColumnAndRow(27, $excel_row, $data);

      $rand = rand();



      if ($query->num_rows() >0){ 
          
          $id_ticket_hold='';
          $compare = '';
          foreach ($query->result() as $data) {
              
              $compare = $id_ticket_hold;
              $id_ticket = $data->id_ticket;
              $id_ticket_hold = $id_ticket;


              $ticket_id = $data->id_ticket;
              if(empty($ticket_id)){
                $ticket_id = 'NA';
              }

              $current_state = $data->current_state;
              if(empty($current_state)){
                $current_state = 'NA';
              }

              $category = $data->category;
              if(empty($category)){
                $category = 'NA';
              }

              $fault_itsm_category = $data->fault_itsm_category;
              if(empty($fault_itsm_category)){
                $fault_itsm_category = 'NA';
              }

              $problem_desc_itsm = $data->problem_desc_itsm;
              if(empty($ticket_id)){
                $problem_desc_itsm = 'NA';
              }

              $start_date = $data->start_date;
              if(empty($start_date)){
                $start_date = 'NA';
              }

              $created_ticket_by = $data->created_ticket_by;
              $created_ticket_by = $this->get_name_agent($created_ticket_by);
              //var_dump($created_ticket_by); exit();
              if(empty($created_ticket_by)){
                $created_ticket_by = 'NA';
              }


              $get_customer_name = $this->get_customer_name($ticket_id);
              if(empty($get_customer_name)){
                $get_customer_name = 'NA';
              }


              $get_customer_email= $this->get_customer_email($ticket_id);
              if(empty($get_customer_email)){
                $get_customer_email = 'NA';
              }


              $ticket_responsibilty = $data->ticket_responsibilty;
              if(empty($ticket_responsibilty)){
                $ticket_responsibilty = 'NA';
              }

              $ticket_owner = $data->ticket_owner;
              if(empty($ticket_owner)){
                $ticket_owner = 'NA';
              }


              $location = $data->location;
              if(empty($location)){
                $location = 'NA';
              }


              $sla = $data->sla;
              if(empty($sla)){
                $sla = 'NA';
              }


              $title = $data->title;
              if(empty($title)){
                $title = 'NA';
              }


              $type = $data->type;
              if(empty($type)){
                $type = 'NA';
              }

              $queu = $data->queu;
              if(empty($queu)){
                $queu = 'NA';
              }

              $note_editor = $data->note_editor;
              $note_editor = strip_tags($note_editor);
              $note_editor = substr($note_editor,0,110);

              if(empty($note_editor)){
                $note_editor = 'NA';
              }

              $type_state = $data->type_state;
              if(empty($type_state)){
                $type_state = 'NA';
              }

              $date_note = $data->date_note;
              if(empty($date_note)){
                $date_note = 'NA';
              }

              $created_note_by = $data->created_note_by;
              $created_note_by = $this->get_name_agent($created_note_by);
              if(empty($created_note_by)){
                $created_note_by = 'NA';
              }

              $created_note_by = $data->created_note_by;
              $created_note_by = $this->get_name_agent($created_note_by);
              if(empty($created_note_by)){
                $created_note_by = 'NA';
              }

              $responsibility = $data->responsibility;
              if(empty($responsibility)){
                $responsibility = 'NA';
              }

              $action_taken = $data->action_taken;
              $action_taken = strip_tags($action_taken);
              $action_taken = substr($action_taken,0,110);

              if(empty($action_taken)){
                $action_taken = 'NA';
              }

              $note_closed = $data->note_closed;
              $note_closed = strip_tags($note_closed);
              $note_closed = substr($note_closed,0,110);

              if(empty($note_closed)){
                $note_closed = 'NA';
              }

              $Problem = $data->Problem;
              if(empty($Problem)){
                $Problem = 'NA';
              }

              $Fault_Type = $data->Fault_Type;
              if(empty($Fault_Type)){
                $Fault_Type = 'NA';
              }

              $total_time_closed = $data->total_time_closed;
              if(empty($total_time_closed)){
                $total_time_closed = 'NA';
              }

              $working_time_closed = $data->working_time_closed;
              if(empty($working_time_closed)){
                $working_time_closed = 'NA';
              }

              $closed_by = $data->closed_by;
              $closed_by = $this->get_name_agent($closed_by);
              if(empty($closed_by)){
                $closed_by = 'NA';
              }

              $closed_date = $data->closed_date;
              if(empty($closed_date)){
                $closed_date = 'NA';
              }

              $parent_editor = $data->parent_editor;
              $parent_editor = strip_tags($parent_editor);
              $parent_editor = substr($parent_editor,0,110);
              if(empty($parent_editor)){
                $parent_editor = 'NA';
              }



              if($id_ticket_hold==$compare){
                //echo $id_ticket." sama <br>";

                $ticket_id = '';
                $current_state = '';
                $category = '';
                $fault_itsm_category = '';
                $problem_desc_itsm = '';
                $start_date = '';
                $created_ticket_by = '';
                $ticket_responsibilty = '';
                $ticket_owner = '';
                $location = '';
                $sla = '';
                $title = '';
                $type = '';
                $queu = ''; 
                $parent_editor = '';
                
                $get_customer_name = '';
                $get_customer_email = '';


                // $responsibility = '';
                // $action_taken = '';
                // $note_closed = '';
                // $Problem = '';
                // $Fault_Type = '';
                // $total_time_closed = '';
                // $working_time_closed = '';
                // $closed_by = '';
                // $closed_date = '';





              } else {
                //echo $id_ticket.' xsama <br>';
              }



              if($type_state=='Resolved'){

              } else {
                $responsibility = '';
                $action_taken = '';
                $note_closed = '';
                $Problem = '';
                $Fault_Type = '';
                $total_time_closed = '';
                $working_time_closed = '';
                $closed_by = '';
                $closed_date = '';
              }


              $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $ticket_id);
              $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $current_state);
              $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $category);
              $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $fault_itsm_category);
              $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $problem_desc_itsm);
              $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $start_date);
              $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $created_ticket_by);
              $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $ticket_responsibilty);
              $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $ticket_owner);
              $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $get_customer_name);
              $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $get_customer_email);
              $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $location);
              $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $sla);
              $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $title);
              $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $type);
              $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $queu);
              $object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $parent_editor);
              $object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, $note_editor);
              $object->getActiveSheet()->setCellValueByColumnAndRow(18, $excel_row, $type_state);
              $object->getActiveSheet()->setCellValueByColumnAndRow(19, $excel_row, $date_note);
              $object->getActiveSheet()->setCellValueByColumnAndRow(20, $excel_row, $created_note_by);
              $object->getActiveSheet()->setCellValueByColumnAndRow(21, $excel_row, $responsibility);
              $object->getActiveSheet()->setCellValueByColumnAndRow(22, $excel_row, $action_taken);
              $object->getActiveSheet()->setCellValueByColumnAndRow(23, $excel_row, $note_closed);
              $object->getActiveSheet()->setCellValueByColumnAndRow(24, $excel_row, $Problem);
              $object->getActiveSheet()->setCellValueByColumnAndRow(25, $excel_row, $Fault_Type);
              $object->getActiveSheet()->setCellValueByColumnAndRow(26, $excel_row, $total_time_closed);
              $object->getActiveSheet()->setCellValueByColumnAndRow(27, $excel_row, $working_time_closed);
              $object->getActiveSheet()->setCellValueByColumnAndRow(28, $excel_row, $closed_by);
              $object->getActiveSheet()->setCellValueByColumnAndRow(29, $excel_row, $closed_date);


              $excel_row++;
          }

      }


      $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="tracker_'.$rand.'.xls"');
      //ob_end_clean();
      //ob_start();
      $object_writer->save('php://output');
    }

    function get_name_agent($id)
    {
      return $this->Report->get_name_agent($id);
    }

    function get_customer_name($id)
    {
      return $this->Report->get_customer_name($id);
    }

    function get_customer_email($id)
    {
      return $this->Report->get_customer_email($id);
    }



    function report_v3()
    {
      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Report',$idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Report_hsel/main',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

    }
}
 	

 	