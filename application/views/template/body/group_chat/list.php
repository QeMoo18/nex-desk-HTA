<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url(); ?>asset_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="content-wrapper">
	<section class="content">
        <?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Group Chat Management </h5>
		<div class="row">
            <?php $role =  $this->session->userdata('role_name'); ?>
		    
			<div class="col-md-2">
				<div class="form-group">
				<a onclick="create_group();"><button class="btn btn-success btn-block"> + Add Group</button></a>
				</div>
			</div>

			
	
			    <div class="col-md-10">


				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>List Group Discussion</b></h3>
		          </div>
		          <div class="box-body">
		          	<table id="mytable2" class="table table-bordered table-striped">
		            	<thead>
		            		<tr>

							    	<th>Group</th>        
								
							    	<th>Owner</th>    

                                    <th><center>Key</center></th> 

							    	<th>Created</th>        
								
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
	});

	$(document).ready(function (){
		search_network();
	});	

	function search_network(){

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
                return  ' <center><a onclick="edit('+data+');" title="Join Conversation"> <i class="fa fa-users" /> </i></a></center> ';
            }
            return data;
        };


        var keyIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <center>'+data+'</center> ';
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
                      "url": "<?=base_url()?>admin/Dtable_Chat_List", 
                      "type": "POST"
                  },
            columns: [
                {"data": "group_name"}, //"name, deployment_state, incident_state, changed, created, other_id";
                {"data": "first_name"},
                {"data": "public_key",render:keyIcon},
                {"data": "created_date"},
                {"data": "id_chat",render:editIcon}

            ],
            order: [[2, 'desc']],
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



	function edit(id)
	{

        var data = 
                    {
                        'id':id,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>admin/chat_check_member',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                                if(response=='1'){
                                    $("#id_chat").val(id);
                                    $("#join_group").modal('show');
                                    $("#group_key").val('');
                                } else {
                                    $("#group_key").val(response);
                                    $("#id_chat").val(id);
                                    $("#goChat").submit();
                                }
                                
                            }
                    });

        
	}


	function cancel()
	{
		location.reload();
	}

    function create_group()
    {
        $("#create_group_modal").modal('show');
    }
</script>
  



<!-- Modal -->
<div id="create_group_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form action="<?= base_url()?>admin/create_my_group" method="post">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Create Your Group Chat</h4>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="group_name" required placeholder="Enter Your Group Name" name="">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="group_key" required placeholder="Enter Your Group Key" name="">
                </div>
                <div class="col-md-6" style="padding-top: 10px;">
                    <span style="font-size: 11px; color: #06881b;"><input type="checkbox" name="public_key" value="1"> Public Your Key </span>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-default">Submit</button>
          </div>
        </div>
    </form>

  </div>
</div>




<!-- Modal -->
<div id="join_group" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form action="<?= base_url()?>admin/check_group" method="post" id="goChat">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Permission To Join Group</h4>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="group_key" id="group_key" required placeholder="Enter Your Group Key">
                </div>
                <div class="col-md-6">
                    <input type="hidden" class="form-control" name="id_chat" id="id_chat" required>
                </div>
            </div>
            <div class="row" style="padding-top: 30px;">
                <div class="col-md-12">
                    <span style="font-family: serif;color: chocolate;">* if you do not know the group key please ask the owner group..</span>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-default">Submit</button>
          </div>
        </div>
    </form>

  </div>
</div>