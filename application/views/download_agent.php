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
		        <h3><span class="glyphicon glyphicon-download-alt"></span> Download Agent From Nex-Hospital</h3>
		    </div>
		    <div class="row grid-divider">
			    <div class="col-sm-12">
			      <div class="col-padding">
			        <h3>Window XP : Follow this step for install agent..</h3>
			        

			        
			        <table class="table table-bordered table-dark">
					  <thead>
					    <tr>
					      <th scope="col"><center>#Step</center></th>
					      <th scope="col">Activity</th>
					      <th scope="col"><center> Action </center></th>
					    </tr>
					  </thead>
					  <tbody>

					    <tr>
					      <th scope="row"><center>1</center></th>
					      <td><b>Download File Zip</b></td>
					      <td>
					      		<center>
					      			<h1><a href="<?= base_url()?>Nex-Agent.zip" download><span class="glyphicon glyphicon-download-alt"></span> </a></h1>  
					      		</center>
					      </td>
					    </tr>

					   	<tr>
					      <th scope="row"><center>2</center></th>
					      <td><b>Zip File On Desktop</b></td>
					      <td>
					      		<center>
					      			<img src="<?=base_url()?>step/1.png" class="img-rounded" alt="Cinque Terre" width="100%"> 
					      		</center>
					      </td>
					    </tr>
					  	

					  	<tr>
					      <th scope="row"><center>3</center></th>
					      <td><b>Make Sure Folder "Nex-Agent" On Dekstop</b></td>
					      <td>
					      		<center>
					      			<img src="<?=base_url()?>step/2.png" class="img-rounded" alt="Cinque Terre" width="100%"> 
					      		</center>
					      </td>
					    </tr>
					  	

					    <tr>
					      <th scope="row"><center>4</center></th>
					      <td><b>Run Services</b></td>
					      <td>
					      		<center>
					      			<img src="<?=base_url()?>step/3.png" class="img-rounded" alt="Cinque Terre" width="100%">
					      		</center>
					      </td>
					    </tr>


					    <tr>
					      <th scope="row"><center>5</center></th>
					      <td><b>Start Application</b></td>
					      <td>
					      		<center>
					      			<img src="<?=base_url()?>step/4.png" class="img-rounded" alt="Cinque Terre" width="100%">
					      		</center>
					      </td>
					    </tr>
                        

                        <tr>
					      <th scope="row"><center>6</center></th>
					      <td><b>Update Current Location</b></td>
					      <td>
					      		<center>
					      			<img src="<?=base_url()?>step/5.png" class="img-rounded" alt="Cinque Terre" width="100%">
					      		</center>
					      </td>
					    </tr>


					    <tr>
					      <th scope="row"><center>7</center></th>
					      <td><b>Your PC is safe ! Completed.</b></td>
					      <td>
					      		<center><h3><font color="red"> IF YOUR PC IS SHUTDOWN MAKE SURE YOU START STEP 4 (Run Services) AND 5 (Start Application) AGAIN FOR RUNNING YOUR AGENT</font></h3></center>
					      </td>
					    </tr>

					  </tbody>
					</table>



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