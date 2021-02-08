

<div class="content-wrapper">
<section class="content">

	<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> SLA Type Management </h5>
	<div class="row">

		<div class="col-md-2">
			<div class="form-group">
			<a href="<?=base_url()?>Admin/SLA_Type_ViewList"><button class="btn btn-success btn-block"> Go To Overview</button></a>
			</div>
		</div>

		<div class="col-md-10">

			<div class="box box-success">
	          <div class="box-header with-border">
	            <h3 class="box-title"> <b>Edit SLA Type</b> </h3>
	          </div>
	          <div class="box-body">

	          	<div class="row">
					<div class="form-group col-md-4">
		              <label for="exampleInputEmail1">Name</label>
		              <input type='text' class='form-control' name='sla_type_name' id='sla_type_name' onchange="check_sla_type_name()"> 
		            </div>
			
					<div class="form-group col-md-4">
							<label for="exampleInputEmail1">Validity</label>
								<select class='form-control' name='sla_type_validity' id='sla_type_validity'>
								<option value=''>< Please Select ></option>
								<?= lookup_validity()?>
							</select>
		            </div>
		        
					<div class="form-group col-md-2">
						<br>
		            	<button type="submit" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
		            </div>
		            <div class="form-group col-md-2">
		            	<br>
		            	<button type="submit" class="btn btn-primary btn-block" onclick="submit();">Submit</button>
		            </div>
				</div>
				

			  </div>
			</div>
		</div>
	</div>
</section>
</div>

<input type="hidden" name="slatypeid" id="slatypeid" value="<?= $this->uri->segment('3'); ?>">

<script type="text/javascript">

	$(document).ready(function (){
		details();
	
	});

	function check_sla_type_name()
	{
		var sla_type_name = $("#sla_type_name").val();
		var data =  {
		                    'sla_type_name':sla_type_name,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		            }

        $.ajax({
                    url: '<?= base_url() ?>Admin/check_sla_type_name',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    beforeSend: function() {
                       
                    },
                    success: function(response){

						if(response>0){
							alert('Duplicate name in database !');
							var sla_type_name = $("#sla_type_name").val('');
						} else {

						}
                    }
              });

	}

	function details()
	{
		var slatypeid= $("#slatypeid").val();

		var data =  {
		                    'slatypeid':slatypeid,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		            }

        $.ajax({
                    url: '<?= base_url() ?>Admin/sla_type_details',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    beforeSend: function() {
                       
                    },
                    success: function(response){

						var sla_type_name = $("#sla_type_name").val(response.sla_type);
						var sla_type_validity = $("#sla_type_validity").val(response.validity);
                    }
              });
	}

function submit()
{
	var sla_type_name = $("#sla_type_name").val();
	var sla_type_validity = $("#sla_type_validity").val();
	var slatypeid= $("#slatypeid").val();

	var data = 	{
					"sla_type_name" : sla_type_name,
					"sla_type_validity" : sla_type_validity,
					"slatypeid":slatypeid,
					'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
				}

	$.ajax({
	        url: "<?= base_url() ?>Admin/sla_update_type",
	        type: "POST",
	        dataType: "html",
	        data: data,
	        beforeSend: function() {

	        },
	        success: function(response){
	        	//alert('Success update sla type ');
	        	//location.reload();

	        	var url = "<?= base_url()?>Admin/SLA_Type_ViewList";
	            window.location.href=url;
	        }
	});

}

function cancel()
{
	location.reload();
}
</script>