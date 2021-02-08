<?php
defined('BASEPATH') OR exit('No direct script access allowed');//ob_clean();
class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();			
		$this->load->database();
		$this->load->library('session');
		$this->load->library('datatables');
    	$this->load->model('Ticket_model','Ticket');
		$this->load->model('Architecture_UI','ui');
		$this->load->model('Dbase_lookup','lookup');
		$this->load->helper('Lookup_helper'); //helpers



	}

	// public function index()
	// {	
	// 	if((!empty($this->session->userdata('logged_in'))))
 //    	{
	// 		$this->load->view('template/header/header');
	// 		$this->load->view('template/body/dashboard');
	// 		$this->load->view('template/footer/footer');
	// 	} else {
	//       redirect('login');
	//     }
	// }
	
	public function index()
	{	
		if((!empty($this->session->userdata('logged_in'))))
    	{
			$this->load->view('template/header/header');
			$this->load->view('template/body/dashboard_v3');
			$this->load->view('template/footer/footer');
		} else {
	      redirect('login');
	    }
	}
	
	public function dashboard_v2()
	{	
		if((!empty($this->session->userdata('logged_in'))))
    	{
			$this->load->view('template/header/header');
			$this->load->view('template/body/dashboard_v2');
			$this->load->view('template/footer/footer');
		} else {
	      redirect('login');
	    }
	}


	public function dashboard_v3()
	{	
		if((!empty($this->session->userdata('logged_in'))))
    	{
			$this->load->view('template/header/header');
			$this->load->view('template/body/dashboard_v3');
			$this->load->view('template/footer/footer');
		} else {
	      redirect('login');
	    }
	}

	public function test()
	{	
		$this->load->view('template/header/header');
		$this->load->view('template/body/test');
		$this->load->view('template/footer/footer');
	}

	public function test2()
	{
		echo 'Test 2';
	}

	public function test_createmodule(){
		$view = 'test';
		$model = 'Test';
		$controller = 'Test';

		//check sudah diregister atau belum di sistem
		$check = $this->ui->check_register_module($controller);
		if($check>0){
			echo 'Sudah diregister';
		} else {
			$register = $this->ui->register_module($controller);

			$this->load->helper('pages_creator_helper');
			//view - Model - Controller
			create_new_page($view, $model, $controller);
			redirect($controller);
		}	
	}


	public function test_createview()
	{
		$view = 'test1';
		$controller = 'Test';
		$select = 1;
		$nama_function = 'X';

		//check sudah diregister atau belum di sistem
		$check = $this->ui->check_name_function($controller,$nama_function);
		if($check>0){
			echo 'Nama function sudah digunakan';
		} else {
			$check = $this->ui->register_name_function($controller,$nama_function);

			$this->load->helper('pages_creatorview_helper');
			create_new_view($view, $select, $nama_function, $controller);
			redirect($controller);
		}
	}

	function Dtable_Ticket_Customer()
	{
		$input_1 = $this->input->post('input_1');
		$input_2 = $this->input->post('input_2');
		header('Content-Type: application/json');
        echo $this->Ticket->Dtable_Ticket_Customer($input_1,$input_2);
	}

	function Dtable_Ticket_Portion()
	{
		$input_1 = $this->input->post('input_1');
		$input_2 = $this->input->post('input_2');
		header('Content-Type: application/json');
        echo $this->Ticket->Dtable_Ticket_Portion($input_1,$input_2);
	}

	function count_duration()
	{
		$input_1 = $this->input->post('input_1');
		$input_2 = $this->input->post('input_2');

		$this->Ticket->count_less_1hour($input_1,$input_2);
		$this->Ticket->count_1hour_4hour($input_1,$input_2);
		$this->Ticket->count_4hour_24hour($input_1,$input_2);
		$this->Ticket->count_more_24hour($input_1,$input_2);

	}


	public function calendar()
	{	
		$this->load->view('template/header/header');
		$this->load->view('template/body/calendar');
		$this->load->view('template/footer/footer');
	}


	function calendar_data()
	{
		$this->Ticket->calendar_data();
	}

	public function calendar_detail()
	{	
		$this->load->view('template/header/header');
		$this->load->view('template/body/calendar_detail/calendar_detail');
		$this->load->view('template/footer/footer');
	}

	function detail_calendar()
	{
		$idModule = $this->session->userdata('idModule');
    	if((!empty($this->session->userdata('logged_in'))))
        {

        $id = $this->input->post('id');  
        $query = $this->Ticket->detail_calendar($id);

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


	//dashboard
	function Dashboardv2_Ticket_New()
	{
		$input_1 = $this->input->post('input_1');
		$input_2 = $this->input->post('input_2');
		header('Content-Type: application/json');
        echo $this->Ticket->Dashboardv2_Ticket_New($input_1,$input_2);
	}

	function Dashboardv2_Ticket_Open()
	{
		$input_1 = $this->input->post('input_1');
		$input_2 = $this->input->post('input_2');
		header('Content-Type: application/json');
        echo $this->Ticket->Dashboardv2_Ticket_Open($input_1,$input_2);
	}

	function Dashboardv2_Ticket_Closed()
	{
		$input_1 = $this->input->post('input_1');
		$input_2 = $this->input->post('input_2');
		header('Content-Type: application/json');
        echo $this->Ticket->Dashboardv2_Ticket_Closed($input_1,$input_2);
	}

	function Dashboardv2_Ticket_Problem()
	{
		$input_1 = $this->input->post('input_1');
		$input_2 = $this->input->post('input_2');
		header('Content-Type: application/json');
        echo $this->Ticket->Dashboardv2_Ticket_Problem($input_1,$input_2);
	}


	function test_admin()
	{
		if((!empty($this->session->userdata('logged_in'))))
    	{
			$this->load->view('template/header/header');
			$this->load->view('template/body/admin_v3');
			$this->load->view('template/footer/footer');
		} else {
	      redirect('login');
	    }
	}

	function test_asset()
	{
		if((!empty($this->session->userdata('logged_in'))))
    	{
			$this->load->view('template/header/header');
			$this->load->view('template/body/asset_v3');
			$this->load->view('template/footer/footer');
		} else {
	      redirect('login');
	    }
	}
}
