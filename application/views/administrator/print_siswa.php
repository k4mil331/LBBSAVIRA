<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <center>
    <legend class="mt-3"><strong> DATA SELURUH SISWA SEMUA UNIT</strong></legend>
    </center>
    <table border="1" width="100%" style="margin-top: 10px;">
        <tr>
            <th>NO</th>
            <th>NIS</th>
            <th>NAMA SISWA</th>
            <th>ALAMAT</th>
            <th>KELAS</th>
            <th>JENIS KELAMIN</th>
            <th>PROGRAM</th>
            <th>NAMA UNIT</th>
            <th>NAMA TUTOR</th>
        </tr>

        <?php $no=1; 
        foreach ($siswa as $sws): ?>

        <tr>
            <td style="text-align: center;"><?php echo $no++?></td>
            <td style="text-align: center;"><?php echo $sws->nis?></td>
            <td style="text-align: center;"><?php echo $sws->nama_siswa?></td>
            <td style="text-align: center;"><?php echo $sws->alamat?></td>
            <td style="text-align: center;"><?php echo $sws->kelas?></td>
            <td style="text-align: center;"><?php echo $sws->jenis_kelamin?></td>
            <td style="text-align: center;"> <?php echo $sws->program?></td>
            <td style="text-align: center;"><?php echo $sws->nama_unit?></td>
            <td style="text-align: center;"><?php echo $sws->nama_tutor?></td>
        </tr>
        <?php endforeach; ?>

    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>