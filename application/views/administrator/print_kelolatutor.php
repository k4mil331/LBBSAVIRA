<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <center>
    <legend class="mt-3"><strong> DATA TUTOR LBB SAVIRA</strong></legend>
    </center>
    <table border="1" width="100%" style="margin-top: 10px;">
        <tr>
            <th>NO</th>
            <th>KODE TUTOR</th>
            <th>NAMA TUTOR</th>
            <th>NAMA UNIT</th>
            <th>CATATAN</th>
          
        </tr>

        <?php $no=1; 
        foreach ($kelolatutor as $klt): ?>

        <tr>
            <td style="text-align: center;"><?php echo $no++?></td>
            <td style="text-align: center;"><?php echo $klt->kode_tutor?></td>
            <td style="text-align: center;"><?php echo $klt->nama_tutor?></td>
            <td style="text-align: center;"><?php echo $klt->nama_unit?></td>
            <td style="text-align: center;"><?php echo $klt->catatan?></td>
            
        </tr>
        <?php endforeach; ?>

    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>