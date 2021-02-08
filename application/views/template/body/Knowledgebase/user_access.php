

<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>asset_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="content-wrapper">
	<section class="content">
        <?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Knowledge Base Management</h5>
		<div class="row">
			<div class="col-md-2">
				<div class="form-group">
				<a onclick="new_user();"><button class="btn btn-success btn-block"> + Add New User</button></a>
				</div>
			</div>
			<div class="col-md-7">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>View User Access</b></h3>
		          </div>
		          <div class="box-body">
		          	<table id="mytable2" class="table table-bordered table-striped">
		            	<thead>
		            		<tr>

							    	<th>Name</th>        

                                    <th><center>Delete</center></th>        
				
							</tr>
						</thead>
						<tbody id="dataList">	            
			            </tbody>
			        </table>
				  </div>
				</div>
			</div>

            <!-- <div class="col-md-3 hidden-xs">
                <?//= lookup_widget(); ?>             
            </div> -->
		</div>
	</section>
</div>

<script src="<?=base_url()?>asset_admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>asset_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(function () {
	    $("#mytable2").DataTable()
	})

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
                var data = "'"+data+"'";
                return  ' <center><a onclick="editUser('+data+');" title="Edit User"> <i class="fa fa-edit" /> </i></a></center> ';
            }
            return data;
        };

        var delIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                var data = "'"+data+"'";
                return  ' <center><a onclick="delUser('+data+');" title="Delete"> <i class="fa fa-trash" /> </i></a></center> ';
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
                      "url": "<?=base_url()?>Knowledgebase/list_user_access", 
                      "type": "POST"
                  },
            columns: [
                // {
                //     "data": "id_group",
                //     "orderable": false
                // },
                {"data": "name"},
                {"data": "id",render:delIcon}

            ],
            order: [[0, 'asc']],
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
		window.location.href = base_url+'Knowledgebase/update_form/'+id;
	}

    function delUser(id)
    {
        $("#myModal_Delete").modal('show');
        $("#id_user_access").val(id);
    }
    
    function deletenow(other_id,nama_table,where_column)
    {
        var data =  {
                         'other_id':other_id,
                         'nama_table':nama_table,
                         'where_column':where_column,
                         '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                        
                $.ajax({
                        url: '<?= base_url() ?>Admin/delete_data_trash',
                        type: 'POST',
                        dataType: 'html',
                        data: data,
                        beforeSend: function() {

                        },
                        success: function(response){
                            //alert('Success Delete !');
                            location.reload();
                        }
                });

    }

    function new_user()
    {
        $("#myModal").modal('show');
    }

    function add_access()
    {
        var user_access = $("#user_access").val();
        var data =  {
                        'user_access':user_access,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                        
                $.ajax({
                        url: '<?= base_url() ?>Admin/add_access',
                        type: 'POST',
                        dataType: 'html',
                        data: data,
                        beforeSend: function() {
                            $("#myModal").hide();
                        },
                        success: function(response){
                            alert('Success Add User !');
                            location.reload();
                        }
                });
    }

    function delete_access()
    {
        var id = $("#id_user_access").val();
        var data =  {
                        'id':id,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                        
                $.ajax({
                        url: '<?= base_url() ?>Admin/delete_access',
                        type: 'POST',
                        dataType: 'html',
                        data: data,
                        beforeSend: function() {
                            $("#myModal_Delete").hide();
                        },
                        success: function(response){
                            alert('Success Delete User !');
                            location.reload();
                        }
                });
    }

</script>

<style type="text/css">
    /* style for selected */
    .datatablerowhighlight {
        background-color: #ECFFB3 !important;
    }
</style>
  

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">User Access</h4>
      </div>
      <div class="modal-body">
        
        <label>Add new user to access add knowledgebased ?</label>
        <input type="text" class="form-control" name="user_access" id="user_access" autofocus list="browsers">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="add_access();">Submit</button>
      </div>
    </div>

  </div>
</div>


<!-- Modal -->
<div id="myModal_Delete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete User Access</h4>
      </div>
      <div class="modal-body">
        
        <label>Are you sure to delete user access ?</label>
        <input type="hidden" name="id_user_access" id="id_user_access">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="delete_access();">Sure</button>
      </div>
    </div>

  </div>
</div>

<datalist id="browsers">
  <?= lookup_user_datalist()?>
</datalist>