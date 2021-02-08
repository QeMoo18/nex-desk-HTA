<link href="<?= base_url()?>asset_template/beauty/css/bootstrap.min.css" rel="stylesheet">
<script src="<?= base_url()?>asset_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url()?>asset_admin/bower_components/jquery/dist/jquery.min.js"></script>


<style type="text/css">
	.right_side{
		float: right;
	}

	p{
		font-size: 9px;
	}

	.font_12{
		font-size: 9px;
	}

	.font_10{
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
						<td style="width: 100;" class="small"><img src="<?= base_url()?>Prohawk_Logo.png" style="width: 220px;"><br> <h4><b>PRINTER & SCANNER </b> </h4>  <p>Update and verify inventory by checking and ticking boxes below</p></td>
						<td style="width: 50;"></td>
						<td style="width: 100%;" class="small"><h4><b>PLANNED PREVENTIVE MAINTENANCE </b></h4>  <h5>HOSPITAL TUANKU AZIZAH</h5>
						<br><br>
							<h4><b>YEAR : 2020</b></h4>

						<br><br>
						</td>
					</tr>
				</tbody>
			</table>



			<table style="width:100%">
			  <tr>
			    <td style="width: 50%">

			    </td>
			    <td style="width: 50%; float: right;">
			    	Hostname : <?= $data->hostname ?>
			    </td>
			  </tr>
			</table>

			<table style="width:100%">
				
			 	<tr>
				    <td style="width: 45%">
				    	<br>
				    	<p style="font-weight: 700; font-size: 13px;">LOCATION</p>
				    	<table style="width:100%; background: #000; padding-top: 30px; padding-bottom: 30px;">
				    		<tr>
							    <td style="width: 50%">
							    	<p style="font-size: 12px; color: #fff;">&nbsp;&nbsp;&nbsp;[ ] Level : <?= $data->level ?></p>
							    </td>
							</tr>
							<tr>
							    <td style="width: 50%">
							    	<p style="font-size: 12px; color: #fff;">&nbsp;&nbsp;&nbsp;[ ] Department : <?= $data->model ?></p>
							    </td>
							</tr>
							<tr>
							    <td style="width: 50%">
							    	<p style="font-size: 12px; color: #fff;">&nbsp;&nbsp;&nbsp;[ ] Room Name : <?= $data->location ?></p>
							    </td>
							</tr>
							<tr>
							    <td style="width: 50%">
							    	<p style="font-size: 12px; color: #fff;">&nbsp;&nbsp;&nbsp;[ ] Room ID : <?= $data->model ?></p>
							    </td>
							</tr>
							<br>
				    	</table>
				    </td>	
				    <td style="width: 10%"></td>
				    <td style="width: 45%">
				    	<br>
				    	<p style="font-weight: 700; font-size: 13px;">DEVICE</p>
				    	<table style="width:100%; background: #000; padding-top: 30px; padding-bottom: 30px;">
				    		<tr>
							    <td style="width: 50%">
							    	<p style="font-size: 12px; color: #fff;">&nbsp;&nbsp;&nbsp;[ ] Brand : <?= $data->brand ?></p>
							    </td>
							</tr>
							<tr>
							    <td style="width: 50%">
							    	<p style="font-size: 12px; color: #fff;">&nbsp;&nbsp;&nbsp;[ ] Model : <?= $data->model ?></p>
							    </td>
							</tr>
							<tr>
							    <td style="width: 50%">
							    	<p style="font-size: 12px; color: #fff;">&nbsp;&nbsp;&nbsp;[ ] Serial No : <?= $data->serial_number ?></p>
							    </td>
							</tr>
							<br><br>
				    	</table>
				    </td>
				</tr>

				<tr>
				    <td style="width: 45%">
				    	<br>
				    	<p style="font-weight: 700; font-size: 13px;">NETWORK (<i>for printers only</i>)</p>
				    	<table style="width:100%; background: #000; padding-top: 30px; padding-bottom: 30px;">
				    		<tr>
							    <td style="width: 50%">
							    	<p style="font-size: 12px; color: #fff;">&nbsp;&nbsp;&nbsp;[ ] Local : <?= $data->local ?></p>
							    </td>
							</tr>
							<tr>
							    <td style="width: 50%">
							    	<p style="font-size: 12px; color: #fff;">&nbsp;&nbsp;&nbsp;[ ] Network IP : <?= $data->network_ip ?></p>
							    </td>
							</tr>
							<tr>
							    <td style="width: 50%">
							    	<p style="font-size: 12px; color: #fff;">&nbsp;&nbsp;&nbsp;[ ] Port : <?= $data->port ?></p>
							    </td>
							</tr>
							<br><br>
				    	</table>
				    </td>	
				    <td style="width: 10%"></td>
				    <td style="width: 45%">
				    	<br>
				    	<p style="font-weight: 700; font-size: 13px;">TAGGING</p>
				    	<table style="width:100%; background: #000; padding-top: 30px; padding-bottom: 30px;">
				    		<tr>
							    <td style="width: 50%">
							    	<p style="font-size: 12px; color: #fff;">&nbsp;&nbsp;&nbsp;[ ] Device ID Tag : <?= $data->device_tag ?></p>
							    </td>
							</tr>
							<tr>
							    <td style="width: 50%">
							    	<p style="font-size: 12px; color: #fff;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Need Replacement : 
							    		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							    		<?php 
							    			$need = $data->need_replacement; 
							    			if($need=='Yes'){
							    				echo '[/] Yes [ ] No';
							    			} else {
							    				echo '[ ] Yes [/] No';
							    			}
							    		?> 
							        </p>
							    </td>
							</tr>
							<tr>
							    <td style="width: 50%">
							    	<p style="font-size: 12px; color: #fff;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date Replace : <?= $data->date_replacement ?> </p>
							    </td>
							</tr>
							<tr>
							    <td style="width: 50%">
							    	<p style="font-size: 12px; color: #fff;">&nbsp;&nbsp;&nbsp;PPM Tag : <?= $data->ppm_tag ?> </p>
							    </td>
							</tr>
							<br>
				    	</table>
				    </td>
				</tr>
			</table>




			<br>
			<table style="width:100%">
			  <tr>
			    <th style="width: 100%; background: #000; padding-left: 30px;" colspan="2">
			    	<p style="color: white; font-size: 13px;">SCANNER CHECKLIST</p>
			    </th>
			  </tr>
			</table>


			<br>
			<table style="width:100%">
				<tr>
				  	<td style="width: 90%" class="">
				    	<span class="font_12">


				    		<?php 
							    			$ppm_type = $data->ppm_type; 
							    			if($ppm_type=='Barcode Scanner'){
							    				echo '[/] Barcode Scanner &nbsp;&nbsp; [ ] Flatbed Scanner &nbsp;&nbsp; [ ] Card Reader &nbsp;&nbsp;';
							    			} else if($ppm_type=='Flatbed Scanner'){
							    				echo '[ ] Barcode Scanner &nbsp;&nbsp; [/] Flatbed Scanner &nbsp;&nbsp; [ ] Card Reader &nbsp;&nbsp;';
							    			} else if($ppm_type=='Card Reader'){
							    				echo '[ ] Barcode Scanner &nbsp;&nbsp; [ ] Flatbed Scanner &nbsp;&nbsp; [/] Card Reader &nbsp;&nbsp;';
							    			}else {
							    				echo '[ ] Barcode Scanner &nbsp;&nbsp; [ ] Flatbed Scanner &nbsp;&nbsp; [ ] Card Reader &nbsp;&nbsp;';
							    			}
							    		?> 

				    		
				    	</span>
				    </td>
				    <td style="width: 10%" class="">
				    	<span class="font_12">
				    		
				    	</span>
				    </td>
				</tr>
				<br>
				<tr>
				  	<td style="width: 90%" class="">
				    	<span class="font_12">
				    		1. Cleaning (Clean the dust and dirt by using spray cleaner and cloths)
				    	</span>
				    </td>
				    <td style="width: 10%" class="">
				    	<span class="font_12">

				    	</span>
				    </td>
				</tr>
				<tr>
				  	<td style="width: 90%" class="">
				    	<span class="font_12">
				    		&nbsp;&nbsp;&nbsp; a. Wipe Glass
				    	</span>
				    </td>
				    <td style="width: 10%" class="">
				    	<span class="font_12">
				    		<?= $data->checklist_1 ?>
				    	</span>
				    </td>
				</tr>
				<tr>
				  	<td style="width: 90%" class="">
				    	<span class="font_12">
				    		&nbsp;&nbsp;&nbsp; b. Scanning Trip
				    	</span>
				    </td>
				    <td style="width: 10%" class="">
				    	<span class="font_12">
				    		<?= $data->checklist_2 ?>
				    	</span>
				    </td>
				</tr>
				<tr>
				  	<td style="width: 90%" class="">
				    	<span class="font_12">
				    		&nbsp;&nbsp;&nbsp; c. Automatic Document Feeder (ADF) Duplex
				    	</span>
				    </td>
				    <td style="width: 10%" class="">
				    	<span class="font_12">
				    		<?= $data->checklist_3 ?>
				    	</span>
				    </td>
				</tr>
				<tr>
				  	<td style="width: 90%" class="">
				    	<span class="font_12">
				    		2. Check Cable Tidiness (Make sure the tidiness of cables)
				    	</span>
				    </td>
				    <td style="width: 10%" class="">
				    	<span class="font_12">
				    		<?= $data->checklist_4 ?>
				    	</span>
				    </td>
				</tr>
				<tr>
				  	<td style="width: 90%" class="">
				    	<span class="font_12">
				    		3. Check LED Signal Functioning
				    	</span>
				    </td>
				    <td style="width: 10%" class="">
				    	<span class="font_12">
				    		<?= $data->checklist_5 ?>
				    	</span>
				    </td>
				</tr>
				<tr>
				  	<td style="width: 90%" class="">
				    	<span class="font_12">
				    		4. Perform Device Test
				    	</span>
				    </td>
				    <td style="width: 10%" class="">
				    	<span class="font_12">
				    		<?= $data->checklist_6 ?>
				    	</span>
				    </td>
				</tr>
			</table>


			<br><br>
			<table style="width:100%" border="1">
			  <tr>
			    <th style="width: 100%; background: #000; padding-left: 30px;">
			    	<p style="color: white; font-size: 13px;">E. REMARK</p>
			    </th>
			  </tr>
			  <tr>
			  	<td style="padding-left: 30px;">
			  		<p style="font-size: 12px;"><?= $data->comment; ?></p>
			  	</td>
			  </tr>
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