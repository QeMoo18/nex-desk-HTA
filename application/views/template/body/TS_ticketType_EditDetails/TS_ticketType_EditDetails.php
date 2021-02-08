

<div class="content-wrapper">
	<section class="content">
		 <?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Ticket Type</h5>
		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>Admin/TS_ticketType_viewlist"><button class="btn btn-success btn-block"> Go To Overview</button></a>
				</div>
			</div>

			<div class="col-md-7">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Edit Ticket Type</b> </h3>
		          </div>
		          <div class="box-body">

		          	<div class="row">
						<div class="form-group col-md-4">
		                  <label for="exampleInputEmail1">Name</label>
		                  <input type='text' class='form-control' name='tt_name' id='tt_name'> 
		                </div>
				
						<div class="form-group col-md-4">
		  					<label for="exampleInputEmail1">Validity</label>
		  					<select class='form-control' name='tt_validity' id='tt_validity'>
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
                url: '<?= base_url() ?>Admin/TS_ticketType_details',
                type: 'POST',
                dataType: 'json',
                data: data,
                beforeSend: function() {
                   
                },
                success: function(response){

					var default_name = $("#tt_name").val(response.name);
					var default_validity = $("#tt_validity").val(response.validity);
                }
          });
}

function submit()
{
	var tt_name = $("#tt_name").val();
	var tt_validity = $("#tt_validity").val();
	var default_id= $("#default_id").val();

	if(tt_name==''){
		alert('Cannot be null !');
	} else {

		var data = 	{
						"tt_name" : tt_name,
						"tt_validity" : tt_validity,
						"default_id": default_id,
						
					}

		$.ajax({
		            url: "<?= base_url() ?>Admin/TS_ticketType_update",
		            type: "POST",
		            dataType: "html",
		            data: data,
		            beforeSend: function() {

		            },
		            success: function(response){
		            	//alert('Success Update Ticket Type');
		            	//location.reload();

		            	var url = "<?= base_url()?>Admin/TS_ticketType_viewlist";
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