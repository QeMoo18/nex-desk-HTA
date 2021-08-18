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
						<td style="width: 100;" class="small"><img src="<?= base_url()?>Prohawk_Logo.png" style="width: 220px;"><br> <h4><b>SERVER & STORAGE </b> </h4>  <p>Update and verify inventory by checking and ticking boxes below</p></td>
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

			<p class="font_12">
				<b>PPM :</b> 

				<?php 

					$q = $data->quarter;


					if($q=='Q1'){

						echo '
								[/] Q1 
								[ ] Q2
								[ ] Q3
								[ ] Q4
							 ';

					} else if($q=='Q2'){

						echo '
								[ ] Q1 
								[/] Q2
								[ ] Q3
								[ ] Q4
							 ';

					} else if($q=='Q3'){

						echo '
								[ ] Q1 
								[ ] Q2
								[/] Q3
								[ ] Q4
							 ';

					} else if($q=='Q4'){

						echo '
								[ ] Q1 
								[ ] Q2
								[ ] Q3
								[/] Q4
							 ';


					} else {

						echo '
								[ ] Q1 
								[ ] Q2
								[ ] Q3
								[ ] Q4
							 ';

					}

				?>

				


				&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;
				<b>TYPE :</b>

				<?php 

					$type_device = $data->ppm_device;


					if($type_device=='Server(Physical)'){

						echo '
								[/] Physical 
								[ ] Virtual
								[ ] Storage
							 ';

					} else if($type_device=='Server(Virtual)'){

						echo '
								[ ] Physical 
								[/] Virtual
								[ ] Storage
							 ';

					} else if($type_device=='Storage'){

						echo '
								[ ] Physical 
								[ ] Virtual
								[/] Storage
							 ';

					} else {

						echo '
								[ ] Physical 
								[ ] Virtual
								[ ] Storage
							 ';

					} 
 
				?>

				
			</p>





			<table style="width:100%">
			  <tr>
			    <td style="width: 50%">
			    	<p style="font-size: 12px;">Location : <?= $data->location ?></p>
			    	
			    	<p style="font-size: 12px;">Model : <?= $data->cpu_model ?></p>
			    
			    	<p style="font-size: 12px;">Manufacturer : <?= $data->manufacturer ?></p>
			    
			    	<p style="font-size: 12px;">Device Serial Number : <?= $data->cpu_serial_number ?></p>
			    </td>	
			    <td style="width: 50%">
			    	<p style="font-size: 12px;">Hostname : <?= $data->hostname ?></p>
			    
			    	<p style="font-size: 12px;">Operating System (OS): : <?= $data->os ?></p>
			    
			    	<p style="font-size: 12px;">IP Address (LAN) : <?= $data->network_ip ?></p>
			    
			    	<p style="font-size: 12px;">MAC Address : <?= $data->mac_address ?></p>
			    


			    </td>
			  </tr>
			</table>



			<br>
			<table style="width:100%">
			  <tr>
			    <th style="width: 45%; background: #000; padding-left: 30px;">
			    	<p style="color: white; font-size: 13px;">A. PHYSICAL CHECK</p>
			    </th>
			    <th style="width: 10%">
			    	
			    </th>
			    <th style="width: 45%; background: #000; padding-left: 30px;">
			    	<p style="color: white; font-size: 13px;">B.SETTING & CONFIGURATION</p>
			    </th>
			  </tr>
			  <tr>
			  	<td>
			  		<table style="width:100%">
					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		<br>
					    		1.
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		Check connection (Data cable and power connection)
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<br>
					    		<?= $data->physical_1 ?>
					    	</span>
					    </td>
					  </tr>
					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		2.
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		Check the power sources(Plugged into protected outlets)
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->physical_2 ?>
					    	</span>
					    </td>
					  </tr>
					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		3.
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		Check the fan (CPU's cooling fan is working & the airflow isn't impede by dust)
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->physical_3 ?>
					    	</span>
					    </td>
					  </tr>


					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		<br>
					    		4.
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		Check LED signal function
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		
					    	</span>
					    </td>
					  </tr>

					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		a. <i class="font_10">(Make sure LED signal for Hard Disk is functioning</i>
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->physical_4 ?>
					    	</span>
					    </td>
					  </tr>
					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		b. <i class="font_10">Make sure LED signal for Monitor is functioning</i>
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->physical_5 ?>
					    	</span>
					    </td>
					  </tr>
					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		c. <i class="font_10">Make sure LED signal for Network is functioning</i>
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->physical_6 ?>
					    	</span>
					    </td>
					  </tr>


					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		5.
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		Check UPS (Make sure UPS is connected properly and functioning)
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->physical_7 ?>
					    	</span>
					    </td>
					  </tr>


					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		6.
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		Update and verify inventory (Check and verify serial number)
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->physical_8 ?>
					    	</span>
					    </td>
					  </tr>



					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		<br>
					    		7.
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		Check and verify CPU (CPU speed : <u style="padding-left: 10px; padding-right: 10px;"><?= $data->cpu_speed ?></u> GHz)
					    		<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(CPU Core : <u style="padding-left: 10px; padding-right: 10px;"><?= $data->cpu_core?></u>)
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<br>
					    		<?= $data->physical_9 ?>
					    	</span>
					    </td>
					  </tr>


					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		<br>
					    		8. 
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		Check and verify physical memory (Capacity : <u style="padding-left: 10px; padding-right: 10px;"><?= $data->capacity ?></u> GB)
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<br>
					    		<?= $data->physical_27 ?>
					    	</span>
					    </td>
					  </tr>



					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		<br>
					    		9.
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		Check Disk Space Available
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		
					    	</span>
					    </td>
					  </tr>

					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_10">
					    		<br>
					    		a. hard drive space : C <i>(<?= $data->physical_10 ?> GB , Free Space : <?= $data->physical_11 ?>)</i>
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->physical_12 ?>
					    	</span>
					    </td>
					  </tr>


					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_10">
					    		<br>
					    		b. hard drive space : D <i>(<?= $data->physical_13 ?> GB , Free Space : <?= $data->physical_14 ?>)</i>
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->physical_15 ?>
					    	</span>
					    </td>
					  </tr>




					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_10">
					    		<br>
					    		b. hard drive space : E <i>(<?= $data->physical_16 ?> GB , Free Space : <?= $data->physical_17 ?>)</i>
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->physical_18 ?>
					    	</span>
					    </td>
					  </tr>


					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		<br>
					    		11.
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		Check tape library functionality (SN: <u><?= $data->sn_kvm ?></u>)
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->physical_19 ?>
					    	</span>
					    </td>
					  </tr>


					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		<br>
					    		12.
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		Check tape library functionality (SN: <u><?= $data->sn_tape  ?></u>)
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->physical_20 ?>
					    	</span>
					    </td>
					  </tr>


					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_10">
					    		<br>
					    		a. Total Disks : <u> <?= $data->physical_21 ?> </u> , Available Disks : <u> <?= $data->physical_22 ?> </u>
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->physical_23 ?>
					    	</span>
					    </td>
					  </tr>

					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_10">
					    		<br>
					    		b. Total Disks : <u> <?= $data->physical_24 ?> </u> , Available Disks : <u> <?= $data->physical_25 ?> </u>
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->physical_26 ?>
					    	</span>
					    </td>
					  </tr>

					</table>
			  	</td>
			  	<td></td>
			  	<td>
			  		<table>
					  	<tr>
						  	<td style="width: 5%" class="">
						    	<span class="font_12">
						    		<br>
						    		1.
						    	</span>
						    </td>
						    <td style="width: 85%">
						    	<span class="font_12">
						    		<br>
						    		Run ScanDisk on system drive
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<br>
						    		<?= $data->setting_1 ?>
						    	</span>
						    </td>
					  	</tr>
					  	<tr>
						  	<td style="width: 5%" class="">
						    	<span class="font_12">
						    		<br>
						    		2.
						    	</span>
						    </td>
						    <td style="width: 85%">
						    	<span class="font_12">
						    		<br>
						    		Run Disk Defragmentation (applicable to all drive)
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<br>
						    		<?= $data->setting_2 ?>
						    	</span>
						    </td>
					  	</tr>
					  	<tr>
						  	<td style="width: 5%" class="">
						    	<span class="font_12">
						    		<br>
						    		3.
						    	</span>
						    </td>
						    <td style="width: 85%">
						    	<span class="font_12">
						    		<br>
						    		Check and install driver updates
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<br>
						    		<?= $data->setting_3 ?>
						    	</span>
						    </td>
					  	</tr>
					  	<tr>
						  	<td style="width: 5%" class="">
						    	<span class="font_12">
						    		<br>
						    		4.
						    	</span>
						    </td>
						    <td style="width: 85%">
						    	<span class="font_12">
						    		<br>
						    		Check and update service pack
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    	</span>
						    </td>
					  	</tr>
					  	<tr>
						  	<td style="width: 5%" class="">
						    	<span class="font_12">
						    		<br>
						    	</span>
						    </td>
						    <td style="width: 85%">
						    	<span class="font_12">
						    		<br>
						    		(Service Pack : <?= $data->service_pack ?> )
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<br>
						    		<?= $data->setting_4 ?>
						    	</span>
						    </td>
					  	</tr>

					  	<tr>
						  	<td style="width: 5%" class="">
						    	<span class="font_12">
						    		<br>
						    		5.
						    	</span>
						    </td>
						    <td style="width: 85%">
						    	<span class="font_12">
						    		<br>
						    		 Check and record average CPU utilization dated for one month
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<br>
						    	</span>
						    </td>
					  	</tr>
					  	<tr>
						  	<td style="width: 5%" class="">
						    	<span class="font_12">
						    		<br>
						    	</span>
						    </td>
						    <td style="width: 85%">
						    	<span class="font_12">
						    		<br>
						    		 a. (CPU Utilization:- Min <?= $data->setting_5 ?>)

						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<br>
						    		<?= $data->setting_6 ?>
						    	</span>
						    </td>
					  	</tr>
					  	<tr>
						  	<td style="width: 5%" class="">
						    	<span class="font_12">
						    		<br>
						    	</span>
						    </td>
						    <td style="width: 85%">
						    	<span class="font_12">
						    		<br>
						    		 b. (CPU Utilization:- Max <?= $data->setting_7 ?>)
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<br>
						    		<?= $data->setting_8 ?>
						    	</span>
						    </td>
					  	</tr>
					  	<tr>
						  	<td style="width: 5%" class="">
						    	<span class="font_12">
						    		<br>
						    	</span>
						    </td>
						    <td style="width: 85%">
						    	<span class="font_12">
						    		<br>
						    		 c. (CPU Utilization:- Avg <?= $data->setting_9 ?>)
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<br>
						    		<?= $data->setting_10 ?>
						    	</span>
						    </td>
					  	</tr>



					  	<tr>
						  	<td style="width: 5%" class="">
						    	<span class="font_12">
						    		<br>
						    		6.
						    	</span>
						    </td>
						    <td style="width: 85%">
						    	<span class="font_12">
						    		<br>
						    		 Check and record average Memory utilization dated for one month
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<br>
						    	</span>
						    </td>
					  	</tr>
					  	<tr>
						  	<td style="width: 5%" class="">
						    	<span class="font_12">
						    		<br>
						    	</span>
						    </td>
						    <td style="width: 85%">
						    	<span class="font_12">
						    		<br>
						    		 a. (Memory Utilization:- Min <?= $data->setting_18 ?>) 
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<br>
						    		<?= $data->setting_19 ?>
						    	</span>
						    </td>
					  	</tr>
					  	<tr>
						  	<td style="width: 5%" class="">
						    	<span class="font_12">
						    		<br>
						    	</span>
						    </td>
						    <td style="width: 85%">
						    	<span class="font_12">
						    		<br>
						    		 b. (Memory Utilization:- Max <?= $data->setting_20 ?>) 
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<br>
						    		<?= $data->setting_21 ?>
						    	</span>
						    </td>
					  	</tr>
					  	<tr>
						  	<td style="width: 5%" class="">
						    	<span class="font_12">
						    		<br>
						    	</span>
						    </td>
						    <td style="width: 85%">
						    	<span class="font_12">
						    		<br>
						    		 c. (Memory Utilization:- Avg <?= $data->setting_22 ?>) 
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<br>
						    		<?= $data->setting_23 ?>
						    	</span>
						    </td>
					  	</tr>


					  	<tr>
						  	<td style="width: 5%" class="">
						    	<span class="font_12">
						    		<br>
						    		7.
						    	</span>
						    </td>
						    <td style="width: 85%">
						    	<span class="font_12">
						    		<br>
						    		 Check and Install latest Hotfix if needed  
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<br>
						    		<?= $data->setting_11 ?>
						    	</span>
						    </td>
					  	</tr>


					  	<tr>
						  	<td style="width: 5%" class="">
						    	<span class="font_12">
						    		<br>
						    		8.
						    	</span>
						    </td>
						    <td style="width: 85%">
						    	<span class="font_12">
						    		<br>
						    		 Check and record software or applications (data applicable for live server)
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<br>
						    	</span>
						    </td>
					  	</tr>
					  	<tr>
						  	<td style="width: 5%" class="">
						    	<span class="font_12">
						    		<br>
						    	</span>
						    </td>
						    <td style="width: 85%">
						    	<span class="font_12">
						    		<br>
						    		 a. Application : <u><?= $data->setting_12 ?></u>
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<br>
						    		<?= $data->setting_13 ?>
						    	</span>
						    </td>
					  	</tr>
					  	<tr>
						  	<td style="width: 5%" class="">
						    	<span class="font_12">
						    		<br>
						    	</span>
						    </td>
						    <td style="width: 85%">
						    	<span class="font_12">
						    		<br>
						    		 b. Application : <u><?= $data->setting_14 ?></u>
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<br>
						    		<?= $data->setting_15 ?>
						    	</span>
						    </td>
					  	</tr>
					  	<tr>
						  	<td style="width: 5%" class="">
						    	<span class="font_12">
						    		<br>
						    	</span>
						    </td>
						    <td style="width: 85%">
						    	<span class="font_12">
						    		<br>
						    		 c. Application : <u><?= $data->setting_16 ?></u>
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<br>
						    		<?= $data->setting_17 ?>
						    	</span>
						    </td>
					  	</tr>


					</table>
			  	</td>
			  </tr>
			</table>



			<br><br>
			<table style="width:100%">
			  <tr>
			    <th style="width: 45%; background: #000; padding-left: 30px;">
			    	<p style="color: white; font-size: 13px;">C. HOUSEKEEPING</p>
			    </th>
			    <th style="width: 10%">
			    	
			    </th>
			    <th style="width: 45%; background: #000; padding-left: 30px;">
			    	<p style="color: white; font-size: 13px;">D. SECURITY</p>
			    </th>
			  </tr>
			  <tr>
			  	<td>
			  		<table style="width:100%">
					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		<br>
					    		1.
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		Clean other physical peripheral devices if there is any:-
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<br>
					    	</span>
					    </td>
					  </tr>
					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		<br>
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		a.Monitor
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<br>
					    		<?= $data->house_keeping_1 ?>
					    	</span>
					    </td>
					  </tr>
					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		<br>
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		b.CPU
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<br>
					    		<?= $data->house_keeping_2 ?>
					    	</span>
					    </td>
					  </tr>
					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		<br>
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		c.Keyboard 
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<br>
					    		<?= $data->house_keeping_3 ?>
					    	</span>
					    </td>
					  </tr>
					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		<br>
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		d.Mouse 
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<br>
					    		<?= $data->house_keeping_8 ?>
					    	</span>
					    </td>
					  </tr>
					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		<br>
					    		2.
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		Delete .tmp files 
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<br>
					    		<?= $data->house_keeping_4 ?>
					    	</span>
					    </td>
					  </tr>
					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		<br>
					    		2.
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		Delete and clean unused temporary Internet files 
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<br>
					    		<?= $data->house_keeping_5 ?>
					    	</span>
					    </td>
					  </tr>
					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		<br>
					    		3.
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		Empty the Recycle Bin
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<br>
					    		<?= $data->house_keeping_6 ?>
					    	</span>
					    </td>
					  </tr>
					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		<br>
					    		4.
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		Device ID Tagging
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<br>
					    		<?= $data->house_keeping_7 ?>
					    	</span>
					    </td>
					  </tr>
					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		a. Need Replacement
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<br>
					    		<?= $data->need_replacement_houskeeping ?>
					    	</span>
					    </td>
					  </tr>
					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		<br>
					    		6.
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		PPM Tag
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<br>
					    		<?= $data->house_keeping_9 ?>
					    	</span>
					    </td>
					  </tr>
					</table>
			  	</td>
			  	<td></td>
			  	<td>
			  		<table style="width:100%">
					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		<br>
					    		1.
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		Change password (twice a year)
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<br>
					    		<?= $data->security_1; ?>
					    	</span>
					    </td>
					  </tr>

					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		<br>
					    		2.
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		 List of username:-
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					  </tr>

					  <tr>
					  	<td style="width: 5%;" class="">
					    	<span class="font_12" style="">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		a. (Username : <?= $data->security_2; ?> , Role : <?= $data->security_3; ?>)
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<br>
					    		<?= $data->security_4; ?>
					    	</span>
					    </td>
					  </tr>
					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		b.(Username : <?= $data->security_5; ?> , Role : <?= $data->security_6; ?>)
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<br>
					    		<?= $data->security_7; ?>
					    	</span>
					    </td>
					  </tr>


					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		<br>
					    		3.
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		Check for backup job (Backup is successfully performed) :
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<br>
					    		<?= $data->security_8; ?>
					    	</span>
					    </td>
					  </tr>



					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		<br>
					    		4.
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		Antivirus (Symantec Endpoint Protection) :-
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					  </tr>


					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		a.Check the latest antivirus software definition <br>
					    		(Version : <?= $data->security_9; ?> , Date : <?= $data->security_10; ?>)
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<br>
					    		<?= $data->security_11; ?>
					    	</span>
					    </td>
					  </tr>


					  <tr>
					  	<td style="width: 5%" class="">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    		b.Perform full antivirus scanning
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<br>
					    		<?= $data->security_12; ?>
					    	</span>
					    </td>
					  </tr>

					</table>
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
			  <!-- <tr>
			  	<td style="padding-left: 30px;">
			  		<p style="font-size: 12px;"><?= $data->comment; ?></p>
			  	</td>
			  </tr> -->
			</table>

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
											<td style="width: 200px; padding-top: 5px; padding-bottom: 5px; padding-left: 10px;" class="small"><p style="color: #fff; font-weight: 900; font-size: 12px;">VERIFIED BY</p> </td>

											<td style="width: 250px; padding-top: 5px; padding-bottom: 5px; padding-left: 30px;" class="small">
												<?php if($data->status=='Rejected'){ ?>
												<p style="color: #fff; font-weight: 900; font-size: 12px;">REJECTED BY</p>
												<?php } else { ?>
												<p style="color: #fff; font-weight: 900; font-size: 12px;">ENDORSED BY</p>
												<?php } ?>
											</td>
										</tr>
										<tr>
											<td style="width: 250px; padding-left: 10px; padding-right: 10px;">
												<p style="font-size: 12px;">
													<?= $data->responsible ?>
													<br>
													<!-- <?= date('m/d/Y',strtotime($data->created_date)) ?> -->
													<?= substr($data->created_date,0,-8) ?>
												</p>
											</td>
											<td style="width: 200px; padding-left: 10px; padding-right: 10px;">
												<p style="font-size: 12px;">
													<?= $data->acknowledge ?>
													<br>
													<!-- <?= date('m/d/Y',strtotime($data->created_date)) ?> -->
													<?= substr($data->date_acknowledge,0,-8) ?>
												</p>
											</td>
											<td style="width: 250px; padding-left: 10px; padding-right: 10px;">
												<p style="font-size: 12px;">
													
													<!-- <?php if($data->status=='Done'){ ?>
															<?= $data->endorse ?>
															<br>
															<?= $data->date_endorse ?>
													<?php } else if($data->status=='Rejected'){ ?>
															<?= $data->endorse ?>
															<br>
															<?= $data->date_reject ?>

													<?Php } else { ?>
														Not Yet
													<?php } ?> -->


													<?php if(!empty($data->endorse)){ ?>
													<?= $data->endorse ?>
													<br>
													<!-- <?= date('m/d/Y',strtotime($data->date_endorse)) ?> -->

													<?php 
														echo substr($data->date_endorsed,0,-8);
													?>

													<?php } else { ?>
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

	/* Customize the label (the container) */
	.container {
	  display: block;
	  position: relative;
	  padding-left: 35px;
	  margin-bottom: 12px;
	  cursor: pointer;
	  font-size: 22px;
	  -webkit-user-select: none;
	  -moz-user-select: none;
	  -ms-user-select: none;
	  user-select: none;
	}

	/* Hide the browser's default checkbox */
	.container input {
	  position: absolute;
	  opacity: 0;
	  cursor: pointer;
	  height: 0;
	  width: 0;
	}

	/* Create a custom checkbox */
	.checkmark {
	  position: absolute;
	  top: 0;
	  left: 0;
	  height: 25px;
	  width: 25px;
	  background-color: #eee;
	}

	/* On mouse-over, add a grey background color */
	.container:hover input ~ .checkmark {
	  background-color: #ccc;
	}

	/* When the checkbox is checked, add a blue background */
	.container input:checked ~ .checkmark {
	  background-color: #2196F3;
	}

	/* Create the checkmark/indicator (hidden when not checked) */
	.checkmark:after {
	  content: "";
	  position: absolute;
	  display: none;
	}

	/* Show the checkmark when checked */
	.container input:checked ~ .checkmark:after {
	  display: block;
	}

	/* Style the checkmark/indicator */
	.container .checkmark:after {
	  left: 9px;
	  top: 5px;
	  width: 5px;
	  height: 10px;
	  border: solid white;
	  border-width: 0 3px 3px 0;
	  -webkit-transform: rotate(45deg);
	  -ms-transform: rotate(45deg);
	  transform: rotate(45deg);
	}
</style>