<div class="pageheader hidden-xs">
 <h3><i class="fa fa-list"></i> Form PPM : Printer & Scanner </h3>
 <div class="breadcrumb-wrapper">
  <span class="label" style="padding-right: 0px;"><i class="fa fa-cog" aria-hidden="true" style="border: 2px solid #f2f7f8;padding-right: 0px;"></i></span>
   <ol class="breadcrumb">
    <li> <a href="<?=base_url()?>Form_PPM/PPM_Form_Network"> + Add Hardware PPM </a> </li>
    <li> <a href="<?=base_url()?>Form_PPM/PPM_Form_Printer"> + Add Printer & Scanner </a> </li>
    <li> <a href="<?=base_url()?>Form_PPM/List_Hardware"> Overview </a> </li>
    <li> <a href="<?=base_url()?>Form_PPM/List_Hardware/Verified"> Verified By </a> </li>
    <li> <a href="<?=base_url()?>Form_PPM/List_Hardware/Endorse"> Endorse By </a> </li>
   </ol>
 </div>
</div>

<div class="row" style="padding-bottom: 30px;">
 <div class="content-wrapper">
  <section class="content">
   <div class="row">
	<form action="<?=base_url()?>Form_PPM/Add_printer" method="post" id="form_data">
	 <input type="hidden" name="id" id="id">
	 <input type="hidden" name="ppm_id" id="ppm_id" value="<?= $_GET['ppm_id']?>">
	 <input type="hidden" id="get_from_id" name="get_from_id">
	<div class="col-md-12">

	<div class="box box-success">
	 <div class="box-header with-border">
	  <label class="box-title"> <b><?php if(!empty($this->session->userdata('q'))){echo get_name_activity($this->session->userdata('q')); } else { echo get_name_activity($this->session->userdata('id_activity')) ;} ?> : <?= hex2bin($_GET['hostname'])?></b> </label>
	 </div>
	 <div class="box-body">
	  <div class="row" style="padding-left: 20px; ">
	   <div class="col-md-8" style="background-color: #fff; border-radius: 10px; padding-top: 10px; border: 1px solid #bdbdbd;">
	     <div class="form-group col-md-3">
	       <label for="exampleInputEmail1">Type Of PPM</label>
		   <select class="form-control" name="type_ppm" id="type_ppm">
		 	 <option value="Printer & Scanner">Printer & Scanner</option>
		   </select>
		 </div>
		
		 <div class="form-group col-md-3">
		   <label for="exampleInputEmail1">Type Device</label>
		   <select class="form-control" name="type_device2" id="type_device2" onchange="type_device_network();" disabled>
		 	 <option value="Printer">Printer</option>
		 	 <option value="Scanner">Scanner</option>
		   </select>

		   <select class="form-control" name="type_device" id="type_device" onchange="type_device_network();" style="display: none">
		 	 <option value="Printer">Printer</option>
		 	 <option value="Scanner">Scanner</option>
		   </select>
		 </div>

		 <div class="form-group col-md-2">
		   <label for="exampleInputEmail1">Year</label>
		   <select class="form-control" name="year" id="year">
		   	 <option value="">--Select Year --</option>
			 <?= lookup_year()?>
		   </select>
		 </div>

		 <div class="form-group col-md-4">
		  <label for="exampleInputEmail1">Responsible</label>
		  <input type='text' class='form-control' name='responsible' id='responsible' value="<?= $this->session->userdata('first_name')?>" disabled>
		 </div>
	   </div>
	  </div>

	 <div class="row" style="padding-left: 20px; ">
	  <legend style="font-size: 15px; font-weight: 700;">Printer Type</legend>
	  <div class="col-md-8" style="background-color: #fff; border-radius: 10px; padding-top: 10px; border: 1px solid #bdbdbd;">
	  	<div class="col-md-3">
	  	  <label for="exampleInputEmail1">
		   <span style="padding-right: 10px;">Laser Printer</span>
		   <input type="radio" name="ppm_type" id="laser" value="Laser Printer">
		  </label>
		</div>

		<div class="col-md-3">
		   <label for="exampleInputEmail1">
		   	<span style="padding-right: 10px;">Label Printer</span>
		   	<input type="radio" name="ppm_type" id="label" value="Label Printer">
		   </label>
		</div>
	  </div>
     </div>
     
     <script>
      $(document).ready(function(){
       $('input[name="barcode_scanner"]').click(function(){
       	if($(this).prop("checked") == true){
       	 //alert("Checkbox is checked.");
       	  $('input[name="barcode_scanner"]').prop('checked',true);
       	  $('input[name="flatbed_scanner"]').prop('checked',false);
       	  $('input[name="card_reader"]').prop('checked',false);
       	  $("#div_automatic").hide();
       	}

       	else if($(this).prop("checked") == false){
       	 //alert("Checkbox is unchecked.");
       	 $('input[name="barcode_scanner"]').prop('checked',false);
       	 $("#div_automatic").show();
       	}
       });

       $('input[name="flatbed_scanner"]').click(function(){
       	if($(this).prop("checked") == true){
       	//alert("Checkbox is checked.");
       	$('input[name="barcode_scanner"]').prop('checked',false);
       	$('input[name="flatbed_scanner"]').prop('checked',true);
       	$('input[name="card_reader"]').prop('checked',false);
       	$("#div_automatic").show();
        }

        else if($(this).prop("checked") == false){
         //alert("Checkbox is unchecked.");
         $('input[name="flatbed_scanner"]').prop('checked',false);
         $("#div_automatic").show();
        }
       });

       $('input[name="card_reader"]').click(function(){
        if($(this).prop("checked") == true){
         //alert("Checkbox is checked.");
         $('input[name="barcode_scanner"]').prop('checked',false);
         $('input[name="flatbed_scanner"]').prop('checked',false);
         $('input[name="card_reader"]').prop('checked',true);
         $("#div_automatic").hide();
        }

        else if($(this).prop("checked") == false){
        //alert("Checkbox is unchecked.");
         $('input[name="card_reader"]').prop('checked',false);
         $("#div_automatic").show();
        }
       });
      });
     </script>

     <div class="row" style="padding-left: 20px; padding-top: 30px; padding-right: 20px;">
      <div class="col-md-12" style="background-color: #fff; border-radius: 10px; padding-top: 10px; border: 1px solid #bdbdbd;">
       <legend style="font-size: 15px; font-weight: 700;">Device Details</legend>
        <div class="row">
         <div class="col-md-3">
          <div class="col-md-4">
           <label for="exampleInputEmail1">Hostname</label>
          </div>

          <div class="col-md-8" style="padding-bottom: 10px;">
           <input type='text' class='form-control' name='hostname' id='hostname' list="hostname_hardware" onchange="getDetails();" value="<?= $_GET['hostname']?>">
		  </div>
		 </div>
		</div>

		<datalist id="hostname_hardware">
		 <?= lookup_hostname_hardware()?>
		</datalist>

		<div class="row">
		 <div class="col-md-3">
		  <div class="well" style="background: #fafafa; padding-bottom: 50px;">
		   <div class="row">
		   	<div class="col-md-4">
		   	 <label for="exampleInputEmail1">Location</label>
		   	</div>
		   	<div class="col-md-8" style="padding-bottom: 10px;">
		   	 <select class="form-control" name="location" id="location">
		   	  <option value="">--Select Location --</option>
		   	  <?= option_ward()?>
		   	 </select>
		   	</div>
		   </div>

		   <div class="row">
		   	<div class="col-md-4">
		   	 <label for="exampleInputEmail1">Level</label>
		   	</div>
		   	<div class="col-md-8" style="padding-bottom: 10px;">
		   	 <input type='text' class='form-control' name='level' id='level'>
		   	</div>
		   </div>
		   <div class="row">
		   	<div class="col-md-4">
		   	 <label for="exampleInputEmail1">Department</label>
		   	</div>
		   	<div class="col-md-8" style="padding-bottom: 10px;">
		   	 <input type='text' class='form-control' name='department' id='department'>
		   	</div>
		   </div>
		  </div>
		 </div>

		 <div class="col-md-3">
		  <div class="well" style="background: #fafafa; padding-bottom: 50px;">
		   <div class="row">
		   	<div class="col-md-4">
		   	 <label for="exampleInputEmail1">Brand</label>
		   	</div>
		   	<div class="col-md-8" style="padding-bottom: 10px;">
		   	 <input type='text' class='form-control' name='brand' id='brand'>
		   	</div>
		   </div>
		   <div class="row">
		  	<div class="col-md-4">
		  	 <label for="exampleInputEmail1">Model</label>
		  	</div>
		  	<div class="col-md-8" style="padding-bottom: 10px;">
		  	 <input type='text' class='form-control' name='model' id='model'>
		  	</div>
		   </div>
		   <div class="row">
		   	<div class="col-md-4">
		   	 <label for="exampleInputEmail1">Serial Number</label>
		   	</div>
		   	<div class="col-md-8" style="padding-bottom: 10px;">
		   	 <input type='text' class='form-control' name='serial_number' id='serial_number'>
		   	</div>
		   </div>
		  </div>
		 </div>
		 <div class="col-md-3">
		  <div class="well" style="background: #fafafa; padding-bottom: 50px;">
		   <div class="row">=
		   	<div class="col-md-4">
		   	 <label for="exampleInputEmail1">Local</label>=
		   	</div>
		    <div class="col-md-8" style="padding-bottom: 10px;">
		   	 <select class="form-control" name="local" id="local">
		   	  <option value="">--Select Type --</option>
		   	  <?= yes_or_no() ?>
		   	 </select>
		    </div>
		   </div>
		   <div class="row">
		   	<div class="col-md-4">
		   	 <label for="exampleInputEmail1">Network IP</label>
		   	</div>
		   	<div class="col-md-8" style="padding-bottom: 10px;">
		   	 <input type='text' class='form-control' name='ip' id='ip'>
		   	</div>
		   </div>
		   <div class="row">
		   	<div class="col-md-4">
		   	 <label for="exampleInputEmail1">Port</label>
		   	</div>
		   	<div class="col-md-8" style="padding-bottom: 10px;">
		   	 <input type='text' class='form-control' name='port' id='port'>
		   	</div>
		   </div>
		  </div>
		 </div>
		 <div class="col-md-3">
		  <div class="well" style="background: #fafafa; padding-bottom: 50px;">
		  	<div class="row">
		  	 <div class="col-md-4">
		  	  <label for="exampleInputEmail1">Device In Tag</label>
		  	 </div>
		  	 <div class="col-md-8" style="padding-bottom: 10px;">
		  	  <select class="form-control" name="device_tag" id="device_tag">
		  	   <option value="">--Select Type --</option>
		  	   <?= yes_or_no() ?>
		  	  </select>
		  	 </div>
		  	</div>
		  	<div class="row">
		  	 <div class="col-md-4">
		  	  <label for="exampleInputEmail1">Need Replacement ?</label>
		  	 </div>
		  	 <div class="col-md-8" style="padding-bottom: 10px;">
		  	  <select class="form-control" name="need_replacement" id="need_replacement">
		  	   <option value="">--Yes/No--</option>
		  	   <?= yes_or_no() ?>
		  	  </select>
		  	 </div>
		  	</div>
							          					<div class="row">
							          						<div class="col-md-4">
							          							<label for="exampleInputEmail1">Date Replaced</label>
							          						</div>
							          						<div class="col-md-8" style="padding-bottom: 10px;">
							          							<input type='text' class='form-control datepicker' name='date_replaced' id='date_replaced'>
							          						</div>
							          					</div>
							          					<div class="row">
							          						<div class="col-md-4">
							          							<label for="exampleInputEmail1">PPM Tag</label>
							          						</div>
							          						<div class="col-md-8" style="padding-bottom: 10px;">
							          							<input type='text' class='form-control' name='ppm_tag' id='ppm_tag'>
							          						</div>
							          					</div>
						          					</div>
						          				</div>
									        </div>

									        <div class="row">
									        	<div class="col-md-12">
									        		<legend style="font-size: 12px; font-weight: 700;">Printer Checklist</legend>
									        	</div>
									        	<div class="col-md-6">
									        		

									        		<div class="row">
									        			<div class="col-md-8">
									        				<label for="exampleInputEmail1" style="padding-left: 10px;">Cleaning</label>
									        				<br>
									        				<small style="font-size: 10px;">* clean the dust and dirt of printer by using spray cleaner and cloths </small>
									        			</div>

									        			<div class="col-md-4 font_class" style="padding-top: 10px;">
									        				<input type="radio" name="checklist_1"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="checklist_1" value="No"> No</input>
								          					<input type="radio" name="checklist_1" value="N/A"> N/A</input>
									          			</div>
									        		</div>

									        		<div class="row">
									        			<div class="col-md-8">
									        				<label for="exampleInputEmail1" style="padding-left: 10px;">Check Cable Tidiness</label>
									        				<br>
									        				<small style="font-size: 10px;">* make sure the tidiness of cables </small>
									        			</div>

									        			<div class="col-md-4 font_class" style="padding-top: 10px;">
									        				<input type="radio" name="checklist_2"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="checklist_2" value="No"> No</input>
								          					<input type="radio" name="checklist_2" value="N/A"> N/A</input>
									          			</div>
									        		</div>

									        		<br>
									        		<div class="row">
									        			<div class="col-md-8">
									        				<label for="exampleInputEmail1" style="padding-left: 10px;">Check toner Percentage Remaining</label>
									        			</div>

									        			<div class="col-md-4 font_class">
									        				<input type="radio" name="checklist_3"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="checklist_3" value="No"> No</input>
								          					<input type="radio" name="checklist_3" value="N/A"> N/A</input>
									          			</div>
									        		</div>


									        		<div class="row">
									        			<div class="col-md-8">
									        				<label for="exampleInputEmail1" style="padding-left: 10px;">Check Functionality</label>

									        				<br>
								        					<label for="exampleInputEmail1" style="padding-left: 10px;">&nbsp;&nbsp;&nbsp;Loading Paper Functioning</label>
									        			</div>

									        			<div class="col-md-4 font_class">
									        				<br>
									        				<input type="radio" name="checklist_4"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="checklist_4" value="No"> No</input>
								          					<input type="radio" name="checklist_4" value="N/A"> N/A</input>
									        				
									          			</div>
									        		</div>


									        		<div class="row">
									        			<div class="col-md-8">
									        				<br>
								        					<label for="exampleInputEmail1" style="padding-left: 10px;">&nbsp;&nbsp;&nbsp;Roller Functioning</label>
									        			</div>

									        			<div class="col-md-4 font_class">
									        				<br>
									        				<input type="radio" name="checklist_5"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="checklist_5" value="No"> No</input>
								          					<input type="radio" name="checklist_5" value="N/A"> N/A</input>
									        				
									          			</div>
									        		</div>


									        		<div class="row">
									        			<div class="col-md-8">
									        				<br>
								        					<label for="exampleInputEmail1" style="padding-left: 10px;">&nbsp;&nbsp;&nbsp;Ready LED Signal Functioning</label>
									        			</div>

									        			<div class="col-md-4 font_class">
									        				<br>
									        				<input type="radio" name="checklist_6"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="checklist_6" value="No"> No</input>
								          					<input type="radio" name="checklist_6" value="N/A"> N/A</input>
									        				
									          			</div>
									        		</div>
									        		
									        	</div>

									        	<div class="col-md-6">
									        		<div class="row">
									        			<div class="col-md-8">
									        				<label for="exampleInputEmail1" style="padding-left: 10px;">Perform Test Print</label>
									        			</div>

									        			<div class="col-md-4 font_class">
									        				<br>
									        				<input type="radio" name="checklist_7"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="checklist_7" value="No"> No</input>
								          					<input type="radio" name="checklist_7" value="N/A"> N/A</input>
									        				
									          			</div>
									        		</div>


									        		<div class="row">
									        			<div class="col-md-8">
									        				<label for="exampleInputEmail1" style="padding-left: 10px;">Output Configuration Attach</label>
									        			</div>

									        			<div class="col-md-4 font_class">
									        				<br>
									        				<input type="radio" name="checklist_8"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="checklist_8" value="No"> No</input>
								          					<input type="radio" name="checklist_8" value="N/A"> N/A</input>
									        				
									          			</div>
									        		</div>
									        	</div>
									        </div>
					          		</div>
				          		</div>


				          		<div class="row" style="padding-left: 20px; padding-top: 30px; padding-right: 20px;">
				          			<div class="col-md-7" style="background-color: #fff; border-radius: 10px; padding-top: 10px; border: 1px solid #bdbdbd;">

				          					<legend style="font-size: 15px; font-weight: 700;">Comment/Remark</legend>

				          					<div class="row">
					          					<div class="form-group col-md-12">
									              <textarea id="comment" name="comment" rows="5" cols="50" class="form-control"></textarea>
									            </div>
									        </div>
									</div>
									<div class="col-md-5" style="border-radius: 10px; padding-top: 10px;">
											<?php if(!empty($this->session->userdata('idModule'))) { ?>
												<?php if($this->uri->segment('5')=='Endorse'){ ?>
													<legend style="font-size: 15px; font-weight: 700;">Reason Reject</legend>
						          					<div class="row">
							          					<div class="form-group col-md-12" >

							          						<div class="row">
							          							<div class="col-md-12">
							          								<label>* Reject PPM Task ?</label>
							          							</div>
																<div class="col-md-3">
																	<label for="exampleInputEmail1">
																		<input type="radio" name="reject_ppm_task" id="type_yes" value="Yes" checked required>
																		Yes
																	</label>
																</div>

																<div class="col-md-3">
																	<label for="exampleInputEmail1">
																		<input type="radio" name="reject_ppm_task" id="type_no" value="No">
																		No
																	</label>
																</div>
															</div>

											              	<textarea id="reason_reject" name="reason_reject" rows="5" cols="50" class="form-control"></textarea>
											            </div>


											            <div class="form-group col-md-12 pull-right" style="display: none">
											              <label for="exampleInputEmail1">Acknowledge By</label>
											              <input type='text' class='form-control' name='customer' id='customer' list="list_customer">
											            </div>

											            <input type='hidden' class='form-control' name='acknowledge' id='acknowledge' list="list_acknowledge">


											            <div class="form-group col-md-12 pull-right">
											              <button class="btn btn-primary btn-block" type="submit">
											              	
											              	<?php if($this->uri->segment('5')=='Verified'){ ?>
											              		Submit to Endorse
											              	<?php } else {  ?>
											              		Submit
											              	<?php } ?>
											              	
											          	  
											          	  </button>
											            </div>
											        </div>
												<?php } else { ?>

													<?php if($this->uri->segment('5')=='Verified'){ ?>

														<div class="row">
												            <div class="form-group col-md-12 pull-right">
												              <label for="exampleInputEmail1">Submit To Endorse With</label>
												              <input type='text' class='form-control' name='acknowledge' id='acknowledge' list="list_acknowledge">
												            </div>
												            <div class="form-group col-md-12 pull-right">
												              <button class="btn btn-primary btn-block">Submit to Endorse</button>
												            </div>
												        </div>

												        <input type='hidden' class='form-control' name='customer' id='customer' list="list_customer">

													<?php } else { ?>
							          					<div class="row">

							          						<div class="form-group col-md-12 pull-right">
												              <label for="exampleInputEmail1">Acknowledge By</label>
												              <input type='text' class='form-control' name='acknowledge' id='acknowledge' list="list_customer">
												            </div>


												            <div class="form-group col-md-12 pull-right">
												              <label for="exampleInputEmail1">Sent to Endorse with</label>
												              <input type='text' class='form-control' name='endorse' id='endorse' list="list_acknowledge">
												            </div>
												            <div class="form-group col-md-12 pull-right" id="btn_submit_div">
												              <button class="btn btn-primary btn-block">Submit</button>
												            </div>
												        </div>
												    <?php } ?>

										    	<?php } ?>
										    <?php } else {  ?>
													<div class="row" style="padding-top: 30px;">
														<div class="form-group col-md-12 pull-right" id="btn_submit_div">
												            <div class="col-md-6 col-sm-6 col-xs-6">
												              <button class="btn btn-default btn-block" onclick="go_Back(); return false;">
												              	Back
												          	  </button>
												          	</div>
												            <div class="col-md-6 col-sm-6 col-xs-6">
												              <button class="btn btn-primary btn-block" onclick="acknowledge_confirm(); return false;">
												              	Acknowledge
												          	  </button>
												          	</div>
											            </div>
													</div>
											<?php } ?>
									</div>
								</div>





						  </div>
						</div>
					</div>
				</form>
			</div>
		</section>
	</div>
</div>

<datalist id="list_acknowledge">
	<?= lookup_agent_datalist()?>
</datalist>

<datalist id="list_customer">
	<?= lookup_customer_user_datalist()?>
</datalist>

 
<input type="hidden" name="groupid" id="groupid" value="<?= $this->uri->segment('3'); ?>">

 <script type="text/javascript">

 	$(document).ready(function (){
		details();
	
	});

	function details()
	{
		var groupid= $("#groupid").val();

		var data =  {
		                    'groupid':groupid,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		            }

        $.ajax({
                    url: '<?= base_url() ?>Admin/gm_details',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    beforeSend: function() {
                       
                    },
                    success: function(response){

                    	var gm_name = $("#gm_name").val(response.name);
				 		var gm_validity = $("#gm_validity").val(response.validity);
				 		var gm_comment = $("#gm_comment").val(response.comment);

                    }
              });
	}

 	function submit()
 	{
 		var gm_name = $("#gm_name").val();
 		var gm_validity = $("#gm_validity").val();
 		var gm_comment = $("#gm_comment").val();

 		var groupid= $("#groupid").val();

 		if((gm_name=='')||(gm_validity=='')||(gm_comment==''))
 		{
 			
 		} else {
 			var data = 
			                {   'gm_name':gm_name,
			                	'gm_validity':gm_validity,
			                	'gm_comment':gm_comment,
			                	'groupid':groupid,
			                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			                }

	                    
	            $.ajax({
	                    url: '<?= base_url() ?>Admin/gm_edit_group',
	                    type: 'POST',
	                    dataType: 'html',
	                    data: data,
	                    beforeSend: function() {

	                    },
	                    success: function(response){
	                    	//alert("Success update group !");
	                    	//location.reload();

	                    	var url = "<?= base_url()?>Admin/GM_ViewList";
	                    	window.location.href=url;
	                    }
	            });
 		}

 	}

 	function cancel()
 	{
 		var url = "<?= base_url()?>Admin/GM_ViewList";
	    window.location.href=url;
 	}
 </script>


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



</style>

<script type="text/javascript">
	function getDetails()
	{
		var hostname = $("#hostname").val();
		//alert(hostname);
		var data = 
                    {
                      'hostname':hostname,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

        
        $.ajax({
                url: '<?= base_url() ?>Ticket/getDetails_byHostname_hardware',
                type: 'POST',
                dataType: 'json',
                data: data,
                beforeSend: function() {
                   // alert('Sila Tunggu');

                },
                success: function(response){
                	var location = response.location;
                	$("#location").val(location);

                	var serial_number = response.serial_number;
                	$("#serial_number").val(serial_number);

                	var ram = response.Ram;
                	$("#ram").val(ram);


                	var model = response.model;
                	$("#model").val(model);

                	var ip = response.ip;
                	$("#ip").val(ip);
                	
                	$("#brand").val(response.brand);
                }
               });

	}


	
</script>



<script type="text/javascript">
	$(document).ready(function (){
		detail();
	});

	function detail()
	{
		var id= $("#get_from_id").val();

		var data =  {
		                    'id':id,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		            }

	    $.ajax({
	                url: '<?= base_url() ?>Form_PPM/detail_printer',
	                type: 'POST',
	                dataType: 'json',
	                data: data,
	                beforeSend: function() {
	                   
	                },
	                success: function(response){

	                	$("#hostname").val(response.hostname);
	                	$("#location").val(response.location);
	                	//$("select[name='type_ppm']").val(response.ppm_type);

	                	//$("input[name='ppm_type']").val(response.ppm_type);

	                	//alert(response.ppm_type);
	                	//$('input[name="ppm_type"]:checked').val(response.ppm_type);
	                		
	                	if(response.ppm_type=='Laser Printer'){
	                		$("#laser").prop("checked", true);
	                	}else if(response.ppm_type=='Label Printer'){
	                		$("#label").prop("checked", true);
	                	} else {

	                	}
	                	 



	                	$("#type_device").val(response.ppm_device);
	                	$("#responsible").val(response.responsible);
	                	$("#customer").val(response.acknowledge);
	                	$("#acknowledge").val(response.acknowledge);
	                	$("#endorse").val(response.endorse);
	                	$("#brand").val(response.brand);
	                	$("#department").val(response.department);
	                	$("#level").val(response.level);
	                	$("#serial_number").val(response.serial_number);
	                	$("#mac_address").val(response.mac_address);
	                	$("#ram").val(response.cpu_ram);
	                	$("#model").val(response.model);
	                	$("#brand").val(response.brand);
	                	$("#ip").val(response.network_ip);
	                	$("#firmware").val(response.firmware);
	                	$("#port").val(response.port);
	                	$("#date_replaced").val(response.date_replacement);
	                	$("#ppm_tag").val(response.ppm_tag);
	                	$("#device_tag").val(response.device_tag);
	                	$("#need_replacement").val(response.need_replacement);

	                	$("#quarter").val(response.quarter);
	                	//alert(response.quarter);
	                	//$("input[name*='nation']")
	                	// $("select[name='checklist_1']").val(response.checklist_1);
	                	// $("select[name='checklist_2']").val(response.checklist_2);
	                	// $("select[name='checklist_3']").val(response.checklist_3);
	                	// $("select[name='checklist_4']").val(response.checklist_4);
	                	// $("select[name='checklist_5']").val(response.checklist_5);
	                	// $("select[name='checklist_6']").val(response.checklist_6);

	                	$("[name=checklist_1]").val([response.checklist_1]);
	                	$("[name=checklist_2]").val([response.checklist_2]);
	                	$("[name=checklist_3]").val([response.checklist_3]);
	                	$("[name=checklist_4]").val([response.checklist_4]);
	                	$("[name=checklist_5]").val([response.checklist_5]);
	                	$("[name=checklist_6]").val([response.checklist_6]);
	                	$("[name=checklist_7").val([response.checklist_7]);
	                	$("[name=checklist_8]").val([response.checklist_8]);


	                	$("textarea[name='comment']").val(response.comment);
	  					$("#id").val(response.id_number);
	  
	  					if((response.status=='Rejected')||(response.status=='Done')){
	  						$("#btn_submit_div").remove();
	  					} else {

	  					}
	                }
	         });
	}

	function list_checkbox(id_number)
	{
		var data =  {
			                    'id_number':id_number,
			                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			            }

		    $.ajax({
		                url: '<?= base_url() ?>Form_PPM/list_checkbox',
		                type: 'POST',
		                dataType: 'json',
		                data: data,
		                beforeSend: function() {
		                   
		                },
		                success: function(response){
		                	var cb_1 = response.cb_1;
		                	var cb_2 = response.cb_2;
		                	var cb_3 = response.cb_3;
		                	var cb_4 = response.cb_4;
		                	var cb_5 = response.cb_5;
		                	var cb_6 = response.cb_6;
		                	var cb_7 = response.cb_7;
		                	var cb_8 = response.cb_8;
		                	var cb_9 = response.cb_9;
		                	var cb_10 = response.cb_10;
		                	var cb_11 = response.cb_11;
		                	var cb_12 = response.cb_12;
		                	var cb_13 = response.cb_13;
		                	var cb_14 = response.cb_14;
		                	var cb_15 = response.cb_15;
		                	var cb_16 = response.cb_16;
		                	var cb_17 = response.cb_17;
		                	var cb_18 = response.cb_18;


		                	if(cb_1=='1'){
		                		$("#cb_1").val('1');
							    $("#cb_1").attr('checked','true');
		                	} else {
		                		$("#cb_1").val('');
							    $("#cb_1").removeAttr('checked');
		                	}



		                	if(cb_2=='1'){
		                		$("#cb_2").val('1');
							    $("#cb_2").attr('checked','true');
		                	} else {
		                		$("#cb_2").val('');
							    $("#cb_2").removeAttr('checked');
		                	}



		                	if(cb_3=='1'){
		                		$("#cb_3").val('1');
							    $("#cb_3").attr('checked','true');
		                	} else {
		                		$("#cb_3").val('');
							    $("#cb_3").removeAttr('checked');
		                	}



		                	if(cb_4=='1'){
		                		$("#cb_4").val('1');
							    $("#cb_4").attr('checked','true');
		                	} else {
		                		$("#cb_4").val('');
							    $("#cb_4").removeAttr('checked');
		                	}





		                	if(cb_5=='1'){
		                		$("#cb_5").val('1');
							    $("#cb_5").attr('checked','true');
		                	} else {
		                		$("#cb_5").val('');
							    $("#cb_5").removeAttr('checked');
		                	}



		                	if(cb_6=='1'){
		                		$("#cb_6").val('1');
							    $("#cb_6").attr('checked','true');
		                	} else {
		                		$("#cb_6").val('');
							    $("#cb_6").removeAttr('checked');
		                	}



		                	if(cb_7=='1'){
		                		$("#cb_7").val('1');
							    $("#cb_7").attr('checked','true');
		                	} else {
		                		$("#cb_7").val('');
							    $("#cb_7").removeAttr('checked');
		                	}



		                	if(cb_8=='1'){
		                		$("#cb_8").val('1');
							    $("#cb_8").attr('checked','true');
		                	} else {
		                		$("#cb_8").val('');
							    $("#cb_8").removeAttr('checked');
		                	}


		                	if(cb_9=='1'){
		                		$("#cb_9").val('1');
							    $("#cb_9").attr('checked','true');
		                	} else {
		                		$("#cb_9").val('');
							    $("#cb_9").removeAttr('checked');
		                	}


		                	if(cb_10=='10'){
		                		$("#cb_10").val('1');
							    $("#cb_10").attr('checked','true');
		                	} else {
		                		$("#cb_10").val('');
							    $("#cb_10").removeAttr('checked');
		                	}


		                	if(cb_11=='1'){
		                		$("#cb_11").val('1');
							    $("#cb_11").attr('checked','true');
		                	} else {
		                		$("#cb_11").val('');
							    $("#cb_11").removeAttr('checked');
		                	}


		                	if(cb_12=='1'){
		                		$("#cb_12").val('1');
							    $("#cb_12").attr('checked','true');
		                	} else {
		                		$("#cb_12").val('');
							    $("#cb_12").removeAttr('checked');
		                	}


		                	if(cb_13=='1'){
		                		$("#cb_13").val('1');
							    $("#cb_13").attr('checked','true');
		                	} else {
		                		$("#cb_13").val('');
							    $("#cb_13").removeAttr('checked');
		                	}


							if(cb_14=='1'){
		                		$("#cb_14").val('1');
							    $("#cb_14").attr('checked','true');
		                	} else {
		                		$("#cb_14").val('');
							    $("#cb_14").removeAttr('checked');
		                	}	



		                	if(cb_15=='1'){
		                		$("#cb_15").val('1');
							    $("#cb_15").attr('checked','true');
		                	} else {
		                		$("#cb_15").val('');
							    $("#cb_15").removeAttr('checked');
		                	}	



		                	if(cb_16=='1'){
		                		$("#cb_16").val('1');
							    $("#cb_16").attr('checked','true');
		                	} else {
		                		$("#cb_16").val('');
							    $("#cb_16").removeAttr('checked');
		                	}	   



		                	if(cb_17=='1'){
		                		$("#cb_17").val('1');
							    $("#cb_17").attr('checked','true');
		                	} else {
		                		$("#cb_17").val('');
							    $("#cb_17").removeAttr('checked');
		                	}   


		                	if(cb_18=='1'){
		                		$("#cb_18").val('1');
							    $("#cb_18").attr('checked','true');
		                	} else {
		                		$("#cb_18").val('');
							    $("#cb_18 ").removeAttr('checked');
		                	}          
		               	}
		          })
	}

</script>

<script type="text/javascript">
	$(document).ready(function (){
		check_ppm_register();

		function check_ppm_register()
		{
			var id= "<?= $_GET['ppm_id']?>";
			var name= "<?= $_GET['hostname']?>";
			var data =  {
			                    'id':id,
			                    'name':name,
			                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			            }

		    $.ajax({
		                url: '<?= base_url() ?>Form_PPM/check_ppm_register',
		                type: 'POST',
		                dataType: 'html',
		                data: data,
		                beforeSend: function() {
		                   
		                },
		                success: function(response){
		                	if(response>0){
		                		get_id_number_ppm();
		                	} else {
		                		getDetails();
		                	}
		               	}
		          })
			
		}


		function get_id_number_ppm()
		{
			var id= "<?= $_GET['ppm_id']?>";
			var name= "<?= $_GET['hostname']?>";
			var data =  {
			                    'id':id,
			                    'name':name,
			                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			            }

		    $.ajax({
		                url: '<?= base_url() ?>Form_PPM/get_id_number_ppm',
		                type: 'POST',
		                dataType: 'html',
		                data: data,
		                beforeSend: function() {
		                   
		                },
		                success: function(response){
		                	if(response)
		                	{
		                		$("#get_from_id").val(response);
		                		detail();
								//$('#form_data').attr('action', '<?= base_url()?>Form_PPM/Update_Printer');


								<?php if($this->uri->segment(2)=='User_PPM_Form_Printer'){ ?>
									//alert('a');
		                			$('#form_data').attr('action', '<?= base_url()?>Form_PPM/Update_Printer_Outside');
		                		<?php } else { ?>
		                			$('#form_data').attr('action', '<?= base_url()?>Form_PPM/Update_Printer');
		                		<?php } ?>
		                	}
		               	}
		          })
		}

	});

</script>



<script type="text/javascript">
	function go_Back()
	{
		window.location.href='<?= base_url()?>Form_PPM/Form_PPM_Client_Work/1'
	}

	function acknowledge_confirm()
	{
		var id= $("#id").val();
		var data =  {
		                    'id':id,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		            }

	    $.ajax({
	                url: '<?= base_url() ?>Form_PPM/Form_PPM_Client_Acknowledge_From_Details',
	                type: 'POST',
	                dataType: 'html',
	                data: data,
	                beforeSend: function() {
	                   
	                },
	                success: function(response){
	                	window.location.href="<?= base_url()?>Form_PPM/Form_PPM_Client_Work";
	               	}
	          })
	}

	
</script>




<script type="text/javascript">
    

    $(document).ready(function (){
    	
        var id = "<?php if(!empty(hex2bin($_GET['ppm_id']))){echo hex2bin($_GET['ppm_id']);}?>";

        var data =  {
		                    'id':id,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		            }

	    $.ajax({
	                url: '<?= base_url() ?>Form_PPM/detail_ppm',
	                type: 'POST',
	                dataType: 'json',
	                data: data,
	                beforeSend: function() {
	                   
	                },
	                success: function(response){
	                	// var start_date = response.start_date;
	                	// var year = start_date.substr(start_date.length - 4);
	                	//alert(year);
	                	var year = response.year;
	                	$("#year").val(year);
	                }
	           });
        
    });

</script>