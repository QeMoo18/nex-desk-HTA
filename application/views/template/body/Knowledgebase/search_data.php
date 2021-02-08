<div class="pageheader hidden-xs">
    <h3><i class="fa fa-search"></i> Knowledge Base Management </h3>
    <div class="breadcrumb-wrapper">
        <span class="label" style="padding-right: 0px;"><i class="fa fa-cog" aria-hidden="true" style="border: 2px solid #f2f7f8;padding-right: 0px;"></i></span>
        <ol class="breadcrumb">
            <li> <a href="<?=base_url()?>Knowledgebase/form"> Add Knowledge Base </a> </li>
            <li> <a href="<?=base_url()?>Knowledgebase/search"> Search Knowledge Base </a> </li>
        </ol>
    </div>
</div>

<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>asset_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="row" style="padding-bottom: 30px;">
    <div class="content-wrapper">
    	<section class="content">


    		<div class="jumbotron jumbotron-muted">
    		<div class="container">
    		<div class="row">
    			<div class="col-lg-6">
    				<h2>We have found <span id="total"> 10 </span> result(s) from your searching..</h2>
    				<p class="lead">We can help you to find anything to solve your problem <b><a href="<?= base_url()?>Knowledgebase/filter">Search again</a></b>..</p>
    			</div>
    			<div class="col-lg-6"></div>
    		</div>


    		<div class="row">
    			<div class="col-lg-12">
    				<div class="box box-success">
    		          <div class="box-body">
    		          	<table id="mytable2" class="table table-bordered table-striped" width="100%">
    		            	<thead>
    		            		<tr>

    							    	<th>Headline</th>        
    								
    							    	<th>Category</th>       
    								
    							    	<th><center>View</center></th>       
    				
    							</tr>
    						</thead>
    						<tbody id="dataList">	            
    			            </tbody>
    			        </table>
    				  </div>
    				</div>
    			</div>

    			<!-- <div class="col-lg-4">
    			    <img class="img-responsive" src="https://i.imgur.com/1Vm0su2.png"/>
    			</div> -->

    			<br>
    			
    		</div>

    		<div class="row">
    			<div class="col-lg-12">
    				<small>Any question you can contact directly  <a href="#!"><i class="fa fa-phone" aria-hidden="true"></i> 0129551380  </a> | <a href="#!"><i>(Muhammad Al Faiza)</i></a></small>
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

	$(document).ready(function(){
		var headline = "<?= $_GET["headline"] ?>";
		var topic = "<?= $_GET["category"] ?>";
		get_data();
		count_by_search();
	});

	$(function () {
	    $("#mytable2").DataTable()
	})

	function get_data(){
		
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

        var headline = "<?= $_GET["headline"] ?>";
		var category = "<?= $_GET["category"] ?>";

        var send_param =  {
        					'headline':headline,
        					'category':category,
                            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                          };

        var editIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                var data = "'"+data+"'";
                return  ' <center><a onclick="editUser('+data+');" title="Edit User"> <i class="fa fa-edit" /> </i></a></center> ';
            }
            return data;
        };

        var delIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                var data = "'"+data+"'";
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
            "bInfo" : false,

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
                      "url": "<?=base_url()?>Knowledgebase/list_data", 
                      "type": "POST"
                  },
            columns: [
                // {
                //     "data": "id_group",
                //     "orderable": false
                // },
                {"data": "headline"},
                {"data": "category"},
                {"data": "id_kb",render:editIcon}

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
	};

	function editUser(id)
	{
		var base_url = "<?= base_url()?>";
		window.location.href = base_url+'Knowledgebase/topic/'+id;
	}

    function delUser(id)
    {
        $("#myModal").modal('show');
        $("#modal_title").html('Confirmation To Delete');
        $("#modal_contain").html('Are you sure to delete ?');

        $("#confirm").click(function (){
            var other_id = id;
            var nama_table = 'knowledgebase';
            var where_column = 'id';
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
                        url: '<?= base_url() ?>Admin/delete_data_trash',
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

    function count_by_search()
    {
    	var headline = "<?= $_GET["headline"] ?>";
		var category = "<?= $_GET["category"] ?>";

    	var data =  {
                         'headline':headline,
                         'category':category,
                         '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                        
                $.ajax({
                        url: '<?= base_url() ?>Knowledgebase/count_knowledgebase_by_search',
                        type: 'POST',
                        dataType: 'html',
                        data: data,
                        beforeSend: function() {

                        },
                        success: function(response){
                        	$("#total").html(response);
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