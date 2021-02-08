

<div class="content-wrapper">
<section class="content">
	<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Criticality Type Management</h5>
	<div class="row">
		<?= lookup_navbar(); ?> 
		<div class="col-md-2">
			<div class="form-group">
			<a href="<?=base_url()?>Admin/Criticality_ViewList"><button class="btn btn-success btn-block"> Go To Overview</button></a>
			</div>
		</div>

		<div class="col-md-7">

			<div class="box box-success">
	          <div class="box-header with-border">
	            <h3 class="box-title"> <b>Edit Criticality Type</b> </h3>
	          </div>
	          <div class="box-body">

	          	<div class="row">
					<div class="form-group col-md-8">
		              <label for="exampleInputEmail1">Name</label>
		              <input type='text' class='form-control' name='Criticality_name' id='Criticality_name'> 
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
                    url: '<?= base_url() ?>Admin/Criticality_details',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    beforeSend: function() {
                       
                    },
                    success: function(response){

						var Criticality_name = $("#Criticality_name").val(response.Criticality);
                    }
              });
	}

	function submit()
	{
			var default_id= $("#default_id").val();
			var Criticality_name = $("#Criticality_name").val();
			var data = 	{
							"Criticality_name" : Criticality_name,
							"default_id" : default_id,
							'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
						}

			$.ajax({
			        url: "<?= base_url() ?>Admin/Criticality_update",
			        type: "POST",
			        dataType: "html",
			        data: data,
			        beforeSend: function() {

			        },
			        success: function(response){
			        	//alert('Success update criticality');
			        	//location.reload();

			        	var url = "<?= base_url()?>Admin/Criticality_ViewList";
	                    window.location.href=url;
			        }
			});

	}

	function cancel()
	{
			location.reload();
	}
</script>