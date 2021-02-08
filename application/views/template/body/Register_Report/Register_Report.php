<link rel="stylesheet" href="<?= base_url()?>/asset_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h3> Register Report </h3>
		<div class="row">

            



			
				<div class="col-md-6">

					<div class="box box-success">
						
                        
                            <div class="box-header with-border">
                                <div class="col-md-6">
                                    <h3 class="box-title"> <b>Report Information</b> </h3>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <a href="<?=base_url()?>Report/Report_Overview">
                                            <button class="btn btn-primary btn-block">Go To Overview</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        

        




					    <div class="box-body">

							<div class="form-group">
			  					<label for="exampleInputEmail1">Report Type</label>
			  					<select class='form-control' name='Report_Type' id='Report_Type'>
			  						<option value=''>< Please Select ></option>
			  						<?= report_type() ?>
			  					</select>
			                </div>

			                <div class="form-group" style="display: none" id="CustDiv">
			  					<label for="exampleInputEmail1">Customer</label>
			  					<select class='form-control' name='Report_Customer' id='Report_Customer'>
			  						<option value=''>< Select Customer >
			  							<?= report_customer() ?>		
			  						</option>
			  					</select>
			                </div>


			                <div class="form-group">
			  					<label for="exampleInputEmail1">Title Report</label>
			  					<input class='form-control' name='Report_Name' id='Report_Name'></input>
			                </div>
					
							<div class="form-group">
			  					<label for="exampleInputEmail1">Description</label>
			  					<textarea class='form-control' rows='3' name='Report_Description' id='Report_Description'></textarea>
			                </div>
					
							<div class="form-group" style="display: none">
			  					<label for="exampleInputEmail1">Format</label>
			  					<select class='form-control' name='Report_Format' id='Report_Format'>
			  						<option value=''>< Please Select ></option>
			  						<option value='excel'> Excel </option>
			  						<option value='word'> Word </option>
			  					</select>
			                </div>
					
							<div class="form-group">
			  					<label for="exampleInputEmail1">Permission</label>
			  					<!-- <select class='form-control' name='Report_Group' id='Report_Group'><option value=''>< Please Select ></option></select> -->

			  					<table id="mytable1" class="table table-bordered table-striped">
					            	<thead>
					            		<tr>

									    	<th><center>Access</center></th>        
										
									    	<th><center>Group</center></th>     
							
										</tr>
									</thead>
									<tbody id="dataList">	            
							        </tbody>
						        </table>


			                </div>
							

						 </div>
						</div>
					</div>
				

				<div class="col-md-3">
					<div class="box box-success" style="display: none" id="table_column">
						<div class="box-header with-border">
							<h3 class="box-title"> <b>List Column Data</b> </h3>
						</div>
					    <div class="box-body">
					    	<table id="mytable2" class="table table-bordered table-striped">
				            	<thead>
				            		<tr>

								    	<th><center>Show</center></th>        
									
								    	<th>Column</th>     
						
									</tr>
								</thead>
								<tbody id="dataList">	            
						        </tbody>
					        </table>

					        <input type="hidden" name="Report_ID" id="Report_ID" value="<?= rand() ?>">

							<div class="form-group">
								<br>
				            	<button class="btn btn-primary btn-block" onclick="submit();">Save</button>
				            </div>

                            

					    </div>
					</div>

                    <div class="box box-success" style="display: none" id="other_report">
                        <div class="box-header with-border">
                            <h3 class="box-title"> <b>Setting Data </b> </h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Start From</label>
                                <input class='datetime form-control' name='Statistic_Start_Date' id='Statistic_Start_Date'></input>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">End From</label>
                                <input class='datetime form-control' name='Statistic_End_Date' id='Statistic_End_Date'></input>
                            </div>

                            <div class="form-group">
                                <br>
                                <button class="btn btn-primary btn-block" onclick="submit_statistic();">Generate</button>
                            </div>
                        </div>
                    </div>

				</div>



				<div class="col-md-3 hidden-xs">
					<div class="col-md-11">
						<?= lookup_widget(); ?>
					</div>
					<div class="col-md-1"> </div>		        
				</div>


		</div>

	</section>
</div>


<script type="text/javascript">
    function submit_statistic()
    {

        var xid = [];
            $("[name='id_group[]']:checked").each(function (i) {
                xid[i] = $(this).val();
                //alert(id)
                if(xid[i]=='on'){
                    xid[i]='0';
                }
            }); 

        var Report_Type = $("#Report_Type").val();
        var Statistic_Start_Date = $("#Statistic_Start_Date").val();
        var Statistic_End_Date = $("#Statistic_End_Date").val();
        var Report_Name = $("#Report_Name").val();
        var Report_Description = $("#Report_Description").val();
        var Report_Type = $("#Report_Type").val();
        var Report_ID = $("#Report_ID").val();



        var data = 
                                {   
                                    'id_group':xid,
                                    'Report_Type':Report_Type,
                                    'Statistic_Start_Date':Statistic_Start_Date,
                                    'Statistic_End_Date':Statistic_End_Date,
                                    'Report_Name':Report_Name,
                                    'Report_Description':Report_Description,
                                    'Report_Type':Report_Type,
                                    'Report_ID':Report_ID,
                                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                                }

        $.ajax({
                url: '<?= base_url() ?>Report/Statistic_Register',
                type: 'POST',
                dataType: 'html',
                data: data,
                beforeSend: function() {

                },
                success: function(response){
                    

                    if(Report_Type=='3')
                    {
                        var url = "<?= base_url()?>Report/test_piejs/"+Report_ID;    
                    } else if(Report_Type=='4')
                    {
                        var url = "<?= base_url()?>Report/statistic_backup_line/"+Report_ID;
                    } else if(Report_Type=='5')
                    {
                        var url = "<?= base_url()?>Report/number_of_occurence_outage/"+Report_ID;
                    } else if(Report_Type=='6')
                    {
                        var url = "<?= base_url()?>Report/total_hours_of_outage/"+Report_ID;
                    }

                    var win = window.open(url);


                    
                    window.location.href="<?=base_url()?>Report/Report_Overview_Statistic";
                    
                }
        });    
    }

    function go()
    {
        
    }

    function submit()
    {
        var id = [];
            $("[name='id_column[]']:checked").each(function (i) {
                id[i] = $(this).val();
                //alert(id)
                if(id[i]=='on'){
                    id[i]='0';
                }
            }); 

        var xid = [];
            $("[name='id_group[]']:checked").each(function (i) {
                xid[i] = $(this).val();
                //alert(id)
                if(xid[i]=='on'){
                    xid[i]='0';
                }
            }); 

        var Report_Type = $("#Report_Type").val();
        var Report_Customer = $("#Report_Customer").val();
        var Report_Name = $("#Report_Name").val();
        var Report_Description = $("#Report_Description").val();
        var Report_Format = $("#Report_Format").val();
        var Report_Type = $("#Report_Type").val();
        var Report_ID = $("#Report_ID").val();



        var data = 
	                            {   'id_column':id,
                                    'id_group':xid,
                                    'Report_Type':Report_Type,
                                    'Report_Customer':Report_Customer,
                                    'Report_Name':Report_Name,
                                    'Report_Description':Report_Description,
                                    'Report_Format':Report_Format,
                                    'Report_Type':Report_Type,
                                    'Report_ID':Report_ID,
	                                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
	                            }

        $.ajax({
                url: '<?= base_url() ?>Report/RFO_Register',
                type: 'POST',
                dataType: 'html',
                data: data,
                beforeSend: function() {

                },
                success: function(response){
                    if(Report_Type=='1'){
                        window.location.href="<?=base_url()?>Report/Report_Overview";
                    } else {
                        window.location.href="<?=base_url()?>Report/Report_Overview_Tracker";
                    }
                    
                }
        });

    }

    function cancel()
    {
    	location.reload();
    }
</script>


<script type="text/javascript">
	$(document).ready(function (){
		list_all_group();
	});

 	$("#Report_Type").change(function (){

 		var type = $("#Report_Type").val();
 		if(type=='1')
 		{
 			$("#LocDiv").show();
 			$("#idTicketDiv").show();
 			$("#Report_Format").val("word");
            $("#table_column").show();
            $("#other_report").hide();
            list_all_column(type);
 		} else if(type=='2'){
 			$("#LocDiv").hide();
 			$("#idTicketDiv").hide();
 			$("#Report_Format").val("");
            $("#table_column").show();
            $("#other_report").hide();
            list_all_column(type);
 		} else {
            $("#other_report").show();
            $("#table_column").hide();
        }
 		
 		
 	});


 	$("#Report_Location").change(function (){
 		var location = $("#Report_Location").val();

 		var data = 	{
						"location" : location
						
					}

		$.ajax({
                    url: "<?= base_url() ?>Report/Select_ID_By_location",
                    type: "POST",
                    dataType: "html",
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                    	//alert(response);
                    	if(!$.trim(response)){
                    		$("#Report_Id_Ticket").html('<option value=""> < Not Register ></option>');
                    	} else {
                    		$("#Report_Id_Ticket").html('<option value=""> < Select Ticket ID ></option>'+response);
                    	}
                    }
            });
 	});
</script>




<script src="<?=base_url()?>asset_admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>asset_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(function () {
	    $("#mytable2").DataTable()
	})

	function list_all_column(id){
		
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
                            'id':id,
                            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                          };


        var tickTicket = function ( data, type, row ) {
	            if ( type === 'display' ) {
	                return '<center><input type="checkbox" checked="checked" name="id_column[]" value="'+data+'" class="id_column"></center> ';
	            }
	            return data;
	        };
        

        var t = $("#mytable2").dataTable({

			destroy: true,
            searching: false,
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
            "searching": false,
            "bInfo" : false,
            "paging":   false,
            ajax: {
                      data: send_param,
                      "url": "<?=base_url()?>Report/Dtable_Data_Set", 
                      "type": "POST"
                  },
            columns: [
                // {
                //     "data": "id_group",
                //     "orderable": false
                // },
                {"data": "id",render:tickTicket},
                {"data": "name"}

            ],
            //order: [[1, 'asc']],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                //$('td:eq(0)', row).html(index);
            }
        });
	}

	function detailTicket(id)
	{
		var base_url = "<?= base_url()?>";
		window.location.href = base_url+'Ticket/Ticket_DetailTicket/'+id;
	}


</script>






<script type="text/javascript">
	$(function () {
	    $("#mytable1").DataTable()
	})

	function list_all_group(){
		
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

        var tickAccess = function ( data, type, row ) {
	            if ( type === 'display' ) {
	                return '<center><input type="checkbox" name="id_group[]" value="'+data+'" class="id_group"></center> ';
	            }
	            return data;
	        };
        

        var t = $("#mytable1").dataTable({

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
            "bInfo" : true,
            "paging":   true,
            ajax: {
                      data: send_param,
                      "url": "<?=base_url()?>Report/Dtable_Group_Set", 
                      "type": "POST"
                  },
            columns: [
                // {
                //     "data": "id_group",
                //     "orderable": false
                // },
                {"data": "other_id",render:tickAccess},
                {"data": "customerID"}

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


</script>
	 			  

