<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <center>
    <legend class="mt-3"><strong> DATA SELURUH  UNIT</strong></legend>
    </center>
    <table border="1" width="100%" style="margin-top: 10px;">
        <tr>
            <th>NO</th>
            <th>KODE UNIT</th>
            <th>NAMA UNIT</th>
          
        </tr>

        <?php $no=1; 
        foreach ($unit as $unt): ?>

        <tr>
            <td style="text-align: center;"><?php echo $no++?></td>
            <td style="text-align: center;"><?php echo $unt->kode_unit?></td>
            <td style="text-align: center;"><?php echo $unt->nama_unit?></td>
            
        </tr>
        <?php endforeach; ?>

    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>