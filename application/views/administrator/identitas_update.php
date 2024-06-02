<div class="container-fluid mt-4">
 <div class="alert alert-success" role="alert">
<i class="fas fa-building"></i>FORM UPDATE IDENTITAS
</div>

<?php  foreach ($identitas as $id)  : ?>

<form method="post" action="<?php echo base_url('administrator/identitas/update_aksi')?>">
    <div class="form-group">
        <label>Judul Website</label>
        <input type="hidden" name="id_identitas" class="form-control" value="<?php echo $id->id_identitas ?>">
        <input type="text" name="judul_website" autocomplete="off" class="form-control"
          value="<?php echo $id->judul_website ?>">
       
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" autocomplete="off" class="form-control" value="<?php echo $id->alamat ?>">
       
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" autocomplete="off" class="form-control" value="<?php echo $id->email ?>">
       
    </div>

    <div class="form-group">
        <label>No.Telepon</label>
        <input type="text" name="telp" class="form-control" autocomplete="off" value="<?php echo $id->telp ?>">
       
    </div>

    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>

<?php endforeach; ?>
</div>