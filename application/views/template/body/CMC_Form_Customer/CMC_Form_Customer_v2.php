<div class="pageheader hidden-xs">
    <h3>
    	<i class="fa fa-user"></i> 

    	<?php if($this->uri->segment('2')=='CA_EditDetails'){ ?>
		 Customer Administrator 
		<?php } else { ?>
		Customer Information Center 
		<?php } ?>

    </h3>
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

			


				

					<div class="box box-success">
			          <div class="box-header with-border">
			            <h3 class="box-title"> <b>View Customer Administrator</b> </h3>
			          </div>
			          <div class="box-body">

			          				<div class="row">
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">* CustomerID</label>
						                  <input type='text' class='form-control' name='cmc_cname' id='cmc_cname'> 
						                </div>
								
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">* Customer</label>
						                  <input type='text' class='form-control' name='cmc_name' id='cmc_name'> 
						                </div>
								
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">Street</label>
						                  <input type='text' class='form-control' name='cmc_street2' id='cmc_street2'> 
						                </div>
						            
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">Postcode</label>
						                  <input type='text' class='form-control' name='cmc_poscode' id='cmc_poscode'> 
						                </div>
								
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">City</label>
						                  <input type='text' class='form-control' name='cmc_ct' id='cmc_ct'> 
						                </div>

						                <div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">Country</label>
						                  <input type='text' class='form-control' name='cmc_country' id='cmc_country'> 
						                </div>
						            
										<div class="form-group col-md-2">
						                  <label for="exampleInputEmail1">URL</label>
						                  <input type='text' class='form-control' name='cmc_url' id='cmc_url'> 
						                </div>

						                <div class="form-group col-md-2">
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
						  					<textarea class='form-control' rows='5' name='cmc_comment2' id='cmc_comment2'></textarea>
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
						var cmc_country = $("#cmc_country").val(response.country);
						var cmc_url = $("#cmc_url").val(response.URL);
						var cmc_comment2 = $("#cmc_comment2").val(response.comment);
						var cmc_valid = $("#cmc_valid").val(response.valid);
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
</style>