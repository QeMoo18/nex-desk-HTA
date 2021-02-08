

<div class="content-wrapper">
<section class="content">
	<?= lookup_navbar(); ?> 
	<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Validity Type Management</h5>
	<div class="row">

		<div class="col-md-2">
			<div class="form-group">
			<a href="<?=base_url()?>Admin/Validity_ViewList"><button class="btn btn-success btn-block"> Go To Overview</button></a>
			</div>
		</div>

		<div class="col-md-7">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Add Validity Type</b> </h3>
		          </div>
		          <div class="box-body">


		          	<div class="row">
						<div class="form-group col-md-8">
			              <label for="exampleInputEmail1">Name</label>
			              <input type='text' class='form-control' name='Validity_Name' id='Validity_Name'> 
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

<script type="text/javascript">
	function submit()
	{
			var Validity_Name = $("#Validity_Name").val();
			var data = 	{
							"Validity_Name" : Validity_Name,
							'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
						}

			$.ajax({
			        url: "<?= base_url() ?>Admin/validity_add",
			        type: "POST",
			        dataType: "html",
			        data: data,
			        beforeSend: function() {

			        },
			        success: function(response){
			        	//alert('Success add validity');
			        	//location.reload();

			        	var url = "<?= base_url()?>Admin/Validity_ViewList";
	                    window.location.href=url;
			        }
			});

	}

	function cancel()
	{
			location.reload();
	}
</script>