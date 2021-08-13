<div class="row">

  <div class="col-md-4"></div>
  <div class="col-md-4">
  <div class="panel lock-box">
    <center>
      <div class="center"> <img alt="" src="<?=base_url()?>asset_template/beauty/img/user.png" class="img-circle"> </div>
      <?php $name = $this->session->userdata('first_name') ?>
      <h4> Hello <?= $name ?> !</h4>
      <p class="text-center" style="font-size: 11px;font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;">Change Your New Password</p>
    </center>        
    <hr>
    <label>New Password</label>
    <input type="password" class="form-control" name="password" id="password">
    <br>
    <button class="btn btn-primary btn-block" onclick="changePassword()">Submit</button>
  </div>
  </div>
  <div class="col-md-4"></div>

</div>




<script type="text/javascript">
  function changePassword()
  {
        var change_password = $("#password").val();
        if(change_password){
          var data =  {
                           'new_password':change_password,
                           '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                      }

                          
          $.ajax({
                  url: '<?= base_url() ?>Admin/changePassword',
                  type: 'POST',
                  dataType: 'html',
                  data: data,
                  beforeSend: function() {

                  },
                  success: function(response){
                      //alert('Success Delete !');
                      //location.reload();
                      alert("Your password already changed ! Thank You.");
                  }
          });
        } else {
          alert('Please insert new password !');
        }
  }
</script>