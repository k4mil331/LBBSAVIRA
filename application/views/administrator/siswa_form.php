<div class="container-fluid mt-4">
    <div class="alert alert-success" role="alert">
<i class="fas fa-eye"></i> Form Input Siswa
</div>

<?php echo form_open_multipart('administrator/siswa/tambah_siswa_aksi')?>

<div class="form-group ml-2">
    <label>NIS Siswa</label>
    <input type="text" name="nis" class="form-control" autocomplete="off">

    <?php echo form_error('nis','<div class="text-danger small ml-3">',' </div>')  ?>
</div>

<div class="form-group ml-2">
    <label>Nama Siswa</label>
    <input type="text" name="nama_siswa" class="form-control" autocomplete="off">

    <?php echo form_error('nama_siswa','<div class="text-danger small ml-3">',' </div>')  ?>
</div>

<div class="form-group ml-2">
    <label>Alamat</label>
    <input type="text" name="alamat" class="form-control" autocomplete="off">

    <?php echo form_error('alamat','<div class="text-danger small ml-3">',' </div>')  ?>
</div>

<div class="form-group ml-2">
    <label>Kelas</label>
    <input type="text" name="kelas" class="form-control" autocomplete="off">

    <?php echo form_error('kelas','<div class="text-danger small ml-3">',' </div>')  ?>
</div>

<div class="form-group ml-2">
    <label>Jenis Kelamin</label>
   <select name="jenis_kelamin" class="form-control">
    <option value="">--Pilih Jenis Kelamin--</option>
    <option >Laki-Laki</option>
    <option >Perempuan</option>
   </select>
    <?php echo form_error('jenis_kelamin','<div class="text-danger small ml-3">',' </div>')  ?>
</div>

<div class="form-group ml-2">
    <label>Program</label>
    <input type="text" name="program" class="form-control" autocomplete="off">

    <?php echo form_error('program','<div class="text-danger small ml-3">',' </div>')  ?>
</div>

<div class="form-group ml-2">
    <label>Unit</label>
   <select name="nama_unit" class="form-control">
   <option value="">--Pilih Unit Siswa--</option>
   <?php foreach($unit as $unt) : ?>
    <option value="<?php echo $unt->nama_unit ?>"><?php echo $unt->nama_unit;  ?></option>
    <?php endforeach; ?>
</select>
<?php echo form_error('nama_unit','<div class="text-danger small ml-3">',' </div>')  ?>
</div>

<div class="form-group ml-2">
    <label>Tutor Yang Handle</label>
   <select name="nama_tutor" class="form-control">
   <option value="">--Pilih Nama Tutor--</option>
   <?php foreach ($kelolatutor as $klt) : ?>
    <option value="<?php echo $klt->nama_tutor ?>"><?php echo $klt->nama_tutor;  ?></option>
    <?php endforeach; ?>

</select>
<?php echo form_error('nama_tutor','<div class="text-danger small ml-3">',' </div>')  ?>
</div>

<div class="form-group">
    <label> Foto </label><br>
    <input type="file" name="foto">
</div>
<?php echo anchor('administrator/siswa','<div class="btn btn-danger ">Kembali</div>') ?>
<button type="submit" class="btn btn-primary ml-2">Simpan </button>
<?php form_close(); ?>
</div>
<br><br>