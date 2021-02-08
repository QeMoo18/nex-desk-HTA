<div class="pageheader hidden-xs">
    <h3><i class="fa fa-list"></i> Form PPM : Hardware </h3>
    <div class="breadcrumb-wrapper">
        <span class="label" style="padding-right: 0px;"><i class="fa fa-cog" aria-hidden="true" style="border: 2px solid #f2f7f8;padding-right: 0px;"></i></span>
        <ol class="breadcrumb">
            <li> <a href="<?=base_url()?>Form_PPM/PPM_Form_Network"> + Add Network PPM </a> </li>
            <li> <a href="<?=base_url()?>Form_PPM/PPM_Form_Printer"> + Add Printer & Scanner </a> </li>
            <li> <a href="<?=base_url()?>Form_PPM/List_Hardware"> Overview </a> </li>
            <li> <a href="<?=base_url()?>Form_PPM/List_Hardware/Verified"> Verified By </a> </li>
            <li> <a href="<?=base_url()?>Form_PPM/List_Hardware/Endorse"> Endorse By </a> </li>
        </ol>
    </div>
</div>

<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>asset_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="content-wrapper">
    <section class="content">
        <div class="row" style="padding-bottom: 30px;">

                <div class="col-md-12" id="content-mobile" style="padding-top: 30px; padding-bottom: 30px; padding-left: 20px; padding-right: 20px;">
                    <select class="form-control" id="go_to_selected" onchange="go_to_selected();">
                        <option value="Overview">Overview</option>
                        <option value="Network">Add Network PPM</option>
                        <option value="Printer">Add Printer & Scanner </option>
                        <option value="Verified">Verified By</option>
                        <option value="Endorse">Endorse By</option>
                    </select>
                </div>  

                <script type="text/javascript">
                    function go_to_selected()
                    {
                        var go_to_selected = $("#go_to_selected").val();

                        if(go_to_selected=='Overview'){
                            window.location.href="<?= base_url()?>Form_PPM/List_Hardware";
                        } else if(go_to_selected=='Network'){
                            window.location.href="<?= base_url()?>Form_PPM/PPM_Form_Network";
                        } else if(go_to_selected=='Printer'){
                            window.location.href="<?= base_url()?>Form_PPM/PPM_Form_Printer";
                        } else if(go_to_selected=='Verified'){
                            window.location.href="<?= base_url()?>Form_PPM/List_Hardware/Verified";
                        } else if(go_to_selected=='Endorse'){
                            window.location.href="<?= base_url()?>Form_PPM/List_Hardware/Endorse";
                        } else {
                            window.location.href="<?= base_url()?>Form_PPM/List_Hardware";
                        }
                    }
                </script>

                <style type="text/css">
                    #content-mobile {display: none;}
                    @media screen and (max-width: 768px) {
                        #content-mobile {display: block;}
                    }
                </style>
            
            <div class="col-md-12">

                <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title"> <b>List Hardware PPM</b></h3>
                  </div>
                  <div class="box-body">


                    <table id="mytable2" class="table table-bordered table-striped">


                        <thead>
                            <tr>
                                    <th></th>

                                    <th>ID No.</th>        
                                
                                    <th>Name</th>        
                                
                                    <th>Type</th>        
                                
                                    <th>Location</th>        
                                
                                    <th>Created</th> 

                                    <th>Last Changed</th>

                                    <th>Quarter</th>   

                                    <th>Year</th>

                                    <th>Status</th>

                                    <th><center>Print</center></th>       
                
                                </tr>
                            </thead>
                            <tbody id="dataList">               
                            </tbody>
                    </table>
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
                            'type':'<?= $this->uri->segment(3)?>',
                            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                          };

        var editIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <center><a onclick="editUser('+data+');" title="Edit User"> <i class="fa fa-edit" /> </i></a></center> ';
            }
            return data;
        };

        var delIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <center><a onclick="delUser('+data+');" title="Delete"> <i class="fa fa-trash" /> </i></a></center> ';
            }
            return data;
        };

        var printIcon = function ( data, type, row ) {
            if ( type === 'display' ) {
                return  ' <center><a onclick="printIcon('+data+');" title="Print"> <i class="fa fa-print" /> </i></a></center> ';
            }
            return data;
        };


        var checkquarter = function ( data, type, row ) {
            if ( data == null ) {
                return '-';
            }

            return data;
            
        };



        var type_selected = "<?= $this->uri->segment(2)?>";

        if(type_selected=='List_Network_Type'){
            var url = "<?=base_url()?>Form_PPM/Dtable_list_network_only";
            
        } else if(type_selected=='List_Printer_Type'){
            var url = "<?=base_url()?>Form_PPM/Dtable_list_printer_only";
        } else {
            
            var url = "<?=base_url()?>Form_PPM/Dtable_list_hardware";
        } 

        var t = $("#mytable2").dataTable({

            "columnDefs": [{ width: 1, targets: 0 },],

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
                      "url": url, 
                      "type": "POST"
                  },
            columns: [
                // {
                //     "data": "id_group",
                //     "orderable": false
                // },
                {"data": "id_number",render:editIcon},
                {"data": "code"},
                {"data": "hostname"},
                {"data": "ppm_type"},
                {"data": "location"},
                {"data": "created_date"},
                {"data": "changed_date"},
                {"data": "quarter",render:checkquarter},
                {"data": "year"},
                {"data": "status"},
                {"data": "id_number",render:printIcon}

            ],
            order: [[   5, 'desc']],
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
        window.location.href = base_url+'Form_PPM/Go_Details/'+id+'/<?=$this->uri->segment(3)?>';
    }

    function delUser(id)
    {
        
        $("#myModal").modal('show');
        $("#modal_title").html('Confirmation To Delete');
        $("#modal_contain").html('Are you sure to delete ?');

        $("#confirm").click(function (){
            var other_id = id;
            var nama_table = ' fault_itsm_category';
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




<script type="text/javascript">
    function printIcon(id)
    {
        $('#pdf_data').attr('action', '<?= base_url()?>Form_PPM/PDF_Hardware/'+id);
        $("#submit").trigger('click');
    }
</script>

<form action="<?=base_url()?>Form_PPM/PDF_Hardware/<?= $this->uri->segment(4)?>" method="post" id="pdf_data">
    <button type="submit" id="submit" style="display: none">Submit</button>
</form>



<script type="text/javascript">
    $(document).ready(function (){
        var type_selected = "<?= $this->uri->segment(2)?>";
        var selected = "<?= $this->uri->segment(3)?>";
        

        $(".dataTables_filter").append('<select class="form-control" id="go_type" onchange="go_by_type();"><option value="0">-- Type --</option><option value="1">Network</option><option value="2">Printer & Scanner</option></selected>');
        
        if(selected==''){

        } else {
            $("#go_type").val(selected);
        }
        
    });
    
    function go_by_type()
    {
        var go_type = $("#go_type").val();
        if(go_type=='1'){
            window.location.href="<?= base_url()?>Form_PPM/List_Network_Type/1";
        } else if(go_type=='2'){
            window.location.href="<?= base_url()?>Form_PPM/List_Printer_Type/2";
        } else if(go_type=='0') {
            window.location.href="<?= base_url()?>Form_PPM/List_Hardware/0";
        }
    }

</script>
