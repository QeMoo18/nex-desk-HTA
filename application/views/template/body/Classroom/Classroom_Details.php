<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b><i class="fa fa-file-text" aria-hidden="true"></i> Step List : <span id="title"> </span> </b> </h3>
		          </div>
		          <div class="box-body" id="listdata">
		          		
		          </div>
		        </div>
		    </div>
		</div>	
	</section>
</div>

<script type="text/javascript">
	$(document).ready(function (){
		var id = "<?= $this->uri->segment(3); ?>";
		gettitle(id);
		detailtopic(id);
	});

	function gettitle(id)
	{
		var data = 
		                {   'id':id,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		                }

                    
            $.ajax({
                    url: '<?= base_url() ?>Classroom/gettitle',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                    	$("#title").html(response);
                    }
            });
	}

	function detailtopic(id)
	{
		var data = 
		                {   'id':id,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		                }

                    
            $.ajax({
                    url: '<?= base_url() ?>Classroom/detailtopic',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                    	$("#listdata").html(response);
                    }
            });
	}
</script>