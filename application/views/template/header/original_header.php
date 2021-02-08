<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Nex-Desk</title>

  <script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
  
  
    <!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">   -->
  
  <link rel="icon" type="image/x-icon" href="<?= base_url()?>asset_admin/penguin.ico">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url()?>asset_admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>asset_admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url()?>asset_admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?= base_url()?>asset_admin/bower_components/jvectormap/jquery-jvectormap.css">

   <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url()?>asset_admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?= base_url()?>asset_admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?= base_url()?>asset_admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?= base_url()?>asset_admin/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?= base_url()?>asset_admin/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?= base_url()?>asset_admin/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url()?>asset_admin/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>asset_admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url()?>asset_admin/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="<?= base_url()?>asset_admin/font.css">


  <!-- jQuery 3 -->
<script src="<?= base_url()?>asset_admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url()?>asset_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url()?>asset_admin/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url()?>asset_admin/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?= base_url()?>asset_admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?= base_url()?>asset_admin/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url()?>asset_admin/bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url()?>asset_admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?= base_url()?>asset_admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url()?>asset_admin/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?= base_url()?>asset_admin/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url()?>asset_admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?= base_url()?>asset_admin/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url()?>asset_admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()?>asset_admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url()?>asset_admin/dist/js/demo.js"></script>
<!-- Page script -->

<script src="<?= base_url()?>asset_admin/datepicker/jquery.datetimepicker.full.js"></script>
<script src="<?= base_url()?>asset_admin/datepicker/jquery.datetimepicker.full.min.js"></script>
<link rel="stylesheet" href="<?= base_url()?>asset_admin/datepicker/jquery.datetimepicker.min.css">



<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('.datepicker').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy'
    })

    $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy'
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })

    $(".time").datetimepicker({
      format: 'H:i:s',
      pickDate: false,
      datepicker: false,
    });

    $(".datetime").datetimepicker({
      format: 'Y-m-d H:i:s'

    });

    $(".datereport").datetimepicker({
      format: 'dd/mm/yyyy'

    });

  });

  $(document).ready(function (){
    //$('.sidebar-toggle').trigger('click');
    $("#cust").trigger('click');
  });
</script>




<body class="hold-transition skin-blue sidebar-mini">

  <header class="main-header">

    <!-- Logo -->
    <a href="<?= base_url()?>dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b><!-- <img src="<?= base_url()?>asset_admin/penguin.ico" width="28px"> --></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><!-- <img src="<?= base_url()?>asset_admin/penguin.ico" width="28px"> --> NEX-DESK</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" id="cust">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <span class="title_nexdesk"> NEX-DESK SYSTEM</span>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <?php $name = $this->session->userdata('first_name') ?>
          <!-- User Account: style can be found in dropdown.less -->

          <!--<li class="dropdown notifications-menu">-->
          <!--  <a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
          <!--    <i class="fa fa-bell-o"></i>-->
          <!--    <span class="label label-warning">10</span>-->
          <!--  </a>-->
          <!--  <ul class="dropdown-menu">-->
          <!--    <li class="header">You have 10 notifications</li>-->
          <!--    <li>-->
                <!-- inner menu: contains the actual data -->
          <!--      <ul class="menu">-->
          <!--        <li>-->
          <!--          <a href="#">-->
          <!--            <i class="fa fa-users text-aqua"></i> 5 new members joined today-->
          <!--          </a>-->
          <!--        </li>-->
          <!--        <li>-->
          <!--          <a href="#">-->
          <!--            <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the-->
          <!--            page and may cause design problems-->
          <!--          </a>-->
          <!--        </li>-->
          <!--        <li>-->
          <!--          <a href="#">-->
          <!--            <i class="fa fa-users text-red"></i> 5 new members joined-->
          <!--          </a>-->
          <!--        </li>-->
          <!--        <li>-->
          <!--          <a href="#">-->
          <!--            <i class="fa fa-shopping-cart text-green"></i> 25 sales made-->
          <!--          </a>-->
          <!--        </li>-->
          <!--        <li>-->
          <!--          <a href="#">-->
          <!--            <i class="fa fa-user text-red"></i> You changed your username-->
          <!--          </a>-->
          <!--        </li>-->
          <!--      </ul>-->
          <!--    </li>-->
          <!--    <li class="footer"><a href="#">View all</a></li>-->
          <!--  </ul>-->
          <!--</li>-->
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- <img src="<?= base_url()?>ninja.png" class="user-image" alt="User Image"> -->

              <span class="hidden-xs"><?= $name ?>   </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= base_url()?>asset_admin/default.png" class="img-circle" alt="User Image">

                <p>
                
                  <?= $name ?> 
                  <small>Nex-Desk System</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    
                  </div>
                  <div class="col-xs-4 text-center">
                    
                  </div>
                  <div class="col-xs-4 text-center">
                    
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  
                </div>
                <div class="pull-right">
                  <a href="<?= base_url()?>login/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>

    </nav>
  </header>

  <ul id="sticky" class="sticklr">
    <li>
        <a href="<?= base_url()?>menu" class="sticklr-lang"><span class="sticklr-big-title">OVERVIEW</span></a>
    </li>
  </ul>


  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <!-- <img src="<?= base_url()?>asset_admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->
        </div>
        <div class="pull-left info">
          <!-- <p>Nexticks System</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->

     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree" id="left_menu">
        <!-- <li class="header">MAIN NAVIGATION</li>
        <li class=""><a href="<?= base_url()?>dashboard"><i class="fa fa-tv"></i> <span>Dashboard</span></a></li>
        <li class=""><a href="<?= base_url()?>dashboard"><i class="fa fa-users"></i> <span>Customer</span></a></li>
        <li class=""><a href="<?= base_url()?>dashboard"><i class="fa fa-ticket"></i> <span>Ticket</span></a></li>
        <li class=""><a href="<?= base_url()?>dashboard"><i class="fa fa-tasks"></i> <span>Service</span></a></li>
        <li class=""><a href="<?= base_url()?>dashboard"><i class="fa fa-sliders"></i> <span>Asset</span></a></li>
        <li class=""><a href="<?= base_url()?>dashboard"><i class="fa fa-bar-chart"></i> <span>Report</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i> <span>Admin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url()?>ui/createmodule"><i class="fa fa-circle-o"></i> Create Module</a></li>
            <li><a href="<?= base_url()?>ui/createview"><i class="fa fa-circle-o"></i> Create View Form</a></li>
            <li><a href="<?= base_url()?>ui/createviewdatatables"><i class="fa fa-circle-o"></i> Create View Datatables</a></li>
            <li><a href="<?= base_url()?>ui/architecture"><i class="fa fa-circle-o"></i> Architecture </a></li>
          </ul> -->
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <input type="hidden" id="raw_total_time">
  <input type="hidden" id="raw_pending_time">

  <script type="text/javascript">
    $(document).ready(function (){
      setInterval(function(){check_auto_email();}, 10000);
      get_menu();
      var id = "<?= $this->uri->segment('3'); ?>";
      var option = "<?= $this->uri->segment('2'); ?>";

      switch(option){
        case 'CreateTicket_Phone':  check_status(id); break;
        case 'CreateTicket_Email':  check_status(id); break;
        case 'Ticket_StatusView':  check_status(id); break;
        case 'Ticket_ClosedTicket':  check_status(id); break;
        case 'Ticket_DetailTicket':  check_status(id); break;
        case 'Ticket_ButtonPrint':  check_status(id); break;
        case 'Ticket_Button_Add_ITSM':  check_status(id); break;
        case 'Ticket_Button_First_Level':  check_status(id); break;
        case 'Ticket_Button_Note':  check_status(id); break;
        case 'Ticket_Button_Owner':  check_status(id); break;
        case 'Ticket_Button_Responsible':  check_status(id); break;
        case 'Ticket_Customer_User':  check_status(id); break;
        case 'Ticket_Btn_Closed':  check_status(id); break;
        case 'Ticket_QueuView':  check_status(id); break;
        case 'Ticket_PendingResume':  check_status(id); break;
        case 'MS_New_Master_Ticket':  check_status_master(id); break;
        case 'MS_Overview_Open':  check_status_master(id); break;
        case 'MS_Detail_Ticket':  check_status_master(id); break;
        case 'MS_Print_PDF':  check_status_master(id); break;
        case 'MS_Add_ITSM':  check_status_master(id); break;
        case 'MS_First_Level':  check_status_master(id); break;
        case 'MS_Note':  check_status_master(id); break;
        case 'MS_PendingResume':  check_status_master(id); break;
        case 'MS_Owner':  check_status_master(id); break;
        case 'MS_Responsibility':  check_status_master(id); break;
        case 'MS_Closed':  check_status_master(id); break;
        case 'MS_Overview_Closed':  check_status_master(id); break;
      }

      //check_status(id);
      //check_status_master(id);
    });

    

    function check_status(id)
    {

        var data =  { 
                      'id':id,
                      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }
        $.ajax({
                    url: '<?=base_url()?>Ticket/check_status',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {
                    },
                    success: function(response){
                        var response = response.trim();
                        if(response>0){
                            start_ticket(id);
                            get_total_time(id);
                            get_pending_time(id);
                            get_working_hour(id);
                            get_closed_date(id);
                            $("#maso_tutup_ticket_div").show();
                            $("#li_communication").hide();
                            $("#li_people").hide();
                            $("#li_closed").hide();
                            $("#li_itsm").hide();

                            $("#li_reopen").show();

                        } else { //kalu x closed lagi
                            $("#li_reopen").hide();
                            $("#maso_tutup_ticket_div").hide();
                            $("#li_communication").show();
                            $("#li_people").show();
                            $("#li_closed").show();
                            $("#li_itsm").show();
                            start_ticket(id);
                            total_ticket(id);
                            pending_ticket(id);

                            raw_total_ticket(id);
                            raw_pending_ticket(id);

                            setTimeout(calculate_working_hour, 2000);
                            setInterval(function(){
                              var id = "<?= $this->uri->segment('3'); ?>";
                              total_ticket(id);
                              pending_ticket(id);

                              raw_total_ticket(id);
                              raw_pending_ticket(id);
                              calculate_working_hour();
                            }, 30000);

                        }
                    }
              });
    }
    

    function reopen()
    {
      var txt;
      var r = confirm("Are you sure to Re-Open this ticket ?");
      if (r == true) {
          var id = "<?= $this->uri->segment(3)?>";

          var data =  { 
                        'id':id,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                      }
          $.ajax({
                      url: '<?=base_url()?>Ticket/reopen_ticket',
                      type: 'POST',
                      dataType: 'html',
                      data: data,
                      beforeSend: function() {
                      },
                      success: function(response){
                        window.location.href="<?=base_url()?>Ticket/Ticket_DetailTicket/"+id;
                      }
                });

          
      } else {
          txt = "You pressed Cancel!";
      }
    }

    
    function check_auto_email()
    {
        // var data =  { 
        //               '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        //             }
        // $.ajax({
        //             url: '<?=base_url()?>Ticket/auto_tiket',
        //             type: 'POST',
        //             dataType: 'html',
        //             data: data,
        //             beforeSend: function() {
        //             },
        //             success: function(response){

        //             }
        //       });
    }



    function check_status_master(id)
    { 
        

        var data =  { 
                      'id':id,
                      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }
        $.ajax({
                    url: '<?=base_url()?>Ticket/check_status_master',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {
                    },
                    success: function(response){
                        var response = response.trim();
                        if(response>0){
                            start_ticket_master(id);
                            get_total_time_master(id);
                            get_pending_time_master(id);
                            get_working_hour_master(id);
                            get_closed_date_master(id);
                            $("#maso_tutup_ticket_div").show();
                            $("#li_communication").hide();
                            $("#li_people").hide();
                            $("#li_closed").hide();
                            $("#li_itsm").hide();


                            $(".total_time").prop('disabled',true);
                            $(".pending_date").prop('disabled',true);
                            $(".working_date").prop('disabled',true);
                            $(".closed_date").prop('disabled',true);

                        } else { //kalu x closed lagi
                            
                            $("#maso_tutup_ticket_div").hide();
                            $("#li_communication").show();
                            $("#li_people").show();
                            $("#li_closed").show();
                            $("#li_itsm").show();
                            start_ticket_master(id);
                            total_ticket_master(id);
                            pending_ticket_master(id);

                            raw_total_ticket_master(id);
                            raw_pending_ticket_master(id);

                            setTimeout(calculate_working_hour, 2000);
                            setInterval(function(){
                              var id = "<?= $this->uri->segment('3'); ?>";
                              total_ticket(id);
                              pending_ticket_master(id);

                              raw_total_ticket_master(id);
                              raw_pending_ticket_master(id);
                              calculate_working_hour();
                            }, 30000);


                            $(".total_time").prop('disabled',true);
                            $(".pending_date").prop('disabled',true);
                            $(".working_date").prop('disabled',true);
                            $(".closed_date").prop('disabled',true);


                        }
                    }
              });
    }


    function get_menu()
    {
      var data =  { 
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                  }
        $.ajax({
                    url: '<?=base_url()?>Ui/get_menu',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {
                    },
                    success: function(response){
                      $("#left_menu").html(response);
                    }
            });
    }

    function start_ticket(id)
    {
      var data =  { 
                    'id_ticket':id,
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                  }
        $.ajax({
                    url: '<?=base_url()?>Ticket/start_ticket',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {
                    },
                    success: function(response){
                        var response = response.trim();
                        if(response)
                        {
                          $('.start_ticket').val(response);
                        }
                    }
            });
    }


    function start_ticket_master(id)
    {
      var data =  { 
                    'id_ticket':id,
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                  }
        $.ajax({
                    url: '<?=base_url()?>Ticket/start_ticket_master',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {
                    },
                    success: function(response){
                        var response = response.trim();
                        if(response)
                        {
                          $('.start_ticket').val(response);
                        }
                    }
            });
    }

    function total_ticket(id)
    {
      var data =  { 
                    'id_ticket':id,
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                  }
        $.ajax({
                    url: '<?=base_url()?>Ticket/total_time_ticket',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {
                    },
                    success: function(response){
                        var response = response.trim();
                        if(response)
                        {
                          $('.total_time').val(response);
                          // use at btn closed
                          $("#total_time_closed").val(response);
                        }
                    }
            });
    }

    function total_ticket_master(id)
    {
      var data =  { 
                    'id_ticket':id,
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                  }
        $.ajax({
                    url: '<?=base_url()?>Ticket/total_time_ticket_master',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {
                    },
                    success: function(response){
                        var response = response.trim();
                        if(response)
                        {
                          $('.total_time').val(response);
                          // use at btn closed
                          $("#total_time_closed").val(response);
                        }
                    }
            });
    }


    function pending_ticket(id)
    {
      var data =  { 
                    'id_ticket':id,
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                  }
        $.ajax({
                    url: '<?=base_url()?>Ticket/pending_ticket',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {
                    },
                    success: function(response){
                        if(response)
                        { 
                          var response = response.trim();
                          $('.pending_date').val(response);

                          // use at btn closed
                          $("#pending_time_closed").val(response);
                        }
                    }
            });
    }

    function pending_ticket_master(id)
    {
      var data =  { 
                    'id_ticket':id,
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                  }
        $.ajax({
                    url: '<?=base_url()?>Ticket/pending_ticket_master',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {
                    },
                    success: function(response){
                        if(response)
                        { 
                          var response = response.trim();
                          $('.pending_date').val(response);

                          // use at btn closed
                          $("#pending_time_closed").val(response);
                        }
                    }
            });
    }


    function raw_total_ticket(id)
    {
      var data =  { 
                    'id_ticket':id,
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                  }
        $.ajax({
                    url: '<?=base_url()?>Ticket/total_time_ticket2',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {
                    },
                    success: function(response){
                        response = $.trim(response);
                        $("#raw_total_time").val(response);
                        //alert(response);
                    }
            });
    }

    function raw_total_ticket_master(id)
    {
      var data =  { 
                    'id_ticket':id,
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                  }
        $.ajax({
                    url: '<?=base_url()?>Ticket/total_time_ticket2_master',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {
                    },
                    success: function(response){
                        response = $.trim(response);
                        $("#raw_total_time").val(response);
                        //alert(response);
                    }
            });
    }


    function raw_pending_ticket(id)
    {
      var data =  { 
                    'id_ticket':id,
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                  }
        $.ajax({
                    url: '<?=base_url()?>Ticket/pending_ticket2',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {
                    },
                    success: function(response){
                        response = $.trim(response);
                        //alert(response);
                        $("#raw_pending_time").val(response);
                    }
            });
    }

    function raw_pending_ticket_master(id)
    {
      var data =  { 
                    'id_ticket':id,
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                  }
        $.ajax({
                    url: '<?=base_url()?>Ticket/pending_ticket2_master',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {
                    },
                    success: function(response){
                        response = $.trim(response);
                        //alert(response);
                        $("#raw_pending_time").val(response);
                    }
            });
    }

    function calculate_working_hour()
    {
      var total = $("#raw_total_time").val();
      var pending = $("#raw_pending_time").val();
      //alert('Total :'+total);
      //alert('Pending :'+pending);
      var result;
      result = total - pending;
      var minit = result;

      //alert('Hasil Tolak :'+result);

      var hour;
      hour = Math.floor(result/3600);
      var minute;
      minute = Math.floor((result/60)%60);
      var second;
      second = Math.floor(result%60);
      //data = hour+' hours '+ minute+' minutes'+second+' Second';
      data = hour+' : '+ minute+' : '+second;

      $(".working_date").val(data);

      // use at btn closed
      $("#working_time_closed").val(data);
    }


    function get_closed_date(id)
    {
      var data =  { 
                    'id_ticket':id,
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                  }
        $.ajax({
                    url: '<?=base_url()?>Ticket/get_closed_date',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {
                    },
                    success: function(response){
                        response = $.trim(response);
                        $(".closed_date").val(response);
                    }
              });
    }

    function get_closed_date_master(id)
    {
      var data =  { 
                    'id_ticket':id,
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                  }
        $.ajax({
                    url: '<?=base_url()?>Ticket/get_closed_date_master',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {
                    },
                    success: function(response){
                        response = $.trim(response);
                        $(".closed_date").val(response);
                    }
              });
    }

    function get_total_time(id)
    {
        var data =  { 
                    'id':id,
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                  }
        $.ajax({
                    url: '<?=base_url()?>Ticket/get_total_time',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {
                    },
                    success: function(response){
                        response = $.trim(response);
                        $(".total_time").val(response);
                    }
              });
    }

    function get_total_time_master(id)
    {
        var data =  { 
                    'id':id,
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                  }
        $.ajax({
                    url: '<?=base_url()?>Ticket/get_total_time_master',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {
                    },
                    success: function(response){
                        response = $.trim(response);
                        $(".total_time").val(response);
                    }
              });
    }

    function get_pending_time(id)
    {
        var data =  { 
                    'id':id,
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                  }
        $.ajax({
                    url: '<?=base_url()?>Ticket/get_pending_time',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {
                    },
                    success: function(response){
                        response = $.trim(response);
                        $(".pending_date").val(response);
                    }
              });
    }


    function get_pending_time_master(id)
    {
        var data =  { 
                    'id':id,
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                  }
        $.ajax({
                    url: '<?=base_url()?>Ticket/get_pending_time_master',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {
                    },
                    success: function(response){
                        response = $.trim(response);
                        $(".pending_date").val(response);
                    }
              });
    }


    function get_working_hour(id)
    {
        var data =  { 
                    'id':id,
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                  }
        $.ajax({
                    url: '<?=base_url()?>Ticket/get_working_hour',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {
                    },
                    success: function(response){
                        response = $.trim(response);
                        $(".working_date").val(response);
                    }
              });
    }

    function get_working_hour_master(id)
    {
        var data =  { 
                    'id':id,
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                  }
        $.ajax({
                    url: '<?=base_url()?>Ticket/get_working_hour_master',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {
                    },
                    success: function(response){
                        response = $.trim(response);
                        $(".working_date").val(response);
                    }
              });
    }


    function edit_itsm_master(id)
    {
        var txt;
        var r = confirm("Are you sure to delete ?");
        if (r == true) {
            delete_link_master(id);
        } else {
            
        }
    }

    function delete_link_master(id)
    {
        var data =  {
                       'id':id,
                       '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                  }

                      
              $.ajax({
                      url: '<?= base_url() ?>Ticket/delete_link_master',
                      type: 'POST',
                      dataType: 'html',
                      data: data,
                      beforeSend: function() {

                      },
                      success: function(response){
                        location.reload();
                      }
                    });
    }

    function add_ticket()
    {
      $("#add_ticket_modal").modal('show');
      //$('#add_ticket_modal').fullscreen();
    }

  </script>

<style type="text/css">
  .modal-full {
      min-width: 100%;
      margin: 0;
  }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" />
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --><!-- 
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/js/bootstrap.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/bootstrap-modal-fullscreen/1.0.3/bootstrap-modal-fullscreen.min.js"></script> -->
  
<?php $url = $this->uri->segment(2) ?>
<?php if($url=='MS_Add_ITSM'){ ?>


<link rel="stylesheet" href="<?= base_url()?>/asset_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">


<div class="modal fade modal-fullscreen" id="add_ticket_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-full" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
          <table id="mytable_master" class="table table-bordered">
                <thead>
                  <tr>

                    <th>No</th>        
                
                    <th>Subject</th>        
                
                    <th>State</th>        
                    
                    <th>State Type</th>  

                    <th>Ages</th>        
                
                    <th>Changed</th>        
                
                    <th>Owner</th>  

                    <th>Detail</th>        
          
                  </tr>
                </thead>
                <tbody id="dataList">             
                </tbody>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="submit();">Add Ticket</button>
      </div>
    </div>
  </div>
</div>


<script src="<?=base_url()?>asset_admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>asset_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
  $(function () {
      $("#mytable_master").DataTable()
  })

  $(document).ready(function() {
    
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
        {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength),
            };
        };

        var send_param =  {
                            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                          };

        var editIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <a onclick="editUser('+data+');" title="Edit User"> <i class="fa fa-edit" /> </i></a> ';
            }
            return data;
        };


       var detailTicket = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <a onclick="detailTicket('+data+');" title="Edit User"> <i class="fa fa-edit" /> </i></a> ';
            }
            return data;
        };



        var delIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <a onclick="delUser('+data+');" title="Delete"> <i class="fa fa-trash" /> </i></a> ';
            }
            return data;
        };

        var ages = function ( data, type, row ) {
            if ( type === 'display' ) {
                var minit = data;
                var hour;
                hour = Math.floor(data/3600);
                var minute;
                minute = Math.floor((data/60)%60);
                data = hour+' : '+ minute;
            }
            return data;
        };


        var tickTicket = function ( data, type, row ) {
              if ( type === 'display' ) {
                  return '<center><input type="checkbox" value="'+data+'" class="LocationID" name="LocationID"></center> ';
              }
              return data;
          };
        

        var t = $("#mytable_master").dataTable({

      "columnDefs": [
        { "searchable": false, "targets": 3 },
                { "searchable": false, "targets": 4 }
      ], //disable search for age
            destroy: true,
            searching: true,
            "scrollX": true, //tambah scroll
            responsive: true, // tambah responsive
            autoWidth: true,
            fixedHeader: true,
            initComplete: function() {
                var api = this.api();
                $('#mytable_filter input')
                        .off('.DT')
                        .on('keyup.DT', function(e) {
                            if (e.keyCode == 13) {
                                api.search(this.value).draw();
                    }
                });
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            "searching": true,
            ajax: {
                      data: send_param,
                      "url": "<?=base_url()?>Ticket/Dtable_Master_AllTicket", 
                      "type": "POST",
                      "dataSrc": function ( json ) {
                            //Make your callback here.
                            
                            //alert("Done!");
                            check_list_ticket();
                            return json.data;

                       }
                  },
            columns: [
                // {
                //     "data": "id_group",
                //     "orderable": false
                // },
                {"data": "id_no",render:tickTicket},
                {"data": "title"},
                {"data": "status_ticket"},
                {"data": "current_state"},
                {"data": "created_date",render:ages},
                {"data": "updated_date",render:ages},
                {"data": "ticket_owner"},
                {"data": "id_ticket",render:detailTicket}

            ],
            order: [[1, 'asc']],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                //$('td:eq(0)', row).html(index);
            }
        });
  });

  function detailTicket(id)
  {
    var base_url = "<?= base_url()?>";
    window.location.href = base_url+'Ticket/Ticket_DetailTicket/'+id;
  }


  function check_list_ticket()
  {

      var id = "<?= $this->uri->segment(3)?>";

      var data =  {
                       'id':id,
                       '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                  }

                      
              $.ajax({
                      url: '<?= base_url() ?>Ticket/check_list_ticket',
                      type: 'POST',
                      dataType: 'json',
                      data: data,
                      beforeSend: function() {

                      },
                      success: function(response){

                              var checkedValue = null; 
                              var inputElements = document.getElementsByClassName('LocationID');
                              for(var i=0; inputElements[i]; ++i){

                                    cbox = inputElements[i].value;
                                    //alert(checkedValue);
                                    $.each(response, function(index) {
                                          var id = response[index].id_ticket_single;
                                          if(id===cbox){
                                              //alert("True");
                                              $("input:checkbox[value="+id+"]").attr("checked", true);
                                          } else {
                                              //alert("False");
                                          }
                                    });

                              }

                      }
              });
  }

  function submit()
  {
      var id = [];
          $(':checkbox:checked').each(function(i){
              id[i] = $(this).val();
              //alert(id)
              if(id[i]=='on'){
                  id[i]='0';
              }
          }); 

      if(id.length===0){
        alert('Please select check box');
      } else {
        var id_master = "<?= $this->uri->segment(3)?>";
        var data =  {
              "id" : id,
              "id_master" : id_master
            }

        $.ajax({
                        url: "<?= base_url() ?>Ticket/add_link_master",
                        type: "POST",
                        dataType: "html",
                        data: data,
                        beforeSend: function() {

                        },
                        success: function(response){
                          location.reload();
                        }
                });

      }
  }

</script>

<?php } ?>

<style type="text/css">
  .sticklr, .sticklr * {
    font : inherit;
    margin: 0;
    padding: 0;
    border: 0;
    outline: 0;
    line-height: 18px;
    color: #000;
    vertical-align: baseline;
    background: #cccccc;
    font-style: oblique;
    border-left: 1px dashed;

  }

  .sticklr, .sticklr > li > ul {list-style-type: none;}

  .sticklr {
       right: 0;
    left: auto;
    position: fixed;
    top: 380px;

      background-color: #f7f7f7;
      /*border: 1px solid #b7b7b7;*/
      /*border-left: none;*/
      border-top: 1px dashed;
      border-top-right-radius: 2px;
      border-bottom-right-radius: 2px;
      width: 25px;
      /*overflow: visible;*/
      z-index: 90;

  }

  .sticklr-right {
      left: auto;
      right: 0;
      border-right: none;
      border-left: 1px solid #b7b7b7;
  }

  .sticklr > li {position: relative;}

  .sticklr > li > a {
      position : relative;
      display: block;
      width: 25px;
      height: 100px;
      background-color: #f0f0f0;
      background-position: 4px 4px;
      background-repeat: no-repeat; 
      border-left: 2px;
  }

  .sticklr > li {
      border-bottom: 1px solid #f7f7f7;
      border-right: 1px solid #f7f7f7;    
      border-top: 1px solid #ccc;
  }

  .sticklr > li:first-child {border-top: 1px solid #f7f7f7;}

  .sticklr > li:last-child {border-bottom: 1px solid #f7f7f7;}

  .sticklr > li > a:hover {background-color: #eaeaea;}

  .sticklr > li > ul {
      display: none;
      position: absolute;
      left: 25px;
      top: -2px;
      width: 180px;
      overflow: hidden;
      background-color: #f7f7f7;
      border: 1px solid #b7b7b7;
      border-radius: 2px;
      -moz-border-radius: 2px;
      -webkit-border-radius: 2px;
      z-index: 9999;
  }

  .sticklr-right > li > ul {
      left: auto;
      right: 25px;
  }

  .sticklr > li > ul:nth-child(3) {
      left: 206px;
  }

  .sticklr > li > ul:nth-child(4) {
      left: 387px;
  }

  .sticklr > li > ul:nth-child(5) {
      left: 568px;
  }

  .sticklr > li > ul:nth-child(6) {
      left: 749px;
  }

  .sticklr > li > ul:nth-child(7) {
      left: 930px;
  }

  .sticklr-right > li > ul:nth-child(3) {
      left: auto;
      right: 206px;
  }

  .sticklr-right > li > ul:nth-child(4) {
      left: auto;
      right: 387px;
  }

  .sticklr-right > li > ul:nth-child(5) {
      left: auto;
      right: 568px;
  }

  .sticklr-right > li > ul:nth-child(6) {
      left: auto;
      right: 749px;
  }

  .sticklr-right > li > ul:nth-child(7) {
      left: auto;
      right: 930px;
  }

  .sticklr > li:hover > ul {
      display: block;
      float: left;
  }

  .sticklr.sticklr-js > li:hover > ul {
      display: none;
  }

  .sticklr > li > ul > li {
      border-bottom: 1px solid #f7f7f7;
      border-right: 1px solid #f7f7f7;    
      border-top: 1px solid #ccc;
      min-width: 180px;
      text-shadow: 1px 1px 1px #fff;
  }

  .sticklr > li > ul > li:first-child {border-top: 1px solid #f7f7f7;}

  .sticklr > li > ul > li:last-child {border-bottom: 1px solid #f7f7f7;}

  .sticklr > li > ul > li {border: none !ie;}

  .sticklr > li > ul > li > a {
      display: block;
      padding: 8px 10px 8px 32px;
      background-color: #f0f0f0;
      background-position: 10px;
      background-repeat: no-repeat;
      color: #555;
      min-height: 20px;
      text-decoration: none;
      white-space: nowrap;
      background-color: transparent !ie;
  }

  .sticklr > li > ul > li > a:hover {background-color: #eaeaea;}

  .sticklr > li > ul > li.sticklr-title > a {
      padding-left: 10px;
      background-color: #e6e6e6;
      cursor: default;
      font-weight: bold;
      background-color: transparent !ie;
  }

  .sticklr > li > ul > li.sticklr-title > a:hover {
      background-color: #e6e6e6;
      background-color: transparent !ie;
  }

  .sticklr > li > ul > li > table {border-collapse:collapse;border-spacing: 0;}

  .sticklr > li > ul > li > form {padding: 8px 10px;}

  .sticklr > li > ul > li input,
  .sticklr > li > ul > li select, 
  .sticklr > li > ul > li textarea,
  .sticklr > li > ul > li button  {
      margin: 4px 0;
      padding: 4px;
  }

  .sticklr-arrow {
      position: absolute;
      left: 25px;
      top: 36px;
      width: 0;
      height: 0;
      border-top: 5px solid transparent;
      border-bottom: 5px solid transparent;
      border-left: 5px solid #b7b7b7;
      border-right: none;
  }

  .sticklr-right .sticklr-arrow {
      left: auto;
      right: 25px;
      border-right: 5px solid #b7b7b7;
      border-left: none;
  }

  .sticklr-themes-1{background-image: url('../../../images/sticklr/theme_1.png');}

  .sticklr-themes-2{background-image: url('../../../images/sticklr/theme_2.png');}

  .sticklr-lang-my{background-image: url('../../../images/sticklr/lang_my.png');}

  .sticklr-lang-en{background-image: url('../../../images/sticklr/lang_en.png');}

  .sticklr-big-title{ 
      text-align: center;
      display: block;
      overflow : hidden;
      -ms-transform: rotate(-90deg);  
      -webkit-transform: rotate(-90deg);
      transform: rotate(-90deg);
      width : 100px;
      height : 25px;
      line-height : 25px;
      left : -38px;
      top : 37px;
      position : absolute;
  }
</style>




<script type="text/javascript">
  function print_ticket_master_word()
  {
      $("#master_submit_word").trigger('click');
  }

  function print_ticket_master_pdf()
  {
      $("#master_submit_pdf").trigger('click');
  }


  function print_ticket_single_word()
  {
      $("#single_submit_word").trigger('click');
  }

  function print_ticket_single_pdf()
  {
      $("#single_submit_pdf").trigger('click');
  }
</script>


<form action="<?= base_url()?>Ticket/Print_Single/<?= $this->uri->segment(3)?>" method="POST" style="display: none">
  <input type="hidden" name="id_ticket" value="<?= $this->uri->segment(3)?>">
  <button type="submit" class="form-control" id="single_submit"> Submit </button>
</form>

<form action="<?= base_url()?>Ticket/Print_Master/<?= $this->uri->segment(3)?>" method="POST" style="display: none">
  <input type="hidden" name="id_ticket" value="<?= $this->uri->segment(3)?>">
  <button type="submit" class="form-control" id="master_submit"> Submit </button>
</form>


<!-- SINGLE -->
  <form action="<?= base_url()?>Ticket/Print_Single_Word/<?= $this->uri->segment(3)?>" method="POST" style="display: none">
    <input type="hidden" name="id_ticket" value="<?= $this->uri->segment(3)?>">
    <button type="submit" class="form-control" id="single_submit_word"> Submit </button>
  </form>

  <form action="<?= base_url()?>Ticket/Print_Single_PDF/<?= $this->uri->segment(3)?>" method="POST" style="display: none">
    <input type="hidden" name="id_ticket" value="<?= $this->uri->segment(3)?>">
    <button type="submit" class="form-control" id="single_submit_pdf"> Submit </button>
  </form>
<!-- END -->

<!-- MASTER -->
  <form action="<?= base_url()?>Ticket/Print_Master_Word/<?= $this->uri->segment(3)?>" method="POST" style="display: none">
    <input type="hidden" name="id_ticket" value="<?= $this->uri->segment(3)?>">
    <button type="submit" class="form-control" id="master_submit_word"> Submit </button>
  </form>
  <form action="<?= base_url()?>Ticket/Print_Master_PDF/<?= $this->uri->segment(3)?>" method="POST" style="display: none">
    <input type="hidden" name="id_ticket" value="<?= $this->uri->segment(3)?>">
    <button type="submit" class="form-control" id="master_submit_pdf"> Submit </button>
  </form>
<!-- END -->


<style type="text/css">
  .loading {
    position: fixed;
    top: 0; right: 0;
    bottom: 0; left: 0;
    background: #fff;
}
.loader {
    left: 50%;
    margin-left: -4em;
    font-size: 10px;
    border: .8em solid rgba(218, 219, 223, 1);
    border-left: .8em solid rgba(58, 166, 165, 1);
    animation: spin 1.1s infinite linear;
}
.loader, .loader:after {
    border-radius: 50%;
    width: 8em;
    height: 8em;
    display: block;
    position: absolute;
    top: 50%;
    margin-top: -4.05em;
}

@keyframes spin {
  0% {
    transform: rotate(360deg);
  }
  100% {
    transform: rotate(0deg);
  }
}
</style>


<script type="text/javascript">
  $(document).ready(function (){
    document.body.style.zoom="110%";
  });
</script>




<style type="text/css">
    /* style for selected */
    .datatablerowhighlight {
        background-color: #ECFFB3 !important;
    }

    .inner_visual  {
      width: 100%;
      overflow-x: scroll;
      overflow-y: hidden;
      background: #ccc;
  }
</style>




<div class="modal fade modal-fullscreen" id="re_open_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-full" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirmation Ticket</h4>
      </div>
      <div class="modal-body">
          Are your sure to Re-Open this ticket ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="submit();">Sure</button>
      </div>
    </div>
  </div>
</div>


<script src='<?=base_url()?>asset_talk2speak/voice.js'></script>

<input style="display: none" id="voice_1" onclick='responsiveVoice.speak("Welcome To Nex-Desk ", "UK English Male");' type='button' value='🔊 Play' />

<script type="text/javascript">
  <?php if($this->session->flashdata('voice_1')=='success'){ ?>
    $(document).ready(function (){
      //$("#voice_1").trigger('click');
    });
  <?php } ?>
</script>



  

<style type="text/css">
@media only screen and (max-width: 760px) {
  .content {
      min-height: 250px;
      padding: 30px;
      margin-right: auto;
      margin-left: auto;
      padding-left: 15px;
      padding-right: 15px;
  }
}
</style>