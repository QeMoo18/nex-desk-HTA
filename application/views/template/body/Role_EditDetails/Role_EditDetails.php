

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Role Management </h5>
		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>Admin/Role_Add"><button class="btn btn-success btn-block"> Go To Overview</button></a>
				</div>
			</div>


			<div class="col-md-7">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <label class="box-title"> <b>Edit Role</b> </label>
		          </div>
		          <div class="box-body">

							<div class="form-group col-md-6">
				              <label for="exampleInputEmail1">* Name</label>
				              <input type='text' class='form-control' name='role_name' id='role_name'> 
				              <span id="alert_role_name"> </span>
				            </div>
						
							<div class="form-group col-md-6">
									<label for="exampleInputEmail1">Group Name</label>
									<select class='form-control' name='role_gname' id='role_gname'>
										<option value=''>< Please Select ></option>
										<?= lookup_group() ?>
									</select>
				            </div>
						
							<div class="form-group col-md-6">
									<label for="exampleInputEmail1">Validity</label>
									<select class='form-control' name='role_validity' id='role_validity'>
										<option value=''>< Please Select ></option>
										<?= lookup_validity(); ?>
									</select>
				            </div>
						
							<div class="form-group col-md-6">
									<label for="exampleInputEmail1">Comment</label>
									<textarea class='form-control' rows='3' name='role_comment' id='role_comment'></textarea>
				            </div>


				            <div class="form-group col-md-2">
				            	<button type="submit" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
				            </div>

				            <div class="form-group col-md-2">
				            	<button type="submit" class="btn btn-primary btn-block" onclick="submit();">Edit</button>
				            </div>
					
				  </div>
				</div>
			</div> 
		</div>
	</section>
</div>

<input type="hidden" name="roleid" id="roleid" value="<?= $this->uri->segment('3'); ?>">

<script type="text/javascript">

	$(document).ready(function (){
		details();
	
	});

	function details()
	{
		var roleid= $("#roleid").val();

		var data =  {
		                    'roleid':roleid,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		            }

        $.ajax({
                    url: '<?= base_url() ?>Admin/role_details',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    beforeSend: function() {
                       
                    },
                    success: function(response){

				 		var role_name = $("#role_name").val(response.name);
						var role_gname = $("#role_gname").val(response.group_name);
						var role_validity = $("#role_validity").val(response.validity);
						var role_comment = $("#role_comment").val(response.comment);
                    }
              });
	}

	function submit()
	{
		var role_name = $("#role_name").val();
		var role_gname = $("#role_gname").val();
		var role_validity = $("#role_validity").val();
		var role_comment = $("#role_comment").val();

		var roleid= $("#roleid").val();

		if(role_name){
			$("#alert_role_name").html('');
		} else {
			$("#alert_role_name").html('<font color="red"> * Required field </font>');
		}


		if(role_name==''){
 
		} else {

			var data = 
			                {   'role_name':role_name,
			                	'role_gname':role_gname,
			                	'role_validity':role_validity,
			                	'role_comment':role_comment,
			                	'roleid':roleid,
			                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			                }

	                    
	            $.ajax({
	                    url: '<?= base_url() ?>Admin/role_update_role',
	                    type: 'POST',
	                    dataType: 'html',
	                    data: data,
	                    beforeSend: function() {

	                    },
	                    success: function(response){
	                    	//alert("Success Update role !");
	                    	//location.reload();

	                    	var url = "<?= base_url()?>Admin/Role_ViewList";
	                    	window.location.href=url;
	                    }
	            });

		}
	}

	function cancel()
 	{
 		var url = "<?= base_url()?>Admin/Role_ViewList";
	    window.location.href=url;
 	}
</script>