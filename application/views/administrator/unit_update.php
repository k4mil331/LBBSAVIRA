<div class="container-fluid mt-4">
     <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Update Unit
        </div>
        <?php  foreach ($unit as $unt ):?>

            <form method="post" action="<?php echo base_url('administrator/unit/update_aksi')?>">
        
            <div class="form-group">
                <label>Kode Unit</label>
                <input type="hidden" name="id_unit" value="<?php echo $unt->id_unit?>">
                <input type="text" name="kode_unit" autocomplete="off" class="
                form-control" value="<?php echo $unt->kode_unit?>">
            </div>
             <div class="form-group">
                <label>Nama Unit</label>
                <input type="text" name="nama_unit" autocomplete="off" class="
                form-control" value="<?php echo $unt->nama_unit?>">
            </div>
             <?php echo anchor('administrator/unit','<div class="btn btn-danger ">Kembali</div>') ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

            <?php endforeach; ?>
</div>