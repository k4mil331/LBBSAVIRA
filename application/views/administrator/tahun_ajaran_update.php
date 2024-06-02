<div class="container-fluid mt-4">
    <div class="alert alert-success" role="alert">
<i class="fas fa-edit"></i>Form Edit Tahun Ajaran
</div>

<?php  foreach ($tahun_ajaran as $ta) :?>

<form method="post" action="<?php echo base_url('administrator/tahun_ajaran/update_aksi')?>">
    <div class="form-group">
        <label>Tahun Ajaran</label>
        <input type="hidden" name="id_thn_ajaran" placeholder="masukkan tahun ajaran" class="form-control" 
        value="<?php echo $ta->id_thn_ajaran?>">
        <input type="text" name="tahun_ajaran" class="form-control"
        value="<?php echo $ta->tahun_ajaran?>">
        <?php echo form_error('tahun_ajaran','<div class="text-danger small" ml-3>') ?>
    </div>
     <div class="form-group">
        <label>Semester</label>
       <select name="semester" class="form-control">
            <option><?php echo $ta->semester ?></option>
            <option>Ganjil</option>
            <option>Genap</option>
       </select>
        <?php echo form_error('semester','<div class="text-danger small" ml-3>') ?>
    </div>

    

    <?php echo anchor('administrator/tahun_ajaran','<div class="btn btn-danger mt-3">Kembali</div>') ?>
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>

<?php  endforeach ; ?>
</div>