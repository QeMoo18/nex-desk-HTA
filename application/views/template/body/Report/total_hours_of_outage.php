<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

  <!-- jQuery 3 -->
<script src="<?= base_url()?>asset_admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url()?>asset_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?= base_url()?>asset_admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
<script src="<?= base_url()?>asset_admin/graphjs/canvas-toBlob.js"></script>
<script src="https://fastcdn.org/FileSaver.js/1.1.20151003/FileSaver.js"></script>
<script src="https://fastcdn.org/FileSaver.js/1.1.20151003/FileSaver.min.js"></script>



<style type="text/css">
	#load {
	    position: absolute;
	    background: white url('<?= base_url()?>asset/loading.gif') no-repeat center center;
	    top: 0;
	    left: 0;
	    width: 100%;
	    height: 100%;
	}
</style>


<div id="load"> 

</div>
<div class="row">
 	<div class="col-md-6">
 		<canvas id="bar-chart" style="display: none"></canvas>
 	</div>
 	<div class="col-md-6">
 	</div>

</div>





<script type="text/javascript">
	// Bar chart
	new Chart(document.getElementById("bar-chart"), {
	    type: 'bar',
	    data: {
	      
	      <?= statistic_total_hour_canvas($this->uri->segment(3)) ?>

	    },
	    options: {
	      scales: {
		    yAxes: [{
		      scaleLabel: {
		        display: true,
		        labelString: 'Minutes'
		      }
		    }]
		  },
	      legend: { display: false },
	      title: {
	        display: true,
	        text: 'Total Hours'
	      }
	    }
	});

	$(document).ready(function (){
	    setTimeout(function(){ test(); }, 5000);    
	});

	function test()
	{   
	    var oilCanvas = document.getElementById("bar-chart");
	    var dataURL = oilCanvas.toDataURL();
	    var data =  {
                        imgBase64: dataURL,
                        "Report_ID":"<?= $this->uri->segment(3)?>"
                        
                    }

        $.ajax({
                    url: "<?= base_url() ?>Report/x",
                    type: "POST",
                    dataType: "html",
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                        var data = '<img src="'+response+'" class="img-rounded" alt="Cinque Terre">';
                        $("#datax").html(data);

                        setTimeout(function(){ closed(); }, 3000);
                    }
            });
	}

	function closed(){
	    window.close();
	}
</script>

