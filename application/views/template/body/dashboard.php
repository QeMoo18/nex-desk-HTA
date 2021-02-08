

<div class="content-wrapper">

	<section class="content">
		
		<?php $module = $this->session->userdata('idModule'); 
          //var_dump($module); 
    ?>
		


    <div class="row">



      <div class="col-md-12">
        <?= count_dashboard() ?>

        <div class="col-md-12">
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
              <label> Real Time </label>
              <button type="button" class="btn btn-primary btn-block" id="realtime_data"> Summarize 30 Min </button>
          </div>
        </div>  

        <br><br><br><br><br>

        <div class="col-md-9">

          <div id="inner_visual" class="inner_visual">
            <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" href="#visual"><span id="icon_summarize_down"><i class="fa fa-chevron-up" aria-hidden="true"></i> Summarize 30 Minutes Ticket Activities</span></a>
                      
                    </h4>

                  </div>
                  <div id="visual" class="panel-collapse collapse in">
                    <div class="panel-body">
                      

                      <script src="<?=base_url()?>asset/graph/Chart.bundle.js"></script>
                      <script src="<?=base_url()?>asset/graph/utils.js"></script>
                      <div class="box" id="visual_box">
                          
                          
                          <canvas id="speedChart"></canvas>

                          <script type="text/javascript">
                            $(document).ready(function (){
                                analytic_ticket();
                                setInterval(function(){ analytic_ticket_realtime(); }, 30000);
                            });

                            function analytic_ticket(){
                              var speedCanvas = document.getElementById("speedChart");

                              Chart.defaults.global.defaultFontFamily = "Lato";
                              Chart.defaults.global.defaultFontSize = 18;

                              <?= analytic_all_ticket() ?>

                              

                              var chartOptions = {
                                legend: {
                                  display: true,
                                  position: 'top',
                                  labels: {
                                    boxWidth: 80,
                                    fontColor: 'black'
                                  }
                                }
                              };

                              var lineChart = new Chart(speedCanvas, {
                                type: 'line',
                                data: xData,
                                options: chartOptions
                              });
                            }


                            function analytic_ticket_realtime(){
                                var data = 
                                        {   
                                            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                                        }

                                        
                                $.ajax({
                                        url: '<?= base_url() ?>Analytic/analytic_ticket_realtime',
                                        type: 'POST',
                                        dataType: 'html',
                                        data: data,
                                        beforeSend: function() {

                                        },
                                        success: function(response){
                                            $("#visual_box").html(response);
                                        }
                                });
                            }



                          </script>

                      </div>


                      <div class="box" id="loading_box" style="display: none">
                        <center>
                           <img src="https://netbramha.com/wp-content/uploads/2016/12/senior-front-end-developer-openings-1.gif"> 
                        </center>
                      </div>

                    </div>
                  </div>
                </div>
            </div>
          </div>
          <br>

          <div id="data_search" style="display: none">
            
            <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" href="#list_search"><span id="icon_customer_down"><i class="fa fa-chevron-up" aria-hidden="true"></i> Customer Ticket</span></a>
                    </h4>
                  </div>
                  <div id="list_search" class="panel-collapse collapse in">
                    <div class="panel-body">
                      
                      <div class="box">
                          <div class="box-header">
                            <h3 class="box-title">Customer Ticket</h3>
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                                  <table id="list_search_data" class="table table-bordered table-striped">
                                    <thead>
                                      <tr>
                                        <th>Customer</th>
                                        <th><center>New</center></th>
                                        <th><center>Open</center></th>
                                        <th><center>Pending</center></th> 
                                        <th><center>Closed</center></th> 
                                      </tr>
                                    </thead>
                                    <tbody id="dataList">             
                                    </tbody>
                                  </table>
                            </div>
                          <!-- /.box-body -->
                      </div>


                    </div>
                  </div>
                </div>
            </div>

            <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" href="#list_search_fault"><span id="icon_fault_down"><i class="fa fa-chevron-up" aria-hidden="true"></i> Fault Portion</span></a>
                    </h4>
                  </div>
                  <div id="list_search_fault" class="panel-collapse collapse in">
                    <div class="panel-body">
                      
                      <div class="box">
                          <div class="box-header">
                            <h3 class="box-title">Fault Portion</h3>
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                                  <table id="list_search_fault_data" class="table table-bordered table-striped">
                                    <thead>
                                      <tr>
                                        <th>Fault Portion </th>
                                        <th><center>Total TRs</center></th>
                                      </tr>
                                    </thead>
                                    <tbody id="dataList">             
                                    </tbody>
                                  </table>
                            </div>
                          <!-- /.box-body -->
                      </div>


                    </div>
                  </div>
                </div>
            </div>

            <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" href="#list_search_duration"><span id="icon_fault_down"><i class="fa fa-chevron-up" aria-hidden="true"></i> Duration Ticket </span></a>
                    </h4>
                  </div>
                  <div id="list_search_duration" class="panel-collapse collapse in">
                    <div class="panel-body">
                      
                      <div class="box">
                          <div class="box-header">
                            <h3 class="box-title">Duration Ticket</h3>
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                                  <table id="list_search_duration_data" class="table table-bordered table-striped">
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
                          <!-- /.box-body -->
                      </div>


                    </div>
                  </div>
                </div>
            </div>

          </div>

          <div id="ticket_info" style="display: none"> 
            <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" href="#collapse2"><span id="icon_new_down"><i class="fa fa-chevron-up" aria-hidden="true"></i> New Ticket</span></a>
                    </h4>
                  </div>
                  <div id="collapse2" class="panel-collapse collapse in">
                    <div class="panel-body">
                      
                      <div class="box">
                          <div class="box-header">
                            <h3 class="box-title">List New Ticket</h3>
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                                  <table id="mytable_new_ticket" class="table table-bordered table-striped">
                                    <thead>
                                      <tr>
                                        <th>Ticket No</th>
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
                          <!-- /.box-body -->
                      </div>


                    </div>
                  </div>
                </div>
            </div> 

            <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" href="#collapse1"><span id="icon_open_down"><i class="fa fa-chevron-up" aria-hidden="true"></i> Open Ticket</span></a>
                    </h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                      
                      <div class="box">
                          <div class="box-header">
                            <h3 class="box-title">List Open Ticket</h3>
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                                  <table id="mytable_open_ticket" class="table table-bordered table-striped">
                                    <thead>
                                      <tr>
                                        <th>Ticket No</th>
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
                          <!-- /.box-body -->
                      </div>


                    </div>
                  </div>
                </div>
            </div> 

            <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" href="#collapse3"><span id="icon_master_down"><i class="fa fa-chevron-up" aria-hidden="true"></i> Master Ticket</span></a>
                    </h4>
                  </div>
                  <div id="collapse3" class="panel-collapse collapse in">
                    <div class="panel-body">
                      
                      <div class="box">
                          <div class="box-header">
                            <h3 class="box-title">List Master Ticket</h3>
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                                <table id="mytable_master" class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                        <th>Ticket No</th>
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
                          <!-- /.box-body -->
                      </div>


                    </div>
                  </div>
                </div>
            </div>
          </div>


        </div>

        <div class="col-md-3 hidden-xs">
          <?= lookup_widget(); ?>           
        </div>

      </div>

    </div>



    </section>
</div>

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


<!-- Open Ticket -->
<script type="text/javascript">
  $(function () {
      $("#mytable_open_ticket").DataTable()
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
                var second;
                second = Math.floor(data%60);
                data = hour+' : '+ minute+' : '+second;
            }
            return data;
        };
        

        var t = $("#mytable_open_ticket").dataTable({

      "columnDefs": [
        { "searchable": false, "targets": 3 },
                { "searchable": false, "targets": 4 }
      ], //disable search for age
            destroy: true,
            searching: true,
            "scrollX": true, //tambah scroll
            responsive: true, // tambah responsive

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
                      "url": "<?=base_url()?>Ticket/Dtable_Ticket", 
                      "type": "POST"
                  },
            columns: [
                // {
                //     "data": "id_group",
                //     "orderable": false
                // },
                {"data": "id_no"},
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
                $('td:eq(0)', row).html(index);
            }
        });
  });

  function detailTicket(id)
  {
    var base_url = "<?= base_url()?>";
    window.location.href = base_url+'Ticket/Ticket_DetailTicket/'+id;
  }
</script>
<!-- END -->

<!-- New Ticket -->
<script type="text/javascript">
  $(function () {
      $("#mytable_new_ticket").DataTable()
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
                var second;
                second = Math.floor(data%60);
                data = hour+' : '+ minute+' : '+second;
            }
            return data;
        };
        

        var t = $("#mytable_new_ticket").dataTable({

      "columnDefs": [
        { "searchable": false, "targets": 3 },
                { "searchable": false, "targets": 4 }
      ], //disable search for age
            destroy: true,
            searching: true,
            "scrollX": true, //tambah scroll
            responsive: true, // tambah responsive

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
                      "url": "<?=base_url()?>Ticket/Dtable_Ticket_New", 
                      "type": "POST"
                  },
            columns: [
                // {
                //     "data": "id_group",
                //     "orderable": false
                // },
                {"data": "id_no"},
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
                $('td:eq(0)', row).html(index);
            }
        });
  });

  function detailTicket(id)
  {
    var base_url = "<?= base_url()?>";
    window.location.href = base_url+'Ticket/Ticket_DetailTicket/'+id;
  }
</script>
<!-- END -->

<!-- Master Ticket -->
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
        

        var t = $("#mytable_master").dataTable({

      "columnDefs": [
        { "searchable": false, "targets": 3 },
                { "searchable": false, "targets": 4 }
      ], //disable search for age
            destroy: true,
            searching: true,
            "scrollX": true, //tambah scroll
            responsive: true, // tambah responsive

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
                      "url": "<?=base_url()?>Ticket/Dtable_Ticket_Master", 
                      "type": "POST"
                  },
            columns: [
                // {
                //     "data": "id_group",
                //     "orderable": false
                // },
                {"data": "id_no"},
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
                $('td:eq(0)', row).html(index);
            }
        });
  });

  function detailTicket_master(id)
  {
    var base_url = "<?= base_url()?>";
    window.location.href = base_url+'Ticket/MS_Detail_Ticket/'+id;
  }
</script>
<!-- END -->

<script type="text/javascript">
  $("#icon_new_down").click(function (){
      var html = $("#icon_new_down").html();
      if(html=='<i class="fa fa-chevron-down" aria-hidden="true"></i> New Ticket')
      {
        $("#icon_new_down").html('<i class="fa fa-chevron-up" aria-hidden="true"></i> New Ticket');
      } else {
        $("#icon_new_down").html('<i class="fa fa-chevron-down" aria-hidden="true"></i> New Ticket');
      }
  });
  $("#icon_open_down").click(function (){
      var html = $("#icon_master_down").html();
      if(html=='<i class="fa fa-chevron-down" aria-hidden="true"></i> Open Ticket')
      {
        $("#icon_open_down").html('<i class="fa fa-chevron-up" aria-hidden="true"></i> Open Ticket');
      } else {
        $("#icon_open_down").html('<i class="fa fa-chevron-down" aria-hidden="true"></i> Open Ticket');
      }
  });
  $("#icon_master_down").click(function (){
      var html = $("#icon_master_down").html();
      if(html=='<i class="fa fa-chevron-down" aria-hidden="true"></i> Master Ticket')
      {
        $("#icon_master_down").html('<i class="fa fa-chevron-up" aria-hidden="true"></i> Master Ticket');
      } else {
        $("#icon_master_down").html('<i class="fa fa-chevron-down" aria-hidden="true"></i> Master Ticket');
      }
  });
  $("#icon_customer_down").click(function (){
      var html = $("#icon_customer_down").html();
      if(html=='<i class="fa fa-chevron-down" aria-hidden="true"></i> Customer Ticket')
      {
        $("#icon_customer_down").html('<i class="fa fa-chevron-up" aria-hidden="true"></i> Customer Ticket');
      } else {
        $("#icon_customer_down").html('<i class="fa fa-chevron-down" aria-hidden="true"></i> Customer Ticket');
      }
  });
  $("#icon_fault_down").click(function (){
      var html = $("#icon_fault_down").html();
      if(html=='<i class="fa fa-chevron-down" aria-hidden="true"></i> Fault Portion')
      {
        $("#icon_fault_down").html('<i class="fa fa-chevron-up" aria-hidden="true"></i> Fault Portion');
      } else {
        $("#icon_fault_down").html('<i class="fa fa-chevron-down" aria-hidden="true"></i> Fault Portion');
      }
  });

  $("#icon_summarize_down").click(function (){
      var html = $("#icon_summarize_down").html();
      if(html=='<i class="fa fa-chevron-down" aria-hidden="true"></i> Fault Portion')
      {
        $("#icon_summarize_down").html('<i class="fa fa-chevron-up" aria-hidden="true"></i> Summarize Ticket Activities');
      } else {
        $("#icon_summarize_down").html('<i class="fa fa-chevron-down" aria-hidden="true"></i> Summarize Ticket Activities');
      }
  });
</script>


<!-- Customer Ticket -->
<script type="text/javascript">
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
        { "searchable": false, "targets": 3 },
                { "searchable": false, "targets": 4 }
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

  $(document).ready(function (){
    list_customer();
  });

  function detailTicket_master(id)
  {
    var base_url = "<?= base_url()?>";
    window.location.href = base_url+'Ticket/MS_Detail_Ticket/'+id;
  }
</script>
<!-- END -->

<!-- Portion Ticket -->
<script type="text/javascript">
  $(function () {
      $("#list_search_fault_data").DataTable()
  })

  function list_portion(){
    
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
        

        var t = $("#list_search_fault_data").dataTable({

      "columnDefs": [
        { "searchable": false, "targets": 0 },
                { "searchable": false, "targets": 0 }
      ], //disable search for age
            destroy: true,
            searching: true,
            "scrollX": true, //tambah scroll
            responsive: true, // tambah responsive

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
                      "url": "<?=base_url()?>Dashboard/Dtable_Ticket_Portion", 
                      "type": "POST"
                  },
            columns: [
                // {
                //     "data": "id_group",
                //     "orderable": false
                // },
                {"data": "Portion"},
                {"data": "TOTAL",render:centerIcon}

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
                  $('table#list_search_fault_data td').bind('mouseenter', function () { $(this).parent().children().each(function(){$(this).addClass('datatablerowhighlight');}); });
                  $('table#list_search_fault_data td').bind('mouseleave', function () { $(this).parent().children().each(function(){$(this).removeClass('datatablerowhighlight');}); });
            }
        });
  }

  $(document).ready(function (){
    list_portion();
  });

  function detailTicket_master(id)
  {
    var base_url = "<?= base_url()?>";
    window.location.href = base_url+'Ticket/MS_Detail_Ticket/'+id;
  }
</script>
<!-- END -->






<script type="text/javascript">
  $(document).ready(function (){
    count_duration();
  });

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

        $("#inner_visual").hide();
        $("#data_search").show();

        var input_1 = $("#input_1").val();
        var input_2 = $("#input_2").val();
        list_customer();
        list_portion(); 
        count_duration();
      });

      

  });

  $("#realtime_data").click(function (){
        
    $("#loading_box").show();
    $("#visual_box").hide();


    $("#inner_visual").show();
    $("#data_search").hide();

    setInterval(function(){ show_box(); }, 5000);


    // analytic_ticket();
  });

  function show_box()
  {
    $("#loading_box").hide();
    $("#visual_box").show();
  }

  $("#search_data").click(function (){
    var input_1 = $("#input_1").val();
    var input_2 = $("#input_2").val();
    list_customer();
    list_portion(); 
    count_duration();
  });
</script>



