

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
		            <label class="box-title"> <b>Form Add Group</b> </label>
		          </div>
		          <div class="box-body">

		          			<div class="row">
								<div class="form-group col-md-6">
					              <label for="exampleInputEmail1"> Name</label>
					              <input type='text' class='form-control' name='gm_name' id='gm_name'>
					              <span id="warning_name" style="display:none"> <font color="red"><i>* Required Field </i></font></span>
					            </div>
							
								<div class="form-group col-md-6">
										<label for="exampleInputEmail1">Validity</label>
										<select class='form-control' name='gm_validity' id='gm_validity'>
											<option value=''>< Please Select ></option>
											<?= lookup_validity()?>
										</select>
										<span id="warning_validity" style="display:none"> <font color="red"><i>* Required Field </i></font></span>
					            </div>
					        </div>

				            <div class="row">
								<div class="form-group col-md-6">
										<label for="exampleInputEmail1">Comment</label>
										<textarea class='form-control' rows='3' name='gm_comment' id='gm_comment'></textarea>
					            </div>

								<div class="form-group col-md-6"></div>
							</div>


							<hr><br>
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
 


 <script type="text/javascript">
       
 	function submit()
 	{
 		var gm_name = $("#gm_name").val();
 		var gm_validity = $("#gm_validity").val();
 		var gm_comment = $("#gm_comment").val();

 		if((gm_name=='')||(gm_validity==''))
 		{
 			if(gm_name==''){
 			    $("#warning_name").show();
 			} else {
 			    $("#warning_name").hide();
 			}
 			
 			if(gm_validity==''){
 			    $("#warning_validity").show();
 			} else {
 			    $("#warning_validity").hide();
 			}
 			
 		} else {
 			var data = 
			                {   'gm_name':gm_name,
			                	'gm_validity':gm_validity,
			                	'gm_comment':gm_comment,
			                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			                }

	                    
	            $.ajax({
	                    url: '<?= base_url() ?>Admin/gm_add_group',
	                    type: 'POST',
	                    dataType: 'html',
	                    data: data,
	                    beforeSend: function() {

	                    },
	                    success: function(response){
	                    	//alert("Success add group !");
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