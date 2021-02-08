
		
<div class="content-wrapper">
	<section class="content">
		<h2> Customer Management </h2>
		<div class="row">
			<div class="col-md-2"> 
				<div class="form-group">
					<a href="<?= base_url()?>admin/admin_cm_c_viewlist"> 
						<button class="btn btn-danger btn-block"> Go To Overview</button>
						</a>
					</div>
				</div>	
				<div class="col-md-10">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Edit Customer</b> </h3>
		          </div>
						 <div class="box-body">

						 	<div class="row">
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">*CustomerID</label>
				                  <input type='text' class='form-control' name='custID' id='custID'>
				                  <span id="alert_custID"></span> 
				                </div>
							
								<div class="form-group col-md-3" style="display: none">
				                  <label for="exampleInputEmail1">*Customer</label>
				                  <input type='text' class='form-control' name='C_CustName' id='C_CustName'>
				                  <span id="alert_C_CustName"></span> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Street</label>
				                  <input type='text' class='form-control' name='C_street' id='C_street'> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Postcode</label>
				                  <input type='text' class='form-control' name='C_postcode' id='C_postcode'
				                  onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="6"> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">City</label>
				                  <input type='text' class='form-control' name='C_city' id='C_city'> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Country</label>
				                  <input type='text' class='form-control' name='C_country' id='C_country'> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">URL</label>
				                  <input type='text' class='form-control' name='C_url' id='C_url'> 
				                </div>
							
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Comment</label>
				                   <textarea rows="4" class='form-control' name='C_comment' id='C_comment'> </textarea>  
				                </div>

				                  <div class="form-group col-md-3">
			              					<label for="exampleInputEmail1">*Valid</label>
			              					<select class='form-control' name='C_valid' id='C_valid'>
			              					<option value=''>< Please Select ></option>
		                                <?= lookup_validity(); ?>
		                            </select>
				  				 	<span id="alert_C_valid"></span>
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

<!-- Input hidden get - ID -->
<input type="hidden" name="other_id" id="other_id" value="<?= $this->uri->segment('3')?>">


<script type="text/javascript">

	

	$(document).ready(function (){ // automatik bila dia open browser
		details(); //panggil function details
	});

	function details() //create dekat function
	{
		var other_id = $("#other_id").val(); //get id hidden 
		
		var data =  {
		                    'other_id':other_id, //declare variable dalam data 
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		            }

        $.ajax({
                    url: '<?= base_url() ?>Admin/cm_customer_details', //create nama function
                    type: 'POST',
                    dataType: 'json', //jenis type adalah json
                    data: data,
                    beforeSend: function() {
                       
                    },
                    success: function(response){

								//input daripada form - id
								var custID = $("#custID").val(response.customerID);
								var C_CustName = $("#C_CustName").val(response.customer);
								var C_street = $("#C_street").val(response.street);
								var C_postcode = $("#C_postcode").val(response.postcode);
								var C_city = $("#C_city").val(response.city);
								var C_country = $("#C_country").val(response.country);
								var C_url = $("#C_url").val(response.URL);
								var C_comment = $("#C_comment").val(response.comment);
								var C_valid = $("#C_valid").val(response.valid);

                    }
              });
	}

	function submit()
	{
		//input daripada form - id
		var custID = $("#custID").val();
		var C_CustName = $("#C_CustName").val();
		var C_street = $("#C_street").val();
		var C_postcode = $("#C_postcode").val();
		var C_city = $("#C_city").val();
		var C_country = $("#C_country").val();
		var C_url = $("#C_url").val();
		var C_comment = $("#C_comment").val();
		var C_valid = $("#C_valid").val();
		var other_id = $("#other_id").val(); //get id hidden 

		//check to action
		if(C_CustName)
		{ 
			$("#alert_C_CustName").html('');
		} else {
			$("#alert_C_CustName").html('<font color="red"> required field </font>');
		}

		if(custID)
		{ 
			$("#alert_custID").html('');
		} else {
			$("#alert_custID").html('<font color="red"> required field </font>');
		}

		if(C_valid)
		{ 
			$("#alert_C_valid").html('');
		} else {
			$("#alert_C_valid").html('<font color="red"> required field </font>');
		}

		//check to submit
		if((C_CustName=='')||(custID=='')||(C_valid=='')){

		} else {

			var data = 
			{   
            	'custID':custID,
            	'C_CustName':C_CustName,
            	'C_street':C_street,
            	'C_postcode':C_postcode,
            	'C_city':C_city,
            	'C_country':C_country,
            	'C_url':C_url,
            	'C_comment':C_comment,
            	'C_valid':C_valid,
            	'other_id':other_id,
                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
            }

	            $.ajax({
	                    url: '<?= base_url() ?>Admin/CM_Customer_update',
	                    type: 'POST',
	                    dataType: 'html',
	                    data: data,
	                    beforeSend: function() {

	                    },
	                    success: function(response){
	                    	//alert("Data Updated !");
	                    	//location.reload();

	                    	var url = "<?= base_url()?>Admin/admin_cm_c_viewlist";
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