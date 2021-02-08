<div class="pageheader hidden-xs">
    <h3><i class="fa fa-user"></i> Customer User Location</h3>
    <div class="breadcrumb-wrapper">
        <span class="label" style="padding-right: 0px;"><i class="fa fa-cog" aria-hidden="true" style="border: 2px solid #f2f7f8;padding-right: 0px;"></i></span>
        <ol class="breadcrumb">
            <li> <a href="<?=base_url()?>Customer/CMC_AddCustomerUser"> Add Customer User </a> </li> 
            <li> <a href="<?=base_url()?>Customer/CMC_Customer/2"> List Customer User </a> </li>  
            <li> <a href="<?=base_url()?>Customer/CMC_Customer/1"> List Customer </a> </li>  
            <li> <a href="<?=base_url()?>Customer/CMC_Customer"> Search </a> </li>
        </ol>
    </div>
</div>

<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>asset_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="row" style="padding-bottom: 30px;">
    <div class="content-wrapper">
    	<section class="content">
           
    		<div class="row">
                
    			<div class="col-md-12">

    				<div class="box box-success">
    		          <div class="box-header with-border">
    		            <h3 class="box-title"> <b>View Customer User - Location <span id="name_selected"> </span></b></h3>
    		          </div>
    		          <div class="box-body">
                        <input type="hidden" id="customerUser" value="">
                        <!-- First -->
                            <div id="first_div">
            		          	<table id="mytable2" class="table table-bordered table-striped">
            		            	<thead>
            							<tr>              
                                            <th><center>Location</center></th> 
            						    	<th>Name</th>          
            						    	<th>Company</th>        
            							</tr>
            						</thead>
            						<tbody id="dataList">	            
            			            </tbody>
            			        </table>
                            </div>
                        <!-- END -->

                        <!-- Second -->
                            <!-- SECOND -->
                                <div id="second_div" style="display: none">
                                    
                            
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">List Location</label>
                                      
                                      
                                    
                                        <table id="mytable3" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Location</th>
                                                    <th>Deployment State</th>
                                                    <th>Incident State</th>
                                                    <th><center>Mark</center></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>

                                      </div>


                                    
                                    <div class="row pull-right" style="padding-right: 10px;">
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="cancel();">Cancel</button>
                                       
                                            <button type="submit" class="btn btn-primary btn-sm" onclick="submit();">Submit</button>
                                        
                                        

                                    </div>
                                </div>
                            <!-- END -->
                        <!-- END -->

    				  </div>
    				</div>
    			</div>

                <!-- <div class="col-md-3 hidden-xs">
                    <div class="col-md-11"><?//= lookup_widget(); ?> </div>
                    <div class="col-md-1"> </div>            
                </div> -->

    		</div>
    	</section>
    </div>
</div>

<script src="<?=base_url()?>asset_admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>asset_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- code datatables cuma ubah column -->
<script type="text/javascript">
	$(function () {
	    $("#mytable2").DataTable()
	});


	$(document).ready(function() {
		
		$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
        {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength),
            };
        };

        var send_param =  {
                            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                          };

        var editIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <center><a onclick="assignLocation('+data+');" title="Edit"> <i class="fa fa-edit" /> </i></a></center> ';
            }
            return data;
        };

        var deleteIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <a onclick="delIcon('+data+');" title="Delete"> <i class="fa fa-trash" /> </i></a> ';
            }
            return data;
        };

        var t = $("#mytable2").dataTable({

            "columnDefs": [
                { width: 1, targets: 0 },
            ], //disable search for age

            // for responsive
            responsive: true,
            scrollY: true,
            scrollX: true,
            scrollX: "100%",
            scroller: true,
            deferRender:true,

            destroy: true,
            searching: false,

            initComplete: function() {
                var api = this.api();
                $('#mytable_filter input')
                        .off('.DT')
                        .on('keyup.DT', function(e) {
                            if (e.keyCode == 13) {
                                api.search(this.value).draw();
                    }
                });
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            "searching": true,
            ajax: {
                      data: send_param,
                      "url": "<?=base_url()?>Admin/Dtable_CM_CustomerUser_ViewList", //CREATE FUNCTION DEKAT CONTROLLER 
                      "type": "POST",
                      deferRender: true
                  },
            columns: [
            			// TEMPAT KAU NAK SET COLUMN 
                        {"data": "other_id",render:editIcon},
		                {"data": "first_name"},
		                {"data": "customerID"}

            		],
            order: [[2, 'asc']],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                //$('td:eq(0)', row).html(index);
            },
            // for selected
            "fnDrawCallback": function(){
                  $('table#mytable2 td').bind('mouseenter', function () { $(this).parent().children().each(function(){$(this).addClass('datatablerowhighlight');}); });
                  $('table#mytable2 td').bind('mouseleave', function () { $(this).parent().children().each(function(){$(this).removeClass('datatablerowhighlight');}); });
            }
        });
	});

    function cancel()
    {
        var url = "<?= base_url()?>Customer/CU_Link_Location";
        window.location.href = url;
    }


	function editUser(id)
	{
		var base_url = "<?= base_url()?>";
		window.location.href = base_url+'Admin/Admin_CM_CU_editdetails/'+id;
	}

    function assignLocation(id)
    {
        //alert(id);
        $("#first_div").hide();
        $("#second_div").show();
        $("#customerUser").val(id);
        location_detail();
        check_list_cust_location();
        getname(id);
    }
    
    function getname(id)
    {
                var data = 
                            {   'id':id,
                                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                            }

                        
                $.ajax({
                        url: '<?= base_url() ?>Admin/getname_by_id',
                        type: 'POST',
                        dataType: 'html',
                        data: data,
                        beforeSend: function() {

                        },
                        success: function(response){
                            $("#name_selected").html('('+response+')');
                        }   
                    });
    }
</script>
<!-- end -->


<!-- Services -->
<script type="text/javascript">
    $(function () {
        $("#mytable3").DataTable();
       
    })

    function location_detail(){
        
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
        {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength),
            };
        };

        var send_param =  {
                            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                          };

        var addLocation = function ( data, type, row ) {
            if ( type === 'display' ) {
                return '<center><input type="checkbox" value="'+data+'" class="LocationID" name="LocationID"></center> ';
            }
            return data;
        };

        var t = $("#mytable3").dataTable({
            
            // for responsive
            responsive: true,
            scrollY: true,
            scrollX: true,
            scroller: true,
            deferRender:true,
    
            destroy: true,
            searching: false,

            initComplete: function() {
                var api = this.api();
                $('#mytable_filter input')
                        .off('.DT')
                        .on('keyup.DT', function(e) {
                            if (e.keyCode == 13) {
                                api.search(this.value).draw();
                    }
                });
                
                
                
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            "searching": true,
            ajax: {
                      data: send_param,
                      "url": "<?=base_url()?>Admin/Dtable_CMDB_Location_ViewList", 
                      "type": "POST",
                      deferRender: true,
                      "dataSrc": function ( json ) {
                            //Make your callback here.
                            
                            //alert("Done!");
                            
                            check_list_cust_location();
                            
                            
                            return json.data;
                            
                       } 
                  },
            columns: [
                // {
                //     "data": "id_group",
                //     "orderable": false
                // },
                {"data": "name"},
                {"data": "deployment_state"},
                {"data": "incident_state"},
                {"data": "other_id",render:addLocation}

            ],
            order: [[1, 'asc']],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                //$('td:eq(0)', row).html(index);
            },
            // for selected
            "fnDrawCallback": function(){
                  $('table#mytable3 td').bind('mouseenter', function () { $(this).parent().children().each(function(){$(this).addClass('datatablerowhighlight');}); });
                  $('table#mytable3 td').bind('mouseleave', function () { $(this).parent().children().each(function(){$(this).removeClass('datatablerowhighlight');}); });
            }
        });
    }

    function addLocation(id)
    {

    }
</script>
<!-- END -->
  
  
<!-- Servicess Add -->
<script type="text/javascript">
    function submit()
    {
        var id = [];
            $(':checkbox:checked').each(function(i){
                id[i] = $(this).val();
                //alert(id)
                if(id[i]=='on'){
                    id[i]='0';
                }
            }); 

        var custID = $("#customerUser").val();

        var data = 
                            {   'location_id':id,
                                'customerUser':custID,
                                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                            }

                        
                $.ajax({
                        url: '<?= base_url() ?>Admin/customeruser_location',
                        type: 'POST',
                        dataType: 'html',
                        data: data,
                        beforeSend: function() {

                        },
                        success: function(response){
                            // alert('sucess add services');
                            // location.reload();
                        
                            var url = "<?= base_url()?>Customer/CU_Link_Location";
                            window.location.href = url;
                        }
                });


    }

    function check_list_cust_location()
    {
        var custID = $("#customerUser").val();

        var data =  {
                         'custID':custID,
                         '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                        
                $.ajax({
                        url: '<?= base_url() ?>Admin/check_list_cust_location',
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                        beforeSend: function() {

                        },
                        success: function(response){

                                var checkedValue = null; 
                                var inputElements = document.getElementsByClassName('LocationID');
                                for(var i=0; inputElements[i]; ++i){

                                      cbox = inputElements[i].value;
                                      //alert(checkedValue);
                                      $.each(response, function(index) {
                                            var location_id = response[index].location_id;
                                            if(location_id===cbox){
                                                //alert("True");
                                                $("input:checkbox[value="+location_id+"]").attr("checked", true);
                                            } else {
                                                //alert("False");
                                            }
                                      });

                                }

                        }
                });
    }
</script>
<!-- END -->


<style type="text/css">
    /* style for selected */
    .datatablerowhighlight {
        background-color: #ECFFB3 !important;
    }
</style>

<style type="text/css">

    .pageheader {
        padding: 13px;
        position: relative;
        /* background: #ffffff; */
        background: linear-gradient(to right, rgb(222, 227, 228) 10%, rgb(31, 112, 162) 100%);
        background: -moz-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 112, 162) 100%);
        background: -webkit-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 112, 162) 100%);
        background: linear-gradient(to right, rgb(222, 227, 228) 10%, rgb(222, 227, 228) 100%);
        margin: -20px -5px 22px -5px;
        /* padding: 35px 15px 100px 20px; */
        color: #353535;
        box-shadow: 0 1px 2px 0 rgb(232, 232, 232);
        padding-left: 30p;
    }

    .pageheader .fa, .pageheader .glyphicon {
        font-size: 12px;
        margin-right: 5px;
        padding: 6px 7px;
        border: 2px solid #122f76;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;
    }

    .pageheader h3 {
        font-size: 15px;
        color: #165a82;
        letter-spacing: -.5px;
        margin: 0;
    }

    .pageheader .breadcrumb-wrapper .label {
        color: #165a82;
        text-transform: uppercase;
        font-weight: 200;
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
</style>