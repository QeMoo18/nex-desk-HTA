

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h3> Button Print </h3>
		<div class="row">

			<div class="col-md-9">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Print</b> </h3>
		          </div>
		          <div class="box-body">

					<div class="form-group">
					  <div class="row">
					  	<div class="col-md-4">
		                  <p class="text">Time Ticket</p>
		                  <input type='text' class='form-control' name='Time_Ticket' id='Time_Ticket'> 
	               	  	</div>
	               	  	<div class="col-md-4"> </div>
	               	  	<div class="col-md-4"> <h4 class="pull-right"> Ticket#201829190120130131 </h4> </div>
	               	  </div>
	                </div>

	                <div class="form-group">
	                	<div class="row">
	                		<div class="col-md-7">
	                			<?php
	                				lookup_widget_ticket_info();
	                				lookup_widget_ticket_master();
	                				lookup_widget_customer_info();
	                				lookup_widget_cmdb_info();
	                			?> 
	                		</div>
	                		<div class="col-md-5">
	                			<?php 
	                				lookup_widget_agent_info();
	                				lookup_widget_chronolgy_of_ticket();
	                			?>
	                		</div>
	                	</div>
	                </div>

	               	<style type="text/css">
	               		.text{
	               			font-size: 18px;
	               		}
	               	</style>
	                <div class="form-group">
	                	<p class="text">  From : <font color="brown"> Sufian@bit.com.my </font></p>
	                	<p class="text"> To : <font color="brown"> nextick@bit.com.my </font></p>
	                	<p class="text"> Subject : <font color="brown"> Main Line Down </font></p>
	                	<p class="text"> Created : <font color="brown"> 16/04/2018 </font></p>
	                	<p class="text"> Created By : <font color="brown">  Mohd Ali </font></p>
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
	function submit()
	{
		var Time_Ticket = $("#Time_Ticket").val();
		var data = 	{
						"Time_Ticket" : Time_Ticket,
						
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