<?php $id = $this->uri->segment(3); ?>
		
<div class="content-wrapper">
	<section class="content">
		
		<div class="row">

			<div class="col-md-9">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Report Run</b> </h3>
		          </div>

		          <form action="<?= base_url()?>Report/Report_Generate/<?= $id ?>" id="form" method="POST">
			          <div class="box-body">
								
			                <div class="col-md-6">
								<div class="form-group">
				                  <label for="exampleInputEmail1">Title</label>
				                  <input type='text' class='form-control' name='Report_Title' id='Report_Title' value="<?= report_title($id)?>"> 
				                </div>
				            </div>
							<div class="col-md-6">
								<div class="form-group">
				                  	<label for="exampleInputEmail1">Format</label>
									<select class='form-control' name='Report_Format' id='Report_Format'>
										<option value=''>< Please Select ></option>
										<option value='excel'> Excel </option>
										<option value='word'> Word </option>
										<option value='pdf'> PDF </option>
									</select>
				                </div>
				            </div>
							
				            <div id="with_1">
				            	<div class="col-md-6">
					            	<div class="form-group" id="LocDiv">
					  					<label for="exampleInputEmail1">Location</label>
					  					<select class='form-control' name='Report_Location' id='Report_Location'>
					  						<option value=''>< Select Location >
					  							<?= report_location() ?>		
					  						</option>
					  					</select>
					                </div>
					            </div>

					            <div class="col-md-6">
					                <div class="form-group" id="idTicketDiv">
					  					<label for="exampleInputEmail1">Ticket ID</label>
					  					<select class='form-control' name='Report_Id_Ticket' id='Report_Id_Ticket'>
					  						<option value=''>< Select Ticket ID >	
					  						</option>
					  					</select>
					                </div>
					            </div>


					            <div class="col-md-6" style="display: none">
									<div class="form-group">
					                  <label for="exampleInputEmail1">Date Report</label>
					                  <select class='form-control' name='Report_Date_Start_Only' id='Report_Date_Start_Only'>
					  						<option value=''>< Select Date >	
					  						</option>
					  					</select>
					                </div>
					            </div>

					            <div class="col-md-6">
					            </div>
				            </div>

							<div id="without_1" style="display: none">

								<div class="col-md-6">
									<div class="form-group">
					                  <label for="exampleInputEmail1">Date Start</label>
					                  <input type='text' class='datetime form-control' name='Report_Date_Start' id='Report_Date_Start'> 
					                </div>
					            </div>
								<div class="col-md-6">
									<div class="form-group">
					                  <label for="exampleInputEmail1">Date End</label>
					                  <input type='text' class='datetime form-control' name='Report_Date_End' id='Report_Date_End'> 
					                </div>
					            </div>

								

					            <div class="col-md-6">
									<div class="form-group">
					                  <label for="exampleInputEmail1">Quick Range</label>
					                </div>
					            </div>

					            <div class="col-md-6">
									<div class="form-group">
					                  
					                </div>
					            </div>


					            <div class="col-md-12">
					            	<div class="col-md-4">
					            		<button class="btn btn-primary btn-block" onclick="today(); return false;"> Today </button>
					            	</div>
					            	<div class="col-md-4">
					            		<button class="btn btn-primary btn-block" onclick="yesterday(); return false;"> Yesterday </button>
					            	</div>
					            	<div class="col-md-4">
					            		<button class="btn btn-primary btn-block" onclick="last_week(); return false;"> Last Week </button>
					            	</div>
					            	<br><br>
					            </div>

					        
				            

					            <div class="col-md-12">
					            	<div class="col-md-4">
					            		<button class="btn btn-primary btn-block" onclick="last_month(); return false;"> Last Month </button>
					            	</div>
					            	<div class="col-md-4">
					            		<button class="btn btn-primary btn-block" onclick="last_2month(); return false;"> Last 2 Month </button>
					            	</div>
					            	<div class="col-md-4">
					            		<button class="btn btn-primary btn-block" onclick="last_12month(); return false;"> Last 12 Month </button>
					            	</div>
					            	<br><br><br><br>
					            </div>
					        </div>

					        <input type="hidden" id="type_hidden" name="type_hidden" value="">
					        <input type="hidden" id="Report_ID" name="Report_ID" value="<?= $this->uri->segment(3)?>">

							<div class="col-md-12">
								<div class="col-md-3"> </div>
								
								<div class="col-md-2"> 
									<button type="button" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
								</div>

								<div class="col-md-2"> <button id="btn_collect" type="button" class="btn btn-primary btn-block" onclick="save();">Collect</button> </div>

								<div class="col-md-2">  
									<button type="submit" class="formtrigger btn btn-primary btn-block" onclick="submit();">Generate</button>
								</div>


								

								
								<div class="col-md-3"> </div>
							</div>

					  </div>
				  </form>
				</div>
			</div>

			<div class="col-md-3 hidden-xs">
				<div class="col-md-11">
					<?= lookup_widget(); ?>
				</div>
				<div class="col-md-1"> </div>		        
			</div>


		</div>
	</section>
</div>
<script type="text/javascript">



	function submit()
	{
		var Report_Title = $("#Report_Title").val();
		var Report_Date_Start = $("#Report_Date_Start").val();
		var Report_Date_End = $("#Report_Date_End").val();
		var Report_Type = $("#type_hidden").val();
		var Report_Location = $("#Report_Location").val();
		var Report_Id_Ticket = $("#Report_Id_Ticket").val();
		var Report_Format = $("#Report_Format").val();
		var Report_ID = "<?= $this->uri->segment(3)?>";

		var data = 	{
						"Report_Title" : Report_Title,
						"Report_Date_Start" : Report_Date_Start,
						"Report_Date_End" : Report_Date_End,
						"Report_Type":Report_Type,
						"Report_Location":Report_Location,
						"Report_Id_Ticket":Report_Id_Ticket,
						"Report_Format":Report_Format,
						"Report_ID":Report_ID
						
					}

		$.ajax({
                    url: "<?= base_url() ?>Report/Report_Generate",
                    type: "POST",
                    dataType: "html",
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){

                    }
            });

	}

	function cancel()
 	{
 		window.location.href="<?= base_url()?>menu/overview/report";
 	}


 	function today()
 	{
 		<?php 
              date_default_timezone_set("Asia/Kuala_Lumpur");
              $timeReg =date("H:i:s");
              $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
              $datetime = $dateReg.' '.$timeReg; //current date 

              $plus24 = date("Y-m-d H:i:s", strtotime('+24 hours', strtotime($datetime)));
        ?>
        var datetime = "<?= $datetime ?>";
        var plus24 = "<?= $plus24 ?>";

 		$("#Report_Date_Start").val(datetime);
 		$("#Report_Date_End").val(plus24);
 	}


 	function yesterday()
 	{
 		<?php 
              date_default_timezone_set("Asia/Kuala_Lumpur");
              $timeReg =date("H:i:s");
              $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
              $datetime = $dateReg.' '.$timeReg; //current date 

              $minus24 = date("Y-m-d H:i:s", strtotime('-24 hours', strtotime($datetime)));
        ?>
        var datetime = "<?= $datetime ?>";
        var minus24 = "<?= $minus24 ?>";

 		$("#Report_Date_Start").val(minus24);
 		$("#Report_Date_End").val(datetime);
 	}


 	function last_week()
 	{
 		<?php 
              date_default_timezone_set("Asia/Kuala_Lumpur");
              $timeReg =date("H:i:s");
              $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
              $datetime = $dateReg.' '.$timeReg; //current date 

              $minus7day = date("Y-m-d H:i:s", strtotime('-7 day', strtotime($datetime)));
        ?>
        var datetime = "<?= $datetime ?>";
        var minus7day = "<?= $minus7day ?>";

 		$("#Report_Date_Start").val(minus7day);
 		$("#Report_Date_End").val(datetime);
 	}


 	function last_month()
 	{
 		<?php 
              date_default_timezone_set("Asia/Kuala_Lumpur");
              $timeReg =date("H:i:s");
              $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
              $datetime = $dateReg.' '.$timeReg; //current date 

              $minus30day = date("Y-m-d H:i:s", strtotime('-1 month', strtotime($datetime)));
        ?>
        var datetime = "<?= $datetime ?>";
        var minus30day = "<?= $minus30day ?>";

 		$("#Report_Date_Start").val(minus30day);
 		$("#Report_Date_End").val(datetime);
 	}



 	function last_2month()
 	{
 		<?php 
              date_default_timezone_set("Asia/Kuala_Lumpur");
              $timeReg =date("H:i:s");
              $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
              $datetime = $dateReg.' '.$timeReg; //current date 

              $minus2month = date("Y-m-d H:i:s", strtotime('-2 month', strtotime($datetime)));
        ?>
        var datetime = "<?= $datetime ?>";
        var minus2month = "<?= $minus2month ?>";

 		$("#Report_Date_Start").val(minus2month);
 		$("#Report_Date_End").val(datetime);
 	}


 	function last_12month()
 	{
 		<?php 
              date_default_timezone_set("Asia/Kuala_Lumpur");
              $timeReg =date("H:i:s");
              $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
              $datetime = $dateReg.' '.$timeReg; //current date 

              $minus12month = date("Y-m-d H:i:s", strtotime('-12 month', strtotime($datetime)));
        ?>
        var datetime = "<?= $datetime ?>";
        var minus12month = "<?= $minus12month ?>";

 		$("#Report_Date_Start").val(minus12month);
 		$("#Report_Date_End").val(datetime);
 	}

 	$("#Report_Location").change(function (){
 		var location = $("#Report_Location").val();

 		var data = 	{
						"location" : location
						
					}

		$.ajax({
                    url: "<?= base_url() ?>Report/Select_ID_By_location",
                    type: "POST",
                    dataType: "html",
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                    	//alert(response);
                    	if(!$.trim(response)){
                    		$("#Report_Id_Ticket").html('<option value=""> < Not Register ></option>');
                    	} else {
                    		$("#Report_Id_Ticket").html('<option value=""> < Select Ticket ID ></option>'+response);
                    	}
                    }
            });
 	});


 	$(document).ready(function(){
 		var segment = "<?= $this->uri->segment(3)?>";

 		var data = 	{
						"segment" : segment
						
					}

		$.ajax({
                    url: "<?= base_url() ?>Report/Report_Details",
                    type: "POST",
                    dataType: "json",
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                    	//alert(response);
                    	var type = response.report_type;
                    	$("#type_hidden").val(type);
                    	format_type(type);
                    	
                    }
            });

 		
 	});

 	function format_type(type)
 	{
 		if(type=='1')
 		{
 			$("#Report_Format").html('<option value="word"> Word </option>');

 			$("#with_1").show();
 			$("#without_1").hide();
 			$("#btn_collect").hide();

 		} else if(type=='2'){
 			$("#Report_Format").html('<option value="excel"> Excel </option>');

 			$("#with_1").hide();
 			$("#without_1").show();
 			$("#btn_collect").hide();

 		} else if((type=='3')||(type=='4')||(type=='5')||(type=='6')){
 			$("#Report_Format").html('<option value="word"> Word </option>');
 			
 			$("#with_1").hide();
 			$("#without_1").hide();
 			$("#btn_collect").hide();
 		}  else {
 			$("#Report_Format").html('<option value="">&lt; Please Select &gt;</option><option value="excel"> Excel </option>');

 			$("#with_1").hide();
 			$("#without_1").show();

 			$("#btn_collect").show();
 		}
 	}

 	$("#Report_Id_Ticket").change(function (){
 		var ticket = $("#Report_Id_Ticket").val();
 	});


</script>