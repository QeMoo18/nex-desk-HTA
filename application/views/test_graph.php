

<?php
 $dataPoints = array(
	array("y" => 25, "label" => "Sunday"),
	array("y" => 15, "label" => "Monday"),
	array("y" => 25, "label" => "Tuesday"),
	array("y" => 5, "label" => "Wednesday"),
	array("y" => 10, "label" => "Thursday"),
	array("y" => 0, "label" => "Friday"),
	array("y" => 20, "label" => "Saturday")
);
 
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Push-ups Over a Week"
	},
	axisY: {
		title: "Number of Push-ups"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="<?= base_url()?>asset_admin/bower_components/jquery/dist/jquery.min.js"></script>

<div class="container">
        <img width="75%" class="screen" >
        <div id="place"> 

        </div>
    </div>

</body>
</html> 


<script>
        function report() {
            let region = document.querySelector("body"); // whole screen
            html2canvas(region, {
                onrendered: function (canvas) {
                let pngUrl = canvas.toDataURL();
                let img = document.querySelector(".screen");
                img.src = pngUrl;  // pngUrl contains screenshot graphics data in url form

                //alert(pngUrl);
                //$("#userfile").val(pngUrl);
                // here you can allow user to set bug-region
                // and send it with 'pngUrl' to server

                //$("#place").html('<img src='+pngUrl+'> </div>');
                //alert(pngUrl);
                //$("#place").html('<img src="'+pngUrl+'">');


                //send(pngUrl);

                    $("#pngUrl").val(pngUrl);
                },
            });
        }

        $(document).ready(function (){
        	report();
        });
</script>


<form action="<?= base_url()?>report/save_picture" id="test" method="post">
    <input type="hidden" name="pngUrl" id="pngUrl" value="">

    <button type="submit"></button>
</form>



