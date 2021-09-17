<div class="pageheader hidden-xs">
    <h3><i class="fa fa-ticket"></i> Add Ticket : Phone </h3>
    <div class="breadcrumb-wrapper">
        <span class="label" style="padding-right: 0px;"><i class="fa fa-cog" aria-hidden="true" style="border: 2px solid #f2f7f8;padding-right: 0px;"></i></span>
        <ol class="breadcrumb">
            <li> <a href="<?=base_url()?>Ticket/CreateTicket_Phone"> Create Ticket </a> </li>
            <li> <a href="<?=base_url()?>Ticket/Ticket_StatusView"> Ticket Status </a> </li>
            <li> <a href="<?=base_url()?>Ticket/MS_Overview_Open"> Master Status </a> </li>
        </ol>
    </div>
</div>



<div class="row">

	

	<form id="idForm" action="<?=base_url()?>ticket/add_ticket" method="post" enctype="multipart/form-data">

		<input type="hidden" name="type_module" value="phone">
		<input type="hidden" name="type_dothis" value="manual">
		<input type="hidden" name="" id="other_id">
		
		<div class="col-md-12">

			<div class="panel" style="background-color: #ffffff;">
	            <!--Panel heading-->
	            <div class="panel-heading ui-sortable-handle">
	                <div class="panel-control">
	                    <!-- <div class="btn-group">
	                        <button type="button" class="btn btn-sm btn-info">Left</button>
	                        <button type="button" class="btn btn-sm btn-info">Middle</button>
	                        <button type="button" class="btn btn-sm btn-info">Right</button>
	                    </div> -->
	                </div>
	                <h3 class="panel-title">Create Ticket</h3>
	            </div>
	            <!--Panel body-->
	            <div class="panel-body">
	                
	                <div class="col-md-8 col-xs-12">
	               		<div class="col-md-12 col-xs-12">
	               			<label>CUSTOMER INFORMATION</label>
	               		</div>

	               		<div class="form-group col-md-3 col-xs-12">
		                  <label for="exampleInputEmail1">Type Enviroment</label>
		                  <select class='form-control' name='sla_type_main2' id='sla_type_main2' disabled="disabled">
		  						<option value=''>< Please Select ></option>
		  						<option value='noc'>NOC</option>
		  						<option value='hospital'>Hospital</option>
		  				  </select>
		                </div>


		                <div class="form-group col-md-3 col-xs-12" style="display: none">
		                  <label for="exampleInputEmail1">Type Enviroment</label>
		                  <select class='form-control' name='sla_type_main' id='sla_type_main'>
		  						<option value=''>< Please Select ></option>
		  						<option value='noc'>NOC</option>
		  						<option value='hospital'>Hospital</option>
		  				  </select>
		                </div>

		                <div class="form-group col-md-3 col-xs-12">
		                  <label for="exampleInputEmail1" id="label_ref">* Reference No</label>
		                  <input type='text' class='form-control' name='tp_ReferenceNo' id='tp_ReferenceNo' onkeyup="ref_no();" list="list_ref">
		                  <span id="alert_tp_ReferenceNo."></span> 
		                </div>
		                <datalist id="list_ref"></datalist>


		                <div class="form-group col-md-3 col-xs-12">
		                  <label for="exampleInputEmail1">Service</label>
		                  <input type='text' class='form-control' name='tp_service' id='tp_service' list="list_services"> 
		                  <datalist id="list_services"><?= all_services() ?></datalist>
		                </div>

		                <div class="form-group col-md-3 col-xs-12">
		                  <label for="exampleInputEmail1">* SLA</label>
		                  <select class="form-control" name='tp_sla' id='tp_sla' required="required">
		                  	<option value="">-- Select SLA --</option>
		                  	<?= all_sla() ?>
		                  </select>
		                </div>


		                <div class="form-group col-md-3 col-xs-12">
		                  <label for="exampleInputEmail1">* Customer User</label>
		                  <input list="browsers_cu" class="form-control" name='tp_cu' id='tp_cu'>
		                </div>

		                <datalist id="browsers_cu"> </datalist>

						<div class="form-group col-md-3 col-xs-12">
		                  <label for="exampleInputEmail1">* ITSM Category</label>
		                  <input type='text' class='form-control' name='tp_itsm' id='tp_itsm'>
		                  <span id="alert_tp_itsm"></span> 
		                </div>


		                <div class="form-group col-md-3 col-xs-12" id="location_div">
		                  <label for="exampleInputEmail1">Location</label>
		                  <select type='text' class='form-control' name='tp_loc' id='tp_loc'>
		                  	<option value="">-Select-</option>
		                  	<?= getAllLoc() ?>
		                  </select>
		                </div>

		                <div class="form-group col-md-3 col-xs-12" id="email_div">
		                  <label for="exampleInputEmail1">Email Customer</label>
		                  <input type='text' class='form-control' name='tp_email' id='tp_email'> 
		                </div>


		                <!-- LATEST -->
		                <div class="form-group col-md-3 col-xs-12" id="phone_div">
		                  <label for="exampleInputEmail1">Phone No</label>
		                  <input type='text' class='form-control' name='tp_phone' id='tp_phone'> 
		                </div>

		                <div class="form-group col-md-3 col-xs-12" id="ext_div">
		                  <label for="exampleInputEmail1">Extension No</label>
		                  <input type='text' class='form-control' name='tp_extension' id='tp_extension'> 
		                </div>
		                <!-- LATEST -->
				
						<div class="form-group col-md-3 col-xs-12" id="custID_div">
		                  <label for="exampleInputEmail1">* Customer ID</label>
		                  <input type='text' class='form-control' name='tp_cuID' id='tp_cuID'> 
		                </div>


		                <div class="form-group col-md-3 col-xs-12" style="display: none" id="faultCat_div">
		                  <label for="exampleInputEmail1">Fault Category</label>
		                  <select class="form-control" name='tp_faultCategory' id='tp_faultCategory'>
		                  	<option value="">-- Select Fault Category --</option>
		                  	<?= pull_data_FaultCategoryType()?>
		                  </select>
		                </div>

		                <div class="col-md-12 col-xs-12">
		                	<hr>
	               			<label>TICKET INFORMATION</label>
	               		</div>


	               		<div id="fault_itsm_div" style="display: none">
							<div class="form-group col-md-3 col-xs-12">
			  					<label for="exampleInputEmail1">Fault ITSM Category</label>
			  					<select class='form-control' name='fault_itsm_cat' id='fault_itsm_cat' >
			  						<option value=''>< Please Select ></option>
			          				<?= lookup_fault_itsm_category(); ?>	
			          				  </select>
			  					<span id="alert_fault_itsm_cat"></span> 
			                </div>
					
							<div class="form-group col-md-3 col-xs-12" id="problem_desc_itsm_div" style="display: none">
								<label for="exampleInputEmail1">Problem Description</label>
			  					<select class='form-control' name='problem_desc_itsm' id='problem_desc_itsm' >
			  						<option value=''>< Please Select ></option>
			          				<?= lookup_problem_desc(); ?>	
			          				  </select>
			  					<span id="alert_problem_desc_itsm"></span>
			                </div>
			            </div>

				      	<div class="form-group col-md-6 col-xs-12">
		                  <label for="exampleInputEmail1">* Subject/ Title</label>
		                  <input type='text' class='form-control' name='tp_title' id='tp_title' required="required">
		                  <span id="alert_tp_title"></span>  
		                </div>
				
						<div class="form-group col-md-3 col-xs-12">
		  					<label for="exampleInputEmail1">* Type</label>
		  					<select class='form-control' name='tp_type' id='tp_type' required="required">
		  						<option value=''>< Please Select ></option>
		  						<?= lookup_ticket_type(); ?>
		          				  </select>
		  					<span id="alert_tp_type"></span> 
		                </div>
						
						<div class="form-group col-md-3 col-xs-12">
		  					<label for="exampleInputEmail1">* To Queue</label>
		  					<select class='form-control' name='tp_queue' id='tp_queue' required="required">
		  						<option value=''>< Please Select ></option>
		          					<?= lookup_queue(); ?>
		          				  </select>
		  						<span id="alert_tp_queue"></span> 
		                </div>
				
						
					
						<div class="Field col-md-3 col-xs-12" style="display: none">
				              <label for="exampleInputEmail1">Option</label>
				              <a href="#" id="OptionCustomer">[ Customer user ]</a>
				              <a href="/otrs/index.pl?Action=AgentLinkObject;Mode=Temporary;SourceObject=Ticket;SourceKey=1529369800.4352692.81022596;TargetIdentifier=ITSMConfigItem" id="OptionLinkTicket" class="AsPopup">[ Link ticket ]</a>
				              <a  href="#" id="OptionFAQ">[ FAQ ]</a>
				        </div>

				        <div class="form-group col-md-3 col-xs-12">
		                  <label for="exampleInputEmail1">Attachment</label>
		                  <input type='file' class='form-control' name='userfile' id='userfile'> 
		                </div>

						
						<div class="form-group col-md-3 col-xs-12" id="pendingdate_div">
		                  <label for="exampleInputEmail1">Pending Date</label>
		                  <input type='text' class='datepicker form-control' name='tp_calendar' id='tp_calendar'> 
		                </div>

		                <div class="form-group col-md-3 col-xs-12" id="impact_div">
		  					<label for="exampleInputEmail1">Impact</label>
		  					<select class='form-control' name='tp_impact' id='tp_impact'>
		  						<option value=''>< Please Select ></option>
		          					<?= lookup_priority_type(); ?>
		          				  </select>
		                </div>

		                <div class="form-group col-md-3 col-xs-12" style="display: none" id="Severity_div">
		  					<label for="exampleInputEmail1">* Severity</label>
		  					<select class='form-control' name='tp_severity' id='tp_severity' required="required">
		  						<option value=''>< Please Select ></option>
		          					<?= lookup_severity(); ?>
		          				  </select>
		                </div>
						

		                


						<div class="form-group col-md-3 col-xs-6" id="prio_div">
		  					<label for="exampleInputEmail1">Priority</label>
		  					<select class='form-control' name='tp_priority' id='tp_priority'>
		  						<option value=''>< Please Select ></option>
		          					<?= lookup_priority_type(); ?>	
		          				  </select>
		                </div>
				
						<div class="form-group col-md-3 col-xs-6" id="mline_div">
		  					<label for="exampleInputEmail1">*Main Line Status</label>
		  					<select class='form-control' name='tp_mls' id='tp_mls'>
		  						<option value=''>< Please Select ></option>
		          					<?= lookup_main_line_status(); ?>
		          				  </select>
		  						<span id="alert_tp_mls"></span> 
		                </div>
						

						<div class="form-group col-md-3 col-xs-6" id="btype_div">
		  					<label for="exampleInputEmail1">*Backup Type</label>
		  					<select class='form-control' name='tp_bt' id='tp_bt'>
		  						<option value=''>< Please Select ></option>
		          				<?= lookup_backup_type(); ?>	
		          				  </select>
		  					<span id="alert_tp_bt"></span> 
		                </div>
				
						<div class="form-group col-md-3 col-xs-6" id="bstatus_div">
		  					<label for="exampleInputEmail1">*Backup Status</label>
		  					<select class='form-control' name='tp_bs' id='tp_bs'>
		  						<option value=''>< Please Select ></option>
		          					<?= lookup_main_line_status(); ?>
		          				  </select>
		  						<span id="alert_tp_bs"></span> 
		                </div>


						<div class="RichTextField col-md-12 col-xs-12">
		                  <label for="exampleInputEmail1">Text</label>
		                  <!-- <textarea rows="4" class='form-control' name='tp_text' id='tp_text'> </textarea>  -->

		                  <textarea class="ckeditor" name="html_link_content" id="ckedtor"></textarea>
		                </div>

	               	</div>

	               	<div class="col-md-1 col-xs-12"></div>
	               	<div class="col-md-3 col-xs-12">

	               		<div class="col-md-12 col-xs-12">
	               			<label>AGENT INFORMATION</label>
	               		</div>


	               		<div class="form-group  col-md-12 col-xs-6">
		                  	<label for="exampleInputEmail1">* Ticket Owner</label>
		                  	<select class='form-control' name='tp_to2' id='tp_to2' disabled="disabled">
		                 		<?php $first_name = $this->session->userdata('first_name');?>
		  						<?= lookup_agent_selected($first_name); ?>
		          			</select>
		                  <span id="alert_tp_to2"></span> 
		                </div>

				      	<div class="form-group col-md-12 col-xs-6" style="display: none">
		                  	<label for="exampleInputEmail1">* Ticket Owner</label>
		                  	<select class='form-control' name='tp_to' id='tp_to'>
		                 		<?php $first_name = $this->session->userdata('first_name');?>
		  						<?= lookup_agent_selected($first_name); ?>
		          			</select>
		                  <span id="alert_tp_to"></span> 
		                </div>

		                <div class="form-group col-md-12 col-xs-6">
		  					<label for="exampleInputEmail1">Filter Responsible By Group</label>
		  					<select class='form-control' name='tp_filter_r' id='tp_filter_r'>
		  						<option value=''>< Please Select ></option>
		          				<?= lookup_filter_responsible(); ?>	
		          			</select>
		                </div>

		                <div class="form-group col-md-12 col-xs-6">
		  					<label for="exampleInputEmail1">*Responsible</label>
		  					<select class='form-control' name='tp_r' id='tp_r' required="required">
		  						<option value=''>< Please Select ></option>
		          				<?= lookup_agent(); ?>	
		          			</select>
		  					<span id="alert_tp_r"></span>
		                </div>

					</div>


					<div class="col-md-12 col-xs-12">
						<button class="btn btn-primary pull-right" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit</button>
					</div>
	               	
	            </div>
	        </div>

		</div>
	</form>


</div>


<style type="text/css">

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

	.pageheader .fa, .pageheader .glyphicon {
	    font-size: 12px;
	    margin-right: 5px;
	    padding: 6px 7px;
	    border: 2px solid #124f76;
	    -moz-border-radius: 10px;
	    -webkit-border-radius: 10px;
	    border-radius: 10px;
	}

	.pageheader h3 {
	    font-size: 15px;
	    color: #165a84;
	    letter-spacing: -.5px;
	    margin: 0;
	}

	.pageheader .breadcrumb-wrapper .label {
	    color: #165a84;
	    text-transform: uppercase;
	    font-weight: 400;
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


	#footer {
	    background: #edf1f2;
	    border-top: rgba(0,0,0,0.07);
	    position: relative;
	    padding-top: 15px;
	    bottom: 0;
	    z-index: 2;
	    left: 0;
	    right: 0;
	    height: 50px;
	}

</style>


<script type="text/javascript" src="<?=base_url()?>asset_admin/bower_components/ckeditor/ckeditor.js"></script>



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