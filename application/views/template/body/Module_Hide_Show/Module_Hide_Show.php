

<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>asset_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="content-wrapper">
	<section class="content">
        <?= lookup_navbar(); ?> 
		<h3> Hide Show Module </h3>
		<div class="row">
            <style type="text/css">
                .centered {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                }
            </style>

            <div class="loader col-md-9" style="display: none">
                <img src="<?= base_url()?>asset/spinner.gif">
                
                <div class="centered">Please Waiting</div>
            </div>

			<div class="col-md-9" id="list_data">

				<div class="box box-success">
		          <div class="box-header with-border">
		            
                    <div class="col-md-8">
                        <h3 class="box-title"> <b>View Module</b></h3>
                        
                    </div>
                    <div class="col-md-4"> 
                        <select class="form-control" id="filter">
                            <option value="">
                                -- Filter By Module --
                            </option>
                            <?= lookup_title_module() ?>
                        </select>
                    </div>
		          </div>
		          <div class="box-body">
		          	<table id="mytable2" class="table table-bordered table-striped">
		            	<thead>
		            		<tr>

							    	<th>Title View</th>        
									
							    	<th>Controller</th> 

							    	<th>Model</th>        
								
							    	<th>Status</th>       

							    	<th>Edit</th>

                                    <th>Show</th>   
				
								</tr>
							</thead>
							<tbody id="dataList">	            
				            </tbody>
			        </table>
				  </div>
				</div>
                <button class="btn btn-primary btn-block" onclick="update_assign();">Update</button>
			</div>
            <div class="col-md-3 hidden-xs">
                <?= lookup_widget(); ?>             
            </div>
		</div>

	</section>
</div>



<input type="hidden" name="id_title" id="id_title">

<script src="<?=base_url()?>asset_admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>asset_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(function () {
	    $("#mytable2").DataTable({

        });
        
	});

    $(document).ready(function() {
        load_data();
    });

    $("#filter").change(function (){

    });


    $("#filter").change(function (){
        var filter = $("#filter").val();
        load_data_filter();
    });

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
        var send_param =  {
                            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                          };
        var editIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <a onclick="editUser('+data+');" title="Edit User"> <i class="fa fa-edit" /> </i></a> ';
            }
            return data;
        };
        var hideshowHide = function ( data, type, row ) {
            if ( type === 'display' ) {
                return '<input type="checkbox" value="'+data+'" class="LocationID" name="LocationID"> ';
            }
            return data;
        };
        var statusIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                if(data==='1'){
                    data = 'Show';
                } else {
                    data = 'Hide';
                }
            }
            return data;
        };
        var t = $("#mytable2").dataTable({

            destroy: true,
            searching: false,
            paging:false,
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
                      "url": "<?=base_url()?>Admin/Dtable_HideShow_ViewList", 
                      "type": "POST",
                      "dataSrc": function ( json ) {
                            //Make your callback here.
                            
                            //alert("Done!");
                            check_list_hideshow();
                            return json.data;

                       } 
                  },
            columns: [
                // {
                //     "data": "id_group",
                //     "orderable": false
                // },
                {"data": "title_form"},
                {"data": "controller"},
                {"data": "function"},
                {"data": "status_show",render:statusIcon},   
                {"data": "id",render:editIcon},
                {"data": "id",render:hideshowHide}

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
        
    }


    function load_data_filter(){
        var filter = $("#filter").val();

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
                            'filter':filter,
                            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                          };
        var editIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <a onclick="editUser('+data+');" title="Edit User"> <i class="fa fa-edit" /> </i></a> ';
            }
            return data;
        };
        var hideshowHide = function ( data, type, row ) {
            if ( type === 'display' ) {
                return '<input type="checkbox" value="'+data+'" class="LocationID" name="LocationID"> ';
            }
            return data;
        };
        var statusIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                if(data==='1'){
                    data = 'Show';
                } else {
                    data = 'Hide';
                }
            }
            return data;
        };
        var t = $("#mytable2").dataTable({

            destroy: true,
            searching: false,
            paging:false,
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
                      "url": "<?=base_url()?>Admin/Dtable_HideShow_ViewList", 
                      "type": "POST",
                      "dataSrc": function ( json ) {
                            //Make your callback here.
                            
                            //alert("Done!");
                            check_list_hideshow();
                            return json.data;

                       } 
                  },
            columns: [
                // {
                //     "data": "id_group",
                //     "orderable": false
                // },
                {"data": "title_form"},
                {"data": "controller"},
                {"data": "function"},
                {"data": "status_show",render:statusIcon},   
                {"data": "id",render:editIcon},
                {"data": "id",render:hideshowHide}

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
        
    }
	


	function editUser(id)
	{
        $("#id_title").val(id);

		$("#myModal").modal('show');  
        $("#modal_title").html('Update Title Name');
        $("#modal_contain").html('<label> New Title </label><input type="text" class="form-control" name="" id="new_title" value=""> ');

        $("#confirm").click(function (){
            var id_title = $("#id_title").val();
            var title = $("#new_title").val();
            var data =  {
                         'title':title,
                         'id_title':id_title,
                         '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                        
                $.ajax({
                        url: '<?= base_url() ?>Admin/update_title_view',
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
        });
	}

    function hideshow(id)
    {
        
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

    function update_assign()
    {
        var id = [];
            $(':checkbox:checked').each(function(i){
                id[i] = $(this).val();
                //alert(id)
                if(id[i]=='on'){
                    id[i]='0';
                }
            }); 

        if(id==''){
            alert('You need to tick any else to update');
        } else {
            
            var data =  {
                         'id':id,
                         '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                        
                $.ajax({
                        url: '<?= base_url() ?>Admin/update_hideshow',
                        type: 'POST',
                        dataType: 'html',
                        data: data,
                        beforeSend: function() {
                            $("#list_data").hide();
                            $(".loader").show(); //hide loading here
                        },
                        success: function(response){
                            //alert('Success Delete !');
                            $("#list_data").show();
                            $(".loader").hide(); //hide loading here
                            location.reload();
                        }
                });
        }
    }

    function check_list_hideshow()
    {

        var data =  {
                         
                         '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                        
                $.ajax({
                        url: '<?= base_url() ?>Admin/check_list_hideshow',
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                        beforeSend: function() {

                        },
                        success: function(response){

                                var checkedValue = null; 
                                var inputElements = document.getElementsByClassName('LocationID');
                                for(var i=0; inputElements[i]; ++i){

                                      cbox = inputElements[i].value;
                                      //alert(checkedValue);
                                      $.each(response, function(index) {
                                            var location_id = response[index].id;
                                            //alert(location_id);
                                            if(location_id===cbox){
                                                //alert("True");
                                                $("input:checkbox[value="+location_id+"]").attr("checked", true);
                                            } else {
                                                //alert("False");
                                            }
                                      });

                                }

                        }
                });
    }



</script>
  





