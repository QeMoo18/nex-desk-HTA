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


				<table>
					<tbody>
						<tr>
							<td style="width: 500px;" class="small"><img src="<?= base_url()?>Prohawk_Logo.jpg"></td>
							<td style="width: 500px;float: right;" class="small">PLANNED PREVENTIVE MAINTENANCE</td>
						</tr>
						<tr>
							<td style="width: 500px;" class="small">COMPUTER & NOTEBOOK</td>
							<td style="width: 300px;" class="small pull-right"><span style="float: right;">YEAR: <input type="text" class="form-control"> </span></td>
						</tr>
					</tbody>
				</table>


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
								<td style="width: 500px;" class="small"><p>Hostname : <?= $data->hostname ?> </p></td>
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

					<table>
						<tbody>
							<tr>
								<td style="width: 500px;">Empty recycle bin & delete *.tmp/*.dmp</td>
								<td style="width: 500px;"><?= $data->checklist_1 ?></td>
							</tr>
							<tr>
								<td style="width: 500px;">Change local admin password</td>
								<td style="width: 500px;"><?= $data->checklist_2 ?></td>
							</tr>
							<tr>
								<td style="width: 500px;">Window updates(latest version)</td>
								<td style="width: 500px;"><?= $data->checklist_3 ?></td>
							</tr>
							<tr>
								<td style="width: 500px;"> Microsoft Office 2016 (Make sure actiivated)</td>
								<td style="width: 500px;"><?= $data->checklist_4 ?></td>
							</tr>
							<tr>
								<td style="width: 500px;"> Software Chrome, PDF Reader, 7 zip & Java JDK v6u45</td>
								<td style="width: 500px;"><?= $data->checklist_5 ?></td>
							</tr>
							<tr>
								<td style="width: 500px;"> Check and review pattern. State last update</td>
								<td style="width: 500px;"><?= $data->checklist_6 ?></td>
							</tr>
							<tr>
								<td style="width: 500px;"> Perform full scanning</td>
								<td style="width: 500px;"><?= $data->checklist_7 ?></td>
							</tr>
							<tr>
								<td style="width: 500px;">Run GP update & reboot</td>
								<td style="width: 500px;"><?= $data->checklist_8 ?></td>
							</tr>
							<tr>
								<td style="width: 500px;">Check UPS functionality (Siwtch off wall plug power)</td>
								<td style="width: 500px;"><?= $data->checklist_9 ?></td>
							</tr>
							<tr>
								<td style="width: 500px;">CPU and FAN (Vacuum and brush the CPU and check the CPU's cooling fan is working)</td>
								<td style="width: 500px;"><?= $data->physical_1 ?></td>
							</tr>
							<tr>
								<td style="width: 500px;">RAM (Take out, brush and plug in)</td>
								<td style="width: 500px;"><?= $data->physical_2 ?></td>
							</tr>
							<tr>
								<td style="width: 500px;">Mouse and keyboard (Make sure is free of dust and grime. Test the functionality)</td>
								<td style="width: 500px;"><?= $data->physical_3 ?></td>
							</tr>
							  <tr>
								<td style="width: 500px;">Monitor / Screen (Clean the monitor / screen by using spray cleaner and cloths)</td>
								<td style="width: 500px;"><?= $data->physical_4 ?></td>
							</tr>
							<tr>
								<td style="width: 500px;">CD-ROM/DVD Drive(Clean the laser and tray by using CD cleaner disk)</td>
								<td style="width: 500px;"><?= $data->physical_5 ?></td>
							</tr>
							 <tr>
								<td style="width: 500px;">Check Cable Tidiness (Make sure the tidiness of cable)</td>
								<td style="width: 500px;"><?= $data->physical_6 ?></td>
							</tr>
							<tr>
								<td style="width: 500px;">Check connection (Make sure all datat cables and power cables are sug in the their connection)</td>
								<td style="width: 500px;"><?= $data->physical_7 ?></td>
							</tr>
							<tr>
								<td style="width: 500px;">Check Signal(Check LED signal of hard-disk, CPU and monitor)</td>
								<td style="width: 500px;"><?= $data->physical_8 ?></td>
							</tr>
						</tbody>
					</table>

					<hr>
					<p>Defragmentation</p>
					<table>
						<tbody>
							<tr>
								<td style="width:400px;">Drive : <?= $data->defrag_1 ?></td>
								<td  style="width:400px;">Used Space : <?= $data->defrag_2 ?></td>
								<td  style="width:400px;">Free Space : <?= $data->defrag_3 ?></td>
							</tr>
							<tr>
								<td style="width:400px;">Drive : <?= $data->defrag_4 ?></td>
								<td  style="width:400px;">Used Space : <?= $data->defrag_5 ?></td>
								<td  style="width:400px;">Free Space : <?= $data->defrag_6 ?></td>
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
