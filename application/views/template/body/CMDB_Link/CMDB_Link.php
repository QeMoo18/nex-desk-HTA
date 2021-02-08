<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>asset_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
		
<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?>
		<h3> CMDB LINK </h3>
		<div class="row">


			<div class="col-md-9">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>CMDB_Link</b> </h3>
		          </div>
		          <div class="box-body">

		          	<!-- Start First -->
		          		<input type="hidden" name="auto_id" id="auto_id" value="cmdb<?=rand()?>">
		          		<div id="first_div">
							<div class="form-group">
			                  	<label for="exampleInputEmail1">Customer ID</label>
			                  	<select class='form-control' name='Link_CustID' id='Link_CustID'>
			  						<option value=''>< Please Select ></option>
			  						<?= lookup_customerID_By_ID() ?>
			  					</select> 
			                </div>

			                <script type="text/javascript">
			                	$("#Link_CustID").change(function (){
			                		var custId = $("#Link_CustID").val();

			                		var data = 	{
														"custId" : custId
													}
										
										$.ajax({
								                    url: "<?= base_url() ?>CMDB/cmdb_lookup_service",
								                    type: "POST",
								                    dataType: "html",
								                    data: data,
								                    beforeSend: function() {

								                    },
								                    success: function(response){

								                    	$("#Link_Service").html('<option value="">< Please Select ></option>'+response);

								                    	$("#Link_Service").change(function (){
								                    		var service_id = $("#Link_Service").val();
								                    		lookup_sla(service_id);
								                    	});
								                    }
								            });

			                	});

			                	function lookup_sla(service_id)
			                	{
			                		var data = 	{
													"service_id" : service_id
												}
									
									$.ajax({
							                    url: "<?= base_url() ?>CMDB/cmdb_lookup_sla",
							                    type: "POST",
							                    dataType: "html",
							                    data: data,
							                    beforeSend: function() {

							                    },
							                    success: function(response){
							                    	$("#Link_SLA").html("<option value=''>< Please Select ></option>"+response);
							                    }
							              });
			                	}
			                </script>
					
							<div class="form-group">
			                  	<label for="exampleInputEmail1">Service</label>
			                  	<select class='form-control' name='Link_Service' id='Link_Service'>
			  						<option value=''>< Please Select ></option>
			  						<?= lookup_service() ?>
			  					</select>
			                </div>
					
							<div class="form-group">
			                  	<label for="exampleInputEmail1">SLA</label>
			                  	<select class='form-control' name='Link_SLA' id='Link_SLA'>
			  						<option value=''>< Please Select ></option>
			  						<?= lookup_sla() ?>		
			  					</select> 
			                </div>

			                <div class="form-group">
				            	<button type="submit" class="btn btn-primary btn-block" onclick="next();">Next</button>
				            </div>
				        </div>
		            <!-- END -->

					<!-- SECOND -->
						<div id="second_div" style="display: none">
							<div class="form-group">
			  					<label for="exampleInputEmail1">ITSM Category</label>
			  					<select class='form-control' name='ITSMCatefory' id='Link_ITSM_Cat'>
			  						<option value=''>< Please Select ></option>
			  						<option value='Computer'> Computer </option>
			  						<option value='Hardware'> Hardware </option>
			  						<option value='Network'> Network </option>
			  						<option value='Software'> Software </option>
			  					</select>
			                </div>
					
							<div class="form-group">
			                  <label for="exampleInputEmail1">Location</label>
			                  
			                  

			                  	<table table id="mytable3" class="table table-bordered">
								    <thead>
								      	<tr>
									        <th>Name (Hostname)</th>
									        <th>Location</th>
									        <th><center>Mark</center></th>
								      	</tr>
								    </thead>
								    <tbody>
								    		
								    		
								    		
								    		
								    </tbody>
								</table>

			                  </div>


			                
							
							<div class="form-group">
				            	<button type="submit" class="btn btn-primary btn-block" onclick="submit();">Submit</button>
				            	<button type="submit" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
				            </div>
				        </div>
				    <!-- END -->

				  </div>
				</div>
			</div>

			<div class="col-md-3 hidden-xs">
				<?= lookup_widget(); ?>		        
			</div>

		</div>
	</section>
</div>


<script type="text/javascript">
	
	function next()
	{
		

		var auto_id = $("#auto_id").val();
		var Link_CustID = $("#Link_CustID").val();
		var Link_Service = $("#Link_Service").val();
		var Link_SLA = $("#Link_SLA").val();

		if((Link_CustID==='')||(Link_Service==='')||(Link_SLA==='')){
			alert("Error !");
		} else {
			var data = 	{
							"auto_id" : auto_id,
							"Link_CustID" : Link_CustID,
							"Link_Service" : Link_Service,
							"Link_SLA" : Link_SLA
						}
			
			$.ajax({
	                    url: "<?= base_url() ?>CMDB/cmdb_register_link",
	                    type: "POST",
	                    dataType: "html",
	                    data: data,
	                    beforeSend: function() {

	                    },
	                    success: function(response){
	                    	$("#first_div").hide();
							$("#second_div").show();
	                    }
	            });
		}

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

			var auto_id = $("#auto_id").val();
			var Link_ITSM_Cat = $("#Link_ITSM_Cat").val();
			var Link_Location = id;

			var data = 	{
							"auto_id" : auto_id,
							"Link_ITSM_Cat" : Link_ITSM_Cat,
							"Link_Location" : Link_Location
						}

			$.ajax({
	                    url: "<?= base_url() ?>CMDB/cmdb_link_location",
	                    type: "POST",
	                    dataType: "html",
	                    data: data,
	                    beforeSend: function() {

	                    },
	                    success: function(response){
	                    	alert("Success link location !");
	                    	location.reload();
	                    }
	            });
		}

	}

	function cancel()
 	{
 		location.reload();
 	}

 	
 // 	$("#Link_ITSM_Cat").change(function (){
	// 	var cat = $("#Link_ITSM_Cat").val();

	// 	var data = 	{
	// 					"cat" : cat
	// 				}
		
	// 	$.ajax({
 //                    url: "<?= base_url() ?>CMDB/Link_ITSM_Cat",
 //                    type: "POST",
 //                    dataType: "html",
 //                    data: data,
 //                    beforeSend: function() {

 //                    },
 //                    success: function(response){
 //                    	$("#list_location").html(response);
 //                    }
 //            });
		
	// });

</script>


<script src="<?=base_url()?>asset_admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>asset_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Loc -->
<script type="text/javascript">
    $(function () {
        $("#mytable3").DataTable()
    })

 	$("#Link_ITSM_Cat").change(function (){
		var cat = $("#Link_ITSM_Cat").val();

		if(cat=='Network'){
			var url = 'Dtable_CMDB_Location_ViewList_Network';
		} else if(cat=='Computer'){
			var url = 'Dtable_CMDB_Location_ViewList_Computer';
		} else if(cat=='Hardware'){
			var url = 'Dtable_CMDB_Location_ViewList_Hardware';
		} else if(cat=='Software'){
			var url = 'Dtable_CMDB_Location_ViewList_Software';
		}

		
	    
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

	        var addLocation = function ( data, type, row ) {
	            if ( type === 'display' ) {
	                return '<center><input type="checkbox" value="'+data+'" class="LocationID" name="LocationID"></center> ';
	            }
	            return data;
	        };

	        var t = $("#mytable3").dataTable({

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
	                      "url": "<?=base_url()?>CMDB/"+url, 
	                      "type": "POST",
	                      "dataSrc": function ( json ) {
	                            //Make your callback here.
	                            
	                            //alert("Done!");
	                            return json.data;

	                       } 
	                  },
	            columns: [
	                // {
	                //     "data": "id_group",
	                //     "orderable": false
	                // },
	                {"data": "name"},
	                {"data": "location"},
	                {"data": "other_id",render:addLocation}

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
	});

    function addLocation(id)
    {

    }
</script>
<!-- END -->



