
		
<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Network Management </h5>
		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>CMDB/CMDB_Network_ViewList"><button class="btn btn-success btn-block"> Go To Overview</button></a>
				</div>
			</div>

			<div class="col-md-10">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Form Network</b> </h3>
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

	                <div class="form-group">
	  					<label for="exampleInputEmail1">Type</label>
	  					<select class='form-control' name='network_type' id='network_type'>
	  						<option value=''>< Please Select ></option>
	  						<?= lookup_network_type()?>
	  					</select>
	                </div>
					
					<div class="row">
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
				
						<div class="form-group col-md-3">
		                  <label for="exampleInputEmail1">DQ No</label>
		                  <input type='text' class='form-control' name='network_dqno' id='network_dqno'> 
		                </div>
				
						
		            </div>	


					<div class="row">
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
				
						<div class="form-group col-md-3">
		  					<label for="exampleInputEmail1">* Location </label>
					        <input type='text' class='form-control' name='network_loc' id='network_loc' list="list_loc">
		                </div>

		                <datalist id="list_loc"></datalist>
				
						<div class="form-group col-md-3">
		  					<label for="exampleInputEmail1">Validity</label>
		  					<select class='form-control' name='network_validity' id='network_validity'>
		  						<option value=''>< Please Select ></option>
		  						<?= lookup_validity()?>
		  					</select>
		                </div>
		            </div>
					
					<hr>
					<div class="row">
						<div class="col-md-8"></div>
						<div class="form-group col-md-2">
			            	<button type="submit" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
			            </div>
						<div class="form-group col-md-2">
			            	<button type="submit" class="btn btn-primary btn-block" onclick="submit();">Submit</button>
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

		var network_ip = $("#network_ip").val();
		
		var data = 	{
						"network_ip" : network_ip,
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
                    url: "<?= base_url() ?>CMDB/cmdb_network_addnet",
                    type: "POST",
                    dataType: "html",
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                    	alert("Success add Network !");
                    	location.reload();
                    }
            });

	}

	function cancel()
 	{
 		location.reload();
 	}
</script>