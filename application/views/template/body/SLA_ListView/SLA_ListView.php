<div class="pageheader hidden-xs">
    <h3><i class="fa fa-user"></i> Service Level Agreement</h3>
    <div class="breadcrumb-wrapper">
        <span class="label" style="padding-right: 0px;"><i class="fa fa-cog" aria-hidden="true" style="border: 2px solid #f2f7f8;padding-right: 0px;"></i></span>
        <ol class="breadcrumb">
            <li> <a href="<?=base_url()?>Service/Service_ListView"> Services </a> </li> 
        </ol>
    </div>
</div>

<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>asset_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="row" style="padding-bottom: 30px;">
    <div class="content-wrapper">
    	<section class="content">
            
    		<div class="row">
    			<div class="col-md-12">

    				<div class="box box-success">
    		          <div class="box-header with-border">
    		            <h3 class="box-title"> <b>View Service Level Agreement</b></h3>
    		          </div>
    		          <div class="box-body">
    		          	<table id="mytable2" class="table table-bordered table-striped">
    		            	<thead>
    		            		<tr>

                                        <th><center>Edit</center></th>  

                                        <th>Type</th> 

    							    	<th>SLA</th>        
    								
    							    	<th>Service</th>        
    								
    							    	<th>Comment</th>        
    								
    							    	<th>Validity</th>        
    								
    							    	<th>Changed</th>        
    								
    							    	<th>Created</th>        
    									
    										
       	
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
                return  ' <center><a onclick="editUser('+data+');" title="View Details"> <i class="fa fa-paper-plane" /> </i></a></center> ';
            }
            return data;
        };


        var delIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <center><a onclick="delUser('+data+');" title="Delete"> <i class="fa fa-trash" /> </i></a></center> ';
            }
            return data;
        };

        var type_sla = function ( data, type, row ) {
            if ( type === 'display' ) {
                // return  ' <a onclick="delUser('+data+');" title="Delete"> <i class="fa fa-trash" /> </i></a> ';
                if(data=='noc'){
                    data='NOC';
                } else if(data=='hospital'){
                    data='Hospital';
                }
            }
            return data;
        };


        var t = $("#mytable2").dataTable({

            "columnDefs": [
                { width: 1, targets: 0 },
                { width: 1, targets: 1 },
                { width: 1, targets: 5 },

            ], //disable search for age

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
                      "url": "<?=base_url()?>Admin/Dtable_SLA_ViewList", 
                      "type": "POST"
                  },
            columns: [
                // {
                //     "data": "id_group",
                //     "orderable": false
                // },

                {"data": "sla_id",render:editIcon},
                {"data": "type_of_sla",render:type_sla},
                {"data": "sla"},
                {"data": "service"},
                {"data": "comment"},
                {"data": "validity"},
                {"data": "changed"},
                {"data": "created"}

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

	function editUser(id)
	{
		var base_url = "<?= base_url()?>";
		window.location.href = base_url+'Service/SLA_ViewDetails/'+id;
	}



    function delUser(id)
    {
        
        $("html, body").animate({ scrollTop: 0 }, "slow");

        $("#myModal").modal('show');
        $("#modal_title").html('Confirmation To Delete');
        $("#modal_contain").html('Are you sure to delete ?');

        $("#confirm").click(function (){
            var other_id = id;
            var nama_table = 'sla';
            var where_column = 'sla_id';
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


<style type="text/css">

    .pageheader {
        padding: 13px;
        position: relative;
        /* background: #ffffff; */
        background: linear-gradient(to right, rgb(222, 227, 228) 10%, rgb(31, 112, 162) 100%);
        background: -moz-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 112, 162) 100%);
        background: -webkit-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 112, 162) 100%);
        background: linear-gradient(to right, rgb(222, 227, 228) 10%, rgb(222, 227, 228) 100%);
        margin: -20px -5px 22px -5px;
        /* padding: 35px 15px 100px 20px; */
        color: #353535;
        box-shadow: 0 1px 2px 0 rgb(232, 232, 232);
        padding-left: 30p;
    }

    .pageheader .fa, .pageheader .glyphicon {
        font-size: 12px;
        margin-right: 5px;
        padding: 6px 7px;
        border: 2px solid #122f76;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;
    }

    .pageheader h3 {
        font-size: 15px;
        color: #165a82;
        letter-spacing: -.5px;
        margin: 0;
    }

    .pageheader .breadcrumb-wrapper .label {
        color: #165a82;
        text-transform: uppercase;
        font-weight: 200;
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
</style>