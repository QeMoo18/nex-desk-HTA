<div class="pageheader hidden-xs">
    <h3><i class="fa fa-user"></i> View Customer User</h3>
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

<div class="row">
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
						                  <input type='text' class='form-control' name='cmc_fname' id='cmc_fname'> 
						                </div>
							
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">* Last Name</label>
						                  <input type='text' class='form-control' name='cmc_lname' id='cmc_lname'> 
						                </div>
					            	
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">* Username</label>
						                  <input type='text' class='form-control' name='cmc_uname' id='cmc_uname'> 
						                </div>
								
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">* Password</label>
						                  <input type='text' class='form-control' name='cmc_pwd' id='cmc_pwd'> 
						                </div>
								
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">* Email</label>
						                  <input type='text' class='form-control' name='cmc_email' id='cmc_email'> 
						                </div>
						            
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">* CustomerID</label>
						                  <input type='text' class='form-control' name='cmc_custid' id='cmc_custid'> 
						                </div>
								
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">Phone</label>
						                  <input type='text' class='form-control' name='cmc_phone' id='cmc_phone'> 
						                </div>
								
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">Fax</label>
						                  <input type='text' class='form-control' name='cmc_fax' id='cmc_fax'> 
						                </div>
						           
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">Mobile</label>
						                  <input type='text' class='form-control' name='cmc_mobile' id='cmc_mobile'> 
						                </div>
								
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">Street</label>
						                  <input type='text' class='form-control' name='cmc_street' id='cmc_street'> 
						                </div>
								
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">Postcode</label>
						                  <input type='text' class='form-control' name='cmc_postcode' id='cmc_postcode'> 
						                </div>
						            </div>
									
									<div class="row">
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">City</label>
						                  <input type='text' class='form-control' name='cmc_city' id='cmc_city'> 
						                </div>
								
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">Country</label>
						                  <input type='text' class='form-control' name='cmc_country' id='cmc_country'> 
						                </div>

						                <div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">* Valid</label>
						                  <input type='text' class='form-control' name='cmc_valid' id='cmc_valid'> 
						                </div>
									</div>

									<div class="row">
										<div class="form-group col-md-12">
						                  <label for="exampleInputEmail1">Comment</label>
						                  <textarea class="form-control" rows="5" name="cmc_comment" id="cmc_comment"></textarea>
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
		var cmc_fname = $("#cmc_fname").val();
		var cmc_lname = $("#cmc_lname").val();
		var cmc_uname = $("#cmc_uname").val();
		var cmc_pwd = $("#cmc_pwd").val();
		var cmc_email = $("#cmc_email").val();
		var cmc_custid = $("#cmc_custid").val();
		var cmc_phone = $("#cmc_phone").val();
		var cmc_fax = $("#cmc_fax").val();
		var cmc_mobile = $("#cmc_mobile").val();
		var cmc_street = $("#cmc_street").val();
		var cmc_postcode = $("#cmc_postcode").val();
		var cmc_city = $("#cmc_city").val();
		var cmc_country = $("#cmc_country").val();
		var cmc_comment = $("#cmc_comment").val();
		var cmc_valid = $("#cmc_valid").val();
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
	                url: "<?= base_url() ?>Customer/namafucntion",
	                type: "POST",
	                dataType: "html",
	                data: data,
	                beforeSend: function() {

	                },
	                success: function(response){

	                }
	        });

	}

	function cancel()
	{
		location.reload();
	}
</script>



<style type="text/css">

    .pageheader {
        padding: 13px;
        position: relative;
        /* background: #ffffff; */
        background: linear-gradient(to right, rgb(222, 227, 228) 10%, rgb(31, 112, 162) 100%);
        background: -moz-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 112, 162) 100%);
        background: -webkit-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 112, 162) 100%);
        background: linear-gradient(to right, rgb(222, 227, 228) 10%, rgb(222, 227, 228) 100%);
        margin: -20px -5px 22px -5px;
        /* padding: 35px 15px 100px 20px; */
        color: #353535;
        box-shadow: 0 1px 2px 0 rgb(232, 232, 232);
        padding-left: 30p;
    }

    .pageheader .fa, .pageheader .glyphicon {
        font-size: 12px;
        margin-right: 5px;
        padding: 6px 7px;
        border: 2px solid #122f76;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;
    }

    .pageheader h3 {
        font-size: 15px;
        color: #165a82;
        letter-spacing: -.5px;
        margin: 0;
    }

    .pageheader .breadcrumb-wrapper .label {
        color: #165a82;
        text-transform: uppercase;
        font-weight: 200;
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
</style>