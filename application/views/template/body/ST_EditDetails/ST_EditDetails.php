

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?>
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Service Type Management </h5>
		<div class="row">
			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>Admin/ST_ViewList"><button class="btn btn-success btn-block"> Go To Overview</button></a>
				</div>
			</div>
			<div class="col-md-7">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <label class="box-title"> <b>Edit Service Type</b> </label>
		          </div>
		          <div class="box-body">

		          			<div class="row">
								<div class="form-group col-md-4">
					              <label for="exampleInputEmail1">Name</label>
					              <input type='text' class='form-control' name='st_name' id='st_name'> 
					            </div>
							
								<div class="form-group  col-md-4">
										<label for="exampleInputEmail1">Validity</label>
										<select class='form-control' name='st_validity' id='st_validity'>
											<option value=''>< Please Select ></option>
											<?= lookup_validity(); ?>
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


<input type="hidden" name="service_type_id" id="service_type_id" value="<?= $this->uri->segment('3'); ?>">

<script type="text/javascript">

$(document).ready(function (){
		details();
});

function details()
{
	var service_type_id= $("#service_type_id").val();

	var data =  {
	                    'service_type_id':service_type_id,
	                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
	            }

    $.ajax({
                url: '<?= base_url() ?>Admin/st_details',
                type: 'POST',
                dataType: 'json',
                data: data,
                beforeSend: function() {
                   
                },
                success: function(response){

					var st_name = $("#st_name").val(response.service_type);
					var st_validity = $("#st_validity").val(response.validity);
                }
          });
}

function submit()
{
	var st_name = $("#st_name").val();
	var st_validity = $("#st_validity").val();
	var service_type_id= $("#service_type_id").val();

	if(st_name==''){
		alert('Cannot be null !');
	} else {

		var data = 	{
						"st_name" : st_name,
						"st_validity" : st_validity,
						"service_type_id": service_type_id,
						
					}

		$.ajax({
		            url: "<?= base_url() ?>Admin/st_update_service",
		            type: "POST",
		            dataType: "html",
		            data: data,
		            beforeSend: function() {

		            },
		            success: function(response){
		            	//alert('Success Update Service Type');
		            	//location.reload();

		            	var url = "<?= base_url()?>Admin/ST_ViewList";
	                    window.location.href=url;
		            }		
		    });
	}
}

function cancel()
{
	var url = "<?= base_url()?>Admin/ST_ViewList";
	window.location.href=url;
}
</script>