<script type="text/javascript" src="<?=base_url()?>asset_admin/bower_components/ckeditor/ckeditor.js"></script>

<div class="content-wrapper">

	<section class="content">
		<?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> New Phone Ticket </h5>
		<div class="row">

			<form id="idForm" action="<?=base_url()?>ticket/add_ticket" method="post" enctype="multipart/form-data">

				<input type="hidden" name="type_module" value="phone">
				<input type="hidden" name="type_dothis" value="manual">
				<input type="hidden" name="" id="other_id">
				<div class="">

					<!-- FIRST -->
					<div class="col-md-4">
						<div class="panel-group">
						  <div class="panel panel-danger">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" href="#collapse1" id="cust">
						        	<label> 
						        		<span class="fa fa-group" aria-hidden="true"></span>  
						    			CUSTOMER INFORMATION 
						    		</label>
						    	</a>

						    	<a href="<?= base_url()?>Customer/CUA_FormCustomer" target="_blank">
						    		<span class="pull-right" style="font-size: 15px;"><i class="fa fa-user-circle" aria-hidden="true"></i> New User</span>
						    	</a>
						    	
						      </h4>
						    </div>
						    <div id="collapse1" class="panel-collapse collapse in">
						      <div class="panel-body">

						      	<div class="col-md-12">
							      	<div class="form-group col-md-6">
					                  <label for="exampleInputEmail1">Type Enviroment</label>
					                  <select class='form-control' name='sla_type_main2' id='sla_type_main2' disabled="disabled">
					  						<option value=''>< Please Select ></option>
					  						<option value='noc'>NOC</option>
					  						<option value='hospital'>Hospital</option>
					  				  </select>
					                </div>

					                <div class="form-group col-md-6" style="display: none">
					                  <label for="exampleInputEmail1">Type Enviroment</label>
					                  <select class='form-control' name='sla_type_main' id='sla_type_main'>
					  						<option value=''>< Please Select ></option>
					  						<option value='noc'>NOC</option>
					  						<option value='hospital'>Hospital</option>
					  				  </select>
					                </div>


						      		<div class="form-group col-md-6">
					                  <label for="exampleInputEmail1" id="label_ref">* Reference No</label>
					                  <input type='text' class='form-control' name='tp_ReferenceNo' id='tp_ReferenceNo' onkeyup="ref_no();" list="list_ref">
					                  <span id="alert_tp_ReferenceNo."></span> 
					                </div>
					                <datalist id="list_ref"></datalist>
				                </div>

								<div class="col-md-12">
									<div class="form-group col-md-6">
					                  <label for="exampleInputEmail1">Service</label>
					                  <input type='text' class='form-control' name='tp_service' id='tp_service' list="list_services"> 
					                  <datalist id="list_services"><?= all_services() ?></datalist>
					                </div>
									
							

									<div class="form-group col-md-6">
					                  <label for="exampleInputEmail1">* Service Level Agreement</label>
					                  <select class="form-control" name='tp_sla' id='tp_sla' required="required">
					                  	<option value="">-- Select SLA --</option>
					                  	<?= all_sla() ?>
					                  </select>
					                </div>
								</div>
								
								
								

								<div class="col-md-12">
					                <div class="form-group col-md-6">
					                  <label for="exampleInputEmail1">* Customer User</label>
					                  <input list="browsers_cu" class="form-control" name='tp_cu' id='tp_cu'>
					                </div>

					                <datalist id="browsers_cu"> </datalist>



									<div class="form-group col-md-6">
					                  <label for="exampleInputEmail1">* ITSM Category</label>
					                  <input type='text' class='form-control' name='tp_itsm' id='tp_itsm' required="required">
					                  <span id="alert_tp_itsm"></span> 
					                </div>
					            </div>


					            <div class="col-md-12">
									<div class="form-group col-md-6" id="location_div">
					                  <label for="exampleInputEmail1">Location</label>
					                  <input type='text' class='form-control' name='tp_loc' id='tp_loc'> 
					                </div>

					                <div class="form-group col-md-6" id="email_div">
					                  <label for="exampleInputEmail1">Email Customer</label>
					                  <input type='text' class='form-control' name='tp_email' id='tp_email'> 
					                </div>

					                <!-- LATEST -->
					                <div class="form-group col-md-6" id="phone_div">
					                  <label for="exampleInputEmail1">Phone No</label>
					                  <input type='text' class='form-control' name='tp_phone' id='tp_phone'> 
					                </div>

					                <div class="form-group col-md-6" id="ext_div">
					                  <label for="exampleInputEmail1">Extension No</label>
					                  <input type='text' class='form-control' name='tp_extension' id='tp_extension'> 
					                </div>
					                <!-- LATEST -->
							
									<div class="form-group col-md-6" id="custID_div">
					                  <label for="exampleInputEmail1">* Customer ID</label>
					                  <input type='text' class='form-control' name='tp_cuID' id='tp_cuID'> 
					                </div>


					                <div class="form-group col-md-6" style="display: none" id="faultCat_div">
					                  <label for="exampleInputEmail1">Fault Category</label>
					                  <select class="form-control" name='tp_faultCategory' id='tp_faultCategory'>
					                  	<option value="">-- Select Fault Category --</option>
					                  	<?= pull_data_FaultCategoryType()?>
					                  </select>
					                </div>
					            </div>

				                

					     	 </div>
						      <div class="panel-footer"></div>
						    </div>
						  </div>
						</div>
					</div>
					<!-- END -->

					<script type="text/javascript">
						function ref_no()
						{
							var tp_ReferenceNo = $("#tp_ReferenceNo").val();
							var load = setTimeout(function() {
							    get_other_id(tp_ReferenceNo);
							}, 2000);
						}

						function get_other_id(tp_ReferenceNo)
						{
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

					                             	get_location(cat,other_id);
					                             	get_service(service);
					                             	//get_cust_user_link(service);
					                             	//get_customerID(service)
					                             	get_sla(sla);
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
					                            		
					                            		var id = $.trim(response);
														

														$("#tp_loc").val(id);
														get_customerID(id);
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
					                            		var id = $.trim(response);
														

														$("#tp_service").val(id);

														
					                            	}
					                               
					                            }
					                    });
						}

						function get_cust_user_link(id)
						{
							var data = 
					                    {
					                    	'id':id,
					                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
					                    }

					                    
					                    $.ajax({
					                            url: '<?= base_url() ?>Ticket/get_cust_user_link',
					                            type: 'POST',
					                            dataType: 'html',
					                            data: data,
					                            beforeSend: function() {
					                               // alert('Sila Tunggu');

					                            },
					                            success: function(response){

					                            }
					                          })
						}

						$("#tp_sla").change(function (){
							var sla = $("#tp_sla").val();
							get_lookup_severity(sla);
						});

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
					                            		var id = $.trim(response);

														$("#tp_sla").val(id);

														get_lookup_severity(id);
					                            	}
					                               
					                            }
					                    });
						}


						function get_lookup_severity(id)
						{
							var data = 
					                    {
					                    	'id':id,
					                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
					                    }

					                    
					                    $.ajax({
					                            url: '<?= base_url() ?>Ticket/get_lookup_severity',
					                            type: 'POST',
					                            dataType: 'html',
					                            data: data,
					                            beforeSend: function() {
					                               // alert('Sila Tunggu');

					                            },
					                            success: function(response){
					                            	if(response){
					                            		$("#Severity_div").html(response);
					                            	}
					                            	
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
					                            		

					                            		var id = $.trim(response);
														$("#tp_cuID").val(id);
														
														
					                            	}
					                               
					                            }
					                    });
						}

						function get_customerID(id)
						{
							//var customerID = $("#tp_cuID").val();

							//var customerID = $.trim(customerID); //trim	

							var sla_type_main = $("#sla_type_main").val();

							if(sla_type_main=='hospital'){
								get_customerID_all();
							} else {



								var customerID = id;

								var data = 
						                    {
						                    	'customerID':customerID,
						                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
						                    }

						                    
						                    $.ajax({
						                            url: '<?= base_url() ?>Ticket/get_customerID_name',
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

															$("#browsers_cu").html('<option value=""> -- Select Customer User -- </option>'+id);
						                            	}
						                               
						                            }
						                    });

						    }
						}


						$("#tp_cu").change(function (){
							var tp_cu = $("#tp_cu").val();

							get_contact_no(tp_cu);

							var data = 
						                {
						                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
						                    'tp_cu':tp_cu
						                }

						                
						                $.ajax({
						                        url: '<?= base_url() ?>Ticket/Get_Email',
						                        type: 'POST',
						                        dataType: 'html',
						                        data: data,
						                        beforeSend: function() {
						                           // alert('Sila Tunggu');

						                        },
						                        success: function(response){
						                            if(response!=''){
						                                $('#tp_email').val(response);
						                            }
						                           
						                        }
						                });
						});

						function get_contact_no(tp_cu)
						{
							var data = 
						                {
						                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
						                    'tp_cu':tp_cu
						                }

						                
						                $.ajax({
						                        url: '<?= base_url() ?>Ticket/Get_Phone',
						                        type: 'POST',
						                        dataType: 'html',
						                        data: data,
						                        beforeSend: function() {
						                           // alert('Sila Tunggu');

						                        },
						                        success: function(response){
						                            if(response!=''){
						                                $('#tp_phone').val(response);
						                            }
						                           
						                        }
						                });
						}

					</script>


					<!-- SECOND -->
					<div class="col-md-5">
						<div class="panel-group">
						  <div class="panel panel-danger">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" href="#collapse2">
						        	<label> 
						        		<span class="fa fa-ticket" aria-hidden="true"></span>  
						    			TICKET INFORMATION 
						    		</label>
						    	</a>
						      </h4>
						    </div>
						    <div id="collapse2" class="panel-collapse collapse in">
						      <div class="panel-body">

						      	<div class="col-md-12" id="fault_itsm_div" style="display: none">
									<div class="form-group col-md-6">
					  					<label for="exampleInputEmail1">Fault ITSM Category</label>
					  					<select class='form-control' name='fault_itsm_cat' id='fault_itsm_cat' >
					  						<option value=''>< Please Select ></option>
					          				<?= lookup_fault_itsm_category(); ?>	
					          				  </select>
					  					<span id="alert_fault_itsm_cat"></span> 
					                </div>
							
									<div class="form-group col-md-6" id="problem_desc_itsm_div" style="display: none">
										<label for="exampleInputEmail1">Problem Description</label>
					  					<select class='form-control' name='problem_desc_itsm' id='problem_desc_itsm' >
					  						<option value=''>< Please Select ></option>
					          				<?= lookup_problem_desc(); ?>	
					          				  </select>
					  					<span id="alert_problem_desc_itsm"></span>
					                </div>
					            </div>

						      	<div class="col-md-12">
							      	<div class="form-group col-md-6">
					                  <label for="exampleInputEmail1">* Subject/ Title</label>
					                  <input type='text' class='form-control' name='tp_title' id='tp_title' required="required">
					                  <span id="alert_tp_title"></span>  
					                </div>
							
									<div class="form-group col-md-6">
					  					<label for="exampleInputEmail1">* Type</label>
					  					<select class='form-control' name='tp_type' id='tp_type' required="required">
					  						<option value=''>< Please Select ></option>
					  						<?= lookup_ticket_type(); ?>
					          				  </select>
					  					<span id="alert_tp_type"></span> 
					                </div>
				            	</div>
								

								<div class="col-md-12">
									<div class="form-group col-md-6">
					  					<label for="exampleInputEmail1">* To Queue</label>
					  					<select class='form-control' name='tp_queue' id='tp_queue' required="required">
					  						<option value=''>< Please Select ></option>
					          					<?= lookup_queue(); ?>
					          				  </select>
					  						<span id="alert_tp_queue"></span> 
					                </div>
							
									
								
									<div class="Field col-md-6" style="display: none">
							              <label for="exampleInputEmail1">Option</label>
							              <a href="#" id="OptionCustomer">[ Customer user ]</a>
							              <a href="/otrs/index.pl?Action=AgentLinkObject;Mode=Temporary;SourceObject=Ticket;SourceKey=1529369800.4352692.81022596;TargetIdentifier=ITSMConfigItem" id="OptionLinkTicket" class="AsPopup">[ Link ticket ]</a>
							              <a  href="#" id="OptionFAQ">[ FAQ ]</a>
							        </div>

							        <div class="form-group col-md-6">
					                  <label for="exampleInputEmail1">Attachment</label>
					                  <input type='file' class='form-control' name='userfile' id='userfile'> 
					                </div>

							   	</div>
								

								


								
								<div class="col-md-12">
									<div class="form-group col-md-6" id="pendingdate_div">
					                  <label for="exampleInputEmail1">Pending Date</label>
					                  <input type='text' class='datepicker form-control' name='tp_calendar' id='tp_calendar'> 
					                </div>

					                <div class="form-group col-md-6" id="impact_div">
					  					<label for="exampleInputEmail1">Impact</label>
					  					<select class='form-control' name='tp_impact' id='tp_impact'>
					  						<option value=''>< Please Select ></option>
					          					<?= lookup_priority_type(); ?>
					          				  </select>
					                </div>

					                <div class="form-group col-md-6" style="display: none" id="Severity_div">
					  					<label for="exampleInputEmail1">* Severity</label>
					  					<select class='form-control' name='tp_severity' id='tp_severity' required="required">
					  						<option value=''>< Please Select ></option>
					          					<?= lookup_severity(); ?>
					          				  </select>
					                </div>
								</div>

				                


				                <div class="col-md-12">
									<div class="form-group col-md-6" id="prio_div">
					  					<label for="exampleInputEmail1">Priority</label>
					  					<select class='form-control' name='tp_priority' id='tp_priority'>
					  						<option value=''>< Please Select ></option>
					          					<?= lookup_priority_type(); ?>	
					          				  </select>
					                </div>
							
									<div class="form-group col-md-6" id="mline_div">
					  					<label for="exampleInputEmail1">*Main Line Status</label>
					  					<select class='form-control' name='tp_mls' id='tp_mls'>
					  						<option value=''>< Please Select ></option>
					          					<?= lookup_main_line_status(); ?>
					          				  </select>
					  						<span id="alert_tp_mls"></span> 
					                </div>
					            </div>
								

								<div class="col-md-12">
									<div class="form-group col-md-6" id="btype_div">
					  					<label for="exampleInputEmail1">*Backup Type</label>
					  					<select class='form-control' name='tp_bt' id='tp_bt'>
					  						<option value=''>< Please Select ></option>
					          				<?= lookup_backup_type(); ?>	
					          				  </select>
					  					<span id="alert_tp_bt"></span> 
					                </div>
							
									<div class="form-group col-md-6" id="bstatus_div">
					  					<label for="exampleInputEmail1">*Backup Status</label>
					  					<select class='form-control' name='tp_bs' id='tp_bs'>
					  						<option value=''>< Please Select ></option>
					          					<?= lookup_main_line_status(); ?>
					          				  </select>
					  						<span id="alert_tp_bs"></span> 
					                </div>
					            </div>



					            <div class="col-md-12">
									<div class="RichTextField col-md-12">
					                  <label for="exampleInputEmail1">Text</label>
					                  <!-- <textarea rows="4" class='form-control' name='tp_text' id='tp_text'> </textarea>  -->

					                  <textarea class="ckeditor" name="html_link_content" id="ckedtor"></textarea>
					                </div>
								</div>


						      </div>
						      <div class="panel-footer"></div>
						    </div>
						  </div>
						</div>
					</div>
					<!-- END -->



					<!-- THIRD -->
					<div class="col-md-3">
						<div class="panel-group">
						  <div class="panel panel-danger">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" href="#collapse3">
						        	<label> 
						        		<span class="fa fa-user" aria-hidden="true"></span>  
						    			AGENT INFORMATION 
						    		</label>
						    	</a>
						      </h4>
						    </div>
						    <div id="collapse3" class="panel-collapse collapse in">
						      <div class="panel-body">


						      	<div class="col-md-12">
							      	<div class="form-group col-md-12">
					                  	<label for="exampleInputEmail1">* Ticket Owner</label>
					                  	<select class='form-control' name='tp_to2' id='tp_to2' disabled="disabled">
					                 		<?php $first_name = $this->session->userdata('first_name');?>
					  						<?= lookup_agent_selected($first_name); ?>
					          			</select>
					                  <span id="alert_tp_to2"></span> 
					                </div>

							      	<div class="form-group col-md-12" style="display: none">
					                  	<label for="exampleInputEmail1">* Ticket Owner</label>
					                  	<select class='form-control' name='tp_to' id='tp_to'>
					                 		<?php $first_name = $this->session->userdata('first_name');?>
					  						<?= lookup_agent_selected($first_name); ?>
					          			</select>
					                  <span id="alert_tp_to"></span> 
					                </div>

					                <div class="form-group col-md-12">
					  					<label for="exampleInputEmail1">Filter Responsible By Group</label>
					  					<select class='form-control' name='tp_filter_r' id='tp_filter_r'>
					  						<option value=''>< Please Select ></option>
					          				<?= lookup_filter_responsible(); ?>	
					          			</select>
					                </div>

					                <script type="text/javascript">
					                	$("#tp_filter_r").change(function (){
					                		var tp_filter_r = $("#tp_filter_r").val();

					                		if(tp_filter_r){
					                			filter_responsible(tp_filter_r);
					                		}

					                	});

					                	function filter_responsible(group)
					                	{
					                		var data = 
						                    {
						                    	'group':group,
						                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
						                    }

						                    
						                    $.ajax({
						                            url: '<?= base_url() ?>Ticket/filter_responsible',
						                            type: 'POST',
						                            dataType: 'html',
						                            data: data,
						                            beforeSend: function() {
						                               // alert('Sila Tunggu');
						                               $("#tp_r").prop('disabled',true);
						                            },
						                            success: function(response){
						                                $('#tp_r').html(response);
						                                $("#tp_r").prop('disabled',false);
						                               
						                            }
						                    });
					                	}
					                </script>
							
									<div class="form-group col-md-12">
					  					<label for="exampleInputEmail1">*Responsible</label>
					  					<select class='form-control' name='tp_r' id='tp_r' required="required">
					  						<option value=''>< Please Select ></option>
					          				<?= lookup_agent(); ?>	
					          			</select>
					  					<span id="alert_tp_r"></span>
					                </div>

					                <div class="form-group col-md-12">
					                	<br>
					                	<button type="submit" class="btn btn-primary btn-block">Create</button>
					            	</div>
					            </div>
						     	</div>
						      <div class="panel-footer"></div>
						    </div>
						  </div>
						</div>
					</div>
					<!-- END -->


				</div>

			</form>	

		</div>
	</section>
</div>



<script type="text/javascript">
	

	function submit()
	{
		
	}

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

    $("#sla_type_main").change(function (){
    	var sla_type_main = $("#sla_type_main").val();
    	if(sla_type_main=='hospital'){
    		$("#btype_div").hide();
    		$("#bstatus_div").hide();
    		$("#mline_div").hide();
    		$("#pendingdate_div").hide();
    		$("#custID_div").hide();
    		$("#location_div").show();
    		$("#faultCat_div").hide();
    		$("#Severity_div").show();
    		$("#fault_itsm_div").show();
    		$("#problem_desc_itsm_div").show();

    		$("#impact_div").hide();
    		$("#prio_div").hide();

    		$("#label_ref").html('Device No');

    		get_customerID_all();

    	} else if(sla_type_main=='noc'){
    		$("#btype_div").show();
    		$("#bstatus_div").show();
    		$("#mline_div").show();
    		$("#pendingdate_div").show();
    		$("#custID_div").show();
    		$("#location_div").show();
    		$("#faultCat_div").show();
    		$("#Severity_div").hide();
    		$("#fault_itsm_div").hide();
    		$("#problem_desc_itsm_div").hide();

    		$("#prio_div").show();
    		$("#impact_div").show();

    		$("#label_ref").html('Reference No');

    	} else {
    		$("#btype_div").show();
    		$("#bstatus_div").show();
    		$("#mline_div").hide();
    		$("#pendingdate_div").hide();
    		$("#custID_div").show();
    		$("#location_div").show();
    		$("#faultCat_div").show();
    		$("#Severity_div").hide();
    		$("#fault_itsm_div").hide();
    		$("#problem_desc_itsm_div").hide();

    		$("#prio_div").show();
    		$("#impact_div").show();

    		$("#label_ref").html('Reference No');

    	}
    });


    function get_customerID_all()
	{
		//var customerID = $("#tp_cuID").val();

		//var customerID = $.trim(customerID); //trim	
        
		var data = 
                    {
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ticket/get_customerID_all',
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

									$("#browsers_cu").html('<option value=""> -- Select Customer User -- </option>'+id);
                            	}
                               
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