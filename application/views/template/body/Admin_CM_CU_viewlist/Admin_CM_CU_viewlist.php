

<!-- DataTables -->
	<link rel="stylesheet" href="<?=base_url()?>asset_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="content-wrapper">
	<section class="content">
        <h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Customer User Management</h5>
		<div class="row">
            <div class="col-md-2"> 
                <div class="form-group">
                    <a href="<?= base_url()?>admin/admin_cm_customeruser"> 
                        <button class="btn btn-danger btn-block"> + Add Customer User</button>
                    </a>
                </div>
            </div>
			<div class="col-md-10">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>View Customer User</b></h3>
		          </div>
		          <div class="box-body">
		          	<table id="mytable2" class="table table-bordered table-striped">
		            	<thead>
							<tr>
						    	<th>Username</th>        
						    	<th>Name</th>        
						    	<th>Email</th>        
						    	<th>CustomerID</th>        
						    	<th>Validity</th> 
						    	<th>Changed</th>     
						    	<th>Create</th>       
						    	<th><center>Edit</center></th>        
						    	<th><center>Delete</center></th>        
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
                return  ' <center><a onclick="editUser('+data+');" title="Edit"> <i class="fa fa-edit" /> </i></a></center> ';
            }
            return data;
        };

        var deleteIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <center><a onclick="delIcon('+data+');" title="Delete"> <i class="fa fa-trash" /> </i></a></center> ';
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
                      "url": "<?=base_url()?>Admin/Dtable_CM_CustomerUser_ViewList", //CREATE FUNCTION DEKAT CONTROLLER 
                      "type": "POST"
                  },
            columns: [
            			// TEMPAT KAU NAK SET COLUMN 
		                {"data": "username"},
		                {"data": "first_name"},
		                {"data": "email"},
		                {"data": "customerID"},
		                {"data": "valid"},
		                {"data": "changed"},
		                {"data": "created"},
		                {"data": "other_id",render:editIcon},
		                {"data": "other_id",render:deleteIcon}

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
	});


	function editUser(id)
	{
		var base_url = "<?= base_url()?>";
		window.location.href = base_url+'Admin/Admin_CM_CU_editdetails/'+id;
	}

	//START DELETE 
    function delIcon(id)
    {

        $("#myModal").modal('show');
        $("#modal_title").html('Confirmation to delete');
        $("#modal_contain").html('Are you sure to delete');
        $("#confirm").click(function (){

                // PASS DIA PUNYA ID
                //alert(id); //check id

                // ini data id 
                var data =  {       
                                'other_id':id,
                                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                            }

                $.ajax({
                            url: '<?= base_url() ?>Admin/Delete_CM_CustomerUser_ViewList', //create nama function delete controller
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {

                            },
                            success: function(response){
                                //alert("Data Deleted !");
                                location.reload();
                            }
                    });

        });

        
        

    }
</script>
<!-- end -->

<style type="text/css">
    /* style for selected */
    .datatablerowhighlight {
        background-color: #ECFFB3 !important;
    }
</style>
  
  