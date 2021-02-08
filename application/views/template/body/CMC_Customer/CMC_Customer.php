<script type="text/javascript" src="<?=base_url()?>asset_admin/bower_components/ckeditor/ckeditor.js"></script>

<div class="pageheader hidden-xs">
    <h3><i class="fa fa-ticket"></i> Customer Information Center</h3>
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


    			<div class="col-md-6" id="div_search">

    				<div class="panel panel-default">
    				  <div class="panel-heading">Search Customer User OR Customer</div>
    				  
                      <div class="panel-body"> 
                        <div class="row">
    				  	<div class="form-group col-md-12">
        	                  <label for="exampleInputEmail1">Search</label>
        	                  <input type='text' class='form-control' name='cmc_search_customer' id='cmc_search_customer'> 
        	                </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-primary btn-block" onclick="search_customer();">Search Customer</button>
                            </div>
                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-danger btn-block" onclick="search_customer_user();">Search Customer User</button>
                            </div>
                        </div>

    				  </div>
    				</div>

    			</div>
                <div class="col-md-4 hidden-xs">            
                </div>

                
    			<div class="col-md-12" id="div_list" style="display: none">
    			
    					<div class="box box-success">
    			          <div class="box-header with-border">
    			            <h3 class="box-title"> <b><span id="title"> View Customer Information Center </span></b></h3>
    			          </div>
    			          <div class="box-body">
    			          	<table id="mytable2" class="table table-bordered table-striped">
    			            	<thead>
    			            			<tr>

                                            <th><center>Action</center></th>  
    							 
    								    	<th>CustomerID</th>        
    									
    								    	<th>Name</th>        
    									
    								    	<th>Validity</th>        
    									
    								    	<th>Changed</th>        
    									
    								    	<th>Create</th>        
    									
    								    	      
    					
    									</tr>
    							</thead>
    							<tbody id="dataList">	            
    				            </tbody>
    				        </table>
    					  </div>
    					</div>
    				

                 


    			</div>
                
    		</div>
    	</section>
    </div>
</div>

<input type="hidden" name="param" id="param" value="<?= $this->uri->segment('3'); ?>">

<script src="<?=base_url()?>asset_admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>asset_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(function () {
	    $("#mytable2").DataTable()
	});

    var param = $("#param").val();

    if(param=='1'){
        $(document).ready(function (){
            $("#div_list").hide();
            $("#div_search").hide();
            search_customer();            
        });
    } else if(param=='2'){
        $(document).ready(function (){
            $("#div_list").hide();
            $("#div_search").hide();
            search_customer_user();            
        });
    }   

	function search_customer(){
		//$("#title").html('Search By Customer');
		$("#div_list").show();
		$("#div_search").hide();

		var cmc_search_customer = $("#cmc_search_customer").val();
		var cmc_search_cuser = $("#cmc_search_cuser").val();

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
        					'cmc_search_customer':cmc_search_customer,
                            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                          };

        var editIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <center><a onclick="editUser_Customer('+data+');" title="Edit User"> <i class="fa fa-edit" /> </i></a></center> ';
            }
            return data;
        };

        var t = $("#mytable2").dataTable({

            "columnDefs": [
                { width: 1, targets: 0 },
                { width: 1, targets: 2 },
                { width: 1, targets: 3 }
            ], //disable search for age

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
                      "url": "<?=base_url()?>Customer/Dtable_CMC_Customer_ViewList", 
                      "type": "POST"
                  },
            columns: [

                {"data": "other_id",render:editIcon},
                {"data": "customerID"},
                {"data": "customer"},
                {"data": "valid"},
                {"data": "changed"},
                {"data": "created"}

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
	}

	function search_customer_user(){
		$("#title").html('Search By Customer User');
		$("#div_list").show();
		$("#div_search").hide();

		var cmc_search_customer = $("#cmc_search_customer").val();
		var cmc_search_cuser = $("#cmc_search_cuser").val();

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
        					'cmc_search_customer':cmc_search_customer,
                            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                          };

        var editIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <center><a onclick="editUser_CustomerUser('+data+');" title="Edit User"> <i class="fa fa-edit" /> </i></a></center> ';
            }
            return data;
        };

        var t = $("#mytable2").dataTable({

            "columnDefs": [
                { width: 1, targets: 0 },
                { width: 1, targets: 2 },
                { width: 1, targets: 3 }
            ], //disable search for age

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
                      "url": "<?=base_url()?>Customer/Dtable_CMC_CustomerUser_ViewList", 
                      "type": "POST"
                  },
            columns: [
                
                {"data": "other_id",render:editIcon},
                {"data": "first_name"},
                {"data": "valid"},
                {"data": "changed"},
                {"data": "created"},
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
	}


	function editUser_Customer(id)
	{
		var base_url = "<?= base_url()?>";
		window.location.href = base_url+'Customer/CMC_Form_Customer/'+id;
	}

	function editUser_CustomerUser(id)
	{
		var base_url = "<?= base_url()?>";
		window.location.href = base_url+'Customer/CMC_Form/'+id;
	}

	function cancel()
	{
		location.reload();
	}
</script>

<style type="text/css">
    .panel-heading{
      font-size: 11px;
      font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
      height: 20px;
      padding-left: 10px;
      padding-top: 10px;
      padding-bottom: 20px;
    }
</style>


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


    /* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}


.tab-base .nav-tabs {
    border: 0;
    background: #0d4063;
}


.btn-success {
    background-color: #ffffff;
    border-color: #ffffff;
}



.nav-section>li>.section, .nav-section>li>a {
    position: relative;
    margin: 0;
    text-align: center;
    padding-right: 0px; 
    padding-left: 5px; 
    padding-top: 0px; 
    padding-bottom: 0px; 
}



.font-date{
    font-size: 8px;
    font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
}

</style>