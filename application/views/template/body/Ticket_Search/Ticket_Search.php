<div class="pageheader hidden-xs">
    <h3><i class="fa fa-search"></i> Search Ticket </h3>
    <div class="breadcrumb-wrapper">
        <span class="label" style="padding-right: 0px;"><i class="fa fa-cog" aria-hidden="true" style="border: 2px solid #f2f7f8;padding-right: 0px;"></i></span>
        <ol class="breadcrumb">
            <li> <a href="<?=base_url()?>Ticket/CreateTicket_Phone"> Create Ticket </a> </li>
            <li> <a href="<?=base_url()?>Ticket/Ticket_StatusView"> Ticket Status </a> </li>
            <li> <a href="<?=base_url()?>Ticket/MS_Overview_Open"> Master Status </a> </li>
        </ol>
    </div>
</div>


<div class="row">

	<div class="col-md-12">

		<div class="panel" style="background-color: #ffffff;">
            <!--Panel heading-->
            <div class="panel-heading ui-sortable-handle">
                <div class="panel-control">
                    <!-- <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-info">Left</button>
                        <button type="button" class="btn btn-sm btn-info">Middle</button>
                        <button type="button" class="btn btn-sm btn-info">Right</button>
                    </div> -->
                </div>
                <h3 class="panel-title">Search Ticket</h3>
            </div>
            <!--Panel body-->
            <div class="panel-body">
                
                <form id="idForm" action="<?=base_url()?>ticket/search_ticket" method="post" enctype="multipart/form-data">
	            	<div class="col-md-12">
						<div class="row">
			                <div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Ticket Number</label>
			                  <input type='text' class='form-control' name='ticket_number' id='ticket_number'> 
			                </div>
					
							<div class="form-group col-md-3">
							  <label for="exampleInputEmail1">Fault ITSM Category</label>
			                  <select class='form-control' name='category' id='category'>
			  						<option value=''>< Please Select ></option>
			          				<option value='Hardware'> Hardware </option>
			          				<option value='Network'> Network </option>
			          				<option value='HIS Application'> HIS Application </option>
			          				<option value='Non-HIS Application'> Non-HIS Application </option>
			          			</select> 
			                </div>

			                <div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Subject</label>
			                  <input type='text' class='form-control' name='subject' id='subject'> 
			                </div>

			                <div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Current State</label>
			                  <select class='form-control' name='current_state' id='current_state'>
			  						<option value=''>< Please Select ></option>
			          				<option value='New'> New </option>
			          				<option value='First Level'> First Level </option>
			          				<option value='In Progress'> In Progress </option>
			          				<option value='Resolved'> Resolved </option>
			          			</select>
			                </div>
						</div>

						<div class="row">
			                <div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Date Start</label>
			                  <input type='text' class='form-control datetime' name='date1' id='date1'> 
			                </div>
					
							<div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Date End</label>
			                  <input type='text' class='form-control datetime' name='date2' id='date2'> 
			                </div>

			                <div class="form-group col-md-3">
			                  <label for="exampleInputEmail1">Responsible </label>
			                  	<select class='form-control' name='responsible' id='responsible'>
			  						<option value=''>< Please Select ></option>
			          				<?= lookup_agent(); ?>	
			          			</select>
			                </div>

			                <div class="form-group col-md-3">
							  <label for="exampleInputEmail1"><br></label>
			                  <button class="btn btn-primary btn-block" type="submit">Search</button>
			                </div>
			            </div>
	            	</div>
	            </form>

            </div>
        </div>

	</div>

</div>


<style type="text/css">

	.pageheader {
	    padding: 13px;
	    position: relative;
	    /* background: #ffffff; */
	    background: linear-gradient(to right, rgb(242, 247, 248) 10%, rgb(31, 114, 162) 100%);
	    background: -moz-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 114, 162) 100%);
	    background: -webkit-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 114, 162) 100%);
	    background: linear-gradient(to right, rgb(242, 247, 248) 10%, rgb(242, 247, 248) 100%);
	    margin: -20px -5px 24px -5px;
	    /* padding: 35px 15px 100px 20px; */
	    color: #353535;
	    box-shadow: 0 1px 2px 0 rgb(234, 234, 234);
	    padding-left: 30p;
	}

	.pageheader .fa, .pageheader .glyphicon {
	    font-size: 12px;
	    margin-right: 5px;
	    padding: 6px 7px;
	    border: 2px solid #124f76;
	    -moz-border-radius: 10px;
	    -webkit-border-radius: 10px;
	    border-radius: 10px;
	}

	.pageheader h3 {
	    font-size: 15px;
	    color: #165a84;
	    letter-spacing: -.5px;
	    margin: 0;
	}

	.pageheader .breadcrumb-wrapper .label {
	    color: #165a84;
	    text-transform: uppercase;
	    font-weight: 400;
	    display: inline-block;
	}


	.pageheader .breadcrumb li a {
	    color: #165983;
	}

	.pageheader .breadcrumb li.active {
	    color: #175b86;
	}

	.pageheader .breadcrumb-wrapper {
	    position: absolute;
	    top: 15px;
	    right: 25px;
	}

</style>


<script type="text/javascript">


	function submit()
	{
		
	}

	// function submit()
	// {	
	// 	var data = CKEDITOR.instances.ckedtor.getData();
	// 	var userfile = $("#userfile").val();
	// 	var data = 
 //                {
 //                	'userfile':userfile,
 //                	'text_editor':data,
 //                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
 //                }

                
 //                $.ajax({
 //                        url: '<?= base_url() ?>Ticket/add_ticket',
 //                        type: 'POST',
 //                        dataType: 'html',
 //                        data: data,
 //                        enctype: 'multipart/form-data',
 //                        beforeSend: function() {
 //                           // alert('Sila Tunggu');

 //                        },
 //                        success: function(response){
                            
                           
 //                        }
 //                });
	// }

	// this is the id of the form
	// $("#idForm").submit(function(e) {

	// 	e.preventDefault(); // avoid to execute the actual submit of the form.

	//     var url = "<?= base_url()?>ticket/add_ticket"; // the script where you handle the form input.
	//     var formData = $(this).serialize();

	//     $.ajax({
	//            type: "POST",
	//            url: url,
	//            data: formData, // serializes the form's elements.

	//            beforeSend: function() {
 //                   // alert('Sila Tunggu');
 //                   alert('success add');
 //               },
	//            success: function(data)
	//            {
	//                //alert('Success add'); // show response from the php script.
	//            },
	//            error: function(){
	//                alert("error in ajax form submission");
	//            }
	//          });
	// 	return false;    
	    
	// });




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

</script>


<script type="text/javascript">
	$(document).ready(function (){
		var data = 
                {
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                }

                
                $.ajax({
                        url: '<?= base_url() ?>Ticket/List_ref_no',
                        type: 'POST',
                        dataType: 'html',
                        data: data,
                        beforeSend: function() {
                           // alert('Sila Tunggu');

                        },
                        success: function(response){
                            if(response!=''){
                                $('#list_ref').html(response);
                            }
                           
                        }
                });
    });


    $("#sla_type_main").change(function (){
    	var sla_type_main = $("#sla_type_main").val();
    	if(sla_type_main=='hospital'){
    		$("#btype_div").hide();
    		$("#bstatus_div").hide();
    		$("#mline_div").hide();
    		$("#pendingdate_div").hide();
    		$("#custID_div").hide();
    		$("#location_div").show();
    		$("#faultCat_div").hide();
    		$("#Severity_div").show();
    		$("#fault_itsm_div").show();
    		$("#problem_desc_itsm_div").show();

    		$("#impact_div").hide();
    		$("#prio_div").hide();

    		$("#label_ref").html('Device No');

    		get_customerID_all();

    	} else if(sla_type_main=='noc'){
    		$("#btype_div").show();
    		$("#bstatus_div").show();
    		$("#mline_div").show();
    		$("#pendingdate_div").show();
    		$("#custID_div").show();
    		$("#location_div").show();
    		$("#faultCat_div").show();
    		$("#Severity_div").hide();
    		$("#fault_itsm_div").hide();
    		$("#problem_desc_itsm_div").hide();

    		$("#impact_div").show();
    		$("#prio_div").show();


    		$("#label_ref").html('Reference No');

    	} else {
    		$("#btype_div").show();
    		$("#bstatus_div").show();
    		$("#mline_div").hide();
    		$("#pendingdate_div").hide();
    		$("#custID_div").show();
    		$("#location_div").show();
    		$("#faultCat_div").show();
    		$("#Severity_div").hide();
    		$("#fault_itsm_div").hide();
    		$("#problem_desc_itsm_div").hide();

    		$("#impact_div").show();
    		$("#prio_div").show();

    		$("#label_ref").html('Reference No');

    	}
    });


    function get_customerID_all()
	{
		//var customerID = $("#tp_cuID").val();

		//var customerID = $.trim(customerID); //trim	
        
		var data = 
                    {
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ticket/get_customerID_all',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                            	if (!$.trim(response)){ 

                            	} else {
                            		var id = response;
									var id = $.trim(id); //trim	

									$("#browsers_cu").html('<option value=""> -- Select Customer User -- </option>'+id);
                            	}
                               
                            }
                    });
	}

	//auto set hospital
	$(document).ready(function (){
		var session = "<?= $this->session->userdata('env'); ?>";

		if(session=='noc'){
			$("select#sla_type_main2").val('noc').trigger('change');
			$("select#sla_type_main").val('noc').trigger('change');
		} else if(session=='hospital'){
			$("select#sla_type_main2").val('hospital').trigger('change');
			$("select#sla_type_main").val('hospital').trigger('change');
		}
		
	});

</script> 