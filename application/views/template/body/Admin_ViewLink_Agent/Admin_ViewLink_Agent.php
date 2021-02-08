<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>asset_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="content-wrapper">
	<section class="content">
        <?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Manage Agent - Group Relations </h5>
		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
				<a href="<?= base_url()?>Admin/Add_Agent"> <button class="btn btn-success btn-block"> + Add Agent </button> </a>
				</div>
                <div class="form-group">
                <a href="<?= base_url()?>Admin/GroupManagement"> <button class="btn btn-success btn-block"> + Add Group </button> </a>
                </div>
                <div class="form-group">
                <a href="<?= base_url()?>Admin/Admin_LinkModule"> <button class="btn btn-success btn-block"> + Access Module </button> </a>
                </div>
			</div>

			<div class="col-md-10">

				<div class="box box-success">
		          <div class="box-header with-border">
		            
                    
                    <div class="row">
                        <div class="col-md-8"> 
                            <label class="box-title"> <b>View List Agent</b></label>
                        </div>
                        <div align="right" class="col-md-4"> 
                            <select class="form-control" name="select_group" id="select_group">
                                <option value="">-- Select Group --</option>
                                <?= lookup_group() ?>
                            </select> 
                        </div>
                    </div>

		          </div>
		          <div class="box-body">
		          	<table id="mytable2" class="table table-bordered table-striped">
		            	<thead>
		            		<tr>
		            			<th>Bil</th>  

						    	<th>Username</th>        
							
						    	<th>Name</th>        
							
						    	<th>Email</th>        
							
						    	<th>Last Login</th>        
							
						    	<th>Changed</th>        
							
						    	<th>Created</th>        
								
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

            <!-- <div class="col-md-3 hidden-xs">

                <div class="col-md-11"><?//= lookup_widget(); ?></div>
                <div class="col-md-1"> </div>
                
            </div> -->
		</div>
	</section>
</div>

<script src="<?=base_url()?>asset_admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>asset_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
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
                return  ' <center><a onclick="editUser('+data+');" title="Edit User"> <i class="fa fa-edit" /> </i></a></center> ';
            }
            return data;
        };

        var delIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
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
                      "url": "<?=base_url()?>Admin/Dtable_Agent_ViewList", 
                      "type": "POST"
                  },
            columns: [
                {
                    "data": "userid",
                    "orderable": false
                },
                {"data": "username"},
                {"data": "first_name"},
                {"data": "email"},
                {"data": "last_login"},
                {"data": "changed"},
                {"data": "created"},
                {"data": "userid",render:editIcon},
                {"data": "userid",render:delIcon}

            ],
            order: [[1, 'asc']],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
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
		window.location.href = base_url+'Admin/Agent_EditDetails/'+id;
	}

    function delUser(id)
    {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        $("#myModal").modal('show');
        $("#modal_title").html('Confirmation To Delete');
        $("#modal_contain").html('Are you sure to delete ?');

        $("#confirm").click(function (){
            var other_id = id;
            var nama_table = 'agent';
            var where_column = 'userid';
            deletenow(other_id,nama_table,where_column);
        });
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
                        url: '<?= base_url() ?>Admin/delete_data',
                        type: 'POST',
                        dataType: 'html',
                        data: data,
                        beforeSend: function() {

                        },
                        success: function(response){
                            //alert('Success Delete !');
                            update_status_user(other_id);
                            location.reload();
                        }
                });

    }

    function update_status_user(other_id)
    {
        var data =  {
                         'other_id':other_id,
                         '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                        
                $.ajax({
                        url: '<?= base_url() ?>Login/update_status_user',
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

    /* Modal Confirmation */

    /* END */


    $("#select_group").change(function(){
        var group = $("#select_group").val();
        get_agent(group);
    });

    function get_agent(group)
    {
       
        
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
                            'group':group,
                            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                          };

        var editIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <center><a onclick="editUser('+data+');" title="Edit User"> <i class="fa fa-edit" /> </i></a></center> ';
            }
            return data;
        };

        var delIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <center><a onclick="delUser('+data+');" title="Delete"> <i class="fa fa-trash" /> </i></a></center> ';
            }
            return data;
        };

        var t = $("#mytable2").dataTable({

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
                      "url": "<?=base_url()?>Admin/Dtable_Agent_ViewList_By_Group", 
                      "type": "POST"
                  },
            columns: [
                {
                    "data": "userid",
                    "orderable": false
                },
                {"data": "username"},
                {"data": "first_name"},
                {"data": "email"},
                {"data": "last_login"},
                {"data": "changed"},
                {"data": "created"},
                {"data": "userid",render:editIcon},
                {"data": "userid",render:delIcon}

            ],
            order: [[1, 'asc']],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
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

