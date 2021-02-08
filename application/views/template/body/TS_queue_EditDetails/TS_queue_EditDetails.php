

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
		            <h3 class="box-title"> <b>Edit : queue</b> </h3>
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
                url: '<?= base_url() ?>Admin/TS_queue_details',
                type: 'POST',
                dataType: 'json',
                data: data,
                beforeSend: function() {
                   
                },
                success: function(response){

					var default_name = $("#Q_name").val(response.name);
					var default_group = $("#Q_group").val(response.group);
					var default_validity = $("#Q_validity").val(response.validity);
					var default_comment = $("#Q_comment").val(response.comment);
                }
          });
}

function submit()
{
	var Q_name = $("#Q_name").val();
	var Q_group = $("#Q_group").val();
	var Q_validity = $("#Q_validity").val();
	var Q_comment = $("#Q_comment").val();
	var default_id= $("#default_id").val();

	if(Q_name==''){
		alert('Cannot be null !');
	} else {

		var data = 	{
						"Q_name" : Q_name,
						"Q_group" : Q_group,
						"Q_validity" : Q_validity,
						"Q_comment" : Q_comment,	
						"default_id": default_id,
						
					}

		$.ajax({
		            url: "<?= base_url() ?>Admin/TS_queue_update",
		            type: "POST",
		            dataType: "html",
		            data: data,
		            beforeSend: function() {

		            },
		            success: function(response){
		            	//alert('Success Update queue');
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