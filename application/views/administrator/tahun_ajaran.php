<div class="container-fluid mt-4">

  <div class="alert alert-success" role="alert">
<i class="fas fa-building"></i> Tahun Ajaran 
</div>

<?php echo $this->session->flashdata('pesan')?>
<?php echo anchor ('administrator/tahun_ajaran/tambah_tahun_ajaran','<button class="btn btn-sm btn-primary mb-3"> <i class=
            "fas fa-plus-circle fa-sm"></i> Tambah Tahun Ajaran </button>') ?>


<div class="container">
    <div class="table-responsive">
    <table class=" table table-hover table-bordered table-warning table-stripped">
        <tr>
            <th>NO</th>
            <th>TAHUN AJARAN</th>
            <th>SEMESTER</th>
            <th colspan="2">AKSI</th>
        </tr>

        <?php 
        $no=1;
        foreach ($tahun_ajaran as $aj ) :?>

            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $aj->tahun_ajaran ?></td>
                <td><?php echo $aj->semester ?></td>
                 <td width="20px"><?php echo anchor('administrator/tahun_ajaran/update/'.$aj->id_thn_ajaran,
            '<div class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt fa-sm"></i></div>')  ?> </td>
            <td width="20px"><?php echo anchor('administrator/tahun_ajaran/delete/'.$aj->id_thn_ajaran,
            '<div class="btn btn-sm btn-danger"><i class="fas fa-trash-alt fa-sm"></i></div>')  ?> </td>
            </tr>
            <?php endforeach; ?>
    </table>
</div>