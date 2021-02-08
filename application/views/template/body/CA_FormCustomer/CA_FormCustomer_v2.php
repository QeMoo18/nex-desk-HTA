
		
<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Customer Administrator </h5>
		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
					<a href="<?=base_url()?>Customer/CA_ViewList"><button class="btn btn-success btn-block"> Go To Overview</button></a>
				</div>
			</div>

			<div class="col-md-10">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Form Customer Administrator</b> </h3>
		          </div>
		          <div class="box-body">

		          				<div class="row">
									<div class="form-group col-md-4">
					                  <label for="exampleInputEmail1">* CustomerID</label>
					                  <input type='text' class='form-control' name='cmc_cname' id='cmc_cname' onchange="check_custID();">
					                  <font color="red"><span id="alert_cid"> </span></font> 
					                </div>
							
									<div class="form-group col-md-4">
					                  <label for="exampleInputEmail1">* Customer</label>
					                  <input type='text' class='form-control' name='cmc_name' id='cmc_name'> 
					                  <font color="red"><span id="alert_cmc_name"> </span></font> 
					                </div>
							
									<div class="form-group col-md-4">
					                  <label for="exampleInputEmail1">Street</label>
					                  <input type='text' class='form-control' name='cmc_street2' id='cmc_street2'> 
					                  <font color="red"><span id="alert_cmc_street2"> </span></font>
					                </div>
					            </div>
								
								<div class="row">
									<div class="form-group col-md-4">
					                  <label for="exampleInputEmail1">Postcode</label>
					                  <input type='text' class='form-control' name='cmc_poscode' id='cmc_poscode' onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="6"> 
					                  <font color="red"><span id="alert_cmc_poscode"> </span></font>
					                </div>
							
									<div class="form-group col-md-4">
					                  <label for="exampleInputEmail1">City</label>
					                  <input type='text' class='form-control' name='cmc_ct' id='cmc_ct'> 

					                </div>

					                <div class="form-group col-md-4">
					                  <label for="exampleInputEmail1">Country</label>
					                  <input type='text' class='form-control' name='cmc_country' id='cmc_country'> 
					                </div>
					            </div>
								
								<div class="row">
									<div class="form-group col-md-6">
					                  <label for="exampleInputEmail1">URL</label>
					                  <input type='text' class='form-control' name='cmc_url' id='cmc_url'>
					                </div>

					                <div class="form-group col-md-6">
					  					<label for="exampleInputEmail1">Valid</label>
					  					<select class='form-control' name='cmc_valid' id='cmc_valid'>
					  						<option value=''>< Please Select ></option>
					  						<?= lookup_validity(); ?>
					  					</select>
					                </div>
					            </div>
								
								<div class="row">
									<div class="form-group col-md-12">
					  					<label for="exampleInputEmail1">Comment</label>
					  					<textarea class='form-control' rows='3' name='cmc_comment2' id='cmc_comment2'></textarea>
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
<input type="hidden" name="other_id" id="other_id" value="<?= $this->uri->segment('3'); ?>">
<script type="text/javascript">



	function check_custID()
	{
		var cmc_cname = $("#cmc_cname").val();

		var data =  {
		                    'cmc_cname':cmc_cname,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		            }

        $.ajax({
                    url: '<?= base_url() ?>Customer/check_custID',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {
                       
                    },
                    success: function(response){
                    	if(response>0){
                    		//alert('a');
                    		var cmc_cname = $("#cmc_cname").val('');
                    		$("#alert_cid").html('* Duplicate CustomerID in database');
                    	} else {
                    		//alert('b');
                    		$("#alert_cid").html('');

                    	}
                    }
              });
	}



	function submit()
	{
		var cmc_cname = $("#cmc_cname").val();
		var cmc_name = $("#cmc_name").val();
		var cmc_street2 = $("#cmc_street2").val();
		var cmc_poscode = $("#cmc_poscode").val();
		var cmc_ct = $("#cmc_ct").val();
		var cmc_country = $("#cmc_country").val();
		var cmc_url = $("#cmc_url").val();
		var cmc_comment2 = $("#cmc_comment2").val();
		var cmc_valid = $("#cmc_valid").val();

		if((cmc_cname=='')||(cmc_name=='')){

			if(cmc_cname){
				$("#alert_cid").html('');
			} else {
				$("#alert_cid").html('Required field');
			}

			if(cmc_name){
				$("#alert_cmc_name").html('');
			} else {
				$("#alert_cmc_name").html('Required field');
			}

		} else {

			var data = 	{
							"cmc_cname" : cmc_cname,
							"cmc_name" : cmc_name,
							"cmc_street2" : cmc_street2,
							"cmc_poscode" : cmc_poscode,
							"cmc_ct" : cmc_ct,
							"cmc_country": cmc_country,
							"cmc_url" : cmc_url,
							"cmc_comment2" : cmc_comment2,
							"cmc_valid" : cmc_valid,
							'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'

							
						}

			$.ajax({
	                    url: "<?= base_url() ?>Customer/ca_addCustomer",
	                    type: "POST",
	                    dataType: "html",
	                    data: data,
	                    beforeSend: function() {

	                    },
	                    success: function(response){
	                    	// alert('Success add Customer');
	                    	// location.reload();

	                    	var url = "<?= base_url()?>Customer/CA_ViewList";
        					window.location.href = url;
	                    }
	            });

		}
	}

	function cancel()
 	{
 		var url = "<?= base_url()?>Customer/CA_ViewList";
        window.location.href = url;
 	}
</script>