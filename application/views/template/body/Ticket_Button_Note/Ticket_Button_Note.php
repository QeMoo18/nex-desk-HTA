
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

		<h5> <i class="fa fa-angle-double-right" aria-hidden="true"></i>  Note </h5>

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

				<form id="idForm" action="<?=base_url()?>ticket/add_note_btnnote" method="post" enctype="multipart/form-data">
					<div class="box box-success">

						  <input type="hidden" name="id_ticket" value="<?= $id ?>">
				          <div class="box-header with-border">
				            <h3 class="box-title"> <b>Ticket#<?=$id ?> - <span id="subject"> <?= subject_note($id); ?> </span> </b> </h3>
				          </div>

				          	<div class="box-body">
					          	<div class="well col-md-8">
						          	

						          	<div class="form-group col-md-6">
											<label for="exampleInputEmail1">Responsible</label>
											<select class='form-control' name='tp_r' id='tp_r'>
												
												<?= pull_data_responsible_note($id); ?>	
											</select>
											<span id="alert_tp_r"></span>
									</div>

									<div class="form-group col-md-6">
											<label for="exampleInputEmail1">* State</label>
											<select class='form-control' name='tp_state' id='tp_state' required="required">
												<option value="">--Select State --</option>
												<?= pull_data_state_note($id)?>

											</select>
											<span id="alert_tp_r"></span>
									</div>


									<div class="form-group col-md-6" style="display: none">
					                  <label for="exampleInputEmail1">Pending Date</label>
					                  <input type='Date' class='form-control' name='tp_calendar' id='tp_calendar' value="<?= pull_data_pendingdate_note($id)?>" > 
					                </div>

									<br>
					          		

									<div class="RichTextField col-md-12">
					                  <label for="exampleInputEmail1">Text</label>
					                  <!-- <textarea rows="4" class='form-control' name='tp_text' id='tp_text'> </textarea>  -->

					                  <textarea class="ckeditor" name="html_link_content" id="ckedtor"></textarea>
					                  <br><br>
					                </div>

					                	
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
		pull_state();
		check_status();
	});

	function pull_state()
	{
		var id = "<?= $this->uri->segment(3)?>";
		var data = 	{
						"id" : id,
						
					}

		$.ajax({
		            url: "<?= base_url() ?>Ticket/pull_state",
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