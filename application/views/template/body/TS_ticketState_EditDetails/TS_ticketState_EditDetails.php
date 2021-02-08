
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
		            <h3 class="box-title"> <b>Add MTicket State </b> </h3>
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
                url: '<?= base_url() ?>Admin/TS_ticketState_details',
                type: 'POST',
                dataType: 'json',
                data: data,
                beforeSend: function() {
                   
                },
                success: function(response){

					var default_name = $("#TS_name").val(response.state);
					var default_state = $("#TS_state").val(response.state_type);
					var default_validity = $("#TS_validity").val(response.validity);
                }
          });
}

function submit()
{
	var TS_name = $("#TS_name").val();
	var TS_state = $("#TS_state").val();
	var TS_validity = $("#TS_validity").val();
	var default_id= $("#default_id").val();

	if(TS_name==''){
		alert('Cannot be null !');
	} else {

		var data = 	{
						"TS_name" : TS_name,
						"TS_state" : TS_state,
						"TS_validity" : TS_validity,
						"default_id": default_id,
						
					}

		$.ajax({
		            url: "<?= base_url() ?>Admin/TS_ticketState_update",
		            type: "POST",
		            dataType: "html",
		            data: data,
		            beforeSend: function() {

		            },
		            success: function(response){
		            	//alert('Success Update ticket state');
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