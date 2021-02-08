<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Fault ITSM Management</h5>
		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>Admin/Fault_ITSM_View"><button class="btn btn-success btn-block"> Go To Overview</button></a>
				</div>
			</div>

			<div class="col-md-7">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Edit Fault ITSM</h5>

		          </div>
		          <div class="box-body">

		          		<div class="row">
							<div class="form-group col-md-4">
			                  <label for="exampleInputEmail1">Name</label>
			                  <input type='text' class='form-control' name='fi_name' id='fi_name'> 
			                </div>
					
							<div class="form-group col-md-4">
			  					<label for="exampleInputEmail1">Validity</label>
			  					<select class='form-control' name='fi_validity' id='fi_validity'>
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

$(document).ready(function (){
		details();
});

function details()
{
	var id = "<?= $this->uri->segment(3)?>";

	var data =  {
	                    'id':id,
	                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
	            }

    $.ajax({
                url: '<?= base_url() ?>Admin/Fault_ITSM_Details',
                type: 'POST',
                dataType: 'json',
                data: data,
                beforeSend: function() {
                   
                },
                success: function(response){

					var fi_name = $("#fi_name").val(response.name);
					var fi_validity = $("#fi_validity").val(response.validity);
                }
          });
}

function submit()
{
	var fi_name = $("#fi_name").val();
	var fi_validity = $("#fi_validity").val();
	var id = "<?= $this->uri->segment(3)?>";
	
	if(fi_name==''){
		alert('Cannot be null !');
	} else {

		var data = 	{
						"fi_name" : fi_name,
						"fi_validity" : fi_validity,
						"id": id
						
					}

		$.ajax({
		            url: "<?= base_url() ?>Admin/Fault_Itsm_Update_Data",
		            type: "POST",
		            dataType: "html",
		            data: data,
		            beforeSend: function() {

		            },
		            success: function(response){
		            	//alert('Success add main line status');
		            	//location.reload();

		            	var url = "<?= base_url()?>Admin/Fault_ITSM_View";
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