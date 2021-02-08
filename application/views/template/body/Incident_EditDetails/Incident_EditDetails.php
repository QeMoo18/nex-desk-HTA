

<div class="content-wrapper">
<section class="content">
	<?= lookup_navbar(); ?> 
	<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Incident State Management</h5>
	<div class="row">

		<div class="col-md-2">
			<div class="form-group">
			<a href="<?=base_url()?>Admin/Incident_ViewList"><button class="btn btn-success btn-block"> Go To Overview</button></a>
			</div>
		</div>

		<div class="col-md-7">

			<div class="box box-success">
	          <div class="box-header with-border">
	            <h3 class="box-title"> <b>Edit Incident State</b> </h3>
	          </div>
	          <div class="box-body">

	          	<div class="row">
					<div class="form-group col-md-4">
		              <label for="exampleInputEmail1">Name</label>
		              <input type='text' class='form-control' name='incident_name' id='incident_name'> 
		            </div>
			
					<div class="form-group col-md-4">
							<label for="exampleInputEmail1">Validity</label>
							<select class='form-control' name='incident_validity' id='incident_validity'>
								<option value=''>< Please Select ></option>
								<?= lookup_validity(); ?>
							</select>
		            </div>
					
					<div class="form-group col-md-2">
						<br>
		            	<button type="submit" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
		            </div>

		            <div class="form-group col-md-2">
		            	<br>
		            	<button type="submit" class="btn btn-primary btn-block" onclick="submit();">Submit</button>
		            </div>
		        </div>

			  </div>
			</div>
		</div>
	</div>
</section>
</div>


<input type="hidden" name="default_id" id="default_id" value="<?= $this->uri->segment('3'); ?>">

<script type="text/javascript">

	$(document).ready(function (){
		details();
	
	});

	function details()
	{
		var default_id= $("#default_id").val();

		var data =  {
		                    'default_id':default_id,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		            }

        $.ajax({
                    url: '<?= base_url() ?>Admin/incident_details',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    beforeSend: function() {
                       
                    },
                    success: function(response){

						var incident_name = $("#incident_name").val(response.incident_state);
						var incident_validity = $("#incident_validity").val(response.validity);

                    }
              });
	}


	function submit()
	{
		var incident_name = $("#incident_name").val();
		var incident_validity = $("#incident_validity").val();
		var default_id= $("#default_id").val();
		var data = 	{
						"incident_name" : incident_name,
						"incident_validity" : incident_validity,
						"default_id":default_id,
						 '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
						
					}

		$.ajax({
		        url: "<?= base_url() ?>Admin/incident_update_state",
		        type: "POST",
		        dataType: "html",
		        data: data,
		        beforeSend: function() {

		        },
		        success: function(response){
		        	//alert('Success update incident');
		        	//location.reload();

		        	var url = "<?= base_url()?>Admin/Incident_ViewList";
	                window.location.href=url;
		        }
		});

	}

	function cancel()
	{
		location.reload();
	}
</script>