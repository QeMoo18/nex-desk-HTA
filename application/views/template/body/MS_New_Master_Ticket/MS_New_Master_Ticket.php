<div class="pageheader hidden-xs">
    <h3><i class="fa fa-list"></i> List Ticket : Create Master </h3>
    <div class="breadcrumb-wrapper">
        <span class="label" style="padding-right: 0px;"><i class="fa fa-cog" aria-hidden="true" style="border: 2px solid #f2f7f8;padding-right: 0px;"></i></span>
        <ol class="breadcrumb">
            <li> <a href="<?=base_url()?>Ticket/Ticket_StatusView"> Single Ticket </a> </li>
            <li> <a href="<?=base_url()?>Ticket/MS_New_Master_Ticket"> Master Open </a> </li>
            <li> <a href="<?=base_url()?>Ticket/MS_Overview_Closed"> Master Close </a> </li>
        </ol>
    </div>
</div>

<link rel="stylesheet" href="<?= base_url()?>/asset_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="row">
	<div class="content-wrapper">
		<section class="content">

			<?php $id = $this->uri->segment(3) ?>
			<div class="row">
				<div class="col-md-12">
					<?php 
							$updateBy = $this->session->userdata('userid'); // id yang login system
					        date_default_timezone_set("Asia/Kuala_Lumpur");
					        $timeReg =date("H:i:s");
					        $dateReg =date("Y/m/d");//$dateReg =date("d/m/Y");
					        $dateReg = str_replace('/','',$dateReg);
					?>
					<input type="hidden" name="id_master_ticket" id="id_master_ticket" value="<?= $dateReg.rand() ?>">
					<!-- FIRST -->
					<div class="col-md-6 col-xs-12">
						<div class="panel-group">
						  <div class="panel panel-primary">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" href="#collapse1" id="custx">
						        	<label> 
						        		<span class="fa fa-ticket" aria-hidden="true"></span>  
						    			TICKET INFORMATION
						    		</label>
						    	</a>
						      </h4>
						    </div>
						    <div id="collapse1" class="panel-collapse collapse in">
						      <div class="panel-body">

						      		<div class="form-group col-md-6">
					                  <label for="exampleInputEmail1">* Subject/Title</label>
					                  <input type='text' class='form-control' name='ms_subject' id='ms_subject' required="required"> 
					                  <span id="ms_subject_error" style="display: none"> <i><font color="red"> * Required Field </font></i></span>
					                </div>

					                <div class="form-group col-md-6">
					                  <label for="exampleInputEmail1">Provider Reference</label>
					                  <input type='text' class='form-control' name='ms_provider' id='ms_provider'> 
					                </div>

					                <div class="form-group col-md-6">
					                  <label for="exampleInputEmail1">* Type</label>
					                  <select class="form-control" name='ms_type' id='ms_type' required>
					                  	<option value="">-- Select Type --</option>
					                  	<?= lookup_ticket_type(); ?>
					                  </select>
					                  <span id="ms_type_error" style="display: none"> <i><font color="red"> * Required Field </font></i></span>
					                </div>


					                <div class="form-group col-md-6">
					                  <label for="exampleInputEmail1">* To Queu</label>
					                  <select class="form-control" name='ms_queu' id='ms_queu' required>
					                  	<option value="">-- Select To Queu --</option>
					                  	<?= lookup_queue(); ?>
					                  </select>
					                  <span id="ms_queu_error" style="display: none"> <i><font color="red"> * Required Field </font></i> </span>
					                </div>


					                <div class="form-group col-md-6">
					                  <label for="exampleInputEmail1">Impact</label>
					                  <select class="form-control" name='ms_impact' id='ms_impact'>
					                  	<option value="">-- Select Impact --</option>
					                  	<?= lookup_priority_type(); ?>
					                  </select>
					                </div>

					                <div class="form-group col-md-6">
					                  <label for="exampleInputEmail1">Priority</label>
					                  <select class="form-control" name='ms_priority' id='ms_priority'>
					                  	<option value="">-- Select Priority --</option>
					                  	<?= lookup_priority_type(); ?>
					                  </select>
					                </div>

						      </div>
						   	</div>
						 </div>
						</div>
						<div class="panel-group">
						  <div class="panel panel-primary">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" href="#collapse2" id="custy">
						        	<label> 
						        		<span class="fa fa-user" aria-hidden="true"></span>  
						    			AGENT INFORMATION
						    		</label>
						    	</a>
						      </h4>
						    </div>
						    <div id="collapse2" class="panel-collapse collapse in">
						      <div class="panel-body">
						      		<div class="form-group">
					                  <label for="exampleInputEmail1">Ticket Owner</label>
					                  <select class="form-control" name='ms_owner' id='ms_owner'>
					                  	<option value="">-- Select Owner --</option>
					                  	<?= lookup_agent(); ?>
					                  </select>
					                </div>

					                <div class="form-group">
					                  <label for="exampleInputEmail1">Responsibility</label>
					                  <select class="form-control" name='ms_responsibility' id='ms_responsibility'>
					                  	<option value="">-- Select Responsibility --</option>
					                  	<?= lookup_agent(); ?>
					                  </select>
					                </div>
						      </div>
						   	</div>
						 </div>
						</div>
					</div>



					<!-- SECOND -->
					<div class="col-md-6 col-xs-12">
						<div class="panel-group">
						  <div class="panel panel-primary">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" href="#collapse3" id="custz">
						        	<label> 
						        		<span class="fa fa-cubes" aria-hidden="true"></span>  
						    			LIST TICKET
						    		</label>
						    	</a>
						      </h4>
						    </div>
						    <div id="collapse3" class="panel-collapse collapse in">
						      <div class="panel-body" style="padding-bottom: 30px;">
						      		<table id="mytable2" class="table table-bordered table-striped">
						            	<thead>
						            		<tr>

										    	<th></th>        
											
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

							        <div class="form-group" style="padding-top: 10px;padding-bottom: 10px;">
							            	<div class="col-md-6 col-xs-6">
							            		<button class="btn btn-danger" onclick="cancel();"><span class="fa fa-times" aria-hidden="true"></span> Cancel</button>
							        		</div>
											<div class="col-md-6 col-xs-6">
							            		<button type="button" class="btn btn-success pull-right" onclick="submit_master()"><span class="fa fa-check" aria-hidden="true"></span> Create</button>
							            	</div>
							        </div>
						      </div>
						   	</div>
						 </div>
						</div>
						
					</div>


								
				</div>
			</div>
		</section>
	</div>
</div>

<script src="<?=base_url()?>asset_admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>asset_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(function () {
	    $("#mytable2").DataTable()
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
            	var data = "'"+data+"'";
                return  ' <a onclick="editUser('+data+');" title="Edit User"> <i class="fa fa-edit" /> </i></a> ';
            }
            return data;
        };


       var detailTicket = function ( data, type, row ) {
            if ( type === 'display' ) {
            	var data = "'"+data+"'";
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
        

        var t = $("#mytable2").dataTable({

			"columnDefs": [	
				{ width: 100, targets: 1 },
				{ width: 80, targets: 3 },
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
                      "url": "<?=base_url()?>Ticket/Dtable_Master_AllTicket", 
                      "type": "POST"
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


</script>
	 			  

<script type="text/javascript">
    function submit_master()
    {
        var id = [];
            $(':checkbox:checked').each(function(i){
                id[i] = $(this).val();
                //alert(id)
                if(id[i]=='on'){
                    id[i]='0';
                }
            }); 


        var ms_subject = $("#ms_subject").val();
		var ms_provider = $("#ms_provider").val();
		var ms_type = $("#ms_type").val();
		var ms_queu = $("#ms_queu").val();
		var ms_impact = $("#ms_impact").val();
		var ms_priority = $("#ms_priority").val();
		var ms_owner = $("#ms_owner").val();
		var ms_responsibility = $("#ms_responsibility").val();


        var id_master_ticket = $("#id_master_ticket").val();
        if((ms_subject=='')||(ms_type=='')||(ms_queu=='')){

        	if(ms_queu==''){
        		$("#ms_queu_error").show();
        		document.getElementById("ms_queu").focus();

        	} else {
        		$("#ms_queu_error").hide();
        	}
        	if(ms_type==''){
        		$("#ms_type_error").show();
        		document.getElementById("ms_type").focus();

        	} else {
        		$("#ms_type_error").hide();
        	}
        	if(ms_subject==''){
        		$("#ms_subject_error").show();

        		document.getElementById("ms_subject").focus();

        	} else {
        		$("#ms_subject_error").hide();
        	}
        	
        	
        } else {

		        var data = 
		                            {   'id_ticket_link':id,
		                                'id_master_ticket':id_master_ticket,
		                                'ms_subject':ms_subject,
		                                'ms_provider':ms_provider,
		                                'ms_type':ms_type,
		                                'ms_queu':ms_queu,
		                                'ms_impact':ms_impact,
		                                'ms_priority':ms_priority,
		                                'ms_owner':ms_owner,
		                                'ms_responsibility':ms_responsibility,
		                                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		                            }

		                        
		                $.ajax({
		                        url: '<?= base_url() ?>Ticket/ms_link_ticket_add',
		                        type: 'POST',
		                        dataType: 'html',
		                        data: data,
		                        beforeSend: function() {

		                        },
		                        success: function(response){
		                        	alert("Success Add");
		                            var base_url = "<?= base_url() ?>"+'/Ticket/MS_Overview_Open';
		                            window.location.href=base_url;
		                        }
		                });
	    }

    }

    function cancel()
    {
    	location.reload();
    }
</script>



<style type="text/css">

    .pageheader {
        padding: 13px;
        position: relative;
        /* background: #ffffff; */
        background: linear-gradient(to right, rgb(242, 247, 248) 10%, rgb(31, 114, 162) 100%);
        background: -moz-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 114, 162) 100%);
        background: -webkit-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 114, 162) 100%);
        background: linear-gradient(to right, rgb(242, 247, 248) 10%, rgb(242, 247, 248) 100%);
        margin: -20px -5px 24px -5px;
        /* padding: 35px 15px 100px 20px; */
        color: #353535;
        box-shadow: 0 1px 2px 0 rgb(234, 234, 234);
        padding-left: 30p;
    }

    .pageheader .fa, .pageheader .glyphicon {
        font-size: 12px;
        margin-right: 5px;
        padding: 6px 7px;
        border: 2px solid #124f76;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;
    }

    .pageheader h3 {
        font-size: 15px;
        color: #165a84;
        letter-spacing: -.5px;
        margin: 0;
    }

    .pageheader .breadcrumb-wrapper .label {
        color: #165a84;
        text-transform: uppercase;
        font-weight: 400;
        display: inline-block;
    }


    .pageheader .breadcrumb li a {
        color: #165983;
    }

    .pageheader .breadcrumb li.active {
        color: #175b86;
    }

    .pageheader .breadcrumb-wrapper {
        position: absolute;
        top: 15px;
        right: 25px;
    }

    .box-header {
        background: #458dbc2b;
    }


    .panel-primary .panel-heading, .panel-primary .panel-footer, .panel-primary.panel-colorful {
	    color: #fff;
	    background-color: #4285f4;
	    border-color: #4285f4;
	}


	.panel-primary .panel-heading, .panel-primary .panel-footer, .panel-primary.panel-colorful {
	    color: #fff;
	    background-color: #0e4367;
	    border-color: #4285f4;
	}

</style>