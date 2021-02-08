
<?php $id = $this->uri->segment('3')?>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url()?>asset_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 

    

		<div class="row">
			<div class="col-md-9 hidden-xs"><?= lookup_navbar_ticket_master(); ?></div>
		</div>

    <div align="right">
          <a href="<?= base_url()?>/Ticket/MS_Overview_Open">
              <button type="button" class="btn btn-default">
                  <span class="glyphicon glyphicon-list-alt"></span> List Open Ticket
              </button>
          </a>
          | 
          <a href="<?= base_url()?>/Ticket/MS_Overview_Closed">
              <button type="button" class="btn btn-default">
                  <span class="glyphicon glyphicon-eye-close"></span> Close Ticket
              </button>
          </a>
    </div>
    
		<h5> Detail Master Ticket </h5>
		<div class="row">
			<div class="col-md-9">
				    <h5 class="box-title"> <b>Ticket#<?=$id ?> - <span id="subject"> <?= subject_note_master($id); ?> </span> </b> </h5>
		        <div class="row">
			        <?= time_ticket(); ?>
		        </div>


				<div class="box box-success" id="topmen">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Detail Ticket</b> | <a onclick="view_all_state();"> <i class="fa fa-sticky-note" aria-hidden="true"></i> View All State </a></h3>
		          </div>
		          <div class="box-body">
		          	<div class="col-md-8">
			          	<table id="mytable2" class="table table-bordered table-striped">
			            	<thead>
			            		<tr>

							    	<th>No</th>        
								
							    	<th>State Type</th>        
								
							    	<th>Note</th>        
								
							    	<th>Created</th>        
								
							    	<th>Agent</th>        
					
								</tr>
							</thead>
							<tbody id="dataList">	            
				            </tbody>
				        </table>

				        <!-- Details -->
				        <br><br>
				        <div class="well" id="list_note" style="display: none">
				        	Detail Of 1st Level/Note
				        </div>
				        <!-- END -->	

			        </div>
			        <div class="col-md-4">
			        	<?php widget_ticket_master(); ?> 	 
			        </div>
				  </div>
				</div>
			</div>
			<div class="col-md-3 hidden-xs">
                <div class="col-md-11"> <?= lookup_widget_master(); ?> </div>
                <div class="col-md-1"> </div>
            </div>
		</div>
	</section>
</div>

<script src="<?= base_url()?>asset_admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>asset_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">

	$(document).ready(function (){
		var xoxo = "<?= $this->uri->segment('4')?>";
		if(xoxo==='fl'){
			//alert('You need created final level first !');
			$("#content_text").html('You need created final level first !');
			$("#myModal2").modal('show');
		}

		if(xoxo==='lf'){
			//alert('Final level already !');
			$("#content_text").html('Final level already !');
			$("#myModal2").modal('show');
		}
	});	

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

        var id_ticket = "<?= $this->uri->segment(3)?>";
        var send_param =  {
        					'id_ticket':id_ticket,
                            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                          };

        var editIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <a onclick="editUser('+data+');" title="View Details"> <i class="fa fa-paper-plane" /> </i></a> ';
            }
            return data;
        };


        var detailNote = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <a onclick="detailNote('+data+');" title="Note"> View Note </a> ';
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
                      "url": "<?=base_url()?>Ticket/Dtable_DetailTicket_ViewList_Master", 
                      "type": "POST"
                  },
            columns: [
                // {
                //     "data": "id_group",
                //     "orderable": false
                // },
                {"data": "id_ticket"},
                {"data": "type_note"},
                {"data": "id",render:detailNote},
                {"data": "created_date"},
                {"data": "first_name"}

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

	function detailNote(id)
	{
		var data = 	{
						
						"id":id,
						'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
					}

		$.ajax({
		        url: "<?= base_url() ?>Ticket/viewnote_master",
		        type: "POST",
		        dataType: "html",
		        data: data,
		        beforeSend: function() {

		        },
		        success: function(response){
		        	$("#list_note").show();
		        	$("#list_note").html('<b> View Note : </b><br><br>'+response);
		        }
		});
	}

</script>
  


<style type="text/css">
	.panel-heading
	{
	    border-top-left-radius: inherit; 
	    border-top-right-radius: inherit;
	}
</style>

<!-- Modal -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content panel-warning">
      <div class="modal-header panel-heading">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">System Alert ! </h4>
      </div>
      <div class="modal-body">
        <p id="content_text"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<script type="text/javascript">

	function view_all_state()
	{
    $("html, body").animate({ scrollTop: 0 }, "slow");
     
   //$("#topmen").scrollTop();
		get_view_all_state();
    return false;
	}

	function get_view_all_state()
	{
		var id = "<?= $this->uri->segment(3); ?>";
		var data = 
                    {
                    	'id':id,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ticket/view_all_state_master',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                            	$("#list").html(response);
                            	$("#modalAllState").modal('show');
                            }
                          });

    }

</script>


<div id="modalAllState" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content panel-primary">
      <div class="modal-header panel-heading">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-list" aria-hidden="true"></i> List All Ticket State</h4>
      </div>
      <div class="modal-body">
        


			<div id="list"> </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<style type="text/css">
	
.modal {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  overflow: hidden;
}

.modal-dialog {
  position: fixed;
  margin: 0;
  width: 100%;
  height: 100%;
  padding: 0;
}

.modal-content {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  border: 2px solid #3c7dcf;
  border-radius: 0;
  box-shadow: none;
}

.modal-header {
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  height: 50px;
  padding: 10px;
  background: #6598d9;
  border: 0;
}

.modal-title {
  font-weight: 300;
  font-size: 2em;
  color: #fff;
  line-height: 30px;
}

.modal-body {
  position: absolute;
  top: 50px;
  bottom: 60px;
  width: 100%;
  font-weight: 300;
  overflow: auto;
}

.modal-footer {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  height: 60px;
  padding: 10px;
  background: #f1f3f5;
}

</style>