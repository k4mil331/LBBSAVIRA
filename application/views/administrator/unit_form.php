<div class="container-fluid mt-4">
     <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Tambah Unit
        </div>

<form method="post" action="<?php echo base_url('administrator/unit/input_aksi')?>">
    <div class="form-group">
        <label>Kode Unit</label>
        <input type="text" name="kode_unit" placeholder="masukkan kode unit" class="form-control" autocomplete="off">
        <?php echo form_error('kode_unit','<div class="text-danger small" ml-3>') ?>
    </div>
     <div class="form-group">
        <label>Nama_Unit</label>
        <input type="text" name="nama_unit" placeholder="masukkan nama unit" class="form-control" autocomplete="off">
        <?php echo form_error('nama_unit','<div class="text-danger small" ml-3>') ?>
    </div>
     <?php echo anchor('administrator/unit','<div class="btn btn-danger mt-3 ">Kembali</div>') ?>
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>
</div>