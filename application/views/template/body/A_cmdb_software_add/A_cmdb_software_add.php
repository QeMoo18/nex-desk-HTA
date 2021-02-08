

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?>
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Software Management </h5>
		<div class="row">
			<div class="col-md-2"> 
				<div class="form-group">
					<a href="<?= base_url()?>admin/A_cmdb_software_viewlist"> 
						<button class="btn btn-danger btn-block"> Go To Overview</button>
					</a>
				</div>
			</div>	
			<div class="col-md-10">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Add Software</b> </h3>
		          </div>
		          <div class="box-body">
						
						<div class="row">
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">*Name</label>
			                  <input type='text' class='form-control' name='SW_name' id='SW_name'>
			                   <span id="alert_SW_name"></span> 
			                </div>

			                 <div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">*Deployment State</label>
				                  <select class='form-control' name='SW_deployment_state' id='SW_deployment_state'>
				                  <option value=''>< Please Select ></option>
			      					<?= lookup_deployment_state(); ?>
			      				  </select>
			                  <span id="alert_SW_deployment_state"></span> 
			                </div>
						
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">*Incident State</label>
			                  <select class='form-control' name='SW_incident_state' id='SW_incident_state'>
			                  	<option value=''>< Please Select ></option>
		      					<?= lookup_incident_state(); ?>
		      				  </select>
		      				  <span id="alert_SW_incident_state"></span> 
			                </div>
						
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Vendor</label>
			                  <input type='text' class='form-control' name='SW_vendor' id='SW_vendor'> 
			                </div>
			            </div>
						
						<div class="row">
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Version</label>
			                  <input type='text' class='form-control' name='SW_version' id='SW_version'> 
			                </div>
			            </div>
						
						<div class="row">
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Description</label>
			                  <textarea rows="4" class='form-control' name='SW_description' id='SW_description'> 
			                  </textarea> 
			                </div>
						
							 <div class="form-group col-md-3">
	          					<label for="exampleInputEmail1">Type</label>
	          					<select class='form-control' name='SW_type' id='SW_type'>
		          					<option value=''>< Please Select ></option>
		          					<?= lookup_software_type(); ?>
								</select>
			                </div>
						
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Owner</label>
			                  <input type='text' class='form-control' name='SW_owner' id='SW_owner'> 
			                </div>
						
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Serial Number</label>
			                  <input type='text' class='form-control' name='SW_SerialNo' id='SW_SerialNo'> 
			                </div>
			            </div>


						<div class="row">
							<div class="form-group col-md-3">
				                <label for="exampleInputEmail1">License Type</label>
				                <input type='text' class='form-control' name='SW_LType' id='SW_LType'>
			                </div>
						
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">License Key</label>
			                  <input type='text' class='form-control' name='SW_LKey' id='SW_LKey'> 
			                </div>
						
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Media</label>
			                  <input type='text' class='form-control' name='SW_media' id='SW_media'> 
			                </div>
						
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Note</label>
			                  <textarea rows="4" class='form-control' name='SW_notes' id='SW_notes'> </textarea> 
			                </div>

			                <div class="form-group col-md-3">
	          					<label for="exampleInputEmail1"> *Location </label>
	          					<input type='text' class='form-control' name='SW_location' id='SW_location' 
	          					list="list_loc"> 
	          					<span id="alert_SW_location"></span>
			                </div>
			                <datalist id="list_loc"></datalist>
						
							<div class="form-group col-md-3">
	          					<label for="exampleInputEmail1">*Validity</label>
				  					<select class='form-control' name='SW_validity' id='SW_validity'>
				  					<option value=''>< Please Select ></option>
				                   		<?= lookup_validity(); ?>
				                 	</select>
		      					<span id="alert_SW_validity"></span>
			                </div>
			            </div>

			            <hr>
			            <div class="row">
			                <div class="form-group col-md-2">
			                  <br>
			                  <button type="submit" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
			                </div>
			                <div class="form-group col-md-2">
			                  <br>
			                  <button class="btn btn-primary btn-block" onclick="submit();"> Submit </button>
			                </div>
			            </div>
					
				  </div>
				</div>
			</div>

		</div>
	</section>
</div>


<script type="text/javascript">

	// start code software
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

	function submit()
	{
		//input daripada form - id
		var SW_name = $("#SW_name").val();
		var SW_deployment_state = $("#SW_deployment_state").val();
		var SW_incident_state = $("#SW_incident_state").val();
		var SW_vendor = $("#SW_vendor").val();
		var SW_version = $("#SW_version").val();
		var SW_description = $("#SW_description").val();
		var SW_type = $("#SW_type").val();
		var SW_owner = $("#SW_owner").val();
		var SW_SerialNo = $("#SW_SerialNo").val();
		var SW_LType = $("#SW_LType").val();
		var SW_LKey = $("#SW_LKey").val();
		var SW_media = $("#SW_media").val();
		var SW_notes = $("#SW_notes").val();
		var SW_location = $("#SW_location").val();
		var SW_validity = $("#SW_validity").val();
	
		

		//check to action
		if(SW_name)
		{ 
			$("#alert_SW_name").html('');
		} else {
			$("#alert_SW_name").html('<font color="red"> required field </font>');
		}

		if(SW_deployment_state)
		{ 
			$("#alert_SW_deployment_state").html('');
		} else {
			$("#alert_SW_deployment_state").html('<font color="red"> required field </font>');
		}

		if(SW_incident_state)
		{ 
			$("#alert_SW_incident_state").html('');
		} else {
			$("#alert_SW_incident_state").html('<font color="red"> required field </font>');
		}

		if(SW_location)
		{ 
			$("#alert_SW_location").html('');
		} else {
			$("#alert_SW_location").html('<font color="red"> required field </font>');
		}

		if(SW_validity)
		{ 
			$("#alert_SW_validity").html('');
		} else {
			$("#alert_SW_validity").html('<font color="red"> required field </font>');
		}


		//check to submit
		if((SW_name=='')||(SW_deployment_state=='')||(SW_incident_state=='')||(SW_location=='')||(SW_validity=='')){

		} else {



		var data = 
		                {   'SW_name':SW_name,
		                	'SW_deployment_state':SW_deployment_state,
		                	'SW_incident_state':SW_incident_state,
		                	'SW_vendor':SW_vendor,
		                	'SW_version':SW_version,
		                	'SW_description':SW_description,
		                	'SW_type':SW_type,
		                	'SW_owner':SW_owner,
		                	'SW_SerialNo':SW_SerialNo,
		                	'SW_LType':SW_LKey,
		                	'SW_LKey':SW_LKey,
		                	'SW_media':SW_media,
		                	'SW_notes':SW_notes,
		                	'SW_location':SW_location,
		                	'SW_validity':SW_validity,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		                }

                    
            $.ajax({
                    url: '<?= base_url() ?>Admin/Software_process',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                    	//alert("Data Saved !");
                    	//location.reload();

                    	var url = "<?= base_url()?>Admin/A_cmdb_software_viewList";
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



	 			  