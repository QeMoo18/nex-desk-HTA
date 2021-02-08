

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?>
		<h3> Net Send Management</h3>
		<div class="row">
			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>Admin/SendNoticeView"><button class="btn btn-success btn-block"> Go To Overview</button></a>
				</div>
			</div>
			<div class="col-md-7">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Send Notice</b> </h3>
		          </div>
		          <div class="box-body">

							<div class="form-group">
			                  <label for="exampleInputEmail1">Title</label>
			                  <input type='text' class='form-control' name='Title' id="title"> 
			                </div>
							
			                <div class="form-group">
              					<label for="exampleInputEmail1">Note</label>
              					<textarea class='form-control' rows='20' name='Note2' id='note2'></textarea>
			                </div>


							<div class="form-group" style="display: none">
              					<label for="exampleInputEmail1">Note</label>
              					<textarea class='form-control' rows='3' name='Note' id='note'></textarea>
			                </div>


				            <div class="form-group">
					            	<button type="submit" class="btn btn-primary btn-block" onclick="submit();">Submit</button>
					            	<button type="button" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
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

	function addNewLine_NPN()
	{
	  var text = document.getElementById('note2').value;
	  text = text.replace(/ /g, "&nbsp;");
	  text = text.replace(/\n/g,"<br>");
	  $("#note").val(text);
	  return false;
	}


	function submit()
	{
		addNewLine_NPN();
		
		var title = $("#title").val();
		var note = $("#note").val();

		if(title==''){
 
		} else {

			var data = 
			                {   'title':title,
			                	'note':note,
			                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			                }

	                    
	            $.ajax({
	                    url: '<?= base_url() ?>Admin/SendNotice_Add',
	                    type: 'POST',
	                    dataType: 'html',
	                    data: data,
	                    beforeSend: function() {

	                    },
	                    success: function(response){
	                    	alert("Success Add Service !");
	                    	window.location.href="<?=base_url()?>Admin/SendNoticeView";

	                    }
	            });

		}
	}

	function cancel()
 	{
 		var url = "<?= base_url()?>Admin/SendNotice";
	    window.location.href=url;
 	}
</script>
