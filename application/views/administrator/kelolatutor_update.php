<div class="container-fluid mt-4">
     <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Update Tutor
        </div>
        <?php  foreach ($kelolatutor as $klt ):?>

            <form method="post" action="<?php echo base_url('administrator/kelolatutor/update_aksi');?>">
        
            <div class="form-group">
                <label>Kode Tutor</label>
                <input type="hidden" name="id_tutor" value="<?php echo $klt->id_tutor?>">
                <input type="text" name="kode_tutor" class="
                form-control" autocomplete="off" value="<?php echo $klt->kode_tutor?>">
            </div>
             <div class="form-group">
                <label>Nama Tutor</label>
                <input type="text" name="nama_tutor" class="
                form-control" autocomplete="off" value="<?php echo $klt->nama_tutor?>">
            </div>
            <div class="form-group">
                <label >Nama Unit</label>
                <select name="nama_unit" class="form-control">
                    <option value="<?php echo $klt->nama_unit?>"><?php echo $klt->nama_unit;?></option>

                <?php foreach ($unit as $unt) : ?>
                    <option value="<?php echo $unt->nama_unit?>"><?php echo $unt->nama_unit;?></option>
                    
                    <?php endforeach;?>
                </select>
            </div>
                <div class="form-group">
                <label>Catatan</label>
                <input type="text" name="catatan" class="
                form-control" autocomplete="off" value="<?php echo $klt->catatan?>">
            </div>
             <?php echo anchor('administrator/kelolatutor','<div class="btn btn-danger ">Kembali</div>') ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

            <?php endforeach; ?>
</div>