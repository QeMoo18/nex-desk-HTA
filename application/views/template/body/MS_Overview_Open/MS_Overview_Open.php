
<div class="pageheader hidden-xs">
    <h3><i class="fa fa-list"></i> List Ticket : Master Ticket </h3>
    <div class="breadcrumb-wrapper">
        <span class="label" style="padding-right: 0px;"><i class="fa fa-cog" aria-hidden="true" style="border: 2px solid #f2f7f8;padding-right: 0px;"></i></span>
        <ol class="breadcrumb">
            <li> <a href="<?=base_url()?>Ticket/MS_New_Master_Ticket"> Create Master </a> </li>
            <li> <a href="<?=base_url()?>Ticket/MS_New_Master_Ticket"> Master Open </a> </li>
            <li> <a href="<?=base_url()?>Ticket/MS_Overview_Closed"> Master Close </a> </li>
        </ol>
    </div>
</div>


<!-- DataTables --><link rel="stylesheet" href="<?= base_url()?>/asset_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="row">
    <div class="content-wrapper">
    	<section class="content">
    		
    		<div class="row">
    			<div class="col-md-12">

    				<div class="box box-success">
    		          <div class="box-header with-border">
    		            <h3 class="box-title"> <b><i class="fa fa-list-alt" aria-hidden="true"></i> Master Ticket</b></h3>
    		          </div>
    		          <div class="box-body" style="padding-bottom: 30px;">
    		          	<table id="mytable2" class="table table-bordered table-striped">
    		            	<thead>
    		            		<tr>

                                    <th><center></center></th>

    						    	<th>Ticket No</th>        
    							
    						    	<th>Subject</th>        
    							
    						    	<th>State</th>        
    							    
                                    <th>State Type</th>  

    						    	<th>Ages</th>        
    							
    						    	<th>Changed</th>        
    							
    						    	<th>Owner</th>  

    						    	        
    				
    							</tr>
    						</thead>
    						<tbody id="dataList">	            
    				        </tbody>
    			        </table>
    				  </div>
    				</div>


                    <div class="box box-success">
                      <div class="box-header with-border">
                        <h3 class="box-title"> <b><i class="fa fa-list-alt" aria-hidden="true"></i> Single Ticket</b></h3>
                      </div>
                      <div class="box-body" style="padding-bottom: 30px;">
                        <table id="mytable_x" class="table table-bordered table-striped">
                            <thead>
                                <tr>

                                    <th><center></center></th> 

                                    <th>Ticket No</th>        
                                
                                    <th>Subject</th>  

                                    <th>Category</th>        
                                
                                    <th>State</th>        
                                    
                                    <th>State Type</th>  

                                    <th>Ages</th>        
                                
                                    <th>Changed</th>        
                                
                                    <th>Owner</th>  

                                           
                    
                                </tr>
                            </thead>
                            <tbody id="dataList_x">               
                            </tbody>
                        </table>
                      </div>
                    </div>


    			</div>
    		</div>
    	</section>
    </div>
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
                      "url": "<?=base_url()?>Ticket/Dtable_Ticket_Master", 
                      "type": "POST"
                  },
            columns: [
                // {
                //     "data": "id_group",
                //     "orderable": false
                // },

                {"data": "id_ticket",render:detailTicket},
                {"data": "id_no"},
                {"data": "title"},
                {"data": "status_ticket"},
                {"data": "current_state"},
                {"data": "created_date",render:ages},
                {"data": "updated_date",render:ages},
                {"data": "ticket_owner"},

            ],
            order: [[2, 'asc']],
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
		var base_url = "<?= base_url()?>";
		window.location.href = base_url+'Ticket/MS_Detail_Ticket/'+id;
	}


</script>



<script type="text/javascript">
    $(function () {
        $("#mytable_x").DataTable()
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


       var detailTicket2 = function ( data, type, row ) {
            if ( type === 'display' ) {
                var data = "'"+data+"'";
                return  ' <center><a onclick="detailTicket2('+data+');" title="Edit User"> <i class="fa fa-edit" /> </i></a></center> ';
            }
            return data;
        };



        var delIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <a onclick="delUser('+data+');" title="Delete"> <i class="fa fa-trash" /> </i></a> ';
            }
            return data;
        };

        var ages2 = function ( data, type, row ) {
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
        

        var t = $("#mytable_x").dataTable({

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
                      "url": "<?=base_url()?>Ticket/Dtable_Ticket", 
                      "type": "POST"
                  },
            columns: [
                // {
                //     "data": "id_group",
                //     "orderable": false
                // },

                {"data": "id_ticket",render:detailTicket2},
                {"data": "id_no"},
                {"data": "title"},
                {"data": "category"},
                {"data": "status_ticket"},
                {"data": "current_state"},
                {"data": "created_date",render:ages2},
                {"data": "updated_date",render:ages2},
                {"data": "ticket_owner"},

            ],
            order: [[2, 'asc']],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                //$('td:eq(0)', row).html(index);
            },
            // for selected
            "fnDrawCallback": function(){
                  $('table#mytable_x td').bind('mouseenter', function () { $(this).parent().children().each(function(){$(this).addClass('datatablerowhighlight');}); });
                  $('table#mytable_x td').bind('mouseleave', function () { $(this).parent().children().each(function(){$(this).removeClass('datatablerowhighlight');}); });
            }
        });
    });

    function detailTicket2(id)
    {
        var base_url = "<?= base_url()?>";
        window.location.href = base_url+'Ticket/Ticket_DetailTicket/'+id;
    }


</script>
	 			  



<style type="text/css">

    .pageheader {
        padding: 13px;
        position: relative;
        /* background: #ffffff; */
        background: linear-gradient(to right, rgb(242, 247, 248) 10%, rgb(31, 114, 162) 100%);
        background: -moz-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 114, 162) 100%);
        background: -webkit-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 114, 162) 100%);
        background: linear-gradient(to right, rgb(242, 247, 248) 10%, rgb(242, 247, 248) 100%);
        margin: -20px -5px 24px -5px;
        /* padding: 35px 15px 100px 20px; */
        color: #353535;
        box-shadow: 0 1px 2px 0 rgb(234, 234, 234);
        padding-left: 30p;
    }

    .pageheader .fa, .pageheader .glyphicon {
        font-size: 12px;
        margin-right: 5px;
        padding: 6px 7px;
        border: 2px solid #124f76;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;
    }

    .pageheader h3 {
        font-size: 15px;
        color: #165a84;
        letter-spacing: -.5px;
        margin: 0;
    }

    .pageheader .breadcrumb-wrapper .label {
        color: #165a84;
        text-transform: uppercase;
        font-weight: 400;
        display: inline-block;
    }


    .pageheader .breadcrumb li a {
        color: #165983;
    }

    .pageheader .breadcrumb li.active {
        color: #175b86;
    }

    .pageheader .breadcrumb-wrapper {
        position: absolute;
        top: 15px;
        right: 25px;
    }

    .box-header {
        background: #458dbc2b;
    }


</style>