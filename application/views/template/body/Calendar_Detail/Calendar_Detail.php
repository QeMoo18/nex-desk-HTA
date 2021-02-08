

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Calendar Management </h5>
		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>Dashboard/calendar"><button class="btn btn-success btn-block"> Go To Calendar</button></a>
				</div>
			</div>

			<div class="col-md-7">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Detail Calendar</b> </h3>
		          </div>
		          <div class="box-body">

		          	<div class="form-group">
	                  <label for="exampleInputEmail1">Note</label>
	                  <textarea class="form-control" rows="5" id="comment" disabled="disabled"></textarea>
	                </div>

		          	<div class="form-group">
	                  <label for="exampleInputEmail1">Start Calendar</label>
	                  <input type='text' class='form-control datetime' name='start_calendar' id='start_calendar' disabled="disabled">
	                </div>

	                <div class="form-group">
	                  <label for="exampleInputEmail1">End Calendar</label>
	                  <input type='text' class='form-control datetime' name='end_calendar' id='end_calendar' disabled="disabled">
	                </div>


				  </div>
				</div>
			</div>
			<div class="col-md-3 hidden-xs">
				<?= lookup_widget(); ?>		        
			</div>
		</div>
	</section>
</div>
<script type="text/javascript">

$(document).ready(function (){
	detail();
});

function detail()
{
	var id= "<?= $this->uri->segment(3)?>";

	var data =  {
	                    'id':id,
	                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
	            }

    $.ajax({
                url: '<?= base_url() ?>Dashboard/detail_calendar',
                type: 'POST',
                dataType: 'json',
                data: data,
                beforeSend: function() {
                   
                },
                success: function(response){

                	$("#comment").val(response.description);
                	$("#start_calendar").val(response.start_calendar);
                	$("#end_calendar").val(response.end_calendar);

                }
         });
}

function cancel()
{
	location.reload();
}
</script>