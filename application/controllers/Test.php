
<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Test extends CI_Controller  {

  public function __construct()
  {

    parent::__construct();
    $this->load->database();
    $this->load->library('session');
    $this->load->library('datatables');
    $this->load->model('Test_model','Test');
   }
  public function index()
   {
    $this->data['site_title'] = 'test';
    $this->load->view('template/header/header');
    $this->load->view('template/body/test/test',$this->data);
    $this->load->view('template/footer/footer');
   }
    
	public function penang()
	{
		$this->data['site_title'] = 'penang';
		$this->load->view('template/header/header');
		$this->load->view('template/body/penang/penang',$this->data);
		$this->load->view('template/footer/footer');
	}

	public function login()
	{
		$this->data['site_title'] = 'xlogin';
		$this->load->view('template/header/header');
		$this->load->view('template/body/xlogin/xlogin',$this->data);
		$this->load->view('template/footer/footer');
	}

	public function request()
	{
		$this->data['site_title'] = 'request';
		$this->load->view('template/header/header');
		$this->load->view('template/body/request/request',$this->data);
		$this->load->view('template/footer/footer');
	}
	

	public function testdb2()
	{
		$data = $this->Test->TestDB2();
		var_dump($data);
	}

	function test_email()
	{
		$this->load->view('test_email');
	}


	function test_email2()
	{
		$this->load->library('email');

		$from_email = "admin@nexticks.com"; 
        //$to_email = $this->input->post('email'); 
   		
   		$to_email = 'sufianmohdhassan19@gmail.com';

        //Load email library 
		$this->load->library('email'); 

		$this->email->from($from_email, 'Your Name'); 
		$this->email->to($to_email);
		$this->email->subject('Email Test'); 
		$this->email->message('Testing the email class.'); 

		//Send mail 
		if($this->email->send()) 
		///$this->session->set_flashdata("email_sent","Email sent successfully."); 
		echo 'jadi';
		else
		echo 'xjadi'; 
		// $this->session->set_flashdata("email_sent","Error in sending Email."); 
		// $this->load->view('email_form'); 

	}


	public function sendemail(){
	  $config = Array(
					  'protocol' => 'smtp',
					  'smtp_host' => 'ssl://mail.nexticks.com',
					  'smtp_port' => 465,
					  'smtp_user' => 'admin@nexticks.com',
					  'smtp_pass' => 'P@ssword1234',
					);
	  $this->load->library('email', $config);
	  $this->email->set_newline("\r\n");
	  $this->email->from('admin@nexticks.com', 'Admin');
	  $this->email->to('sufianmohdhassan19@gmail.com');
	  $this->email->subject(' Test');
	  $this->email->message('Test');
	  if (!$this->email->send()) {
	    show_error($this->email->print_debugger()); }
	  else {
	    echo 'Your e-mail has been sent!';
	  }
	}

	function mail2()
	{
		$this->load->library('email');
		$config['protocol']='smtp';
		$config['smtp_host']='ssl://mail.nexticks.com';
		$config['smtp_port']='465';
		$config['smtp_timeout']='30';
		$config['smtp_user']='admin@nexticks.com';
		$config['smtp_pass']='P@ssword1234';
		$config['charset']='utf-8';
		$config['newline']="\r\n";
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from('admin@nexticks.com', 'Site name');
		$this->email->to('sufianmohdhassan19@gmail.com');
		$this->email->subject('Notification Mail');
		$this->email->message('Your message');
		if (!$this->email->send()) {
	    show_error($this->email->print_debugger()); }
		  else {
		    echo 'Your e-mail has been sent!';
		  }
	}	


	function schedule()
	{
		$this->load->view('template/notice/reschedule');
	}

	function json_data()
	{
		$productID = $this->input->post('productID');
		$query = $this->Test->json_data();

		echo json_encode($query);
		// if(empty($query)){
		// 	echo 'Tiada Data Ditemui';
		// } else {
		// 	foreach ($query as $data) 
		// 	{
			

		// 	}
		// 	echo json_encode($data);

		// }
	}


	function date_test()
	{
		$date = date('d/m/Y');

		$where = "	SELECT * FROM net_send_reschedule
        			WHERE date_schedule = '$date'
        		 ";

		var_dump($where);
	}



	function send_email()
	{
            //Load email library
	        $this->load->library('email');
	        
	        //SMTP & mail configuration
	        $config = array(
	            'protocol'  => 'smtp',
	            'smtp_host' => '72.18.130.33',
	            'smtp_port' => 587,
	            'smtp_user' => 'hafiz@nexquadrant.com',
	            'smtp_pass' => 'Abc@123',
	            'mailtype'  => 'html',
	            'charset'   => 'utf-8'
	        );
	        $this->email->initialize($config);
	        $this->email->set_mailtype("html");
	        $this->email->set_newline("\r\n");

       
            $this->email->from('hafiz@nexquadrant.com');

            $subject='testing email';
            $email='hafiz.shahipurullah@bit.com.my';
      
            $this->email->to($email);  // replace it with receiver mail id
            $this->email->subject($subject); // replace it with relevant subject
           
                // $body = $this->load->view('email/reset_password.php',$data,TRUE);
                
            //var_dump($body);

            $body = '<h1>Computer/Notebook anda telah diselengara oleh Pihak ICT Hospital Tunku Azizah.  Sila tekan <a href="'.base_url().'Form_PPM/PDF_Computer/9681" download>Disini</a> untuk muaturun bukti selengaraan </h1>';
                
            $this->email->message($body);  
            if($this->email->send()){
            	echo 'sent';
            } else {
            	echo 'xsent';
            }
            echo $this->email->print_debugger();
	}


	function all_computer()
	{
		$check = $this->Test->all_computer();
		echo $check;
	}

   }


 	
