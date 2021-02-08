<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Report_Visual_model extends CI_Model
{
	function __construct()
	{
	    // Call the Model constructor
	    parent::__construct();
	    $this->db = $this->load->database('otrs', TRUE);
	    $this->datatables->set_database('otrs');
	}
  

	/* Statistic OFf Circuit Fault Report */
	function data_statistic_circuit_fault_report($Report_ID)
    {
        $select = "
                    SELECT * FROM report_register WHERE id='$Report_ID' 
                  ";

        
            $query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
                $start_date = $data->start_date;
                $mula = date("d-m-Y", strtotime($start_date));
                $end_date = $data->end_date;
                $tamat = date("d-m-Y", strtotime($end_date));
            }
        }


        echo '
                <h2> Statistic Of Circuit Fault Report </h2>
                <p> Below are the statistics of service downtime from <br> '.$mula.' until '.$tamat.' </p>
                <table class="mytable" border="1px solid">
                  <tr>
                    <th><center>Fault Category Portion</center></th>
                    <th><center>Cause Of Fault</center></th>
                    <th><center>TRs</center></th>
                    <th><center>Percentage%</center></th>
                  </tr>
             ';



        $select = "
                    SELECT distinct(a.name) FROM faulty_category_portion as a
                    LEFT JOIN td_ticket_closed as b ON a.name =  b.Portion
                    LEFT JOIN td_register_ticket as c ON b.id_ticket = c.id_ticket
                    LEFT JOIN network as d ON c.ref_no = d.ps_no
                    WHERE a.validity='valid' AND (b.created_date BETWEEN '$start_date' AND '$end_date') AND d.ps_no IS NOT NULL
                  ";
        


        
        
        $query = $this->db->query($select);
        
        $Jum = 0;
        $Jum2 = 0;
        $Jum_x = $this->total_data_fault_report($Report_ID);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
                $name = $data->name;
                //echo $name.'<br>';
                $span = $this->get_rowspan_cof($name,$start_date,$end_date);
                echo '<tr>';
                echo '<td rowspan="'.$span.'"><center>'.$name.'</center></td>';


                $select =   "
                                SELECT COUNT(a.cause_of_fault) as Total FROM td_ticket_closed  as a
                                LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
                                LEFT JOIN network as c ON b.ref_no = c.ps_no
                                WHERE (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.ps_no IS NOT NULL
                            ";
                            
                

                $query = $this->db->query($select);
            
                if ($query->num_rows() >0){ 
                    foreach ($query->result() as $data) {
                        $Total = $data->Total;
                     }
                }
                
                
                
                
                
                

                // data list 
                $select =   "
                                SELECT DISTINCT(a.cause_of_fault) FROM td_ticket_closed as a
                                LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
                                LEFT JOIN network as c ON b.ref_no = c.ps_no 
                                WHERE a.Portion='$name' AND (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.ps_no IS NOT NULL
                            ";
                

                
                $query = $this->db->query($select);
                
                if ($query->num_rows() >0){ 
                    foreach ($query->result() as $data) {
                        $cause_of_fault = $data->cause_of_fault;
                        //echo $Fault_Type.' - ';
                        echo '<td><center>'.$cause_of_fault.'</center></td>';

                        $select =   "
                                        SELECT a.cause_of_fault,COUNT(*) AS Total_Fault FROM td_ticket_closed as a
                                        LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
                                        LEFT JOIN network as c ON b.ref_no = c.ps_no
                                        WHERE a.cause_of_fault='$cause_of_fault' AND a.Portion='$name' AND (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.ps_no IS NOT NULL
                                        GROUP BY a.cause_of_fault
                                    "; 
                        //echo $select;

                        $query = $this->db->query($select);
                        
                        if ($query->num_rows() >0){ 
                            
                            foreach ($query->result() as $data) {
                                $Total_Fault = $data->Total_Fault;
                                
                                //echo $Total_Fault.'-';
                                echo '<td><center>'.$Total_Fault.'</center></td>';

                                $Value = $Total_Fault * 100 / $Jum_x;
                                //echo '<br>'.$Value.'='.$Total_Fault.'* 100 /'.$Jum_x;
                                $Value = round($Value, 1);
                                echo '<td><center>'.$Value.'</center></td>';
                                echo '<tr>';
                                //echo $Value.'<br>';
                                
                                $Jum += $Total_Fault;
                                
                                $Jum2 += $Value;
                                $Jum2 = round($Jum2, 1);
                            }
                            
                           // var_dump($Jum);
                            
                           
                        }
                        
                        


                    }
                }
                
            }

            $Jum2 = round($Jum2, 0, PHP_ROUND_HALF_UP);
            
            echo '<tr><td colspan="2"> <center> TOTAL </center> <td> <center>'.$Jum.'</center> </td> <td> <center>'.$Jum2.'</center> </td> </tr>';

            echo '</table>';
        }
    }

    function get_rowspan_cof($name,$start_date,$end_date)
    {
        //$select =     "
                                //SELECT COUNT(Fault_Type) as Total FROM td_ticket_closed Where Portion='$name'
                            //";
                            
        $select = " SELECT * FROM td_ticket_closed as a  
                    LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
                    LEFT JOIN network as c ON b.ref_no = c.ps_no
                    Where a.Portion='$name'  
                    AND (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.ps_no IS NOT NULL
                    GROUP BY a.cause_of_fault";
        //var_dump($select);
        //echo $select;

        $query = $this->db->query($select);
        $i = 0;
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
                //return $Total = $data->Total;
                $i++;
             }
             //var_dump($i);
             return $i;
        }
    }

    function total_data_fault_report($Report_ID)
    {
            $select = "
                    SELECT * FROM report_register WHERE id='$Report_ID'
                  ";

            $query = $this->db->query($select);
        
            if ($query->num_rows() >0){ 
                foreach ($query->result() as $data) {
                    $start_date = $data->start_date;
                    $mula = date("d-m-Y", strtotime($start_date));
                    $end_date = $data->end_date;
                    $tamat = date("d-m-Y", strtotime($end_date));
                }
            }

            $select = "
                        SELECT distinct(a.name) FROM faulty_category_portion as a
                        LEFT JOIN td_ticket_closed as b ON a.name =  b.Portion
                        LEFT JOIN td_register_ticket as c ON b.id_ticket = c.id_ticket
                        LEFT JOIN network as d ON c.ref_no = d.ps_no
                        WHERE a.validity='valid' AND (b.created_date BETWEEN '$start_date' AND '$end_date') AND d.ps_no IS NOT NULL
                      ";
                      
            

            $query = $this->db->query($select);
            
            $Jum = 0;
            $Jum2 = 0;
            $Jum_x = 0;
            if ($query->num_rows() >0){ 
                foreach ($query->result() as $data) {
                    $name = $data->name;
                    //echo $name.'<br>';
                    $span = $this->get_rowspan_cof($name,$start_date,$end_date);
                    //echo '<tr>';
                    //echo '<td rowspan="'.$span.'"><center>'.$name.'</center></td>';


                    $select =   "
                                    SELECT COUNT(a.cause_of_fault) as Total FROM td_ticket_closed  as a
                                    LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
                                    LEFT JOIN network as c ON b.ref_no = c.ps_no
                                    WHERE (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.ps_no IS NOT NULL
                                ";
                                
                    

                    $query = $this->db->query($select);
                
                    if ($query->num_rows() >0){ 
                        foreach ($query->result() as $data) {
                            $Total = $data->Total;
                         }
                    }




                    // total data
                    $select =   "
                                    SELECT DISTINCT(a.cause_of_fault) FROM td_ticket_closed as a
                                    LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
                                    LEFT JOIN network as c ON b.ref_no = c.ps_no 
                                    WHERE a.Portion='$name' AND (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.ps_no IS NOT NULL
                                ";
                    
                    
                    $query = $this->db->query($select);
                    
                    if ($query->num_rows() >0){ 
                        foreach ($query->result() as $data) {
                            $cause_of_fault = $data->cause_of_fault;
                            //echo $Fault_Type.' - ';
                            //echo '<td><center>'.$Fault_Type.'</center></td>';

                            $select =   "
                                            SELECT COUNT(*) AS Total_Fault FROM td_ticket_closed as a
                                            LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
                                            LEFT JOIN network as c ON b.ref_no = c.ps_no
                                            WHERE a.cause_of_fault='$cause_of_fault' AND a.Portion='$name' AND (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.ps_no IS NOT NULL
                                        "; 
                            //echo $select;
                            $query = $this->db->query($select);
                            
                            if ($query->num_rows() >0){ 
                                
                                foreach ($query->result() as $data) {
                                    $Total_Fault = $data->Total_Fault;
                                    
                                    //echo $Total_Fault.'-';
                                    //echo '<td><center>'.$Total_Fault.'</center></td>';

                                    //$Value = $Total_Fault * 100 / $Total;
                                    //$Value = round($Value, 2);
                                    //echo '<td><center>'.$Value.'</center></td>';
                                    //echo '<tr>';
                                    //echo $Value.'<br>';
                                    
                                    $Jum_x += $Total_Fault;
                                    
                                    //$Jum2 += $Value;
                                }
                                
                               // var_dump($Jum_x);
                                
                               
                            }
                            
                            


                        }
                    }


                }
                return $Jum_x;
            } 
    }

    /* END */


    /* Backup Line */
    function data_statistic_circuit_fault_report_backup_line($Report_ID)
    {
        $select = "
                    SELECT * FROM report_register WHERE id='$Report_ID' 
                  ";

        
            $query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
                $start_date = $data->start_date;
                $mula = date("d-m-Y", strtotime($start_date));
                $end_date = $data->end_date;
                $tamat = date("d-m-Y", strtotime($end_date));
            }
        }


        echo '
                <h2> Statistic Of Backup Line </h2>
                <p> Below are the statistics of service downtime from <br> '.$mula.' until '.$tamat.' </p>
                <table class="mytable" border="1px solid">
                  <tr>
                    <th><center>Fault Category Portion</center></th>
                    <th><center>Cause Of Fault</center></th>
                    <th><center>TRs</center></th>
                    <th><center>Percentage%</center></th>
                  </tr>
             ';



        $select = "
                    SELECT distinct(a.name) FROM faulty_category_portion as a
                    LEFT JOIN td_ticket_closed as b ON a.name =  b.Portion
                    LEFT JOIN td_register_ticket as c ON b.id_ticket = c.id_ticket
                    LEFT JOIN network as d ON c.ref_no = d.bs_no
                    WHERE a.validity='valid' AND (b.created_date BETWEEN '$start_date' AND '$end_date') AND d.bs_no IS NOT NULL
                  ";
        


        
        
        $query = $this->db->query($select);
        
        $Jum = 0;
        $Jum2 = 0;
        $Jum_x = $this->total_data_backup_line($Report_ID);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
                $name = $data->name;
                //echo $name.'<br>';
                $span = $this->get_rowspan_backup_line($name,$start_date,$end_date);
                echo '<tr>';
                echo '<td rowspan="'.$span.'"><center>'.$name.'</center></td>';


                $select =   "
                                SELECT COUNT(a.cause_of_fault) as Total FROM td_ticket_closed  as a
                                LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
                                LEFT JOIN network as c ON b.ref_no = c.bs_no
                                WHERE (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.bs_no IS NOT NULL
                            ";
                            
                

                $query = $this->db->query($select);
            
                if ($query->num_rows() >0){ 
                    foreach ($query->result() as $data) {
                        $Total = $data->Total;
                     }
                }
                
                
                
                
                
                

                // data list 
                $select =   "
                                SELECT DISTINCT(a.cause_of_fault) FROM td_ticket_closed as a
                                LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
                                LEFT JOIN network as c ON b.ref_no = c.bs_no 
                                WHERE a.Portion='$name' AND (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.bs_no IS NOT NULL
                            ";
                

                
                $query = $this->db->query($select);
                
                if ($query->num_rows() >0){ 
                    foreach ($query->result() as $data) {
                        $cause_of_fault = $data->cause_of_fault;
                        //echo $Fault_Type.' - ';
                        echo '<td><center>'.$cause_of_fault.'</center></td>';

                        $select =   "
                                        SELECT a.cause_of_fault,COUNT(*) AS Total_Fault FROM td_ticket_closed as a
                                        LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
                                        LEFT JOIN network as c ON b.ref_no = c.bs_no
                                        WHERE a.cause_of_fault='$cause_of_fault' AND a.Portion='$name' AND (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.bs_no IS NOT NULL
                                        GROUP BY a.cause_of_fault
                                    "; 
                        //echo $select;

                        $query = $this->db->query($select);
                        
                        if ($query->num_rows() >0){ 
                            
                            foreach ($query->result() as $data) {
                                $Total_Fault = $data->Total_Fault;
                                
                                //echo $Total_Fault.'-';
                                echo '<td><center>'.$Total_Fault.'</center></td>';

                                $Value = $Total_Fault * 100 / $Jum_x;
                                //echo '<br>'.$Value.'='.$Total_Fault.'* 100 /'.$Jum_x;
                                $Value = round($Value, 1);
                                echo '<td><center>'.$Value.'</center></td>';
                                echo '<tr>';
                                //echo $Value.'<br>';
                                
                                $Jum += $Total_Fault;

                                
                                $Jum2 += $Value;
                                

                            }
                            
                           // var_dump($Jum);
                            
                           
                        }
                        
                        


                    }
                }
                
            }
            
            $Jum2 = round($Jum2, 0, PHP_ROUND_HALF_UP);

            echo '<tr><td colspan="2"> <center> TOTAL </center> <td> <center>'.$Jum.'</center> </td> <td> <center>'.$Jum2.'</center> </td> </tr>';

            echo '</table>';
        }
    }

    function get_rowspan_backup_line($name,$start_date,$end_date)
    {
        //$select =     "
                                //SELECT COUNT(Fault_Type) as Total FROM td_ticket_closed Where Portion='$name'
                            //";
                            
        $select = " SELECT * FROM td_ticket_closed as a  
                    LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
                    LEFT JOIN network as c ON b.ref_no = c.bs_no
                    Where a.Portion='$name'  
                    AND (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.bs_no IS NOT NULL
                    GROUP BY a.cause_of_fault";
        //var_dump($select);
        //echo $select;

        $query = $this->db->query($select);
        $i = 0;
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
                //return $Total = $data->Total;
                $i++;
             }
             //var_dump($i);
             return $i;
        }
    }

    function total_data_backup_line($Report_ID)
    {
            $select = "
                    SELECT * FROM report_register WHERE id='$Report_ID'
                  ";

            $query = $this->db->query($select);
        
            if ($query->num_rows() >0){ 
                foreach ($query->result() as $data) {
                    $start_date = $data->start_date;
                    $mula = date("d-m-Y", strtotime($start_date));
                    $end_date = $data->end_date;
                    $tamat = date("d-m-Y", strtotime($end_date));
                }
            }

            $select = "
                        SELECT distinct(a.name) FROM faulty_category_portion as a
                        LEFT JOIN td_ticket_closed as b ON a.name =  b.Portion
                        LEFT JOIN td_register_ticket as c ON b.id_ticket = c.id_ticket
                        LEFT JOIN network as d ON c.ref_no = d.bs_no
                        WHERE a.validity='valid' AND (b.created_date BETWEEN '$start_date' AND '$end_date') AND d.bs_no IS NOT NULL
                      ";
                      
            

            $query = $this->db->query($select);
            
            $Jum = 0;
            $Jum2 = 0;
            $Jum_x = 0;
            if ($query->num_rows() >0){ 
                foreach ($query->result() as $data) {
                    $name = $data->name;
                    //echo $name.'<br>';
                    $span = $this->get_rowspan_cof($name,$start_date,$end_date);
                    //echo '<tr>';
                    //echo '<td rowspan="'.$span.'"><center>'.$name.'</center></td>';


                    $select =   "
                                    SELECT COUNT(a.cause_of_fault) as Total FROM td_ticket_closed  as a
                                    LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
                                    LEFT JOIN network as c ON b.ref_no = c.bs_no
                                    WHERE (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.bs_no IS NOT NULL
                                ";
                                
                    

                    $query = $this->db->query($select);
                
                    if ($query->num_rows() >0){ 
                        foreach ($query->result() as $data) {
                            $Total = $data->Total;
                         }
                    }




                    // total data
                    $select =   "
                                    SELECT DISTINCT(a.cause_of_fault) FROM td_ticket_closed as a
                                    LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
                                    LEFT JOIN network as c ON b.ref_no = c.bs_no 
                                    WHERE a.Portion='$name' AND (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.bs_no IS NOT NULL
                                ";
                    
                    
                    $query = $this->db->query($select);
                    
                    if ($query->num_rows() >0){ 
                        foreach ($query->result() as $data) {
                            $cause_of_fault = $data->cause_of_fault;
                            //echo $Fault_Type.' - ';
                            //echo '<td><center>'.$Fault_Type.'</center></td>';

                            $select =   "
                                            SELECT COUNT(*) AS Total_Fault FROM td_ticket_closed as a
                                            LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
                                            LEFT JOIN network as c ON b.ref_no = c.bs_no
                                            WHERE a.cause_of_fault='$cause_of_fault' AND a.Portion='$name' AND (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.bs_no IS NOT NULL
                                        "; 
                            //echo $select;
                            $query = $this->db->query($select);
                            
                            if ($query->num_rows() >0){ 
                                
                                foreach ($query->result() as $data) {
                                    $Total_Fault = $data->Total_Fault;
                                    
                                    //echo $Total_Fault.'-';
                                    //echo '<td><center>'.$Total_Fault.'</center></td>';

                                    //$Value = $Total_Fault * 100 / $Total;
                                    //$Value = round($Value, 2);
                                    //echo '<td><center>'.$Value.'</center></td>';
                                    //echo '<tr>';
                                    //echo $Value.'<br>';
                                    
                                    $Jum_x += $Total_Fault;
                                    
                                    //$Jum2 += $Value;
                                }
                                
                               // var_dump($Jum_x);
                                
                               
                            }
                            
                            


                        }
                    }


                }
                return $Jum_x;
            } 
    }
    /* END */
}