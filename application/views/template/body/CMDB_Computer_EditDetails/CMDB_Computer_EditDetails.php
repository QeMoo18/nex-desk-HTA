

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Computer Management </h5>
		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>CMDB/cmdb_computer_ViewList"><button class="btn btn-success btn-block"> Go To Overview</button></a>

				<br>
				<?php 
				$env = $this->session->userdata('env');
				if($env=='hospital'){
				?>

				<a onclick="remote();"> 
					<button class="btn btn-danger btn-block"> Remote </button>
				</a>

				<?php } ?>

				<?= qr_code($this->uri->segment(3));?>

				</div>
			</div>

			<div class="col-md-10">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>View Computer</b> </h3>
		          </div>
		          <div class="box-body">

		          		<div class="row">
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">* Name</label>
			                  <input type='text' class='form-control' name='cmdb_computer_name' id='cmdb_computer_name'> 
			                </div>

			                <div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">*IP Address</label>
			                  <input type='text' class='form-control' name='COMP_ip' id='COMP_ip'> 
			                  <span id="alert_COMP_IP"></span> 
			                </div>

			                 <div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Mac Address</label>
			                  <input type='text' class='form-control' name='COMP_mac' id='COMP_mac'> 
			                  <span id="alert_COMP_mac"></span> 
			                </div>


			                <div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Network Port</label>
			                  <input type='text' class='form-control' name='network_port' id='network_port'> 
			                  <span id="alert_Network_Port"></span> 
			                </div>
					
							<div class="form-group col-md-3">
	          					<label for="exampleInputEmail1">* Deployment State</label>
	          					<select class='form-control' name='cmdb_computer_deploymentstate' id='cmdb_computer_deploymentstate'>
	          						<option value=''>< Please Select ></option>
	          						<?= lookup_deployment_state(); ?>
	          					</select>
			                </div>
					
							<div class="form-group col-md-3">
	          					<label for="exampleInputEmail1">* Incident State</label>
	          					<select class='form-control' name='cmdb_computer_incidentstate' id='cmdb_computer_incidentstate'>
	          						<option value=''>< Please Select ></option>
	          						<?= lookup_incident_state(); ?>
	          					</select>
			                </div>
					
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1"> Vendor</label>
			                  <input type='text' class='form-control' name='cmdb_computer_vendor' id='cmdb_computer_vendor'> 
			                </div>


							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Model</label>
			                  <input type='text' class='form-control' name='cmdb_computer_model' id='cmdb_computer_model'> 
			                </div>
					
							


							<div class="form-group col-md-3">
	          					<label for="exampleInputEmail1">Description</label>
	          					<textarea class='form-control' rows='3' name='cmdb_computer_desc' id='cmdb_computer_desc'></textarea>
			                </div>
						</div>


						<div class="row">

							<div class="form-group col-md-3">
	          					<label for="exampleInputEmail1">Type</label>
	          					<select class='form-control' name='cmdb_computer_type' id='cmdb_computer_type'>
	          						<option value=''>< Please Select ></option>
	          						<?= lookup_computer_type(); ?>
	          					</select>
			                </div>

							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Owner</label>
			                  <input type='text' class='form-control' name='cmdb_computer_owner' id='cmdb_computer_owner'> 
			                </div>
					
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Serial Number</label>
			                  <input type='text' class='form-control' name='cmdb_computer_serialno' id='cmdb_computer_serialno'> 
			                </div>
					
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Operating System</label>
			                  <input type='text' class='form-control' name='cmdb_computer_os' id='cmdb_computer_os'> 
			                </div>
					
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">CPU Brand</label>
			                  <input type='text' class='form-control' name='cmdb_computer_cpu' id='cmdb_computer_cpu'> 
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
						</div>


						<div class="row">
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">RAM</label>
			                  <input type='text' class='form-control' name='cmdb_computer_ram' id='cmdb_computer_ram'> 
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
			                  <input type='text' class='form-control' name='cmdb_computer_hardisk' id='cmdb_computer_hardisk'> 
			                </div>

			                <div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Hardisk Capacity</label>
			                  <input type='text' class='form-control' name='cmdb_computer_cpacity' id='cmdb_computer_cpacity'> 
			                </div>
					
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">FQDN</label>
			                  <input type='text' class='form-control' name='cmdb_computer_fqdn' id='cmdb_computer_fqdn'> 
			                </div>


							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Network Adapter</label>
			                  <input type='text' class='form-control' name='cmdb_computer_netadapter' id='cmdb_computer_netadapter'> 
			                </div>
					
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Graphic Adapter</label>
			                  <input type='text' class='form-control' name='cmdb_computer_graphic' id='cmdb_computer_graphic'> 
			                </div>
					
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Other Equipment</label>
			                  <input type='text' class='form-control' name='cmdb_computer_other' id='cmdb_computer_other'> 
			                </div>
					
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Waranty Expiration Date</label>
			                  <input type='text' class='form-control datepicker' name='cmdb_computer_waranty' id='cmdb_computer_waranty'> 
			                </div>

			                
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Install Date</label>
			                  <input type='text' class='form-control datepicker' name='cmdb_computer_install' id='cmdb_computer_install'> 
			                </div>
						

							<div class="form-group col-md-3">
	          					<label for="exampleInputEmail1"> Location </label>
	          					<input type='text' class='form-control' name='cmdb_computer_location' id='cmdb_computer_location' list="list_loc"> 
			                </div>
			                <datalist id="list_loc"></datalist>

			                <div class="form-group col-md-6">
	          					<label for="exampleInputEmail1">Note</label>
	          					<textarea class='form-control' rows='3' name='cmdb_computer_note' id='cmdb_computer_note'></textarea>
			                </div>
							
			            </div>
						
						

				  </div>
				</div>
			</div>

		</div>
	</section>
</div>

<input type="hidden" name="other_id" id="other_id" value="<?= $this->uri->segment('3')?>">

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>

<script type="text/javascript">

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

	$(document).ready(function (){
		var other_id = $("#other_id").val();
		var data = 	{
						"other_id" : other_id,
						'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
					}

		$.ajax({
                    url: "<?= base_url() ?>CMDB/cmdb_computer_details",
                    type: "POST",
                    dataType: "json",
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
               				

                    		var cmdb_computer_name = $("#cmdb_computer_name").val(response.name);
							var cmdb_computer_deploymentstate = $("#cmdb_computer_deploymentstate").val(response.deployment_state);
							var cmdb_computer_incidentstate = $("#cmdb_computer_incidentstate").val(response.incident_state);
							var cmdb_computer_vendor = $("#cmdb_computer_vendor").val(response.vendor);
							var cmdb_computer_model = $("#cmdb_computer_model").val(response.model);
							var cmdb_computer_desc = $("#cmdb_computer_desc").val(response.description);
							var cmdb_computer_type = $("#cmdb_computer_type").val(response.type);
							var cmdb_computer_owner = $("#cmdb_computer_owner").val(response.owner);
							var cmdb_computer_serialno = $("#cmdb_computer_serialno").val(response.serial_number);
							var cmdb_computer_os = $("#cmdb_computer_os").val(response.operating_system);
							var cmdb_computer_cpu = $("#cmdb_computer_cpu").val(response.CPU);
							var cmdb_computer_ram = $("#cmdb_computer_ram").val(response.Ram);
							var cmdb_computer_hardisk = $("#cmdb_computer_hardisk").val(response.HardDisk);
							var cmdb_computer_cpacity = $("#cmdb_computer_cpacity").val(response.capacity);
							var cmdb_computer_fqdn = $("#cmdb_computer_fqdn").val(response.FQDN);
							var cmdb_computer_netadapter = $("#cmdb_computer_netadapter").val(response.network_adapter);
							var cmdb_computer_graphic = $("#cmdb_computer_graphic").val(response.graphic_adapter);
							var cmdb_computer_other = $("#cmdb_computer_other").val(response.other_equipment);
							var cmdb_computer_waranty = $("#cmdb_computer_waranty").val(response.warranty_expiration_date);
							var cmdb_computer_install = $("#cmdb_computer_install").val(response.install_date);
							var cmdb_computer_note = $("#cmdb_computer_note").val(response.note);


							var location = $("#cmdb_computer_location").val(response.location);



							var COMP_ip = $("#COMP_ip").val(response.ip);
							var COMP_mac = $("#COMP_mac").val(response.mac_address);


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
							$('#cmdb_computer_install').val(today);

                    }
            });

	});


	function remote()
	{

		var ip = $("#cmdb_computer_name").val();
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
	function print_qr(id_qr_code)
    {
    	$("#id_qr_code").val(id_qr_code);
    	$("#qr_code_submit_pdf").trigger('click');
    }
</script>

<form action="<?= base_url()?>CMDB/print_qr/<?= $this->uri->segment(3)?>" method="POST" style="display: none">
<input type="hidden" name="id_qr_code" id="id_qr_code" value="<?= $this->uri->segment(3)?>">
<button type="submit" class="form-control" id="qr_code_submit_pdf"> Submit </button>
</form>