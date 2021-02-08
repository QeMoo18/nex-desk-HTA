

<!-- DataTables -->
	<link rel="stylesheet" href="<?=base_url()?>asset_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Customer Administrator </h5>
		<div class="row">

			<div class="col-md-12" id="div_list" >

				<div class="col-md-2">

                    <div class="form-group">
                       <a href="<?=base_url()?>Customer/CA_FormCustomer"><button class="btn btn-success btn-block"> + Add Customer  </button></a>
                    </div>

				</div>
				<div class="col-md-10">
					<div class="box box-success">
			          <div class="box-header with-border">
			            <h3 class="box-title"> <b><span id="title"> View Customer Administrator </span></b></h3>
			          </div>
			          <div class="box-body">
			          	<table id="mytable2" class="table table-bordered table-striped">
			            	<thead>
			            			<tr>
							 
								    	<th>CustomerID</th>        
									
								    	<th>Name</th>        
									
								    	<th>Validity</th>        
									
								    	<th>Changed</th>        
									
								    	<th>Create</th>        
									
								    	<th><center>Action</center></th>        
					
									</tr>
							</thead>
							<tbody id="dataList">	            
				            </tbody>
				        </table>
					  </div>
					</div>
				</div>

				<!-- <div class="col-md-3 hidden-xs">
					<div class="col-md-11"><?//= lookup_widget(); ?> </div>
          			<div class="col-md-1"> </div>		        
				</div> -->

			</div>
		</div>
	</section>
</div>


<script src="<?=base_url()?>asset_admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>asset_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(function () {
	    $("#mytable2").DataTable()
	});

	$(document).ready(function (){
		search_customer();
	});	

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
                            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                          };

        var editIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <center><a onclick="editUser_Customer('+data+');" title="Edit User"> <i class="fa fa-edit" /> </i></a></center> ';
            }
            return data;
        };

        var t = $("#mytable2").dataTable({

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
                {"data": "customerID"},
                {"data": "customer"},
                {"data": "valid"},
                {"data": "changed"},
                {"data": "created"},
                {"data": "other_id",render:editIcon}

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
                  $('table#mytable2 td').bind('mouseenter', function () { $(this).parent().children().each(function(){$(this).addClass('datatablerowhighlight');}); });
                  $('table#mytable2 td').bind('mouseleave', function () { $(this).parent().children().each(function(){$(this).removeClass('datatablerowhighlight');}); });
            }
        });
	}



	function editUser_Customer(id)
	{
		var base_url = "<?= base_url()?>";
		window.location.href = base_url+'Customer/CA_EditDetails/'+id;
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
  