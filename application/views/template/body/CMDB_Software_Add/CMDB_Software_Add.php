
		
<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Software Management </h5>
		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>CMDB/CMDB_Software_ViewList"><button class="btn btn-success btn-block"> Go To Overview</button></a>
				</div>
			</div>

			<div class="col-md-10">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Form Add Software</b> </h3>
		          </div>
		          <div class="box-body">

		          	<div class="row">
						<div class="form-group col-md-3">
		                  <label for="exampleInputEmail1">* Name</label>
		                  <input type='text' class='form-control' name='software_name' id='software_name'> 
		                </div>
				
						<div class="form-group col-md-3">
		  					<label for="exampleInputEmail1">* Deployment State</label>
		  					<select class='form-control' name='software_state' id='software_state'>
		  						<option value=''>< Please Select ></option>
		  						<?= lookup_deployment_state(); ?>
		  					</select>
		                </div>
				
						<div class="form-group col-md-3">
		  					<label for="exampleInputEmail1">* Incident State</label>
		  					<select class='form-control' name='software_incident' id='software_incident'>
		  						<option value=''>< Please Select ></option>
		  						<?= lookup_incident_state(); ?>
		  					</select>
		                </div>
				
						<div class="form-group col-md-3">
		                  <label for="exampleInputEmail1">Version</label>
		                  <input type='text' class='form-control' name='software_version' id='software_version'> 
		                </div>
		           	</div>
					
					<div class="row">
						<div class="form-group col-md-3">
		                  <label for="exampleInputEmail1">Model</label>
		                  <input type='text' class='form-control' name='software_model' id='software_model'> 
		                </div>
				
						
						<div class="form-group col-md-3">
		  					<label for="exampleInputEmail1">Type</label>
		  					<select class='form-control' name='software_type' id='software_type'>
		  						<option value=''>< Please Select ></option>
		  						<?= lookup_software_type(); ?>
		  					</select>
		                </div>

		                <div class="form-group col-md-6">
		  					<label for="exampleInputEmail1">Description</label>
		  					<textarea class='form-control' rows='3' name='software_desc' id='software_desc'></textarea>
		                </div>
				
		            </div>
					

					<div class="row">
						<div class="form-group col-md-3">
		                  <label for="exampleInputEmail1">Owner</label>
		                  <input type='text' class='form-control' name='software_owner' id='software_owner'> 
		                </div>
				
						<div class="form-group col-md-3">
		                  <label for="exampleInputEmail1">Serial Number</label>
		                  <input type='text' class='form-control' name='software_serialno' id='software_serialno'> 
		                </div>
				
						<div class="form-group col-md-3">
		                  <label for="exampleInputEmail1">License Type</label>
		                  <input type='text' class='form-control' name='software_license' id='software_license'> 
		                </div>
				
						<div class="form-group col-md-3">
		                  <label for="exampleInputEmail1">License Key</label>
		                  <input type='text' class='form-control' name='software_key' id='software_key'> 
		                </div>
		            </div>
					
					<div class="row">
						<div class="form-group col-md-3">
		                  <label for="exampleInputEmail1">Media</label>
		                  <input type='text' class='form-control' name='software_media' id='software_media'> 
		                </div>
				
						
				
						<div class="form-group col-md-3">
		  					<label for="exampleInputEmail1"> Location </label>
					        <input type='text' class='form-control' name='software_loc' id='software_loc' list="list_loc"> 
		                </div>

		                <div class="form-group col-md-3">
		  					<label for="exampleInputEmail1">Validity</label>
		  					<select class='form-control' name='software_validity' id='software_validity'>
		  						<option value=''>< Please Select ></option>
		  						<?= lookup_validity()?>
		  					</select>
		                </div>

		                <datalist id="list_loc"></datalist>
				
						
		            </div>

		            <div class="row">
		            	
		                <div class="form-group col-md-6">
		  					<label for="exampleInputEmail1">Note</label>
		  					<textarea class='form-control' rows='3' name='software_note' id='software_note'></textarea>
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
		var software_name = $("#software_name").val();
		var software_state = $("#software_state").val();
		var software_incident = $("#software_incident").val();
		var software_version = $("#software_version").val();
		var software_model = $("#software_model").val();
		var software_desc = $("#software_desc").val();
		var software_type = $("#software_type").val();
		var software_owner = $("#software_owner").val();
		var software_serialno = $("#software_serialno").val();
		var software_license = $("#software_license").val();
		var software_key = $("#software_key").val();
		var software_media = $("#software_media").val();
		var software_note = $("#software_note").val();
		var software_loc = $("#software_loc").val();
		var software_validity = $("#software_validity").val();
		var data = 	{
						"software_name" : software_name,
						"software_state" : software_state,
						"software_incident" : software_incident,
						"software_version" : software_version,
						"software_model" : software_model,
						"software_desc" : software_desc,
						"software_type" : software_type,
						"software_owner" : software_owner,
						"software_serialno" : software_serialno,
						"software_license" : software_license,
						"software_key" : software_key,
						"software_media" : software_media,
						"software_note" : software_note,
						"software_loc" : software_loc,
						"software_validity" : software_validity,
						
					}

		$.ajax({
	                url: "<?= base_url() ?>cmdb/cmdb_software_addsoft",
	                type: "POST",
	                dataType: "html",
	                data: data,
	                beforeSend: function() {

	                },
	                success: function(response){	
	                	alert('Success add software !');
	                	location.reload();
	                }
	        });

	}

	function cancel()
		{
			location.reload();
		}
</script>