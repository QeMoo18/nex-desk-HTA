<div class="pageheader hidden-xs">
    <h3><i class="fa fa-user"></i> Customer User Administrator</h3>
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

    			<div class="col-md-12" id="div_list">

        			<div class="box box-success">
        	          <div class="box-header with-border">
        	            <h3 class="box-title"> <b><span id="title"> View User Administrator </span></b></h3>
        	          </div>
        	          <div class="box-body">
        	          	<table id="mytable2" class="table table-bordered table-striped">
        	            	<thead>
        	            			<tr>

                                        <th><center>Action</center></th>  
        					 
        						    	<th>Username</th>        
        							
        						    	<th>Name</th>        
        							
        						    	<th>Email</th>        
        							
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

<script src="<?=base_url()?>asset_admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>asset_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(function () {
	    $("#mytable2").DataTable()
	});

	$(document).ready(function (){
		search_customer_user();
	});

	function search_customer_user(){
		//$("#title").html('Search By Customer');

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
                { width: 1, targets: 3 },
                { width: 1, targets: 4 },
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
                      "url": "<?=base_url()?>Customer/Dtable_CUA_Customer_ViewList", 
                      "type": "POST",
                      deferRender: true
                  },
            columns: [
                {"data": "other_id",render:editIcon},
                {"data": "username"},
                {"data": "first_name"},
                {"data": "email"},
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



	function editUser_Customer(id)
	{
		var base_url = "<?= base_url()?>";
		window.location.href = base_url+'Customer/CMC_Form/'+id;
	}

	function editUser_CustomerUser(id)
	{
		var base_url = "<?= base_url()?>";
		window.location.href = base_url+'Customer/CMC_Form_Customer/'+id;
	}

	function cancel()
	{
		location.reload();
	}
</script>
  

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
</style>