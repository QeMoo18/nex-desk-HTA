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
					<legend><h3>PREVENTIVE MAINTENANCE PLAN<br>( Scanner )</h3></legend>
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
								<td style="width: 1400px;" class="small">Scanner Type : <?= $data->ppm_type ?></td>
							</tr>
						</tbody>
					</table>

					<hr>
					<p>Device Details</p>
					<table>
						<tbody>
							<tr>
								<td style="width:300px;">Hostname : <?= $data->hostname ?></td>
								<td style="width:300px;">Location : <?= $data->location ?></td>
								<td style="width:300px;">Model : <?= $data->model ?></td>
								<td style="width:300px;">Local : <?= $data->local ?></td>
							</tr>
							<tr>
								<td style="width:300px;">Level : <?= $data->level ?></td>
								<td style="width:300px;">Serial Number : <?= $data->serial_number ?></td>
								<td style="width:300px;">Network IP : <?= $data->network_ip ?></td>
								<td style="width:300px;">Department : <?= $data->department ?></td>
							</tr>
							<tr>
								<td style="width:300px;">Manufacture : <?= $data->manufacture ?></td>
								<td style="width:300px;">Port : <?= $data->port ?></td>
								<td style="width:300px;">Device In Tag : <?= $data->device_tag ?></td>
								<td style="width:300px;">Need Replacement ? : <?= $data->need_replacement ?></td>
							</tr>
							<tr>
								<td style="width:300px;">Date Replaced : <?= $data->date_replacement ?></td>
								<td style="width:300px;">PPM Tag : <?= $data->ppm_tag ?></td>
								<td style="width:300px;"></td>
								<td style="width:300px;"></td>
							</tr>
						</tbody>
					</table>

					<hr>
					<p>Physical Check</p>
					<table>
						<tbody>
							<tr>
								<td style="width:600px;">Wipe Glass : <?= $data->checklist_1 ?></td>
								<td style="width:600px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="width:600px;">Scanning Trip : <?= $data->checklist_2 ?></td>
								<td style="width:600px;">&nbsp;</td> 
							</tr>
							<tr>
								<td style="width:600px;">Automatic Document Feeder (ADF) Duplex : <?= $data->checklist_3 ?></td>
								<td style="width:600px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="width:600px;">Check Cable Tidiness : <?= $data->checklist_4 ?></td>
								<td style="width:600px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="width:600px;">Check LED Signal Functioning : <?= $data->checklist_5 ?></td>
								<td style="width:600px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="width:600px;">Perform Device Test : <?= $data->checklist_6 ?></td>
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