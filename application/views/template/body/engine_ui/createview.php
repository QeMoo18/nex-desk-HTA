<div class="content-wrapper">

	<section class="content">
		<div class="row">

      <div class="col-md-6">  
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><b>Custom View Form </b></h3>
          </div>
          <!-- <form role="form"> -->
            <div class="box-body">
              <input type="hidden" name="id_view" id="id_view" value="<?= rand()?>">

              <div class="form-group">
                  <label for="exampleInputEmail1"> * Label Field</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-eyedropper"></i></span>
                    <input type="text" class="form-control" placeholder="Label Field" id="label_field">
                  </div>
                  <span id="alert_label" style="display: none"><font color="red">* Cannot Be Null </font></span>
              </div>

              <div class="form-group">
                  <label for="exampleInputEmail1">* Type Fields</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-chevron-circle-down"></i></span>
                    <select class="form-control" id="type_field" name="">
                      <option value="">< Select Field ></option>
                      <option value="text">Text</option>
                      <option value="dropdown">Dropdown</option>
                      <option value="textarea">TextArea</option>
                      <option value="radio">Radio</option>
                      <option value="checkbox">Checkbox</option>
                    </select>
                  </div>
                  <span id="alert_type" style="display: none"><font color="red">* Cannot Be Null </font></span>
              </div>

              <div class="form-group">
                  <label for="exampleInputEmail1">* ID Field</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-chain-broken"></i></span>
                    <input type="text" class="form-control" placeholder="ID Field" id="id_field" onchange="check_idfield();">
                  </div>
                  <span id="alert_id_field" style="display: none"><font color="red">* already used </font></span>
                  <span id="alert_id" style="display: none"><font color="red">* Cannot Be Null </font></span>
              </div>

              <div class="form-group">
                  <label for="exampleInputEmail1">* Name Field</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-chain"></i></span>
                    <input type="text" class="form-control" placeholder="Name Field" id="name_field" onchange="check_namefield();">
                  </div>
                  <span id="alert_name_field" style="display: none"><font color="red">* already used </font></span>
                  <span id="alert_name" style="display: none"><font color="red">* Cannot Be Null </font></span>
              </div>

              

              <div class="form-group">
                  <button class="btn btn-block btn-primary" onclick="add_field();"> Add Field </button>
              </div>

            </div>
          <!-- </form> -->
        </div>
      </div>  

      <div class="col-md-6"> 
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><b> List View Form </b></h3>
          </div>
          <form role="form">
            <div class="box-body" id="listdata">

            </div>
          </form>
        </div>
      </div>

		</div>


    <div class="row">
      <div class="col-md-6"> 
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><b> Create File View </b></h3>
          </div>
            <div class="box-body" id="listdata">

              <div class="form-group">
                  <label for="exampleInputEmail1">* Name File Controller </label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-chevron-circle-down"></i></span>
                    <select class="form-control" id="name_controller" name="">
                      <option value="">< Select Controller ></option>
                      <?php lookup_namecontroller(); ?>
                    </select>
                  </div>
                  <span id="alert_contoller" style="display: none"><font color="red">* Cannot Be Null </font></span>
              </div>

              <div class="form-group">
                  <label for="exampleInputEmail1"> * Name Function In Controller</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-window-restore"></i></span>
                    <input type="text" class="form-control" placeholder="Label Field" id="name_function" onchange="check_namefunction();">
                  </div>
                  <span id="alert_function" style="display: none"><font color="red">* Cannot Be Null </font></span>
                  <span id="alert_function2" style="display: none"><font color="red">* Already used </font></span>
              </div>

              <div class="form-group">
                  <label for="exampleInputEmail1"> * Name File View</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-object-group"></i></span>
                    <input type="text" class="form-control" placeholder="Label Field" id="name_view" onchange="check_nameview();">
                  </div>
                  <span id="alert_view" style="display: none"><font color="red">* Cannot Be Null </font></span>
                  <span id="alert_view2" style="display: none"><font color="red">* Already used </font></span>
              </div>

              <div class="form-group">
                  <label for="exampleInputEmail1"> * Name Title Form</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-object-ungroup"></i></span>
                    <input type="text" class="form-control" placeholder="Label Field" id="name_title">
                  </div>
                  <span id="alert_title" style="display: none"><font color="red">* Cannot Be Null </font></span>
              </div>

              <div class="form-group">
                  <button class="btn btn-block btn-success" onclick="createview();"> Create View </button>
              </div>

            </div>
        </div>
      </div>
      <div class="col-md-6">
      </div>
    </div>

    </section>
</div>

<script type="text/javascript">
  function createview()
  {
      var name_controller = $("#name_controller").val();
      var name_function = $("#name_function").val();
      var name_view = $("#name_view").val();
      var id_view = $("#id_view").val();
      var name_title = $("#name_title").val();

      if((name_controller==='')||(name_function==='')||(name_view==='')||(name_title===''))
      {
        alert(" * Required fields at Create File View");
      } else {

        var data = 
                      {   
                          'name_title':name_title,
                          'name_controller':name_controller,
                          'name_function':name_function,
                          'name_view':name_view,
                          'id_view':id_view,
                          '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                      }

                      
                      $.ajax({
                              url: '<?= base_url() ?>Ui/createviewnow',
                              type: 'POST',
                              dataType: 'html',
                              data: data,
                              beforeSend: function() {
                                 // alert('Sila Tunggu');

                              },
                              success: function(response){
                                  alert("Success Create !");
                                  location.reload();
                              }
                      });

      }

  }

  $("#name_controller").change(function (){
    $("#name_function").val('');
    var name_controller = $("#name_controller").val();
    if(name_controller===''){
      //alert('a');
      $("#alert_contoller").show();
    } else {
      //alert('b');
      $("#alert_contoller").hide();

    }
  });

  function check_namefunction()
  {
    var name_controller = $("#name_controller").val();
    if(name_controller===''){
      //alert('a');
      $("#alert_contoller").show();
    } else {
      //alert('b');
      $("#alert_contoller").hide();
    }

    var name_function = $("#name_function").val();
    if(name_function===''){
      //alert('a');
      $("#alert_function").show();
    } else {
      //alert('b');
      $("#alert_function").hide();
    }

    if((name_controller==='')||(name_function==='')){

    } else {
      var data = 
                      {   
                          'name_controller':name_controller,
                          'name_function':name_function,
                          '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                      }

                      
                      $.ajax({
                              url: '<?= base_url() ?>Ui/check_namefunction',
                              type: 'POST',
                              dataType: 'html',
                              data: data,
                              beforeSend: function() {
                                 // alert('Sila Tunggu');

                              },
                              success: function(response){
                                if(response>0){
                                  $("#alert_function2").show();
                                  $("#name_function").val('');
                                } else {
                                  $("#alert_function2").hide();
                                }
                              }
                      });
    }

  }

  function check_nameview()
  {
    var name_view = $("#name_view").val();
    if(name_view===''){
      $("#alert_view").show();
      $("#name_view").val('');
    } else {
      $("#alert_view").hide();

      var data = 
                      {   
                          'name_view':name_view,
                          '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                      }

                      
                      $.ajax({
                              url: '<?= base_url() ?>Ui/check_nameview',
                              type: 'POST',
                              dataType: 'html',
                              data: data,
                              beforeSend: function() {
                                 // alert('Sila Tunggu');

                              },
                              success: function(response){
                                if(response>0){
                                  $("#alert_view2").show();
                                  $("#name_view").val('');
                                } else {
                                  $("#alert_view2").hide();
                                }
                              }
                      });

    }
  }

  function add_field()
  {
    var label = $("#label_field").val();
    var type = $("#type_field").val();
    var id = $("#id_field").val();
    var name = $("#name_field").val();
    var id_view = $("#id_view").val();

    if(label==''){
      $("#alert_label").show();
    } else {
      $("#alert_label").hide();
    }
    if(type==''){
      $("#alert_type").show();
    } else {
      $("#alert_type").hide();
    }
    if(id==''){
      $("#alert_id_field").hide();
      $("#alert_id").show();
    } else {
      $("#alert_id").hide();
    }
    if(name==''){
      $("#alert_name_field").hide();
      $("#alert_name").show();
    } else {
      $("#alert_name").hide();
    }

    if((label=='')||(type=='')||(id=='')||(name=='')){

    } else {
      var data = 
                      {   'label':label,
                          'type':type,
                          'id':id,
                          'name':name,
                          'id_view':id_view,
                          '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                      }

                      
                      $.ajax({
                              url: '<?= base_url() ?>Ui/addfieldview',
                              type: 'POST',
                              dataType: 'html',
                              data: data,
                              beforeSend: function() {
                                 // alert('Sila Tunggu');

                              },
                              success: function(response){
                                alert('Success Add Field !');
                                listadded();
                                var label = $("#label_field").val('');
                                var type = $("#type_field").val('');
                                var id = $("#id_field").val('');
                                var name = $("#name_field").val('');

                              }
                      });
    }

  }

  function listadded()
  {
      var id_view = $("#id_view").val();
      var data = 
                      {   
                          'id_view':id_view,
                          '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                      }

                      
                      $.ajax({
                              url: '<?= base_url() ?>Ui/listadded',
                              type: 'POST',
                              dataType: 'html',
                              data: data,
                              beforeSend: function() {
                                 // alert('Sila Tunggu');

                              },
                              success: function(response){
                                $("#listdata").html(response);
                              }
                      });
  }

  

  function check_idfield()
  {
    var t = $("#id_field").val();
    $("#id_field").val($("#id_field").val().replace(/\s+/g, ''));
    check_id();
  }
  function check_namefield()
  {
    var t = $("#name_field").val();
    $("#name_field").val($("#name_field").val().replace(/\s+/g, ''));
    check_name();
  }
  function check_id()
  {
    var id = $("#id_field").val();
    var data = 
                    {   'id':id,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ui/check_id_field',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                                if(response==0){
                                  $("#alert_id_field").hide();
                                } else {
                                  $("#id_field").val('');
                                  $("#alert_id_field").show();
                                }
                            }
                    });
  }
  function check_name()
  {
    var name = $("#name_field").val();
    var data = 
                    {   'name':name,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ui/check_name_field',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                                if(response==0){
                                  $("#alert_name_field").hide();
                                } else {
                                  $("#name_field").val('');
                                  $("#alert_name_field").show();
                                }
                            }
                    });
  }

  function delete_field(id)
  {
      var data = 
                      {   
                          'id':id,
                          '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                      }

                      
                      $.ajax({
                              url: '<?= base_url() ?>Ui/deleteadded',
                              type: 'POST',
                              dataType: 'html',
                              data: data,
                              beforeSend: function() {
                                 // alert('Sila Tunggu');

                              },
                              success: function(response){
                                alert("Success Delete Field !");
                                listadded();
                              }
                      });
  }
</script>