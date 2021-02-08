
		
<div class="content-wrapper">
<section class="content">
	<?= lookup_navbar(); ?> 
		<div class="row">
			<div class="col-md-8">
				<?= lookup_navbar_ticket(); ?>
			</div>
			<div class="col-md-4"> </div>
		</div>

		<?php $id = $this->uri->segment(3); ?>
		<h3> <i class="fa fa-check-circle-o" aria-hidden="true"></i>  Customer </h3>

		<div class="row">
			<div class="col-md-8">
				<div class="row">
			        <?= time_ticket(); ?>
		        </div>
			</div>	
			<div class="col-md-4"></div>
		</div>
	<div class="row">
		<div class="col-md-9">

			<div class="box box-success">
	          <div class="box-header with-border">
	            <h3 class="box-title"> <b>Ticket#<?=$id ?> - <span id="subject"> <?= subject_note($id); ?> </span> </b> </h3>
	          </div>
	          <div class="box-body">

				<form id="idForm" action="<?=base_url()?>ticket/add_custUser" method="post" enctype="multipart/form-data">

					<input type="hidden" name="id_ticket" value="<?= $id ?>">

					<div class="form-group">
		              <label for="exampleInputEmail1">* Customer ID</label>
		              <input type='text' class='form-control' name='ticket_customer_id' id='ticket_customer_id' value="<?= note_custID($id); ?>"> 

		            </div>

		            <div class="form-group">
		              <label for="exampleInputEmail1">* Customer User</label>
		              <select class="form-control" name="tp_cu" id="tp_cu" required > </select>
		            </div>
				
				
					<div class="form-group">
		            	<button type="submit" class="btn btn-primary btn-block">Submit</button>
		            	<button type="button" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
		            </div>

	            </form>

			  </div>
			</div>

			<div class="box box-success" id="data_list" style="display: none">
	          <div class="box-header with-border">
	            <h3 class="box-title"> <b>List Of Customer User </span> </b> </h3>
	          </div>
	          <div class="box-body">

	          	<table class="table table-striped">
			    	<tr>
				    	<th> Customer User </th>
				    	<th> Delete </th>
			    	</tr>
			    	<tbody id="list_data"> 
			    		
			    	</tbody>
			    </table>

			  </div>
			</div>
		</div>
		<div class="col-md-3">
        		<div class="col-md-11"><?= lookup_widget(); ?> </div>
          		<div class="col-md-1"> </div> 	
        </div>
	</div>
</section>
</div>
<script type="text/javascript">

	function delete_custUser(id)
	{
		var data = 
                    {
                    	'id':id,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ticket/delete_custUser',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                            	var id_ticket = "<?= $id ?>";
								list_custUser(id_ticket);
                               
                            }
                    });	
	}

	$(document).ready(function (){
		var customerID = $("#ticket_customer_id").val();
		get_customerID(customerID);
		var id_ticket = "<?= $id ?>";
		list_custUser(id_ticket);
	});

	function list_custUser(id_ticket)
	{
		var id_ticket = $.trim(id_ticket); //trim	

		var data = 
                    {
                    	'id_ticket':id_ticket,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ticket/list_custUser',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                            	if (!$.trim(response)){ 

                            	} else {
                            		$("#data_list").show();
                            		$("#list_data").html(response);
                            	}
                               
                            }
                    });
	}

	function get_customerID(customerID)
	{
		var customerID = customerID;

		var customerID = $.trim(customerID); //trim	

		var data = 
                    {
                    	'customerID':customerID,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ticket/get_customerID',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                            	if (!$.trim(response)){ 

                            	} else {
                            		var id = response;
									var id = $.trim(id); //trim	

									$("#tp_cu").html('<option value=""> -- Select Customer User -- </option>'+id);
                            	}
                               
                            }
                    });
	}

	function submit()
	{
		var ticket_customer_user = $("#ticket_customer_user").val();var ticket_customer_id = $("#ticket_customer_id").val();
		var data = 	{
						"ticket_customer_user" : ticket_customer_user,"ticket_customer_id" : ticket_customer_id,
						
					}

		$.ajax({
                    url: "<?= base_url() ?>Ticket/namafucntion",
                    type: "POST",
                    dataType: "html",
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){

                    }
            });

	}

	function cancel()
 	{
 		location.reload();
 	}
</script>