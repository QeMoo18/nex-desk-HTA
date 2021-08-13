
		
<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?>
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Hardware Management </h5>
		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>CMDB/CMDB_Hardware_ViewList"><button class="btn btn-success btn-block"> Go To Overview</button></a>

				<?= qr_code($this->uri->segment(3));?>

				</div>
			</div>

			<div class="col-md-10">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>View Hardware</b> </h3>
		          </div>
		          <div class="box-body">

		          		<div class="row">
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">* Name</label>
			                  <input type='text' class='form-control' name='cmdb_hardware_name' id='cmdb_hardware_name'> 
			                </div>
					
							<div class="form-group col-md-3">
	          					<label for="exampleInputEmail1">* Deployment STate</label>
	          					<select class='form-control' name='cmdb_hardware_deploymentstate' id='cmdb_hardware_deploymentstate'>
	          						<option value=''>< Please Select ></option>
	          						<?= lookup_deployment_state(); ?>
	          					</select>
			                </div>
					
							<div class="form-group col-md-3">
	          					<label for="exampleInputEmail1">* Incident State</label>
	          					<select class='form-control' name='cmdb_hardware_incidentstate' id='cmdb_hardware_incidentstate'>
	          						<option value=''>< Please Select ></option>
	          						<?= lookup_incident_state(); ?>
	          					</select>
			                </div>

			                <div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">* IP address</label>
			                  <input type='text' class='form-control' name='cmdb_hardware_ip' id='cmdb_hardware_ip'> 
			                </div>
					
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Vendor</label>
			                  <input type='text' class='form-control' name='cmdb_hardware_vendor' id='cmdb_hardware_vendor'> 
			                </div>
			            </div>
						
						<div class="row">
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Model</label>
			                  <input type='text' class='form-control' name='cmdb_hardware_model' id='cmdb_hardware_model'> 
			                </div>


			                <div class="form-group col-md-3">
	          					<label for="exampleInputEmail1">Type</label>
	          					<select class='form-control' name='cmdb_hardware_type' id='cmdb_hardware_type'><option value=''>
	          						< Please Select ></option>
	          						<?= lookup_hardware_type() ?>
	          					</select>
			                </div>
					
							<div class="form-group col-md-6">
	          					<label for="exampleInputEmail1">Description</label>
	          					<textarea class='form-control' rows='3' name='cmdb_hardware_desc' id='cmdb_hardware_desc'></textarea>
			                </div>
						</div>
							
						
						<div class="row">
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Owner</label>
			                  <input type='text' class='form-control' name='cmdb_hardware_owner' id='cmdb_hardware_owner'> 
			                </div>
					
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Serial Number</label>
			                  <input type='text' class='form-control' name='cmdb_hardware_serialno' id='cmdb_hardware_serialno'> 
			                </div>
					
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Waranty Expiration Date</label>
			                  <input type='text' class='form-control datepicker' name='cmdb_hardware_waranty' id='cmdb_hardware_waranty'> 
			                </div>
					
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Install Date</label>
			                  <input type='text' class='form-control datepicker' name='cmdb_hardware_install' id='cmdb_hardware_install'> 
			                </div>
			            </div>
						
						
			            <div class="row">
			                <div class="form-group col-md-3">
	          					<label for="exampleInputEmail1"> Location </label>
	          					<input type='text' class='form-control' name='cmdb_hardware_location' id='cmdb_hardware_location' list="list_loc"> 
			                </div>
			                <datalist id="list_loc"></datalist>


			                <div class="form-group col-md-3">
	          					<label for="exampleInputEmail1">Validity </label>
	          					<select class='form-control' name='cmdb_hardware_valid' id='cmdb_hardware_valid'>
	          						<option value=''>< Please Select ></option>
	          						<?= lookup_validity()?>
	          					</select>
			                </div>

			                <div class="form-group col-md-6">
	          					<label for="exampleInputEmail1">Note</label>
	          					<textarea class='form-control' rows='3' name='cmdb_hardware_note' id='cmdb_hardware_note'></textarea>
			                </div>
						</div>

				  </div>
				</div>
			</div>


		</div>
	</section>
</div>

<input type="hidden" name="other_id" id="other_id" value="<?= $this->uri->segment('3')?>">

<script type="text/javascript">
	$(document).ready(function (){
		details();
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

	function details()
	{
			var other_id = $("#other_id").val();
			var data = 	{
							"other_id" : other_id,
							'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
						}

			$.ajax({
	                    url: "<?= base_url() ?>CMDB/cmdb_hardware_details",
	                    type: "POST",
	                    dataType: "json",
	                    data: data,
	                    beforeSend: function() {

	                    },
	                    success: function(response){
	                    		var cmdb_hardware_name = $("#cmdb_hardware_name").val(response.name);
								var cmdb_hardware_deploymentstate = $("#cmdb_hardware_deploymentstate").val(response.deployment_state);
								var cmdb_hardware_incidentstate = $("#cmdb_hardware_incidentstate").val(response.incident_state);
								var cmdb_hardware_vendor = $("#cmdb_hardware_vendor").val(response.vendor);
								var cmdb_hardware_model = $("#cmdb_hardware_model").val(response.model);
								var cmdb_hardware_desc = $("#cmdb_hardware_desc").val(response.description);
								var cmdb_hardware_type = $("#cmdb_hardware_type").val(response.type);
								var cmdb_hardware_owner = $("#cmdb_hardware_owner").val(response.owner);
								var cmdb_hardware_serialno = $("#cmdb_hardware_serialno").val(response.serial_number);
								var cmdb_hardware_waranty = $("#cmdb_hardware_waranty").val(response.waranty_expired_date);
								var cmdb_hardware_install = $("#cmdb_hardware_install").val(response.install_date);
								var cmdb_hardware_note = $("#cmdb_hardware_note").val(response.note);
								var cmdb_hardware_location = $("#cmdb_hardware_location").val(response.location);
								var cmdb_hardware_valid = $("#cmdb_hardware_valid").val(response.valid);

								var cmdb_hardware_ip = $("#cmdb_hardware_ip").val(response.ip_address);
	                    }
	              });
               				
	}




	function cancel()
	{
		location.reload();
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