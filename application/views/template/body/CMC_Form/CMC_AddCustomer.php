
		
<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Customer Information Center </h5>
		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
					<a href="<?=base_url()?>Customer/CMC_Customer/1"><button class="btn btn-success btn-block"> Go To Overview</button></a>
				</div>
			</div>

			<div class="col-md-7">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>View Customer Administrator</b> </h3>
		          </div>
		          <div class="box-body">

								<div class="form-group">
				                  <label for="exampleInputEmail1">* CustomerID</label>
				                  <input type='text' class='form-control' name='cmc_cname' id='cmc_cname'> 
				                </div>
						
								<div class="form-group">
				                  <label for="exampleInputEmail1">* Customer</label>
				                  <input type='text' class='form-control' name='cmc_name' id='cmc_name'> 
				                </div>
						
								<div class="form-group">
				                  <label for="exampleInputEmail1">Street</label>
				                  <input type='text' class='form-control' name='cmc_street2' id='cmc_street2'> 
				                </div>
						
								<div class="form-group">
				                  <label for="exampleInputEmail1">Postcode</label>
				                  <input type='text' class='form-control' name='cmc_poscode' id='cmc_poscode'> 
				                </div>
						
								<div class="form-group">
				                  <label for="exampleInputEmail1">City</label>
				                  <input type='text' class='form-control' name='cmc_ct' id='cmc_ct'> 
				                </div>
						
								<div class="form-group">
				                  <label for="exampleInputEmail1">URL</label>
				                  <input type='text' class='form-control' name='cmc_url' id='cmc_url'> 
				                </div>
						
								<div class="form-group">
				  					<label for="exampleInputEmail1">Comment</label>
				  					<textarea class='form-control' rows='3' name='cmc_comment2' id='cmc_comment2'></textarea>
				                </div>
					
								<div class="form-group">
					            	<button type="submit" class="btn btn-primary btn-block" onclick="submit();">Submit</button>
					            	<button type="submit" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
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
                    url: '<?= base_url() ?>Customer/cmc_form_details',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    beforeSend: function() {
                       
                    },
                    success: function(response){

                    	var cmc_cname = $("#cmc_cname").val(response.customerID);
						var cmc_name = $("#cmc_name").val(response.customer);
						var cmc_street2 = $("#cmc_street2").val(response.street);
						var cmc_poscode = $("#cmc_poscode").val(response.postcode);
						var cmc_ct = $("#cmc_ct").val(response.city);
						var cmc_url = $("#cmc_url").val(response.URL);
						var cmc_comment2 = $("#cmc_comment2").val(response.comment);

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
		var cmc_url = $("#cmc_url").val();
		var cmc_comment2 = $("#cmc_comment2").val();
		var data = 	{
						"cmc_cname" : cmc_cname,
						"cmc_name" : cmc_name,
						"cmc_street2" : cmc_street2,
						"cmc_poscode" : cmc_poscode,
						"cmc_ct" : cmc_ct,
						"cmc_url" : cmc_url,
						"cmc_comment2" : cmc_comment2,
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