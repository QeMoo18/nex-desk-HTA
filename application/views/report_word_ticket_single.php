<?php
$rand = rand();
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=ticket_".$rand.".doc");
?>

<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">

        <style>
            h2{
                text-align: center
            }
            .mytable{
                border:1px solid black; 
                border-collapse: collapse;
                width: 100%;
            }
            .mytable tr th, .mytable tr td{
                border:1px solid black; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>

	<h3 align="center"> <u>REPORT TICKET</u> </h3>

	<?php echo widget_ticket_pdf(); ?>
	</body>
</html>