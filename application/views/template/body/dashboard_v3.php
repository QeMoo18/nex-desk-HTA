<div class="row">

  <?php //var_dump($this->session->userdata('userid')); ?>

  <?php 
    $userid = $this->session->userdata('userid');
    $this->db->where('userid',$userid);
    $role = '';
    $query =  $this->db->get('login_user')->result();
    foreach ($query as $data) 
    {
      $role = $data->role;
    }

    //var_dump($role);
  ?>




  <div class="col-md-6">
    <div class="panel panel-info"  style="height: 285px;">
        <div class="panel-heading ui-sortable-handle" style="background-color: #00c70f;">
            <h3 class="panel-title">Help Actions</h3>
        </div>
        <div class="panel-body">

            <div class="row">
              <?php if($role!='Endorse PPM'){ ?>
              <a href="<?= base_url()?>Ticket/Ticket_StatusView">
                <div class="col-md-3  col-sm-3 col-xs-4">
                  <center>
                    <img src="<?=base_url()?>asset_template/beauty/asset/ticket.png" style="width: 50px;height: 50px;">
                    <p class="text">Ticket List</p>
                  </center>
                </div>
              </a>
              <?php } ?>
              <a href="<?= base_url()?>menu/overview/cmdb">
                <div class="col-md-3  col-sm-3 col-xs-4">
                  <center>
                    <img src="<?=base_url()?>asset_template/beauty/asset/inventory.png" style="width: 50px;height: 50px;">
                    <p class="text">Asset View</p>
                  </center>
                </div>
              </a>
              <?php if($role!='Endorse PPM'){ ?>
              <a href="<?= base_url()?>Report/Report_Search">
                <div class="col-md-3  col-sm-3 col-xs-4">
                  <center>
                    <img src="<?=base_url()?>asset_template/beauty/asset/investment.png" style="width: 50px;height: 50px;">
                    <p class="text">Search Report</p>
                  </center>
                </div>
              </a>
              <a href="<?= base_url()?>admin/nex_bot">
                <div class="col-md-3  col-sm-3 col-xs-4">
                  <center>
                    <img src="<?=base_url()?>chatbot.png" style="width: 50px;height: 50px;">
                    <p class="text">Nex-Bot</p>
                  </center>
                </div>
              </a>
              <a href="<?= base_url()?>Ticket/Ticket_Search">
                <div class="col-md-3  col-sm-3 col-xs-4">
                  <center>
                    <img src="<?=base_url()?>asset_template/beauty/asset/search.png" style="width: 50px;height: 50px;">
                    <p class="text">Search</p>
                  </center>
                </div>
              </a>
              <a href="<?= base_url()?>Knowledgebase/search">
                <div class="col-md-3  col-sm-3 col-xs-4">
                  <center>
                    <img src="<?=base_url()?>asset_template/beauty/asset/research.png" style="width: 50px;height: 50px;">
                    <p class="text">Knowledge Base</p>
                  </center>
                </div>
              </a>
              <a href="<?= base_url()?>admin/group_chat">
                <div class="col-md-3  col-sm-3 col-xs-4">
                  <center>
                    <img src="<?=base_url()?>asset_template/beauty/asset/group.png" style="width: 50px;height: 50px;">
                    <p class="text">Group Chat</p>
                  </center>
                </div>
              </a>
              <?php } ?>
            </div>

            
        </div>
    </div>
  </div>


  <?php if($role!='Endorse PPM'){ ?>
  <div class="col-md-6">
    <div class="panel panel-info" style="height: 220px;">
        <div class="panel-heading ui-sortable-handle" style="background-color: #00c70f;">
            <h3 class="panel-title">Ticket Data</h3>
        </div>
        <div class="panel-body">
            <div class="col-md-3 col-sm-3 col-xs-3" style="padding-top: 10px;">
              <center>
                <button type="button" class="btn btn-default btn-circle btn-xl"><?= count_new_ticket()?></button>
                <p class="text" style="padding-top: 10px;"> New</p>
              </center>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3" style="padding-top: 10px;">
              <center>
                <button type="button" class="btn btn-primary btn-circle btn-xl"><?= count_open_ticket()?></button>
                <p class="text" style="padding-top: 10px;"> Open</p>
              </center>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3" style="padding-top: 10px;">
              <center>
                <button type="button" class="btn btn-success btn-circle btn-xl"><?= count_pending_ticket()?></button>
                <p class="text" style="padding-top: 10px;"> Pending</p>
              </center>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3" style="padding-top: 10px;">
              <center>
                <button type="button" class="btn btn-info btn-circle btn-xl"><?= count_close_ticket()?></button>
                <p class="text" style="padding-top: 10px;"> Close</p>
              </center>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3" style="padding-top: 10px;">
              <center>
                <button type="button" class="btn btn-warning btn-circle btn-xl"><?= count_severity_high_ticket()?></button>
                <p class="text" style="padding-top: 10px;"> High Priority</p>
              </center>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3" style="padding-top: 10px;">
              <center>
                <button type="button" class="btn btn-default btn-circle btn-xl"><?= count_all_ticket()?>  </button>
                <p class="text" style="padding-top: 10px;"> Total Ticket</p>
              </center>
            </div>
        </div>
    </div>
  </div>

  
  
</div>


<div class="row">

  <div class="col-md-4" style="padding-bottom: 10px;">
      <div class="panel">
          <div class="panel-heading">
              <h3 class="panel-title">Ticket Activities Monthly</h3>
          </div>
          <div class="panel-body">
              <!--Morris Area Chart placeholder-->
              <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
              <div id="demo-morris-line" style="width: 275px; height: 175px; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></div>
              <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
          </div>
      </div>
  </div>

  
  <div class="col-md-4" style="padding-bottom: 10px;">
      <div class="panel">
          <div class="panel-heading">
              <h3 class="panel-title">Popular ITSM Category</h3>
          </div>
          <div class="panel-body">
              <!--Morris Area Chart placeholder-->
              <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
              <div id="demo-morris-color-donut" style="height:175px"></div>
              <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
          </div>
      </div>
  </div>  

  <div class="col-md-4" style="padding-bottom: 10px;">
      <div class="panel">
          <div class="panel-heading">
              <h3 class="panel-title">Popular Problem</h3>
          </div>
          <div class="panel-body">
              <!--Morris Area Chart placeholder-->
              <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
              <div id="demo-morris-donut" style="height:175px"></div>
              <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
          </div>
      </div>
  </div>


  
</div>
<?php } ?>
  
<!-- <div class="row">
  <div class="col-md-4">
      <div class="panel">
          <div class="panel-heading">
              <h3 class="panel-title"> Latest Ticket </h3>
          </div>
          <div class="panel-body pad-no">
              <ul class="list-group ">
                  <li class="list-group-item" style="background-color: white;"> <span class="badge badge-primary">14</span> Entertainment </li>
                  <li class="list-group-item" style="background-color: white;"> <span class="badge badge-success">9</span> Movies </li>
                  <li class="list-group-item" style="background-color: white;"> <span class="badge badge-info">11</span> TV Shows </li>
                  <li class="list-group-item" style="background-color: white;"> <span class="badge badge-warning">18</span> Celebs &amp; Gossip </li>
                  <li class="list-group-item" style="background-color: white;"> <span class="badge badge-danger">22</span> Video Games </li>
                  <li class="list-group-item" style="background-color: white;"> <span class="badge badge-alert">9</span> Sports &amp; Events </li>
              </ul>
          </div>
      </div>
  </div>
  <div class="col-md-4">
      <div class="panel">
          <div class="panel-heading">
              <h3 class="panel-title"> Top Problem </h3>
          </div>
          <div class="panel-body pad-no">
              <ul class="list-group">
                  <li class="list-group-item" style="background-color: white;"> <span class="badge badge-primary">14</span> Entertainment </li>
                  <li class="list-group-item" style="background-color: white;"> <span class="badge badge-success">9</span> Movies </li>
                  <li class="list-group-item" style="background-color: white;"> <span class="badge badge-info">11</span> TV Shows </li>
                  <li class="list-group-item" style="background-color: white;"> <span class="badge badge-warning">18</span> Celebs &amp; Gossip </li>
                  <li class="list-group-item" style="background-color: white;"> <span class="badge badge-danger">22</span> Video Games </li>
                  <li class="list-group-item" style="background-color: white;"> <span class="badge badge-alert">9</span> Sports &amp; Events </li>
              </ul>
          </div>
      </div>
  </div>
  <div class="col-md-4">
      <div class="panel">
          <div class="panel-heading">
              <h3 class="panel-title"> Department </h3>
          </div>
          <div class="panel-body pad-no">
              <ul class="list-group">
                  <li class="list-group-item" style="background-color: white;"> <span class="badge badge-primary">14</span> Entertainment </li>
                  <li class="list-group-item" style="background-color: white;"> <span class="badge badge-success">9</span> Movies </li>
                  <li class="list-group-item" style="background-color: white;"> <span class="badge badge-info">11</span> TV Shows </li>
                  <li class="list-group-item" style="background-color: white;"> <span class="badge badge-warning">18</span> Celebs &amp; Gossip </li>
                  <li class="list-group-item" style="background-color: white;"> <span class="badge badge-danger">22</span> Video Games </li>
                  <li class="list-group-item" style="background-color: white;"> <span class="badge badge-alert">9</span> Sports &amp; Events </li>
              </ul>
          </div>
      </div>
  </div>

</div>
 -->

<!-- <div class="row">
  <div class="col-md-12">
      <div class="panel papernote">
          <div class="panel-body">
              <div class="carousel slide" id="c-slide" data-ride="carousel">
                  <div class="carousel-inner">
                      <div class="item">
                          <h4>Anoucment #1</h4>
                          <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id quam elementum odio tristique euismod. 
                              Suspendisse id nunc sed massa cursus efficitur. 
                          </p>
                      </div>
                      <div class="item active">
                          <h4>Anoucment #2</h4>
                          <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id quam elementum odio tristique euismod. 
                              Suspendisse id nunc sed massa cursus efficitur. 
                          </p>
                      </div>
                      <div class="item">
                          <h4>Anoucment #3</h4>
                          <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id quam elementum odio tristique euismod. 
                              Suspendisse id nunc sed massa cursus efficitur. 
                          </p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div> -->


<link href="<?= base_url()?>asset_template/beauty/plugins/morris-js/morris.min.css" rel="stylesheet">
<script src="<?= base_url()?>asset_template/beauty/plugins/morris-js/morris.min.js"></script>
<script src="<?= base_url()?>asset_template/beauty/plugins/morris-js/raphael-js/raphael.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {

        Morris.Donut({
            element: 'demo-morris-donut',
            data: [
                <?= popular_problem()?>
            ],
            colors: ['#01c0c8', '#4dd2d8', '#99e5e9', '#33ccd3'],
            resize:true
        });


        Morris.Donut({
            element: 'demo-morris-color-donut',
            data: [
              <?= popular_department()?>
            ],
            colors: ['#E9422E', '#FAC552', '#3eb489', '#29b7d3'],
            resize:true
        });




        //line 
        var day_data = [
          <?= data_date_ticket() ?>
        ];
        Morris.Line({
            element: 'demo-morris-line',
            data: day_data,
            xkey: 'year',
            ykeys: ['value'],
            labels: ['value'],
            gridEnabled: true,
            lineColors: ['#01c0c8'],
            lineWidth: 3,
            parseTime: false,
            resize:true,
            hideHover: 'auto'
        });



    });
</script>



