

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 

		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Agent Management </h5>
		<div class="row">
			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>Admin/Agent_ViewList"><button class="btn btn-success btn-block"> Go To Overview</button></a>
				</div>
			</div>
			<div class="col-md-10">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <label class="box-title"><b>Add Agent</b></label>
		          </div>
		          <div class="box-body">


		          	<div class="row">
			          	<!-- Set Default -->
			          	<div class="form-group col-md-3">
			              <label for="exampleInputEmail1">Environment</label>
			              <input type='text' class='form-control' name='am_title2' id='am_env2' value="Hospital" disabled="disabled"> 

			             <!--  <input type='text' class='form-control' name='am_title' id='am_env' value="noc" style="display: none"> -->

			              <input type='text' class='form-control' name='am_title' id='am_env' value="hospital" style="display: none">

			            </div>
			            <!-- Set Default -->

						<div class="form-group col-md-3">
			              <label for="exampleInputEmail1">Title</label>
			              <input type='text' class='form-control' name='am_title' id='am_title'> 
			            </div>
					
						<div class="form-group col-md-3">
			              <label for="exampleInputEmail1">* First Name</label>
			              <input type='text' class='form-control' name='am_fname' id='am_fname'> 
			              <span id="alert_am_fname"> </span>
			            </div>
					
						<div class="form-group col-md-3">
			              <label for="exampleInputEmail1">* Last Name</label>
			              <input type='text' class='form-control' name='am_lname' id='am_lname'> 
			              <span id="alert_am_lname"> </span>
			            </div>
			        </div>
					
					<div class="row">
						<div class="form-group col-md-3">
								<label for="exampleInputEmail1">* Group</label>
								<select class='form-control' name='am_group' id='am_group'>
									<option value=''>< Please Select ></option>
									<?= lookup_group() ?>
								</select>
								<span id="alert_am_group"> </span>
			            </div>
					
						<div class="form-group col-md-3">
								<label for="exampleInputEmail1">* Role</label>
								<select class='form-control' name='am_role' id='am_role'>
									<option value=''>< Please Select ></option>
									<?= lookup_role() ?>
								</select>
								<span id="alert_am_role"> </span>
			            </div>
					
						<div class="form-group col-md-3">
			              <label for="exampleInputEmail1">* Username</label>
			              <input type='text' class='form-control' name='am_uname' id='am_uname' onchange="check_username();"> 
			              <span id="alert_uname"> </span>
			            </div>
					
						<div class="form-group col-md-3">
			              <label for="exampleInputEmail1">* Password</label>
			              <input type='password' class='form-control' name='am_pwd' id='am_pwd'> 
			              <span id="alert_am_pwd"> </span>
			            </div>
			        </div>
					
					<div class="row">
						<div class="form-group col-md-3">
			              <label for="exampleInputEmail1">* Email</label>
			              <input type='text' class='form-control' name='am_email' id='am_email' onchange="validateForm();"> 
			              <span id="alert_am_email"> </span>
			            </div>

			            <script type="text/javascript">
			                	function validateForm()
								{
								 var x = document.getElementById('am_email');
								 var atpos=x.value.indexOf("@");
								 var dotpos=x.value.lastIndexOf(".");
								 if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
								  {
								    //alert("Not a valid e-mail address");
								    $("#am_email").val('');
								    $("#alert_am_email").html('<font color="red"> * Wrong formating..');
								    return false;
								  } else {
								  	$("#alert_am_email").html('');
								  }
								} 

						   </script>

						<div class="form-group col-md-3">
			              <label for="exampleInputEmail1">* Mobile</label>
			              <input type='text' class='form-control' name='am_mobile' id='am_mobile' onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="11"> 
			              <span id="alert_am_mobile"> </span>
			            </div>
					
						 <div class="form-group col-md-3">
			  					<label for="exampleInputEmail1">*Validity</label>
			  					<select class='form-control' name='am_valid' id='am_valid'>
			  					<option value=''>< Please Select ></option>
	                                <?= lookup_validity(); ?>
	                            </select>
			  				 	<span id="alert_am_valid"></span>
			      			</div>
			      	</div>
			      	<hr>
			      	<br>
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


	function check_username()
	{
		var am_uname = $("#am_uname").val();

		var data = 
		                {   'am_uname':am_uname,
		                	'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		                }

		$.ajax({
                    url: '<?= base_url() ?>Admin/check_username',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                    	if(response>0){
                    		$("#alert_uname").html('<font color="red"> * Username already used ! </font>');
                    		$("#am_uname").val('');
                    	} else {
                    		$("#alert_uname").html('');
                    	}
                    }
            });
	}

	function submit()
	{
		var am_env = $("#am_env").val();
		var am_title = $("#am_title").val();
		var am_fname = $("#am_fname").val();
		var am_lname = $("#am_lname").val();
		var am_group = $("#am_group").val();
		var am_role = $("#am_role").val();
		var am_uname = $("#am_uname").val();
		var am_pwd = $("#am_pwd").val();
		var am_email = $("#am_email").val();
		var am_mobile = $("#am_mobile").val();
		var am_valid = $("#am_valid").val();


		//check to action
		if(am_fname)
		{
			$("#alert_am_fname").html('');
		} else {
			$("#alert_am_fname").html('<font color="red"> * required field </font>');
		}


		if(am_lname)
		{
			$("#alert_am_lname").html('');
		} else {
			$("#alert_am_lname").html('<font color="red"> * required field </font>');
		}

		if(am_group)
		{
			$("#alert_am_group").html('');
		} else {
			$("#alert_am_group").html('<font color="red"> * required field </font>');
		}

		if(am_role)
		{
			$("#alert_am_role").html('');
		} else {
			$("#alert_am_role").html('<font color="red"> * required field </font>');
		}

		if(am_uname)
		{
			$("#alert_uname").html('');
		} else {
			$("#alert_uname").html('<font color="red"> * required field </font>');
		}

		if(am_pwd)
		{
			$("#alert_am_pwd").html('');
		} else {
			$("#alert_am_pwd").html('<font color="red"> * required field </font>');
		}

		if(am_email)
		{
			$("#alert_am_email").html('');
		} else {
			$("#alert_am_email").html('<font color="red"> * required field </font>');
		}

		if(am_mobile)
		{
			$("#alert_am_mobile").html('');
		} else {
			$("#alert_am_mobile").html('<font color="red"> * required field </font>');
		}

		if(am_valid)
		{
			$("#alert_am_valid").html('');
		} else {
			$("#alert_am_valid").html('<font color="red"> * required field </font>');
		}
		

		// check to submit
		if((am_fname=='')||(am_lname=='')||(am_group=='')||(am_role=='')||(am_uname=='')||(am_pwd=='')||(am_email=='')||(am_mobile=='')||(am_valid=='')){

		} else {

			var data = 
			                {   'am_env':am_env,
			                	'am_title':am_title,
			                	'am_fname':am_fname,
			                	'am_lname':am_lname,
			                	'am_group':am_group,
			                	'am_role':am_role,
			                	'am_uname':am_uname,
			                	'am_pwd':am_pwd,
			                	'am_email':am_email,
			                	'am_mobile':am_mobile,
			                	'am_valid':am_valid,
			                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			                }

	                    
	            $.ajax({
	                    url: '<?= base_url() ?>Admin/add_agent_submit',
	                    type: 'POST',
	                    dataType: 'html',
	                    data: data,
	                    beforeSend: function() {

	                    },
	                    success: function(response){
	                    	//alert('Success Register User');
	                    	//location.reload();

	                    	var url = "<?= base_url()?>Admin/Agent_ViewList";
	                    	window.location.href=url;

	                    }
	            });

	    }
	}

	function cancel()
	{
		var url = "<?= base_url()?>Admin/Agent_ViewList";
	    window.location.href=url;

	}
</script>