<?php
defined('BASEPATH') OR exit('No direct script access allowed');//ob_clean();
class CMDB extends CI_Controller  {

	public function __construct()
	{
			parent::__construct();
			$this->load->database();
			$this->load->library('session');
			$this->load->library('datatables');
			$this->load->model('CMDB_model','CMDB');
			$this->load->helper('Lookup_helper'); //helpers
	    	$this->load->model('Admin_model','Admin');
			$this->load->model('Dbase_lookup','lookup');
	}


	/* START COMPUTER */
	public function cmdb_computer_ViewList()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$this->data['site_title'] = 'cmdb_computer_ViewList';
			$this->load->view('template/header/header');
			$this->load->view('template/body/cmdb_computer_ViewList/cmdb_computer_ViewList',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}

	public function cmdb_computer_add()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$this->data['site_title'] = 'cmdb_computer_add';
			$this->load->view('template/header/header');
			$this->load->view('template/body/cmdb_computer_add/cmdb_computer_add',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}


	function Dtable_CMDB_Computer_ViewList()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			header('Content-Type: application/json');
      		echo $this->CMDB->Dtable_CMDB_Computer_ViewList();

      		} else { 
          	$this->load->view('login');
        	}
	}

	public function CMDB_Computer_EditDetails()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$this->data['site_title'] = 'CMDB_Computer_EditDetails';
			$this->load->view('template/header/header');
			$this->load->view('template/body/CMDB_Computer_EditDetails/CMDB_Computer_EditDetails',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}

	function cmdb_computer_addcom()
	{

		//exit();

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$cmdb_computer_name = $this->input->post('cmdb_computer_name');
			$cmdb_computer_deploymentstate = $this->input->post('cmdb_computer_deploymentstate');
			$cmdb_computer_incidentstate = $this->input->post('cmdb_computer_incidentstate');
			$cmdb_computer_vendor = $this->input->post('cmdb_computer_vendor');
			$cmdb_computer_model = $this->input->post('cmdb_computer_model');
			$cmdb_computer_desc = $this->input->post('cmdb_computer_desc');
			$cmdb_computer_type = $this->input->post('cmdb_computer_type');
			$cmdb_computer_owner = $this->input->post('cmdb_computer_owner');
			$cmdb_computer_serialno = $this->input->post('cmdb_computer_serialno');
			$cmdb_computer_os = $this->input->post('cmdb_computer_os');
			$cmdb_computer_cpu = $this->input->post('cmdb_computer_cpu');
			$cmdb_computer_ram = $this->input->post('cmdb_computer_ram');
			$cmdb_computer_hardisk = $this->input->post('cmdb_computer_hardisk');
			$cmdb_computer_cpacity = $this->input->post('cmdb_computer_cpacity');
			$cmdb_computer_fqdn = $this->input->post('cmdb_computer_fqdn');
			$cmdb_computer_netadapter = $this->input->post('cmdb_computer_netadapter');
			$cmdb_computer_graphic = $this->input->post('cmdb_computer_graphic');
			$cmdb_computer_other = $this->input->post('cmdb_computer_other');
			$cmdb_computer_waranty = $this->input->post('cmdb_computer_waranty');
			$cmdb_computer_install = $this->input->post('cmdb_computer_install');
			$cmdb_computer_note = $this->input->post('cmdb_computer_note');


			$cmdb_computer_note = $this->input->post('cmdb_computer_note');


			$cmdb_computer_location = $this->input->post('cmdb_computer_location');

			$other_id = rand();


			$updateBy = $this->session->userdata('userid');
	        date_default_timezone_set("Asia/Kuala_Lumpur");
	        $timeReg =date("h:i:s");
	        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
	        $datetime = $dateReg.' '.$timeReg;


	        //generator scanner code
			$this->load->library('ciqrcode');

			$random_name = 'C'.rand();
			$config_id = 'C'.date("Ymd").rand(1000,9999);

			// $base_img = 'http://10.0.20.81/qr_code/nav/details_item/';
			$base_img = 'http://localhost/qr_code/nav/details_item/';

			$params['data'] = $base_img.$other_id;
			$params['level'] = 'H';
			$params['size'] = 10;
			$params['savename'] = FCPATH.'qr_image/'.$random_name.'.png';
			$this->ciqrcode->generate($params);


			$COMP_ip = $this->input->post('COMP_ip');
			$COMP_mac = $this->input->post('COMP_ip');


			$network_port = $this->input->post('network_port');
			$cpu_model = $this->input->post('cpu_model');
			$cpu_core = $this->input->post('cpu_core');
			$cpu_serial_no = $this->input->post('cpu_serial_no');
			$processor_type = $this->input->post('processor_type');
			$monitor_brand = $this->input->post('monitor_brand');
			$monitor_model = $this->input->post('monitor_model');
			$monitor_serial_no = $this->input->post('monitor_serial_no');
			$ups_brand = $this->input->post('ups_brand');
			$ups_model = $this->input->post('ups_model');
			$ups_serial_no = $this->input->post('ups_serial_no');
			

			$data = array(
							"name"=>$cmdb_computer_name,
							"deployment_state"=>$cmdb_computer_deploymentstate,
							"incident_state"=>$cmdb_computer_incidentstate,
							"vendor"=>$cmdb_computer_vendor,
							"model"=>$cmdb_computer_model,
							"description"=>$cmdb_computer_desc,
							"type"=>$cmdb_computer_type,
							"owner"=>$cmdb_computer_owner,
							"serial_number"=>$cmdb_computer_serialno,
							"operating_system"=>$cmdb_computer_os,
							"CPU"=>$cmdb_computer_cpu,
							"Ram"=>$cmdb_computer_ram,
							"HardDisk"=>$cmdb_computer_hardisk,
							"capacity"=>$cmdb_computer_cpacity,
							"FQDN"=>$cmdb_computer_fqdn,
							"network_adapter"=>$cmdb_computer_netadapter,
							"graphic_adapter"=>$cmdb_computer_graphic,
							"other_equipment"=>$cmdb_computer_other,
							"warranty_expiration_date"=>$cmdb_computer_waranty,
							"install_date"=>$cmdb_computer_install,
							"note"=>$cmdb_computer_note,
							"changed"=>$datetime,
							"other_id"=>$other_id,
							"location"=>$cmdb_computer_location,
							"qr_code"=>$random_name,
                          	"config_id"=>$config_id,
                          	"validity"=>"Valid",
                          	"ip"=>$COMP_ip,
							"network_port"=>$network_port,
							"cpu_model"=>$cpu_model,
							"cpu_core"=>$cpu_core,
							"cpu_serial_no"=>$cpu_serial_no,
							"processor_type"=>$processor_type,
							"monitor_brand"=>$monitor_brand,
							"monitor_model"=>$monitor_model,
							"monitor_serial_no"=>$monitor_serial_no,
							"ups_brand"=>$ups_brand,
							"ups_model"=>$ups_model,
							"ups_serial_no"=>$ups_serial_no,
							"mac_address"=>$COMP_mac
						 );

			$this->CMDB->cmdb_computer_add($data);

			//save log table log activities
	        $data = array(
	                      "type_activities"=>"CMDB Add Computer ",
	                      "created_by"=>$updateBy,
	                      "other_id"=>$other_id
	                    );

	        $this->Admin->saveLog($data);

	        } else { 
          		$this->load->view('login');
        	}
	}

	function cmdb_computer_details()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$other_id = $this->input->post('other_id');
			$query = $this->CMDB->cmdb_computer_details($other_id);

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
	/* END */


	/* HARDWARE */
	public function CMDB_Hardware_ViewList()
	{
		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$this->data['site_title'] = 'CMDB_Hardware_ViewList';
			$this->load->view('template/header/header');
			$this->load->view('template/body/CMDB_Hardware_ViewList/CMDB_Hardware_ViewList',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}
	public function CMDB_Hardware_Add()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$this->data['site_title'] = 'CMDB_Hardware_Add';
			$this->load->view('template/header/header');
			$this->load->view('template/body/CMDB_Hardware_Add/CMDB_Hardware_Add',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}

	function getAllLoc()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {
			$data = $this->lookup->getAllLoc();

			} else { 
          	$this->load->view('login');
        	}
	}

	function Dtable_CMDB_Hardware_ViewList()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {
			header('Content-Type: application/json');
      		echo $this->CMDB->Dtable_CMDB_Hardware_ViewList();
      	} else { 
          	$this->load->view('login');
        	}
	}	

	function cmdb_hardware_addhard()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$cmdb_hardware_name = $this->input->post('cmdb_hardware_name');
			$cmdb_hardware_deploymentstate = $this->input->post('cmdb_hardware_deploymentstate');
			$cmdb_hardware_incidentstate = $this->input->post('cmdb_hardware_incidentstate');
			$cmdb_hardware_vendor = $this->input->post('cmdb_hardware_vendor');
			$cmdb_hardware_model = $this->input->post('cmdb_hardware_model');
			$cmdb_hardware_desc = $this->input->post('cmdb_hardware_desc');
			$cmdb_hardware_type = $this->input->post('cmdb_hardware_type');
			$cmdb_hardware_owner = $this->input->post('cmdb_hardware_owner');
			$cmdb_hardware_serialno = $this->input->post('cmdb_hardware_serialno');
			$cmdb_hardware_waranty = $this->input->post('cmdb_hardware_waranty');
			$cmdb_hardware_install = $this->input->post('cmdb_hardware_install');
			$cmdb_hardware_note = $this->input->post('cmdb_hardware_note');
			$cmdb_hardware_location = $this->input->post('cmdb_hardware_location');
			$cmdb_hardware_valid = $this->input->post('cmdb_hardware_valid');

			$other_id = rand();

			$updateBy = $this->session->userdata('userid');
	        date_default_timezone_set("Asia/Kuala_Lumpur");
	        $timeReg =date("h:i:s");
	        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
	        $datetime = $dateReg.' '.$timeReg;


	        //generator scanner code
			$this->load->library('ciqrcode');

			$random_name = 'H'.rand();
			$config_id = 'H'.date("Ymd").rand(1000,9999);

			// $base_img = 'http://10.0.20.81/qr_code/nav/details_item/';
			$base_img = 'http://localhost/qr_code/nav/details_item/';

			$params['data'] = $base_img.$other_id;
			$params['level'] = 'H';
			$params['size'] = 10;
			$params['savename'] = FCPATH.'qr_image/'.$random_name.'.png';
			$this->ciqrcode->generate($params);

			if(empty($$cmdb_hardware_valid)){
				$cmdb_hardware_valid='Valid';
			}

			if($cmdb_hardware_valid=='Non-Valid'){
				$cmdb_hardware_valid2='Invalid';
			} else {
				$cmdb_hardware_valid2='Valid';
			}


			$data = array(
							"name"=>$cmdb_hardware_name,
							"deployment_state"=>$cmdb_hardware_deploymentstate,
							"incident_state"=>$cmdb_hardware_incidentstate,
							"vendor"=>$cmdb_hardware_vendor,
							"model"=>$cmdb_hardware_model,
							"description"=>$cmdb_hardware_desc,
							"type"=>$cmdb_hardware_type,
							"owner"=>$cmdb_hardware_owner,
							"serial_number"=>$cmdb_hardware_serialno,
							"warranty_expiration_date"=>$cmdb_hardware_waranty,
							"install_date"=>$cmdb_hardware_install,
							"note"=>$cmdb_hardware_note,
							"location"=>$cmdb_hardware_location,
							"valid"=>$cmdb_hardware_valid,
							"created"=>$datetime,
							"other_id"=>$other_id,
							"qr_code"=>$random_name,
                          	"config_id"=>$config_id,
                          	"validity"=>$cmdb_hardware_valid2
						 );

			$this->CMDB->cmdb_hardware_add($data);

			//save log table log activities
	        $data = array(
	                      "type_activities"=>"CMDB Add Hardware ",
	                      "created_by"=>$updateBy,
	                      "other_id"=>$other_id
	                    );

	        $this->Admin->saveLog($data);

	        } else { 
          	$this->load->view('login');
        	}
	}

	public function CMDB_Hardware_EditDetails()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$this->data['site_title'] = 'CMDB_Hardware_EditDetails';
			$this->load->view('template/header/header');
			$this->load->view('template/body/CMDB_Hardware_EditDetails/CMDB_Hardware_EditDetails',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}

	function cmdb_hardware_details()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {
			
			$other_id = $this->input->post('other_id');
			$query = $this->CMDB->cmdb_hardware_details($other_id);
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
	/* END */

	/* NEWTORK */
	public function CMDB_Network_ViewList()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$this->data['site_title'] = 'CMDB_Network_ViewList';
			$this->load->view('template/header/header');
			$this->load->view('template/body/CMDB_Network_ViewList/CMDB_Network_ViewList',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}

	public function CMDB_Network_Add()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$this->data['site_title'] = 'CMDB_Network_Add';
			$this->load->view('template/header/header');
			$this->load->view('template/body/CMDB_Network_Add/CMDB_Network_Add',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}

	public function CMDB_Network_EditDetails()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$this->data['site_title'] = 'CMDB_Network_EditDetails';
			$this->load->view('template/header/header');
			$this->load->view('template/body/CMDB_Network_EditDetails/CMDB_Network_EditDetails',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}

	function cmdb_network_addnet()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {
			
			$software_name = $this->input->post('network_name');
			$network_state = $this->input->post('network_state');
			$network_incident = $this->input->post('network_incident');
			$network_vendor = $this->input->post('network_vendor');
			$network_model = $this->input->post('network_model');
			$network_desc = $this->input->post('network_desc');
			$network_type = $this->input->post('network_type');
			$network_lv = $this->input->post('network_lv');
			$network_primaryno = $this->input->post('network_primaryno');
			$network_backupno = $this->input->post('network_backupno');
			$network_dqno = $this->input->post('network_dqno');
			$network_serviceno = $this->input->post('network_serviceno');
			$network_ps = $this->input->post('network_ps');
			$network_bs = $this->input->post('network_bs');
			$network_loc = $this->input->post('network_loc');
			$network_validity = $this->input->post('network_validity');

			$other_id = rand();

			$updateBy = $this->session->userdata('userid');
	        date_default_timezone_set("Asia/Kuala_Lumpur");
	        $timeReg =date("h:i:s");
	        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
	        $datetime = $dateReg.' '.$timeReg;

	        $network_ip = $this->input->post('network_ip');


	        //generator scanner code
			$this->load->library('ciqrcode');

			$random_name = 'N'.rand();
			$config_id = 'N'.date("Ymd").rand(1000,9999);

			// $base_img = 'http://10.0.20.81/qr_code/nav/details_item/';
			$base_img = 'http://localhost/qr_code/nav/details_item/';

			$params['data'] = $base_img.$other_id;
			$params['level'] = 'H';
			$params['size'] = 10;
			$params['savename'] = FCPATH.'qr_image/'.$random_name.'.png';
			$this->ciqrcode->generate($params);

			if(empty($network_validity)){
				$network_validity='Valid';
			}

			$data = array(
							"name"=>$software_name,
							"deployment_state"=>$network_state,
							"incident_state"=>$network_incident,
							"vendor"=>$network_vendor,
							"model"=>$network_model,
							"description"=>$network_desc,
							"type"=>$network_type,
							"lv_no"=>$network_lv,
							"ps_no"=>$network_primaryno,
							"bs_no"=>$network_backupno,
							"dq_no"=>$network_dqno,
							"service_number"=>$network_serviceno,
							"networkAddress_ps"=>$network_ps,
							"networkAddress_bs"=>$network_bs,
							"location"=>$network_loc,
							"validity"=>$network_validity,
							"other_id"=>$other_id,
							"created"=>$datetime,
							"ip"=>$network_ip,
							"qr_code"=>$random_name,
                          	"config_id"=>$config_id,
						 );

			$this->CMDB->cmdb_network_addnet($data);

			//save log table log activities
	        $data = array(
	                      "type_activities"=>"CMDB Add Network ",
	                      "created_by"=>$updateBy,
	                      "other_id"=>$other_id
	                    );

	        $this->Admin->saveLog($data);

	        } else { 
          	$this->load->view('login');
        	}

	}

	function Dtable_CMDB_Network_ViewList()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			header('Content-Type: application/json');
      		echo $this->CMDB->Dtable_CMDB_Network_ViewList();

      		} else { 
          	$this->load->view('login');
        	}
	}


	function cmdb_network_details()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$other_id = $this->input->post('other_id');
			$query = $this->CMDB->cmdb_network_details($other_id);
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

	/* END */	

	/* CMDB */
	public function CMDB_Software_ViewList()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$this->data['site_title'] = 'CMDB_Software_ViewList';
			$this->load->view('template/header/header');
			$this->load->view('template/body/CMDB_Software_ViewList/CMDB_Software_ViewList',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}

	public function CMDB_Software_Add()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$this->data['site_title'] = 'CMDB_Software_Add';
			$this->load->view('template/header/header');
			$this->load->view('template/body/CMDB_Software_Add/CMDB_Software_Add',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}

	public function CMDB_Software_EditDetails()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$this->data['site_title'] = 'CMDB_Software_EditDetails';
			$this->load->view('template/header/header');
			$this->load->view('template/body/CMDB_Software_EditDetails/CMDB_Software_EditDetails',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
         	$this->load->view('login');
       		}

	}

	function cmdb_software_addsoft()
	{
		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$software_name = $this->input->post('software_name');
			$software_state = $this->input->post('software_state');
			$software_incident = $this->input->post('software_incident');
			$software_version = $this->input->post('software_version');
			$software_model = $this->input->post('software_model');
			$software_desc = $this->input->post('software_desc');
			$software_type = $this->input->post('software_type');
			$software_owner = $this->input->post('software_owner');
			$software_serialno = $this->input->post('software_serialno');
			$software_license = $this->input->post('software_license');
			$software_key = $this->input->post('software_key');
			$software_media = $this->input->post('software_media');
			$software_note = $this->input->post('software_note');
			$software_loc = $this->input->post('software_loc');
			$software_validity = $this->input->post('software_validity');
			$other_id = rand();

			$updateBy = $this->session->userdata('userid');
	        date_default_timezone_set("Asia/Kuala_Lumpur");
	        $timeReg =date("h:i:s");
	        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
	        $datetime = $dateReg.' '.$timeReg;


	        //generator scanner code
			$this->load->library('ciqrcode');

			$random_name = 'S'.rand();
			$config_id = 'S'.date("Ymd").rand(1000,9999);

			// $base_img = 'http://10.0.20.81/qr_code/nav/details_item/';
			$base_img = 'http://localhost/qr_code/nav/details_item/';

			$params['data'] = $base_img.$other_id;
			$params['level'] = 'H';
			$params['size'] = 10;
			$params['savename'] = FCPATH.'qr_image/'.$random_name.'.png';
			$this->ciqrcode->generate($params);

			if(empty($software_validity)){
				$software_validity='Valid';
			}

			$data = array(
							'name'=>$software_name,
							'deployment_state'=>$software_state,
							'incident_state'=>$software_incident,
							'version'=>$software_version,
							'model'=>$software_model,
							'description'=>$software_desc,
							'type'=>$software_type,
							'owner'=>$software_owner,
							'serial_number'=>$software_serialno,
							'license_type'=>$software_license,
							'license_key'=>$software_key,
							'media'=>$software_media,
							'note'=>$software_note,
							'location'=>$software_loc,
							'validity'=>$software_validity,
							'created'=>$datetime,
							'other_id'=>$other_id,
							"qr_code"=>$random_name,
                          	"config_id"=>$config_id,
						 );

			$this->CMDB->cmdb_software_add($data);

			//save log table log activities
	        $data = array(
	                      "type_activities"=>"CMDB Add Software ",
	                      "created_by"=>$updateBy,
	                      "other_id"=>$other_id
	                    );

	        $this->Admin->saveLog($data);

	        } else { 
          	$this->load->view('login');
        	}

	}

	function Dtable_CMDB_Software_ViewList()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			header('Content-Type: application/json');
      		echo $this->CMDB->Dtable_CMDB_Software_ViewList();

      		} else { 
          	$this->load->view('login');
        	}
	}

	function cmdb_software_details()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$other_id = $this->input->post('other_id');
			$query = $this->CMDB->cmdb_software_details($other_id);
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

	/* END */	

	/* LOCATION */
	public function CMDB_Location_ViewList()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$this->data['site_title'] = 'CMDB_Location_ViewList';
			$this->load->view('template/header/header');
			$this->load->view('template/body/CMDB_Location_ViewList/CMDB_Location_ViewList',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}
	public function CMDB_Location_Add()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$this->data['site_title'] = 'CMDB_Location_Add';
			$this->load->view('template/header/header');
			$this->load->view('template/body/CMDB_Location_Add/CMDB_Location_Add',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}

	public function CMDB_Location_EditDetails()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$this->data['site_title'] = 'CMDB_Location_EditDetails';
			$this->load->view('template/header/header');
			$this->load->view('template/body/CMDB_Location_EditDetails/CMDB_Location_EditDetails',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}

	function CMDB_Location_AddLoc()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$location_name = $this->input->post('location_name');
			$location_state = $this->input->post('location_state');
			$location_incident = $this->input->post('location_incident');
			$location_type = $this->input->post('location_type');
			$location_phone = $this->input->post('location_phone');
			$location_address = $this->input->post('location_address');
			$location_city = $this->input->post('location_city');
			$location_statex = $this->input->post('location_statex');
			$location_country = $this->input->post('location_country');
			$location_validity = $this->input->post('location_validity');


			$other_id = rand();

			$updateBy = $this->session->userdata('userid');
	        date_default_timezone_set("Asia/Kuala_Lumpur");
	        $timeReg =date("h:i:s");
	        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
	        $datetime = $dateReg.' '.$timeReg;


	        $data = array(
	        				"name"=>$location_name,
	        				"deployment_state"=>$location_state,
	        				"incident_state"=>$location_incident,
	        				"type"=>$location_type,
	        				"phone"=>$location_phone,
	        				"address"=>$location_address,
	        				"city"=>$location_city,
	        				"state"=>$location_statex,
	        				"country"=>$location_country,
	        				"validity"=>$location_validity,
	        				"created"=>$datetime,
	        				"other_id"=>$other_id
	        			 );

	        $this->CMDB->cmdb_location_addloc($data);

			//save log table log activities
	        $data = array(
	                      "type_activities"=>"CMDB Add Location ",
	                      "created_by"=>$updateBy,
	                      "other_id"=>$other_id
	                    );

	        $this->Admin->saveLog($data);

	        } else { 
          	$this->load->view('login');
        	}

	}

	function Dtable_CMDB_Location_ViewList()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			header('Content-Type: application/json');
      		echo $this->CMDB->Dtable_CMDB_Location_ViewList();

      		} else { 
          	$this->load->view('login');
        	}
	}

	function cmdb_location_details()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {
			
			$other_id = $this->input->post('other_id');
			$query = $this->CMDB->cmdb_location_details($other_id);
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
	/* END */

	/* CMDB LINK */
	public function CMDB_Link()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

		  $this->data['site_title'] = 'CMDB_Link';
		  $this->load->view('template/header/header');
		  $this->load->view('template/body/CMDB_Link/CMDB_Link',$this->data);
		  $this->load->view('template/footer/footer');

		  } else { 
          $this->load->view('login');
          }

	}
	/* END */

	/* CMDB LINK UPDATE */
	public function CMDB_Link_Update()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

		  $this->data['site_title'] = 'CMDB_Link_Update';
		  $this->load->view('template/header/header');
		  $this->load->view('template/body/CMDB_Link_Update/CMDB_Link_Update',$this->data);
		  $this->load->view('template/footer/footer');

		  } else { 
          $this->load->view('login');
          }

	}
	/* END */

	function Link_ITSM_Cat()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$cat = $this->input->post('cat');
				if($cat=='Network'){
					return $data = $this->lookup->lookup_table_location_network();	
				} else if($cat=='Computer'){
					return $data = $this->lookup->lookup_table_location_computer();
				} else if($cat=='Hardware'){
					return $data = $this->lookup->lookup_table_location_hardware();
				} else if($cat=='Software'){
					return $data = $this->lookup->lookup_table_location_software();
				}

			} else { 
          	$this->load->view('login');
        	}
			
	}

	function Dtable_CMDB_Location_ViewList_Network()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			header('Content-Type: application/json');
	      	echo $this->CMDB->Dtable_CMDB_Location_ViewList_Network(); //create function model

	      	} else { 
	          $this->load->view('login');
	        }
	}

	function Dtable_CMDB_Location_ViewList_Computer()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			header('Content-Type: application/json');
	      	echo $this->CMDB->Dtable_CMDB_Location_ViewList_Computer(); //create function model

	      	} else { 
          	$this->load->view('login');
        	}
	}

	function Dtable_CMDB_Location_ViewList_Hardware()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			header('Content-Type: application/json');
	      	echo $this->CMDB->Dtable_CMDB_Location_ViewList_Hardware(); //create function model

	      	} else { 
          	$this->load->view('login');
        	}
	}

	function Dtable_CMDB_Location_ViewList_Software()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			header('Content-Type: application/json');
	      	echo $this->CMDB->Dtable_CMDB_Location_ViewList_Software(); //create function model

	      	} else { 
          	$this->load->view('login');
        	}
	}



	function cmdb_register_link()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$auto_id = $this->input->post('auto_id');
			$Link_CustID = $this->input->post('Link_CustID');
			$Link_Service = $this->input->post('Link_Service');
			$Link_SLA = $this->input->post('Link_SLA');

			$updateBy = $this->session->userdata('userid');
	        date_default_timezone_set("Asia/Kuala_Lumpur");
	        $timeReg =date("h:i:s");
	        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
	        $datetime = $dateReg.' '.$timeReg;

			$data = array(	"RegisterID"=>$auto_id,
							"CustomerID"=>$Link_CustID,
							"Service"=>$Link_Service,
							"SLA"=>$Link_SLA,
							"CreatedBy"=>$updateBy,
							"Created" =>$datetime,
							"Status" =>"Invalid"
						);
		
			$this->CMDB->cmdb_register_link($data);

			} else { 
          	$this->load->view('login');
        	}

	}

	function cmdb_link_location()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$auto_id = $this->input->post('auto_id');
			$Link_ITSM_Cat = $this->input->post('Link_ITSM_Cat');
			$Link_Location = $this->input->post('Link_Location');

			$this->CMDB->cmdb_link_location($auto_id,$Link_ITSM_Cat,$Link_Location);

			$data = array("Status"=>"Valid");
			$this->CMDB->cmdb_link_status($data,$auto_id);

			$check = $this->CMDB->check_itsm_location($auto_id);
				if($check>0) // cat yg dah ada loc
				{
				//echo 'ada';
				$update = $this->CMDB->itsm_location_update($Link_Location,$auto_id,$Link_ITSM_Cat);
				} else { //baru 
				//echo 'xda';
				$add = $this->CMDB->itsm_location_add($Link_Location,$auto_id,$Link_ITSM_Cat);
				}

			} else { 
          	$this->load->view('login');
        	}

	}

	function cmdb_lookup_service()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$custId = $this->input->post('custId');
			$this->lookup->cmdb_lookup_service($custId);

			} else { 
          	$this->load->view('login');
        	}
	}

	function cmdb_lookup_sla()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$service_id = $this->input->post('service_id');
			$this->lookup->cmdb_lookup_sla($service_id);

			} else { 
          	$this->load->view('login');
        	}
	}

	function Dtable_CMDB_ITSM_ViewList()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			header('Content-Type: application/json');
	      	echo $this->CMDB->Dtable_CMDB_ITSM_ViewList(); //create function model

	      	} else { 
          	$this->load->view('login');
        	}
	}

	public function CMDB_Link_Update_Form()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$this->data['site_title'] = 'CMDB_Link_Update_Form';
			$this->load->view('template/header/header');
			$this->load->view('template/body/CMDB_Link_Update_Form/CMDB_Link_Update_Form',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}

	public function CMDB_Link_Update_Form2()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$this->data['site_title'] = 'CMDB_Link_Update_Form';
			$this->load->view('template/header/header');
			$this->load->view('template/body/CMDB_Link_Update_Form2/CMDB_Link_Update_Form2',$this->data);
			$this->load->view('template/footer/footer');

			} else { 
          	$this->load->view('login');
        	}

	}


	function cmdb_register_link_data()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$id = $this->input->post('auto_id');
			$query = $this->CMDB->cmdb_register_link_data($id);
			foreach ($query as $data) 
			{
				
			}
			echo json_encode($data);

			} else { 
          	$this->load->view('login');
        	}
	}

	function check_list_itsm_loc()
	{

		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('CMDB',$idModule)))
        {

			$RegisterID = $this->input->post('RegisterID');
			$query = $this->CMDB->check_list_itsm_loc($RegisterID);
			echo json_encode($query);

			} else { 
          	$this->load->view('login');
        	}
	}

	function cmdb_get_custID()
	{
			$id = $this->input->post('id');
			$query = $this->CMDB->cmdb_get_custID($id);
	}

	function print_qr()
	{
		$id_qr_code = $this->uri->segment(3);



		$data = [];
        $data['data'] = $this->img_qr_code($id_qr_code);
        $data['name'] = $this->img_qr_code_name($id_qr_code);
        $data['config_id'] = $this->img_qr_code_config_id($id_qr_code);
        $data['type'] = $this->img_qr_code_type($id_qr_code);
        $data['location'] = $this->img_qr_code_location($id_qr_code);

        //var_dump($data); exit();
        //$head = $this->load->view('template/header/header', TRUE);
        $html = $this->load->view('template/body/QR_Code_PDF', $data, TRUE);
        //$foot = $this->load->view('template/footer/footer', TRUE);
        //$html = $head.$html;

        //var_dump($html); exit();
        $rand = rand();
        $pdfFilePath = "qr_code_".$id_qr_code.".pdf";
        $this->load->library('M_pdf');
        $this->m_pdf->pdf->WriteHTML($html);
        $this->m_pdf->pdf->Output($pdfFilePath, "D");
	}



	function img_qr_code($other_id)
	{
		$qr_code = '';
		$id_qr_code = '';
		$base = base_url().'qr_image/';

		$this->db->where('other_id',$other_id);

		$query =  $this->db->get('computer')->result();
		foreach ($query as $data) 
		{
			$id_qr_code = $data->qr_code;
			$qr_code = $data->qr_code;
			$qr_code = base_url().'qr_image/'.$qr_code;
		}

		if($qr_code==$base){
			$qr_code = '';
		}



		$query =  $this->db->get('software')->result();
		foreach ($query as $data) 
		{
			$id_qr_code = $data->qr_code;
			$qr_code = $data->qr_code;
			$qr_code = base_url().'qr_image/'.$qr_code;
		}

		if($qr_code==$base){
			$qr_code = '';
		}



		$query =  $this->db->get('hardware')->result();
		foreach ($query as $data) 
		{
			$id_qr_code = $data->qr_code;
			$qr_code = $data->qr_code;
			$qr_code = base_url().'qr_image/'.$qr_code;
		}

		if($qr_code==$base){
			$qr_code = '';
		}



		$query =  $this->db->get('network')->result();
		foreach ($query as $data) 
		{
			$id_qr_code = $data->qr_code;
			$qr_code = $data->qr_code;
			$qr_code = base_url().'qr_image/'.$qr_code;
		}

		if($qr_code==$base){
			$qr_code = '';
		}

		if(!empty($qr_code)){
			$id_qr_code = "'".$id_qr_code."'";
			return  '	<img src="'.$qr_code.'.png" class="img-responsive" width="120px;" height="100px;">

				 	';	
		}
		

	}

	function img_qr_code_name($other_id)
	{
		$name = '';

		$this->db->where('other_id',$other_id);
		$query =  $this->db->get('computer')->result();
		foreach ($query as $data) 
		{
			$name = $data->name;
		}


		$this->db->where('other_id',$other_id);
		$query =  $this->db->get('software')->result();
		foreach ($query as $data) 
		{
			$name = $data->name;
		}

		$this->db->where('other_id',$other_id);
		$query =  $this->db->get('hardware')->result();
		foreach ($query as $data) 
		{
			$name = $data->name;
		}


		$this->db->where('other_id',$other_id);
		$query =  $this->db->get('network')->result();
		foreach ($query as $data) 
		{
			$name = $data->name;
		}



		return $name;
		

	}

	function img_qr_code_config_id($other_id)
	{
		$name = '';

		$this->db->where('other_id',$other_id);
		$query =  $this->db->get('computer')->result();
		foreach ($query as $data) 
		{
			$name = $data->config_id;
		}


		$this->db->where('other_id',$other_id);
		$query =  $this->db->get('software')->result();
		foreach ($query as $data) 
		{
			$name = $data->config_id;
		}

		$this->db->where('other_id',$other_id);
		$query =  $this->db->get('hardware')->result();
		foreach ($query as $data) 
		{
			$name = $data->config_id;
		}


		$this->db->where('other_id',$other_id);
		$query =  $this->db->get('network')->result();
		foreach ($query as $data) 
		{
			$name = $data->config_id;
		}



		return $name;
		

	}


	function img_qr_code_type($other_id)
	{
		$name = '';

		$this->db->where('other_id',$other_id);
		$query =  $this->db->get('computer')->result();
		foreach ($query as $data) 
		{
			$name = 'Computer';
		}


		$this->db->where('other_id',$other_id);
		$query =  $this->db->get('software')->result();
		foreach ($query as $data) 
		{
			$name = 'Software';
		}

		$this->db->where('other_id',$other_id);
		$query =  $this->db->get('hardware')->result();
		foreach ($query as $data) 
		{
			$name = 'Hardware';
		}


		$this->db->where('other_id',$other_id);
		$query =  $this->db->get('network')->result();
		foreach ($query as $data) 
		{
			$name = 'Network';
		}



		return $name;
	}



	function img_qr_code_location($other_id)
	{
		$name = '';

		$this->db->where('other_id',$other_id);
		$query =  $this->db->get('computer')->result();
		foreach ($query as $data) 
		{
			$name = $data->location;
		}


		$this->db->where('other_id',$other_id);
		$query =  $this->db->get('software')->result();
		foreach ($query as $data) 
		{
			$name = $data->location;
		}

		$this->db->where('other_id',$other_id);
		$query =  $this->db->get('hardware')->result();
		foreach ($query as $data) 
		{
			$name = $data->location;
		}


		$this->db->where('other_id',$other_id);
		$query =  $this->db->get('network')->result();
		foreach ($query as $data) 
		{
			$name = $data->location;
		}



		return $name;
	}

}
 	