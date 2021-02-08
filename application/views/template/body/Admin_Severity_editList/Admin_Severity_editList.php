<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?>
		<h3> Severity Type Management </h3>
		<div class="row">
			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>Admin/Admin_Severity_ViewList"><button class="btn btn-success btn-block"> Go To Overview</button></a>
				</div>
			</div>
			<div class="col-md-7">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Add Severity Add</b> </h3>
		          </div>
		          <div class="box-body">

							<div class="form-group">
				              <label for="exampleInputEmail1">* Severity</label>
				              <input type='text' class='form-control' name='sev_name' id='sev_name'> 
				            </div>

				            <div class="form-group">
				              <label for="exampleInputEmail1">* Minute</label>
				              <input type='text' class='form-control' name='sev_time' id='sev_time'> 
				            </div>
						
							<div class="form-group">
									<label for="exampleInputEmail1">Validity</label>
									<select class='form-control' name='sev_validity' id='sev_validity'>
										<option value=''>< Please Select ></option>
										<?= lookup_validity(); ?>
									</select>
				            </div>


				            <div class="form-group">
					            	<button type="submit" class="btn btn-primary btn-block" onclick="submit();">Submit</button>
					            	<button type="button" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
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


<script type="text/javascript">


	$(document).ready(function (){
		details();
	});

	function details()
	{
		var severity_type_id= "<?= $this->uri->segment(3)?>";

		var data =  {
		                    'severity_type_id':severity_type_id,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		            }

	    $.ajax({
	                url: '<?= base_url() ?>Admin/severity_details',
	                type: 'POST',
	                dataType: 'json',
	                data: data,
	                beforeSend: function() {
	                   
	                },
	                success: function(response){

						var sev_name = $("#sev_name").val(response.sev_name);
						var sev_time = $("#sev_time").val(response.sev_time);
						var sev_validity = $("#sev_validity").val(response.validity);
	                }
	          });
	}


	function submit()
	{
		var sev_name = $("#sev_name").val();
		var sev_time = $("#sev_time").val();
		var sev_validity = $("#sev_validity").val();
		var severity_type_id= "<?= $this->uri->segment(3)?>";

		if(sev_name==''){
 
		} else {

			var data = 
			                {   'sev_name':sev_name,
			                	'sev_time':sev_time,
			                	'sev_validity':sev_validity,
			                	'severity_type_id':severity_type_id,
			                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			                }

	                    
	            $.ajax({
	                    url: '<?= base_url() ?>Admin/Admin_Severity_Edit_Type',
	                    type: 'POST',
	                    dataType: 'html',
	                    data: data,
	                    beforeSend: function() {

	                    },
	                    success: function(response){
	                    	//alert("Success Add Service !");
	                    	//location.reload();

	                    	var url = "<?= base_url()?>Admin/Admin_Severity_ViewList";
	                    	window.location.href=url;
	                    }
	            });

		}
	}

	function cancel()
 	{
 		var url = "<?= base_url()?>Admin/Admin_Severity_ViewList";
	    window.location.href=url;
 	}
</script>
