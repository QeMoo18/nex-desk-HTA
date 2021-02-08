

<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url()?>asset_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Overview Status View (closed) </h5>
		<div class="row">
			<div class="col-md-12">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b><i class="fa fa-users" aria-hidden="true"></i> List Ticket By Closed</b></h3>
		          </div>
		          <div class="box-body">
		          	<table id="mytable2" class="table table-bordered table-striped">
		            	<thead>
		            		<tr>

								<th>Ticket No</th>        

								<th>Subject</th>        

                                <th>Category</th>

								<th>State</th>

                                <th>State Type</th>          

								<th>Ages</th>        

								<th>Changed</th>        

								<th>Owner</th> 

                                <th>Responsible</th>  

                                <th><center>Status</center></th>

								<th><center>Detail</center></th>        
				
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
                return  ' <a onclick="editUser('+data+');" title="Edit User"> <i class="fa fa-edit" /> </i></a> ';
            }
            return data;
        };


       var detailTicket = function ( data, type, row ) {
            if ( type === 'display' ) {
                var data = "'"+data+"'";
                return  ' <center><a onclick="detailTicket('+data+');" title="Edit User"> <i class="fa fa-edit" /> </i></a></center> ';
            }
            return data;
        };



        var delIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <a onclick="delUser('+data+');" title="Delete"> <i class="fa fa-trash" /> </i></a> ';
            }
            return data;
        };

        var status_lock = function ( data, type, row ) {
        if ( type === 'display' ) {

            var id_ticket = "'"+row.id_no+"'";


            if(data=='0'){
                data='<center><a onclick="detailTicket('+id_ticket+');" title="Unlock ticket"><i class="fa fa-unlock" aria-hidden="true"></i></a></center>';
            } else {
                data='<center><a onclick="confirm_lock('+id_ticket+')" title="Lock Ticket"><i class="fa fa-lock" aria-hidden="true"></i></a></center>';
            }
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
            ajax: {
                      data: send_param,
                      "url": "<?=base_url()?>Ticket/Dtable_Ticket_Closed", 
                      "type": "POST",
                      deferRender: true
                  },
            columns: [
                // {
                //     "data": "id_group",
                //     "orderable": false
                // },
                {"data": "id_no"},
                {"data": "title"},
                {"data": "category"},
                {"data": "status_ticket"},
                {"data": "current_state"},
                {"data": "created_date",render:ages},
                {"data": "updated_date",render:ages},
                {"data": "ticket_owner"},
                {"data": "responsibility"},
                {"data": "status_lock",render:status_lock},
                {"data": "id_ticket",render:detailTicket}

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

	function detailTicket(id)
	{
        var rand = "<?= rand().rand() ?>";
		var base_url = "<?= base_url()?>";
		window.location.href = base_url+'Ticket/Ticket_DetailTicket/'+id+'/cl/'+rand;
	}


    function confirm_lock(id_ticket)
    {

        var txt;
        var r = confirm("Are you sure to unlock ?");
        if (r == true) {
          txt = "You pressed OK!";
          inactive_lock(id_ticket)
        } else {
          txt = "You pressed Cancel!";
        }
    }


    function inactive_lock(id_ticket)
    {
        var data =  {       
                                'id_ticket':id_ticket,
                                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                            }

        $.ajax({
                    url: '<?= base_url() ?>Admin/inactive_lock', //create nama function delete controller
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                        load_data();
                    }
              })
    }


</script>
  


<script src="<?= base_url()?>asset/js/jquery.session.min.js"></script>

<script type="text/javascript">

    $(document).ready(function (){
        $("select[name='mytable2_length']").on('change', function() {
            //console.log('a');
            var sort =  $("select[name='mytable2_length']").val();
            $("#id_sort_hidden").val(sort);
        });
    });

    
    $(function() {

      var session = $.session.get("myVar");
      if(session){
        //$("select[name='mytable2_length']").val(session);
        console.log(session);

        $("select[name='mytable2_length']").val(session).trigger('change');

      }
       // alert($.session.get("myVar"));
    });
</script>