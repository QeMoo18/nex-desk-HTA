<?php
defined('BASEPATH') OR exit('No direct script access allowed');//ob_clean();
class Ticket extends CI_Controller  {

  public function __construct()
  {

    parent::__construct();
    $this->load->database();
    $this->load->library('session');
    $this->load->library('datatables');
    $this->load->model('Ticket_model','Ticket');
    $this->load->model('Dbase_lookup','lookup');
    $this->load->helper('Lookup_helper'); //helpers
    $this->load->model('Admin_model','Admin'); 


    $this->load->model('Paging_model','Paging'); 

    $this->load->library('pagination');
   }


/* NEW PHONE TICKET */
    public function CreateTicket_Phone()
    {   

        if((!empty($this->session->userdata('logged_in'))))
        {

            $this->data['site_title'] = 'CreateTicket_Phone';
            $this->load->view('template/header/header');
            // $this->load->view('template/body/CreateTicket_Phone/CreateTicket_Phone',$this->data);
            // $this->load->view('template/body/CreateTicket_Phone/CreateTicket_Phone_v3',$this->data);
            $this->load->view('template/body/CreateTicket_Phone/CreateTicket_Phone_v4',$this->data);
            $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }


    }

    public function CreateTicket_Phone_add()
    { 
        $tp_ReferenceNo = $this->input->post('tp_ReferenceNo');
        $tp_service = $this->input->post('tp_service');
        $tp_sla = $this->input->post('tp_sla');
        $tp_loc = $this->input->post('tp_loc');
        $tp_cu = $this->input->post('tp_cu');
        $tp_cuID = $this->input->post('tp_cuID');
        $tp_itsm = $this->input->post('tp_itsm');
        $tp_title = $this->input->post('tp_title');
        $tp_type = $this->input->post('tp_type');
        $tp_queue = $this->input->post('tp_queue');
        $tp_option = $this->input->post('tp_option');
        $tp_text = $this->input->post('tp_text');
        $tp_attachment = $this->input->post('tp_attachment');
        $tp_pd = $this->input->post('tp_pd');
        $tp_calendar = $this->input->post('tp_calendar');
        $tp_impact = $this->input->post('tp_impact');
        $tp_priority = $this->input->post('tp_priority');
        $tp_mls = $this->input->post('tp_mls');
        $tp_bt = $this->input->post('tp_bt');
        $tp_bs = $this->input->post('tp_bs');
        $tp_to = $this->input->post('tp_to');
        $tp_r = $this->input->post('tp_r');

          //default data 
        $updateBy = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date 


        // auto create id : random id
        $other_id = rand();

        // 1 insert baru akan di generate random id - other_id
        // untuk trace 2 table iaitu table data dan table log actvities
        // bila berlaku masalah kita akan check dekat table data dan amk id - other id
        // check balik dekat log activiti guna other_id

        $data = array(  "Reference_No"=>$tp_ReferenceNo,
                        "Service"=>$tp_service,
                        "Service_Level_Agreement"=>$tp_sla,
                        "Location"=>$tp_loc,
                        "Customer_User"=>$tp_cu,
                        "Customer_ID"=>$tp_cuID,
                        "ITSM_Category"=>$tp_itsm,
                        "Title"=>$tp_title,
                        "Type"=>$tp_type,
                        "Queue"=>$tp_queue,
                        "Option"=>$tp_option,
                        "Text"=>$tp_text,
                        "attachment"=>$tp_attachment,
                        "Pending_Date"=>$tp_calendar,
                        "impact"=>$tp_impact,
                        "priority"=>$tp_priority,
                        "Main_Line_Status"=>$tp_mls,
                        "Backup_Type"=>$tp_bt,
                        "Backup_Status"=>$tp_bs,
                        "Ticket_Owner"=>$tp_to,
                        "Responsible"=>$tp_r,
                        "other_id"=>$other_id,
                        "current_state"=>"New"
                      );

        // create function dekat model 
        $save = $this->Admin->CreateTicket_Phone_add($data);


        //code untuk save log
        //fungsi untuk trace activiti user
        $data = array(
                        "type_activities"=>"Add Phone Ticket",
                        "created_by"=>$updateBy,
                        "other_id"=>$other_id
                      );

        $this->Admin->saveLog($data);
    }


/*END */



/* NEW EMAIL TICKET */
    public function CreateTicket_Email()
    {

    	$this->data['site_title'] = 'CreateTicket_Email';
    	$this->load->view('template/header/header');
    	// $this->load->view('template/body/CreateTicket_Email/CreateTicket_Email',$this->data);
        $this->load->view('template/body/CreateTicket_Email/CreateTicket_Email_v4',$this->data);
    	$this->load->view('template/footer/footer');

    }

     public function CreateTicket_Email_add()
    { 
        $te_ReferenceNo = $this->input->post('te_ReferenceNo');
        $te_service = $this->input->post('te_service');
        $te_sla = $this->input->post('te_sla');
        $te_loc = $this->input->post('te_loc');
        $te_cu = $this->input->post('te_cu');
        $te_cuID = $this->input->post('te_cuID');
        $te_itsm = $this->input->post('te_itsm');
        $te_cc = $this->input->post('te_cc');
        $te_bcc = $this->input->post('te_bcc');
        $te_type = $this->input->post('te_type');
        $te_queue = $this->input->post('te_queue');
        $te_option = $this->input->post('te_option');
        $te_text = $this->input->post('te_text');
        $te_attachment = $this->input->post('te_attachment');
        $te_pd = $this->input->post('te_pd');
        $te_impact = $this->input->post('te_impact');
        $te_priority = $this->input->post('te_priority');
        $te_mls = $this->input->post('te_mls');
        $te_bt = $this->input->post('te_bt');
        $te_bs = $this->input->post('te_bs');
        $te_to = $this->input->post('te_to');
        $te_responsible = $this->input->post('te_responsible');

          //default data 
        $updateBy = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date 


        // auto create id : random id
        $other_id = rand();

        // 1 insert baru akan di generate random id - other_id
        // untuk trace 2 table iaitu table data dan table log actvities
        // bila berlaku masalah kita akan check dekat table data dan amk id - other id
        // check balik dekat log activiti guna other_id

        $data = array(  "name"=>$te_ReferenceNo,
                        "Service"=>$te_service,
                        "Service_Level_Agreement"=>$te_sla,
                        "Location"=>$te_loc,
                        "Customer_User"=>$te_cu,
                        "Customer_ID"=>$te_cuID,
                        "ITSM_Category"=>$te_itsm,
                        "Cc"=>$te_cc,
                        "Bcc"=>$te_bcc,
                        "Type"=>$te_type,
                        "Queue"=>$te_queue,
                        "Option"=>$te_option,
                        "text"=>$te_text,
                        "attachment"=>$te_attachment,
                        "Pending_Date"=>$te_calendar,
                        "impact"=>$te_impact,
                        "priority"=>$te_priority,
                        "Main_Line_Status"=>$te_mls,
                        "Backup_Type"=>$te_bt,
                        "Backup_Status"=>$te_bs,
                        "Ticket_Owner"=>$te_to,
                        "Responsible"=>$te_responsible,
                        "other_id"=>$other_id,
                        "current_state"=>"New"
                      );

        // create function dekat model 
        $save = $this->Admin->CreateTicket_Email_add($data);


        //code untuk save log
        //fungsi untuk trace activiti user
        $data = array(
                        "type_activities"=>"Add Email Ticket",
                        "created_by"=>$updateBy,
                        "other_id"=>$other_id
                      );

        $this->Admin->saveLog($data);
    }


    /* Ticket Status View */
    public function Ticket_MobileView()
    {

            $this->data['site_title'] = 'Ticket_StatusView';
            $this->load->view('template/header/header');
            $this->load->view('template/body/Ticket_MobileView/Ticket_MobileView',$this->data);
            $this->load->view('template/footer/footer');

    }


    /* Ticket Status View */
    // public function Ticket_StatusView()
    // {

            // $this->data['site_title'] = 'Ticket_StatusView';
            // $this->load->view('template/header/header');
            // $this->load->view('template/body/Ticket_StatusView/Ticket_StatusView',$this->data);
            // $this->load->view('template/footer/footer');

    // }
    /* END */   



    /* Paging Ticket View */ 
    public function Ticket_StatusView($rowno=0)
    {
        $search_text = "";
        if($this->input->post('submit') != NULL ){
            $search_text = $this->input->post('search');
            $this->session->set_userdata(array("search"=>$search_text));
        } else {
            if($this->session->userdata('search') != NULL){
                $search_text = $this->session->userdata('search');
            }
        }

        $rowperpage = 10;
        if($rowno != 0){
          $rowno = ($rowno-1) * $rowperpage;
        }

        $allcount = $this->Paging->Ticket_StatusView_Count($search_text);
        $users_record = $this->Paging->Ticket_StatusView_Data($rowno,$rowperpage,$search_text);

    

        $config['base_url'] = base_url().'Ticket/Ticket_StatusView';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;


        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li class="paginate_button page-item ">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '«';
        $config['prev_tag_open'] = '<li class="paginate_button page-item prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '»';
        $config['next_tag_open'] = '<li paginate_button page-item >';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li paginate_button page-item >';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class=" paginate_button page-item active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li paginate_button page-item >';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);


        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $users_record;
        $data['row'] = $rowno;
        $data['search'] = $search_text;

        $this->load->view('template/header/header');
        $this->load->view('template/body/Ticket_StatusView/Ticket_StatusView_Paging',$data);
        $this->load->view('template/footer/footer');

        //var_dump($data);

        //exit();
    }
    /* END */


    /* Ticket Closed */
    public function Ticket_ClosedTicket()
    {

            $this->data['site_title'] = 'Ticket_ClosedTicket';
            $this->load->view('template/header/header');
            $this->load->view('template/body/Ticket_ClosedTicket/Ticket_ClosedTicket',$this->data);
            $this->load->view('template/footer/footer');

    }
    /* END */

    /* Detail Ticket */
    public function Ticket_DetailTicket()
    {

            $this->data['site_title'] = 'Ticket_DetailTicket';
            $this->load->view('template/header/header');
            $this->load->view('template/body/Ticket_DetailTicket/Ticket_DetailTicket',$this->data);
            $this->load->view('template/footer/footer');

    }

    public function Ticket_ViewActivities()
    {

            $this->data['site_title'] = 'Ticket_DetailTicket';
            $this->load->view('template/header/header');
            $this->load->view('template/body/Ticket_DetailTicket/Ticket_ViewActivities',$this->data);
            $this->load->view('template/footer/footer');

    }

    public function Ticket_DetailTicket_V1()
    {

            $this->data['site_title'] = 'Ticket_DetailTicket';
            $this->load->view('template/header/header');
            $this->load->view('template/body/Ticket_DetailTicket/Ticket_DetailTicket_V1',$this->data);
            $this->load->view('template/footer/footer');

    }
    /* END */

    /* Ticket Print */
    public function Ticket_ButtonPrint()
    {

            $this->data['site_title'] = 'Ticket_ButtonPrint';
            $this->load->view('template/header/header');
            $this->load->view('template/body/Ticket_ButtonPrint/Ticket_ButtonPrint',$this->data);
            $this->load->view('template/footer/footer');

    }
    /* END */

    /* Ticket Btn Add ITSM */
    public function Ticket_Button_Add_ITSM()
    {

            $this->data['site_title'] = 'Ticket_Button_Add_ITSM';
            $this->load->view('template/header/header');
            $this->load->view('template/body/Ticket_Button_Add_ITSM/Ticket_Button_Add_ITSM',$this->data);
            $this->load->view('template/footer/footer');

    }
    /*END */

    /* Ticket Button First Level */
    public function Ticket_Button_First_Level()
    {

            $this->data['site_title'] = 'Ticket_Button_First_Level';
            $this->load->view('template/header/header');
            $this->load->view('template/body/Ticket_Button_First_Level/Ticket_Button_First_Level',$this->data);
            $this->load->view('template/footer/footer');

    }
    /* END */

    /* Ticket Btn Note */
    public function Ticket_Button_Note()
    {

            $this->data['site_title'] = 'Ticket_Button_Note';
            $this->load->view('template/header/header');
            $this->load->view('template/body/Ticket_Button_Note/Ticket_Button_Note',$this->data);
            $this->load->view('template/footer/footer');

    }
    /* END */

    /* Ticket Btn Owner */
    public function Ticket_Button_Owner()
    {

            $this->data['site_title'] = 'Ticket_Button_Owner';
            $this->load->view('template/header/header');
            $this->load->view('template/body/Ticket_Button_Owner/Ticket_Button_Owner',$this->data);
            $this->load->view('template/footer/footer');

    }
    /* END */

    /* Start Btn Responsible */
    public function Ticket_Button_Responsible()
    {

            $this->data['site_title'] = 'Ticket_Button_Responsible';
            $this->load->view('template/header/header');
            $this->load->view('template/body/Ticket_Button_Responsible/Ticket_Button_Responsible',$this->data);
            $this->load->view('template/footer/footer');

    }
    /* END */

    /* Start Btn Customer */
    public function Ticket_Customer_User()
    {

            $this->data['site_title'] = 'Ticket_Customer_User';
            $this->load->view('template/header/header');
            $this->load->view('template/body/Ticket_Customer_User/Ticket_Customer_User',$this->data);
            $this->load->view('template/footer/footer');

    }
    /* END */   

    /* Ticket Closed */
    public function Ticket_Btn_Closed()
    {

            $this->data['site_title'] = 'Ticket_Btn_Closed';
            $this->load->view('template/header/header');
            $this->load->view('template/body/Ticket_Btn_Closed/Ticket_Btn_Closed',$this->data);
            $this->load->view('template/footer/footer');

    }
    /* END */


    function List_ref_no()
    {
        $data = $this->lookup->List_ref_no();
    }

    function get_other_id()
    {

        $tp_ReferenceNo = $this->input->post('tp_ReferenceNo');
        $tp_ReferenceNo = trim($tp_ReferenceNo, " ");
        $tp_ReferenceNo = $this->Ticket->get_other_id($tp_ReferenceNo);
    }

    function get_the_key()
    {
        $Location_ID = $this->input->post('Location_ID');
        $Location_ID = trim($Location_ID, " ");
        $query = $this->Ticket->get_the_key($Location_ID);

        if(empty($query)){
            echo 'Tiada Data Ditemui';
        } else {
            foreach ($query as $data) 
            {

            }
            echo json_encode($data);
        }
    }

    function get_location()
    {
        $cat = $this->input->post('cat');
        $other_id = $this->input->post('other_id');
        $this->Ticket->get_location($cat,$other_id);
    }

    function get_service()
    {
        $id = $this->input->post('service');
        $this->Ticket->get_service($id);
    }

    function get_sla()
    {
        $id = $this->input->post('sla');
        $this->Ticket->get_sla($id);
    }


    // start end 

    function get_location_user()
    {
        $ticket_id = $this->input->post('ticket_id');
        $this->Ticket->get_location_user($ticket_id);
    }

    function get_service_user()
    {
        $ticket_id = $this->input->post('ticket_id');
        $this->Ticket->get_service_user($ticket_id);
    }

    function get_sla_user()
    {
        $ticket_id = $this->input->post('ticket_id');
        $this->Ticket->get_sla_user($ticket_id);
    }


    //end 

    function get_customer()
    {
        $id = $this->input->post('customerID');
        $this->Ticket->get_customer($id);
    }

    function get_customerID()
    {
        $id = $this->input->post('customerID');
        $this->Ticket->get_customerID($id);
    }

    function add_ticket()
    {
        //customer information
        $other_id   = $this->input->post('other_id');
        $ref = $this->input->post('tp_ReferenceNo');
        $tp_service = $this->input->post('tp_service');
        $tp_sla = $this->input->post('tp_sla');
        $tp_loc = $this->input->post('tp_loc');
        $tp_cuID = $this->input->post('tp_cuID');
        
        $tp_cu = $this->input->post('tp_cu');

        $tp_phone = $this->input->post('tp_phone');
        $tp_extension = $this->input->post('tp_extension');
        //$tp_cu = mysqli_real_escape_string($tp_cu);
        
        $tp_email = $this->input->post('tp_email');
        if(!empty($tp_email)){
            $update_email = $this->Ticket->update_email($tp_cu,$tp_email);
        }


        if(!empty($tp_phone)){
            $update_phone = $this->Ticket->update_phone($tp_cu,$tp_phone);
        }


        if(empty($tp_cu)){
            $tp_cu='9999'; // user dummy for not related
        }
        

        if(empty($ref)){
            $ref='9999';
        }

        if(empty($tp_loc)){
            $tp_loc='9999';
        }



        $env = $this->session->userdata('env');
        
        if($env=='hospital'){

        } else {
            //$tp_cu = mysql_real_escape_string($tp_cu);
        }
        

        $tp_itsm = $this->input->post('tp_itsm');

        // ticket information
        $tp_title = $this->input->post('tp_title');
        $tp_type = $this->input->post('tp_type');
        $tp_queue = $this->input->post('tp_queue');
        
        $html_link_content = $this->input->post('html_link_content');
        
        $tp_attachment = $this->input->post('userfile');

        $tp_calendar = $this->input->post('tp_calendar');
        $tp_priority = $this->input->post('tp_priority');
        $tp_mls = $this->input->post('tp_mls');
        $tp_bt = $this->input->post('tp_bt');
        $tp_bs = $this->input->post('tp_bs');
        $type_module = $this->input->post('type_module');
        $type_dothis = $this->input->post('type_dothis');
        $tp_impact = $this->input->post('tp_impact');
        $tp_cc = $this->input->post('tp_cc');
        $tp_bcc = $this->input->post('tp_bcc');


        //agent information
        $tp_to = $this->input->post('tp_to');
        $tp_r = $this->input->post('tp_r');

        $fault_itsm_cat = $this->input->post('fault_itsm_cat');


        if($this->uri->segment(3)=='order_mobile'){
            $id = $this->uri->segment(4);
            $this->Ticket->update_status_mobile($id);
        }


        // hospital
        $sla_type_main = $this->input->post('sla_type_main');
        $tp_faultCategory = $this->input->post('tp_faultCategory');
        $tp_severity = $this->input->post('tp_severity');
        $problem_desc_itsm = $this->input->post('problem_desc_itsm');

        $created_by = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date 

        $id_format =date("Y/m/d");
        $id_format = str_replace("/","",$id_format);

        $ms    = microtime(true);
        $random = rand();

        if($tp_type=='Change Request'){
            $format = 'CR';
        } else if($tp_type=='Incident'){
            $format = 'IN';
        } else {
            $format = '';
        }

        $id_ticket = $format.$id_format.$random;



        // hospital module - START
        $env = $this->session->userdata('env');
        if($env=='hospital'){
            $mail_start_date = $datetime;

            $due_time = $this->Ticket->get_time_severity($tp_severity);
            $newtimestamp = strtotime(''.$datetime.' + '.$due_time.' minute');
            $mail_due_date = date('Y-m-d H:i:s', $newtimestamp);

            if($tp_queue=='Helpdesk'){
                $mail_receiver = 'bit_hselhepldesk@bit.com.my';
                $mail_to = 'Dear Helpdesk Unit';
            } else if($tp_queue=='Network'){
                $mail_receiver = 'BIT_HSELTECHSUPPENG@bit.com.my';
                $mail_to = 'Dear Network/Hardware Unit';
            } else if($tp_queue=='Hardware'){
                $mail_receiver = 'BIT_HSELTECHSUPPENG@bit.com.my';
                $mail_to = 'Dear Network/Hardware Unit';
            } else if($tp_queue=='System'){
                $mail_receiver = 'bit_hselsystem@bit.com.my';
                $mail_to = 'Dear System Unit';
            } else if($tp_queue=='Application'){
                $mail_receiver = 'bit_hselapplication@bit.com.my';
                $mail_to = 'Dear Application Unit';
            } else {
                $mail_receiver = 'alkhid@selayanghospital.gov.my';
                $mail_to = 'Dear All Khidmat Teknikal IT Unit';
            }

            // var_dump($mail_receiver); exit();

            $mail_subject = $tp_title;
            $mail_description = $html_link_content;

            if($tp_type=='Change Request'){
                $mail_tp_type = 'CHANGE REQUEST';
            } else if($tp_type=='Incident'){
                $mail_tp_type = 'INCIDENT';
            } else {
                $mail_tp_type = '';
            }

            $mail_title = $mail_tp_type.' : Pool Assignment : '.$id_ticket.' '.$mail_subject;

            $mail_category = $problem_desc_itsm;

            $mail_location = $tp_loc;

            if($mail_location=='9999'){
                $mail_location = 'Not Related';
            }

            // $send_email = $this->sendEmail($mail_start_date,$mail_due_date,$mail_to,$mail_subject,$mail_description,$mail_receiver,$mail_title,$id_ticket,$mail_category);

            $cc = 'allkhid@selayanghospital.gov.my,rosdi.ismail@bit.com.my,nexhospital@gmail.com';

            $html = $mail_to.',<br> <br> Ticket '.$id_ticket.' filed on '.$mail_start_date.' has been assigned to your pool.<br> Due Date Time '.$mail_due_date.'<br><br> Please refer to below particulars : <br> Category : '.$mail_category.' <br> Subject : '.$mail_subject.' <br> Location : '.$mail_location.' <br> Description : '.$mail_description.'<br> Kindly attend to said ticket as soon as possible. In reminder of our quality of service, please note of the target completion date. <br><br> Regards,<br>Selayang Hospital IT Department';

            $send_email = $this->sendEmail($mail_receiver,$mail_title,$html,$cc);
        }
        
        // hospital module - END 

        // 1- register ticket 
        $data = array
                (
                    "ref_no"=>$ref,
                    "service"=>$tp_service,
                    "sla"=>$tp_sla,
                    "location"=>$tp_loc,
                    "custID"=>$tp_cuID,
                    "category"=>$tp_itsm,
                    "pending_date"=>$tp_calendar,
                    "impact"=>$tp_impact,
                    "priority"=>$tp_priority,
                    "main_status"=>$tp_mls,
                    "backup_type"=>$tp_bt,
                    "backup_status"=>$tp_bs,
                    "ticket_owner"=>$tp_to,
                    "ticket_responsibilty"=>$tp_r,
                    "type_ticket"=>$type_module,
                    "created_date"=>$datetime,
                    "created_by"=>$created_by,
                    "id_ticket"=>$id_ticket,
                    "status_ticket"=>"new",
                    "itsm_category"=>$type_dothis,
                    "current_state"=>"New",
                    "type_enviroment"=>$sla_type_main,
                    "faultCategory"=>$tp_faultCategory,
                    "severity"=>$tp_severity,
                    "fault_itsm_category"=>$fault_itsm_cat,
                    "problem_desc_itsm"=>$problem_desc_itsm,
                    "extension_no"=>$tp_extension
                );
        $data = $this->Ticket->register_ticket($data);


        
        // 2 - customer user ticket
        $tp_cu = $this->Ticket->get_id_cu($tp_cu);

        $data = array
                (
                    "custUser"=>$tp_cu,
                    "id_ticket"=>$id_ticket
                );
        $data = $this->Ticket->customerUser($data);

        // 3 - customer user ticket
        $id_noted = rand();
        if($type_module=='phone'){
             $data = array
                (
                    "title"=>$tp_title,
                    "type"=>$tp_type,
                    "queu"=>$tp_queue,
                    "text_editor"=>$html_link_content,
                    "id_ticket"=>$id_ticket,
                    "id_noted"=>$id_noted
                );
        } else {
             $data = array
                (
                    "title"=>$tp_title,
                    "type"=>$tp_type,
                    "queu"=>$tp_queue,
                    "text_editor"=>$html_link_content,
                    "id_ticket"=>$id_ticket,
                    "cc"=>$tp_cc,
                    "bcc"=>$tp_bcc,
                    "id_noted"=>$id_noted
                );
        }

       
        $data = $this->Ticket->parent_note($data);



        // add child
        $rand = rand();
        $data = array
            (

                "id_ticket"=>$id_ticket,
                "text_editor"=>$html_link_content,
                "type_note"=>"new",
                "created_by"=>$created_by,
                "created_date"=>$datetime,
                "id_noted"=>$rand,
                "type_state"=>"New"
            );
        $this->Ticket->add_note($data);   




        // 4 - attachment
        $file_name = $_FILES['userfile']['name'];

        if(!empty($file_name))
        {
            $file_name = rand().$_FILES['userfile']['name'];
            $config = array(
                    'upload_path' => "./upload_ticket/",
                    //'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'overwrite' => TRUE,
                    'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                    'max_height' => "5000",
                    'max_width' => "5000",
                    //'encrypt_name'=>TRUE,
                    'remove_spaces'=>TRUE,
                    'file_name'=>$file_name
                  );

            $this->load->library('upload', $config);
            if($this->upload->do_upload())
            {
                $name_file = $config['file_name'];
                $data = array('upload_data' => $this->upload->data());

                $data = array
                        (
                            "attachment"=>$file_name,
                            "id_ticket"=>$id_ticket,
                            "id_noted"=>$id_noted
                        );

                $add = $this->Ticket->ticket_attachment($data);

                //$data = array("id_topic"=>$id_topic,"name_file"=>$file_name,"status"=>"1");
                //$this->Classroom->update_status_topic($id_topic,$data);

                //redirect('Classroom/Classroom_createtopic');
                
            }
            else
            {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error); exit();
                //$this->load->view('custom_view', $error);
            }

            
                    

 

        } else {
            
        }
        
        









        
        //sent email
        if($type_module=='phone'){
            echo 'Phone';

        } else {


            if(!empty($tp_cc)){
                $from_email = 'support@nex-desk.com';
                $headers = '';
                $headers .= "Reply-To: Nex-Desk <$from_email>\r\n"; 
                $headers .= "Return-Path: Nex-Desk <$from_email>\r\n"; 
                $headers .= "From: Nex-Desk <$from_email>\r\n";  
                $headers .= "Organization: Sender Organization\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                //$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8";
                $headers .= "X-Priority: 3\r\n";
                $headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
                
                if(!empty($tp_bcc)){
                    $headers .= "Bcc: $tp_bcc\r\n";
                }
                
                
                $subject = "Nex-Desk : Ticket Created  - ".$id_ticket;
                
                $first_name = $this->session->userdata('first_name');
                $message = "<h1>".$tp_title."</h1><br><p>Hi ".$tp_cuID." , you can refer your id ticket created - ".$id_ticket."<br>Ticket created by ".$first_name." at ".$datetime." </p>";

                $receive_email = $tp_cc;
                if(mail($receive_email, $subject, $message, $headers))
                {
                    echo 'Success';
                } else {
                    echo 'Failed';
                }
            }

        }



        $url = 'Ticket/Ticket_DetailTicket/'.$id_ticket;

        $updateBy = $this->session->userdata('userid');
        $data = array(
                      "type_activities"=>"Create Manual Ticket ",
                      "created_by"=>$updateBy,
                      "other_id"=>$id_ticket
                    );

        $this->Admin->saveLog($data);


        redirect($url);

    }

    function sendEmail($mail_receiver,$title,$html,$cc)
    {
        $this->load->library('email');
        $config['protocol']='smtp';
        $config['smtp_host']='10.24.251.125';
        $config['smtp_port']='25';
        //$config['smtp_timeout']='30';
        //$config['smtp_user']='admin@nexticks.com';
        //$config['smtp_pass']='P@ssword1234';
        $config['charset']='utf-8';
        $config['newline']="\r\n";
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->from('helpdesk@selayanghospital.gov.my', 'Selayang Hospital Service Desk');
        $this->email->to($mail_receiver);
        $this->email->cc($cc);
        $this->email->subject($title);


        $this->email->message($html);

        if($this->email->send()){
            // success
            $data = array(
                            'to_email'=>$mail_receiver,
                            'from_email'=>'helpdesk@selayanghospital.gov.my',
                            'subject'=>$title,
                            'status'=>'Success',
                            'cc'=>$cc
                         );

        } else {
            // end 
            $data = array(
                            'to_email'=>$mail_receiver,
                            'from_email'=>'helpdesk@selayanghospital.gov.my',
                            'subject'=>$title,
                            'status'=>'failed',
                            'cc'=>$cc
                         );
        }   


        $this->Ticket->email_status($data);


    }

    function Dtable_Ticket_Status_Email()
    {
        header('Content-Type: application/json');
        echo $this->Ticket->Dtable_Ticket_Status_Email();
    }


    public function Ticket_QueuView()
    {

            $this->data['site_title'] = 'Ticket_QueuView';
            $this->load->view('template/header/header');
            $this->load->view('template/body/Ticket_QueuView/Ticket_QueuView',$this->data);
            $this->load->view('template/footer/footer');

    }


    /* Mobile */
    function Ticket_MobileNewTicket()
    {
        if((!empty($this->session->userdata('logged_in'))))
        {

            $this->data['site_title'] = 'CreateTicket_Phone';
            $this->load->view('template/header/header');
            $this->load->view('template/body/CreateTicket_Mobile/CreateTicket_Mobile',$this->data);
            $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }
    }


    function Dtable_Ticket_Mobile()
    {

      header('Content-Type: application/json');
      echo $this->Ticket->Dtable_Ticket_Mobile();
    }


    public function details_mobile()
    {
        
        $id = $this->input->post('id');  // amik param yg kita post dekat view tadi
        $query = $this->Ticket->details_mobile($id); //declare nama model dan letak parameter dalam kurungan

        if(empty($query)){
            echo 'Tiada Data Ditemui';
        } else {

        foreach ($query as $data) 
        {

        }
            echo json_encode($data);
        }
    }

    /* END Mobile */


    function Dtable_Ticket()
    {
      $segment = $this->input->post('segment');
      header('Content-Type: application/json');
      echo $this->Ticket->Dtable_Ticket($segment);
    }

    function Dtable_Ticket_New()
    {
      header('Content-Type: application/json');
      echo $this->Ticket->Dtable_Ticket_New();
    }

    function Dtable_Ticket_Queu()
    {
      $id_group = $this->input->post('id_group');
      header('Content-Type: application/json');
      echo $this->Ticket->Dtable_Ticket_Queu($id_group);
    }

    function Dtable_Ticket_Closed()
    {
      header('Content-Type: application/json');
      echo $this->Ticket->Dtable_Ticket_Closed();
    }

    public function Ticket_PendingResume()
    {

            $this->data['site_title'] = 'Ticket_PendingResume';
            $this->load->view('template/header/header');
            $this->load->view('template/body/Ticket_PendingResume/Ticket_PendingResume',$this->data);
            $this->load->view('template/footer/footer');

    }

    function add_note_firstlevel()
    {
        $id_ticket = $this->input->post('id_ticket');
        $html_link_content = $this->input->post('html_link_content');
        $type = "first_level";

        $created_by = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date         


        $check = $this->Ticket->check_ticket_note($type,$id_ticket);

        $data = array(
                        "id_ticket"=>$id_ticket,
                        "total_minutes"=>'0'
                     );

        $this->Ticket->add_register_pending($data);


        

        if($check>0)
        {
            //echo "First Level Sudah Ada"; 
            //exit();
            $rand = rand();
            $rand = $rand.$rand.$rand;
            $url = 'Ticket/Ticket_DetailTicket/'.$id_ticket.'/lf/'.$rand.'t/f/'.$rand;
            redirect($url);

        } else {
            $id_noted = rand();
            $data = array
                    (
                        "id_ticket"=>$id_ticket,
                        "text_editor"=>$html_link_content,
                        "type_note"=>$type,
                        "created_date"=>$datetime,
                        "created_by"=>$created_by,
                        "id_noted"=>$id_noted,
                        "type_state"=>"First Level"
                    );

            $this->Ticket->add_note($data);

            // update ticket
            $data = array
                    (
                        "status_ticket"=>"open",
                        "updated_date"=>$datetime,
                        "updated_by"=>$created_by,
                        "current_state"=>"First Level"
                    );
            $this->Ticket->update_register_note($data,$id_ticket); 


            $updateBy = $this->session->userdata('userid');
            $data = array(
                          "type_activities"=>"Add First Level ",
                          "created_by"=>$updateBy,
                          "other_id"=>$id_ticket
                        );

            $this->Admin->saveLog($data);



            // release lock
            //$id_ticket = $this->input->post('id_ticket');
            $updateBy = $this->session->userdata('userid');
            $first_name = $this->session->userdata('first_name');

            $data = array('lock_by'=>$first_name,'status_lock'=>'0');
            $this->db->where('id_ticket',$id_ticket);
            $this->db->update('td_register_ticket',$data);

            $data2 = array('lock_by'=>$first_name,'status_lock'=>'0','id_ticket'=>$id_ticket);
            $this->db->insert('ticket_lock_activities',$data2);

            $this->session->set_flashdata('msg', 'msg');


            $url = 'Ticket/Ticket_DetailTicket/'.$id_ticket;
            redirect($url);
        }


    }

    function add_note_pendingresume()
    {
        $id_ticket = $this->input->post('id_ticket');
        $tp_title = $this->input->post('tp_title'); 
        $html_link_content = $this->input->post('html_link_content');
        $userfile = $this->input->post('userfile');
        $tp_state = $this->input->post('tp_state');
        $tp_calendar = $this->input->post('tp_calendar');

        $created_by = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date         

        $type = "first_level";
        $check = $this->Ticket->check_ticket_note($type,$id_ticket);
        $type_ticket = $this->input->post('type_ticket');

        $rand = rand();

        if($check>0)
        {

            if($type_ticket=='pending')
            {
                // update status register
                $data = array
                    (
                        "status_ticket"=>'pending',
                        "updated_by"=>$created_by,
                        "updated_date"=>$datetime,
                        "current_state"=>$tp_state
                    );
                $this->Ticket->update_register_note($data,$id_ticket); 

                
                $data = array
                    (

                        "id_ticket"=>$id_ticket,
                        "text_editor"=>$html_link_content,
                        "type_note"=>"pending",
                        "created_by"=>$created_by,
                        "created_date"=>$datetime,
                        "id_noted"=>$rand,
                        "type_state"=>$tp_state,
                    );
                $this->Ticket->add_note($data); 



                // get total time 
                //$check_status_resume= $this->Ticket->check_status_resume($id_ticket);
                //echo $check_status_resume; exit();

                // if($check_status_resume>0)
                // {
                //     $get_pending = $this->Ticket->get_pending($id_ticket);
                //     $get_resume = $this->Ticket->get_resume($id_ticket);

                //     $get_different_pending_resume = $this->Ticket->get_different_pending_resume($id_ticket,$get_pending,$get_resume);

                //     //echo $get_different_pending_resume;

                // } else {

                //     $get_pending = $this->Ticket->get_pending($id_ticket);
                //     $get_resume = $datetime;

                //     $get_different_pending_resume = $this->Ticket->get_different_pending_resume($id_ticket,$get_pending,$get_resume);
                // }


                //new calculation 
                $data = array(
                                "id_ticket"=>$id_ticket,
                                "status"=>"pending",
                                "date"=>$datetime
                             );

                $save = $this->Ticket->save_pending_time($data);



            } else if($type_ticket=='resume'){    

                // update status register
                $data = array
                    (
                        "status_ticket"=>'open',
                        "updated_by"=>$created_by,
                        "updated_date"=>$datetime,
                        "current_state"=>$tp_state
                    );
                $this->Ticket->update_register_note($data,$id_ticket); 

                
                $data = array
                    (

                        "id_ticket"=>$id_ticket,
                        "text_editor"=>$html_link_content,
                        "type_note"=>'open',
                        "created_by"=>$created_by,
                        "created_date"=>$datetime,
                        "id_noted"=>$rand,
                        "type_state"=>$tp_state,
                    );
                $this->Ticket->add_note($data); 


                //$get_pending = $this->Ticket->get_pending($id_ticket);
                //$get_resume = $datetime;

                //$get_different_pending_resume = $this->Ticket->get_different_pending_resume($id_ticket,$get_pending,$get_resume);

                //new calculation 
                $data = array(
                                "id_ticket"=>$id_ticket,
                                "status"=>"resume",
                                "date"=>$datetime
                             );

                $save = $this->Ticket->save_pending_time($data);


                // get total hours
                //check dulu dah ada amount dekat 'td_total_pending'
                $check = $this->Ticket->check_total_pending2($id_ticket);
                if($check>0){

                    $date = $this->Ticket->get_date_pending($id_ticket);
                    $get_second = $this->Ticket->get_second_pending($date,$id_ticket);
                    $get_ready_second = $this->Ticket->get_ready_second($id_ticket);
                    $total_Second = $get_second + $get_ready_second;
                    //update
                        $data = array(
                                        "total_minutes"=>$total_Second
                                     );
                        $update = $this->Ticket->update_total_pending2($data,$id_ticket);

                } else {
                    //get date td_count_pending
                    $date = $this->Ticket->get_date_pending($id_ticket);
                    $get_second = $this->Ticket->get_second_pending($date,$id_ticket);
                    // insert 
                    $data = array(
                                    "id_ticket"=>$id_ticket,
                                    "total_minutes"=>$get_second
                                 );
                    $add = $this->Ticket->add_total_pending($data);


                }


            } 



            // 4 - attachment
        $file_name = $_FILES['userfile']['name'];

        if(!empty($file_name))
        {
            $file_name = rand().$_FILES['userfile']['name'];
            $config = array(
                    'upload_path' => "./upload_ticket/",
                    //'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'overwrite' => TRUE,
                    'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                    'max_height' => "5000",
                    'max_width' => "5000",
                    //'encrypt_name'=>TRUE,
                    'remove_spaces'=>TRUE,
                    'file_name'=>$file_name
                  );

            $this->load->library('upload', $config);
            if($this->upload->do_upload())
            {
                $name_file = $config['file_name'];
                $data = array('upload_data' => $this->upload->data());

                $data = array
                        (
                            "attachment"=>$file_name,
                            "id_ticket"=>$id_ticket,
                            "id_noted"=>$rand
                        );

                $add = $this->Ticket->ticket_attachment($data);

                //$data = array("id_topic"=>$id_topic,"name_file"=>$file_name,"status"=>"1");
                //$this->Classroom->update_status_topic($id_topic,$data);

                //redirect('Classroom/Classroom_createtopic');
                
            }
            else
            {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error); exit();
                //$this->load->view('custom_view', $error);
            }
        }


        } else {

            echo "First Level Belum Ada"; 
            exit();
        }



        $updateBy = $this->session->userdata('userid');
        $first_name = $this->session->userdata('first_name');

        $data = array('lock_by'=>$first_name,'status_lock'=>'0');
        $this->db->where('id_ticket',$id_ticket);
        $this->db->update('td_register_ticket',$data);

        $data2 = array('lock_by'=>$first_name,'status_lock'=>'0','id_ticket'=>$id_ticket);
        $this->db->insert('ticket_lock_activities',$data2);

        $this->session->set_flashdata('msg', 'msg');


        $url = 'Ticket/Ticket_DetailTicket/'.$id_ticket;
        redirect($url);


    }

    function add_note_btnnote()
    {
        $id_ticket = $this->input->post('id_ticket');
        $tp_r = $this->input->post('tp_r');
        $tp_state = $this->input->post('tp_state');
        $tp_calendar = $this->input->post('tp_calendar');
        $html_link_content = $this->input->post('html_link_content');

        $created_by = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date         

        $type = "first_level";

        $check = $this->Ticket->check_ticket_note($type,$id_ticket);


        $updateBy = $this->session->userdata('userid');
        $data = array(
                      "type_activities"=>"Add Note Ticket ",
                      "created_by"=>$updateBy,
                      "other_id"=>$id_ticket
                    );

        $this->Admin->saveLog($data);



        if($check>0)
        {
            $type = "note";
            $id_noted = rand();
            $data = array
                    (
                        "id_ticket"=>$id_ticket,
                        "text_editor"=>$html_link_content,
                        "type_note"=>$type,
                        "created_date"=>$datetime,
                        "created_by"=>$created_by,
                        "id_noted"=>$id_noted,
                        "type_state"=>$tp_state
                    );

            $this->Ticket->add_note($data);  

            $data = array
                    (
                        "ticket_responsibilty"=>$tp_r,
                        //"status_ticket"=>$tp_state,
                        "pending_date"=>$tp_calendar,
                        "updated_date"=>$datetime,
                        "updated_by"=>$created_by,
                        "current_state"=>$tp_state
                    );
            $this->Ticket->update_register_note($data,$id_ticket);  


            $updateBy = $this->session->userdata('userid');
            $first_name = $this->session->userdata('first_name');

            $data = array('lock_by'=>$first_name,'status_lock'=>'0');
            $this->db->where('id_ticket',$id_ticket);
            $this->db->update('td_register_ticket',$data);

            $data2 = array('lock_by'=>$first_name,'status_lock'=>'0','id_ticket'=>$id_ticket);
            $this->db->insert('ticket_lock_activities',$data2);

            $this->session->set_flashdata('msg', 'msg');




            $url = 'Ticket/Ticket_DetailTicket/'.$id_ticket;
            redirect($url);

        } else {
            echo "First Level Belum Ada"; 
            exit();
        }
    }

    function update_note_owner()
    {
        $id_ticket = $this->input->post('id_ticket');
        $Ticket_New_Owner = $this->input->post('owner');

        $created_by = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date  

        $data = array
                (
                    'ticket_owner'=>$Ticket_New_Owner,
                    "updated_date"=>$datetime,
                    "updated_by"=>$created_by
                );

        $update = $this->Ticket->update_note_owner($data,$id_ticket);


        $updateBy = $this->session->userdata('userid');
        $data = array(
                      "type_activities"=>"Update Owner Ticket ",
                      "created_by"=>$updateBy,
                      "other_id"=>$id_ticket
                    );

        $this->Admin->saveLog($data);


        $updateBy = $this->session->userdata('userid');
        $first_name = $this->session->userdata('first_name');

        $data = array('lock_by'=>$first_name,'status_lock'=>'0');
        $this->db->where('id_ticket',$id_ticket);
        $this->db->update('td_register_ticket',$data);

        $data2 = array('lock_by'=>$first_name,'status_lock'=>'0','id_ticket'=>$id_ticket);
        $this->db->insert('ticket_lock_activities',$data2);

        $this->session->set_flashdata('msg', 'msg');

        redirect('Ticket/Ticket_DetailTicket/'.$id_ticket);

    }

    function update_note_responsible()
    {
        $id_ticket = $this->input->post('id_ticket');
        $title = $this->input->post('Title');
        $respond = $this->input->post('Ticket_Btn_Responsible_Responsible');

        $created_by = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date  

        // update main ticket
        $data = array
                (
                    "title"=>$title
                );
        $this->Ticket->update_parent_note($data,$id_ticket); 

        $data = array
                (
                    'ticket_responsibilty'=>$respond,
                    "updated_date"=>$datetime,
                    "updated_by"=>$created_by
                );

        $update = $this->Ticket->update_note_responsible($data,$id_ticket);


        $updateBy = $this->session->userdata('userid');
        $data = array(
                      "type_activities"=>"Update Responsible Ticket",
                      "created_by"=>$updateBy,
                      "other_id"=>$id_ticket
                    );

        $this->Admin->saveLog($data);


        $updateBy = $this->session->userdata('userid');
        $first_name = $this->session->userdata('first_name');

        $data = array('lock_by'=>$first_name,'status_lock'=>'0');
        $this->db->where('id_ticket',$id_ticket);
        $this->db->update('td_register_ticket',$data);

        $data2 = array('lock_by'=>$first_name,'status_lock'=>'0','id_ticket'=>$id_ticket);
        $this->db->insert('ticket_lock_activities',$data2);

        $this->session->set_flashdata('msg', 'msg');


        redirect('Ticket/Ticket_DetailTicket/'.$id_ticket);
    }

    function add_custUser()
    {
        $id_ticket = $this->input->post('id_ticket');
        $ticket_customer_id = $this->input->post('ticket_customer_id');
        $tp_cu = $this->input->post('tp_cu');

        $id_ticket = trim($id_ticket, " ");
        $ticket_customer_id = trim($ticket_customer_id, " ");
        $tp_cu = trim($tp_cu, " ");

        $ticket_customer_id = $this->Ticket->getID_Customer($ticket_customer_id);

        $data = array
                (
                    "id_ticket"=>$id_ticket,
                    "custUser"=>$tp_cu
                );

        $addUser = $this->Ticket->add_custUser($data);

        redirect('Ticket/Ticket_DetailTicket/'.$id_ticket);
    }

    function list_custUser()
    {
        $id_ticket = $this->input->post('id_ticket');
        $list = $this->Ticket->list_custUser($id_ticket);

    }

    function delete_custUser()
    {
        $id = $this->input->post('id');
        $list = $this->Ticket->delete_custUser($id);
    }

    function add_itsm()
    {
        $id_ticket = $this->input->post('id_ticket');
        $itsm_subject_title = $this->input->post('itsm_subject_title');
        $itsm_to_queu = $this->input->post('itsm_to_queu');
        $itsm_main_line = $this->input->post('itsm_main_line');
        $itsm_backup_type = $this->input->post('itsm_backup_type');
        $itsm_pending_date = $this->input->post('itsm_pending_date');
        $itsm_impact = $this->input->post('itsm_impact');
        $itsm_priority = $this->input->post('itsm_priority');
        $itsm_backup_status = $this->input->post('itsm_backup_status');
        
        $provider_ref = $this->input->post('provider_ref');

        $tp_ReferenceNo = $this->input->post('tp_ReferenceNo');
        $tp_service = $this->input->post('tp_service');
        $tp_sla = $this->input->post('tp_sla');
        $tp_loc = $this->input->post('tp_loc');
        $tp_itsm = $this->input->post('tp_itsm');
        
        $tp_cuID = $this->input->post('tp_cuID');
        
        $itsm_severity = $this->input->post('tp_severity');

        //tp_cuID
        $tp_cu = $this->input->post('tp_cu');

          //default data 
        $updateBy = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date 


        $problem_desc_itsm = $this->input->post('problem_desc_itsm');


        $fault_itsm_cat = $this->input->post('fault_itsm_cat');

        // update ticket
        $data = array
                (
                    "ref_no"=>$tp_ReferenceNo,
                    "service"=>$tp_service,
                    "sla"=>$tp_sla,
                    "location"=>$tp_loc,
                    // "itsm_category"=>$tp_itsm,
                    "backup_status"=>$itsm_backup_status,
                    "main_status"=>$itsm_main_line,
                    "backup_type"=>$itsm_backup_type,
                    "pending_date"=>$itsm_pending_date,
                    "impact"=>$itsm_impact,
                    "priority"=>$itsm_priority,
                    "updated_date"=>$datetime,
                    "updated_by"=>$updateBy,
                    "provider_ref"=>$provider_ref,
                    "custID"=>$tp_cuID,
                    "category"=>$tp_itsm,
                    "severity"=>$itsm_severity,
                    "problem_desc_itsm"=>$problem_desc_itsm,
                    "fault_itsm_category"=>$fault_itsm_cat
                );
        $this->Ticket->update_register_note($data,$id_ticket); 
        
        
        

        // update main ticket
        $data = array
                (
                    "title"=>$itsm_subject_title,
                    "queu"=>$itsm_to_queu
                );
        $this->Ticket->update_parent_note($data,$id_ticket); 

        if(!empty($tp_cu)){

            $ticket_customer_id = $this->input->post('ticket_customer_id');
            $id_ticket = trim($id_ticket, " ");
            $ticket_customer_id = trim($ticket_customer_id, " ");
            $tp_cu = trim($tp_cu, " ");

            $ticket_customer_id = $this->Ticket->getID_Customer($ticket_customer_id);

            $data = array
                    (
                        "id_ticket"=>$id_ticket,
                        "custUser"=>$tp_cu
                    );

            $addUser = $this->Ticket->add_custUser($data);

        }


        $updateBy = $this->session->userdata('userid');
        $data = array(
                      "type_activities"=>"Edit ITSM ",
                      "created_by"=>$updateBy,
                      "other_id"=>$id_ticket
                    );

        $this->Admin->saveLog($data);


        $updateBy = $this->session->userdata('userid');
        $first_name = $this->session->userdata('first_name');

        $data = array('lock_by'=>$first_name,'status_lock'=>'0');
        $this->db->where('id_ticket',$id_ticket);
        $this->db->update('td_register_ticket',$data);

        $data2 = array('lock_by'=>$first_name,'status_lock'=>'0','id_ticket'=>$id_ticket);
        $this->db->insert('ticket_lock_activities',$data2);

        $this->session->set_flashdata('msg', 'msg');


        $url = 'Ticket/Ticket_DetailTicket/'.$id_ticket;
        redirect($url);

    }   


    function ticket_closed()
    {
        $id_ticket = $this->input->post('id_ticket');
        $Ticket_Closed_Responsible = $this->input->post('Ticket_Closed_Responsible');
        $Ticket_Closed_TT_No = $this->input->post('Ticket_Closed_TT_No');
        $Ticket_Closed_VTT_No = $this->input->post('Ticket_Closed_VTT_No');
        $Ticket_Closed_Fault = $this->input->post('Ticket_Closed_Fault');
        $Ticket_Closed_Action_Taken = $this->input->post('Ticket_Closed_Action_Taken');
        $Ticket_Closed_Type = $this->input->post('Ticket_Closed_Type');
        $html_link_content = $this->input->post('html_link_content');

        $Ticket_Closed_Problem = $this->input->post('Ticket_Closed_Problem');
        $Ticket_Closed_Portion = $this->input->post('Ticket_Closed_Portion');
        $Ticket_Closed_Fault_Type = $this->input->post('Ticket_Closed_Fault_Type');

        $Ticket_Validation_Outage = $this->input->post('Ticket_Validation_Outage');

        $updateBy = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date 

        $total_time_closed = $this->input->post('total_time_closed');
        $pending_time_closed = $this->input->post('pending_time_closed');
        $working_time_closed = $this->input->post('working_time_closed');

        $env = $this->session->userdata('env');
        if($env=='hospital'){
            $mail_start_date = $this->Ticket->get_start_ticket($id_ticket);
            $mail_end_date = $datetime;

            $tp_type = $this->Ticket->mail_type($id_ticket);
            if($tp_type=='Change Request'){
                $mail_tp_type = 'CHANGE REQUEST';
            } else if($tp_type=='Incident'){
                $mail_tp_type = 'INCIDENT';
            } else {
                $mail_tp_type = '';
            }


            $mail_category = $this->Ticket->mail_category($id_ticket); // category
            $mail_subject = $this->Ticket->mail_subject($id_ticket); 
            $mail_description = $this->Ticket->mail_description($id_ticket);

            $mail_responsible = $this->Ticket->mail_responsible($Ticket_Closed_Responsible);
            $mail_customer_user = $this->Ticket->mail_customer_user($id_ticket);

            if(empty($mail_responsible)){
                $mail_responsible = 'nexhospital@gmail.com';
            }

            if(empty($mail_customer_user)){
                $mail_customer_user = 'nexhospital@gmail.com';
            }


            $mail_location = $this->Ticket->mail_location($id_ticket); // category

            if($mail_location=='9999'){
                $mail_location = 'Not Related';
            }

            $html = 'Dear All, <br><br> Kindly note that '.$id_ticket.' filed on '.$mail_start_date.' has been successfully tagged as closed as of '.$mail_end_date.' <br><br> Please refer to particulars below : <br><br> Category : '.$mail_category.' <br> Summary : '.$mail_subject.' <br> Location : '.$mail_location.' <br>Description : '.$mail_description.' <br><br> Should this be of any concern, please feel free to contact us. <br><br> Regards, <br> Selayang Hospital IT Department';

            //var_dump($mail_customer_user); exit();
            $mail_receiver = $mail_customer_user;
            $cc = $mail_responsible.',nexhospital@gmail.com';
            $mail_title = $mail_tp_type.' : Ticket Closed : '.$id_ticket;
            $send_email = $this->sendEmail($mail_receiver,$mail_title,$html,$cc);

        }


        $data = array
                (
                    "id_ticket"=>$id_ticket,
                    "responsibility"=>$Ticket_Closed_Responsible,
                    "tt_no"=>$Ticket_Closed_TT_No,
                    "vtt_no"=>$Ticket_Closed_VTT_No,
                    "cause_of_fault"=>$Ticket_Closed_Fault,
                    "action_taken"=>$Ticket_Closed_Action_Taken,
                    "close_type"=>$Ticket_Closed_Type,
                    "text_editor"=>$html_link_content,
                    "created_date"=>$datetime,
                    "created_by"=>$updateBy,
                    "Problem"=>$Ticket_Closed_Problem,
                    "Portion"=>$Ticket_Closed_Portion,
                    "Fault_Type"=>$Ticket_Closed_Fault_Type,
                    "total_time_closed"=>$total_time_closed,
                    "pending_time_closed"=>$pending_time_closed,
                    "working_time_closed"=>$working_time_closed,
                    "Ticket_Validation_Outage"=>$Ticket_Validation_Outage
                );

        $save = $this->Ticket->ticket_closed($data);

        //"ticket_responsibilty"=>$Ticket_Closed_Responsible,
        $data = array
                    (
                        "ticket_responsibilty"=>$Ticket_Closed_Responsible,
                        "status_ticket"=>'closed',
                        "updated_date"=>$datetime,
                        "updated_by"=>$updateBy,
                        "current_state"=>$Ticket_Closed_Type
                    );
        
        $this->Ticket->update_register_note($data,$id_ticket);


        $rand = rand();
        $data = array
            (

                "id_ticket"=>$id_ticket,
                "text_editor"=>$html_link_content,
                "type_note"=>"closed",
                "created_by"=>$updateBy,
                "created_date"=>$datetime,
                "id_noted"=>$rand,
                "type_state"=>$Ticket_Closed_Type
            );
        $this->Ticket->add_note($data);  


        $updateBy = $this->session->userdata('userid');
        $data = array(
                      "type_activities"=>"Closed Ticket ",
                      "created_by"=>$updateBy,
                      "other_id"=>$id_ticket
                    );

        $this->Admin->saveLog($data);


        $updateBy = $this->session->userdata('userid');
        $first_name = $this->session->userdata('first_name');

        $data = array('lock_by'=>$first_name,'status_lock'=>'0');
        $this->db->where('id_ticket',$id_ticket);
        $this->db->update('td_register_ticket',$data);

        $data2 = array('lock_by'=>$first_name,'status_lock'=>'0','id_ticket'=>$id_ticket);
        $this->db->insert('ticket_lock_activities',$data2);

        $this->session->set_flashdata('msg', 'msg');


        redirect('Ticket/Ticket_StatusView');

    }

    function start_ticket()
    {
        $id_ticket = $this->input->post('id_ticket');

        $time = $this->Ticket->start_ticket($id_ticket);

    }

    function start_ticket_master()
    {
        $id_ticket = $this->input->post('id_ticket');

        $time = $this->Ticket->start_ticket_master($id_ticket);

    }

    function total_time_ticket()
    {
        $id_ticket = $this->input->post('id_ticket');

        $time = $this->Ticket->total_time_ticket($id_ticket);
    }

    function total_time_ticket_master()
    {
        $id_ticket = $this->input->post('id_ticket');

        $time = $this->Ticket->total_time_ticket_master($id_ticket);
    }


    function total_time_ticket2()
    {
        $id_ticket = $this->input->post('id_ticket');

        $time = $this->Ticket->total_time_ticket2($id_ticket);
    }

    function total_time_ticket2_master()
    {
        $id_ticket = $this->input->post('id_ticket');

        $time = $this->Ticket->total_time_ticket2_master($id_ticket);
    }


    function pending_ticket()
    {
        $id_ticket = $this->input->post('id_ticket');

        $time = $this->Ticket->pending_ticket($id_ticket);
    }

    function pending_ticket_master()
    {
        $id_ticket = $this->input->post('id_ticket');

        $time = $this->Ticket->pending_ticket_master($id_ticket);
    }

    function status_pendingresume()
    {
        $id_ticket = $this->input->post('id_ticket');
        $time = $this->Ticket->status_pendingresume($id_ticket);
    }

    function Dtable_DetailTicket_ViewList()
    {
        $id_ticket = $this->input->post('id_ticket');
        header('Content-Type: application/json');
        echo $this->Ticket->Dtable_DetailTicket_ViewList($id_ticket);
    }


    function Dtable_DetailTicket_ViewList_Master()
    {
        $id_ticket = $this->input->post('id_ticket');
        header('Content-Type: application/json');
        echo $this->Ticket->Dtable_DetailTicket_ViewList_Master($id_ticket);
    }

    function viewnote()
    {
        $id = $this->input->post('id');
        $this->Ticket->viewnote($id);
    }

    function view_all_state()
    {
        $id = $this->input->post('id');
        $this->Ticket->view_all_state($id);
    }

    function pull_state()
    {
        $id = $this->input->post('id');
        $this->Ticket->pull_state($id);
    }

    function pull_state_master()
    {
        $id = $this->input->post('id');
        $this->Ticket->pull_state_master($id);
    }

    function pull_state_parameter()
    {
        $id = $this->input->post('id');
        $this->Ticket->pull_state_parameter($id);
    }

    function pending_ticket2()
    {
        $id_ticket = $this->input->post('id_ticket');
        $time = $this->Ticket->pending_ticket2($id_ticket);
    }

    function pending_ticket2_master()
    {
        $id_ticket = $this->input->post('id_ticket');
        $time = $this->Ticket->pending_ticket2_master($id_ticket);
    }

    function get_closed_date()
    {
        $id_ticket = $this->input->post('id_ticket');
        $time = $this->Ticket->get_closed_date($id_ticket);
    }

    function get_closed_date_master()
    {
        $id_ticket = $this->input->post('id_ticket');
        $time = $this->Ticket->get_closed_date_master($id_ticket);
    }

    function check_status()
    {
        $id_ticket = $this->input->post('id');
        $time = $this->Ticket->check_status($id_ticket);
    }

    function check_status_master()
    {
        $id_ticket = $this->input->post('id');
        $time = $this->Ticket->check_status_master($id_ticket);
    }

    function get_total_time()
    {
        $id_ticket = $this->input->post('id');
        $time = $this->Ticket->get_total_time($id_ticket);
    }

    function get_total_time_master()
    {
        $id_ticket = $this->input->post('id');
        $time = $this->Ticket->get_total_time_master($id_ticket);
    }

    function get_pending_time()
    {
        $id_ticket = $this->input->post('id');
        $time = $this->Ticket->get_pending_time($id_ticket);
    }

    function get_pending_time_master()
    {
        $id_ticket = $this->input->post('id');
        $time = $this->Ticket->get_pending_time_master($id_ticket);
    }

    function get_working_hour()
    {
        $id_ticket = $this->input->post('id');
        $time = $this->Ticket->get_working_hour($id_ticket);
    }

    function get_working_hour_master()
    {
        $id_ticket = $this->input->post('id');
        $time = $this->Ticket->get_working_hour_master($id_ticket);
    }

    /* MASTER TICKET */
    public function MS_New_Master_Ticket()
    {

            $this->data['site_title'] = 'MS_New_Master_Ticket';
            $this->load->view('template/header/header');
            $this->load->view('template/body/MS_New_Master_Ticket/MS_New_Master_Ticket',$this->data);
            $this->load->view('template/footer/footer');

    }

    public function MS_Overview_Open()
    {

            $this->data['site_title'] = 'MS_Overview_Open';
            $this->load->view('template/header/header');
            $this->load->view('template/body/MS_Overview_Open/MS_Overview_Open',$this->data);
            $this->load->view('template/footer/footer');

    }

    public function MS_Detail_Ticket()
    {

            $this->data['site_title'] = 'MS_Detail_Ticket';
            $this->load->view('template/header/header');
            $this->load->view('template/body/MS_Detail_Ticket/MS_Detail_Ticket',$this->data);
            $this->load->view('template/footer/footer');

    }

    public function MS_Print_PDF()
    {

            $this->data['site_title'] = 'MS_Print_PDF';
            $this->load->view('template/header/header');
            $this->load->view('template/body/MS_Print_PDF/MS_Print_PDF',$this->data);
            $this->load->view('template/footer/footer');

    }

    public function MS_Add_ITSM()
    {

            $this->data['site_title'] = 'MS_Add_ITSM';
            $this->load->view('template/header/header');
            $this->load->view('template/body/MS_Add_ITSM/MS_Add_ITSM',$this->data);
            $this->load->view('template/footer/footer');

    }

    public function MS_First_Level()
    {

            $this->data['site_title'] = 'MS_First_Level';
            $this->load->view('template/header/header');
            $this->load->view('template/body/MS_First_Level/MS_First_Level',$this->data);
            $this->load->view('template/footer/footer');

    }

    public function MS_Note()
    {

            $this->data['site_title'] = 'MS_Note';
            $this->load->view('template/header/header');
            $this->load->view('template/body/MS_Note/MS_Note',$this->data);
            $this->load->view('template/footer/footer');

    }

    public function MS_PendingResume()
    {

            $this->data['site_title'] = 'MS_PendingResume';
            $this->load->view('template/header/header');
            $this->load->view('template/body/MS_PendingResume/MS_PendingResume',$this->data);
            $this->load->view('template/footer/footer');

    }

    public function MS_Owner()
    {

            $this->data['site_title'] = 'MS_Owner';
            $this->load->view('template/header/header');
            $this->load->view('template/body/MS_Owner/MS_Owner',$this->data);
            $this->load->view('template/footer/footer');

    }

    public function MS_Responsibility()
    {

            $this->data['site_title'] = 'MS_Responsibility';
            $this->load->view('template/header/header');
            $this->load->view('template/body/MS_Responsibility/MS_Responsibility',$this->data);
            $this->load->view('template/footer/footer');

    }

    public function MS_Closed()
    {

            $this->data['site_title'] = 'MS_Closed';
            $this->load->view('template/header/header');
            $this->load->view('template/body/MS_Closed/MS_Closed',$this->data);
            $this->load->view('template/footer/footer');

    }


    function Dtable_Master_AllTicket()
    {
      header('Content-Type: application/json');
      echo $this->Ticket->Dtable_Master_AllTicket();
    }

    function ms_link_ticket_add()
    {
        $ms_subject = $this->input->post('ms_subject');
        $ms_provider = $this->input->post('ms_provider');
        $ms_type = $this->input->post('ms_type');
        $ms_queu = $this->input->post('ms_queu');
        $ms_impact = $this->input->post('ms_impact');
        $ms_priority = $this->input->post('ms_priority');
        $ms_owner = $this->input->post('ms_owner');
        $ms_responsibility = $this->input->post('ms_responsibility');
        $id_master_ticket = $this->input->post('id_master_ticket');

        $updateBy = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date 

        $id_link = $this->input->post('id_ticket_link');
        $rand = rand();

        $data = array(
                        "subject"=>$ms_subject,
                        "provider_ref"=>$ms_provider,
                        "type"=>$ms_type,
                        "queu"=>$ms_queu,
                        "impact"=>$ms_impact,
                        "priority"=>$ms_priority,
                        "owner"=>$ms_owner,
                        "responsibilty"=>$ms_responsibility,
                        "id_ticket"=>$id_master_ticket,
                        "created_date"=>$datetime,
                        "created_by"=>$updateBy,
                        "status_ticket"=>"New",
                        "id_noted"=>$rand,
                        "current_state"=>"New"
                     );

        $save = $this->Ticket->ms_register_ticket($data);

        foreach ($id_link as $id) {
            $data = array(
                            "id_ticket_single"=>$id,
                            "id_ticket_master"=>$id_master_ticket
                         );
            $save = $this->Ticket->ms_link_ticket($data);
        }



        $text_editor = 'New Ticket Open';
        $type_note = 'new';
        $type_state = 'New';

        $data = array(
                        "id_ticket_master"=>$id_master_ticket,
                        "text_editor"=>$text_editor,
                        "type_note"=>$type_note,
                        "type_state"=>$type_state,
                        "created_date"=>$datetime,
                        "created_by"=>$updateBy
                     );
        $save = $this->Ticket->ms_add_note($data);


        $updateBy = $this->session->userdata('userid');
        $data = array(
                      "type_activities"=>"Add Master Ticket ",
                      "created_by"=>$updateBy,
                      "other_id"=>$id_master_ticket
                    );

        $this->Admin->saveLog($data);

       // redirect('Ticket/MS_Overview_Open');
    }

    function Dtable_Ticket_Master()
    {
        header('Content-Type: application/json');
        echo $this->Ticket->Dtable_Ticket_Master();
    }

    function Dtable_Ticket_Master_Closed()
    {
        header('Content-Type: application/json');
        echo $this->Ticket->Dtable_Ticket_Master_Closed();
    }

    public function MS_Overview_Closed()
    {

            $this->data['site_title'] = 'MS_Overview_Closed';
            $this->load->view('template/header/header');
            $this->load->view('template/body/MS_Overview_Closed/MS_Overview_Closed',$this->data);
            $this->load->view('template/footer/footer');

    }

    function viewnote_master()
    {
        $id = $this->input->post('id');
        $this->Ticket->viewnote_master($id);
    }

    function view_all_state_master()
    {
        $id = $this->input->post('id');
        $this->Ticket->view_all_state_master($id);
    }


    function add_note_firstlevel_master()
    {
        $id_ticket = $this->input->post('id_ticket');
        $html_link_content = $this->input->post('html_link_content');
        $type = "first_level";

        $created_by = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date         


        $check = $this->Ticket->check_ticket_note_master($type,$id_ticket);

        $data = array(
                        "id_ticket"=>$id_ticket,
                        "total_minutes"=>'0'
                     );

        $this->Ticket->add_register_pending($data);


        

        if($check>0)
        {
            //echo "First Level Sudah Ada"; 
            //exit();
            $rand = rand();
            $rand = $rand.$rand.$rand;
            $url = 'Ticket/MS_Detail_Ticket/'.$id_ticket.'/lf/'.$rand.'t/f/'.$rand;
            redirect($url);

        } else {
            $id_noted = rand();
            $data = array
                    (
                        "id_ticket_master"=>$id_ticket,
                        "text_editor"=>$html_link_content,
                        "type_note"=>$type,
                        "created_date"=>$datetime,
                        "created_by"=>$created_by,
                        "id_noted"=>$id_noted,
                        "type_state"=>"First Level"
                    );

            $this->Ticket->ms_add_note($data);

            // update ticket
            $data2 = array
                    (
                        "status_ticket"=>"open",
                        "updated_date"=>$datetime,
                        "updated_by"=>$created_by,
                        "current_state"=>"First Level"
                    );
            $this->Ticket->update_register_note_master($data2,$id_ticket); 



            // add all noted to single ticket
            $type = 'first_level';
            $type_state = 'Open';
            $data2 = array
                    (
                        "status_ticket"=>"open",
                        "updated_date"=>$datetime,
                        "updated_by"=>$created_by,
                        "current_state"=>"Open"
                    );

            $html_link_content = 'Update From Master Ticket : '.$id_ticket.'<br>'.$html_link_content;
            $this->Ticket->add_all_note_single_ticket($html_link_content,$type,$datetime,$created_by,$id_noted,$type_state,$data2,$id_ticket);


            $updateBy = $this->session->userdata('userid');
            $data = array(
                          "type_activities"=>"Add First Level Master",
                          "created_by"=>$updateBy,
                          "other_id"=>$id_ticket
                        );

            $this->Admin->saveLog($data);


            $url = 'Ticket/MS_Detail_Ticket/'.$id_ticket;
            redirect($url);
        }


    }


    function add_note_btnnote_master()
    {
        $id_ticket = $this->input->post('id_ticket');
        $tp_owner = $this->input->post('tp_owner');
        $tp_state = $this->input->post('tp_state');
        $tp_calendar = $this->input->post('tp_calendar');
        $html_link_content = $this->input->post('html_link_content');

        $created_by = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date         

        $type = "first_level";

        $check = $this->Ticket->check_ticket_note_master($type,$id_ticket);

        if($check>0)
        {
            $type = "note";
            $id_noted = rand();
            $data = array
                    (
                        "id_ticket_master"=>$id_ticket,
                        "text_editor"=>$html_link_content,
                        "type_note"=>$type,
                        "created_date"=>$datetime,
                        "created_by"=>$created_by,
                        "id_noted"=>$id_noted,
                        "type_state"=>$tp_state,
                        "owner"=>$tp_owner,
                        "pending_date"=>$tp_calendar
                    );

            $this->Ticket->ms_add_note($data);  

            $data2 = array
                    (
                        //"status_ticket"=>$tp_state,
                        "pending_date"=>$tp_calendar,
                        "updated_date"=>$datetime,
                        "updated_by"=>$created_by,
                        "current_state"=>$tp_state
                    );
            $this->Ticket->update_register_note_master($data2,$id_ticket);  

            $html_link_content = 'Update From Master Ticket : '.$id_ticket.'<br>'.$html_link_content;
            $this->Ticket->add_all_note_single_ticket($html_link_content,$type,$datetime,$created_by,$id_noted,$tp_state,$data2,$id_ticket);



            $updateBy = $this->session->userdata('userid');
            $data = array(
                          "type_activities"=>"Add Note Master",
                          "created_by"=>$updateBy,
                          "other_id"=>$id_ticket
                        );

            $this->Admin->saveLog($data);


            $url = 'Ticket/MS_Detail_Ticket/'.$id_ticket;
            redirect($url);

        } else {
            echo "First Level Belum Ada"; 
            exit();
        }
    }

    function add_note_pendingresume_master()
    {
        $id_ticket = $this->input->post('id_ticket');
        $tp_title = $this->input->post('tp_title'); 
        $html_link_content = $this->input->post('html_link_content');
        $userfile = $this->input->post('userfile');
        $tp_state = $this->input->post('tp_state');
        $tp_calendar = $this->input->post('tp_calendar');

        $created_by = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date         

        $type = "first_level";
        $check = $this->Ticket->check_ticket_note_master($type,$id_ticket);
        $type_ticket = $this->input->post('type_ticket');

        $rand = rand();

        if($check>0)
        {

            if($type_ticket=='pending')
            {
                // update status register
                $data = array
                    (
                        "status_ticket"=>'pending',
                        "updated_by"=>$created_by,
                        "updated_date"=>$datetime,
                        "current_state"=>$tp_state
                    );
                $this->Ticket->update_register_note_master($data,$id_ticket); 

                
                $data = array
                    (

                        "id_ticket_master"=>$id_ticket,
                        "text_editor"=>$html_link_content,
                        "type_note"=>"pending",
                        "created_by"=>$created_by,
                        "created_date"=>$datetime,
                        "id_noted"=>$rand,
                        "type_state"=>$tp_state,
                        "pending_date"=>$tp_calendar
                    );
                $this->Ticket->ms_add_note($data); 

                //new calculation 
                $data = array(
                                "id_ticket"=>$id_ticket,
                                "status"=>"pending",
                                "date"=>$datetime
                             );

                $save = $this->Ticket->save_pending_time($data);


                $updateBy = $this->session->userdata('userid');
                $data = array(
                              "type_activities"=>"Pending Master Note ",
                              "created_by"=>$updateBy,
                              "other_id"=>$id_ticket
                            );

                $this->Admin->saveLog($data);



            } else if($type_ticket=='resume'){    

                // update status register
                $data = array
                    (
                        "status_ticket"=>'open',
                        "updated_by"=>$created_by,
                        "updated_date"=>$datetime,
                        "current_state"=>$tp_state
                    );
                $this->Ticket->update_register_note_master($data,$id_ticket); 

                
                $data = array
                    (

                        "id_ticket_master"=>$id_ticket,
                        "text_editor"=>$html_link_content,
                        "type_note"=>'open',
                        "created_by"=>$created_by,
                        "created_date"=>$datetime,
                        "id_noted"=>$rand,
                        "type_state"=>$tp_state,
                        "pending_date"=>$tp_calendar
                    );
                $this->Ticket->ms_add_note($data); 


                //$get_pending = $this->Ticket->get_pending($id_ticket);
                //$get_resume = $datetime;

                //$get_different_pending_resume = $this->Ticket->get_different_pending_resume($id_ticket,$get_pending,$get_resume);

                //new calculation 
                $data = array(
                                "id_ticket"=>$id_ticket,
                                "status"=>"resume",
                                "date"=>$datetime
                             );

                $save = $this->Ticket->save_pending_time($data);


                // get total hours
                //check dulu dah ada amount dekat 'td_total_pending'
                $check = $this->Ticket->check_total_pending2($id_ticket);
                if($check>0){

                    $date = $this->Ticket->get_date_pending($id_ticket);
                    $get_second = $this->Ticket->get_second_pending($date,$id_ticket);
                    $get_ready_second = $this->Ticket->get_ready_second($id_ticket);
                    $total_Second = $get_second + $get_ready_second;
                    //update
                        $data = array(
                                        "total_minutes"=>$total_Second
                                     );
                        $update = $this->Ticket->update_total_pending2($data,$id_ticket);

                } else {
                    //get date td_count_pending
                    $date = $this->Ticket->get_date_pending($id_ticket);
                    $get_second = $this->Ticket->get_second_pending($date,$id_ticket);
                    // insert 
                    $data = array(
                                    "id_ticket"=>$id_ticket,
                                    "total_minutes"=>$get_second
                                 );
                    $add = $this->Ticket->add_total_pending($data);
                }



                $updateBy = $this->session->userdata('userid');
                $data = array(
                              "type_activities"=>"Resume Note Master",
                              "created_by"=>$updateBy,
                              "other_id"=>$id_ticket
                            );

                $this->Admin->saveLog($data);


            } 



            // 4 - attachment
        $file_name = $_FILES['userfile']['name'];

        if(!empty($file_name))
        {
            $file_name = rand().$_FILES['userfile']['name'];
            $config = array(
                    'upload_path' => "./upload_ticket/",
                    //'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'overwrite' => TRUE,
                    'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                    'max_height' => "5000",
                    'max_width' => "5000",
                    //'encrypt_name'=>TRUE,
                    'remove_spaces'=>TRUE,
                    'file_name'=>$file_name
                  );

            $this->load->library('upload', $config);
            if($this->upload->do_upload())
            {
                $name_file = $config['file_name'];
                $data = array('upload_data' => $this->upload->data());

                $data = array
                        (
                            "attachment"=>$file_name,
                            "id_ticket"=>$id_ticket,
                            "id_noted"=>$rand
                        );

                $add = $this->Ticket->ticket_attachment($data);

                //$data = array("id_topic"=>$id_topic,"name_file"=>$file_name,"status"=>"1");
                //$this->Classroom->update_status_topic($id_topic,$data);

                //redirect('Classroom/Classroom_createtopic');
                
            }
            else
            {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error); exit();
                //$this->load->view('custom_view', $error);
            }
        }


        } else {

            echo "First Level Belum Ada"; 
            exit();
        }


        $url = 'Ticket/MS_Detail_Ticket/'.$id_ticket;
        redirect($url);


    }

    function status_pendingresume_master()
    {
        $id_ticket = $this->input->post('id_ticket');
        $time = $this->Ticket->status_pendingresume_master($id_ticket);
    }

    function update_note_owner_master()
    {
        $id_ticket = $this->input->post('id_ticket');
        $Ticket_New_Owner = $this->input->post('owner');

        $created_by = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date  

        $data = array
                (
                    'owner'=>$Ticket_New_Owner,
                    "updated_date"=>$datetime,
                    "updated_by"=>$created_by
                );

        $update = $this->Ticket->update_note_owner_master($data,$id_ticket);



        $updateBy = $this->session->userdata('userid');
        $data = array(
                      "type_activities"=>"Update Owner Master Ticket ",
                      "created_by"=>$updateBy,
                      "other_id"=>$id_ticket
                    );

        $this->Admin->saveLog($data);


        redirect('Ticket/MS_Detail_Ticket/'.$id_ticket);

    }

    function update_note_responsible_master()
    {
        $id_ticket = $this->input->post('id_ticket');
        $title = $this->input->post('Title');
        $respond = $this->input->post('Ticket_Btn_Responsible_Responsible');

        $created_by = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date  

        // update main ticket
        $data = array
                (
                    "subject"=>$title
                );
        $this->Ticket->update_register_note_master($data,$id_ticket); 

        $data = array
                (
                    'responsibilty'=>$respond,
                    "updated_date"=>$datetime,
                    "updated_by"=>$created_by
                );

        $update = $this->Ticket->update_note_responsible_master($data,$id_ticket);


        $updateBy = $this->session->userdata('userid');
        $data = array(
                      "type_activities"=>"Update Responsible Master Ticket",
                      "created_by"=>$updateBy,
                      "other_id"=>$id_ticket
                    );

        $this->Admin->saveLog($data);

        redirect('Ticket/MS_Detail_Ticket/'.$id_ticket);
    }

    function ticket_closed_master()
    {
        $id_ticket = $this->input->post('id_ticket');
        $Ticket_Closed_Responsible = $this->input->post('Ticket_Closed_Responsible');
        $Ticket_Closed_TT_No = $this->input->post('Ticket_Closed_TT_No');
        $Ticket_Closed_VTT_No = $this->input->post('Ticket_Closed_VTT_No');
        $Ticket_Closed_Fault = $this->input->post('Ticket_Closed_Fault');
        $Ticket_Closed_Action_Taken = $this->input->post('Ticket_Closed_Action_Taken');
        $Ticket_Closed_Type = $this->input->post('Ticket_Closed_Type');
        $html_link_content = $this->input->post('html_link_content');

        $Ticket_Closed_Problem = $this->input->post('Ticket_Closed_Problem');
        $Ticket_Closed_Portion = $this->input->post('Ticket_Closed_Portion');
        $Ticket_Closed_Fault_Type = $this->input->post('Ticket_Closed_Fault_Type');

        $Ticket_Validation_Outage = $this->input->post('Ticket_Validation_Outage');

        $updateBy = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date 

        $total_time_closed = $this->input->post('total_time_closed');
        $pending_time_closed = $this->input->post('pending_time_closed');
        $working_time_closed = $this->input->post('working_time_closed');

        $data = array
                (
                    "id_ticket"=>$id_ticket,
                    "responsibility"=>$Ticket_Closed_Responsible,
                    "tt_no"=>$Ticket_Closed_TT_No,
                    "vtt_no"=>$Ticket_Closed_VTT_No,
                    "cause_of_fault"=>$Ticket_Closed_Fault,
                    "action_taken"=>$Ticket_Closed_Action_Taken,
                    "close_type"=>$Ticket_Closed_Type,
                    "text_editor"=>$html_link_content,
                    "created_date"=>$datetime,
                    "created_by"=>$updateBy,
                    "Problem"=>$Ticket_Closed_Problem,
                    "Portion"=>$Ticket_Closed_Portion,
                    "Fault_Type"=>$Ticket_Closed_Fault_Type,
                    "total_time_closed"=>$total_time_closed,
                    "pending_time_closed"=>$pending_time_closed,
                    "working_time_closed"=>$working_time_closed,
                    "Ticket_Validation_Outage"=>$Ticket_Validation_Outage
                );

        $save = $this->Ticket->ticket_closed_master($data);

        //"ticket_responsibilty"=>$Ticket_Closed_Responsible,
        $data = array
                    (
                        "responsibilty"=>$Ticket_Closed_Responsible,
                        "status_ticket"=>'closed',
                        "updated_date"=>$datetime,
                        "updated_by"=>$updateBy,
                        "current_state"=>$Ticket_Closed_Type
                    );
        
        $this->Ticket->update_register_note_master($data,$id_ticket);


        $rand = rand();
        $data = array
            (

                "id_ticket_master"=>$id_ticket,
                "text_editor"=>$html_link_content,
                "type_note"=>"closed",
                "created_by"=>$updateBy,
                "created_date"=>$datetime,
                "id_noted"=>$rand,
                "type_state"=>$Ticket_Closed_Type
            );
        $this->Ticket->ms_add_note($data);  


        $updateBy = $this->session->userdata('userid');
        $data = array(
                      "type_activities"=>"Closed Master Ticket",
                      "created_by"=>$updateBy,
                      "other_id"=>$id_ticket
                    );

        $this->Admin->saveLog($data);


        redirect('Ticket/MS_Overview_Closed');

    }

    function Add_ITSM_Master()
    {

        $updateBy = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date 

        $ms_subject = $this->input->post('ms_subject');
        $ms_provider = $this->input->post('ms_provider');
        $ms_type = $this->input->post('ms_type');
        $ms_queu = $this->input->post('ms_queu');
        $ms_impact = $this->input->post('ms_impact');
        $ms_priority = $this->input->post('ms_priority');
        $id_ticket = $this->input->post('id_ticket');

        $data = array(
                        "subject"=>$ms_subject,
                        "provider_ref"=>$ms_provider,
                        "type"=>$ms_type,
                        "queu"=>$ms_queu,
                        "impact"=>$ms_impact,
                        "priority"=>$ms_priority
                     );

        $update = $this->Ticket->Add_ITSM_Master($data,$id_ticket);


        $updateBy = $this->session->userdata('userid');
        $data = array(
                      "type_activities"=>"Edit ITSM Master Ticket",
                      "created_by"=>$updateBy,
                      "other_id"=>$id_ticket
                    );

        $this->Admin->saveLog($data);

        $url = 'Ticket/MS_Detail_Ticket/'.$id_ticket;
        redirect($url);

    }


    function check_list_ticket()
    {
      $id = $this->input->post('id');
      $query = $this->Ticket->check_list_ticket($id);
      echo json_encode($query);
    }

    function add_link_master()
    {
        $id = $this->input->post('id');
        $id_master = $this->input->post('id_master');

        $this->Ticket->add_link_master($id,$id_master);


        $updateBy = $this->session->userdata('userid');
        $data = array(
                      "type_activities"=>"Add link master",
                      "created_by"=>$updateBy,
                      "other_id"=>$id_master
                    );

        $this->Admin->saveLog($data);

    }

    function delete_link_master()
    {
        $id = $this->input->post('id');
        $this->Ticket->delete_link_master($id);

        $updateBy = $this->session->userdata('userid');
        $data = array(
                      "type_activities"=>"Delete link master",
                      "created_by"=>$updateBy,
                      "other_id"=>$id
                    );

        $this->Admin->saveLog($data);
    }
    /* END */

    /*PDF */
    function test_pdf()
    {
        //load the view and saved it into $html variable

        $data = [];
        $data['tbl'] = 'Hello Brother';
        
        $html=$this->load->view('report_pdf', $data, true);
        $rand = rand();
        $pdfFilePath = "report_pdf_".$rand.".pdf";
        $this->load->library('M_pdf');
        $this->m_pdf->pdf->WriteHTML($html);
        $this->m_pdf->pdf->Output($pdfFilePath, "D");
    }

    function Print_Single_Word()
    {
        $this->load->view('report_word_ticket_single');
    }

    function Print_Single_PDF()
    {
        //load the view and saved it into $html variable
        $data = [];
        $data['tbl'] = 'Hello Brother';
        //$head = $this->load->view('template/header/header', TRUE);
        $html = $this->load->view('report_pdf', $data, TRUE);
        //$foot = $this->load->view('template/footer/footer', TRUE);
        //$html = $head.$html;
        $rand = rand();
        $pdfFilePath = "report_pdf_".$rand.".pdf";
        $this->load->library('M_pdf');
        $this->m_pdf->pdf->WriteHTML($html);
        $this->m_pdf->pdf->Output($pdfFilePath, "D");
    }

    function Print_Master_Word()
    {
        $this->load->view('report_word_ticket_master');
    }

    function Print_Master_PDF()
    {
        //load the view and saved it into $html variable
        $data = [];
        $data['tbl'] = 'Hello Brother';
        $html=$this->load->view('report_master_pdf', $data, true);
        $rand = rand();
        $pdfFilePath = "report_pdf_".$rand.".pdf";
        $this->load->library('M_pdf');
        $this->m_pdf->pdf->WriteHTML($html);
        $this->m_pdf->pdf->Output($pdfFilePath, "D");
    }
    /* END */



    function auto_ticket()
    {
        $user = "admin@nexticks.com";
        $pass = "P@ssword1234";
        $imap_host = "{mail.nexticks.com/imap/ssl/novalidate-cert}";
        $imap_folder = "INBOX";

         
        $mbox = imap_open($imap_host.$imap_folder, $user, $pass) or die("can't connect: " . imap_last_error());


        if( $mbox) { 
                //echo "Connect";
                
                $MC = imap_check($mbox);
                $result = imap_fetch_overview($mbox,"1:{$MC->Nmsgs}",0);
                foreach ($result as $overview) {

                        
                        $seen = $overview->seen;
                        $uid = $overview->uid;
                        $deleted = $overview->deleted;
                        
                        //var_dump($overview);
                        if($deleted!='1'){


                                $header = imap_header($mbox, $uid);
                                $from = $header->from;
                                foreach ($from as $id => $object) {
                                    //echo '<br>'.$fromname = $object->personal;
                                    //echo '<br> FROM : '.$fromaddress = $object->mailbox . "@" . $object->host;
                                    $fromaddress = $object->mailbox . "@" . $object->host;
                                }


                                // $who = $overview->from;
                                // echo "WHO : ".$who;
                                // $to = $overview->to;
                                // echo "<br>TO : ".$to;
                                // $subject = $overview->subject;
                                // echo "<br>SUBJECT : ".$subject;
                                // $date = $overview->date;
                                // echo "<br>DATE : ".$date;

                                    
                                // echo '<hr>';

                                
                               // $uid = $overview->uid;
                                
                                $who = $overview->from;
                                $to = $overview->to;
                                $subject = $overview->subject;
                                $date = $overview->date;

                                $content_text = '';
                                $data = array(
                                                'uid'=>$uid,
                                                'from_email'=>$fromaddress,
                                                'name'=>$who,
                                                'to_email'=>$to,
                                                'subject'=>$subject,
                                                'date'=>$date,
                                                'content'=>$content_text
                                             );
                                $auto = $this->Ticket->auto_ticket($data);

                                imap_delete($mbox, $uid, FT_UID);
                                

                        } else {

                                //echo 'no new record'; exit();
                        }

                        

                        
                }


        }  else {

                echo "Connection Error ! Please check your connection or line.";
        }


        imap_close($mbox);
    }
    
    function get_cust_user_link()
    {
        $id = $this->input->post('id');
        $this->Ticket->get_cust_user_link($id);
        
    }
    
    
    
    
    function get_ref_num()
    {
        $get_ref_num = $this->input->post('get_ref_num');
        $this->Ticket->get_ref_num($get_ref_num);
    }
    
    
    function auto_tiket()
    {
        $user = "support@nex-desk.com";
        $pass = "P@ssword1234";
        $imap_host = "{webmail.nex-desk.com/imap/ssl/novalidate-cert}";
        $imap_folder = "INBOX";
         
        $mbox = imap_open($imap_host.$imap_folder, $user, $pass) or die("can't connect: " . imap_last_error());
        $MC = imap_check($mbox);
        $result = imap_fetch_overview($mbox,"1:{$MC->Nmsgs}",0);


        $emails = imap_search($mbox,'UNSEEN');
        if($emails){
            
            $message = array();
            foreach($result as $overview) {
    
                $messageid = $overview->msgno;
                $header = imap_header($mbox, $messageid);
                $structure = imap_fetchstructure($mbox, $messageid);
    
                $subject = $header->subject;
                $from =   $header->fromaddress;
                $to =   $header->toaddress;
                //$message['ccaddress'] =   $header->ccaddress;
                $date =   $header->date;
    
                $encoding = $structure->encoding;
                $type = $structure->type;
                $type=$this->type_email($type);
                //header("Content-typee: ".$type); 
    
                $content = imap_fetchbody($mbox,$messageid,"1");
                
                $body = $this->body_email($encoding,$content);
    
                $seen = $overview->seen;
                if($seen=='1'){
                  //echo 'Tiada Data'.'<br>';
                } else {
                    
                    $check = $this->Ticket->checkSubject_Email($subject);
                    if($check>0){

                        $this->addNote_Email_Existing($subject,$body,$from,$to);

                    } else {

                        if ($this->create_ticket_auto($subject,$body,$from,$to))
                        {
                           $result = imap_setflag_full($mbox, $message_id, "\\Seen", ST_UID);
                           
                           return TRUE;
                        }
                        else
                        {
                           return FALSE;
                        } 

                    }

                    
                }
    
            }
            
            imap_close($mbox);
            
        } else {
            echo 'No Email Reporting..';
        }

    }
    
    
    function addNote_Email_Existing($subject,$body,$from,$to)
    {
        $id_ticket = $this->Ticket->id_ticket_existing_by_subject($subject);
        $status = $this->Ticket->get_current_status($id_ticket);
        if(!empty($id_ticket))
        {
            // add child
            //$created_by = $this->session->userdata('userid'); // id yang login system
            
            //set default admin
            $created_by = '10526';

            date_default_timezone_set("Asia/Kuala_Lumpur");
            $timeReg =date("H:i:s");
            $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
            $datetime = $dateReg.' '.$timeReg; //current date 

            $html_link_content = $body;

            $rand = rand();
            $data = array
                (

                    "id_ticket"=>$id_ticket,
                    "text_editor"=>$html_link_content,
                    "type_note"=>$status,
                    "created_by"=>$created_by,
                    "created_date"=>$datetime,
                    "id_noted"=>$rand,
                    "type_state"=>"Email Notification"
                );
            $this->Ticket->add_note($data);   
        }

    }
    
    
    


    function check_type($structure) ## CHECK THE TYPE
    {
      if($structure->type == 1) 
        {
         return(true); ## YES THIS IS A MULTI-PART MESSAGE
        }
    else
        {
         return(false); ## NO THIS IS NOT A MULTI-PART MESSAGE
        }
    }


    function create_ticket_auto($title,$html_link_content,$From,$To)
    {
        //$created_by = $this->session->userdata('userid'); // id yang login system
        
        //set default id admin
        $created_by = '10526'; 

        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date 

        $id_format =date("Y/m/d");
        $id_format = str_replace("/","",$id_format);

        $ms    = microtime(true);
        $random = rand();
        $id_ticket = $id_format.$random;

        $type_ticket ='email';
        $type_dothis = 'auto';



        $data = array
                (
                    "type_ticket"=>$type_ticket,
                    "created_date"=>$datetime,
                    "created_by"=>$created_by,
                    "id_ticket"=>$id_ticket,
                    "status_ticket"=>"new",
                    "itsm_category"=>$type_dothis,
                    "current_state"=>"New"
                );
        $data = $this->Ticket->register_ticket($data);




        $id_noted = rand();
        $data = array
                (
                    "title"=>$title,
                    "text_editor"=>$html_link_content,
                    "id_ticket"=>$id_ticket,
                    "cc"=>$From,
                    "bcc"=>$To,
                    "id_noted"=>$id_noted
                );
        
        $data = $this->Ticket->parent_note($data);
        
        
        // add child
        $rand = rand();
        $data = array
            (

                "id_ticket"=>$id_ticket,
                "text_editor"=>$html_link_content,
                "type_note"=>"new",
                "created_by"=>$created_by,
                "created_date"=>$datetime,
                "id_noted"=>$rand,
                "type_state"=>"New"
            );
        $this->Ticket->add_note($data);   


        $updateBy = $this->session->userdata('userid');
        $data = array(
                      "type_activities"=>"Auto Ticket",
                      "created_by"=>$updateBy,
                      "other_id"=>$id_ticket
                    );

        $this->Admin->saveLog($data);
        
        
    }


    function type_email($type)
    {
        if ($type == 0) 
        { 
            $type = "text/"; 
        } 
        elseif ($type == 1) 
        { 
            $type = "multipart/"; 
        } 
        elseif ($type == 2) 
        { 
            $type = "message/"; 
        } 
        elseif ($type == 3) 
        { 
            $type = "application/"; 
        } 
        elseif ($type == 4) 
        { 
            $type = "audio/"; 
        } 
        elseif ($type == 5) 
        { 
            $type = "image/"; 
        } 
        elseif ($type == 6) 
        { 
            $type = "video"; 
        } 
        elseif($type == 7) 
        { 
            $type = "other/"; 
        } 
    }

    function body_email($coding,$message)
    {
        if ($coding == 0) 
        { 
            $message = quoted_printable_decode($message); 
        } 
        elseif ($coding == 1) 
        { 
            $message = imap_8bit($message); 
        } 
        elseif ($coding == 2) 
        { 
            $message = imap_binary($message); 
        } 
        elseif ($coding == 3) 
        { 
            $message = imap_base64($message); 
        } 
        elseif ($coding == 4) 
        { 
            $message = quoted_printable($message); 
        } 
        elseif ($coding == 5) 
        { 
            $message = $message; 
        } 
        
        return $message;
    }


    function remote()
    {
        
    }


    function get_lookup_severity()
    {
        $id = $this->input->post('id');
        $this->Ticket->get_lookup_severity($id);
    }


    function get_enviroment()
    {
        $get_ref_num = $this->input->post('get_ref_num');
        $this->Ticket->get_enviroment($get_ref_num);
    }

    function get_severity()
    {
        $id = $this->input->post('id');
        $this->Ticket->get_severity($id);
    }

    function get_customerID_all()
    {
        $this->Ticket->get_customerID_all();
    }

    function get_customerID_name()
    {
        $id = $this->input->post('customerID');
        $this->Ticket->get_customerID_name($id);
    }

    function pull_environment()
    {
        $id = $this->input->post('id');
        $this->Ticket->pull_environment($id);
    }

    function reopen_ticket()
    {

        $id_ticket = $this->input->post('id');
        $this->Ticket->deleteClosed($id_ticket);


        $updateBy = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date 


        $data = array
                    (
                        "status_ticket"=>'open',
                        "updated_date"=>$datetime,
                        "updated_by"=>$updateBy,
                        "current_state"=>"Re-Open"
                    );
        
        $this->Ticket->update_register_note($data,$id_ticket);


        $html_link_content = 'Re-Open Ticket';

        $rand = rand();
        $data = array
            (

                "id_ticket"=>$id_ticket,
                "text_editor"=>$html_link_content,
                "type_note"=>"open",
                "created_by"=>$updateBy,
                "created_date"=>$datetime,
                "id_noted"=>$rand,
                "type_state"=>"Re-Open"
            );
        $this->Ticket->add_note($data);  
    }


    function get_sla_generated_id()
    {
        $sla = $this->input->post('sla');
        $this->Ticket->get_sla_generated_id($sla);
    }

    function get_lookup_severity_by_gen_id()
    {
        $id_ticket = $this->input->post('id_ticket');
        $this->Ticket->get_lookup_severity_by_gen_id($id_ticket);
    }

    function get_all_severity_onchange()
    {
        $id = $this->input->post('id');
        $this->Ticket->get_all_severity_onchange($id);
    }

    function auto_ticket_v1(){
        $subject = $this->input->post('subject');
        $body = $this->input->post('body');
        $from = $this->input->post('from');
        //$to = $this->input->post('to');
        $to = 'noc@bit.com.my';


        //$a = 'SOLARWINDS NOTIFICATION SPNET - TD BAYAN LEPAS BS1022026760 is Up.';

        if (strpos($subject, 'Up.') !== false) {
            //echo 'Up.';
        } else {

            $check = $this->Ticket->checkSubject_Email($subject);
            if($check>0){

                $this->addNote_Email_Existing($subject,$body,$from,$to);
                
            } else {

                $this->create_ticket_auto($subject,$body,$from,$to);

            }

        }
    }


    function get_fault_itsm_cat()
    {
        $id_ticket = $this->input->post('get_ref_num');
        $this->Ticket->get_fault_itsm_cat($id_ticket);
    }

    function Ticket_Search()
    {
        $this->data['site_title'] = 'Ticket_Search';
        $this->load->view('template/header/header');
        $this->load->view('template/body/Ticket_Search/Ticket_Search',$this->data);
        $this->load->view('template/footer/footer');


    }

    function search_ticket()
    {
        $ticket_number = $this->input->post('ticket_number');
        $date1 = $this->input->post('date1');
        $date2 = $this->input->post('date2');
        $subject = $this->input->post('subject');
        $responsible = $this->input->post('responsible');
        $current_state = $this->input->post('current_state');
        $category = $this->input->post('category');

        $url = 'Ticket/Ticket_Search_Result?ticket_number='.$ticket_number.'&date1='.$date1.'&date2='.$date2.'&subject='.$subject.'&responsible='.$responsible.'&current_state='.$current_state.'&category='.$category;
        redirect($url);
    }

    function Ticket_Search_Result()
    {
        $this->data['site_title'] = 'Ticket_Search';
        $this->load->view('template/header/header');
        $this->load->view('template/body/Ticket_Search_Result/Ticket_Search_Result',$this->data);
        $this->load->view('template/footer/footer');
    }

    function Dtable_Ticket_Search()
    {
        $ticket_number = $this->input->post('ticket_number');
        $date1 = $this->input->post('date1');
        $date2 = $this->input->post('date2');
        $subject = $this->input->post('subject');
        $responsible = $this->input->post('responsible');
        $current_state = $this->input->post('current_state');
        $category = $this->input->post('category');

        header('Content-Type: application/json');
        echo $this->Ticket->Dtable_Ticket_Search($ticket_number,$date1,$date2,$subject,$responsible,$current_state,$category);
    }

    function Get_Email()
    {
        $tp_cu = $this->input->post('tp_cu');
        $this->Ticket->Get_Email($tp_cu);
    }

    function Get_Phone()
    {
        $tp_cu = $this->input->post('tp_cu');
        $this->Ticket->Get_Phone($tp_cu);
    }

    function filter_responsible()
    {
        $group = $this->input->post('group');
        $this->Ticket->filter_responsible($group);
    }

    function getDetails_byHostname()
    {
        $hostname = $this->input->post('hostname');
        $hostname = trim($hostname, " ");
        $query = $this->Ticket->getDetails_byHostname($hostname);

        if(empty($query)){
            echo 'Tiada Data Ditemui';
        } else {
            foreach ($query as $data) 
            {

            }
            echo json_encode($data);
        }
    }


    function getDetails_byHostname_hardware()
    {
        $hostname = $this->input->post('hostname');
        $hostname = trim($hostname, " ");
        $query = $this->Ticket->getDetails_byHostname_hardware($hostname);

        if(empty($query)){
            echo 'Tiada Data Ditemui';
        } else {
            foreach ($query as $data) 
            {

            }
            echo json_encode($data);
        }
    }


    function getLocationDetails()
    {
        $room_id = $this->input->post('room_id');
        $query = $this->Ticket->getLocationDetails($room_id);

        if(empty($query)){
            echo 'Tiada Data Ditemui';
        } else {
            foreach ($query as $data) 
            {

            }
            echo json_encode($data);
        }
    }
}
	
/* END */