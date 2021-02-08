<style type="text/css">
    .bg-yellow {
      background-color: #e0caca !important;
    }

    .fixed_header tbody{
      display:block;
      overflow:auto;
      height:120px;
      width:100%;
    }
    .fixed_header thead tr{
      display:block;
      width: 100%;
    }

    .fixed_header2 tbody{
      display:block;
      overflow:auto;
      height:120px;
      width:100%;
    }
    .fixed_header2 thead tr{
      display:block;
      width: 100%;
    }

    .well {
        min-height: 20px;
        padding: 19px;
        margin-bottom: 20px;
        background-color: #fdfdfdeb;
        border: 1px solid #51aa62;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
    }

    .well2 {
        min-height: 1px;
        padding: 1px;
        margin-bottom: 1px;
        height: 280px;
        background-color: #fdfdfdeb;
        border: 1px solid #51aa62;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
    }
</style>



<div class="content-wrapper">

	<section class="content">
		
		<?php $module = $this->session->userdata('idModule'); 
          //var_dump($module); 
    ?>
		

    <script src="https://www.chartjs.org/dist/2.7.3/Chart.bundle.js"></script>
    <script src="https://www.chartjs.org/samples/latest/utils.js"></script>


    <div class="row">


      <div class="col-md-10">
        <div class="col-md-12">
          <div class="col-md-12 well">
            <div class="col-md-2"> 
                <label> Duration </label>
                <select class="form-control" name="duration_select" id="duration_select"> 
                  <option value=""> -- Duration --</option>
                  <option value="24"> Last 24 Hours</option>
                  <option value="7"> Last 7 Days</option>
                  <option value="30"> Last 30 Days</option>
                </select>
            </div>
            <div class="col-md-3"> 
                <label> First Date </label>
                <input type="type" class="datetime form-control" name="input_1" id="input_1_clone" disabled="disabled" style="display: none">
                <input type="type" class="datetime form-control" name="input_1" id="input_1">
            </div>
            <div class="col-md-3"> 
                <label> Last Date </label>
                <input type="type" class="datetime form-control" name="input_2" id="input_2_clone" style="display: none" disabled="disabled">
                <input type="type" class="datetime form-control" name="input_2" id="input_2">
            </div>
            <div class="col-md-2"> 
                <label> Action </label>
                <button type="button" class="btn btn-primary btn-block" id="search_data"> Search </button>
            </div>
            <div class="col-md-2"> 
                <label> Ticket </label>
                <button type="button" class="btn btn-primary btn-block" onclick="create_ticket();" id="realtime_data"> Create Ticket </button>
            </div>
          </div>  
        </div>

        <div class="col-md-12" id="defaultView">
          <div class="col-md-4 well">
            <canvas id="barQueu" width="300" height="200"></canvas>
          </div>
          <div class="col-md-4 well">
            <canvas id="barTicket" width="300" height="200"></canvas>
          </div>
          <div class="col-md-4 well">
            <canvas id="bar7Ticket" width="300" height="200"></canvas>
          </div>


          <div class="col-md-4 well">
            <a href="<?= base_url()?>Ticket/Ticket_StatusView/new" style="color:black"> <label> <i class="fa fa-ticket"></i>  New Ticket </label> </a>

            <table class="fixed_header table">
              <thead>
                <tr>
                  <th>No Ticket</th>
                  <th style="padding-left: 130px;">View</th>
                </tr>
              </thead>
              <tbody>
                <?= list_ticket_new(); ?>
              </tbody>
            </table>

          </div>
          <div class="col-md-4 well">
            <a href="<?= base_url()?>Ticket/Ticket_StatusView" style="color:black"> <label> <i class="fa fa-ticket"></i> Open Ticket</label> </a>

            <table class="fixed_header table">
              <thead>
                <tr>
                  <th>No Ticket</th>
                  <th style="padding-left: 130px;">View</th>
                </tr>
              </thead>
              <tbody>
                <?= list_ticket_open(); ?>
              </tbody>
            </table>

          </div>
          <div class="col-md-4 well">
            <a href="<?= base_url()?>Ticket/Ticket_ClosedTicket" style="color:black"> <label> <i class="fa fa-ticket"></i> Closed Ticket</label> </a>

            <table class="fixed_header table">
              <thead>
                <tr>
                  <th>No Ticket</th>
                  <th style="padding-left: 130px;">View</th>
                </tr>
              </thead>
              <tbody>
                <?= list_ticket_closed(); ?>
              </tbody>
            </table>

          </div>
        </div>

        <div class="col-md-12" id="searchView" style="display: none">
          <div>

            <div class="col-md-4 well"> 
              <a href="<?= base_url()?>Ticket/Ticket_StatusView/new" style="color:black"><legend style="font-size: 16px;"><b> Ticket New </b> </legend></a>
              <table id="list_search_ticket_new" class="table display compact fixed_header" width="100%">
                <thead>
                  <tr>
                    <th>Go</th> 
                    <th>#Ticket</th>
                    <th style="padding-left: 80px;">Subject</th>
                  </tr>
                </thead>
                <tbody id="dataList_ticket">             
                </tbody>
              </table>
            </div>


            <div class="col-md-4 well"> 
              <a href="<?= base_url()?>Ticket/Ticket_StatusView/open" style="color:black"><legend style="font-size: 16px;"><b> Ticket Open </b></legend></a>
              <table id="list_search_ticket_open" class="table display compact fixed_header" width="100%">
                <thead>
                  <tr>
                    <th>Go</th> 
                    <th>#Ticket</th>
                    <th style="padding-left: 80px;">Subject</th>
                  </tr>
                </thead>
                <tbody>             
                </tbody>
              </table>
            </div>



            <div class="col-md-4 well"> 
              <a href="<?= base_url()?>Ticket/Ticket_StatusView/closed" style="color:black"><legend style="font-size: 16px;"><b> Ticket Closed </b></legend></a>
              <table id="list_search_ticket_closed" class="table display compact fixed_header" width="100%">
                <thead>
                  <tr>
                    <th>Go</th> 
                    <th>#Ticket</th>
                    <th style="padding-left: 80px;">Subject</th>
                  </tr>
                </thead>
                <tbody>             
                </tbody>
              </table>
            </div>


            <div class="col-md-4 well2"> 
              <legend style="font-size: 16px;"><b> Problem Activites </b></legend>
              <table id="list_search_ticket_problem" class="table display compact fixed_header2" width="100%">
                <thead>
                  <tr>
                    <th>Total</th>
                    <th style="padding-left: 100px;">Problem </th>
                  </tr>
                </thead>
                <tbody>             
                </tbody>
              </table>
            </div>

            <div class="col-md-4 well2"> 
              <legend style="font-size: 16px;"><b> Customer Ticket </b></legend>
              <table id="list_search_data" display compact fixed_header2" width="100%">
                <thead>
                  <tr>
                    <th >Customer</th>
                    <th style="padding-right: 10px;">N</th>
                    <th style="padding-right: 10px;">O</th>
                    <th style="padding-right: 10px;">P</th> 
                    <th style="padding-right: 10px;">C</th> 
                  </tr>
                </thead>
                <tbody id="dataList">             
                </tbody>
              </table>
            </div>

            <div class="col-md-4 well2">
              <legend style="font-size: 16px;"><b> Duration Ticket </b></legend>
              <table id="list_search_duration_data" class="table display compact">
                <thead>
                  <tr>
                    <th>Escalation / Duration </th>
                    <th><center>Total TRs</center></th>
                  </tr>
                </thead>
                <tbody id="dataList_duration">             
                </tbody>
              </table>
            </div>
          </div>

          <div class="col-md-12">
            
          </div>

        </div>

      </div>

      


      <div class="col-md-2 well">
        <?= search_ticket(); ?>
        <?= lookup_widget_digital_watch(); ?>
        <?= lookup_knowledgebase_view(); ?>
        <?= list_top10_problem(); ?>
        <?= lookup_calendar_view(); ?>
        <?= lookup_widget_branch(); ?>
        <?= lookup_widget_latest_open_ticket(); ?>
        <?//= lookup_widget_system(); ?>
      </div>



    </section>
</div>


<script type="text/javascript">
  function create_ticket()
  {
    window.location.href="<?=base_url()?>Ticket/CreateTicket_Email";
  }
</script>

<script type="text/javascript">
  var ctx = document.getElementById("barQueu");
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ["App", "Net", "Hard", "Soft",'Help'],
      datasets: [{
        label: '# Today Ticket Queu',
        data: [<?= today_ticket_application() ?>, <?= today_ticket_network() ?>, <?= today_ticket_hardware() ?>, <?= today_ticket_software() ?>,<?= today_ticket_helpdesk() ?>],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(153, 102, 255, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      scales: {
        xAxes: [{
          ticks: {
            maxRotation: 90,
            minRotation: 80
          }
        }],
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
</script>

<script type="text/javascript">
  var ctx = document.getElementById("barTicket");
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ["New", "Open", "Pending", "Closed"],
      datasets: [{
        label: '# Today Ticket Activities',
        data: [<?=today_ticket_new()?>, <?=today_ticket_open()?>, <?=today_ticket_pending()?>, <?=today_ticket_closed()?>],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      scales: {
        xAxes: [{
          ticks: {
            maxRotation: 90,
            minRotation: 80
          }
        }],
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
</script>

<script type="text/javascript">
  var ctx = document.getElementById("bar7Ticket");
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ["New", "Open", "Pending", "Closed"],
      datasets: [{
        label: '# Last 7 Day Activities',
        data: [<?=t7_ticket_new()?>, <?=t7_ticket_open()?>, <?=t7_ticket_pending()?>, <?=t7_ticket_closed()?>],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      scales: {
        xAxes: [{
          ticks: {
            maxRotation: 90,
            minRotation: 80
          }
        }],
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
</script>



<script type="text/javascript">
  $("#duration_select").change(function(){


      var value = $("#duration_select").val();
      if(value){
        if(value=='24'){
          <?php 
                date_default_timezone_set("Asia/Kuala_Lumpur");
                $timeReg =date("H:i:s");
                $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
                $datetime = $dateReg.' '.$timeReg; //current date 
          ?>
          var datetime = "<?= $datetime ?>";

          <?php 
                date_default_timezone_set("Asia/Kuala_Lumpur");
                $timeReg =date("H:i:s");
                $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
                $datetime = $dateReg.' '.$timeReg; //current date 
                $last_24 = date("Y-m-d H:i:s", strtotime('-24 hours', strtotime($datetime)));
          ?>
          var last_24 = "<?= $last_24 ?>";

          var input_1 = datetime;
          var input_2 = last_24; 
        }

        if(value=='7'){
          <?php 
                date_default_timezone_set("Asia/Kuala_Lumpur");
                $timeReg =date("H:i:s");
                $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
                $datetime = $dateReg.' '.$timeReg; //current date 
          ?>
          var datetime = "<?= $datetime ?>";

          <?php 
                date_default_timezone_set("Asia/Kuala_Lumpur");
                $timeReg =date("H:i:s");
                $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
                $datetime = $dateReg.' '.$timeReg; //current date 
                $last_7 = date("Y-m-d H:i:s", strtotime('-7 days', strtotime($datetime)));
          ?>
          var last_7 = "<?= $last_7 ?>";

          var input_1 = datetime;
          var input_2 = last_7;
        }
        

        if(value=='30'){
          <?php 
                date_default_timezone_set("Asia/Kuala_Lumpur");
                $timeReg =date("H:i:s");
                $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
                $datetime = $dateReg.' '.$timeReg; //current date 
          ?>
          var datetime = "<?= $datetime ?>";

          <?php 
                date_default_timezone_set("Asia/Kuala_Lumpur");
                $timeReg =date("H:i:s");
                $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
                $datetime = $dateReg.' '.$timeReg; //current date 
                $last_30 = date("Y-m-d H:i:s", strtotime('-30 days', strtotime($datetime)));
          ?>
          var last_30 = "<?= $last_30 ?>";

          var input_1 = datetime;
          var input_2 = last_30;
        }


        if(value=='')
        {
          $("#input_1").val('');
          $("#input_1_clone").val('');

          $("#input_2").val('');
          $("#input_2_clone").val('');
        } else {
          $("#input_1").val(input_2);
          $("#input_1_clone").val(input_2);

          $("#input_2").val(input_1);
          $("#input_2_clone").val(input_1);
        }
      } else {

      }

      $("#search_data").click(function (){

        $("#defaultView").hide();
        $("#searchView").show();

        var input_1 = $("#input_1").val();
        var input_2 = $("#input_2").val();
        list_customer();
        count_duration();
        list_ticket_new();
        list_ticket_open();
        list_ticket_closed();
        list_ticket_problem();
        // list_customer();
        // list_portion(); 
        // count_duration();
      });

      

  });
</script>


<link rel="stylesheet" href="<?php echo base_url('asset/datatables/dataTables.bootstrap.css') ?>"/>



<style>
    .dataTables_wrapper {
        min-height: 500px
    }
    
    .dataTables_processing {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        margin-left: -50%;
        margin-top: -25px;
        padding-top: 20px;
        text-align: center;
        font-size: 1.2em;
        color:grey;
    }
</style>   

<script src="<?php echo base_url('asset/datatables/jquery.dataTables.js') ?>" ></script>
<script src="<?php echo base_url('asset/datatables/dataTables.bootstrap.js') ?>"></script>

<!-- Customer Ticket -->
<script type="text/javascript">

  $(document).ready(function (){
    $("#duration_select").val('');
    $("#input_1").val('');
    $("#input_2").val('');
  });

  $(function () {
      $("#list_search_data").DataTable()
  })

  function list_customer(){
    
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

        var input_1 = $("#input_1").val();
        var input_2 = $("#input_2").val();

        var send_param =  {
                            'input_1':input_1,
                            'input_2':input_2,
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
                return  ' <a onclick="detailTicket_master('+data+');" title="Edit User"> <i class="fa fa-edit" /> </i></a> ';
            }
            return data;
        };



        var delIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <a onclick="delUser('+data+');" title="Delete"> <i class="fa fa-trash" /> </i></a> ';
            }
            return data;
        };


        var centerIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <center>'+data+'</center>';
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
                var second;
                second = Math.floor(data%60);
                data = hour+' : '+ minute+' : '+second;
            }
            return data;
        };
        

        var t = $("#list_search_data").dataTable({

      "columnDefs": [
        { "searchable": false, "targets": 1 },
                { "searchable": false, "targets": 2 }
      ], //disable search for age


            

            destroy: true,
            searching: true,
            "scrollX": true, //tambah scroll
            responsive: true, // tambah responsive
            "showNEntries" : false,
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
            "searching": false,
            "bPaginate": false,
            'iDisplayLength': 100,
            "bInfo" : false,
            ajax: {
                      data: send_param,
                      "url": "<?=base_url()?>Dashboard/Dtable_Ticket_Customer", 
                      "type": "POST"
                  },
            columns: [
                // {
                //     "data": "id_group",
                //     "orderable": false
                // },
                {"data": "custID"},
                {"data": "NEW_TICKET",render:centerIcon},
                {"data": "OPEN_TICKET",render:centerIcon},
                {"data": "PENDING_TICKET",render:centerIcon},
                {"data": "CLOSED_TICKET",render:centerIcon}

            ],
            order: [[1, 'asc']],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                //$('td:eq(0)', row).html(index);
            },
            // for selected
            "fnDrawCallback": function(){
                  $('table#list_search_data td').bind('mouseenter', function () { $(this).parent().children().each(function(){$(this).addClass('datatablerowhighlight');}); });
                  $('table#list_search_data td').bind('mouseleave', function () { $(this).parent().children().each(function(){$(this).removeClass('datatablerowhighlight');}); });
            }
        });
  }

  function detailTicket_master(id)
  {
    var base_url = "<?= base_url()?>";
    window.location.href = base_url+'Ticket/MS_Detail_Ticket/'+id;
  }
</script>
<!-- END -->


<script type="text/javascript">
  function count_duration()
  {
    var input_1 = $("#input_1").val();
    var input_2 = $("#input_2").val();
    
    var data =  {
                  'input_1':input_1,
                  'input_2':input_2
                }

    $.ajax({
                url: "<?= base_url() ?>Dashboard/count_duration",
                type: "POST",
                dataType: "html",
                data: data,
                beforeSend: function() {

                },
                success: function(response){
                  $("#dataList_duration").html(response);
                }
        });
  }
</script>


<!-- New Ticket -->
<script type="text/javascript">
  $(function () {
      $("#list_search_ticket_new").DataTable()
  })

  function list_ticket_new(){
    
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

        var input_1 = $("#input_1").val();
        var input_2 = $("#input_2").val();

        var send_param =  {
                            'input_1':input_1,
                            'input_2':input_2,
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
                var data = "'"+data+"'";
                return  ' <a onclick="detailTicket_new('+data+');" title="View Ticket"> <i class="fa fa-edit" /> </i></a> ';
            }
            return data;
        };



        var delIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <a onclick="delUser('+data+');" title="Delete"> <i class="fa fa-trash" /> </i></a> ';
            }
            return data;
        };


        var centerIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <center>'+data+'</center>';
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
                var second;
                second = Math.floor(data%60);
                data = hour+' : '+ minute+' : '+second;
            }
            return data;
        };
        

        var t = $("#list_search_ticket_new").dataTable({

      "columnDefs": [
        { "searchable": false, "targets": 0 },
                { "searchable": false, "targets": 1 }
      ], //disable search for age


            

            destroy: true,
            searching: true,
            "scrollX": true, //tambah scroll
            responsive: true, // tambah responsive
            "showNEntries" : false,
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
            "bPaginate": false,
            'iDisplayLength': 100,
            ajax: {
                      data: send_param,
                      "url": "<?=base_url()?>Dashboard/Dashboardv2_Ticket_New", 
                      "type": "POST"
                  },
            columns: [
                // {
                //     "data": "id_group",
                //     "orderable": false
                // },
                {"data": "id_ticket",render:detailTicket},
                {"data": "id_ticket"},
                {"data": "title"}

            ],
            order: [[1, 'asc']],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                //$('td:eq(0)', row).html(index);
            },
            // for selected
            "fnDrawCallback": function(){
                  $('table#list_search_ticket_new td').bind('mouseenter', function () { $(this).parent().children().each(function(){$(this).addClass('datatablerowhighlight');}); });
                  $('table#list_search_ticket_new td').bind('mouseleave', function () { $(this).parent().children().each(function(){$(this).removeClass('datatablerowhighlight');}); });
            }
        });
  }

  function detailTicket_new(id)
  {
    var base_url = "<?= base_url()?>";
    window.location.href = base_url+'Ticket/Ticket_DetailTicket/'+id;
  }
</script>
<!-- END -->


<!-- Open Ticket -->
<script type="text/javascript">
  $(function () {
      $("#list_search_ticket_open").DataTable()
  })

  function list_ticket_open(){
    
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

        var input_1 = $("#input_1").val();
        var input_2 = $("#input_2").val();

        var send_param =  {
                            'input_1':input_1,
                            'input_2':input_2,
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
                var data = "'"+data+"'";
                return  ' <a onclick="detailTicket_open('+data+');" title="View Ticket"> <i class="fa fa-edit" /> </i></a> ';

                Ticket_DetailTicket
            }
            return data;
        };



        var delIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <a onclick="delUser('+data+');" title="Delete"> <i class="fa fa-trash" /> </i></a> ';
            }
            return data;
        };


        var centerIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <center>'+data+'</center>';
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
                var second;
                second = Math.floor(data%60);
                data = hour+' : '+ minute+' : '+second;
            }
            return data;
        };
        

        var t = $("#list_search_ticket_open").dataTable({

      "columnDefs": [
        { "searchable": false, "targets": 0 },
                { "searchable": false, "targets": 1 }
      ], //disable search for age


            

            destroy: true,
            searching: true,
            "scrollX": true, //tambah scroll
            responsive: true, // tambah responsive
            "showNEntries" : false,
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
            "bPaginate": false,
            'iDisplayLength': 100,
            ajax: {
                      data: send_param,
                      "url": "<?=base_url()?>Dashboard/Dashboardv2_Ticket_Open", 
                      "type": "POST"
                  },
            columns: [
                // {
                //     "data": "id_group",
                //     "orderable": false
                // },
                {"data": "id_ticket",render:detailTicket},
                {"data": "id_ticket"},
                {"data": "title"}

            ],
            order: [[1, 'asc']],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                //$('td:eq(0)', row).html(index);
            },
            // for selected
            "fnDrawCallback": function(){
                  $('table#list_search_ticket_open td').bind('mouseenter', function () { $(this).parent().children().each(function(){$(this).addClass('datatablerowhighlight');}); });
                  $('table#list_search_ticket_open td').bind('mouseleave', function () { $(this).parent().children().each(function(){$(this).removeClass('datatablerowhighlight');}); });
            }
        });
  }

  function detailTicket_open(id)
  {
    var base_url = "<?= base_url()?>";
    window.location.href = base_url+'Ticket/Ticket_DetailTicket/'+id;
  }
</script>
<!-- END -->



<!-- Closed Ticket -->
<script type="text/javascript">
  $(function () {
      $("#list_search_ticket_closed").DataTable({
        "searching": false
      })
  })

  function list_ticket_closed(){
    
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

        var input_1 = $("#input_1").val();
        var input_2 = $("#input_2").val();

        var send_param =  {
                            'input_1':input_1,
                            'input_2':input_2,
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
                var data = "'"+data+"'";
                return  ' <a onclick="detailTicket_closed('+data+');" title="View Ticket"> <i class="fa fa-edit" /> </i></a> ';
            }
            return data;
        };



        var delIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <a onclick="delUser('+data+');" title="Delete"> <i class="fa fa-trash" /> </i></a> ';
            }
            return data;
        };


        var centerIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <center>'+data+'</center>';
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
                var second;
                second = Math.floor(data%60);
                data = hour+' : '+ minute+' : '+second;
            }
            return data;
        };
        

        var t = $("#list_search_ticket_closed").dataTable({

      "columnDefs": [
        { "searchable": false, "targets": 1 },
                { "searchable": false, "targets": 2 }
        ], //disable search for age


            

            destroy: true,
            searching: false,
            "scrollX": true, //tambah scroll
            responsive: true, // tambah responsive
            "showNEntries" : false,
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
            "bPaginate": false,
            'iDisplayLength': 100,
            ajax: {
                      data: send_param,
                      "url": "<?=base_url()?>Dashboard/Dashboardv2_Ticket_Closed", 
                      "type": "POST"
                  },
            columns: [
                // {
                //     "data": "id_group",
                //     "orderable": false
                // },
                {"data": "id_ticket",render:detailTicket},
                {"data": "id_ticket"},
                {"data": "title"}

            ],
            order: [[1, 'asc']],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                //$('td:eq(0)', row).html(index);
            },
            // for selected
            "fnDrawCallback": function(){
                  $('table#list_search_ticket_closed td').bind('mouseenter', function () { $(this).parent().children().each(function(){$(this).addClass('datatablerowhighlight');}); });
                  $('table#list_search_ticket_closed td').bind('mouseleave', function () { $(this).parent().children().each(function(){$(this).removeClass('datatablerowhighlight');}); });
            }
        });
  }

  function detailTicket_closed(id)
  {
    var base_url = "<?= base_url()?>";
    window.location.href = base_url+'Ticket/Ticket_DetailTicket/'+id;
  }
</script>
<!-- END -->


<!-- Problem Ticket -->
<script type="text/javascript">
  $(function () {
      $("#list_search_ticket_problem").DataTable()
  })

  function list_ticket_problem(){
    
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

        var input_1 = $("#input_1").val();
        var input_2 = $("#input_2").val();

        var send_param =  {
                            'input_1':input_1,
                            'input_2':input_2,
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
                return  ' <a onclick="detailTicket_master('+data+');" title="Edit User"> <i class="fa fa-edit" /> </i></a> ';
            }
            return data;
        };



        var delIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <a onclick="delUser('+data+');" title="Delete"> <i class="fa fa-trash" /> </i></a> ';
            }
            return data;
        };


        var centerIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <center>'+data+'</center>';
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
                var second;
                second = Math.floor(data%60);
                data = hour+' : '+ minute+' : '+second;
            }
            return data;
        };
        

        var t = $("#list_search_ticket_problem").dataTable({

            "columnDefs": [ {
                "searchable": true, "targets": 1 ,
                targets: 1,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).css('padding-left', '130px');
                },
            } ],
            
                
            destroy: true,
            searching: true,
            "scrollX": true, //tambah scroll
            responsive: true, // tambah responsive
            "showNEntries" : false,
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
            "searching": false,
            "bPaginate": false,
            'iDisplayLength': 100,
            "bInfo" : false,
            ajax: {
                      data: send_param,
                      "url": "<?=base_url()?>Dashboard/Dashboardv2_Ticket_Problem", 
                      "type": "POST"
                  },
            columns: [
                // {
                //     "data": "id_group",
                //     "orderable": false
                // },
                {"data": "total"},
                {"data": "problem_desc_itsm"}

            ],
            order: [[1, 'asc']],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                //$('td:eq(0)', row).html(index);
            },
            // for selected
            "fnDrawCallback": function(){
                  $('table#list_search_ticket_problem td').bind('mouseenter', function () { $(this).parent().children().each(function(){$(this).addClass('datatablerowhighlight');}); });
                  $('table#list_search_ticket_problem td').bind('mouseleave', function () { $(this).parent().children().each(function(){$(this).removeClass('datatablerowhighlight');}); });
            }
        });
  }

  function detailTicket_master(id)
  {
    var base_url = "<?= base_url()?>";
    window.location.href = base_url+'Ticket/MS_Detail_Ticket/'+id;
  }
</script>
<!-- END -->

<style type="text/css">
  .dataTables_wrapper {
      min-height: 250px;
  }
</style>