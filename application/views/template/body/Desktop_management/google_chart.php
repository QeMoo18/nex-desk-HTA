<!DOCTYPE HTML>
<html>
<head>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
window.onload = function () {
var dataPoints = [];
var chart = new CanvasJS.Chart("chartContainer",{
  title:{
    text:"Rendering Chart with dataPoints from External JSON"
  },
  data: [{
    type: "pie",
    dataPoints : dataPoints,
  }]
});
$.getJSON( "http://localhost/json/app/getData", function( data ) {
           //do something with data
           // console.log(data.result);
           var loop = data.result;
           //console.log(data.result.length);

           for (i = 0; i < data.result.length; i++) {
            var name = data.result[i]['name'];
            var total = data.result[i]['TOTAL'];
            // console.log(name+':'+total);

            dataPoints.push({y: total, label: name});
          }

          chart.render();

        });
}
</script>

</head>
<body>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
</body>
</html>
