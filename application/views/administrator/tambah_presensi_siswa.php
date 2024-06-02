<div class="container-fluid mt-4">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-building"></i> Tambah Absen Siswa
    </div>

    <form method="post" action="<?php echo base_url('administrator/presensi/tambah_presensi_siswa_aksi') ?>">

        <div class="form-group">
            <label>Nama Siswa</label>
            <select name="nama_siswa" id="nama_siswa" class="form-control" onchange="updateUnit()">
                <option value="">--Pilih Nama Siswa--</option>
                <?php foreach ($siswa as $sws) : ?>
                    <option value="<?php echo $sws->nama_siswa ?>" data-unit="<?php echo $sws->nama_unit ?>">
                        <?php echo $sws->nama_siswa; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php echo form_error('nama_siswa', '<div class="text-danger small ml-3">', '</div>'); ?>
        </div>

        <div class="form-group">
            <label>Nama Unit</label>
            <select name="nama_unit" id="nama_unit" class="form-control" readonly>>
                <option value="">--Pilih Nama Unit--</option>
                <?php foreach ($unit as $unt) : ?>
                    <option value="<?php echo $unt->nama_unit ?>"><?php echo $unt->nama_unit; ?></option>
                <?php endforeach; ?>
            </select>
            <?php echo form_error('nama_unit', '<div class="text-danger small ml-3">', '</div>'); ?>
        </div>

        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tgl" class="form-control" autocomplete="off">
            <?php echo form_error('tgl', '<div class="text-danger small ml-3">', '</div>'); ?>
        </div>

        <div class="form-group">
            <label>Jam Masuk</label>
            <input type="time" name="jam_msk" class="form-control" autocomplete="off">
            <?php echo form_error('jam_msk', '<div class="text-danger small ml-3">', '</div>'); ?>
        </div>

        <div class="form-group">
            <label>Jam Keluar</label>
            <input type="time" name="jam_klr" class="form-control" autocomplete="off">
            <?php echo form_error('jam_klr', '<div class="text-danger small ml-3">', '</div>'); ?>
        </div>

        <div class="form-group">
            <label>Keterangan</label>
            <select name="ket" class="form-control">
                <option value="">-- Pilih Keterangan --</option>
                <option value="Sakit">Sakit</option>
                <option value="Ijin">Ijin</option>
                <option value="Alpha">Alpha</option>
                <option value="Hadir">Hadir</option>
            </select>
            <?php echo form_error('ket', '<div class="text-danger small ml-3">', '</div>'); ?>
        </div>

        <?php echo anchor('administrator/presensi', '<div class="btn btn-danger mt-3">Kembali</div>') ?>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>

<script>
    function updateUnit() {
        var namaSiswaSelect = document.getElementById('nama_siswa');
        var selectedSiswa = namaSiswaSelect.options[namaSiswaSelect.selectedIndex];
        var unit = selectedSiswa.getAttribute('data-unit');

        var namaUnitSelect = document.getElementById('nama_unit');
        for (var i = 0; i < namaUnitSelect.options.length; i++) {
            if (namaUnitSelect.options[i].value == unit) {
                namaUnitSelect.selectedIndex = i;
                break;
            }
        }
    }
</script>
