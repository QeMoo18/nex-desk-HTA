

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Ticket State Management</h5>
		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>Admin/TS_ticketState_viewlist"><button class="btn btn-success btn-block"> Go To Overview</button></a>
				</div>
			</div>

			<div class="col-md-7">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Add Ticket State</b> </h3>
		          </div>
		          <div class="box-body">

		          		<div class="row">
							<div class="form-group col-md-4">
			                  <label for="exampleInputEmail1">Name</label>
			                  <input type='text' class='form-control' name='TS_name' id='TS_name'> 
			                </div>

			                <div class="form-group col-md-4">
			  					<label for="exampleInputEmail1">State</label>
			  					<select class='form-control' name='TS_state' id='TS_state'>
			  						<option value=''>< Please Select ></option>
			  						<?= lookup_ticket_state_type() ?>
			  					</select>
			                </div>
					
							<div class="form-group col-md-4">
			  					<label for="exampleInputEmail1">Validity</label>
			  					<select class='form-control' name='TS_validity' id='TS_validity'>
			  						<option value=''>< Please Select ></option>
			  						<?= lookup_validity() ?>
			  					</select>
			                </div>
							
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
			<div class="col-md-3 hidden-xs">
				<?= lookup_widget(); ?>		        
			</div>
		</div>
	</section>
</div>
<script type="text/javascript">
function submit()
{
	var TS_name = $("#TS_name").val();
	var TS_state = $("#TS_state").val();
	var TS_validity = $("#TS_validity").val();
	
	if(TS_name==''){
		alert('Cannot be null !');
	} else {

		var data = 	{
						"TS_name" : TS_name,
						"TS_state" : TS_state,
						"TS_validity" : TS_validity,
						
					}

		$.ajax({
		            url: "<?= base_url() ?>Admin/TS_ticketState_addData",
		            type: "POST",
		            dataType: "html",
		            data: data,
		            beforeSend: function() {

		            },
		            success: function(response){
		            	//alert('Success add ticket state');
		            	//location.reload();

		            	var url = "<?= base_url()?>Admin/TS_ticketState_viewlist";
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