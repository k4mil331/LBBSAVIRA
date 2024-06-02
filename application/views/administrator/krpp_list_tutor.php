<div class="container-fluid mt-4">
<div class="alert alert-success" role="alert">
<i class="fas fa-building"></i>Kartu Rencana Pelaksanaan Pembelajaran Di LBB SAVIRA

</div>

 <center class="mb-4">
        <legend class="mt-3"><strong>KARTU RENCANA PELAKSANAAN PEMBELAJARAN</strong></legend>

    <table>
        <tr>
            <td><strong>NIS</strong></td>
            <td>&nbsp;:   <?php echo $nis ?></td>
        </tr>

         <tr>
            <td><strong>NAMA SISWA </strong></td>
            <td>&nbsp;:   <?php echo $nama_siswa ?></td>
        </tr>

         <tr>
            <td><strong>NAMA PROGRAM</strong></td>
            <td>&nbsp;:   <?php echo $program ?></td>
        </tr>

          <tr>
            <td><strong>TAHUN AJARAN (SEMESTER)</strong></td>
            <td>&nbsp;:   <?php echo $tahun_ajaran.'&nbsp;('.$semester.')'?></td>
        </tr>

         <tr>
            <td><strong>UNIT</strong></td>
            <td>&nbsp;:   <?php echo $nama_unit ?></td>
        </tr>
    </table>
    </center>
           
</a>

<div class="container">
    <div class="table-responsive">
    <table class="table table-bordered table-primary table-hover table-stripped ">
        <tr> 
            <th>NO</th>
            <th>KODE MATA PELAJARAN</th>
            <th>NAMA MATA PELAJARAN</th>
            <th>JUMLAH JAM</th>
            
        </tr>

        <?php 
        
        $no = 1;
        $jumlah_jam=0;
        foreach ($krpp_data as $krpp) :?>
<tr>
    <td width="20px"><?php echo $no++ ;?></td>
    <td><?php echo $krpp->kode_matapelajaran;?></td>
    <td><?php echo $krpp->nama_matapelajaran;?></td>
    <td>
        <?php echo $krpp->jumlah_jam;
                    $jumlah_jam+= $krpp->jumlah_jam;?>
        </td>
      
           
<?php  endforeach; ?>

 <tr>
                <td colspan="3" align="right"> <strong>Jumlah Jam</strong></td>
                <td colspan="3"><strong><?php echo $jumlah_jam; ?></strong></td>
            </tr>
    </table>
</div>