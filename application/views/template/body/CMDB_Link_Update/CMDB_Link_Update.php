
	
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url()?>asset_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?>
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Asset Management </h5>
		<div class="row">
			<div class="col-md-12">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Asset Link View List</b></h3>
		          </div>
		          <div class="box-body">
		          		<div id="table">
				          	<table id="mytable2" class="table table-bordered table-striped">
				            	<thead>
				            		<tr>

								    	<th>Customer ID</th>        
									
								    	<th>Service</th>        
									
								    	<th>SLA</th>        
									
								    	<th>ITSM Category</th>        
									
								    	<th>Created</th>        
									
								    	<th>Change</th>        
									
								    	<th><center>Edit</center></th>        
									
								    	<th>Validity</th>        
						
									</tr>
								</thead>
								<tbody id="dataList">	            
					            </tbody>
					        </table>
					    </div>

				        <!-- Start First -->
			          		<div id="first_div" style="display: none">
								<div class="form-group">
				                  	<label for="exampleInputEmail1">Customer ID</label>
				                  	<select class='form-control' name='Link_CustID' id='Link_CustID'>
				  						<option value=''>< Please Select ></option>
				  					</select> 
				                </div>
						
								<div class="form-group">
				                  	<label for="exampleInputEmail1">Service</label>
				                  	<select class='form-control' name='Link_Service' id='Link_Service'>
				  						<option value=''>< Please Select ></option>
				  					</select>
				                </div>
						
								<div class="form-group">
				                  	<label for="exampleInputEmail1">SLA</label>
				                  	<select class='form-control' name='Link_SLA' id='Link_SLA'>
				  						<option value=''>< Please Select ></option>
				  					</select> 
				                </div>

				                <div class="form-group">
					            	<button type="submit" class="btn btn-primary btn-block" onclick="next();">Next</button>
					            </div>
					        </div>
			            <!-- END -->

						<!-- SECOND -->
							<div id="second_div" style="display: none">
								<div class="form-group">
				  					<label for="exampleInputEmail1">ITSM Category</label>
				  					<select class='form-control' name='ITSMCatefory' id='Link_ITSM_Cat'>
				  						<option value=''>< Please Select ></option>
				  					</select>
				                </div>
						
								<div class="form-group">
				                  <label for="exampleInputEmail1">Location</label>
				                  
				                  

				                  	<table class="table table-bordered">
									    <thead>
									      	<tr>
										        <th>Name (Hostname)</th>
										        <th>Location</th>
										        <th><center>Mark</center></th>
									      	</tr>
									    </thead>
									    <tbody>
									    	<tr>
									    		<td> 12313 </td>
									    		<td> KL </td>
									    		<td> 
									    			<center>
									    				<input type='checkbox' name='Link_Location' id='Link_Location'> 
									    			</center>
									    		</td>
									    	</tr>
									    </tbody>
									</table>

				                  </div>


				                
								
								<div class="form-group">
					            	<button type="submit" class="btn btn-primary btn-block" onclick="submit();">Submit</button>
					            	<button type="submit" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
					            </div>
					        </div>
					    <!-- END -->
				  </div>
				</div>
			</div>
			<!-- <div class="col-md-3 hidden-xs">
				<?//= lookup_widget(); ?>		        
			</div> -->
		</div>

	

	</section>
</div>


<script src="<?=base_url()?>asset_admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>asset_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(function () {
	    $("#mytable2").DataTable()
	});

	$(document).ready(function (){
		search_computer();
	});	

	function search_computer(){

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
            	var data = "'"+data+"'";
                return  ' <center><a onclick="edit('+data+');" title="Edit"> <i class="fa fa-edit" /> </i></a></center> ';
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
                      "url": "<?=base_url()?>CMDB/Dtable_CMDB_ITSM_ViewList", 
                      "type": "POST"
                  },
            columns: [
                {"data": "CustomerID"}, //"name, deployment_state, incident_state, changed, created, other_id";
                {"data": "Service"},
                {"data": "SLA"},
                {"data": "CAT"},
                {"data": "Created"},
                {"data": "Changed"},
                {"data": "RegisterID",render:editIcon},
                {"data": "Status"}

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



	function edit(id)
	{
		var base_url = "<?= base_url()?>";
		window.location.href = base_url+'CMDB/CMDB_Link_Update_Form2/'+id;
	}


	function cancel()
	{
		location.reload();
	}
</script>
  


  