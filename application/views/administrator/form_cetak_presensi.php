<!DOCTYPE html>
<html>
<head>
    <title>Form Cetak Presensi</title>
</head>
<body>
<div class="container-fluid mt-4">
    <div class="alert alert-primary" role="alert">
        
        <i class="fa-solid fa-gauge"></i>FORM CETAK PRESENSI
    </div>
      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('error') ?>
        </div>
    <?php endif; ?>
    
    <form action="<?= base_url('administrator/presensi_admin/cetak_presensi') ?>" method="get">
        <div class="form-group">
            <label for="bulan">Pilih Bulan</label>
            <input type="month" id="bulan" name="bulan" class="form-control" autocomplete="off">
            <?php echo form_error('bulan', '<div class="text-danger small" ml-3>'); ?>
        </div>
        <div class="form-group">
            <label for="nama_unit">Pilih Unit</label>
            <select id="nama_unit" name="nama_unit" class="form-control">
                <option value="">SEMUA UNIT</option>
                <?php foreach ($units as $unit) : ?>
                    <option value="<?= $unit->nama_unit ?>"><?= $unit->nama_unit ?></option>
                <?php endforeach; ?>
            </select>
            <?php echo form_error('nama_unit', '<div class="text-danger small" ml-3>'); ?>
        </div>
        <?php echo anchor('administrator/presensi_admin/', '<div class="btn btn-danger mt-3">Kembali</div>'); ?>
        <button type="submit" class="btn btn-info mt-3">Cetak</button>
    </form>
</div>
</body>
</html>
