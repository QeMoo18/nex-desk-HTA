

<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-6">

				<div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Create Topic</b> </h3>
		          </div>
		          <div class="box-body">

		          		<div id="div_register"> 
							<div class="form-group">
				              <label for="exampleInputEmail1">* Title Topic</label>
				              <input type='text' class='form-control' name='classroom_create_topic' id='classroom_create_topic'> 
				              <span id="alert_classroom_create_topic" style="display: none"><font color="red"><i> * Required field </i></font></span>
				            </div>
						
				            <div class="form-group">
				            	<button class="btn btn-primary btn-block" onclick="btn_register();"> Register Topic </button>
				            </div>
				        </div>

				        <div id="div_contain" style="display: none">
							<div class="form-group">
				              <label for="exampleInputEmail1">* Subject List</label>
				              <input type='text' class='form-control' name='classroom_subject_list' id='classroom_subject_list'> 
				              <span id="alert_classroom_subject_list" style="display: none"><font color="red"><i> * Required field </i></font></span>
				            </div>
						
							<div class="form-group">
									<label for="exampleInputEmail1">* Select File</label>
									<select class='form-control' name='classroom_create_selectfile' id='classroom_create_selectfile'>
										<option value=''>< Please Select ></option>
										<option value='controller'>Controller</option>
										<option value='model'>Model</option>
										<option value='view'>View</option>
										<option value='js'>JS</option>
										<option value='note'>Note</option>
									</select>
									<span id="alert_classroom_create_selectfile" style="display: none"><font color="red"><i> * Required field </i></font></span>
				            </div>

							<div class="form-group">
									<label for="exampleInputEmail1">Description</label>
									
									<textarea class='form-control' rows='14' name='classroom_create_description2' id='classroom_create_description2' style="display:none"></textarea>

									<textarea class='form-control' rows='14' name='classroom_create_description' id='classroom_create_description'></textarea>
									<span id="alert_classroom_create_description" style="display: none"><font color="red"><i> * Required field </i></font></span>

				            </div>

				            <div class="form-group">
				            	<button class="btn btn-primary btn-block" onclick="add_subject();"> Add Subject </button>
				            </div>
				        </div>
					
				  </div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box box-success" id="list_titletopic" style="display: none">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Register Topic</b> </h3>
		          </div>
		          <div class="box-body" id="contain_list_titletopic">

		          </div>
		        </div>

		        <div class="box box-success">
		          <div class="box-header with-border">
		            <h3 class="box-title"> <b>Relation Subject</b> </h3>
		          </div>
		          <div class="box-body">

		          			<div id="listSubject">
		          				
		          			</div>

		          			<form action="<?= base_url()?>Classroom/Create_Topic" method="post" enctype="multipart/form-data">
		          				<h4> <b>Submission File </b> </h4>
		          				<hr>
								<input type="hidden" name="id_topic" id="id_topic" value="<?= rand()?>">
			          			<div class="form-group">
					              <label for="exampleInputEmail1">Upload Img</label>
					              <input type="file"  class='form-control' name='userfile' id='classroom_create_img'> 
					            </div>

			          			<div class="form-group">
					            	<button type="submit" class="btn btn-primary btn-block" onclick="create_now();"> Create Now </button>
					            </div>
					        </form>

		          </div>
		        </div>

			</div>
		</div>
	</section>
</div>
  

<script type="text/javascript">
	function btn_register()
	{	
		var id_topic = $("#id_topic").val();
		var create_topic = $("#classroom_create_topic").val();
		if(create_topic){

			var data = 
		                {   'id_topic':id_topic,
		                	'create_topic':create_topic,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		                }

                    
            $.ajax({
                    url: '<?= base_url() ?>Classroom/register_topic',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                        $("#alert_classroom_create_topic").hide();
						$("#div_register").hide();
						$("#div_contain").show();
						$("#list_titletopic").show();
						$("#contain_list_titletopic").html('<div class="alert alert-success" role="alert"> Create Title Topic : </b> '+create_topic+' <b></div>');
                    }
            });

		} else {
			$("#alert_classroom_create_topic").show();

		}		
	}

	function addNewLine()
	{
	  var text = document.getElementById('classroom_create_description').value;
	  text = text.replace(/ /g, "&nbsp;");
	  text = text.replace(/\n/g,"<br>");
	  $("#classroom_create_description2").val(text);
	  return false;
	}

	function add_subject()
	{	
		addNewLine();

		var subject = $("#classroom_subject_list").val();
		var type = $("#classroom_create_selectfile").val();
		var desc_subject = $("#classroom_create_description2").val();
		var id_topic = $("#id_topic").val();

		if((subject==='')||(type==='')||(desc_subject===''))
		{
			if(subject){
				$("#alert_classroom_subject_list").hide();
			} else {
				$("#alert_classroom_subject_list").show();
			}
			if(type){
				$("#alert_classroom_create_selectfile").hide();
			} else {
				$("#alert_classroom_create_selectfile").show();
			}
			if(desc_subject){
				$("#alert_classroom_create_description").hide();
			} else {
				$("#alert_classroom_create_description").show();
			}
		} else {			

			var data = 
		                {   'id_topic':id_topic,
		                	'subject':subject,
		                	'type':type,
		                	'desc_subject':desc_subject,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		                }

                    
            $.ajax({
                    url: '<?= base_url() ?>Classroom/add_topic',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                        $("#alert_classroom_subject_list").hide();
						$("#alert_classroom_create_selectfile").hide();
						$("#alert_classroom_create_description").hide();

						$("#classroom_subject_list").val('');
						$("#classroom_create_selectfile").val('');
						$("#classroom_create_description").val('');
						$("#classroom_create_description2").val('');

						list_subject();
                    }
            });


		}

	}
	function create_now()
	{
		alert('Success Create !');
	}
	function list_subject()
	{
		var id_topic = $("#id_topic").val();
		var data = 
		                {   'id_topic':id_topic,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		                }

                    
            $.ajax({
                    url: '<?= base_url() ?>Classroom/list_subject',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                    	if(response){
                    		$("#listSubject").html(response);
                    	}
                    }
            });
	}
	function delete_topic(id)
	{
		var data = 
		                {   'id':id,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		                }

                    
            $.ajax({
                    url: '<?= base_url() ?>Classroom/delete_topic',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                    	list_subject();
                    }
            });
	}
</script>



