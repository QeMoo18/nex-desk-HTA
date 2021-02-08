
		
<div class="content-wrapper">
	<section class="content">
		<h3> Ticket Setting </h3>
		
		<?= lookup_navbar(); ?> 
		<div class="row">
			<div class="col-md-8">
				<?= lookup_navbar_ticket(); ?>
			</div>
			<div class="col-md-4"> </div>
		</div>

		<?php $id = $this->uri->segment(3); ?>

		<h5> <i class="fa fa-angle-double-right" aria-hidden="true"></i>  Button Note </h5>

		<div class="row">
			<div class="col-md-8">
				<div class="row">
			        <?= time_ticket(); ?>
		        </div>
			</div>	
			<div class="col-md-4"></div>
		</div>

		<div class="row">
			<form id="idForm" action="<?=base_url()?>ticket/update_note_owner" method="post" enctype="multipart/form-data">
				<div class="col-md-9">

					<div class="box box-success">
			          <div class="box-header with-border">
			            <h3 class="box-title"> <b>Ticket#<?=$id ?> - <span id="subject"> <?= subject_note($id); ?> </span> </b> </h3>
			          </div>
			          <div class="box-body">

			          	<input type="hidden" name="id_ticket" value="<?= $id ?>">

			          	<div class="row">
							<div class="form-group col-md-8">
			                  <label for="exampleInputEmail1">New_Owner</label>
			                  <select class="form-control" name="owner">
			                  	<?= note_owner($id)?>
			                  </select> 
			                </div>
							<div class="col-md-4"> </div>
						</div>
						
						<div class="row">
				            <div class="col-md-4">
				            	<button type="submit" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
				            </div>
				            <div class="col-md-4">
				            	<button type="submit" class="btn btn-primary btn-block" onclick="submit();">Submit</button>
				            </div>
				            <div class="col-md-4"> </div>
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
		var Ticket_New_Owner = $("#Ticket_New_Owner").val();
		var data = 	{
						"Ticket_New_Owner" : Ticket_New_Owner,
						
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