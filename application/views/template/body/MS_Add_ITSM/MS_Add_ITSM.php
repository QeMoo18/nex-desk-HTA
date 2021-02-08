<?php $id = $this->uri->segment('3')?>

<link rel="stylesheet" href="<?= base_url()?>/asset_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
		<div class="row">
			<div class="col-md-8 hidden-xs">
				<?= lookup_navbar_ticket_master(); ?>
			</div>
			<div class="col-md-2"> </div>
		</div>
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Add ITSM Master Ticket </h5>
		<div class="row">
			<div class="col-md-9">

				<!-- FIRST -->
					<div class="box box-success">
			          <div class="box-header with-border">
			            
			          </div>

			          	
				          	<div class="box-body">
				          		<div class="col-md-8">
									<form action="<?= base_url()?>Ticket/Add_ITSM_Master" method="post"> 
									<div class="panel-group">
									  <div class="panel panel-primary">
									    <div class="panel-heading">
									      <h4 class="panel-title">
									        <a data-toggle="collapse" href="#collapse1" id="cust">
									        	<label> 
									        		<span class="fa fa-group" aria-hidden="true"></span>  
									    			TICKET INFORMATION
									    		</label>
									    	</a>
									      </h4>
									    </div>
									    <div id="collapse1" class="panel-collapse collapse in">
									      <div class="panel-body">

									      		<div class="form-group col-md-6">
								                  <label for="exampleInputEmail1">* Subject/Title</label>
								                  <input type='text' class='form-control' name='ms_subject' id='ms_subject' required="required" value="<?= subject_note_master($id); ?>"> 
								                </div>

								                <div class="form-group col-md-6">
								                  <label for="exampleInputEmail1">Provider Reference</label>
								                  <input type='text' class='form-control' name='ms_provider' id='ms_provider' value="<?= pull_data_provider_ref_master($id); ?>"> 
								                </div>

								                <?php $id = $this->uri->segment(3) ?>
								                <div class="form-group col-md-6">
								                  <label for="exampleInputEmail1">* Type</label>
								                  <select class="form-control" name='ms_type' id='ms_type' required>
								                  		<?= pull_data_type($id); ?>
								                  </select>
								                </div>


								                <div class="form-group col-md-6">
								                  <label for="exampleInputEmail1">* To Queu</label>
								                  <select class="form-control" name='ms_queu' id='ms_queu' required>
								                  	<?= pull_data_itsm_to_queu_master($id); ?>
								                  </select>
								                </div>


								                <div class="form-group col-md-6">
								                  <label for="exampleInputEmail1">Impact</label>
								                  <select class="form-control" name='ms_impact' id='ms_impact'>
								                  	<?= pull_data_impact_note_master($id); ?>
								                  </select>
								                </div>

								                <div class="form-group col-md-6">
								                  <label for="exampleInputEmail1">Priority</label>
								                  <select class="form-control" name='ms_priority' id='ms_priority'>
								                  	<?= pull_data_priority_note_master($id); ?>
								                  </select>
								                </div>

								                <div class="form-group">
											<div class="col-md-6">
							            		<button class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
											</div>
											<div class="col-md-6">
							            		<button type="submit" class="btn btn-primary btn-block">Update</button>
											</div>
							        </div>

									      </div>
									   	</div>
									 </div>

									</div>

									<input type="hidden" name="id_ticket" value="<?= $id ?>">
									
							        </form>
						    	</div>
						    	<div class="col-md-4">
						        	<?php widget_ticket_master(); ?> 	
						        	 
						        </div>
					    </div>

					    
				    </div>

							
			</div>
			<div class="col-md-3 hidden-xs">
                <div class="col-md-11"> <?= lookup_widget_master(); ?> </div>
                <div class="col-md-1"> </div>
            </div>
		</div>
	</section>
</div>
