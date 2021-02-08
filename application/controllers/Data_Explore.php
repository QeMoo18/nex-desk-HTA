<?php
defined('BASEPATH') OR exit('No direct script access allowed');//ob_clean();
class Data_Explore extends CI_Controller  
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

  function json_computer()
  {
    $query = '
                SELECT COUNT(*), created_date , category 
                FROM td_register_ticket 
                WHERE category="COMPUTER"
                GROUP BY CAST(created_date AS DATE) , category
             ';

    $data = $this->db->query($query);

    echo json_encode($data);

  }

  function jsonx()
  {


    header("Content-Type: application/json");
    // $this->db->select('COUNT(*) AS total, created_date , category');
    // $this->db->from('td_register_ticket');
    // $this->db->where('category',"COMPUTER");
    // $this->db->group_by('CAST(created_date AS DATE), category');
    #$data = $this->db->get();

    $select = '
                SELECT COUNT(*) AS TOTAL, CAST(created_date AS DATE) as created_date , category 
                FROM td_register_ticket 
                WHERE category="COMPUTER"
                GROUP BY CAST(created_date AS DATE) , category
             ';

    $query= $this->db->query($select);
 
    $total = '';
    $date = '';
    echo'[';
    foreach ($query->result() as $data) {
      // $y[] = $data->created_date;
      // $x[] = $data->TOTAL;
      // $result[] = array("created_date" =>$data->created_date);

      $date .= "'".$data->created_date."',";
      $total .= $data->TOTAL.",";
    }
    echo '{"created_date":"' . $date.'"},';
    echo']';


    
    echo '[{"total":"'.$total.'"},]';

    #var_dump(json_encode($result));

    #$data = json_encode($query->result());

    #var_dump($data);

  }


  function json_apriori()
  {
    $select = " 
                  SELECT 
                  MAX(CASE WHEN problem_desc_itsm = 'Cerner-Powerchat' THEN 'Cerner-Powerchat' END) 'C1' ,
                  MAX(CASE WHEN problem_desc_itsm = 'Other' THEN 'Other' END) 'C2',
                  MAX(CASE WHEN problem_desc_itsm = 'PACS' THEN 'PACS' END) 'C3',
                  MAX(CASE WHEN problem_desc_itsm = 'Workstation' THEN 'Workstation' END) 'C4',
                  MAX(CASE WHEN problem_desc_itsm = 'Add_Printer' THEN 'Add_Printer' END) 'C5',
                  MAX(CASE WHEN problem_desc_itsm = 'Domain' THEN 'Domain' END) 'C6',
                  MAX(CASE WHEN problem_desc_itsm = 'Printer' THEN 'Printer' END) 'C7'
                  FROM `td_register_ticket`
                  GROUP BY CAST(created_date AS DATE)


                ";

    $query= $this->db->query($select);

    foreach ($query->result() as $data) {
      $C1 = $data->C1;
      $C2 = $data->C2;
      $C3 = $data->C3;
      $C4 = $data->C4;
      $C5 = $data->C5;
      $C6 = $data->C6;
      $C7 = $data->C7;

      echo '[';
      if(!empty($C1)){echo '"'.$C1.'",';};
      if(!empty($C2)){echo '"'.$C2.'",';};
      if(!empty($C3)){echo '"'.$C3.'",';};
      if(!empty($C4)){echo '"'.$C4.'",';};
      if(!empty($C5)){echo '"'.$C5.'",';};
      if(!empty($C6)){echo '"'.$C6.'",';};
      if(!empty($C7)){echo '"'.$C7.'",';};
      echo "''";
      echo '],';
      echo '<br>';

    }

  }

}