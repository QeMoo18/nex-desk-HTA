<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Analytic_model extends CI_Model
{
	  function __construct()
	  {
		    // Call the Model constructor
		    parent::__construct();
		    $this->db2 = $this->load->database('otrs', TRUE);
		    $this->datatables->set_database('otrs');
	  }

	  function analytic_ticket_realtime()
	  {

    	date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date 




        $label = '';
        $val_new = '';
        $val_open = '';
        $val_pending = '';
        $val_closed = '';
        $val_master = '';
        $combine = '';

        $datetime = date("Y-m-d H:i:s",strtotime("-210 minutes", strtotime($datetime)));

        for($i=0;$i<7;$i++){
        	$datetime = date("Y-m-d H:i:s",strtotime("+30 minutes", strtotime($datetime)));
        	$previous = date("Y-m-d H:i:s",strtotime("+30 minutes", strtotime($datetime)));
        	$time = substr($datetime, 11);

        	if($i==6){
        		$select = "SELECT COUNT(*) AS NEW FROM td_register_ticket WHERE status_ticket='new' AND created_date <= '$datetime'";
        	} else {
        		$select = "SELECT COUNT(*) AS NEW FROM td_register_ticket WHERE status_ticket='new' AND (created_date >= '$datetime' AND created_date <= '$previous')";
        	}




	    	$query = $this->db->query($select);
	    	
	        if ($query->num_rows() >0){ 
	        	foreach ($query->result() as $data) {
	            	$new = $data->NEW;
	            }

	            $val_new .= "'".$new."',";
	        }


	    	if($i==6){
        		$select = "SELECT COUNT(*) AS OPEN FROM td_register_ticket WHERE status_ticket='open' AND created_date <= '$datetime'";
        	} else {
        		$select = "SELECT COUNT(*) AS OPEN FROM td_register_ticket WHERE status_ticket='open' AND (created_date >= '$datetime' AND created_date <= '$previous')";
        	}

	    	$query = $this->db->query($select);
	    	
	        if ($query->num_rows() >0){ 
	        	foreach ($query->result() as $data) {
	            	$open = $data->OPEN;
	            }
	            $val_open .= "'".$open."',";
	        }

	        if($i==6){
        		$select = "SELECT COUNT(*) AS PENDING FROM td_register_ticket WHERE status_ticket='pending' AND created_date <= '$datetime'";
        	} else {
        		$select = "SELECT COUNT(*) AS PENDING FROM td_register_ticket WHERE status_ticket='pending' AND (created_date >= '$datetime' AND created_date <= '$previous')";
        	}

	    	$query = $this->db->query($select);
	    	
	        if ($query->num_rows() >0){ 
	        	foreach ($query->result() as $data) {
	            	$pending = $data->PENDING;
	            }
	            $val_pending .= "'".$pending."',";
	        }

	        if($i==6){
        		$select = "SELECT COUNT(*) AS CLOSED FROM td_register_ticket WHERE status_ticket='closed' AND created_date <= '$datetime'";
        	} else {
        		$select = "SELECT COUNT(*) AS CLOSED FROM td_register_ticket WHERE status_ticket='closed' AND (created_date >= '$datetime' AND created_date <= '$previous')";
        	}



	    	$query = $this->db->query($select);
	    	
	        if ($query->num_rows() >0){ 
	        	foreach ($query->result() as $data) {
	            	$closed = $data->CLOSED;
	            }
	            $val_closed .= "'".$closed."',";
	        }



	        if($i==6){
        		$select = "SELECT COUNT(*) AS MASTER FROM ms_register_ticket WHERE created_date <= '$datetime' AND status_ticket !='closed'";
        	} else {
        		$select = "SELECT COUNT(*) AS MASTER FROM ms_register_ticket WHERE (created_date >= '$datetime' AND created_date <= '$previous') AND status_ticket !='closed'";
        	}



	    	$query = $this->db->query($select);
	    	
	        if ($query->num_rows() >0){ 
	        	foreach ($query->result() as $data) {
	            	$master = $data->MASTER;
	            }
	            $val_master .= "'".$master."',";
	        }


	        $label .= "'".$time."',";
        }

        $val_new_trim = rtrim($val_new,',');
        $val_open_trim = rtrim($val_open,',');
        $val_pending_trim = rtrim($val_pending,',');
        $val_closed_trim = rtrim($val_closed,',');
        $val_master_trim = rtrim($val_master,',');


    	$label_trim = rtrim($label,',');


        echo "
        		<canvas id='speedChart'></canvas>
        		<script>
        		var speedCanvas = document.getElementById('speedChart');

                Chart.defaults.global.defaultFontFamily = 'Lato';
                Chart.defaults.global.defaultFontSize = 18;

        		var dataFirst = {
				    label: 'New Ticket',
				    data: [".$val_new_trim."],
				    lineTension: 0.3,
				    fill: false,
				    borderColor: 'red',
				    backgroundColor: 'red',
				    pointBorderColor: 'red',
				    pointBackgroundColor: 'lightgreen',
				    pointRadius: 5,
				    pointHoverRadius: 15,
				    pointHitRadius: 30,
				    pointBorderWidth: 2,
				    pointStyle: 'rect'
				  };

				var dataSecond = {
				    label: 'Open Ticket',
				    data: [".$val_open_trim."],
				    lineTension: 0.3,
				    fill: false,
				    borderColor: 'orange',
				    backgroundColor: 'orange',
				    pointBorderColor: 'orange',
				    pointBackgroundColor: 'lightgreen',
				    pointRadius: 5,
				    pointHoverRadius: 15,
				    pointHitRadius: 30,
				    pointBorderWidth: 2
				  };

				var dataThird = {
				    label: 'Pending Ticket',
				    data: [".$val_pending_trim."],
				    lineTension: 0.3,
				    fill: false,
				    borderColor: 'brown',
				    backgroundColor: 'brown',
				    pointBorderColor: 'brown',
				    pointBackgroundColor: 'lightgreen',
				    pointRadius: 5,
				    pointHoverRadius: 15,
				    pointHitRadius: 30,
				    pointBorderWidth: 2
				  };

				var dataFourth = {
				    label: 'Closed Ticket',
				    data: [".$val_closed_trim."],
				    lineTension: 0.3,
				    fill: false,
				    borderColor: 'purple',
				    backgroundColor: 'purple',
				    pointBorderColor: 'purple',
				    pointBackgroundColor: 'lightgreen',
				    pointRadius: 5,
				    pointHoverRadius: 15,
				    pointHitRadius: 30,
				    pointBorderWidth: 2
				  };


				var dataFive = {
				    label: 'Master Ticket',
				    data: [".$val_master_trim."],
				    lineTension: 0.3,
				    fill: false,
				    borderColor: 'grey',
				    backgroundColor: 'grey',
				    pointBorderColor: 'grey',
				    pointBackgroundColor: 'lightgreen',
				    pointRadius: 5,
				    pointHoverRadius: 15,
				    pointHitRadius: 30,
				    pointBorderWidth: 2
				  };


				var xData = {
				  labels: [".$label_trim."],
				  datasets: [dataFirst, dataSecond,dataThird,dataFourth,dataFive]
				};

				var chartOptions = {
                  legend: {
                    display: true,
                    position: 'top',
                    labels: {
                      boxWidth: 80,
                      fontColor: 'black'
                    }
                  }
                };

                var lineChart = new Chart(speedCanvas, {
                  type: 'line',
                  data: xData,
                  options: chartOptions
                });
                </script>
        	 ";

    }
}