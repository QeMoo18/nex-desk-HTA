<link rel="stylesheet" href="<?= base_url()?>/asset_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<div class="row">
            <div class="col-md-2">
                <div class="form-group">
                <a href="<?=base_url()?>Report/Register_Report"><button class="btn btn-success btn-block"> Add Report</button></a>
                <br>
                <a href="<?=base_url()?>menu/overview/report"><button class="btn btn-success btn-block"> Back </button></a>
                </div>
            </div>

			<div class="col-md-7">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Report Overview</b></h3>
		          </div>
		          <div class="box-body">
		          	<table id="mytable2" class="table table-bordered table-striped">
		            	<thead>
		            		<tr>

						    	<th>Title</th>
						    	<th>Description</th>
						    	<th>Type</th>
						    	<th>Date Created</th>     
								<th><center>Delete</center></th>
								<th><center>Run</center></th>
							</tr>
						</thead>
						<tbody id="dataList">	            
				        </tbody>
			        </table>
				  </div>
				</div>
			</div>

			<div class="col-md-3 hidden-xs">
				<div class="col-md-11">
					<?= lookup_widget(); ?>
				</div>
				<div class="col-md-1"> </div>		        
			</div>

		</div>
	</section>
</div>



<script src="<?=base_url()?>asset_admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>asset_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function (){
		list_all_group();
	})

	$(function () {
	    $("#mytable2").DataTable()
	})

	function list_all_group(){
		
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
                return  ' <center><a onclick="run('+data+');" title="View Details"> <i class="fa fa-paper-plane" /> </i></a></center> ';
            }
            return data;
        };


        var delIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <center><a onclick="delUser('+data+');" title="Delete"> <i class="fa fa-trash" /> </i></a></center> ';
            }
            return data;
        };

        var typeReport = function ( data, type, row ) {
            if ( type === 'display' ) {

            	if(data=='1'){
            		return 'Reason For Outage';
            	} else if(data=='2'){
            		return 'Tracker Ticket';
            	} else if(data=='3'){
            		return 'Statistic Of Circuit Fault Report';
            	} else if(data=='4'){
            		return 'Statistic Of Backup Line';
            	} else if(data=='5'){
            		return 'Number Of Occurence Outage';
            	} else if(data=='6'){
            		return 'Total Hour Of Outage';
            	}
            }
            return data;
        };
        
        

        var t = $("#mytable2").dataTable({

			destroy: true,
            searching: false,
            "scrollX": true, //tambah scroll
            responsive: true, // tambah responsive

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
            "bInfo" : true,
            "paging":   true,
            ajax: {
                      data: send_param,
                      "url": "<?=base_url()?>Report/Dtable_List_Report", 
                      "type": "POST"
                  },
            columns: [
                // {
                //     "data": "id_group",
                //     "orderable": false
                // }, 
                //id,report_type,report_title,report_description,created_date
                
                {"data": "report_title"},
                {"data": "report_description"},
                {"data": "report_type",render:typeReport},
                {"data": "created_date"},
                {"data": "report_id",render:delIcon},
                {"data": "id",render:editIcon}

            ],
            order: [[5, 'desc']],
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

	function run(id)
	{
		var base_url = "<?= base_url()?>";
		window.location.href = base_url+'Report/Report_Run/'+id;
	}

    function delUser(id)
    {
        
       
        $("html, body").animate({ scrollTop: 0 }, "slow");
        $("#myModal").modal('show');
        $("#modal_title").html('Confirmation to delete');
        $("#modal_contain").html('Are you sure to delete');
        $("#confirm").click(function (){
            delete_report(id);
        });


    }

    function delete_report(id)
    {
        var data =  {
                        "id" : id
                        
                    }

        $.ajax({
                    url: "<?= base_url() ?>Report/delete_report",
                    type: "POST",
                    dataType: "html",
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                        location.reload();
                    }
            });
    }
</script>  