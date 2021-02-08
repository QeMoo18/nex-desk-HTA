

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Queue Setting </h5>
		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>Admin/TS_queue_viewlist"><button class="btn btn-success btn-block"> Go To Overview</button></a>
				</div>
			</div>

			<div class="col-md-7">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Add: Queue</b> </h3>
		          </div>
		          <div class="box-body">

		          		<div class="row">
							<div class="form-group col-md-6">
			                  <label for="exampleInputEmail1">Name</label>
			                  <input type='text' class='form-control' name='Q_name' id='Q_name'> 
			                </div>

			                <div class="form-group col-md-6">
			                  <label for="exampleInputEmail1">Group</label>
			  					<select class='form-control' name='Q_group' id='Q_group'>
			  						<option value=''>< Please Select ></option>
			  						<?= lookup_table_group() ?>
			  					</select>
			                </div>
					
							<div class="form-group col-md-6">
			  					<label for="exampleInputEmail1">Validity</label>
			  					<select class='form-control' name='Q_validity' id='Q_validity'>
			  						<option value=''>< Please Select ></option>
			  						<?= lookup_validity() ?> 
			  					</select>
			                </div>

			                 <div class="form-group col-md-6">
			                  <label for="exampleInputEmail1">Comment</label>
			                  <input type='text' class='form-control' name='Q_comment' id='Q_comment'> 
			                </div>
						</div>

						<hr>
						<div class="row">
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
function submit()
{
	var Q_name = $("#Q_name").val();
	var Q_group = $("#Q_group").val();
	var Q_validity = $("#Q_validity").val();
	var Q_comment = $("#Q_comment").val();
	
	if(Q_name==''){
		alert('Cannot be null !');
	} else {

		var data = 	{
						"Q_name" : Q_name,
						"Q_group" : Q_group,
						"Q_validity" : Q_validity,
						"Q_comment" : Q_comment,						
					}

		$.ajax({
		            url: "<?= base_url() ?>Admin/TS_queue_addData",
		            type: "POST",
		            dataType: "html",
		            data: data,
		            beforeSend: function() {

		            },
		            success: function(response){
		            	//alert('Success add queue');
		            	//location.reload();

		            	var url = "<?= base_url()?>Admin/TS_queue_viewlist";
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