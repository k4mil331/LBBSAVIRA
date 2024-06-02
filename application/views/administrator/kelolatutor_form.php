<div class="container-fluid mt-4">
    <div class="alert alert-success" role="alert">
<i class="fas fa-building"></i>Form Input Tutor
</div>

<form method="post" action="<?php echo base_url('administrator/kelolatutor/tambah_tutor_aksi')?>">
    <div class="form-group">
        <label>Kode Tutor</label>
        <input type="text" name="kode_tutor" placeholder="masukkan kode tutor" class="form-control" autocomplete="off">
        <?php echo form_error('kode_tutor','<div class="text-danger small" ml-3>') ?>
    </div>
    
     <div class="form-group">
        <label>Nama Tutor</label>
        <input type="text" name="nama_tutor" placeholder="masukkan nama tutor" class="form-control" autocomplete="off">
        <?php echo form_error('nama_tutor','<div class="text-danger small" ml-3>') ?>
    </div>
 <div class="form-group">
        <label>Nama Unit</label>
    <select name="nama_unit" class="form-control">
            <option value=""> --Pilih Nama Unit-- </option>
            <?php foreach ($unit as $unt) : ?>
            <option value="<?php echo $unt -> nama_unit ?>"> <?php echo $unt->nama_unit; ?> </option>
            <?php endforeach; ?>
        </select>
        <?php echo form_error('nama_unit','<div class="text-danger small" ml-3>') ?>
</div>
               <div class="form-group">
        <label>Catatan</label>
        <input type="text" name="catatan" placeholder="masukkan catatan" class="form-control" autocomplete="off">
        <?php echo form_error('catatan','<div class="text-danger small" ml-3>') ?>
    </div>  

    <?php echo anchor('administrator/kelolatutor','<div class="btn btn-danger mt-3">Kembali</div>') ?>
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>
</div>