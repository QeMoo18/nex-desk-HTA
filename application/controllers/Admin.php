<?php
defined('BASEPATH') OR exit('No direct script access allowed');//ob_clean();
class Admin extends CI_Controller  
{



  public function __construct()
  {

    parent::__construct();
    $this->load->database();
    $this->load->library('session');
    $this->load->library('datatables');
    $this->load->model('Admin_model','Admin'); 
    $this->load->model('Dbase_lookup','lookup');
    $this->load->helper('Lookup_helper'); //helpers



    // $base_img = 'https://scanner.gadingtech.com/qr_code/nav/details_item/';

  }

/* START AGENT */
  public function Add_Agent()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Add_Agent/Add_Agent',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }

  function add_agent_submit()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
      {
          $am_env = $this->input->post('am_env');
          $am_title = $this->input->post('am_title');
          $am_fname = $this->input->post('am_fname');
          $am_lname = $this->input->post('am_lname');
          $am_group = $this->input->post('am_group');
          $am_role = $this->input->post('am_role');
          $am_uname = $this->input->post('am_uname');
          $am_pwd = $this->input->post('am_pwd');
          //$am_pwd =  hash('sha256',$am_pwd);

        $am_email = $this->input->post('am_email');
        $am_mobile = $this->input->post('am_mobile');
        $am_valid = $this->input->post('am_valid');


        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;


        $rand = rand();
        $data = array(
                        "title_salutation"=>$am_title,
                        "first_name"=>$am_fname,
                        "last_name"=>$am_lname,
                        "group_name"=>$am_group,
                        "role_name"=>$am_role,
                        "username"=>$am_uname,
                        "password"=>$am_pwd,
                        "email"=>$am_email,
                        "mobile"=>$am_mobile,
                        "validity"=>$am_valid,
                        "userid"=>$rand,
                        "created"=>$datetime,
                        "env"=>$am_env
                      );

        $save = $this->Admin->save_userdetails($data);


        $data = array(
                        "username"=>$am_uname,
                        "password"=>$am_pwd,
                        "role"=>$am_role,
                        "userid"=>$rand,
                        "status"=>"active"
                    );

        $save = $this->Admin->save_userlogin($data);

        //save log table log activities
        

        $data = array(
                      "type_activities"=>"Create User ",
                      "created_by"=>$updateBy,
                      "userid"=>$rand
                    );

        $this->Admin->saveLog($data);

         } else { 
          $this->load->view('login');
        }
  }



  
  public function A_cmdb_level_add()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'A_cmdb_level_add';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_level_add/A_cmdb_level_add',$this->data);
          $this->load->view('template/footer/footer');

         } else { 
          $this->load->view('login');
        }

  }


  public function A_cmdb_level_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'A_cmdb_level_EditDetails';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_level_EditDetails/A_cmdb_level_EditDetails',$this->data);
          $this->load->view('template/footer/footer');

         } else { 
          $this->load->view('login');
        }

  }



  public function A_cmdb_level_viewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'A_cmdb_level_EditDetails';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_level_viewList/A_cmdb_level_viewList',$this->data);
          $this->load->view('template/footer/footer');

         } else { 
          $this->load->view('login');
        }

  }



  public function A_cmdb_department_add()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'A_cmdb_department_add';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_department_add/A_cmdb_department_add',$this->data);
          $this->load->view('template/footer/footer');

         } else { 
          $this->load->view('login');
        }

  }


  public function A_cmdb_department_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'A_cmdb_department_EditDetails';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_department_EditDetails/A_cmdb_department_EditDetails',$this->data);
          $this->load->view('template/footer/footer');

         } else { 
          $this->load->view('login');
        }

  }



  public function A_cmdb_department_viewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'A_cmdb_department_viewList';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_department_viewList/A_cmdb_department_viewList',$this->data);
          $this->load->view('template/footer/footer');

         } else { 
          $this->load->view('login');
        }

  }


  public function Agent_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'Agent_ViewList';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Agent_ViewList/Agent_ViewList',$this->data);
          $this->load->view('template/footer/footer');

         } else { 
          $this->load->view('login');
        }

  }

  function check_username()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $am_uname = $this->input->post('am_uname');
        echo $check = $this->Admin->check_username($am_uname);

         } else { 
          $this->load->view('login');
        }
  } 

  function Dtable_Agent_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_Agent_ViewList();

        } else { 
          $this->load->view('login');
        }
  }


  public function Agent_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->load->view('template/header/header');
        $this->load->view('template/body/Agent_EditDetails/Agent_EditDetails');
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function agent_details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $userid = $this->input->post('userid');  
        $query = $this->Admin->agent_details($userid);

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


  function edit_agent_submit()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $am_title = $this->input->post('am_title');
        $am_fname = $this->input->post('am_fname');
        $am_lname = $this->input->post('am_lname');
        $am_group = $this->input->post('am_group');
        $am_role = $this->input->post('am_role');
        $am_uname = $this->input->post('am_uname');
        $am_pwd = $this->input->post('am_pwd');
        //$am_pwd =  hash('sha256',$am_pwd);
        $old_pwd = $this->input->post('old_pwd');

        $am_email = $this->input->post('am_email');
        $am_mobile = $this->input->post('am_mobile');
        $am_valid = $this->input->post('am_valid');

        $status = $this->input->post('status');
        $userid = $this->input->post('userid');
        

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        if($status=='same'){

          //update table login
          $dataLogin = array(
                              "role"=>$am_role
                            );
          
          if($am_pwd){
              $dataLogin = array(
                              "role"=>$am_role,
                              "password"=>$am_pwd,
                              "username"=>$am_uname
                            );
              
              $data = array(
                          "title_salutation"=>$am_title,
                          "first_name"=>$am_fname,
                          "last_name"=>$am_lname,
                          "group_name"=>$am_group,
                          "role_name"=>$am_role, 
                          "email"=>$am_email,
                          "username"=>$am_uname,
                          "password"=>$am_pwd,
                          "mobile"=>$am_mobile,
                          "validity"=>$am_valid,
                          "changed"=>$datetime
                        );
          } else {
              $dataLogin = array(
                              "role"=>$am_role,
                              "username"=>$am_uname
                            );
              
              $data = array(
                          "title_salutation"=>$am_title,
                          "first_name"=>$am_fname,
                          "last_name"=>$am_lname,
                          "group_name"=>$am_group,
                          "role_name"=>$am_role, 
                          "email"=>$am_email,
                          "username"=>$am_uname,
                          "mobile"=>$am_mobile,
                          "validity"=>$am_valid,
                          "changed"=>$datetime
                        );
          }
          

        } else {

          //update table login
          $dataLogin = array(
                              "role"=>$am_role,
                              "password"=>$am_pwd,
                              "username"=>$am_uname
                            );


          //update table agent
          $data = array(
                          "title_salutation"=>$am_title,
                          "first_name"=>$am_fname,
                          "last_name"=>$am_lname,
                          "group_name"=>$am_group,
                          "role_name"=>$am_role,
                          "username"=>$am_uname,
                          "password"=>$am_pwd,
                          "email"=>$am_email,
                          "mobile"=>$am_mobile,
                          "validity"=>$am_valid,
                          "changed"=>$datetime
                        );

        }

        $this->Admin->update_login_table($dataLogin,$userid);

        $this->Admin->update_agent_details($data,$userid);


        //save log table log activities
        $data = array(
                        "type_activities"=>"Update Details",
                        "created_by"=>$updateBy,
                        "userid"=>$userid
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }
/* END AGENT */


/* START GM */
  public function GroupManagement()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

      $this->data['site_title'] = 'GroupManagement';
      $this->load->view('template/header/header');
      $this->load->view('template/body/GroupManagement/GroupManagement',$this->data);
      $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
        }

  }

  function gm_add_group()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

      $gm_name = $this->input->post('gm_name');
      $gm_validity = $this->input->post('gm_validity');
      $gm_comment = $this->input->post('gm_comment');


      $updateBy = $this->session->userdata('userid');
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("h:i:s");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $datetime = $dateReg.' '.$timeReg;

      $id_group = rand();

      $data = array('name'=>$gm_name,'validity'=>$gm_validity,'comment'=>$gm_comment,'id_group'=>$id_group, 'Created'=>$datetime);

      $this->Admin->gm_add_group($data);


      //save log table log activities
        $data = array(
                        "type_activities"=>"Add Group Management",
                        "created_by"=>$updateBy,
                        "other_id"=>$id_group
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }

  }

  public function GM_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'GM_ViewList';
        $this->load->view('template/header/header');
        $this->load->view('template/body/GM_ViewList/GM_ViewList',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function Dtable_GM_ViewList()
  {

        $idModule = $this->session->userdata('idModule');
        if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_GM_ViewList();

        } else { 
          $this->load->view('login');
        }
  }

  public function GM_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'GM_EditDetails';
        $this->load->view('template/header/header');
        $this->load->view('template/body/GM_EditDetails/GM_EditDetails',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function gm_details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $groupid = $this->input->post('groupid');  
        $query = $this->Admin->gm_details($groupid);

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

  function gm_edit_group()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $gm_name = $this->input->post('gm_name');
        $gm_validity = $this->input->post('gm_validity');
        $gm_comment = $this->input->post('gm_comment');


        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $groupid = $this->input->post('groupid');

        $data = array('name'=>$gm_name,'validity'=>$gm_validity,'comment'=>$gm_comment, 'Changed'=>$datetime);
        $this->Admin->gm_update($data,$groupid);


        //save log table log activities
        $data = array(
                        "type_activities"=>"Update Group Management",
                        "created_by"=>$updateBy,
                        "other_id"=>$groupid
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }

  }
/* END */


/* START ROLE */
  public function Role_Add()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'Role_Add';
        $this->load->view('template/header/header');
        $this->load->view('template/body/Role_Add/Role_Add',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function role_add_role()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $role_name = $this->input->post('role_name');
        $role_gname = $this->input->post('role_gname');
        $role_validity = $this->input->post('role_validity');
        $role_comment = $this->input->post('role_comment');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $id_role = rand();

        $data = array('name'=>$role_name,'group_name'=>$role_gname,'validity'=>$role_validity,'comment'=>$role_comment,'created'=>$datetime,'id_role'=>$id_role);

        $this->Admin->save_add_role($data);

        //save log table log activities
        $data = array(
                        "type_activities"=>"Add Role",
                        "created_by"=>$updateBy,
                        "other_id"=>$id_role
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }

  }

  public function Role_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'Role_ViewList';
        $this->load->view('template/header/header');
        $this->load->view('template/body/Role_ViewList/Role_ViewList',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function Dtable_Role_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_Role_ViewList();

        } else { 
          $this->load->view('login');
        }
  }

  public function Role_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'Role_EditDetails';
        $this->load->view('template/header/header');
        $this->load->view('template/body/Role_EditDetails/Role_EditDetails',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function role_details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $roleid = $this->input->post('roleid');  
        $query = $this->Admin->role_details($roleid);

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

  function role_update_role()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $role_name = $this->input->post('role_name');
        $role_gname = $this->input->post('role_gname');
        $role_validity = $this->input->post('role_validity');
        $role_comment = $this->input->post('role_comment');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $roleid = $this->input->post('roleid');

        $data = array('name'=>$role_name,'group_name'=>$role_gname,'validity'=>$role_validity,'comment'=>$role_comment,'changed'=>$datetime);

        $this->Admin->role_update_role($data,$roleid);

        //save log table log activities
        $data = array(
                        "type_activities"=>"Update Role",
                        "created_by"=>$updateBy,
                        "other_id"=>$roleid
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }
/* END */


/* START Service Management */
  public function SM_AddService()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'SM_Add_Service';
        $this->load->view('template/header/header');
        $this->load->view('template/body/SM_Add_Service/SM_Add_Service',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function sm_add_service()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $sm_service = $this->input->post('sm_service');
        $sm_sub_services = $this->input->post('sm_sub_services');
        $sm_type = $this->input->post('sm_type');
        $sm_critical = $this->input->post('sm_critical');
        $sm_valid = $this->input->post('sm_valid');
        $sm_comment = $this->input->post('sm_comment');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $other_id = rand();

        //add to services
        $data = array(
                        "service"=>$sm_service,
                        "sub_service"=>$sm_sub_services,
                        "service_type"=>$sm_type,
                        "criticalty"=>$sm_critical,
                        "validity"=>$sm_valid,
                        "comment"=>$sm_comment,
                        "created"=>$datetime,
                        "service_generated_id"=>$other_id
                     );

        $this->Admin->sm_add_service($data);

        $data = array(
                        "type_activities"=>"Add Service",
                        "created_by"=>$updateBy,
                        "other_id"=>$other_id
                     );

        $this->Admin->saveLog($data);


        $sm_sla = $this->input->post('sm_sla');
        if(!empty($sm_sla)){
          $save = $this->Admin->add_sm_sla($sm_sla,$other_id); 
        }

        } else { 
          $this->load->view('login');
        }

  }

  public function SM_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'SM_ViewList';
        $this->load->view('template/header/header');
        $this->load->view('template/body/SM_ViewList/SM_ViewList',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function Dtable_SM_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_SM_ViewList();

        } else { 
          $this->load->view('login');
        }
  }

  public function SM_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'SM_EditDetails';
        $this->load->view('template/header/header');
        $this->load->view('template/body/SM_EditDetails/SM_EditDetails',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function sm_details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $servicesid = $this->input->post('servicesid');  
        $query = $this->Admin->sm_details($servicesid);

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

  function sm_update_service()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $sm_service = $this->input->post('sm_service');
        $sm_sub_services = $this->input->post('sm_sub_services');
        $sm_type = $this->input->post('sm_type');
        $sm_critical = $this->input->post('sm_critical');
        $sm_valid = $this->input->post('sm_valid');
        $sm_comment = $this->input->post('sm_comment');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $servicesid = $this->input->post('servicesid');

        //add to services
        $data = array(
                        "service"=>$sm_service,
                        "sub_service"=>$sm_sub_services,
                        "service_type"=>$sm_type,
                        "criticalty"=>$sm_critical,
                        "validity"=>$sm_valid,
                        "comment"=>$sm_comment,
                        "changed"=>$datetime
                     );

        $this->Admin->sm_update_service($data,$servicesid);

        $data = array(
                        "type_activities"=>"Update Service",
                        "created_by"=>$updateBy,
                        "other_id"=>$servicesid
                     );

        $this->Admin->saveLog($data);


        //update list
        $sm_sla = $this->input->post('sm_sla');
        if(!empty($sm_sla)){
          $save = $this->Admin->update_sm_sla($sm_sla,$servicesid); 
        }

        } else { 
          $this->load->view('login');
        }


  }
/* END */


/* START ST */
  public function ST_AddServiceType()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'ST_AddServiceType';
        $this->load->view('template/header/header');
        $this->load->view('template/body/ST_AddServiceType/ST_AddServiceType',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function st_add_service()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $st_name = $this->input->post('st_name');
        $st_validity = $this->input->post('st_validity');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $service_type_id = rand();

        //add to services
        $data = array(
                        "service_type"=>$st_name,
                        "validity"=>$st_validity,
                        "created"=>$datetime,
                        "service_type_id"=>$service_type_id
                     );

        $this->Admin->st_add_service($data);

        $data = array(
                        "type_activities"=>"Add Service Type",
                        "created_by"=>$updateBy,
                        "other_id"=>$service_type_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }


  public function ST_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'ST_ViewList';
        $this->load->view('template/header/header');
        $this->load->view('template/body/ST_ViewList/ST_ViewList',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function Dtable_ST_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_ST_ViewList();

        } else { 
          $this->load->view('login');
        }
  }

  public function ST_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'ST_EditDetails';
        $this->load->view('template/header/header');
        $this->load->view('template/body/ST_EditDetails/ST_EditDetails',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function st_details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $service_type_id = $this->input->post('service_type_id');  
        $query = $this->Admin->st_details($service_type_id);

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

  function st_update_service()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $st_name = $this->input->post('st_name');
        $st_validity = $this->input->post('st_validity');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $service_type_id = $this->input->post('service_type_id');

        //add to services
        $data = array(
                        "service_type"=>$st_name,
                        "validity"=>$st_validity,
                        "changed"=>$datetime
                     );

        $this->Admin->st_update_service($data,$service_type_id);

        $data = array(
                        "type_activities"=>"Update Service Type",
                        "created_by"=>$updateBy,
                        "other_id"=>$service_type_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }
/* END */


/* START SLA */
  public function SLA_AddService()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'SLA_Add_Service';
        $this->load->view('template/header/header');
        $this->load->view('template/body/SLA_Add_Service/SLA_Add_Service',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }
  function sla_add_service()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $sla_sla = $this->input->post('sla_sla');
        $sla_type = $this->input->post('sla_type');
        $sla_service = $this->input->post('sla_service');
        $sla_calendar = $this->input->post('sla_calendar');
        $sla_first_escalation = $this->input->post('sla_first_escalation');
        $sla_update_time = $this->input->post('sla_update_time');
        $sla_solution_time = $this->input->post('sla_solution_time');
        $sla_minimun_time = $this->input->post('sla_minimun_time');
        $sla_valid = $this->input->post('sla_valid');
        $sla_comment = $this->input->post('sla_comment');

        $sla_breach = $this->input->post('sla_breach');
        

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $sla_id = rand();

        $sla_type_main = $this->input->post('sla_type_main');
        // $sla_severity = $this->input->post('sla_severity');

        $generated_id = $this->input->post('generated_id');

        $data = array(
                        'sla'=> $sla_sla,
                        'sla_type'=> $sla_type,
                        'service'=> $sla_service,
                        'calendar'=> $sla_calendar,
                        'first_response'=> $sla_first_escalation,
                        'update_time'=> $sla_update_time,
                        'solution_time'=> $sla_solution_time,
                        'min_time_between_incident'=> $sla_minimun_time,
                        'validity'=> $sla_valid,
                        'comment'=> $sla_comment,
                        'created'=> $datetime,
                        'sla_id'=> $sla_id,
                        'sla_breach'=>$sla_breach,
                        'type_of_sla'=>$sla_type_main,
                        'sla_generated_id'=>$generated_id
                     );
        $this->Admin->sla_add_service($data);

        $data = array(
                        "type_activities"=>"Add SLA",
                        "created_by"=>$updateBy,
                        "other_id"=>$sla_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }

  public function SLA_VIewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'SLA_VIewList';
        $this->load->view('template/header/header');
        $this->load->view('template/body/SLA_VIewList/SLA_VIewList',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function Dtable_SLA_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_SLA_ViewList();

        } else { 
          $this->load->view('login');
        }
  }

  public function SLA_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'SLA_EditDetails';
        $this->load->view('template/header/header');
        $this->load->view('template/body/SLA_EditDetails/SLA_EditDetails',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function sla_details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $slaid = $this->input->post('slaid');  
        $query = $this->Admin->sla_details($slaid);

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

  function sla_update_service()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $sla_sla = $this->input->post('sla_sla');
        $sla_type = $this->input->post('sla_type');
        $sla_service = $this->input->post('sla_service');
        $sla_calendar = $this->input->post('sla_calendar');
        $sla_first_escalation = $this->input->post('sla_first_escalation');
        $sla_update_time = $this->input->post('sla_update_time');
        $sla_solution_time = $this->input->post('sla_solution_time');
        $sla_minimun_time = $this->input->post('sla_minimun_time');
        $sla_valid = $this->input->post('sla_valid');
        $sla_comment = $this->input->post('sla_comment');
        
        $sla_breach = $this->input->post('sla_breach');


        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $sla_id = $this->input->post('slaid');

        $severity = $this->input->post('severity');
        $type_of_sla = $this->input->post('type_of_sla');

        $data = array(
                        'sla'=> $sla_sla,
                        'sla_type'=> $sla_type,
                        'service'=> $sla_service,
                        'calendar'=> $sla_calendar,
                        'first_response'=> $sla_first_escalation,
                        'update_time'=> $sla_update_time,
                        'solution_time'=> $sla_solution_time,
                        'min_time_between_incident'=> $sla_minimun_time,
                        'validity'=> $sla_valid,
                        'comment'=> $sla_comment,
                        'changed'=> $datetime,
                        'sla_breach'=> $sla_breach,
                        'severity'=>$severity,
                        'type_of_sla'=>$type_of_sla
                     );
        $this->Admin->sla_update_service($data,$sla_id);

        $data = array(
                        "type_activities"=>"Update SLA",
                        "created_by"=>$updateBy,
                        "other_id"=>$sla_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }
/* END */


/* START SLA TYPE */
  public function SLA_AddType()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'SLA_AddType';
          $this->load->view('template/header/header');
          $this->load->view('template/body/SLA_AddType/SLA_AddType',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
        }

  } 

  function sla_add_type()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $sla_type_name = $this->input->post('sla_type_name');
        $sla_type_validity = $this->input->post('sla_type_validity');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $type_id = rand();

        $data = array(
                        'sla_type'=> $sla_type_name,
                        'validity'=> $sla_type_validity,
                        'created'=> $datetime,
                        'type_id'=>$type_id
                     );
        $this->Admin->sla_add_type($data,$sla_id);

        $data = array(
                        "type_activities"=>"Add SLA Type",
                        "created_by"=>$updateBy,
                        "other_id"=>$type_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }

  public function SLA_Type_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'SLA_Type_ViewList';
        $this->load->view('template/header/header');
        $this->load->view('template/body/SLA_Type_ViewList/SLA_Type_ViewList',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function Dtable_SLA_Type_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_SLA_Type_ViewList();

        } else { 
          $this->load->view('login');
        }
  }

  public function SLA_Type_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'SLA_Type_EditDetails';
        $this->load->view('template/header/header');
        $this->load->view('template/body/SLA_Type_EditDetails/SLA_Type_EditDetails',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function sla_type_details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $slatypeid = $this->input->post('slatypeid');  
        $query = $this->Admin->sla_type_details($slatypeid);

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

  function sla_update_type()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $sla_type_name = $this->input->post('sla_type_name');
        $sla_type_validity = $this->input->post('sla_type_validity');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $slatypeid = $this->input->post('slatypeid');

        $data = array(
                        'sla_type'=> $sla_type_name,
                        'validity'=> $sla_type_validity,
                        'changed'=> $datetime
                     );
        $this->Admin->sla_update_type($data,$slatypeid);

        $data = array(
                        "type_activities"=>"Update SLA Type",
                        "created_by"=>$updateBy,
                        "other_id"=>$slatypeid
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }

  function check_sla_type_name()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $sla_type_name = $this->input->post('sla_type_name');
        echo $check = $this->Admin->check_sla_type_name($sla_type_name);

        } else { 
          $this->load->view('login');
        }
  }
/* END */


/* START Default */
  public function Default_AddPriority()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'Default_AddPriority';
        $this->load->view('template/header/header');
        $this->load->view('template/body/Default_AddPriority/Default_AddPriority',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  public function Default_ListView()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'Default_ListView';
        $this->load->view('template/header/header');
        $this->load->view('template/body/Default_ListView/Default_ListView',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }
  public function Default_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'Default_EditDetails';
        $this->load->view('template/header/header');
        $this->load->view('template/body/Default_EditDetails/Default_EditDetails',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }
/* END */


/* START Priority */
  function default_add_priority()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $default_name = $this->input->post('default_name');
        $default_validity = $this->input->post('default_validity');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = rand();

        $data = array(
                        'critical_type'=> $default_name,
                        'validity'=> $default_validity,
                        'created'=> $datetime,
                        'default_id'=>$default_id
                     );
        $this->Admin->default_add_priority($data);

        $data = array(
                        "type_activities"=>"Add Priority",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }

  function Dtable_Default_Priority_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_Default_Priority_ViewList();

        } else { 
          $this->load->view('login');
        }
  }
  function default_priority_details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $default_id = $this->input->post('default_id');  
        $query = $this->Admin->default_priority_details($default_id);

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

  function default_update_priority()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $default_name = $this->input->post('default_name');
        $default_validity = $this->input->post('default_validity');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = $this->input->post('default_id');

        $data = array(
                        'critical_type'=> $default_name,
                        'validity'=> $default_validity,
                        'changed'=> $datetime
                     );
        $this->Admin->default_update_priority($data,$default_id);

        $data = array(
                        "type_activities"=>"Update Priority",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  } 
/* END */


/* START Deployment */
  public function Deployment_AddState()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'Deployment_AddState';
        $this->load->view('template/header/header');
        $this->load->view('template/body/Deployment_AddState/Deployment_AddState',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  public function Deployment_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'Deployment_ViewList';
        $this->load->view('template/header/header');
        $this->load->view('template/body/Deployment_ViewList/Deployment_ViewList',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  public function Deployment_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'Deployment_EditDetails';
        $this->load->view('template/header/header');
        $this->load->view('template/body/Deployment_EditDetails/Deployment_EditDetails',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function deployment_add_state()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $deployment_name = $this->input->post('deployment_name');
        $deployment_validity = $this->input->post('deployment_validity');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = rand();

        $data = array(
                        'deployment_state'=> $deployment_name,
                        'validity'=> $deployment_validity,
                        'created'=> $datetime,
                        'default_id'=>$default_id
                     );
        $this->Admin->deployment_add_state($data);

        $data = array(
                        "type_activities"=>"Add State",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }

  function Dtable_Deployment_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_Deployment_ViewList();

        } else { 
          $this->load->view('login');
        }
  }

  function deployment_details()
  {
    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
    {

        $default_id = $this->input->post('default_id');  
        $query = $this->Admin->deployment_details($default_id);

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

  function deployment_update_state()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $deployment_name = $this->input->post('deployment_name');
        $deployment_validity = $this->input->post('deployment_validity');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = $this->input->post('default_id');

        $data = array(
                        'deployment_state'=> $deployment_name,
                        'validity'=> $deployment_validity,
                        'changed'=> $datetime
                     );
        $this->Admin->deployment_update_state($data,$default_id);

        $data = array(
                        "type_activities"=>"Update State",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }
/* END */


/* START Incident */

  public function Incident_AddState()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'Incident_AddState';
        $this->load->view('template/header/header');
        $this->load->view('template/body/Incident_AddState/Incident_AddState',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  public function Incident_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'Incident_ViewList';
        $this->load->view('template/header/header');
        $this->load->view('template/body/Incident_ViewList/Incident_ViewList',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }
  
  public function Incident_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'Incident_EditDetails';
        $this->load->view('template/header/header');
        $this->load->view('template/body/Incident_EditDetails/Incident_EditDetails',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }
  
  function incident_add_state()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $incident_name = $this->input->post('incident_name');
        $incident_validity = $this->input->post('incident_validity');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = rand();

        $data = array(
                        'incident_state'=> $incident_name,
                        'validity'=> $incident_validity,
                        'created'=> $datetime,
                        'default_id'=>$default_id
                     );
        $this->Admin->incident_add_state($data);

        $data = array(
                        "type_activities"=>"Add Incident State",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        } 
  }
  
  function Dtable_Incident_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_Incident_ViewList();

        } else { 
          $this->load->view('login');
        }
  }

  function incident_details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $default_id = $this->input->post('default_id');  
        $query = $this->Admin->incident_details($default_id);

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

  function incident_update_state()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $incident_name = $this->input->post('incident_name');
        $incident_validity = $this->input->post('incident_validity');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = $this->input->post('default_id');

        $data = array(
                        'incident_state'=> $incident_name,
                        'validity'=> $incident_validity,
                        'changed'=> $datetime
                     );
        $this->Admin->incident_update_state($data,$default_id);

        $data = array(
                        "type_activities"=>"Update Incident State",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }
/* END */


/* START Validity */
  public function Validity_AddType()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'Validity_AddType';
        $this->load->view('template/header/header');
        $this->load->view('template/body/Validity_AddType/Validity_AddType',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  public function Validity_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'Validity_ViewList';
        $this->load->view('template/header/header');
        $this->load->view('template/body/Validity_ViewList/Validity_ViewList',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  public function Validity_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'Validity_EditDetails';
        $this->load->view('template/header/header');
        $this->load->view('template/body/Validity_EditDetails/Validity_EditDetails',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }


  }

  function validity_add()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $Validity_Name = $this->input->post('Validity_Name');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = rand();

        $data = array(
                        'validity'=> $Validity_Name,
                        'created'=> $datetime,
                        'default_id'=>$default_id
                     );
        
        $this->Admin->validity_add($data);

        $data = array(
                        "type_activities"=>"Add Validity",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }

  function Dtable_Validity_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_Validity_ViewList();

        } else { 
          $this->load->view('login');
        }
  }

  function validity_details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $default_id = $this->input->post('default_id');  
        $query = $this->Admin->validity_details($default_id);

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

  function validity_update()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $Validity_Name = $this->input->post('Validity_Name');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = $this->input->post('default_id');

        $data = array(
                        'validity'=> $Validity_Name,
                        'changed'=> $datetime
                     );
        $this->Admin->validity_update($data,$default_id);

        $data = array(
                        "type_activities"=>"Add Validity",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }
/* END */


/* DELETE FUNCTION */
  function delete_data()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $other_id = $this->input->post('other_id');
        $nama_table = $this->input->post('nama_table');
        $where_column = $this->input->post('where_column');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $this->Admin->delete_data($other_id,$nama_table,$where_column);

        $title = " Update To Delete data ".$nama_table;

        $data = array(
                        "type_activities"=>$title,
                        "created_by"=>$updateBy,
                        "other_id"=>$other_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }


  function delete_data3()
  {
    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $other_id = $this->input->post('other_id');
        $nama_table = $this->input->post('nama_table');
        $where_column = $this->input->post('where_column');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $this->db->where($where_column,$other_id);
        $this->db->delete($nama_table);

        $title = " Update To Delete data ".$nama_table;

        $data = array(
                        "type_activities"=>$title,
                        "created_by"=>$updateBy,
                        "other_id"=>$other_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }



  function gm_delete_data_join()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $other_id = $this->input->post('other_id');
          $nama_table = $this->input->post('nama_table');
          $nama_table2 = $this->input->post('nama_table2');
          $where_column = $this->input->post('where_column');
          $where_column2 = $this->input->post('where_column2');
          $updateBy = $this->session->userdata('userid');
          date_default_timezone_set("Asia/Kuala_Lumpur");
          $timeReg =date("h:i:s");
          $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
          $datetime = $dateReg.' '.$timeReg;

          $this->Admin->gm_delete_data_join($other_id,$nama_table,$nama_table2,$where_column,$where_column2);



          $title = " Update To Delete data ".$nama_table.' & '.$nama_table2;

          $data = array(
                          "type_activities"=>$title,
                          "created_by"=>$updateBy,
                          "other_id"=>$other_id
                       );

          $this->Admin->saveLog($data);

          } else { 
          $this->load->view('login');
        }
  }

  function sm_delete_data_join()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $other_id = $this->input->post('other_id');
        $nama_table = $this->input->post('nama_table');
        $nama_table2 = $this->input->post('nama_table2');
        $where_column = $this->input->post('where_column');
        $where_column2 = $this->input->post('where_column2');
        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $this->Admin->sm_delete_data_join($other_id,$nama_table,$nama_table2,$where_column,$where_column2);

        $title = " Update To Delete data ".$nama_table.' & '.$nama_table2;

        $data = array(
                        "type_activities"=>$title,
                        "created_by"=>$updateBy,
                        "other_id"=>$other_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }

  function delete_data_trash()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $other_id = $this->input->post('other_id');
        $nama_table = $this->input->post('nama_table');
        $where_column = $this->input->post('where_column');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $this->Admin->delete_data_trash($other_id,$nama_table,$where_column);

        $title = " Delete data ".$nama_table;

        $data = array(
                        "type_activities"=>$title,
                        "created_by"=>$updateBy,
                        "other_id"=>$other_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }
/* END */


/* START CRITICALITY */
  public function Criticality_AddType()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'Criticality_AddType';
        $this->load->view('template/header/header');
        $this->load->view('template/body/Criticality_AddType/Criticality_AddType',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }
  }

  public function Criticality_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'Criticality_EditDetails';
        $this->load->view('template/header/header');
        $this->load->view('template/body/Criticality_EditDetails/Criticality_EditDetails',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }
  }

  public function Criticality_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'Criticality_ViewList';
        $this->load->view('template/header/header');
        $this->load->view('template/body/Criticality_ViewList/Criticality_ViewList',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function Criticality_add()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $Criticality_name = $this->input->post('Criticality_name');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = rand();

        $data = array(
                        'Criticality'=> $Criticality_name,
                        'created'=> $datetime,
                        'default_id'=>$default_id
                     );
        
        $this->Admin->Criticality_add($data);

        $data = array(
                        "type_activities"=>"Add Criticality",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }

  function Dtable_Criticality_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_Criticality_ViewList();

        } else { 
          $this->load->view('login');
        }
  }

  function Criticality_details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $default_id = $this->input->post('default_id');  
        $query = $this->Admin->Criticality_details($default_id);

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

  function Criticality_update()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $Criticality_name = $this->input->post('Criticality_name');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = $this->input->post('default_id');

        $data = array(
                        'Criticality'=> $Criticality_name,
                        'changed'=> $datetime
                     );

        $this->Admin->Criticality_update($data,$default_id);

        $data = array(
                        "type_activities"=>"Add Criticality",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }
/* END */


/* START COMPUTER */ 
    public function A_cmdb_computer_add()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'admin_cmdb_computer';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_computer_add/A_cmdb_computer_add',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
          }
    }

    public function CMDB_Computer_process()
    { 

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $COMP_Name = $this->input->post('COMP_Name');
          $COMP_Deployment_State = $this->input->post('COMP_Deployment_State');
          $COMP_Incident_State = $this->input->post('COMP_Incident_State');
          $COMP_vendor = $this->input->post('COMP_vendor');
          $COMP_model = $this->input->post('COMP_model');
          $COMP_description = $this->input->post('COMP_description');
          $COMP_type = $this->input->post('COMP_type');
          $COMP_owner = $this->input->post('COMP_owner');
          $COMP_SerialNo = $this->input->post('COMP_SerialNo');
          $COMP_OS = $this->input->post('COMP_OS');
          $COMP_CPU = $this->input->post('COMP_CPU');
          $COMP_RAM = $this->input->post('COMP_RAM');
          $COMP_hardisk = $this->input->post('COMP_hardisk');
          $COMP_capacity = $this->input->post('COMP_capacity');
          $COMP_FQDN = $this->input->post('COMP_FQDN');
          $COMP_NA = $this->input->post('COMP_NA');
          $COMP_GA = $this->input->post('COMP_GA');
          $COMP_OE = $this->input->post('COMP_OE');
          $COMP_WAD = $this->input->post('COMP_WAD');
          $COMP_InstallDate = $this->input->post('COMP_InstallDate');
          $COMP_Notes = $this->input->post('COMP_Notes');
          $COMP_Location = $this->input->post('COMP_Location');
          $COMP_validity = $this->input->post('COMP_validity');

          //default data 
          $updateBy = $this->session->userdata('userid'); // id yang login system
          date_default_timezone_set("Asia/Kuala_Lumpur");
          $timeReg =date("h:i:s");
          $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
          $datetime = $dateReg.' '.$timeReg; //current date 

          // auto create id : random id
          $other_id = rand();

          $COMP_ip = $this->input->post('COMP_ip');
          $COMP_mac = $this->input->post('COMP_mac');




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

          //echo '<img src="'.base_url().'qr_image/tes.png" />';
          // add 2 column | simpan qrcode & config id
          // "qr_code"=>$random_name,
          //"config_id"=>$config_id


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



          $data = array(  "name"=>$COMP_Name,
                          "deployment_state"=>$COMP_Deployment_State,
                          "incident_state"=>$COMP_Incident_State,
                          "vendor"=>$COMP_vendor,
                          "model"=>$COMP_model,
                          "description"=>$COMP_description,
                          "type"=>$COMP_type,
                          "owner"=>$COMP_owner,
                          "serial_number"=>$COMP_SerialNo,
                          "operating_system"=>$COMP_OS,
                          "CPU"=>$COMP_CPU,
                          "ram"=>$COMP_RAM,
                          "HardDisk"=>$COMP_hardisk,
                          "capacity"=>$COMP_capacity,
                          "FQDN"=>$COMP_FQDN,
                          "network_adapter"=>$COMP_NA,
                          "graphic_adapter"=>$COMP_GA,
                          "other_equipment"=>$COMP_OE,
                          "warranty_expiration_date"=>$COMP_WAD,
                          "install_date"=>$COMP_InstallDate,
                          "note"=>$COMP_Notes,
                          "location"=>$COMP_Location,
                          "validity"=>$COMP_validity,
                          "created"=>$datetime, 
                          "other_id"=>$other_id,
                          "ip"=>$COMP_ip,
                          "mac_address"=>$COMP_mac,
                          "qr_code"=>$random_name,
                          "config_id"=>$config_id,
                          "network_port"=>$network_port,
                          "cpu_model"=>$cpu_model,
                          "cpu_core"=>$cpu_core,
                          "cpu_serial_no"=>$cpu_serial_no,
                          "processor_type"=>$processor_type,
                          "monitor_brand"=>$monitor_brand,
                          "monitor_serial_no"=>$monitor_serial_no,
                          "ups_brand"=>$ups_brand,
                          "ups_model"=>$ups_model,
                          "ups_serial_no"=>$ups_serial_no,
                     );

          // create function dekat model 
          $save = $this->Admin->SimpanDataComputer($data);


          $data = array("computer_name"=>$COMP_Name);
          $register_net_send = $this->Admin->register_net_send($data);

           //code untuk save log
          //fungsi untuk trace activiti user
          $data = array(
                          "type_activities"=>"Add Computer ",
                          "created_by"=>$updateBy,
                          "other_id"=>$other_id
                        );

          $this->Admin->saveLog($data);

          } else { 
          $this->load->view('login');
          }
    }

    function computer_agent_add()
    {
      header('Access-Control-Allow-Origin: *');

      $COMP_Name = $this->input->post('COMP_Name');
      $COMP_Deployment_State = $this->input->post('COMP_Deployment_State');
      $COMP_Incident_State = $this->input->post('COMP_Incident_State');
      $COMP_vendor = $this->input->post('COMP_vendor');
      $COMP_model = $this->input->post('COMP_model');
      $COMP_description = $this->input->post('COMP_description');
      $COMP_type = $this->input->post('COMP_type');
      $COMP_owner = $this->input->post('COMP_owner');
      $COMP_SerialNo = $this->input->post('COMP_SerialNo');
      $COMP_OS = $this->input->post('COMP_OS');
      $COMP_CPU = $this->input->post('COMP_CPU');
      $COMP_RAM = $this->input->post('COMP_RAM');
      $COMP_hardisk = $this->input->post('COMP_hardisk');
      $COMP_capacity = $this->input->post('COMP_capacity');
      $COMP_FQDN = $this->input->post('COMP_FQDN');
      $COMP_NA = $this->input->post('COMP_NA');
      $COMP_GA = $this->input->post('COMP_GA');
      $COMP_OE = $this->input->post('COMP_OE');
      $COMP_WAD = $this->input->post('COMP_WAD');
      $COMP_InstallDate = $this->input->post('COMP_InstallDate');
      $COMP_Notes = $this->input->post('COMP_Notes');
      $COMP_Location = $this->input->post('COMP_Location');
      $COMP_validity = $this->input->post('COMP_validity');

      $Status = $this->input->post('Status');

      //default data 
      $updateBy = $this->session->userdata('userid'); // id yang login system
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("h:i:s");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $datetime = $dateReg.' '.$timeReg; //current date 

      // auto create id : random id
      $other_id = rand();

      $COMP_ip = $this->input->post('COMP_ip');
      $COMP_mac = $this->input->post('COMP_mac');


      $check = $this->Admin->checkName_Computer($COMP_Name);

      if($check>0){

        $data = array(
                      "deployment_state"=>$COMP_Deployment_State,
                      "incident_state"=>$COMP_Incident_State,
                      // "vendor"=>$COMP_vendor,
                      "model"=>$COMP_model,
                      "description"=>$COMP_description,
                      "type"=>$COMP_type,
                      "owner"=>$COMP_owner,
                      "serial_number"=>$COMP_SerialNo,
                      "operating_system"=>$COMP_OS,
                      "CPU"=>$COMP_CPU,
                      "ram"=>$COMP_RAM,
                      "HardDisk"=>$COMP_hardisk,
                      // "capacity"=>$COMP_capacity,
                      // "FQDN"=>$COMP_FQDN,
                      // "network_adapter"=>$COMP_NA,
                      // "graphic_adapter"=>$COMP_GA,
                      // "other_equipment"=>$COMP_OE,
                      // "warranty_expiration_date"=>$COMP_WAD,
                      // "install_date"=>$COMP_InstallDate,
                      // "note"=>$COMP_Notes,
                      //"location"=>$COMP_Location,
                      // "validity"=>$COMP_validity,
                      "changed"=>$datetime, 
                      // "other_id"=>$other_id,
                      "ip"=>$COMP_ip,
                      "mac_address"=>$COMP_mac,
                      "Status"=>$Status
                 );

        // create function dekat model 
        $save = $this->Admin->UpdateDataComputer_ByAgent($data,$COMP_Name);

      } else {
        $data = array("name"=>$COMP_Name,
                      "deployment_state"=>$COMP_Deployment_State,
                      "incident_state"=>$COMP_Incident_State,
                      // "vendor"=>$COMP_vendor,
                      "model"=>$COMP_model,
                      "description"=>$COMP_description,
                      "type"=>$COMP_type,
                      "owner"=>$COMP_owner,
                      "serial_number"=>$COMP_SerialNo,
                      "operating_system"=>$COMP_OS,
                      "CPU"=>$COMP_CPU,
                      "ram"=>$COMP_RAM,
                      "HardDisk"=>$COMP_hardisk,
                      // "capacity"=>$COMP_capacity,
                      // "FQDN"=>$COMP_FQDN,
                      // "network_adapter"=>$COMP_NA,
                      // "graphic_adapter"=>$COMP_GA,
                      // "other_equipment"=>$COMP_OE,
                      // "warranty_expiration_date"=>$COMP_WAD,
                      // "install_date"=>$COMP_InstallDate,
                      // "note"=>$COMP_Notes,
                        //"location"=>$COMP_Location,
                      "validity"=>$COMP_validity,
                      "created"=>$datetime, 
                      "other_id"=>$other_id,
                      "ip"=>$COMP_ip,
                      "Status"=>$Status
                 );

        // create function dekat model 
        $save = $this->Admin->SimpanDataComputer($data);

        $data = array("computer_name"=>$COMP_Name);
        $register_net_send = $this->Admin->register_net_send($data);

      }

      

      

    }

    function CMDB_Computer_update()
    {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $COMP_Name = $this->input->post('COMP_Name');
          $COMP_Deployment_State = $this->input->post('COMP_Deployment_State');
          $COMP_Incident_State = $this->input->post('COMP_Incident_State');
          $COMP_vendor = $this->input->post('COMP_vendor');
          $COMP_model = $this->input->post('COMP_model');
          $COMP_description = $this->input->post('COMP_description');
          $COMP_type = $this->input->post('COMP_type');
          $COMP_owner = $this->input->post('COMP_owner');
          $COMP_SerialNo = $this->input->post('COMP_SerialNo');
          $COMP_OS = $this->input->post('COMP_OS');
          $COMP_CPU = $this->input->post('COMP_CPU');
          $COMP_RAM = $this->input->post('COMP_RAM');
          $COMP_hardisk = $this->input->post('COMP_hardisk');
          $COMP_capacity = $this->input->post('COMP_capacity');
          $COMP_FQDN = $this->input->post('COMP_FQDN');
          $COMP_NA = $this->input->post('COMP_NA');
          $COMP_GA = $this->input->post('COMP_GA');
          $COMP_OE = $this->input->post('COMP_OE');
          $COMP_WAD = $this->input->post('COMP_WAD');
          $COMP_InstallDate = $this->input->post('COMP_InstallDate');
          $COMP_Notes = $this->input->post('COMP_Notes');
          $COMP_Location = $this->input->post('COMP_Location');
          $COMP_validity = $this->input->post('COMP_validity');

          $COMP_ip = $this->input->post('COMP_ip');
          $COMP_mac = $this->input->post('COMP_mac');

          //default data 
          $updateBy = $this->session->userdata('userid'); // id yang login system
          date_default_timezone_set("Asia/Kuala_Lumpur");
          $timeReg =date("h:i:s");
          $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
          $datetime = $dateReg.' '.$timeReg; //current date 

          // auto create id : random id
          $other_id = $this->input->post('other_id');


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

          // ini adalah data yang kau nak update 
          $data = array(  "name"=>$COMP_Name,
                          "ip"=>$COMP_ip,
                          "mac_address"=>$COMP_mac,
                          "deployment_state"=>$COMP_Deployment_State,
                          "incident_state"=>$COMP_Incident_State,
                          "vendor"=>$COMP_vendor,
                          "model"=>$COMP_model,
                          "description"=>$COMP_description,
                          "type"=>$COMP_type,
                          "owner"=>$COMP_owner,
                          "serial_number"=>$COMP_SerialNo,
                          "operating_system"=>$COMP_OS,
                          "CPU"=>$COMP_CPU,
                          "ram"=>$COMP_RAM,
                          "HardDisk"=>$COMP_hardisk,
                          "capacity"=>$COMP_capacity,
                          "FQDN"=>$COMP_FQDN,
                          "network_adapter"=>$COMP_NA,
                          "graphic_adapter"=>$COMP_GA,
                          "other_equipment"=>$COMP_OE,
                          "warranty_expiration_date"=>$COMP_WAD,
                          "install_date"=>$COMP_InstallDate,
                          "note"=>$COMP_Notes,
                          "location"=>$COMP_Location,
                          "validity"=>$COMP_validity,
                          "changed"=>$datetime, // kita letak tarikh kau changed ,
                          "network_port"=>$network_port,
                          "cpu_model"=>$cpu_model,
                          "cpu_core" =>$cpu_core,
                          "cpu_serial_no"=>$cpu_serial_no,
                          "processor_type"=>$processor_type,
                          "monitor_brand"=>$monitor_brand,
                          "monitor_serial_no"=>$monitor_serial_no,
                          "ups_brand"=>$ups_brand,
                          "ups_model"=>$ups_model,
                          "ups_serial_no"=>$ups_serial_no,
                     ); // jangan update sekali nga id sebab id tu jadikan where sql

          // create function dekat model 
          $save = $this->Admin->UpdateDataComputer($data,$other_id); // ini adalah fungsi yg akan buat proses

           //code untuk save log
          //fungsi untuk trace activiti user
          $data = array(
                          "type_activities"=>"Update Computer ", // ubah apa aktiviti dia
                          "created_by"=>$updateBy,
                          "other_id"=>$other_id
                        );

          $this->Admin->saveLog($data);

          } else { 
          $this->load->view('login');
          }
    }

    public function A_cmdb_computer_viewList()
    { 

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        { 

          $this->data['site_title'] = 'a_cmdb_comp_viewList';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_computer_viewList/a_cmdb_computer_viewList',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
          }
    }

    function Dtable_CMDB_Computer_ViewList()
    { 

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          header('Content-Type: application/json');
          echo $this->Admin->Dtable_CMDB_Computer_ViewList(); //create function model

          } else { 
          $this->load->view('login');
          }
    }

    function Delete_CMDB_Computer_ViewList()
    {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $other_id = $this->input->post('other_id');
          $delete = $this->Admin->Delete_CMDB_Computer_ViewList($other_id);

          } else { 
          $this->load->view('login');
          }
    } 

    public function A_cmdb_computer_EditDetails()
    { 

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'a_cmdb_comp_editDetails';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_computer_EditDetails/A_cmdb_computer_EditDetails',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
          }
    }

    function cmdb_computer_details()
    { 

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $other_id = $this->input->post('other_id');  // amik param yg kita post dekat view tadi
          $query = $this->Admin->cmdb_computer_details($other_id); //declare nama model dan letak parameter dalam kurungan

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


/* START COMPUTER TYPE */    
   public function A_cmdb_computerType_add()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'A_cmdb_computerType_add';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_computerType_add/A_cmdb_computerType_add',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
          }
    }

    public function A_cmdb_computerType_viewlist()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'A_cmdb_computerType_viewlist';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_computerType_viewlist/A_cmdb_computerType_viewlist',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
          }

    }

    public function A_cmdb_computerType_EditDetails()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'A_cmdb_computerType_EditDetails';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_computerType_EditDetails/A_cmdb_computerType_EditDetails',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
          }
    }


    function A_cmdb_computerType_addData()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $comptype_name = $this->input->post('comptype_name');

          $updateBy = $this->session->userdata('userid');
          date_default_timezone_set("Asia/Kuala_Lumpur");
          $timeReg =date("h:i:s");
          $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
          $datetime = $dateReg.' '.$timeReg;

          $other_id = rand();

          $data = array(
                          'computer_type'=> $comptype_name,
                          'created'=> $datetime,
                          'other_id'=>$other_id
                       );
          
          $this->Admin->A_cmdb_computerType_addData($data);

          $data = array(
                          "type_activities"=>"Add computer type",
                          "created_by"=>$updateBy,
                          "other_id"=>$other_id
                       );

          $this->Admin->saveLog($data);

          } else { 
          $this->load->view('login');
        }
    }

    function Dtable_cmdb_computerType_ViewList()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          header('Content-Type: application/json');
          echo $this->Admin->Dtable_cmdb_computerType_ViewList();

          } else { 
          $this->load->view('login');
          }
    }

    function A_cmdb_computerType_details()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $other_id = $this->input->post('other_id');  
          $query = $this->Admin->A_cmdb_computerType_details($other_id);

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

    function A_cmdb_computerType_update()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $comptype_name = $this->input->post('comptype_name');

          $updateBy = $this->session->userdata('userid');
          date_default_timezone_set("Asia/Kuala_Lumpur");
          $timeReg =date("h:i:s");
          $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
          $datetime = $dateReg.' '.$timeReg;

           // auto create id : random id
          $other_id = $this->input->post('other_id');

          $data = array(
                          'computer_type'=> $comptype_name,
                          'changed'=> $datetime
                       );

          $this->Admin->A_cmdb_computerType_update($data,$other_id);

          $data = array(
                          "type_activities"=>"Add computer Type",
                          "created_by"=>$updateBy,
                          "other_id"=>$other_id
                       );

          $this->Admin->saveLog($data);

          } else { 
          $this->load->view('login');
        }
    }
/* END */



/* START LOCATION */
  public function A_cmdb_location_add()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'admin_cmdb_location';
        $this->load->view('template/header/header');
        $this->load->view('template/body/A_cmdb_location_add/A_cmdb_location_add',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  public function CMDB_Location_process()
  { 

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        
        $level = $this->input->post('level');
        $department = $this->input->post('department');
        $room_name = $this->input->post('room_name');
        $LOC_name = $this->input->post('LOC_name');
        $LOC_deployment_state = $this->input->post('LOC_deployment_state');
        $LOC_incident_state = $this->input->post('LOC_incident_state');
        $LOC_type = $this->input->post('LOC_type');
        $LOC_phone = $this->input->post('LOC_phone');
        $LOC_address = $this->input->post('LOC_address');
        $LOC_city = $this->input->post('LOC_city');
        $LOC_state = $this->input->post('LOC_state');
        $LOC_country = $this->input->post('LOC_country');
        $LOC_validity = $this->input->post('LOC_validity');

          //default data 
        $updateBy = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date 


        // auto create id : random id
        $other_id = rand();

        // 1 insert baru akan di generate random id - other_id
        // untuk trace 2 table iaitu table data dan table log actvities
        // bila berlaku masalah kita akan check dekat table data dan amk id - other id
        // check balik dekat log activiti guna other_id

        $data = array(  "name"=>$LOC_name,
                        "level"=>$level,
                        "department"=>$department,
                        "room_name"=>$room_name,
                        "deployment_state"=>$LOC_deployment_state,
                        "incident_state"=>$LOC_incident_state,
                        "type"=>$LOC_type,
                        "phone"=>$LOC_phone,
                        "address"=>$LOC_address,
                        "city"=>$LOC_city,
                        "state"=>$LOC_state,
                        "country"=>$LOC_country,
                        "validity"=>$LOC_validity,
                        "created"=>$datetime, 
                        "other_id"=>$other_id
                      );

        // create function dekat model 
        $save = $this->Admin->SimpanDataLocation($data);


        //code untuk save log
        //fungsi untuk trace activiti user
        $data = array(
                        "type_activities"=>"Add Location ",
                        "created_by"=>$updateBy,
                        "other_id"=>$other_id
                      );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }

  function CMDB_Location_update()
  { 

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $level = $this->input->post('level');
        $department = $this->input->post('department');
        $room_name = $this->input->post('room_name');
        $LOC_name = $this->input->post('LOC_name'); //room id
        $LOC_deployment_state = $this->input->post('LOC_deployment_state');
        $LOC_incident_state = $this->input->post('LOC_incident_state');
        $LOC_type = $this->input->post('LOC_type');
        $LOC_phone = $this->input->post('LOC_phone');
        $LOC_address = $this->input->post('LOC_address');
        $LOC_city = $this->input->post('LOC_city');
        $LOC_state = $this->input->post('LOC_state');
        $LOC_country = $this->input->post('LOC_country');
        $LOC_validity = $this->input->post('LOC_validity');

          //default data 
        $updateBy = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date 

        // get id from post 
        $other_id = $this->input->post('other_id'); 

         $data = array( "name"=>$LOC_name,
                        "level"=>$level,
                        "department"=>$department,
                        "room_name"=>$room_name,
                        "deployment_state"=>$LOC_deployment_state,
                        "incident_state"=>$LOC_incident_state,
                        "type"=>$LOC_type,
                        "phone"=>$LOC_phone,
                        "address"=>$LOC_address,
                        "city"=>$LOC_city,
                        "state"=>$LOC_state,
                        "country"=>$LOC_country,
                        "validity"=>$LOC_validity,
                        "changed"=>$datetime, 
                      );

        // create function dekat model  & bawa data & id
        $save = $this->Admin->UpdateDataLocation($data,$other_id);

         //code untuk save log
        //fungsi untuk trace activiti user
        $data = array(
                        "type_activities"=>"CMDB Update Location ", //tukar instruction
                        "created_by"=>$updateBy,
                        "other_id"=>$other_id
                      );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  } 

   public function A_cmdb_location_viewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'a_cmdb_loc_viewList';
        $this->load->view('template/header/header');
        $this->load->view('template/body/A_cmdb_location_viewList/A_cmdb_location_viewList',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }
  }
    

  function Dtable_CMDB_Location_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_CMDB_Location_ViewList(); //create function model

        } else { 
          $this->load->view('login');
        }
  }

  function Delete_CMDB_Location_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $other_id = $this->input->post('other_id');
        $delete = $this->Admin->Delete_CMDB_Location_ViewList($other_id);

        } else { 
          $this->load->view('login');
        }
  }

  public function A_cmdb_location_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'a_cmdb_loc_editDetails';
        $this->load->view('template/header/header');
        $this->load->view('template/body/A_cmdb_location_EditDetails/A_cmdb_location_EditDetails',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }
  }

  function cmdb_location_details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $other_id = $this->input->post('other_id');  // amik param yg kita post dekat view tadi
        $query = $this->Admin->cmdb_location_details($other_id); //declare nama model dan letak parameter dalam kurungan

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


/* START LOCATION TYPE */    
    public function A_cmdb_locationType_add()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'A_cmdb_locationType_add';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_locationType_add/A_cmdb_locationType_add',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
        }

    }

    public function A_cmdb_locationType_viewlist()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'A_cmdb_locationType_viewlist';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_locationType_viewlist/A_cmdb_locationType_viewlist',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
          }

    }

    public function A_cmdb_locationType_EditDetails()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'A_cmdb_locationType_EditDetails';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_locationType_EditDetails/A_cmdb_locationType_EditDetails',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
          }

    }

    function A_cmdb_locationType_addData()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $loctype_name = $this->input->post('loctype_name');
          $updateBy = $this->session->userdata('userid');
          date_default_timezone_set("Asia/Kuala_Lumpur");
          $timeReg =date("h:i:s");
          $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
          $datetime = $dateReg.' '.$timeReg;

          $other_id = rand();

          $data = array(
                          'location_type'=> $loctype_name,
                          'created'=> $datetime,
                          'other_id'=>$other_id
                       );
          
          $this->Admin->A_cmdb_locationType_addData($data);

          $data = array(
                          "type_activities"=>"Add location type",
                          "created_by"=>$updateBy,
                          "other_id"=>$other_id
                       );

          $this->Admin->saveLog($data);

          } else { 
          $this->load->view('login');
          }
    }

    function Dtable_cmdb_locationType_ViewList()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          header('Content-Type: application/json');
          echo $this->Admin->Dtable_cmdb_locationType_ViewList();

          } else { 
          $this->load->view('login');
          }
    }

    function A_cmdb_locationType_details()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $other_id = $this->input->post('other_id');  
          $query = $this->Admin->A_cmdb_locationType_details($other_id);

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

    function A_cmdb_locationType_update()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $loctype_name = $this->input->post('loctype_name');
          $updateBy = $this->session->userdata('userid');
          date_default_timezone_set("Asia/Kuala_Lumpur");
          $timeReg =date("h:i:s");
          $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
          $datetime = $dateReg.' '.$timeReg;

           // auto create id : random id
          $other_id = $this->input->post('other_id');

          $data = array(
                          'location_type'=> $loctype_name,
                          'changed'=> $datetime
                       );

          $this->Admin->A_cmdb_locationType_update($data,$other_id);

          $data = array(
                          "type_activities"=>"Add location Type",
                          "created_by"=>$updateBy,
                          "other_id"=>$other_id
                       );

          $this->Admin->saveLog($data);

          } else { 
          $this->load->view('login');
        }
    }
/* END */


/* START NETWORK*/
    public function A_cmdb_network_add()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'admin_cmdb_network';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_network_add/A_cmdb_network_add',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
        }

    }

      public function CMDB_Network_process()
    { 

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $NW_name = $this->input->post('NW_name');
          $NW_deployment_state = $this->input->post('NW_deployment_state');
          $NW_incident_state = $this->input->post('NW_incident_state');
          $NW_description = $this->input->post('NW_description');
          $NW_type = $this->input->post('NW_type');
          $NW_lvno = $this->input->post('NW_lvno');
          $NW_psno = $this->input->post('NW_psno');
          $NW_bsno = $this->input->post('NW_bsno');
          $NW_dqno = $this->input->post('NW_dqno');
          $NW_sno = $this->input->post('NW_sno');
          $NW_ps = $this->input->post('NW_ps');
          $NW_bs = $this->input->post('NW_bs');
          $NW_location = $this->input->post('NW_location');
          $NW_validity = $this->input->post('NW_validity');

          $NW_ip = $this->input->post('NW_ip');

          //default data 
          $updateBy = $this->session->userdata('userid'); // id yang login system
          date_default_timezone_set("Asia/Kuala_Lumpur");
          $timeReg =date("h:i:s");
          $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
          $datetime = $dateReg.' '.$timeReg; //current date 

          // auto create id : random id
          $other_id = rand();


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


          $data = array(  "name"=>$NW_name,
                          "deployment_state"=>$NW_deployment_state,
                          "incident_state"=>$NW_incident_state,
                          "description"=>$NW_description,
                          "type"=>$NW_type,
                          "lv_no"=>$NW_lvno,
                          "ps_no"=>$NW_psno,
                          "bs_no"=>$NW_bsno,
                          "dq_no"=>$NW_dqno,
                          "service_number"=>$NW_sno,
                          "networkAddress_ps"=>$NW_ps,
                          "networkAddress_bs"=>$NW_bs,
                          "location"=>$NW_location,
                          "validity"=>$NW_validity,
                          "created"=>$datetime, 
                          "other_id"=>$other_id,
                          "ip"=>$NW_ip,
                          "qr_code"=>$random_name,
                          "config_id"=>$config_id
                        );

          // create function dekat model 
          $save = $this->Admin->SimpanDataNetwork($data);

           //code untuk save log
          //fungsi untuk trace activiti user
          $data = array(
                          "type_activities"=>"Add Network ",
                          "created_by"=>$updateBy,
                          "other_id"=>$other_id
                        );

          $this->Admin->saveLog($data);

          } else { 
          $this->load->view('login');
        }
    } 


    //create function update 
    function CMDB_Network_update()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $NW_name = $this->input->post('NW_name');
          $NW_deployment_state = $this->input->post('NW_deployment_state');
          $NW_incident_state = $this->input->post('NW_incident_state');
          $NW_description = $this->input->post('NW_description');
          $NW_type = $this->input->post('NW_type');
          $NW_lvno = $this->input->post('NW_lvno');
          $NW_psno = $this->input->post('NW_psno');
          $NW_bsno = $this->input->post('NW_bsno');
          $NW_dqno = $this->input->post('NW_dqno');
          $NW_sno = $this->input->post('NW_sno');
          $NW_ps = $this->input->post('NW_ps');
          $NW_bs = $this->input->post('NW_bs');
          $NW_location = $this->input->post('NW_location');
          $NW_validity = $this->input->post('NW_validity');

          $NW_ip = $this->input->post('NW_ip');

          //default data 
          $updateBy = $this->session->userdata('userid'); // id yang login system
          date_default_timezone_set("Asia/Kuala_Lumpur");
          $timeReg =date("h:i:s");
          $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
          $datetime = $dateReg.' '.$timeReg; //current date 

          // get id from post 
          $other_id = $this->input->post('other_id'); 

          $data = array(  "name"=>$NW_name,
                          "ip"=>$NW_ip,
                          "deployment_state"=>$NW_deployment_state,
                          "incident_state"=>$NW_incident_state,
                          "description"=>$NW_description,
                          "type"=>$NW_type,
                          "lv_no"=>$NW_lvno,
                          "ps_no"=>$NW_psno,
                          "bs_no"=>$NW_bsno,
                          "dq_no"=>$NW_dqno,
                          "service_number"=>$NW_sno,
                          "networkAddress_ps"=>$NW_ps,
                          "networkAddress_bs"=>$NW_bs,
                          "location"=>$NW_location,
                          "validity"=>$NW_validity,
                          "changed"=>$datetime
                        );

          // create function dekat model  & bawa data & id
          $save = $this->Admin->UpdateDataNetwork($data,$other_id);

           //code untuk save log
          //fungsi untuk trace activiti user
          $data = array(
                          "type_activities"=>"CMDB Update Network ", //tukar instruction
                          "created_by"=>$updateBy,
                          "other_id"=>$other_id
                        );

          $this->Admin->saveLog($data);

          } else { 
          $this->load->view('login');
          }
    } 

    public function A_cmdb_network_viewList()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'admin_cmdb_ntw_viewList';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_network_viewList/A_cmdb_network_viewList',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
          }
    }
    
    function Dtable_CMDB_Network_ViewList()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          header('Content-Type: application/json');
          echo $this->Admin->Dtable_CMDB_Network_ViewList(); //create function model

          } else { 
          $this->load->view('login');
          }
    }

    function Delete_CMDB_Network_ViewList()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $other_id = $this->input->post('other_id');
          $delete = $this->Admin->Delete_CMDB_Network_ViewList($other_id);

          } else { 
          $this->load->view('login');
          }
    }

    public function A_cmdb_network_EditDetails()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'admin_cmdb_ntw_editDetails';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_network_EditDetails/A_cmdb_network_EditDetails',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
          }

    }

    function cmdb_network_details()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $other_id = $this->input->post('other_id');  // amik param yg kita post dekat view tadi
          $query = $this->Admin->cmdb_network_details($other_id); //declare nama model dan letak parameter dalam kurungan

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


/* START NETWORK TYPE */    
    public function A_cmdb_networkType_add()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'A_cmdb_networkType';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_networkType_add/A_cmdb_networkType_add',$this->data);
          $this->load->view('template/footer/footer');


          } else { 
          $this->load->view('login');
          }
    }

    public function A_cmdb_networkType_viewlist()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'A_cmdb_networkType_viewlist';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_networkType_viewlist/A_cmdb_networkType_viewlist',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
          }
    }

    public function A_cmdb_networkType_EditDetails()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'A_cmdb_networkType_EditDetails';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_networkType_EditDetails/A_cmdb_networkType_EditDetails',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
          }
      }


    function A_cmdb_networkType_addData()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $ntype_name = $this->input->post('ntype_name');

          $updateBy = $this->session->userdata('userid');
          date_default_timezone_set("Asia/Kuala_Lumpur");
          $timeReg =date("h:i:s");
          $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
          $datetime = $dateReg.' '.$timeReg;

          $other_id = rand();

          $data = array(
                          'network_type'=> $ntype_name,
                          'created'=> $datetime,
                          'other_id'=>$other_id
                       );
          
          $this->Admin->A_cmdb_networkType_addData($data);

          $data = array(
                          "type_activities"=>"Add network type",
                          "created_by"=>$updateBy,
                          "other_id"=>$other_id
                       );

          $this->Admin->saveLog($data);

          } else { 
          $this->load->view('login');
        }
    }

    function Dtable_cmdb_networkType_ViewList()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          header('Content-Type: application/json');
          echo $this->Admin->Dtable_cmdb_networkType_ViewList();

          } else { 
          $this->load->view('login');
        }
    }

    function A_cmdb_networkType_details()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $other_id = $this->input->post('other_id');  
          $query = $this->Admin->A_cmdb_networkType_details($other_id);

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

    function A_cmdb_networkType_update()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $ntype_name = $this->input->post('ntype_name');
          $updateBy = $this->session->userdata('userid');
          date_default_timezone_set("Asia/Kuala_Lumpur");
          $timeReg =date("h:i:s");
          $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
          $datetime = $dateReg.' '.$timeReg;

           // auto create id : random id
          $other_id = $this->input->post('other_id');

          $data = array(
                          'network_type'=> $ntype_name,
                          'changed'=> $datetime
                       );

          $this->Admin->A_cmdb_networkType_update($data,$other_id);

          $data = array(
                          "type_activities"=>"Add network Type",
                          "created_by"=>$updateBy,
                          "other_id"=>$other_id
                       );

          $this->Admin->saveLog($data);

          } else { 
          $this->load->view('login');
          }
    }
/* END */


/* START HARDWARE*/
  public function A_cmdb_hardware_add()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'admin_cmdb_hardware';
        $this->load->view('template/header/header');
        $this->load->view('template/body/A_cmdb_hardware_add/A_cmdb_hardware_add',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  public function CMDB_Hardware_process()
  { 

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $HW_name = $this->input->post('HW_name');
        $HW_deployment_state = $this->input->post('HW_deployment_state');
        $HW_incident_state = $this->input->post('HW_incident_state');
        $HW_vendor = $this->input->post('HW_vendor');
        $HW_model = $this->input->post('HW_model');
        $HW_description = $this->input->post('HW_description');
        $HW_type = $this->input->post('HW_type');
        $HW_owner = $this->input->post('HW_owner');
        $HW_SerialNo = $this->input->post('HW_SerialNo');
        $HW_WAD = $this->input->post('HW_WAD');
        $HW_InstallDate = $this->input->post('HW_InstallDate');
        $HW_notes = $this->input->post('HW_notes');
        $HW_location = $this->input->post('HW_location');
        $HW_validity = $this->input->post('HW_validity');
        $HW_brand = $this->input->post('HW_brand');
        $Hardware_mac = $this->input->post('Hardware_mac');

        $Hardware_ip = $this->input->post('Hardware_ip');
        $network_port = $this->input->post('network_port');
        $Firmware_Version = $this->input->post('Firmware_Version');

        //default data 
        $updateBy = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date 

        // auto create id : random id
        $other_id = rand();

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


        $data = array(  "name"=>$HW_name,
                        "ip_address"=>$Hardware_ip,
                        "network_port"=>$network_port,
                        "firmware_version"=>$Firmware_Version,
                        "deployment_state"=>$HW_deployment_state,
                        "incident_state"=>$HW_incident_state,
                        "vendor"=>$HW_vendor,
                        "model"=>$HW_model,
                        "description"=>$HW_description,
                        "type"=>$HW_type,
                        "owner"=>$HW_owner,
                        "serial_number"=>$HW_SerialNo,
                        "warranty_expiration_date"=>$HW_WAD,
                        "install_date"=>$HW_InstallDate,
                        "note"=>$HW_notes,
                        "location"=>$HW_location,
                        "validity"=>$HW_validity,
                        "created"=>$datetime, 
                        "other_id"=>$other_id,
                        "qr_code"=>$random_name,
                        "config_id"=>$config_id,
                        "brand"=>$HW_brand,
                        "mac_addr"=>$Hardware_mac
                      );

        // create function dekat model 
        $save = $this->Admin->SimpanDataHardware($data);

        //code untuk save log
        //fungsi untuk trace activiti user
        $data = array(
                        "type_activities"=>"Add Hardware ",
                        "created_by"=>$updateBy,
                        "other_id"=>$other_id
                      );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }


  function CMDB_Hardware_update()
  { 

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $HW_name = $this->input->post('HW_name');
        $HW_deployment_state = $this->input->post('HW_deployment_state');
        $HW_incident_state = $this->input->post('HW_incident_state');
        $HW_vendor = $this->input->post('HW_vendor');
        $HW_model = $this->input->post('HW_model');
        $HW_description = $this->input->post('HW_description');
        $HW_type = $this->input->post('HW_type');
        $HW_owner = $this->input->post('HW_owner');
        $HW_SerialNo = $this->input->post('HW_SerialNo');
        $HW_WAD = $this->input->post('HW_WAD');
        $HW_InstallDate = $this->input->post('HW_InstallDate');
        $HW_notes = $this->input->post('HW_notes');
        $HW_location = $this->input->post('HW_location');
        $HW_validity = $this->input->post('HW_validity');


        //default data 
        $updateBy = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date 


        // auto create id : random id
        $other_id = $this->input->post('other_id');


        $Hardware_ip = $this->input->post('Hardware_ip');
        $network_port = $this->input->post('network_port');
        $Firmware_Version = $this->input->post('Firmware_Version');
        $Hardware_mac = $this->input->post('Hardware_mac');


        $HW_brand = $this->input->post('HW_brand');

        // ini adalah data yang kau nak update 
        $data = array(  "name"=>$HW_name,
                        "ip_address"=>$Hardware_ip,
                        "network_port"=>$network_port,
                        "firmware_version"=>$Firmware_Version,
                        "deployment_state"=>$HW_deployment_state,
                        "incident_state"=>$HW_incident_state,
                        "vendor"=>$HW_vendor,
                        "model"=>$HW_model,
                        "description"=>$HW_description,
                        "type"=>$HW_type,
                        "owner"=>$HW_owner,
                        "serial_number"=>$HW_SerialNo,
                        "warranty_expiration_date"=>$HW_WAD,
                        "install_date"=>$HW_InstallDate,
                        "note"=>$HW_notes,
                        "location"=>$HW_location,
                        "validity"=>$HW_validity,
                        "changed"=>$datetime, 
                        "brand"=>$HW_brand,
                        "mac_addr"=>$Hardware_mac
                      );

        // var_dump($data);
        // exit();

        // create function dekat model 
        $save = $this->Admin->UpdateDataHardware($data,$other_id); // ini adalah fungsi yg akan buat proses

       //code untuk save log
        //fungsi untuk trace activiti user
        $data = array(
                        "type_activities"=>"CMDB Update Hardware ",
                        "created_by"=>$updateBy,
                        "other_id"=>$other_id
                      );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }

 public function A_cmdb_hardware_viewlist()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'a_cmdb_hw_viewlist';
        $this->load->view('template/header/header');
        $this->load->view('template/body/A_cmdb_hardware_viewlist/A_cmdb_hardware_viewlist',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }
  }

  function Dtable_CMDB_Hardware_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_CMDB_Hardware_ViewList(); //create function model

        } else { 
          $this->load->view('login');
        }
  }

  function Delete_CMDB_Hardware_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $other_id = $this->input->post('other_id');
        $delete = $this->Admin->Delete_CMDB_Hardware_ViewList($other_id);

        } else { 
          $this->load->view('login');
        }
  }

  public function A_cmdb_hardware_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'a_cmdb_hw_editDetails';
        $this->load->view('template/header/header');
        $this->load->view('template/body/A_cmdb_hardware_EditDetails/A_cmdb_hardware_EditDetails',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }
  }

  function cmdb_hardware_details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $other_id = $this->input->post('other_id');  // amik param yg kita post dekat view tadi
        $query = $this->Admin->cmdb_hardware_details($other_id); //declare nama model dan letak parameter dalam kurungan

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


/* START HARDWARE TYPE */    
   public function A_cmdb_hardwareType_add()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'A_cmdb_hardwareType';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_hardwareType_add/A_cmdb_hardwareType_add',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
          }

    }

    public function A_cmdb_hardwareType_viewlist()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'A_cmdb_hardwareType_viewlist';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_hardwareType_viewlist/A_cmdb_hardwareType_viewlist',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
          }

    }

    public function A_cmdb_hardwareType_EditDetails()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'A_cmdb_hardwareType_EditDetails';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_hardwareType_EditDetails/A_cmdb_hardwareType_EditDetails',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
          }
    }


    function A_cmdb_hardwareType_addData()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $hwtype_name = $this->input->post('hwtype_name');
          $updateBy = $this->session->userdata('userid');
          date_default_timezone_set("Asia/Kuala_Lumpur");
          $timeReg =date("h:i:s");
          $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
          $datetime = $dateReg.' '.$timeReg;

          $other_id = rand();

          $data = array(
                          'hardware_type'=> $hwtype_name,
                          'created'=> $datetime,
                          'other_id'=>$other_id
                       );
          
          $this->Admin->A_cmdb_hardwareType_addData($data);

          $data = array(
                          "type_activities"=>"Add hardware type",
                          "created_by"=>$updateBy,
                          "other_id"=>$other_id
                       );

          $this->Admin->saveLog($data);

          } else { 
          $this->load->view('login');
          }
    }

    function Dtable_cmdb_hardwareType_ViewList()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          header('Content-Type: application/json');
          echo $this->Admin->Dtable_cmdb_hardwareType_ViewList();

          } else { 
          $this->load->view('login');
          }
    }

    function A_cmdb_hardwareType_details()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $other_id = $this->input->post('other_id');  
          $query = $this->Admin->A_cmdb_hardwareType_details($other_id);

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

    function A_cmdb_hardwareType_update()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $hwtype_name = $this->input->post('hwtype_name');
          $updateBy = $this->session->userdata('userid');
          date_default_timezone_set("Asia/Kuala_Lumpur");
          $timeReg =date("h:i:s");
          $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
          $datetime = $dateReg.' '.$timeReg;

           // auto create id : random id
          $other_id = $this->input->post('other_id');

          $data = array(
                          'hardware_type'=> $hwtype_name,
                          'changed'=> $datetime
                       );

          $this->Admin->A_cmdb_hardwareType_update($data,$other_id);

          $data = array(
                          "type_activities"=>"Add Hardware Type",
                          "created_by"=>$updateBy,
                          "other_id"=>$other_id
                       );

          $this->Admin->saveLog($data);

          } else { 
          $this->load->view('login');
          }
    }
/* END */


/* START SOFTWARE */
  public function A_cmdb_software_add()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'admin_cmdb_software';
        $this->load->view('template/header/header');
        $this->load->view('template/body/A_cmdb_software_add/A_cmdb_software_add',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }
  }

  public function Software_process()
  { 

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $SW_name = $this->input->post('SW_name');
        $SW_deployment_state = $this->input->post('SW_deployment_state');
        $SW_incident_state = $this->input->post('SW_incident_state');
        $SW_vendor = $this->input->post('SW_vendor');
        $SW_version = $this->input->post('SW_version');
        $SW_description = $this->input->post('SW_description');
        $SW_type = $this->input->post('SW_type');
        $SW_owner = $this->input->post('SW_owner');
        $SW_SerialNo = $this->input->post('SW_SerialNo');
        $SW_LType = $this->input->post('SW_LType');
        $SW_LKey = $this->input->post('SW_LKey');
        $SW_media = $this->input->post('SW_media');
        $SW_notes = $this->input->post('SW_notes');
        $SW_location = $this->input->post('SW_location');
        $SW_validity = $this->input->post('SW_validity');

          //default data 
        $updateBy = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date 

        // auto create id : random id
        $other_id = rand();
        

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

      
        $data = array(  "name"=>$SW_name,
                        "deployment_state"=>$SW_deployment_state,
                        "incident_state"=>$SW_incident_state,
                        "vendor"=>$SW_vendor,
                        "version"=>$SW_version,
                        "description"=>$SW_description,
                        "type"=>$SW_type,
                        "owner"=>$SW_owner,
                        "serial_number"=>$SW_SerialNo,
                        "license_type"=>$SW_LType,
                        "license_key"=>$SW_LKey,
                        "media"=>$SW_media,
                        "note"=>$SW_notes,
                        "location"=>$SW_location,
                        "validity"=>$SW_validity,
                        "created"=>$datetime, 
                        "other_id"=>$other_id,
                        "qr_code"=>$random_name,
                        "config_id"=>$config_id
                      );

        // create function dekat model 
        $save = $this->Admin->SimpanDataSoftware($data);


        //code untuk save log
        //fungsi untuk trace activiti user
        $data = array(
                        "type_activities"=>"Add Software",
                        "created_by"=>$updateBy,
                        "other_id"=>$other_id
                      );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }

  }

  function CMDB_Software_update()
  { 

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $SW_name = $this->input->post('SW_name');
        $SW_deployment_state = $this->input->post('SW_deployment_state');
        $SW_incident_state = $this->input->post('SW_incident_state');
        $SW_vendor = $this->input->post('SW_vendor');
        $SW_version = $this->input->post('SW_version');
        $SW_description = $this->input->post('SW_description');
        $SW_type = $this->input->post('SW_type');
        $SW_owner = $this->input->post('SW_owner');
        $SW_SerialNo = $this->input->post('SW_SerialNo');
        $SW_LType = $this->input->post('SW_LType');
        $SW_LKey = $this->input->post('SW_LKey');
        $SW_media = $this->input->post('SW_media');
        $SW_notes = $this->input->post('SW_notes');
        $SW_location = $this->input->post('SW_location');
        $SW_validity = $this->input->post('SW_validity');

          //default data 
        $updateBy = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date 

        // auto create id : random id
        $other_id = $this->input->post('other_id');

        // ini adalah data yang kau nak update 
        $data = array(  "name"=>$SW_name,
                        "deployment_state"=>$SW_deployment_state,
                        "incident_state"=>$SW_incident_state,
                        "vendor"=>$SW_vendor,
                        "version"=>$SW_version,
                        "description"=>$SW_description,
                        "type"=>$SW_type,
                        "owner"=>$SW_owner,
                        "serial_number"=>$SW_SerialNo,
                        "license_type"=>$SW_LType,
                        "license_key"=>$SW_LKey,
                        "media"=>$SW_media,
                        "note"=>$SW_notes,
                        "location"=>$SW_location,
                        "validity"=>$SW_validity,
                        "changed"=>$datetime, // kita letak tarikh 
                        // jangan update sekali nga id sebab id tu jadikan 
                      );

        // create function dekat model 
        $save = $this->Admin->UpdateDataSoftware($data,$other_id); // ini adalah fungsi yg akan buat proses

         //code untuk save log
        //fungsi untuk trace activiti user
        $data = array(
                        "type_activities"=>"Update Software ", // ubah apa aktiviti dia
                        "created_by"=>$updateBy,
                        "other_id"=>$other_id
                      );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }


  public function A_cmdb_software_viewlist()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'admin_cmdb_sw_viewlist';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_software_viewlist/A_cmdb_software_viewlist',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
          }

    }

  function Dtable_CMDB_Software_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_CMDB_Software_ViewList(); //create function model

        } else { 
          $this->load->view('login');
        }
  }

  function Delete_CMDB_Software_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $other_id = $this->input->post('other_id');
        $delete = $this->Admin->Delete_CMDB_Software_ViewList($other_id);

        } else { 
          $this->load->view('login');
        }
  }

  public function A_cmdb_software_EditDetails()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'a_cmdb_sw_editdetails';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_software_EditDetails/A_cmdb_software_EditDetails',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
          }

    }

  function cmdb_software_details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $other_id = $this->input->post('other_id');  // amik param yg kita post dekat view tadi
        $query = $this->Admin->cmdb_software_details($other_id); //declare nama model dan letak parameter dalam kurungan

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


/* START SOFTWARE TYPE */    
   public function A_cmdb_softwareType_add()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'A_cmdb_softwareType_add';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_softwareType_add/A_cmdb_softwareType_add',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
          }
    }

    public function A_cmdb_softwareType_viewlist()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'A_cmdb_softwareType_viewlist';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_softwareType_viewlist/A_cmdb_softwareType_viewlist',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
          }

    }

    public function A_cmdb_softwareType_EditDetails()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'A_cmdb_softwareType_EditDetails';
          $this->load->view('template/header/header');
          $this->load->view('template/body/A_cmdb_softwareType_EditDetails/A_cmdb_softwareType_EditDetails',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
          }
    }


    function A_cmdb_softwareType_addData()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $swtype_name = $this->input->post('swtype_name');
          $updateBy = $this->session->userdata('userid');
          date_default_timezone_set("Asia/Kuala_Lumpur");
          $timeReg =date("h:i:s");
          $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
          $datetime = $dateReg.' '.$timeReg;

          $other_id = rand();

          $data = array(
                          'software_type'=> $swtype_name,
                          'created'=> $datetime,
                          'other_id'=>$other_id
                       );
          
          $this->Admin->A_cmdb_softwareType_addData($data);

          $data = array(
                          "type_activities"=>"Add csoftware type",
                          "created_by"=>$updateBy,
                          "other_id"=>$other_id
                       );

          $this->Admin->saveLog($data);

          } else { 
          $this->load->view('login');
          }
    }

    function Dtable_cmdb_softwareType_ViewList()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          header('Content-Type: application/json');
          echo $this->Admin->Dtable_cmdb_softwareType_ViewList();

          } else { 
          $this->load->view('login');
          }
    }

    function A_cmdb_softwareType_details()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $other_id = $this->input->post('other_id');  
          $query = $this->Admin->A_cmdb_softwareType_details($other_id);

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

    function A_cmdb_softwareType_update()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $swtype_name = $this->input->post('swtype_name');
          $updateBy = $this->session->userdata('userid');
          date_default_timezone_set("Asia/Kuala_Lumpur");
          $timeReg =date("h:i:s");
          $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
          $datetime = $dateReg.' '.$timeReg;

           // auto create id : random id
          $other_id = $this->input->post('other_id');

          $data = array(
                          'software_type'=> $swtype_name,
                          'changed'=> $datetime
                       );

          $this->Admin->A_cmdb_softwareType_update($data,$other_id);

          $data = array(
                          "type_activities"=>"Add softwareType",
                          "created_by"=>$updateBy,
                          "other_id"=>$other_id
                       );

          $this->Admin->saveLog($data);

          } else { 
          $this->load->view('login');
          }
    }
/* END */


/* START CUSTOMER USER */
  public function Admin_CM_customerUser()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'Admin_CM_customerUser';
        $this->load->view('template/header/header');
        $this->load->view('template/body/Admin_CM_customerUser/Admin_CM_customerUser',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  public function CM_Customer_User_form()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $CU_title = $this->input->post('CU_title');
        $CU_FName = $this->input->post('CU_FName');
        $CU_LName = $this->input->post('CU_LName');
        $CU_UName = $this->input->post('CU_UName');
        $CU_pwd = $this->input->post('CU_pwd');
        $CU_email = $this->input->post('CU_email');
        $custID = $this->input->post('Cust_ID');
        $CU_Phone = $this->input->post('CU_Phone');
        $CU_fax = $this->input->post('CU_fax');
        $CU_mobile = $this->input->post('CU_mobile');
        $CU_street = $this->input->post('CU_street');
        $CU_postcode = $this->input->post('CU_postcode');
        $CU_city = $this->input->post('CU_city');
        $CU_country = $this->input->post('CU_country');
        $CU_comment = $this->input->post('CU_comment');
        $CU_valid = $this->input->post('CU_valid');

        //default data 
        $updateBy = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date 


        // auto create id : random id
        $other_id = rand();

        $data = array(  "title_salutation"=>$CU_title,
                        "first_name"=>$CU_FName,
                        "last_name"=>$CU_LName,
                        "username"=>$CU_UName,
                        "password"=>$CU_pwd,
                        "email"=>$CU_email,
                        "customerID"=>$custID,
                        "phone"=>$CU_Phone,
                        "fax"=>$CU_fax,
                        "mobile"=>$CU_mobile,
                        "street"=>$CU_street,
                        "postcode"=>$CU_postcode,
                        "city"=>$CU_city,
                        "country"=>$CU_country,
                        "comment"=>$CU_comment,
                        "valid"=>$CU_valid,
                        "created"=>$datetime, // tambah baru
                        "other_id"=>$other_id //tambah baru
                    );

        // create function dekat model 
        $save = $this->Admin->SimpanData_CM_CustomerUser($data);

        //code untuk save log
        //fungsi untuk trace activiti user
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

  function CM_CustomerUser_update()
  { 

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $CU_title = $this->input->post('CU_title');
        $CU_FName = $this->input->post('CU_FName');
        $CU_LName = $this->input->post('CU_LName');
        $CU_UName = $this->input->post('CU_UName');
        $CU_pwd = $this->input->post('CU_pwd');
        $CU_email = $this->input->post('CU_email');
        $custID = $this->input->post('Cust_ID');
        $CU_Phone = $this->input->post('CU_Phone');
        $CU_fax = $this->input->post('CU_fax');
        $CU_mobile = $this->input->post('CU_mobile');
        $CU_street = $this->input->post('CU_street');
        $CU_postcode = $this->input->post('CU_postcode');
        $CU_city = $this->input->post('CU_city');
        $CU_country = $this->input->post('CU_country');
        $CU_comment = $this->input->post('CU_comment');
        $CU_valid = $this->input->post('CU_valid');

        //default data 
        $updateBy = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date 

        // auto create id : random id
        $other_id = $this->input->post('other_id');

        // ini adalah data yang kau nak update 
        $data = array(  "title_salutation"=>$CU_title,
                        "first_name"=>$CU_FName,
                        "last_name"=>$CU_LName,
                        "username"=>$CU_UName,
                        "password"=>$CU_pwd,
                        "email"=>$CU_email,
                        "customerID"=>$custID,
                        "phone"=>$CU_Phone,
                        "fax"=>$CU_fax,
                        "mobile"=>$CU_mobile,
                        "street"=>$CU_street,
                        "postcode"=>$CU_postcode,
                        "city"=>$CU_city,
                        "country"=>$CU_country,
                        "comment"=>$CU_comment,
                        "valid"=>$CU_valid,
                        "changed"=>$datetime // kita letak tarikh kau changed 
                   ); // jangan update sekali nga id sebab id tu jadikan where sql

        // create function dekat model 
        $save = $this->Admin->UpdateDataCustomerUser($data,$other_id); // ini adalah fungsi yg akan buat proses

         //code untuk save log
        //fungsi untuk trace activiti user
        $data = array(
                        "type_activities"=>"Update Customer_User ", // ubah apa aktiviti dia
                        "created_by"=>$updateBy,
                        "other_id"=>$other_id
                      );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }

  public function Admin_CM_CU_viewlist()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'Admin_CM_CU_viewlist';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Admin_CM_CU_viewlist/Admin_CM_CU_viewlist',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
          }

    }

  function Dtable_CM_CustomerUser_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_CM_CustomerUser_ViewList(); //create function model

        } else { 
          $this->load->view('login');
        }
  }

  function Delete_CM_CustomerUser_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $other_id = $this->input->post('other_id');
        $delete = $this->Admin->Delete_CM_CustomerUser_ViewList($other_id);

        } else { 
          $this->load->view('login');
        }
  }

  public function Admin_CM_CU_editdetails()
    {

      $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'Admin_CM_CU_editdetails';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Admin_CM_CU_editdetails/Admin_CM_CU_editdetails',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
        }

    }

   function cm_customerUser_details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $other_id = $this->input->post('other_id');  // amik param yg kita post dekat view tadi
        $query = $this->Admin->cm_customerUser_details($other_id); //declare nama model dan letak parameter dalam kurungan

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


/* START CUSTOMER */
    public function Admin_CM_Customer()
    {

      $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'Admin_CM_Customer';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Admin_CM_Customer/Admin_CM_Customer',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
        }

    }

    public function CM_Customer_form()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $custID = $this->input->post('custID');
          $C_CustName = $this->input->post('C_CustName');
          $C_street = $this->input->post('C_street');
          $C_postcode = $this->input->post('C_postcode');
          $C_city = $this->input->post('C_city');
          $C_country = $this->input->post('C_country');
          $C_url = $this->input->post('C_url');
          $C_comment = $this->input->post('C_comment');
          $C_valid = $this->input->post('C_valid');

          //default data 
          $updateBy = $this->session->userdata('userid'); // id yang login system
          date_default_timezone_set("Asia/Kuala_Lumpur");
          $timeReg =date("h:i:s");
          $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
          $datetime = $dateReg.' '.$timeReg; //current date 

          // auto create id : random id
          $other_id = rand();

          $data = array(  "customerID"=>$custID,
                          "customer"=>$C_CustName,
                          "street"=>$C_street,
                          "postcode"=>$C_postcode,
                          "city"=>$C_city,
                          "country"=>$C_country,
                          "URL"=>$C_url,
                          "comment"=>$C_comment,
                          "valid"=>$C_valid,
                          "created"=>$datetime, 
                          "other_id"=>$other_id 
                        );

          // create function dekat model 
          $save = $this->Admin->SimpanDataCustomer($data);

          //code untuk save log
          //fungsi untuk trace activiti user
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


    function CM_Customer_update()
    {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $custID = $this->input->post('custID');
          $C_CustName = $this->input->post('C_CustName');
          $C_street = $this->input->post('C_street');
          $C_postcode = $this->input->post('C_postcode');
          $C_city = $this->input->post('C_city');
          $C_country = $this->input->post('C_country');
          $C_url = $this->input->post('C_url');
          $C_comment = $this->input->post('C_comment');
          $C_valid = $this->input->post('C_valid');

          //default data 
          $updateBy = $this->session->userdata('userid'); // id yang login system
          date_default_timezone_set("Asia/Kuala_Lumpur");
          $timeReg =date("h:i:s");
          $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
          $datetime = $dateReg.' '.$timeReg; //current date 


          // auto create id : random id
          $other_id = $this->input->post('other_id');

          // ini adalah data yang kau nak update 
          $data = array(  "customerID"=>$custID,
                            "customer"=>$C_CustName,
                            "street"=>$C_street,
                            "postcode"=>$C_postcode,
                            "city"=>$C_city,
                            "country"=>$C_country,
                            "URL"=>$C_url,
                            "comment"=>$C_comment,
                            "valid"=>$C_valid,
                            "changed"=>$datetime,  // kita letak tarikh kau changed  
                          ); // jangan update sekali nga id sebab id tu jadikan where sql

          // create function dekat model 
          $save = $this->Admin->UpdateDataCustomer($data,$other_id); // ini adalah fungsi yg akan buat proses

          //code untuk save log
          //fungsi untuk trace activiti user
          $data = array(
                          "type_activities"=>"Update Customer ", // ubah apa aktiviti dia
                          "created_by"=>$updateBy,
                          "other_id"=>$other_id
                        );

          $this->Admin->saveLog($data);

          } else { 
          $this->load->view('login');
          }
    }

    public function Admin_CM_C_viewlist()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'Admin_CM_C_viewlist';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Admin_CM_C_viewlist/Admin_CM_C_viewlist',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
          }

    }

    function Dtable_CM_Customer_ViewList()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          header('Content-Type: application/json');
          echo $this->Admin->Dtable_CM_Customer_ViewList(); //create function model

          } else { 
          $this->load->view('login');
          }
    }

    function Delete_CM_Customer_ViewList()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $other_id = $this->input->post('other_id');
          $delete = $this->Admin->Delete_CM_Customer_ViewList($other_id);

          } else { 
          $this->load->view('login');
          }
    }

   public function Admin_CM_C_editdetails()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'Admin_CM_C_editdetails';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Admin_CM_C_editdetails/Admin_CM_C_editdetails',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
          }

    }

    function cm_customer_details()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $other_id = $this->input->post('other_id');  // amik param yg kita post dekat view tadi
          $query = $this->Admin->cm_customer_details($other_id); //declare nama model dan letak parameter dalam kurungan

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


/* START TICKET TYPE */
  public function TS_ticketType_add()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_ticketType_add';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_ticketType_add/TS_ticketType_add',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  public function TS_ticketType_viewlist()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_ticketType_viewlist';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_ticketType_viewlist/TS_ticketType_viewlist',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  public function TS_ticketType_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_ticketType_EditDetails';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_ticketType_EditDetails/TS_ticketType_EditDetails',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function TS_ticketType_addData()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $tt_name = $this->input->post('tt_name');
        $tt_validity = $this->input->post('tt_validity');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = rand();

        $data = array(
                        'name'=> $tt_name,
                        'validity'=> $tt_validity,
                        'created'=> $datetime,
                        'default_id'=>$default_id
                     );
        $this->Admin->TS_ticketType_addData($data);

        $data = array(
                        "type_activities"=>"Add Ticket Type",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }

  function Dtable_ticketType_viewlist()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_ticketType_viewlist();

        } else { 
          $this->load->view('login');
        }
  }
  function TS_ticketType_details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $default_id = $this->input->post('default_id');  
        $query = $this->Admin->TS_ticketType_details($default_id);

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

  function TS_ticketType_update()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $tt_name = $this->input->post('tt_name');
        $tt_validity = $this->input->post('tt_validity');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = $this->input->post('default_id');

        $data = array(
                        'name'=> $tt_name,
                        'validity'=> $tt_validity,
                        'changed'=> $datetime
                     );
        $this->Admin->TS_ticketType_update($data,$default_id);

        $data = array(
                        "type_activities"=>"Update Ticket Type",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  } 
/* END */



/* START BACKUP TYPE */
  public function TS_backupType_add()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_backupType_add';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_backupType_add/TS_backupType_add',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  public function TS_backupType_viewlist()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_backupType_viewlist';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_backupType_viewlist/TS_backupType_viewlist',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  public function TS_backupType_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_backupType_EditDetails';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_backupType_EditDetails/TS_backupType_EditDetails',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function TS_backupType_addData()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $bt_name = $this->input->post('bt_name');
        $bt_validity = $this->input->post('bt_validity');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = rand();

        $data = array(
                        'name'=> $bt_name,
                        'validity'=> $bt_validity,
                        'created'=> $datetime,
                        'default_id'=>$default_id
                     );
        $this->Admin->TS_backupType_addData($data);

        $data = array(
                        "type_activities"=>"Add Ticket Type",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }

  function Dtable_backupType_viewlist()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_backupType_viewlist();

        } else { 
          $this->load->view('login');
        }
  }

  function TS_backupType_details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $default_id = $this->input->post('default_id');  
        $query = $this->Admin->TS_backupType_details($default_id);

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

  function TS_backupType_update()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $bt_name = $this->input->post('bt_name');
        $bt_validity = $this->input->post('bt_validity');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = $this->input->post('default_id');

        $data = array(
                        'name'=> $bt_name,
                        'validity'=> $bt_validity,
                        'changed'=> $datetime
                     );
        $this->Admin->TS_backupType_update($data,$default_id);

        $data = array(
                        "type_activities"=>"Update Backup Type",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  } 
/* END */



/* START MAIN LINE STATUS */
  public function TS_mainLineStatus_add()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_mainLineStatus_add';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_mainLineStatus_add/TS_mainLineStatus_add',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  public function TS_mainLineStatus_viewlist()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_mainLineStatus_viewlist';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_mainLineStatus_viewlist/TS_mainLineStatus_viewlist',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  public function TS_mainLineStatus_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_mainLineStatus_EditDetails';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_mainLineStatus_EditDetails/TS_mainLineStatus_EditDetails',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function TS_mainLineStatus_addData()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $ml_name = $this->input->post('ml_name');
        $ml_validity = $this->input->post('ml_validity');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = rand();

        $data = array(
                        'name'=> $ml_name,
                        'validity'=> $ml_validity,
                        'created'=> $datetime,
                        'default_id'=>$default_id
                     );
        $this->Admin->TS_mainLineStatus_addData($data);

        $data = array(
                        "type_activities"=>"Add main line status",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }

  function Dtable_mainLineStatus_viewlist()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_mainLineStatus_viewlist();

        } else { 
          $this->load->view('login');
        }
  }

  function TS_mainLineStatus_details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $default_id = $this->input->post('default_id');  
        $query = $this->Admin->TS_mainLineStatus_details($default_id);

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

  function TS_mainLineStatus_update()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $ml_name = $this->input->post('ml_name');
        $ml_validity = $this->input->post('ml_validity');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = $this->input->post('default_id');

        $data = array(
                        'name'=> $ml_name,
                        'validity'=> $ml_validity,
                        'changed'=> $datetime
                     );
        $this->Admin->TS_mainLineStatus_update($data,$default_id);

        $data = array(
                        "type_activities"=>"Update main line status",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  } 
/* END */



/* START TICKET STATE */
  public function TS_ticketState_add()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_ticketState_add';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_ticketState_add/TS_ticketState_add',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  public function TS_ticketState_viewlist()
  {

     $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_ticketState_viewlist';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_ticketState_viewlist/TS_ticketState_viewlist',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  public function TS_ticketState_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_ticketState_EditDetails';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_ticketState_EditDetails/TS_ticketState_EditDetails',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function TS_ticketState_addData()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $TS_name = $this->input->post('TS_name');
        $TS_state = $this->input->post('TS_state');
        $TS_validity = $this->input->post('TS_validity');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = rand();

        $data = array(
                        'state'=> $TS_name,
                        "state_type" => $TS_state, 
                        'validity'=> $TS_validity,
                        'created'=> $datetime,
                        'default_id'=>$default_id
                     );
        $this->Admin->TS_ticketState_addData($data);

        $data = array(
                        "type_activities"=>"Add ticket state",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }

  function Dtable_ticketState_viewlist()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_ticketState_viewlist();

        } else { 
          $this->load->view('login');
        }
  }

  function TS_ticketState_details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $default_id = $this->input->post('default_id');  
        $query = $this->Admin->TS_ticketState_details($default_id);

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

  function TS_ticketState_update()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $TS_name = $this->input->post('TS_name');
        $TS_state = $this->input->post('TS_state');
        $TS_validity = $this->input->post('TS_validity');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = $this->input->post('default_id');

        $data = array(
                        'state'=> $TS_name,
                        "state_type" => $TS_state, 
                        'validity'=> $TS_validity,
                        'changed'=> $datetime
                     );
        $this->Admin->TS_ticketState_update($data,$default_id);

        $data = array(
                        "type_activities"=>"Update ticket state",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  } 
/* END */



/* START TICKET STATE TYPE */
  public function TS_ticketStateType_add()
    {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

          $this->data['site_title'] = 'TS_ticketStateType_add';
          $this->load->view('template/header/header');
          $this->load->view('template/body/TS_ticketStateType_add/TS_ticketStateType_add',$this->data);
          $this->load->view('template/footer/footer');

          } else { 
          $this->load->view('login');
          }

    }

  public function TS_ticketStateType_viewlist()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_ticketStateType_viewlist';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_ticketStateType_viewlist/TS_ticketStateType_viewlist',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  public function TS_ticketStateType_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_ticketStateType_EditDetails';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_ticketStateType_EditDetails/TS_ticketStateType_EditDetails',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function TS_ticketStateType_addData()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $TST_name = $this->input->post('TST_name');
        $TST_validity = $this->input->post('TST_validity');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = rand();

        $data = array(
                        'name'=> $TST_name,
                        'validity'=> $TST_validity,
                        'created'=> $datetime,
                        'default_id'=>$default_id
                     );
        $this->Admin->TS_ticketStateType_addData($data);

        $data = array(
                        "type_activities"=>"Add ticket state type",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }

  function Dtable_ticketStateType_viewlist()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_ticketStateType_viewlist();

        } else { 
          $this->load->view('login');
        }
  }

  function TS_ticketStateType_details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $default_id = $this->input->post('default_id');  
        $query = $this->Admin->TS_ticketStateType_details($default_id);

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

  function TS_ticketStateType_update()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $TST_name = $this->input->post('TST_name');
        $TST_validity = $this->input->post('TST_validity');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = $this->input->post('default_id');

        $data = array(
                        'name'=> $TST_name,
                        'validity'=> $TST_validity,
                        'changed'=> $datetime
                     );
        $this->Admin->TS_ticketStateType_update($data,$default_id);

        $data = array(
                        "type_activities"=>"Update ticket state type",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  } 
/* END */

  function check_list_sla()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $service_id = $this->input->post('service_id');
        $query = $this->Admin->check_list_sla($service_id);
        echo json_encode($query);

        } else { 
          $this->load->view('login');
        }
  }


  function customer_services()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $service_id = $this->input->post('service_id');
        $customerID = $this->input->post('customerID');

        $check = $this->Admin->check_customer_services($customerID);

          if($check>0) // customer yg dah ada services
          {
            //echo 'ada';
            $update = $this->Admin->customer_services_update($service_id,$customerID);
          } else { //baru 
            //echo 'xda';
            $add = $this->Admin->customer_services_add($service_id,$customerID);
          }

        } else { 
          $this->load->view('login');
        }
  }

  function check_list_cust_serv()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $custID = $this->input->post('custID');
        $query = $this->Admin->check_list_cust_serv($custID);
        echo json_encode($query);

        } else { 
          $this->load->view('login');
        }
  }
  

  function customeruser_location()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $location_id = $this->input->post('location_id');
        $customerUser = $this->input->post('customerUser');

        $check = $this->Admin->check_customeruser_location($customerUser);

          if($check>0) // customer yg dah ada services
          {
            //echo 'ada';
            $update = $this->Admin->customeruser_location_update($location_id,$customerUser);
          } else { //baru 
            //echo 'xda';
            $add = $this->Admin->customer_location_add($location_id,$customerUser);
          }

        } else { 
          $this->load->view('login');
        }
  }

  function check_list_cust_location()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $custID = $this->input->post('custID');
        $query = $this->Admin->check_list_cust_location($custID);
        echo json_encode($query);

        } else { 
          $this->load->view('login');
        }
  }


  function Dtable_SLA_ViewList_Valid()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_SLA_ViewList_Valid();

        } else { 
          $this->load->view('login');
        }
  }

  function Dtable_HideShow_ViewList()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $filter = $this->input->post('filter');
        header('Content-Type: application/json');
        echo $this->Admin->Dtable_HideShow_ViewList($filter);

        } else { 
          $this->load->view('login');
        } 
  }

  function update_title_view()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $id = $this->input->post('id_title');
        $title = $this->input->post('title');
        $upate = $this->Admin->update_title_view($id,$title);

        } else { 
          $this->load->view('login');
        }

  }

  function update_hideshow()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $id = $this->input->post('id');
        $this->Admin->update_hideshow($id);

        } else { 
          $this->load->view('login');
        }

  }

  function check_list_hideshow()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {
  
        $query = $this->Admin->check_list_hideshow();
        echo json_encode($query);

        } else { 
          $this->load->view('login');
        }
  }



  /* START EMAIL POSTMASTER */
  public function A_email_postmaster_add()
  {

     $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'A_email_postmaster_add';
        $this->load->view('template/header/header');
        $this->load->view('template/body/A_email_postmaster_add/A_email_postmaster_add',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

 public function A_email_postmaster_viewlist()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'A_email_postmaster_viewlist';
        $this->load->view('template/header/header');
        $this->load->view('template/body/A_email_postmaster_viewlist/A_email_postmaster_viewlist',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  public function A_email_postmaster_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'A_email_postmaster_EditDetails';
        $this->load->view('template/header/header');
        $this->load->view('template/body/A_email_postmaster_EditDetails/A_email_postmaster_EditDetails',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function A_email_postmaster_addData()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $email_type = $this->input->post('email_type');
        $email_uname = $this->input->post('email_uname');
        $email_pwd = $this->input->post('email_pwd');
        //$email_pwd =  hash('sha256',$email_pwd);
        $email_host = $this->input->post('email_host');
        $email_imap = $this->input->post('email_imap');
        $email_queue = $this->input->post('email_queue');
        $email_validity = $this->input->post('email_validity');
        $email_comment = $this->input->post('email_comment');
        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = rand();

        $data = array(
                        'type'=> $email_type,
                        'username'=> $email_uname,
                        'password'=> $email_pwd,
                        'host'=>$email_host,
                        'imap'=> $email_imap,
                        'queue'=> $email_queue,
                        'validity'=> $email_validity,
                        'comment'=> $email_comment,
                        'created'=> $datetime,
                        'default_id'=>$default_id
                     );
        $this->Admin->A_email_postmaster_addData($data);

        $data = array(
                        "type_activities"=>"Add postmaster mail account",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }

  function Dtable_email_postmaster_viewlist()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_email_postmaster_viewlist();

        } else { 
          $this->load->view('login');
        }
  }

  function A_email_postmaster_details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $default_id = $this->input->post('default_id');  
        $query = $this->Admin->A_email_postmaster_details($default_id);

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

  function A_email_postmaster_update()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $email_type = $this->input->post('email_type');
        $email_uname = $this->input->post('email_uname');
        $email_pwd = $this->input->post('email_pwd');
        //$email_pwd =  hash('sha256',$email_pwd);
        $email_host = $this->input->post('email_host');
        $email_imap = $this->input->post('email_imap');
        $email_queue = $this->input->post('email_queue');
        $email_validity = $this->input->post('email_validity');
        $email_comment = $this->input->post('email_comment');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = $this->input->post('default_id');

        $data = array(
                        'type'=> $email_type,
                        'username'=> $email_uname,
                        'password'=> $email_pwd,
                        'host'=>$email_host,
                        'imap'=> $email_imap,
                        'queue'=> $email_queue,
                        'validity'=> $email_validity,
                        'comment'=> $email_comment,
                        'changed'=> $datetime,
                     );

        

        $this->Admin->A_email_postmaster_update($data,$default_id);

        $data = array(
                        "type_activities"=>"Update postmaster account",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  } 
/* END */


/* START EMAIL EMAIL ADDRESS */
  public function A_email_emailAddress_add()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'A_email_emailAddress_add';
        $this->load->view('template/header/header');
        $this->load->view('template/body/A_email_emailAddress_add/A_email_emailAddress_add',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

 public function A_email_emailAddress_viewlist()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'A_email_emailAddress_viewlist';
        $this->load->view('template/header/header');
        $this->load->view('template/body/A_email_emailAddress_viewlist/A_email_emailAddress_viewlist',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  public function A_email_emailAddress_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'A_email_emailAddress_EditDetails';
        $this->load->view('template/header/header');
        $this->load->view('template/body/A_email_emailAddress_EditDetails/A_email_emailAddress_EditDetails',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function A_email_emailAddress_addData()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $mail_email = $this->input->post('email');
        $mail_dname = $this->input->post('display_name');
        $mail_q = $this->input->post('queue');
        $mail_validity = $this->input->post('validity');
        $mail_comment = $this->input->post('comment');

        //default data 
        $updateBy = $this->session->userdata('userid'); // id yang login system
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date 

        // auto create id : random id
        $default_id = rand();

        $data = array(  

                        'email'=> $mail_email,
                        'display_name'=> $mail_dname,
                        'queue'=> $mail_q,
                        'validity'=> $mail_validity,
                        'comment'=> $mail_comment,
                        'created'=> $datetime,
                        'default_id'=>$default_id
                      );

        // create function dekat model 
        $save = $this->Admin->A_email_emailAddress_addData($data);

        $data = array(
                        "type_activities"=>"Add email address",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }

  function check_email_existing(){
    $email = $this->input->post('email');
    echo $this->Admin->check_email_existing($email);
  }

  function Dtable_email_emailAddress_viewlist()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_email_emailAddress_viewlist();

        } else { 
          $this->load->view('login');
        }
  }

  function A_email_emailAddress_details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $default_id = $this->input->post('default_id');  
        $query = $this->Admin->A_email_emailAddress_details($default_id);

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

  function A_email_emailAddress_update()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $mail_email = $this->input->post('email');
        $mail_dname = $this->input->post('display_name');
        $mail_q = $this->input->post('queue');
        $mail_validity = $this->input->post('validity');
        $mail_comment = $this->input->post('comment');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        // auto create id : random id
        $default_id = $this->input->post('default_id');

        $data = array(
                        'email'=> $mail_email,
                        'display_name'=> $mail_dname,
                        'queue'=> $mail_q,
                        'validity'=> $mail_validity,
                        'comment'=> $mail_comment,
                        'changed'=> $datetime
                     );
        $this->Admin->A_email_emailAddress_update($data,$default_id);

        $data = array(
                        "type_activities"=>"Update email address",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

      } else { 
          $this->load->view('login');
      }
  } 
/* END */

/* START QUEUE SETTING */
  public function TS_queue_add()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_queue_add';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_queue_add/TS_queue_add',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  public function TS_queue_viewlist()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_queue_viewlist';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_queue_viewlist/TS_queue_viewlist',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  public function TS_queue_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_queue_EditDetails';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_queue_EditDetails/TS_queue_EditDetails',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function TS_queue_addData()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $Q_name = $this->input->post('Q_name');
        $Q_group = $this->input->post('Q_group');
        $Q_validity = $this->input->post('Q_validity');
        $Q_comment = $this->input->post('Q_comment');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = rand();

        $data = array(
                        'name'=> $Q_name,
                        'group'=> $Q_group,
                        'validity'=> $Q_validity,
                        'comment'=> $Q_comment,
                        'created'=> $datetime,
                        'default_id'=>$default_id
                     );
        $this->Admin->TS_queue_addData($data);

        $data = array(
                        "type_activities"=>"Add queue",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }

  function Dtable_queue_viewlist()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_queue_viewlist();

        } else { 
          $this->load->view('login');
        }
  }

  function TS_queue_details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $default_id = $this->input->post('default_id');  
        $query = $this->Admin->TS_queue_details($default_id);

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

  function TS_queue_update()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $Q_name = $this->input->post('Q_name');
        $Q_group = $this->input->post('Q_group');
        $Q_validity = $this->input->post('Q_validity');
        $Q_comment = $this->input->post('Q_comment');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = $this->input->post('default_id');

        $data = array(
                        'name'=> $Q_name,
                        'group'=> $Q_group,
                        'validity'=> $Q_validity,
                        'comment'=> $Q_comment,
                        'changed'=> $datetime
                     );
        $this->Admin->TS_queue_update($data,$default_id);

        $data = array(
                        "type_activities"=>"Update queue",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  } 
/* END */



/* START CAUSE OF FAULT  */

  public function TS_CauseOfFault_add()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_CauseOfFault_add';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_CauseOfFault_add/TS_CauseOfFault_add',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  public function TS_CauseOfFault_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_CauseOfFault_EditDetails';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_CauseOfFault_EditDetails/TS_CauseOfFault_EditDetails',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  public function TS_CauseOfFault_viewlist()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_CauseOfFault_viewlist';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_CauseOfFault_viewlist/TS_CauseOfFault_viewlist',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function TS_CauseOfFault_addData()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $CFT_name = $this->input->post('CFT_name');
        $CFT_validity = $this->input->post('CFT_validity');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = rand();

        $data = array(
                        'name'=> $CFT_name,
                        'validity'=> $CFT_validity,
                        'created'=> $datetime,
                        'default_id'=>$default_id
                     );
        $this->Admin->TS_CauseOfFault_addData($data);

        $data = array(
                        "type_activities"=>"Add Cause Of Fault ",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }

  function Dtable_CauseOfFault_viewlist()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_CauseOfFault_viewlist();

        } else { 
          $this->load->view('login');
        }
  }

  function TS_CauseOfFault_details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $default_id = $this->input->post('default_id');  
        $query = $this->Admin->TS_CauseOfFault_details($default_id);

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

  function TS_CauseOfFault_update()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $CFT_name = $this->input->post('CFT_name');
        $CFT_validity = $this->input->post('CFT_validity');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = $this->input->post('default_id');

        $data = array(
                        'name'=> $CFT_name,
                        'validity'=> $CFT_validity,
                        'changed'=> $datetime
                     );
        $this->Admin->TS_CauseOfFault_update($data,$default_id);

        $data = array(
                        "type_activities"=>"Update Cause Of Fault",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  } 
/* END */


/* START PROBLEM DESCRIPTION */

  public function TS_ProblemDescription_add()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_ProblemDescription_add';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_ProblemDescription_add/TS_ProblemDescription_add',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }
  }

  public function TS_ProblemDescription_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_ProblemDescription_EditDetails';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_ProblemDescription_EditDetails/TS_ProblemDescription_EditDetails',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }
  }

  public function TS_ProblemDescription_viewlist()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_ProblemDescription_viewlist';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_ProblemDescription_viewlist/TS_ProblemDescription_viewlist',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function TS_ProblemDescription_addData()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $PD_name = $this->input->post('PD_name');
        $PD_validity = $this->input->post('PD_validity');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = rand();

        $data = array(
                        'name'=> $PD_name,
                        'validity'=> $PD_validity,
                        'created'=> $datetime,
                        'default_id'=>$default_id
                     );
        $this->Admin->TS_ProblemDescription_addData($data);

        $data = array(
                        "type_activities"=>"Add Problem Description",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }

  function Dtable_ProblemDescription_viewlist()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_ProblemDescription_viewlist();

        } else { 
          $this->load->view('login');
        }
  }

  function TS_ProblemDescription_details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $default_id = $this->input->post('default_id');  
        $query = $this->Admin->TS_ProblemDescription_details($default_id);

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

  function TS_ProblemDescription_update()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $PD_name = $this->input->post('PD_name');
        $PD_validity = $this->input->post('PD_validity');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = $this->input->post('default_id');

        $data = array(
                        'name'=> $PD_name,
                        'validity'=> $PD_validity,
                        'changed'=> $datetime
                     );
        $this->Admin->TS_ProblemDescription_update($data,$default_id);

        $data = array(
                        "type_activities"=>"Update Problem Description",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  } 
/* END */



/* START FAULT CATEGORY PORTION */
  public function TS_FaultCategoryPortion_add()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_mainLineStatus_add';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_FaultCategoryPortion_add/TS_FaultCategoryPortion_add',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  public function TS_FaultCategoryPortion_viewlist()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_mainLineStatus_viewlist';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_FaultCategoryPortion_viewlist/TS_FaultCategoryPortion_viewlist',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  public function TS_FaultCategoryPortion_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_mainLineStatus_EditDetails';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_FaultCategoryPortion_EditDetails/TS_FaultCategoryPortion_EditDetails',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function TS_FaultCategoryPortion_addData()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $FCP_name = $this->input->post('FCP_name');
        $FCP_validity = $this->input->post('FCP_validity');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = rand();

        $data = array(
                        'name'=> $FCP_name,
                        'validity'=> $FCP_validity,
                        'created'=> $datetime,
                        'default_id'=>$default_id
                     );
        $this->Admin->TS_FaultCategoryPortion_addData($data);

        $data = array(
                        "type_activities"=>"Add Fault Category Portion",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }

  function Dtable_FaultCategoryPortion_viewlist()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_FaultCategoryPortion_viewlist();

        } else { 
          $this->load->view('login');
        }
  }

  function TS_FaultCategoryPortion_details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $default_id = $this->input->post('default_id');  
        $query = $this->Admin->TS_FaultCategoryPortion_details($default_id);

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

  function TS_FaultCategoryPortion_update()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $FCP_name = $this->input->post('FCP_name');
        $FCP_validity = $this->input->post('FCP_validity');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = $this->input->post('default_id');

        $data = array(
                        'name'=> $FCP_name,
                        'validity'=> $FCP_validity,
                        'changed'=> $datetime
                     );
        $this->Admin->TS_FaultCategoryPortion_update($data,$default_id);

        $data = array(
                        "type_activities"=>"Update Fault Category Portion",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  } 
/* END */



/* START FAULT CATEGORY TYPE */
  public function TS_FaultCategoryType_add()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_FaultCategoryType_add';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_FaultCategoryType_add/TS_FaultCategoryType_add',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  } 

  public function TS_FaultCategoryType_EditDetails()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_FaultCategoryType_EditDetails';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_FaultCategoryType_EditDetails/TS_FaultCategoryType_EditDetails',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  public function TS_FaultCategoryType_viewlist()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'TS_FaultCategoryType_viewlist';
        $this->load->view('template/header/header');
        $this->load->view('template/body/TS_FaultCategoryType_viewlist/TS_FaultCategoryType_viewlist',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function TS_FaultCategoryType_addData()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $FCT_name = $this->input->post('FCT_name');
        $FCT_validity = $this->input->post('FCT_validity');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = rand();

        $data = array(
                        'name'=> $FCT_name,
                        'validity'=> $FCT_validity,
                        'created'=> $datetime,
                        'default_id'=>$default_id
                     );
        $this->Admin->TS_FaultCategoryType_addData($data);

        $data = array(
                        "type_activities"=>"Add Fault Category Type",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }

  function Dtable_FaultCategoryType_viewlist()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        echo $this->Admin->Dtable_FaultCategoryType_viewlist();

        } else { 
          $this->load->view('login');
        }
  }

  function TS_FaultCategoryType_details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $default_id = $this->input->post('default_id');  
        $query = $this->Admin->TS_FaultCategoryType_details($default_id);

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

  function TS_FaultCategoryType_update()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $default_id = $this->input->post('default_id');

        $FCP_name = $this->input->post('FCT_name'); 
        $FCP_validity = $this->input->post('FCT_validity');

        $data = array(
                        'name'=>$FCP_name,
                        'validity'=>$FCP_validity,
                        'changed'=>$datetime
                     );

        

        $this->Admin->TS_FaultCategoryType_update($data,$default_id);

        $data = array(
                        "type_activities"=>"Update Fault Category Type",
                        "created_by"=>$updateBy,
                        "other_id"=>$default_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  } 
/* END */

/* Agent Link Group */
  public function Admin_ViewLink_Agent()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'Admin_ViewLink_Agent';
        $this->load->view('template/header/header');
        $this->load->view('template/body/Admin_ViewLink_Agent/Admin_ViewLink_Agent',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function Dtable_Agent_ViewList_By_Group()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        $group = $this->input->post('group');
        echo $this->Admin->Dtable_Agent_ViewList_By_Group($group);

        } else { 
          $this->load->view('login');
        }
  }

  public function Admin_LinkModule()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $this->data['site_title'] = 'Admin_LinkModule';
        $this->load->view('template/header/header');
        $this->load->view('template/body/Admin_LinkModule/Admin_LinkModule',$this->data);
        $this->load->view('template/footer/footer');

        } else { 
          $this->load->view('login');
        }

  }

  function Dtable_Agent_LinkModule()
  {

     $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        header('Content-Type: application/json');
        $group = $this->input->post('group');
        echo $this->Admin->Dtable_Agent_LinkModule($group);

        } else { 
          $this->load->view('login');
        }
  }

  function add_link_module()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $group = $this->input->post('group');
        $id_customer = $this->input->post('id_customer');
        $id_ticket = $this->input->post('id_ticket');
        $id_service = $this->input->post('id_service');
        $id_cmdb = $this->input->post('id_cmdb');
        $id_report = $this->input->post('id_report');
        $id_admin = $this->input->post('id_admin');
        $id_ppm_team = $this->input->post('id_ppm_team');
        $id_ppm_verify = $this->input->post('id_ppm_verify');
        $id_ppm_endorse = $this->input->post('id_ppm_endorse');
        $id_ppm_verify_network_server = $this->input->post('id_ppm_verify_network_server');

        $this->Admin->add_link_module_customer($group,$id_customer);
        $this->Admin->add_link_module_ticket($group,$id_ticket);
        $this->Admin->add_link_module_service($group,$id_service);
        $this->Admin->add_link_module_cmdb($group,$id_cmdb);
        $this->Admin->add_link_module_report($group,$id_report);
        $this->Admin->add_link_module_admin($group,$id_admin);
        $this->Admin->add_link_module_ppm_team($group,$id_ppm_team);
        $this->Admin->add_link_module_ppm_verify($group,$id_ppm_verify);
        $this->Admin->add_link_module_ppm_endorse($group,$id_ppm_endorse);
        $this->Admin->add_link_module_ppm_verify_network_server($group,$id_ppm_verify_network_server);

        } else { 
          $this->load->view('login');
        }

  }


  function check_list_module_customer()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $group = $this->input->post('group');
        $module = $this->input->post('module');
        $query = $this->Admin->check_list_module($group,$module);
        echo json_encode($query);

        } else { 
          $this->load->view('login');
        }
  }

  function check_list_module_ticket()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $group = $this->input->post('group');
        $module = $this->input->post('module');
        $query = $this->Admin->check_list_module($group,$module);
        echo json_encode($query);

        } else { 
          $this->load->view('login');
        }
  }

  function check_list_module_service()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $group = $this->input->post('group');
        $module = $this->input->post('module');
        $query = $this->Admin->check_list_module($group,$module);
        echo json_encode($query);

        } else { 
          $this->load->view('login');
        }
  }

  function check_list_module_cmdb()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $group = $this->input->post('group');
        $module = $this->input->post('module');
        $query = $this->Admin->check_list_module($group,$module);
        echo json_encode($query);

        } else { 
          $this->load->view('login');
        }
  }

  function check_list_module_report()
  {
    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $group = $this->input->post('group');
        $module = $this->input->post('module');
        $query = $this->Admin->check_list_module($group,$module);
        echo json_encode($query);

        } else { 
          $this->load->view('login');
        }
  }

  function check_list_module_admin()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $group = $this->input->post('group');
        $module = $this->input->post('module');
        $query = $this->Admin->check_list_module($group,$module);
        echo json_encode($query);

        } else { 
          $this->load->view('login');
        }
  }


  function check_list_module_ppm_team()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $group = $this->input->post('group');
        $module = $this->input->post('module');
        $query = $this->Admin->check_list_module($group,$module);
        echo json_encode($query);

        } else { 
          $this->load->view('login');
        }
  }



  function check_list_module_ppm_verify()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $group = $this->input->post('group');
        $module = $this->input->post('module');
        $query = $this->Admin->check_list_module($group,$module);
        echo json_encode($query);

        } else { 
          $this->load->view('login');
        }
  }

  function check_list_module_ppm_endorse()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $group = $this->input->post('group');
        $module = $this->input->post('module');
        $query = $this->Admin->check_list_module($group,$module);
        echo json_encode($query);

        } else { 
          $this->load->view('login');
        }
  }
/* END */

  function getname_by_id()
  {
    $id = $this->input->post('id');
    $this->Admin->getname_by_id($id);
  }
  
  function getname_service_by_id()
  {
    $id = $this->input->post('id');
    $this->Admin->getname_service_by_id($id);
  }



  public function Admin_Severity_Add()
  {
      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
      {
          $this->data['site_title'] = 'Admin_Severity_Add';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Admin_Severity_Add/Admin_Severity_Add',$this->data);
          $this->load->view('template/footer/footer');
      } else {
          $this->load->view('login');
      }
  }

  function Admin_Severity_Add_Type()
  {   
      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
      {
          $sev_name = $this->input->post('sev_name');
          $sev_time = $this->input->post('sev_time');
          $sev_validity = $this->input->post('sev_validity');

          $updateBy = $this->session->userdata('userid');
          date_default_timezone_set("Asia/Kuala_Lumpur");
          $timeReg =date("h:i:s");
          $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
          $datetime = $dateReg.' '.$timeReg;

          //$default_id = rand();

          $data = array(
                          'sev_name'=> $sev_name,
                          'validity'=> $sev_validity,
                          'created'=> $datetime,
                          'sev_time'=>$sev_time,
                          'updateBy'=>$updateBy
                       );

          $this->Admin->Admin_Severity_Add_Type($data);

      } else {
          $this->load->view('login');
      }
  }

  function Admin_Severity_ViewList()
  {
      

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
    {
        $this->data['site_title'] = 'Admin_Severity_View';
        $this->load->view('template/header/header');
        $this->load->view('template/body/Admin_Severity_ViewList/Admin_Severity_ViewList',$this->data);
        $this->load->view('template/footer/footer');
    } else {
        $this->load->view('login');
    }

  }


  function Dtable_Severity_ViewList()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
      {

          header('Content-Type: application/json');
          echo $this->Admin->Dtable_Severity_ViewList();

      } else { 
            $this->load->view('login');
      }
  }


  function Admin_Severity_editList()
  {
      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
      {
          $this->data['site_title'] = 'Admin_Severity_Edit';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Admin_Severity_editList/Admin_Severity_editList',$this->data);
          $this->load->view('template/footer/footer');
      } else {
          $this->load->view('login');
      }
  }

  function Admin_Severity_Edit_Type()
  {
      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
      {
          $sev_name = $this->input->post('sev_name');
          $sev_time = $this->input->post('sev_time');
          $sev_validity = $this->input->post('sev_validity');

          $updateBy = $this->session->userdata('userid');
          date_default_timezone_set("Asia/Kuala_Lumpur");
          $timeReg =date("h:i:s");
          $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
          $datetime = $dateReg.' '.$timeReg;

          $severity_type_id = $this->input->post('severity_type_id');

          //$default_id = rand();

          $data = array(
                          'sev_name'=> $sev_name,
                          'validity'=> $sev_validity,
                          'changed'=> $datetime,
                          'sev_time'=>$sev_time,
                          'updateBy'=>$updateBy
                       );

          $this->Admin->Admin_Severity_Update_Type($data,$severity_type_id);

      } else {
          $this->load->view('login');
      }
  }


  function severity_details()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
      {

      $severity_type_id = $this->input->post('severity_type_id');  
      $query = $this->Admin->severity_details($severity_type_id);

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


  public function SendNotice()
  {

      $this->data['site_title'] = 'SendNotice';
      $this->load->view('template/header/header');
      $this->load->view('template/body/SendNotice/SendNotice',$this->data);
      $this->load->view('template/footer/footer');

  }

  public function SendNotice_Schedule()
  {

      $this->data['site_title'] = 'SendNotice';
      $this->load->view('template/header/header');
      $this->load->view('template/body/SendNotice_Schedule/SendNotice',$this->data);
      $this->load->view('template/footer/footer');

  }


  public function SendNoticeView()
  {

      $this->data['site_title'] = 'SendNoticeView';
      $this->load->view('template/header/header');
      $this->load->view('template/body/SendNoticeView/SendNoticeView',$this->data);
      $this->load->view('template/footer/footer');

  }

  function SendNotice_Add()
  {
    $title = $this->input->post('title');
    $note = $this->input->post('note');

    $updateBy = $this->session->userdata('userid');
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("h:i:s");
    $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    $datetime = $dateReg.' '.$timeReg;

    $id_notice = rand();

    $data = array("title"=>$title,"note"=>$note,"datetime"=>$datetime,"updateBy"=>$updateBy,"generated_id"=>$id_notice);
    $this->Admin->SendNotice_Add($data);
    

    $data = array("id_note"=>$id_notice,"status"=>0);
    $this->Admin->net_send_user($data);
     


  }

  function SendNotice_Add_Schedule()
  {
    $title = $this->input->post('title');
    $note = $this->input->post('note');
    $date_schedule = $this->input->post('date_schedule');

    $updateBy = $this->session->userdata('userid');
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("h:i:s");
    $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    $datetime = $dateReg.' '.$timeReg;

    $id_notice = rand();

    $data = array("title"=>$title,"note"=>$note,"updateBy"=>$updateBy,"generated_id"=>$id_notice,'date_schedule'=>$date_schedule);
    $this->Admin->SendNotice_Add_Schedule($data);
    

    $data = array("id_note"=>$id_notice,"status"=>0);
    $this->Admin->net_send_user($data);
     


  }

  function Dtable_SendNotice_ViewList()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
      {

          header('Content-Type: application/json');
          echo $this->Admin->Dtable_SendNotice_ViewList();

      } else { 
            $this->load->view('login');
      }
  }


  function Dtable_SendNotice_ViewList_Schedule()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
      {

          header('Content-Type: application/json');
          echo $this->Admin->Dtable_SendNotice_ViewList_Schedule();

      } else { 
            $this->load->view('login');
      }
  }


  function net_send_agent_notice()
  {
      header('Access-Control-Allow-Origin: *');

      $COMP_Name = $this->input->post('COMP_Name');

      $check = $this->Admin->check_net_send_agent_notice($COMP_Name);

      if($check>0){

        echo '1';

      } else {

      }

  }

  function get_net_send_agent_notice()
  {
    header('Access-Control-Allow-Origin: *');
    $COMP_Name = $this->input->post('COMP_Name');
    echo $get_data = $this->Admin->get_net_send_agent_notice($COMP_Name);


  }

  


  function net_send_agent_read_notice()
  {
      header('Access-Control-Allow-Origin: *');

      $data = array('status'=>1);
      $COMP_Name = $this->input->post('COMP_Name');
      $check = $this->Admin->net_send_agent_read_notice($data,$COMP_Name);

  }


  function add_severity_sla()
  {
      $sev_title = $this->input->post('sev_title');
      $sev_minute = $this->input->post('sev_minute');
      $generated_id = $this->input->post('generated_id');
      
      $data = array(
                      "title"=>$sev_title,
                      "minute"=>$sev_minute,
                      "sla_generated_id"=>$generated_id
                   );

      $this->Admin->add_severity_sla($data);


  }

  function list_severity_sla()
  {
      $generated_id = $this->input->post('generated_id');
      $this->Admin->list_severity_sla($generated_id);
  }

  function delete_data_list()
  {
      $id = $this->input->post('id');
      $this->Admin->delete_data_list($id);
  }


  public function Fault_ITSM_Add()
  {

      $this->data['site_title'] = 'Fault_ITSM_Add';
      $this->load->view('template/header/header');
      $this->load->view('template/body/Fault_ITSM_Add/Fault_ITSM_Add',$this->data);
      $this->load->view('template/footer/footer');

  }

  public function Fault_ITSM_View()
  {

      $this->data['site_title'] = 'Fault_ITSM_View';
      $this->load->view('template/header/header');
      $this->load->view('template/body/Fault_ITSM_View/Fault_ITSM_View',$this->data);
      $this->load->view('template/footer/footer');

  }

  function Fault_Itsm_Add_Data()
  {
      $fi_name = $this->input->post('fi_name');
      $fi_validity = $this->input->post('fi_validity');

      $updateBy = $this->session->userdata('userid');
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("h:i:s");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $datetime = $dateReg.' '.$timeReg;


      $data = array("name"=>$fi_name,"validity"=>$fi_validity,"created"=>$datetime,"updatedBy"=>$updateBy);
      $this->Admin->Fault_Itsm_Add_Data($data);
  }

  function Dtable_Fault_ITSM_viewlist()
  {
    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
    {

    header('Content-Type: application/json');
    echo $this->Admin->Dtable_Fault_ITSM_viewlist();

    } else { 
      $this->load->view('login');
    }
  }

  public function Fault_ITSM_EditView()
  {

      $this->data['site_title'] = 'Fault_ITSM_EditView';
      $this->load->view('template/header/header');
      $this->load->view('template/body/Fault_ITSM_EditView/Fault_ITSM_EditView',$this->data);
      $this->load->view('template/footer/footer');

  }

  function Fault_ITSM_Details()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $id = $this->input->post('id');  
        $query = $this->Admin->Fault_ITSM_Details($id);

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


  function Fault_Itsm_Update_Data()
  {
      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
      {
          $fi_name = $this->input->post('fi_name');
          $fi_validity = $this->input->post('fi_validity');
          $id = $this->input->post('id');

          $updateBy = $this->session->userdata('userid');
          date_default_timezone_set("Asia/Kuala_Lumpur");
          $timeReg =date("h:i:s");
          $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
          $datetime = $dateReg.' '.$timeReg;


          //$default_id = rand();

          $data = array(
                          'name'=> $fi_name,
                          'validity'=> $fi_validity,
                          'changed'=> $datetime,
                          'updatedBy'=>$updateBy
                       );

          $this->Admin->Fault_Itsm_Update_Data($data,$id);

      } else {
          $this->load->view('login');
      }
  }


  function check_location_agent()
  {
      header('Access-Control-Allow-Origin: *');
      $name_pc = $this->input->post('name_pc');
      echo $this->Admin->check_location_agent($name_pc);
  }

  

  function update_location_agent()
  {
      header('Access-Control-Allow-Origin: *');
      $name_pc = $this->input->post('name_pc');
      $location = $this->input->post('location');

      $data = array("location"=>$location);

      $update = $this->Admin->update_location_agent($data,$name_pc);

      echo 'Success';


  }

  function agent_location()
  {
      $this->load->model('Dbase_lookup','lookup');
      $this->lookup->getAllLoc(); 
  }


  function send_notice()
  {
    $this->load->view('template/notice/index.html');
  }

  function View_notice()
  {
    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
    {
        $this->data['site_title'] = 'Ticket_Status_Email';
        $this->load->view('template/header/header');
        $this->load->view('template/body/SendNoticeView/SendNoticeView',$this->data);
        $this->load->view('template/footer/footer');
    } else {
        $this->load->view('login');
    }
  }


  function View_notice_schedule()
  {
    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
    {
        $this->data['site_title'] = 'Ticket_Status_Email';
        $this->load->view('template/header/header');
        $this->load->view('template/body/SendNoticeView_Schedule/SendNoticeView',$this->data);
        $this->load->view('template/footer/footer');
    } else {
        $this->load->view('login');
    }
  }

  function Details_notice()
  {
    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
    {
        $this->data['site_title'] = 'Ticket_Status_Email';
        $this->load->view('template/header/header');
        $this->load->view('template/body/SendNoticeView/Details_notice',$this->data);
        $this->load->view('template/footer/footer');
    } else {
        $this->load->view('login');
    }
  }

  function Details_notice_Schedule()
  {
    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
    {
        $this->data['site_title'] = 'Ticket_Status_Email';
        $this->load->view('template/header/header');
        $this->load->view('template/body/SendNoticeView_Schedule/Details_notice',$this->data);
        $this->load->view('template/footer/footer');
    } else {
        $this->load->view('login');
    }
  }

  function read_notice()
  {
    $this->load->view('template/notice/read.html');
  }  


  function remoteComputer()
  {

    $ip = $this->input->post('ip');
    //$name = getenv('COMPUTERNAME');
    //$name = gethostbyaddr($_SERVER['REMOTE_ADDR']);

    //$name = getHostByName(getHostName());
    $name = $_SERVER['REMOTE_ADDR'];
    
    // $name = $_SERVER['HTTP_CLIENT_IP'];

    $data = array('name_remote'=>$name,'ip_remote'=>$ip);
    $this->Admin->remoteComputer($data);

    // $app = 'C:/Program Files/remote/crm.exe';
    // exec('"'.$app.'"');

    // $app = 'C:/Program Files/uvnc bvba/UltraVNC/vncviewer.exe';
    // //$connect = '-connect 10.10.10.10';
    // $connect = $this->input->post('ip');
    // exec('"'.$app.'" "'.$connect.'"'); 
  }

  function get_ip_remote()
  {
    header('Access-Control-Allow-Origin: *');  
    $name = $this->input->post('name');
    echo $this->Admin->get_ip_remote($name);
  }



  //test remote
  function connect_remote()
  {
    $this->load->view('template/remote/connect.php');
  }


  function listen_remote()
  {
    $this->load->view('template/remote/listen.php');
  }

  function update_remote()
  {
    header('Access-Control-Allow-Origin: *');  
    $ip = $this->input->post('ip');
    $name = $this->input->post('name');
    $this->Admin->update_remote($ip,$name);
  }

  function ticket_status_email()
  {
    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
    {
        $this->data['site_title'] = 'Ticket_Status_Email';
        $this->load->view('template/header/header');
        $this->load->view('template/body/Ticket_Status_Email/Ticket_Status_Email',$this->data);
        $this->load->view('template/footer/footer');
    } else {
        $this->load->view('login');
    }
  }


  public function Announcement()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Announcement/Announcement',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }

  function Add_Announcement()
  {
      $comment = $this->input->post('comment');
      $updateBy = $this->session->userdata('userid');
      $data = array(
                      'announcement'=>$comment,
                      'created_by'=>$updateBy,
                      'status'=>'Valid'
                   );
      $this->Admin->Add_Announcement($data);
  }

  function List_Announcement()
  {
      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Announcement_List/Announcement_List',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   
  }

  function Dtable_Announcement()
  {
      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
      {

      header('Content-Type: application/json');
      echo $this->Admin->Dtable_Announcement();

      } else { 
        $this->load->view('login');
      }
  }


  function delete_data2()
  {

    $idModule = $this->session->userdata('idModule');
    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        {

        $other_id = $this->input->post('other_id');
        $nama_table = $this->input->post('nama_table');
        $where_column = $this->input->post('where_column');

        $updateBy = $this->session->userdata('userid');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("h:i:s");
        $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg;

        $this->Admin->delete_data2($other_id,$nama_table,$where_column);

        $title = " Update To Delete data ".$nama_table;

        $data = array(
                        "type_activities"=>$title,
                        "created_by"=>$updateBy,
                        "other_id"=>$other_id
                     );

        $this->Admin->saveLog($data);

        } else { 
          $this->load->view('login');
        }
  }



  public function Calendar()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Calendar/Calendar',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }

  function Add_Calendar()
  {
      $start_calendar = $this->input->post('start_calendar');
      $end_calendar = $this->input->post('end_calendar');
      $comment = $this->input->post('comment');
      $updateBy = $this->session->userdata('userid');
      $data = array(
                      'start_calendar'=>$start_calendar,
                      'end_calendar'=>$end_calendar,
                      'description'=>$comment,
                      'created_by'=>$updateBy,
                      'status'=>'Valid'
                   );
      $this->Admin->Add_Calendar($data);
  }

  function List_Calendar()
  {
      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/Calendar_List/Calendar_List',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   
  }

  function Dtable_Calendar()
  {
      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
      {

      header('Content-Type: application/json');
      echo $this->Admin->Dtable_Calendar();

      } else { 
        $this->load->view('login');
      }
  }

  function speak()
  {
      $this->load->view('test_speak2text');
  }


  function active_lock()
  {
      $id_ticket = $this->input->post('id_ticket');
      $updateBy = $this->session->userdata('userid');
      $first_name = $this->session->userdata('first_name');

      $data = array('lock_by'=>$first_name,'status_lock'=>'1');
      $this->db->where('id_ticket',$id_ticket);
      $this->db->update('td_register_ticket',$data);

      $data2 = array('lock_by'=>$first_name,'status_lock'=>'1','id_ticket'=>$id_ticket);
      $this->db->insert('ticket_lock_activities',$data2);

  }


  function inactive_lock()
  {
      $id_ticket = $this->input->post('id_ticket');
      $updateBy = $this->session->userdata('userid');
      $first_name = $this->session->userdata('first_name');

      $data = array('lock_by'=>$first_name,'status_lock'=>'0');
      $this->db->where('id_ticket',$id_ticket);
      $this->db->update('td_register_ticket',$data);

      $data2 = array('lock_by'=>$first_name,'status_lock'=>'0','id_ticket'=>$id_ticket);
      $this->db->insert('ticket_lock_activities',$data2);

  }

  function add_access()
  {
      $user_access = $this->input->post('user_access');

      $this->db->select('count(*) as total');
      $this->db->where('name',$user_access);
      $query =  $this->db->get('knowledbased_access')->result();
      $no='1';
      foreach ($query as $data) 
      {
        $total = $data->total;
      }

      //var_dump($total); exit();

      if($total>0){

      } else {
        $data = array('name'=>$user_access);
        $this->db->insert('knowledbased_access',$data);
      }

  }

  function delete_access()
  {
      $id = $this->input->post('id');
      $this->db->where('id',$id);
      $this->db->delete('knowledbased_access');
  }


  public function Nex_Bot()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/nex-bot',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }


  public function group_chat()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/group_chat/list',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }


  public function group_chat_live()
  {

      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)))
      { 
          $this->data['site_title'] = 'Add_Agent';
          $this->load->view('template/header/header');
          $this->load->view('template/body/group_chat/group_chat',$this->data);
          $this->load->view('template/footer/footer');

      } else { 
          $this->load->view('login');
      }   

  }

  function create_my_group()
  {
    $group_name = $this->input->post('group_name');
    $group_key = $this->input->post('group_key');

    $public_key = $this->input->post('public_key');

    if($public_key=='1'){
      $public_key = $group_key;
    } else {
      $public_key = '<i class="fa fa-lock" aria-hidden="true"></i>';
    }

    $id_chat = rand();

    $data = array('group_name'=>$group_name,'group_key'=>$group_key,'id_chat'=>$id_chat,'owner'=>$this->session->userdata('userid'),'public_key'=>$public_key);
    $this->db->insert('group_chat_register',$data);


    $userid = $this->session->userdata('userid');
    $data2 = array('userid'=>$userid,'id_chat'=>$id_chat);
    $this->db->insert('group_member',$data2);

    redirect('admin/group_chat');
  }


  public function Dtable_Chat_List()
  {
    header('Content-Type: application/json');
    echo $this->Admin->Dtable_Chat_List();

  }

  function check_group()
  {
    $group_key  = $this->input->post('group_key');
    $id_chat = $this->input->post('id_chat');
    $check = $this->Admin->check_group($group_key,$id_chat);

    $owner = $this->Admin->owner_group($id_chat);

    if($check=='0'){
      redirect('admin/group_chat');
    } else {
      redirect('admin/group_chat_live/'.$id_chat.'/'.$this->session->userdata('userid').'/'.$owner);
    }
  }


  function chat_check_member()
  {
    $id_chat = $this->input->post('id');
    $userid = $this->session->userdata('userid');
    $check = $this->Admin->chat_check_member($userid,$id_chat);

    if($check=='0'){
      echo '1';
    } else {
      $key = $this->Admin->get_key_group($id_chat);
      echo $key;
    }
  }


  function group_chat_activities()
  {
    $id_chat = $this->input->post('room');
    $message = $this->input->post('message');
    $userid = $this->session->userdata('userid');

    $data = array('from_user'=>$userid,'chat'=>$message,'id_chat'=>$id_chat);
    $this->db->insert('group_chat_activities',$data);

  }


  function group_chat_activities_list()
  {
    $userid = $this->input->post('userid');
    $room = $this->input->post('room');
    $this->db->where('id_chat',$room);
    $this->datatables->join('agent b', 'b.userid = a.from_user', 'left');
    $query =  $this->db->get('group_chat_activities a')->result();
    foreach ($query as $data) 
    {
      $img = $this->MyImg($data->email);

      if(empty($img)){
        $img = base_url().'profile.png';
      }


      if($data->from_user==$this->session->userdata('userid')){
        echo '<li class="mar-btm"><div class="media-right"><img src="'.$img.'" class="img-circle img-sm" alt="Profile Picture"></div><div class="media-body pad-hor speech-right"><div class="speech"><a href="#" class="media-heading">'.$data->first_name.'</a><p> '.$data->chat.' </p></div></div></li>';

      } else {
        echo '<li class="mar-btm"><div class="media-left"><img src="'.$img.'" class="img-circle img-sm" alt="Profile Picture"></div><div class="media-body pad-hor speech-left"><div class="speech"><a href="#" class="media-heading">'.$data->first_name.'</a><p> '.$data->chat.' </p></div></div></li>';
      }
      
    }
  }


  function MyImg($id)
  {
    $this->db->where('email',$id);
    $query =  $this->db->get('agent')->result();
    foreach ($query as $data) 
    {
      return $data->user_img;
    }
  }


  function close_room_now()
  {
    $id_chat = $this->input->post('id_chat');
    $data = array('close'=>'1');
    $this->db->where('id_chat',$id_chat);
    $this->db->update('group_chat_register',$data);
  }


  function open_opsi()
  {
    // shell_exec("C:\ProgramData\Microsoft\Windows\Start Menu\Programs\opsi.org\opsi-configed.lnk");

    exec("C:\ProgramData\Microsoft\Windows\Start Menu\Programs\opsi.org\opsi-configed.lnk");


    redirect('desktop_management');
  }



  function Add_Level()
  {
      $level_name = $this->input->post('level_name');
      $comment = $this->input->post('comment');
      $updateBy = $this->session->userdata('userid');
      $data = array(
                      'level_name'=>$level_name,
                      'level_description'=>$comment,
                   );
      $this->db->insert('lookup_level',$data);
  }


  function Add_Department()
  {
      $level_name = $this->input->post('level_name');
      $department_name = $this->input->post('department_name');
      $comment = $this->input->post('comment');
      $updateBy = $this->session->userdata('userid');
      $data = array(
                      'level_name'=>$level_name,
                      'department_name'=>$department_name,
                      'department_description'=>$comment
                   );
      $this->db->insert('lookup_department',$data);
  }


  function Dtable_Level()
  {
      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
      {

      header('Content-Type: application/json');
      echo $this->Admin->Dtable_Level();

      } else { 
        $this->load->view('login');
      }
  }


  function Dtable_Department()
  {
      $idModule = $this->session->userdata('idModule');
      if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
      {

      header('Content-Type: application/json');
      echo $this->Admin->Dtable_Department();

      } else { 
        $this->load->view('login');
      }
  }

  function Get_Department()
  {
      $level = $this->input->post('level');
      $this->Admin->Get_Department($level);
  }


  function get_merged_result(){                   
    $this->db->select("name,description,type,location");
    $this->db->distinct();
    $this->db->from("computer");
    // $this->db->where_in("id",$model_ids);
    $this->db->get(); 
    $query1 = $this->db->last_query();

    $this->db->select("name,description,type,location");
    $this->db->distinct();
    $this->db->from("hardware");
    // $this->db->where_in("id",$model_ids);

    $this->db->get(); 
    $query2 =  $this->db->last_query();
    $query = $this->db->query($query1." UNION ".$query2);

    $data = $query->result();

    var_dump($data);
}

}
 	