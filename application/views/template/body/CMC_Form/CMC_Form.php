

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h3> Customer Information Center </h3>
		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
					<a href="<?=base_url()?>Customer/CMC_Customer"><button class="btn btn-success btn-block"> Go To Search</button></a>
				</div>
				<div class="form-group">
					<a href="<?=base_url()?>Customer/CUA_FormCustomer"><button class="btn btn-danger btn-block"> + Add Customer </button></a>
				</div>
				<div class="form-group">
					<a href="<?=base_url()?>Customer/CUA_ViewList"><button class="btn btn-success btn-block"> Go To Overview</button></a>
				</div>
			</div>

			<div class="col-md-7">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Customer User Management</b> </h3>
		          </div>
		          <div class="box-body">

								<div class="form-group">
				                  <label for="exampleInputEmail1">Title or Salutation</label>
				                  <input type='text' class='form-control' name='cmc_title' id='cmc_title'> 
				                </div>
						
								<div class="form-group">
				                  <label for="exampleInputEmail1">* First Name</label>
				                  <input type='text' class='form-control' name='cmc_fname' id='cmc_fname'> 
				                </div>
						
								<div class="form-group">
				                  <label for="exampleInputEmail1">* Last Name</label>
				                  <input type='text' class='form-control' name='cmc_lname' id='cmc_lname'> 
				                </div>
						
								<div class="form-group">
				                  <label for="exampleInputEmail1">* Username</label>
				                  <input type='text' class='form-control' name='cmc_uname' id='cmc_uname'> 
				                </div>
						
								<div class="form-group">
				                  <label for="exampleInputEmail1">* Password</label>
				                  <input type='text' class='form-control' name='cmc_pwd' id='cmc_pwd'> 
				                </div>
						
								<div class="form-group">
				                  <label for="exampleInputEmail1">* Email</label>
				                  <input type='text' class='form-control' name='cmc_email' id='cmc_email'> 
				                </div>
						
								<div class="form-group">
				                  <label for="exampleInputEmail1">* CustomerID</label>
				                  <input type='text' class='form-control' name='cmc_custid' id='cmc_custid'> 
				                </div>
						
								<div class="form-group">
				                  <label for="exampleInputEmail1">Phone</label>
				                  <input type='text' class='form-control' name='cmc_phone' id='cmc_phone'> 
				                </div>
						
								<div class="form-group">
				                  <label for="exampleInputEmail1">Fax</label>
				                  <input type='text' class='form-control' name='cmc_fax' id='cmc_fax'> 
				                </div>
						
								<div class="form-group">
				                  <label for="exampleInputEmail1">Mobile</label>
				                  <input type='text' class='form-control' name='cmc_mobile' id='cmc_mobile'> 
				                </div>
						
								<div class="form-group">
				                  <label for="exampleInputEmail1">Street</label>
				                  <input type='text' class='form-control' name='cmc_street' id='cmc_street'> 
				                </div>
						
								<div class="form-group">
				                  <label for="exampleInputEmail1">Postcode</label>
				                  <input type='text' class='form-control' name='cmc_postcode' id='cmc_postcode'> 
				                </div>
						
								<div class="form-group">
				                  <label for="exampleInputEmail1">City</label>
				                  <input type='text' class='form-control' name='cmc_city' id='cmc_city'> 
				                </div>
						
								<div class="form-group">
				                  <label for="exampleInputEmail1">Country</label>
				                  <input type='text' class='form-control' name='cmc_country' id='cmc_country'> 
				                </div>
						
								<div class="form-group">
				                  <label for="exampleInputEmail1">Comment</label>
				                  <input type='text' class='form-control' name='cmc_comment' id='cmc_comment'> 
				                </div>
						
								<div class="form-group">
				                  <label for="exampleInputEmail1">* Valid</label>
				                  <input type='text' class='form-control' name='cmc_valid' id='cmc_valid'> 
				                </div>
									

				  </div>
				</div>
			</div>

			<div class="col-md-3 hidden-xs">
				<div class="col-md-11"><?= lookup_widget(); ?> </div>
          		<div class="col-md-1"> </div>	        
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