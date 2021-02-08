<!-- DataTables --><link rel="stylesheet" href="<?= base_url()?>/asset_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h3> Overview Mobile View </h3>
		<div class="row">
			<div class="col-md-12">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Overview Mobile View (Order)</b></h3>
		          </div>
		          <div class="box-body">
		          	<table id="mytable2" class="table table-bordered table-striped" width="100%">
		            	<thead>
		            		<tr>

						    	<th>Subject</th>     
							
						    	<th>Description</th>   

                                <th>Type</th>       
							     
						    	<th>From</th>        
							    
                                <th>Created</th>

						    	<th>New Ticket</th>  

                                <th>Cancel</th>        
				
							</tr>
						</thead>
						<tbody id="dataList">	            
				        </tbody>
			        </table>
				  </div>
				</div>
			</div>
			<!-- <div class="col-md-3 hidden-xs">
                <div class="col-md-11"> <?//= lookup_widget(); ?> </div>
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

        var segment = "<?= $this->uri->segment(3)?>";

        var send_param =  {
                            'segment':segment,
                            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                          };

        var editIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <a onclick="editUser('+data+');" title="Edit User"> <i class="fa fa-edit" /> </i></a> ';
            }
            return data;
        };


       var newTicket = function ( data, type, row ) {
            if ( type === 'display' ) {
                var data = "'"+data+"'";
                return  ' <a onclick="newTicket('+data+');" title="Create New Ticket"> <i class="fa fa-sign-in" /> </i></a> ';
            }
            return data;
        };



        var cancelTicket = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <a onclick="cancelTicket('+data+');" title="Cancel Ticket"> <i class="fa fa-trash" /> </i></a> ';
            }
            return data;
        };

        var ages = function ( data, type, row ) {
            if ( type === 'display' ) {
                var minit = data;
                var hour;
                hour = Math.floor(data/3600);
                var minute;
                minute = Math.floor((data/60)%60);
                var second;
                second = Math.floor(data%60);
                data = hour+' : '+ minute+' : '+second;
            }
            return data;
        };
        
        
        var t = $("#mytable2").dataTable({

			"columnDefs": [
				{ "searchable": false, "targets": 3 },
                { "searchable": false, "targets": 4 }
			], //disable search for age

            // for responsive
            responsive: true,
            scrollY: true,
            scrollX: true,
            scroller: true,
            deferRender:true,


            destroy: true,
            searching: true,
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
            ajax: {
                      data: send_param,
                      "url": "<?=base_url()?>Ticket/Dtable_Ticket_Mobile", 
                      "type": "POST",
                      deferRender: true
                  },
            columns: [
                // {
                //     "data": "id_group",
                //     "orderable": false
                // },
                {"data": "title"},
                {"data": "description"},
                {"data": "type_asset"},
                {"data": "created_by"},
                {"data": "datetime"},
                {"data": "id",render:newTicket},
                {"data": "id",render:cancelTicket}

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

	function newTicket(id)
	{
	    //alert(id);
		var base_url = "<?= base_url()?>";
		window.location.href = base_url+'Ticket/Ticket_MobileNewTicket/'+id;
	}


</script>
	 			  

<?php 
	$segment = $this->uri->segment(3);
	if(!empty($segment)){
?>
	<script type="text/javascript">
		$(document).ready(function (){
			var id = "<?= $segment; ?>";
			var url = "<?= base_url()?>Ticket/Ticket_QueuView/"+id;
			//alert(url);
			go(url);
		});

		function go(url)
		{
			window.open(url, '1');
			return false;
		}
	</script>

<?php } ?>