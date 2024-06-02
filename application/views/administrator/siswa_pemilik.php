<div class="container-fluid mt-4">
     <div class="alert alert-success" role="alert">
<i class="fas fa-building"></i> Siswa LBB SAVIRA 
</div>

<?php echo $this->session->flashdata('pesan')?>

           
<div class="container">
    <div class="table-responsive">
    <Table class="table table-stripped table-success table-hover table-bordered">
        <tr>
            <th>NO</th>
            <th>NAMA SISWA</th>
            <th>KELAS</th>
            <th>PROGRAM</th>
            <th>NAMA UNIT</th>
            <th colspan="1">AKSI</th>
        </tr>

        <?php 
        
        $no=1;
        foreach($siswa as $sws) : ?>

        <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $sws->nama_siswa?></td>
            <td><?php echo $sws->kelas?></td>
            <td><?php echo $sws->program?></td>
            <td><?php echo $sws->nama_unit?></td>
            
            <td width="20px"><?php echo anchor('administrator/siswa_pemilik/detail/'.$sws->id,
            '<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>')  ?> </td>
        </tr>

        <?php  endforeach; ?>
        
    </Table>
      
</div>