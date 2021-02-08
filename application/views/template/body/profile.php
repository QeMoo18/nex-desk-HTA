<div class="row">

	<div class="col-md-5">
		<div class="panel widget" style="height: 386px;">
	        <div class="widget-header bg-purple">
	            <img class="widget-bg img-responsive" src="<?=base_url()?>bg1.jpg" alt="Image">
	        </div>
	        <div class="widget-body text-center">
	        	<a onclick="ChangeProfile();">
	            	<img alt="Profile Picture" class="widget-img img-border-light" src="<?= myprofile()?>">
	            </a>
	        </div>
	        <ul class="menu-items">
	            <li>
	                <a href="javascript:void(0)" class="clearfix">
	                	<?php $name = $this->session->userdata('first_name') ?>
	                	<?php $email = $this->session->userdata('email') ?>
	                    <i class="fa fa-user fa-lg"></i><input type="" name="" value="<?=$name?>" style="padding-bottom: 0px;height: 20px;width: 300px; border:1px;">
	                    <span class="label label-warning label-circle pull-right">Update</span>
	                </a>
	            </li>
	            <li>
	                <a href="javascript:void(0)" class="clearfix">
	                    <i class="fa fa-envelope fa-lg"></i><input type="" name="" value="<?=$email?>" style="padding-bottom: 0px;height: 20px;width: 300px; border:1px;">
	                    <span class="label label-warning label-circle pull-right">Update</span>
	                </a>
	            </li>
	            <li>
	                <a href="<?=base_url()?>Dashboard/calendar" class="clearfix">
	                    <i class="fa fa-calendar fa-lg"></i> Calendar
	                </a>
	            </li>
	            <li>
	                <a href="<?=base_url()?>user/new_password" class="clearfix">
	                    <i class="fa fa-lock fa-lg"></i> Change New Password
	                </a>
	            </li>
	        </ul>
	        <!--===================================================-->
	    </div>


	    <form id="idForm" action="<?=base_url()?>user/ChangeProfile" method="post" enctype="multipart/form-data">
		    <div>
		    	<input type="file" name="userfile" id="ChangeProfile" style="display: none" accept="image/*" data-type='image'>
				<div class="alert alert-danger" role="alert" style="padding-bottom: 10px;display: none;" id="alertChange"><i class="fa fa-bell" aria-hidden="true"></i> You image ready to upload. Please click <button class="btn btn-warning" type="submit">Confirm</button> to proceed.</div>
		    </div>
		</form>

	</div>

	<div class="col-md-7" style="height: 389px; overflow-y: scroll;">

		<div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">My Ticket Activities</h3>
            </div>
            <!--Hover Rows-->
            <!--===================================================-->
            <div class="panel-body">
                <table class="table table-hover table-vcenter">
                    <thead>
                        <tr>
                            <th>Ticket Number</th>
                            <th>Problem</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?= my_profile_ticket()?>
                        
                    </tbody>
                </table>
            </div>
            <!--===================================================-->
            <!--End Hover Rows-->
        </div>

	</div>

	


</div>

<style type="text/css">
	table {
	  height: 500px;
	  overflow-y: scroll;
	}

	.bg-red, .callout.callout-danger, .alert-danger, .alert-error, .label-danger, .modal-danger .modal-body {
	    background-color: #57157d !important;
	}

	.btn-warning {
	    background-color: #57157d;
	    border-color: #e08e0b;
	}


	
</style>


<script type="text/javascript">
	function ChangeProfile()
	{
		var ChangeProfile = $("#ChangeProfile").val();
		$("#ChangeProfile").trigger('click');
	}


	$(":file").on("change", function(e) {
	  console.log(this.files[0].type);

	  if(this.files[0].type){
	  	$("#alertChange").show();
	  } else {
	  	$("#alertChange").hide();
	  }

	})


</script>


