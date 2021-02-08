<div class="content-wrapper">

  <section class="content">
    <div class="row">

      <div class="col-md-6">  
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Create Module </h3>
          </div>

            <div class="box-body">
              <input type="hidden" name="id_view" id="id_view" value="<?= rand()?>">
              <div class="form-group">
                <label for="exampleInputEmail1">Fa-Fa-Icon (<i>refer: <a onclick="window.open('https://fontawesome.com/v4.7.0/icons/')"> https://fontawesome.com/v4.7.0/icons/ </a></i>)</label>
                <input type='text' class='form-control' name='fa_icon' id='fa_icon'> 
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Show Side Menu</label>
                <select class="form-control" name="left_show" id="left_show">
                  <option value="1"> Show </option>
                  <option value="0"> Hide </option>
                </select>
              </div>
              <div class="form-group">
                <input type="hidden" name="id_view" id="id_view" value="<?= rand()?>">
                <label for="exampleInputEmail1">Name Controller</label>
                <input type='text' class='form-control' name='name_controller' id='name_controller' onchange="check_name_controller();"> 
                <span id="alert_1" style="display: none"><font color="red">* Cannot Be Null </font></span>
                <span id="alert_3" style="display: none"><font color="red">* Already Used </font></span>
              </div>
              <div class="form-group">
                <input type="hidden" name="id_view" id="id_view" value="<?= rand()?>">
                <label for="exampleInputEmail1">Name Model</label>
                <input type='text' class='form-control' name='name_model' id='name_model' onchange="check_name_model();"> 
                <span id="alert_2" style="display: none"><font color="red">* Cannot Be Null </font></span>
                <span id="alert_4" style="display: none"><font color="red">* Already Used </font></span>
              </div>
              <div class="">
              <button class="btn btn-block btn-primary" onclick="add_module();"> Add Module </button>
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
  function check_name_controller()
  {
    var name_controller = $("#name_controller").val();

    var data = 
                    {   'name_controller':name_controller,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ui/check_name_controller',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');
                               $("#alert_1").hide();
                            },
                            success: function(response){
                                if(response==0){
                                  $("#alert_3").hide();
                                } else {
                                  $("#name_controller").val('');
                                  $("#alert_3").show();
                                }
                            }
                    });

  }
  function check_name_model()
  {
    var name_model = $("#name_model").val();

    var data = 
                    {   'name_model':name_model,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ui/check_name_model',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');
                               $("#alert_2").hide();
                            },
                            success: function(response){
                                if(response==0){
                                  $("#alert_4").hide();
                                } else {
                                  $("#name_model").val('');
                                  $("#alert_4").show();
                                }
                            }
                    });
  }

  function add_module()
  {
    $("#alert_3").hide();
    $("#alert_4").hide();

    var name_controller = $("#name_controller").val();    
    var name_model = $("#name_model").val();
    if(name_controller==''){
      $("#alert_1").show();
    } else {
      $("#alert_1").hide();
    }
    if(name_model==''){
      $("#alert_2").show();
    } else {
      $("#alert_2").hide();
    }

    if((name_controller=='')||(name_model==''))
    {

    } else {
      var fa_icon = $("#fa_icon").val();
      var left_show = $("#left_show").val();
      var data =  
                    {   'fa_icon':fa_icon,
                        'left_show':left_show,
                        'name_controller':name_controller,
                        'name_model':name_model,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ui/add_module',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');
                               $("#alert_2").hide();
                            },
                            success: function(response){
                               alert('Success Add Module !'); 
                               location.reload();
                            }
                    });
    }

  }
</script>