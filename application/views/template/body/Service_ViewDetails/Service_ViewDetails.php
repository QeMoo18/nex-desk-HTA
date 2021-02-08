
<div class="pageheader hidden-xs">
    <h3><i class="fa fa-list"></i> View Service </h3>
    <div class="breadcrumb-wrapper">
        <span class="label" style="padding-right: 0px;"><i class="fa fa-cog" aria-hidden="true" style="border: 2px solid #f2f7f8;padding-right: 0px;"></i></span>
        <ol class="breadcrumb">
            <li> <a href="<?=base_url()?>Service/Service_ListView"> Service </a> </li>
        </ol>
    </div>
</div>


<div class="content-wrapper">
<section class="content">
	
	<div class="row">

		

		<div class="col-md-12">

					
						<div class="box box-success">
				          <div class="box-header with-border">
				            <h3 class="box-title"> <b>Details Service</b> </h3>
				          </div>
				          	<div class="box-body">

							   <div class="row">
									<div class="form-group col-md-2">
						              <label for="exampleInputEmail1">Service</label>
						              <input type='text' class='form-control' name='Service' id='Service'> 
						            </div>
							
									<div class="form-group col-md-2">
						              <label for="exampleInputEmail1">Sub-service of</label>
						              <input type='text' class='form-control' name='Service_sub' id='Service_sub'> 
						            </div>
							
									<div class="form-group col-md-2">
						              <label for="exampleInputEmail1">Type</label>
						              <input type='text' class='form-control' name='Service_type' id='Service_type'> 
						            </div>
						        
									<div class="form-group col-md-2">
						              <label for="exampleInputEmail1">Criticalty</label>
						              <input type='text' class='form-control' name='Service_criticalty' id='Service_criticalty'> 
						            </div>
							
									<div class="form-group col-md-2">
						              <label for="exampleInputEmail1">Validity</label>
						              <input type='text' class='form-control' name='Service_validity' id='Service_validity'> 
						            </div>
								

						            <div class="form-group col-md-12">
											<label for="exampleInputEmail1">Comment</label>
											<textarea class='form-control' rows='5' name='Service_comment' id='Service_comment'></textarea>
						            </div>
						        </div>
							</div>
			</div>
		</div>
		
	</div>
</section>
</div>

<input type="hidden" name="servicesid" id="servicesid" value="<?= $this->uri->segment('3'); ?>">

<script type="text/javascript">

	$(document).ready(function (){
		details();
	
	});

	function details()
	{
		var servicesid= $("#servicesid").val();

		var data =  {
		                    'servicesid':servicesid,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		            }

        $.ajax({
                    url: '<?= base_url() ?>Admin/sm_details',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    beforeSend: function() {
                       
                    },
                    success: function(response){

						var Service = $("#Service").val(response.service);
						var Service_sub = $("#Service_sub").val(response.sub_service);
						var Service_type = $("#Service_type").val(response.service_type);
						var Service_criticalty = $("#Service_criticalty").val(response.criticalty);
						var Service_validity = $("#Service_validity").val(response.validity);
						var Service_comment = $("#Service_comment").val(response.comment);
                    }
              });
	}


	function submit()
	{
		var Service = $("#Service").val();
		var Service_sub = $("#Service_sub").val();
		var Service_type = $("#Service_type").val();
		var Service_criticalty = $("#Service_criticalty").val();
		var Service_validity = $("#Service_validity").val();
		var Service_comment = $("#Service_comment").val();
		var data = 	{
						"Service" : Service,
						"Service_sub" : Service_sub,
						"Service_type" : Service_type,
						"Service_criticalty" : Service_criticalty,
						"Service_validity" : Service_validity,
						"Service_comment" : Service_comment,
						
					}

		$.ajax({
		            url: "<?= base_url() ?>Service/namafucntion",
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