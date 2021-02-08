<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Report_model extends CI_Model
{
	  function __construct()
	  {
		    // Call the Model constructor
		    parent::__construct();
		    $this->db = $this->load->database('otrs', TRUE);
		    $this->datatables->set_database('otrs');
	  }
  

	  function RFO_Data()
	  {
	  		$data = $this->db->query("SELECT * from test_graph");
			return $data->result();
	  }

	  function Select_ID_By_location($location)
	  {
	  		$this->db->distinct();
	    	$this->db->select('a.id_ticket as id_ticket, b.title as title');
			$this->db->from('td_register_ticket as a');
			$this->db->where('a.location',$location);
			$this->db->join('td_parent_note as b', 'b.id_ticket = a.id_ticket', 'left');
			$query= $this->db->get();

	        if ($query->num_rows() >0){
	        	foreach ($query->result() as $data) {
					//var_dump($query);
					$select = '<option value="'.$data->id_ticket.'">'.$data->id_ticket.' - '.$data->title.'</option>';
					echo $select;
				}
			}
	  }

	function RFO_Template_Data($id_ticket)
	{
		$select = "	SELECT * FROM td_register_ticket as a
					LEFT JOIN  agent as b ON b.userid = a.created_by
					WHERE a.id_ticket ='$id_ticket'
				  ";
		$query = $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	          	$location = $data->location;
	          	$created_date = $data->created_date;
	          	$custID = $data->custID;
	          	$provider_ref = $data->provider_ref;
	          	$first_name = $data->first_name;

	          	echo 'location : '.$location.'<br>';
	          	echo 'created_date :'.$created_date.'<br>';
	          	echo 'first_name : '.$first_name.'<br>';
	          	echo 'custID : '.$custID.'<br>';
	          	echo 'provider_ref : '.$provider_ref.'<br><br>';



	          	// CMDB 
	          	$category = $data->category;
	          	$ref_no = $data->ref_no;
	          	if($category=='Network')
	          	{
	          		
	          		$id = '';

	          		//find by lv_no
	          		$select = "
								SELECT lv_no,ps_no,bs_no,dq_no,service_number
		              			FROM network
		    					WHERE lv_no = '$ref_no'
							  ";

					$query = $this->db->query($select);
		        
			        if ($query->num_rows() >0){ 
			            foreach ($query->result() as $data) {
			              $lv_no = $data->lv_no;
			              $ps_no = $data->ps_no;
			              $bs_no = $data->bs_no;
			              $dq_no = $data->dq_no;
			              $service_number = $data->service_number;

			              $id = 'Lv No : '.$lv_no.'<br>Primary Service No : '.$ps_no.'<br>Backup Service No : '.$bs_no.'<br>DQ No : '.$dq_no.'<br>Service No : '.$service_number;
			            }
			        }

			        //echo $select;

			        //find by ps_no
			        if(empty($id)){

			        	$select = "
									SELECT lv_no,ps_no,bs_no,dq_no,service_number
			              			FROM network
			    					WHERE ps_no = '$ref_no'
								  ";

						$query = $this->db->query($select);
			        
				        if ($query->num_rows() >0){ 
				            foreach ($query->result() as $data) {
				              $lv_no = $data->lv_no;
				              $ps_no = $data->ps_no;
				              $bs_no = $data->bs_no;
				              $dq_no = $data->dq_no;
				              $service_number = $data->service_number;

				              $id = 'Lv No : '.$lv_no.'<br>Primary Service No : '.$ps_no.'<br>Backup Service No : '.$bs_no.'<br>DQ No : '.$dq_no.'<br>Service No : '.$service_number;
				            }
				        }
			        }



			        //find by bs_no
			        if(empty($id)){

			        	$select = "
									SELECT lv_no,ps_no,bs_no,dq_no,service_number
			              			FROM network
			    					WHERE bs_no = '$ref_no'
								  ";

						$query = $this->db->query($select);
			        
				        if ($query->num_rows() >0){ 
				            foreach ($query->result() as $data) {
				              $lv_no = $data->lv_no;
				              $ps_no = $data->ps_no;
				              $bs_no = $data->bs_no;
				              $dq_no = $data->dq_no;
				              $service_number = $data->service_number;

				              $id = 'Lv No : '.$lv_no.'<br>Primary Service No : '.$ps_no.'<br>Backup Service No : '.$bs_no.'<br>DQ No : '.$dq_no.'<br>Service No : '.$service_number;
				            }
				        }
			        }



			        //find by dq_no
			        if(empty($id)){

			        	$select = "
									SELECT lv_no,ps_no,bs_no,dq_no,service_number
			              			FROM network
			    					WHERE dq_no = '$ref_no'
								  ";

						$query = $this->db->query($select);
			        
				        if ($query->num_rows() >0){ 
				            foreach ($query->result() as $data) {
				              $lv_no = $data->lv_no;
				              $ps_no = $data->ps_no;
				              $bs_no = $data->bs_no;
				              $dq_no = $data->dq_no;
				              $service_number = $data->service_number;

				              $id = 'Lv No : '.$lv_no.'<br>Primary Service No : '.$ps_no.'<br>Backup Service No : '.$bs_no.'<br>DQ No : '.$dq_no.'<br>Service No : '.$service_number;
				            }
				        }
			        }


			        //find by service_number
			        if(empty($id)){

			        	$select = "
									SELECT lv_no,ps_no,bs_no,dq_no,service_number
			              			FROM network
			    					WHERE service_number = '$ref_no'
								  ";

						$query = $this->db->query($select);
			        
				        if ($query->num_rows() >0){ 
				            foreach ($query->result() as $data) {
				              $lv_no = $data->lv_no;
				              $ps_no = $data->ps_no;
				              $bs_no = $data->bs_no;
				              $dq_no = $data->dq_no;
				              $service_number = $data->service_number;

				              $id = 'Lv No : '.$lv_no.'<br>Primary Service No : '.$ps_no.'<br>Backup Service No : '.$bs_no.'<br>DQ No : '.$dq_no.'<br>Service No : '.$service_number;
				            }
				        }
			        }


			        

	          	} else if($category=='Software'){

	          		$id = '';

	          		//find by lv_no
	          		$select = "
								SELECT a.serial_number
			              		FROM software as a
			    				WHERE a.serial_number = '$ref_no'
							  ";

					$query = $this->db->query($select);
		        
			        if ($query->num_rows() >0){ 
			            foreach ($query->result() as $data) {
			              $serial_number = $data->serial_number;

			              $id = 'serial_number : '.$serial_number;
			            }
			        }

	          	} else if($category=='Hardware'){


	          		$id = '';

	          		//find by lv_no
	          		$select = "
								SELECT a.serial_number
			              		FROM hardware as a
			    				WHERE a.serial_number = '$ref_no'
							  ";

					$query = $this->db->query($select);
		        
			        if ($query->num_rows() >0){ 
			            foreach ($query->result() as $data) {
			              $serial_number = $data->serial_number;

			              $id = 'serial_number : '.$serial_number;
			            }
			        }


	          	} else if($category=='Computer'){

	          		$id = '';

	          		//find by lv_no
	          		$select = "
								SELECT a.serial_number
			              		FROM computer as a
			    				WHERE a.serial_number = '$ref_no'
							  ";

					$query = $this->db->query($select);
		        
			        if ($query->num_rows() >0){ 
			            foreach ($query->result() as $data) {
			              $serial_number = $data->serial_number;

			              $id = 'serial_number : '.$serial_number;
			            }
			        }
	          	}

	          	echo 'Service Number # <br>'.$id.'<br><br>';




	          	// CLOSED
	          	$select = "	SELECT * FROM td_ticket_closed as a
							WHERE a.id_ticket ='$id_ticket'
						  ";
				$query = $this->db->query($select);
			    if ($query->num_rows() >0){ 
			        foreach ($query->result() as $data) {
			          	$Problem = $data->Problem;
			          	$action_taken = $data->action_taken;
			          	$Portion = $data->Portion;

			          	echo 'Problem : '.$Problem.'<br>';
			          	echo 'action_taken :'.$action_taken.'<br>';
			          	echo 'Portion : '.$Portion.'<br>';

			         }
			    }



			    // Chronology 
			    $select = "	SELECT * FROM td_child_note as a
							WHERE a.id_ticket ='$id_ticket'
						  ";
				$query = $this->db->query($select);
			    if ($query->num_rows() >0){ 
			        foreach ($query->result() as $data) {
			        	$created_date = $data->created_date;
			          	$text_editor = $data->text_editor;

			          	echo 'created_date : '.$created_date.'<br>';
			          	echo 'text_editor : '.$text_editor.'<br>';

			         }
			    }



			    // ADDRESS 
	          	$address = '';
	          	$select = "SELECT * FROM location WHERE name='$location'";
	          	$query = $this->db->query($select);
			    if ($query->num_rows() >0){ 
			        foreach ($query->result() as $data) {
			          	$address = $data->address;
			        }
			    }
			    if(empty($address))
			    {
			    	$address = 'Not Applicable';
			    }

			    echo 'address : '.$address.'<br>';




	        }
	    } 
	}

	function Tracker_Template_Data($id_ticket)
	{
		$na = 'Not Applicable';

		$select = "	SELECT * FROM td_register_ticket as a
					LEFT JOIN  agent as b ON b.userid = a.created_by
					WHERE DATE(created_date) BETWEEN '2018-08-16 10:15:02' AND '2018-08-18 10:15:02'
				  ";
		$query = $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	          	$location = $data->location; 
	          	if(empty($location)){ $location = $na;}

	          	$created_date = $data->created_date;
	          	if(empty($created_date)){ $created_date = $na;}

	          	$custID = $data->custID;
	          	if(empty($custID)){ $custID = $na;}

	          	$provider_ref = $data->provider_ref;
	          	if(empty($provider_ref)){ $provider_ref = $na;}

	          	$first_name = $data->first_name;
	          	if(empty($first_name)){ $first_name = $na;}

	          	$id_ticket = $data->id_ticket;
	          	if(empty($id_ticket)){ $id_ticket = $na;}

	          	$ref_no = $data->ref_no;
	          	if(empty($ref_no)){ $ref_no = $na;}

	          	$main_status = $data->main_status;
	          	if(empty($main_status)){ $main_status = $na;}

	          	$backup_type = $data->backup_type;
	          	if(empty($backup_type)){ $backup_type = $na;}

	          	$backup_status = $data->backup_status;
	          	if(empty($backup_status)){ $backup_status = $na;}
	          	
	          	$status_ticket = $data->status_ticket;
	          	if(empty($status_ticket)){ $status_ticket = $na;}

	          	echo 'id_ticket : '.$id_ticket.'<br>';
	          	echo 'provider_ref : '.$provider_ref.'<br>';
	          	echo 'custID : '.$custID.'<br>';
	          	echo 'location : '.$location.'<br>';
	          	echo 'ref_no : '.$ref_no.'<br>';
	          	echo 'main_status : '.$main_status.'<br>';
	          	echo 'backup_type : '.$backup_type.'<br>';
	          	echo 'backup_status : '.$backup_status.'<br><br>';


	          	$select = "	SELECT * FROM ms_link_ticket as a
					WHERE a.id_ticket_single ='$id_ticket'
				  ";
				$query = $this->db->query($select);
			    if ($query->num_rows() >0){ 
			        foreach ($query->result() as $data) {
			          	$id_ticket_master = $data->id_ticket_master;
			          	echo 'id_ticket_master : '.$id_ticket_master.'<br>';
			        }
			    }

			    if(!empty($id_ticket_master))
			    {
			    	$select = "	SELECT * FROM ms_register_ticket as a
								WHERE a.id_ticket ='$id_ticket_master'
							  ";
					$query = $this->db->query($select);
				    if ($query->num_rows() >0){ 
				        foreach ($query->result() as $data) {
				          	$provider_ref = $data->provider_ref;
				          	echo 'provider_ref : '.$provider_ref.'<br><br>';
				        }
				    }
			    }

			    echo 'status_ticket : '.$status_ticket.'<br><br>';



			    $select = "	SELECT * FROM td_ticket_closed as a
					WHERE a.id_ticket ='$id_ticket'
				  ";
				$query = $this->db->query($select);
			    if ($query->num_rows() >0){ 
			        foreach ($query->result() as $data) {
			          	$Problem = $data->Problem;
			          	if(empty($Problem)){ $Problem = $na;}

			          	$cause_of_fault = $data->cause_of_fault;
			          	if(empty($cause_of_fault)){ $cause_of_fault = $na;}

			          	$action_taken = $data->action_taken;
			          	if(empty($action_taken)){ $action_taken = $na;}

			          	$text_editor = $data->text_editor;
			          	if(empty($text_editor)){ $text_editor = $na;}

			          	$Fault_Type = $data->Fault_Type;
			          	if(empty($Fault_Type)){ $Fault_Type = $na;}

			          	$Portion = $data->Portion;
			          	if(empty($Portion)){ $Portion = $na;}

			          	$closed_date = $data->created_date;
			          	if(empty($closed_date)){ $closed_date = $na;}


			          	$Ticket_Validation_Outage = $data->Ticket_Validation_Outage;
			          	if(empty($Ticket_Validation_Outage)){ $Ticket_Validation_Outage = $na;}

			          	echo 'Problem : '.$Problem.'<br>';
			          	echo 'cause_of_fault : '.$cause_of_fault.'<br>';
			          	echo 'action_taken : '.$action_taken.'<br>';
			          	echo 'text_editor : '.$text_editor.'<br>'; // remark
			          	echo 'Fault_Type : '.$Fault_Type.'<br>'; 
			          	echo 'Portion : '.$Portion.'<br><br>';


			          	
			          	echo 'closed_date : '.$closed_date.'<br>';

			          	$closed_status = 'closed';
			        }
			    } else {

			    	echo 'Problem : '.$na.'<br>';
		          	echo 'cause_of_fault : '.$na.'<br>';
		          	echo 'action_taken : '.$na.'<br>';
		          	echo 'text_editor : '.$na.'<br>'; // remark
		          	echo 'Fault_Type : '.$na.'<br>'; 
		          	echo 'Portion : '.$na.'<br><br>';
		          	echo 'closed_date : '.$na.'<br>';

		          	$closed_status = 'open';
			    }

			    
			    echo 'created_date : '.$created_date.'<br>';
			    echo 'Ticket_Validation_Outage : '.$Ticket_Validation_Outage.'<br>';



			    // first level
			    $select = "	SELECT * FROM  td_child_note as a
							WHERE a.id_ticket ='$id_ticket' AND type_note='first_level'
						  ";

				$query = $this->db->query($select);
			    if ($query->num_rows() >0){ 
			        foreach ($query->result() as $data) {
			          	$flevel_date = $data->created_date;
			        }
			    }

			    if(!empty($flevel_date)){
			    	echo 'first_level_date : '.$flevel_date.'<br>';
			    }



			    // Outage 
			    date_default_timezone_set("Asia/Kuala_Lumpur");
		        $timeReg =date("H:i:s");
		        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
		        $current = "'".$dateReg.' '.$timeReg."'"; //current date 
				
				if($closed_status=='open'){
					$select = 	"
									SELECT
									(UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(a.created_date))
									as total_time
									FROM td_register_ticket as a
									WHERE id_ticket='$id_ticket'
								";

				} else {

					$select = 	"
									SELECT
									(UNIX_TIMESTAMP('".$closed_date."') - UNIX_TIMESTAMP('".$created_date."'))
									as total_time
									FROM td_register_ticket as a
									WHERE id_ticket='$id_ticket'
								";
				
				}

				$query = $this->db->query($select);
		        
		        if ($query->num_rows() >0){ 
		            foreach ($query->result() as $data) {
		              	 $total_time = $data->total_time;

		            }
		        } 

		       // echo $start_ticket;
		        $total = $total_time;
		        $seconds = $total;
              	$hours = floor($seconds / 3600);
				$minutes = floor(($seconds / 60) % 60);
			    $seconds = $seconds % 60;

			    echo "Outage : ".$hours.' : '.$minutes.' : '.$seconds."<br>";



				$select = "	SELECT * FROM  td_child_note as a
							WHERE a.id_ticket ='$id_ticket' AND type_state='Update to TM'
						  ";

				$query = $this->db->query($select);
			    if ($query->num_rows() >0){ 
			        foreach ($query->result() as $data) {
			          	$up2tm = $data->created_date;
			        }
			    }

			    if(empty($up2tm)){
			    	$up2tm = $na;
			    }	
			    echo 'up2tm : '.$up2tm.'<br>';
			    			    


			    echo "<hr>";

	        }
	    }
	}

	function Statistic_Circuit_Fault_Template_Data($id_ticket)
	{
		
	}


	function Dtable_Data_Set($id)
	{

		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date 

     //    CONCAT(
					// FLOOR(HOUR(TIMEDIFF(a.created_date, ".$current.")) / 24), ' days ',
					// MOD(HOUR(TIMEDIFF(a.created_date, ".$current.")), 24), ' hours ',
					// MINUTE(TIMEDIFF(a.created_date, ".$current.")), ' minutes')
					// as created_date,

		$where = "	id,
					name";

	  	$this->datatables->select($where);
		$this->datatables->from("report_data_column");

		if($id=='1'){
			$this->datatables->where('name_report_type','RFO');
			//$this->db->order_by("id", "desc");
		} else if($id=='2'){
			$this->datatables->where('name_report_type','Tracker');
			//$this->db->order_by("sort", "desc");
		}

		
		return $this->datatables->generate();
	}

	function RFO_Register($col,$id_ticket)
	{
		$na = 'Not Applicable';

		$select = "	SELECT * FROM td_register_ticket as a
						LEFT JOIN  agent as b ON b.userid = a.created_by
						WHERE id_ticket='$id_ticket'
					  ";

		$query = $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	          	
	        	$query = $this->db->query($select);
			    if ($query->num_rows() >0){ 
			        foreach ($query->result() as $data) {
			          	$location = $data->location;
			          	$created_date = $data->created_date;
			          	$custID = $data->custID;
			          	$provider_ref = $data->provider_ref;
			          	$first_name = $data->first_name;



			          	$category = $data->category;
			          	$ref_no = $data->ref_no;
			          	if($category=='Network')
			          	{
			          		
			          		$id = '';

			          		//find by lv_no
			          		$select = "
										SELECT lv_no,ps_no,bs_no,dq_no,service_number
				              			FROM network
				    					WHERE lv_no = '$ref_no'
									  ";

							$query = $this->db->query($select);
				        
					        if ($query->num_rows() >0){ 
					            foreach ($query->result() as $data) {
					              $lv_no = $data->lv_no;
					              $ps_no = $data->ps_no;
					              $bs_no = $data->bs_no;
					              $dq_no = $data->dq_no;
					              $service_number = $data->service_number;

					              $id = ' Lv No : '.$lv_no.'<br> Primary Service No : '.$ps_no.'<br> Backup Service No : '.$bs_no.'<br> DQ No : '.$dq_no.'<br> Service No : '.$service_number;
					            }
					        }

					        //echo $select;

					        //find by ps_no
					        if(empty($id)){

					        	$select = "
											SELECT lv_no,ps_no,bs_no,dq_no,service_number
					              			FROM network
					    					WHERE ps_no = '$ref_no'
										  ";

								$query = $this->db->query($select);
					        
						        if ($query->num_rows() >0){ 
						            foreach ($query->result() as $data) {
						              $lv_no = $data->lv_no;
						              $ps_no = $data->ps_no;
						              $bs_no = $data->bs_no;
						              $dq_no = $data->dq_no;
						              $service_number = $data->service_number;

						              $id = ' Lv No : '.$lv_no.'<br> Primary Service No : '.$ps_no.'<br> Backup Service No : '.$bs_no.'<br> DQ No : '.$dq_no.'<br> Service No : '.$service_number;
						            }
						        }
					        }



					        //find by bs_no
					        if(empty($id)){

					        	$select = "
											SELECT lv_no,ps_no,bs_no,dq_no,service_number
					              			FROM network
					    					WHERE bs_no = '$ref_no'
										  ";

								$query = $this->db->query($select);
					        
						        if ($query->num_rows() >0){ 
						            foreach ($query->result() as $data) {
						              $lv_no = $data->lv_no;
						              $ps_no = $data->ps_no;
						              $bs_no = $data->bs_no;
						              $dq_no = $data->dq_no;
						              $service_number = $data->service_number;

						              $id = ' Lv No : '.$lv_no.'<br> Primary Service No : '.$ps_no.'<br> Backup Service No : '.$bs_no.'<br> DQ No : '.$dq_no.'<br> Service No : '.$service_number;
						            }
						        }
					        }



					        //find by dq_no
					        if(empty($id)){

					        	$select = "
											SELECT lv_no,ps_no,bs_no,dq_no,service_number
					              			FROM network
					    					WHERE dq_no = '$ref_no'
										  ";

								$query = $this->db->query($select);
					        
						        if ($query->num_rows() >0){ 
						            foreach ($query->result() as $data) {
						              $lv_no = $data->lv_no;
						              $ps_no = $data->ps_no;
						              $bs_no = $data->bs_no;
						              $dq_no = $data->dq_no;
						              $service_number = $data->service_number;

						              $id = ' Lv No : '.$lv_no.'<br> Primary Service No : '.$ps_no.'<br> Backup Service No : '.$bs_no.'<br> DQ No : '.$dq_no.'<br> Service No : '.$service_number;
						            }
						        }
					        }


					        //find by service_number
					        if(empty($id)){

					        	$select = "
											SELECT lv_no,ps_no,bs_no,dq_no,service_number
					              			FROM network
					    					WHERE service_number = '$ref_no'
										  ";

								$query = $this->db->query($select);
					        
						        if ($query->num_rows() >0){ 
						            foreach ($query->result() as $data) {
						              $lv_no = $data->lv_no;
						              $ps_no = $data->ps_no;
						              $bs_no = $data->bs_no;
						              $dq_no = $data->dq_no;
						              $service_number = $data->service_number;

						              $id = ' Lv No : '.$lv_no.'<br> Primary Service No : '.$ps_no.'<br> Backup Service No : '.$bs_no.'<br> DQ No : '.$dq_no.'<br> Service No : '.$service_number;
						            }
						        }
					        } else if($category=='Software'){

				          		$id = '';

				          		//find by lv_no
				          		$select = "
											SELECT a.serial_number
						              		FROM software as a
						    				WHERE a.serial_number = '$ref_no'
										  ";

								$query = $this->db->query($select);
					        
						        if ($query->num_rows() >0){ 
						            foreach ($query->result() as $data) {
						              $serial_number = $data->serial_number;

						              $id = 'serial_number : '.$serial_number;
						            }
						        }

				          	} else if($category=='Hardware'){


				          		$id = '';

				          		//find by lv_no
				          		$select = "
											SELECT a.serial_number
						              		FROM hardware as a
						    				WHERE a.serial_number = '$ref_no'
										  ";

								$query = $this->db->query($select);
					        
						        if ($query->num_rows() >0){ 
						            foreach ($query->result() as $data) {
						              $serial_number = $data->serial_number;

						              $id = 'serial_number : '.$serial_number;
						            }
						        }


				          	} else if($category=='Computer'){

				          		$id = '';

				          		//find by lv_no
				          		$select = "
											SELECT a.serial_number
						              		FROM computer as a
						    				WHERE a.serial_number = '$ref_no'
										  ";

								$query = $this->db->query($select);
					        
						        if ($query->num_rows() >0){ 
						            foreach ($query->result() as $data) {
						              $serial_number = $data->serial_number;

						              $id = 'serial_number : '.$serial_number;
						            }
						        }
				          	}

				          	$service_number = $id;


					        }
					    }
				}


				// CLOSED
	          	$select = "	SELECT * FROM td_ticket_closed as a
							WHERE a.id_ticket ='$id_ticket'
						  ";
				$query = $this->db->query($select);
			    if ($query->num_rows() >0){ 
			        foreach ($query->result() as $data) {
			          	$Problem = $data->Problem;
			          	$action_taken = $data->action_taken;
			          	$Portion = $data->Portion;
			         }
			    }


			    // Chronology 
			    $select = "	SELECT * FROM td_child_note as a
							WHERE a.id_ticket ='$id_ticket'
						  ";
				$query = $this->db->query($select);
			    if ($query->num_rows() >0){ 
			        foreach ($query->result() as $data) {
			        	$chrono_date = $data->created_date;
			          	$text_editor = $data->text_editor;
			          	$crono = $chrono_date.' - '.$text_editor;
			         }
			    }
			    if(empty($crono))
			    {
			    	$crono = 'Not Applicable';
			    }

			    // ADDRESS 
	          	$address = '';
	          	$select = "SELECT * FROM location WHERE name='$location'";
	          	$query = $this->db->query($select);
			    if ($query->num_rows() >0){ 
			        foreach ($query->result() as $data) {
			          	$address = $data->address;
			        }
			    }
			    if(empty($address))
			    {
			    	$address = 'Not Applicable';
			    }

	        }
	    }
	    //echo $location.'<br>';

	    $collect='';
		foreach ($col as $column) {	
			// echo $location.'LOCATION';
			// echo $column.'<br>'; 

			$na = 'Not Applicable';
			if($column=='1'){ $location = $location; } else { }
			if($column=='2'){ $start_date = $created_date; } else { }
			if($column=='3'){ $customer = $custID; } else { }
			if($column=='12'){ $address = $address; } else { }
			if($column=='4'){ $pro_ref = $provider_ref; } else { }
			if($column=='5'){ $cat = $category; } else { }
			if($column=='6'){ $ref_no = $id_ticket; } else { }
			if($column=='7'){ $service_number = $service_number; } else { }
			if($column=='8'){ $fault_cat = $Portion; } else { }
			if($column=='9'){ $fault_desc = $Problem; } else { }
			if($column=='10'){ $remedial = $action_taken; } else { }
			if($column=='11'){ $remark = $crono; } else { }

		}


		$rand = rand();
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=RFO_".$rand.".doc");    
        echo "<html>";
        echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
        echo "<body>";
        //echo "<center> ";
        echo "<b><h1> REASON FOR OUTAGE </h1></b>";
        echo "<br></br>";


        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date 
        $email_default = 'noc@bit.com.my';

        if(!empty($ref_no))
		{
			echo 'Ref : '.$ref_no.'<br>';
			echo 'Date : '.$dateReg.'<br>';
			echo 'Email : '.$email_default.'<br>';
		}

		echo "<br><b> Dear Valued Customer,</b><br><br>";

		echo "Attached is the RFO as request for location ";

		if(!empty($location))
		{
			echo "<b>".$location." </b>";
		} else {
			echo "__________________";
		}
		
		echo " which occured on ";

		if(!empty($start_date))
		{
			echo "<b>".$start_date." </b>";
		} else {
			echo "__________________ ";
		}

		echo "hours. The circuit was restored on __________________ hours. ";

		echo "We appreciate your patience during the outage time and looking forward to improve our service in the future. <br><br>";

		echo "	<style>  

					p {
					    
					}
					p span  {
					    padding-left:10px; 
    					display:block;
					}




				</style>
			 ";

		if(!empty($customer))
		{
			//echo "<p> Customer Name <span> : ".$customer."</span> </p>";

			echo "
					<table style='width:100%'>
					  <tr>
					    <th width='30%' align='left'>Customer Name </th>
					    <td width='70%' align='left'> : ".$customer."</td>
					  </tr>
					</table>

				 ";


		} else {

		}


		if(!empty($address))
		{
			//echo "<p> Address <span> : ".$address."</span> </p>";

			echo "
					<table style='width:100%'>
					  <tr>
					    <th width='30%' align='left'>Address </th>
					    <td width='70%' align='left'> : ".$address."</td>
					  </tr>
					</table>

				 ";

		} else {

		}


		if(!empty($pro_ref))
		{
			//echo "<p> Provider No <span> : ".$pro_ref."</span> </p>";

			echo "
					<table style='width:100%'>
					  <tr>
					    <th width='30%' align='left'>Provider No </th>
					    <td width='70%' align='left'> : ".$pro_ref."</td>
					  </tr>
					</table>
					<br>
				 ";

		} else {

		}


		if(!empty($start_date))
		{
			echo "
					<table style='width:100%'>
					  <tr>
					    <th width='30%' align='left'>Date / Time Of Report </th>
					    <td width='70%' align='left'> : ".$start_date."</td>
					  </tr>
					</table>
					<br>
				 ";
		} else {
			
			
		}


		echo "
					<table style='width:100%'>
					  <tr>
					    <th width='30%' align='left'>Date / Time Restored </th>
					    <td width='70%' align='left'> : __________________</td>
					  </tr>
					</table>
					<br>
				 ";


		if(!empty($service_number))
		{
			echo "
					<style>

						table td {
						    border: 1px solid black;
						}

					</style>

					<table style='width:100%'>
					  <tr>
					    <th width='30%' align='left'>Service Number </th>
					    <td width='70%' align='left'> ".$service_number." </td>
					  </tr>
					</table>
					<br>
				 ";

		} else {

		}


		if(!empty($first_name))
		{
			echo "
					<style>

						table td {
						    border: 0px;
						}

					</style>

					<table style='width:100%'>
					  <tr>
					    <th width='30%' align='left'>Report By </th>
					    <td width='70%' align='left'> : ".$first_name." </td>
					  </tr>
					</table>
					<br>
				 ";
		}


		if(!empty($address))
		{
			echo "
					<style>

						table td {
						    border: 0px;
						}

					</style>

					<table style='width:100%'>
					  <tr>
					    <th width='30%' align='left'>Fault Location </th>
					    <td width='70%' align='left'> : ".$address." </td>
					  </tr>
					</table>
					<br>
				 ";
		}


		if(!empty($fault_cat))
		{
			echo "
					<style>

						table td {
						    border: 1px solid black;
						}

					</style>

					<table style='width:100%'>
					  <tr>
					    <th width='100%' align='left'>Fault Location </th>
					  </tr>
					  <tr> 
					  	<td width='100%' align='left'> ".$fault_cat." </td>
					  </tr>
					</table>
					<br>
				 ";
		}


		if(!empty($fault_desc))
		{
			echo "
					<style>

						table td {
						    border: 1px solid black;
						}

					</style>

					<table style='width:100%'>
					  <tr>
					    <th width='100%' align='left'>Fault Description </th>
					  </tr>
					  <tr> 
					  	<td width='100%' align='left'> ".$fault_desc." </td>
					  </tr>
					</table>
					<br>
				 ";
		}


		if(!empty($remedial))
		{
			echo "
					<style>

						table td {
						    border: 1px solid black;
						}

					</style>

					<table style='width:100%'>
					  <tr>
					    <th width='100%' align='left'>Remedial Action </th>
					  </tr>
					  <tr> 
					  	<td width='100%' align='left'> ".$remedial." </td>
					  </tr>
					</table>
					<br>
				 ";
		}

		if(!empty($remark))
		{

			echo '<b> Remarks </b>';

			echo "
					<style>

						table td {
						    border: 1px solid black;
						}

					</style>

					
					<table style='width:100%'>
					  <tr>
					    <th width='30%' align='left'> </th>
					    <th width='70%' align='left'> </th>
					  </tr>
					  <tr> 
					  	<td width='30%' align='left'> ".$chrono_date." </td>
					  	<td width='70%' align='left'> ".$text_editor." </td>
					  </tr>
					</table>
					<br>
				 ";
		}


		echo "
					<style>

						table td {
						    border: 0px;
						}

					</style>

					
					<table style='width:100%'>
					  <tr>
					    <th width='40%' align='left'> </th>
					    <th width='20%' align='left'> </th>
					    <th width='40%' align='left'> </th>
					  </tr>
					  <tr> 
					  	<td width='40%' align='left'> 
					  		<table style='width:100%'>
							  <tr>
							    <th width='100%' align='left'> Prepared by</th>
							  </tr>
							  <tr>
							    <td width='100%' align='left'> 
							    	Name : <br>
							    	Service Number : <br>
							    	Date : <br>
							    </td>
							  </tr>
							</table>
					  	</td>
					  	<td width='20%' align='left'></td>
					  	<td width='40%' align='left'> 
					  		<table style='width:100%' border='1px solid black'>
							  <tr>
							    <th width='100%' align='left'> Verified by</th>
							  </tr>
							  <tr>
							    <td width='100%' align='left'> 
							    	Name : <br>
							    	Designation : <br>
							    	Date : <br>
							    </td>
							  </tr>
							</table>
					  	</td>
					  </tr>
					</table>
					<br>
				 ";



	}


	function save_col($col,$Report_ID)
	{
		foreach ($col as $column) {
			$data = array('report_column_id'=>$column,'report_id'=>$Report_ID);
			$this->db->insert('report_set_column',$data);
		}
	}

	function ReportInfo($data)
	{
		$this->db->insert('report_register',$data);
	}

	function Dtable_Group_Set()
	{
		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date 

		$where = "	customerID,
					other_id";

	  	$this->datatables->select($where);
		$this->datatables->from("customer");
		$this->db->order_by("customerID", "desc");
		$this->datatables->group_by($where);

		return $this->datatables->generate();
	}

	function access_group($id_group,$Report_ID)
	{
		foreach ($id_group as $group) {
			$data = array('report_group'=>$group,'report_id'=>$Report_ID);
			$this->db->insert('report_group',$data);
		}
	}

	function Dtable_List_Report()
	{
		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date 

		$where = "id,report_type,report_title,report_description,created_date,report_id";

	  	$this->datatables->select($where);
		$this->datatables->from("report_register");
		$this->datatables->where('report_type','1');
		$this->db->order_by("id", "desc");

		return $this->datatables->generate();
	}

	function Dtable_List_Report_Tracker()
	{
		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date 

		$where = "id,report_type,report_title,report_description,created_date,report_id";

	  	$this->datatables->select($where);
		$this->datatables->from("report_register");
		$this->datatables->where('report_type','2');
		$this->db->order_by("id", "desc");

		return $this->datatables->generate();
	}
	

	function Dtable_List_Report_DataVisual()
	{
		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date 

		$where = "id,report_type,report_title,report_description,created_date,report_id";

	  	$this->datatables->select($where);
		$this->datatables->from("report_register");
		$this->datatables->where('report_type !=','1');
		$this->datatables->where('report_type !=','2');
		$this->db->order_by("id", "desc");

		return $this->datatables->generate();
	}

	function delete_report($id)
	{
		$this->db->where('report_id',$id);
		$this->db->delete('report_register');

		$this->db->where('report_id',$id);
		$this->db->delete('report_set_column');

		$this->db->where('report_id',$id);
		$this->db->delete('report_group');
	}

	function Report_Details($id)
	{
		$select = 	"
						SELECT * FROM report_register Where id='$id' 
					";
		$query= $this->db->query($select);
        return $query->result_array();
	}


	function Report_ID_Register($Report_ID_Register)
	{
		$select = "SELECT * FROM report_register WHERE id='$Report_ID_Register'";
		$query = $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	          	return $data->report_id;
	        }
	    }
	}


	function RFO_Word($Report_ID,$id_ticket)
	{
		$na = 'Not Applicable';

		$select = "	SELECT * FROM td_register_ticket as a
						LEFT JOIN  agent as b ON b.userid = a.created_by
						WHERE id_ticket='$id_ticket'
					  ";

		$query = $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	          	
	        	$query = $this->db->query($select);
			    if ($query->num_rows() >0){ 
			        foreach ($query->result() as $data) {
			          	$location = $data->location;
			          	$created_date = $data->created_date;
			          	$custID = $data->custID;
			          	$provider_ref = $data->provider_ref;
			          	$first_name = $data->first_name;



			          	$category = $data->category;
			          	$ref_no = $data->ref_no;
			          	if($category=='Network')
			          	{
			          		
			          		$id = '';

			          		//find by lv_no
			          		$select = "
										SELECT lv_no,ps_no,bs_no,dq_no,service_number
				              			FROM network
				    					WHERE lv_no = '$ref_no'
									  ";

							$query = $this->db->query($select);
				        
					        if ($query->num_rows() >0){ 
					            foreach ($query->result() as $data) {
					              $lv_no = $data->lv_no;
					              $ps_no = $data->ps_no;
					              $bs_no = $data->bs_no;
					              $dq_no = $data->dq_no;
					              $service_number = $data->service_number;

					              $id = ' Lv No : '.$lv_no.'<br> Primary Service No : '.$ps_no.'<br> Backup Service No : '.$bs_no.'<br> DQ No : '.$dq_no.'<br> Service No : '.$service_number;
					            }
					        }

					        //echo $select;

					        //find by ps_no
					        if(empty($id)){

					        	$select = "
											SELECT lv_no,ps_no,bs_no,dq_no,service_number
					              			FROM network
					    					WHERE ps_no = '$ref_no'
										  ";

								$query = $this->db->query($select);
					        
						        if ($query->num_rows() >0){ 
						            foreach ($query->result() as $data) {
						              $lv_no = $data->lv_no;
						              $ps_no = $data->ps_no;
						              $bs_no = $data->bs_no;
						              $dq_no = $data->dq_no;
						              $service_number = $data->service_number;

						              $id = ' Lv No : '.$lv_no.'<br> Primary Service No : '.$ps_no.'<br> Backup Service No : '.$bs_no.'<br> DQ No : '.$dq_no.'<br> Service No : '.$service_number;
						            }
						        }
					        }



					        //find by bs_no
					        if(empty($id)){

					        	$select = "
											SELECT lv_no,ps_no,bs_no,dq_no,service_number
					              			FROM network
					    					WHERE bs_no = '$ref_no'
										  ";

								$query = $this->db->query($select);
					        
						        if ($query->num_rows() >0){ 
						            foreach ($query->result() as $data) {
						              $lv_no = $data->lv_no;
						              $ps_no = $data->ps_no;
						              $bs_no = $data->bs_no;
						              $dq_no = $data->dq_no;
						              $service_number = $data->service_number;

						              $id = ' Lv No : '.$lv_no.'<br> Primary Service No : '.$ps_no.'<br> Backup Service No : '.$bs_no.'<br> DQ No : '.$dq_no.'<br> Service No : '.$service_number;
						            }
						        }
					        }



					        //find by dq_no
					        if(empty($id)){

					        	$select = "
											SELECT lv_no,ps_no,bs_no,dq_no,service_number
					              			FROM network
					    					WHERE dq_no = '$ref_no'
										  ";

								$query = $this->db->query($select);
					        
						        if ($query->num_rows() >0){ 
						            foreach ($query->result() as $data) {
						              $lv_no = $data->lv_no;
						              $ps_no = $data->ps_no;
						              $bs_no = $data->bs_no;
						              $dq_no = $data->dq_no;
						              $service_number = $data->service_number;

						              $id = ' Lv No : '.$lv_no.'<br> Primary Service No : '.$ps_no.'<br> Backup Service No : '.$bs_no.'<br> DQ No : '.$dq_no.'<br> Service No : '.$service_number;
						            }
						        }
					        }


					        //find by service_number
					        if(empty($id)){

					        	$select = "
											SELECT lv_no,ps_no,bs_no,dq_no,service_number
					              			FROM network
					    					WHERE service_number = '$ref_no'
										  ";

								$query = $this->db->query($select);
					        
						        if ($query->num_rows() >0){ 
						            foreach ($query->result() as $data) {
						              $lv_no = $data->lv_no;
						              $ps_no = $data->ps_no;
						              $bs_no = $data->bs_no;
						              $dq_no = $data->dq_no;
						              $service_number = $data->service_number;

						              $id = ' Lv No : '.$lv_no.'<br> Primary Service No : '.$ps_no.'<br> Backup Service No : '.$bs_no.'<br> DQ No : '.$dq_no.'<br> Service No : '.$service_number;
						            }
						        }
					        } else if($category=='Software'){

				          		$id = '';

				          		//find by lv_no
				          		$select = "
											SELECT a.serial_number
						              		FROM software as a
						    				WHERE a.serial_number = '$ref_no'
										  ";

								$query = $this->db->query($select);
					        
						        if ($query->num_rows() >0){ 
						            foreach ($query->result() as $data) {
						              $serial_number = $data->serial_number;

						              $id = 'serial_number : '.$serial_number;
						            }
						        }

				          	} else if($category=='Hardware'){


				          		$id = '';

				          		//find by lv_no
				          		$select = "
											SELECT a.serial_number
						              		FROM hardware as a
						    				WHERE a.serial_number = '$ref_no'
										  ";

								$query = $this->db->query($select);
					        
						        if ($query->num_rows() >0){ 
						            foreach ($query->result() as $data) {
						              $serial_number = $data->serial_number;

						              $id = 'serial_number : '.$serial_number;
						            }
						        }


				          	} else if($category=='Computer'){

				          		$id = '';

				          		//find by lv_no
				          		$select = "
											SELECT a.serial_number
						              		FROM computer as a
						    				WHERE a.serial_number = '$ref_no'
										  ";

								$query = $this->db->query($select);
					        
						        if ($query->num_rows() >0){ 
						            foreach ($query->result() as $data) {
						              $serial_number = $data->serial_number;

						              $id = 'serial_number : '.$serial_number;
						            }
						        }
				          	}

				          	$service_number = $id;


					        }
					    }
				}


				// CLOSED
	          	$select = "	SELECT * FROM td_ticket_closed as a
							WHERE a.id_ticket ='$id_ticket'
						  ";
				$query = $this->db->query($select);
			    if ($query->num_rows() >0){ 
			        foreach ($query->result() as $data) {
			          	$Problem = $data->Problem;
			          	$action_taken = $data->action_taken;
			          	$Portion = $data->Portion;
			         }

			         if(empty($action_taken)){
			         	$action_taken='Not Applicable';
			         }
			    }


			    // Chronology 
			    $select = "	SELECT * FROM td_child_note as a
							WHERE a.id_ticket ='$id_ticket'
						  ";
				$query = $this->db->query($select);
			    if ($query->num_rows() >0){ 
			        foreach ($query->result() as $data) {

			        	$chrono_date = $data->created_date;
			          	$text_editor = $data->text_editor;
			          	$crono = $chrono_date.' - '.$text_editor;


			          	if(empty($crono))
					    {
					    	$crono = 'Not Applicable';
					    }


			         }
			    }
			    

			    // ADDRESS 
	          	$address = '';
	          	$select = "SELECT * FROM location WHERE name='$location'";
	          	$query = $this->db->query($select);
			    if ($query->num_rows() >0){ 
			        foreach ($query->result() as $data) {
			          	$address = $data->address;
			        }
			    }
			    if(empty($address))
			    {
			    	$address = 'Not Applicable';
			    }

	        }
	    }
	    //echo $location.'<br>';

	    $collect='';
		// foreach ($col as $column) {	
		// 	// echo $location.'LOCATION';
		// 	// echo $column.'<br>'; 
		// 	$na = 'Not Applicable';
		// 	if($column=='1'){ $location = $location; } else { }
		// 	if($column=='2'){ $start_date = $created_date; } else { }
		// 	if($column=='3'){ $customer = $custID; } else { }
		// 	if($column=='12'){ $address = $address; } else { }
		// 	if($column=='4'){ $pro_ref = $provider_ref; } else { }
		// 	if($column=='5'){ $cat = $category; } else { }
		// 	if($column=='6'){ $ref_no = $id_ticket; } else { }
		// 	if($column=='7'){ $service_number = $service_number; } else { }
		// 	if($column=='8'){ $fault_cat = $Portion; } else { }
		// 	if($column=='9'){ $fault_desc = $Problem; } else { }
		// 	if($column=='10'){ $remedial = $action_taken; } else { }
		// 	if($column=='11'){ $remark = $crono; } else { }
		// }


		$select = "	SELECT * FROM report_set_column WHERE report_id ='$Report_ID'";
		
		$query = $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {

	        	$column = $data->report_column_id;
	        	$na = 'Not Applicable';
				if($column=='1'){ $location = $location; } else { }
				if($column=='2'){ $start_date = $created_date; } else { }
				if($column=='3'){ $customer = $custID; } else { }
				if($column=='12'){ $address = $address; } else { }
				if($column=='4'){ $pro_ref = $provider_ref; } else { }
				if($column=='5'){ $cat = $category; } else { }
				if($column=='6'){ $ref_no = $id_ticket; } else { }
				if($column=='7'){ $service_number = $service_number; } else { }
				if($column=='8'){ $fault_cat = $Portion; } else { }
				if($column=='9'){ $fault_desc = $Problem; } else { }
				if($column=='10'){ $remedial = $action_taken; } else { }
				if($column=='11'){ $remark = $crono; } else { }
				
	         }


	   
			$rand = rand();
	        header("Content-type: application/vnd.ms-word");
	        header("Content-Disposition: attachment;Filename=RFO_".$rand.".doc");    
	        echo "<html>";
	        echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
	        echo "<body>";
	        //echo "<center> ";
	        echo "<b><h1> REASON FOR OUTAGE </h1></b>";
	        echo "<br></br>";


	        date_default_timezone_set("Asia/Kuala_Lumpur");
	        $timeReg =date("H:i:s");
	        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
	        $current = "'".$dateReg.' '.$timeReg."'"; //current date 
	        $email_default = 'noc@bit.com.my';

	        if(!empty($ref_no))
			{
				echo 'Ref : '.$ref_no.'<br>';
				echo 'Date : '.$dateReg.'<br>';
				echo 'Email : '.$email_default.'<br>';
			}

			echo "<br><b> Dear Valued Customer,</b><br><br>";

			echo "Attached is the RFO as request for location ";

			if(!empty($location))
			{
				echo "<b>".$location." </b>";
			} else {
				echo "__________________";
			}
			
			echo " which occured on ";

			if(!empty($start_date))
			{
				echo "<b>".$start_date." </b>";
			} else {
				echo "__________________ ";
			}

			echo "hours. The circuit was restored on __________________ hours. ";

			echo "We appreciate your patience during the outage time and looking forward to improve our service in the future. <br><br>";

			echo "	<style>  

						p {
						    
						}
						p span  {
						    padding-left:10px; 
	    					display:block;
						}




					</style>
				 ";

			if(!empty($customer))
			{
				//echo "<p> Customer Name <span> : ".$customer."</span> </p>";

				echo "
						<table style='width:100%'>
						  <tr>
						    <th width='30%' align='left'>Customer Name </th>
						    <td width='70%' align='left'> : ".$customer."</td>
						  </tr>
						</table>

					 ";


			} else {

			}


			if(!empty($address))
			{
				//echo "<p> Address <span> : ".$address."</span> </p>";

				echo "
						<table style='width:100%'>
						  <tr>
						    <th width='30%' align='left'>Address </th>
						    <td width='70%' align='left'> : ".$address."</td>
						  </tr>
						</table>

					 ";

			} else {

			}


			if(!empty($pro_ref))
			{
				//echo "<p> Provider No <span> : ".$pro_ref."</span> </p>";

				echo "
						<table style='width:100%'>
						  <tr>
						    <th width='30%' align='left'>Provider No </th>
						    <td width='70%' align='left'> : ".$pro_ref."</td>
						  </tr>
						</table>
						<br>
					 ";

			} else {

			}


			if(!empty($start_date))
			{
				echo "
						<table style='width:100%'>
						  <tr>
						    <th width='30%' align='left'>Date / Time Of Report </th>
						    <td width='70%' align='left'> : ".$start_date."</td>
						  </tr>
						</table>
						<br>
					 ";
			} else {
				
				
			}


			echo "
						<table style='width:100%'>
						  <tr>
						    <th width='30%' align='left'>Date / Time Restored </th>
						    <td width='70%' align='left'> : __________________</td>
						  </tr>
						</table>
						<br>
					 ";


			if(!empty($service_number))
			{
				echo "
						<style>

							table td {
							    border: 1px solid black;
							}

						</style>

						<table style='width:100%'>
						  <tr>
						    <th width='30%' align='left'>Service Number </th>
						    <td width='70%' align='left'> ".$service_number." </td>
						  </tr>
						</table>
						<br>
					 ";

			} else {

			}


			if(!empty($first_name))
			{
				echo "
						<style>

							table td {
							    border: 0px;
							}

						</style>

						<table style='width:100%'>
						  <tr>
						    <th width='30%' align='left'>Report By </th>
						    <td width='70%' align='left'> : ".$first_name." </td>
						  </tr>
						</table>
						<br>
					 ";
			}


			if(!empty($address))
			{
				echo "
						<style>

							table td {
							    border: 0px;
							}

						</style>

						<table style='width:100%'>
						  <tr>
						    <th width='30%' align='left'>Fault Location </th>
						    <td width='70%' align='left'> : ".$address." </td>
						  </tr>
						</table>
						<br>
					 ";
			}


			if(!empty($fault_cat))
			{
				echo "
						<style>

							table td {
							    border: 1px solid black;
							}

						</style>

						<table style='width:100%'>
						  <tr>
						    <th width='100%' align='left'>Fault Location </th>
						  </tr>
						  <tr> 
						  	<td width='100%' align='left'> ".$fault_cat." </td>
						  </tr>
						</table>
						<br>
					 ";
			}


			if(!empty($fault_desc))
			{
				echo "
						<style>

							table td {
							    border: 1px solid black;
							}

						</style>

						<table style='width:100%'>
						  <tr>
						    <th width='100%' align='left'>Fault Description </th>
						  </tr>
						  <tr> 
						  	<td width='100%' align='left'> ".$fault_desc." </td>
						  </tr>
						</table>
						<br>
					 ";
			}


			if(!empty($remedial))
			{
				echo "
						<style>

							table td {
							    border: 1px solid black;
							}

						</style>

						<table style='width:100%'>
						  <tr>
						    <th width='100%' align='left'>Remedial Action </th>
						  </tr>
						  <tr> 
						  	<td width='100%' align='left'> ".$remedial." </td>
						  </tr>
						</table>
						<br>
					 ";
			}

			if(!empty($remark))
			{

				echo '<b> Remarks </b>';

				echo "
						<style>

							table td {
							    border: 1px solid black;
							}

						</style>

						
						<table style='width:100%'>
						  <tr>
						    <th width='30%' align='left'> </th>
						    <th width='70%' align='left'> </th>
						  </tr>
						  <tr> 
						  	<td width='30%' align='left'> ".$chrono_date." </td>
						  	<td width='70%' align='left'> ".$text_editor." </td>
						  </tr>
						</table>
						<br>
					 ";
			}


			echo "
						<style>

							table td {
							    border: 0px;
							}

						</style>

						
						<table style='width:100%'>
						  <tr>
						    <th width='40%' align='left'> </th>
						    <th width='20%' align='left'> </th>
						    <th width='40%' align='left'> </th>
						  </tr>
						  <tr> 
						  	<td width='40%' align='left'> 
						  		<table style='width:100%'>
								  <tr>
								    <th width='100%' align='left'> Prepared by</th>
								  </tr>
								  <tr>
								    <td width='100%' align='left'> 
								    	Name : <br>
								    	Service Number : <br>
								    	Date : <br>
								    </td>
								  </tr>
								</table>
						  	</td>
						  	<td width='20%' align='left'></td>
						  	<td width='40%' align='left'> 
						  		<table style='width:100%' border='1px solid black'>
								  <tr>
								    <th width='100%' align='left'> Verified by</th>
								  </tr>
								  <tr>
								    <td width='100%' align='left'> 
								    	Name : <br>
								    	Designation : <br>
								    	Date : <br>
								    </td>
								  </tr>
								</table>
						  	</td>
						  </tr>
						</table>
						<br>
					 ";
		}
	}


	function data_tracker($Report_Date_Start,$Report_Date_End)
	{
		// $select = "	SELECT * FROM td_register_ticket as a
		// 			LEFT JOIN  agent as b ON b.userid = a.created_by
		// 			WHERE a.id_ticket ='$id_ticket'
		// 		  ";

		$select = "	SELECT * FROM td_register_ticket as a
					LEFT JOIN  agent as b ON b.userid = a.created_by
					WHERE a.created_date between '$Report_Date_Start' and '$Report_Date_End';
				  ";

		$query = $this->db->query($select);
	
		return $query;
	}

	function data_tracker_closed($id_ticket)
	{
		$select = "	SELECT * FROM td_ticket_closed as a
							WHERE a.id_ticket ='$id_ticket'
						  ";
		$query = $this->db->query($select);
	
		return $query;
	}

	function data_tracker_master($id_ticket)
	{
		$select = "	SELECT * FROM ms_link_ticket as a
					LEFT JOIN ms_register_ticket as b ON b.id_ticket = a.id_ticket_master
					WHERE a.id_ticket_single ='$id_ticket'
				  ";
		$query = $this->db->query($select);
	
		return $query;
	}

	function data_total_time($created_date,$closed_date)
	{
		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date 
		
		if(empty($closed_date)){
			$select = 	"
							SELECT
							(UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(a.created_date))
							as total_time
							FROM td_register_ticket as a
						";

		} else {

			$select = 	"
							SELECT
							(UNIX_TIMESTAMP('".$closed_date."') - UNIX_TIMESTAMP('".$created_date."'))
							as total_time
							FROM td_register_ticket as a
						";
		
		}


		$query = $this->db->query($select);
	
		return $query;
	}

	function data_first_level($id_ticket)
	{
		$select = "	SELECT * FROM td_child_note
					WHERE id_ticket ='$id_ticket' and type_note='first_level'
				  ";
		$query = $this->db->query($select);
	
		return $query;
	}

	function data_up2TM($id_ticket)
	{
		$select = "	SELECT * FROM td_child_note
					WHERE id_ticket ='$id_ticket' and type_state='Update to TM'
				  ";
		$query = $this->db->query($select);
	
		return $query;
	}


	function find_column_tracker($id)
	{
		$select = "	SELECT * FROM report_set_column
					WHERE report_id ='$id'
				  ";
		$query = $this->db->query($select);
	
		return $query;
	}

	function get_id_tracker($id)
	{
		$select = "
					SELECT *
              		FROM report_register
    				WHERE id = '$id'
				  ";

		$query = $this->db->query($select);
    
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              return $report_id = $data->report_id;
            }
        }
	}


	function get_name_column($col)
	{
		$select = "
					SELECT *
              		FROM report_data_column
    				WHERE id = '$col'
				  ";

		$query = $this->db->query($select);
    
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              return $name = $data->name;
            }
        }
	}


	//main line
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
        $Jum_x = $this->total_data($Report_ID);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$name = $data->name;
            	//echo $name.'<br>';
            	$span = $this->get_rowspan_cof($name,$start_date,$end_date);
            	echo '<tr>';
            	echo '<td rowspan="'.$span.'"><center>'.$name.'</center></td>';


            	$select = 	"
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
		        $select = 	"
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

		              	$select = 	"
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
            
            echo '<tr><td colspan="2"> <center> TOTAL </center> <td> <center>'.$Jum.'</center> </td> <td> <center>'.$Jum2.'</center> </td> </tr>';

            echo '</table>';
        }
	}
        
        
    function total_data($Report_ID)
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
                	$span = $this->get_rowspan($name);
                	//echo '<tr>';
                	//echo '<td rowspan="'.$span.'"><center>'.$name.'</center></td>';
    
    
                	$select = 	"
    								SELECT COUNT(a.Fault_Type) as Total FROM td_ticket_closed  as a
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
                    $select = 	"
    								SELECT DISTINCT(a.Fault_Type) FROM td_ticket_closed as a
    								LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
    								LEFT JOIN network as c ON b.ref_no = c.ps_no 
    								WHERE a.Portion='$name' AND (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.ps_no IS NOT NULL
    				  			";
                    
                    
    				$query = $this->db->query($select);
    		    	
    		        if ($query->num_rows() >0){ 
    		            foreach ($query->result() as $data) {
    		              	$Fault_Type = $data->Fault_Type;
    		              	//echo $Fault_Type.' - ';
    		              	//echo '<td><center>'.$Fault_Type.'</center></td>';
    
    		              	$select = 	"
    										SELECT COUNT(*) AS Total_Fault FROM td_ticket_closed as a
    										LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
    										LEFT JOIN network as c ON b.ref_no = c.ps_no
    										WHERE a.Fault_Type='$Fault_Type' AND a.Portion='$name' AND (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.ps_no IS NOT NULL
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


	function get_portion()
	{
		$select = "
					SELECT * FROM faulty_category_portion WHERE validity='valid'
				  ";

		$query = $this->db->query($select);
    
        return $query;
	}


	function get_total()
	{
		$select = 	"
								SELECT COUNT(Fault_Type) as Total FROM td_ticket_closed 
				  			";

		$query = $this->db->query($select);
    
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	return $Total = $data->Total;
             }
        }
	}


	function get_rowspan($name)
	{
		//$select = 	"
								//SELECT COUNT(Fault_Type) as Total FROM td_ticket_closed Where Portion='$name'
				  			//";
				  			
		$select = "SELECT * FROM td_ticket_closed Where Portion='$name' GROUP BY Fault_Type";
		
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

	function get_rowspan_cof($name,$start_date,$end_date)
	{
		//$select = 	"
								//SELECT COUNT(Fault_Type) as Total FROM td_ticket_closed Where Portion='$name'
				  			//";
				  			
		$select = "	SELECT * FROM td_ticket_closed as a  
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

	function visual_data_statistic_circuit_fault_report()
	{

	}

	function saveCanvas($data)
	{
		$this->db->insert('report_canvas',$data);
	}


	function ImgCanvas($Report_ID,$Type)
	{


		$select = 	"
								SELECT * FROM report_register Where id='$Report_ID'
				  			";

		$query = $this->db->query($select);
    
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	 $report_id = $data->report_id;
             }
        }


		$select = 	"
								SELECT * FROM report_canvas Where Report_ID='$report_id'
				  			";

		$query = $this->db->query($select);
    
		if($Type=='3'){
			$header = 'Statistic(Main Line)';
			$footer = '<br> <p> Chart : Statistic Report for '.$header.' <br>';
		} else if($Type=='4'){
			$header = 'Statistic(Backup Line)';
			$footer = '<br> <p> Chart : Statistic Report for '.$header.' <br>';
		} else if($Type=='5'){
			$header = 'Number Of Occurrence';
			$footer = '<br> <p> Chart : Occurrence report by category <br>';
		} else if($Type=='6'){
			$header = 'Total Hour Of Outage';
			$footer = '<br> <p> Graph : Total Hours Of Network Reported Down <br>';
		}

        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$name = $data->name;
              	$name = '		<center><br> <h2> '.$header.' </h2>
              					<img src="'.$name.'" class="img-rounded" alt="Cinque Terre"> 
              					'.$footer.'</center>
              			';		
              	return $name;
             }
        }
	}



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
                <h2> Statistic Of Circuit Fault Report </h2>
                <p> Below are the statistics of service downtime from <br> '.$mula.' until '.$tamat.' </p>
                <table class="mytable" border="1px solid">
                  <tr>
                    <th><center>TR Due To</center></th>
                    <th><center>Fault Category</center></th>
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
                  
        //echo $select;

        $query = $this->db->query($select);
        
        $Jum = 0;
        $Jum2 = 0;
        $Jum_x = $this->total_data_backup_line($Report_ID);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
                $name = $data->name;
                //echo $name.'<br>';
                $span = $this->get_rowspan($name);
                echo '<tr>';
                echo '<td rowspan="'.$span.'"><center>'.$name.'</center></td>';


                $select =   "
                                SELECT COUNT(a.Fault_Type) as Total FROM td_ticket_closed  as a
                                LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
                                LEFT JOIN network as c ON b.ref_no = c.bs_no
                                WHERE (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.bs_no IS NOT NULL
                            ";
                            
                //echo $select;

                $query = $this->db->query($select);
            
                if ($query->num_rows() >0){ 
                    foreach ($query->result() as $data) {
                        $Total = $data->Total;
                     }
                }
                
                
                
                
                
                

                // data list 
                $select =   "
                                SELECT DISTINCT(a.Fault_Type) FROM td_ticket_closed as a
                                LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
                                LEFT JOIN network as c ON b.ref_no = c.bs_no 
                                WHERE a.Portion='$name' AND (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.bs_no IS NOT NULL
                            ";
                
                //echo $select;
                
                $query = $this->db->query($select);
                
                if ($query->num_rows() >0){ 
                    foreach ($query->result() as $data) {
                        $Fault_Type = $data->Fault_Type;
                        //echo $Fault_Type.' - ';
                        echo '<td><center>'.$Fault_Type.'</center></td>';

                        $select =   "
                                        SELECT COUNT(*) AS Total_Fault FROM td_ticket_closed as a
                                        LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
                                        LEFT JOIN network as c ON b.ref_no = c.bs_no
                                        WHERE a.Fault_Type='$Fault_Type' AND a.Portion='$name' AND (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.bs_no IS NOT NULL
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
            
            echo '<tr><td colspan="2"> <center> TOTAL </center> <td> <center>'.$Jum.'</center> </td> <td> <center>'.$Jum2.'</center> </td> </tr>';

            echo '</table>';
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
                        LEFT JOIN network as d ON c.ref_no = d.ps_no
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
                    $span = $this->get_rowspan($name);
                    //echo '<tr>';
                    //echo '<td rowspan="'.$span.'"><center>'.$name.'</center></td>';
    
    
                    $select =   "
                                    SELECT COUNT(a.Fault_Type) as Total FROM td_ticket_closed  as a
                                    LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
                                    LEFT JOIN network as c ON b.ref_no = c.bs_no
                                    WHERE (a.created_date BETWEEN '$start_date' AND '$end_date')  AND c.bs_no IS NOT NULL
                                ";
                                
                    
    
                    $query = $this->db->query($select);
                
                    if ($query->num_rows() >0){ 
                        foreach ($query->result() as $data) {
                            $Total = $data->Total;
                         }
                    }
    
    
    
    
                    // total data
                    $select =   "
                                    SELECT DISTINCT(a.Fault_Type) FROM td_ticket_closed as a
                                    LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
                                    LEFT JOIN network as c ON b.ref_no = c.ps_no 
                                    WHERE a.Portion='$name' AND (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.bs_no IS NOT NULL
                                ";
                    
                    
                    $query = $this->db->query($select);
                    
                    if ($query->num_rows() >0){ 
                        foreach ($query->result() as $data) {
                            $Fault_Type = $data->Fault_Type;
                            //echo $Fault_Type.' - ';
                            //echo '<td><center>'.$Fault_Type.'</center></td>';
    
                            $select =   "
                                            SELECT COUNT(*) AS Total_Fault FROM td_ticket_closed as a
                                            LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
                                            LEFT JOIN network as c ON b.ref_no = c.bs_no
                                            WHERE a.Fault_Type='$Fault_Type' AND a.Portion='$name' AND (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.bs_no IS NOT NULL
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

	function data_number_of_occurerence($Report_ID)
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
				<h2> Number Of Occurrence Outage </h2>
				<p> Below are the Number of occurrence outage from <br> '.$mula.' until '.$tamat.' </p>
				<table class="mytable" border="1px solid">
				  <tr>
				    <th><center>Num</center></th>
				    <th><center>Location Of Fault</center></th>
				    <th><center>Number Of Occurrence</center></th>
				  </tr>
			 ';


		$select = 	"
						SELECT COUNT(*) AS Full_Total
						FROM `td_ticket_closed`
						WHERE Ticket_Validation_Outage ='Valid' 
						AND (created_date BETWEEN '$start_date' AND '$end_date')
					";
		
		$query = $this->db->query($select);
    	
        if ($query->num_rows() >0){ 
        	$count = 1;
            foreach ($query->result() as $data) {
              	$Full_Total = $data->Full_Total;
            }
        }


		$select = 	"
						SELECT Portion as Fault_Type,COUNT(Portion) AS Total 
						FROM `td_ticket_closed`
						WHERE Ticket_Validation_Outage ='Valid' 
						AND (created_date BETWEEN '$start_date' AND '$end_date')
						GROUP BY Portion
					";


		
		$query = $this->db->query($select);
    	
        if ($query->num_rows() >0){ 
        	$count = 1;
            foreach ($query->result() as $data) {
              	$Fault_Type = $data->Fault_Type;
              	$Total = $data->Total;
              	//$Full_Total = $data->Full_Total;

              	echo '<tr><td><center>'.$count.'</center></td><td><center>'.$Fault_Type.'</center></td><td><center>'.$Total.'</center></td></tr>';

              	$count++;
            }

            echo '<tr><td colspan="2"> <center> TOTAL </center> <td> <center>'.$Full_Total.'</center> </td></tr>';
        }

        echo "</table>";

	}


	function getReport_Type($data)
	{
		$select = "SELECT * FROM report_register WHERE id='$data'";
		$query = $this->db->query($select);

        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	return $report_type = $data->report_type;
            }
        }
	}


	function data_total_hours($Report_ID)
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
				<h2> Total Hours Of Outage </h2>
				<p> Total hours by Category from <br> '.$mula.' until '.$tamat.' </p>
				<table class="mytable" border="1px solid">
				  <tr>
				    <th><center>Num</center></th>
				    <th><center>Location Of Fault</center></th>
				    <th><center>Number Of Occurrence</center></th>
				  </tr>
			 ';


		$select = 	"
						SELECT COUNT(*) AS Full_Total
						FROM `td_ticket_closed`
						WHERE Ticket_Validation_Outage ='Valid' 
						AND (created_date BETWEEN '$start_date' AND '$end_date')
					";
		
		$query = $this->db->query($select);
    	
        if ($query->num_rows() >0){ 
        	$count = 1;
            foreach ($query->result() as $data) {
              	$Full_Total = $data->Full_Total;
            }
        }

       

		$select = 	"
						SELECT a.Fault_Type,COUNT(a.Fault_Type) AS Total, a.Portion ,
						a.working_time_closed , a.total_time_closed, a.created_date as end_date,
						b.created_date as first_date,b.id_ticket
						FROM `td_ticket_closed` as a
						LEFT JOIN td_register_ticket as b ON a.id_ticket = b.id_ticket 
						WHERE a.Ticket_Validation_Outage ='Valid' 
						AND (a.created_date BETWEEN '$start_date' AND '$end_date')
						GROUP BY a.Portion
					";


		
		$query = $this->db->query($select);
    	
		$maso = '';

        if ($query->num_rows() >0){ 
        	$count = 1;
            foreach ($query->result() as $data) {
              	$Fault_Type = $data->Fault_Type;
              	$Total = $data->Total;
              	$Portion = $data->Portion;
              	$working_time_closed = $data->working_time_closed;
              	$total_time_closed = $data->total_time_closed;
              	$end = '"'.$data->end_date.'"';
              	$first = '"'.$data->first_date.'"';
              	$id_ticket = $data->id_ticket;
              	//$Full_Total = $data->Full_Total;


              	date_default_timezone_set("Asia/Kuala_Lumpur");
		        $timeReg =date("H:i:s");
		        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
		        $current = "'".$dateReg.' '.$timeReg."'"; //current date 


		        if(empty($end)){
		        	$select = "
								SELECT (UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(".$first.")) AS minit 
								
							  ";

		        } else {
		        	$select = "
								SELECT (UNIX_TIMESTAMP(".$end.") - UNIX_TIMESTAMP(".$first.")) AS minit 
								
							  ";
		        }

              	
              		

					//echo $select.'<br>';

					$query = $this->db->query($select);
			    	
			        if ($query->num_rows() >0){ 
			        	
			            foreach ($query->result() as $data) {
			              	$minit = $data->minit;

			              	//echo 'm: '.$minit.'<br>';

			              	$maso = $minit + $maso;
			            }
			            //echo 'm: '.$maso.'<br>';

			            $seconds = $maso;
		              	$hours = floor($seconds / 3600);
						$minutes = floor(($seconds / 60) % 60);
					    $seconds = $seconds % 60;

					    $maso =  $hours.' : '.$minutes.' : '.$seconds;
			        }	
              	
              	



              	if($Portion=='BIT support'){
              		$time  = $total_time_closed;
              	} else {
              		$time  = $working_time_closed;
              	}

              	echo '<tr><td><center>'.$count.'</center></td><td><center>'.$Portion.'</center></td><td><center>'.$time.'</center></td></tr>';

              	$count++;
            }

            echo '<tr><td colspan="2"> <center> TOTAL </center> <td> <center>'.$maso.'</center> </td></tr>';
        }

        echo "</table>";

	}


	function data_type_first_level($id_ticket)
	{
		$select = "	SELECT * FROM td_child_note
					WHERE id_ticket ='$id_ticket' AND type_state='First Level'
				  ";
		$query = $this->db->query($select);
	
		return $query;
	}


	function data_type_new_level($id_ticket)
	{
		$select = "	SELECT * FROM td_child_note
					WHERE id_ticket ='$id_ticket' AND type_state='New'
				  ";
		$query = $this->db->query($select);
	
		return $query;
	}

	function data_1st_level($new,$first_level,$id_ticket)
	{
		$select = 	"
						SELECT
						FLOOR(HOUR(TIMEDIFF('".$new."', '".$first_level."')) / 24) as HARI,
						MOD(HOUR(TIMEDIFF('".$new."', '".$first_level."')), 24) as JAM,
						MINUTE(TIMEDIFF('".$new."', '".$first_level."')) as MINIT,
						(UNIX_TIMESTAMP('".$first_level."') - UNIX_TIMESTAMP('".$new."')) as minit
						FROM td_child_note as a
						WHERE id_ticket='$id_ticket'
					";
		$query = $this->db->query($select);
        
        return $query;
		
	}

	function get_escalation_1st_response($sla)
	{
		$select = "SELECT * FROM sla WHERE sla='$sla' AND validity!='Deleted'";
		$query = $this->db->query($select);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	return $first_response = $data->first_response;
            }
        }
	}


	function get_escalation_solution_time($sla)
	{
		$select = "SELECT * FROM sla WHERE sla='$sla' AND validity!='Deleted'";
		$query = $this->db->query($select);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	return $solution_time = $data->solution_time;
            }
        }
	}


	function data_working_time($id_ticket_find)
	{
		$select = "	SELECT * FROM td_ticket_closed
					WHERE id_ticket ='$id_ticket_find'
				  ";
		$query = $this->db->query($select);
	
		return $query;
	}


	function get_total_time_ticket($id_ticket_find)
	{
		$select = "SELECT * FROM td_ticket_closed WHERE id_ticket='$id_ticket_find'";
		$query = $this->db->query($select);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	return $total_time_closed = $data->total_time_closed;
            }
        }
	}

	function getBreach($sla)
	{
		$select = "SELECT * FROM sla WHERE sla='$sla' AND validity!='Deleted'";
		$query = $this->db->query($select);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	return $sla_breach = $data->sla_breach;
            }
        }
	}


	function data_1()
	{
		$select = "	SELECT * FROM td_register_ticket as a
					LEFT JOIN  agent as b ON b.userid = a.created_by
					LIMIT 10;
				  ";

		$query = $this->db->query($select);
	
		return $query;
	}


	function data_2($severity)
	{
		$select = "	SELECT * FROM td_register_ticket as a
					LEFT JOIN  sla_severity as b ON b.id = a.severity
					WHERE b.id='$severity';
				  ";

		$query = $this->db->query($select);
	
		return $query;
	}

	function data_3($id_ticket)
	{
		$select = "	SELECT * FROM td_register_ticket as a
					LEFT JOIN  td_parent_note as b ON b.id_ticket = a.id_ticket
					WHERE b.id_ticket='$id_ticket';
				  ";

		$query = $this->db->query($select);
	
		return $query;
	}

	function data_4($id_ticket)
	{
		$select = "	SELECT * FROM td_register_ticket as a
					LEFT JOIN  td_child_note as b ON b.id_ticket = a.id_ticket
					WHERE b.id_ticket='$id_ticket';
				  ";

		$query = $this->db->query($select);
	
		return $query;
	}

	function data_5($created_by)
	{
		$select = "	SELECT * FROM td_register_ticket as a
					LEFT JOIN  agent as b ON b.userid = a.created_by
					WHERE b.userid='$created_by';
				  ";

		$query = $this->db->query($select);
	
		return $query;
	}

	function data_test()
	{
		$select = "	SELECT  
					a.created_date as date_issue,
					a.created_by as report_by,
					a.location as location,
					a.id_ticket as id_ticket,
					a.ref_no as device_no,
					CONCAT(c.title, '- ', c.text_editor) as problem_detail,
					b.title as log_severity,
					CONCAT(a.fault_itsm_category, '- ', a.problem_desc_itsm) as subcat,
					d.created_date as solution_date,
					d.type_state as status,
					d.text_editor as solution,
					a.ticket_responsibilty as responsibility
					FROM td_register_ticket as a
					LEFT JOIN sla_severity as b ON b.id = a.severity
					LEFT JOIN td_parent_note as c ON c.id_ticket = a.id_ticket
					LEFT JOIN  td_child_note as d ON d.id_ticket = a.id_ticket
					ORDER BY a.id_ticket, a.created_date DESC
					
				  ";
		//var_dump($select); exit();
		$query = $this->db->query($select);
	
		return $query;
	}


	function report_hospital($start,$end,$id)
	{
		switch ($id) {
			case '1':	$where = "AND a.fault_itsm_category='Hardware' AND c.type='Incident'";
				break;

			case '2':	$where = "AND (a.fault_itsm_category='HIS Application' OR a.fault_itsm_category='Non-HIS Application') AND c.type='Incident' ";
				break;

			case '3':	$where = "AND a.fault_itsm_category='Network' AND c.type='Incident'";
				break;

			case '4':	$where = "AND (a.fault_itsm_category='Non-HIS Application' AND a.problem_desc_itsm='PACS') AND c.type='Incident'";
				break;

			case '5':	$where = "AND a.fault_itsm_category='System' AND c.type='Incident'";
				break;

			case '6':	$where = "";
				break;
			
			case '7':	$where = "AND a.current_state='Pending' AND c.type='Incident'";
				break;

			case '8':	$where = "AND c.type='Change Request'";
				break;

			default:	$where = '';
				break;
		}

		$select = "	SELECT  
					a.created_date as date_issue,
					a.created_by as report_by,
					a.location as location,
					a.id_ticket as id_ticket,
					a.ref_no as device_no,
					CONCAT(c.title, '- ', c.text_editor) as problem_detail,
					b.title as log_severity,
					CONCAT(a.fault_itsm_category, '- ', a.problem_desc_itsm) as subcat,
					d.created_date as solution_date,
					d.type_state as status,
					d.text_editor as solution,
					a.ticket_responsibilty as responsibility,
					a.current_state
					FROM td_register_ticket as a
					LEFT JOIN sla_severity as b ON b.id = a.severity
					LEFT JOIN td_parent_note as c ON c.id_ticket = a.id_ticket
					LEFT JOIN  td_child_note as d ON d.id_ticket = a.id_ticket
					WHERE (a.created_date BETWEEN '$start' AND '$end') $where
					ORDER BY a.id_ticket, a.created_date DESC
					
				  ";
		//var_dump($select); exit();
		$query = $this->db->query($select);
	
		return $query;
	}

	function log_activities_report($data)
	{
		$this->db->insert('log_activities',$data);
	}


	function hospital_report_sla($start,$end)
	{
		$select = "	SELECT  
					a.created_date as date_issue,
					a.created_by as report_by,
					a.location as location,
					a.id_ticket as id_ticket,
					a.ref_no as device_no,
					CONCAT(c.title, '- ', c.text_editor) as problem_detail,
					b.title as log_severity,
					CONCAT(a.fault_itsm_category, '- ', a.problem_desc_itsm) as subcat,
					d.created_date as solution_date,
					d.type_state as status,
					d.text_editor as solution,
					a.ticket_responsibilty as responsibility,
					a.current_state,
					a.sla,a.severity,
					b.minute as time_severity,
					e.created_date as close_date,
					e.total_time_closed as total_time_date
					FROM td_register_ticket as a
					LEFT JOIN sla_severity as b ON b.id = a.severity
					LEFT JOIN td_parent_note as c ON c.id_ticket = a.id_ticket
					LEFT JOIN  td_child_note as d ON d.id_ticket = a.id_ticket
					LEFT JOIN  td_ticket_closed as e ON e.id_ticket = a.id_ticket
					WHERE (a.created_date BETWEEN '$start' AND '$end') 
					ORDER BY a.id_ticket, a.created_date DESC
					
				  ";
		

		// echo '<pre>';
		// var_dump($select); exit();
		// echo '</pre>';

		$query = $this->db->query($select);
	
		return $query;
	}


	function get_total_minute($created_date,$closed_date,$id_ticket)
	{
		$select = 	"
							SELECT
							(UNIX_TIMESTAMP('".$closed_date."') - UNIX_TIMESTAMP('".$created_date."'))
							as total_time,a.id_ticket
							FROM td_register_ticket as a
							WHERE a.id_ticket = '".$id_ticket."'
						";

		$query = $this->db->query($select);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	 $total_time = $data->total_time;
              	 $total_time = floor(($total_time / 60) % 60);
              	 $id_ticket = $data->id_ticket;

              	 return $total_time;
              	 // return $id_ticket.' - '.$total_time.'Start Date '.$created_date.' End Date '.$closed_date;
            }
        }
	}

	function hospital_report_sla_by_id($start,$end,$id_ticket)
	{
		$select = "	SELECT  
					a.created_date as date_issue,
					a.created_by as report_by,
					a.location as location,
					a.id_ticket as id_ticket,
					a.ref_no as device_no,
					CONCAT(c.title, '- ', c.text_editor) as problem_detail,
					b.title as log_severity,
					CONCAT(a.fault_itsm_category, '- ', a.problem_desc_itsm) as subcat,
					d.created_date as solution_date,
					d.type_state as status,
					d.text_editor as solution,
					a.ticket_responsibilty as responsibility,
					a.current_state,
					a.sla,a.severity,
					b.minute as time_severity,
					e.created_date as close_date,
					e.total_time_closed as total_time_date
					FROM td_register_ticket as a
					LEFT JOIN sla_severity as b ON b.id = a.severity
					LEFT JOIN td_parent_note as c ON c.id_ticket = a.id_ticket
					LEFT JOIN  td_child_note as d ON d.id_ticket = a.id_ticket
					LEFT JOIN  td_ticket_closed as e ON e.id_ticket = a.id_ticket
					WHERE (a.created_date BETWEEN '$start' AND '$end') AND a.id_ticket='$id_ticket' 
					ORDER BY a.id_ticket, a.created_date DESC
					
				  ";
		

		// echo '<pre>';
		// var_dump($select); exit();
		// echo '</pre>';

		$query = $this->db->query($select);
	
		return $query;
	}


	function hospital_report_same($start,$end,$id)
	{
		switch ($id) {
			case '1':	$where = "AND a.fault_itsm_category='Hardware' AND c.type='Incident'";
				break;

			case '2':	$where = "AND (a.fault_itsm_category='HIS Application' OR a.fault_itsm_category='Non-HIS Application') AND c.type='Incident' ";
				break;

			case '3':	$where = "AND a.fault_itsm_category='Network' AND c.type='Incident'";
				break;

			case '4':	$where = "AND (a.fault_itsm_category='Non-HIS Application' AND a.problem_desc_itsm='PACS') AND c.type='Incident'";
				break;

			case '5':	$where = "AND a.fault_itsm_category='System' AND c.type='Incident'";
				break;

			case '6':	$where = "";
				break;
			
			// case '7':	$where = "AND a.current_state='Pending' AND c.type='Incident'";
			// 	break;

			case '7':	$where = "AND a.current_state!='Resolved' AND c.type='Incident'";
				break;

			case '8':	$where = "AND c.type='Change Request'";
				break;

			default:	$where = '';
				break;
		}

		$select = "	SELECT 
					a.id_ticket as id_ticket,d.type_state as status
					FROM td_register_ticket as a
					LEFT JOIN sla_severity as b ON b.id = a.severity
					LEFT JOIN td_parent_note as c ON c.id_ticket = a.id_ticket
					LEFT JOIN  td_child_note as d ON d.id_ticket = a.id_ticket
					WHERE (a.created_date BETWEEN '$start' AND '$end') $where AND d.type_state='New'
					ORDER BY a.id_ticket, a.created_date DESC
					
					
				  ";
		//var_dump($select); exit();
		$query = $this->db->query($select);
	
		return $query;
	}

	function hospital_report_same_by_id($start,$end,$id_ticket,$id)
	{
		switch ($id) {
			case '1':	$where = "AND a.fault_itsm_category='Hardware' AND c.type='Incident' AND a.id_ticket='$id_ticket'";
				break;

			case '2':	$where = "AND (a.fault_itsm_category='HIS Application' OR a.fault_itsm_category='Non-HIS Application') AND c.type='Incident' AND a.id_ticket='$id_ticket'";
				break;

			case '3':	$where = "AND a.fault_itsm_category='Network' AND c.type='Incident' AND a.id_ticket='$id_ticket'";
				break;

			case '4':	$where = "AND (a.fault_itsm_category='Non-HIS Application' AND a.problem_desc_itsm='PACS') AND c.type='Incident' AND a.id_ticket='$id_ticket'";
				break;

			case '5':	$where = "AND a.fault_itsm_category='System' AND c.type='Incident' AND a.id_ticket='$id_ticket'";
				break;

			case '6':	$where = "";
				break;
			
			// case '7':	$where = "AND a.current_state='Pending' AND c.type='Incident' AND a.id_ticket='$id_ticket'";
			// 	break;

			case '7':	$where = "AND a.current_state!='Resolved' AND c.type='Incident' AND a.id_ticket='$id_ticket'";
				break;

			case '8':	$where = "AND c.type='Change Request' AND a.id_ticket='$id_ticket'";
				break;

			default:	$where = '';
				break;
		}

		$select = "	SELECT  
					a.created_date as date_issue,
					a.created_by as report_by,
					a.location as location,
					a.id_ticket as id_ticket,
					a.ref_no as device_no,
					CONCAT(c.title, '- ', c.text_editor) as problem_detail,
					b.title as log_severity,
					CONCAT(a.fault_itsm_category, '- ', a.problem_desc_itsm) as subcat,
					d.created_date as solution_date,
					d.type_state as status,
					d.text_editor as solution,
					a.ticket_responsibilty as responsibility,
					a.current_state
					FROM td_register_ticket as a
					LEFT JOIN sla_severity as b ON b.id = a.severity
					LEFT JOIN td_parent_note as c ON c.id_ticket = a.id_ticket
					LEFT JOIN  td_child_note as d ON d.id_ticket = a.id_ticket
					WHERE (a.created_date BETWEEN '$start' AND '$end') $where
					ORDER BY a.id_ticket, a.created_date DESC
					
				  ";
		//var_dump($select); exit();
		$query = $this->db->query($select);
	
		return $query;
	}


	function generated_report_search($ticket_number,$date1,$date2,$subject,$responsible,$current_state,$category)
	{

		if(!empty($ticket_number)){
			$where_ticket_number = "AND id_ticket LIKE '%$ticket_number%'";
		} else {
			$where_ticket_number = '';
		}

		if(!empty($date1)){

			if(empty($date2)){
				$where_ticket1 = "AND start_date = '$date1'";
			} else {
				$where_ticket1 = "AND (start_date BETWEEN '$date1' AND '$date2')";
			}

			
		} else {
			$where_ticket_date1 = '';
		}

		if(!empty($date2)){
			if(empty($date1)){
				$where_ticket_date2 = "AND start_date = '$date2'";
			} else {
				$where_ticket_date2 = '';
			}
		} else {
			$where_ticket_date2 = '';
		}


		if(!empty($subject)){
			$where_subject = "AND title LIKE '%$subject%'";
		} else {
			$where_subject = '';
		}


		if(!empty($responsible)){
			$where_responsible = "AND ticket_responsibilty = '$responsible'";
		} else {
			$where_responsible = '';
		}

		if(!empty($current_state)){
			$where_current_state = "AND current_state = '$current_state'";
		} else {
			$where_current_state = '';
		}


		if(!empty($category)){
			$where_category = "AND fault_itsm_category = '$category'";
		} else {
			$where_category = '';
		}


		$select = "	SELECT  
					*
					FROM view_ticket
					WHERE id_ticket IS NOT NULL
					$where_ticket_number
					$where_ticket_date1
					$where_ticket_date2
					$where_subject
					$where_responsible
					$where_current_state
					$where_category
					LIMIT 20
					
				  ";
		//var_dump($select); exit();
		$query = $this->db->query($select);
	
		return $query;
	}

	function get_name_agent($id)
	{
		$select = "SELECT * FROM agent WHERE userid='$id'";
		//var_dump($select); exit();
		$query = $this->db->query($select);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	return $first_name = $data->first_name;
            }
        }
	}


	function get_customer_name($id)
	{
		$select = "SELECT a.first_name FROM customer_user as a  
				   LEFT JOIN td_child_custuser as b ON a.other_id = b.custUser
				   WHERE b.id_ticket='$id'";
		//var_dump($select); exit();
		$query = $this->db->query($select);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	return $first_name = $data->first_name;
            }
        }
	}


	function get_customer_email($id)
	{
		$select = "SELECT a.email FROM customer_user as a  
				   LEFT JOIN td_child_custuser as b ON a.other_id = b.custUser
				   WHERE b.id_ticket='$id'";
		//var_dump($select); exit();
		$query = $this->db->query($select);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	return $email = $data->email;
            }
        }
	}



}	


