<div class="container-fluid mt-4">
    <div class="alert alert-success" role="alert">
<i class="fas fa-building"></i>Form Input Tahun Ajaran
</div>

<form method="post" action="<?php echo base_url('administrator/tahun_ajaran/tambah_tahunajaran_aksi')?>">
    <div class="form-group">
        <label>Tahun Ajaran</label>
        <input type="text" name="tahun_ajaran" placeholder="masukkan tahun ajaran" autocomplete="off" class="form-control">
        <?php echo form_error('tahun_ajaran','<div class="text-danger small" ml-3>') ?>
    </div>
     <div class="form-group">
        <label>Semester</label>
       <select name="semester" class="form-control">
            <option value="">-- Pilih Semester--</option>
            <option>Ganjil</option>
            <option>Genap</option>
       </select>
        <?php echo form_error('semester','<div class="text-danger small" ml-3>') ?>
    </div>


    <?php echo anchor('administrator/tahun_ajaran','<div class="btn btn-danger mt-3">Kembali</div>') ?>
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>
</div>