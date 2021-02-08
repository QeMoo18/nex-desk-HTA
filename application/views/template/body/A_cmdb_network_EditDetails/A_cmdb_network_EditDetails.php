<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i>Network Management</h5>
		<div class="row">
			<div class="col-md-2"> 
				<div class="form-group">
					<a href="<?= base_url()?>admin/A_cmdb_network_viewList"> 
						<button class="btn btn-danger btn-block"> Go To Overview</button>
					</a>
					<br>

					<?php 
						$env = $this->session->userdata('env');
						if($env=='hospital'){ 
					?>
					<a onclick="remote();"> 
						<button class="btn btn-danger btn-block"> Remote </button>
					</a>
					<?php } ?>

					<?= qr_code($this->uri->segment(3)); ?>

					</div>
				</div>	
			<div class="col-md-10">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Edit Network</b> </h3>
		          </div>
		          <div class="box-body">
						<div class="row">
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">*Name</label>
			                  <input type='text' class='form-control' name='NW_name' id='NW_name'> 
			                  <span id="alert_NW_name"></span>
			                </div>

			                <div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">*LAN IP Address</label>
			                  <input type='text' class='form-control' name='NW_ip' id='NW_ip'> 
			                  <span id="alert_NW_IP"></span> 
			                </div>
			                
							 <div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">*Deployment State</label>
			                  <select class='form-control' name='NW_deployment_state' id='NW_deployment_state'>
			                  	<option value=''>< Please Select ></option>
		      					<?= lookup_deployment_state(); ?>
		      				  </select>
			                  <span id="alert_NW_deployment_state"></span> 
			                </div>
							
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">*Incident State</label>
			                  <select class='form-control' name='NW_incident_state' id='NW_incident_state'>
			                  	<option value=''>< Please Select ></option>
		      					<?= lookup_incident_state(); ?>
		      				  </select>
		      				  <span id="alert_NW_incident_state"></span> 
			                </div>
						
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Description</label>
			                  <textarea rows="4" class='form-control' name='NW_description' id='NW_description'> </textarea> 
			                </div>

			                <div class="form-group col-md-3">
		      					<label for="exampleInputEmail1">Type</label>
		      					<select class='form-control' name='NW_type' id='NW_type'>
		          					<option value=''>< Please Select ></option>
		          					<?= lookup_network_type(); ?>
								</select>
			                </div>
						
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Lv No</label>
			                  <input type='text' class='form-control' name='NW_lvno' id='NW_lvno'> 
			                </div>
						
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Primary Service No</label>
			                  <input type='text' class='form-control' name='NW_psno' id='NW_psno'> 
			                </div>
						
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Backup Service No</label>
			                  <input type='text' class='form-control' name='NW_bsno' id='NW_bsno'> 
			                </div>
						
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">DQ No</label>
			                  <input type='text' class='form-control' name='NW_dqno' id='NW_dqno'
			                  onkeyup="this.value=this.value.replace(/[^\d]/,'')"> 
			                </div>
						
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Service No</label>
			                  <input type='text' class='form-control' name='NW_sno' id='NW_sno'
			                  onkeyup="this.value=this.value.replace(/[^\d]/,'')"> 
			                </div>
						
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Network Address (PS)</label>
			                  <input type='text' class='form-control' name='NW_ps' id='NW_ps'> 
			                </div>
						
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Network Address (BS)</label>
			                  <input type='text' class='form-control' name='NW_bs' id='NW_bs'> 
			                </div>

			                <div class="form-group col-md-3">
		          					<label for="exampleInputEmail1"> *Location </label>
		          					<input type='text' class='form-control' name='NW_location' id='NW_location' 
		          					list="list_loc"> 
		          					<span id="alert_NW_location"></span>
				                </div>
				                <datalist id="list_loc"></datalist>
						
							<div class="form-group col-md-3">
			  					<label for="exampleInputEmail1">*Validity</label>
			  					<select class='form-control' name='NW_validity' id='NW_validity'>
			  					<option value=''>< Please Select ></option>
			                       <?= lookup_validity(); ?>
			                     </select>
			  					<span id="alert_NW_validity"></span>
			                </div>
						  </div>
						  <hr>
						  <div class="row">
						  	<div class="form-group col-md-2">
				                  <button type="submit" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
				            </div>
				            <div class="form-group col-md-2">
				                  <button class="btn btn-primary btn-block" onclick="submit();"> Submit </button>
				            </div>
						  </div>

						</div>
				  </div>
			</div>

		</div>
	</section>
</div>

<!-- Input hidden get - ID -->
<input type="hidden" name="other_id" id="other_id" value="<?= $this->uri->segment('3')?>">


<script type="text/javascript">

	// start code location
	$(document).ready(function (){

		            var data = 
                    {
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>CMDB/getAllLoc',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                                if(response!=''){
                                    $('#list_loc').html(response);
                                }
                               
                            }
                    });
		        });
	//end

	$(document).ready(function (){ // automatik bila dia open browser
		details(); //panggil function details
	});

	function details() //create dekat function
	{
		var other_id = $("#other_id").val(); //get id hidden 
		
		var data =  {
		                    'other_id':other_id, //declare variable dalam data 
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		            }

        $.ajax({
                    url: '<?= base_url() ?>Admin/cmdb_network_details', //create nama function
                    type: 'POST',
                    dataType: 'json', //jenis type adalah json
                    data: data,
                    beforeSend: function() {
                       
                    },
                    success: function(response){

							//input daripada form - id
							var NW_name = $("#NW_name").val(response.name); //put response to value
							var NW_deployment_state = $("#NW_deployment_state").val(response.deployment_state);
							var NW_incident_state = $("#NW_incident_state").val(response.incident_state);
							var NW_description = $("#NW_description").val(response.description);
							var NW_type = $("#NW_type").val(response.type);
							var NW_lvno = $("#NW_lvno").val(response.lv_no);
							var NW_psno = $("#NW_psno").val(response.ps_no);
							var NW_bsno = $("#NW_bsno").val(response.bs_no);
							var NW_dqno = $("#NW_dqno").val(response.dq_no);
							var NW_sno = $("#NW_sno").val(response.service_number);
							var NW_ps = $("#NW_ps").val(response.networkAddress_ps);
							var NW_bs = $("#NW_bs").val(response.networkAddress_bs);
							var NW_location = $("#NW_location").val(response.location);
							var NW_validity = $("#NW_validity").val(response.validity);
							var NW_ip = $("#NW_ip").val(response.ip);
                    }
              });
	}

	function submit()
	{
		//input daripada form - id
		var NW_name = $("#NW_name").val();
		var NW_deployment_state = $("#NW_deployment_state").val();
		var NW_incident_state = $("#NW_incident_state").val();
		var NW_description = $("#NW_description").val();
		var NW_type = $("#NW_type").val();
		var NW_lvno = $("#NW_lvno").val();
		var NW_psno = $("#NW_psno").val();
		var NW_bsno = $("#NW_bsno").val();
		var NW_dqno = $("#NW_dqno").val();
		var NW_sno = $("#NW_sno").val();
		var NW_ps = $("#NW_ps").val();
		var NW_bs = $("#NW_bs").val();
		var NW_location = $("#NW_location").val();
		var NW_validity = $("#NW_validity").val();
		
		var NW_ip = $("#NW_ip").val();


		var other_id = $("#other_id").val(); //get id hidden 
		

		//check to action
		if(NW_name)
		{ 
			$("#alert_NW_name").html('');
		} else {
			$("#alert_NW_name").html('<font color="red"> required field </font>');
		}

		if(NW_ip)
		{ 
			$("#alert_NW_ip").html('');
		} else {
			$("#alert_NW_ip").html('<font color="red"> required field </font>');
		}

		if(NW_deployment_state)
		{ 
			$("#alert_NW_deployment_state").html('');
		} else {
			$("#alert_NW_deployment_state").html('<font color="red"> required field </font>');
		}

		if(NW_incident_state)
		{ 
			$("#alert_NW_incident_state").html('');
		} else {
			$("#alert_NW_incident_state").html('<font color="red"> required field </font>');
		}

		if(NW_location)
		{ 
			$("#alert_NW_location").html('');
		} else {
			$("#alert_NW_location").html('<font color="red"> required field </font>');
		}

		if(NW_validity)
		{ 
			$("#alert_NW_validity").html('');
		} else {
			$("#alert_NW_validity").html('<font color="red"> required field </font>');
		}


		//check to submit
		if((NW_name=='')||(NW_deployment_state=='')||(NW_incident_state=='')||(NW_location=='')||(NW_validity=='')){

		} else {


		//bekas
		var data = 
		                {   'NW_name':NW_name,
		                	'NW_deployment_state':NW_deployment_state,
		                	'NW_incident_state':NW_incident_state,
		                	'NW_description':NW_description,
		                	'NW_type':NW_type,
		                	'NW_lvno':NW_lvno,
		                	'NW_psno':NW_psno,
		                	'NW_bsno':NW_bsno,
		                	'NW_dqno':NW_dqno,
		                	'NW_sno':NW_sno,
		                	'NW_ps':NW_ps,
		                	'NW_bs':NW_bs,
		                	'NW_location':NW_location,
		                	'NW_validity':NW_validity,
		                	'other_id':other_id,
		                	'NW_ip':NW_ip,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		                }

                    
            $.ajax({
                    url: '<?= base_url() ?>Admin/CMDB_Network_update', // create function update dekat controller 
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                    	//alert("Network Updated !");
                    	//location.reload();

                    	var url = "<?= base_url()?>Admin/A_cmdb_network_viewList";
	                    window.location.href=url;
                    }
            });
		
		}
	}

	function cancel()
	{
			location.reload();
	}
	

	function remote()
	{

		var ip = $("#NW_name").val();
        var data =  {       
                                'ip':ip,
                                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                            }

        $.ajax({
                    url: '<?= base_url() ?>Admin/remoteComputer', //create nama function delete controller
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                        

                        //connect node js
                        var socket = io.connect('http://localhost:8787');

                        var username = ip;
                        socket.emit('new_client', username);
                        document.title = username + ' - ' + document.title;

                        // When a message is received it's inserted in the page
                        socket.on('message', function(data) {
                            insertMessage(data.username, data.message)
                        })


                        var message = "<?= getenv('COMPUTERNAME'); ?>";
                        socket.emit('message', message);
                        insertMessage(username, message);

                        // Adds a message to the page
                        function insertMessage(username, message) {
                            $('#chat_zone').prepend('<p><strong>' + username + '</strong> ' + message + '</p>');
                        }


                    }
            });


        

    }

</script>


<script type="text/javascript">
	function print_qr()
	{
		$("#btn_qr_code").trigger('click');
	}
</script>

<form action="<?=base_url()?>CMDB/print_qr/<?=$this->uri->segment(3)?>" method="post">
	<button type="submit" id="btn_qr_code"></button>
</form>