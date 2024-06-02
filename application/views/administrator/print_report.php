<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <center>
    <div class="photo-container">
        <img class="photo" src="<?php echo base_url('assets/img/lbb.png') ?>" alt="Foto Yulia" style="height:100px">
        <div style="font-size: 18px; text-align: center;">
    <div style="display: block; white-space: nowrap;">HASIL PEMBELAJARAN SISWA LBB SAVIRA</div>
    <div style="display: block; white-space: nowrap;">Jl. CITARUM GRIYA SAVIRA REGENCY, PROBOLINGGO</div>
    <div style="display: block; white-space: nowrap;">SIAP MENGIRIM TUTOR KERUMAH YANG BERKOMPETEN</div>
    <hr style="border:0.5px solid black; margin:10px 5px 10px 5px;"> 
</div>
</center>
   
</div>
<center class="mb-4">
        <legend class="mt-3"><strong> LEMBARAN HASIL BELAJAR SAVIRA, DENGAN NAMA : </strong></legend>
<div class="table">
  <table >
        <tr>
            <td style="text-align: center;"><strong>NIS</strong></td>
            <td style="text-align: center;">&nbsp;  <?php echo $siswa_nis ?></td>
        </tr>

         <tr>
            <td style="text-align: center;"><strong>NAMA SISWA </strong></td>
            <td style="text-align: center;">&nbsp;  <?php echo $siswa_nama ?></td>
        </tr>

        <tr>
            <td style="text-align: center;"><strong>NAMA PROGRAM</strong></td>
            <td style="text-align: center;">&nbsp;   <?php echo $siswa_program?></td>
        </tr>

          <tr>
            <td style="text-align: center;"><strong>NAMA TUTOR</strong></td>
            <td style="text-align: center;">&nbsp;  <?php echo $siswa_nama_tutor?></td>
        </tr>
         <tr>
            <td style="text-align: center;"><strong>NAMA UNIT</strong></td>
            <td style="text-align: center;">&nbsp;   <?php echo $siswa_nama_unit?></td>
        </tr>
  </table>

</div>
<head>
    <style>
        .photo-container {
            display: flex; 
            align-items: center; 
            margin-bottom: 20px;
        }

        .photo {
            height: 60px;
            margin-right: 20px;
        }

        .text {
            font-size: 18px;
        }
    </style>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    table1 {
        width: 100%;
        border-collapse: collapse;
    }
    table1 th1, table td {
        border: 2px solid #00FFFF;
        padding: 8px;
        text-align: center;
    }
    table1 th1 {
        background-color: #FFFF00;
    }
    table1 tr:nth-child(even) {
        background-color: #AFEEEE;
    }
    table1 tr:hover {
        background-color: #DB7093;
    }
    h1 {
        text-align: center;
    }
</style>
</head>
<body>
    
   
    <?php if (!empty($results)): ?>
    <table border="1" width="100%" style="margin-top: 10px;">
        <tr>
            
            <th>NO</th>
            <th>KODE MATA PELAJARAN</th>
            <th>NAMA MATA PELAJARAN</th>
            <th>JUMLAH JAM</th>
            <th>NILAI</th>
        </tr>



        <?php 
        $no=1;
        foreach ($results as $row): ?>
            <tr>
              
                <td><?php echo $no++ ?></td>
                <td><?php echo $row->kode_matapelajaran; ?></td>
                <td><?php echo $row->nama_matapelajaran; ?></td>
                <td><?php echo $row->jumlah_jam; ?></td>
                <td><?php echo $row->nilai; ?></td>
            </tr>
        <?php endforeach; ?>
    

    </table>
</center>
    <?php else: ?>
    <p>TIDAK ADA DATA LEMBARAN HASIL BELAJAR UNTUK NAMA SISWA TERSEBUT</p>
<?php endif; ?>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
<br><br>
<p style="text-align: right; margin-right: 40px;">TTD PEMILIK</p><br><br>
<p style="text-align: right; margin-right: 30px;">WIWIK RUBIANTI</p><br><br>


