

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?>
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Location Management </h3>
		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>CMDB/CMDB_Location_ViewList"><button class="btn btn-success btn-block"> Go To Overview</button></a>
				</div>
			</div>

			<div class="col-md-10">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Form Add Location</b> </h3>
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
			                  <input type='text' class='form-control' name='location_phone' id='location_phone' 
			                  onkeyup="this.value=this.value.replace(/[^\d]/,'')"> 
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
                    url: "<?= base_url() ?>CMDB/CMDB_Location_AddLoc",
                    type: "POST",
                    dataType: "html",
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                    	alert("Success add location");
                    	location.reload();
                    }
            });

	}

	function cancel()
 	{
 		location.reload();
 	}
</script>