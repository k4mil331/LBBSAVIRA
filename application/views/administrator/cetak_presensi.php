<!DOCTYPE html>
<html>
<head>
    <title>Cetak Presensi</title>
    <link rel="stylesheet" href="path/to/your/css/styles.css">
</head>
<body>
    <div class="container">

    <style>
    body {
        font-family: Arial, sans-serif;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table th, table td {
        border: 1px solid #00FFFF;
        padding: 8px;
        text-align: left;
    }
    table th {
        background-color: #FFFF00;
    }
    table tr:nth-child(even) {
        background-color: #AFEEEE;
    }
    table tr:hover {
        background-color: #f1f1f1;
    }
    h1 {
        text-align: center;
    }
</style>
</head>
<body>
    <h1>DATA PRESENSI SISWA LBB SAVIRA</h1>
    <table>
        <thead>
            <tr>
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">Nama Siswa</th>
                <th style="text-align: center;">Nama Unit</th>
                <th style="text-align: center;">Tanggal</th>
                <th style="text-align: center;">Jam Masuk</th>
                <th style="text-align: center;">Jam Keluar</th>
                <th style="text-align: center;">Keterangan</th>
                
            </tr>
        </thead>
            <tbody>
                <?php foreach ($presensi as $index => $p): ?>
                    <tr>
                        <td style="text-align: center;"><?= $index + 1 ?></td>
                        <td style="text-align: center;"><?= $p->nama_siswa ?></td>
                        <td style="text-align: center;"><?= $p->nama_unit ?></td>
                        <td style="text-align: center;"><?= $p->tgl ?></td>
                        <td style="text-align: center;"><?= $p->jam_msk ?></td>
                        <td style="text-align: center;"><?= $p->jam_klr ?></td>
                        <td style="text-align: center;"><?= $p->ket ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
       <script type="text/javascript">
        window.print();
    </script>
</body>
</html>