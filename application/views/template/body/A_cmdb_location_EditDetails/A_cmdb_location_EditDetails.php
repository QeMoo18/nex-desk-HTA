
        
<div class="content-wrapper">
    <section class="content">
        <?= lookup_navbar(); ?> 
        <h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Location Management</h5>
        <div class="row">
            <div class="col-md-2"> 
                <div class="form-group">
                    <a href="<?= base_url()?>admin/A_cmdb_location_viewList"> 
                        <button class="btn btn-danger btn-block"> Go To Overview</button>
                        </a>
                    </div>
                </div>  
            <div class="col-md-10">

                <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title"> <b>Edit Location</b> </h3>
                  </div>
                  <div class="box-body">

                        <div class="row">

                            <div class="form-group col-md-3">
                              <label for="exampleInputEmail1">*Level</label>
                              <select class="form-control" name="level" id="level">
                                 <option value="">-- Select Level --</option>
                                 <?= lookup_level()?>
                              </select>
                              <span id="alert_Level"></span> 
                            </div>

                            <div class="form-group col-md-3">
                              <label for="exampleInputEmail1">*Department</label>
                              <select class="form-control" name="department" id="department">
                                  <option value="">-- Select Department --</option>
                                  <?= lookup_department()?>
                              </select>
                              <span id="alert_department"></span> 
                            </div>

                            <div class="form-group col-md-3">
                              <label for="exampleInputEmail1">*Room Name</label>
                              <input type='text' class='form-control' name='room_name' id='room_name'>
                              <span id="alert_Room_name"></span> 
                            </div>

                            <div class="form-group col-md-3">
                              <label for="exampleInputEmail1">*Room ID</label>
                              <input type='text' class='form-control' name='LOC_name' id='LOC_name'>
                              <span id="alert_LOC_name"></span> 
                            </div>

                            
                        
                             <div class="form-group col-md-3">
                              <label for="exampleInputEmail1">*Deployment State</label>
                              <select class='form-control' name='LOC_deployment_state' id='LOC_deployment_state'>
                              <option value=''>< Please Select ></option>
                                <?= lookup_deployment_state(); ?>
                              </select>
                              <span id="alert_LOC_deployment_state"></span> 
                            </div>
                        
                            <div class="form-group col-md-3">
                              <label for="exampleInputEmail1">*Incident State</label>
                              <select class='form-control' name='LOC_incident_state' id='LOC_incident_state'>
                                <option value=''>< Please Select ></option>
                                <?= lookup_incident_state(); ?>
                              </select>
                              <span id="alert_LOC_incident_state"></span> 
                            </div>
                        
                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Type</label>
                                <select class='form-control' name='LOC_type' id='LOC_type'>
                                    <option value=''>< Please Select ></option>
                                    <?= lookup_location_type(); ?>
                                </select>
                            </div>
                        
                            <div class="form-group col-md-3">
                              <label for="exampleInputEmail1">Phone</label>
                              <input type='text' class='form-control' name='LOC_phone' id='LOC_phone' 
                              onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="11"> 
                            </div>
                        
                            <div class="form-group col-md-3">
                              <label for="exampleInputEmail1">Address</label>
                              <textarea rows="4" class='form-control' name='LOC_address' id='LOC_address'> </textarea> 
                            </div>
                        
                            <div class="form-group col-md-3">
                              <label for="exampleInputEmail1">City</label>
                              <input type='text' class='form-control' name='LOC_city' id='LOC_city'> 
                            </div>
                        
                            <div class="form-group col-md-3">
                              <label for="exampleInputEmail1">State</label>
                              <input type='text' class='form-control' name='LOC_state' id='LOC_state'> 
                            </div>
                        
                            <div class="form-grou col-md-3">
                              <label for="exampleInputEmail1">Country</label>
                              <input type='text' class='form-control' name='LOC_country' id='LOC_country'> 
                            </div>
                        
                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">*Validity</label>
                                <select class='form-control' name='LOC_validity' id='LOC_validity'><option value=''>
                                    <option value=''>< Please Select ></option>
                                    <?= lookup_validity(); ?>
                                </select>
                                <span id="alert_LOC_validity"></span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-2">
                                <button type="submit" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
                            </div>
                            <div class="form-group col-md-2">
                              <button class="btn btn-primary btn-block" onclick="submit();"> Submit </button>
                            </div>     
                        </div>     
                  </div>
                </div>
            </div>

        </div>
    </section>
</div>

<!-- Input hidden get - ID -->
<input type="hidden" name="other_id" id="other_id" value="<?= $this->uri->segment('3')?>">


<script type="text/javascript">

    $(document).ready(function (){ // automatik bila dia open browser
        details(); //panggil function details
    });

    function details() //create dekat function
    {
        var other_id = $("#other_id").val(); //get id hidden 
        
        var data =  {
                            'other_id':other_id, //declare variable dalam data 
                            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

        $.ajax({
                    url: '<?= base_url() ?>Admin/cmdb_location_details', //create nama function
                    type: 'POST',
                    dataType: 'json', //jenis type adalah json
                    data: data,
                    beforeSend: function() {
                       
                    },
                    success: function(response){


                         //input daripada form - id
                        var level = $("#level").val(response.level);
                        var department = $("#department").val(response.department);
                        var department = $("#room_name").val(response.room_name);
                        var LOC_name = $("#LOC_name").val(response.name);
                        var LOC_deployment_state = $("#LOC_deployment_state").val(response.deployment_state);
                        var LOC_incident_state = $("#LOC_incident_state").val(response.incident_state);
                        var LOC_type = $("#LOC_type").val(response.type);
                        var LOC_phone = $("#LOC_phone").val(response.phone);
                        var LOC_address = $("#LOC_address").val(response.address);
                        var LOC_city = $("#LOC_city").val(response.city);
                        var LOC_state = $("#LOC_state").val(response.state);
                        var LOC_country = $("#LOC_country").val(response.country);
                        var LOC_validity = $("#LOC_validity").val(response.validity);
                  }
              });
    }


    function submit()
    {
        //input daripada form - id
        var level = $("#level").val();
        var department = $("#department").val();
        var room_name = $("#room_name").val();
        var LOC_name = $("#LOC_name").val();
        var LOC_deployment_state = $("#LOC_deployment_state").val();
        var LOC_incident_state = $("#LOC_incident_state").val();
        var LOC_type = $("#LOC_type").val();
        var LOC_phone = $("#LOC_phone").val();
        var LOC_address = $("#LOC_address").val();
        var LOC_city = $("#LOC_city").val();
        var LOC_state = $("#LOC_state").val();
        var LOC_country = $("#LOC_country").val();
        var LOC_validity = $("#LOC_validity").val();
        var other_id = $("#other_id").val(); //get id hidden 
    
        
        //check to action
        //check to action
        if(level)
        { 
          $("#alert_Level").html('');
        } else {
          $("#alert_Level").html('<font color="red"> required field </font>');
        }

        if(department)
        { 
          $("#alert_department").html('');
        } else {
          $("#alert_department").html('<font color="red"> required field </font>');
        }


        if(room_name)
        { 
          $("#alert_Room_name").html('');
        } else {
          $("#alert_Room_name").html('<font color="red"> required field </font>');
        }

        if(LOC_name)
        { 
            $("#alert_LOC_name").html('');
        } else {
            $("#alert_LOC_name").html('<font color="red"> required field </font>');
        }

        if(LOC_deployment_state)
        { 
            $("#alert_LOC_deployment_state").html('');
        } else {
            $("#alert_LOC_deployment_state").html('<font color="red"> required field </font>');
        }

        if(LOC_incident_state)
        { 
            $("#alert_LOC_incident_state").html('');
        } else {
            $("#alert_LOC_incident_state").html('<font color="red"> required field </font>');
        }

        if(LOC_validity)
        { 
            $("#alert_LOC_validity").html('');
        } else {
            $("#alert_LOC_validity").html('<font color="red"> required field </font>');
        }


        //check to submit
        if((LOC_name=='')||(LOC_deployment_state=='')||(LOC_incident_state=='')||(LOC_validity=='')){

        } else {



        var data = 
                        {   
                            'level':level,
                            'department':department,
                            'room_name':room_name,
                            'LOC_name':LOC_name, // ini room id
                            'LOC_deployment_state':LOC_deployment_state,
                            'LOC_incident_state':LOC_incident_state,
                            'LOC_type':LOC_type,
                            'LOC_phone':LOC_phone,
                            'LOC_address':LOC_phone,
                            'LOC_address':LOC_address,
                            'LOC_city':LOC_city,
                            'LOC_state':LOC_state,
                            'LOC_country':LOC_country,
                            'LOC_validity':LOC_validity,
                            'other_id':other_id,
                            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                        }

                    
            $.ajax({
                    url: '<?= base_url() ?>Admin/CMDB_Location_update', //create nama function controller
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                        //alert("Location Updated !");
                        //location.reload();

                        var url = "<?= base_url()?>Admin/A_cmdb_location_viewList";
                        window.location.href=url;
                    }
            });
        
        }
    }

    function cancel()
    {
            location.reload();
    }
</script>




<script type="text/javascript">
  $(document).ready(function (){
    $("#level").change(function (){
      var level = $("#level").val();
      var data = 
                    {   'level':level,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
            $.ajax({
                    url: '<?= base_url() ?>Admin/Get_Department',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                      $("#department").html('<option value="">-- Select Department --</option>'+response);
                    }
            });
    });
  });
</script>