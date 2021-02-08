

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Group Management </h5>
		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>Admin/GM_ViewList"><button class="btn btn-success btn-block"> Go To Overview</button></a>
				</div>
			</div>

			<div class="col-md-7">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <label class="box-title"> <b>Edit Group</b> </label>
		          </div>
		          <div class="box-body">
		          			<div class="row">
								<div class="form-group col-md-6">
					              <label for="exampleInputEmail1">Name</label>
					              <input type='text' class='form-control' name='gm_name' id='gm_name'> 
					            </div>
							
								<div class="form-group col-md-6">
										<label for="exampleInputEmail1">Validity</label>
										<select class='form-control' name='gm_validity' id='gm_validity'>
											<option value=''>< Please Select ></option>
											<?= lookup_validity()?>
										</select>
					            </div>
							</div>

							<div class="row">
								<div class="form-group  col-md-6">
										<label for="exampleInputEmail1">Comment</label>
										<textarea class='form-control' rows='3' name='gm_comment' id='gm_comment'></textarea>
					            </div>
					        </div>

					        <hr><br>
					        <div class="row">
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
		</div>
	</section>
</div>
 
<input type="hidden" name="groupid" id="groupid" value="<?= $this->uri->segment('3'); ?>">

 <script type="text/javascript">

 	$(document).ready(function (){
		details();
	
	});

	function details()
	{
		var groupid= $("#groupid").val();

		var data =  {
		                    'groupid':groupid,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		            }

        $.ajax({
                    url: '<?= base_url() ?>Admin/gm_details',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    beforeSend: function() {
                       
                    },
                    success: function(response){

                    	var gm_name = $("#gm_name").val(response.name);
				 		var gm_validity = $("#gm_validity").val(response.validity);
				 		var gm_comment = $("#gm_comment").val(response.comment);

                    }
              });
	}

 	function submit()
 	{
 		var gm_name = $("#gm_name").val();
 		var gm_validity = $("#gm_validity").val();
 		var gm_comment = $("#gm_comment").val();

 		var groupid= $("#groupid").val();

 		if((gm_name=='')||(gm_validity=='')||(gm_comment==''))
 		{
 			
 		} else {
 			var data = 
			                {   'gm_name':gm_name,
			                	'gm_validity':gm_validity,
			                	'gm_comment':gm_comment,
			                	'groupid':groupid,
			                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			                }

	                    
	            $.ajax({
	                    url: '<?= base_url() ?>Admin/gm_edit_group',
	                    type: 'POST',
	                    dataType: 'html',
	                    data: data,
	                    beforeSend: function() {

	                    },
	                    success: function(response){
	                    	//alert("Success update group !");
	                    	//location.reload();

	                    	var url = "<?= base_url()?>Admin/GM_ViewList";
	                    	window.location.href=url;
	                    }
	            });
 		}

 	}

 	function cancel()
 	{
 		var url = "<?= base_url()?>Admin/GM_ViewList";
	    window.location.href=url;
 	}
 </script>