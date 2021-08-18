<div class="pageheader hidden-xs">
    <h3><i class="fa fa-list"></i> Form PPM : UPS </h3>
    <div class="breadcrumb-wrapper">
        <!-- <span class="label" style="padding-right: 0px;"><i class="fa fa-cog" aria-hidden="true" style="border: 2px solid #f2f7f8;padding-right: 0px;"></i></span>
        <ol class="breadcrumb">
            <li> <a href="<?=base_url()?>Form_PPM/PPM_Form_Network"> + Add Hardware PPM </a> </li>
            <li> <a href="<?=base_url()?>Form_PPM/PPM_Form_Printer"> + Add Printer & Scanner </a> </li>
            <li> <a href="<?=base_url()?>Form_PPM/List_Hardware"> Overview </a> </li>
            <li> <a href="<?=base_url()?>Form_PPM/List_Hardware/Verified"> Verified By </a> </li>
            <li> <a href="<?=base_url()?>Form_PPM/List_Hardware/Endorse"> Endorse By </a> </li>
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
			          	<form action="<?=base_url()?>Form_PPM/Add_ups" method="post" id="form_data">
			          	  <input type="hidden" name="id" id="id">
			          	  <input type="hidden" name="ppm_id" id="ppm_id" value="<?= hex2bin($_GET['ppm_id'])?>">
			          	  <input type="hidden" id="get_from_id" name="get_from_id">
				          <div class="box-body">
				          		<div class="row" style="padding-left: 20px; padding-right: 20px;">
				          			<div class="col-md-12" style="background-color: #fff; border-radius: 10px; padding-top: 10px; border: 1px solid #bdbdbd;">
								            <div class="form-group col-md-2">
								              <label for="exampleInputEmail1">Type Of PPM</label>
								              <select class="form-control" name="type_ppm" id="type_ppm">
								              	<option value="Network">Network</option>
								              </select>
								            </div>
								            <div class="form-group col-md-2">
								              <label for="exampleInputEmail1">Type Device</label>
								              <select class="form-control" name="type_device2" id="type_device2" onchange="type_device_ppm();" disabled>
								              	<option value="UPS">UPS</option>
								              	<option value="Load Balance">Load Balance</option>
								              	<option value="Access Point">Access Point</option>
								              	<option value="Controller">Controller</option>
								              	<option value="Firewall">Firewall</option>
								              	<option value="Switch">Switch</option>
								              </select>
								              <select class="form-control" name="type_device" id="type_device" onchange="type_device_ppm();" style="display: none">
								              	<option value="UPS">UPS</option>
								              	<option value="Load Balance">Load Balance</option>
								              	<option value="Access Point">Access Point</option>
								              	<option value="Controller">Controller</option>
								              	<option value="Firewall">Firewall</option>
								              	<option value="Switch">Switch</option>
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


				          		<script type="text/javascript">
								  function type_device_ppm()
								  {
								    var type_device = $("#type_device").val();
								    if(type_device=='Access Point'){
								      window.location.href="<?=base_url()?>Form_PPM/Access_point";
								    } else if(type_device=='Firewall'){
								      window.location.href="<?=base_url()?>Form_PPM/Firewall";
								    } else if(type_device=='Load Balance'){
								      window.location.href="<?=base_url()?>Form_PPM/Load_balance";
								    } else if(type_device=='Switch'){
								      window.location.href="<?=base_url()?>Form_PPM/Switch_PPM";
								    } else if(type_device=='UPS'){
								      window.location.href="<?=base_url()?>Form_PPM/UPS";
								    } else if(type_device=='Controller'){
								      window.location.href="<?=base_url()?>Form_PPM/Controller";
								    } else {
								      
								    }
								  }
								</script>



				          		<div class="row" style="padding-left: 20px; padding-top: 30px; padding-right: 20px;">
				          			<div class="col-md-12" style="background-color: #fff; border-radius: 10px; padding-top: 10px; border: 1px solid #bdbdbd;">

				          					<legend style="font-size: 15px; font-weight: 700;">Device Details</legend>

				          					<div class="row">
					          					<div class="form-group col-md-3">
					          				      <label for="exampleInputEmail1">Hostname</label>
									              <input type='text' class='form-control' name='hostname' id='hostname' list="hostname_hardware" onchange="getDetails();" value="<?= hex2bin($_GET['hostname'])?>">
									            </div>

									            <datalist id="hostname_hardware">
										        	<?= lookup_hostname_hardware()?>
										        </datalist>

									            <div class="form-group col-md-3">
									              <label for="exampleInputEmail1">Model</label>
									              <input type='text' class='form-control' name='model' id='model'>
									            </div>
									            <div class="form-group col-md-3">
									              <label for="exampleInputEmail1">Serial Number</label>
									              <input type='text' class='form-control' name='serial_number' id='serial_number'>
									            </div>
									            <div class="form-group col-md-3">
									              <label for="exampleInputEmail1">Mac Address</label>
									              <input type='text' class='form-control' name='mac_address' id='mac_address'>
									            </div>
									            <div class="form-group col-md-3">
									              <label for="exampleInputEmail1">Location</label>
									              <select class="form-control" name="location" id="location">
									              	<option value="">--Select Location --</option>
									              	<?= option_ward()?>
									              </select>
									            </div>
									            <div class="form-group col-md-3">
									              <label for="exampleInputEmail1">Manufacture</label>
									              <input type='text' class='form-control' name='manufacture' id='manufacture'>
									            </div>
									            <div class="form-group col-md-3">
									              <label for="exampleInputEmail1">IP Address</label>
									              <input type='text' class='form-control' name='ip' id='ip'>
									            </div>
									            <div class="form-group col-md-3">
									              <label for="exampleInputEmail1">Firmware Version</label>
									              <input type='text' class='form-control' name='firmware' id='firmware'>
									            </div>
									        </div>

									        <div class="row">
									        	<div class="col-md-6">
									        		<legend style="font-size: 12px; font-weight: 700;">Physical Check</legend>
									        		<div class="col-md-12"> <label for="exampleInputEmail1">Cleaning</label> </div>
									        		<div class="col-md-6" style="padding-left: 30px;">
									        			<div class="row" style="padding-bottom: 10px;">
										        			<div class="col-md-5">
										        				<label for="exampleInputEmail1">Room</label>
										        			</div>
										        			<div class="col-md-7 font_class">
										        				<input type="radio" name="physical_1"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="physical_1" value="No"> No</input>
									          					<input type="radio" name="physical_1" value="N/A"> N/A</input>
										        				<!-- <select class="form-control" name="physical_1">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
										        		<div class="row" style="padding-bottom: 10px;">
										        			<div class="col-md-5">
										        				<label for="exampleInputEmail1">Rack</label>
										        			</div>
										        			<div class="col-md-7 font_class">
										        				<input type="radio" name="physical_2"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="physical_2" value="No"> No</input>
									          					<input type="radio" name="physical_2" value="N/A"> N/A</input>
										        				<!-- <select class="form-control" name="physical_2">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
										        		<div class="row" style="padding-bottom: 10px;">
										        			<div class="col-md-5">
										        				<label for="exampleInputEmail1">Equipment</label>
										        			</div>
										        			<div class="col-md-7 font_class">
										        				<input type="radio" name="physical_3"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="physical_3" value="No"> No</input>
									          					<input type="radio" name="physical_3" value="N/A"> N/A</input>
										        				<!-- <select class="form-control" name="physical_3">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
									        			
									        			<div class="row" style="padding-bottom: 10px;">
									        				<div class="col-md-12" style="padding-left: 0px;"><label for="exampleInputEmail1">Cable</label></div>
										        			<div class="col-md-5">
										        				<label for="exampleInputEmail1">Tidiness</label>
										        			</div>
										        			<div class="col-md-7 font_class">
										        				<input type="radio" name="physical_4"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="physical_4" value="No"> No</input>
									          					<input type="radio" name="physical_4" value="N/A"> N/A</input>
										        				<!-- <select class="form-control" name="physical_4">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
										        		<div class="row" style="padding-bottom: 10px;">
										        			<div class="col-md-5">
										        				<label for="exampleInputEmail1">Labeling</label>
										        			</div>
										        			<div class="col-md-7 font_class">
										        				<input type="radio" name="physical_5"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="physical_5" value="No"> No</input>
									          					<input type="radio" name="physical_5" value="N/A"> N/A</input>
										        				<!-- <select class="form-control" name="physical_5">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
									        		
									        			<div class="row" style="padding-bottom: 10px;">
										        			<div class="col-md-5" style="padding-left: 0px;">
										        				<label for="exampleInputEmail1">Fan Condition</label>
										        			</div>
										        			<div class="col-md-7 font_class">
										        				<input type="radio" name="physical_6"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="physical_6" value="No"> No</input>
									          					<input type="radio" name="physical_6" value="N/A"> N/A</input>
										        				<!-- <select class="form-control" name="physical_6">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
										        		<div class="row" style="padding-bottom: 10px;">
										        			<div class="col-md-5" style="padding-left: 0px;">
										        				<label for="exampleInputEmail1">Check All LEDs and PORT</label>
										        			</div>
										        			<div class="col-md-7 font_class">
										        				<input type="radio" name="physical_7"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="physical_7" value="No"> No</input>
									          					<input type="radio" name="physical_7" value="N/A"> N/A</input>
										        				<!-- <select class="form-control" name="physical_7">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
										        		<div class="row" style="padding-bottom: 10px;">
										        			<div class="col-md-5" style="padding-left: 0px;">
										        				<label for="exampleInputEmail1">Room Temperature (aircond)</label>
										        			</div>
										        			<div class="col-md-7 font_class">
										        				<input type="radio" name="physical_8"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="physical_8" value="No"> No</input>
									          					<input type="radio" name="physical_8" value="N/A"> N/A</input>

									          					<input type="text" class="form-control" name="temperature" id="temperature" placeholder="Temperature">
										        				<!-- <select class="form-control" name="physical_8">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
									        		</div>


									        		<div class="col-md-6">
									        			<div class="row" style="padding-bottom: 10px;">
										        			<div class="col-md-5">
										        				<label for="exampleInputEmail1">Check UPS</label>
										        			</div>
										        			<div class="col-md-7 font_class">
										        				<input type="radio" name="physical_9"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="physical_9" value="No"> No</input>
									          					<input type="radio" name="physical_9" value="N/A"> N/A</input>
										        				<!-- <select class="form-control" name="physical_9">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
										        		<div class="row" style="padding-bottom: 10px;">
										        			<div class="col-md-5">
										        				<label for="exampleInputEmail1">PPM Tag</label>
										        			</div>
										        			<div class="col-md-7 font_class">
										        				<input type="radio" name="physical_10"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="physical_10" value="No"> No</input>
									          					<input type="radio" name="physical_10" value="N/A"> N/A</input>
										        				<!-- <select class="form-control" name="physical_10">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
										        		<div class="row" style="padding-bottom: 10px;">
										        			<div class="col-md-5">
										        				<label for="exampleInputEmail1">Device Tag</label>
										        			</div>
										        			<div class="col-md-7 font_class">
										        				<input type="radio" name="physical_11"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="physical_11" value="No"> No</input>
									          					<input type="radio" name="physical_11" value="N/A"> N/A</input>
										        				<!-- <select class="form-control" name="physical_11">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
										        		<div class="row" style="padding-bottom: 10px;">
										        			<div class="col-md-5">
										        				<label for="exampleInputEmail1">Power Over Ethernet</label>
										        			</div>
										        			<div class="col-md-7 font_class">
										        				<input type="radio" name="physical_12"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="physical_12" value="No"> No</input>
									          					<input type="radio" name="physical_12" value="N/A"> N/A</input>
										        				<!-- <select class="form-control" name="physical_12">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
										        		<div class="row" style="padding-bottom: 10px;">
										        			<div class="col-md-5">
										        				<label for="exampleInputEmail1">Free Port</label>
										        			</div>
										        			<div class="col-md-7 font_class">
										        				<input type="radio" name="physical_13"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="physical_13" value="No"> No</input>
									          					<input type="radio" name="physical_13" value="N/A"> N/A</input>

									          					<input type="text" class="form-control" name="port" id="port" placeholder="Port">
										        				<!-- <select class="form-control" name="physical_13">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
									        		</div>

									        	</div>
									        	<div class="col-md-6">
									        		
									        		<legend style="font-size: 12px; font-weight: 700;">Setting & Configuration</legend>
									        		<div class="col-md-6">
									        			<div class="row" style="padding-bottom: 10px;">
										        			<div class="col-md-5">
										        				<label for="exampleInputEmail1">Disable Unused Port</label>
										        			</div>
										        			<div class="col-md-7 font_class">
										        				<input type="radio" name="setting_1"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="setting_1" value="No"> No</input>
									          					<input type="radio" name="setting_1" value="N/A"> N/A</input>
										        				<!-- <select class="form-control" name="setting_1">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
										        		<div class="row" style="padding-bottom: 10px;">
										        			<div class="col-md-5">
										        				<label for="exampleInputEmail1">Memory Utilization</label>
										        			</div>
										        			<div class="col-md-7 font_class">
										        				<input type="radio" name="setting_2"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="setting_2" value="No"> No</input>
									          					<input type="radio" name="setting_2" value="N/A"> N/A</input>

									          					<input type="text" class="form-control" name="memory" id="memory" placeholder="Memory">
										        				<!-- <select class="form-control" name="setting_2">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
										        		<div class="row" style="padding-bottom: 10px;">
										        			<div class="col-md-5">
										        				<label for="exampleInputEmail1">CPU Utilization</label>
										        			</div>
										        			<div class="col-md-7 font_class">
										        				<input type="radio" name="setting_3"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="setting_3" value="No"> No</input>
									          					<input type="radio" name="setting_3" value="N/A"> N/A</input>

									          					<input type="text" class="form-control" name="cpu" id="cpu" placeholder="CPU">
										        				<!-- <select class="form-control" name="setting_3">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
										        		<div class="row" style="padding-bottom: 10px;">
										        			<div class="col-md-5">
										        				<label for="exampleInputEmail1">Backup Configuration</label>
										        			</div>
										        			<div class="col-md-7 font_class">
										        				<input type="radio" name="setting_4"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="setting_4" value="No"> No</input>
									          					<input type="radio" name="setting_4" value="N/A"> N/A</input>
										        				<!-- <select class="form-control" name="setting_4">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
										        		<div class="row" style="padding-bottom: 10px;">
										        			<div class="col-md-5">
										        				<label for="exampleInputEmail1">Check SNMP (string)</label>
										        			</div>
										        			<div class="col-md-7 font_class">
										        				<input type="radio" name="setting_5"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="setting_5" value="No"> No</input>
									          					<input type="radio" name="setting_5" value="N/A"> N/A</input>

									          					<input type="text" class="form-control" name="snmp_string" id="snmp_string" placeholder="SNP String">
										        				<!-- <select class="form-control" name="setting_5">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
										        	</div>
										        	<div class="col-md-6">
									        			<div class="row" style="padding-bottom: 10px;">
										        			<div class="col-md-5">
										        				<label for="exampleInputEmail1">Check Vlan</label>
										        			</div>
										        			<div class="col-md-7 font_class">
										        				<input type="radio" name="setting_6"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="setting_6" value="No"> No</input>
									          					<input type="radio" name="setting_6" value="N/A"> N/A</input>
										        				<!-- <select class="form-control" name="setting_6">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
										        		<div class="row" style="padding-bottom: 10px;">
										        			<div class="col-md-5">
										        				<label for="exampleInputEmail1">HA Status</label>
										        			</div>
										        			<div class="col-md-7 font_class">
										        				<!-- <input type="radio" name="setting_7"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="setting_7" value="No"> No</input>
									          					<input type="radio" name="setting_7" value="N/A"> N/A</input> -->
										        				<!-- <select class="for
										        				<!-- <select class="form-control" name="setting_7">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
										        		<div class="row" style="padding-bottom: 10px;">
										        			<div class="col-md-5" style="padding-left: 30px;">
										        				<label for="exampleInputEmail1">Online</label>
										        			</div>
										        			<div class="col-md-7 font_class">
										        				<input type="radio" name="setting_8"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="setting_8" value="No"> No</input>
									          					<input type="radio" name="setting_8" value="N/A"> N/A</input>
										        				<!-- <select class="form-control" name="setting_8">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
										        		<div class="row" style="padding-bottom: 10px;">
										        			<div class="col-md-5" style="padding-left: 30px;">
										        				<label for="exampleInputEmail1">Standby</label>
										        			</div>
										        			<div class="col-md-7 font_class">
										        				<input type="radio" name="setting_9"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="setting_9" value="No"> No</input>
									          					<input type="radio" name="setting_9" value="N/A"> N/A</input>
										        				<!-- <select class="form-control" name="setting_9">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
										        		<div class="row" style="padding-bottom: 10px;">
										        			<div class="col-md-5">
										        				<label for="exampleInputEmail1">Change Password</label>
										        			</div>
										        			<div class="col-md-7 font_class">
										        				<input type="radio" name="setting_10"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="setting_10" value="No"> No</input>
									          					<input type="radio" name="setting_10" value="N/A"> N/A</input>
										        				<!-- <select class="form-control" name="setting_10">
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
				          			<div class="col-md-6" style="background-color: #fff; border-radius: 10px; padding-top: 10px; border: 1px solid #bdbdbd;">

				          					<legend style="font-size: 15px; font-weight: 700;">UPS</legend>


				          					<div class="row">
									        	<div class="col-md-12">
									        			<div class="row" style="padding-bottom: 10px;">
										        			<div class="col-sm-3">
										        				<label for="exampleInputEmail1">Output Load</label>
										        			</div>
										        			<div class="col-sm-3 font_class">
										        				<input type="radio" name="ups_1"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="ups_1" value="No"> No</input>
									          					<input type="radio" name="ups_1" value="N/A"> N/A</input>

									          					<input type="text" name="data_ol" class="form-control">
										        				<!-- <select class="form-control" name="ups_1">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>

										        			<div class="col-sm-3">
										        				<label for="exampleInputEmail1">Battery Capacity</label>
										        			</div>

										        			<div class="col-sm-3 font_class">
										        				<input type="radio" name="ups_2"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="ups_2" value="No"> No</input>
									          					<input type="radio" name="ups_2" value="N/A"> N/A</input>

									          					<input type="text" name="data_bc" class="form-control">
										        				<!-- <select class="form-control" name="ups_2">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
										        		<div class="row" style="padding-bottom: 10px;">
										        			<div class="col-sm-3">
										        				<label for="exampleInputEmail1">Battery Temperature</label>
										        			</div>
										        			<div class="col-sm-3 font_class">
										        				<input type="radio" name="ups_3"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="ups_3" value="No"> No</input>
									          					<input type="radio" name="ups_3" value="N/A"> N/A</input>

									          					<input type="text" name="data_bt" class="form-control">
										        				<!-- <select class="form-control" name="ups_3">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>

										        			<div class="col-sm-3">
										        				<label for="exampleInputEmail1">Run Time Remaining</label>
										        			</div>
										        			<div class="col-sm-3 font_class">
										        				<input type="radio" name="ups_4"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="ups_4" value="No"> No</input>
									          					<input type="radio" name="ups_4" value="N/A"> N/A</input>

									          					<input type="text" name="data_rt" class="form-control">
										        				<!-- <select class="form-control" name="ups_4">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
										        		<div class="row" style="padding-bottom: 10px;">
										        			<div class="col-sm-3">
										        				<label for="exampleInputEmail1">Replace Battery Indicator</label>
										        			</div>
										        			<div class="col-sm-3 font_class">
										        				<input type="radio" name="ups_5"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="ups_5" value="No"> No</input>
									          					<input type="radio" name="ups_5" value="N/A"> N/A</input>
										        				<!-- <select class="form-control" name="ups_5">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			</div>
										        		</div>
										        		<!-- <div class="row" style="padding-bottom: 10px;">
										        			<div class="col-md-6">
										        				<label for="exampleInputEmail1">Run Time Remaining</label>
										        			</div> -->
										        			<!-- <div class="col-md-6 font_class">
										        				<input type="radio" name="ups_4"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="ups_4" value="No"> No</input>
									          					<input type="radio" name="ups_4" value="N/A"> N/A</input>

									          					<input type="text" name="data_rt" class="form-control"> -->
										        				<!-- <select class="form-control" name="ups_4">
										        					<option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select>
										        			</div> -->
										        		<!-- </div> -->
										        		<!-- <div class="row" style="padding-bottom: 10px;"> -->
										        			<!-- <div class="col-md-6">
										        				<label for="exampleInputEmail1">Replace Battery Indicator</label>
										        			</div> -->
										        			<!-- <div class="col-md-6 font_class"> -->
										        				<!-- <input type="radio" name="ups_5"  value="Yes" checked> Yes</input>
									          					<input type="radio" name="ups_5" value="No"> No</input>
									          					<input type="radio" name="ups_5" value="N/A"> N/A</input -->>
										        				<!-- <select class="form-control" name="ups_5"> -->
										        					<!-- <option value="">-- Select Type -- </option>
										        					<?= yes_or_no() ?>
										        				</select> -->
										        			<!-- </div> -->
										        		<!-- </div> -->
										        		
										        </div>
										    </div>

				          			</div>

				          			<div class="col-md-1"> </div>

				          			<div class="col-md-5">
				          				<!-- <div style="background-color: #fff; border-radius: 10px; padding-top: 10px; border: 1px solid #bdbdbd; padding-left: 10px; padding-right: 10px;">
					          				<legend style="font-size: 15px; font-weight: 700;">Comment/Remark</legend>

				          					<div class="row">
					          					<div class="form-group col-md-12">
									              <textarea id="comment" name="comment" rows="5" cols="50" class="form-control"></textarea>
									            </div>
									        </div>
									    </div> -->

									    <div style="padding-top: 30px;">
									    	
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
									<div class="col-md-5" style="border-radius: 10px; padding-top: 10px;">
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
                	var mac_address = response.mac_addr;
                	$("#mac_address").val(mac_address);

                	var location = response.location;
                	$("#location").val(location);

                	var serial_number = response.serial_number;
                	$("#serial_number").val(serial_number);

                	var ram = response.Ram;
                	$("#ram").val(ram);


                	var model = response.model;
                	$("#model").val(model);

                	// var ip = response.ip;
                	// $("#ip").val(ip);
                	
                	$("#manufacture").val(response.vendor);
                	$("#ip").val(response.ip_address);
                	$("#firmware").val(response.firmware_version);	
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
	                url: '<?= base_url() ?>Form_PPM/detail_network',
	                type: 'POST',
	                dataType: 'json',
	                data: data,
	                beforeSend: function() {
	                   
	                },
	                success: function(response){

	                	//$("#year").val(response.year);

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
	                	$("#serial_number").val(response.serial_number);
	                	$("#mac_address").val(response.mac_address);
	                	$("#ram").val(response.cpu_ram);
	                	$("#model").val(response.model);
	                	$("#manufacture").val(response.manufacture);
	                	$("#ip").val(response.ip);
	                	$("#firmware").val(response.firmware);


	                	$("#perform_date").val(response.perform_date);
	                	//$("#quarter").val(response.quarter);
	                	//alert(response.quarter);
	                	//$("input[name*='nation']")
	                	// $("select[name='physical_1']").val(response.physical_1);
	                	// $("select[name='physical_2']").val(response.physical_2);
	                	// $("select[name='physical_3']").val(response.physical_3);
	                	// $("select[name='physical_4']").val(response.physical_4);
	                	// $("select[name='physical_5']").val(response.physical_5);
	                	// $("select[name='physical_6']").val(response.physical_6);
	                	// $("select[name='physical_7']").val(response.physical_7);
	                	// $("select[name='physical_8']").val(response.physical_8);
	                	// $("select[name='physical_9']").val(response.physical_9);
	                	// $("select[name='physical_10']").val(response.physical_10);
	                	// $("select[name='physical_11']").val(response.physical_11);
	                	// $("select[name='physical_12']").val(response.physical_12);
	                	// $("select[name='physical_13']").val(response.physical_13);


	                	// $("select[name='setting_1']").val(response.setting_1);
	                	// $("select[name='setting_2']").val(response.setting_2);
	                	// $("select[name='setting_3']").val(response.setting_3);
	                	// $("select[name='setting_4']").val(response.setting_4);
	                	// $("select[name='setting_5']").val(response.setting_5);
	                	// $("select[name='setting_6']").val(response.setting_6);
	                	// $("select[name='setting_7']").val(response.setting_7);
	                	// $("select[name='setting_8']").val(response.setting_8);
	                	// $("select[name='setting_9']").val(response.setting_9);
	                	// $("select[name='setting_10']").val(response.setting_10);


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

	                	$("[name=temperature]").val([response.temperature]);
	                	$("[name=port]").val([response.port]);
	                	$("[name=memory]").val([response.memory]);
	                	$("[name=cpu]").val([response.cpu]);
	                	$("[name=snmp_string]").val([response.snmp_string]);


	                	// $("select[name='ups_1']").val(response.ups_1);
	                	// $("select[name='ups_2']").val(response.ups_2);
	                	// $("select[name='ups_3']").val(response.ups_3);
	                	// $("select[name='ups_4']").val(response.ups_4);
	                	// $("select[name='ups_5']").val(response.ups_5);

	                	$("[name=ups_1]").val([response.ups_1]);
	                	$("[name=ups_2]").val([response.ups_2]);
	                	$("[name=ups_3]").val([response.ups_3]);
	                	$("[name=ups_4]").val([response.ups_4]);
	                	$("[name=ups_5]").val([response.ups_5]);


	                	$("[name=data_ol]").val([response.data_ol]);
	                	$("[name=data_bc]").val([response.data_bc]);
	                	$("[name=data_bt]").val([response.data_bt]);
	                	$("[name=data_rt]").val([response.data_rt]);


	                	//$("textarea[name='comment']").val(response.comment);
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

	  					list_comment(response.id_number);
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
    	//$("#acknowledge").prop('disabled',true);
    	$("#brand").prop('disabled',true);
    	$("#department").prop('disabled',true);
    	$("#level").prop('disabled',true);
    	$("#serial_number").prop('disabled',true);
    	$("#mac_address").prop('disabled',true);
    	$("#ram").prop('disabled',true);
    	$("#model").prop('disabled',true);
    	$("#manufacture").prop('disabled',true);
    	$("#ip").prop('disabled',true);
    	$("#firmware").prop('disabled',true);
    	$("#quarter").prop('disabled',true);



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


    	$("[name=temperature]").prop('disabled',true);
    	$("[name=port]").prop('disabled',true);
    	$("[name=memory]").prop('disabled',true);
    	$("[name=cpu]").prop('disabled',true);
    	$("[name=snmp_string]").prop('disabled',true);


    	$("[name=ups_1]").prop('disabled',true);
    	$("[name=ups_2]").prop('disabled',true);
    	$("[name=ups_3]").prop('disabled',true);
    	$("[name=ups_4]").prop('disabled',true);
    	$("[name=ups_5]").prop('disabled',true);


    	$("[name=data_ol]").prop('disabled',true);
    	$("[name=data_bc]").prop('disabled',true);
    	$("[name=data_bt]").prop('disabled',true);
    	$("[name=data_rt]").prop('disabled',true);

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
		                		$('#form_data').attr('action', '<?= base_url()?>Form_PPM/Add_ups');
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
								$('#form_data').attr('action', '<?= base_url()?>Form_PPM/Update_UPS');
		                	}
		               	}
		          })
		}

	});
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