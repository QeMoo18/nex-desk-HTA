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
					<legend><h3>PREVENTIVE MAINTENANCE PLAN<br>( Switch )</h3></legend>
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
					<p>Device Details</p>
					<table>
						<tbody>
							<tr>
								<td style="width:300px;">Hostname : <?= $data->hostname ?></td>
								<td style="width:300px;">Model : <?= $data->model ?></td>
								<td style="width:300px;">Serial Number : <?= $data->serial_number ?></td>
								<td style="width:300px;">Mac Address : <?= $data->mac_address ?></td>
							</tr>
							<tr>
								<td style="width:300px;">Location : <?= $data->location ?></td>
								<td style="width:300px;">Manufacture : <?= $data->manufacture ?></td>
								<td style="width:300px;">IP Address : <?= $data->ip ?></td>
								<td style="width:300px;">Firmware Version : <?= $data->firmware ?></td>
							</tr>
						</tbody>
					</table>

					<hr>
					<p>Physical Check</p>
					<table>
						<tbody>
							<tr>
								<td style="width:600px;">Room : <?= $data->physical_1 ?></td>
								<td style="width:600px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="width:600px;">Rack : <?= $data->physical_2 ?></td>
								<td style="width:600px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="width:600px;">Equipment : <?= $data->physical_3 ?></td>
								<td style="width:600px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="width:600px;">Tidiness : <?= $data->physical_4 ?></td>
								<td style="width:600px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="width:600px;">Labeling : <?= $data->physical_5 ?></td>
								<td style="width:600px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="width:600px;">Fan Condition : <?= $data->physical_6 ?></td>
								<td style="width:600px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="width:600px;">Check All LEDs and PORT : <?= $data->physical_7 ?></td>
								<td style="width:600px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="width:600px;">Room Temperature (aircond) : <?= $data->physical_8 ?></td>
								<td style="width:600px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="width:600px;">Check UPS : <?= $data->physical_9 ?></td>
								<td style="width:600px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="width:600px;">PPM Tag : <?= $data->physical_10 ?></td>
								<td style="width:600px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="width:600px;">Device Tag : <?= $data->physical_11 ?></td>
								<td style="width:600px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="width:600px;">Power Over Ethernet : <?= $data->physical_12 ?></td>
								<td style="width:600px;">&nbsp;</td>
							</tr>
						  	<tr>
								<td style="width:600px;">Free Port : <?= $data->physical_13 ?></td>
								<td style="width:600px;">&nbsp;</td>
							</tr>
						</tbody>
					</table>


					<hr>
					<p>Setting & Configuration</p>
					<table>
						<tbody>
							<tr>
								<td style="width:600px;">Disable Unused Port : <?= $data->setting_1 ?></td>
								<td style="width:600px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="width:600px;">Memory Utilization : <?= $data->setting_2 ?></td>
								<td style="width:600px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="width:600px;">CPU Utilization : <?= $data->setting_3 ?></td>
								<td style="width:600px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="width:600px;">Backup Configuration : <?= $data->setting_4 ?></td>
								<td style="width:600px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="width:600px;">Check SNMP (string) : <?= $data->setting_5 ?></td>
								<td style="width:600px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="width:600px;">Check Vlan : <?= $data->setting_6 ?></td>
								<td style="width:600px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="width:600px;">HA Status : <?= $data->setting_7 ?></td>
								<td style="width:600px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="width:600px;">Online : <?= $data->setting_8 ?></td>
								<td style="width:600px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="width:600px;">Standby : <?= $data->setting_9 ?></td>
								<td style="width:600px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="width:600px;">Change Password : <?= $data->setting_10 ?></td>
								<td style="width:600px;">&nbsp;</td>
							</tr>
						</tbody>
					</table>
					

					<hr>
					<p>Comment : <?= $data->comment ?></p>


					<hr>
					<p>Submit To</p>
					<table>
						<tbody>
							<tr>
								<td style="width:500px;">Acknowledge By : <?= $data->acknowledge ?></td>
								<td  style="width:500px;">Sent to Endorse with : <?= $data->endorse ?></td>
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
