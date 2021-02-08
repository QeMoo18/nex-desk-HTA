<?php if ( ! defined('BASEPATH')) exit('No direct script 
   access allowed');

   class Test_model extends CI_Model
  {
	  function __construct()
	  {
	    // Call the Model constructor
	    parent::__construct();
	    $this->db2 = $this->load->database('otrs', TRUE);
	  }

	  function TestDB2()
	  {
	  	$query = $this->db2->get('user_role');
        return $query->result(); 
	  }



	  function schedule()
	  {
	  	$date = date('Y-m-d');
	  	//$this->db2->where('date_schedule',$date);
	  	$query = $this->db2->get('net_send_reschedule');
        return $query->result(); 
	  }


	  function json_data()
	  {
		$result = '';
		$date = date('d/m/Y');
        $where = "	SELECT * FROM net_send_reschedule
        			WHERE date_schedule = '$date'
        		 ";

        $query = $this->db2->query($where);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
                $result[] = $data;
            }
        }

        return $result;
	}

	function all_computer()
	{
			$where = "SELECT * FROM computer";
		$query = $this->db2->query($where);
		if ($query->num_rows() >0){ 

			echo '
					var json = [
			     ';

		    foreach ($query->result() as $data) {
		    	$name = $data->name;
		    	$deployment_state = $data->deployment_state;
		    	$incident_state = $data->incident_state;

		    	echo '
		    			{
		    				"name":"'.$name.'",
		    				"deployment_state":"'.$deployment_state.'",
		    				"incident_state":"'.$incident_state.'",
		    				"hostname":"'.$name.'"
		    			},
		    		 ';
		    }

		    echo '
		    		]
		    		
		    	 ';

		} else {
			return '';
		}
	}

  }
  