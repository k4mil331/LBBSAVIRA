<div class="container-fluid mt-4">
<div class="alert alert-success" role="alert">
<i class="fas fa-building"></i>LEMBARAN HASIL BELAJAR DI LBB SAVIRA

</div>

 <center class="mb-4">
        <legend class="mt-3"><strong>LEMBARAN HASIL BELAJAR (LHB) </strong></legend>

    <table>
        <tr>
            <td><strong>NIS</strong></td>
            <td>&nbsp;:   <?php echo $siswa_nis ?></td>
        </tr>

         <tr>
            <td><strong>NAMA SISWA </strong></td>
            <td>&nbsp;:   <?php echo $siswa_nama ?></td>
        </tr>

         <tr>
            <td><strong>NAMA PROGRAM</strong></td>
            <td>&nbsp;:   <?php echo $siswa_program?></td>
        </tr>
         <tr>
            <td><strong>NAMA TUTOR</strong></td>
            <td>&nbsp;:   <?php echo $siswa_nama_tutor?></td>
        </tr>
         <tr>
            <td><strong>NAMA UNIT</strong></td>
            <td>&nbsp;:   <?php echo $siswa_nama_unit?></td>
        </tr>

          <tr>
            <td><strong>TAHUN AJARAN (SEMESTER)</strong></td>
          <td>&nbsp;:   <?php echo $tahun_ajaran.'&nbsp;('.$semester.')'?></td>
        </tr>

        
    </table>
    </center>
      
<div class="container">
    <div class="table-responsive">
    <table class="table table-bordered table-info table-hover table-stripped ">
        <tr> 
            <th>NO</th>
            <th>KODE MATA PELAJARAN</th>
            <th>NAMA MATA PELAJARAN</th>
            <th>JUMLAH JAM</th>
            <th>NILAI</th>
        
        </tr>

        <?php 
        
        $no = 1;
        $jumlahjam=0;
        $jumlahNilai=0;
        foreach ($siswa_data as $row) :?>
<tr>
    <td width="20px"><?php echo $no++ ;?></td>
    <td><?php echo $row->kode_matapelajaran;?></td>
    <td><?php echo $row->nama_matapelajaran;?></td>
    <td><?php echo $row->jumlah_jam;?></td>
    <td><?php echo $row->nilai;?></td>

  
        </tr>
           
<?php  endforeach; ?>


    </table>

</div>