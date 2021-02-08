

<div class="content-wrapper">
<section class="content">
	<?= lookup_navbar(); ?> 
	<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> SLA Type Management </h5>
	<div class="row">

		<div class="col-md-2">
			<div class="form-group">
			<a href="<?=base_url()?>Admin/SLA_Type_ViewList"><button class="btn btn-success btn-block"> Go To Overview</button></a>
			</div>
		</div>

		<div class="col-md-7">

			<div class="box box-success">
	          <div class="box-header with-border">
	            <h3 class="box-title"> <b>Add SLA Type</b> </h3>
	          </div>
	          <div class="box-body">


	         	<div class="row">
					<div class="form-group col-md-4">
		              <label for="exampleInputEmail1">Name</label>
		              <input type='text' class='form-control' name='sla_type_name' id='sla_type_name'> 
		            </div>
			
					<div class="form-group col-md-4">
							<label for="exampleInputEmail1">Validity</label>
								<select class='form-control' name='sla_type_validity' id='sla_type_validity'>
								<option value=''>< Please Select ></option>
								<?= lookup_validity()?>
							</select>
		            </div>
		        
					<div class="form-group col-md-2">
						<br>
						<div class="form-group">
			            	<button type="submit" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
			            </div>
					</div>
					<div class="form-group col-md-2">
						<br>
						<div class="form-group">
			            	<button type="submit" class="btn btn-primary btn-block" onclick="submit();">Submit</button>
			            </div>
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
	var sla_type_name = $("#sla_type_name").val();
	var sla_type_validity = $("#sla_type_validity").val();

	if(sla_type_name==''){
		alert('Cannot be null !');
	} else {
		var data = 	{
						"sla_type_name" : sla_type_name,
						"sla_type_validity" : sla_type_validity,
						'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
					}

		$.ajax({
		        url: "<?= base_url() ?>Admin/sla_add_type",
		        type: "POST",
		        dataType: "html",
		        data: data,
		        beforeSend: function() {

		        },
		        success: function(response){
		        	//alert('Success add sla type ');
		        	//location.reload();
		        	var url = "<?= base_url()?>Admin/SLA_Type_ViewList";
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