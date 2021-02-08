
<!-- <link rel="stylesheet" href="<?= base_url()?>asset_speak2talk/shoelace.css"> -->
<link rel="stylesheet" href="<?= base_url()?>asset_speak2talk/styles.css">

<div class="content-wrapper">
	<section class="content">
		<?//= lookup_navbar(); ?>
        <h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Overview Module </h5>
        <div class="row">
            
            <!-- FIRST -->
	            <div class="col-md-12">

					<div class="box box-success">
			          <div class="box-header with-border">
			            <h3 class="box-title"> <b>Overview Module</b></h3>
			          </div>
			          <div class="box-body-white">
                     	   
			          <?php $idModule = $this->session->userdata('idModule'); ?>
			          <?php //var_dump($idModule); ?>
			          	<div class="nav-tabs-custom">
						  <ul class="nav nav-tabs pull-right">
						  	<?php if(!empty($idModule)&& in_array('Admin',$idModule)){ ?>
						    	<li><a id="admin_tab" href="#tab_1-1" data-toggle="tab">Admin</a></li>
						    <?php } ?>
						    <?php if(!empty($idModule)&& in_array('Service',$idModule)){ ?>
						    	<li><a id="service_tab" href="#tab_2-2" data-toggle="tab">Service</a></li>
						    <?php } ?>
						    <?php if(!empty($idModule)&& in_array('CMDB',$idModule)){ ?>
						    	<li><a id="cmdb_tab" href="#tab_3-2" data-toggle="tab">Asset / Inventory</a></li>
						    <?php } ?>
						    
						    <?php if(!empty($idModule)&& in_array('Ticket',$idModule)){ ?>
						    	<li><a id="ticket_tab" href="#tab_5-2" data-toggle="tab">Ticket</a></li>
						    <?php } ?>
						    <?php if(!empty($idModule)&& in_array('Report',$idModule)){ ?>
						    	<li><a id="report_tab" href="#tab_6-2" data-toggle="tab">Report</a></li>
						    <?php } ?>

						    <?php if(!empty($idModule)&& in_array('Customer',$idModule)){ ?>
						    	<li><a id="customer_tab" href="#tab_4-2" data-toggle="tab">Customer</a></li>
						    <?php } ?>

						    <li><a href="<?= base_url()?>knowledgebase">Knowledge Base</a></li>

						    <li><a href="<?= base_url()?>dashboard">Dashboard</a></li>
						    


						    <li class="active"><a href="#tab_7-2" data-toggle="tab">Overview</a></li>


						    <li class="pull-left header"><i class="fa fa-th"></i> Overview Module</li>
						  </ul>
						  <div class="tab-content">
						    <div class="tab-pane" id="tab_1-1">
						      	<div class="row">
						      		<!-- NEW ADMIN -->
									<div class="col-md-4" class="hospital_features">
										<div class="panel-group">
										  <div class="panel panel-default" style="border: transparent;">
										    <div class="panel-heading">
										      <h4 class="panel-title">
										        <a data-toggle="collapse" href="#test_v3"><i class="fa fa-share-alt"></i> Agent Management </a>
										      </h4>
										    </div>
										    <div id="test_v3" class="panel-collapse collapse in" style="background-color:#5d95bdbf;">
										      
										      	<center>
											      	<img src="<?= base_url()?>asset/icon/agent2.png" alt="Smiley face" width="120px;">
											      	<h4>
											      		<a href="#tab_admin-1" data-toggle="tab">
											      			<font color="#fff" class="font-small">Agent Management<br><br></font>
											      		</a>
											      	</h4>
										     	</center>

										    </div>
										  </div>
										</div>
									</div>

									<div class="col-md-4" class="hospital_features">
										<div class="panel-group">
										  <div class="panel panel-default" style="border: transparent;">
										    <div class="panel-heading">
										      <h4 class="panel-title">
										        <a data-toggle="collapse" href="#t2"><i class="fa fa-share-alt"></i> Service Management </a>
										      </h4>
										    </div>
										    <div id="t2" class="panel-collapse collapse in" style="background-color:#5d95bdbf;">
										      
										      	<center>
											      	<img src="<?= base_url()?>asset/icon/support.png" alt="Smiley face" width="120px;">
											      	<h4>
											      		<a href="#tab_admin-2" data-toggle="tab">
											      			<font color="#fff" class="font-small">Service Management<br><br></font>
											      		</a>
											      	</h4>
										     	</center>

										    </div>
										  </div>
										</div>
									</div>

									<div class="col-md-4" class="hospital_features">
										<div class="panel-group">
										  <div class="panel panel-default" style="border: transparent;">
										    <div class="panel-heading">
										      <h4 class="panel-title">
										        <a data-toggle="collapse" href="#t3"><i class="fa fa-share-alt"></i> Asset / Inventory Management </a>
										      </h4>
										    </div>
										    <div id="t3" class="panel-collapse collapse in" style="background-color:#5d95bdbf;">
										      
										      	<center>
											      	<img src="<?= base_url()?>asset/icon/inventory.png" alt="Smiley face" width="120px;">
											      	<h4>
											      		<a href="#tab_admin-3" data-toggle="tab">
											      			<font color="#fff" class="font-small">Asset / Inventory Management<br><br></font>
											      		</a>
											      	</h4>
										     	</center>

										    </div>
										  </div>
										</div>
									</div>

									<div class="col-md-4" class="hospital_features">
										<div class="panel-group">
										  <div class="panel panel-default" style="border: transparent;">
										    <div class="panel-heading">
										      <h4 class="panel-title">
										        <a data-toggle="collapse" href="#t4"><i class="fa fa-share-alt"></i> Customer Management </a>
										      </h4>
										    </div>
										    <div id="t4" class="panel-collapse collapse in" style="background-color:#5d95bdbf;">
										      
										      	<center>
											      	<img src="<?= base_url()?>asset/icon/customer.png" alt="Smiley face" width="120px;">
											      	<h4>
											      		<a href="#tab_admin-4" data-toggle="tab">
											      			<font color="#fff" class="font-small">Customer Management<br><br></font>
											      		</a>
											      	</h4>
										     	</center>

										    </div>
										  </div>
										</div>
									</div>

									<div class="col-md-4" class="hospital_features">
										<div class="panel-group">
										  <div class="panel panel-default" style="border: transparent;">
										    <div class="panel-heading">
										      <h4 class="panel-title">
										        <a data-toggle="collapse" href="#t5"><i class="fa fa-share-alt"></i> Ticket Management </a>
										      </h4>
										    </div>
										    <div id="t5" class="panel-collapse collapse in" style="background-color:#5d95bdbf;">
										      
										      	<center>
											      	<img src="<?= base_url()?>asset/icon/ticket.png" alt="Smiley face" width="120px;">
											      	<h4>
											      		<a href="#tab_admin-5" data-toggle="tab">
											      			<font color="#fff" class="font-small">Ticket Management<br><br></font>
											      		</a>
											      	</h4>
										     	</center>

										    </div>
										  </div>
										</div>
									</div>

									<div class="col-md-4" class="hospital_features">
										<div class="panel-group">
										  <div class="panel panel-default" style="border: transparent;">
										    <div class="panel-heading">
										      <h4 class="panel-title">
										        <a data-toggle="collapse" href="#t6"><i class="fa fa-share-alt"></i> Email Management </a>
										      </h4>
										    </div>
										    <div id="t6" class="panel-collapse collapse in" style="background-color:#5d95bdbf;">
										      
										      	<center>
											      	<img src="<?= base_url()?>asset/icon/email.png" alt="Smiley face" width="120px;">
											      	<h4>
											      		<a href="#tab_admin-6" data-toggle="tab">
											      			<font color="#fff" class="font-small">Email Management<br><br></font>
											      		</a>
											      	</h4>
										     	</center>

										    </div>
										  </div>
										</div>
									</div>


									<div class="col-md-4" class="hospital_features">
										<div class="panel-group">
										  <div class="panel panel-default" style="border: transparent;">
										    <div class="panel-heading">
										      <h4 class="panel-title">
										        <a data-toggle="collapse" href="#t7"><i class="fa fa-share-alt"></i> Administrator Management </a>
										      </h4>
										    </div>
										    <div id="t7" class="panel-collapse collapse in" style="background-color:#5d95bdbf;">
										      
										      	<center>
											      	<img src="<?= base_url()?>asset/icon/admin.png" alt="Smiley face" width="120px;">
											      	<h4>
											      		<a href="#tab_admin-7" data-toggle="tab">
											      			<font color="#fff" class="font-small">Administrator Management<br><br></font>
											      		</a>
											      	</h4>
										     	</center>

										    </div>
										  </div>
										</div>
									</div>
									<!-- END -->

						    		<?//= agent_menu() ?>
								</div>
						    </div>

						    <!-- NEW ADMIN -->
						    <div class="tab-pane" id="tab_admin-1">
						      	<div class="row">
						    		<?= agent_management() ?>
								</div>
						    </div>
						    <div class="tab-pane" id="tab_admin-2">
						      	<div class="row">
						    		<?= service_management() ?>
								</div>
						    </div>
						    <div class="tab-pane" id="tab_admin-3">
						      	<div class="row">
						    		<?= inventory_management() ?>
								</div>
						    </div>
						    <div class="tab-pane" id="tab_admin-4">
						      	<div class="row">
						    		<?= customer_management() ?>
								</div>
						    </div>
						    <div class="tab-pane" id="tab_admin-5">
						      	<div class="row">
						    		<?= ticket_management() ?>
								</div>
						    </div>
						    <div class="tab-pane" id="tab_admin-6">
						      	<div class="row">
						    		<?= email_management() ?>
								</div>
						    </div>
						    <div class="tab-pane" id="tab_admin-7">
						      	<div class="row">
						    		<?= admin_management() ?>
								</div>
						    </div>
						    <!-- END -->







						    <!-- /.tab-pane -->
						    <div class="tab-pane" id="tab_2-2">
						      	<div class="row">
						    		<?= service_menu() ?>
								</div>
						    </div>
						    <!-- /.tab-pane -->
						    <div class="tab-pane" id="tab_3-2">
						      	<div class="row">
						    		<?= cmdb_menu() ?>
								</div>
						    </div>
						    <!-- /.tab-pane -->

						    <div class="tab-pane" id="tab_4-2">
						    	<div class="row">
						    		<?= customer_menu() ?>
								</div>
						    </div>

						    <div class="tab-pane" id="tab_5-2">
						    	<div class="row">
						    		<?= ticket_menu() ?>
								</div>
						    </div>

						    <div class="tab-pane" id="tab_6-2">
						    	<div class="row">
						    		<?php if($this->session->userdata('env')=='noc'){ ?>
						    		<?= report_menu() ?>
						    		<?php } ?>

						    		<?php if($this->session->userdata('env')=='hospital'){ ?>
						    		<?= report_menu_hospital() ?>
						    		<?php } ?>
								</div>
						    </div>

						    <div class="tab-pane active" id="tab_7-2">
						    	<div class="row">
						    		<div class="col-md-6">
						    			<br><br><br><img src="<?= base_url()?>asset/ticket.png"  width="100%">
									</div>
									<div class="col-md-6">
										<br><font size="6px">NEXDESK</font> Monitoring System is a service management suite that comprises ticketing, workflow automation and notification, along with a wide range of customizable features. It is used by IT service management, customer service and corporate security help desks to better structure their communication and tasks.
										<br><br> The modules are available in this system : <br><br>

										<a onclick="admin_tab()">
											<font size="4px"><i class="fa fa-user-circle" aria-hidden="true"></i> Admin </font>
										</a>
										<p> Admin will manage this system by coordinating data with system requirements <br>All administration is done in this module</p>
 										
 										<a onclick="service_tab()">
 											<font size="4px"><i class="fa fa-tasks" aria-hidden="true"></i> Services </font>
 										</a>
 										<p> All service and data requirements for service in the update here </p>

 										<a onclick="cmdb_tab()">
 											<font size="4px"><i class="fa fa-sliders" aria-hidden="true"></i> Asset / Inventory </font>
 										</a>
 										<p> This module involves networking, computers, hardware and software that interconnect with the system </p>


 										<a onclick="customer_tab()">
 											<font size="4px"><i class="fa fa-users" aria-hidden="true"></i> Customers </font>
 										</a>
 										<p> Any dealings with customers are provided in this module </p>

 										<a onclick="ticket_tab()">
 											<font size="4px"><i class="fa fa-ticket" aria-hidden="true"></i> Ticket </font>
 										</a>
 										<p> This is the heart of the system. All ticket deals are valid in this module </p>

 										<a onclick="report_tab()">
 											<font size="4px"><i class="fa fa-bar-chart" aria-hidden="true"></i> Report </font>
 										</a>
 										<p> This module provides reports that apply to this system </p>

 										<a href="<?= base_url()?>Knowledgebase">
 										<font size="4px" color="black"><i class="fa fa-book" aria-hidden="true"></i> Knowledge Base </font>
 										</a>
 										<p> This module for reference of any procedure, topic and issue </p>

 										<a href="<?= base_url()?>dashboard">
 										<font size="4px" color="black"><i class="fa fa-tv" aria-hidden="true"></i> Dashboard </font>
 										</a>
 										<p> This module is an acronym that occurred in the transaction system </p>

									</div>
								</div>
						    </div>

						    <!-- Voice -->
						    <div class="input-single" style="display: none">
							    <textarea  id="note-textarea" placeholder="Create a new note by typing or using voice recognition." rows="6"></textarea>
							</div>
							<button id="start-record-btn" title="Start Recording" style="display: none">Start Recognition</button>
							<!-- END -->

						  </div>
						  <!-- /.tab-content -->
						</div>


					  </div>
					</div>
				</div>
			<!-- END -->

			<!-- SECOND -->
				<!-- <div class="col-md-3 hidden-xs">
					<div class="col-md-11">
	                <?//= lookup_widget(); ?>
	                </div>
	                <div class="col-md-1"> </div>             
	            </div> -->
	            <!-- <div class="col-md-1"> </div> -->
			<!-- END -->
		</div>
	</section>
</div>
  
  

<script type="text/javascript">
	function report_tab()
	{
		$("#report_tab").trigger('click');
	}
	function ticket_tab()
	{
		$("#ticket_tab").trigger('click');
	}
	function customer_tab()
	{
		$("#customer_tab").trigger('click');
	}
	function cmdb_tab()
	{
		$("#cmdb_tab").trigger('click');
	}
	function service_tab()
	{
		$("#service_tab").trigger('click');
	}
	function admin_tab()
	{
		$("#admin_tab").trigger('click');
	}


	$(document).ready(function (){
		var segment = "<?= $this->uri->segment('3')?>";

		if(segment=='dashboard'){
			window.location.href="<?= base_url()?>dashboard";
		} else if(segment=='report'){
			report_tab();
		} else if(segment=='ticket'){
			ticket_tab();
		} else if(segment=='customer'){
			customer_tab();
		} else if(segment=='cmdb'){
			cmdb_tab();
		} else if(segment=='service'){
			service_tab();
		} else if(segment=='admin'){
			admin_tab();
		}





	});
</script>




<!-- Voice Instruction -->

<!-- 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

<script src="<?= base_url()?>asset_speak2talk/script.js"></script>
<script type="text/javascript">
	$(document).ready(function (){
		$("#start-record-btn").trigger('click');


	});

    setInterval(function(){ detectVoice(); }, 3000);
    function detectVoice()
    {
        var text = $("#note-textarea").val();
        

        if (text.indexOf('open ticket') > -1) { //start open ticket
		  window.location.href="<?= base_url()?>Ticket/Ticket_StatusView";
		  //return true;
		} else if (text.indexOf('open tickets') > -1) {
		  window.location.href="<?= base_url()?>Ticket/Ticket_StatusView";
		  //return true;
		} else if (text.indexOf('open') > -1) { //start open ticket
		  window.location.href="<?= base_url()?>Ticket/Ticket_StatusView";
		  //return true;
		} else if (text.indexOf('closed ticket') > -1) { //start closed ticket
		  window.location.href="<?= base_url()?>Ticket/Ticket_ClosedTicket";
		  //return true;
		} else if (text.indexOf('closed tickets') > -1) {
		  window.location.href="<?= base_url()?>Ticket/Ticket_ClosedTicket";
		  //return true;
		} else if (text.indexOf('closed') > -1) { 
		  window.location.href="<?= base_url()?>Ticket/Ticket_ClosedTicket";
		  //return true;
		} else if (text.indexOf('close') > -1) { 
		  window.location.href="<?= base_url()?>Ticket/Ticket_ClosedTicket";
		  //return true;
		} else if (text.indexOf('dashboard') > -1) { //start dashboard
		  window.location.href="<?= base_url()?>dashboard";
		  //return true;
		} else if (text.indexOf('dash bot') > -1) {
		  window.location.href="<?= base_url()?>dashboard";
		  //return true;
		} else if (text.indexOf('despot') > -1) {
		  window.location.href="<?= base_url()?>dashboard";
		  //return true;
		} else if (text.indexOf('overview') > -1) {
		  window.location.href="<?= base_url()?>menu";
		  //return true;
		} else if (text.indexOf('search') > -1) {
		  window.location.href="<?= base_url()?>Ticket/Ticket_Search";
		  //return true;
		} else {
		  //return false;
		}


    }
</script>
<!-- END -->