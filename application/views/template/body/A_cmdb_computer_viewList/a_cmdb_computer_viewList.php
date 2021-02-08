

<!-- DataTables -->
	<link rel="stylesheet" href="<?= base_url()?>asset_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="content-wrapper">
    <section class="content">
        <?= lookup_navbar(); ?> 
        <h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Computer Management</h5>
        <div class="row">
            <div class="col-md-2"> 
                <div class="form-group">
                    <a href="<?= base_url()?>admin/A_cmdb_computer_add"> 
                        <button class="btn btn-danger btn-block"> + Add Computer</button>
                    </a>
                </div>
            </div>
            <div class="col-md-10">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>View Computer</b></h3>
		          </div>
		          <div class="box-body">

                    <?php 
                    $env = $this->session->userdata('env'); 
                    if($env=='hospital'){
                    ?>
		          	<table id="mytable2" class="table table-bordered table-striped">
		            	<thead>
		            		<tr>
						    	<th>Name</th>        
						    	<th>Deployment State</th>        
						    	<th>Incident State</th> 
                                <th>Validity</th>  
                                <th>Create</th>       
						    	<th>Last Changed</th>        
						    	<th>Edit </th>        
						    	<th><center>Delete</center></th>  
                                <th><center>Remote</center></th>      
							</tr>
						</thead>
						<tbody id="dataList">	            
			            </tbody>
			        </table>
                <?php } else { ?>
                    <table id="mytable2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>        
                                <th>Deployment State</th>        
                                <th>Incident State</th> 
                                <th>Validity</th>  
                                <th>Create</th>       
                                <th>Last Changed</th>        
                                <th>Edit </th>        
                                <th>Delete</th>     
                            </tr>
                        </thead>
                        <tbody id="dataList">               
                        </tbody>
                    </table>
                <?php } ?>
				  </div>
				</div>
			</div>

            <!-- <div class="col-md-3 hidden-xs">
                <?//= lookup_widget(); ?>             
            </div> -->
		</div>
	</section>
</div>

<script src="<?= base_url()?>asset_admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>asset_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>

<!-- code datatables cuma ubah column -->
<script type="text/javascript">
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

        var send_param =  {
                            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                          };

        var editIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <center><a onclick="editUser('+data+');" title="Edit"> <i class="fa fa-edit" /> </i></a></center> ';
            }
            return data;
        };

        var deleteIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                //tukar icon
                return  ' <center><a onclick="delIcon('+data+');" title="Delete"> <i class="fa fa-trash" /> </i></a></center> ';
            }
            return data;
        };


        var remoteIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                //tukar icon
                var data = "'"+data+"'";
                return  ' <center><a onclick="remoteIcon('+data+');" title="Remote"> <i class="fa fa-eye" /> </i></a></center> ';
            }
            return data;
        };

        var env = "<?= $this->session->userdata('env');  ?>";

        if(env=='hospital'){

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
                          "url": "<?=base_url()?>Admin/Dtable_CMDB_Computer_ViewList", //CREATE FUNCTION DEKAT CONTROLLER 
                          "type": "POST",
                          deferRender: true
                      },


                columns: [
                			// TEMPAT KAU NAK SET COLUMN 
    		                {"data": "name"},
    		                {"data": "deployment_state"},
    		                {"data": "incident_state"},
                            {"data": "validity"},
                            {"data": "created"},
    		                {"data": "changed"},
    		                {"data": "other_id",render:editIcon},
    		                {"data": "other_id",render:deleteIcon}, //DELETE PROCESS
                            {"data": "name",render:remoteIcon},

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

        } else {
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
                          "url": "<?=base_url()?>Admin/Dtable_CMDB_Computer_ViewList", //CREATE FUNCTION DEKAT CONTROLLER 
                          "type": "POST",
                          deferRender: true
                      },


                columns: [
                            // TEMPAT KAU NAK SET COLUMN 
                            {"data": "name"},
                            {"data": "deployment_state"},
                            {"data": "incident_state"},
                            {"data": "validity"},
                            {"data": "created"},
                            {"data": "changed"},
                            {"data": "other_id",render:editIcon},
                            {"data": "other_id",render:deleteIcon}, //DELETE PROCESS

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
	});


	function editUser(id)
	{
		var base_url = "<?= base_url()?>";
		window.location.href = base_url+'Admin/A_cmdb_computer_EditDetails/'+id;
	}

    //START DELETE 
	function delIcon(id)
	{ 
        $("html, body").animate({ scrollTop: 0 }, "slow");
        
        $("#myModal").modal('show');
        $("#modal_title").html('Confirmation to delete');
        $("#modal_contain").html('Are you sure to delete');
        $("#confirm").click(function (){

                // PASS DIA PUNYA ID
                //alert(id); //check id

                // ini data id 
                var data =  {       
                                'other_id':id,
                                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                            }

                $.ajax({
                            url: '<?= base_url() ?>Admin/Delete_CMDB_Computer_ViewList', //create nama function delete controller
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {

                            },
                            success: function(response){
                                //alert("Data Deleted !");
                                location.reload();
                            }
                    });

        });

    }

    // function remoteIcon(ip)
    // {
    //     var data =  {       
    //                             'ip':ip,
    //                             '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
    //                         }

    //             $.ajax({
    //                         url: '<?= base_url() ?>Admin/remoteComputer', //create nama function delete controller
    //                         type: 'POST',
    //                         dataType: 'html',
    //                         data: data,
    //                         beforeSend: function() {

    //                         },
    //                         success: function(response){
                                
    //                         }
    //                 });
    // }

    function remoteIcon(ip)
    {


        var data =  {       
                                'ip':ip,
                                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                            }

        $.ajax({
                    url: '<?= base_url() ?>Admin/remoteComputer', //create nama function delete controller
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                        

                        //connect node js
                        var socket = io.connect('http://localhost:8787');

                        var username = ip;
                        socket.emit('new_client', username);
                        document.title = username + ' - ' + document.title;

                        // When a message is received it's inserted in the page
                        socket.on('message', function(data) {
                            insertMessage(data.username, data.message)
                        })


                        var message = "<?= getenv('COMPUTERNAME'); ?>";
                        socket.emit('message', message);
                        insertMessage(username, message);

                        // Adds a message to the page
                        function insertMessage(username, message) {
                            $('#chat_zone').prepend('<p><strong>' + username + '</strong> ' + message + '</p>');
                        }


                    }
            });


        

    }
</script>
<!-- end -->

<style type="text/css">
    /* style for selected */
    .datatablerowhighlight {
        background-color: #ECFFB3 !important;
    }
</style>
  


  