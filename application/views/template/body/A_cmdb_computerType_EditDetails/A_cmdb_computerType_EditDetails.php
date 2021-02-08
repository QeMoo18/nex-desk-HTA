

<div class="content-wrapper">
<section class="content">
	<?= lookup_navbar(); ?> 
	<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Computer Type Management</h5>
	<div class="row">

		<div class="col-md-2">
			<div class="form-group">
			<a href="<?=base_url()?>Admin/A_cmdb_computerType_viewlist"><button class="btn btn-success btn-block"> Go To Overview</button></a>
			</div>
		</div>

		<div class="col-md-7">

			<div class="box box-success">
	          <div class="box-header with-border">
	            <h3 class="box-title"> <b>Edit Computer Type</b> </h3>
	          </div>
	          <div class="box-body">

	          	<div class="row">
					<div class="form-group col-md-8">
		              <label for="exampleInputEmail1">Name</label>
		              <input type='text' class='form-control' name='comptype_name' id='comptype_name'> 
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

<input type="hidden" name="other_id" id="other_id" value="<?= $this->uri->segment('3'); ?>">

<script type="text/javascript">

	$(document).ready(function (){
		details();
	
	});

	function details()
	{
		var other_id= $("#other_id").val();

		var data =  {
		                    'other_id':other_id,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		            }

        $.ajax({
                    url: '<?= base_url() ?>Admin/A_cmdb_computerType_details',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    beforeSend: function() {
                       
                    },
                    success: function(response){

						var comptype_name = $("#comptype_name").val(response.computer_type);
                    }
              });
	}

	function submit()
	{
			var other_id= $("#other_id").val();
			var comptype_name = $("#comptype_name").val();
			var data = 	{
							"comptype_name" : comptype_name,
							"other_id" : other_id,
	
							'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
						}

			$.ajax({
			        url: "<?= base_url() ?>Admin/A_cmdb_computerType_update",
			        type: "POST",
			        dataType: "html",
			        data: data,
			        beforeSend: function() {

			        },
			        success: function(response){
			        	//alert('Success update computer type');
			        	//location.reload();

			        	var url = "<?= base_url()?>Admin/A_cmdb_computerType_viewlist";
	                    window.location.href=url;
			        }
			});

	}

	function cancel()
	{
			location.reload();
	}
</script>