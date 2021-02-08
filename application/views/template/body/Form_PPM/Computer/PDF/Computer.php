<link href="<?= base_url()?>asset_template/beauty/css/bootstrap.min.css" rel="stylesheet">
<script src="<?= base_url()?>asset_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url()?>asset_admin/bower_components/jquery/dist/jquery.min.js"></script>


<style type="text/css">
	.right_side{
		float: right;
	}

	p{
		font-size: 8px;
	}
</style>


<?php foreach ($data as $data) { ?>
<div class="row" style="padding-bottom: 30px;">
	<div class="content-wrapper">
		<section class="content">


			<table>
				<tbody>
					<tr style="padding-bottom: 30px;">
						<td style="width: 100;" class="small"><img src="<?= base_url()?>Prohawk_Logo.png" style="width: 220px;"><br> <h4><b>COMPUTER & NOTEBOOK</b> </h4>  <p>Update and verify inventory by checking and ticking boxes below</p></td>
						<td style="width: 50;"></td>
						<td style="width: 100%;" class="small"><h4><b>PLANNED PREVENTIVE MAINTENANCE </b></h4>  <h5>HOSPITAL TUANKU AZIZAH</h5>
						<br><br>
							<h4><b>YEAR : 2020</b></h4>

						<br><br>
						</td>
					</tr>
				</tbody>
			</table>

			<hr>

			<table>
				<tbody>
					<tr style="">
						<td style="width: 100%;"></td>
						<td style="width: 100%;"></td>
						<td style="width: 100%;"><h4>HOSTNAME : <?= $data->hostname ?> </h4></td>
					</tr>
				</tbody>
			</table>


			<table>
				<tbody>
					<tr width="700px;">
						<td style="width: 200px;">
							<h5>LOCATION</h5>
							<table>
								<tbody>
									<tr>
										<td style="width: 100%;" class="small">Level : <?= $data->cpu_level ?></td>
									</tr>
									<tr>
										<td style="width: 100%;" class="small">Department : <?= $data->department ?></td>
									</tr>
									<tr>
										<td style="width: 100%;" class="small">Room Name : <?= $data->location ?></td>
									</tr>
									<tr>
										<td style="width: 100%;" class="small">Room ID : <?= $data->location ?></td>
									</tr>
								</tbody>
							</table>
						</td>
						<td style="width: 300px;">
							<br>
							<h5>CPU</h5>
							<table>
								<tbody>
									<tr>
										<td style="width: 100%;" class="small">Brand : <?= $data->cpu_brand ?></td>
									</tr>
									<tr>
										<td style="width: 100%;" class="small">Model : <?= $data->cpu_model ?></td>
									</tr>
									<tr>
										<td style="width: 100%;" class="small">Serial Number : <?= $data->cpu_serial_number ?></td>
									</tr>
									<tr>
										<td style="width: 100%;" class="small">Processor Type : <?= $data->cpu_processor_type ?></td>
									</tr>
									<tr>
										<td style="width: 100%;" class="small">RAM : <?= $data->cpu_ram ?></td>
									</tr>
								</tbody>
							</table>
						</td>
						<td style="width: 200px;">
							<h5>MONITOR (for computer only)</h5>
							<table>
								<tbody>
									<tr>
										<td style="width: 100%;" class="small">Brand : <?= $data->monitor_brand ?></td>
									</tr>
									<tr>
										<td style="width: 100%;" class="small">Model : <?= $data->monitor_model ?></td>
									</tr>
									<tr>
										<td style="width: 100%;" class="small">Serial No : <?= $data->monitor_serial_number ?></td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>



			<table>
				<tbody>
					<tr width="700px;">
						<td style="width: 200px;">
							<h5>UPS (for computer only)</h5>
							<table>
								<tbody>
									<tr>
										<td style="width: 100%;" class="small">Brand : <?= $data->ups_brand ?></td>
									</tr>
									<tr>
										<td style="width: 100%;" class="small">Model : <?= $data->ups_model ?></td>
									</tr>
									<tr>
										<td style="width: 100%;" class="small">Serial No : <?= $data->ups_serial_number ?></td>
									</tr>
								</tbody>
							</table>
						</td>
						<td style="width: 300px;">
							<h5>NETWORK</h5>
							<table>
								<tbody>
									<tr>
										<td style="width: 100%;" class="small">Network Port : <?= $data->network_port ?></td>
									</tr>
									<tr>
										<td style="width: 100%;" class="small">Type Port : <?= $data->network_type ?></td>
									</tr>
									<tr>
										<td style="width: 100%;" class="small">IP : <?= $data->network_ip ?></td>
									</tr>
								</tbody>
							</table>
						</td>
						<td style="width: 200px;">
							<h5>TAGGING</h5>
							<table>
								<tbody>
									<tr>
										<td style="width: 100%;" class="small">Device In Tag : <?= $data->tagging_device ?></td>
									</tr>
									<tr>
										<td style="width: 100%;" class="small">Need Replacement : <?= $data->tagging_replace ?></td>
									</tr>
									<tr>
										<td style="width: 100%;" class="small">Date Replaced : <?= $data->tagging_date ?></td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
			<br>
			<div class="col-md-12" style="background: #000">
				<p style="color: #fff; font-weight: 900; font-size: 12px;">CHECKLIST</p>
			</div>


			<div class="col-md-12">
				Computer
			</div>


			<table>
				<tbody>
					<tr style="">
						<td style="width: 700px;">
							<table>
								<tbody>
									<tr>
										<td style="width: 450px" class="small">1) Empty recycle bin & delete *.tmp/*.dmp </td>
										<td style="width: 50px;" class="small"> <?= $data->checklist_1 ?> </td>
										<td style="width: 200px;" class="small"> </td>
									</tr>

									<tr>
										<td style="width: 450px" class="small">2) Change local admin password </td>
										<td style="width: 50px;" class="small"> <?= $data->checklist_2 ?> </td>
										<td style="width: 200px;" class="small"> </td>
									</tr>

									<tr>
										<td style="width: 450px" class="small">3) Check and Perform :- </td>
										<td style="width: 50px;" class="small"> </td>
										<td style="width: 200px;" class="small"> </td>
									</tr>

									<tr>
										<td style="width: 450px;padding-left: 20px;" class="small">a) Window updates(latest version) </td>
										<td style="width: 50px;" class="small"> <?= $data->checklist_3 ?> </td>
										<td style="width: 200px;" class="small"> <?= $data->win_update ?> </td>
									</tr>

									<tr>
										<td style="width: 450px;padding-left: 20px;" class="small">b) Microsoft Office 2016 (Make sure actiivated) </td>
										<td style="width: 50px;" class="small"> <?= $data->checklist_4 ?> </td>
										<td style="width: 200px;" class="small"> </td>
									</tr>

									<tr>
										<td style="width: 450px;padding-left: 20px;" class="small">c) Software Chrome, PDF Reader, 7 zip & Java JDK v6u45 </td>
										<td style="width: 50px;" class="small"> <?= $data->checklist_5 ?> </td>
										<td style="width: 200px;" class="small"> </td>
									</tr>


									<tr>
										<td style="width: 450px" class="small">4) Antivirus SEP V14</td>
										<td style="width: 50px;" class="small"> </td>
										<td style="width: 200px;" class="small"> </td>
									</tr>

									<tr>
										<td style="width: 450px;padding-left: 20px;" class="small">a) Check and review pattern. State last update </td>
										<td style="width: 50px;" class="small"> <?= $data->checklist_6 ?> </td>
										<td style="width: 200px;" class="small"> <?= $data->check_antivirus ?> </td>
									</tr>

									<tr>
										<td style="width: 450px;padding-left: 20px;" class="small">b) Perform full scanning </td>
										<td style="width: 50px;" class="small"> <?= $data->checklist_7 ?> </td>
										<td style="width: 200px;" class="small"> <?= $data->perform_antivirus ?> </td>
									</tr>


									<tr>
										<td style="width: 450px" class="small">5) Run GP update & reboot </td>
										<td style="width: 50px;" class="small"> <?= $data->checklist_8 ?> </td>
										<td style="width: 200px;" class="small"> </td>
									</tr>

									<tr>
										<td style="width: 450px;padding-left: 20px;" class="small">6) Check UPS functionality (Siwtch off wall plug power) </td>
										<td style="width: 50px;" class="small"> <?= $data->checklist_9 ?> </td>
										<td style="width: 200px;" class="small"> </td>
									</tr>


									<tr>
										<td style="width: 450px" class="small">7) Antivirus SEP V14</td>
										<td style="width: 50px;" class="small"> </td>
										<td style="width: 200px;" class="small"> </td>
									</tr>

									<tr>
										<td style="width: 450px;padding-left: 20px;" class="small">a) CPU and FAN (Vacuum and brush the CPU and check the CPU's cooling fan is working) </td>
										<td style="width: 50px;" class="small"> <?= $data->physical_1 ?> </td>
										<td style="width: 200px;" class="small"> </td>
									</tr>

									<tr>
										<td style="width: 450px;padding-left: 20px;" class="small">b) RAM (Take out, brush and plug in) </td>
										<td style="width: 50px;" class="small"> <?= $data->physical_2 ?> </td>
										<td style="width: 200px;" class="small"> </td>
									</tr>


									<tr>
										<td style="width: 450px;padding-left: 20px;" class="small">c) Mouse and keyboard (Make sure is free of dust and grime. Test the functionality) </td>
										<td style="width: 50px;" class="small"> <?= $data->physical_3 ?> </td>
										<td style="width: 200px;" class="small"> </td>
									</tr>

									<tr>
										<td style="width: 450px;padding-left: 20px;" class="small">d) Monitor / Screen (Clean the monitor / screen by using spray cleaner and cloths) </td>
										<td style="width: 50px;" class="small"> <?= $data->physical_4 ?> </td>
										<td style="width: 200px;" class="small"> </td>
									</tr>


									<tr>
										<td style="width: 450px;padding-left: 20px;" class="small">e) CD-ROM/DVD Drive(Clean the laser and tray by using CD cleaner disk) </td>
										<td style="width: 50px;" class="small"> <?= $data->physical_5 ?> </td>
										<td style="width: 200px;" class="small"> </td>
									</tr>


									<tr>
										<td style="width: 450px;padding-left: 20px;" class="small">f) Check Cable Tidiness (Make sure the tidiness of cable) </td>
										<td style="width: 50px;" class="small"> <?= $data->physical_6 ?> </td>
										<td style="width: 200px;" class="small"> </td>
									</tr>

									<tr>
										<td style="width: 450px;padding-left: 20px;" class="small">g) Check connection (Make sure all datat cables and power cables are sug in the their connection) </td>
										<td style="width: 50px;" class="small"> <?= $data->physical_7 ?> </td>
										<td style="width: 200px;" class="small"> </td>
									</tr>


									<tr>
										<td style="width: 450px;padding-left: 20px;" class="small">h) Check Signal(Check LED signal of hard-disk, CPU and monitor) </td>
										<td style="width: 50px;" class="small"> <?= $data->physical_8 ?> </td>
										<td style="width: 200px;" class="small"> </td>
									</tr>


								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>


			<table>
				<tbody>
					<tr style="">
						<td style="width: 700px;">
							<table>
								<tbody>
									<tr>
										<td style="width: 300px;" class="small">8) Check Harddisk Storage </td>
										<td style="width: 100px;" class="small"> Drive : <?= $data->defrag_1 ?> </td>
										<td style="width: 100px;" class="small"> Used Space : <?= $data->defrag_2 ?> </td>
										<td style="width: 100px;" class="small"> Free Space : <?= $data->defrag_3 ?> </td>
									</tr>
									<tr>
										<td style="width: 300px;" class="small"></td>
										<td style="width: 100px;" class="small"> Drive : <?= $data->defrag_4 ?> </td>
										<td style="width: 100px;" class="small"> Used Space : <?= $data->defrag_5 ?> </td>
										<td style="width: 100px;" class="small"> Free Space : <?= $data->defrag_6 ?> </td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>




			<table>
				<tbody>
					<tr style="">
						<td style="width: 700px;">
							<table>
								<tbody>
									<tr>
										<td style="width: 100px;" class="small">Defragmentation </td>
										<td style="width: 200px;" class="small"> Analysis Result (%) : <?= $data->analysis ?> </td>
										<td style="width: 300px;" class="small"> Type : <?= $data->type_defrag ?> </td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>

			<br>
			<div class="col-md-12" style="background: #000">
				<p style="color: #fff; font-weight: 900; font-size: 12px;">REMARKS</p>
			</div>
			<p style="font-size: 12px;"><?= $data->comment ?></p>

			<br>


			<table>
				<tbody>
					<tr style="">
						<td style="width: 700px;">
							<table border="1">
								<tbody>
									<thead>
										<tr style="background: #000;">
											<td style="width: 250px; padding-top: 5px; padding-bottom: 5px; padding-left: 18px;" class="small"><p style="color: #fff; font-weight: 900; font-size: 12px;">SERVICED BY</p></td>
											<td style="width: 200px; padding-top: 5px; padding-bottom: 5px; padding-left: 10px;" class="small"><p style="color: #fff; font-weight: 900; font-size: 12px;">ACKNOWLEDGED BY</p> </td>

											<td style="width: 250px; padding-top: 5px; padding-bottom: 5px; padding-left: 30px;" class="small">
												<?php if($data->status=='Rejected'){ ?>
												<p style="color: #fff; font-weight: 900; font-size: 12px;">REJECTED BY</p>
												<?php } else { ?>
												<p style="color: #fff; font-weight: 900; font-size: 12px;">VERIFIED BY</p>
												<?php } ?>
											</td>
										</tr>
										<tr>
											<td style="width: 250px; padding-left: 10px; padding-right: 10px;">
												<p style="font-size: 12px;">
													<?= $data->responsible ?>
													<br>
													<?= $data->created_date ?>
												</p>
											</td>
											<td style="width: 200px; padding-left: 10px; padding-right: 10px;">
												<p style="font-size: 12px;">
													<?= $data->acknowledge ?>
													<br>
													<?= $data->created_date ?>
												</p>
											</td>
											<td style="width: 250px; padding-left: 10px; padding-right: 10px;">
												<p style="font-size: 12px;">
													
													<?php if($data->status=='Done'){ ?>
															<?= $data->endorse ?>
															<br>
															<?= $data->date_endorse ?>
													<?php } else if($data->status=='Rejected'){ ?>
															<?= $data->endorse ?>
															<br>
															<?= $data->date_reject ?>

													<?Php } else { ?>
														Not Yet
													<?php } ?>
												</p>
											</td>
										</tr>
									</thead>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>

			<?php if($data->status=='Rejected'){ ?>
			<br>
			<p style="font-size: 12px;">Reason To Reject : <?= $data->reason_reject ?></p>
			<?Php } ?>

			<h4 style="font-size: 12px; float: right;"><b>NOTE: This PPM Form is computer generated and no signature is required</b></h4>

		</section>
	</div>
</div>
<?php } ?>


<style type="text/css">
	.small{
		font-size: 11px;
	}
</style>