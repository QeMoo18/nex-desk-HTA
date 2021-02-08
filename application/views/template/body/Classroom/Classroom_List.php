<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>List Topic</b> </h3>
		          </div>
		          <div class="box-body">
		          		<div class="row">
		          			<div class="col-md-8"></div>
			          		<div class="col-md-4">
			          			<select class="form-control" name="lookup_list" id="lookup_list">
			          				<option value="">< Select List ></option>
			          				<?= lookup_topic(); ?>
			          			</select>
			          		</div>
			          	</div>
			          	<br><br>
		          		<div class="row" id="lisdata">

		          		</div>
		          </div>
		        </div>
		    </div>
		</div>	
	</section>
</div>

<style type="text/css">
	.img{
		max-width:450px;
  		max-height:220px;
	}
	.thumbnail{
		opacity:0.70;
		-webkit-transition: all 0.5s; 
		transition: all 0.5s;
	}
	.thumbnail:hover{
		opacity:1.00;
		box-shadow: 0px 0px 10px #4bc6ff;
	}
	.line{
		margin-bottom: 5px;
	}
</style>

<script type="text/javascript">
	$(document).ready(function (){
		listdata();
	});
	function listdata()
	{
		var data = 
		                {   
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		                }

                    
            $.ajax({
                    url: '<?= base_url() ?>Classroom/listdata',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                    	$("#lisdata").html(response);
                    }
            });
	}
	function readmore(id)
	{
		var url = "<?= base_url()?>Classroom/Classroom_Details/"+id;
 		window.open(url, '_blank');
	}		
	$("#lookup_list").change(function (){
		var lookup_list = $("#lookup_list").val();

		if(lookup_list){
			var data = 
			                {   
			                	'lookup_list':lookup_list,
			                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			                }

	                    
	            $.ajax({
	                    url: '<?= base_url() ?>Classroom/listdata_byparam',
	                    type: 'POST',
	                    dataType: 'html',
	                    data: data,
	                    beforeSend: function() {

	                    },
	                    success: function(response){
	                    	$("#lisdata").html(response);
	                    }
	            });
	    } else {
	    	listdata();
	    }
	});	
</script>