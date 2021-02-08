
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
</style>

<div class="signupform">
    <div class="container">
        <!-- main content -->
        <div class="agile_info">
            <div class="w3l_form">
                <div class="left_grid_info">
                    <h1>Manage Your Customer Services</h1>
                    <p>NEX-DESK Ticketing System is a Service Management suite that comprises ticketing, workflow automation and notification, along with a wide range of customizable features.</p>
                    <img src="<?=base_url()?>asset_login/v2/images/image.jpg" alt="" />
                </div>
            </div>
            <div class="w3_info" id="login_Div">
                <h2>Login to your Account</h2>
                <p>Enter your details to login.</p>
                <form action="<?= base_url()?>login/verify" method="post">
                    <label>Username</label>
                    <div class="input-group">
                        <span class="fa fa-envelope" aria-hidden="true"></span>
                        <input type="text" placeholder="Enter Your Email" required="" name="uname" id="uname"> 
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
                <form action="<?= base_url()?>login/newpassword" method="post">
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
                <p><font size="5px"><mark>  <?php echo $this->session->flashdata('email_sent'); ?> </mark></font></p>
                <?php if(!empty($this->session->flashdata('email_sent'))){ ?>
                <p class="account1">Try Login Again  <a onclick="login();">Please enter new password </a></p>
                <?php } else { ?>
                <p> Please contact your administrator </p>
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


<link rel="stylesheet" href="<?= base_url()?>asset/asset_modal/bootstrap.min.css">
<script src="<?= base_url()?>asset/asset_modal/jquery.min.js"></script>
<script src="<?= base_url()?>asset/asset_modal/popper.min.js"></script>
<script src="<?= base_url()?>asset/asset_modal/bootstrap.min.js"></script>


<script type="text/javascript">
    function forgot()
    {
        $("#login_Div").hide();
        $("#Forgot_Div").show();
        $("#Success_Div").hide();
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


    var load = setTimeout(function() {
        $("#patch").modal('show');
    }, 3000);

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