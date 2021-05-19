<div class="pageheader hidden-xs">
    <h3><i class="fa fa-list"></i> Form PPM : Scanner </h3>
    <div class="breadcrumb-wrapper">
        <!-- <span class="label" style="padding-right: 0px;"><i class="fa fa-cog" aria-hidden="true" style="border: 2px solid #f2f7f8;padding-right: 0px;"></i></span>
        <ol class="breadcrumb">
            <li> <a href="<?=base_url()?>Form_PPM/PPM_Form_Network"> + Add Hardware PPM </a> </li>
            <li> <a href="<?=base_url()?>Form_PPM/PPM_Form_Printer"> + Add Printer & Scanner </a> </li>
            <li> <a href="<?=base_url()?>Form_PPM/List_Hardware"> Overview </a> </li>
            <li> <a href="<?=base_url()?>Form_PPM/List_Hardware/Verified"> Verified By </a> </li>
            <li> <a href="<?=base_url()?>Form_PPM/List_Hardware/Endorse"> Endorse By </a> </li>
        </ol>
        </ol> -->
    </div>
</div>



<div class="row" style="padding-bottom: 30px;">
	<div class="content-wrapper">
		<section class="content">
			<div class="row">
				<form action="<?=base_url()?>Form_PPM/Add_scanner" method="post" id="form_data">

					<input type="hidden" name="u" value="<?php if(!empty($_GET['u'])){echo $_GET['u'];}?>">


					<input type="hidden" name="d" value="<?php if(!empty($_GET['department'])){echo $_GET['department'];}?>">


					<input type="hidden" name="t" value="<?php if(!empty($_GET['type'])){echo $_GET['type'];}?>">


					<input type="hidden" name="s" value="<?php if(!empty($_GET['status'])){echo $_GET['status'];}?>">

					<input type="hidden" name="id" id="id">
					<input type="hidden" name="ppm_id" id="ppm_id" value="<?= hex2bin($_GET['ppm_id'])?>">
					<input type="hidden" id="get_from_id" name="get_from_id">
					<div class="col-md-12">

						<div class="box box-success">
				          <div class="box-header with-border">
				            <label class="box-title"> <b><?= get_name_activity(hex2bin($_GET['ppm_id']))?> : <?= hex2bin($_GET['hostname'])?></b> </label>
				          </div>
				          <div class="box-body">
				          		<div class="row" style="padding-left: 20px; padding-right: 20px;">
				          			<div class="col-md-12" style="background-color: #fff; border-radius: 10px; padding-top: 10px; border: 1px solid #bdbdbd;">
								            <div class="form-group col-md-2">
								              <label for="exampleInputEmail1">Type Of PPM</label>
								              <select class="form-control" name="type_ppm" id="type_ppm">
								              	<option value="Printer & Scanner">Printer & Scanner</option>
								              </select>
								            </div>
								            <div class="form-group col-md-2">
								              <label for="exampleInputEmail1">Type Device</label>
								              <select class="form-control" name="type_device2" id="type_device2" onchange="type_device_network();" disabled>
								              	<option value="Scanner">Scanner</option>
								              	<option value="Printer">Printer</option>
								              </select>
								              <select class="form-control" name="type_device" id="type_device" onchange="type_device_network();" style="display: none">
								              	<option value="Scanner">Scanner</option>
								              	<option value="Printer">Printer</option>
								              </select>
								            </div>
								            <div class="form-group col-md-2">
								              <label for="exampleInputEmail1">Year</label>
								              <select class="form-control" name="year" id="year">
								              	<option value="">--Select Year --</option>
								              	<?= lookup_year()?>
								              </select>
								            </div>
								            <div class="form-group col-md-2">
								              <label>*Perform Date</label>
									          <input type="text" class="form-control datepicker" name="perform_date" id="perform_date">
								            </div>
					          				<div class="form-group col-md-4">
								              <label for="exampleInputEmail1">Responsible</label>
								              <input type='text' class='form-control' name='responsible' id='responsible' value="<?= $this->session->userdata('first_name')?>" disabled>
								            </div>
					          		</div>
				          		</div>


				          		<div class="row" style="padding-left: 20px; ">
				          			<legend style="font-size: 15px; font-weight: 700;">Scanner Type</legend>
				          			<div class="col-md-8" style="background-color: #fff; border-radius: 10px; padding-top: 10px; border: 1px solid #bdbdbd;">
					          				<div class="col-md-3">
												<label for="exampleInputEmail1">
													<span style="padding-right: 10px;">Barcode Scanner</span>
													<input type="radio" name="ppm_type" id="a" value="Barcode Scanner">
													
												</label>
											</div>

											<div class="col-md-3">
												<label for="exampleInputEmail1">
													<span style="padding-right: 10px;">Flatbed Scanner</span>
													<input type="radio" name="ppm_type" id="b" value="Flatbed Scanner">
													
												</label>
											</div>
											<div class="col-md-3">
												<label for="exampleInputEmail1">
													<span style="padding-right: 10px;">Card Reader</span>
													<input type="radio" name="ppm_type" id="c" value="Card Reader">
													
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
					          							<input type='text' class='form-control' name='hostname' id='hostname' list="hostname_hardware" onchange="getDetails();" value="<?= hex2bin($_GET['hostname'])?>">
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
							          							<label for="exampleInputEmail1"><input type="checkbox" value="" name="cb_1" id="cb_1">Level</label>
							          						</div>
							          						<div class="col-md-8" style="padding-bottom: 10px;">
							          							<input type='text' class='form-control' name='level' id='level'>
							          						</div>
							          					</div>
							          					<div class="row">
							          						<div class="col-md-4">
							          							<label for="exampleInputEmail1"><input type="checkbox" value="" name="cb_2" id="cb_2">Department</label>
							          						</div>
							          						<div class="col-md-8" style="padding-bottom: 10px;">
							          							<input type='text' class='form-control' name='department' id='department'>
							          						</div>
							          					</div>
							          					<div class="row">
							          						<div class="col-md-4">
							          							<label for="exampleInputEmail1"><input type="checkbox" value="" name="cb_3" id="cb_3">Room Name</label>
							          						</div>
							          						<div class="col-md-8" style="padding-bottom: 10px;">
							          							<input type='text' class='form-control' name='room_name' id='room_name'>
							          						</div>
							          					</div>
							          					<div class="row">
							          						<div class="col-md-4">
							          							<label for="exampleInputEmail1"><input type="checkbox" value="" name="cb_4" id="cb_4">Room ID</label>
							          						</div>
							          						<div class="col-md-8" style="padding-bottom: 10px;">
							          							<input type='text' class='form-control' name='location' id='location'>
							          						</div>
							          					</div>
						          					</div>
						          				</div>
						          				<div class="col-md-3">
						          					<div class="well" style="background: #fafafa; padding-bottom: 50px;">
							          					<div class="row">
							          						<div class="col-md-4">
							          							<label for="exampleInputEmail1"><input type="checkbox" value="" name="cb_5" id="cb_5">Brand</label>
							          						</div>
							          						<div class="col-md-8" style="padding-bottom: 10px;">
							          							<input type='text' class='form-control' name='brand' id='brand'>
							          						</div>
							          					</div>
						          						<div class="row">
							          						<div class="col-md-4">
							          							<label for="exampleInputEmail1"><input type="checkbox" value="" name="cb_6" id="cb_6">Model</label>
							          						</div>
							          						<div class="col-md-8" style="padding-bottom: 10px;">
							          							<input type='text' class='form-control' name='model' id='model'>
							          						</div>
							          					</div>
							          					<div class="row">
							          						<div class="col-md-4">
							          							<label for="exampleInputEmail1"><input type="checkbox" value="" name="cb_7" id="cb_7">Serial Number</label>
							          						</div>
							          						<div class="col-md-8" style="padding-bottom: 10px;">
							          							<input type='text' class='form-control' name='serial_number' id='serial_number'>
							          						</div>
							          					</div>
						          					</div>
						          				</div>
						          				<div class="col-md-3">
						          					<div class="well" style="background: #fafafa; padding-bottom: 50px;">
						          						<div class="row">
							          						<div class="col-md-4">
							          							<label for="exampleInputEmail1"><input type="checkbox" value="" name="cb_8" id="cb_8">Local</label>
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
							          							<label for="exampleInputEmail1"><input type="checkbox" value="" name="cb_9" id="cb_9">Network IP</label>
							          						</div>
							          						<div class="col-md-8" style="padding-bottom: 10px;">
							          							<input type='text' class='form-control' name='ip' id='ip'>
							          						</div>
							          					</div>
							          					<div class="row">
							          						<div class="col-md-4">
							          							<label for="exampleInputEmail1"><input type="checkbox" value="" name="cb_10" id="cb_10">Port</label>
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
							          							<label for="exampleInputEmail1"><input type="checkbox" value="" name="cb_11" id="cb_11">Device In Tag</label>
							          						</div>
							          						<div class="col-md-8" style="padding-bottom: 10px;">
							          							<!-- <select class="form-control" name="device_tag" id="device_tag">
													            	<option value="">--Yes/No--</option>
													            	<?= yes_or_no() ?>
													            </select> -->
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
							          							<label for="exampleInputEmail1"><input type="checkbox" value="" name="cb_12" id="cb_12">PPM Tag</label>
							          						</div>
							          						<div class="col-md-8" style="padding-bottom: 10px;">
							          							<!-- <select class="form-control" name="ppm_tag" id="ppm_tag">
											              			<option value="">--Yes/No --</option>
											              			<?= yes_or_no() ?>
											              		</select> -->
							          							<input type='text' class='form-control' name='ppm_tag' id='ppm_tag'>
							          						</div>
							          					</div>
						          					</div>
						          				</div>
									        </div>

									        <div class="row">
									        	<div class="col-md-12">
									        		<legend style="font-size: 12px; font-weight: 700;">Scanner Checklist</legend>

									        		<div class="row">
									        			<div class="col-md-6">
									        				<label for="exampleInputEmail1">Cleaning (clean the dust and dirt of printer by using spray cleaner and cloths)</label>
									        			</div>
									        		</div>

									        		<div class="col-md-6">
										        		<div class="row" style="padding-bottom: 10px;padding-left: 10px;">
										        			<div class="col-md-6">
										        				<label for="exampleInputEmail1">Wipe Glass</label>
										        			</div>
										        			<div class="col-md-6 font_class">
										        				<input type="radio" name="checklist_1"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="checklist_1" value="No"> No</input>
									          					<input type="radio" name="checklist_1" value="N/A"> N/A</input>
										        				<!-- <select class="form-control" name="checklist_1">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
										        		<div class="row" style="padding-bottom: 10px; padding-left: 10px;">
										        			<div class="col-md-6">
										        				<label for="exampleInputEmail1">Scanning Trip </label>
										        			</div>
										        			<div class="col-md-6 font_class">
										        				<input type="radio" name="checklist_2"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="checklist_2" value="No"> No</input>
									          					<input type="radio" name="checklist_2" value="N/A"> N/A</input>
										        				<!-- <select class="form-control" name="checklist_2">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>

										        		<div class="row" style="padding-bottom: 10px; padding-left: 10px;" id="div_automatic">
										        			<div class="col-md-6">
										        				<label for="exampleInputEmail1">Automatic Document Feeder (ADF) Duplex </label>
										        			</div>
										        			<div class="col-md-6 font_class">
										        				<input type="radio" name="checklist_3"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="checklist_3" value="No"> No</input>
									          					<input type="radio" name="checklist_3" value="N/A"> N/A</input>
										        				<!-- <select class="form-control" name="checklist_3">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>

									        			
									        			<div class="row" style="padding-bottom: 10px;">
									        		
										        			<div class="col-md-6">
										        				<label for="exampleInputEmail1">Check Cable Tidiness</label> <p class="font-smaller">* Make sure the tidiness of cables</p>
										        			</div>
										        			<div class="col-md-6 font_class">
										        				<input type="radio" name="checklist_4"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="checklist_4" value="No"> No</input>
									          					<input type="radio" name="checklist_4" value="N/A"> N/A</input>
										        				<!-- <select class="form-control" name="checklist_4">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
									        		
									        			
									        		</div>


									        		<div class="col-md-6">
									        			<div class="row" style="padding-bottom: 10px;">
										        			<div class="col-md-6">
										        				<label for="exampleInputEmail1">Check LED Signal Functioning</label>
										        			</div>
										        			<div class="col-md-6 font_class">
										        				<input type="radio" name="checklist_5"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="checklist_5" value="No"> No</input>
									          					<input type="radio" name="checklist_5" value="N/A"> N/A</input>
										        				<!-- <select class="form-control" name="checklist_5">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
										        		<div class="row" style="padding-bottom: 10px;">
										        			<div class="col-md-6">
										        				<label for="exampleInputEmail1">Perform Device Test</label>
										        			</div>
										        			<div class="col-md-6 font_class">
										        				<input type="radio" name="checklist_6"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="checklist_6" value="No"> No</input>
									          					<input type="radio" name="checklist_6" value="N/A"> N/A</input>
										        				<!-- <select class="form-control" name="checklist_6">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
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



									        <div class="row" id="div_comment_list">
									        	<div class="col-md-12">
									        		<table class="table">
													    <thead>
													      <tr>
													        <th>Comment List</th>
													      </tr>
													    </thead>
													    <tbody id="list_comment">

													    </tbody >
													</table>
									        	</div>
									        </div>
									        
									        
									</div>
									<div class="col-md-5" style="border-radius: 10px; padding-top: 0px;">

											<?php $status = status_ppm_register($_GET['hostname'],$_GET['ppm_id']); ?>



											<?php if(!empty($this->session->userdata('idModule'))) { ?>
												
												<?php 
													$endorse = check_endorse($this->session->userdata('group_name'),$this->session->userdata('userid'));
													$verify = check_verify($this->session->userdata('group_name'),$this->session->userdata('userid'));
													$team = check_team($this->session->userdata('group_name'),$this->session->userdata('userid'));

													//var_dump($team);
													//var_dump($this->session->userdata('userid'));

													if(($verify=='1')||($endorse=='1')){ 
												?>	
														<script type="text/javascript">$(document).ready(function (){disabled_item();})</script>



														<?php if($status == 'Acknowledge'){ ?>
															<div class="row" style="padding-top: 30px;">
																<div class="form-group col-md-12 pull-right" id="btn_submit_div">
														            <div class="col-md-6 col-sm-6 col-xs-6">
														          	</div>
														            <div class="col-md-6 col-sm-6 col-xs-6">
														              <button class="btn btn-primary btn-block" onclick="verify_confirm(); return false;">
														              	Verify
														          	  </button>
														          	</div>
													            </div>
															</div>
														<?php } ?>
														

												<?php } else { ?>


														<div class="form-group col-md-12 pull-right">
											              <label for="exampleInputEmail1">Acknowledge By</label>
											              <input type='text' class='form-control' name='acknowledge' id='acknowledge' list="list_customer" required>
											            </div>

											            <!-- <div class="form-group col-md-12 pull-right">
											              <label for="exampleInputEmail1">Verify By</label>
											              <input type='text' class='form-control' name='acknowledge' id='acknowledge' list="list_acknowledge" required>
											            </div> -->
												
														<div class="row" style="padding-top: 30px;">
															<div class="form-group col-md-12 pull-right" id="btn_submit_div">
													            <div class="col-md-6 col-sm-6 col-xs-6">
													              <button class="btn btn-default btn-block" onclick="go_Back_list(); return false;">
													              	Back
													          	  </button>
													          	</div>
													            <div class="col-md-6 col-sm-6 col-xs-6">
													              <button class="btn btn-primary btn-block" type="submit">
													              	Submit
													          	  </button>
													          	</div>
												            </div>
														</div>


												<?php } ?>
											<?php } else { ?>
												<?php if(($status == 'Performed')||($status == 'Performed & Send')){ ?>



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


                	var department = response.department;
                	$("#department").val(department);

                	var room_name = response.room_name;
                	$("#room_name").val(room_name);

                	$("#brand").val(response.brand);

                	$("#port").val(response.network_port);

                	$("#ip").val(response.ip_address);

                	var location = response.location;
                	getLocationDetails(location);
                	
                }
               });

	}

	function getLocationDetails(room_id)
	{

		var data = 
                    {
                      'room_id':room_id,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

        
        $.ajax({
                url: '<?= base_url() ?>Ticket/getLocationDetails',
                type: 'POST',
                dataType: 'json',
                data: data,
                beforeSend: function() {
                   // alert('Sila Tunggu');

                },
                success: function(response){
                	$("#level").val(response.level);
                	$("#department").val(response.department);

                	var room_name = response.room_name;
                	$("#room_name").val(room_name);
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

	                	var perform_date = response.perform_date;
                		$("#perform_date").val(perform_date);


	                	$("#year").val(response.year);

	                	$("#hostname").val(response.hostname);
	                	$("#location").val(response.location);
	                	//$("select[name='type_ppm']").val(response.ppm_type);

	                	//$("input[name='ppm_type']").val(response.ppm_type);

	                	//alert(response.ppm_type);
	                	//$('input[name="ppm_type"]:checked').val(response.ppm_type);
	                		
	                	if(response.ppm_type=='Barcode Scanner'){
	                		$("#a").prop("checked", true);
	                	}else if(response.ppm_type=='Flatbed Scanner'){
	                		$("#b").prop("checked", true);
	                	}else if(response.ppm_type=='Card Reader'){
	                		$("#c").prop("checked", true);
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

	                	$("#local").val(response.local);

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


	                	$("#room_name").val(response.room_name);


	                	//$("textarea[name='comment']").val(response.comment);
	  					$("#id").val(response.id_number);
	  
	  					if((response.status=='Rejected')||(response.status=='Done')){
	  						$("#btn_submit_div").remove();

	  						// $("#data_endorse_view").html('<div class="row"><div class="form-group col-md-12 pull-right"><label for="exampleInputEmail1">Submit To Endorse With</label><input type="text" class="form-control" value="'+response.endorse+'"></div></div>');

	  						$("#customer").prop('disabled',true);

	  					} else {

	  					}


	  					var check_responsible = "<?= $this->session->userdata('first_name');?>";
	  					if(response.responsible==check_responsible){

	  					} else {
	  						disabled_item();
	  					}



	  					list_comment(response.id_number);

	  					list_checkbox(response.id_number);
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


		                	if(cb_10=='1'){
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
		               	}
		          })
	}
	function disabled_item()
	{
		$("#hostname").prop('disabled',true);
		$("#location").prop('disabled',true);
		$("#laser").prop('disabled',true);
		$("#label").prop('disabled',true);

		$("#type_device").prop('disabled',true);
		$("#responsible").prop('disabled',true);
		//$("#customer").prop('disabled',true);
		//$("#acknowledge").prop('disabled',true);
		$("#brand").prop('disabled',true);
		$("#department").prop('disabled',true);
		$("#level").prop('disabled',true);
		$("#serial_number").prop('disabled',true);
		$("#mac_address").prop('disabled',true);
		$("#ram").prop('disabled',true);
		$("#model").prop('disabled',true);
		$("#brand").prop('disabled',true);
		$("#ip").prop('disabled',true);
		$("#firmware").prop('disabled',true);
		$("#port").prop('disabled',true);
		$("#date_replaced").prop('disabled',true);
		$("#ppm_tag").prop('disabled',true);
		$("#device_tag").prop('disabled',true);
		$("#need_replacement").prop('disabled',true);

		$("#quarter").prop('disabled',true);


		$("[name=checklist_1]").prop('disabled',true);
		$("[name=checklist_2]").prop('disabled',true);
		$("[name=checklist_3]").prop('disabled',true);
		$("[name=checklist_4]").prop('disabled',true);
		$("[name=checklist_5]").prop('disabled',true);
		$("[name=checklist_6]").prop('disabled',true);

		//$("textarea[name='comment']").prop('disabled',true);

	}
</script>



<script type="text/javascript">
	$(document).ready(function (){
		check_ppm_register();

		function check_ppm_register()
		{
			var id= "<?= hex2bin($_GET['ppm_id'])?>";
			var name= "<?= hex2bin($_GET['hostname'])?>";
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
		                		$('#form_data').attr('action', '<?= base_url()?>Form_PPM/Add_scanner');
		                		getDetails();
		                	}
		               	}
		          })
			
		}


		function get_id_number_ppm()
		{
			var id= "<?= hex2bin($_GET['ppm_id'])?>";
			var name= "<?= hex2bin($_GET['hostname'])?>";
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
								//$('#form_data').attr('action', '<?= base_url()?>Form_PPM/Update_Scanner');


								<?php if($this->uri->segment(2)=='User_Scanner'){ ?>
									// alert('a');
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

	function go_Back_list()
	{
		window.location.href='<?= base_url()?>Form_PPM/data_workstation/<?= hex2bin($_GET['ppm_id'])?>';
	}

	function acknowledge_confirm()
	{
		var id= $("#id").val();
		var comment= $("#comment").val();
		var data =  {
		                    'id':id,
		                    'comment':comment,
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
	                	var q = "<?= hex2bin($_GET['ppm_id']) ?>";
	                	<?php 
	                		if(!empty($_GET['u'])){
	                			$u = $_GET['u'];
	                		} else {
	                			$u = '';
	                		}

	                	?>

	                	var u = "<?= $u  ?>";
	                	window.location.href="<?= base_url()?>Form_PPM/Form_PPM_Client_Work/1?q="+q+"&d=&t=&s=Performed&u="+u;
	               	}
	          })
	}


	function verify_confirm()
	{
		// var id= "<?= hex2bin($_GET['ppm_id'])?>";
		// var name= "<?= hex2bin($_GET['hostname'])?>";

		var id= "<?= $_GET['ppm_id'] ?>";
		var name= "<?= $_GET['hostname'] ?>";	
		$('#form_data').attr('action', '<?= base_url()?>Form_PPM/Update_Computer_Verify');
		$('#form_data').attr('method', 'get');
		$('#form_data').submit();
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




<script type="text/javascript">

	function list_comment(id)
	{

		var data =  {
		                    'id':id,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		            }

	    $.ajax({
	                url: '<?= base_url() ?>Form_PPM/list_comment',
	                type: 'POST',
	                dataType: 'json',
	                data: data,
	                beforeSend: function() {
	                   
	                },
	                success: function(response){
	                	var comment = response.comment;
	                	var comment_acknowledge = response.comment_acknowledge;
	                	var comment_endorse = response.comment_endorse;
	                	var comment_verifier = response.comment_verifier;



	                	var created_by = response.created_by;
	                	var created_by_acknowledge = response.created_by_acknowledge;
	                	var created_by_endorse = response.created_by_endorse;
	                	var created_by_verifier = response.created_by_verifier;



	                	if(comment){
	                		$("#list_comment").append('<tr><td><span id="username_created"></span> : '+comment+'</td></tr>');
	                		username_created();
	                	}


	                	if(comment_acknowledge){
	                		$("#list_comment").append('<tr><td>'+created_by_acknowledge+' : '+comment_acknowledge+'</td></tr>');

	                	}


	                	if(comment_endorse){
	                		$("#list_comment").append('<tr><td>'+comment_endorse+'</td></tr>');
	                	}


	                	if(comment_verifier){
	                		$("#list_comment").append('<tr><td><span id="username_verifier">'+created_by_verifier+' </span>: '+comment_verifier+'</td></tr>');
	                		username_verifier(created_by_verifier);
	                	}
	                }
	          });
	}



	function username_verifier(created_by_verifier)
	{
		var data =  {
		                    'id':created_by_verifier,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		            }

	    $.ajax({
	                url: '<?= base_url() ?>Form_PPM/get_name_user',
	                type: 'POST',
	                dataType: 'json',
	                data: data,
	                beforeSend: function() {
	                   
	                },
	                success: function(response){
	                	var name = response.first_name;
	                	$("#username_verifier").html(name);
	                }
	           });
	}



	function username_created()
	{
		var name = $("#responsible").val();
	    $("#username_created").html(name);
	}
</script>

<script type="text/javascript">

	$('#cb_1').change(function(){
	     if(this.checked){
	          $(this).val('1');
	          $(this).attr('checked','true');
	     }else{
	          $(this).val('');
	          $(this).removeAttr('checked');
	     }
	});

	$('#cb_2').change(function(){
	     if(this.checked){
	          $(this).val('1');
	          $(this).attr('checked','true');
	     }else{
	          $(this).val('');
	          $(this).removeAttr('checked');
	     }
	});

	$('#cb_3').change(function(){
	     if(this.checked){
	          $(this).val('1');
	          $(this).attr('checked','true');
	     }else{
	          $(this).val('');
	          $(this).removeAttr('checked');
	     }
	});

	$('#cb_4').change(function(){
	     if(this.checked){
	          $(this).val('1');
	          $(this).attr('checked','true');
	     }else{
	          $(this).val('');
	          $(this).removeAttr('checked');
	     }
	});

	$('#cb_5').change(function(){
	     if(this.checked){
	          $(this).val('1');
	          $(this).attr('checked','true');
	     }else{
	          $(this).val('');
	          $(this).removeAttr('checked');
	     }
	});

	$('#cb_6').change(function(){
	     if(this.checked){
	          $(this).val('1');
	          $(this).attr('checked','true');
	     }else{
	          $(this).val('');
	          $(this).removeAttr('checked');
	     }
	});

	$('#cb_7').change(function(){
	     if(this.checked){
	          $(this).val('1');
	          $(this).attr('checked','true');
	     }else{
	          $(this).val('');
	          $(this).removeAttr('checked');
	     }
	});

	$('#cb_8').change(function(){
	     if(this.checked){
	          $(this).val('1');
	          $(this).attr('checked','true');
	     }else{
	          $(this).val('');
	          $(this).removeAttr('checked');
	     }
	});

	$('#cb_9').change(function(){
	     if(this.checked){
	          $(this).val('1');
	          $(this).attr('checked','true');
	     }else{
	          $(this).val('');
	          $(this).removeAttr('checked');
	     }
	});

	$('#cb_10').change(function(){
	     if(this.checked){
	          $(this).val('1');
	          $(this).attr('checked','true');
	     }else{
	          $(this).val('');
	          $(this).removeAttr('checked');
	     }
	});

	$('#cb_11').change(function(){
	     if(this.checked){
	          $(this).val('1');
	          $(this).attr('checked','true');
	     }else{
	          $(this).val('');
	          $(this).removeAttr('checked');
	     }
	});

	$('#cb_12').change(function(){
	     if(this.checked){
	          $(this).val('1');
	          $(this).attr('checked','true');
	     }else{
	          $(this).val('');
	          $(this).removeAttr('checked');
	     }
	});

</script>