<?php if ( ! defined('BASEPATH')) exit('No direct script 
   access allowed');

	class Paging_model extends CI_Model
	{
		function __construct()
		{
		    // Call the Model constructor
		    parent::__construct();
		}



		public function Ticket_StatusView_Count($search = '') 
	    {
	        $this->db->select('count(*) as allcount');
	        $this->db->from("td_register_ticket a");
			$this->db->join('td_parent_note b', 'a.id_ticket = b.id_ticket', 'left');	
			$this->db->join('agent c', 'c.userid = a.created_by', 'left');		
			$this->db->where('a.status_ticket !=',"closed");
	     
	        // if($search != ''){
	        //   $this->db->group_start();
	        //   $this->db->like('datetime', $search);
	        //   $this->db->or_like('status', $search);
	        //   $this->db->or_like('subject', $search);
	        //   $this->db->or_like('from_email', $search);
	        //   $this->db->or_like('to_email', $search);
	        //   $this->db->or_like('cc', $search);
	        //   $this->db->group_end();
	        // }

	        //$this->db->order_by('id','desc');


			// if(!empty($segment))
			// {
			// 	if($segment=='new')
			// 	{
			// 		$this->datatables->where('a.status_ticket',"new");
			// 	}
			// 	if($segment=='open')
			// 	{
			// 		$this->datatables->where('a.status_ticket',"open");
			// 	}
			// 	if($segment=='pending')
			// 	{
			// 		$this->datatables->where('a.status_ticket',"pending");
			// 	}
			// }


	        $query = $this->db->get();
	        $result = $query->result_array();
	     
	        return $result[0]['allcount'];
	    }


		function Ticket_StatusView_Data($rowno,$rowperpage,$search)
	    {

	    	date_default_timezone_set("Asia/Kuala_Lumpur");
	        $timeReg =date("H:i:s");
	        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
	        $current = "'".$dateReg.' '.$timeReg."'"; //current date 


	        $this->db->order_by('a.id','desc');

	        $where = "	a.status_lock,
					a.id_ticket as id_no ,
					b.title,a.status_ticket, a.current_state,
					(UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(a.created_date)) AS created_date,
					(UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(a.updated_date))
					as updated_date,
					c.username as ticket_owner,
					a.id_ticket,a.ticket_responsibilty,a.fault_itsm_category as category";

		  	$this->db->select($where);
			$this->db->from("td_register_ticket a");
			$this->db->join('td_parent_note b', 'a.id_ticket = b.id_ticket', 'left');	
			$this->db->join('agent c', 'c.userid = a.created_by', 'left');		
			$this->db->where('a.status_ticket !=',"closed");

	        // if(!empty($segment))
			// {
			// 	if($segment=='new')
			// 	{
			// 		$this->datatables->where('a.status_ticket',"new");
			// 	}
			// 	if($segment=='open')
			// 	{
			// 		$this->datatables->where('a.status_ticket',"open");
			// 	}
			// 	if($segment=='pending')
			// 	{
			// 		$this->datatables->where('a.status_ticket',"pending");
			// 	}
			// }


	        $this->db->limit($rowperpage, $rowno); 
	        $query = $this->db->get();
	     
	        return $query->result_array();
	    }








	}