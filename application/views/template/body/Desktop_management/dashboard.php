<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>



<div class="content-wrapper">
  <section class="content">

    <div class="row">

      <div class="col-md-4" id="chart_div3_alert">
        <legend>OS</legend>
        <p>Please Wait.. Loading..</p>
      </div>
      <div class="col-md-12" style="width:25%; display: none" id="div3">
        <legend>OS</legend>
        <canvas id="chart_div3"></canvas>
      </div>



      <div class="col-md-4" id="chart_div_alert">
        <legend>Status Machine Online</legend>
        <p>Please Wait.. Loading..</p>
      </div>
      <div class="col-md-12" style="width:30%; display: none" id="div1">
        <legend>Status Machine Online</legend>
        <canvas id="chart_div"></canvas>
      </div>


      <div class="col-md-4" id="chart_div2_alert">
        <legend>Device Type</legend>
        <p>Please Wait.. Loading..</p>
      </div>
      <div class="col-md-4" style="width:25%;display: none" id="div2">
        <legend>Device Type</legend>
        <canvas id="chart_div2"></div>
      </div>
    </div>



    <div class="row" style="padding-top: 30px;">
        <div class="col-md-6">
          <div class="well" style="height: 400px;">
            <h5>Deploy Agent</h5>
            <p style="font-weight: 700; font-size: 16px;"><b>1. For deploy the agent on single machine/client</b></p>
            <p style="font-size: 14px;">Admin need refer the manual and click Manage Desktop button below</p>
            <p><a href="<?= base_url()?>opsi_pdf/single.pdf" style="font-size: 14px;">(Manual - Single Agent Deploy)</a></p>

            <br>
            <p style="font-weight: 700; font-size: 16px;"><b>2. For deploy the agent on bulk achine/client</b></p>
            <p style="font-size: 14px;">Admin need an access to server. Please read below manual before make a changes</p>
            <p><a href="<?= base_url()?>opsi_pdf/bulk_agent.pdf" style="font-size: 14px;">(Manual - Bulk Agent Deploy)</a></p>

          </div>
        </div>
        <div class="col-md-6">
          <div class="well" style="height: 400px;">
            <h5>Push Install Software</h5>
            <p style="font-weight: 700; font-size: 16px;"><b>1. Push Install</b></p>
            <p style="font-size: 14px;">Admin need refer the manual and click Manage Desktop button below to visit product configuration table on console</p>
            <p><a href="<?= base_url()?>opsi_pdf/push.pdf" style="font-size: 14px;">(Manual -Push Install To Client)</a></p>

            <br>
            <p style="font-weight: 700; font-size: 16px;"><b>2. For Add New Software</b></p>
            <p style="font-size: 14px;">Admin need an access to server. Please read below manual before make a changes</p>
            <p><a href="<?= base_url()?>opsi_pdf/new_software.pdf" style="font-size: 14px;">(Manual - Add New Software)</a></p>

          </div>
        </div>


        <div class="col-md-12" style="padding-top: 30px;">
            <div class="well">
              <p style="font-size: 14px;"> 
              <a href="<?= base_url()?>admin/open_opsi">
                <button class="btn btn-primary">
                  Manage Desktop
                </button>
              </a>
               <b>* to fully manage desktop management, please click Manage Desktop to redirect with OPSI-Configed Console 
               </b>
              </p>
            </div>
        </div>

    </div>

  </section>
</div>






<script type="text/javascript">
  var data =  {
                   '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
              }

                  
          $.ajax({
                  url: 'https://appku.my/api/opsi/os1',
                  type: 'POST',
                  dataType: 'json',
                  data: data,
                  beforeSend: function() {

                  },
                  success: function(response){
                      //console.log(response);

                      // $.each(response, function(k, v) {
                      //   console.log(k+' '+v);
                      //   //result += k + " , " + v + "\n";
                      // });


                      var label = [];
                      var value = [];

                      for (var p in response) {
                        if( response.hasOwnProperty(p) ) {
                          //result += p + " , " + response[p] + "\n";
                           // console.log(response[p]);
                          //console.log(response[p]['TOTAL']+' '+response[p]['name']);

                          label.push(response[p]['name']+" - "+response[p]['TOTAL']+"");
                          value.push(response[p]['TOTAL']);
                        } 
                      }



                      var ctx = document.getElementById("chart_div3").getContext('2d');
                      var myChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                          labels: label,
                          datasets: [{
                            backgroundColor: [
                              "#2ecc71",
                              "#3498db",
                              "#95a5a6",
                              "#9b59b6",
                              "#f1c40f",
                              "#e74c3c",
                              "#34495e"
                            ],
                            data: value
                          }]
                        }
                      });

                      $("#chart_div3_alert").hide();
                      $("#div3").show();
                      //console.log(label);

                  }
          });
</script>





<script type="text/javascript">
  var data =  {
                   '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
              }

                  
          $.ajax({
                  url: 'https://appku.my/api/opsi/count_w',
                  type: 'POST',
                  dataType: 'json',
                  data: data,
                  beforeSend: function() {

                  },
                  success: function(response){
                      //console.log(response);

                      // $.each(response, function(k, v) {
                      //   console.log(k+' '+v);
                      //   //result += k + " , " + v + "\n";
                      // });


                      var label = [];
                      var value = [];

                      for (var p in response) {
                        if( response.hasOwnProperty(p) ) {
                          //result += p + " , " + response[p] + "\n";
                           // console.log(response[p]);
                          //console.log(response[p]['TOTAL']+' '+response[p]['name']);

                          label.push('Window'+" - "+response[p]['TOTAL']+"");
                          value.push(response[p]['TOTAL']);
                        } 
                      }


        

                      $.ajax({
                                url: 'https://appku.my/api/opsi/count_s',
                                type: 'POST',
                                dataType: 'json',
                                data: data,
                                beforeSend: function() {

                                },
                                success: function(response){




                                  for (var p in response) {
                                    if( response.hasOwnProperty(p) ) {
                                      //result += p + " , " + response[p] + "\n";
                                       // console.log(response[p]);
                                      //console.log(response[p]['TOTAL']+' '+response[p]['name']);

                                      label.push('Server'+" - "+response[p]['TOTAL']+"");
                                      value.push(response[p]['TOTAL']);
                                    } 
                                  }


                                  var ctx2 = document.getElementById("chart_div2").getContext('2d');
                                  var myChart = new Chart(ctx2, {
                                    type: 'pie',
                                    data: {
                                      labels: label,
                                      datasets: [{
                                        backgroundColor: [
                                          "#2ecc71",
                                          "#3498db",
                                          "#95a5a6",
                                          "#9b59b6",
                                          "#f1c40f",
                                          "#e74c3c",
                                          "#34495e"
                                        ],
                                        data: value
                                      }]
                                    }
                                  });

                                  //console.log(label);
                                  $("#chart_div2_alert").hide();
                                  $("#div2").show();
                                }

                                
                            })



                      


                      

                  }
          });
</script>



<script type="text/javascript">
  var data =  {
                   '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
              }

                  
          $.ajax({
                  url: 'https://appku.my/api/opsi/status',
                  type: 'POST',
                  dataType: 'json',
                  data: data,
                  beforeSend: function() {

                  },
                  success: function(response){


                    var label = [];
                    var value = [];

                    var count_on = 0;
                    var count_of = 0;

                    for ( var key in response ) {
                        var value1 = response[key];
                        
                        console.log(key);

                        if(value1==true){
                          value1=1;
                        }

                        console.log(value1);

                        var tag = '';
                        if(value1==true){
                          tag='On';
                          count_on++;
                        } else {
                          tag='Off';
                          count_of++;
                        }
                        

                        // label.push(key+" - "+tag+"");
                        // value.push(value1);
                    }


                    label.push('On ('+count_on+')');
                    value.push(count_on);

                    label.push('Off ('+count_of+')');
                    value.push(count_of);



                    var ctx3 = document.getElementById("chart_div").getContext('2d');
                    var myChart = new Chart(ctx3, {
                      type: 'pie',
                      data: {
                        labels: label,
                        datasets: [{
                          backgroundColor: [
                            "#2ecc71",
                            "#3498db",
                            "#95a5a6",
                            "#9b59b6",
                            "#f1c40f",
                            "#e74c3c",
                            "#34495e"
                          ],
                          data: value
                        }]
                      }
                    });


                    $("#chart_div_alert").hide();
                    $("#div1").show();
                  }
                })



</script>
