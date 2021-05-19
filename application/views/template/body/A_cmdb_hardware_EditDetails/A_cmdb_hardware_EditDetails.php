
		
<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Hardware Management</h5>
		<div class="row">
			<div class="col-md-2"> 
				<div class="form-group">
					<a href="<?= base_url()?>admin/A_cmdb_hardware_viewlist"> 
						<button class="btn btn-danger btn-block"> Go To Overview</button>
						</a>

					<?= qr_code($this->uri->segment(3)); ?>
					</div>
				</div>	
			<div class="col-md-10">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Edit Hardware</b> </h3>
		          </div>
		          <div class="box-body">
							
		          			<div class="row">
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">*Name</label>
				                  <input type='text' class='form-control' name='HW_name' id='HW_name'>
				                  <span id="alert_HW_name"></span> 
				                </div>


				                <div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">*IP Address</label>
				                  <input type='text' class='form-control' name='Hardware_ip' id='Hardware_ip'> 
				                  <span id="alert_Hardware_IP"></span> 
				                </div>

				                <div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Mac Address</label>
				                  <input type='text' class='form-control' name='Hardware_mac' id='Hardware_mac'> 
				                </div>

				                <div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">* Network Port</label>
				                  <input type='text' class='form-control' name='network_port' id='network_port'> 
				                  <span id="alert_Network_Port"></span> 
				                </div>

								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">*Deployment State</label>
				                  <select class='form-control' name='HW_deployment_state' id='HW_deployment_state'>
				                  <option value=''>< Please Select ></option>
		          					<?= lookup_deployment_state(); ?>
		          				  </select>
				                  <span id="alert_HW_deployment_state"></span> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">*Incident State</label>
				                  <select class='form-control' name='HW_incident_state' id='HW_incident_state'>
				                  	<option value=''>< Please Select ></option>
			      					<?= lookup_incident_state(); ?>
			      				  </select>
			      				  <span id="alert_HW_incident_state"></span> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Vendor</label>
				                  <input type='text' class='form-control' name='HW_vendor' id='HW_vendor'> 
				                </div>
				                <div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Brand</label>
				                  <input type='text' class='form-control' name='HW_brand' id='HW_brand'> 
				                </div>
							</div>

							<div class="row">
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Model</label>
				                  <input type='text' class='form-control' name='HW_model' id='HW_model'> 
				                </div>
				            </div>
							

							<div class="row">
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Description</label>
				                   <textarea rows="4" class='form-control' name='HW_description' id='HW_description'> 
				                   </textarea>  
				                </div>

				                <div class="form-group col-md-3">
		          					<label for="exampleInputEmail1">Type</label>
		          					<select class='form-control' name='HW_type' id='HW_type'>
			          					<option value=''>< Please Select ></option>
			          					<?= lookup_hardware_type(); ?>
									</select>
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Owner</label>
				                  <input type='text' class='form-control' name='HW_owner' id='HW_owner'> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Serial Number</label>
				                  <input type='text' class='form-control' name='HW_SerialNo' id='HW_SerialNo'> 
				                </div>
							</div>

							<div class="row">
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Firmware Version</label>
				                  <input type='text' class='form-control' name='Firmware_Version' id='Firmware_Version'> 
				                </div>


								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Waranty Expiration</label>
				                  <input type='date' class='form-control' name='HW_WAD' id='HW_WAD'> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Install Date</label>
				                  <input type='date' class='form-control' name='HW_InstallDate' id='HW_InstallDate'> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Note</label>
				                   <textarea rows="4" class='form-control'name='HW_notes' id='HW_notes'> </textarea> 
				                </div>

				                <div class="form-group col-md-3">
		          					<label for="exampleInputEmail1"> *Location </label>
		          					<input type='text' class='form-control' name='HW_location' id='HW_location' 
		          					list="list_loc"> 
		          					<span id="alert_HW_location"></span>
				                </div>
				                <datalist id="list_loc"></datalist>
							</div>

							<div class="row">
								<div class="form-group col-md-3">
		          					<label for="exampleInputEmail1">*Validity</label>
		          					<select class='form-control' name='HW_validity' id='HW_validity'>
		          					<option value=''>< Please Select ></option>
			          					<?= lookup_validity(); ?>
									</select>
									<span id="alert_HW_validity"></span>
				                </div>
				               										
				  			</div>

				  			<hr>
				  			<div class="row">
				  				<div class="form-group col-md-2">
				                   <button type="submit" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
				                </div>
				                <div class="form-group col-md-2">
				                  <button class="btn btn-primary btn-block" onclick="submit();"> Submit </button>
				                </div>
				  			</div>
				  </div>
				</div>
			</div>

			
		</div>
	</section>
</div>

<!-- Input hidden get - ID -->
<input type="hidden" name="other_id" id="other_id" value="<?= $this->uri->segment('3')?>">


<script type="text/javascript">

	// start code hardware
	$(document).ready(function (){

		            var data = 
                    {
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>CMDB/getAllLoc',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                                if(response!=''){
                                    $('#list_loc').html(response);
                                }
                               
                            }
                    });
		        });
	//end


	$(document).ready(function (){ // automatik bila dia open browser
		details(); //panggil function details
	});

	function details() //create dekat function
	{
		var other_id = $("#other_id").val(); //get id hidden 
		
		var data =  {
		                    'other_id':other_id, //declare variable dalam data 
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		            }

        $.ajax({
                    url: '<?= base_url() ?>Admin/cmdb_hardware_details', //create nama function
                    type: 'POST',
                    dataType: 'json', //jenis type adalah json
                    data: data,
                    beforeSend: function() {
                       
                    },
                    success: function(response){

                    	//input daripada form - id
						var HW_name = $("#HW_name").val(response.name);
						var HW_deployment_state = $("#HW_deployment_state").val(response.deployment_state);
						var HW_incident_state = $("#HW_incident_state").val(response.incident_state);
						var HW_vendor = $("#HW_vendor").val(response.vendor);
						var HW_model = $("#HW_model").val(response.model);
						var HW_description = $("#HW_description").val(response.description);
						var HW_type = $("#HW_type").val(response.type);
						var HW_owner = $("#HW_owner").val(response.owner);
						var HW_SerialNo = $("#HW_SerialNo").val(response.serial_number);
						var HW_WAD = $("#HW_WAD").val(response.warranty_expiration_date);
						var HW_InstallDate = $("#HW_InstallDate").val(response.install_date);
						var HW_notes = $("#HW_notes").val(response.note);
						var HW_location = $("#HW_location").val(response.location);
						var HW_validity = $("#HW_validity").val(response.validity);

						var Hardware_ip = $("#Hardware_ip").val(response.ip_address);
						var network_port = $("#network_port").val(response.network_port);
						var Firmware_Version = $("#Firmware_Version").val(response.firmware_version);
						var HW_brand = $("#HW_brand").val(response.brand);
						var Hardware_mac = $("#Hardware_mac").val(response.mac_address);
	              }
              });
	}
	

	function submit()
	{
		//input daripada form - id
		var HW_name = $("#HW_name").val();
		var HW_deployment_state = $("#HW_deployment_state").val();
		var HW_incident_state = $("#HW_incident_state").val();
		var HW_vendor = $("#HW_vendor").val();
		var HW_model = $("#HW_model").val();
		var HW_description = $("#HW_description").val();
		var HW_type = $("#HW_type").val();
		var HW_owner = $("#HW_owner").val();
		var HW_SerialNo = $("#HW_SerialNo").val();
		var HW_WAD = $("#HW_WAD").val();
		var HW_InstallDate = $("#HW_InstallDate").val();
		var HW_notes = $("#HW_notes").val();
		var HW_location = $("#HW_location").val();
		var HW_validity = $("#HW_validity").val();
		
		var other_id = $("#other_id").val(); //get id hidden 


		var Hardware_ip = $("#Hardware_ip").val();
		var network_port = $("#network_port").val();
		var Firmware_Version = $("#Firmware_Version").val();
		var Hardware_mac = $("#Hardware_mac").val();


		var HW_brand = $("#HW_brand").val();

		

		//check to action
		if(HW_name)
		{ 
			$("#alert_HW_name").html('');
		} else {
			$("#alert_HW_name").html('<font color="red"> required field </font>');
		}


		if(Hardware_ip)
		{ 
			$("#alert_Hardware_IP").html('');
		} else {
			$("#alert_Hardware_IP").html('<font color="red"> required field </font>');
		}


		if(network_port)
		{ 
			$("#alert_Network_Port").html('');
		} else {
			$("#alert_Network_Port").html('<font color="red"> required field </font>');
		}

		if(HW_deployment_state)
		{ 
			$("#alert_HW_deployment_state").html('');
		} else {
			$("#alert_HW_deployment_state").html('<font color="red"> required field </font>');
		}

		if(HW_incident_state)
		{ 
			$("#alert_HW_incident_state").html('');
		} else {
			$("#alert_HW_incident_state").html('<font color="red"> required field </font>');
		}

		if(HW_location)
		{ 
			$("#alert_HW_location").html('');
		} else {
			$("#alert_HW_location").html('<font color="red"> required field </font>');
		}

		if(HW_validity)
		{ 
			$("#alert_HW_validity").html('');
		} else {
			$("#alert_HW_validity").html('<font color="red"> required field </font>');
		}


		//check to submit
		if((HW_name=='')||(HW_deployment_state=='')||(HW_incident_state=='')||(HW_location=='')||(HW_validity=='')||(Hardware_ip=='')||(network_port=='')){

		} else {



		var data = 
		                {   
		                	'HW_name':HW_name,
		                	'Hardware_ip':Hardware_ip,
		                	'Hardware_mac':Hardware_mac,
		                	'network_port':network_port,
		                	'Firmware_Version':Firmware_Version,
		                	'HW_deployment_state':HW_deployment_state,
		                	'HW_incident_state':HW_incident_state,
		                	'HW_vendor':HW_vendor,
		                	'HW_model':HW_model,
		                	'HW_description':HW_description,
		                	'HW_type':HW_type,
		                	'HW_owner':HW_owner,
		                	'HW_SerialNo':HW_SerialNo,
		                	'HW_WAD':HW_WAD,
		                	'HW_InstallDate':HW_InstallDate,
		                	'HW_notes':HW_notes,
		                	'HW_location':HW_location,
		                	'HW_validity':HW_validity,
		                	'HW_brand':HW_brand,
		                	'other_id':other_id,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		                }

                    
            $.ajax({
                    url: '<?= base_url() ?>Admin/CMDB_Hardware_update',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                    	//alert("Data Updated !");
                    	//location.reload();

                    	var url = "<?= base_url()?>Admin/A_cmdb_hardware_viewlist";
	                    window.location.href=url;
                    }
            });

        }
		
		
	}

	function cancel()
	{
			location.reload();
	}
</script>

<script type="text/javascript">
	function print_qr()
	{
		$("#btn_qr_code").trigger('click');
	}
</script>

<form action="<?=base_url()?>CMDB/print_qr/<?=$this->uri->segment(3)?>" method="post">
	<button type="submit" id="btn_qr_code"></button>
</form>