<div class="pageheader hidden-xs">
    <h3><i class="fa fa-list"></i> List Ticket : Result Search </h3>
    <div class="breadcrumb-wrapper">
        <span class="label" style="padding-right: 0px;"><i class="fa fa-cog" aria-hidden="true" style="border: 2px solid #f2f7f8;padding-right: 0px;"></i></span>
        <ol class="breadcrumb">
            <li> <a href="<?=base_url()?>Ticket/CreateTicket_Phone"> Create Ticket </a> </li>
            <li> <a href="<?=base_url()?>Ticket/Ticket_StatusView"> Ticket Status </a> </li>
            <li> <a href="<?=base_url()?>Ticket/MS_Overview_Open"> Master Status </a> </li>
        </ol>
    </div>
</div>

<!-- DataTables --><link rel="stylesheet" href="<?= base_url()?>/asset_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="row">
    <div class="content-wrapper">
    	<section class="content">
    		<?= lookup_navbar(); ?> 
    		<div class="row">
    			<div class="col-md-12">

    				<div class="box box-success">
    		          <div class="box-header with-border">
    		            <h3 class="box-title"> <b><i class="fa fa-list-alt" aria-hidden="true"></i> List Ticket</b></h3>
    		          </div>
    		          <div class="box-body" style="padding-bottom: 30px;">
    		          	<table id="mytable2" class="table table-bordered table-striped">
    		            	<thead>
    		            		<tr>
                                    <th><center></center></th> 

    						    	<th>Ticket No</th>     
    							
    						    	<th>Subject</th>   

                                    <th>Category</th>       
    							     
    						    	<th>State</th>        
    							    
                                    <th>State Type</th>
     

    						    	<th>Ages</th>        
    							
    							
    						    	<th>Owner</th>  

                                    <th>Responsible</th>

                                    <th>Changed</th> 

    						    	       
    				
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
</div>


<input type="hidden" name="sort_by" id="sort_by" value="">

<script src="<?=base_url()?>asset_admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>asset_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(function () {
	    $("#mytable2").DataTable();
        load_data();
        var url = "<?= $this->uri->segment(2);?>";
        //alert(url);

        
	})

    function $_GET(param) {
        var vars = {};
        window.location.href.replace( location.hash, '' ).replace( 
            /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
            function( m, key, value ) { // callback
                vars[key] = value !== undefined ? value : '';
            }
        );

        if ( param ) {
            return vars[param] ? vars[param] : null;    
        }
        return vars;
    }

	function load_data(){
		
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


        var ticket_number = '<?= urldecode($_GET['ticket_number']) ?>';
        var date1 = '<?= urldecode($_GET['date1']) ?>';
        var date2 = '<?= urldecode($_GET['date2']) ?>';
        var subject = '<?= urldecode($_GET['subject']) ?>';
        var responsible = '<?= urldecode($_GET['responsible']) ?>';
        var current_state = '<?= urldecode($_GET['current_state']) ?>';
        var category = '<?= urldecode($_GET['category']) ?>';
        var sort_by = $("#sort_by").val();

        var send_param =  {
                            'segment':segment,
                            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
                            'ticket_number':ticket_number,
                            'date1':date1,
                            'date2':date2,
                            'subject':subject,
                            'responsible':responsible,
                            'current_state':current_state,
                            'category':category,
                            'sort_by':sort_by
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
                      "url": "<?=base_url()?>Ticket/Dtable_Ticket_Search", 
                      "type": "POST",
                      deferRender: true
                  },
            columns: [
                // {
                //     "data": "id_group",
                //     "orderable": false
                // },

                {"data": "id_ticket",render:detailTicket},
                {"data": "id_no"},
                {"data": "title"},
                {"data": "category"},
                {"data": "status_ticket"},
                {"data": "current_state"},
                {"data": "created_date",render:ages},
                {"data": "ticket_owner"},
                {"data": "ticket_responsibilty"},
                {"data": "updated_date",render:ages}

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
	};

	function detailTicket(id)
	{
	    //alert(id);
		var base_url = "<?= base_url()?>";
		//window.location.href = base_url+'Ticket/Ticket_DetailTicket/'+id;
        window.open(base_url+'Ticket/Ticket_DetailTicket/'+id,'_blank');
	}


    //sort by
    // table = $('#mytable2').DataTable();
    // $('#mytable2 thead').on('click', 'th', function () {
    //   var index = table.column(this).index();
    //   //alert('index : '+index);
    //   $("#sort_by").val(index);
      

    //     var ticket_number = '<?= urldecode($_GET['ticket_number']) ?>';
    //     var date1 = '<?= urldecode($_GET['date1']) ?>';
    //     var date2 = '<?= urldecode($_GET['date2']) ?>';
    //     var subject = '<?= urldecode($_GET['subject']) ?>';
    //     var responsible = '<?= urldecode($_GET['responsible']) ?>';
    //     var current_state = '<?= urldecode($_GET['current_state']) ?>';
    //     var category = '<?= urldecode($_GET['category']) ?>';
    //     var sort_by = $("#sort_by").val();

    //     var param = "ticket_number="+ticket_number+"&date1="+date1+"&date2="+date2+"&subject="+subject+"&responsible="+responsible+"&current_state="+current_state+"&category="+category+"&sort_by="+sort_by;

    //     var base_url = "<?= base_url()?>Ticket/Ticket_Search_Result?"+param;
    //     window.location.href=base_url;


    // });


 

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



</style>