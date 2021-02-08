

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Calendar Management </h5>
		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>Admin/List_Calendar"><button class="btn btn-success btn-block"> Go To Overview</button></a>
				</div>
			</div>

			<div class="col-md-7">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3> <b>Add New Calendar</b> </h3>
		          </div>
		          <div class="box-body">

		          	<div class="row">
			          	<div class="form-group col-md-12">
		                  <label for="exampleInputEmail1">Note</label>
		                  <textarea class="form-control" rows="5" id="comment"></textarea>
		                </div>

			          	<div class="form-group col-md-6">
		                  <label for="exampleInputEmail1">Start Calendar</label>
		                  <input type='text' class='form-control datetime' name='start_calendar' id='start_calendar'>
		                </div>

		                <div class="form-group col-md-6">
		                  <label for="exampleInputEmail1">End Calendar</label>
		                  <input type='text' class='form-control datetime' name='end_calendar' id='end_calendar'>
		                </div>
		            </div>
					<hr>
					<div class="row">
						<div class="form-group col-md-2">
			            	<button type="submit" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
			            </div>

			            <div class="form-group col-md-2">
			            	<button type="submit" class="btn btn-primary btn-block" onclick="submit();">Submit</button>
			            </div>
			        </div>

				  </div>
				</div>
			</div>
		</div>
	</section>
</div>
<script type="text/javascript">
function submit()
{
	var comment = $("#comment").val();
	var start_calendar = $("#start_calendar").val();
	var end_calendar = $("#end_calendar").val();
	
	if(comment==''){
		alert('Cannot be null !');
	} else {

		var data = 	{
						"comment" : comment,
						"start_calendar":start_calendar,
						"end_calendar":end_calendar
						
					}

		$.ajax({
		            url: "<?= base_url() ?>Admin/Add_Calendar",
		            type: "POST",
		            dataType: "html",
		            data: data,
		            beforeSend: function() {

		            },
		            success: function(response){
		            	//alert('Success add main line status');
		            	//location.reload();

		            	var url = "<?= base_url()?>Admin/List_Calendar";
	                    window.location.href=url;
		            }
		    });
	}
}

function cancel()
{
	location.reload();
}
</script>