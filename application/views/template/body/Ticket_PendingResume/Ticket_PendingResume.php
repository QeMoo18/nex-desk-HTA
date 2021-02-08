
<script type="text/javascript" src="<?=base_url()?>asset_admin/bower_components/ckeditor/ckeditor.js"></script>

<div class="content-wrapper">
	<section class="content">

		<?= lookup_navbar(); ?> 
		<div class="row">
			<div class="col-md-8 hidden-xs">
				<?= lookup_navbar_ticket(); ?>
			</div>
			<div class="col-md-2"> </div>
		</div>

		<?php $id = $this->uri->segment(3); ?>

		<h5> <i class="fa fa-angle-double-right" aria-hidden="true"></i> Pending /  Resume  </h5>

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

				<form id="idForm" action="<?=base_url()?>ticket/add_note_pendingresume" method="post" enctype="multipart/form-data">

					<div class="box box-success">

						  <input type="hidden" name="id_ticket" value="<?= $id ?>">

				          <div class="box-header with-border">
				            <h3 class="box-title"> <b>Ticket#<?=$id ?> - <span id="subject"> <?= subject_note($id); ?> </span> </b> </h3>
				          </div>

				          	<div class="box-body">
					          	<div class="well col-md-8">
						          	
						          	<div class="form-group col-md-6">
					                  <label for="exampleInputEmail1">Status</label>
					                  <input type='text' class='form-control' name='type_ticket2' id='type_ticket2' disabled="disabled"> 
					                </div>

					                <input type="hidden" name="type_ticket" id="type_ticket" value="pending">

					          		<div class="form-group col-md-6">
					                  <label for="exampleInputEmail1">*Subject/ Title</label>
					                  <input type='text' class='form-control' name='tp_title' id='tp_title' required="required" value="<?= subject_note($id); ?>">
					                  <span id="alert_tp_title"></span>  
					                </div>

									<div class="RichTextField col-md-12">
					                  <label for="exampleInputEmail1">Text</label>
					                  <!-- <textarea rows="4" class='form-control' name='tp_text' id='tp_text'> </textarea>  -->

					                  <textarea class="ckeditor" name="html_link_content" id="ckedtor"></textarea>
					                  <br>
					                </div>

					                <br>

					                <div class="form-group col-md-6">
					                  <label for="exampleInputEmail1">Attachment</label>
					                  <input type='file' class='form-control' name='userfile' id='userfile'> 
					                </div>

					                <br>	

					                <div class="form-group col-md-6">
											<label for="exampleInputEmail1">* State</label>
											<select class='form-control' name='tp_state' id='tp_state' required="required">
												<?= pull_data_state_note($id)?>

											</select>
											<span id="alert_tp_r"></span>
									</div>

					                <br>

					                <div class="form-group col-md-6" style="display: none">
					                  <label for="exampleInputEmail1">Pending Date</label>
					                  <input type='Date' class='form-control' name='tp_calendar' id='tp_calendar' value="<?= pull_data_pendingdate_note($id)?>"> 
					                </div>

					                <br>




									<div class="form-group col-md-6">
										<button type="button" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
									</div>
									<div class="form-group col-md-6">
					            		<button type="submit" class="btn btn-primary btn-block">Submit</button>
									</div>

						            	
								  </div>
								
								<div class="col-md-4">
									<?php widget_ticket(); ?> 	
								</div>
							</div>
					</div>
				</form>


			</div>
			<div class="col-md-3">
					<div class="col-md-11"><?= lookup_widget(); ?> </div>
          			<div class="col-md-1"> </div>
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
		            url: "<?= base_url() ?>Ticket/status_pendingresume",
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

		            		$("#type_ticket2").val(x);
		            		$("#type_ticket").val(y);

		            		pull_state(y);

		            		//alert(x);
		            	} 

		            	//alert(response);
		            }
		    });

	});

	function cancel()
	{
		location.reload();
	}
</script>


<script type="text/javascript">

	$(document).ready(function (){
		check_status();
	});

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




	function cancel()
	{
		location.reload();
	}


	function check_status()
	{
		var status_lock = "<?= status_lock_ticket($this->uri->segment(3))?>";
		if(status_lock=='0'){

		} else {
			//$(".btn").remove();

			var lock_by = "<?= lock_ticket_by($this->uri->segment(3))?>";
			var first_name = "<?= $this->session->userdata('first_name')?>";
			
			if(lock_by==first_name){
				
			} else {
				$(".btn").remove();
			}

		}
	}
</script>