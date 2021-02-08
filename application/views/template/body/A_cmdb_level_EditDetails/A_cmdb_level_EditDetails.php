

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 

		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Level Management </h5>

		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>Admin/A_cmdb_level_viewList"><button class="btn btn-success btn-block"> Go To Overview</button></a>
				</div>
			</div>

			<div class="col-md-7">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Add Level Announcement</b> </h3>
		          </div>
		          <div class="box-body">

		          	<div class="form-group">
	                  <label for="exampleInputEmail1">Level Name</label>
	                  <input class="form-control" id="level_name" name="level_name">
	                </div>

					<div class="form-group">
	                  <label for="exampleInputEmail1">Description</label>
	                  <textarea class="form-control" rows="5" id="comment"></textarea>
	                </div>
					
					<div class="form-group">
		            	<button type="submit" class="btn btn-primary btn-block" onclick="submit();">Submit</button>
		            	<button type="submit" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
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
	
	if(comment==''){
		alert('Cannot be null !');
	} else {

		var data = 	{
						"comment" : comment
						
					}

		$.ajax({
		            url: "<?= base_url() ?>Admin/Add_Announcement",
		            type: "POST",
		            dataType: "html",
		            data: data,
		            beforeSend: function() {

		            },
		            success: function(response){
		            	//alert('Success add main line status');
		            	//location.reload();

		            	var url = "<?= base_url()?>Admin/List_Announcement";
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