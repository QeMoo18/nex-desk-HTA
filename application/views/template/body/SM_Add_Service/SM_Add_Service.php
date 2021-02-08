

<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>asset_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">


<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Service Management </h5>
		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
				<a href="<?=base_url()?>Admin/SM_ViewList"><button class="btn btn-success btn-block"> Go To Overview</button></a>
				</div>
			</div>

			<div class="col-md-10">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Add Service</b> </h3>
		          </div>
		          <div class="box-body">

		          			<!-- First Row -->
								<div class="panel-group">
								  <div class="panel panel-default">
								    <div class="panel-heading">
								      <h4 class="panel-title">
								        <a data-toggle="collapse" href="#collapse2">Services Information</a>
								      </h4>
								    </div>
								    <div id="collapse2" class="panel-collapse collapse in">
								      <div class="panel-body">

								      		<div class="form-group col-md-3">
								              <label for="exampleInputEmail1">Service</label>
								              <input type='text' class='form-control' name='sm_service' id='sm_service'> 
								            </div>
										
											<div class="form-group  col-md-3">
								              <label for="exampleInputEmail1">Sub-service of</label>
								              <input type='text' class='form-control' name='sm_sub_services' id='sm_sub_services'> 
								            </div>
										
											<div class="form-group col-md-3">
													<label for="exampleInputEmail1">Type</label>
													<select class='form-control' name='sm_type' id='sm_type'>
														<option value=''>< Please Select ></option>
														<?= lookup_servicetype(); ?>
													</select>
								            </div>
										
											<div class="form-group  col-md-3">
								              <label for="exampleInputEmail1">Criticalty</label>
								              <select class='form-control' name='sm_critical' id='sm_critical'>
														<option value=''>< Please Select ></option>
														<?= lookup_Criticality(); ?>
													</select>
								            </div>
									
											<div class="form-group  col-md-3">
													<label for="exampleInputEmail1">Validity</label>
													<select class='form-control' name='sm_valid' id='sm_valid'>
														<option value=''>< Please Select ></option>
														<?= lookup_validity(); ?>
													</select>
								            </div>
										
											<div class="form-group  col-md-6">
													<label for="exampleInputEmail1">Comment</label>
													<textarea class='form-control' rows='3' name='sm_comment' id='sm_comment'></textarea>
								            </div>

								      </div>
								    </div>
								  </div>
								</div>
					        <!-- END -->


					        <!-- SECOND -->
					        	<div class="panel-group">
								  <div class="panel panel-default">
								    <div class="panel-heading">
								      <h4 class="panel-title">
								        <a data-toggle="collapse" href="#collapse1">Add SLA</a>
								      </h4>
								    </div>
								    <div id="collapse1" class="panel-collapse collapse">
								      <div class="panel-body">
								      		<table id="mytable2"   class="table table-bordered">
											    <thead>
											      <tr>
											        <th>SLA</th>
											        <th><center>Tick</center></th>
											      </tr>
											    </thead>
											    <tbody id="dataList">
											    	
											    </tbody>
											</table>
								      </div>
								    </div>
								  </div>
								</div>
					        <!-- END -->

					        <!-- THIRD -->
					        <hr>
					        <div class="row">
					            <div class="form-group col-md-2">
					            	<button type="submit" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
					            </div>
					            <div class="form-group col-md-2">
					            	<button type="submit" class="btn btn-primary btn-block" onclick="submit();">Submit</button>
					            </div>
					        </div>
					        <!-- END -->
					
				  </div>
				</div>
			</div>
		</div>
	</section>
</div>








<script type="text/javascript">
	function submit()
	{
		var sm_service = $("#sm_service").val();
		var sm_sub_services = $("#sm_sub_services").val();
		var sm_type = $("#sm_type").val();
		var sm_critical = $("#sm_critical").val();
		var sm_valid = $("#sm_valid").val();
		var sm_comment = $("#sm_comment").val();

		if(sm_service){
			//$("#alert_role_name").html('');
		} else {
			//$("#alert_role_name").html('<font color="red"> * Required field </font>');
		}


		var id = [];
        $(':checkbox:checked').each(function(i){
            id[i] = $(this).val();
            //alert(id)
            if(id[i]=='on'){
                id[i]='0';
            }
        });	

        if(id.length===0){
            alert('Please select check box');
        } else {


			if(sm_service==''){
	 
			} else {
				var sm_sla = id;
				var data = 
				                {   'sm_service':sm_service,
				                	'sm_sub_services':sm_sub_services,
				                	'sm_type':sm_type,
				                	'sm_critical':sm_critical,
				                	'sm_valid':sm_valid,
				                	'sm_comment':sm_comment,
				                	'sm_sla':sm_sla,
				                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
				                }

		                    
		            $.ajax({
		                    url: '<?= base_url() ?>Admin/sm_add_service',
		                    type: 'POST',
		                    dataType: 'html',
		                    data: data,
		                    beforeSend: function() {

		                    },
		                    success: function(response){
		                    	//alert("Success Add Service !");
		                    	//location.reload();

		                    	var url = "<?= base_url()?>Admin/SM_ViewList";
        						window.location.href = url;
		                    }
		            });

			}

		}
	}

	function cancel()
 	{
 		var url = "<?= base_url()?>Admin/SM_ViewList";
        window.location.href = url;
 	}
</script>



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

        var addIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return '<input type="checkbox" value="'+data+'" name="SLA_ID"> ';
            }
            return data;
        };

        var t = $("#mytable2").dataTable({

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
                      "url": "<?=base_url()?>Admin/Dtable_SLA_ViewList_Valid", 
                      "type": "POST"
                  },
            columns: [
                // {
                //     "data": "id_group",
                //     "orderable": false
                // },
                {"data": "sla"},
                {"data": "sla_id",render:addIcon}

            ],
            order: [[1, 'asc']],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                //$('td:eq(0)', row).html(index);
            }
        });
	});

	function editUser(id)
	{
		var base_url = "<?= base_url()?>";
		window.location.href = base_url+'Admin/SM_EditDetails/'+id;
	}




    function addIcon(id)
    {
     
        $("#myModal").modal('show');
        $("#modal_title").html('Confirmation To Delete');
        $("#modal_contain").html('Are you sure to delete ?');

        $("#confirm").click(function (){
            var other_id = id;
            var nama_table = 'service';
            var where_column = 'service_generated_id';
            var nama_table2 = 'sla';
            var where_column2 = 'service';
            sm_deletenow(other_id,nama_table,nama_table2,where_column,where_column2);
        });
    }
    
    function sm_deletenow(other_id,nama_table,nama_table2,where_column,where_column2)
    {
        var data =  {
                         'other_id':other_id,
                         'nama_table':nama_table,
                         'nama_table2':nama_table2,
                         'where_column':where_column,
                         'where_column2':where_column2,
                         '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                        
                $.ajax({
                        url: '<?= base_url() ?>Admin/sm_delete_data_join',
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
