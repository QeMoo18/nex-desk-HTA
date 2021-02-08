<script type="text/javascript" src="<?=base_url()?>asset_admin/bower_components/ckeditor/ckeditor.js"></script>

<div class="pageheader hidden-xs">
    <h3><i class="fa fa-user"></i> Form Add Customer User</h3>
    <div class="breadcrumb-wrapper">
        <span class="label" style="padding-right: 0px;"><i class="fa fa-cog" aria-hidden="true" style="border: 2px solid #f2f7f8;padding-right: 0px;"></i></span>
        <ol class="breadcrumb">
            <li> <a href="<?=base_url()?>Customer/CMC_AddCustomerUser"> Add Customer User </a> </li> 
            <li> <a href="<?=base_url()?>Customer/CMC_Customer/2"> List Customer User </a> </li>  
             <li> <a href="<?=base_url()?>Customer/CMC_Customer/1"> List Customer </a> </li>  
            <li> <a href="<?=base_url()?>Customer/CMC_Customer"> Search </a> </li>
        </ol>
    </div>
</div>

<div class="row" style="padding-bottom: 30px;">
	<div class="content-wrapper">
		<section class="content">
			<div class="row">

				<div class="col-md-12">

					<div class="box box-success">
			          <div class="box-header with-border">
			            <h3 class="box-title"> <b>Customer User Management</b> </h3>
			          </div>
			          <div class="box-body">

			          				<div class="row">
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">Title or Salutation</label>
						                  <input type='text' class='form-control' name='cmc_title' id='cmc_title'> 
						                </div>
								
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">* First Name</label>
						                  <input type='text' class='form-control' name='cmc_fname' id='cmc_fname' onchange="check_fname();"> 
						                  <font color="red"><span id="alert_fname"></span></font>
						                </div>
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">* Last Name</label>
						                  <input type='text' class='form-control' name='cmc_lname' id='cmc_lname'> 
						                  <font color="red"><span id="alert_lname"></span></font>
						                </div>
						           
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">* Username</label>
						                  <input type='text' class='form-control' name='cmc_uname' id='cmc_uname' onchange="check_uname();"> 
						                  <font color="red"><span id="alert_username"></span></font>
						                </div>
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">* Password</label>
						                  <input type='password' class='form-control' name='cmc_pwd' id='cmc_pwd'> 
						                  <font color="red"><span id="alert_pwd"></span></font>
						                </div>
								
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">* Email</label>
						                  <input type='text' class='form-control' name='cmc_email' id='cmc_email' onchange="validateForm();"> 
						                  <font color="red"><span id="alert_email"></span></font>
						                </div>
						            
						                <div class="form-group col-md-2">
						  					<label for="exampleInputEmail1">* CustomerID</label>
						  					<select class='form-control' name='cmc_custid' id='cmc_custid'>
						  						<option value=''>< Please Select ></option>
						  						<?= lookup_customerID() ?>
						  					</select>
						  					<font color="red"><span id="alert_custid"></span></font>
						                </div>

										
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">Phone</label>
						                  <input type='text' class='form-control' name='cmc_phone' id='cmc_phone' onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="12"> 
						                </div>
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">Fax</label>
						                  <input type='text' class='form-control' name='cmc_fax' id='cmc_fax' onkeyup="this.value=this.value.replace(/[^\d]/,'')"> 
						                </div>
						           
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">Mobile</label>
						                  <input type='text' class='form-control' name='cmc_mobile' id='cmc_mobile' onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="12"> 
						                </div>
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">Street</label>
						                  <input type='text' class='form-control' name='cmc_street' id='cmc_street'> 
						                </div>
								
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">Postcode</label>
						                  <input type='text' class='form-control' name='cmc_postcode' id='cmc_postcode' onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="6"> 
						                </div>
						           
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">City</label>
						                  <input type='text' class='form-control' name='cmc_city' id='cmc_city'> 
						                </div>
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">Country</label>
						                  <input type='text' class='form-control' name='cmc_country' id='cmc_country'> 
						                </div>
										<div class="form-group col-md-2">
						  					<label for="exampleInputEmail1">Validity</label>
						  					<select class='form-control' name='cmc_valid' id='cmc_valid'>
						  						<option value=''>< Please Select ></option>
						  						<?= lookup_validity() ?>
						  					</select>
						                </div>

						                
						            </div>
									
									<div class="row">
						                <div class="form-group col-md-12">
												<label for="exampleInputEmail1">Comment</label>
												<textarea class='form-control' rows='5' name='cmc_comment' id='cmc_comment'></textarea>
							            </div>
							        </div>
									
									<hr>
									<div class="row">
										<div class="col-md-8"></div>
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
</div>

<input type="hidden" name="other_id" id="other_id" value="<?= $this->uri->segment('3'); ?>">

<script type="text/javascript">
	
	
	$(document).ready(function (){
		details();
	
	});


	function validateForm()
	{
	 var x = document.getElementById('cmc_email');
	 var atpos=x.value.indexOf("@");
	 var dotpos=x.value.lastIndexOf(".");
	 if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
	  {
	    //alert("Not a valid e-mail address");
	    $("#cmc_email").val('');
	    $("#alert_email").html('<li> Wrong formating.. </li>');
	    return false;
	  }
	}
	
	function check_fname()
	{
		var cmc_fname = $("#cmc_fname").val();

		var data =  {
		                    'cmc_fname':cmc_fname,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		            }

        $.ajax({
                    url: '<?= base_url() ?>Customer/check_fname',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    beforeSend: function() {
                       
                    },
                    success: function(response){
                    	if(response>0){
                    		//alert('a');
                    		var cmc_fname = $("#cmc_fname").val('');
                    		$("#alert_fname").html('* Duplicate Username in database');
                    	} else {
                    		//alert('b');
                    		$("#alert_fname").html('');

                    	}
                    }
              });
	}

	function check_uname()
	{
		var cmc_uname = $("#cmc_uname").val();

		var data =  {
		                    'cmc_uname':cmc_uname,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		            }

        $.ajax({
                    url: '<?= base_url() ?>Customer/check_uname',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    beforeSend: function() {
                       
                    },
                    success: function(response){
                    	if(response>0){
                    		//alert('a');
                    		var cmc_uname = $("#cmc_uname").val('');
                    		$("#alert_username").html('* Duplicate Username in database');
                    	} else {
                    		//alert('b');
                    		$("#alert_username").html('');

                    	}
                    }
              });
	}

	function details()
	{
		var other_id= $("#other_id").val();

		var data =  {
		                    'other_id':other_id,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		            }

        $.ajax({
                    url: '<?= base_url() ?>Customer/cmc_details',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    beforeSend: function() {
                       
                    },
                    success: function(response){

                    	var cmc_title = $("#cmc_title").val(response.title_salutation);
						var cmc_fname = $("#cmc_fname").val(response.first_name);
						var cmc_lname = $("#cmc_lname").val(response.last_name);
						var cmc_uname = $("#cmc_uname").val(response.username);
						var cmc_pwd = $("#cmc_pwd").val(response.password);
						var cmc_email = $("#cmc_email").val(response.email);
						var cmc_custid = $("#cmc_custid").val(response.customerID);
						var cmc_phone = $("#cmc_phone").val(response.phone);
						var cmc_fax = $("#cmc_fax").val(response.fax);
						var cmc_mobile = $("#cmc_mobile").val(response.mobile);
						var cmc_street = $("#cmc_street").val(response.street);
						var cmc_postcode = $("#cmc_postcode").val(response.postcode);
						var cmc_city = $("#cmc_city").val(response.city);
						var cmc_country = $("#cmc_country").val(response.country);
						var cmc_comment = $("#cmc_comment").val(response.comment);
						var cmc_valid = $("#cmc_valid").val(response.valid);

                    }
              });
	}

	function submit()
	{
		var cmc_title = $("#cmc_title").val();
		var cmc_fname = $("#cmc_fname").val(); //required
		var cmc_lname = $("#cmc_lname").val(); //required
		var cmc_uname = $("#cmc_uname").val(); //required
		var cmc_pwd = $("#cmc_pwd").val(); //required
		var cmc_email = $("#cmc_email").val(); //required
		var cmc_custid = $("#cmc_custid").val(); //required
		var cmc_phone = $("#cmc_phone").val();
		var cmc_fax = $("#cmc_fax").val();
		var cmc_mobile = $("#cmc_mobile").val();
		var cmc_street = $("#cmc_street").val();
		var cmc_postcode = $("#cmc_postcode").val();
		var cmc_city = $("#cmc_city").val();
		var cmc_country = $("#cmc_country").val();
		var cmc_comment = $("#cmc_comment").val();
		var cmc_valid = $("#cmc_valid").val();

		if((cmc_fname=='')||(cmc_lname=='')||(cmc_uname=='')||(cmc_pwd=='')||(cmc_email=='')||(cmc_custid==''))
		{
			alert('You have something error..');

			if(cmc_fname){
				$("#alert_fname").html('');
			} else {
				$("#alert_fname").html('* required field');
			}

			if(cmc_lname){
				$("#alert_lname").html('');
			} else {
				$("#alert_lname").html('* required field');
			}


			if(cmc_uname){
				$("#alert_username").html('');
			} else {
				$("#alert_username").html('* required field');
			}

			if(cmc_email){
				$("#alert_email").html('');
			} else {
				$("#alert_email").html('* required field');
			}


			if(cmc_pwd){
				$("#alert_pwd").html('');
			} else {
				$("#alert_pwd").html('* required field');
			}

			if(cmc_custid){
				$("#alert_custid").html('');
			} else {
				$("#alert_custid").html('* required field');
			}

		} else {

			var data = 	{
							"cmc_title" : cmc_title,
							"cmc_fname" : cmc_fname,
							"cmc_lname" : cmc_lname,
							"cmc_uname" : cmc_uname,
							"cmc_pwd" : 	cmc_pwd,
							"cmc_email" : cmc_email,
							"cmc_custid" : cmc_custid,
							"cmc_phone" : cmc_phone,
							"cmc_fax" : cmc_fax,
							"cmc_mobile" : cmc_mobile,
							"cmc_street" : cmc_street,
							"cmc_postcode" : cmc_postcode,
							"cmc_city" : cmc_city,
							"cmc_country" : cmc_country,
							"cmc_comment" : cmc_comment,
							"cmc_valid" : cmc_valid,
							'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
						}

			$.ajax({
		                url: "<?= base_url() ?>Customer/add_customer_user",
		                type: "POST",
		                dataType: "html",
		                data: data,
		                beforeSend: function() {

		                },
		                success: function(response){
		                	// alert('Success add customer user');
		                	// location.reload();

		                	var url = "<?= base_url()?>Customer/CUA_ViewList";
                            window.location.href = url;
		                }
		        });

		}
	}

	function cancel()
	{
		var url = "<?= base_url()?>Customer/CUA_ViewList";
        window.location.href = url;
	}
</script>


<style type="text/css">

    .pageheader {
        padding: 13px;
        position: relative;
        /* background: #ffffff; */
        background: linear-gradient(to right, rgb(242, 247, 248) 10%, rgb(31, 114, 162) 100%);
        background: -moz-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 114, 162) 100%);
        background: -webkit-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 114, 162) 100%);
        background: linear-gradient(to right, rgb(242, 247, 248) 10%, rgb(242, 247, 248) 100%);
        margin: -20px -5px 24px -5px;
        /* padding: 35px 15px 100px 20px; */
        color: #353535;
        box-shadow: 0 1px 2px 0 rgb(234, 234, 234);
        padding-left: 30p;
    }

    .pageheader .fa, .pageheader .glyphicon {
        font-size: 12px;
        margin-right: 5px;
        padding: 6px 7px;
        border: 2px solid #124f76;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;
    }

    .pageheader h3 {
        font-size: 15px;
        color: #165a84;
        letter-spacing: -.5px;
        margin: 0;
    }

    .pageheader .breadcrumb-wrapper .label {
        color: #165a84;
        text-transform: uppercase;
        font-weight: 400;
        display: inline-block;
    }


    .pageheader .breadcrumb li a {
        color: #165983;
    }

    .pageheader .breadcrumb li.active {
        color: #175b86;
    }

    .pageheader .breadcrumb-wrapper {
        position: absolute;
        top: 15px;
        right: 25px;
    }


    /* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}


.tab-base .nav-tabs {
    border: 0;
    background: #0d4063;
}


.btn-success {
    background-color: #ffffff;
    border-color: #ffffff;
}



.nav-section>li>.section, .nav-section>li>a {
    position: relative;
    margin: 0;
    text-align: center;
    padding-right: 0px; 
    padding-left: 5px; 
    padding-top: 0px; 
    padding-bottom: 0px; 
}



.font-date{
    font-size: 8px;
    font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
}

</style>