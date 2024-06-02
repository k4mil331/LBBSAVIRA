<div class="container-fluid mt-4">

    <div class="alert alert-success" role="alert">
<i class="fas fa-building"></i>INFORMASI PROGRAM LBB SAVIRA
</div>

<?php echo $this->session->flashdata('pesan')?>
<?php echo anchor ('administrator/informasi/tambah_informasi','<button class="btn btn-sm btn-primary mb-3"> <i class=
            "fas fa-plus-circle fa-sm"></i> Tambah Informasi Program </button>') ?>


<div class="container">
    <div class="table-responsive">
        <table class="table table-bordered  table-warning table-hover table-stripped">
            <tr>
                <th>NO</th>
                <th>ICON</th>
                <th>JUDUL INFORMASI PROGRAM</th>
                <th>ISI INFORMASI PROGRAM</th>
            
                <th colspan="1">AKSI</th>
            </tr>

            <?php 
        $no=1;
        foreach($informasi as $info) :?>

        <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $info->icon ?></td>
            <td><?php echo $info->judul_informasi ?></td>
            <td><?php echo $info->isi_informasi ?></td>
         
          <td width="20px"><?php echo anchor('administrator/informasi/delete/'.$info->id_informasi,
        '<div class="btn btn-sm btn-danger"><i class="fas fa-trash-alt fa-sm"></i></div>')  ?> </td>
        </tr>

        <?php endforeach;?>
        </table>

</div>