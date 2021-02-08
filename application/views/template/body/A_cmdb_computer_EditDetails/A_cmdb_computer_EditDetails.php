
<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Computer Management</h5>
		<div class="row">
			<div class="col-md-2"> 
				<div class="form-group">
					<a href="<?= base_url()?>admin/A_cmdb_computer_viewlist"> 
						<button class="btn btn-danger btn-block"> Go To Overview</button>
					</a>
					<br>
					<a onclick="remote();"> 
						<button class="btn btn-danger btn-block"> Remote </button>
					</a>

					<?= qr_code($this->uri->segment(3)); ?>

					</div>
				</div>	
			<div class="col-md-10">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Edit Computer</b> </h3>
		          </div>

				       <div class="box-body">

				       		<div class="row">
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">*Hostname</label>
				                  <input type='text' class='form-control' name='COMP_Name' id='COMP_Name'>
				                  <span id="alert_COMP_Name"></span> 
				                </div>

				                <div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">*IP Address</label>
				                  <input type='text' class='form-control' name='COMP_ip' id='COMP_ip'> 
				                  <span id="alert_COMP_IP"></span> 
				                </div>

				                <div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Network Port</label>
				                  <input type='text' class='form-control' name='network_port' id='network_port'> 
				                  <span id="alert_Network_Port"></span> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">*Deployment State</label>
				                  <select class='form-control' name='COMP_Deployment_State' id='COMP_Deployment_State'>
				                  <option value=''>< Please Select ></option>
		          					<?= lookup_deployment_state(); ?>
		          				  </select>
				                  <span id="alert_COMP_Deployment_State"></span> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">*Incident State</label>
				                  <select class='form-control' name='COMP_Incident_State' id='COMP_Incident_State'>
				                  	<option value=''>< Please Select ></option>
			      					<?= lookup_incident_state(); ?>
			      				  </select>
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Vendor</label>
				                  <input type='text' class='form-control' name='COMP_vendor' id='COMP_vendor'> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Model</label>
				                  <input type='text' class='form-control' name='COMP_model' id='COMP_model'> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Description</label>
				                  <textarea rows="4" class='form-control' name='COMP_description' id='COMP_description'></textarea> 
				                </div>
							
								<div class="form-group col-md-3">
		          					<label for="exampleInputEmail1">Type</label>
		          					<select class='form-control' name='COMP_type' id='COMP_type'>
			          					<option value=''>< Please Select ></option>
			          					<?= lookup_computer_type(); ?>
									</select>
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Owner</label>
				                  <input type='text' class='form-control' name='COMP_owner' id='COMP_owner'> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Serial Number</label>
				                  <input type='text' class='form-control' name='COMP_SerialNo' id='COMP_SerialNo'> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Operating System</label>
				                  <input type='text' class='form-control' name='COMP_OS' id='COMP_OS'> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">CPU Brand</label>
				                  <input type='text' class='form-control' name='COMP_CPU' id='COMP_CPU'> 
				                </div>


				                <div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">CPU Model</label>
				                  <input type='text' class='form-control' name='cpu_model' id='cpu_model'> 
				                </div>

				                <div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">CPU Serial No</label>
				                  <input type='text' class='form-control' name='cpu_serial_no' id='cpu_serial_no'> 
				                </div>

				                <div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Processor Type</label>
				                  <input type='text' class='form-control' name='processor_type' id='processor_type'> 
				                </div>

							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">RAM</label>
				                  <input type='text' class='form-control' name='COMP_RAM' id='COMP_RAM'> 
				                </div>

				                <div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Monitor Brand</label>
				                  <input type='text' class='form-control' name='monitor_brand' id='monitor_brand'> 
				                </div>

				                <div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Monitor Model</label>
				                  <input type='text' class='form-control' name='monitor_model' id='monitor_model'> 
				                </div>

				                <div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Monitor Serial No</label>
				                  <input type='text' class='form-control' name='monitor_serial_no' id='monitor_serial_no'> 
				                </div>

				                <div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">UPS Brand</label>
				                  <input type='text' class='form-control' name='ups_brand' id='ups_brand'> 
				                </div>


				                <div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">UPS Model</label>
				                  <input type='text' class='form-control' name='ups_model' id='ups_model'> 
				                </div>

				                <div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">UPS Serial No</label>
				                  <input type='text' class='form-control' name='ups_serial_no' id='ups_serial_no'> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Hardisk Model</label>
				                  <input type='text' class='form-control' name='COMP_hardisk' id='COMP_hardisk'> 
				                </div>

				                <div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Hardisk Capacity</label>
				                  <input type='text' class='form-control' name='COMP_capacity' id='COMP_capacity'> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">FQDN</label>
				                  <input type='text' class='form-control' name='COMP_FQDN' id='COMP_FQDN'> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Network Adapter</label>
				                  <input type='text' class='form-control' name='COMP_NA' id='COMP_NA'> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Graphic Adapter</label>
				                  <input type='text' class='form-control' name='COMP_GA' id='COMP_GA'> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Other Equipment</label>
				                  <textarea rows="4" class='form-control' name='COMP_OE' id='COMP_OE'></textarea> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Waranty Expiration Date</label>
				                  <input type='text' class='form-control datepicker' name='COMP_WAD' id='COMP_WAD'> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Install Date</label>
				                  <input type='text' class='form-control datepicker' name='COMP_InstallDate' id='COMP_InstallDate'> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Note</label>
				                  <textarea rows="4" class='form-control' name='COMP_Notes' id='COMP_Notes'> </textarea>  
				                </div>

				                <!-- Location : kau kena amik nama & id di location dropdown jadikan input , paste code ni -->
				                <div class="form-group col-md-3">
		          					<label for="exampleInputEmail1"> *Location </label>
		          					<input type='text' class='form-control' name='COMP_Location' id='COMP_Location' list="list_loc"> 
		          					<span id="alert_COMP_Location"></span>
				                </div>
				                <datalist id="list_loc"></datalist>
				                <!-- end -->
							
								<div class="form-group col-md-3">
		          					<label for="exampleInputEmail1">*Validity</label>
		          					<select class='form-control' name='COMP_validity' id='COMP_validity'>
		          					<option value=''>< Please Select ></option>
			          					<?= lookup_validity(); ?>
									</select>
		          					<span id="alert_COMP_validity"></span>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>
<script type="text/javascript">

	// start code location
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
                    url: '<?= base_url() ?>Admin/cmdb_computer_details', //create nama function
                    type: 'POST',
                    dataType: 'json', //jenis type adalah json
                    data: data,
                    beforeSend: function() {
                       
                    },
                    success: function(response){

                    	//input daripada form - id
						var COMP_Name = $("#COMP_Name").val(response.name); //put response to value
						var COMP_Deployment_State = $("#COMP_Deployment_State").val(response.deployment_state);
						var COMP_Incident_State = $("#COMP_Incident_State").val(response.incident_state );
						var COMP_vendor = $("#COMP_vendor").val(response.vendor);
						var COMP_model = $("#COMP_model").val(response.model);
						var COMP_description = $("#COMP_description").val(response.description);
						var COMP_type = $("#COMP_type").val(response.type);
						var COMP_owner = $("#COMP_owner").val(response.owner);
						var COMP_SerialNo = $("#COMP_SerialNo").val(response.serial_number);
						var COMP_OS = $("#COMP_OS").val(response.operating_system);
						var COMP_CPU = $("#COMP_CPU").val(response.CPU);
						var COMP_RAM = $("#COMP_RAM").val(response.Ram);
						var COMP_hardisk = $("#COMP_hardisk").val(response.HardDisk);
						var COMP_capacity = $("#COMP_capacity").val(response.capacity);
						var COMP_FQDN = $("#COMP_FQDN").val(response.FQDN);
						var COMP_NA = $("#COMP_NA").val(response.network_adapter);
						var COMP_GA = $("#COMP_GA").val(response.graphic_adapter);
						var COMP_OE = $("#COMP_OE").val(response.other_equipment);
						var COMP_WAD = $("#COMP_WAD").val(response.warranty_expiration_date);
						var COMP_InstallDate = $("#COMP_InstallDate").val(response.install_date);
						var COMP_Notes = $("#COMP_Notes").val(response.note);
						var COMP_Location = $("#COMP_Location").val(response.location);
						var COMP_validity = $("#COMP_validity").val(response.validity);

						var COMP_ip = $("#COMP_ip").val(response.ip);


						var network_port = $("#network_port").val(response.network_port);
						var cpu_model = $("#cpu_model").val(response.cpu_model);
						var cpu_serial_no = $("#cpu_serial_no").val(response.cpu_serial_no);
						var processor_type = $("#processor_type").val(response.processor_type);
						var monitor_brand = $("#monitor_brand").val(response.monitor_brand);
						var monitor_model = $("#monitor_model").val(response.monitor_model);
						var monitor_serial_no = $("#monitor_serial_no").val(response.monitor_serial_no);
						var ups_brand = $("#ups_brand").val(response.ups_brand);
						var ups_model = $("#ups_model").val(response.ups_model);
						var ups_serial_no = $("#ups_serial_no").val(response.ups_serial_no);

						// var COMP_WAD = $("#COMP_WAD").val(response.warranty_expiration_date);
						// var COMP_InstallDate = $("#COMP_InstallDate").val(response.install_date);

						console.log(response.warranty_expiration_date);
						console.log(response.install_date);

						var today = moment().format('MM/DD/YYYY');
						$('#COMP_InstallDate').val(today);
                    }
              });
	}

	function submit()
	{
		//input daripada form - id
		var COMP_Name = $("#COMP_Name").val();
		var COMP_Deployment_State = $("#COMP_Deployment_State").val();
		var COMP_Incident_State = $("#COMP_Incident_State").val();
		var COMP_vendor = $("#COMP_vendor").val();
		var COMP_model = $("#COMP_model").val();
		var COMP_description = $("#COMP_description").val();
		var COMP_type = $("#COMP_type").val();
		var COMP_owner = $("#COMP_owner").val();
		var COMP_SerialNo = $("#COMP_SerialNo").val();
		var COMP_OS = $("#COMP_OS").val();
		var COMP_CPU = $("#COMP_CPU").val();
		var COMP_RAM = $("#COMP_RAM").val();
		var COMP_hardisk = $("#COMP_hardisk").val();
		var COMP_capacity = $("#COMP_capacity").val();
		var COMP_FQDN = $("#COMP_FQDN").val();
		var COMP_NA = $("#COMP_NA").val();
		var COMP_GA = $("#COMP_GA").val();
		var COMP_OE = $("#COMP_OE").val();
		var COMP_WAD = $("#COMP_WAD").val();
		var COMP_InstallDate = $("#COMP_InstallDate").val();
		var COMP_Notes = $("#COMP_Notes").val();
		var COMP_Location = $("#COMP_Location").val();
		var COMP_validity = $("#COMP_validity").val();


		var network_port = $("#network_port").val();
		var cpu_model = $("#cpu_model").val();
		var cpu_serial_no = $("#cpu_serial_no").val();
		var processor_type = $("#processor_type").val();
		var monitor_brand = $("#monitor_brand").val();
		var monitor_model = $("#monitor_model").val();
		var monitor_serial_no = $("#monitor_serial_no").val();
		var ups_brand = $("#ups_brand").val();
		var ups_model = $("#ups_model").val();
		var ups_serial_no = $("#ups_serial_no").val();
	
		var other_id = $("#other_id").val(); //get id hidden 

		var COMP_ip = $("#COMP_ip").val();

		//check to action
		if(COMP_Name)
		{ 
			$("#alert_COMP_Name").html('');
		} else {
			$("#alert_COMP_Name").html('<font color="red"> required field </font>');
		}

		if(COMP_ip)
		{ 
			$("#alert_COMP_IP").html('');
		} else {
			$("#alert_COMP_IP").html('<font color="red"> required field </font>');
		}

		if(COMP_Deployment_State)
		{ 
			$("#alert_COMP_Deployment_State").html('');
		} else {
			$("#alert_COMP_Deployment_State").html('<font color="red"> required field </font>');
		}

		if(COMP_Incident_State)
		{ 
			$("#alert_COMP_Incident_State").html('');
		} else {
			$("#alert_COMP_Incident_State").html('<font color="red"> required field </font>');
		}

		if(COMP_Location)
		{ 
			$("#alert_COMP_Location").html('');
		} else {
			$("#alert_COMP_Location").html('<font color="red"> required field </font>');
		}

		if(COMP_validity)
		{ 
			$("#alert_COMP_validity").html('');
		} else {
			$("#alert_COMP_validity").html('<font color="red"> required field </font>');
		}


		//check to submit
		if((COMP_Name=='')||(COMP_Deployment_State=='')||(COMP_Incident_State=='')||(COMP_Location=='')||(COMP_validity=='')){

		} else {



		var data = 
		                {   

		                	'other_id':other_id,
		                	'COMP_Name':COMP_Name,
		                	'COMP_Deployment_State':COMP_Deployment_State,
		                	'COMP_Incident_State':COMP_Incident_State,
		                	'COMP_vendor':COMP_vendor,
		                	'COMP_model':COMP_model,
		                	'COMP_description':COMP_description,
		                	'COMP_type':COMP_type,
		                	'COMP_owner':COMP_owner,
		                	'COMP_SerialNo':COMP_SerialNo,
		                	'COMP_OS':COMP_OS,
		                	'COMP_CPU':COMP_CPU,
		                	'COMP_RAM':COMP_RAM,
		                	'COMP_hardisk':COMP_hardisk,
		                	'COMP_capacity':COMP_capacity,
		                	'COMP_FQDN':COMP_FQDN,
		                	'COMP_NA':COMP_NA,
		                	'COMP_GA':COMP_GA,
		                	'COMP_OE':COMP_OE,
		                	'COMP_WAD':COMP_WAD,
		                	'COMP_InstallDate':COMP_InstallDate,
		                	'COMP_Notes':COMP_Notes,
		                	'COMP_Location':COMP_Location,
		                	'COMP_validity':COMP_validity,
		                	'COMP_ip':COMP_ip,
		                	'network_port':network_port,
							'cpu_model':cpu_model,
							'cpu_serial_no':cpu_serial_no,
							'processor_type':processor_type,
							'monitor_brand':monitor_brand,
							'monitor_model':monitor_model,
							'monitor_serial_no':monitor_serial_no,
							'ups_brand':ups_brand,
							'ups_model':ups_model,
							'ups_serial_no':ups_serial_no,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		                }

                    
            $.ajax({
                    url: '<?= base_url() ?>Admin/CMDB_Computer_update', //create nama function controller
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                    	//alert("Data Updated !");
                    	//location.reload();

                    	var url = "<?= base_url()?>Admin/A_cmdb_computer_viewlist";
	                    window.location.href=url;
                    }
            });
		
		}
	}

	function cancel()
	{
			location.reload();
	}

	function remote()
	{

		var ip = $("#COMP_Name").val();
        var data =  {       
                                'ip':ip,
                                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                            }

        $.ajax({
                    url: '<?= base_url() ?>Admin/remoteComputer', //create nama function delete controller
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                        

                        //connect node js
                        var socket = io.connect('http://localhost:8787');

                        var username = ip;
                        socket.emit('new_client', username);
                        document.title = username + ' - ' + document.title;

                        // When a message is received it's inserted in the page
                        socket.on('message', function(data) {
                            insertMessage(data.username, data.message)
                        })


                        var message = "<?= getenv('COMPUTERNAME'); ?>";
                        socket.emit('message', message);
                        insertMessage(username, message);

                        // Adds a message to the page
                        function insertMessage(username, message) {
                            $('#chat_zone').prepend('<p><strong>' + username + '</strong> ' + message + '</p>');
                        }


                    }
            });


        

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