<div class="container-fluid mt-4">

    <div class="alert alert-success" role="alert">
<i class="fas fa-edit"></i>Form Edit Mata Pelajaran
</div>

<?php foreach($matapelajaran as $mp) :?>

    <form method="post" action="<?php  echo base_url('administrator/matapelajaran/update_aksi'); ?>">

      <div class="form-group">
        <label>Nama Mata Pelajaran </label>
        <input type="hidden" name="kode_matapelajaran" class="form-control" 
         value="<?php echo $mp->kode_matapelajaran ?>">
        <input type="text" name="nama_matapelajaran" autocomplete="off" class="form-control" 
        value="<?php echo $mp->nama_matapelajaran ?>">
    </div>

     <div class="form-group">
        <label>Jumlah Jam</label>
        <select name="jumlah_jam" class="form-control">
            <option> <?php echo $mp->jumlah_jam ?></option>
           <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
       </select>
    </div>

      <div class="form-group">
        <label>Tutor Handle</label>
       <select name="nama_tutor" class="form-control">
           <option> <?php echo $mp->nama_tutor ?></option>
           <?php foreach ($kelolatutor as $klt ): ?>
           <option value="<?php echo $klt->nama_tutor; ?>"><?php echo $klt->nama_tutor; ?></option>

           <?php endforeach; ?>
       </select>
    </div>

    <?php echo anchor('administrator/matapelajaran','<div class="btn btn-danger ">Kembali</div>') ?> 
        <button type="submit" class="btn btn-primary"> Simpan</button>

    </form>
<?php endforeach; ?>
</div>