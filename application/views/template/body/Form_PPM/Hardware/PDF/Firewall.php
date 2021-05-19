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
						<td style="width: 100;" class="small"><img src="<?= base_url()?>Prohawk_Logo.png" style="width: 220px;"><br> <h4><b>NETWORK </b> </h4>  <p>Update and verify inventory by checking and ticking boxes below</p></td>
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

				


				<br>
				<b>TYPE :</b>

				<?php 

					$type_device = $data->ppm_device;


					if($type_device=='Switch'){

						echo '
								[/] Switch 
								[ ] UPS
								[ ] Firewall
								[ ] Load Balancer
								[ ] APs/Controller
							 ';

					} else if($type_device=='UPS'){

						echo '
								[ ] Switch 
								[/] UPS
								[ ] Firewall
								[ ] Load Balancer
								[ ] APs/Controller
							 ';

					} else if($type_device=='Firewall'){

						echo '
								[ ] Switch 
								[ ] UPS
								[/] Firewall
								[ ] Load Balancer
								[ ] APs/Controller
							 ';

					} else if($type_device=='Load Balance'){

						echo '
								[ ] Switch 
								[ ] UPS
								[ ] Firewall
								[/] Load Balancer
								[ ] APs/Controller
							 ';

					} else if(($type_device=='Access Point')||($type_device=='Controller')){

						echo '
								[ ] Switch 
								[ ] UPS
								[ ] Firewall
								[ ] Load Balancer
								[/] APs/Controller
							 ';

					} else {

						echo '
								[ ] Switch 
								[ ] UPS
								[ ] Firewall
								[ ] Load Balancer
								[ ] APs/Controller
							 ';

					}
 
				?>

				
			</p>





			<table style="width:100%">
			  <tr>
			    <td style="width: 50%">
			    	<p style="font-size: 12px;">Location : <?= $data->location ?></p>
			    	
			    	<p style="font-size: 12px;">Model : <?= $data->model ?></p>
			    
			    	<p style="font-size: 12px;">Manufacture : <?= $data->manufacture ?></p>
			    
			    	<p style="font-size: 12px;">Serial Number : <?= $data->serial_number ?></p>
			    </td>	
			    <td style="width: 50%">
			    	<p style="font-size: 12px;">Hostname : <?= $data->hostname ?></p>
			    
			    	<p style="font-size: 12px;">Firmware Version : <?= $data->firmware ?></p>
			    
			    	<p style="font-size: 12px;">IP Address : <?= $data->ip ?></p>
			    
			    	<p style="font-size: 12px;">Mac Address : <?= $data->mac_address ?></p>
			    


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
					    		1.Cleaning
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    	</span>
					    </td>
					  </tr>
					  
					  <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		&nbsp;&nbsp;&nbsp;
					    		a. Room
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->physical_1 ?>
					    	</span>
					    </td>
					  </tr>
					  <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		&nbsp;&nbsp;&nbsp;
					    		b. Rack
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->physical_2 ?>
					    	</span>
					    </td>
					  </tr>
					  <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		&nbsp;&nbsp;&nbsp;
					    		c. Equipment
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		
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
					    		2.Cable
					    	</span>
					    </td>
					    <td style="width: 85%">
					    	<span class="font_12">
					    		<br>
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    	</span>
					    </td>
					  </tr>
					  
					  <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		&nbsp;&nbsp;&nbsp;
					    		a. Tidiness
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->physical_4 ?>
					    	</span>
					    </td>
					  </tr>
					  <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		&nbsp;&nbsp;&nbsp;
					    		b. Labelling
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->physical_5 ?>
					    	</span>
					    </td>
					  </tr>



					  <tr>
					  	<td style="width: 25%" class="">
					    	<span class="font_12">
					    		3. Fan Condition
					    	</span>
					    </td>
					    <td style="width: 65%">
					    	<span class="font_12">
					    		<br>
					    		<i class="font_10"></i>
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->physical_6 ?>
					    	</span>
					    </td>
					  </tr>




					  <tr>
					  	<td style="width: 25%" class="">
					    	<span class="font_12">
					    		4. Check all LEDs and Port
					    	</span>
					    </td>
					    <td style="width: 65%">
					    	<span class="font_12">
					    		<br>
					    		<i class="font_10"></i>
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->physical_7 ?>
					    	</span>
					    </td>
					  </tr>




					  <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		5. Room Temperatur (Aircond)
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		<i class="font_10"></i>
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    	</span>
					    </td>
					  </tr>
					  <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		&nbsp;&nbsp;&nbsp;
					    		a. Temperature (<?= $data->temperature ?>)
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->physical_8 ?>
					    	</span>
					    </td>
					  </tr>




					  <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		6. Check UPS (Make sure UPS is connected properly and functioning)
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		<i class="font_10"></i>
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->physical_9 ?>
					    	</span>
					    </td>
					  </tr>





					  <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		7. PPM Tag
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		<i class="font_10"></i>
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->physical_10 ?>
					    	</span>
					    </td>
					  </tr>



					  <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		8. Device Tag
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		<i class="font_10"></i>
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->physical_11 ?>
					    	</span>
					    </td>
					  </tr>



					  <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		9. Power Over Ethernet
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		<i class="font_10"></i>
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->physical_12 ?>
					    	</span>
					    </td>
					  </tr>


					  <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		10. Free Port (<?= $data->port ?>)
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		<i class="font_10"></i>
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->physical_13 ?>
					    	</span>
					    </td>
					  </tr>

					</table>
				</td>
				<td></td>
				<td>
			  		<table style="width:100%">
					  <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		1. Disable Unused Port
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		<i class="font_10"></i>
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->setting_1 ?>
					    	</span>
					    </td>
					  </tr>


					  <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		2. Memory Utilization
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		<i class="font_10"></i>
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    	</span>
					    </td>
					  </tr>
					  <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		&nbsp;&nbsp;&nbsp;
					    		a. (Memory Utilization : <?= $data->memory ?>)
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->setting_2 ?>
					    	</span>
					    </td>
					  </tr>




					  <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		3. CPU Utilization
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		<i class="font_10"></i>
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    	</span>
					    </td>
					  </tr>
					  <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		&nbsp;&nbsp;&nbsp;
					    		a. (CPU Utilization : <?= $data->cpu ?>)
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->setting_3 ?>
					    	</span>
					    </td>
					  </tr>



					  <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		4. Backup Configuration
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		<i class="font_10"></i>
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->setting_4 ?>
					    	</span>
					    </td>
					  </tr>


					  <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		5. Check VLAN SNMP (String)
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		<i class="font_10"></i>
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    	</span>
					    </td>
					  </tr>
					  <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		&nbsp;&nbsp;&nbsp;
					    		a. (SNMP String : <?= $data->snmp_string ?>)
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->setting_5 ?>
					    	</span>
					    </td>
					  </tr>



					  <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		6. Check VLAN
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		<i class="font_10"></i>
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->setting_6 ?>
					    	</span>
					    </td>
					  </tr>



					  <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		7. HA Status
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		<i class="font_10"></i>
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    	</span>
					    </td>
					  </tr>
					  <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		&nbsp;&nbsp;&nbsp;
					    		a. Online
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->setting_8 ?>
					    	</span>
					    </td>
					  </tr>
					  <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		&nbsp;&nbsp;&nbsp;
					    		b. Standby
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->setting_9 ?>
					    	</span>
					    </td>
					  </tr>


					  <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		8. Change Password 
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		<i class="font_10"></i>
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->setting_10 ?>
					    	</span>
					    </td>
					  </tr>

					</table>
				</td>

			  </tr>
			</table>


			<br>
			<table style="width:100%">
			  <tr>
			    <th style="width: 100%; background: #000; padding-left: 30px;" colspan="2">
			    	<p style="color: white; font-size: 13px;">C.FIREWALL</p>
			    </th>
			  </tr>
			  
			</table>


			<table style="width:100%">
			 <tr>
			    <th style="width: 45%; background: #fff; padding-left: 30px;">
			    	<p style="color: white; font-size: 13px;">asdasdad</p>
			    </th>
			    <th style="width: 10%">
			    	
			    </th>
			    <th style="width: 45%; background: #fff; padding-left: 30px;">
			    	<p style="color: white; font-size: 13px;">asdadadad</p>
			    </th>
			</tr>

			<tr>
				<td>
			  		<table style="width:100%">
						 <tr>
						  	<td style="width: 5%" class="">
						    	<span class="font_12">
						    		1. Able to manage firewall through 
						    	</span>
						    </td>
						    <td style="width: 85%">
						    	<span class="font_12">
						    		<br>
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    	</span>
						    </td>
						</tr>
						  
						<tr>
						  	<td style="width: 80%" class="">
						    	<span class="font_12">
						    		&nbsp;&nbsp;&nbsp;
						    		a. (Unit management IP : <?= $data->unit_management_ip ?>)
						    	</span>
						    </td>
						    <td style="width: 10%">
						    	<span class="font_12">
						    		<br>
						    		
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<?= $data->firewall_1 ?>
						    	</span>
						    </td>
						</tr>



						<tr>
						  	<td style="width: 80%" class="">
						    	<span class="font_12">
						    		2. Able to manage unit through console port
						    	</span>
						    </td>
						    <td style="width: 10%">
						    	<span class="font_12">
						    		<br>
						    		<i class="font_10"></i>
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<?= $data->firewall_2 ?>
						    	</span>
						    </td>
						</tr>



						<tr>
						  	<td style="width: 5%" class="">
						    	<span class="font_12">
						    		3. Connection Usage
						    	</span>
						    </td>
						    <td style="width: 85%">
						    	<span class="font_12">
						    		<br>
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    	</span>
						    </td>
						</tr>
						  
						<tr>
						  	<td style="width: 80%" class="">
						    	<span class="font_12">
						    		&nbsp;&nbsp;&nbsp;
						    		a. (Percentage : <?= $data->percentage_connection ?>)
						    	</span>
						    </td>
						    <td style="width: 10%">
						    	<span class="font_12">
						    		<br>
						    		
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<?= $data->firewall_3 ?>
						    	</span>
						    </td>
						</tr>



						<tr>
						  	<td style="width: 5%" class="">
						    	<span class="font_12">
						    		4. System Usage
						    	</span>
						    </td>
						    <td style="width: 85%">
						    	<span class="font_12">
						    		<br>
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    	</span>
						    </td>
						</tr>
						  
						<tr>
						  	<td style="width: 80%" class="">
						    	<span class="font_12">
						    		&nbsp;&nbsp;&nbsp;
						    		a. (System uptime : <?= $data->system_uptime ?>)
						    	</span>
						    </td>
						    <td style="width: 10%">
						    	<span class="font_12">
						    		<br>
						    		
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<?= $data->firewall_4 ?>
						    	</span>
						    </td>
						</tr>



						<tr>
						  	<td style="width: 5%" class="">
						    	<span class="font_12">
						    		5. Check SNMP (String)
						    	</span>
						    </td>
						    <td style="width: 85%">
						    	<span class="font_12">
						    		<br>
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    	</span>
						    </td>
						</tr>
						  
						<tr>
						  	<td style="width: 80%" class="">
						    	<span class="font_12">
						    		&nbsp;&nbsp;&nbsp;
						    		a. (SNMP String : <?= $data->snmp_string_firewall ?>)
						    	</span>
						    </td>
						    <td style="width: 10%">
						    	<span class="font_12">
						    		<br>
						    		
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<?= $data->firewall_5 ?>
						    	</span>
						    </td>
						</tr>



						<tr>
						  	<td style="width: 5%" class="">
						    	<span class="font_12">
						    		6. VPN Status
						    	</span>
						    </td>
						    <td style="width: 85%">
						    	<span class="font_12">
						    		<br>
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    	</span>
						    </td>
						</tr>
						  
						<tr>
						  	<td style="width: 80%" class="">
						    	<span class="font_12">
						    		&nbsp;&nbsp;&nbsp;
						    		a. (Unique Firewall Identifier : <?= $data->unique_firewall ?>)
						    	</span>
						    </td>
						    <td style="width: 10%">
						    	<span class="font_12">
						    		<br>
						    		
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<?= $data->firewall_6 ?>
						    	</span>
						    </td>
						</tr>




						<tr>
						  	<td style="width: 5%" class="">
						    	<span class="font_12">
						    		7. Connection 
						    	</span>
						    </td>
						    <td style="width: 85%">
						    	<span class="font_12">
						    		<br>
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    	</span>
						    </td>
						</tr>
						  
						<tr>
						  	<td style="width: 80%" class="">
						    	<span class="font_12">
						    		&nbsp;&nbsp;&nbsp;
						    		a. (Peak : <?= $data->firewall_24 ?>)
						    	</span>
						    </td>
						    <td style="width: 10%">
						    	<span class="font_12">
						    		<br>
						    		
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<?= $data->firewall_7 ?>
						    	</span>
						    </td>
						</tr>


						<tr>
						  	<td style="width: 80%" class="">
						    	<span class="font_12">
						    		&nbsp;&nbsp;&nbsp;
						    		b. (Current : <?= $data->firewall_9 ?>)
						    	</span>
						    </td>
						    <td style="width: 10%">
						    	<span class="font_12">
						    		<br>
						    		
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<?= $data->firewall_25 ?>
						    	</span>
						    </td>
						</tr>


						<tr>
						  	<td style="width: 80%" class="">
						    	<span class="font_12">
						    		&nbsp;&nbsp;&nbsp;
						    		c. (Max : <?= $data->firewall_10 ?>)
						    	</span>
						    </td>
						    <td style="width: 10%">
						    	<span class="font_12">
						    		<br>
						    		
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<?= $data->firewall_26 ?>
						    	</span>
						    </td>
						</tr>
					</table>
				</td>
				<td>

				</td>
				<td>
			  		<table style="width:100%">
					  <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		8. Security service (Licensing)
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		<i class="font_10"></i>
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    	</span>
					    </td>
					  </tr>



					  <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		&nbsp;&nbsp;&nbsp;
					    		a. Nodes / Users
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->firewall_11 ?>
					    	</span>
					    </td>
					 </tr>


					 <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		&nbsp;&nbsp;&nbsp;
					    		b. SSL VPN Nodes / Users
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->firewall_12 ?>
					    	</span>
					    </td>
					 </tr>


					 <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		&nbsp;&nbsp;&nbsp;
					    		c. VPN
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->firewall_13 ?>
					    	</span>
					    </td>
					 </tr>


					 <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		&nbsp;&nbsp;&nbsp;
					    		d. Global VPN Client
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->firewall_14 ?>
					    	</span>
					    </td>
					 </tr>



					 <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		&nbsp;&nbsp;&nbsp;
					    		e. CFS (Content Filter)
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->firewall_15 ?>
					    	</span>
					    </td>
					 </tr>



					 <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		&nbsp;&nbsp;&nbsp;
					    		f. Gateway Anti-Virus
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->firewall_16 ?>
					    	</span>
					    </td>
					 </tr>



					 <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		&nbsp;&nbsp;&nbsp;
					    		g. Anti-Spyware
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->firewall_17 ?>
					    	</span>
					    </td>
					 </tr>


					 <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		&nbsp;&nbsp;&nbsp;
					    		h. Instrussion Prevention
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->firewall_18 ?>
					    	</span>
					    </td>
					 </tr>


					 <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		&nbsp;&nbsp;&nbsp;
					    		i. App Control
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->firewall_19 ?>
					    	</span>
					    </td>
					 </tr>


					 <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		&nbsp;&nbsp;&nbsp;
					    		j. App Visualization
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->firewall_20 ?>
					    	</span>
					    </td>
					 </tr>


					 <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		&nbsp;&nbsp;&nbsp;
					    		k. WXAC Acceleration
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->firewall_21 ?>
					    	</span>
					    </td>
					 </tr>


					 <tr>
					  	<td style="width: 80%" class="">
					    	<span class="font_12">
					    		&nbsp;&nbsp;&nbsp;
					    		l. Botnet
					    	</span>
					    </td>
					    <td style="width: 10%">
					    	<span class="font_12">
					    		<br>
					    		
					    	</span>
					    </td>
					    <td style="width: 10%" class="">
					    	<span class="font_12">
					    		<?= $data->firewall_22 ?>
					    	</span>
					    </td>
					 </tr>

					</table>
				</td>
			</tr>
			</table>


			<br>
			<table style="width:100%">
			  <tr>
			    <th style="width: 45%; background: #000; padding-left: 30px;">
			    	<p style="color: white; font-size: 13px;">D. UPS</p>
			    </th>
			    <th style="width: 10%">
			    	
			    </th>
			    <th style="width: 45%; background: #000; padding-left: 30px;">
			    	<p style="color: white; font-size: 13px;">E.LOAD BALANCER</p>
			    </th>
			  </tr>
			  <tr>

			  	<td>
			  		<table style="width:100%">
					  <tr>
						  	<td style="width: 80%" class="">
						    	<span class="font_12">
						    		1. Output Load (<?= $data->data_ol ?> )
						    	</span>
						    </td>
						    <td style="width: 10%">
						    	<span class="font_12">
						    		<br>
						    		
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<?= $data->ups_1 ?>
						    	</span>
						    </td>
						</tr>

					  <tr>
						  	<td style="width: 80%" class="">
						    	<span class="font_12">
						    		2. Battery Capacity (<?= $data->data_bc ?>)
						    	</span>
						    </td>
						    <td style="width: 10%">
						    	<span class="font_12">
						    		<br>
						    		
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<?= $data->ups_2 ?>
						    	</span>
						    </td>
						</tr>

					  <tr>
						  	<td style="width: 80%" class="">
						    	<span class="font_12">
						    		3. Battery Temperature (<?= $data->data_bt ?>)
						    	</span>
						    </td>
						    <td style="width: 10%">
						    	<span class="font_12">
						    		<br>
						    		
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<?= $data->ups_3 ?>
						    	</span>
						    </td>
						</tr>


						<tr>
						  	<td style="width: 80%" class="">
						    	<span class="font_12">
						    		4. Run Time Remaining (<?= $data->data_rt ?>)
						    	</span>
						    </td>
						    <td style="width: 10%">
						    	<span class="font_12">
						    		<br>
						    		
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<?= $data->ups_4 ?>
						    	</span>
						    </td>
						</tr>

						<tr>
						  	<td style="width: 80%" class="">
						    	<span class="font_12">
						    		5. Replace Battery Indicator
						    	</span>
						    </td>
						    <td style="width: 10%">
						    	<span class="font_12">
						    		<br>
						    		
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<?= $data->ups_5 ?>
						    	</span>
						    </td>
						</tr>
					</table>
				</td>

				<td></td>
				<td>
			  		<table style="width:100%">
			  			<tr>
						  	<td style="width: 80%" class="">
						    	<span class="font_12">
						    		1. Check system logs 
						    	</span>
						    </td>
						    <td style="width: 10%">
						    	<span class="font_12">
						    		<br>
						    		
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<?= $data->load_balance_1 ?>
						    	</span>
						    </td>
						</tr>


						<tr>
						  	<td style="width: 80%" class="">
						    	<span class="font_12">
						    		2. Hard Disk Usage (<?= $data->hard_disk_usage ?>)
						    	</span>
						    </td>
						    <td style="width: 10%">
						    	<span class="font_12">
						    		<br>
						    		
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<?= $data->load_balance_2 ?>
						    	</span>
						    </td>
						</tr>


						<tr>
						  	<td style="width: 80%" class="">
						    	<span class="font_12">
						    		3. Check System Memory 
						    	</span>
						    </td>
						    <td style="width: 10%">
						    	<span class="font_12">
						    		<br>
						    		
						    	</span>
						    </td>
						    <td style="width: 10%" class="">
						    	<span class="font_12">
						    		<?= $data->load_balance_3 ?>
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
												<p style="color: #fff; font-weight: 900; font-size: 12px;">ENDORSED BY</p>
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