<div class="pageheader hidden-xs">
    <h3><i class="fa fa-list"></i> Form PPM : Server & Storage </h3>
    <div class="breadcrumb-wrapper">
    </div>
</div>

<div class="row" style="padding-bottom: 30px;">
	<div class="content-wrapper">
		<section class="content">
			<div class="row">

				<div class="col-md-12">


					<div class="box box-success">
			          <div class="box-header with-border">
			            <label class="box-title"> <b><?= get_name_activity(hex2bin($_GET['ppm_id']))?> : <?= hex2bin($_GET['hostname'])?></b></b> </label>
			          </div>
			          	<form action="<?=base_url()?>Form_PPM/Add_Server" method="post" id="form_data">
			          	  <input type="hidden" name="id" id="id">
			          	  <input type="hidden" name="ppm_id" id="ppm_id" value="<?= hex2bin($_GET['ppm_id'])?>">
			          	  <input type="hidden" id="get_from_id" name="get_from_id">
				          <div class="box-body">
				          		<div class="row" style="padding-left: 20px; padding-right: 20px; ">
				          			<div class="col-md-12" style="background-color: #fff; border-radius: 10px; padding-top: 10px; border: 1px solid #bdbdbd;">
								            <div class="form-group col-md-2">
								              <label for="exampleInputEmail1">Type Of PPM</label>
								              <select class="form-control" name="type_ppm" id="type_ppm">
								              	<option value="Server & Storage">Server & Storage</option>
								              </select>
								            </div>
								            <div class="form-group col-md-2">
								              <label for="exampleInputEmail1">Type Device</label>
								              <select class="form-control" name="type_device2" id="type_device2" onchange="type_device_computer();" disabled>
								              	<option value="">-- Select Type --</option>
								              	<option value="Server(Physical)">Server(Physical)</option>
								              	<option value="Server(Virtual)">Server(Virtual)</option>
								              	<option value="Storage">Storage</option>
								              </select>
								              <select class="form-control" name="type_device" id="type_device" onchange="type_device_computer();" style="display: none">
								              	<option value="">-- Select Type --</option>
								              	<option value="Server(Physical)">Server(Physical)</option>
								              	<option value="Server(Virtual)">Server(Virtual)</option>
								              	<option value="Storage">Storage</option>
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
								              <label for="exampleInputEmail1">Quarter</label>
								              <select class="form-control" name="quarter" id="quarter">
								              	<option value="Q1">Q1</option>
								              	<option value="Q2">Q2</option>
								              	<option value="Q3">Q3</option>
								              	<option value="Q4">Q4</option>
								              </select>
								            </div>
								            <div class="form-group col-md-2">
								              <label>Perform Date</label>
									          <input type="text" class="form-control datepicker" name="perform_date" id="perform_date">
								            </div>
					          				<div class="form-group col-md-4">
								              <label for="exampleInputEmail1">Responsible</label>
								              <input type='text' class='form-control' name='responsible' id='responsible' value="<?= $this->session->userdata('first_name')?>" disabled>
								            </div>
					          		</div>
				          		</div>


				          		<div class="row" style="padding-left: 20px; padding-top: 30px; padding-right: 20px;">
				          			<div class="col-md-12" style="background-color: #fff; border-radius: 10px; padding-top: 10px; border: 1px solid #bdbdbd;">

				          					<legend style="font-size: 15px; font-weight: 700;">Device Details</legend>

				          					<div class="row">
					          					<div class="form-group col-md-4">
									              <label for="exampleInputEmail1">Hostname</label>
									              <input type='text' class='form-control' name='hostname' id='hostname' list="hostname_pc" onchange="getDetails();" value="<?= hex2bin($_GET['hostname'])?>">
									            </div>
									        </div>

									        <datalist id="hostname_pc">
									        	<?= lookup_hostname_pc()?>
									        </datalist>

									        <div class="row">
									        	<div class="col-md-4">
								          			<div class="row">
											            <div class="form-group col-md-12">
											              <label for="exampleInputEmail1">Location</label>
											              <input type="text" class="form-control" name="location" id="location">
											            </div>
											            <div class="form-group col-md-12">
											              <label for="exampleInputEmail1">Model</label>
											              <input type="text" class="form-control" name="model" id="model">
											            </div>
								          				<div class="form-group col-md-12">
											              <label for="exampleInputEmail1">Manufacturer</label>
											              <input type="text" class="form-control" name="manufacturer" id="manufacturer">
											              <!-- <select class="form-control" name="location" id="location">
											              	<option value="">--Select Location --</option>
											              	<?= option_ward()?>
											              </select> -->
											            </div>
											       	</div>
										        </div>
										        <div class="col-md-4">
								          			<div class="row">
											            <div class="form-group col-md-12">
											              <label for="exampleInputEmail1">Device Serial Number</label>
											              <input type="text" class="form-control" name="serial_number" id="serial_number">
											            </div>
											            <div class="form-group col-md-12">
											              <label for="exampleInputEmail1">Operating System (OS)</label>
											              <input type="text" class="form-control" name="os" id="os">
											            </div>
								          				<div class="form-group col-md-12">
											              <label for="exampleInputEmail1">IP Address (LAN)</label>
											              <input type="text" class="form-control" name="ip" id="ip">
											              <!-- <select class="form-control" name="location" id="location">
											              	<option value="">--Select Location --</option>
											              	<?= option_ward()?>
											              </select> -->
											            </div>
											       	</div>
										        </div>
										        <div class="col-md-4">
								          			<div class="row">
											            <div class="form-group col-md-12">
											              <label for="exampleInputEmail1">Mac Address</label>
											              <input type="text" class="form-control" name="mac_address" id="mac_address">
											            </div>
											       	</div>
										        </div>
									        </div>	
					          		</div>
				          		</div>



				          		<div class="row" style="padding-left: 20px; padding-top: 30px; padding-right: 20px;">
				          			<div class="col-md-12" style="background-color: #fff; border-radius: 10px; padding-top: 10px; border: 1px solid #bdbdbd;">

				          					

				          					<div class="row">
				          						<div class="col-md-6">
				          							<legend style="font-size: 15px; font-weight: 700;">Physical Check</legend>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1">1. Check connection (Data cable and power connection)</label>
								          				</div>
								          				<div class="col-md-4 font_class">
															<input type="radio" name="physical_1"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="physical_1" value="No"> No</input>
								          					<input type="radio" name="physical_1" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="physical_1" id="physical_1">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1">2. Check the power sources(Plugged into protected outlets)</label>
								          				</div>
								          				<div class="col-md-4 font_class">
															<input type="radio" name="physical_2"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="physical_2" value="No"> No</input>
								          					<input type="radio" name="physical_2" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="physical_2" id="physical_2">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1">3. Check the fan (CPU's cooling fan is working & the airflow isn't impeded by dust)</label>
								          				</div>
								          				<div class="col-md-4 font_class">
															<input type="radio" name="physical_3"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="physical_3" value="No"> No</input>
								          					<input type="radio" name="physical_3" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="physical_3" id="physical_3">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-12"><label>4. Check LED signal function</label> </div>
								          				<div class="col-md-8" style="padding-left: 30px;">
								          					<label for="exampleInputEmail1"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i>4.1 Make sure LED signal for Hard Disk is functioning</label>
								          				</div>
								          				<div class="col-md-4 font_class" style="padding-bottom: 10px;">
															<input type="radio" name="physical_4"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="physical_4" value="No"> No</input>
								          					<input type="radio" name="physical_4" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="physical_4" id="physical_4">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          				
								          				<div class="col-md-8" style="padding-left: 30px;">
								          					<label for="exampleInputEmail1"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i>4.2 Make sure LED signal for Monitor is functioning</label>
								          				</div>
								          				<div class="col-md-4 font_class" style="padding-bottom: 10px;">
															<input type="radio" name="physical_5"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="physical_5" value="No"> No</input>
								          					<input type="radio" name="physical_5" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="physical_5" id="physical_5">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>

								          				<div class="col-md-8" style="padding-left: 30px;">
								          					<label for="exampleInputEmail1"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i>4.3 Make sure LED signal for Network is functioning</label>
								          				</div>
								          				<div class="col-md-4 font_class" style="padding-bottom: 10px;">
								          					<input type="radio" name="physical_6"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="physical_6" value="No"> No</input>
								          					<input type="radio" name="physical_6" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="physical_6" id="physical_6">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>

								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1">5. Check UPS (Make sure UPS is connected properly and functioning)</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="physical_7"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="physical_7" value="No"> No</input>
								          					<input type="radio" name="physical_7" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="physical_7" id="physical_7">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>


								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1">6. Update and verify inventory (Check and verify serial number)</label>
								          				</div>
								          				<div class="col-md-4 font_class">
															<input type="radio" name="physical_8"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="physical_8" value="No"> No</input>
								          					<input type="radio" name="physical_8" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="physical_8" id="physical_8">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>

								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1">7. Check and verify CPU</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="physical_9"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="physical_9" value="No"> No</input>
								          					<input type="radio" name="physical_9" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="physical_9" id="physical_9">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>


								          				<div class="col-md-5" style="padding-top: 10px; padding-bottom: 30px;">
								          				</div>
								          				<div class="col-md-3 font_class">
								          					CPU Speed (GHZ)
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="text" class="form-control" name="cpu_speed">
								          				</div>

								          				<div class="col-md-3 font_class">
								          					CPU Core
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="text" class="form-control" name="cpu_core">
								          				</div>

								          			</div>



								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1">8. Check and verify physical memory</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="physical_27"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="physical_27" value="No"> No</input>
								          					<input type="radio" name="physical_27" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="physical_9" id="physical_9">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>


								          				<div class="col-md-5" style="padding-top: 10px; padding-bottom: 30px;">
								          				</div>
								          				<div class="col-md-3 font_class">
								          					Capacity (GB)
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="text" class="form-control" name="capacity">
								          				</div>

								          			</div>



								          			<div class="row" style="padding-bottom: 30px;">
								          				<div class="col-md-12"><label>9. Check Disk Space Available</label> </div>
								          				<div class="row" style="padding-left: 15px;">
									          				<div class="col-md-8">
									          					<div class="col-md-6">
									          						<label>9.1 Hard Disk Space : C (GB)</label>
									          						<input type="text" class="form-control" name="physical_10" id="physical_10">
									          					</div>
									          					<div class="col-md-6">
									          						<label>Free Space</label>
									          						<input type="text" class="form-control" name="physical_11" id="physical_11">
									          					</div>
									          				</div>
									          				<div class="col-md-4 font_class" style="padding-bottom: 10px; padding-top: 20px; padding-right: 30px;">
									          					<input type="radio" name="physical_12"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="physical_12" value="No"> No</input>
									          					<input type="radio" name="physical_12" value="N/A"> N/A</input>
																<!-- <select class="form-control" name="physical_12" id="physical_12">
																	<option value="">--Select Type --</option>
																	<?= yes_or_no() ?>
																</select>
 -->									          				</div>
									          			</div>
									          			<div class="row" style="padding-left: 15px;">
									          				<div class="col-md-8">
									          					<div class="col-md-6">
									          						<label>9.2 Hard Disk Space : D (GB)</label>
									          						<input type="text" class="form-control" name="physical_13" id="physical_13">
									          					</div>
									          					<div class="col-md-6">
									          						<label>Free Space</label>
									          						<input type="text" class="form-control" name="physical_14" id="physical_14">
									          					</div>
									          				</div>
									          				<div class="col-md-4 font_class" style="padding-bottom: 10px; padding-top: 20px; padding-right: 30px;">
																<input type="radio" name="physical_15"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="physical_15" value="No"> No</input>
									          					<input type="radio" name="physical_15" value="N/A"> N/A</input>
																<!-- <select class="form-control" name="physical_15" id="physical_15">
																	<option value="">--Select Type --</option>
																	<?= yes_or_no() ?>
																</select> -->
									          				</div>
									          			</div>
									          			<div class="row" style="padding-left: 15px;">
									          				<div class="col-md-8">
									          					<div class="col-md-6">
									          						<label>9.3 Hard Disk Space : E (GB)</label>
									          						<input type="text" class="form-control" name="physical_16" id="physical_16">
									          					</div>
									          					<div class="col-md-6">
									          						<label>Free Space</label>
									          						<input type="text" class="form-control" name="physical_17" id="physical_17">
									          					</div>
									          				</div>
									          				<div class="col-md-4 font_class" style="padding-bottom: 10px; padding-top: 20px; padding-right: 30px;">
																<input type="radio" name="physical_18"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="physical_18" value="No"> No</input>
									          					<input type="radio" name="physical_18" value="N/A"> N/A</input>
																<!-- <select class="form-control" name="physical_18" id="physical_18">
																	<option value="">--Select Type --</option>
																	<?= yes_or_no() ?>
																</select> -->
									          				</div>
									          			</div>
								          			</div>

								          			<div class="row">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1">10. Check KVM switch functionality</label>
								          				</div>
								          				<div class="col-md-4 font_class" style="padding-bottom: 10px;">
								          					<input type="radio" name="physical_19"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="physical_19" value="No"> No</input>
								          					<input type="radio" name="physical_19" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="physical_19" id="physical_19">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>

								          				<div class="col-md-7" style="padding-top: 10px; padding-bottom: 30px;">
								          				</div>
								          				<div class="col-md-1 font_class">
								          					SN
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="text" class="form-control" name="sn_kvm">
								          				</div>

								          			</div>


								          			<div class="row">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1">11. Check tape library functionality</label>
								          				</div>
								          				<div class="col-md-4 font_class" style="padding-bottom: 10px;">
															<input type="radio" name="physical_20"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="physical_20" value="No"> No</input>
								          					<input type="radio" name="physical_20" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="physical_20" id="physical_20">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>

								          				<div class="col-md-7" style="padding-top: 10px; padding-bottom: 10px;">
								          				</div>
								          				<div class="col-md-1 font_class">
								          					SN
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="text" class="form-control" name="sn_tape">
								          				</div>

								          			</div>
								          			<div class="row">
									          			<div class="col-md-12"><label>12. Storage</label> </div>
									          			<div class="row" style="padding-left: 15px;">
									          				<div class="col-md-8">
									          					<div class="col-md-6">
									          						<label>12.1. Total Disk</label>
									          						<input type="text" class="form-control" name="physical_21" id="physical_21">
									          					</div>
									          					<div class="col-md-6">
									          						<label>Available Disks</label>
									          						<input type="text" class="form-control" name="physical_22" id="physical_22">
									          					</div>
									          				</div>
									          				<div class="col-md-4 font_class" style="padding-bottom: 10px; padding-top: 20px; padding-right: 30px;">
																<input type="radio" name="physical_23"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="physical_23" value="No"> No</input>
									          					<input type="radio" name="physical_23" value="N/A"> N/A</input>
																<!-- <select class="form-control" name="physical_23" id="physical_23">
																	<option value="">--Select Type --</option>
																	<?= yes_or_no() ?>
																</select> -->
									          				</div>
									          			</div>
									          			<div class="row" style="padding-left: 15px;">
									          				<div class="col-md-8">
									          					<div class="col-md-6">
									          						<label>12.2. Total Space</label>
									          						<input type="text" class="form-control" name="physical_24" id="physical_24">
									          					</div>
									          					<div class="col-md-6">
									          						<label>Available Space</label>
									          						<input type="text" class="form-control" name="physical_25" id="physical_25">
									          					</div>
									          				</div>
									          				<div class="col-md-4 font_class" style="padding-bottom: 30px; padding-top: 20px; padding-right: 30px;">
																<input type="radio" name="physical_26"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="physical_26" value="No"> No</input>
									          					<input type="radio" name="physical_26" value="N/A"> N/A</input>
																<!-- <select class="form-control" name="physical_26" id="physical_26">
																	<option value="">--Select Type --</option>
																	<?= yes_or_no() ?>
																</select> -->
									          				</div>
									          			</div>
								          			</div>

										        </div>

										        <div class="col-md-6">
				          							<legend style="font-size: 15px; font-weight: 700;">Setting & Configuration</legend>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1">1. Run ScanDisk on system drive</label>
								          				</div>
								          				<div class="col-md-4 font_class">
															<input type="radio" name="setting_1"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="setting_1" value="No"> No</input>
								          					<input type="radio" name="setting_1" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="setting_1" id="setting_1">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1">2. Run Disk Defragmentation (applicable to all drive)</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="setting_2"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="setting_2" value="No"> No</input>
								          					<input type="radio" name="setting_2" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="setting_2" id="setting_2">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1">3. Check and install driver updates</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="setting_3"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="setting_3" value="No"> No</input>
								          					<input type="radio" name="setting_3" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="setting_3" id="setting_3">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1">4. Check and update service pack</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="setting_4"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="setting_4" value="No"> No</input>
								          					<input type="radio" name="setting_4" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="setting_4" id="setting_4">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>

								          				<div class="col-md-5" style="padding-top: 10px; padding-bottom: 30px;">
								          				</div>
								          				<div class="col-md-3 font_class">
								          					Service Pack
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="text" class="form-control" name="service_pack">
								          				</div>
								          			</div>

								          			<div class="row"><div class="col-md-12"><label>5. Check and record average CPU Utilization dated for one month</label></div></div>

								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8" style="padding-left: 30px;">
								          					<div class="col-md-6">
								          						<label for="exampleInputEmail1">5.1 CPU Utilization : Min</label>
								          					</div>
								          					<div class="col-md-6">
								          						<input type="text" class="form-control" name="setting_5" id="setting_5">
								          					</div>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="setting_6"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="setting_6" value="No"> No</input>
								          					<input type="radio" name="setting_6" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="setting_6" id="setting_6">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8" style="padding-left: 30px;">
								          					<div class="col-md-6">
								          						<label for="exampleInputEmail1">5.2 CPU Utilization : Max</label>
								          					</div>
								          					<div class="col-md-6">
								          						<input type="text" class="form-control" name="setting_7" id="setting_7">
								          					</div>
								          				</div>
								          				<div class="col-md-4 font_class">
															<input type="radio" name="setting_8"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="setting_8" value="No"> No</input>
								          					<input type="radio" name="setting_8" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="setting_8" id="setting_8">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8" style="padding-left: 30px;">
								          					<div class="col-md-6">
								          						<label for="exampleInputEmail1">5.3 CPU Utilization : Avg</label>
								          					</div>
								          					<div class="col-md-6">
								          						<input type="text" class="form-control" name="setting_9" id="setting_9">
								          					</div>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="setting_10"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="setting_10" value="No"> No</input>
								          					<input type="radio" name="setting_10" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="setting_10" id="setting_10">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>

								          				

								          			</div>



								          			<div class="row"><div class="col-md-12"><label>6. Check and record average Memory Utilization dated for one month</label></div></div>

								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8" style="padding-left: 30px;">
								          					<div class="col-md-6">
								          						<label for="exampleInputEmail1">6.1 Memory Utilization : Min</label>
								          					</div>
								          					<div class="col-md-6">
								          						<input type="text" class="form-control" name="setting_18" id="setting_18">
								          					</div>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="setting_19"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="setting_19" value="No"> No</input>
								          					<input type="radio" name="setting_19" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="setting_6" id="setting_6">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8" style="padding-left: 30px;">
								          					<div class="col-md-6">
								          						<label for="exampleInputEmail1">6.2 Memory Utilization : Max</label>
								          					</div>
								          					<div class="col-md-6">
								          						<input type="text" class="form-control" name="setting_20" id="setting_20">
								          					</div>
								          				</div>
								          				<div class="col-md-4 font_class">
															<input type="radio" name="setting_21"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="setting_21" value="No"> No</input>
								          					<input type="radio" name="setting_21" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="setting_8" id="setting_8">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8" style="padding-left: 30px;">
								          					<div class="col-md-6">
								          						<label for="exampleInputEmail1">6.3 Memory Utilization : Avg</label>
								          					</div>
								          					<div class="col-md-6">
								          						<input type="text" class="form-control" name="setting_22" id="setting_22">
								          					</div>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="setting_23"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="setting_23" value="No"> No</input>
								          					<input type="radio" name="setting_23" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="setting_10" id="setting_10">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>



								          			<div class="row" style="padding-bottom: 10px; font-size:15px; padding-top: 30px;">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1">7. Check and install latest Hotfix if needed</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="setting_11"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="setting_11" value="No"> No</input>
								          					<input type="radio" name="setting_11" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="setting_11" id="setting_11">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<p style="padding-top: 10px; font-size:15px;">8. Check and record software or application (data applicable for live server)</p>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-4">
								          					<label for="exampleInputEmail1">8.1 Application</label>
								          				</div>
								          				<div class="col-md-4">
								          					<input type="text" class="form-control" name="setting_12" id="setting_12">
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="setting_13"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="setting_13" value="No"> No</input>
								          					<input type="radio" name="setting_13" value="N/A"> N/A</input>
								          					<!-- <select class="form-control" name="setting_13" id="setting_13">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-4">
								          					<label for="exampleInputEmail1">8.2 Application</label>
								          				</div>
								          				<div class="col-md-4">
								          					<input type="text" class="form-control" name="setting_14" id="setting_14">
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="setting_15"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="setting_15" value="No"> No</input>
								          					<input type="radio" name="setting_15" value="N/A"> N/A</input>
								          					<!-- <select class="form-control" name="setting_15" id="setting_15">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-4">
								          					<label for="exampleInputEmail1">8.3 Application</label>
								          				</div>
								          				<div class="col-md-4">
								          					<input type="text" class="form-control" name="setting_16" id="setting_16">
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="setting_17"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="setting_17" value="No"> No</input>
								          					<input type="radio" name="setting_17" value="N/A"> N/A</input>
								          					<!-- <select class="form-control" name="setting_17" id="setting_17">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
										        </div>
									       	</div>


					          		</div>
				          		</div>


				          		<div class="row" style="padding-left: 20px; padding-top: 30px; padding-right: 20px;">
				          			<div class="col-md-12" style="background-color: #fff; border-radius: 10px; padding-top: 10px; border: 1px solid #bdbdbd;">

				          					

				          					<div class="row">
				          						<div class="col-md-6">
				          							<legend style="font-size: 15px; font-weight: 700;">Housekeeping</legend>

				          							<div class="row">
					          							<div class="form-group col-md-12">
											              <label for="exampleInputEmail1">1. Clean other physical peripheral devices if there is any :</label>
											            </div>
											        </div>

								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1" style="padding-left: 10px;">1.1 Monitor</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="house_keeping_1"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="house_keeping_1" value="No"> No</input>
								          					<input type="radio" name="house_keeping_1" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="house_keeping_1" id="house_keeping_1">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1" style="padding-left: 10px;">1.2 CPU</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="house_keeping_2"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="house_keeping_2" value="No"> No</input>
								          					<input type="radio" name="house_keeping_2" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="house_keeping_2" id="house_keeping_2">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1" style="padding-left: 10px;">1.3 Keyboard</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="house_keeping_3"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="house_keeping_3" value="No"> No</input>
								          					<input type="radio" name="house_keeping_3" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="house_keeping_3" id="house_keeping_3">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px; ">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1" style="padding-left: 10px;">1.4 Mouse</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="house_mouse_3"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="house_mouse_3" value="No"> No</input>
								          					<input type="radio" name="house_mouse_3" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="house_keeping_3" id="house_keeping_3">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1">2. Delete .tmp files</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="house_keeping_4"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="house_keeping_4" value="No"> No</input>
								          					<input type="radio" name="house_keeping_4" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="house_keeping_4" id="house_keeping_4">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1">3. Delete and clean unused temporary internet files</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="house_keeping_5"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="house_keeping_5" value="No"> No</input>
								          					<input type="radio" name="house_keeping_5" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="house_keeping_5" id="house_keeping_5">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1">4. Empty the Recycle Bin</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="house_keeping_6"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="house_keeping_6" value="No"> No</input>
								          					<input type="radio" name="house_keeping_6" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="house_keeping_6" id="house_keeping_6">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1">5. Device ID Tagging</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="house_keeping_7"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="house_keeping_7" value="No"> No</input>
								          					<input type="radio" name="house_keeping_7" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="house_keeping_7" id="house_keeping_7">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          				
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1" style="padding-left: 10px;"> 5.1 Need Replacement </label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<!-- <input type="text" class="form-control" name="need_replacement_houskeeping"> -->
								          					<input type="radio" name="need_replacement_houskeeping"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="need_replacement_houskeeping" value="No"> No</input>
								          					<input type="radio" name="need_replacement_houskeeping" value="N/A"> N/A</input>
								          				</div>
								          			</div>

								          			<div class="row">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1">6. PPM Tag</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="house_ppm_tag_3"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="house_ppm_tag_3" value="No"> No</input>
								          					<input type="radio" name="house_ppm_tag_3" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="house_keeping_3" id="house_keeping_3">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          		</div>

								          		<div class="col-md-6">
				          							<legend style="font-size: 15px; font-weight: 700;">Security</legend>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1">1. Change password (twice a year)</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="security_1"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="security_1" value="No"> No</input>
								          					<input type="radio" name="security_1" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="security_1" id="security_1">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>


								          			<div class="row">
								          				<div class="col-md-12"><label>2. List of username : </label></div>
								          			</div>

								          			<div class="row">
									          			<div class="row" style="padding-left: 15px;">
									          				<div class="col-md-8">
									          					<div class="col-md-6">
									          						<label>2.1 Username</label>
									          						<input type="text" class="form-control" name="security_2" id="security_2">
									          					</div>
									          					<div class="col-md-6">
									          						<label>Role</label>
									          						<input type="text" class="form-control" name="security_3" id="security_3">
									          					</div>
									          				</div>
									          				<div class="col-md-4 font_class" style="padding-bottom: 10px; padding-top: 20px; padding-right: 30px;">
																<input type="radio" name="security_4"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="security_4" value="No"> No</input>
									          					<input type="radio" name="security_4" value="N/A"> N/A</input>
																<!-- <select class="form-control" name="security_4" id="security_4">
																	<option value="">--Select Type --</option>
																	<?= yes_or_no() ?>
																</select> -->
									          				</div>
									          			</div>
									          			<div class="row" style="padding-left: 15px;">
									          				<div class="col-md-8">
									          					<div class="col-md-6">
									          						<label>2.2 Username</label>
									          						<input type="text" class="form-control" name="security_5" id="security_5">
									          					</div>
									          					<div class="col-md-6">
									          						<label>Role</label>
									          						<input type="text" class="form-control" name="security_6" id="security_6">
									          					</div>
									          				</div>
									          				<div class="col-md-4 font_class" style="padding-bottom: 10px; padding-top: 20px; padding-right: 30px;">
																<input type="radio" name="security_7"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="security_7" value="No"> No</input>
									          					<input type="radio" name="security_7" value="N/A"> N/A</input>
																<!-- <select class="form-control" name="security_7" id="security_7">
																	<option value="">--Select Type --</option>
																	<?= yes_or_no() ?>
																</select> -->
									          				</div>
									          			</div>	
									          		</div>

									          		<div class="row" style="padding-bottom: 20px; padding-top: 30px;">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1">3. Check for backup job (Backup is successfully performed)</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="security_8"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="security_8" value="No"> No</input>
								          					<input type="radio" name="security_8" value="N/A"> N/A</input>
															<!-- <select class="form-control" name="security_8" id="security_8">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>

								          			<div class="row">
								          				<div class="col-md-12"><label>4. Antivirus (Symantec Endpoint Protection)</label></div>
								          				<div class="row" style="padding-left: 15px;">
									          				<div class="col-md-8">
									          					<div class="col-md-12"><label>4.1 Check the latest antivirus software definition</label>
									          					</div>
									          					<div class="col-md-6">
									          						<label>Version</label>
									          						<input type="text" class="form-control" name="security_9" id="security_9">
									          					</div>
									          					<div class="col-md-6">
									          						<label>Date</label>
									          						<input type="text" class="form-control datepicker" name="security_10" id="security_10">
									          					</div>
									          				</div>
									          				<div class="col-md-4 font_class" style="padding-bottom: 10px; padding-top: 20px; padding-right: 30px;">
									          					<input type="radio" name="security_11"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="security_11" value="No"> No</input>
									          					<input type="radio" name="security_11" value="N/A"> N/A</input>
																<!-- <select class="form-control" name="security_11" id="security_11">
																	<option value="">--Select Type --</option>
																	<?= yes_or_no() ?>
																</select> -->
									          				</div>
									          			</div>	


									          			<div class="row" style="padding-left: 30px;">
									          				<div class="col-md-8">
									          					<label>4.2 Perform full antivirus</label>
									          				</div>
									          				<div class="col-md-4 font_class" style="padding-bottom: 10px; padding-right: 30px;">
									          					<input type="radio" name="security_12"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="security_12" value="No"> No</input>
									          					<input type="radio" name="security_12" value="N/A"> N/A</input>
																<!-- <select class="form-control" name="security_12" id="security_12">
																	<option value="">--Select Type --</option>
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
										<?php if(!empty($this->session->userdata('idModule'))) { ?>
											<div class="row" style="padding-top: 30px;">
												<div class="form-group col-md-12 pull-right" id="btn_submit_div">
										            <div class="col-md-6 col-sm-6 col-xs-6">
										              	
										              	<?php if(check_PPM_Verify_Network_Server($this->session->userdata('group_name'),$this->session->userdata('userid'))>0){ ?>

										              		<input type="hidden" name="type_direction" value="send_verify">
										              	<?php } else if(check_endorse($this->session->userdata('group_name'),$this->session->userdata('userid'))>0){ ?>

										              		<input type="hidden" name="type_direction" value="send_endorse">

										              	<?php } else { ?>
													  		<input type="hidden" name="type_direction" value="send_perfomed">   
													 	<?php } ?>
										              
										          	</div>
										            <div class="col-md-6 col-sm-6 col-xs-6">
										              <button class="btn btn-primary btn-block" type="submit">
										              	Submit
										          	  </button>
										          	</div>
									            </div>
											</div>
										<?php } ?>
									</div>
								</div>

						  </div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>


<datalist id="list_customer">
	<?= lookup_customer_user_datalist()?>
</datalist>



<datalist id="list_acknowledge">
	<?= lookup_agent_datalist()?>
</datalist>
 
<input type="hidden" name="groupid" id="groupid" value="<?= hex2bin($_GET['hostname'])?>">

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
                url: '<?= base_url() ?>Ticket/getDetails_byHostname',
                type: 'POST',
                dataType: 'json',
                data: data,
                beforeSend: function() {
                   // alert('Sila Tunggu');

                },
                success: function(response){
                	

                	$('#os').val(response.operating_system);

                	$('#brand').val(response.CPU);
                	//alert(response.cpu_model);
                	$('#model').val(response.model);
                	$('#serial_number').val(response.serial_number);

                	var location = response.location;
                	$("#location").val(location);

                	// var serial_number = response.serial_number;
                	// $("#serial_number").val(serial_number);

                	var ram = response.Ram;
                	$("#ram").val(ram);
                	$("#processor_type").val(response.processor_type);


                	$("#monitor_brand").val(response.monitor_brand);
                	$("#monitor_model").val(response.monitor_model);
                	$("#monitor_serial_number").val(response.monitor_serial_no);


                	$("#ups_brand").val(response.ups_brand);
                	$("#ups_model").val(response.ups_model);
                	$("#ups_serial_no").val(response.ups_serial_no);

                	$("#port").val(response.network_port);

                	var ip = response.ip;
                	console.log(ip);
                	$("#ip").val(ip);
                	if(ip==''){
                		//$("#type_ip").prop('',true);
                		$( "#type_dchp" ).prop( "checked", false );
						$( "#type_static" ).prop( "checked", true );
                	}  else {
                		$( "#type_dchp" ).prop( "checked", true );
						$( "#type_static" ).prop( "checked", false );
                	}

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
	                url: '<?= base_url() ?>Form_PPM/detail_server',
	                type: 'POST',
	                dataType: 'json',
	                data: data,
	                beforeSend: function() {
	                   
	                },
	                success: function(response){

	                	$('#form_data').attr('action', '<?= base_url()?>Form_PPM/Update_Server');

	                	//$("#year").val(response.year);

	                	$("#perform_date").val(response.perform_date);
	                	$("#hostname").val(response.hostname);
	                	$("#location").val(response.location);
	                	//$("#quarter").val(response.quarter);
	                	$("#type_ppm").val(response.ppm_type);
	                	$("#type_device").val(response.ppm_device);
	                	$("#responsible").val(response.responsible);
	                	$("#customer").val(response.acknowledge);
	                	$("#acknowledge").val(response.endorse);
	                	//$("#brand").val(response.brand);
	                	$("#department").val(response.department);
	                	$("#level").val(response.cpu_level);
	                	$("#serial_number").val(response.serial_number);

	                	//alert(response.os);
	                	$("#os").val(response.os);
	                	$("#mac_address").val(response.mac_address);

	                	//$("#processor_type").val(response.cpu_processor_type);
	                	//$("#ram").val(response.cpu_ram);
	                	//$("#model").val(response.cpu_model);
	                	//$("#monitor_brand").val(response.monitor_brand);
	                	//$("#monitor_model").val(response.monitor_model);
	                	//$("#monitor_serial_number").val(response.monitor_serial_number);
	                	//$("#ups_brand").val(response.ups_brand);
	                	//$("#ups_model").val(response.ups_model);
	                	//$("#ups_serial_no").val(response.ups_serial_number);
	                	//$("#port").val(response.network_port);
	                	//alert(response.network_ip);
	                	$("#ip").val(response.network_ip);

	                	var network_type = response.network_type;
	                	$("#ip").val(response.network_ip);
	                	if(network_type=='DHCP'){
	                		$('#type_dchp').attr('checked', 'checked'); 
							$( "#type_static" ).prop( "checked", false );

	                	}  else {
							$('#type_static').attr('checked', 'checked'); 
							$( "#type_dchp" ).prop( "checked", false );
	                	}
	                	
	                	// $("#device_tag").val(response.tagging_device);
	                	// $("#need_replacement").val(response.tagging_replace);


	                	$("[name=device_tag]").val([response.tagging_device]);
	                	$("[name=need_replacement]").val([response.tagging_replace]);

	                	$("#date_replacement").val(response.tagging_date);
	                	$("#ppm_tag").val(response.tagging_tag);


	                	// $("#physical_1").val(response.physical_1);
	                	// $("#physical_2").val(response.physical_2);
	                	// $("#physical_3").val(response.physical_3);
	                	// $("#physical_4").val(response.physical_4);
	                	// $("#physical_5").val(response.physical_5);
	                	// $("#physical_6").val(response.physical_6);
	                	// $("#physical_7").val(response.physical_7);
	                	// $("#physical_8").val(response.physical_8);
	                	// $("#physical_9").val(response.physical_9);
	                	// $("#physical_10").val(response.physical_10);
	                	// $("#physical_11").val(response.physical_11);
	                	// $("#physical_12").val(response.physical_12);
	                	// $("#physical_13").val(response.physical_13);
	                	// $("#physical_14").val(response.physical_14);
	                	// $("#physical_15").val(response.physical_15);
	                	// $("#physical_16").val(response.physical_16);
	                	// $("#physical_17").val(response.physical_17);
	                	// $("#physical_18").val(response.physical_18);
	                	// $("#physical_19").val(response.physical_19);
	                	// $("#physical_20").val(response.physical_20);
	                	// $("#physical_21").val(response.physical_21);
	                	// $("#physical_22").val(response.physical_22);
	                	// $("#physical_23").val(response.physical_23);
	                	// $("#physical_24").val(response.physical_24);
	                	// $("#physical_25").val(response.physical_25);
	                	// $("#physical_26").val(response.physical_26);

	                	$("[name=physical_1]").val([response.physical_1]);
	                	$("[name=physical_2]").val([response.physical_2]);
	                	$("[name=physical_3]").val([response.physical_3]);
	                	$("[name=physical_4]").val([response.physical_4]);
	                	$("[name=physical_5]").val([response.physical_5]);
	                	$("[name=physical_6]").val([response.physical_6]);
	                	$("[name=physical_7]").val([response.physical_7]);
	                	$("[name=physical_8]").val([response.physical_8]);
	                	$("[name=physical_9]").val([response.physical_9]);

	                	$("[name=physical_10]").val([response.physical_10]);
	                	$("[name=physical_11]").val([response.physical_11]);
	                	$("[name=physical_12]").val([response.physical_12]);
	                	$("[name=physical_13]").val([response.physical_13]);
	                	$("[name=physical_14]").val([response.physical_14]);
	                	$("[name=physical_15]").val([response.physical_15]);
	                	$("[name=physical_16]").val([response.physical_16]);
	                	$("[name=physical_17]").val([response.physical_17]);
	                	$("[name=physical_18]").val([response.physical_18]);
	                	$("[name=physical_19]").val([response.physical_19]);

	                	$("[name=physical_20]").val([response.physical_20]);
	                	$("[name=physical_21]").val([response.physical_21]);
	                	$("[name=physical_22]").val([response.physical_22]);
	                	$("[name=physical_23]").val([response.physical_23]);
	                	$("[name=physical_24]").val([response.physical_24]);
	                	$("[name=physical_25]").val([response.physical_25]);
	                	$("[name=physical_26]").val([response.physical_26]);

	                	$("[name=physical_27]").val([response.physical_27]);
	                	

	                	// $("#setting_1").val(response.setting_1);
	                	// $("#setting_2").val(response.setting_2);
	                	// $("#setting_3").val(response.setting_3);
	                	// $("#setting_4").val(response.setting_4);
	                	// $("#setting_5").val(response.setting_5);
	                	// $("#setting_6").val(response.setting_6);
	                	// $("#setting_7").val(response.setting_7);
	                	// $("#setting_8").val(response.setting_8);
	                	// $("#setting_9").val(response.setting_9);
	                	// $("#setting_10").val(response.setting_10);
	                	// $("#setting_11").val(response.setting_11);
	                	// $("#setting_12").val(response.setting_12);
	                	// $("#setting_13").val(response.setting_13);
	                	// $("#setting_14").val(response.setting_14);
	                	// $("#setting_15").val(response.setting_15);
	                	// $("#setting_16").val(response.setting_16);
	                	// $("#setting_17").val(response.setting_17);


	                	$("[name=setting_1]").val([response.setting_1]);
	                	$("[name=setting_2]").val([response.setting_2]);
	                	$("[name=setting_3]").val([response.setting_3]);
	                	$("[name=setting_4]").val([response.setting_4]);
	                	$("[name=setting_5]").val([response.setting_5]);
	                	$("[name=setting_6]").val([response.setting_6]);
	                	$("[name=setting_7]").val([response.setting_7]);
	                	$("[name=setting_8]").val([response.setting_8]);
	                	$("[name=setting_9]").val([response.setting_9]);

	                	$("[name=setting_10]").val([response.setting_10]);
	                	$("[name=setting_11]").val([response.setting_11]);
	                	$("[name=setting_12]").val([response.setting_12]);
	                	$("[name=setting_13]").val([response.setting_13]);
	                	$("[name=setting_14]").val([response.setting_14]);
	                	$("[name=setting_15]").val([response.setting_15]);
	                	$("[name=setting_16]").val([response.setting_16]);
	                	$("[name=setting_17]").val([response.setting_17]);



	                	$("[name=setting_18]").val([response.setting_18]);
	                	$("[name=setting_19]").val([response.setting_19]);
	                	$("[name=setting_20]").val([response.setting_20]);
	                	$("[name=setting_21]").val([response.setting_21]);
	                	$("[name=setting_22]").val([response.setting_22]);
	                	$("[name=setting_23]").val([response.setting_23]);



	                	// $("#house_keeping_1").val(response.house_keeping_1);
	                	// $("#house_keeping_2").val(response.house_keeping_2);
	                	// $("#house_keeping_3").val(response.house_keeping_3);
	                	// $("#house_keeping_4").val(response.house_keeping_4);
	                	// $("#house_keeping_5").val(response.house_keeping_5);
	                	// $("#house_keeping_6").val(response.house_keeping_6);
	                	// $("#house_keeping_7").val(response.house_keeping_7);


	                	$("[name=house_keeping_1]").val([response.house_keeping_1]);
	                	$("[name=house_keeping_2]").val([response.house_keeping_2]);
	                	$("[name=house_keeping_3]").val([response.house_keeping_3]);
	                	$("[name=house_keeping_4]").val([response.house_keeping_4]);
	                	$("[name=house_keeping_5]").val([response.house_keeping_5]);
	                	$("[name=house_keeping_6]").val([response.house_keeping_6]);
	                	$("[name=house_keeping_7]").val([response.house_keeping_7]);


	                	$("[name=house_mouse_3]").val([response.house_keeping_8]);
	                	$("[name=house_ppm_tag_3]").val([response.house_keeping_9]);


	                	// $("#security_1").val(response.security_1);
	                	// $("#security_2").val(response.security_2);
	                	// $("#security_3").val(response.security_3);
	                	// $("#security_4").val(response.security_4);
	                	// $("#security_5").val(response.security_5);
	                	// $("#security_6").val(response.security_6);
	                	// $("#security_7").val(response.security_7);
	                	// $("#security_8").val(response.security_8);
	                	// $("#security_9").val(response.security_9);
	                	// $("#security_10").val(response.security_10);
	                	// $("#security_11").val(response.security_11);
	                	// $("#security_12").val(response.security_12);


	                	$("[name=security_1]").val([response.security_1]);
	                	$("[name=security_2]").val([response.security_2]);
	                	$("[name=security_3]").val([response.security_3]);
	                	$("[name=security_4]").val([response.security_4]);
	                	$("[name=security_5]").val([response.security_5]);
	                	$("[name=security_6]").val([response.security_6]);
	                	$("[name=security_7]").val([response.security_7]);
	                	$("[name=security_8]").val([response.security_8]);
	                	$("[name=security_9]").val([response.security_9]);
	                	$("[name=security_10]").val([response.security_10]);
	                	$("[name=security_11]").val([response.security_11]);
	                	$("[name=security_12]").val([response.security_12]);


	                	$("[name=cpu_speed]").val([response.cpu_speed]);
	                	$("[name=cpu_core]").val([response.cpu_core]);
	                	$("[name=capacity]").val([response.capacity]);
	                	$("[name=sn_kvm]").val([response.sn_kvm]);
	                	$("[name=sn_tape]").val([response.sn_tape]);
	                	$("[name=service_pack]").val([response.service_pack]);
	                	$("[name=need_replacement_houskeeping]").val([response.need_replacement_houskeeping]);

	                	//$("#comment").val(response.comment);
	  					$("#id").val(response.id_number);


	  					if((response.status=='Rejected')||(response.status=='Done')){
	  						
	  						$("#customer").prop('disabled',true);
	  						$("#acknowledge").prop('disabled',true);
	  						$("#btn_submit_div").remove();

	  						$("#person_in_charge").append('<br><label for="exampleInputEmail1">Endorse By</label> <input type="text" class="form-control" value="'+response.acknowledge+'" disabled>');

	  					} else {

	  					}

	  					var check_responsible = "<?= $this->session->userdata('first_name');?>";
	  					if(response.responsible==check_responsible){

	  					} else {
	  						//disabled_item();
	  					}


	  					$("#model").val(response.model);
	  					$("#manufacturer").val(response.manufacturer);


	  					list_comment(response.id_number);
	  					
	                }
	         });
	}


	function disabled_item()
	{
		$("#year").prop('disabled',true);
    	$("#hostname").prop('disabled',true);
    	$("#location").prop('disabled',true);
    	$("#quarter").prop('disabled',true);
    	$("#type_ppm").prop('disabled',true);
    	$("#type_device").prop('disabled',true);
    	$("#responsible").prop('disabled',true);
    	//$("#customer").prop('disabled',true);
    	//$("#acknowledge").prop('disabled',true);
    	$("#brand").prop('disabled',true);
    	$("#department").prop('disabled',true);
    	$("#level").prop('disabled',true);
    	$("#serial_number").prop('disabled',true);
    	$("#processor_type").prop('disabled',true);
    	$("#ram").prop('disabled',true);
    	$("#model").prop('disabled',true);
    	$("#monitor_brand").prop('disabled',true);
    	$("#monitor_model").prop('disabled',true);
    	$("#monitor_serial_number").prop('disabled',true);
    	$("#ups_brand").prop('disabled',true);
    	$("#ups_model").prop('disabled',true);
    	$("#ups_serial_no").prop('disabled',true);
    	$("#port").prop('disabled',true);
    	$("#ip").prop('disabled',true);


    	$('#type_dchp').prop('disabled',true);
		$('#type_static').prop('disabled',true); 
		$("[name=device_tag]").prop('disabled',true); 
		$("[name=need_replacement]").prop('disabled',true); 

		$("#date_replacement").prop('disabled',true); 
		$("#ppm_tag").prop('disabled',true); 


		$("[name=physical_1]").prop('disabled',true); 
		$("[name=physical_2]").prop('disabled',true); 
		$("[name=physical_3]").prop('disabled',true); 
		$("[name=physical_4]").prop('disabled',true); 
		$("[name=physical_5]").prop('disabled',true); 
		$("[name=physical_6]").prop('disabled',true); 
		$("[name=physical_7]").prop('disabled',true); 
		$("[name=physical_8]").prop('disabled',true); 
		$("[name=physical_9]").prop('disabled',true); 

		$("[name=physical_10]").prop('disabled',true); 
		$("[name=physical_11]").prop('disabled',true); 
		$("[name=physical_12]").prop('disabled',true); 
		$("[name=physical_13]").prop('disabled',true); 
		$("[name=physical_14]").prop('disabled',true); 
		$("[name=physical_15]").prop('disabled',true); 
		$("[name=physical_16]").prop('disabled',true); 
		$("[name=physical_17]").prop('disabled',true); 
		$("[name=physical_18]").prop('disabled',true); 
		$("[name=physical_19]").prop('disabled',true); 

		$("[name=physical_20]").prop('disabled',true); 
		$("[name=physical_21]").prop('disabled',true); 
		$("[name=physical_22]").prop('disabled',true); 
		$("[name=physical_23]").prop('disabled',true); 
		$("[name=physical_24]").prop('disabled',true); 
		$("[name=physical_25]").prop('disabled',true); 
		$("[name=physical_26]").prop('disabled',true); 

		$("[name=physical_27]").prop('disabled',true); 


		$("[name=setting_1]").prop('disabled',true); 
		$("[name=setting_2]").prop('disabled',true); 
		$("[name=setting_3]").prop('disabled',true); 
		$("[name=setting_4]").prop('disabled',true); 
		$("[name=setting_5]").prop('disabled',true); 
		$("[name=setting_6]").prop('disabled',true); 
		$("[name=setting_7]").prop('disabled',true); 
		$("[name=setting_8]").prop('disabled',true); 
		$("[name=setting_9]").prop('disabled',true); 

		$("[name=setting_10]").prop('disabled',true); 
		$("[name=setting_11]").prop('disabled',true); 
		$("[name=setting_12]").prop('disabled',true); 
		$("[name=setting_13]").prop('disabled',true); 
		$("[name=setting_14]").prop('disabled',true); 
		$("[name=setting_15]").prop('disabled',true); 
		$("[name=setting_16]").prop('disabled',true); 
		$("[name=setting_17]").prop('disabled',true); 



		$("[name=setting_18]").prop('disabled',true); 
		$("[name=setting_19]").prop('disabled',true); 
		$("[name=setting_20]").prop('disabled',true); 
		$("[name=setting_21]").prop('disabled',true); 
		$("[name=setting_22]").prop('disabled',true); 
		$("[name=setting_23]").prop('disabled',true); 


		$("[name=house_keeping_1]").prop('disabled',true); 
		$("[name=house_keeping_2]").prop('disabled',true); 
		$("[name=house_keeping_3]").prop('disabled',true); 
		$("[name=house_keeping_4]").prop('disabled',true); 
		$("[name=house_keeping_5]").prop('disabled',true); 
		$("[name=house_keeping_6]").prop('disabled',true); 
		$("[name=house_keeping_7]").prop('disabled',true); 

		$("[name=house_mouse_3]").prop('disabled',true); 
		$("[name=house_ppm_tag_3]").prop('disabled',true); 



		$("[name=security_1]").prop('disabled',true); 
		$("[name=security_2]").prop('disabled',true); 
		$("[name=security_3]").prop('disabled',true); 
		$("[name=security_4]").prop('disabled',true); 
		$("[name=security_5]").prop('disabled',true); 
		$("[name=security_6]").prop('disabled',true); 
		$("[name=security_7]").prop('disabled',true); 
		$("[name=security_8]").prop('disabled',true); 
		$("[name=security_9]").prop('disabled',true); 
		$("[name=security_10]").prop('disabled',true); 
		$("[name=security_11]").prop('disabled',true); 
		$("[name=security_12]").prop('disabled',true); 

		$("[name=cpu_speed]").prop('disabled',true);
		$("[name=cpu_core]").prop('disabled',true); 
		$("[name=capacity]").prop('disabled',true); 
		$("[name=sn_kvm]").prop('disabled',true); 
		$("[name=sn_tape]").prop('disabled',true); 
		$("[name=service_pack]").prop('disabled',true); 
		$("[name=need_replacement_houskeeping]").prop('disabled',true); 

		//$("[name=comment]").prop('disabled',true);

		$("#cpu_serial_number").prop('disabled',true); 

    	//alert(response.os);
    	$("#os").prop('disabled',true); 
    	$("#mac_address").prop('disabled',true); 
	}
</script>


<script type="text/javascript">
	$(document).ready(function (){
		var cat = "<?= hex2bin($_GET['type'])?>";
		$("#type_device2").val(cat);
		$("#type_device").val(cat);
	});
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
								$('#form_data').attr('action', '<?= base_url()?>Form_PPM/Update_Server');
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

	                	var quarter = response.quarter;
	                	$("#quarter").val(quarter);
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