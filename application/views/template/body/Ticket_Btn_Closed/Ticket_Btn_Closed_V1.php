<script type="text/javascript" src="<?=base_url()?>asset_admin/bower_components/ckeditor/ckeditor.js"></script>
		
<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<div class="row">
			<div class="col-md-8">
				<?= lookup_navbar_ticket(); ?>
			</div>
			<div class="col-md-4">
			</div>
		</div>

		<?php $id = $this->uri->segment(3); ?>

		<h5> <i class="fa fa-angle-double-right" aria-hidden="true"></i>   Closed </h5>

		<div class="row">
			<div class="col-md-8">
				<div class="row">
			        <?= time_ticket(); ?>
		        </div>
			</div>	
			<div class="col-md-4"></div>
		</div>

		<div class="row">	

			<form id="idForm" action="<?=base_url()?>ticket/ticket_closed" method="post" enctype="multipart/form-data">
				<div class="col-md-9">

					<div class="box box-success">
			          <div class="box-header with-border">
			            <?php $id = $this->uri->segment(3); ?>

						<h3 class="box-title"> <b>Ticket#<?=$id ?> - <span id="subject"> 
				            <?= subject_note($id); ?>
				            </span> </b> </h3>
			          </div>
			          <div class="box-body">

			          	<input type="hidden" name="id_ticket" value="<?= $id ?>">

						<div class="col-md-8">
			                <div class="form-group col-md-6">
			  					<label for="exampleInputEmail1">*Responsible</label>
			  					<!-- <select class='form-control' name='Ticket_Closed_Responsible' id='Ticket_Closed_Responsible' required="required">
			  						<option value=''>< Please Select ></option>
			          				<?= lookup_agent(); ?>	
			          			</select> -->
			          			<?php $id = $this->uri->segment('3') ?>
			          			<input type="text" name='Ticket_Closed_Responsible2' id='Ticket_Closed_Responsible2' value="<?= pull_data_Responsibilty($id) ?>" class="form-control" disabled="disabled">
			          			<input type="hidden" name='Ticket_Closed_Responsible' id='Ticket_Closed_Responsible' value="<?= pull_data_Responsibilty($id) ?>">
			  					<span id="alert_tp_r"></span>
			                </div>
					
							<div class="form-group col-md-6" id="p_ref_div">
			                  <label for="exampleInputEmail1">Provider Reference</label>
			                  <input type='text' class='form-control' name='Ticket_Closed_TT_No2' id='Ticket_Closed_TT_No2' value="<?=  pull_data_provider_ref($id) ?>" disabled="disabled"> 
			                  <input type='hidden' class='form-control' name='Ticket_Closed_TT_No' id='Ticket_Closed_TT_No' value="<?=  pull_data_provider_ref($id) ?>"> 
			                </div>
					
							<div class="form-group col-md-6" style="display: none">
			                  <label for="exampleInputEmail1">VTT No</label>
			                  <input type='text' class='form-control' name='Ticket_Closed_VTT_No' id='Ticket_Closed_VTT_No'> 
			                </div>
							
			                <div class="form-group col-md-6">
			                  <label for="exampleInputEmail1">Problem Description</label> 
			                  <select class="form-control" name="Ticket_Closed_Problem" id="Ticket_Closed_Problem">
			                  	<option value="">-- Please Select --</option>
			                  	<?= pull_data_ProblemDescription() ?>
			                  </select> 
			                </div>

							<div class="form-group col-md-6">
			                  <label for="exampleInputEmail1">Cause Of Fault</label> 
			                  <select class="form-control" name="Ticket_Closed_Fault" id="Ticket_Closed_Fault">
			                  	<option value="">-- Please Select --</option>
			                  	<?= pull_data_CauseOfFault() ?>
			                  </select> 
			                </div>

			                <div class="form-group col-md-6" id="f_portion_div">
			                  <label for="exampleInputEmail1">Fault Category Portion</label>
			                  <select class="form-control" name="Ticket_Closed_Portion" id="Ticket_Closed_Portion">
			                  	<option value="">-- Please Select --</option>
			                  	<?= pull_data_FaultCategoryPortion() ?>
			                  </select> 
			                </div>

			                <div class="form-group col-md-6">
			                  <label for="exampleInputEmail1">Fault Category Type</label>
			                  <select class="form-control" name="Ticket_Closed_Fault_Type" id="Ticket_Closed_Fault_Type">
			                  	<option value="">-- Please Select --</option>
			                  	<?= pull_data_FaultCategoryType() ?>
			                  </select> 
			                </div>

					
							<div class="form-group col-md-6">
			                  <label for="exampleInputEmail1">Action Taken</label>
			                  <input type='text' class='form-control' name='Ticket_Closed_Action_Taken' id='Ticket_Closed_Action_Taken'> 
			                </div>
					
							<div class="form-group col-md-6">
			                  <label for="exampleInputEmail1">* Closed Type</label>
			                  <select class="form-control" name="Ticket_Closed_Type" id="Ticket_Closed_Type" required="required">
			                  	<option value="">-- Please Select --</option>
			                  	<?= pull_data_ticket_state() ?>
			                  </select>
			                </div>
					
							<div class="form-group col-md-12">
			  					<label for="exampleInputEmail1">* Remark</label>
			  					<textarea class="ckeditor" name="html_link_content" id="ckedtor" required="required"></textarea>
			                </div>

			                <div class="form-group col-md-12" id="v_outagte_div">
			                  <label for="exampleInputEmail1">Validation Outage</label>
			                  <select class="form-control" name="Ticket_Validation_Outage" id="Ticket_Validation_Outage">
			                  	<option value="">-- Please Select --</option>
			                  	<option value="Valid"> Valid </option>
			                  	<option value="Invalid"> Invalid </option>
			                  </select>
			                </div>


			                <input type="hidden" name="total_time_closed" id="total_time_closed" value="">
			                <input type="hidden" name="pending_time_closed" id="pending_time_closed" value="">
			                <input type="hidden" name="working_time_closed" id="working_time_closed" value="">

			                <br><br>
			                <div class="form-group col-md-6">
				            	<button type="button" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
				            </div>
							<div class="form-group col-md-6">
				            	<button type="submit" class="btn btn-primary btn-block" onclick="submit();">Submit</button>
				            </div>

				            
				        </div>

				        <div class="col-md-4">
							<?php widget_ticket(); ?> 	
						</div>


					  </div>
					</div>
				</div>
			</form>

			<div class="col-md-3">
	        	<div class="col-md-11"><?= lookup_widget(); ?> </div>
          		<div class="col-md-1"> </div>
	        </div>
		</div>
	</section>
</div>
<script type="text/javascript">
	function submit()
	{
		var Ticket_Closed_Responsible = $("#Ticket_Closed_Responsible").val();var Ticket_Closed_TT_No = $("#Ticket_Closed_TT_No").val();var Ticket_Closed_VTT_No = $("#Ticket_Closed_VTT_No").val();var Ticket_Closed_Fault = $("#Ticket_Closed_Fault").val();var Ticket_Closed_Action_Taken = $("#Ticket_Closed_Action_Taken").val();var Ticket_Closed_Type = $("#Ticket_Closed_Type").val();var Ticket_Closed_Text = $("#Ticket_Closed_Text").val();
		var data = 	{
						"Ticket_Closed_Responsible" : Ticket_Closed_Responsible,"Ticket_Closed_TT_No" : Ticket_Closed_TT_No,"Ticket_Closed_VTT_No" : Ticket_Closed_VTT_No,"Ticket_Closed_Fault" : Ticket_Closed_Fault,"Ticket_Closed_Action_Taken" : Ticket_Closed_Action_Taken,"Ticket_Closed_Type" : Ticket_Closed_Type,"Ticket_Closed_Text" : Ticket_Closed_Text,
						
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

 	function pull_state()
	{
		var id = 'closed';
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
		            	$("#Ticket_Closed_Type").html(response);
		            }
		    });

	}



	function pull_environment()
	{
		var id = '<?= $this->uri->segment(3); ?>';
		var data = 	{
						"id" : id,
						
					}

		$.ajax({
		            url: "<?= base_url() ?>Ticket/pull_environment",
		            type: "POST",
		            dataType: "html",
		            data: data,
		            beforeSend: function() {

		            },
		            success: function(response){
		            	if(response=='hospital'){

		            		$("#p_ref_div").hide();
		            		$("#f_portion_div").hide();
		            		$("#v_outagte_div").hide();


		            	} else {

		            		$("#p_ref_div").show();
		            		$("#f_portion_div").show();
		            		$("#v_outagte_div").show();

		            	}
		            }
		    });

	}


	$(document).ready(function (){
		pull_state();
		pull_environment();
	});


	$(document).ready(function (){
 		check_status();
 	});

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


