<div class="container-fluid mt-4">
 <div class="alert alert-success" role="alert">
<i class="fas fa-building"></i>FORM UPDATE TENTANG SAVIRA
</div>

<?php  foreach ($tentang as $ttg)  : ?>

<form method="post" action="<?php echo base_url('administrator/tentang_savira/update_aksi')?>">
    <div class="form-group">
        <label>Pengertian</label>
        <input type="hidden" name="id" class="form-control"  value="<?php echo $ttg->id ?>">
        <input type="text" name="pengertian" class="form-control" autocomplete="off"
          value="<?php echo $ttg->pengertian ?>">
       
    </div>

    <div class="form-group">
        <label>Visi</label>
        <input type="text" name="visi" autocomplete="off" class="form-control" value="<?php echo $ttg->visi ?>">
       
    </div>

    <div class="form-group">
        <label>Misi</label>
        <input type="text" name="misi" class="form-control" autocomplete="off" value="<?php echo $ttg->misi ?>">
       
    </div>



    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>

<?php endforeach; ?>
</div>