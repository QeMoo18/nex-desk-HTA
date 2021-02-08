<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mobile_model extends CI_Model
{
	function __construct()
	{
	    // Call the Model constructor
	    parent::__construct();
	    $this->db = $this->load->database('otrs', TRUE);
	    // $this->datatables->set_database('otrs');
	}

	function my_record($id)
	{

		$select="	SELECT * FROM ticket_mobile WHERE created_by='$id' ORDER BY id DESC LIMIT 10
				";
	  	$query= $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	            # code...
	            //$result[] = $data;
	        	$result[] = array(
	        						'id' => $data->id,
        							'title' => $data->title,
        							'created_date' =>$data->datetime,
        							'status'=> $data->status
	        				   );


	        }
	    		return $result; //hasil dari semua proses ada dimari
	    } else {

	    		$result[] = array('status'=> false);
	    		return $result; //hasil dari semua proses ada dimari
	    }

	}


	function login($email,$password)
	{
		$select="	SELECT username FROM `customer_user`
					WHERE email='$email' AND password='$password'
				";



	  	$query= $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	        	$username = $data->username;
	        	
	        }

	        //$result[] = array('status_user'=>true,'username'=>$username);
	        $result = $username;

	    } else {
	    	//$result[] = array('status_user'=>false);
	    	$result = false;
	    }

	    return $result;
	}

	function getDetail($id)
	{
		$select="	SELECT * FROM `td_child_note` as a
					WHERE a.id_ticket='$id'
				";
	  	$query= $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	            # code...
	            //$result[] = $data;
	        	$created_date = $data->created_date;
	        	$text_editor = $data->text_editor;
	        	$text_editor = strip_tags($text_editor);
	        	$text_editor = $this->clean($text_editor);
	        	// $text_editor = str_replace("&nbsp; ","",$text_editor);
	        	$type_state = $data->type_state;

	        	$result[] = array(
	        						'created_date' => $created_date,
        							'text_editor' => $text_editor,
        							'type_state' => $type_state,
        							'status'=> true
	        				   );


	        }
	    		return $result; //hasil dari semua proses ada dimari
	    } else {

	    		$result[] = array('status'=> false);
	    		return $result; //hasil dari semua proses ada dimari
	    }
	}

	function clean($str)
	{       
	    $str = utf8_decode($str);
	    $str = str_replace("&nbsp;", " ", $str);
	    $str = preg_replace('/\s+/', ' ',$str);
	    $str = trim($str);
	    return $str;
	}


	function getUser($username)
	{
		$select="	SELECT * FROM `customer_user` as a
					WHERE a.username='$username'
				";
	  	$query= $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	            # code...
	            //$result[] = $data;
	        	$first_name = $data->first_name;
	        	$last_name = $data->last_name;
	        	$phone = $data->phone;

	        	$result[] = array(
	        						'first_name' => $first_name,
        							'last_name' => $last_name,
        							'phone' => $phone,
        							'status'=> true
	        				   );


	        }
	    		return $result; //hasil dari semua proses ada dimari
	    } else {

	    		$result[] = array('status'=> false);
	    		return $result; //hasil dari semua proses ada dimari
	    }
	}

	function new_pwd($new_pwd,$uname)
	{
		$data = array('password'=>$new_pwd);
		$this->db->where('username',$uname);
		$this->db->update('customer_user',$data);
	}

	function getInfo($id)
	{
		$select="	SELECT * FROM `td_register_ticket` as a
					LEFT JOIN td_parent_note as b ON a.id_ticket = b.id_ticket
					WHERE a.id_ticket='$id'
				";
	  	$query= $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	            # code...
	            //$result[] = $data;
	        	$created_date = $data->created_date;
	        	$current_state = $data->current_state;
	        	$ticket_responsibilty = $data->ticket_responsibilty	;

	        	$title = $data->title;
	        	$text_editor = $data->text_editor;
	        	$text_editor = strip_tags($text_editor);
	        	$text_editor = $this->clean($text_editor);

	        	$id_ticket = $data->id_ticket;

	        	$result[] = array(
	        						'created_date' => $created_date,
        							'current_state' => $current_state,
        							'ticket_responsibilty' => $ticket_responsibilty	,
        							'title'=>$title,
        							'text_editor'=>$text_editor,
        							'id_ticket'=>$id_ticket,
        							'status'=> true
	        				   );


	        }
	    		return $result; //hasil dari semua proses ada dimari
	    } else {

	    		$result[] = array('status'=> false);
	    		return $result; //hasil dari semua proses ada dimari
	    }
	}	


	function created_ticket($data)
	{
		$this->db->insert('ticket_mobile',$data);

		$result[] = array(
								'status'=> true
	    				 );
		return $result;
	}


	function my_ticket($id)
	{

		$select="	SELECT * FROM `td_register_ticket` as a
					LEFT JOIN td_parent_note as b ON a.id_ticket = b.id_ticket
					LEFT JOIN td_child_custuser as c ON c.id_ticket = b.id_ticket
					WHERE c.custUser='$id'
				";

		//var_dump($select); exit();
	  	$query= $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	            # code...
	            //$result[] = $data;
	        	$result[] = array(
	        						'id' => $data->id_ticket,
        							'name' => $data->title,
        							'created_date' =>$data->created_date,
        							'ticket_status'=>$data->current_state,
        							'status'=> true
	        				   );


	        }
	    		return $result; //hasil dari semua proses ada dimari
	    } else {

	    		$result[] = array('status'=> false);
	    		return $result; //hasil dari semua proses ada dimari
	    }

	}

	function get_cust_id($id)
	{
		$select = "SELECT * FROM customer_user WHERE username='$id'";

		$query= $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	            # code...
	            //$result[] = $data;
	        	return $other_id = $data->other_id;

	        }
	    }
	}

}



