<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<center>
    <legend class="mt-3"><strong> DATA PEMINJAMAN BUKU TUTOR </strong></legend>
    </center>
    <table border="1" width="100%" style="margin-top: 10px;">
        <tr>
            <th>NO</th>
            <th>NAMA TUTOR</th>
            <th>TGL_PINJAM</th>
            <th>CATATAN</th>
        </tr>

        <?php $no=1; 
        foreach ($peminjaman as $pjm): ?>

        <tr>
            <td style="text-align: center;"><?php echo $no++?></td>
            <td style="text-align: center;"><?php echo $pjm->nama_tutor?></td>
            <td style="text-align: center;"><?php echo $pjm->tgl_pinjam?></td>
            <td style="text-align: center;"><?php echo $pjm->catatan?></td>
            
        </tr>
        <?php endforeach; ?>

    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>