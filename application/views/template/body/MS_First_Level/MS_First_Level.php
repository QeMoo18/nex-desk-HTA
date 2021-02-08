
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

		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i>  First Level </h5>

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

				<form id="idForm" action="<?=base_url()?>ticket/add_note_firstlevel_master" method="post" enctype="multipart/form-data">
					<div class="box box-success">

						  <input type="hidden" name="id_ticket" value="<?= $id ?>">

				          <div class="box-header with-border">
				            <h3 class="box-title"> <b>Ticket#<?=$id ?> - <span id="subject"> 
				            <?= subject_note_master($id); ?>
				            </span> </b> </h3>
				          </div>

				          	<div class="box-body">
					          	<div class="well col-md-8">
						          	
					          		<input type="hidden" name="id_ticket" value="<?= $id ?>">

									<div class="RichTextField col-md-12">
					                  <label for="exampleInputEmail1">Text</label>
					                  <!-- <textarea rows="4" class='form-control' name='tp_text' id='tp_text'> </textarea>  -->

					                  <textarea class="ckeditor" name="html_link_content" id="ckedtor"></textarea>
					                  <br><br>
					                </div>

					                <br>


					                <div class="form-group col-md-6">
						            	<button type="submit" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
						            </div>

									<div class="form-group col-md-6">
						            	<button type="submit" class="btn btn-primary btn-block" onclick="submit();">Submit</button>
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
				<div class="col-md-11"> <?= lookup_widget_master(); ?> </div>
                <div class="col-md-1"> </div>
			</div>
		</div>
	</section>
</div>
<script type="text/javascript">
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

	$(document).ready(function (){
		var xoxo = "<?= $this->uri->segment('4')?>";
		if(xoxo==='fl'){
			//alert('You need created final level first !');
			$("#content_text").html('You need created first level !');
			$("#myModal2").modal('show');
		}

		if(xoxo==='lf'){
			//alert('Final level already !');
			$("#content_text").html('first level already !');
			$("#myModal2").modal('show');
		}
	});		
</script>

<style type="text/css">
	.panel-heading
	{
	    border-top-left-radius: inherit; 
	    border-top-right-radius: inherit;
	}
</style>

<!-- Modal -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content panel-warning">
      <div class="modal-header panel-heading">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">System Alert ! </h4>
      </div>
      <div class="modal-body">
        <p id="content_text"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>