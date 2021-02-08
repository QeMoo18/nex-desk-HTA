
		
<div class="content-wrapper">
	<section class="content">
			
		<div class="row">
			<div class="col-md-2"> 
				<div class="form-group">
					<a href="<?= base_url()?>admin/admin_cm_cu_viewlist"> 
						<button class="btn btn-danger btn-block"> Go To Overview</button>
					</a>
				</div>
			</div>	
			<div class="col-md-10">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Add Customer User</b> </h3>
		          </div>
		          <div class="box-body">

		          			<div class="row">
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Title or Salutation</label>
				                  <input type='text' class='form-control' name='CU_title' id='CU_title'> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">*First Name</label>
				                  <input type='text' class='form-control' name='CU_FName' id='CU_FName'>
				                  <span id="alert_CU_FName"></span>  
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">*Last Name</label>
				                  <input type='text' class='form-control' name='CU_LName' id='CU_LName'> 
				                  <span id="alert_CU_LName"></span> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">*Username</label>
				                  <input type='text' class='form-control' name='CU_UName' id='CU_UName'>
				                  <span id="alert_CU_UName"></span>  
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">*Password</label>
				                  <input type='Password' class='form-control' name='CU_pwd' id='CU_pwd'>
				                  <span id="alert_CU_pwd"></span>  
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">*Email</label>
				                  <input type='text' class='form-control' name='CU_email' id='CU_email' 
				                  onchange="validateForm();">
				                  <span id="alert_CU_email"></span>  
				                </div>

				                <script type="text/javascript">
				                	function validateForm()
									{
									 var x = document.getElementById('CU_email');
									 var atpos=x.value.indexOf("@");
									 var dotpos=x.value.lastIndexOf(".");
									 if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
									  {
									    //alert("Not a valid e-mail address");
									    $("#CU_email").val('');
									    $("#alert_CU_email").html('Wrong formating..');
									    return false;
									  } else {
									  	$("#alert_CU_email").html('');
									  }
									} 

				                </script>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">*CustomerID</label>
				                  <select class="form-control" id="Cust_ID" name="Cust_ID">
				                  	<option value=""><< Select CustomerID >></option>
				                  	<?= lookup_customerID() ?>
				                  </select>
				                  <span id="alert_Cust_ID"></span>  
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Phone</label>
				                  <input type='text' class='form-control' name='CU_Phone' id='CU_Phone'> 
				                </div>
							</div>

							<div class="row">
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Fax</label>
				                  <input type='text' class='form-control' name='CU_fax' id='CU_fax'> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Mobile</label>
				                  <input type='text' class='form-control' name='CU_mobile' id='CU_mobile'> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Street</label>
				                  <input type='text' class='form-control' name='CU_street' id='CU_street'> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Postcode</label>
				                  <input type='text' class='form-control' name='CU_postcode' id='CU_postcode'
				                  onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="6"> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">City</label>
				                  <input type='text' class='form-control' name='CU_city' id='CU_city'> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Country</label>
				                  <input type='text' class='form-control' name='CU_country' id='CU_country'> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Comment</label>
				                  <textarea rows="4" class='form-control' name='CU_comment' id='CU_comment'> </textarea> 
				                </div>

					            <div class="form-group col-md-3">
				  					<label for="exampleInputEmail1">*Valid</label>
				  					<select class='form-control' name='CU_valid' id='CU_valid'>
				  					<option value=''>< Please Select ></option>
		                                <?= lookup_validity(); ?>
		                            </select>
				  				 	<span id="alert_CU_valid"></span>
				      			</div>
				      		</div>
				      		<hr>
				      		<div class="row">
								<div class="form-group col-md-2">
				                   <button type="submit" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
				                </div>
				                <div class="form-group col-md-2">
				                  <button class="btn btn-primary btn-block" onclick="submit();"> Submit </button>
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
		//input daripada form - id
		var CU_title = $("#CU_title").val();
		var CU_FName = $("#CU_FName").val();
		var CU_LName = $("#CU_LName").val();
		var CU_UName = $("#CU_UName").val();
		var CU_pwd = $("#CU_pwd").val();
		var CU_email = $("#CU_email").val();
		var Cust_ID = $("#Cust_ID").val();
		var CU_Phone = $("#CU_Phone").val();
		var CU_fax = $("#CU_fax").val();
		var CU_mobile = $("#CU_mobile").val();
		var CU_street = $("#CU_street").val();
		var CU_postcode = $("#CU_postcode").val();
		var CU_city = $("#CU_city").val();
		var CU_country = $("#CU_country").val();
		var CU_comment = $("#CU_comment").val();
		var CU_valid = $("#CU_valid").val();

		//check to action
		if(CU_FName)
		{ 
			$("#alert_CU_FName").html('');
		} else {
			$("#alert_CU_FName").html('<font color="red"> required field </font>');
		}

		if(CU_LName)
		{ 
			$("#alert_CU_LName").html('');
		} else {
			$("#alert_CU_LName").html('<font color="red"> required field </font>');
		}

		if(CU_UName)
		{ 
			$("#alert_CU_UName").html('');
		} else {
			$("#alert_CU_UName").html('<font color="red"> required field </font>');
		}

		if(CU_pwd)
		{ 
			$("#alert_CU_pwd").html('');
		} else {
			$("#alert_CU_pwd").html('<font color="red"> required field </font>');
		}

		if(CU_email)
		{ 
			$("#alert_CU_email").html('');
		} else {
			$("#alert_CU_email").html('<font color="red"> required field </font>');
		}

		if(Cust_ID)
		{ 
			$("#alert_Cust_ID").html('');
		} else {
			$("#alert_Cust_ID").html('<font color="red"> required field </font>');
		}

		if(CU_valid)
		{ 
			$("#alert_CU_valid").html('');
		} else {
			$("#alert_CU_valid").html('<font color="red"> required field </font>');
		}


		//check to submit
		if((CU_FName=='')||(CU_LName=='')||(CU_UName=='')||(CU_pwd=='')||(CU_email=='')||(Cust_ID=='')||(CU_valid=='')){

		} else {



		var data = 
		                {   'CU_title':CU_title,
		                	'CU_FName':CU_FName,
		                	'CU_LName':CU_LName,
		                	'CU_UName':CU_UName,
		                	'CU_pwd':CU_pwd,
		                	'CU_email':CU_email,
		                	'Cust_ID':Cust_ID,
		                	'CU_Phone':CU_Phone,
		                	'CU_fax':CU_fax,
		                	'CU_mobile':CU_mobile,
		                	'CU_street':CU_street,
		                	'CU_postcode':CU_postcode,
		                	'CU_city':CU_city,
		                	'CU_country':CU_country,
		                	'CU_comment':CU_comment,
		                	'CU_valid':CU_valid,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		                }

                    
            $.ajax({
                    url: '<?= base_url() ?>Admin/CM_Customer_User_form',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                    	//alert("Data Saved !");
                    	//location.reload();

                    	var url = "<?= base_url()?>Admin/Admin_CM_CU_viewlist";
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
	 			  