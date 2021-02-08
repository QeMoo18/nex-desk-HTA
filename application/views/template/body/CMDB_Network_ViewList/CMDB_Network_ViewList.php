

<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url(); ?>asset_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="content-wrapper">
	<section class="content">
        <?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i>  Network Management </h5>
		<div class="row">
		    <?php $role =  $this->session->userdata('role_name'); ?>
		    
		    <?php if($role=='Admin'){ ?>
			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>CMDB/CMDB_Network_Add"><button class="btn btn-success btn-block"> + Add Network </button></a>
				</div>
			</div>
			<?php } ?>
			
			<?php if($role=='Admin'){ ?>
			    <div class="col-md-10">
			<?php } else { ?>
			    <div class="col-md-12">
			<?php } ?>
			

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>View List Network</b></h3>
		          </div>
		          <div class="box-body">
		          	<table id="mytable2" class="table table-bordered table-striped">
		            	<thead>
		            			<tr>

							    	<th>Name</th>        
								
							    	<th>Deployment State</th>        
							    	
							    	<th>Description</th>
								
							    	<th>Incident State</th>        
								
							    	<th>Changed</th>        
								
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
                return  ' <center><a onclick="edit('+data+');" title="Edit"> <i class="fa fa-edit" /> </i></a></center> ';
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
                      "url": "<?=base_url()?>CMDB/Dtable_CMDB_Network_ViewList", 
                      "type": "POST"
                  },
            columns: [
                {"data": "name"}, //"name, deployment_state, incident_state, changed, created, other_id";
                {"data": "deployment_state"},
                {"data": "description"},    //new
                {"data": "incident_state"},
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



	function edit(id)
	{
		var base_url = "<?= base_url()?>";
		window.location.href = base_url+'CMDB/CMDB_Network_EditDetails/'+id;
	}


	function cancel()
	{
		location.reload();
	}
</script>
  