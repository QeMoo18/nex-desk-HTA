
<!DOCTYPE html>
<html lang="en">
<head>
<title>Nex-Desk Manage Services Provider</title>
 <!-- Meta-Tags -->
 	<link rel="icon" type="image/x-icon" href="<?= base_url()?>asset_admin/penguin.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Nex-Desk Manage Your Customer Services provider services for ticketing system , automated ticket, reporting, asset management, customer services, agent management especially for computer,hardware, software and network monitoring, secure your asset from damage or penalty suitable for corporate business and very functionality and cheapers product manage services provider, develop by local product , power by Nexquadrant.">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta-Tags -->
	
	<!-- css files -->
	<link href="<?= base_url()?>asset_login/v2/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
	<link href="<?= base_url()?>asset_login/v2/css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<!-- //css files -->
	
	<!-- google fonts -->
	<link href="<?=base_url()?>asset_login/v2/font.css" rel="stylesheet">
	<!-- //google fonts -->

	<link rel="stylesheet" href="<?= base_url()?>asset/asset_modal/bootstrap.min.css">
<script src="<?= base_url()?>asset/asset_modal/jquery.min.js"></script>
<script src="<?= base_url()?>asset/asset_modal/popper.min.js"></script>
<script src="<?= base_url()?>asset/asset_modal/bootstrap.min.js"></script>

	
</head>
<body>

<style type="text/css">
	input[type="text"] {
	    font-size: 15px;
	    color: #333;
	    text-align: left;
	    /*text-transform: capitalize;*/
	    letter-spacing: 1px;
	    padding: 14px 10px;
	    width: 93%;
	    display: inline-block;
	    box-sizing: border-box;
	    border: none;
	    outline: none;
	    background: transparent;
	    font-family: 'Raleway', sans-serif;
	}

	img{
		width: 80%;
	}
</style>

<div class="signupform">
	<div class="container">
		<!-- main content -->
		<div class="agile_info">
			<div class="w3l_form">
				<div class="left_grid_info">
					<h1>Manage Your Customer Services</h1>
					<p>NEX-DESK Ticketing System is a Service Management suite that comprises ticketing, workflow automation and notification, along with a wide range of customizable features.</p>
					<img src="<?=base_url()?>asset_login/v2/images/f1.png" width="60%" alt="" />
				</div>
			</div>
			<div class="w3_info" id="login_Div">
				<h2>Login to your Account</h2>
				<p>Enter your details to login.</p>
				<form action="<?= base_url()?>login/verify" method="post" id="login_form">
					<label>Username</label>
					<div class="input-group">
						<span class="fa fa-envelope" aria-hidden="true"></span>
						<input type="text" placeholder="Enter Your Username" required="" name="uname" id="uname"> 
					</div>
					<label>Password</label>
					<div class="input-group">
						<span class="fa fa-lock" aria-hidden="true"></span>
						<input type="Password" placeholder="Enter Password" required="" name="pwd" id="pwd">
					</div> 					
						<button class="btn btn-danger btn-block" type="submit">Login</button >                
				</form>
				<p class="account1">Forgotten Password ? <a onclick="forgot();">Reset Password</a></p>
			</div>
			<div class="w3_info" id="Forgot_Div" style="display: none;">
				<h2>Reset Password</h2>
				<p>Enter your details to login.</p>
				<form action="<?= base_url()?>login/newpassword" method="post" id="pwd_form">
					<label>Username</label>
					<div class="input-group">
						<span class="fa fa-envelope" aria-hidden="true"></span>
						<input name="username" id="username" type="text" value="" placeholder="Username" required="required" onkeypress="username_press();">
					</div>
					<div style="display: none"> 
						<label>Email</label>
						<div class="input-group">
							<span class="fa fa-envelope" aria-hidden="true"></span>
							<input type="text" placeholder="Enter Your Email" required="" name="email" id="email" onkeypress="email_press();"> 
						</div>
					</div>
						<button class="btn btn-danger btn-block" type="submit">Reset</button >                
				</form>
				<p class="account1">Login Again ? <a onclick="login();">Oh, I remember ! Go Login </a></p>
			</div>

			<div class="w3_info" id="Success_Div" style="display: none;">
				<h2>Status Reset Password</h2>
				
				<?php if(!empty($this->session->flashdata('email_sent'))){ ?>
				<p><font size="5px"><mark>  <?php echo $this->session->flashdata('email_sent'); ?> </mark></font></p>
				<p class="account1">Try Login Again  <a onclick="login();">Please enter new password </a></p>
				<?php } else { ?>
				<input type="hidden" id="refresh" onclick="refresh_page();">
				<script type="text/javascript">
					// $(document).ready(function (){
					// 	$("#refresh").trigger('click');
					// });
				</script>
				<a href="<?= base_url()?>"><p> Please contact your administrator +603-83-200-100 or click here to log again</p></a>
				<?php } ?>

			</div>
		</div>
		<!-- //main content -->
	</div>
	<!-- footer -->
	<div class="footer">
		<p>&copy; 2019 Nex-Desk. All Rights Reserved | Power by <a href="https://www.nexquadrant.com" target="blank">Nexquadrant Sdn Bhd</a></p>
	</div>
	<!-- footer -->
</div>
	
</body>
</html>




<script type="text/javascript">
	function refresh_page()
	{
		window.location.href="<?= base_url()?>";
	}

    function forgot()
    {
        $("#login_Div").hide();
        $("#Forgot_Div").show();
        $("#Success_Div").hide();
        $("#voice_forgot").trigger('click');
    }

    function login()
    {
        $("#login_Div").show();
        $("#Forgot_Div").hide();
        $("#Success_Div").hide();
    }

    $(document).ready(function (){
        var segment = "<?= $this->uri->segment('9')?>";
        if(segment)
        {
            $("#Success_Div").show();
            $("#login_Div").hide();
            $("#Forgot_Div").hide();
        }
    });

    function username_press()
    {
        $('#email').prop('required',false);

    }

    function email_press()
    {
        $('#username').prop('required',false);
    }


    // var load = setTimeout(function() {
    //     $("#patch").modal('show');
    // }, 3000);

</script>


<!-- The Modal -->
<div class="modal" id="patch">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Notification From Nex-Desk</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          This announcement tells you how we've done the latest <b>Nex-Desk version 2.0</b> patch where we have taken action on all requests from our users to facilitate them to operate and maintain the computer assets available at the hospital.
          <br><br>
          Please clear cache and your browser history to get fresh site.
          <br><br>
          Thank you too for your feedback to make this system a success for all. Any bugs or request please respond to our Project Manager , Mohd Al Faiza Yussof (System Team).
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
</div>



<script src='<?=base_url()?>asset_talk2speak/voice.js'></script>


<input style="display: none" id="voice" onclick='responsiveVoice.speak("Welcome to nex-Desk, Manage Your Customer Services. Please login your username and password. Thanks", "UK English Male");' type='button' value='🔊 Play' />

<input style="display: none" id="voice_uname" onclick='responsiveVoice.speak("Please check required field", "UK English Male");' type='button' value='🔊 Play' />

<input style="display: none" id="voice_failed" onclick='responsiveVoice.speak("Your username and password is wrong ! please login again", "UK English Male");' type='button' value='🔊 Play' />

<input style="display: none" id="voice_forgot" onclick='responsiveVoice.speak("Forgot Password ? Please insert your username to reset your password default", "UK English Male");' type='button' value='🔊 Play' />

<input style="display: none" id="voice_reset" onclick='responsiveVoice.speak("<?= $this->session->flashdata('email_sent');?>", "UK English Male");' type='button' value='🔊 Play' />

<input style="display: none" id="voice_logout" onclick='responsiveVoice.speak("You already logout from system ! Thank you for using me ", "UK English Male");' type='button' value='🔊 Play' />



<script type="text/javascript">
	<?php if($this->session->flashdata('voice_1')=='unsuccess'){ ?>
		$(document).ready(function (){
			//$("#voice_failed").trigger('click');
		});
	<?php } else if($this->session->flashdata('email_sent')){  ?>
		$(document).ready(function (){
			//$("#voice_reset").trigger('click');
		});
	<?php } else if($this->session->flashdata('logout_system')=='logout_system'){  ?>
		$(document).ready(function (){
			//$("#voice_logout").trigger('click');
		});
	<?php } else {  ?>
		$(document).ready(function (){
			//$("#voice").trigger('click');
		});
	<?php } ?>

	$("#login_form button[type=submit]").click(function() {
	    if ($("#login_form input:invalid").length) {
	        //The popup appeared
	        $("#voice_uname").trigger('click');
	    } else {
	        //The popup did not appear
	    }
	});


	$("#pwd_form button[type=submit]").click(function() {
	    if ($("#pwd_form input:invalid").length) {
	        //The popup appeared
	        $("#voice_uname").trigger('click');
	    } else {
	        //The popup did not appear
	    }
	});
	
</script>