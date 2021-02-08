<div class="pageheader hidden-xs">
    <h3><i class="fa fa-file"></i> List PPM Activity : <?= get_name_activity($this->session->userdata('id_activity'))?></h3>
    <div class="breadcrumb-wrapper">
        <span class="label" style="padding-right: 0px;"><i class="fa fa-cog" aria-hidden="true" style="border: 2px solid #f2f7f8;padding-right: 0px;"></i></span>
        <ol class="breadcrumb">
            <li> <a href="<?=base_url()?>Form_PPM/Main_PPM"> Dashboard </a> 
        </ol>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function (){

        if("<?= $this->session->userdata('id_activity')?>"==''){
            alert('Sorry , we cannot recognize your form activity !');
            window.location.href="<?= base_url()?>Form_PPM/List_activity_workstation";
        } 



    });
</script>

<div class="panel">
    <!--Panel body-->
    <div class="panel-body">

            <form method="post" action="<?= base_url()?><?= $this->uri->segment(1)?>/<?= $this->uri->segment(2)?>" id="form_reset">
                <div class="row" style="padding-bottom: 30px;">

                    <input type="hidden" name="ppm_id_find" value="<?= $this->session->userdata('id_activity') ?>">

                    <div class="col-md-1" style="padding-left: 0px;">
                        <select class="form-control" name="paging_by_find">
                            <option value="10">10</option>      
                            <option value="20">20</option>      
                            <option value="30">30</option>      
                            <option value="40">40</option>       
                            <option value="50">50</option>       
                        </select>
                    </div>

                    <div class="col-md-2" style="padding-left: 0px;">
                        <input type="text" class="form-control" name="search_text" id="btn_search" placeholder="Find Hostname" value="<?= $this->session->userdata('search_text')?>">
                    </div>
                    <div class="col-md-2" style="padding-left: 0px;">
                      <select class="form-control" name="type_devices_find">
                        <option value="">-- Type Devices --</option>    
                        <option value="Desktop">Desktop</option>   
                        <option value="Laptop">Laptop</option>   
                        <option value="Printer">Printer</option>   
                        <option value="Scanner">Scanner</option>  
                      </select>
                    </div>
                    <div class="col-md-2" style="padding-left: 0px;">

                      <input type="text" name="user_find" id="user_find" list="users" class="form-control" placeholder="Acknowledged">

                    </div>
                    <div class="col-md-2" style="padding-left: 0px;">
                      <select class="form-control" name="department_find">
                        <option value="">-- Department --</option>     
                        <?= lookup_department()?> 
                      </select>
                    </div>
                    <div class="col-md-2" style="padding-left: 0px;">
                      <select class="form-control" name="status_find">
                        <option value="">-- Status --</option>      
                        <option value="Not Yet">Not Yet</option>   
                        <option value="Performed">Performed</option>   
                        <option value="Performed & Send">Performed & Send</option>   
                        <option value="Acknowledge">Acknowledge</option>   
                        <option value="Verified">Verified</option>   
                        <option value="Verified & Send">Verified & Send</option> 
                      </select>
                    </div>
                    <input type="hidden" name="submit" value="submit">
                    <div class="col-md-1">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>

            <!-- <div class="col-md-12">
                <a href="<?= base_url()?>data_workstation/<?= $this->uri->segment(3)?>">Asset </a> 
            </div> -->

            <div class="table table-responsive">
                 <table class="table" id="postsList">
                    <thead class="thead-dark">
                       <tr>
                          <th></th>
                          <th>Hostname</th>
                          <th>Description</th>
                          <th>Type</th>
                          <th id="department">Department</th>
                          <th>Location</th>
                          <th>Acknowledge</th>
                          <th>Perform Date</th>
                          <th>Status</th>
                          <th>Print</th>
                       </tr>
                    </thead>
                    

                        
                    <tbody>
                       
                    </tbody>
                 </table>


            </div>

            <br><br>
            <div style='margin-top: 30px;  padding-right: 30px;' id='pagination'>
            </div>

            <div class="" style="padding-top: 30px; float: right; padding-bottom: 30px;padding-right: 30px;">
                <div class="col-md-6" style="padding-bottom: 10px;"></div>
                <div class="col-md-6" style="padding-bottom: 10px;">
                            <button class="btn btn-primary" onclick="send_email();">Send Email</button>
                        
                </div>
            </div>
            <br><br>
            

    </div>


    <datalist id="users">
      <?= lookup_customer_user_datalist()?>
    </datalist>

    
</div>



<script type="text/javascript">
    function send_email()
    {
        var subject = "<?= get_name_activity($this->session->userdata('id_activity'))?>";
        var ppm_id = "<?= $this->session->userdata('id_activity');?>";
        var user_find = $("#user_find").val();
        if(user_find){
            var data = 
                        {   'ppm_id':ppm_id,
                            'user_find':user_find,
                            'subject':subject,
                            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                        }

                    
            $.ajax({
                    url: '<?= base_url() ?>Form_PPM/Workstation_Send_Email',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                        alert("PPM Form already send");
                        //location.reload();
                    }
            });
        } 
    }
</script>



<script type="text/javascript">
    function printIcon(id)
    {
        $('#pdf_data').attr('action', '<?= base_url()?>Form_PPM/PDF_Computer/'+id);
        $("#submit").trigger('click');
    }

    function printIcon2(id)
    {
        $('#pdf_data').attr('action', '<?= base_url()?>Form_PPM/PDF_Hardware/'+id);
        $("#submit").trigger('click');
    }
</script>

<form action="" method="post" id="pdf_data">
    <button type="submit" id="submit" style="display: none">Submit</button>
</form>


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


<input type="hidden" id="description">

<script type='text/javascript'>
   $(document).ready(function(){

        var page = "<?= $this->session->flashdata('paging_by_find'); ?>";
        if(page){

        } else {
          page = 10;
        }

        $("select[name='paging_by_find']").val(page);
        $("select[name='type_devices_find']").val("<?= $this->session->flashdata('type_devices_find'); ?>");
        $("input[name='user_find']").val("<?= $this->session->flashdata('user_find'); ?>");
        $("select[name='status_find']").val("<?= $this->session->flashdata('status'); ?>");
        $("select[name='department_find']").val("<?= $this->session->flashdata('department_find'); ?>");

        
        loadPagination(0);
     
    });


    $('#pagination').on('click','a',function(e){
       e.preventDefault(); 
       var pageno = $(this).attr('data-ci-pagination-page');
       loadPagination(pageno);

    });


    function loadPagination(pagno){

        var page = "<?= $this->session->flashdata('paging_by_find'); ?>";
        if(page){

        } else {
          page = 10;
        }

        var data =  {
                        "ppm_id":"<?= $this->session->userdata('id_activity') ?>",
                        "paging_by_find":page,
                        "type_devices_find":$("select[name='type_devices_find']").val(),
                        "user_find":$("input[name='user_find']").val(),
                        "status_find":$("select[name='status_find']").val(),
                        "department_find":$("select[name='department_find']").val(),
                        "search_text":$("input[name='search_text']").val(),
                    }
        $.ajax({
         data : data,
         url: '<?=base_url()?>Form_PPM/work_station_list_asset/'+pagno,
         type: 'post',
         dataType: 'json',
         success: function(response){
            $('#postsList tbody').html('');
            $('#pagination').html(response.pagination);
            createTable(response.result,response.row);
         }
       });
    }



     function get_print(hostname,sno,type,type_ppm_activity)
     {
        var data = {"hostname":hostname,'type':type,'ppm_id':type_ppm_activity};
        //description
          $.ajax({
             data:data,
             url: '<?=base_url()?>Form_PPM/get_print',
             type: 'post',
             dataType: 'html',
             success: function(description){
                $("#print_"+sno).html(description);
                // var description = response;
                // $("#description").val(response);
                // var description = $("#description").val();
                // console.log(description);
                
             }
           });
        
     }



     function get_perform_date(hostname,sno,type,type_ppm_activity)
     {
        var data = {"hostname":hostname,'type':type,'ppm_id':type_ppm_activity};
        //description
          $.ajax({
             data:data,
             url: '<?=base_url()?>Form_PPM/get_perform_date',
             type: 'post',
             dataType: 'html',
             success: function(description){
                $("#perform_date_"+sno).html(description);
                // var description = response;
                // $("#description").val(response);
                // var description = $("#description").val();
                // console.log(description);
                
             }
           });
        
     }


     function get_acknowlegde(hostname,sno,type,type_ppm_activity)
     {
        var data = {"hostname":hostname,'type':type,'ppm_id':type_ppm_activity};
        //description
          $.ajax({
             data:data,
             url: '<?=base_url()?>Form_PPM/get_acknowlegde',
             type: 'post',
             dataType: 'html',
             success: function(description){
                $("#acknowledge_"+sno).html(description);
                // var description = response;
                // $("#description").val(response);
                // var description = $("#description").val();
                // console.log(description);
                
             }
           });
        
     }


     function get_status(hostname,sno,type,type_ppm_activity)
     {
        var data = {"hostname":hostname,'type':type,'ppm_id':type_ppm_activity};
        //description
          $.ajax({
             data:data,
             url: '<?=base_url()?>Form_PPM/get_status',
             type: 'post',
             dataType: 'html',
             success: function(description){
                if(description==''){
                    description='Not Yet';
                }
                $("#status_"+sno).html(description);
                // var description = response;
                // $("#description").val(response);
                // var description = $("#description").val();
                // console.log(description);
                
             }
           });
        
     }



     function get_url(hostname,sno,type,type_ppm_activity)
     {
        var data = {"hostname":hostname,'type':type,'ppm_id':type_ppm_activity};
        //description
          $.ajax({
             data:data,
             url: '<?=base_url()?>Form_PPM/get_url',
             type: 'post',
             dataType: 'html',
             success: function(description){
                $("#url_"+sno).html(description);
                // var description = response;
                // $("#description").val(response);
                // var description = $("#description").val();
                // console.log(description);
                
             }
           });
        
     }




     function get_inack(hostname,sno,type,type_ppm_activity)
     {
        var data = {"hostname":hostname,'type':type,'ppm_id':type_ppm_activity};
        //description
          $.ajax({
             data:data,
             url: '<?=base_url()?>Form_PPM/person_inack',
             type: 'post',
             dataType: 'html',
             success: function(description){

              if(description){
                $("#url_"+sno).append(description);
              }
                
                // var description = response;
                // $("#description").val(response);
                // var description = $("#description").val();
                // console.log(description);
                
             }
           });
     }


     function get_department(sno,location)
     {
        var data = {"location":location};
        //description
          $.ajax({
             data:data,
             url: '<?=base_url()?>Form_PPM/get_department_ppm',
             type: 'post',
             dataType: 'html',
             success: function(description){

              if(description){
                $("#department_"+sno).append(description);
              }    
             }
           });
     }


     function get_location_form(hostname,sno,type,type_ppm_activity)
     {
        console.log(hostname);
        var data = {"hostname":hostname,'type':type,'ppm_id':type_ppm_activity};
        //description
          $.ajax({
             data:data,
             url: '<?=base_url()?>Form_PPM/get_location_ppm',
             type: 'post',
             dataType: 'html',
             success: function(description){

              if(description){
                $("#location_"+sno).append(description);
              }
                
              get_department_form(hostname,sno,type,type_ppm_activity,description)
                // var description = response;
                // $("#description").val(response);
                // var description = $("#description").val();
                // console.log(description);
                
             }
           });
     }


     function get_department_form(hostname,sno,type,type_ppm_activity,location)
     {
        console.log(hostname);
        var data = {"hostname":hostname,'type':type,'ppm_id':type_ppm_activity,location};
        //description
          $.ajax({
             data:data,
             url: '<?=base_url()?>Form_PPM/get_department_ppm',
             type: 'post',
             dataType: 'html',
             success: function(description){

              if(description){
                $("#department_"+sno).html(description);
              }
                
                // var description = response;
                // $("#description").val(response);
                // var description = $("#description").val();
                // console.log(description);
                
             }
           });
     }

     // Create table list
     function createTable(result,sno){
       sno = Number(sno);
       $('#postsList tbody').empty();

       if(result==''){
          var tr = "<tr>";
          tr += "<td></td>";
          tr += "<td>No Data</td>";
          tr += "<td>No Data</td>";
          tr += "<td>No Data</td>";
          tr += "<td>No Data</td>";
          tr += "<td>No Data</td>";
          tr += "<td>No Data</td>";
          tr += "<td>No Data</td>";
          tr += "<td>No Data</td>";
          tr += "<td>No Data</td>";
          tr += "</tr>";
          $('#postsList tbody').append(tr);
       }

       for(index in result){
          //var id = result[index].id;
          // var hostname = result[index].name;
          // var type = result[index].device;
          // var type_ppm_activity = result[index].device;
          // var ppm_type = result[index].ppm_type;
          // var status = result[index].status_ppm;
          // var acknowledge = result[index].acknowledge;
          // var created_date = result[index].created_date;


          var hostname = result[index].name;
          var description = result[index].description;
          var type = result[index].type;
          var type_ppm_activity = "<?= $this->session->userdata('id_activity')?>";
          var location = result[index].location;
          var department = result[index].department;
          


          // var description = result[index].description;

          // var type_device = result[index].type;



          sno+=1;

          var tr = "<tr>";
          tr += "<td id='url_"+sno+"'></td>";
          tr += "<td>"+ hostname +"</td>";
          tr += "<td>"+description+"</td>";
          tr += "<td>"+type+"</td>";
          tr += "<td>"+department+"</td>";
          // tr += "<td id='location_"+sno+"'></td>";
          tr += "<td>"+location+"</td>";
          tr += "<td id='acknowledge_"+sno+"'></td>";
          tr += "<td id='perform_date_"+sno+"'></td>";
          tr += "<td id='status_"+sno+"'></td>";
          tr += "<td id='print_"+sno+"'></td>";
          tr += "</tr>";
          $('#postsList tbody').append(tr);


          // get_url(result[index].hostname,sno,type,type_ppm_activity)
          // get_description(result[index].hostname,sno,type);
          // get_type(result[index].hostname,sno,type);
          // get_department(result[index].hostname,sno,type);
          //get_location_form(result[index].name,sno,type,type_ppm_activity);

          get_url(result[index].name,sno,type,type_ppm_activity);
          get_print(result[index].name,sno,type,type_ppm_activity);
          get_acknowlegde(result[index].name,sno,type,type_ppm_activity);
          get_status(result[index].name,sno,type,type_ppm_activity);
          get_perform_date(result[index].name,sno,type,type_ppm_activity);
          get_inack(result[index].name,sno,type,type_ppm_activity);
        

          //get_department(sno,location);
        }
      }
</script>


<script type="text/javascript">
    function printIcon(id)
    {
        $('#pdf_data').attr('action', '<?= base_url()?>Form_PPM/PDF_Computer/'+id);
        $("#submit").trigger('click');
    }

    function printIcon2(id)
    {
        $('#pdf_data').attr('action', '<?= base_url()?>Form_PPM/PDF_Hardware/'+id);
        $("#submit").trigger('click');
    }
</script>

<form action="" method="post" id="pdf_data">
    <button type="submit" id="submit" style="display: none">Submit</button>
</form>



<script type="text/javascript">
    
</script>