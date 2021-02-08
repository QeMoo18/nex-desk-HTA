<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CMDB_model extends CI_Model
{
	  function __construct()
	  {
		    // Call the Model constructor
		    parent::__construct();
		    $this->db2 = $this->load->database('otrs', TRUE);
		    $this->datatables->set_database('otrs');
	  }

	  function Dtable_CMDB_Computer_ViewList()
	  {	
	  		$where = "name, deployment_state, incident_state, changed, created, other_id";

		  	$this->datatables->select($where);
			$this->datatables->from("computer");	
			$this->datatables->where("validity !=","Deleted");
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }

	  function cmdb_computer_add($data)
	  {
	  		$this->db2->insert("computer",$data);
	  }

	  function cmdb_computer_details($other_id)
	  {
	  		$select="SELECT * FROM `computer` WHERE other_id='$other_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
	  }


	  /* START HARDWARE */
	  function cmdb_hardware_add($data)
	  {
	  		$this->db2->insert("hardware",$data);
	  }

	  function Dtable_CMDB_Hardware_ViewList()
	  {
	  		$where = "name, deployment_state, incident_state, changed, created, other_id";

		  	$this->datatables->select($where);
			$this->datatables->from("hardware");	
            $this->datatables->where("validity !=","Deleted");	
			$this->db->order_by("created", "desc");
            $this->datatables->group_by("name");
			return $this->datatables->generate();
	  }

	  function cmdb_hardware_details($other_id)
	  {
	  		$select="SELECT * FROM `hardware` WHERE other_id='$other_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
	  }
	  /* END */

	  /* SOFTWARE */
	  function cmdb_software_add($data)
	  {
	  	 	$this->db2->insert('software',$data);
	  }

	  function Dtable_CMDB_Software_ViewList()
	  {
	  		$where = "name, deployment_state, incident_state, changed, created, other_id";

		  	$this->datatables->select($where);
			$this->datatables->from("software");		
			$this->db->order_by("created", "desc");
            $this->datatables->where("validity !=","Deleted");
            $this->datatables->group_by("name");
			return $this->datatables->generate();
	  }

	  function cmdb_software_details($other_id)
	  {
	  		$select="SELECT * FROM `software` WHERE other_id='$other_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
	  }
	  /* END */

	  /* NETWORK */
	  function cmdb_network_addnet($data)
	  {
	  		$this->db2->insert('network',$data);
	  }

	  function Dtable_CMDB_Network_ViewList()
	  {
	  		$where = "name, deployment_state as deployment_state, incident_state, changed, created, other_id,description";

		  	$this->datatables->select($where);
			$this->datatables->from("network");		
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }

	  function cmdb_network_details($other_id)
	  {
	  		$select="SELECT * FROM `network` WHERE other_id='$other_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
	  }
	  /* END */

	  /* LOCATION */
	  function cmdb_location_addloc($data)
	  {
	  		$this->db2->insert('location',$data);
	  }

	  function Dtable_CMDB_Location_ViewList()
	  {
	  		$where = "name, deployment_state, incident_state, changed, created, other_id";

		  	$this->datatables->select($where);
			$this->datatables->from("location");		
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }

	  function cmdb_location_details($other_id)
	  {
	  		$select="SELECT * FROM `location` WHERE other_id='$other_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
	  }
	  /* END */

	  function cmdb_register_link($data)
	  {
	  		$this->db->insert('cmdb_register_link',$data);
	  }

	  function cmdb_link_location($auto_id,$Link_ITSM_Cat,$Link_Location)
	  {

		foreach($Link_Location as $x) {
			//Location_ID = Other_ID 
			$id_link = rand();
			$data = array("RegisterID"=>$auto_id,"Category"=>$Link_ITSM_Cat,"Location_ID"=>$x,"Row_ID"=>$id_link);
			$this->db->insert('cmdb_link_location',$data);
		}
	  }
	  
	  function cmdb_link_status($data,$auto_id)
	  {
	  	$this->db->where("RegisterID",$auto_id);
	  	$this->db->update("cmdb_register_link",$data);
	  }

	  function Dtable_CMDB_Location_ViewList_Network()
	  {
		  	$where = "name, location, other_id";
		  	$this->datatables->select($where);
			$this->datatables->from("network");		
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }
	  function Dtable_CMDB_Location_ViewList_Computer()
	  {
	  		$where = "name, location, other_id";
		  	$this->datatables->select($where);
			$this->datatables->from("computer");		
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();			
	  }
	  function Dtable_CMDB_Location_ViewList_Hardware()
	  {
	  		$where = "name, location, other_id";
		  	$this->datatables->select($where);
			$this->datatables->from("hardware");		
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }
	  function Dtable_CMDB_Location_ViewList_Software()
	  {
	  		$where = "name, location, other_id";
		  	$this->datatables->select($where);
			$this->datatables->from("software");		
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }

	  function check_itsm_location($auto_id)
	  {
	  		$where = "SELECT COUNT(*) AS TOTAL FROM cmdb_link_location_itsm WHERE Link_ID='$auto_id'";
			$query = $this->db2->query($where);
			if ($query->num_rows() >0){ 
			    foreach ($query->result() as $data) {
			    	return $data->TOTAL;
			    }
			} else {
				return '0';
			}
	  }

	  function itsm_location_update($Link_Location,$auto_id,$Link_ITSM_Cat)
	  {
		$myArray = array();
		foreach ($Link_Location as $x) {
			$id = $x;
			// first add new if not exist
			$select = "SELECT COUNT(*) AS TOTAL FROM cmdb_link_location_itsm WHERE Location_ID='$x' AND 	Link_ID='$auto_id'";
			$query= $this->db->query($select);
	        if ($query->num_rows() >0){
	        	foreach ($query->result() as $data) {
	        		$total = $data->TOTAL;
	        		if($total>0){

	        		} else {
	        			$data = array("CAT"=>$Link_ITSM_Cat,"Link_ID"=>$auto_id,"Location_ID"=>$x,"Validity"=>"Valid");
						$this->db->insert("cmdb_link_location_itsm",$data);

						$updateBy = $this->session->userdata('userid');
				        date_default_timezone_set("Asia/Kuala_Lumpur");
				        $timeReg =date("h:i:s");
				        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
				        $datetime = $dateReg.' '.$timeReg;

						$where = $this->db->where("RegisterID",$auto_id);
						$data = array("CAT"=>$Link_ITSM_Cat,"Changed"=>$datetime,"UpdateBy"=>$updateBy);
						$this->db->update("cmdb_register_link",$data);
	        		}
	        	}
	        }


			 $myArray[] = $x;
		}	
		$where_in = implode( ', ', $myArray );
		//exit();
		
		//second 
			$select = "SELECT Location_ID FROM cmdb_link_location_itsm WHERE  Location_ID NOT IN ($where_in) AND Link_ID='$auto_id'";
			$query= $this->db->query($select);
	        if ($query->num_rows() >0){
	            foreach ($query->result() as $data) {
	            	$sla_not_in = $data->location_id;
	            	$data = array("Validity"=>"Invalid");
	            	$where = $this->db->where("Location_ID",$sla_not_in);
	            	$this->db->update("cmdb_link_location_itsm",$data);

	            	$updateBy = $this->session->userdata('userid');
			        date_default_timezone_set("Asia/Kuala_Lumpur");
			        $timeReg =date("h:i:s");
			        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
			        $datetime = $dateReg.' '.$timeReg;

					$where = $this->db->where("RegisterID",$auto_id);
					$data = array("CAT"=>$Link_ITSM_Cat,"Changed"=>$datetime,"UpdateBy"=>$updateBy);
					$this->db->update("cmdb_register_link",$data);
	            }
	        } 
	    //update if not tick
	}

	  function itsm_location_add($Link_Location,$auto_id,$Link_ITSM_Cat)
	  {
	  		foreach ($Link_Location as $x) {
		  		$data = array("CAT"=>$Link_ITSM_Cat,"Link_ID"=>$auto_id,"Location_ID"=>$x,"Validity"=>"Valid");
				$this->db->insert("cmdb_link_location_itsm",$data);

				$where = $this->db->where("RegisterID",$auto_id);
				$data = array("CAT"=>$Link_ITSM_Cat);
				$this->db->update("cmdb_register_link",$data);
			}
	  }

	  function Dtable_CMDB_ITSM_ViewList()
	  {
	  		$where = "customer.customerID AS CustomerID, service.service AS Service, 	sla.sla AS SLA, cmdb_register_link.CAT, cmdb_register_link.Created, cmdb_register_link.Changed, cmdb_register_link.RegisterID,cmdb_register_link.Status";
		  	$this->datatables->select($where);
			$this->datatables->from("cmdb_register_link");
			$this->datatables->join('customer', 'customer.other_id = cmdb_register_link.CustomerID', 'left');
			$this->datatables->join('service', 'service.service_generated_id = cmdb_register_link.Service', 'left');
			$this->datatables->join('sla', 'sla.sla_id = cmdb_register_link.SLA', 'left');

			$this->datatables->where('cmdb_register_link.Status','Valid');

			$this->db->order_by("id", "desc");
			
            //$this->datatables->group_by("customer.customerID");
			return $this->datatables->generate();
	  }

	  function cmdb_register_link_data($id)
	  {
	  		$select = "SELECT * FROM cmdb_register_link WHERE RegisterID='$id'";
	  		$query= $this->db->query($select);
	        if ($query->num_rows() >0){ 
	            foreach ($query->result() as $data) {
	                # code...
	                $result[] = $data;

	            }
	        //var_dump($result); exit();
	        return $result; //hasil dari semua proses ada dimari
	        } 
	  }

	  function check_list_itsm_loc($RegisterID)
	  {
	  		$getData = "SELECT Location_ID FROM cmdb_link_location WHERE RegisterID='$RegisterID'";
			$query= $this->db->query($getData);
	        if ($query->num_rows() >0){ 
	        	//echo $id;
	            foreach ($query->result() as $data) {
	                # code...
	                //echo $id;
	                $result[] = $data;

	            }
	        //var_dump($result); exit();
	        return $result; //hasil dari semua proses ada dimari
	        } 
	  }


	  function cmdb_get_custID($id)
	  {
	  		$CustomerID = '';

	  		$select = "SELECT * FROM cmdb_register_link WHERE RegisterID='$id'";
			$query= $this->db->query($select);
	        if ($query->num_rows() >0){
	        	
	        	foreach ($query->result() as $data) {
	        		$CustomerID = $data->CustomerID;

	        	}
	        	echo $CustomerID;
	       	}
	  }
}
  