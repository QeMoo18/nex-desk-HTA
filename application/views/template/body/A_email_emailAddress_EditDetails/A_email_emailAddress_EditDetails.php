

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> System Email Address Management</h5>

		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>Admin/A_email_emailAddress_viewlist"><button class="btn btn-success btn-block"> Go To Overview</button></a>
				</div>
			</div>

			<div class="col-md-7">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Update : Email Address</b> </h3>
		          </div>
		          <div class="box-body">

		          		<div class="row">
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">*Email</label>
			                  <input type='text' class='form-control' name='mail_email' id='mail_email' onkeyup="check_email();">
			                  <span id="alert_mail_email"></span>  
			                </div>
					
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">*Display Name</label>
			                  <input type='text' class='form-control' name='mail_dname' id='mail_dname'>
			                  <span id="alert_mail_dname"></span>  
			                </div>
					
							<div class="form-group col-md-3">
		      					<label for="exampleInputEmail1">*Queue</label>
		      					<select class='form-control' name='mail_q' id='mail_q'>
		      						<option value=''>< Please Select ></option>
										<?= lookup_queue(); ?>		
		      					</select>
		      					<span id="alert_mail_q"></span> 
			                </div>
					
							<div class="form-group col-md-3">
		      					<label for="exampleInputEmail1">*Validity</label>
		      					<select class='form-control' name='mail_valid' id='mail_valid'>
		      						<option value=''>< Please Select ></option>
		      						<?= lookup_validity(); ?>
		      					</select>
		      					<span id="alert_mail_validity"></span> 
			                </div>
					
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Comment</label>
			                  <input type='text' class='form-control' name='mail_comment' id='mail_comment'> 
			                </div>
								
									
			            </div>

			            <hr>
			            <div class="row">
			            	<div class="form-group col-md-2">
			                   <button type="submit" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
			                </div>
			                <div class="form-group col-md-2">
			                  <button class="btn btn-primary btn-block" onclick="submit();"> Update </button>
			                </div>
			           	</div>
				  </div>
				</div>
			</div>
			
		</div>
	</section>
</div>
<script type="text/javascript">

$(document).ready(function (){
	getData();
});

function getData()
{
	var id = "<?= $this->uri->segment(3)?>";
	var data = 	{
								 'default_id': id,
			                     '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
								
							}

				$.ajax({
				            url: "<?= base_url() ?>Admin/A_email_emailAddress_details",
				            type: "POST",
				            dataType: "json",
				            data: data,
				            beforeSend: function() {

				            },
				            success: function(response){
				            	var email = response.email;
				            	$("#mail_email").val(email);

				            	var name = response.display_name;
				            	$("#mail_dname").val(name);

				            	var queue = response.queue;
				            	$("#mail_q").val(queue);

				            	var validity = response.validity;
				            	$("#mail_valid").val(validity);

				            	var comment = response.comment;
				            	$("#mail_comment").val(comment);
				            }
				    });
}

function submit()
{
	var mail_email = $("#mail_email").val();
	var mail_dname = $("#mail_dname").val();
	var mail_q = $("#mail_q").val();
	var mail_valid = $("#mail_valid").val();
	var mail_comment = $("#mail_comment").val();


	//check to action
		if(mail_email)
		{ 
			$("#alert_mail_email").html('');
		} else {
			$("#alert_mail_email").html('<font color="red"> required field </font>');
		}

		if(mail_dname)
		{ 
			$("#alert_mail_dname").html('');
		} else {
			$("#alert_mail_dname").html('<font color="red"> required field </font>');
		}

		if(mail_q)
		{ 
			$("#alert_mail_q").html('');
		} else {
			$("#alert_mail_q").html('<font color="red"> required field </font>');
		}

		if(mail_valid)
		{ 
			$("#alert_mail_validity").html('');
		} else {
			$("#alert_mail_validity").html('<font color="red"> required field </font>');
		}

		//check to submit
		if((mail_email=='')||(mail_dname=='')||(mail_q=='')||(mail_valid=='')){

		} else {


	
		if(mail_email==''){
			alert('Cannot be null !');
		} else {


			var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
			var valid = emailRegex.test(mail_email);
			if (!valid) {
				//alert("Invalid e-mail address");
				$("#alert_mail_email").html('<i><font color="red"> '+mail_email+' is Invalid e-mail address.</font></i>');
				return false;
			} else {
				var id = "<?= $this->uri->segment(3)?>";
				var data = 	{
								 'default_id':id,
								 'email': mail_email,
			                     'display_name':mail_dname,
			                     'queue' :mail_q,
			                     'validity':mail_valid,
			                     'comment':mail_comment,
			                     '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
								
							}

				$.ajax({
				            url: "<?= base_url() ?>Admin/A_email_emailAddress_update",
				            type: "POST",
				            dataType: "html",
				            data: data,
				            beforeSend: function() {

				            },
				            success: function(response){
				            	//alert('Success add email address');
				            	//location.reload();

				            	var url = "<?= base_url()?>Admin/A_email_emailAddress_viewlist";
		                    	window.location.href=url;
				            }
				    });
			}
		}
}

function cancel()
	{
			location.reload();
	}
}


function check_email(){
	var email = $("#mail_email").val();

	var data = 	{
							 'email': email,
		                     '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
							
						}

			$.ajax({
			            url: "<?= base_url() ?>Admin/check_email_existing",
			            type: "POST",
			            dataType: "html",
			            data: data,
			            beforeSend: function() {

			            },
			            success: function(response){
			            	if(response>0){
			            		$("#alert_mail_email").html('<i><font color="red"> '+email+' is existing in database.</font></i>');
			            		$("#mail_email").val('');
			            	} else {
			            		$("#alert_mail_email").html('');
			            	}
			            }
			    });

}

function cancel(){
	var url = "<?= base_url()?>Admin/A_email_emailAddress_viewlist";
    window.location.href = url;
}
</script>