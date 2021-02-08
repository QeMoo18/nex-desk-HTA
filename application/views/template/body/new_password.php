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
    <input type="text" class="form-control" name="" id="">
    <br>
    <button class="btn btn-primary btn-block">Submit</button>
  </div>
  </div>
  <div class="col-md-4"></div>

</div>