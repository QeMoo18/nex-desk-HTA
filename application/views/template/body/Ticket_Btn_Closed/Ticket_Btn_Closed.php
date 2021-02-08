<script type="text/javascript" src="<?=base_url()?>asset_admin/bower_components/ckeditor/ckeditor.js"></script>

<div class="pageheader hidden-xs">
    <h3><i class="fa fa-ticket"></i> Close Ticket</h3>
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

	<div class="col-md-12" style="padding-bottom: 30px;">
		<div class="panel" style="">
		    <div class="panel-heading ui-sortable-handle">
		        <h3 class="panel-title" style="background-color: whitesmoke;"><b>Ticket#<?= $this->uri->segment(3)?> - <?= subject_note($this->uri->segment(3)) ?></b> <span class="pull-right hidden-xs"><a onclick="view_all_state();"><i class="fa fa-folder-open-o" aria-hidden="true"></i> View Case</a> <a href="<?=base_url()?>Ticket/Ticket_DetailTicket/<?= $this->uri->segment(3)?>"> | <i class="fa fa-home" aria-hidden="true"></i> Ticket Activities</a>  </span></h3>
		    </div>
		    <div class="panel-body">
		        
		    	<form id="idForm" action="<?=base_url()?>ticket/ticket_closed" method="post" enctype="multipart/form-data">
			    	<div class="col-md-6">

		                <div class="form-group col-md-4">
		  					<p class="font-small">*Responsible</p>
		  					<!-- <select class='form-control' name='Ticket_Closed_Responsible' id='Ticket_Closed_Responsible' required="required">
		  						<option value=''>< Please Select ></option>
		          				<?= lookup_agent(); ?>	
		          			</select> -->
		          			<?php $id = $this->uri->segment('3') ?>
		          			<input type="hidden" name="id_ticket" value="<?= $id ?>">
		          			<input type="text" name='Ticket_Closed_Responsible2' id='Ticket_Closed_Responsible2' value="<?= pull_data_Responsibilty($id) ?>" class="form-control" disabled="disabled">
		          			<input type="hidden" name='Ticket_Closed_Responsible' id='Ticket_Closed_Responsible' value="<?= pull_data_Responsibilty($id) ?>">
		  					<span id="alert_tp_r"></span>
		                </div>
				
						<div class="form-group col-md-4" id="p_ref_div">
		                  <p class="font-small">Provider Reference</p>
		                  <input type='text' class='form-control' name='Ticket_Closed_TT_No2' id='Ticket_Closed_TT_No2' value="<?=  pull_data_provider_ref($id) ?>" disabled="disabled"> 
		                  <input type='hidden' class='form-control' name='Ticket_Closed_TT_No' id='Ticket_Closed_TT_No' value="<?=  pull_data_provider_ref($id) ?>"> 
		                </div>
				
						<div class="form-group col-md-4" style="display: none">
		                  <p class="font-small">VTT No</p>
		                  <input type='text' class='form-control' name='Ticket_Closed_VTT_No' id='Ticket_Closed_VTT_No'> 
		                </div>
						
		                <div class="form-group col-md-4">
		                  <p class="font-small">Problem Description</p> 
		                  <select class="form-control" name="Ticket_Closed_Problem" id="Ticket_Closed_Problem">
		                  	<option value="">-- Please Select --</option>
		                  	<?= pull_data_ProblemDescription() ?>
		                  </select> 
		                </div>

						<div class="form-group col-md-4">
		                  <p class="font-small">Cause Of Fault</p> 
		                  <select class="form-control" name="Ticket_Closed_Fault" id="Ticket_Closed_Fault">
		                  	<option value="">-- Please Select --</option>
		                  	<?= pull_data_CauseOfFault() ?>
		                  </select> 
		                </div>

		                <div class="form-group col-md-4" id="f_portion_div">
		                  <p class="font-small">Fault Category Portion</p>
		                  <select class="form-control" name="Ticket_Closed_Portion" id="Ticket_Closed_Portion">
		                  	<option value="">-- Please Select --</option>
		                  	<?= pull_data_FaultCategoryPortion() ?>
		                  </select> 
		                </div>

		                <div class="form-group col-md-4">
		                  <p class="font-small">Fault Category Type</p>
		                  <select class="form-control" name="Ticket_Closed_Fault_Type" id="Ticket_Closed_Fault_Type">
		                  	<option value="">-- Please Select --</option>
		                  	<?= pull_data_FaultCategoryType() ?>
		                  </select> 
		                </div>

				
						<div class="form-group col-md-4">
		                  <p class="font-small">Action Taken</p>
		                  <input type='text' class='form-control' name='Ticket_Closed_Action_Taken' id='Ticket_Closed_Action_Taken'> 
		                </div>
				
						<div class="form-group col-md-4">
		                  <p class="font-small">* Closed Type</p>
		                  <select class="form-control" name="Ticket_Closed_Type" id="Ticket_Closed_Type" required="required">
		                  	<option value="">-- Please Select --</option>
		                  	<?= pull_data_ticket_state() ?>
		                  </select>
		                </div>

		                <div class="form-group col-md-4" id="v_outagte_div">
		                  <p class="font-small">Validation Outage</p>
		                  <select class="form-control" name="Ticket_Validation_Outage" id="Ticket_Validation_Outage">
		                  	<option value="">-- Please Select --</option>
		                  	<option value="Valid"> Valid </option>
		                  	<option value="Invalid"> Invalid </option>
		                  </select>
		                </div>
				
						<div class="form-group col-md-12">
		  					<p class="font-small">* Remark</p>
		  					<textarea class="ckeditor" name="html_link_content" id="ckedtor" required="required"></textarea>
		                </div>

		                


		                <input type="hidden" name="total_time_closed" id="total_time_closed" value="">
		                <input type="hidden" name="pending_time_closed" id="pending_time_closed" value="">
		                <input type="hidden" name="working_time_closed" id="working_time_closed" value="">

		                <br><br>
		                <div class="col-md-12" style="padding-bottom: 10px; padding-top: 10px;">
							<button class="btn btn-primary pull-right" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit</button>
						</div>		            
			        </div>
			    </form>

		    	<div class="col-md-6">

		    		<?php $id = $this->uri->segment(3)?>
					<div class="panel">
					  <div class="panel-body pad-ver-5">
					  	  <?= lock_by($id)?>
					      
					      <ul class="nav nav-section nav-justified">
					          <li>
					              <div class="section">
					                  <h5 class="text-left font-small"> Ticket Open <i class="fa fa-caret-down text-success"></i></h5>
					                  <p class="text-left font-small start_ticket"> <?= time_start_ticket($id)?> </p>
					              </div>
					          </li>
					          <li>
					              <div class="section">
					                  <h5 class="text-left font-small"> Total Time <i class="fa fa-caret-down text-success"></i></h5>
					                  <p class="text-left font-small total_time"> <?= time_ticket_total($id)?> </p>
					              </div>
					          </li>
					          <li>
					              <div class="section">
					                  <h5 class="text-left font-small"> Pending Time <i class="fa fa-caret-down text-danger"></i></h5>
					                  <p class="text-left font-small pending_date"> <?= time_pending_total($id)?> </p>
					              </div>
					          </li>
					          <li>
					              <div class="section">
					                  <h5 class="text-left font-small"> Working Hour <i class="fa fa-caret-down text-success"></i></h5>
					                  <p class="text-left font-small working_date"> <?= time_working_total($id)?> </p>
					              </div>
					          </li>
					          <li id="maso_tutup_ticket_div">
					              <div class="section">
					                  <h5 class="text-left font-small"> Close Date <i class="fa fa-caret-down text-success"></i></h5>
					                  <p class="text-left font-small closed_date"> <?= time_close_total($id)?> </p>
					              </div>
					          </li>
					      </ul>
					  </div>
					</div>

					<div class="tab-base tab-stacked-left">
					  <!--Nav tabs-->
					  <ul class="nav nav-tabs" style="border: 0;background: #fcfcfc;">
					      <li class="active ">
					          <a data-toggle="tab" href="#demo-stk-lft-tab-1" aria-expanded="true" class="font-small">Ticket</a>
					      </li>
					      <li class="">
					          <a data-toggle="tab" href="#demo-stk-lft-tab-2" aria-expanded="false" class="font-small">Customer</a>
					      </li>
					      <li>
					          <a data-toggle="tab" href="#demo-stk-lft-tab-3" class="font-small">Asset</a>
					      </li>
					      <li>
					          <a data-toggle="tab" href="#demo-stk-lft-tab-4" class="font-small">Agent</a>
					      </li>
					  </ul>
					  <!--Tabs Content-->
					  <div class="tab-content">
					      <div id="demo-stk-lft-tab-1" class="tab-pane fade active in">
					          <h4 class="text-thin font-small">Ticket Information</h4>
					          <?= data_ticket($this->uri->segment(3))?>
					      </div>
					      <div id="demo-stk-lft-tab-2" class="tab-pane fade">
					          <h4 class="text-thin font-small">Customer Information</h4>
					          <?= data_customer($this->uri->segment(3))?>
					      </div>
					      <div id="demo-stk-lft-tab-3" class="tab-pane fade">
					          <h4 class="text-thin font-small">Asset / Inventory Information</h4>
					          <?= data_asset($this->uri->segment(3))?>
					      </div>
					      <div id="demo-stk-lft-tab-4" class="tab-pane fade">
					          <h4 class="text-thin font-small">Agent Information</h4>
					          <?= data_agent($this->uri->segment(3))?>
					      </div>
					  </div>
					</div>

		    	</div>

		    </div>
		</div>
	</div>

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


    /* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}


.tab-base .nav-tabs {
    border: 0;
    background: #0d4063;
}


.btn-success {
    background-color: #ffffff;
    border-color: #ffffff;
}



.nav-section>li>.section, .nav-section>li>a {
    position: relative;
    margin: 0;
    text-align: center;
    padding-right: 0px; 
    padding-left: 5px; 
    padding-top: 0px; 
    padding-bottom: 0px; 
}





</style>


<script src="<?=base_url()?>asset_template/beauty/js/demo/ui-dragdrop.js"></script>


<script type="text/javascript">

 	function pull_state()
	{
		var id = 'closed';
		var data = 	{
						"id" : id,
						
					}

		$.ajax({
		            url: "<?= base_url() ?>Ticket/pull_state_parameter",
		            type: "POST",
		            dataType: "html",
		            data: data,
		            beforeSend: function() {

		            },
		            success: function(response){
		            	$("#Ticket_Closed_Type").html(response);
		            }
		    });

	}



	function pull_environment()
	{
		var id = '<?= $this->uri->segment(3); ?>';
		var data = 	{
						"id" : id,
						
					}

		$.ajax({
		            url: "<?= base_url() ?>Ticket/pull_environment",
		            type: "POST",
		            dataType: "html",
		            data: data,
		            beforeSend: function() {

		            },
		            success: function(response){
		            	if(response=='hospital'){

		            		$("#p_ref_div").hide();
		            		$("#f_portion_div").hide();
		            		$("#v_outagte_div").hide();


		            	} else {

		            		$("#p_ref_div").show();
		            		$("#f_portion_div").show();
		            		$("#v_outagte_div").show();

		            	}
		            }
		    });

	}


	$(document).ready(function (){
		pull_state();
		pull_environment();
	});


	$(document).ready(function (){
 		check_status();
 	});

 	function check_status()
	{
		var status_lock = "<?= status_lock_ticket($this->uri->segment(3))?>";
		if(status_lock=='0'){

		} else {
			//$(".btn").remove();

			var lock_by = "<?= lock_ticket_by($this->uri->segment(3))?>";
			var first_name = "<?= $this->session->userdata('first_name')?>";
			
			if(lock_by==first_name){
				
			} else {
				$(".btn").remove();
			}

		}
	}
</script>