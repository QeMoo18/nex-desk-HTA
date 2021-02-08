<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	exportEnabled: true,
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Total Hours"
	},
	axisY: {
		title: "Time Taken",
		gridThickness: 3,
        gridColor: "orange"
	},
	axisX: {
		title: "Time Taken",
		lineColor: "blue",
		lineThickness: 3,

	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "Location Of Faults",
		dataPoints: [      
			{ y: 300878, label: "Customer Premise Issue" },
			{ y: 266455,  label: "Third Party Issue" },
			{ y: 169709,  label: "TM Network Issue" }
		]
	}]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="<?= base_url()?>asset_admin/graph/canvasjs.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>

<div id=""></div>

<script type="text/javascript">
	$(document).ready(function (){
		$(".canvasjs-chart-credit").remove();

	});



</script>

<style type="text/css">
	.canvasjs-chart-canvas{

	}
</style>