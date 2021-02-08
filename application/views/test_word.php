<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=document_name.doc");
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
        <?php
        // prakteknya bisa ambil dari database
        $data = array(
            array(
                'nama' => 'Hari Prasetyo',
                'negara' => 'Indonesia',
            ),
            array(
                'nama' => 'John Doe',
                'negara' => 'Jerman',
            ),
                )
        ?>
        <h2>HARVIACODE</h2>
        <table class="mytable">
            <tr>
                <th>Nama</th>
                <th>Negara</th>
            </tr>
            <?php
            foreach ($data as $key => $value)
            {
                ?>
                <tr>
                    <td><?php echo $value['nama'] ?></td>
                    <td><?php echo $value['negara'] ?></td>
                </tr>
                <?php
            }
            ?>

            
        </table>


</body>
</html>