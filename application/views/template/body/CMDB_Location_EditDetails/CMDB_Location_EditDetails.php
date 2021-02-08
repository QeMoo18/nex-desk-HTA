

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?>
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Location Management </h5>
		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>CMDB/CMDB_Location_ViewList"><button class="btn btn-success btn-block"> Go To Overview</button></a>
				</div>
			</div>

			<div class="col-md-7">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Form View Location</b> </h3>
		          </div>
		          <div class="box-body">


		          		<div class="row">
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">* Name</label>
			                  <input type='text' class='form-control' name='location_name' id='location_name'> 
			                </div>
					
							<div class="form-group col-md-3">
	          					<label for="exampleInputEmail1">* Deployment State</label>
	          					<select class='form-control' name='location_state' id='location_state'>
	          						<option value=''>< Please Select ></option>
	          						<?= lookup_deployment_state(); ?>
	          					</select>
			                </div>
					
							<div class="form-group col-md-3">
	          					<label for="exampleInputEmail1">* Incident State</label>
	          					<select class='form-control' name='location_incident' id='location_incident'>
	          						<option value=''>< Please Select ></option>
	          						<?= lookup_incident_state(); ?>
	          					</select>
			                </div>
					
							<div class="form-group col-md-3">
	          					<label for="exampleInputEmail1">Type</label>
	          					<select class='form-control' name='location_type' id='location_type'>
	          						<option value=''>< Please Select ></option>
	          						<?= lookup_location_type() ?>
	          					</select>
			                </div>
			            </div>
						


						<div class="row">
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Phone</label>
			                  <input type='text' class='form-control' name='location_phone' id='location_phone'> 
			                </div>
					
							
					
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">City</label>
			                  <input type='text' class='form-control' name='location_city' id='location_city'> 
			                </div>
					
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">State</label>
			                  <input type='text' class='form-control' name='location_statex' id='location_statex'> 
			                </div>

			                <div class="form-group col-md-3">
	          					<label for="exampleInputEmail1">Address</label>
	          					<textarea class='form-control' rows='3' name='location_address' id='location_address'></textarea>
			                </div>
			            </div>
					
						<div class="row">
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Country</label>
			                  <input type='text' class='form-control' name='location_country' id='location_country'> 
			                </div>
					
							<div class="form-group col-md-3">
	          					<label for="exampleInputEmail1">Validity</label>
	          					<select class='form-control' name='location_validity' id='location_validity'>
	          						<option value=''>< Please Select ></option>
	          						<?= lookup_validity()?>
	          					</select>
			                </div>
						</div>
						
							

				  </div>
				</div>
			</div>

			<div class="col-md-3 hidden-xs">
				<?= lookup_widget(); ?>		        
			</div>

		</div>
	</section>
</div>

<input type="hidden" name="other_id" id="other_id" value="<?= $this->uri->segment('3')?>">

<script type="text/javascript">
	$(document).ready(function (){
		details();
	});


	function details()
	{
			var other_id = $("#other_id").val();
			var data = 	{
							"other_id" : other_id,
							'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
						}

			$.ajax({
	                    url: "<?= base_url() ?>CMDB/cmdb_location_details",
	                    type: "POST",
	                    dataType: "json",
	                    data: data,
	                    beforeSend: function() {

	                    },
	                    success: function(response){
	                    	
	                    	var location_name = $("#location_name").val(response.name);
							var location_state = $("#location_state").val(response.deployment_state);
							var location_incident = $("#location_incident").val(response.incident_state);
							var location_type = $("#location_type").val(response.type);
							var location_phone = $("#location_phone").val(response.phone);
							var location_address = $("#location_address").val(response.address);
							var location_city = $("#location_city").val(response.city);
							var location_statex = $("#location_statex").val(response.state);
							var location_country = $("#location_country").val(response.country);
							var location_validity = $("#location_validity").val(response.validity);

	                    }
	              });
               				
	}


	function submit()
	{
		var location_name = $("#location_name").val();
		var location_state = $("#location_state").val();
		var location_incident = $("#location_incident").val();
		var location_type = $("#location_type").val();
		var location_phone = $("#location_phone").val();
		var location_address = $("#location_address").val();
		var location_city = $("#location_city").val();
		var location_statex = $("#location_statex").val();
		var location_country = $("#location_country").val();
		var location_validity = $("#location_validity").val();
		var data = 	{
						"location_name" : location_name,
						"location_state" : location_state,
						"location_incident" : location_incident,
						"location_type" : location_type,
						"location_phone" : location_phone,
						"location_address" : location_address,
						"location_city" : location_city,
						"location_statex" : location_statex,
						"location_country" : location_country,
						"location_validity" : location_validity,
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