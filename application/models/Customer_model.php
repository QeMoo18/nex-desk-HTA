<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Customer_model extends CI_Model
  {
	  function __construct()
	  {
		    // Call the Model constructor
		    parent::__construct();
		    $this->db2 = $this->load->database('otrs', TRUE);
		    $this->datatables->set_database('otrs');
	  }

	  function Dtable_CMC_Customer_ViewList($cmc_search_customer)
	  {
	  		if(!empty($cmc_search_customer)){
	  			$this->db->or_like('customerID',$cmc_search_customer);
	  			$this->db->or_like('customer',$cmc_search_customer);
	  		}

	  		$where = "customerID,customer,valid,changed,created,other_id";

		  	$this->datatables->select($where);
			$this->datatables->from("customer");	
			$this->db->where("valid","Valid");	
			$this->db->order_by("customerID", "desc");
			$this->datatables->group_by($where);
			

			return $this->datatables->generate();
	  }

	  function Dtable_CMC_CustomerUser_ViewList($cmc_search_customer)
	  {
	  		if(!empty($cmc_search_customer)){
	  			$this->db->or_like('customerID',$cmc_search_customer);
	  			$this->db->or_like('first_name',$cmc_search_customer);
	  		}

	  		$where = "customerID,first_name,valid,changed,created,other_id";

		  	$this->datatables->select($where);
			$this->datatables->from("customer_user");
			$this->db->where("valid","Valid");
			$this->db->order_by("customerID", "desc");

			return $this->datatables->generate();
	  }
	  
	  function cmc_details($other_id){

	  		$select="SELECT * FROM `customer` WHERE other_id='$other_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 

	  }

	  function cmc_form_details($other_id){
	  		
	  		$select="SELECT * FROM `customer_user` WHERE other_id='$other_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 

	  }

	  function check_uname($cmc_uname)
	  {
	  		$where = "SELECT COUNT(*) AS TOTAL FROM customer_user WHERE username='$cmc_uname'";
			$query = $this->db2->query($where);
			if ($query->num_rows() >0){ 
			    foreach ($query->result() as $data) {
			    	return $data->TOTAL;
			    }
			} else {
				return '0';
			}
	  }

	  function check_fname($cmc_fname)
	  {
	  		$where = "SELECT COUNT(*) AS TOTAL FROM customer_user WHERE first_name='$cmc_fname'";
			$query = $this->db2->query($where);
			if ($query->num_rows() >0){ 
			    foreach ($query->result() as $data) {
			    	return $data->TOTAL;
			    }
			} else {
				return '0';
			}
	  }
	  
	  
	  function add_customer_user($data)
	  {
	  		$this->db2->insert('customer_user',$data);
	  }


	  /* CUA */
	  function Dtable_CUA_Customer_ViewList()
	  {
	  		$where = "username,first_name,email,changed,created,other_id";

		  	$this->datatables->select($where);
			$this->datatables->from("customer_user");	
			$this->datatables->where('valid','Valid');
			$this->datatables->group_by('username');
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }
	  /* END */

	  /* START CA */
	  function check_custID($cmc_cname)
	  {
	  		$where = "SELECT COUNT(*) AS TOTAL FROM customer WHERE customerID='$cmc_cname'";
			$query = $this->db2->query($where);
			if ($query->num_rows() >0){ 
			    foreach ($query->result() as $data) {
			    	return $data->TOTAL;
			    }
			} else {
				return '0';
			}
	  }

	  function ca_addCustomer($data)
	  {
	  		$this->db2->insert('customer',$data);
	  }
	  /* END */
  }
  