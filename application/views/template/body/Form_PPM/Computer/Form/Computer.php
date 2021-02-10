<div class="pageheader hidden-xs">
    <h3><i class="fa fa-list"></i> Form PPM : Computer </h3>
    <div class="breadcrumb-wrapper">
        <!-- <span class="label" style="padding-right: 0px;"><i class="fa fa-cog" aria-hidden="true" style="border: 2px solid #f2f7f8;padding-right: 0px;"></i></span>
        <ol class="breadcrumb">
            <li> <a href="<?=base_url()?>Form_PPM/PPM_Form_Computer"> + Add Computer PPM </a> </li>
            <li> <a href="<?=base_url()?>Form_PPM/PPM_Form_Server_Stroage"> + Add Server & Storage PPM </a> </li>
            <li> <a href="<?=base_url()?>Form_PPM/List_Computer"> Overview </a> </li>
            <li> <a href="<?=base_url()?>Form_PPM/List_Computer/Verified"> Verified By </a> </li>
            <li> <a href="<?=base_url()?>Form_PPM/List_Computer/Endorse"> Endorse By </a> </li>
        </ol> -->
    </div>
</div>

<div class="row" style="padding-bottom: 30px;">
	<div class="content-wrapper">
		<section class="content">
			<div class="row">

				<div class="col-md-12">

					<div class="box box-success">
			          <div class="box-header with-border">
			            <label class="box-title"> <b><?= get_name_activity(hex2bin($_GET['ppm_id']))?> : <?= hex2bin($_GET['hostname'])?></b> </label>
			          </div>
			          	<form action="<?=base_url()?>Form_PPM/Add_Computer" method="post" id="form_data">


			          	  <input type="hidden" name="u" value="<?php if(!empty($_GET['u'])){echo $_GET['u'];}?>">


			          	  <input type="hidden" name="d" value="<?php if(!empty($_GET['department'])){echo $_GET['department'];}?>">


			          	  <input type="hidden" name="t" value="<?php if(!empty($_GET['type'])){echo $_GET['type'];}?>">


			          	  <input type="hidden" name="s" value="<?php if(!empty($_GET['status'])){echo $_GET['status'];}?>">
			          	  

			          	  <input type="hidden" name="id" id="id">
			          	  <input type="hidden" name="ppm_id" id="ppm_id" value="<?= hex2bin($_GET['ppm_id'])?>">
			          	  <input type="hidden" id="get_from_id" name="get_from_id">
				          <div class="box-body">
				          		<div class="row" style="padding-left: 20px; padding-right: 20px; ">
				          			<div class="col-md-12" style="background-color: #fff; border-radius: 10px; padding-top: 10px; border: 1px solid #bdbdbd;">
								            <div class="form-group col-md-3">
								              <label for="exampleInputEmail1">Type Of PPM</label>
								              <select class="form-control" name="type_ppm" id="type_ppm">
								              	<option value="Computer & Notebook">Computer & Notebook</option>
								              </select>
								            </div>
								            <div class="form-group col-md-3">
								              <label for="exampleInputEmail1">Type Device</label>
								              <select class="form-control" name="type_device2" id="type_device2" onchange="type_device_computer();" disabled>
								              	<option value="Computer">Computer</option>
								              	<option value="Notebook">Notebook</option>
								              </select>
								              <select class="form-control" name="type_device" id="type_device" onchange="type_device_computer();" style="display: none">
								              	<option value="Computer">Computer</option>
								              	<option value="Notebook">Notebook</option>
								              </select>
								            </div>
								            <div class="form-group col-md-3">
								              <label for="exampleInputEmail1">Year</label>
								              <select class="form-control" name="year" id="year">
								              	<option value="">--Select Year --</option>
								              	<?= lookup_year()?>
								              </select>
								            </div>
								            <div class="form-group col-md-2">
								              <label>Perform Date</label>
									          <input type="text" class="form-control datepicker" name="perform_date" id="perform_date">
								            </div>
					          				<div class="form-group col-md-3">
								              <label for="exampleInputEmail1">Responsible</label>
								              <!-- <select class="form-control" name="responsible" id="responsible">
								              	<option value="">--Select Responsible --</option>
								              	<?= lookup_agent()?>
								              </select> -->

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
									        		<legend style="font-size: 12px; font-weight: 700;">Location</legend>
								          			<div class="row">
											            <div class="form-group col-md-12">
											              <label for="exampleInputEmail1">Level</label>
											              <input type='text' class='form-control' name='level' id='level'>
											            </div>
											            <div class="form-group col-md-12">
											              <label for="exampleInputEmail1">Department</label>
											              <input type='text' class='form-control' name='department' id='department'>
											            </div>
											            <div class="form-group col-md-12">
											              <label for="exampleInputEmail1">Room Name</label>
											              <input type='text' class='form-control' name='room_name' id='room_name'>
											            </div>
								          				<div class="form-group col-md-12">
											              <label for="exampleInputEmail1">Room ID</label>
											              <input type='text' class='form-control' name='location' id='location'>
											              <!-- <select class="form-control" name="location" id="location">
											              	<option value="">--Select Location --</option>
											              	<?= option_ward()?>
											              </select> -->
											            </div>
											       	</div>
										        </div>
										        <div class="col-md-8">
									        		<legend style="font-size: 12px; font-weight: 700;">CPU</legend>
								          			<div class="row">
								          				<div class="form-group col-md-6">
											              <label for="exampleInputEmail1">Brand</label>
											              <input type="text" class="form-control" name="brand" id="brand">
											            </div>
											            <div class="form-group col-md-6">
											              <label for="exampleInputEmail1">Processor Type</label>
											              <input type="text" class="form-control" name="processor_type" id="processor_type">
											            </div>
											            <div class="form-group col-md-6">
											              <label for="exampleInputEmail1">Model</label>
											              <input type="text" class="form-control" name="model" id="model">
											            </div>
											            <div class="form-group col-md-6">
											              <label for="exampleInputEmail1">RAM</label>
											              <input type="text" class="form-control" name="ram" id="ram">
											            </div>
											            <div class="form-group col-md-6">
											              <label for="exampleInputEmail1">Serial Number</label>
											              <input type="text" class="form-control" name="serial_number" id="serial_number">
											            </div>
											        </div>
										        </div>
										    </div>

										    <div class="row">
										        <div class="col-md-4">
									        		<legend style="font-size: 12px; font-weight: 700;">Monitor</legend>
								          			<div class="row">
								          				<div class="form-group col-md-12">
											              <label for="exampleInputEmail1">Brand</label>
											              <input type="text" class="form-control" name="monitor_brand" id="monitor_brand">
											            </div>
											            <div class="form-group col-md-12">
											              <label for="exampleInputEmail1">Model</label>
											              <input type="text" class="form-control" name="monitor_model" id="monitor_model">
											            </div>
											            <div class="form-group col-md-12">
											              <label for="exampleInputEmail1">Serial No</label>
											              <input type="text" class="form-control" name="monitor_serial_number" id="monitor_serial_number">
											            </div>
											        </div>
										        </div>
										        <div class="col-md-4">
									        		<legend style="font-size: 12px; font-weight: 700;">UPS</legend>
								          			<div class="row">
								          				<div class="form-group col-md-12">
											              <label for="exampleInputEmail1">Brand</label>
											              <input type="text" class="form-control" name="ups_brand" id="ups_brand">
											            </div>
											            <div class="form-group col-md-12">
											              <label for="exampleInputEmail1">Model</label>
											              <input type="text" class="form-control" name="ups_model" id="ups_model">
											            </div>
											            <div class="form-group col-md-12">
											              <label for="exampleInputEmail1">Serial No</label>
											              <input type="text" class="form-control" name="ups_serial_no" id="ups_serial_no">
											            </div>
											        </div>
										        </div>
										        <div class="col-md-4">
									        		<legend style="font-size: 12px; font-weight: 700;">Network</legend>
								          			<div class="row">
								          				<div class="form-group col-md-12">
											              <label for="exampleInputEmail1">Network Port</label>
											              <input type="text" class="form-control" name="port" id="port">
											            </div>



											            <div class="form-group col-md-12">
											              

															<div class="col-md-3">
																<label for="exampleInputEmail1">
																	<input type="radio" name="type_ip" id="type_dchp" value="DHCP">
																	DHCP
																</label>
															</div>

															<div class="col-md-3">
																<label for="exampleInputEmail1">
																	<input type="radio" name="type_ip" id="type_static" value="Static">
																	Static
																</label>
															</div>


															<script type="text/javascript">
																$("#type_dchp").click(function (){
																	$( "#type_dchp" ).prop( "checked", true );
																	$( "#type_static" ).prop( "checked", false );
																});	

																$("#type_static").click(function (){
																	$( "#type_static" ).prop( "checked", true );
																	$( "#type_dchp" ).prop( "checked", false );
																});
															</script>


															<div class="form-group col-md-6">
																<input type="text" class="form-control" name="ip" id="ip">
															</div>

											            </div>
											        </div>
										        </div>
										        <div class="col-md-6">
									        		<legend style="font-size: 12px; font-weight: 700;">Tagging</legend>
									        		<div class="row">
								          				<div class="form-group col-md-6">
											              <label for="exampleInputEmail1">Device In Tag</label>
											              <select class="form-control" name="device_tag" id="device_tag">
											              	<option value="">--Select Responsible --</option>
											              	<?= yes_or_no() ?>
											              </select>
											            </div>
											            <div class="form-group col-md-6">
											              <label for="exampleInputEmail1">Need Replacement ?	</label>
											              <select class="form-control" name="need_replacement" id="need_replacement">
											              	<option value="">--Select Type --</option>
											              	<?= yes_or_no() ?>
											              </select>
											            </div>
											        </div>
											        <div class="row">
											            <div class="form-group col-md-12">
											              <label for="exampleInputEmail1">Date Replaced</label>
											              <input type='text' class='form-control datepicker' name='date_replacement' id='date_replacement'> 
											            </div>
											            <div class="form-group col-md-12" style="display: none">
											              <label for="exampleInputEmail1">PPM Tag</label>
											              <input type='text' class='form-control' name='ppm_tag' id='ppm_tag'> 
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
				          							<legend style="font-size: 15px; font-weight: 700;">Checklist</legend>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1">Empty recycle bin & delete *.tmp/*.dmp</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="checklist_1"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="checklist_1" value="No"> No</input>

															<!-- <select class="form-control" name="checklist_1" id="checklist_1">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1">Change local admin password</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="checklist_2"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="checklist_2" value="No"> No</input>

															<!-- <select class="form-control" name="checklist_2" id="checklist_2">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-12"><label>Check & Perform</label> </div>
								          				<div class="col-md-8" style="padding-left: 30px;">
								          					<label for="exampleInputEmail1"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Window updates(latest version)</label>
								          				</div>
								          				<div class="col-md-4 font_class" style="padding-bottom: 10px;">
								          					<input type="radio" name="checklist_3"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="checklist_3" value="No"> No</input>
								          					<input type="text" class="form-control" name="win_update">
															<!-- <select class="form-control" name="checklist_3" id="checklist_3">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          				
								          				<div class="col-md-8" style="padding-left: 30px;">
								          					<label for="exampleInputEmail1"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Microsoft Office 2016 (Make sure actiivated)</label>
								          				</div>
								          				<div class="col-md-4 font_class" style="padding-bottom: 10px;">
								          					<input type="radio" name="checklist_4"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="checklist_4" value="No"> No</input>
															<!-- <select class="form-control" name="checklist_4" id="checklist_4">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>

								          				<div class="col-md-8" style="padding-left: 30px;">
								          					<label for="exampleInputEmail1"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Software Chrome, PDF Reader, 7 zip & Java JDK v6u45</label>
								          				</div>
								          				<div class="col-md-4 font_class" style="padding-bottom: 10px;">
								          					<input type="radio" name="checklist_5"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="checklist_5" value="No"> No</input>
															<!-- <select class="form-control" name="checklist_5" id="checklist_5">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-12"><label>Antivirus SEP v14</label> </div>
								          				<div class="col-md-8" style="padding-left: 30px;">
								          					<label for="exampleInputEmail1"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Check and review pattern. State last update</label>
								          				</div>
								          				<div class="col-md-4 font_class" style="padding-bottom: 10px;">
								          					<input type="radio" name="checklist_6"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="checklist_6" value="No"> No</input>
								          					<input type="text" class="form-control datepicker" name="check_antivirus">
															<!-- <select class="form-control" name="checklist_6" id="checklist_6">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          				<div class="col-md-8" style="padding-left: 30px;">
								          					<label for="exampleInputEmail1"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Perform full scanning</label>
								          				</div>
								          				<div class="col-md-4 font_class" style="padding-bottom: 10px;">
								          					<input type="radio" name="checklist_7"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="checklist_7" value="No"> No</input>
								          					<input type="text" class="form-control datepicker" name="perform_antivirus">
															<!-- <select class="form-control" name="checklist_7" id="checklist_7">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>

								          			<div class="row">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1">Run GP update & reboot</label>
								          				</div>
								          				<div class="col-md-4 font_class" style="padding-bottom: 10px;">
								          					<input type="radio" name="checklist_8"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="checklist_8" value="No"> No</input>
															<!-- <select class="form-control" name="checklist_8" id="checklist_8">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>


								          			<div class="row">
								          				<div class="col-md-8">
								          					<label for="exampleInputEmail1">Check UPS functionality (Siwtch off wall plug power)</label>
								          				</div>
								          				<div class="col-md-4 font_class" style="padding-bottom: 10px;">
								          					<input type="radio" name="checklist_9"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="checklist_9" value="No"> No</input>
															<!-- <select class="form-control" name="checklist_9" id="checklist_9">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>

										        </div>

										        <div class="col-md-6">
				          							<p style="padding-top: 15px;">Physical check & Clean</p>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8" style="padding-left: 30px;">
								          					<label for="exampleInputEmail1">CPU and FAN (Vacuum and brush the CPU and check the CPU's cooling fan is working)</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="physical_1"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="physical_1" value="No"> No</input>
															<!-- <select class="form-control" name="physical_1" id="physical_1">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8" style="padding-left: 30px;">
								          					<label for="exampleInputEmail1">RAM (Take out, brush and plug in)</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="physical_2"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="physical_2" value="No"> No</input>
															<!-- <select class="form-control" name="physical_2" id="physical_2">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8" style="padding-left: 30px;">
								          					<label for="exampleInputEmail1">Mouse and keyboard (Make sure is free of dust and grime. Test the functionality)</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="physical_3"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="physical_3" value="No"> No</input>
															<!-- <select class="form-control" name="physical_3" id="physical_3">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8" style="padding-left: 30px;">
								          					<label for="exampleInputEmail1">Monitor / Screen (Clean the monitor / screen by using spray cleaner and cloths)</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="physical_4"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="physical_4" value="No"> No</input>
															<!-- <select class="form-control" name="physical_4" id="physical_4">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8" style="padding-left: 30px;">
								          					<label for="exampleInputEmail1">CD-ROM/DVD Drive(Clean the laser and tray by using CD cleaner disk)</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="physical_5"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="physical_5" value="No"> No</input>
															<!-- <select class="form-control" name="physical_5" id="physical_5">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8" style="padding-left: 30px;">
								          					<label for="exampleInputEmail1">Check Cable Tidiness (Make sure the tidiness of cable)</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="physical_6"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="physical_6" value="No"> No</input>
															<!-- <select class="form-control" name="physical_6" id="physical_6">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8" style="padding-left: 30px;">
								          					<label for="exampleInputEmail1">Chechk connection (Make sure all datat cables and power cables are sug in the their connection)</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="physical_7"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="physical_7" value="No"> No</input>
															<!-- <select class="form-control" name="physical_7" id="physical_7">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-8" style="padding-left: 30px;">
								          					<label for="exampleInputEmail1">Check Signal(Check LED signal of hard-disk, CPU and monitor)</label>
								          				</div>
								          				<div class="col-md-4 font_class">
								          					<input type="radio" name="physical_8"  value="Yes" checked> Yes</input>
								          					<input type="radio" name="physical_8" value="No"> No</input>
															<!-- <select class="form-control" name="physical_8" id="physical_8">
																<option value="">--Select Type --</option>
																<?= yes_or_no() ?>
															</select> -->
								          				</div>
								          			</div>

								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-2" style="padding-left: 30px;">

								          				</div>
								          				<div class="col-md-3 font_class">
								          					Analysis Result (%):
								          				</div>
								          				<div class="col-md-7 font_class">
								          					 <input type="text" class="form-control" name="analysis">
								          					 <input type="radio" name="type_defrag"  value="Defragment"> Defragment</input>
								          					<input type="radio" name="type_defrag" value="Do not need to defrag"> Do not need to defrag</input>
								          				</div>
								          			</div>


								          			<p style="padding-top: 10px;">Defragmentation</p>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-4">
								          					<label for="exampleInputEmail1">Drive</label> <input type="text" class="form-control" name="defrag_1" id="defrag_1" value="C">
								          				</div>
								          				<div class="col-md-4">
								          					<label for="exampleInputEmail1">Used Space</label> <input type="text" class="form-control" name="defrag_2" id="defrag_2">
								          				</div>
								          				<div class="col-md-4">
								          					<label for="exampleInputEmail1">Free Space</label> <input type="text" class="form-control" name="defrag_3" id="defrag_3">
								          				</div>

								          			</div>
								          			<div class="row" style="padding-bottom: 10px;">
								          				<div class="col-md-4">
								          					<label for="exampleInputEmail1">Drive</label> <input type="text" class="form-control" name="defrag_4" id="defrag_4" value="D">
								          				</div>
								          				<div class="col-md-4">
								          					<label for="exampleInputEmail1">Used Space</label> <input type="text" class="form-control" name="defrag_5" id="defrag_5">
								          				</div>
								          				<div class="col-md-4">
								          					<label for="exampleInputEmail1">Free Space</label> <input type="text" class="form-control" name="defrag_6" id="defrag_6">
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
											              <input type='text' class='form-control' name='customer' id='customer' list="list_customer" required>
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
												<?php if($status == 'Performed'){ ?>



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
						</form>
					</div>
				</div>
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
                	

                	$('#brand').val(response.CPU);
                	//alert(response.cpu_model);
                	$('#model').val(response.cpu_model);
                	$('#serial_number').val(response.cpu_serial_no);

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
      //           	if(ip==''){
      //           		//$("#type_ip").prop('',true);
      //           		$( "#type_dchp" ).prop( "checked", false );
						// $( "#type_static" ).prop( "checked", true );
      //           	}  else {
      //           		$( "#type_dchp" ).prop( "checked", true );
						// $( "#type_static" ).prop( "checked", false );
      //           	}

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
                	$("room_name").val(response.room_name);
                	$("#department").val(response.department);
                }
               });
	}
</script>


<script type="text/javascript">
	function detail()
	{
		var id= $("#get_from_id").val();

		var data =  {
		                    'id':id,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		            }

	    $.ajax({
	                url: '<?= base_url() ?>Form_PPM/detail_computer',
	                type: 'POST',
	                dataType: 'json',
	                data: data,
	                beforeSend: function() {
	                   
	                },
	                success: function(response){

	                	// $('#form_data').attr('action', '<?= base_url()?>Form_PPM/Update_Computer');

	                	<?php if($this->uri->segment(2)=='User_Computer'){ ?>
							// alert('a');
                			$('#form_data').attr('action', '<?= base_url()?>Form_PPM/Update_Computer_Outside');
                		<?php } else { ?>
                			$('#form_data').attr('action', '<?= base_url()?>Form_PPM/Update_Computer');
                		<?php } ?>

	                	$("#year").val(response.year);

	                	$("#perform_date").val(response.perform_date);
	                	
	                	$("#hostname").val(response.hostname);
	                	$("#location").val(response.location);
	                	$("#type_ppm").val(response.ppm_type);
	                	$("#type_device").val(response.ppm_device);
	                	$("#responsible").val(response.responsible);
	                	$("#customer").val(response.acknowledge);
	                	$("#acknowledge").val(response.endorse);
	                	$("#brand").val(response.brand);
	                	$("#department").val(response.department);
	                	$("#level").val(response.cpu_level);
	                	$("#serial_number").val(response.cpu_serial_number);
	                	$("#processor_type").val(response.cpu_processor_type);
	                	$("#ram").val(response.cpu_ram);
	                	$("#model").val(response.cpu_model);
	                	$("#monitor_brand").val(response.monitor_brand);
	                	$("#monitor_model").val(response.monitor_model);
	                	$("#monitor_serial_number").val(response.monitor_serial_number);
	                	$("#ups_brand").val(response.ups_brand);
	                	$("#ups_model").val(response.ups_model);
	                	$("#ups_serial_no").val(response.ups_serial_number);
	                	$("#port").val(response.network_port);
	                	$("#ip").val(response.network_ip);

	                	$("#room_name").val(response.room_name);


	                	var network_type = response.network_type;

	                	
	                	//$("#ip").val(response.network_ip);
	                	//alert(network_type);
	                	if(network_type=='DHCP'){
	                		$('#type_dchp').attr('checked', 'checked'); 
							$("#type_static" ).prop( "checked", false );
							//alert('a');

	                	}  else {
							$('#type_static').attr('checked', 'checked'); 
							$( "#type_dchp" ).prop( "checked", false );
							//alert('b');
	                	}

	                	$("#device_tag").val(response.tagging_device);
	                	$("#need_replacement").val(response.tagging_replace);
	                	$("#date_replacement").val(response.tagging_date);
	                	$("#ppm_tag").val(response.tagging_tag);

	                	//$("#checklist_1").val(response.checklist_1);
	                	//$("input:radio[name='checklist_1']").val(response.checklist_1);
	                	
	                	
	                	// $("#checklist_2").val(response.checklist_2);
	                	// $("#checklist_3").val(response.checklist_3);
	                	// $("#checklist_4").val(response.checklist_4);
	                	// $("#checklist_5").val(response.checklist_5);
	                	// $("#checklist_6").val(response.checklist_6);
	                	// $("#checklist_7").val(response.checklist_7);
	                	// $("#checklist_8").val(response.checklist_8);
	                	// $("#checklist_9").val(response.checklist_9);
	                	// $("#physical_1").val(response.physical_1);
	                	// $("#physical_2").val(response.physical_2);
	                	// $("#physical_3").val(response.physical_3);
	                	// $("#physical_4").val(response.physical_4);
	                	// $("#physical_5").val(response.physical_5);
	                	// $("#physical_6").val(response.physical_6);
	                	// $("#physical_7").val(response.physical_7);
	                	// $("#physical_8").val(response.physical_8);


	                	$("#defrag_1").val(response.defrag_1);
	                	$("#defrag_2").val(response.defrag_2);
	                	$("#defrag_3").val(response.defrag_3);
	                	$("#defrag_4").val(response.defrag_4);
	                	$("#defrag_5").val(response.defrag_5);
	                	$("#defrag_6").val(response.defrag_6);


	                	$("[name=checklist_1]").val([response.checklist_1]);
	                	$("[name=checklist_2]").val([response.checklist_2]);
	                	$("[name=checklist_3]").val([response.checklist_3]);
	                	$("[name=checklist_4]").val([response.checklist_4]);
	                	$("[name=checklist_5]").val([response.checklist_5]);
	                	$("[name=checklist_6]").val([response.checklist_6]);
	                	$("[name=checklist_7]").val([response.checklist_7]);
	                	$("[name=checklist_8]").val([response.checklist_8]);
	                	$("[name=checklist_9]").val([response.checklist_9]);
	                	$("[name=physical_1]").val([response.physical_1]);
	                	$("[name=physical_2]").val([response.physical_2]);
	                	$("[name=physical_3]").val([response.physical_3]);
	                	$("[name=physical_4]").val([response.physical_4]);
	                	$("[name=physical_5]").val([response.physical_5]);
	                	$("[name=physical_6]").val([response.physical_6]);
	                	$("[name=physical_7]").val([response.physical_7]);
	                	$("[name=physical_8]").val([response.physical_8]);
	                	// $("[name=defrag_1]").val([response.defrag_1]);
	                	// $("[name=defrag_2]").val([response.defrag_2]);
	                	// $("[name=defrag_3]").val([response.defrag_3]);
	                	// $("[name=defrag_4]").val([response.defrag_4]);
	                	// $("[name=defrag_5]").val([response.defrag_5]);
	                	// $("[name=defrag_6]").val([response.defrag_6]);

	                	

	                	$("[name=analysis]").val([response.analysis]);
	                	$("[name=type_defrag]").val([response.type_defrag]);

	                	
	                	$("[name=win_update]").val([response.win_update]);
	                	$("[name=check_antivirus]").val([response.check_antivirus]);
	                	$("[name=perform_antivirus]").val([response.perform_antivirus]);



	                	$("#comment").val(response.comment);
	  					$("#id").val(response.id_number);


	  					if((response.status=='Rejected')||(response.status=='Done')){
	  						$("#btn_submit_div").remove();
	  					} else {

	  					}

	  					var check_responsible = "<?= $this->session->userdata('first_name');?>";
	  					if(response.responsible==check_responsible){

	  					} else {
	  						//disabled_item();
	  					}

	                }
	         });
	}


	function disabled_item()
	{
		$("#year").prop('disabled',true);

		$("#hostname").prop('disabled',true);
		$("#location").prop('disabled',true);
		$("#type_ppm").prop('disabled',true);
		$("#type_device").prop('disabled',true);
		$("#responsible").prop('disabled',true);
		$("#customer").prop('disabled',true);
		$("#acknowledge").prop('disabled',true);
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
		$( "#type_static" ).prop('disabled',true);


		$("#device_tag").prop('disabled',true);
		$("#need_replacement").prop('disabled',true);
		$("#date_replacement").prop('disabled',true);
		$("#ppm_tag").prop('disabled',true);



		$("#defrag_1").prop('disabled',true);
		$("#defrag_2").prop('disabled',true);
		$("#defrag_3").prop('disabled',true);
		$("#defrag_4").prop('disabled',true);
		$("#defrag_5").prop('disabled',true);
		$("#defrag_6").prop('disabled',true);


		$("[name=checklist_1]").prop('disabled',true);
		$("[name=checklist_2]").prop('disabled',true);
		$("[name=checklist_3]").prop('disabled',true);
		$("[name=checklist_4]").prop('disabled',true);
		$("[name=checklist_5]").prop('disabled',true);
		$("[name=checklist_6]").prop('disabled',true);
		$("[name=checklist_7]").prop('disabled',true);
		$("[name=checklist_8]").prop('disabled',true);
		$("[name=checklist_9]").prop('disabled',true);
		$("[name=physical_1]").prop('disabled',true);
		$("[name=physical_2]").prop('disabled',true);
		$("[name=physical_3]").prop('disabled',true);
		$("[name=physical_4]").prop('disabled',true);
		$("[name=physical_5]").prop('disabled',true);
		$("[name=physical_6]").prop('disabled',true);
		$("[name=physical_7]").prop('disabled',true);
		$("[name=physical_8]").prop('disabled',true);


		$("[name=analysis]").prop('disabled',true);
		$("[name=type_defrag]").prop('disabled',true);


		$("[name=win_update]").prop('disabled',true);
		$("[name=check_antivirus]").prop('disabled',true);
		$("[name=perform_antivirus]").prop('disabled',true);

		$("[name=comment]").prop('disabled',true);
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
		                		$('#form_data').attr('action', '<?= base_url()?>Form_PPM/Add_Computer');
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
								// $('#form_data').attr('action', '<?= base_url()?>Form_PPM/Update_Computer');

								// alert('<?= $this->uri->segment(2) ?>');

								<?php if($this->uri->segment(2)=='User_Computer'){ ?>
									// alert('a');
		                			$('#form_data').attr('action', '<?= base_url()?>Form_PPM/Update_Computer_Outside');
		                		<?php } else { ?>
		                			$('#form_data').attr('action', '<?= base_url()?>Form_PPM/Update_Computer');
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