<link href="<?= base_url()?>asset_template/beauty/css/bootstrap.min.css" rel="stylesheet">
<script src="<?= base_url()?>asset_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url()?>asset_admin/bower_components/jquery/dist/jquery.min.js"></script>


<?php foreach ($data as $data) { ?>
<div class="row" style="padding-bottom: 30px;">
	<div class="content-wrapper">
		<section class="content">
			<div class="row">

				<style>
					h3 {text-align:center;}
					p{font-size: 12px;}
					.small{font-size: 20px;}
				</style>

				<div class="" style="padding-bottom: 30px;align:right;">
					<legend><h3>PREVENTIVE MAINTENANCE PLAN<br>( Server )</h3></legend>
				</div>

				<div class="col-md-12">
					<table>
						<tbody>
							<tr>
								<td style="width: 500px;" class="small">Type Of PPM : <?= $data->ppm_type ?></td>
								<td style="width: 500px;" class="small">Type Device : <?= $data->ppm_device ?></td>
								<td style="width: 500px;" class="small">Responsible : <?= $data->responsible ?></td>
							</tr>
						</tbody>
					</table>

					<hr>
					<table>
						<tbody>
							<tr>
								<td style="width: 500px;" class="small"><p>Hostname : <?= $data->hostname ?></p></td>
							</tr>
						</tbody>
					</table>

					<hr>
					<p>Location</p>
					<table>
						<tbody>
							<tr>
								<td style="width: 500px;" class="small">Location : <?= $data->location ?></td>
								<td style="width: 500px;" class="small">Level : <?= $data->cpu_level ?></td>
								<td style="width: 500px;" class="small">Department : <?= $data->department ?></td>
							</tr>
						</tbody>
					</table>


					<hr>
					<p>CPU</p>
					<table>
						<tbody>
							<tr>
								<td style="width: 500px;" class="small">Brand : <?= $data->cpu_brand ?></td>
								<td style="width: 500px;" class="small">Model : <?= $data->cpu_model ?></td>
								<td style="width: 500px;" class="small">Serial Number : <?= $data->cpu_serial_number ?></td>
							</tr>
							<tr>
								<td style="width: 500px;" class="small">Processor Type : <?= $data->cpu_processor_type ?></td>
								<td style="width: 500px;" class="small">RAM : <?= $data->cpu_ram ?></td>
							</tr>
						</tbody>
					</table>



					<hr>
					<p>Monitor</p>
					<table>
						<tbody>
							<tr>
								<td style="width: 500px;" class="small">Brand : <?= $data->monitor_brand ?></td>
								<td style="width: 500px;" class="small">Model : <?= $data->monitor_model ?></td>
								<td style="width: 500px;" class="small">Serial No : <?= $data->monitor_serial_number ?></td>
							</tr>
						</tbody>
					</table>


					<hr>
					<p>UPS</p>
					<table>
						<tbody>
							<tr>
								<td style="width: 500px;" class="small">Brand : <?= $data->ups_brand ?></td>
								<td style="width: 500px;" class="small">Model : <?= $data->ups_model ?></td>
								<td style="width: 500px;" class="small">Serial No : <?= $data->ups_serial_number ?></td>
							</tr>
						</tbody>
					</table>


					<hr>
					<p>Network</p>
					<table>
						<tbody>
							<tr>
								<td style="width: 500px;" class="small">Network Port : <?= $data->network_port ?></td>
								<td style="width: 500px;" class="small">Type Port : <?= $data->network_type ?></td>
								<td style="width: 500px;" class="small">IP : <?= $data->network_ip ?></td>
							</tr>
						</tbody>
					</table>


					<hr>
					<p>Tagging</p>
					<table>
						<tbody>
							<tr>
								<td style="width: 400px;" class="small">Device In Tag : <?= $data->tagging_device ?></td>
								<td style="width: 400px;" class="small">Need Replacement : <?= $data->tagging_replace ?></td>
								<td style="width: 400px;" class="small">Date Replaced : <?= $data->tagging_date ?></td>
								<td style="width: 400px;" class="small">PPM Tag : <?= $data->tagging_tag ?></td>
							</tr>
						</tbody>
					</table>


					<hr>
					<p>Checklist</p>

					<table >
						<tbody>
							<tr>
								<td style="width: 200px;">Check connection (Data cable and power connection)</td>
								<td  style="width: 200px;"><?= $data->physical_1 ?></td>
								<td  style="width: 200px;">Check the power sources(Plugged into protected outlets)</td>
								<td  style="width: 200px;"><?= $data->physical_2 ?></td>
								<td  style="width: 200px;">Check the fan (CPU's cooling fan is working & the airflow isn't impede by dust)</td>
								<td  style="width: 200px;"><?= $data->physical_3 ?></td>
							</tr>
							<tr>
								<td>Make sure LED signal for Hard Disk is functioning</td>
								<td><?= $data->physical_4 ?></td>
								<td>Make sure LED signal for Monitor is functioning</td>
								<td><?= $data->physical_5 ?></td>
								<td>Make sure LED signal for Network is functioning</td>
							<td><?= $data->physical_6 ?></td>
							</tr>
							<tr>
								<td>Check UPS (Make sure UPS is connected properly and functioning)</td>
								<td><?= $data->physical_7 ?></td>
								<td>Update and verify inventory (Check and verify serial number)</td>
								<td><?= $data->physical_8 ?></td>
								<td>Check and verify CPU</td>
								<td><?= $data->physical_9 ?></td>
							</tr>
						</tbody>
					</table>


					<table>
						<tbody>
						    <tr>
						      <td style="width:400px">Hard Disk Space C (GB)  : <?= $data->physical_10 ?></td>
						      <td></td>
						      <td style="width:400px">Free Space : <?= $data->physical_11 ?></td>
						      <td></td>
						      <td style="width:400px">Check : <?= $data->physical_12 ?></td>
						      <td></td>
						    </tr>
						    <tr>
						      <td style="width:400px">Hard Disk Space D (GB) : <?= $data->physical_13 ?></td>
						      <td></td>
						      <td style="width:400px">Free Space : <?= $data->physical_14 ?></td>
						      <td></td>
						      <td style="width:400px">Check : <?= $data->physical_15 ?></td>
						      <td></td>
						    </tr>  <tr>
						      <td style="width:400px">Hard Disk Space E (GB) : <?= $data->physical_16 ?></td>
						      <td></td>
						      <td style="width:400px">Free Space : <?= $data->physical_17 ?></td>
						      <td></td>
						      <td style="width:400px">Check : <?= $data->physical_18 ?></td>
						      <td></td>
						    </tr>
						 </tbody>
					</table>


					<table>
						<tbody>
						    <tr>
						      <td style="width:600px">Check KVM library functionality : <?= $data->physical_19 ?></td>
						      <td></td>
						      <td style="width:600px">Check tape library functionality : <?= $data->physical_20 ?></td>
						      <td></td>
						    </tr>
						</tbody>
					</table>






					<table>
						<tbody>
						    <tr>
						      <td style="width:400px">Total Disk : <?= $data->physical_21 ?></td>
						      <td></td>
						      <td style="width:400px">Available Disks : <?= $data->physical_22 ?></td>
						      <td></td>
						      <td style="width:400px">Check : <?= $data->physical_23 ?></td>
						      <td></td>
						    </tr>
						    <tr>
						      <td style="width:400px">Total Disk : <?= $data->physical_24 ?></td>
						      <td></td>
						      <td style="width:400px">Available Disks : <?= $data->physical_25 ?></td>
						      <td></td>
						      <td style="width:400px">Check : <?= $data->physical_26 ?></td>
						      <td></td>
						    </tr>
						</tbody>
					</table>


					<hr>
					<p>Setting & Configuration</p>
					<table>
						<tbody>
						    <tr>
						      <td style="width:300px">Run ScanDisk on system drive : <?= $data->setting_1 ?></td>
						      <td></td>
						      <td style="width:300px">Run Disk Defragmentation (applicable to all drive) : <?= $data->setting_2 ?></td>
						      <td></td>
						      <td style="width:300px">Check and install driver updates : <?= $data->setting_3 ?></td>
						      <td></td>
						      <td style="width:300px">Check and update service pack : <?= $data->setting_4 ?></td>
						      <td></td>
						    </tr>
						</tbody>
					</table>


					<table >
					  <tbody>
					    <tr>
					      <td style="width:400px;">CPU Utilization : Min</td>
					      <td>&nbsp;</td>
					      <td style="width:400px;">Amount : <?= $data->setting_5 ?></td>
					      <td></td>
					      <td style="width:400px;">Check : <?= $data->setting_6 ?></td>
					      <td></td>
					    </tr>
					    <tr>
					      <td style="width:400px;">CPU Utilization : Max</td>
					      <td>&nbsp;</td>
					      <td style="width:400px;">Amount : <?= $data->setting_7 ?></td>
					      <td></td>
					      <td style="width:400px;">Check : <?= $data->setting_8 ?></td>
					      <td></td>
					    </tr>
					    <tr>
					      <td style="width:400px;">CPU Utilization : Avg</td>
					      <td>&nbsp;</td>
					      <td style="width:400px;">Amount : <?= $data->setting_9 ?></td>
					      <td></td>
					      <td style="width:400px;">Check : <?= $data->setting_10 ?></td>
					      <td></td>
					    </tr>
					  </tbody>
					</table>


					<table >
					  <tbody>
					    <tr>
					      <td style="width:1200px;">Check and install latest Hotfix if needed : <?= $data->setting_11 ?></td>
					      <td></td>
					    </tr>
					  </tbody>
					</table>


					<table >
					  <tbody>
					    <tr>
					      <td style="width:600px;">Application : <?= $data->setting_12 ?></td>
					      <td></td>
					      <td style="width:600px;">Check : <?= $data->setting_13 ?></td>
					      <td></td>
					    </tr>
					    <tr>
					      <td style="width:600px;">Application : <?= $data->setting_14 ?></td>
					      <td></td>
					      <td style="width:600px;">Check : <?= $data->setting_15 ?></td>
					      <td></td>
					    </tr>
					    <tr>
					      <td style="width:600px;">Application : <?= $data->setting_16 ?></td>
					      <td></td>
					      <td style="width:600px;">Check : <?= $data->setting_17 ?></td>
					      <td></td>
					    </tr>
					  </tbody>
					</table>


					<hr>
					<p>Housekeeping</p>
					<table>
						<tbody>
							<tr>
							<td style="width:600px;">Monitor</td>
							<td style="width:600px;"><?= $data->house_keeping_1 ?></td>
						</tr>
						<tr>
							<td style="width:600px;">CPU</td>
							<td style="width:600px;"><?= $data->house_keeping_2 ?></td>
						</tr>
						<tr>
							<td style="width:600px;" style="width:600px;">Keyboard</td>
							<td style="width:600px;"><?= $data->house_keeping_3 ?></td>
						</tr>
						<tr>
							<td style="width:600px;">Delete .tmp files</td>
							<td style="width:600px;"><?= $data->house_keeping_4 ?></td>
						</tr>
						<tr>
							<td style="width:600px;">Delete and clean unused temporary internet files</td>
							<td style="width:600px;"><?= $data->house_keeping_5 ?></td>
						</tr>
						<tr>
							<td style="width:600px;">Empty the Recycle Bin</td>
							<td style="width:600px;"><?= $data->house_keeping_6 ?></td>
						</tr>
						<tr>
							<td style="width:600px;">Device ID Tagging</td>
							<td style="width:600px;"><?= $data->house_keeping_7 ?></td>
						</tr>
						</tbody>
					</table>


					<hr>
					<p>Security</p>

					<table>
						<tbody>
							<tr>
								<td style="width:1200px">Change password (twice a year) : <?= $data->security_1; ?></td>
								<td></td>
							</tr>
						</tbody>
					</table>

					<table>
					  <tbody>
					    <tr>
					      <td style="width: 400px;">Username : <?= $data->security_2; ?></td>
					      <td style="width: 400px;">Role : <?= $data->security_3; ?></td>
					      <td style="width: 400px;">Check : <?= $data->security_4; ?></td>
					    </tr>
					    <tr>
					      <td style="width: 400px;">Username : <?= $data->security_5; ?></td>
					      <td style="width: 400px;">Role : <?= $data->security_6; ?></td>
					      <td style="width: 400px;">Check : <?= $data->security_7; ?></td>
					    </tr>
					  </tbody>
					</table>

					<table>
						<tbody>
							<tr>
								<td style="width:1200px">Check for backup job (Backup is successfully performed) : <?= $data->security_8; ?></td>
								<td></td>
							</tr>
						</tbody>
					</table>


					<table>
					  <tbody>
					    <tr>
					      <td style="width: 400px;">Version : <?= $data->security_9; ?></td>
					      <td style="width: 400px;">Date : <?= $data->security_10; ?></td>
					      <td style="width: 400px;">Check : <?= $data->security_11; ?></td>
					    </tr>
					    <tr>
					      <td style="width: 400px;">Perform full antivirus</td>
					      <td style="width: 400px;"></td>
					      <td style="width: 400px;">Check : <?= $data->security_12; ?></td>
					    </tr>
					  </tbody>
					</table>


					<hr>
					<p>Comment : <?= $data->comment; ?></p>


					<hr>
					<p>Submit To</p>
					<table>
						<tbody>
							<tr>
								<td style="width:500px;">Acknowledge By : <?= $data->acknowledge; ?></td>
								<td  style="width:500px;">Sent to Endorse with : <?= $data->endorse; ?></td>
							</tr>
						</tbody>
					</table>

					<!-- DivTable.com -->


				</div>
			</div>
		</section>
	</div>
</div>
<?php } ?>
