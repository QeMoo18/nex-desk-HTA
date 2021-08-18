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



			<?php 
				// checklist
				$getData = "SELECT * FROM ppm_list_checkbox WHERE id_number='".$data->id_number."' ";
				// var_dump($getData);
				$queryx= $this->db->query($getData);
				if ($queryx->num_rows() >0){ 
				    	//echo $id;
				        foreach ($queryx->result() as $datax) {

				        	$cb_1 = $datax->cb_1;
				        	if($cb_1=='1'){$cb_1='/';}else{$cb_1=' ';}


				        	$cb_2 = $datax->cb_2;
				        	if($cb_2=='1'){$cb_2='/';}else{$cb_2=' ';}


				        	$cb_3 = $datax->cb_3;
				        	if($cb_3=='1'){$cb_3='/';}else{$cb_3=' ';}


				        	$cb_4 = $datax->cb_4;
				        	if($cb_4=='1'){$cb_4='/';}else{$cb_4=' ';}


				        	$cb_5 = $datax->cb_5;
				        	if($cb_5=='1'){$cb_5='/';}else{$cb_5=' ';}


				        	$cb_6 = $datax->cb_6;
				        	if($cb_6=='1'){$cb_6='/';}else{$cb_6=' ';}


				        	$cb_7 = $datax->cb_7;
				        	if($cb_7=='1'){$cb_7='/';}else{$cb_7=' ';}


				        	$cb_8 = $datax->cb_8;
				        	if($cb_8=='1'){$cb_8='/';}else{$cb_8=' ';}


				        	$cb_9 = $datax->cb_9;
				        	if($cb_9=='1'){$cb_9='/';}else{$cb_9=' ';}


				        	$cb_10 = $datax->cb_10;
				        	if($cb_10=='1'){$cb_10='/';}else{$cb_10=' ';}


				        	$cb_11 = $datax->cb_11;
				        	if($cb_11=='1'){$cb_11='/';}else{$cb_11=' ';}


				        	$cb_12 = $datax->cb_12;
				        	if($cb_12=='1'){$cb_12='/';}else{$cb_12=' ';}


				        	$cb_13 = $datax->cb_13;
				        	if($cb_13=='1'){$cb_13='/';}else{$cb_13=' ';}


				        	$cb_14 = $datax->cb_14;
				        	if($cb_14=='1'){$cb_14='/';}else{$cb_14=' ';}


				        	$cb_15 = $datax->cb_15;
				        	if($cb_15=='1'){$cb_15='/';}else{$cb_15=' ';}


				        	$cb_16 = $datax->cb_16;
				        	if($cb_16=='1'){$cb_16='/';}else{$cb_16=' ';}


				        	$cb_17 = $datax->cb_17;
				        	if($cb_17=='1'){$cb_17='/';}else{$cb_17=' ';}


				        	$cb_18 = $datax->cb_18;
				        	if($cb_18=='1'){$cb_18='/';}else{$cb_18=' ';}

				        }
				}
			?>


			<table>
				<tbody>
					<tr style="padding-bottom: 30px;">
						<td style="width: 100;" class="small"><img src="<?= base_url()?>Prohawk_Logo.png" style="width: 220px;"><br> <h4><b>COMPUTER & NOTEBOOK</b> </h4>  <p>Update and verify inventory by checking and ticking boxes below</p></td>
						<td style="width: 50;"></td>
						<td style="width: 100%;" class="small"><h4><b>PLANNED PREVENTIVE MAINTENANCE </b></h4>  <h5>HOSPITAL TUNKU AZIZAH</h5>
						<br><br>
								<h4><b>YEAR : 2021</b></h4>

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
										<td style="width: 100%;" class="small">
											<span>[<?= $cb_1?>]</span>
											Level : <?= $data->cpu_level ?></td>
									</tr>
									<tr>
										<td style="width: 100%;" class="small">
											<span>[<?= $cb_2?>]</span>
											Department : <?= $data->department ?></td>
									</tr>
									<tr>
										<td style="width: 100%;" class="small">
											<span>[<?= $cb_3?>]</span>
											Room Name : <?= $data->room_name ?></td>
									</tr>
									<tr>
										<td style="width: 100%;" class="small">
											<span>[<?= $cb_4?>]</span>
											Room ID : <?= $data->location ?></td>
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
										<td style="width: 100%;" class="small">
											<span>[<?= $cb_5?>]</span>
											Brand : <?= $data->cpu_brand ?></td>
									</tr>
									<tr>
										<td style="width: 100%;" class="small">
											<span>[<?= $cb_7?>]</span>
											Model : <?= $data->cpu_model ?></td>
									</tr>
									<tr>
										<td style="width: 100%;" class="small">
											<span>[<?= $cb_9?>]</span>
											Serial Number : <?= $data->cpu_serial_number ?></td>
									</tr>
									<tr>
										<td style="width: 100%;" class="small">
											<span>[<?= $cb_6?>]</span>
											Processor Type : <?= $data->cpu_processor_type ?></td>
									</tr>
									<tr>
										<td style="width: 100%;" class="small">
											<span>[<?= $cb_8?>]</span>
											RAM : <?= $data->cpu_ram ?></td>
									</tr>
								</tbody>
							</table>
						</td>
						<td style="width: 200px;">
							<h5>NETWORK</h5>
							<table>
								<tbody>
									<tr>
										<td style="width: 100%;" class="small">
											<span>[<?= $cb_10?>]</span>
											Network Port : <?= $data->network_port ?></td>
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
					</tr>
				</tbody>
			</table>



			<table>
				<tbody>
					<tr width="700px;">
						
						<td style="width: 100%;">
							<h5>TAGGING</h5>
							<table>
								<tbody>
									<tr>
										<td style="width: 100%;" class="small">
											<span>[<?= $cb_11?>]</span>
											Device In Tag <?= $data->tagging_device ?></td>
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
				NOTEBOOK
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
			<!-- <p style="font-size: 12px;"><?= $data->comment ?></p> -->
			<table>
				<tbody>
					<?= $comment_user; ?>
				</tbody>
			</table>

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
													<!-- <?= date('d/m/Y',strtotime($data->created_date)) ?> -->

													<?= substr($data->created_date,0,-5) ?>

												</p>
											</td>
											<td style="width: 200px; padding-left: 10px; padding-right: 10px;">
												<p style="font-size: 12px;">
													<?= $data->acknowledge ?>
													<br>
													<?= substr($data->date_acknowledge,0,-5) ?>
												</p>
											</td>
											<td style="width: 250px; padding-left: 10px; padding-right: 10px;">
												<p style="font-size: 12px;">

													<?php 
													//var_dump($data->status_ppm);
													if(($data->status_ppm=='Verified')||($data->status_ppm=='Verified & Send')||($data->status_ppm=='Endorse')||($data->status_ppm=='Endorse & Send')){
														echo $data->endorse;
														echo '<br>';
														echo substr($data->date_verifier,0,-5);


													} else {
														echo 'Not Yet';
													}
													?>

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