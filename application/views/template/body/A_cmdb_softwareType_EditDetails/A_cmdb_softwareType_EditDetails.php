

<div class="content-wrapper">
<section class="content">
	<?= lookup_navbar(); ?>
	<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Software Type Management</h5>
	<div class="row">

		<div class="col-md-2">
			<div class="form-group">
			<a href="<?=base_url()?>Admin/A_cmdb_softwareType_viewlist"><button class="btn btn-success btn-block"> Go To Overview</button></a>
			</div>
		</div>

		<div class="col-md-7">

			<div class="box box-success">
	          <div class="box-header with-border">
	            <h3 class="box-title"> <b>Edit Software Type</b> </h3>
	          </div>
	          <div class="box-body">

	          	<div class="row">
					<div class="form-group col-md-8">
		              <label for="exampleInputEmail1">Name</label>
		              <input type='text' class='form-control' name='swtype_name' id='swtype_name'> 
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

		<div class="col-md-3 hidden-xs">
			<?= lookup_widget(); ?>		        
		</div>
	</div>
</section>
</div>

<input type="hidden" name="other_id" id="other_id" value="<?= $this->uri->segment('3'); ?>">

<script type="text/javascript">

	$(document).ready(function (){
		details();
	
	});

	function details()
	{
		var other_id= $("#other_id").val();

		var data =  {
		                    'other_id':other_id,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		            }

        $.ajax({
                    url: '<?= base_url() ?>Admin/A_cmdb_softwareType_details',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    beforeSend: function() {
                       
                    },
                    success: function(response){

						var swtype_name = $("#swtype_name").val(response.software_type);
                    }
              });
	}

	function submit()
	{
			var other_id= $("#other_id").val();
			var swtype_name = $("#swtype_name").val();
			var data = 	{
							"swtype_name" : swtype_name,
							"other_id" : other_id,
	
							'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
						}

			$.ajax({
			        url: "<?= base_url() ?>Admin/A_cmdb_softwareType_update",
			        type: "POST",
			        dataType: "html",
			        data: data,
			        beforeSend: function() {

			        },
			        success: function(response){
			        	//alert('Success update software type');
			        	//location.reload();

			        	var url = "<?= base_url()?>Admin/A_cmdb_softwareType_viewlist";
	                    window.location.href=url;
			        }
			});

	}

	function cancel()
	{
			location.reload();
	}
</script>