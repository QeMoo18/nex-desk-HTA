
		
<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Service Level Agreement Management </h5>
		<div class="row">
			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>Admin/SLA_ViewList"><button class="btn btn-success btn-block"> Go To Overview</button></a>
				</div>
			</div>

			<div class="col-md-9">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Add Service Level Agreement</b> </h3>
		          </div>
		          <div class="box-body">

		          			<div class="row">
			          			<div class="form-group col-md-4">
				                  <label for="exampleInputEmail1">Type SLA</label>
				                  <select class='form-control' name='sla_type_main2' id='sla_type_main2' disabled="disabled">
				  						<option value=''>< Please Select ></option>
				  						<option value='noc'>Network Operating System</option>
				  						<option value='hospital'>Hospital</option>
				  				  </select>
				                </div>

			          			<div class="form-group col-md-4" style="display: none">
				                  <label for="exampleInputEmail1">Type SLA</label>
				                  <select class='form-control' name='sla_type_main' id='sla_type_main'>
				  						<option value=''>< Please Select ></option>
				  						<option value='noc'>NOC</option>
				  						<option value='hospital'>Hospital</option>
				  				  </select>
				                </div>

								<div class="form-group col-md-4">
				                  <label for="exampleInputEmail1">SLA</label>
				                  <input type='text' class='form-control' name='sla_sla' id='sla_sla'> 
				                </div>
						
								<div class="form-group col-md-4">
				  					<label for="exampleInputEmail1">Type</label>
				  					<select class='form-control' name='sla_type' id='sla_type'>
				  						<option value=''>< Please Select ></option>
				  						<?= lookup_slatype(); ?>
				  					</select>
				                </div>
						
								<div class="form-group col-md-4">
				  					<label for="exampleInputEmail1">Service</label>
				  					<select class='form-control' name='sla_service' id='sla_service'>
				  						<option value=''>< Please Select ></option>
				  						<?= lookup_service(); ?>
				  					</select>
				                </div>
						
								<div class="form-group col-md-4" style="display: none">
				                  <label for="exampleInputEmail1">Calendar</label>
				                  <input type='text' class='form-control datepicker' name='sla_calendar' id='sla_calendar'> 
				                </div>

				                <div class="form-group col-md-4" id="sla_breach_div">
				                  <label for="exampleInputEmail1">SLA / SLG Breach</label>
				                  <input type='text' class='form-control ' name='sla_breach' id='sla_breach'> 
				                </div>
								
								<div class="form-group col-md-4">
				                  <label for="exampleInputEmail1">Escalation - <br> first response time (minutes)</label>
				                  <input type='text' class='form-control ' name='sla_first_escalation' id='sla_first_escalation'> 
				                </div>
				            </div>
			                <!-- <div class="form-group" id="sla_severity_div" style="display: none">
			  					<label for="exampleInputEmail1">Severity</label>
			  					<select class='form-control' name='sla_severity' id='sla_severity'>
			  						<option value=''>< Please Select ></option>
			  						<?= lookup_severity(); ?>
			  					</select>
			                </div> -->

			                <div class="row" id="sla_severity_div" style="display: none">
				                <div class="col-md-4"> 
				                	<label for="exampleInputEmail1">Severity</label>
				                  	<input type='text' class='form-control ' name='sev_title' id='sev_title'>
				                </div>

				                <div class="col-md-4"> 
				                	<label for="exampleInputEmail1">Minutes</label>
				                  	<input type='text' class='form-control ' name='sev_minute' id='sev_minute'>
				                </div>

				                <div class="col-md-2"> 
				                	<label for="exampleInputEmail1"></label>
				                	<button class="btn btn-block btn-primary" onclick="add_severity_sla();">(+) Add</button>
				                </div>
			            	</div>

			            	<br>
			            	<div id="list"> </div>
					
							<div class="form-group" id="esc_uptime_div">
			                  <label for="exampleInputEmail1">Escalation - <br> update time (minutes)</label>
			                  <input type='text' class='form-control ' name='sla_update_time' id='sla_update_time'> 
			                </div>
					
							<div class="form-group" id="esc_solutiontime_div">
			                  <label for="exampleInputEmail1">Escalation -  <br> solution time (minutes)</label>
			                  <input type='text' class='form-control ' name='sla_solution_time' id='sla_solution_time'> 
			                </div>
					
							<div class="form-group" style="display: none">
			                  <label for="exampleInputEmail1">Minimun Time <br> Between incident (minutes)</label>
			                  <input type='text' class='form-control ' name='sla_minimun_time' id='sla_minimun_time'> 
			                </div>
							
							<div class="row">
								<div class="form-group  col-md-4">
				  					<label for="exampleInputEmail1">Valid</label>
				  					<select class='form-control' name='sla_valid' id='sla_valid'>
				  						<option value=''>< Please Select ></option>
				  						<?= lookup_validity(); ?>
				  					</select>
				                </div>
						
								<div class="form-group  col-md-4">
				  					<label for="exampleInputEmail1">Comment</label>
				  					<textarea class='form-control' rows='3' name='sla_comment' id='sla_comment'></textarea>
				                </div>
				            </div>
							
							<hr>
							<div class="row">
								<div class="form-group col-md-2">
					            	<button type="cancel" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
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

<input type="hidden" name="generated_id" id="generated_id" value="<?=rand();?>">



<script type="text/javascript">
	function submit()
	{
		var sla_sla = $("#sla_sla").val();
		var sla_type = $("#sla_type").val();
		var sla_service = $("#sla_service").val();
		var sla_calendar = $("#sla_calendar").val();
		var sla_first_escalation = $("#sla_first_escalation").val();
		var sla_update_time = $("#sla_update_time").val();
		var sla_solution_time = $("#sla_solution_time").val();
		var sla_minimun_time = $("#sla_minimun_time").val();
		var sla_valid = $("#sla_valid").val();
		var sla_comment = $("#sla_comment").val();

		var sla_breach = $("#sla_breach").val();

		var sla_type_main = $("#sla_type_main").val();

		// var sla_severity = $("#sla_severity").val();

		var generated_id = $("#generated_id").val();

		var data = 	{
						"sla_sla" : sla_sla,
						"sla_type" : sla_type,
						"sla_service" : sla_service,
						"sla_calendar" : sla_calendar,
						"sla_first_escalation" : sla_first_escalation,
						"sla_update_time" : sla_update_time,
						"sla_solution_time" : sla_solution_time,
						"sla_minimun_time" : sla_minimun_time,
						"sla_valid" : sla_valid,
						"sla_comment" : sla_comment,
						"sla_breach":sla_breach,
						"sla_type_main":sla_type_main,
						// "sla_severity":sla_severity,
						"generated_id":generated_id,
						'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
					}

		$.ajax({
	                url: "<?= base_url() ?>Admin/sla_add_service",
	                type: "POST",
	                dataType: "html",
	                data: data,
	                beforeSend: function() {

	                },
	                success: function(response){
	                	//alert('Success add sla services !');
	                	//location.reload();

	                	var url = "<?= base_url()?>Admin/SLA_VIewList";
	                    window.location.href=url;
	                }
	        });

	}

	function cancel()
	{
		location.reload();
	}

	$("#sla_type_main").change(function (){
		var type_go = $("#sla_type_main").val();
		//alert(type_go);
		if(type_go=='noc'){
			$("#sla_breach_div").show();
			$("#esc_uptime_div").show();
			$("#esc_solutiontime_div").show();
			$("#sla_severity_div").hide();
		} else if(type_go=='hospital'){
			$("#sla_breach_div").hide();
			$("#esc_uptime_div").hide();
			$("#esc_solutiontime_div").hide();
			$("#sla_severity_div").show();
		} else {
			$("#sla_breach_div").show();
			$("#esc_uptime_div").show();
			$("#esc_solutiontime_div").show();
			$("#sla_severity_div").hide(); 
		}
	});

	function add_severity_sla()
	{
		var sev_title = $("#sev_title").val();
		var sev_minute = $("#sev_minute").val();
		var generated_id = $("#generated_id").val();

		var data = 	{
						
						"sev_title":sev_title,
						"sev_minute":sev_minute,
						"generated_id":generated_id,
						'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
					}

		$.ajax({
	                url: "<?= base_url() ?>Admin/add_severity_sla",
	                type: "POST",
	                dataType: "html",
	                data: data,
	                beforeSend: function() {

	                },
	                success: function(response){
	                	//alert('Success add sla services !');
	                	//location.reload();
	                	$("#sev_title").val('');
	                	$("#sev_minute").val('');

	                	list_severity_sla();
	                }
	        });
	}

	function list_severity_sla()
	{
		var generated_id = $("#generated_id").val();

		var data = 	{
						"generated_id":generated_id,
						'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
					}

		$.ajax({
	                url: "<?= base_url() ?>Admin/list_severity_sla",
	                type: "POST",
	                dataType: "html",
	                data: data,
	                beforeSend: function() {

	                },
	                success: function(response){

	                	var start = '<table class="table table-bordered"><thead><tr><th><center>Severity</center></th><th><center>Minute</center></th><th><center>Delete</center></th></tr></thead><tbody>';

	                	var body = response;

	                	var end = '</tbody></table>';

	                	if(response){
	                		var list = start+body+end;
	                		$("#list").html(list);
	                	} else {
	                		$("#list").html('');
	                	}

	                }
	        });
	}


	function delete_list(id)
	{
		$("html, body").animate({ scrollTop: 0 }, "slow");
        $("#myModal").modal('show');
        $("#modal_title").html('Confirmation To Delete');
        $("#modal_contain").html('Are you sure to delete ?');

        $("#confirm").click(function (){
            deletenow(id);
            $("#myModal").modal('hide');
        });
	}

	function deletenow(id)
    {
        var data =  {
                         'id':id,
                         '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                        
                $.ajax({
                        url: '<?= base_url() ?>Admin/delete_data_list',
                        type: 'POST',
                        dataType: 'html',
                        data: data,
                        beforeSend: function() {

                        },
                        success: function(response){
                            //alert('Success Delete !');
                            list_severity_sla();
                        }
                });

    }


    //auto set hospital
	$(document).ready(function (){
		var session = "<?= $this->session->userdata('env'); ?>";

		if(session=='noc'){
			$("select#sla_type_main2").val('noc').trigger('change');
			$("select#sla_type_main").val('noc').trigger('change');
		} else if(session=='hospital'){
			$("select#sla_type_main2").val('hospital').trigger('change');
			$("select#sla_type_main").val('hospital').trigger('change');
		}
	});

</script>