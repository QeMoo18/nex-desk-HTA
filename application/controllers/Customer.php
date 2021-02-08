<?php
defined('BASEPATH') OR exit('No direct script access allowed');//ob_clean();
class Customer extends CI_Controller  {

  	public function __construct()
	{

			parent::__construct();
			$this->load->database();
			$this->load->library('session');
			$this->load->library('datatables');
			$this->load->model('Customer_model','Customer');
			$this->load->model('Admin_model','Admin');
			$this->load->helper('Lookup_helper'); //helpers
	}

   	public function CMC_Customer()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Customer',$idModule)))
        {

			$this->data['site_title'] = 'CMC_Customer';
			$this->load->view('template/header/header');
			$this->load->view('template/body/CMC_Customer/CMC_Customer',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}

	public function CMC_Form()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Customer',$idModule)))
        {

			$this->data['site_title'] = 'CMC_Form';
			$this->load->view('template/header/header');
			$this->load->view('template/body/CMC_Form/CMC_Form_v2',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}

	function Dtable_CMC_Customer_ViewList() //company
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Customer',$idModule)))
        {

			$cmc_search_customer = $this->input->post('cmc_search_customer');
			header('Content-Type: application/json');
      		echo $this->Customer->Dtable_CMC_Customer_ViewList($cmc_search_customer);

      		} else { 
          	$this->load->view('login');
        	}
	}

	function Dtable_CMC_CustomerUser_ViewList() //user
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Customer',$idModule)))
        {

			$cmc_search_customer = $this->input->post('cmc_search_customer');
			header('Content-Type: application/json');
      		echo $this->Customer->Dtable_CMC_CustomerUser_ViewList($cmc_search_customer);

      		} else { 
          	$this->load->view('login');
        	}
	}
	
	public function CMC_Form_Customer()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Customer',$idModule)))
        {

			$this->data['site_title'] = 'CMC_Form_Customer';
			$this->load->view('template/header/header');
			$this->load->view('template/body/CMC_Form_Customer/CMC_Form_Customer_v2',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}


	function cmc_details()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Customer',$idModule)))
        {

			$other_id = $this->input->post('other_id');
			$query = $this->Customer->cmc_form_details($other_id);
				if(empty($query)){
					echo 'Tiada Data Ditemui';
				} else {
				foreach ($query as $data) 
				{

				}
					echo json_encode($data);
				}

			} else { 
          	$this->load->view('login');
        	}
	}

	function cmc_form_details()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Customer',$idModule)))
        {

			$other_id = $this->input->post('other_id');
			$query = $this->Customer->cmc_details($other_id);
				if(empty($query)){
					echo 'Tiada Data Ditemui';
				} else {
				foreach ($query as $data) 
				{

				}
					echo json_encode($data);
				}

			} else { 
          	$this->load->view('login');
        	}
	}

	function CMC_AddCustomer()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Customer',$idModule)))
        {

		  $this->data['site_title'] = 'Validity_EditDetails';
		  $this->load->view('template/header/header');
		  $this->load->view('template/body/CMC_Form/CMC_AddCustomer',$this->data);
		  $this->load->view('template/footer/footer');

		  } else { 
          $this->load->view('login');
        }
	}

	function CMC_AddCustomerUser()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Customer',$idModule)))
        {

		  $this->data['site_title'] = 'Validity_EditDetails';
		  $this->load->view('template/header/header');
		  $this->load->view('template/body/CMC_Form_Customer/CMC_AddCustomerUser_v2',$this->data);
		  $this->load->view('template/footer/footer');

		  } else { 
          $this->load->view('login');
          }
	}
	
	function check_uname()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Customer',$idModule)))
        {

			$cmc_uname = $this->input->post('cmc_uname');
			echo $check = $this->Customer->check_uname($cmc_uname);

			} else { 
          	$this->load->view('login');
        	}
	}

	function check_fname()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Customer',$idModule)))
        {
			
			$cmc_fname = $this->input->post('cmc_fname');
			echo $check = $this->Customer->check_fname($cmc_fname);

			} else { 
          	$this->load->view('login');
        	}
	}
	

	function add_customer_user()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Customer',$idModule)))
        {

			$cmc_title = $this->input->post('cmc_title');
			$cmc_fname = $this->input->post('cmc_fname');
			$cmc_lname = $this->input->post('cmc_lname');
			$cmc_uname = $this->input->post('cmc_uname');
			
			$cmc_pwd = $this->input->post('cmc_pwd');
			//$cmc_pwd =  hash('sha256',$cmc_pwd);

			$cmc_email = $this->input->post('cmc_email');
			$cmc_custid = $this->input->post('cmc_custid');
			$cmc_phone = $this->input->post('cmc_phone');
			$cmc_fax = $this->input->post('cmc_fax');
			$cmc_mobile = $this->input->post('cmc_mobile');
			$cmc_street = $this->input->post('cmc_street');
			$cmc_postcode = $this->input->post('cmc_postcode');
			$cmc_city = $this->input->post('cmc_city');
			$cmc_country = $this->input->post('cmc_country');
			$cmc_comment = $this->input->post('cmc_comment');
			$cmc_valid = $this->input->post('cmc_valid');


			$updateBy = $this->session->userdata('userid');
	        date_default_timezone_set("Asia/Kuala_Lumpur");
	        $timeReg =date("h:i:s");
	        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
	        $datetime = $dateReg.' '.$timeReg;

			$other_id = rand();

			$data =array(
							"title_salutation"=>$cmc_title,
							"first_name"=>$cmc_fname,
							"last_name"=>$cmc_lname,
							"username"=>$cmc_uname,
							"password"=>$cmc_pwd,
							"email"=>$cmc_email,
							"customerID"=>$cmc_custid,
							"phone"=>$cmc_phone,
							"fax"=>$cmc_fax,
							"mobile"=>$cmc_mobile,
							"street"=>$cmc_street,
							"postcode"=>$cmc_postcode,
							"city"=>$cmc_city,
							"country"=>$cmc_country,
							"comment"=>$cmc_comment,
							"valid"=>$cmc_valid,
							"created"=>$datetime,
							"other_id"=>$other_id

						);

			$this->Customer->add_customer_user($data);

			$data = array(
	                      "type_activities"=>"Add Customer User ",
	                      "created_by"=>$updateBy,
	                      "other_id"=>$other_id
	                    );

	        $this->Admin->saveLog($data);

	        } else { 
          	$this->load->view('login');
        	}
	}

	/* START CUA */
	public function CUA_ViewList()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Customer',$idModule)))
        {

			$this->data['site_title'] = 'CMC_ViewList';
			$this->load->view('template/header/header');
			$this->load->view('template/body/CUA_ViewList/CUA_ViewList',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}

	public function CUA_FormCustomer()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Customer',$idModule)))
        {

			$this->data['site_title'] = 'CUA_FormCustomer';
			$this->load->view('template/header/header');
			$this->load->view('template/body/CUA_FormCustomer/CUA_FormCustomer',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}

	function Dtable_CUA_Customer_ViewList()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Customer',$idModule)))
        {

			header('Content-Type: application/json');
      		echo $this->Customer->Dtable_CUA_Customer_ViewList();

      		} else { 
          	$this->load->view('login');
        	}
	}
	/* END */

	/* CA */
	public function CA_ViewList()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Customer',$idModule)))
        {

			$this->data['site_title'] = 'CA_ViewList';
			$this->load->view('template/header/header');
			$this->load->view('template/body/CA_ViewList/CA_ViewList',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}
	
	public function CA_FormCustomer()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Customer',$idModule)))
        {

			$this->data['site_title'] = 'CA_FormCustomer';
			$this->load->view('template/header/header');
			$this->load->view('template/body/CA_FormCustomer/CA_FormCustomer_v2',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}

	function check_custID()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Customer',$idModule)))
        {

			$cmc_cname = $this->input->post('cmc_cname');
			echo $check = $this->Customer->check_custID($cmc_cname);

			} else { 
          	$this->load->view('login');
        	}
	}	

	function ca_addCustomer()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Customer',$idModule)))
        {

			$cmc_cname = $this->input->post('cmc_cname');
			$cmc_name = $this->input->post('cmc_name');
			$cmc_street2 = $this->input->post('cmc_street2');
			$cmc_poscode = $this->input->post('cmc_poscode');
			$cmc_ct = $this->input->post('cmc_ct');
			$cmc_country = $this->input->post('cmc_country');
			$cmc_url = $this->input->post('cmc_url');
			$cmc_comment2 = $this->input->post('cmc_comment2');
			$cmc_valid = $this->input->post('cmc_valid');

			$updateBy = $this->session->userdata('userid');
	        date_default_timezone_set("Asia/Kuala_Lumpur");
	        $timeReg =date("h:i:s");
	        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
	        $datetime = $dateReg.' '.$timeReg;

			$other_id = rand();

			$data = array(
							"customerID"=>$cmc_cname,
							"customer"=>$cmc_name,
							"street"=>$cmc_street2,
							"postcode"=>$cmc_poscode,
							"city"=>$cmc_ct,
							"country"=>$cmc_country,
							"URL"=>$cmc_url,
							"comment"=>$cmc_comment2,
							"valid"=>$cmc_valid,
							"created"=>$datetime,
							"other_id"=>$other_id
						 );

			$this->Customer->ca_addCustomer($data);

			$data = array(
                      "type_activities"=>"Add Customer ",
                      "created_by"=>$updateBy,
                      "other_id"=>$other_id
                    );

        	$this->Admin->saveLog($data);

        	} else { 
          	$this->load->view('login');
        	}
   	}

   	public function CA_EditDetails()
	{
		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Customer',$idModule)))
        {

			$this->data['site_title'] = 'CA_EditDetails';
			$this->load->view('template/header/header');
			$this->load->view('template/body/CA_EditDetails/CA_EditDetails',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}
	/* END */

	/* CU LINK LOC */
	public function CU_Link_Location()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Customer',$idModule)))
        {

		  $this->data['site_title'] = 'CU_Link_Location';
		  $this->load->view('template/header/header');
		  $this->load->view('template/body/CU_Link_Location/CU_Link_Location',$this->data);
		  $this->load->view('template/footer/footer');

		  } else { 
          $this->load->view('login');
          }

	}
	/* END */

	/* CMC LIN SERIVCE */
	public function CMC_Link_Service()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Customer',$idModule)))
        {

			$this->data['site_title'] = 'CMC_Link_Service';
			$this->load->view('template/header/header');
			$this->load->view('template/body/CMC_Link_Service/CMC_Link_Service',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}
	/* END */

}

 	