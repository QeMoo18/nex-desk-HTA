
		
<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i>  Network Management </h5>
		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>CMDB/CMDB_Network_ViewList"><button class="btn btn-success btn-block"> Go To Overview</button></a>

				<?= qr_code($this->uri->segment(3));?>

				</div>
			</div>

			<div class="col-md-10">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>View Network</b> </h3>
		          </div>
		          <div class="box-body">

		          			<div class="row">
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">* Name</label>
				                  <input type='text' class='form-control' name='network_name' id='network_name'> 
				                </div>

				                <div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">*LAN IP Address</label>
				                  <input type='text' class='form-control' name='network_ip' id='network_ip'> 
				                  <span id="alert_network_IP"></span> 
				                </div>
						
								<div class="form-group col-md-3">
				  					<label for="exampleInputEmail1">* Deployment State</label>
				  					<select class='form-control' name='network_state' id='network_state'>
				  						<option value=''>< Please Select ></option>
				  						<?= lookup_deployment_state(); ?>
				  					</select>
				                </div>
						
								<div class="form-group col-md-3">
				  					<label for="exampleInputEmail1">* Incident State</label>
				  					<select class='form-control' name='network_incident' id='network_incident'>
				  						<option value=''>< Please Select ></option>
				  						<?= lookup_incident_state(); ?>
				  					</select>
				                </div>
				            </div>
					
							<div class="form-group" style="display: none">
			                  <label for="exampleInputEmail1">Vendor</label>
			                  <input type='text' class='form-control' name='network_vendor' id='network_vendor'> 
			                </div>
					
							<div class="form-group" style="display: none">
			                  <label for="exampleInputEmail1">Model</label>
			                  <input type='text' class='form-control' name='network_model' id='network_model'> 
			                </div>
					
							<div class="form-group">
			  					<label for="exampleInputEmail1">Description</label>
			  					<textarea class='form-control' rows='3' name='network_desc' id='network_desc'></textarea>
			                </div>
							
							<div class="row">
								<div class="form-group col-md-3">
				  					<label for="exampleInputEmail1">Type</label>
				  					<select class='form-control' name='network_type' id='network_type'>
				  						<option value=''>< Please Select ></option>
				  						<?= lookup_network_type()?>
				  					</select>
				                </div>

								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Lv No</label>
				                  <input type='text' class='form-control' name='network_lv' id='network_lv'> 
				                </div>
						
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Primary Service No</label>
				                  <input type='text' class='form-control' name='network_primaryno' id='network_primaryno'> 
				                </div>
						
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Backup Service  No</label>
				                  <input type='text' class='form-control' name='network_backupno' id='network_backupno'> 
				                </div>
				            </div>
							
							<div class="row">
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">DQ No</label>
				                  <input type='text' class='form-control' name='network_dqno' id='network_dqno'> 
				                </div>
						
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Service No</label>
				                  <input type='text' class='form-control' name='network_serviceno' id='network_serviceno'> 
				                </div>
						
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Network Address (PS)</label>
				                  <input type='text' class='form-control' name='network_ps' id='network_ps'> 
				                </div>
						
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Network Address (BS)</label>
				                  <input type='text' class='form-control' name='network_bs' id='network_bs'> 
				                </div>
				            </div>
							

							<div class="row">
								<div class="form-group col-md-6">
				  					<label for="exampleInputEmail1"> Location </label>
							        <input type='text' class='form-control' name='network_loc' id='network_loc' list="list_loc">
				                </div>

				                <datalist id="list_loc"></datalist>
						
								<div class="form-group col-md-6">
				  					<label for="exampleInputEmail1">Validity</label>
				  					<select class='form-control' name='network_validity' id='network_validity'>
				  						<option value=''>< Please Select ></option>
				  						<?= lookup_validity()?>
				  					</select>
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
	                    url: "<?= base_url() ?>CMDB/cmdb_network_details",
	                    type: "POST",
	                    dataType: "json",
	                    data: data,
	                    beforeSend: function() {

	                    },
	                    success: function(response){
	                    	
	                    	var network_name = $("#network_name").val(response.name);
							var network_state = $("#network_state").val(response.deployment_state);
							var network_incident = $("#network_incident").val(response.incident_state);
							var network_vendor = $("#network_vendor").val(response.vendor);
							var network_model = $("#network_model").val(response.model);
							var network_desc = $("#network_desc").val(response.description);
							var network_lv = $("#network_lv").val(response.lv_no);
							var network_primaryno = $("#network_primaryno").val(response.ps_no);
							var network_backupno = $("#network_backupno").val(response.bs_no);
							var network_dqno = $("#network_dqno").val(response.dq_no);
							var network_serviceno = $("#network_serviceno").val(response.service_number);
							var network_ps = $("#network_ps").val(response.networkAddress_ps);
							var network_bs = $("#network_bs").val(response.networkAddress_bs);
							var network_loc = $("#network_loc").val(response.location);
							var network_validity = $("#network_validity").val(response.validity);
							var network_type = $("#network_type").val(response.type);

							var network_ip = $("#network_ip").val(response.ip);

	                    }
	              });
               				
	}


	function submit()
	{
		var network_name = $("#network_name").val();
		var network_state = $("#network_state").val();
		var network_incident = $("#network_incident").val();
		var network_vendor = $("#network_vendor").val();
		var network_model = $("#network_model").val();
		var network_desc = $("#network_desc").val();
		var network_lv = $("#network_lv").val();
		var network_primaryno = $("#network_primaryno").val();
		var network_backupno = $("#network_backupno").val();
		var network_dqno = $("#network_dqno").val();
		var network_serviceno = $("#network_serviceno").val();
		var network_ps = $("#network_ps").val();
		var network_bs = $("#network_bs").val();
		var network_loc = $("#network_loc").val();
		var network_validity = $("#network_validity").val();
		var network_type = $("#network_type").val();
		
		var data = 	{
						"network_name" : network_name,
						"network_state" : network_state,
						"network_incident" : network_incident,
						"network_vendor" : network_vendor,
						"network_model" : network_model,
						"network_desc" : network_desc,
						"network_type" : network_type,
						"network_lv" : network_lv,
						"network_primaryno" : network_primaryno,
						"network_backupno" : network_backupno,
						"network_dqno" : network_dqno,
						"network_serviceno" : network_serviceno,
						"network_ps" : network_ps,
						"network_bs" : network_bs,
						"network_loc" : network_loc,
						"network_validity" : network_validity,
						'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
						
					}

		$.ajax({
                    url: "<?= base_url() ?>CMDB/namafucntion",
                    type: "POST",
                    dataType: "html",
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){

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