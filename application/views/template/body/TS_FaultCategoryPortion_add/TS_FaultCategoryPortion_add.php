

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Fault Category Portion </h5>

		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>Admin/TS_FaultCategoryPortion_viewlist"><button class="btn btn-success btn-block"> Go To Overview</button></a>
				</div>
			</div>

			<div class="col-md-7">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Add Fault Category Portion</b> </h3>
		          </div>
		          <div class="box-body">

		          		<div class="row">
							<div class="form-group col-md-4">
			                  <label for="exampleInputEmail1">Name</label>
			                  <input type='text' class='form-control' name='FCP_name' id='FCP_name'> 
			                </div>
					
							<div class="form-group col-md-4">
			  					<label for="exampleInputEmail1">Validity</label>
			  					<select class='form-control' name='FCP_validity' id='FCP_validity'>
			  						<option value=''>< Please Select ></option>
			  						<?= lookup_validity() ?>
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
<script type="text/javascript">
function submit()
{
	var FCP_name = $("#FCP_name").val();
	var FCP_validity = $("#FCP_validity").val();
	
	if(FCP_name==''){
		alert('Cannot be null !');
	} else {

		var data = 	{
						"FCP_name" : FCP_name,
						"FCP_validity" : FCP_validity,
						
					}

		$.ajax({
		            url: "<?= base_url() ?>Admin/TS_FaultCategoryPortion_addData",
		            type: "POST",
		            dataType: "html",
		            data: data,
		            beforeSend: function() {

		            },
		            success: function(response){
		            	//alert('Success add Fault Category Portion');
		            	//location.reload();

		            	var url = "<?= base_url()?>Admin/TS_FaultCategoryPortion_viewlist";
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