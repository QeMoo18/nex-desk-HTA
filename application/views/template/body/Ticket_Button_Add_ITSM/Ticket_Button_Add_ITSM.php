<script type="text/javascript" src="<?=base_url()?>asset_admin/bower_components/ckeditor/ckeditor.js"></script>

<div class="content-wrapper">

	<section class="content">
		<?= lookup_navbar(); ?> 
		<div class="row">
			<div class="col-md-8">
				<?= lookup_navbar_ticket(); ?>
			</div>
			<div class="col-md-4"> </div>
		</div>
		
		<?php $id = $this->uri->segment(3); ?>

		<h5> <i class="fa fa-angle-double-right" aria-hidden="true"></i>  Add ITSM </h5>

		<div class="row">
			<div class="col-md-8">
				<div class="row">
			        <?= time_ticket(); ?>
		        </div>
			</div>	
			<div class="col-md-4"></div>
		</div>
		
		<div class="row">

			<form id="idForm" action="<?=base_url()?>ticket/add_itsm" method="post" enctype="multipart/form-data">

				<input type="hidden" name="type_module" value="email">
				<input type="hidden" name="type_dothis" value="manual">
				<input type="hidden" name="" id="other_id">
				



						<input type="hidden" name="id_ticket" value="<?= $id ?>">
						<!-- FIRST -->
						<div class="col-md-6">
							<div class="panel-group">
							  <div class="panel panel-danger">
							    <div class="panel-heading">
							      <label class="panel-title">
							        <a data-toggle="collapse" href="#collapse1"> <i class="fa fa-ticket" aria-hidden="true"></i> TICKET INFORMATION</a>
							      </label>
							    </div>
							    <div id="collapse1" class="panel-collapse collapse in">
							      <div class="panel-body">
							      	<!-- BODY -->
							      			
										
										<div class="form-group col-md-6">
						  					<label for="exampleInputEmail1">*Subject/Title</label>
						  					<input class='form-control' name='itsm_subject_title' id='itsm_subject_title' value="<?= subject_note($id); ?>" required></input>
						                </div>
								
										<div class="form-group col-md-6">
						  					<label for="exampleInputEmail1">*To Queue</label>
						  					<select class='form-control' name='itsm_to_queu' id='itsm_to_queu'>
						  						<?= pull_data_itsm_to_queu($id) ?>						  						
						  					</select>
						                </div>
								        
						                <div class="form-group col-md-6" id="problem_desc_itsm_div" style="display: none;">
						  					<label for="exampleInputEmail1">Problem Description</label>
						  					<select class='form-control' name='problem_desc_itsm' id='problem_desc_itsm'>
						  						<?= pull_problem_desc($id); ?>
						  						
						  					</select>
						                </div>
	        
										<div class="form-group col-md-6" id="div_ml_status">
						  					<label for="exampleInputEmail1">*Main Line Status</label>
						  					<select class='form-control' name='itsm_main_line' id='itsm_main_line' >
						  						<?= pull_data_status_note($id) ?>
						  						
						  					</select>
						                </div>
								        
										<div class="form-group col-md-6" id="div_backup_type">
						  					<label for="exampleInputEmail1">*Backup Type</label>
						  					<select class='form-control' name='itsm_backup_type' id='itsm_backup_type' >
						  						<?= pull_data_bs_note($id) ?>
						  					</select>
						                </div>
                                        
						                <div class="form-group col-md-6" id="div_backup_status">
						  					<label for="exampleInputEmail1">*Backup Status</label>
						  					<select class='form-control' name='itsm_backup_status' id='itsm_backup_status' >
						  						<?= pull_data_bstatus_note($id) ?>
						  					</select>
						                </div>
								
										<div class="form-group col-md-6" id="div_pending_date">
						                  <label for="exampleInputEmail1">Pending Date</label>
						                  <input type='text' class='datepicker form-control' name='itsm_pending_date' id='itsm_pending_date' value="<?= pull_data_pendingdate_note($id) ?>"> 
						                </div>
								
										<div class="form-group col-md-6" id="div_impact">
						  					<label for="exampleInputEmail1">Impact</label>
						  					<select class='form-control' name='itsm_impact' id='itsm_impact'><?= pull_data_impact_note($id) ?>
						  					</select>
						                </div>
								
										<div class="form-group col-md-6" id="div_priority">
						  					<label for="exampleInputEmail1">Priority</label>
						  					<select class='form-control' name='itsm_priority' id='itsm_priority'>
						  					<?= pull_data_priority_note($id) ?>
						  					</select>
						                </div>

						                <?php $id = $this->uri->segment('3'); ?>
						                <div class="form-group col-md-6" id="provider_div">
						  					<label for="exampleInputEmail1">Provider Reference</label>
						  					<input type="text" name="provider_ref" id="provider_ref" class="form-control" value="<?=  pull_data_provider_ref($id) ?>">
						  				</div>
							      	<!-- END -->
							      </div>
							    </div>
							  </div>
							</div>
						</div>
						<!-- END -->
						<!-- SECOND -->
						<div class="col-md-6">
							<div class="panel-group">
							  <div class="panel panel-danger">
							    <div class="panel-heading">
							      <h4 class="panel-title">
							        <a data-toggle="collapse" href="#collapse2" id="cust">
							        	<label> 
							        		<span class="fa fa-group" aria-hidden="true"></span>  
							    			CUSTOMER INFORMATION 
							    		</label>
							    	</a>
							      </h4>
							    </div>
							    <div id="collapse2" class="panel-collapse collapse in">
							      <div class="panel-body">

						      		<div class="form-group col-md-6">
					                  <label for="exampleInputEmail1">*Reference No</label>
					                  <input type='text' class='form-control' name='tp_ReferenceNo' id='tp_ReferenceNo' onkeyup="ref_no();" list="list_ref" required="required">
					                  <span id="alert_tp_ReferenceNo."></span> 
					                </div>
					                <datalist id="list_ref"></datalist>


							
									<div class="form-group col-md-6">
					                  <label for="exampleInputEmail1">Service</label>
					                  <input type='text' class='form-control'  name='tp_service' id='tp_service'> 
					                </div>
							
									<!-- <div class="form-group">
					                  <label for="exampleInputEmail1">Service Level Agreement</label>
					                  <input type='text' class='form-control'  name='tp_sla' id='tp_sla'> 
					                </div> -->
									

					                <div class="form-group col-md-6">
					  					<label for="exampleInputEmail1">Fault ITSM Category</label>
					  					<select class='form-control' name='fault_itsm_cat' id='fault_itsm_cat' >
					  						<option value=''>< Please Select ></option>
					          				<?= lookup_fault_itsm_category(); ?>	
					          				  </select>
					  					<span id="alert_fault_itsm_cat"></span> 
					                </div>


					                <!-- SLA DROPDOWN -->
					                <div class="form-group col-md-6" >
					                  <label for="exampleInputEmail1">*Service Level Agreement</label>
					                  <select class="form-control" name='tp_sla' id='tp_sla' required="required">
					                  	<option value="">-- Select SLA --</option>
					                  	<?= lookup_sla_by_name()?>
					                  </select>
					                </div>
					                <script type="text/javascript">
					                	$("#tp_sla").change(function (){
					                		var sla = $("#tp_sla").val();
					                		var id_ticket = "<?= $this->uri->segment(3)?>";
					                		get_sla_generated_id(sla,id_ticket);
					                		get_lookup_severity_by_gen_id(id_ticket);
					                	});

					                	function get_sla_generated_id(sla,id_ticket)
					                	{
					                		var sla = $("#tp_sla").val();
					                		var data = 
									                    {
									                    	'sla':sla,
									                    	'id_ticket':id_ticket,
									                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
									                    }

									                    
									                    $.ajax({
									                            url: '<?= base_url() ?>Ticket/get_sla_generated_id',
									                            type: 'POST',
									                            dataType: 'html',
									                            data: data,
									                            beforeSend: function() {
									                               // alert('Sila Tunggu');

									                            },
									                            success: function(response){
									                               
									                               get_all_severity_onchange(response,id_ticket);
									                            }
									                    });
					                	}


					                	function get_all_severity_onchange(id,id_ticket)
					                	{
					                		//var id = $("#tp_sla").val();
					                		var data = 
									                    {
									                    	'id':id,
									                    	'id_ticket':id_ticket,
									                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
									                    }

									                    
									                    $.ajax({
									                            url: '<?= base_url() ?>Ticket/get_all_severity_onchange',
									                            type: 'POST',
									                            dataType: 'html',
									                            data: data,
									                            beforeSend: function() {
									                               // alert('Sila Tunggu');

									                            },
									                            success: function(response){
									                            	// alert(response);
									                            	$("#tp_severity").html(response);
									                            	//get_lookup_severity_by_gen_id(id_ticket);
									                            }
									                    });
					                	}


					                	function get_lookup_severity_by_gen_id(id_ticket)
					                	{
					                		var data = 
									                    {
									                    	'id_ticket':id_ticket,
									                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
									                    }

									                    
									                    $.ajax({
									                            url: '<?= base_url() ?>Ticket/get_lookup_severity_by_gen_id',
									                            type: 'POST',
									                            dataType: 'html',
									                            data: data,
									                            beforeSend: function() {
									                               // alert('Sila Tunggu');

									                            },
									                            success: function(response){
									                            	//alert(response);
									                            	if(response){
									                            		$("#tp_severity").val(response);
									                            	}
									                            	//$("#tp_severity").val(response);
									                            	//$("#tp_severity").html(response);
									                            }
									                    });
					                	}
					                </script>
					                <!-- END -->


					                <?php 
					                $env = $this->session->userdata('env');
					                if($env=='noc'){

					                } else {
					                ?>
					                <div class="form-group col-md-6" id="div_severity" style="display: none;">
					  					<label for="exampleInputEmail1">*Severity</label>
					  					<select class='form-control' name='tp_severity' id='tp_severity' required="required">
					  						<?= lookup_severity(); ?>
					  						
					  					</select>
					                </div>
					            	<?php } ?>


									<div class="form-group col-md-6">
					                  <label for="exampleInputEmail1">Location</label>
					                  <input type='text' class='form-control'  name='tp_loc' id='tp_loc'> 
					                </div>
							
							
									<div class="form-group col-md-6">
					                  <label for="exampleInputEmail1">*ITSM Category</label>
					                  <input type='text' class='form-control'  name='tp_itsm' id='tp_itsm' required="required">
					                  <span id="alert_tp_itsm"></span> 
					                </div>


					                <div class="form-group col-md-6">
					                  <label for="exampleInputEmail1">Customer ID</label>
					                  <input type='text' class='form-control'  name='tp_cuID' id='tp_cuID'> 
					                </div>
									
					                
					                <input type="hidden" name="ticket_customer_id">
					                <!-- LIST DATA -->
					                <div class="form-group col-md-12">
						                <label> List Of Customer User | <a onclick="show_cu();" id="add_cust_user_div"> <i class="fa fa-plus-circle" aria-hidden="true" ></i> Add Customer User </a></label>
						                <table class="table table-striped">
									    	<tr>
										    	<th> Customer User </th>
										    	<th> Delete </th>
									    	</tr>
									    	<tbody id="list_data"> 
									    		
									    	</tbody>
									    </table>
									</div>
					                <!-- END -->


					                <div class="form-group col-md-12" id="show_cu" style="display: none">
					                  <label for="exampleInputEmail1">Customer User</label>
					                  <select class="form-control" name='tp_cu' id='tp_cu'>
					                  	<option value="">-- Select Customer User --</option>
					                  </select>
					                </div>


							      	<div class="form-group">

							      		<div class="col-md-6">
							            	<button class="btn btn-danger btn-block" onclick="cancel2();">Cancel</button>
							      		</div>
							      		<div class="col-md-6">
							            	<button type="submit" class="btn btn-primary btn-block">Update</button>

							      		</div>
							            	
							        </div>
						     	 </div>
							      <div class="panel-footer">
							      </div>
							    </div>
							  </div>
							</div>
						</div>
						<!-- END -->
						
						
						<!--<input type="hidden" name="" id="" style="display:none">-->
						
						
				

					<script type="text/javascript">
                        
                        
                        
						$(document).ready(function (){
						    get_ref_num();
							//var tp_ReferenceNo = '123123';
							//$("#tp_ReferenceNo").val(tp_ReferenceNo);
							// var tp_ReferenceNo = $("#tp_ReferenceNo").val();
							// var load = setTimeout(function() {
							//     get_other_id(tp_ReferenceNo);
							// }, 1000);
						});
						
						function get_ref_num()
						{
						    var get_ref_num = "<?= $this->uri->segment(3) ?>";

						    

						    get_enviroment(get_ref_num);

						    get_location_user(get_ref_num);
						    get_sla_user(get_ref_num);
						    get_service_user(get_ref_num);
						    get_fault_itsm_cat(get_ref_num);

							var data = 
					                    {
					                    	'get_ref_num':get_ref_num,
					                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
					                    }

					                    
					                    $.ajax({
					                            url: '<?= base_url() ?>Ticket/get_ref_num',
					                            type: 'POST',
					                            dataType: 'html',
					                            data: data,
					                            beforeSend: function() {
					                               // alert('Sila Tunggu');

					                            },
					                            success: function(response){
					                                //alert(response)  
					                                $("#tp_ReferenceNo").val(response);

					                                var tp_ReferenceNo = response;
													get_other_id(tp_ReferenceNo);
					                            }
					                    });
						}
						

						function get_fault_itsm_cat(get_ref_num)
						{
							var data = 
					                    {
					                    	'get_ref_num':get_ref_num,
					                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
					                    }

					                    
		                    $.ajax({
		                            url: '<?= base_url() ?>Ticket/get_fault_itsm_cat',
		                            type: 'POST',
		                            dataType: 'html',
		                            data: data,
		                            beforeSend: function() {
		                               // alert('Sila Tunggu');

		                            },
		                            success: function(response){
		                            	$("#fault_itsm_cat").val(response);
		                            }
		                          });
						}
						

						function ref_no()
						{
							var tp_ReferenceNo = $("#tp_ReferenceNo").val();
							var load = setTimeout(function() {
							    get_other_id(tp_ReferenceNo);
							}, 1000);

							
						}


						function get_enviroment(get_ref_num)
						{

							get_severity(get_ref_num);

							var data = 
					                    {
					                    	'get_ref_num':get_ref_num,
					                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
					                    }

					                    
					                    $.ajax({
					                            url: '<?= base_url() ?>Ticket/get_enviroment',
					                            type: 'POST',
					                            dataType: 'html',
					                            data: data,
					                            beforeSend: function() {
					                               // alert('Sila Tunggu');

					                            },
					                            success: function(response){
					                            	
					                            	if(response==='hospital'){
					                            		//alert('x');
					                            		$("#div_ml_status").hide();
					                            		$("#div_backup_type").hide();
					                            		$("#div_backup_status").hide();
					                            		$("#div_pending_date").hide();
					                            		$("#div_severity").show();
					                            		$("#problem_desc_itsm_div").show();

					                            		$("#add_cust_user_div").hide();

					                            		$("#div_impact").hide();
					                            		$("#div_priority").hide();

					                            		$("#provider_div").hide();
					                            		

					                            	} else {
					                            		//alert('you');
					                            		$("#div_ml_status").show();
					                            		$("#div_backup_type").show();
					                            		$("#div_backup_status").show();
					                            		$("#div_pending_date").show();
					                            		$("#div_severity").hide();
					                            		$("#problem_desc_itsm_div").hide();

					                            		$("#add_cust_user_div").show();

					                            		$("#div_impact").show();
					                            		$("#div_priority").show();

					                            		$("#provider_div").show();

					                            	}
					                               
					                            }
					                    });
						}


						function get_other_id(tp_ReferenceNo)
						{
						    var tp_ReferenceNo = $("#tp_ReferenceNo").val();
							var data = 
					                    {
					                    	'tp_ReferenceNo':tp_ReferenceNo,
					                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
					                    }

					                    
					                    $.ajax({
					                            url: '<?= base_url() ?>Ticket/get_other_id',
					                            type: 'POST',
					                            dataType: 'html',
					                            data: data,
					                            beforeSend: function() {
					                               // alert('Sila Tunggu');

					                            },
					                            success: function(response){
					                            	if (!$.trim(response)){ 

					                            	} else {
					                            		$("#other_id").val(response);
					                            		get_the_key();
					                            	}
					                               
					                            }
					                    });
						}

						function get_the_key()
						{
							
							var id = $("#other_id").val();
							id = id.replace(/&/g, '')
							     .replace(/>/g, '')
							     .replace(/</g, '')
							     .replace(/\n/g, '');


							var data = 
					                    {
					                    	'Location_ID':id,
					                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
					                    }

					                    
					                    $.ajax({
					                            url: '<?= base_url() ?>Ticket/get_the_key',
					                            type: 'POST',
					                            dataType: 'json',
					                            data: data,
					                            beforeSend: function() {
					                               // alert('Sila Tunggu');

					                            },
					                            success: function(response){
					                             	$("#tp_itsm").val(response.CAT); 

					                             	var cat = response.CAT;
					                             	var other_id = response.Location_ID;
					                             	var service = response.Service;
					                             	var sla = response.SLA;
					                             	var customerID = response.CustomerID;

					                             	var env = "<?= $this->session->userdata('env')?>";

					                             	if(env=='noc'){
					                             		get_location(cat,other_id);
						                             	get_service(service);
						                             	get_sla(sla);
					                             	}

					                             	
					                             	get_customer(customerID);
					                             	

					                            }
					                    });
						}


						function get_location(cat,other_id)
						{
							var data = 
					                    {
					                    	'cat':cat,
					                    	'other_id':other_id,
					                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
					                    }

					                    
					                    $.ajax({
					                            url: '<?= base_url() ?>Ticket/get_location',
					                            type: 'POST',
					                            dataType: 'html',
					                            data: data,
					                            beforeSend: function() {
					                               // alert('Sila Tunggu');

					                            },
					                            success: function(response){
					                            	if (!$.trim(response)){ 

					                            	} else {
					                            		
					                            		var id = response;
														id = id.replace(/&/g, '')
														     .replace(/>/g, '')
														     .replace(/</g, '')
														     .replace(/\n/g, '');

														$("#tp_loc").val(id);

					                            	}
					                               
					                            }
					                    });
						}

						function get_service(service)
						{
							var data = 
					                    {
					                    	'service':service,
					                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
					                    }

					                    
					                    $.ajax({
					                            url: '<?= base_url() ?>Ticket/get_service',
					                            type: 'POST',
					                            dataType: 'html',
					                            data: data,
					                            beforeSend: function() {
					                               // alert('Sila Tunggu');

					                            },
					                            success: function(response){
					                            	if (!$.trim(response)){ 

					                            	} else {
					                            		var id = response;
														id = id.replace(/&/g, '')
														     .replace(/>/g, '')
														     .replace(/</g, '')
														     .replace(/\n/g, '');

														$("#tp_service").val(id);
					                            	}
					                               
					                            }
					                    });
						}

						function get_sla(sla)
						{
							var data = 
					                    {
					                    	'sla':sla,
					                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
					                    }

					                    
					                    $.ajax({
					                            url: '<?= base_url() ?>Ticket/get_sla',
					                            type: 'POST',
					                            dataType: 'html',
					                            data: data,
					                            beforeSend: function() {
					                               // alert('Sila Tunggu');

					                            },
					                            success: function(response){
					                            	if (!$.trim(response)){ 

					                            	} else {
					                            		var id = response;
														id = id.replace(/&/g, '')
														     .replace(/>/g, '')
														     .replace(/</g, '')
														     .replace(/\n/g, '');

														$("#tp_sla").val(id);

														
					                            	}
					                               
					                            }
					                    });
						}


						// latest 

						function get_location_user(get_ref_num)
						{
							var data = 
					                    {
					                    	'ticket_id':get_ref_num,
					                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
					                    }

					                    
					                    $.ajax({
					                            url: '<?= base_url() ?>Ticket/get_location_user',
					                            type: 'POST',
					                            dataType: 'html',
					                            data: data,
					                            beforeSend: function() {
					                               // alert('Sila Tunggu');

					                            },
					                            success: function(response){
					                            	if (!$.trim(response)){ 

					                            	} else {
					                            		
					                            		var id = response;
														id = id.replace(/&/g, '')
														     .replace(/>/g, '')
														     .replace(/</g, '')
														     .replace(/\n/g, '');

														$("#tp_loc").val(id);

					                            	}
					                               
					                            }
					                    });
						}

						function get_service_user(get_ref_num)
						{
							var data = 
					                    {
					                    	'ticket_id':get_ref_num,
					                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
					                    }

					                    
					                    $.ajax({
					                            url: '<?= base_url() ?>Ticket/get_service_user',
					                            type: 'POST',
					                            dataType: 'html',
					                            data: data,
					                            beforeSend: function() {
					                               // alert('Sila Tunggu');

					                            },
					                            success: function(response){
					                            	if (!$.trim(response)){ 

					                            	} else {
					                            		var id = response;
														id = id.replace(/&/g, '')
														     .replace(/>/g, '')
														     .replace(/</g, '')
														     .replace(/\n/g, '');

														$("#tp_service").val(id);
					                            	}
					                               
					                            }
					                    });
						}

						function get_sla_user(get_ref_num)
						{
							var data = 
					                    {
					                    	'ticket_id':get_ref_num,
					                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
					                    }

					                    
					                    $.ajax({
					                            url: '<?= base_url() ?>Ticket/get_sla_user',
					                            type: 'POST',
					                            dataType: 'html',
					                            data: data,
					                            beforeSend: function() {
					                               // alert('Sila Tunggu');

					                            },
					                            success: function(response){
					                            	if (!$.trim(response)){ 

					                            	} else {
					                            		var id = response;
														id = id.replace(/&/g, '')
														     .replace(/>/g, '')
														     .replace(/</g, '')
														     .replace(/\n/g, '');

														$("#tp_sla").val(id);
														var id_ticket = "<?= $this->uri->segment(3)?>";
														//get_sla_generated_id(id,id_ticket);

														
					                            	}
					                               
					                            }
					                    });
						}

						// end 

						function get_severity(get_ref_num)
						{
							var data = 
					                    {
					                    	'id':get_ref_num,
					                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
					                    }

					                    
					                    $.ajax({
					                            url: '<?= base_url() ?>Ticket/get_severity',
					                            type: 'POST',
					                            dataType: 'html',
					                            data: data,
					                            beforeSend: function() {
					                               // alert('Sila Tunggu');

					                            },
					                            success: function(response){
					                            	if(response){
					                            		$("#div_severity").html(response);
					                            	}

					                            	//alert(response);
					                            	
					                            }
					                    });
						}

						function get_customer(customerID)
						{
							var data = 
					                    {
					                    	'customerID':customerID,
					                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
					                    }

					                    
					                    $.ajax({
					                            url: '<?= base_url() ?>Ticket/get_customer',
					                            type: 'POST',
					                            dataType: 'html',
					                            data: data,
					                            beforeSend: function() {
					                               // alert('Sila Tunggu');

					                            },
					                            success: function(response){
					                            	if (!$.trim(response)){ 

					                            	} else {
					                            		

					                            		var id = response;
														id = id.replace(/&/g, '')
														     .replace(/>/g, '')
														     .replace(/</g, '')
														     .replace(/\n/g, '');
														$("#tp_cuID").val(id);
														$("#ticket_customer_id").val(id);
														get_customerID();
														
					                            	}
					                               
					                            }
					                    });
						}

						function get_customerID()
						{
							var customerID = $("#tp_cuID").val();

							var customerID = $.trim(customerID); //trim	

							var data = 
					                    {
					                    	'customerID':customerID,
					                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
					                    }

					                    
					                    $.ajax({
					                            url: '<?= base_url() ?>Ticket/get_customerID',
					                            type: 'POST',
					                            dataType: 'html',
					                            data: data,
					                            beforeSend: function() {
					                               // alert('Sila Tunggu');

					                            },
					                            success: function(response){
					                            	if (!$.trim(response)){ 

					                            	} else {
					                            		var id = response;
														var id = $.trim(id); //trim	

														$("#tp_cu").html('<option value=""> -- Select Customer User -- </option>'+id);
					                            	}
					                               
					                            }
					                    });
						}


					</script>


					

					



			</form>	

		</div>
	</section>
</div>



<script type="text/javascript">

	function cancel2()
    {
        var id = "<?= $this->uri->segment(3)?>";
        window.location.href="<?= base_url()?>Ticket/Ticket_DetailTicket/"+id;
    }

    
	function submit()
	{
		
	}

	// function submit()
	// {	
	// 	var data = CKEDITOR.instances.ckedtor.getData();
	// 	var userfile = $("#userfile").val();
	// 	var data = 
 //                {
 //                	'userfile':userfile,
 //                	'text_editor':data,
 //                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
 //                }

                
 //                $.ajax({
 //                        url: '<?= base_url() ?>Ticket/add_ticket',
 //                        type: 'POST',
 //                        dataType: 'html',
 //                        data: data,
 //                        enctype: 'multipart/form-data',
 //                        beforeSend: function() {
 //                           // alert('Sila Tunggu');

 //                        },
 //                        success: function(response){
                            
                           
 //                        }
 //                });
	// }

	// this is the id of the form
	// $("#idForm").submit(function(e) {

	// 	e.preventDefault(); // avoid to execute the actual submit of the form.

	//     var url = "<?= base_url()?>ticket/add_ticket"; // the script where you handle the form input.
	//     var formData = $(this).serialize();

	//     $.ajax({
	//            type: "POST",
	//            url: url,
	//            data: formData, // serializes the form's elements.

	//            beforeSend: function() {
 //                   // alert('Sila Tunggu');
 //                   alert('success add');
 //               },
	//            success: function(data)
	//            {
	//                //alert('Success add'); // show response from the php script.
	//            },
	//            error: function(){
	//                alert("error in ajax form submission");
	//            }
	//          });
	// 	return false;    
	    
	// });




// start code location
	$(document).ready(function (){

		            var data = 
                    {
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>CMDB/getAllLoc',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                                if(response!=''){
                                    $('#list_loc').html(response);
                                }
                               
                            }
                    });
		        });
	//end

</script>


<script type="text/javascript">
	$(document).ready(function (){
		var data = 
                {
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                }

                
                $.ajax({
                        url: '<?= base_url() ?>Ticket/List_ref_no',
                        type: 'POST',
                        dataType: 'html',
                        data: data,
                        beforeSend: function() {
                           // alert('Sila Tunggu');

                        },
                        success: function(response){
                            if(response!=''){
                                $('#list_ref').html(response);
                            }
                           
                        }
                });
    });
</script>


<script type="text/javascript">
	$(document).ready(function (){
		//var customerID = $("#ticket_customer_id").val();
		//get_customerID(customerID);
		var id_ticket = "<?= $id ?>";
		list_custUser(id_ticket);
	});

	function list_custUser(id_ticket)
	{
		var id_ticket = $.trim(id_ticket); //trim	

		var data = 
                    {
                    	'id_ticket':id_ticket,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ticket/list_custUser',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                            	if (!$.trim(response)){ 

                            	} else {
                            		$("#data_list").show();
                            		$("#list_data").html(response);
                            	}
                               
                            }
                    });
	}

	function delete_custUser(id)
	{
		var data = 
                    {
                    	'id':id,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ticket/delete_custUser',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                            	var id_ticket = "<?= $id ?>";
								list_custUser(id_ticket);
                               
                            }
                    });	
	}

	function show_cu()
	{
		$("#show_cu").show();
	}
</script>