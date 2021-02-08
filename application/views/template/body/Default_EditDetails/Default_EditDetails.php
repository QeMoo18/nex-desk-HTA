

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Priority Management </h5>
		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>Admin/Default_ListView"><button class="btn btn-success btn-block"> Go To Overview</button></a>
				</div>
			</div>

			<div class="col-md-7">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Edit Priority</b> </h3>
		          </div>
		          <div class="box-body">

		          	<div class="row">
						<div class="form-group col-md-4">
		                  <label for="exampleInputEmail1">Name</label>
		                  <input type='text' class='form-control' name='default_name' id='default_name'> 
		                </div>
				
						<div class="form-group col-md-4">
		  					<label for="exampleInputEmail1">Validity</label>
		  					<select class='form-control' name='default_validity' id='default_validity'>
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
                url: '<?= base_url() ?>Admin/default_priority_details',
                type: 'POST',
                dataType: 'json',
                data: data,
                beforeSend: function() {
                   
                },
                success: function(response){

					var default_name = $("#default_name").val(response.critical_type);
					var default_validity = $("#default_validity").val(response.validity);
                }
          });
}

function submit()
{
	var default_name = $("#default_name").val();
	var default_validity = $("#default_validity").val();
	var default_id= $("#default_id").val();

	if(default_name==''){
		alert('Cannot be null !');
	} else {

		var data = 	{
						"default_name" : default_name,
						"default_validity" : default_validity,
						"default_id": default_id,
						
					}

		$.ajax({
		            url: "<?= base_url() ?>Admin/default_update_priority",
		            type: "POST",
		            dataType: "html",
		            data: data,
		            beforeSend: function() {

		            },
		            success: function(response){
		            	//alert('Success Update Priority');
		            	//location.reload();

		            	var url = "<?= base_url()?>Admin/Default_ListView";
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