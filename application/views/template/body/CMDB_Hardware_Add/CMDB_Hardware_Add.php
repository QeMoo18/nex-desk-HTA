

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?>
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Hardware Management </h5>
		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>CMDB/CMDB_Hardware_ViewList"><button class="btn btn-success btn-block"> Go To Overview</button></a>
				</div>
			</div>

			<div class="col-md-10">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Add Hardware</b> </h3>
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
							<div class="form-group col-md-6">
			                  <label for="exampleInputEmail1">Owner</label>
			                  <input type='text' class='form-control' name='cmdb_hardware_owner' id='cmdb_hardware_owner'> 
			                </div>
					
							<div class="form-group col-md-6">
			                  <label for="exampleInputEmail1">Serial Number</label>
			                  <input type='text' class='form-control' name='cmdb_hardware_serialno' id='cmdb_hardware_serialno'> 
			                </div>
					
							<div class="form-group col-md-6">
			                  <label for="exampleInputEmail1">Waranty Expiration Date</label>
			                  <input type='text' class='form-control datepicker' name='cmdb_hardware_waranty' id='cmdb_hardware_waranty'> 
			                </div>
					
							<div class="form-group col-md-6">
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
	var cmdb_hardware_name = $("#cmdb_hardware_name").val();
	var cmdb_hardware_deploymentstate = $("#cmdb_hardware_deploymentstate").val();
	var cmdb_hardware_incidentstate = $("#cmdb_hardware_incidentstate").val();
	var cmdb_hardware_vendor = $("#cmdb_hardware_vendor").val();
	var cmdb_hardware_model = $("#cmdb_hardware_model").val();
	var cmdb_hardware_desc = $("#cmdb_hardware_desc").val();
	var cmdb_hardware_type = $("#cmdb_hardware_type").val();
	var cmdb_hardware_owner = $("#cmdb_hardware_owner").val();
	var cmdb_hardware_serialno = $("#cmdb_hardware_serialno").val();
	var cmdb_hardware_waranty = $("#cmdb_hardware_waranty").val();
	var cmdb_hardware_install = $("#cmdb_hardware_install").val();
	var cmdb_hardware_note = $("#cmdb_hardware_note").val();
	var cmdb_hardware_location = $("#cmdb_hardware_location").val();
	var cmdb_hardware_valid = $("#cmdb_hardware_valid").val();
	
	var data = 	{
					"cmdb_hardware_name" : cmdb_hardware_name,
					"cmdb_hardware_deploymentstate" : cmdb_hardware_deploymentstate,
					"cmdb_hardware_incidentstate" : cmdb_hardware_incidentstate,
					"cmdb_hardware_vendor" : cmdb_hardware_vendor,
					"cmdb_hardware_model" : cmdb_hardware_model,
					"cmdb_hardware_desc" : cmdb_hardware_desc,
					"cmdb_hardware_type" : cmdb_hardware_type,
					"cmdb_hardware_owner" : cmdb_hardware_owner,
					"cmdb_hardware_serialno" : cmdb_hardware_serialno,
					"cmdb_hardware_waranty" : cmdb_hardware_waranty,
					"cmdb_hardware_install" : cmdb_hardware_install,
					"cmdb_hardware_note" : cmdb_hardware_note,
					"cmdb_hardware_location" : cmdb_hardware_location,
					"cmdb_hardware_valid" : cmdb_hardware_valid,
					'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
				}

	$.ajax({
                url: "<?= base_url() ?>CMDB/cmdb_hardware_addhard",
                type: "POST",
                dataType: "html",
                data: data,
                beforeSend: function() {

                },
                success: function(response){
                	alert('Success add hardware ');
                	location.reload();
                }
        });

}

function cancel()
	{
		location.reload();
	}
</script>