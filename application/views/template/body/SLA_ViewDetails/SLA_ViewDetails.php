<div class="pageheader hidden-xs">
    <h3><i class="fa fa-list"></i> View Service Level Agreement </h3>
    <div class="breadcrumb-wrapper">
        <span class="label" style="padding-right: 0px;"><i class="fa fa-cog" aria-hidden="true" style="border: 2px solid #f2f7f8;padding-right: 0px;"></i></span>
        <ol class="breadcrumb">
            <li> <a href="<?=base_url()?>Service/SLA_ListView"> SLA </a> </li>
        </ol>
    </div>
</div>

<div class="row" style="padding-bottom: 30px;">
	<div class="content-wrapper">
		<section class="content">
			<div class="row">

				<div class="col-md-12">

					<div class="box box-success">
			          <div class="box-header with-border">
			            <h3 class="box-title"> <b>Service Level Agreement</b> </h3>
			          </div>
			          <div class="box-body">

			          		<div class="row">
			          			<div class="form-group col-md-2">
				                  <label for="exampleInputEmail1">Type SLA</label>
				                  <select class='form-control' name='sla_type_main' id='sla_type_main'>
				  						<option value=''>< Please Select ></option>
				  						<option value='noc'>NOC</option>
				  						<option value='hospital'>Hospital</option>
				  				  </select>
				                </div>


								<div class="form-group col-md-2">
				                  <label for="exampleInputEmail1">SLA</label>
				                  <input type='text' class='form-control' name='sla_sla' id='sla_sla'> 
				                </div>
						
								<div class="form-group col-md-2">
				  					<label for="exampleInputEmail1">Type</label>
				  					<select class='form-control' name='sla_type' id='sla_type'>
				  						<option value=''>< Please Select ></option>
				  						<?= lookup_slatype(); ?>
				  					</select>
				                </div>
						
								<div class="form-group col-md-2">
				  					<label for="exampleInputEmail1">Service</label>
				  					<select class='form-control' name='sla_service' id='sla_service'>
				  						<option value=''>< Please Select ></option>
				  						<?= lookup_service(); ?>
				  					</select>
				                </div>
							
								<div class="form-group col-md-2" style="display: none">
				                  <label for="exampleInputEmail1">Calendar</label>
				                  <input type='text' class='form-control datepicker' name='sla_calendar' id='sla_calendar'> 
				                </div>


				                <div class="form-group col-md-2" id="sla_breach_div">
				                  <label for="exampleInputEmail1">SLA / SLG Breach</label>
				                  <input type='text' class='form-control ' name='sla_breach' id='sla_breach'> 
				                </div>
						
								<div class="form-group col-md-3">
				                  <label for="exampleInputEmail1">Escalation - <br> 1st response time (minutes)</label>
				                  <input type='text' class='form-control ' name='sla_first_escalation' id='sla_first_escalation'> 
				                </div>

				                <div class="form-group col-md-2" id="sla_severity_div" style="display: none">
				  					<label for="exampleInputEmail1">Severity</label>
				  					<select class='form-control' name='sla_severity' id='sla_severity'>
				  						<option value=''>< Please Select ></option>
				  						<?= lookup_severity(); ?>
				  					</select>
				                </div>
						
								<div class="form-group col-md-3" id="esc_uptime_div">
				                  <label for="exampleInputEmail1">Escalation - <br> update time (minutes)</label>
				                  <input type='text' class='form-control ' name='sla_update_time' id='sla_update_time'> 
				                </div>
						
								<div class="form-group col-md-3" id="esc_solutiontime_div">
				                  <label for="exampleInputEmail1">Escalation -  <br> solution time (minutes)</label>
				                  <input type='text' class='form-control ' name='sla_solution_time' id='sla_solution_time'> 
				                </div>
						
								<div class="form-group col-md-3" style="display: none">
				                  <label for="exampleInputEmail1">Minimun Time <br> Between incident (minutes)</label>
				                  <input type='text' class='form-control ' name='sla_minimun_time' id='sla_minimun_time'> 
				                </div>
						
								<div class="form-group col-md-2">
				  					<label for="exampleInputEmail1">Valid</label>
				  					<select class='form-control' name='sla_valid' id='sla_valid'>
				  						<option value=''>< Please Select ></option>
				  						<?= lookup_validity(); ?>
				  					</select>
				                </div>
				            </div>
							
							<div class="row">
								<div class="form-group col-md-12">
				  					<label for="exampleInputEmail1">Comment</label>
				  					<textarea class='form-control' rows='5' name='sla_comment' id='sla_comment'></textarea>
				                </div>
								
								<div class="form-group">
					            	<!-- <button type="submit" class="btn btn-primary btn-block" onclick="submit();">Edit</button>
					            	<button type="submit" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button> -->
					            </div>
					        </div>

					  </div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

<input type="hidden" name="slaid" id="slaid" value="<?= $this->uri->segment('3'); ?>">

<script type="text/javascript">

	$(document).ready(function (){
		details();
	
	});

	function details()
	{
		var slaid= $("#slaid").val();

		var data =  {
		                    'slaid':slaid,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		            }

        $.ajax({
                    url: '<?= base_url() ?>Admin/sla_details',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    beforeSend: function() {
                       
                    },
                    success: function(response){

                    	var type_of_sla = $("#sla_type_main").val(response.type_of_sla);

                    	var type = response.type_of_sla;
                    	//alert(type);
                    	if(type=='noc'){
							$("#sla_breach_div").show();
							$("#esc_uptime_div").show();
							$("#esc_solutiontime_div").show();
							$("#sla_severity_div").hide();
						} else if(type=='hospital'){
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


                    	var severity = $("#sla_severity").val(response.severity);
                    	

				 		var sla_sla = $("#sla_sla").val(response.sla);
						var sla_type = $("#sla_type").val(response.sla_type);
						var sla_service = $("#sla_service").val(response.service);
						var sla_calendar = $("#sla_calendar").val(response.calendar);
						var sla_first_escalation = $("#sla_first_escalation").val(response.first_response);
						var sla_update_time = $("#sla_update_time").val(response.update_time);
						var sla_solution_time = $("#sla_solution_time").val(response.solution_time);
						var sla_minimun_time = $("#sla_minimun_time").val(response.min_time_between_incident);
						var sla_valid = $("#sla_valid").val(response.validity);
						var sla_comment = $("#sla_comment").val(response.comment);

						var sla_breach = $("#sla_breach").val(response.sla_breach);
                    }
              });
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

		var slaid= $("#slaid").val();

		var sla_breach = $("#sla_breach").val();

		var severity = $("#sla_severity").val();
		var type_of_sla = $("#sla_type_main").val();

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
						"slaid":slaid,
						"sla_breach":sla_breach,
						"severity":severity,
						"type_of_sla":type_of_sla,
						'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
					}

		$.ajax({
	                url: "<?= base_url() ?>Admin/sla_update_service",
	                type: "POST",
	                dataType: "html",
	                data: data,
	                beforeSend: function() {

	                },
	                success: function(response){
	                	//alert('Success update sla services !');
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
</script>

<style type="text/css">

    .pageheader {
        padding: 13px;
        position: relative;
        /* background: #ffffff; */
        background: linear-gradient(to right, rgb(222, 227, 228) 10%, rgb(31, 112, 162) 100%);
        background: -moz-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 112, 162) 100%);
        background: -webkit-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 112, 162) 100%);
        background: linear-gradient(to right, rgb(222, 227, 228) 10%, rgb(222, 227, 228) 100%);
        margin: -20px -5px 22px -5px;
        /* padding: 35px 15px 100px 20px; */
        color: #353535;
        box-shadow: 0 1px 2px 0 rgb(232, 232, 232);
        padding-left: 30p;
    }

    .pageheader .fa, .pageheader .glyphicon {
        font-size: 12px;
        margin-right: 5px;
        padding: 6px 7px;
        border: 2px solid #122f76;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;
    }

    .pageheader h3 {
        font-size: 15px;
        color: #165a82;
        letter-spacing: -.5px;
        margin: 0;
    }

    .pageheader .breadcrumb-wrapper .label {
        color: #165a82;
        text-transform: uppercase;
        font-weight: 200;
        display: inline-block;
    }


    .pageheader .breadcrumb li a {
        color: #165983;
    }

    .pageheader .breadcrumb li.active {
        color: #175b86;
    }

    .pageheader .breadcrumb-wrapper {
        position: absolute;
        top: 15px;
        right: 25px;
    }

    .pageheader {
        padding: 13px;
        position: relative;
        /* background: #ffffff; */
        background: linear-gradient(to right, rgb(242, 247, 248) 10%, rgb(31, 114, 162) 100%);
        background: -moz-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 114, 162) 100%);
        background: -webkit-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 114, 162) 100%);
        background: linear-gradient(to right, rgb(242, 247, 248) 10%, rgb(242, 247, 248) 100%);
        margin: -20px -5px 24px -5px;
        /* padding: 35px 15px 100px 20px; */
        color: #353535;
        box-shadow: 0 1px 2px 0 rgb(234, 234, 234);
        padding-left: 30p;
    }
</style>