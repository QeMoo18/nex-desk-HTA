
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-6">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b> Custom View Datatables </b></h3>
		          </div>
		          <div class="box-body">
					<div class="form-group">
					  <input type="hidden" name="id_view" id="id_view" value="<?= rand()?>">
	                  <label for="exampleInputEmail1">Name Column</label>
	                  <input type='text' class='form-control' name='name_column' id='name_column'> 
	                  <span id="alert_name_column" style="display: none"><font color="red">* Cannot Be Null </font></span>
	                </div>
	                <div class="">
	                <button class="btn btn-block btn-primary" onclick="add_column();"> Add Column </button>
	                </div>
				  </div>
				</div>
			</div>


			<div class="col-md-6"> 
	        <div class="box box-primary">
	          <div class="box-header with-border">
	            <h3 class="box-title"><b> List View Column </b></h3>
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
                      {   'name_title':name_title,
                          'name_controller':name_controller,
                          'name_function':name_function,
                          'name_view':name_view,
                          'id_view':id_view,
                          '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                      }

                      
                      $.ajax({
                              url: '<?= base_url() ?>Ui/createviewnow_datatables',
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
	    $("#name_view").val('');
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

  function add_column(){
  		var name_column = $("#name_column").val();
  		var id_view = $("#id_view").val();

  		if(name_column==''){
  			$("#alert_name_column").show();
  		} else {
  			$("#alert_name_column").hide();
	  		var data = 
		                      {   
		                      	  'id_view':id_view,
		                          'name_column':name_column,
		                          '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		                      }

		                      
		                      $.ajax({
		                              url: '<?= base_url() ?>Ui/add_column_fielddtables',
		                              type: 'POST',
		                              dataType: 'html',
		                              data: data,
		                              beforeSend: function() {
		                                 // alert('Sila Tunggu');

		                              },
		                              success: function(response){
		                                alert('success');
		                                $("#name_column").val('');
		                                listadded();
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
                              url: '<?= base_url() ?>Ui/listadded_column',
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

  function delete_field(id)
  {
      var data = 
                      {   
                          'id':id,
                          '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                      }

                      
                      $.ajax({
                              url: '<?= base_url() ?>Ui/deleteadded_column',
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

