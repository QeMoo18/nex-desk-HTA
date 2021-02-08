
</aside>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.0
    </div>
    <strong>Copyright &copy; 2019 <a href="https://www.nexquadrant.com/"><font color="#51aa62">NexQuadrant Sdn Bhd</font></a>.</strong> All rights
    reserved.
</footer>


</body>



<!-- Modal Confirmation -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> 
          	<i class="fa fa-warning" style="color:red"></i> 
          		<span id="modal_title"> Modal Header </span>
          </h4>
        </div>
        <div class="modal-body">
          <p><span id="modal_contain"> Contain </span></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Close</button>
          <button type="button" class="btn btn-danger" id="confirm"> <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>  Confirm</button>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
	.modal {
	  background: #00800000;
	  position: absolute;
	  float: left;
	  left: 50%;
	  top: 50%;
	  transform: translate(-50%, -50%);
    height: 80%;
	}
</style>
<!-- END -->





<link href='https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css' rel='stylesheet' type="text/css" />

<script>
    $("#datepicker").datepicker({format: 'dd/mm/yyyy'});
</script>


<!-- DARK MODE -->
<style type="text/css">
  .box-header {
    background: #458dbc2b;
  }
  .box-header.with-border {
    /*border-bottom: 1px solid #cccccc;*/
    border-bottom: 1px solid #458dbc2b;
  }
  .box-body {
    /*background: #ddd;*/
    background: #dddddd94;
    
  }



  .box-body-white {
    /*background: #ddd;*/
    background: #fdfdfdeb;
  }

  .box.box-success {
    /*border-top-color: #cccccc;*/
    border-top-color: #eff0f1;
    
  }
  .form-control{
    background-color: #f4f4f4;
  }
  .panel-body {
    padding: 15px;
    /*background: #f4f4f4;*/ 
    /*background: #dcdcdc;*/
    background: #f7f7f7;
  }
  .input-group-addon:not(:last-child) {
    border-right: 0;
    background: #f4f4f4;
  }
  .info-box{
    background: #dcdcdc;
  }
  body{
    background-color: #222d32;
  }
  .item{
    background: #f4f4f4;
  }
  .product-list-in-box>.item:last-of-type {
    border-bottom-width: 0;
    /*background: rgb(221, 221, 221);*/
        background: rgb(235, 235, 235);
  }
  .box-footer{
    border-top: 1px solid #dddddd;
    background-color: #ddd;
  }
  .nav-tabs-custom>.tab-content {
    background: #ddd;
  }
  .custom {
    background: #f5f5f5;
  }
  .nav-tabs-custom {
    background: #eee;
  }
  .list-group{
    background: #ddd;
  }
  .list-group-item{
    background: #ddd;
  }
  .nav-tabs-custom>.nav-tabs.pull-right>li:first-of-type.active>a {
    background: whitesmoke;
  }
  .nav-tabs-custom>.nav-tabs>li.active>a {
    background: whitesmoke;
  }
  .sticklr, .sticklr * {
    background: #cccccc;
  }
  .xxx{
    background: #f8f8f8; 
  }
  .btn-success {
    background-color: #a59d9d;  
    border-color: #a59d9d;  
  }
  .btn-primary {
    background-color: #a59d9d;
    border-color: #a59d9d; 
  }
  .btn-danger {
    background-color: #a59d9d;
    border-color: #a59d9d; 
  }
  .btn-warning {
    background-color: #a59d9d;
    border-color: #a59d9d; 
  }
  .skin-blue .main-header .navbar {
     /*background-color: #045d4cf5;*/
     /*background-color: #2287c1;*/
    /*background-color: #7a7a7b;*/
    background-color: #294960;
    
  }
  .skin-blue .main-header .logo {
    background-color: rgba(0,0,0,0.1);
  }


  .navbar-default {
      background-color: #f8f8f8;
      border-color: #51aa62;
  }


  .btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}
</style>
<!-- END -->


<style type="text/css">
  .title_nexdesk{
    font-size: 20px;
    font-style: normal;
    /*color: #e2d7d7;*/
    color: #fff;
    float: left;
    background-color: transparent;
    background-image: none;
    padding: 15px 15px;
    font-family: fontAwesome;
    /*padding-right: 220px;*/
  }
</style>


<script type='text/javascript'>
  var $document = $(document);
  (function () { 
    var clock = function () {
        clearTimeout(timer);
      
        date = new Date();    
        //alert(date);
        hours = date.getHours();
        minutes = date.getMinutes();
        seconds = date.getSeconds();
        dd = (hours >= 12) ? 'PM' : 'AM';
        
      hours = (hours > 12) ? (hours - 12) : hours
        
        var timer = setTimeout(clock, 1000);
      
      // if(hours<9){ hours = '0'+hours;}
      // if(hours<9){ minutes = '0'+minutes;}
      // if(hours<9){ seconds = '0'+seconds;}

      // $('.hours_digital').html('<p>' + Math.floor(hours) + ' : </p>');
      // $('.minutes_digital').html('<p>' + Math.floor(minutes) + ' : </p>');
      // $('.seconds_digital').html('<p>' + Math.floor(seconds) + ' </p>');
      //   $('.twelvehr_digital').html('<p>' + dd + '</p>');

      var jam = Math.floor(hours)+' : '+Math.floor(minutes)+' : '+Math.floor(seconds)+' '+dd;
      //alert(jam);
      $('.digital_watch').html('<input type="text" class="form-control"  disabled="disabled" value="'+jam+'">');
    };
    clock();
  })();

  (function () {
    $document.bind('contextmenu', function (e) {
      //e.preventDefault();
    });  
  })();



  function report_hospital_form(id)
  {
    $("#report_form").modal('show');

    $("#id_report_hosp").val(id);

    switch(id) {
      case 1: $("#modal_title_report_form").html('All Hardware Incident Log Report');
              $("#id_title_hosp").val('All Hardware Incident Log Report');
      break;
      case 2: $("#modal_title_report_form").html('All HIS and Non HIS Incident Log Report');
              $("#id_title_hosp").val('All HIS and Non HIS Incident Log Report');
      break;
      case 3: $("#modal_title_report_form").html('All Network Log Report');
              $("#id_title_hosp").val('All Network Log Report');
      break;
      case 4: $("#modal_title_report_form").html('All Non HIS (PACS) Incident Log Report');
              $("#id_title_hosp").val('All Non HIS (PACS) Incident Log Report');
      break;
      case 5: $("#modal_title_report_form").html('All System Log Report');
              $("#id_title_hosp").val('All System Log Report');
      break;
      case 6: $("#modal_title_report_form").html('Non Compliance SLA Incident Log Report');
              $("#id_title_hosp").val('Non Compliance SLA Incident Log Repor');
      break;
      case 7: $("#modal_title_report_form").html('Pending Incident Log Report');
              $("#id_title_hosp").val('Pending Incident Log Report');
      break;
      case 8: $("#modal_title_report_form").html('Change Request');
              $("#id_title_hosp").val('Pending Incident Log Report');
      break;
      default:
        // code block
    }

  }


  function cancel_report(){
    $("#report_form").modal('hide');
  }

</script>


<!-- Modal Confirmation -->
<div class="modal fade" id="report_form" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> 
            <i class="fa fa-file-excel-o" style="color:green"></i> 
              <span id="modal_title_report_form"> Modal Header </span>
          </h4>
        </div>
        <div class="modal-body">

        
        <form action="<?=base_url()?>report/hospital" method="post" autocomplete="off">   
        
          <input type="hidden" name="id_report_hosp" id="id_report_hosp">

          <div class="row">
            <div class="col-md-4"><label>* Title</label></div>
            <div class="col-md-8"><input type="type" class="form-control" name="id_title_hosp" id="id_title_hosp" required="required"> </div>
          </div>
          <br>
          <div class="row">

            <div class="col-md-4"><label>* Start Date</label></div>
            <div class="col-md-8"><input type="text" class="form-control datetime" name="start_report_hosp" id="start_report_hosp" required="required"> </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-4"><label>* End Date</label></div>
            <div class="col-md-8"><input type="text" class="form-control datetime" name="end_report_hosp" id="end_report_hosp" required="required"> </div>
          </div>
          <br>

          <font color="brown"><i>Noted : Start date must previous than End date<br>Example : 2018-12-01 00:00:00 - 2019-01-01 00:00:00 </i></font>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Cancel</button>
          <button onclick="cancel_report();" type="submit" class="btn btn-danger" id="confirm"> <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>  Generate</button>
        </div>


        </form>

      </div>
    </div>
</div>


<style type="text/css">
  h5  
  {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 20px;
  }

  h3  
  {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 15px;
  }

  label 
  {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 14px;
  }

  .label-title
  {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 15px;
  }
  



<?php if(($this->uri->segment(2)=='Ticket_StatusView')||($this->uri->segment(2)=='Ticket_Search_Result')||($this->uri->segment(2)=='Ticket_QueuView')||($this->uri->segment(2)=='Ticket_ClosedTicket')){ ?>
  .box-body {
     /* background: #dae48d;*/
      background:#f8f9f7;
  }

  .box-header.with-border {
      border-bottom: 1px solid #458dbc2b;
  }


  .box-header {
      background: #458dbc2b;
  }

  .box.box-success {
      border-top-color: #daebf3a8;
  }

  .panel-body {
      background: #458dbc2b;
  }
<?php } ?>







<?php if($this->uri->segment(1)=='menu'){ ?>
  .nav-tabs-custom>.tab-content {
      /*background: #a8ff74;*/
      background: #ffeb3b2b;
      
  }

  .box-header {
      background: #b9ffb9;
  }
  .list-group-item {
      /*background: #d6ecd8;*/
      background: #b8fcb9;
      
  }
<?php } ?>


<?php if($this->uri->segment(1)=='dashboard'){ ?>

  .list-group-item {
      position: relative;
      display: block;
      padding: .75rem 1.25rem;
      margin-bottom: -1px;
      background-color: #54ce6c4f;
      border: 1px solid #ddd;
  }


  .bg-yellow {
      background-color: #ad4343 !important;
  }

<?php } ?>

</style>

<style type="text/css">
  .title_nexdesk{
     font-family: Arial, Helvetica, sans-serif;
  }

  .skin-blue .main-header .navbar {
      background-color: #294960;
  }

  b, strong {
      font-weight: bolder;
      font-family: initial;
  }




</style>

<?php if($this->uri->segment(1)!='Ticket'){ ?>
<style type="text/css">
  @media (min-width: 576px)
  .jumbotron {
      /* padding: 4rem 2rem; */
  }

  .box-title{
    color:#fff;
  }
  

  .box-body {
      background:#ffffffd6;
  }

  .box-header.with-border {
      border-bottom: 1px solid #bdffca;
  }


  .box-header {
      background: #356399;
  }

  .box.box-success {
      border-top-color: #bdffca00;
  }

  

  

  .box {
      position: relative;
      border-radius: 3px;
      background: #ffffff00;
      border-top: 3px solid #d2d6de;
      margin-bottom: 20px;
      width: 100%;
      box-shadow: 0 1px 1px rgba(0,0,0,0.1);
  }

  .list-group-item {
      /* background: #d6ecd8; */
      background: #f7f7f7;
  }

  .panel-default>.panel-heading {
      color: #333;
      background-color: #eaeaea;
      border-color: #c1c1c1;
  }

  .panel-body {
      background: #ffffff;
  }
</style>
<?php } ?>

<?php if($this->uri->segment(1)=='Report'){ ?>
<style type="text/css">
  .panel-danger>.panel-heading {
      color: #f1f1f1;
      background-color: #036473c2;
      border-color: #036473c2;
  }

  .panel-danger>.panel-heading+.panel-collapse>.panel-body {
      border-top-color: #3f8994;
  }

  .panel-bluedark {
      border-color: #3f8994;
  }

  .panel {
      margin-bottom: 20px;
      background-color: #3f8994;
      border: 1px solid transparent;
      border-radius: 4px;
      -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
      box-shadow: 0 1px 1px rgba(0,0,0,.05);
  }
</style>
<?php } ?>

<?php if($this->uri->segment(2)=='Ticket_Search'){ ?>
<style type="text/css">
  .panel-danger>.panel-heading {
      color: #f1f1f1;
      background-color: #036473c2;
      border-color: #036473c2;
  }

  .panel-danger>.panel-heading+.panel-collapse>.panel-body {
      border-top-color: #3f8994;
  }

  .panel-bluedark {
      border-color: #3f8994;
  }

  .panel {
      margin-bottom: 20px;
      background-color: #3f8994;
      border: 1px solid transparent;
      border-radius: 4px;
      -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
      box-shadow: 0 1px 1px rgba(0,0,0,.05);
  }
</style>
<?php } ?>

