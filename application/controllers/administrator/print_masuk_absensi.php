<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Cetak Presensi</title>
</head>
<body>
    <h1>Form Cetak Presensi</h1>
    <form action="<?= base_url('resensi/cetak_presensi') ?>" method="get">
        <label for="tanggal">Pilih Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal">
        <button type="submit">Cetak Presensi</button>
    </form>
</body>
</html>