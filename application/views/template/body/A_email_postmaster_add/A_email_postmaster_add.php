

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Post Master Mail Management</h5>
		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>Admin/A_email_postmaster_viewlist"><button class="btn btn-success btn-block"> Go To Overview</button></a>
				</div>
			</div>

			<div class="col-md-7">


					<div class="box box-success">
			          <div class="box-header with-border">
			            <h3 class="box-title"> <b>Add: Mail Account</b> </h3>
			          </div>
			          <div class="box-body">
 						
 						<div class="row">
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">*Type</label>
			                  <select class='form-control' name='email_type' id='email_type'>
		      						<option value=''>< Please Select ></option>
		      						<option value='IMAP'> IMAP</option>
		      						<option value='IMAPS'>IMAPS </option>
		      						<option value='IMAPTLS'> IMAPTLS</option>
		      						<option value='POP3'> POP3</option>
		      						<option value='POP3S'> POP3S</option>
		      						<option value='POP3TLS'> POP3TLS </option>
		      					</select> 
		      					<span id="alert_email_type"></span> 
			                </div>
					
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">*Username</label>
			                  <input type='text' class='form-control' name='email_uname' id='email_uname'>
			                  <span id="alert_email_uname"></span>  
			                </div>
					
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">*Password</label>
			                  <input type='password' class='form-control' name='email_pwd' id='email_pwd'>
			                  <span id="alert_email_pwd"></span>  
			                </div>
					
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">*Host</label>
			                  <input type='text' class='form-control' name='email_host' id='email_host'> 
			                  <span id="alert_email_host"></span> 
			                </div>
			        	</div>
					
						<div class="row">
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">IMAP Folder</label>
			                  <input type='text' class='form-control' name='email_imap' id='email_imap'> 
			                </div>
					
							<div class="form-group col-md-3">
		      					<label for="exampleInputEmail1">*Queue</label>
		      					<select class='form-control' name='email_queue' id='email_queue'>
		      						<option value=''>< Please Select ></option>
										<?= lookup_queue(); ?>		
		      					</select>
		      					<span id="alert_email_queue"></span> 
			                </div>
					
							<div class="form-group col-md-3">
		      					<label for="exampleInputEmail1">*Validity</label>
		      					<select class='form-control' name='email_validity' id='email_validity'>
		      						<option value=''>< Please Select ></option>
		      						<?= lookup_validity(); ?>
		      					</select>
		      					<span id="alert_email_validity"></span> 
			                </div>
					
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Comment</label>
			                  <input type='text' class='form-control' name='email_comment' id='email_comment'> 
			                </div>
						</div>
						<hr>
						<div class="row">
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
			<div class="col-md-3 hidden-xs">
				<?= lookup_widget(); ?>		        
			</div>
		</div>
	</section>
</div>
<script type="text/javascript">


function submit()

{
	var email_type = $("#email_type").val();
	var email_uname = $("#email_uname").val();
	var email_pwd = $("#email_pwd").val();
	var email_host = $("#email_host").val();
	var email_imap = $("#email_imap").val();
	var email_queue = $("#email_queue").val();
	var email_validity = $("#email_validity").val();
	var email_comment = $("#email_comment").val();

		//check to action
		if(email_type)
		{ 
			$("#alert_email_type").html('');
		} else {
			$("#alert_email_type").html('<font color="red"> required field </font>');
		}

		if(email_uname)
		{ 
			$("#alert_email_uname").html('');
		} else {
			$("#alert_email_uname").html('<font color="red"> required field </font>');
		}

		if(email_pwd)
		{ 
			$("#alert_email_pwd").html('');
		} else {
			$("#alert_email_pwd").html('<font color="red"> required field </font>');
		}

		if(email_host)
		{ 
			$("#alert_email_host").html('');
		} else {
			$("#alert_email_host").html('<font color="red"> required field </font>');
		}

		if(email_validity)
		{ 
			$("#alert_HW_validity").html('');
		} else {
			$("#alert_HW_validity").html('<font color="red"> required field </font>');
		}

		if(email_queue)
		{ 
			$("#alert_HW_queue").html('');
		} else {
			$("#alert_HW_queue").html('<font color="red"> required field </font>');
		}


		//check to submit
		if((email_type=='')||(email_uname=='')||(email_pwd=='')||(email_host=='')||(email_validity=='')||(email_queue=='')){

		} else {


		var data = 	{
						"email_type" : email_type,
						"email_uname" : email_uname,
						"email_pwd" : email_pwd,
						"email_host" : email_host,
						"email_imap" : email_imap,
						"email_queue" : email_queue,
						"email_validity" : email_validity,
						"email_comment" : email_comment,
						'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
						
					}

		$.ajax({
                    url: "<?= base_url() ?>Admin/A_email_postmaster_addData",
                    type: "POST",
                    dataType: "html",
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
	            	//alert('Success Update email account');
	            	//location.reload();

	            	var url = "<?= base_url()?>Admin/A_email_postmaster_viewlist";
	                window.location.href=url;
                    }
            });

	}

function cancel()
	{
		location.reload();
	}

}
</script>

