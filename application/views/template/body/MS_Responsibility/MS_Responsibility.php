
		
<div class="content-wrapper">
	<section class="content">
	
		<?= lookup_navbar(); ?> 
		<div class="row">
			<div class="col-md-8">
				<?= lookup_navbar_ticket_master(); ?>
			</div>
			<div class="col-md-4"> </div>
		</div>


		<?php $id = $this->uri->segment(3); ?>
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i>>  Responsible </h5>

		<div class="row">
			<div class="col-md-8">
				<div class="row">
			        <?= time_ticket(); ?>
		        </div>
			</div>	
			<div class="col-md-4"></div>
		</div>

		<div class="row">
			<form id="idForm" action="<?=base_url()?>ticket/update_note_responsible_master" method="post" enctype="multipart/form-data">
				<div class="col-md-9">

					<div class="box box-success">
			          <div class="box-header with-border">
			            <h3 class="box-title"> <b>Ticket#<?=$id ?> - <span id="subject"> <?= subject_note_master($id); ?> </span> </b> </h3>
			          </div>
			          <div class="box-body">

				        <input type="hidden" name="id_ticket" value="<?= $id ?>">
				        
						<div class="form-group col-md-6">
		                  <label for="exampleInputEmail1">* Ticket</label>
		                  <input type='text' class='form-control' name='Title' id='Title' value="<?= subject_note_master($id); ?>"> 
		                </div>
				
						<div class="form-group col-md-6">
		                  <label for="exampleInputEmail1">New Responsible</label>
		                  <select class='form-control' name='Ticket_Btn_Responsible_Responsible'>
		                  <?= note_responsible($id) ?>
		                  </select> 
		                </div>
						
						<div class="form-group col-md-6">
			            	<button type="submit" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
			            </div>
						<div class="form-group col-md-6">
			            	<button type="submit" class="btn btn-primary btn-block" onclick="submit();">Submit</button>
			            </div>

					  </div>
					</div>
				</div>
			</form>
			<div class="col-md-3">
	        	<div class="col-md-11"> <?= lookup_widget_master(); ?> </div>
                <div class="col-md-1"> </div>	
	        </div>

		</div>
	</section>
</div>
<script type="text/javascript">
	function submit()
	{
		var Ticket_Btn_Responsible_Ticket = $("#Ticket_Btn_Responsible_Ticket").val();var Ticket_Btn_Responsible_Responsible = $("#Ticket_Btn_Responsible_Responsible").val();
		var data = 	{
						"Ticket_Btn_Responsible_Ticket" : Ticket_Btn_Responsible_Ticket,"Ticket_Btn_Responsible_Responsible" : Ticket_Btn_Responsible_Responsible,
						
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