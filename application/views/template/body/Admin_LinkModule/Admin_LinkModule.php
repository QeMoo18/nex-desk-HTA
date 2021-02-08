

<!-- DataTables -->
<link rel="stylesheet" href="http://localhost:8000/nexticks2/asset_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="content-wrapper">
	<section class="content">
        <h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Group Management </h5>
		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
				<a href="<?= base_url()?>Admin/Admin_ViewLink_Agent"> <button class="btn btn-success btn-block"> Go To Overview </button> </a>
				</div>
			</div>
			<div class="col-md-10">

				<div class="box box-success">
		          <div class="box-header with-border">
		            
		          	<div class="row">
                        <div class="col-md-8"> 
                            <h3 class="box-title"> <b>Group Link Module <span id="title"></span></b></h3>
                        </div>
                        <div align="right" class="col-md-4"> 
                            <select class="form-control" name="select_group" id="select_group">
                                <option value="">-- Select Group --</option>
                                <?= lookup_group() ?>
                            </select> 
                        </div>
                    </div>

		          </div>
		          <div class="box-body">
		          	<table id="mytable2" class="table table-bordered table-striped">
		            	<thead>
		            		<tr>
					      
							
						    	<th><center>Customer</center></th>        
							
						    	<th><center>Ticket</center></th>        
							
						    	<th><center>Service</center></th>        
							
						    	<th><center>CMDB</center></th>        
							
						    	<th><center>Report</center></th>        
							
						    	<th><center>Admin</center></th>

                                <th><center>PPM_Team</center></th>      

                                <th><center>PPM_Verify</center></th>  

                                <th><center>PPM_Endorse</center></th>

                                <th><center>PPM_Verify_Network_Server</center></th>

                                
				
							</tr>
							</thead>
							<tbody id="dataList">	            
				            </tbody>
			        </table>
                    <hr><br>
                    <div class="row">
    			        <div class="form-group col-md-6">
    	                    <button type="submit" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
    	                </div>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary btn-block" onclick="submit();">Save</button>
                        </div>
				    </div>

				</div>
			</div>
		</div>
	</section>
</div>

<input type="hidden" name="select_group_hidden" id="select_group_hidden">

<script src="<?=base_url()?>asset_admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>asset_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(function () {
	    $("#mytable2").DataTable()
	});

	$(document).ready(function (){
		var option = "<?= $this->uri->segment(3)?>";
		$('#select_group').val(option).change()
	});

	function list(group){
		
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
        					'group':group,
                            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                          };

        var editIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <center><a onclick="editUser('+data+');" title="Edit User"> <i class="fa fa-edit" /> </i></a></center> ';
            }
            return data;
        };

        var delIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <center><a onclick="delUser('+data+');" title="Delete"> <i class="fa fa-trash" /> </i></a></center> ';
            }
            return data;
        };

        var Customer = function ( data, type, row ) {
            if ( type === 'display' ) {
                return '<center><input type="checkbox" value="'+data+'" class="Customer_ID" name="Customer_ID"></center> ';
            }
            return data;
        };

        var Ticket = function ( data, type, row ) {
            if ( type === 'display' ) {
                return '<center><input type="checkbox" value="'+data+'" class="Ticket_ID" name="Ticket_ID"></center> ';
            }
            return data;
        };

        var Service = function ( data, type, row ) {
            if ( type === 'display' ) {
                return '<center><input type="checkbox" value="'+data+'" class="Service_ID" name="Service_ID"></center> ';
            }
            return data;
        };

        var CMDB = function ( data, type, row ) {
            if ( type === 'display' ) {
                return '<center><input type="checkbox" value="'+data+'" class="CMDB_ID" name="CMDB_ID"></center> ';
            }
            return data;
        };

        var Report = function ( data, type, row ) {
            if ( type === 'display' ) {
                return '<center><input type="checkbox" value="'+data+'" class="Report_ID" name="Report_ID"></center> ';
            }
            return data;
        };

        var Admin = function ( data, type, row ) {
            if ( type === 'display' ) {
                return '<center><input type="checkbox" value="'+data+'" class="Admin_ID" name="Admin_ID"></center> ';
            }
            return data;
        };


        var PPM_TEAM = function ( data, type, row ) {
            if ( type === 'display' ) {
                return '<center><input type="checkbox" value="'+data+'" class="PPM_TEAM" name="PPM_TEAM"></center> ';
            }
            return data;
        };



        var PPM_Verify = function ( data, type, row ) {
            if ( type === 'display' ) {
                return '<center><input type="checkbox" value="'+data+'" class="PPM_Verify" name="PPM_Verify"></center> ';
            }
            return data;
        };


        var PPM_Endorse = function ( data, type, row ) {
            if ( type === 'display' ) {
                return '<center><input type="checkbox" value="'+data+'" class="PPM_Endorse" name="PPM_Endorse"></center> ';
            }
            return data;
        };


        var PPM_Verify_Network_Server = function ( data, type, row ) {
            if ( type === 'display' ) {
                return '<center><input type="checkbox" value="'+data+'" class="PPM_Verify_Network_Server" name="PPM_Verify_Network_Server"></center> ';
            }
            return data;
        };

        var t = $("#mytable2").dataTable({

            destroy: true,
            searching: false,

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
                      "url": "<?=base_url()?>Admin/Dtable_Agent_LinkModule", 
                      "type": "POST",
                      "dataSrc": function ( json ) {
                            //Make your callback here.
                            check_list_module_customer();
                            check_list_module_ticket();
							check_list_module_service();
							check_list_module_cmdb();
							check_list_module_report();
							check_list_module_admin();
                            check_list_module_ppm_team();
                            check_list_module_ppm_verify();
                            check_list_module_ppm_endorse();
                            check_list_module_ppm_verify_network_server();

                            //alert("Done!");
                            return json.data;

                       } 
                  },
            columns: [
                {"data": "id_customer",render:Customer},
                {"data": "id_ticket", render:Ticket},
                {"data": "id_service", render:Service},
                {"data": "id_cmdb", render:CMDB},
                {"data": "id_report", render:Report},
                {"data": "id_admin", render:Admin},
                {"data": "id_ppm_team", render:PPM_TEAM},
                {"data": "id_ppm_verify", render:PPM_Verify},
                {"data": "id_ppm_endorse", render:PPM_Endorse},
                {"data": "id_ppm_verify_network_server", render:PPM_Verify_Network_Server},

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
	}
	


	function submit()
	{	
  		var id_customer;
        $('[name="Customer_ID"]:checked').each(function () {
		    // do stuff
		    id_customer = $("input[name='Customer_ID']").val();
            
		});

        var id_ticket;
		$('[name="Ticket_ID"]:checked').each(function () {
		    // do stuff
		    id_ticket = $("input[name='Ticket_ID']").val();
            
		});

		var id_service;
		$('[name="Service_ID"]:checked').each(function () {
		    // do stuff
		    id_service = $("input[name='Service_ID']").val();
            
		});

		var id_cmdb;
		$('[name="CMDB_ID"]:checked').each(function () {
		    // do stuff
		    id_cmdb = $("input[name='CMDB_ID']").val();
            
		});


		var id_report;
		$('[name="Report_ID"]:checked').each(function () {
		    // do stuff
		    id_report = $("input[name='Report_ID']").val();
            
		});

		var id_admin;
		$('[name="Admin_ID"]:checked').each(function () {
		    // do stuff
		    id_admin = $("input[name='Admin_ID']").val();
            
		});


        var id_ppm_team;
        $('[name="PPM_TEAM"]:checked').each(function () {
            // do stuff
            id_ppm_team = $("input[name='PPM_TEAM']").val();
            
        });


        var id_ppm_verify;
        $('[name="PPM_Verify"]:checked').each(function () {
            // do stuff
            id_ppm_verify = $("input[name='PPM_Verify']").val();
            
        });


        var id_ppm_endorse;
        $('[name="PPM_Endorse"]:checked').each(function () {
            // do stuff
            id_ppm_endorse = $("input[name='PPM_Endorse']").val();
            
        });


        var id_ppm_verify_network_server;
        $('[name="PPM_Verify_Network_Server"]:checked').each(function () {
            // do stuff
            id_ppm_verify_network_server = $("input[name='PPM_Verify_Network_Server']").val();
            
        });


        console.log(id_ppm_verify_network_server);


		var group = $("#select_group").val();

		var data =  {
                         'group':group,
                         'id_customer':id_customer,
                         'id_ticket':id_ticket,
                         'id_service':id_service,
                         'id_cmdb':id_cmdb,
                         'id_report':id_report,
                         'id_admin':id_admin,
                         'id_ppm_team':id_ppm_team,
                         'id_ppm_verify':id_ppm_verify,
                         'id_ppm_endorse':id_ppm_endorse,
                         'id_ppm_verify_network_server':id_ppm_verify_network_server,
                         '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                        
                $.ajax({
                        url: '<?= base_url() ?>Admin/add_link_module',
                        type: 'POST',
                        dataType: 'html',
                        data: data,
                        beforeSend: function() {

                        },
                        success: function(response){
                        	location.reload();
                            var url = "<?= base_url()?>Admin/Admin_ViewLink_Agent";
                            window.location.href = url;
                        }
                });

	}

	$("#select_group").change(function (){

		var group = $("#select_group").val();
		if(group==''){
			$("#title").html('');
		} else {
			$("#title").html(' : '+group);	
		}
		list(group);
		$("#select_group_hidden").val(group);
		//var module = 'Customer';
		//check_list_module_customer(group,module);
	});

	function check_list_module_customer()
    {
    	var module = 'Customer';
    	var group = $("#select_group_hidden").val();
        var data =  {
                         'group':group,
                         'module':module,
                         '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                        
                $.ajax({
                        url: '<?= base_url() ?>Admin/check_list_module_customer',
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                        beforeSend: function() {

                        },
                        success: function(response){

                                var checkedValue = null; 
                                var inputElements = document.getElementsByClassName('Customer_ID');
                                for(var i=0; inputElements[i]; ++i){

                                      cbox = inputElements[i].value;
                                      //alert(checkedValue);
                                      $.each(response, function(index) {
                                            var agent = response[index].agent;
                                            //alert(agent);
                                            if(agent===cbox){
                                                //alert("True");
                                                $(".Customer_ID").attr("checked", true);
                                            } else {
                                                //alert("False");
                                            }
                                      });

                                }

                        }
                });
    }
    function check_list_module_ticket()
    {
    	var module = 'Ticket';
    	var group = $("#select_group_hidden").val();
        var data =  {
                         'group':group,
                         'module':module,
                         '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                        
                $.ajax({
                        url: '<?= base_url() ?>Admin/check_list_module_ticket',
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                        beforeSend: function() {

                        },
                        success: function(response){

                                var checkedValue = null; 
                                var inputElements = document.getElementsByClassName('Ticket_ID');
                                for(var i=0; inputElements[i]; ++i){

                                      cbox = inputElements[i].value;
                                      //alert(checkedValue);
                                      $.each(response, function(index) {
                                            var agent = response[index].agent;
                                            //alert(agent);
                                            if(agent===cbox){
                                                //alert("True");
                                                $(".Ticket_ID").attr("checked", true);
                                            } else {
                                                //alert("False");
                                            }
                                      });

                                }

                        }
                });
    }
    function check_list_module_service()
    {
    	var module = 'Service';
    	var group = $("#select_group_hidden").val();
        var data =  {
                         'group':group,
                         'module':module,
                         '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                        
                $.ajax({
                        url: '<?= base_url() ?>Admin/check_list_module_service',
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                        beforeSend: function() {

                        },
                        success: function(response){

                                var checkedValue = null; 
                                var inputElements = document.getElementsByClassName('Service_ID');
                                for(var i=0; inputElements[i]; ++i){

                                      cbox = inputElements[i].value;
                                      //alert(checkedValue);
                                      $.each(response, function(index) {
                                            var agent = response[index].agent;
                                            //alert(agent);
                                            if(agent===cbox){
                                                //alert("True");
                                                $(".Service_ID").attr("checked", true);
                                            } else {
                                                //alert("False");
                                            }
                                      });

                                }

                        }
                });
    }
    function check_list_module_cmdb()
    {
    	var module = 'CMDB';
    	var group = $("#select_group_hidden").val();
        var data =  {
                         'group':group,
                         'module':module,
                         '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                        
                $.ajax({
                        url: '<?= base_url() ?>Admin/check_list_module_cmdb',
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                        beforeSend: function() {

                        },
                        success: function(response){

                                var checkedValue = null; 
                                var inputElements = document.getElementsByClassName('CMDB_ID');
                                for(var i=0; inputElements[i]; ++i){

                                      cbox = inputElements[i].value;
                                      //alert(checkedValue);
                                      $.each(response, function(index) {
                                            var agent = response[index].agent;
                                            //alert(agent);
                                            if(agent===cbox){
                                                //alert("True");
                                                $(".CMDB_ID").attr("checked", true);
                                            } else {
                                                //alert("False");
                                            }
                                      });

                                }

                        }
                });
    }
    function check_list_module_report()
    {
    	var module = 'Report';
    	var group = $("#select_group_hidden").val();
        var data =  {
                         'group':group,
                         'module':module,
                         '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                        
                $.ajax({
                        url: '<?= base_url() ?>Admin/check_list_module_report',
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                        beforeSend: function() {

                        },
                        success: function(response){

                                var checkedValue = null; 
                                var inputElements = document.getElementsByClassName('Report_ID');
                                for(var i=0; inputElements[i]; ++i){

                                      cbox = inputElements[i].value;
                                      //alert(checkedValue);
                                      $.each(response, function(index) {
                                            var agent = response[index].agent;
                                            //alert(agent);
                                            if(agent===cbox){
                                                //alert("True");
                                                $(".Report_ID").attr("checked", true);
                                            } else {
                                                //alert("False");
                                            }
                                      });

                                }

                        }
                });
    }
    function check_list_module_admin()
    {
    	var module = 'Admin';
    	var group = $("#select_group_hidden").val();
        var data =  {
                         'group':group,
                         'module':module,
                         '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                        
                $.ajax({
                        url: '<?= base_url() ?>Admin/check_list_module_admin',
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                        beforeSend: function() {

                        },
                        success: function(response){

                                var checkedValue = null; 
                                var inputElements = document.getElementsByClassName('Admin_ID');
                                for(var i=0; inputElements[i]; ++i){

                                      cbox = inputElements[i].value;
                                      //alert(checkedValue);
                                      $.each(response, function(index) {
                                            var agent = response[index].agent;
                                            //alert(agent);
                                            if(agent===cbox){
                                                //alert("True");
                                                $(".Admin_ID").attr("checked", true);
                                            } else {
                                                //alert("False");
                                            }
                                      });

                                }

                        }
                });
    }




    function check_list_module_ppm_team()
    {
        var module = 'PPM_TEAM';
        var group = $("#select_group_hidden").val();
        var data =  {
                         'group':group,
                         'module':module,
                         '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                        
                $.ajax({
                        url: '<?= base_url() ?>Admin/check_list_module_ppm_team',
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                        beforeSend: function() {

                        },
                        success: function(response){

                                var checkedValue = null; 
                                var inputElements = document.getElementsByClassName('PPM_TEAM');
                                for(var i=0; inputElements[i]; ++i){

                                      cbox = inputElements[i].value;
                                      //alert(checkedValue);
                                      $.each(response, function(index) {
                                            var agent = response[index].agent;
                                            //alert(agent);
                                            if(agent===cbox){
                                                //alert("True");
                                                $(".PPM_TEAM").attr("checked", true);
                                            } else {
                                                //alert("False");
                                            }
                                      });

                                }

                        }
                });
    }


    function check_list_module_ppm_verify()
    {
        var module = 'PPM_Verify';
        var group = $("#select_group_hidden").val();
        var data =  {
                         'group':group,
                         'module':module,
                         '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                        
                $.ajax({
                        url: '<?= base_url() ?>Admin/check_list_module_ppm_verify',
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                        beforeSend: function() {

                        },
                        success: function(response){

                                var checkedValue = null; 
                                var inputElements = document.getElementsByClassName('PPM_Verify');
                                for(var i=0; inputElements[i]; ++i){

                                      cbox = inputElements[i].value;
                                      //alert(checkedValue);
                                      $.each(response, function(index) {
                                            var agent = response[index].agent;
                                            //alert(agent);
                                            if(agent===cbox){
                                                //alert("True");
                                                $(".PPM_Verify").attr("checked", true);
                                            } else {
                                                //alert("False");
                                            }
                                      });

                                }

                        }
                });
    }

    function check_list_module_ppm_endorse()
    {
        var module = 'PPM_Endorse';
        var group = $("#select_group_hidden").val();
        var data =  {
                         'group':group,
                         'module':module,
                         '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                        
                $.ajax({
                        url: '<?= base_url() ?>Admin/check_list_module_ppm_endorse',
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                        beforeSend: function() {

                        },
                        success: function(response){

                                var checkedValue = null; 
                                var inputElements = document.getElementsByClassName('PPM_Endorse');
                                for(var i=0; inputElements[i]; ++i){

                                      cbox = inputElements[i].value;
                                      //alert(checkedValue);
                                      $.each(response, function(index) {
                                            var agent = response[index].agent;
                                            //alert(agent);
                                            if(agent===cbox){
                                                //alert("True");
                                                $(".PPM_Endorse").attr("checked", true);
                                            } else {
                                                //alert("False");
                                            }
                                      });

                                }

                        }
                });
    }

    function check_list_module_ppm_verify_network_server()
    {
        var module = 'PPM_Verify_Network_Server';
        var group = $("#select_group_hidden").val();
        var data =  {
                         'group':group,
                         'module':module,
                         '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                        
                $.ajax({
                        url: '<?= base_url() ?>Admin/check_list_module_ppm_endorse',
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                        beforeSend: function() {

                        },
                        success: function(response){

                                var checkedValue = null; 
                                var inputElements = document.getElementsByClassName('PPM_Verify_Network_Server');
                                for(var i=0; inputElements[i]; ++i){

                                      cbox = inputElements[i].value;
                                      //alert(checkedValue);
                                      $.each(response, function(index) {
                                            var agent = response[index].agent;
                                            //alert(agent);
                                            if(agent===cbox){
                                                //alert("True");
                                                $(".PPM_Verify_Network_Server").attr("checked", true);
                                            } else {
                                                //alert("False");
                                            }
                                      });

                                }

                        }
                });
    }

    function cancel()
    {
    	var url = "<?= base_url()?>Admin/Admin_ViewLink_Agent";
        window.location.href = url;
    }
</script>