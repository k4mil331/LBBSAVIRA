<div class="container-fluid mt-4">

<div class="alert alert-success" role="alert">
<i class="fas fa-building"></i>DATA NAMA TUTOR LBB SAVIRA
</div>
 <?php if ($this->session->flashdata('error')): ?>
        <?= $this->session->flashdata('error') ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('pesan')): ?>
        <?= $this->session->flashdata('pesan') ?>
    <?php endif; ?>

<?php echo anchor ('administrator/kelolatutor/tambah_tutor','<button class="btn btn-sm btn-primary mb-3"> <i class=
            "fas fa-plus-circle "></i> Tambah Tutor </button>') ?> 
              <a class="btn btn-sm btn-warning mb-3" href="<?php echo base_url('administrator/kelolatutor/cetak')?>"> 
 <i class="fa fa-print">Print</i>
</a>
 
    


<div class="container">
    <div class="table-responsive">
<table class="table table-striped table-info table-bordered table-hover  " id="example">
    <tr>
        <th>NO</th>
        <th>KODE_TUTOR</th>
        <th>NAMA_TUTOR</th>
        <th>NAMA_UNIT</th>
        <th>CATATAN</th>
        <th colspan="2">AKSI</th>
    </tr>

    <?php
    $no =1;
    foreach($kelolatutor as $klt ):?>
     <tr>
          <td><?= ++$start?></td>
            <td><?= $klt['kode_tutor']?></td>
            <td><?= $klt['nama_tutor']?></td>
            <td><?= $klt['nama_unit']?></td>
            <td><?= $klt['catatan']?></td>
        <td width="20px"><?php echo anchor('administrator/kelolatutor/update/'.$klt['id_tutor'],
        '<div class="btn  btn-info"> <i class="fas fa-pencil-alt fa-sm"></i></div>')  ?> </td>
        <td width="20px"><?php echo anchor('administrator/kelolatutor/delete/'.$klt['id_tutor'],
        '<div class="btn btn-danger"><i class="fas fa-trash-alt fa-sm"></i></div>')  ?> </td>
     </tr>
    <?php endforeach; ?>
</table>

<?= $this->pagination->create_links(); ?>

</div>