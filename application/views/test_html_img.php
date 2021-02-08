<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Screen shoter</title>        
    <style>.container { margin-top: 10px; border: solid 1px black; }  </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="<?= base_url()?>asset_admin/bower_components/jquery/dist/jquery.min.js"></script>
</head>
<body>

    <div>Screenshot tester</div>
    <button onclick="report()">Take screenshot</button>

    <div class="container">
        <img width="75%" class="screen" >
    </div>

    <script>
        function report() {
            let region = document.querySelector("body"); // whole screen
            html2canvas(region, {
                onrendered: function (canvas) {
                let pngUrl = canvas.toDataURL();
                let img = document.querySelector(".screen");
                img.src = pngUrl;  // pngUrl contains screenshot graphics data in url form

                // here you can allow user to set bug-region
                // and send it with 'pngUrl' to server


                },
            });
        }

        $(document).ready(function (){
        	report();
        });
    </script>
</body>
</html>