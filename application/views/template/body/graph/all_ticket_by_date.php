<!-- 

<div class="container">
  <div style="border:1px solid black;width:100%;overflow-y:hidden;overflow-x:scroll;">
	<p style="width:250%;" overflow-y:hidden;overflow-x:scroll;">
  	<canvas id="examChart"></canvas>
  </p>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
<canvas id="bar-chart-horizontal" width="800" height="450"></canvas>

<script type="text/javascript">
	new Chart(document.getElementById("bar-chart-horizontal"), {
	    type: 'horizontalBar',
	    data: { <?= analytic_all_ticket(); ?>},
	    options: {
	      legend: { display: false },
	      title: {
	        display: true,
	        text: 'Predicted world population (millions) in 2050'
	      }
	    }
	});

</script> -->


<script src="http://www.chartjs.org/dist/2.7.2/Chart.bundle.js"></script>
<script src="http://www.chartjs.org/samples/latest/utils.js"></script>
<canvas id="speedChart"></canvas>

<script type="text/javascript">
	var speedCanvas = document.getElementById("speedChart");

	Chart.defaults.global.defaultFontFamily = "Lato";
	Chart.defaults.global.defaultFontSize = 18;

	<?= analytic_all_ticket() ?>

	

	var chartOptions = {
	  legend: {
	    display: true,
	    position: 'top',
	    labels: {
	      boxWidth: 80,
	      fontColor: 'black'
	    }
	  }
	};

	var lineChart = new Chart(speedCanvas, {
	  type: 'line',
	  data: xData,
	  options: chartOptions
	});
</script>