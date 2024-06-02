<div class="container-fluid mt-4">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-eye"></i> FORM EDIT PRESENSI SISWA
    </div>

    <?php foreach ($presensi as $prs) : ?>
        <form method="post" action="<?php echo base_url('administrator/presensi/update_presensi_aksi') ?>">
            <div class="form-group ml-2">
                <label>Siswa</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $prs->id ?>">
                <select name="nama_siswa" id="nama_siswa" class="form-control" onchange="updateUnit()">
                    <option value="">Pilih Siswa</option>
                    <?php foreach ($siswa as $sws) : ?>
                        <option value="<?php echo $sws->nama_siswa ?>" data-unit="<?php echo $sws->nama_unit ?>" <?php echo ($sws->nama_siswa == $prs->nama_siswa) ? 'selected' : '' ?>>
                            <?php echo $sws->nama_siswa; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php echo form_error('nama_siswa', '<div class="text-danger small ml-3">', '</div>'); ?>
            </div>

            <div class="form-group ml-2">
                <label>Unit</label>
                <select name="nama_unit" id="nama_unit" class="form-control" readonly>>
                    <option value="">Pilih Unit</option>
                    <?php foreach ($unit as $unt) : ?>
                        <option value="<?php echo $unt->nama_unit ?>" <?php echo ($unt->nama_unit == $prs->nama_unit) ? 'selected' : '' ?>>
                            <?php echo $unt->nama_unit; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php echo form_error('nama_unit', '<div class="text-danger small ml-3">', '</div>'); ?>
            </div>

            <div class="form-group ml-2">
                <label>Tanggal</label>
                <input type="date" name="tgl" class="form-control" autocomplete="off" value="<?php echo $prs->tgl ?>">
                <?php echo form_error('tgl', '<div class="text-danger small ml-3">', '</div>'); ?>
            </div>

            <div class="form-group ml-2">
                <label>Jam Masuk</label>
                <input type="time" name="jam_msk" class="form-control" autocomplete="off" value="<?php echo $prs->jam_msk ?>">
                <?php echo form_error('jam_msk', '<div class="text-danger small ml-3">', '</div>'); ?>
            </div>

            <div class="form-group ml-2">
                <label>Jam Keluar</label>
                <input type="time" name="jam_klr" class="form-control" autocomplete="off" value="<?php echo $prs->jam_klr ?>">
                <?php echo form_error('jam_klr', '<div class="text-danger small ml-3">', '</div>'); ?>
            </div>

            <div class="form-group ml-2">
                <label>Keterangan</label>
                <select name="ket" class="form-control">
                    <option value="Sakit" <?php echo ($prs->ket == 'Sakit') ? 'selected' : '' ?>>Sakit</option>
                    <option value="Ijin" <?php echo ($prs->ket == 'Ijin') ? 'selected' : '' ?>>Ijin</option>
                    <option value="Alpha" <?php echo ($prs->ket == 'Alpha') ? 'selected' : '' ?>>Alpha</option>
                    <option value="Hadir" <?php echo ($prs->ket == 'Hadir') ? 'selected' : '' ?>>Hadir</option>
                </select>
                <?php echo form_error('ket', '<div class="text-danger small ml-3">', '</div>'); ?>
            </div>

            <?php echo anchor('administrator/presensi', '<div class="btn btn-danger">Kembali</div>') ?>
            <button type="submit" class="btn btn-info ml-2">Simpan</button>
        </form>
    <?php endforeach; ?><br><br><br>
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
    document.addEventListener('DOMContentLoaded', function () {
        updateUnit();
    });
</script>
