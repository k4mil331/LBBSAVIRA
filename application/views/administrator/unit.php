
<div class="container-fluid mt-4">
        <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i>DATA UNIT LBB SAVIRA
        </div>
         <?php if ($this->session->flashdata('error')): ?>
        <?= $this->session->flashdata('error') ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('pesan')): ?>
        <?= $this->session->flashdata('pesan') ?>
    <?php endif; ?>
        <?php echo anchor('administrator/unit/input',' <button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus-circle"></i> Tambah Unit </button>') ?>
       <a class="btn btn-sm btn-info mb-3" href="<?php echo base_url('administrator/unit/cetak')?>"> 
 <i class="fa fa-print">Print</i>
</a>

        <table class="table table-bordered table-primary table-striped table-hover ">
            <tr>
                <th>NO</th>
                <th>KODE UNIT</th>
                <th>NAMA UNIT</th>
                <th colspan="2">AKSI</th>
            </tr>

            <?php
            $no =1;
            foreach ($unit as $unt) : ?>
            <tr>
                <td width="20px"><?php echo $no++ ?> </td>
                <td><?php echo $unt->kode_unit ?> </td>
                <td><?php echo $unt->nama_unit ?> </td>
                <td width="20px"><?php echo anchor('administrator/unit/update/'.$unt->id_unit,
                '<div class="btn btn-sm btn-info">  <i class="fas fa-pencil-alt"></i></div>')  ?> </td>
                <td width="20px"><?php echo anchor('administrator/unit/delete/'.$unt->id_unit,
                '<div class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></div>')  ?> </td>
               
            </tr>
                <?php endforeach; ?>
        
        </table>
</div>