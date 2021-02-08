
<script type="text/javascript" src="<?=base_url()?>asset_admin/bower_components/ckeditor/ckeditor.js"></script>

<div class="content-wrapper">
	<section class="content">

		<?= lookup_navbar(); ?> 
		<div class="row">
			<div class="col-md-8 hidden-xs">
				<?= lookup_navbar_ticket_master(); ?>
			</div>
			<div class="col-md-2"> </div>
		</div>

		<?php $id = $this->uri->segment(3); ?>

		<h3> <i class="fa fa-check-circle-o" aria-hidden="true"></i> Pending /  Resume  </h3>

		<div class="row">
			<div class="col-md-8">
				<div class="row">
			        <?= time_ticket(); ?>
		        </div>
			</div>	
			<div class="col-md-4"></div>
		</div>

		<div class="row">
			<div class="col-md-9">

				<form id="idForm" action="<?=base_url()?>ticket/add_note_pendingresume_master" method="post" enctype="multipart/form-data">

					<div class="box box-success">

						  <input type="hidden" name="id_ticket" value="<?= $id ?>">

				          <div class="box-header with-border">
				            <h3 class="box-title"> <b>Ticket#<?=$id ?> - <span id="subject"> <?= subject_note_master($id); ?> </span> </b> </h3>
				          </div>

				          	<div class="box-body">
					          	<div class="well col-md-8">
						          	
						          	<div class="form-group">
					                  <label for="exampleInputEmail1">Status</label>
					                  <input type='text' class='form-control' name='type_ticket2' id='type_ticket2' disabled="disabled"> 
					                </div>

					                <input type="hidden" name="type_ticket" id="type_ticket" value="pending">

					          		<div class="form-group">
					                  <label for="exampleInputEmail1">*Subject/ Title</label>
					                  <input type='text' class='form-control' name='tp_title' id='tp_title' required="required" value="<?= subject_note($id); ?>">
					                  <span id="alert_tp_title"></span>  
					                </div>

									<div class="RichTextField">
					                  <label for="exampleInputEmail1">Text</label>
					                  <!-- <textarea rows="4" class='form-control' name='tp_text' id='tp_text'> </textarea>  -->

					                  <textarea class="ckeditor" name="html_link_content" id="ckedtor"></textarea>
					                </div>

					                <br>

					                <div class="form-group">
					                  <label for="exampleInputEmail1">Attachment</label>
					                  <input type='file' class='form-control' name='userfile' id='userfile'> 
					                </div>

					                <br>	

					                <div class="form-group">
											<label for="exampleInputEmail1">Next Ticket State</label>
											<select class='form-control' name='tp_state' id='tp_state' required="required">
												<?= pull_data_state_note($id)?>

											</select>
											<span id="alert_tp_r"></span>
									</div>

					                <br>

					                <div class="form-group">
					                  <label for="exampleInputEmail1">Pending Date</label>
					                  <input type='text' class='datepicker form-control' name='tp_calendar' id='tp_calendar' value="<?= pull_data_pendingdate_note($id)?>"> 
					                </div>

					                <br>



									<div class="form-group">
						            	<button type="submit" class="btn btn-primary btn-block">Submit</button>
						            	<button type="button" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
						            </div>
								  </div>
								
								<div class="col-md-4">
									<?php widget_ticket_master(); ?> 	
								</div>
							</div>
					</div>
				</form>


			</div>
			<div class="col-md-3">
				<?= lookup_widget_master()?> 
			</div>
		</div>
	</section>
</div>
<script type="text/javascript">

	$(document).ready(function (){
		var type = 'Pending';
		var id = "<?= $this->uri->segment('3') ?>";
		;


		var data = 	{
						"id_ticket" : id,
					
					}

		var x = '';

		$.ajax({
		            url: "<?= base_url() ?>Ticket/status_pendingresume_master",
		            type: "POST",
		            dataType: "html",
		            data: data,
		            beforeSend: function() {

		            },
		            success: function(response){
		            	if(response)
		            	{
		            		response = response.replace(/^\s+|\s+$/gm,'');
		            		//alert(response);

		            		 
		            		switch (response) 
		            		{
								    case 'pending':
								        x = "Resume";
								        y = "resume";
								        break;
								    case 'open':
								    	x = "Pending";
								        y = "pending";
								        break;
								    default : 
								    	x = "Pending";
								        y = "pending";
								        break;
									            		
							} 


		            		// if(response==='note')
		            		// {
		            		// 	x = 'Pending';
		            		// 	response = 'pending';
		            		// }

		            		// if(response==='first_level')
		            		// {
		            		// 	x = 'Pending';
		            		// 	response = 'pending';
		            		// }

		            		// if(response==='')
		            		// {
		            		// 	x = 'Pending';
		            		// 	response = 'pending';
		            		// }

		            		// if(response==='pending')
		            		// {
		            		// 	x = 'Resume';
		            		// 	response = 'resume';
		            		// 	alert('a');
		            		// } 

		            		// if(response==='resume')
		            		// {
		            		// 	x = 'Pending';
		            		// 	response = 'pending';
		            		// }


		            		$("#type_ticket2").val(x);
		            		$("#type_ticket").val(y);

		            		pull_state();
		            	} 

		            	//alert(response);
		            }
		    });

	});

	function submit()
	{
	var ticket_first_level = $("#ticket_first_level").val();
	var data = 	{
					"ticket_first_level" : ticket_first_level,
					
				}

	$.ajax({
	            url: "<?= base_url() ?>Ticket/namafucntion",
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


<script type="text/javascript">

	// $(document).ready(function (){
	// 	pull_state();
	// });

	function pull_state()
	{
		var id = $("#type_ticket2").val();
		//alert(id);
		if(id=='Pending'){
			id='pending';
		} else {
			id='open';
		}
		var data = 	{
						"id" : id,
						
					}

		$.ajax({
		            url: "<?= base_url() ?>Ticket/pull_state_parameter",
		            type: "POST",
		            dataType: "html",
		            data: data,
		            beforeSend: function() {

		            },
		            success: function(response){
		            	$("#tp_state").html(response);
		            }
		    });

	}


	function submit()
	{
		var ticket_first_level = $("#ticket_first_level").val();
		var data = 	{
						"ticket_first_level" : ticket_first_level,
						
					}

		$.ajax({
		            url: "<?= base_url() ?>Ticket/namafucntion",
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