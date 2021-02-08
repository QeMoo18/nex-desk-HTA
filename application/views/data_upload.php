<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>NexDesk</title>


		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" />

		<!-- Bootstrap 3.3.7 -->
		<link rel="stylesheet" href="<?= base_url()?>asset_admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?= base_url()?>asset_admin/bower_components/font-awesome/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="<?= base_url()?>asset_admin/bower_components/Ionicons/css/ionicons.min.css">
		<!-- jvectormap -->
		<link rel="stylesheet" href="<?= base_url()?>asset_admin/bower_components/jvectormap/jquery-jvectormap.css">

		<!-- Ionicons -->
		<link rel="stylesheet" href="<?= base_url()?>asset_admin/bower_components/Ionicons/css/ionicons.min.css">

		<script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
		<script src="<?= base_url()?>asset_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

	</head>

	<body>
		
		<div class="container">
		    <div class="page-header">
		        <h3><span class="glyphicon glyphicon-upload"></span> Upload Data To Nex-Hospital</h3>
		    </div>
		    <legend> User Information </legend>
		    <div class="row grid-divider">
			    <div class="col-sm-4">
			      <div class="col-padding">
			        <h3>Agent</h3>
			        <p><a href="<?= base_url()?>sample_data/Agent.xlsx" download><span class="glyphicon glyphicon-download-alt"></span> Download Sample</a></p>

			        <div class="well">
				        <form action="<?=base_url()?>DataUpload/agent" method="post" enctype="multipart/form-data" class="form-horizontal">
						  <div class="form-group">
						    <label for="exampleInputPassword1">Excel File</label>
						    <input type="hidden" name="submit" value="submit">
						    <input type="file" name="uploadFile" class="form-control"/>
						  </div>
						  <button type="submit" class="btn btn-primary btn-block">Submit</button>
						</form>
					</div>
			      </div>
			    </div>
			    <div class="col-sm-4">
			      <div class="col-padding">
			        <h3>Customer </h3>
			        <p><a href="<?= base_url()?>sample_data/Customer.xlsx" download><span class="glyphicon glyphicon-download-alt"></span> Download Sample</a></p>

			        <div class="well">
				        <form action="<?=base_url()?>DataUpload/customer" method="post" enctype="multipart/form-data" class="form-horizontal">
						  <div class="form-group">
						    <label for="exampleInputPassword1">Excel File</label>
						    <input type="hidden" name="submit" value="submit">
						    <input type="file" name="uploadFile" class="form-control"/>
						  </div>
						  <button type="submit" class="btn btn-primary btn-block">Submit</button>
						</form>
					</div>
			      </div>
			    </div>
			    <div class="col-sm-4">
			      <div class="col-padding">
			        <h3>Customer User</h3>
			        <p><a href="<?= base_url()?>sample_data/Customer_User.xlsx" download><span class="glyphicon glyphicon-download-alt"></span> Download Sample</a></p>

			        <div class="well">
				        <form action="<?=base_url()?>DataUpload/customer_user" method="post" enctype="multipart/form-data" class="form-horizontal">
						  <div class="form-group">
						    <label for="exampleInputPassword1">Excel File</label>
						    <input type="hidden" name="submit" value="submit">
						    <input type="file" name="uploadFile" class="form-control"/>
						  </div>
						  <button type="submit" class="btn btn-primary btn-block">Submit</button>
						</form>
					</div>
			      </div>
			    </div>
		    </div>
		    <legend> Asset Information </legend>
		    <div class="row grid-divider">
			    <div class="col-sm-4">
			      <div class="col-padding">
			        <h3>Network</h3>
			         <p><a href="<?= base_url()?>sample_data/Network.xlsx" download><span class="glyphicon glyphicon-download-alt"></span> Download Sample</a></p>
			        <div class="well">
				        <form action="<?=base_url()?>DataUpload/network" method="post" enctype="multipart/form-data" class="form-horizontal">
						  <div class="form-group">
						    <label for="exampleInputPassword1">Excel File</label>
						    <input type="hidden" name="submit" value="submit">
						    <input type="file" name="uploadFile" class="form-control"/>
						  </div>
						  <button type="submit" class="btn btn-primary btn-block">Submit</button>
						</form>
					</div>
			      </div>
			    </div>
			    <div class="col-sm-4">
			      <div class="col-padding">
			        <h3>Computer </h3>
			        <p><a href="<?= base_url()?>sample_data/Computer.xlsx" download><span class="glyphicon glyphicon-download-alt"></span> Download Sample</a></p>
			        <div class="well">
				        <form action="<?=base_url()?>DataUpload/computer" method="post" enctype="multipart/form-data" class="form-horizontal">
						  <div class="form-group">
						    <label for="exampleInputPassword1">Excel File</label>
						    <input type="hidden" name="submit" value="submit">
						    <input type="file" name="uploadFile" class="form-control"/>
						  </div>
						  <button type="submit" class="btn btn-primary btn-block">Submit</button>
						</form>
					</div>
			      </div>
			    </div>
			    <div class="col-sm-4">
			      <div class="col-padding">
			        <h3>Hardware</h3>
			        <p><a href="<?= base_url()?>sample_data/Hardware.xlsx" download><span class="glyphicon glyphicon-download-alt"></span> Download Sample</a></p>
			        <div class="well">
				        <form action="<?=base_url()?>DataUpload/hardware" method="post" enctype="multipart/form-data" class="form-horizontal">
						  <div class="form-group">
						    <label for="exampleInputPassword1">Excel File</label>
						    <input type="hidden" name="submit" value="submit">
						    <input type="file" name="uploadFile" class="form-control"/>
						  </div>
						  <button type="submit" class="btn btn-primary btn-block">Submit</button>
						</form>
					</div>
			      </div>
			    </div>
		    </div>
		    <div class="row grid-divider">
			    <div class="col-sm-4">
			      <div class="col-padding">
			        <h3>Software</h3>
			        <p><a href="<?= base_url()?>sample_data/Software.xlsx" download><span class="glyphicon glyphicon-download-alt"></span> Download Sample</a></p>
			        <div class="well">
				        <form action="<?=base_url()?>DataUpload/software" method="post" enctype="multipart/form-data" class="form-horizontal">
						  <div class="form-group">
						    <label for="exampleInputPassword1">Excel File</label>
						    <input type="hidden" name="submit" value="submit">
						    <input type="file" name="uploadFile" class="form-control"/>
						  </div>
						  <button type="submit" class="btn btn-primary btn-block">Submit</button>
						</form>
					</div>
			      </div>
			    </div>
			    <div class="col-sm-4">
			      <div class="col-padding">
			        <h3>Location </h3>
			        <p><a href="<?= base_url()?>sample_data/Location.xlsx" download><span class="glyphicon glyphicon-download-alt"></span> Download Sample</a></p>
			        <div class="well">
				        <form action="<?=base_url()?>DataUpload/location" method="post" enctype="multipart/form-data" class="form-horizontal">
						  <div class="form-group">
						    <label for="exampleInputPassword1">Excel File</label>
						    <input type="hidden" name="submit" value="submit">
						    <input type="file" name="uploadFile" class="form-control"/>
						  </div>
						  <button type="submit" class="btn btn-primary btn-block">Submit</button>
						</form>
					</div>
			      </div>
			    </div>
			    <div class="col-sm-4">
			      <div class="col-padding">
			      </div>
			    </div>
		    </div>
		</div>

	</body>
</html>

<?php $fb = $this->session->flashdata('feedback');?>
<?php if(!empty($fb)){ ?>

	<script type="text/javascript">
		$(document).ready(function (){
			var status = "<?= $fb['feedback'] ?>";
			$("#status").html(status);
			$("#myModal").modal('show');
		});
	</script>
	
<?php } ?>



<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Status For Upload</h4>
      </div>
      <div class="modal-body" id="status">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->