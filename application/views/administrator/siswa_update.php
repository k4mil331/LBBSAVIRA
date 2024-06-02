<div class="container-fluid mt-4">
    <div class="alert alert-success" role="alert">
<i class="fas fa-eye"></i> Form Update Siswa
</div>

<?php  foreach($siswa as $sws) : ?>
<?php echo form_open_multipart('administrator/siswa/update_siswa_aksi')?>

<div class="form-group ">
    <label>NIS Siswa</label>
    <input type="hidden" name="id" class="form-control" value="<?php echo $sws->id ?>">
    <input type="text" name="nis" class="form-control" autocomplete="off" value="<?php echo $sws->nis?>">

    <?php echo form_error('nis','<div class="text-danger small ml-3">',' </div>')  ?>
</div>

<div class="form-group ml-2">
    <label>Nama Siswa</label>
    <input type="text" name="nama_siswa" class="form-control" autocomplete="off" value="<?php echo $sws->nama_siswa ?>">
    <?php echo form_error('nama_siswa','<div class="text-danger small ml-3">',' </div>')  ?>
</div>

<div class="form-group ml-2">
    <label>Alamat</label>
    <input type="text" name="alamat" class="form-control" autocomplete="off" value="<?php echo $sws->alamat ?>">

    <?php echo form_error('alamat','<div class="text-danger small ml-3">',' </div>')  ?>
</div>

<div class="form-group ml-2">
    <label>Kelas</label>
    <input type="text" name="kelas" class="form-control" autocomplete="off" value="<?php echo $sws->kelas ?>">
    <?php echo form_error('kelas','<div class="text-danger small ml-3">',' </div>')  ?>
</div>

<div class="form-group ml-2">
    <label>Jenis Kelamin</label>
   <select name="jenis_kelamin" class="form-control" value="<?php echo $sws->jenis_kelamin ?>">
    <option >Laki-Laki</option>
    <option >Perempuan</option>
   </select>
    <?php echo form_error('jenis_kelamin','<div class="text-danger small ml-3">',' </div>')  ?>
</div>

<div class="form-group ml-2">
    <label>Program</label>
    <input type="text" name="program" class="form-control"  autocomplete="off" value="<?php echo $sws->program ?>">
    <?php echo form_error('program','<div class="text-danger small ml-3">',' </div>')  ?>
</div>

<div class="form-group ml-2">
    <label>Unit</label>
   <select name="nama_unit" class="form-control" value="<?php echo $sws->nama_unit ?>">
   <?php foreach($unit as $unt) : ?>
    <option value="<?php echo $unt->nama_unit ?>"><?php echo $unt->nama_unit;  ?></option>
    <?php endforeach; ?>

    <?php echo form_error('nama_unit','<div class="text-danger small ml-3">',' </div>')  ?>
   </select>
</div>

<div class="form-group ml-2">
    <label>Tutor Yang Handle</label>
   <select name="nama_tutor" class="form-control" value="<?php echo $sws->nama_tutor ?>">
   <?php foreach ($kelolatutor as $klt) : ?>
    <option value="<?php echo $klt->nama_tutor ?>"><?php echo $klt->nama_tutor;  ?></option>
    <?php endforeach; ?>

    <?php echo form_error('nama_tutor','<div class="text-danger small ml-3">',' </div>')  ?>
   </select>
</div>

<div class="form-group">
    <?php foreach($detail as $dt) : ?>
        <img src="<?php echo base_url(). 'assets/upload/' .$sws->foto?>">
        <?php  endforeach; ?> <br>
    <label> Foto </label><br>
    <input type="file" name="userfile" value="<?php echo $sws->foto ?>">
</div>

<?php echo anchor('administrator/siswa','<div class="btn btn-danger  ">Kembali</div>') ?> 
<button type="submit" class="btn btn-primary ">Simpan </button>
<?php form_close(); ?>
<?php endforeach;?><br><br><br>
</div>