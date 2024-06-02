<div class="container-fluid mt-4">
    <div class="alert alert-success" role="alert">
<i class="fas fa-building"></i>Form Input Mata Pelajaran
</div>


<form method="post" action="<?php echo base_url('administrator/matapelajaran/tambah_matapelajaran_aksi') ?>">
    <div class="form-group">
        <label>Kode Mata Pelajaran</label>
        <input type="text" name="kode_matapelajaran" class="form-control" autocomplete="off">
        <?php echo form_error ('kode_matapelajaran','<div class="text-danger small ml-3">')  ?>
    </div>

    <div class="form-group">
        <label>Nama Mata Pelajaran</label>
        <input type="text" name="nama_matapelajaran" class="form-control" autocomplete="off">
        <?php echo form_error('nama_matapelajaran','<div class="text-danger small ml-3">')  ?>
    </div>

     <div class="form-group">
        <label>Jumlah Jam Pelajaran</label>
        <select name="jumlah_jam" class="form-control">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
        </select>
    <?php echo form_error('jumlah_jam','<div class="text-danger small" ml-3>') ?>
    </div>

     <div class="form-group">
        <label>Tutor Handle</label>
       <select name="nama_tutor" class="form-control">
        <option value="">--Pilih Nama Tutor--</option>
         <?php foreach ($kelolatutor as $klt) : ?>
            <option value="<?php echo $klt -> nama_tutor ?>"> <?php echo $klt->nama_tutor ?> </option>
            <?php endforeach; ?>
       </select>
         <?php echo form_error('nama_tutor','<div class="text-danger small" ml-3>') ?>
    </div>

    <?php echo anchor('administrator/matapelajaran','<div class="btn btn-danger mb-5 ">Kembali</div>') ?> 
    <button type="submit " class="btn btn-primary mb-5"> Simpan </button>


</form>
</div>