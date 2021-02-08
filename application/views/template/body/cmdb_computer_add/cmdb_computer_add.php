

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Computer Management </h5>
		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>CMDB/cmdb_computer_ViewList"><button class="btn btn-success btn-block"> Go To Overview</button></a>
				</div>
			</div>

			<div class="col-md-10">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Form Computer</b> </h3>
		          </div>
		          <div class="box-body">

		          		<div class="row">
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">* Hostname</label>
			                  <input type='text' class='form-control' name='cmdb_computer_name' id='cmdb_computer_name'> 
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



						<hr>
						<div class="row">
							<div class="col-md-8"></div>
							<div class="form-group col-md-2">
				            	<button type="button" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
				            </div>
							<div class="form-group col-md-2">
				            	<button type="button" class="btn btn-primary btn-block" onclick="submit_cmdb();">Submit</button>
				            </div>

						</div>

				  </div>
				</div>
			</div>
		</div>
	</section>
</div>
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


	function submit_cmdb()
	{
		var cmdb_computer_name = $("#cmdb_computer_name").val();
		var cmdb_computer_deploymentstate = $("#cmdb_computer_deploymentstate").val();
		var cmdb_computer_incidentstate = $("#cmdb_computer_incidentstate").val();
		var cmdb_computer_vendor = $("#cmdb_computer_vendor").val();
		var cmdb_computer_model = $("#cmdb_computer_model").val();
		var cmdb_computer_desc = $("#cmdb_computer_desc").val();
		var cmdb_computer_type = $("#cmdb_computer_type").val();
		var cmdb_computer_owner = $("#cmdb_computer_owner").val();
		var cmdb_computer_serialno = $("#cmdb_computer_serialno").val();
		var cmdb_computer_os = $("#cmdb_computer_os").val();
		var cmdb_computer_cpu = $("#cmdb_computer_cpu").val();
		var cmdb_computer_ram = $("#cmdb_computer_ram").val();
		var cmdb_computer_hardisk = $("#cmdb_computer_hardisk").val();
		var cmdb_computer_cpacity = $("#cmdb_computer_cpacity").val();
		var cmdb_computer_fqdn = $("#cmdb_computer_fqdn").val();
		var cmdb_computer_netadapter = $("#cmdb_computer_netadapter").val();
		var cmdb_computer_graphic = $("#cmdb_computer_graphic").val();
		var cmdb_computer_other = $("#cmdb_computer_other").val();
		var cmdb_computer_waranty = $("#cmdb_computer_waranty").val();
		var cmdb_computer_install = $("#cmdb_computer_install").val();
		var cmdb_computer_note = $("#cmdb_computer_note").val();


		var COMP_ip = $("#COMP_ip").val();

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
		

		var cmdb_computer_location = $("#cmdb_computer_location").val();

		//alert(cmdb_computer_name);

		var data = 	{
						"cmdb_computer_name" : cmdb_computer_name,
						"cmdb_computer_deploymentstate" : cmdb_computer_deploymentstate,
						"cmdb_computer_incidentstate" : cmdb_computer_incidentstate,
						"cmdb_computer_vendor" : cmdb_computer_vendor,
						"cmdb_computer_model" : cmdb_computer_model,
						"cmdb_computer_desc" : cmdb_computer_desc,
						"cmdb_computer_type" : cmdb_computer_type,
						"cmdb_computer_owner" : cmdb_computer_owner,
						"cmdb_computer_serialno" : cmdb_computer_serialno,
						"cmdb_computer_os" : cmdb_computer_os,
						"cmdb_computer_cpu" : cmdb_computer_cpu,
						"cmdb_computer_ram" : cmdb_computer_ram,
						"cmdb_computer_hardisk" : cmdb_computer_hardisk,
						"cmdb_computer_cpacity" : cmdb_computer_cpacity,
						"cmdb_computer_fqdn" : cmdb_computer_fqdn,
						"cmdb_computer_netadapter" : cmdb_computer_netadapter,
						"cmdb_computer_graphic" : cmdb_computer_graphic,
						"cmdb_computer_other" : cmdb_computer_other,
						"cmdb_computer_waranty" : cmdb_computer_waranty,
						"cmdb_computer_install" : cmdb_computer_install,
						"cmdb_computer_note" : cmdb_computer_note,
						"cmdb_computer_location":cmdb_computer_location,
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
                    url: "<?= base_url() ?>CMDB/cmdb_computer_addcom",
                    type: "POST",
                    dataType: "html",
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                    	alert('Success add computer');
                    	location.reload();
                    }
            });

	}

	function cancel()
 	{
 		location.reload();
 	}
</script>