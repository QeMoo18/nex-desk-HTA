<?php
defined('BASEPATH') OR exit('No direct script access allowed');//ob_clean();
class DataUpload extends CI_Controller  
{

  public function __construct()
  {

    parent::__construct();
    $this->load->database();
    $this->load->library('session');
    $this->load->library('datatables');
    $this->load->model('DataUpload_Model','DataUpload');
    $this->load->model('Dbase_lookup','lookup');
    $this->load->helper('Lookup_helper'); //helpers
  }

  public function Index()
  {
  	$idModule = $this->session->userdata('idModule');
	if((!empty($this->session->userdata('logged_in'))))
	{ 
	  $this->load->view('data_upload');

	} else { 
	  $this->load->view('login');
	} 

  }

  function customer_user()
  {	
  		ini_set('memory_limit', '-1');

		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $status = array();

		if ($this->input->post('submit')) {

			$path = 'uploadData/';
            
			$this->load->library('excel');

            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls';
            $config['remove_spaces'] = TRUE;

            //var_dump($config);
            $this->load->library('upload', $config);
            $this->upload->initialize($config); 

            if (!$this->upload->do_upload('uploadFile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            if(empty($error)){
              	if (!empty($data['upload_data']['file_name'])) {
	                $import_xls_file = $data['upload_data']['file_name'];
	            } else {
	                $import_xls_file = 0;
	            }
	            $inputFileName = $path . $import_xls_file;

	            //var_dump($inputFileName);



	            try {
	                
	                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
	                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
	                $objPHPExcel = $objReader->load($inputFileName);
	                $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
	                $flag = true;
	                $i=0;

	                foreach ($allDataInSheet as $value) {

	                	//var_dump($value); exit();
	                  if($flag){
	                    $flag =false;
	                    continue;
	                  }

	                  
		                  $inserdata[$i]['first_name'] = $value['A'];
		                  $inserdata[$i]['title_salutation'] = $value['B'];
		                  //$inserdata[$i]['first_name'] = $value['C'];
		                  $inserdata[$i]['last_name'] = $value['D'];
		                  $inserdata[$i]['username'] = $value['E']; 
		                  $inserdata[$i]['password'] = $value['F'];
		                  $inserdata[$i]['email'] = $value['G'];
		                  $inserdata[$i]['customerID'] = $value['H'];
		                  $inserdata[$i]['phone'] = $value['I'];
		                  $inserdata[$i]['fax'] = $value['J'];
		                  $inserdata[$i]['mobile'] = $value['K'];
		                  $inserdata[$i]['street'] = $value['L'];
		                  $inserdata[$i]['postcode'] = $value['M'];
		                  $inserdata[$i]['city'] = $value['N'];
		                  $inserdata[$i]['country'] = $value['O'];
		                  $inserdata[$i]['comment'] = $value['P'];
		                  $inserdata[$i]['valid'] = $value['Q'];
		                  $inserdata[$i]['created'] = $datetime;
		                  $inserdata[$i]['other_id'] = rand();

	                  
	                  $i++;
	                }               
	                $table_name = 'customer_user';
	                $result = $this->DataUpload->importdata($inserdata,$table_name);   
	              	
	                //var_dump($inserdata);
	                if($result){
	                  $feedback = "Customer User Imported successfully";
	                  $status['feedback'] = $feedback;
	                }else{
	                  $feedback = "ERROR !";
	                  $status['feedback'] = $feedback;
	                }             

	          	} catch (Exception $e) {
	               die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
	                        . '": ' .$e->getMessage());
	            }



	       	} else {
	       		$feedback = $error['error'];
	       		$status['feedback'] = $feedback;
	       	}

		} else {
			$feedback = 'False';
			$status['feedback'] = $feedback;
		}

		//var_dump($status);
		$this->session->set_flashdata('feedback',$status);
		redirect("DataUpload");
  }


  function customer()
  {
  		ini_set('memory_limit', '-1');

		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $status = array();

		if ($this->input->post('submit')) {

			$path = 'uploadData/';
            
			$this->load->library('excel');

            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls';
            $config['remove_spaces'] = TRUE;

            //var_dump($config);
            $this->load->library('upload', $config);
            $this->upload->initialize($config); 

            if (!$this->upload->do_upload('uploadFile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            if(empty($error)){
              	if (!empty($data['upload_data']['file_name'])) {
	                $import_xls_file = $data['upload_data']['file_name'];
	            } else {
	                $import_xls_file = 0;
	            }
	            $inputFileName = $path . $import_xls_file;

	            //var_dump($inputFileName);



	            try {
	                
	                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
	                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
	                $objPHPExcel = $objReader->load($inputFileName);
	                $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
	                $flag = true;
	                $i=0;

	                foreach ($allDataInSheet as $value) {

	                	//var_dump($value); exit();
	                  if($flag){
	                    $flag =false;
	                    continue;
	                  }

	                  
		                  $inserdata[$i]['customerID'] = $value['A'];
		                  $inserdata[$i]['street'] = $value['B'];
		                  $inserdata[$i]['postcode'] = $value['C'];
		                  $inserdata[$i]['city'] = $value['D'];
		                  $inserdata[$i]['country'] = $value['E']; 
		                  $inserdata[$i]['URL'] = $value['F'];
		                  $inserdata[$i]['comment'] = $value['G'];
		                  $inserdata[$i]['valid'] = $value['H'];
		                  $inserdata[$i]['created'] = $datetime;
		                  $inserdata[$i]['other_id'] = rand();

	                  
	                  $i++;
	                }               
	                $table_name = 'customer';
	                $result = $this->DataUpload->importdata($inserdata,$table_name);   
	              	
	                //var_dump($inserdata);
	                if($result){
	                  $feedback = "Customer Imported successfully";
	                  $status['feedback'] = $feedback;
	                }else{
	                  $feedback = "ERROR !";
	                  $status['feedback'] = $feedback;
	                }             

	          	} catch (Exception $e) {
	               die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
	                        . '": ' .$e->getMessage());
	            }



	       	} else {
	       		$feedback = $error['error'];
	       		$status['feedback'] = $feedback;
	       	}

		} else {
			$feedback = 'False';
			$status['feedback'] = $feedback;
		}

		//var_dump($status);
		$this->session->set_flashdata('feedback',$status);
		redirect("DataUpload");
  }

  function agent()
  {
  		ini_set('memory_limit', '-1');

		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $status = array();

		if ($this->input->post('submit')) {

			$path = 'uploadData/';
            
			$this->load->library('excel');

            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls';
            $config['remove_spaces'] = TRUE;

            //var_dump($config);
            $this->load->library('upload', $config);
            $this->upload->initialize($config); 

            if (!$this->upload->do_upload('uploadFile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            if(empty($error)){
              	if (!empty($data['upload_data']['file_name'])) {
	                $import_xls_file = $data['upload_data']['file_name'];
	            } else {
	                $import_xls_file = 0;
	            }
	            $inputFileName = $path . $import_xls_file;

	            //var_dump($inputFileName);



	            try {
	                
	                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
	                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
	                $objPHPExcel = $objReader->load($inputFileName);
	                $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
	                $flag = true;
	                $i=0;

	                foreach ($allDataInSheet as $value) {

	                	//var_dump($value); exit();
	                  if($flag){
	                    $flag =false;
	                    continue;
	                  }

	                  	  $userid = rand();	
	                  	  $pwd = $value['G'];
	                  	  //$pwd =  hash('sha256',$pwd);

		                  $inserdata[$i]['title_salutation'] = $value['A'];
		                  $inserdata[$i]['first_name'] = $value['B'];
		                  $inserdata[$i]['last_name'] = $value['C'];
		                  $inserdata[$i]['group_name'] = $value['D'];
		                  $inserdata[$i]['role_name'] = $value['E']; 
		                  $inserdata[$i]['username'] = $value['F'];
		                  $inserdata[$i]['password'] = $pwd;
		                  $inserdata[$i]['email'] = $value['H'];
		                  $inserdata[$i]['mobile'] = $value['I'];
		                  $inserdata[$i]['validity'] = $value['J'];
		                  $inserdata[$i]['created'] = $datetime;
		                  $inserdata[$i]['userid'] = $userid;

		                  $inserdata2[$i]['username'] = $value['F'];
		                  $inserdata2[$i]['password'] = $pwd;
		                  $inserdata2[$i]['role'] = $value['E'];
		                  $inserdata2[$i]['userid'] = $userid;
		                  $inserdata2[$i]['status'] = 'active';

		                  $inserdata[$i]['env'] = $value['K'];
		                  
	                  
	                  $i++;
	                }               
	                $table_name = 'agent';
	                $result = $this->DataUpload->importdata($inserdata,$table_name);   

	                $table_name = 'login_user';
	                $result = $this->DataUpload->importdata($inserdata2,$table_name);  
	              	
	                //var_dump($inserdata);
	                if($result){
	                  $feedback = "Agent Imported successfully";
	                  $status['feedback'] = $feedback;
	                }else{
	                  $feedback = "ERROR !";
	                  $status['feedback'] = $feedback;
	                }             

	          	} catch (Exception $e) {
	               die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
	                        . '": ' .$e->getMessage());
	            }



	       	} else {
	       		$feedback = $error['error'];
	       		$status['feedback'] = $feedback;
	       	}

		} else {
			$feedback = 'False';
			$status['feedback'] = $feedback;
		}

		//var_dump($status);
		$this->session->set_flashdata('feedback',$status);
		redirect("DataUpload");
  }

  function network()
  {
  		ini_set('memory_limit', '-1');

		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $status = array();

		if ($this->input->post('submit')) {

			$path = 'uploadData/';
            
			$this->load->library('excel');

            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls';
            $config['remove_spaces'] = TRUE;

            //var_dump($config);
            $this->load->library('upload', $config);
            $this->upload->initialize($config); 

            if (!$this->upload->do_upload('uploadFile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            if(empty($error)){
              	if (!empty($data['upload_data']['file_name'])) {
	                $import_xls_file = $data['upload_data']['file_name'];
	            } else {
	                $import_xls_file = 0;
	            }
	            $inputFileName = $path . $import_xls_file;

	            //var_dump($inputFileName);



	            try {
	                
	                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
	                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
	                $objPHPExcel = $objReader->load($inputFileName);
	                $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
	                $flag = true;
	                $i=0;

	                foreach ($allDataInSheet as $value) {

	                	//var_dump($value); exit();
	                  if($flag){
	                    $flag =false;
	                    continue;
	                  }

	                  	  $userid = rand();	


	                  	  //generator scanner code
							$this->load->library('ciqrcode');

							$random_name = 'N'.rand();
							$config_id = 'N'.date("Ymd").rand(1000,9999);

							// $base_img = 'http://10.0.20.81/qr_code/nav/details_item/';
							$base_img = 'http://localhost/qr_code/nav/details_item/';
							$other_id = $userid;
							$params['data'] = $base_img.$other_id;
							$params['level'] = 'H';
							$params['size'] = 10;
							$params['savename'] = FCPATH.'qr_image/'.$random_name.'.png';
							$this->ciqrcode->generate($params);


							$inserdata[$i]['name'] = $value['A'];
							$inserdata[$i]['ip'] = $value['B'];
							$inserdata[$i]['deployment_state'] = $value['C'];
							$inserdata[$i]['incident_state'] = $value['D'];
							$inserdata[$i]['description'] = $value['E'];
							$inserdata[$i]['type'] = $value['F']; 
							$inserdata[$i]['lv_no'] = $value['G'];
							$inserdata[$i]['ps_no'] = $value['H'];
							$inserdata[$i]['bs_no'] = $value['I'];
							$inserdata[$i]['dq_no'] = $value['J'];
							$inserdata[$i]['service_number'] = $value['K'];
							$inserdata[$i]['networkAddress_ps'] = $value['L'];
							$inserdata[$i]['networkAddress_bs'] = $value['M'];
							$inserdata[$i]['validity'] = $value['K'];
							$inserdata[$i]['created'] = $datetime;
							$inserdata[$i]['other_id'] = $userid;
							$inserdata[$i]['location'] = $value['O'];

							$inserdata[$i]['qr_code'] = $random_name;
							$inserdata[$i]['config_id'] = $config_id;


		                  
	                  
	                  $i++;
	                }               
	                $table_name = 'network';
	                $result = $this->DataUpload->importdata($inserdata,$table_name);   
	              	
	                //var_dump($inserdata);
	                if($result){
	                  $feedback = "Network Imported successfully";
	                  $status['feedback'] = $feedback;
	                }else{
	                  $feedback = "ERROR !";
	                  $status['feedback'] = $feedback;
	                }             

	          	} catch (Exception $e) {
	               die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
	                        . '": ' .$e->getMessage());
	            }



	       	} else {
	       		$feedback = $error['error'];
	       		$status['feedback'] = $feedback;
	       	}

		} else {
			$feedback = 'False';
			$status['feedback'] = $feedback;
		}

		//var_dump($status);
		$this->session->set_flashdata('feedback',$status);
		redirect("DataUpload");
  }

  function computer()
  {
  		ini_set('memory_limit', '-1');

		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $status = array();

        $inserdata ='';

		if ($this->input->post('submit')) {

			$path = 'uploadData/';
            
			$this->load->library('excel');

            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls';
            $config['remove_spaces'] = TRUE;

            //var_dump($config);
            $this->load->library('upload', $config);
            $this->upload->initialize($config); 

            if (!$this->upload->do_upload('uploadFile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            if(empty($error)){
              	if (!empty($data['upload_data']['file_name'])) {
	                $import_xls_file = $data['upload_data']['file_name'];
	            } else {
	                $import_xls_file = 0;
	            }
	            $inputFileName = $path . $import_xls_file;

	            //var_dump($inputFileName);



	            try {
	                
	                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
	                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
	                $objPHPExcel = $objReader->load($inputFileName);
	                $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
	                $flag = true;
	                $i=0;

	                foreach ($allDataInSheet as $value) {

	                	//var_dump($value); exit();
	                  if($flag){
	                    $flag =false;
	                    continue;
	                  }

	                  	  $userid = rand();	

							$this->load->library('ciqrcode');

							$random_name = 'C'.rand();
							$config_id = 'C'.date("Ymd").rand(1000,9999);
							$other_id = $userid;
							// $base_img = 'http://10.0.20.81/qr_code/nav/details_item/';
							$base_img = 'http://localhost/qr_code/nav/details_item/';

							$params['data'] = $base_img.$other_id;
							$params['level'] = 'H';
							$params['size'] = 10;
							$params['savename'] = FCPATH.'qr_image/'.$random_name.'.png';
							$this->ciqrcode->generate($params);


							$hostname = $value['A'];

							$check = $this->check_computer_by_name($hostname);

							//var_dump($check); exit();

							if($check>0){

								$name = $value['A'];
								$ip = $value['B'];
								$deployment_state = $value['C'];
								$incident_state = $value['D'];
								$vendor = $value['E'];
								$model = $value['F'];
								$description = $value['G'];
								$type = $value['H']; 
								$owner = $value['I'];
								$serial_number = $value['J'];
								$operating_system = $value['K'];
								$CPU = $value['L'];
								$Ram = $value['M'];
								$HardDisk = $value['N'];
								$capacity = $value['O'];

								$FQDN = $value['P'];
								$network_adapter = $value['Q'];
								$graphic_adapter = $value['R'];
								$other_equipment = $value['S'];
								$warranty_expiration_date = $value['T'];
								$install_date = $value['U'];
								$note = $value['V'];


								$validity = $value['X'];
								$created = $datetime;
								$other_id = $userid;
								$location = $value['W'];


								$network_port = $value['Y'];
								$cpu_model = $value['Z'];
								$cpu_serial_no = $value['AA'];
								$processor_type = $value['AB'];
								$monitor_brand = $value['AC'];
								$monitor_model = $value['AD'];
								$monitor_serial_no = $value['AE'];
								$ups_brand = $value['AF'];
								$ups_model = $value['AG'];
								$ups_serial_no = $value['AH'];


								$qr_code = $random_name;
								$config_id = $config_id;



								$data_update = array(
												'name'=>$name,
												'ip'=>$ip,
												'deployment_state'=>$deployment_state,
												'incident_state'=>$incident_state,
												'vendor'=>$vendor,
												'model'=>$model,
												'description'=>$description,
												'type'=>$type,
												'owner'=>$owner,
												'serial_number'=>$serial_number,
												'operating_system'=>$operating_system,
												'CPU'=>$CPU,
												'Ram'=>$Ram,
												'HardDisk'=>$HardDisk,
												'capacity'=>$capacity,
												'FQDN'=>$FQDN,
												'network_adapter'=>$network_adapter,
												'graphic_adapter'=>$graphic_adapter,
												'other_equipment'=>$other_equipment,
												'warranty_expiration_date'=>$warranty_expiration_date,
												'install_date'=>$install_date,
												'note'=>$note,
												'validity'=>$validity,
												'location'=>$location,
												'network_port'=>$network_port,
												'cpu_model'=>$cpu_model,
												'cpu_serial_no'=>$cpu_serial_no,
												'processor_type'=>$processor_type,
												'monitor_brand'=>$monitor_brand,
												'monitor_model'=>$monitor_model,
												'monitor_serial_no'=>$monitor_serial_no,
												'ups_brand'=>$ups_brand,
												'ups_model'=>$ups_model,
												'ups_serial_no'=>$ups_serial_no,
											 );


								$this->db->where('name',$hostname);
								$this->db->update('computer',$data_update);




							} else {


								if(!empty($hostname)){

									$inserdata[$i]['name'] = $value['A'];
									$inserdata[$i]['ip'] = $value['B'];
									$inserdata[$i]['deployment_state'] = $value['C'];
									$inserdata[$i]['incident_state'] = $value['D'];
									$inserdata[$i]['vendor'] = $value['E'];
									$inserdata[$i]['model'] = $value['F'];
									$inserdata[$i]['description'] = $value['G'];
									$inserdata[$i]['type'] = $value['H']; 
									$inserdata[$i]['owner'] = $value['I'];
									$inserdata[$i]['serial_number'] = $value['J'];
									$inserdata[$i]['operating_system'] = $value['K'];
									$inserdata[$i]['CPU'] = $value['L'];
									$inserdata[$i]['Ram'] = $value['M'];
									$inserdata[$i]['HardDisk'] = $value['N'];
									$inserdata[$i]['capacity'] = $value['O'];

									$inserdata[$i]['FQDN'] = $value['P'];
									$inserdata[$i]['network_adapter'] = $value['Q'];
									$inserdata[$i]['graphic_adapter'] = $value['R'];
									$inserdata[$i]['other_equipment'] = $value['S'];
									$inserdata[$i]['warranty_expiration_date'] = $value['T'];
									$inserdata[$i]['install_date'] = $value['U'];
									$inserdata[$i]['note'] = $value['V'];


									$inserdata[$i]['validity'] = $value['X'];
									$inserdata[$i]['created'] = $datetime;
									$inserdata[$i]['other_id'] = $userid;
									$inserdata[$i]['location'] = $value['W'];


									$inserdata[$i]['network_port'] = $value['Y'];
									$inserdata[$i]['cpu_model'] = $value['Z'];
									$inserdata[$i]['cpu_serial_no'] = $value['AA'];
									$inserdata[$i]['processor_type'] = $value['AB'];
									$inserdata[$i]['monitor_brand'] = $value['AC'];
									$inserdata[$i]['monitor_model'] = $value['AD'];
									$inserdata[$i]['monitor_serial_no'] = $value['AE'];
									$inserdata[$i]['ups_brand'] = $value['AF'];
									$inserdata[$i]['ups_model'] = $value['AG'];
									$inserdata[$i]['ups_serial_no'] = $value['AH'];


									$inserdata[$i]['qr_code'] = $random_name;
									$inserdata[$i]['config_id'] = $config_id;

								}

							}

		                  	
	                  
	                  $i++;
	                }         

	                //var_dump($inserdata); exit();

	                $result = '';
	                if(!empty($inserdata)){

	                	$table_name = 'computer';
		                $result = $this->DataUpload->importdata($inserdata,$table_name); 

	                }      
		                  
	              	
	                //var_dump($inserdata);
	                if($result){
	                  $feedback = "Computer Imported successfully";
	                  $status['feedback'] = $feedback;
	                }else{
	                  $feedback = "Data will be updated !";
	                  $status['feedback'] = $feedback;
	                }             

	          	} catch (Exception $e) {
	               die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
	                        . '": ' .$e->getMessage());
	            }



	       	} else {
	       		$feedback = $error['error'];
	       		$status['feedback'] = $feedback;
	       	}

		} else {
			$feedback = 'False';
			$status['feedback'] = $feedback;
		}

		//var_dump($status);
		$this->session->set_flashdata('feedback',$status);
		redirect("DataUpload");
  }




  function hardware()
  {
  		ini_set('memory_limit', '-1');

		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $status = array();

		if ($this->input->post('submit')) {

			$path = 'uploadData/';
            
			$this->load->library('excel');

            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls';
            $config['remove_spaces'] = TRUE;

            //var_dump($config);
            $this->load->library('upload', $config);
            $this->upload->initialize($config); 

            if (!$this->upload->do_upload('uploadFile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            if(empty($error)){
              	if (!empty($data['upload_data']['file_name'])) {
	                $import_xls_file = $data['upload_data']['file_name'];
	            } else {
	                $import_xls_file = 0;
	            }
	            $inputFileName = $path . $import_xls_file;

	            //var_dump($inputFileName);



	            try {
	                
	                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
	                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
	                $objPHPExcel = $objReader->load($inputFileName);
	                $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
	                $flag = true;
	                $i=0;

	                foreach ($allDataInSheet as $value) {

	                	//var_dump($value); exit();
	                  if($flag){
	                    $flag =false;
	                    continue;
	                  }

	                  	  $userid = rand();	

							$this->load->library('ciqrcode');

							$random_name = 'H'.rand();
							$config_id = 'H'.date("Ymd").rand(1000,9999);

							// $base_img = 'http://10.0.20.81/qr_code/nav/details_item/';
							$base_img = 'http://localhost/qr_code/nav/details_item/';
							$other_id = $userid;
							$params['data'] = $base_img.$other_id;
							$params['level'] = 'H';
							$params['size'] = 10;
							$params['savename'] = FCPATH.'qr_image/'.$random_name.'.png';
							$this->ciqrcode->generate($params);


							$hostname = $value['A'];

							$check = $this->check_hardware_by_name($hostname);


							if($check>0){

								$name = $value['A'];
								$deployment_state = $value['B'];
								$incident_state = $value['C'];
								$vendor = $value['D'];
								$model = $value['E'];
								$description = $value['F'];
								$type = $value['G']; 
								$owner = $value['H'];
								$serial_number = $value['I'];
								$warranty_expiration_date = $value['J'];
								$install_date = $value['K'];
								$note = $value['L'];


								$validity = $value['N'];
								$location = $value['M'];

								$ip_location = $value['O'];
								$network_port = $value['P'];
								$version = $value['Q'];

								$data_update = array(
														'name'=>$name,
														'deployment_state'=>$deployment_state,
														'incident_state'=>$incident_state,
														'vendor'=>$vendor,
														'model'=>$model,
														'description'=>$description,
														'type'=>$type,
														'owner'=>$owner,
														'serial_number'=>$serial_number,
														'warranty_expiration_date'=>$warranty_expiration_date,
														'install_date'=>$install_date,
														'note'=>$note,
														'validity'=>$validity,
														'location'=>$location,
														'ip_address'=>$ip_location,
														'network_port'=>$network_port,
														'firmware_version'=>$version,
													);


								$this->db->where('name',$hostname);
								$this->db->update('hardware',$data_update);


							} else {

								$inserdata[$i]['name'] = $value['A'];
								$inserdata[$i]['deployment_state'] = $value['B'];
								$inserdata[$i]['incident_state'] = $value['C'];
								$inserdata[$i]['vendor'] = $value['D'];
								$inserdata[$i]['model'] = $value['E'];
								$inserdata[$i]['description'] = $value['F'];
								$inserdata[$i]['type'] = $value['G']; 
								$inserdata[$i]['owner'] = $value['H'];
								$inserdata[$i]['serial_number'] = $value['I'];
								$inserdata[$i]['warranty_expiration_date'] = $value['J'];
								$inserdata[$i]['install_date'] = $value['K'];
								$inserdata[$i]['note'] = $value['L'];


								$inserdata[$i]['validity'] = $value['N'];
								$inserdata[$i]['created'] = $datetime;
								$inserdata[$i]['other_id'] = $userid;
								$inserdata[$i]['location'] = $value['M'];

								$inserdata[$i]['qr_code'] = $random_name;
								$inserdata[$i]['config_id'] = $config_id;

								$inserdata[$i]['ip_address'] = $value['O'];
								$inserdata[$i]['network_port'] = $value['P'];
								$inserdata[$i]['firmware_version'] = $value['Q'];

							}

								

		                  
	                  
	                  $i++;
	                }      

	                $result='';
	                if(!empty($inserdata)){

	                	$table_name = 'hardware';
		                $result = $this->DataUpload->importdata($inserdata,$table_name);

	                }         
		                   
	              	
	                //var_dump($inserdata);
	                if($result){
	                  $feedback = "Hardware Imported successfully";
	                  $status['feedback'] = $feedback;
	                }else{
	                  $feedback = "Data will be updated !";
	                  $status['feedback'] = $feedback;
	                }             

	          	} catch (Exception $e) {
	               die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
	                        . '": ' .$e->getMessage());
	            }



	       	} else {
	       		$feedback = $error['error'];
	       		$status['feedback'] = $feedback;
	       	}

		} else {
			$feedback = 'False';
			$status['feedback'] = $feedback;
		}

		//var_dump($status);
		$this->session->set_flashdata('feedback',$status);
		redirect("DataUpload");
  }

  function software()
  {
  		ini_set('memory_limit', '-1');

		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $status = array();

		if ($this->input->post('submit')) {

			$path = 'uploadData/';
            
			$this->load->library('excel');

            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls';
            $config['remove_spaces'] = TRUE;

            //var_dump($config);
            $this->load->library('upload', $config);
            $this->upload->initialize($config); 

            if (!$this->upload->do_upload('uploadFile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            if(empty($error)){
              	if (!empty($data['upload_data']['file_name'])) {
	                $import_xls_file = $data['upload_data']['file_name'];
	            } else {
	                $import_xls_file = 0;
	            }
	            $inputFileName = $path . $import_xls_file;

	            //var_dump($inputFileName);



	            try {
	                
	                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
	                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
	                $objPHPExcel = $objReader->load($inputFileName);
	                $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
	                $flag = true;
	                $i=0;

	                foreach ($allDataInSheet as $value) {

	                	//var_dump($value); exit();
	                  if($flag){
	                    $flag =false;
	                    continue;
	                  }

							$userid = rand();	

							$random_name = 'S'.rand();
							$config_id = 'S'.date("Ymd").rand(1000,9999);

							// $base_img = 'http://10.0.20.81/qr_code/nav/details_item/';
							$base_img = 'http://localhost/qr_code/nav/details_item/';

							$other_id = $userid;
							$params['data'] = $base_img.$other_id;
							$params['level'] = 'H';
							$params['size'] = 10;
							$params['savename'] = FCPATH.'qr_image/'.$random_name.'.png';
							$this->ciqrcode->generate($params);

							$hostname = $value['A'];

							$check = $this->check_software_by_name($hostname);


							if($check>0){


								$name = $value['A'];
								$deployment_state = $value['B'];
								$incident_state = $value['C'];
								$vendor = $value['D'];
								$version = $value['E'];
								$description = $value['F'];
								$type = $value['G']; 
								$owner = $value['H'];
								$serial_number = $value['I'];
								$license_type = $value['J'];
								$license_key = $value['K'];
								$media = $value['L'];


								$note = $value['M'];

								$validity = $value['O'];
								$location = $value['N'];

								$data_update = array(
														'name'=>$name,
														'deployment_state'=>$deployment_state,
														'incident_state'=>$incident_state,
														'vendor'=>$vendor,
														'version'=>$version,
														'description'=>$description,
														'type'=>$type,
														'owner'=>$owner,
														'serial_number'=>$serial_number,
														'license_type'=>$license_type,
														'license_key'=>$license_key,
														'media'=>$media,
														'note'=>$note,
														'validity'=>$validity,
														'location'=>$location,
													);

								$this->db->where('name',$hostname);
								$this->db->update('software',$data_update);

							} else {

								$inserdata[$i]['name'] = $value['A'];
								$inserdata[$i]['deployment_state'] = $value['B'];
								$inserdata[$i]['incident_state'] = $value['C'];
								$inserdata[$i]['vendor'] = $value['D'];
								$inserdata[$i]['version'] = $value['E'];
								$inserdata[$i]['description'] = $value['F'];
								$inserdata[$i]['type'] = $value['G']; 
								$inserdata[$i]['owner'] = $value['H'];
								$inserdata[$i]['serial_number'] = $value['I'];
								$inserdata[$i]['license_type'] = $value['J'];
								$inserdata[$i]['license_key'] = $value['K'];
								$inserdata[$i]['media'] = $value['L'];


								$inserdata[$i]['note'] = $value['M'];

								$inserdata[$i]['validity'] = $value['O'];
								$inserdata[$i]['created'] = $datetime;
								$inserdata[$i]['other_id'] = $userid;
								$inserdata[$i]['location'] = $value['N'];


								$inserdata[$i]['qr_code'] = $random_name;
								$inserdata[$i]['config_id'] = $config_id;

							}
		                  
	                  
	                  $i++;
	                }      

	                $result='';

	                if(!empty($inserdata)){

	                	$table_name = 'software';
	                	$result = $this->DataUpload->importdata($inserdata,$table_name);

	                }         
	                   
	              	
	                //var_dump($inserdata);
	                if($result){
	                  $feedback = "Software Imported successfully";
	                  $status['feedback'] = $feedback;
	                }else{
	                  $feedback = "Date will be updated !";
	                  $status['feedback'] = $feedback;
	                }             

	          	} catch (Exception $e) {
	               die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
	                        . '": ' .$e->getMessage());
	            }



	       	} else {
	       		$feedback = $error['error'];
	       		$status['feedback'] = $feedback;
	       	}

		} else {
			$feedback = 'False';
			$status['feedback'] = $feedback;
		}

		//var_dump($status);
		$this->session->set_flashdata('feedback',$status);
		redirect("DataUpload");
  }


  function location()
  {
  		ini_set('memory_limit', '-1');

		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $status = array();

		if ($this->input->post('submit')) {

			$path = 'uploadData/';
            
			$this->load->library('excel');

            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls';
            $config['remove_spaces'] = TRUE;

            //var_dump($config);
            $this->load->library('upload', $config);
            $this->upload->initialize($config); 

            if (!$this->upload->do_upload('uploadFile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            if(empty($error)){
              	if (!empty($data['upload_data']['file_name'])) {
	                $import_xls_file = $data['upload_data']['file_name'];
	            } else {
	                $import_xls_file = 0;
	            }
	            $inputFileName = $path . $import_xls_file;

	            //var_dump($inputFileName);



	            try {
	                
	                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
	                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
	                $objPHPExcel = $objReader->load($inputFileName);
	                $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
	                $flag = true;
	                $i=0;

	                foreach ($allDataInSheet as $value) {

	                	//var_dump($value); exit();
	                  if($flag){
	                    $flag =false;
	                    continue;
	                  }

	                  	  $userid = rand();	


	                  	  if(!empty($value['C'])){    


	                  	  	$hostname = $value['D'];

							$check = $this->check_location_by_name($hostname);


							if($check>0){


									$level = $value['A'];
									$department = $value['B'];

									$room_name = $value['C'];

									$name = $value['D'];
									$deployment_state = $value['E'];
									$incident_state = $value['F'];
									$type = $value['G'];
									$phone = $value['H'];
									$address = $value['I'];
									$city = $value['J']; 
									$state = $value['K'];
									$country = $value['L'];
									$validity = $value['M'];


									$data_update = array(
															'level'=>$level,
															'department'=>$department,
															'room_name'=>$room_name,
															'name'=>$name,
															'deployment_state'=>$deployment_state,
															'incident_state'=>$incident_state,
															'type'=>$type,
															'phone'=>$phone,
															'address'=>$address,
															'city'=>$city,
															'state'=>$state,
															'country'=>$country,
															'validity'=>$validity,
														);

									$this->db->where('name',$hostname);
									$this->db->update('location',$data_update);


							} else {

			                  	  $inserdata[$i]['level'] = $value['A'];
			                  	  $inserdata[$i]['department'] = $value['B'];


			                  	  if(!empty($value['A'])){
			                  	  	$this->check_level($value['A']);
			                  	  }
			                  	  
			                  	  if(!empty($value['B'])){
			                  	  	$this->check_department($value['A'],$value['B']);
			                  	  }
			                  	  

			                  	  $inserdata[$i]['room_name'] = $value['C'];

				                  $inserdata[$i]['name'] = $value['D'];
				                  $inserdata[$i]['deployment_state'] = $value['E'];
				                  $inserdata[$i]['incident_state'] = $value['F'];
				                  $inserdata[$i]['type'] = $value['G'];
				                  $inserdata[$i]['phone'] = $value['H'];
				                  $inserdata[$i]['address'] = $value['I'];
				                  $inserdata[$i]['city'] = $value['J']; 
				                  $inserdata[$i]['state'] = $value['K'];
				                  $inserdata[$i]['country'] = $value['L'];
				                  $inserdata[$i]['validity'] = $value['M'];

				                  $inserdata[$i]['created'] = $datetime;
				                  $inserdata[$i]['other_id'] = $userid;

			              	}
			              }

		                  
	                  
	                  $i++;
	                }    


	                $result='';
	                if(!empty($inserdata)){

	                	$table_name = 'location';
	                	$result = $this->DataUpload->importdata($inserdata,$table_name);

	                }

	                   
	              	
	                //var_dump($inserdata);
	                if($result){
	                  $feedback = "Location Imported successfully";
	                  $status['feedback'] = $feedback;
	                }else{
	                  $feedback = "Data will be updated !";
	                  $status['feedback'] = $feedback;
	                }             

	          	} catch (Exception $e) {
	               die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
	                        . '": ' .$e->getMessage());
	            }



	       	} else {
	       		$feedback = $error['error'];
	       		$status['feedback'] = $feedback;
	       	}

		} else {
			$feedback = 'False';
			$status['feedback'] = $feedback;
		}

		//var_dump($status);
		$this->session->set_flashdata('feedback',$status);
		redirect("DataUpload");
  }


  function check_level($level)
  {
  		#var_dump($level); exit();
	  	$this->db->select('count(*) as total');
		$this->db->where('level_name',$level);
		$query =  $this->db->get('lookup_level')->result();
		foreach ($query as $data) 
		{
			$total = $data->total;
			if($total>0){

			} else {
				$data = array('level_name'=>$level);
				$this->db->insert('lookup_level',$data);
			}

		}
  }


  function check_department($level,$department)
  {
  		$this->db->select('count(*) as total');
		$this->db->where('level_name',$level);
		$this->db->where('department_name',$department);
		$query =  $this->db->get('lookup_department')->result();
		foreach ($query as $data) 
		{
			$total = $data->total;
			if($total>0){

			} else {
				$data = array('level_name'=>$level,'department_name'=>$department);
				$this->db->insert('lookup_department',$data);
			}

		}
  }


  function check_computer_by_name($hostname)
  {
  		$select="SELECT count(*) as total FROM computer WHERE name='$hostname'";

  		//var_dump($select); exit();
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$total = $data->total;
            	return $total;
            } 
        }
  }


  function check_hardware_by_name($hostname)
  {
  		$select="SELECT count(*) as total FROM hardware WHERE name='$hostname'";

  		//var_dump($select); exit();
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$total = $data->total;
            	return $total;
            } 
        }
  }


  function check_software_by_name($hostname)
  {
  		$select="SELECT count(*) as total FROM software WHERE name='$hostname'";

  		//var_dump($select); exit();
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$total = $data->total;
            	return $total;
            } 
        }
  }


  function check_location_by_name($hostname)
  {
  		$select="SELECT count(*) as total FROM location WHERE name='$hostname'";

  		//var_dump($select); exit();
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$total = $data->total;
            	return $total;
            } 
        }
  }


}