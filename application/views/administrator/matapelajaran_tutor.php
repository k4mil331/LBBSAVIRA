<div class="container-fluid mt-4">
    <div class="alert alert-success" role="alert">
<i class="fas fa-building"></i> MATA PELAJARAN LBB SAVIRA 
</div>

<?php echo $this->session->flashdata('pesan')?>


 <table class="table table-bordered  table-primary table-hover table-striped">

     <tr>
        <th>NO</th>
        <th>KODE MATA PELAJARAN</th>
        <th>NAMA MATA PELAJARAN </th>
        <th>JUMLAH JAM</th>
        <th>TUTOR HANDLE</th>
     </tr>
     <?php 
     $no=1;
     foreach($matapelajaran as $mp ) : ?>
        <tr>
            <td><?php echo $no++ ?> </td>
            <td><?php echo $mp->kode_matapelajaran ?> </td>
            <td><?php echo $mp->nama_matapelajaran ?> </td>
            <td><?php echo $mp->jumlah_jam ?> </td>
            <td><?php echo $mp->nama_tutor ?> </td>
           
        </tr>

     <?php  endforeach;?>
 </table>
</div>