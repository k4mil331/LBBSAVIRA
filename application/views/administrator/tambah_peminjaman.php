<div class="container-fluid mt-4">
    <div class="alert alert-success" role="alert">
<i class="fas fa-eye"></i> FORM TAMBAH PEMINJAMAN BUKU
</div>

<form method="post" action="<?php echo base_url('administrator/peminjaman/tambah_peminjaman_aksi')  ?>">


<div class="form-group ml-2">
    <label>Nama Tutor</label>
    <select name="nama_tutor" class="form-control">
   <option value="">--Pilih Nama Tutor--</option>
   <?php foreach($kelolatutor as $klt) : ?>
    <option value="<?php echo $klt->nama_tutor ?>"><?php echo $klt->nama_tutor;  ?></option>
    <?php endforeach; ?>
</select>
<?php echo form_error('nama_tutor','<div class="text-danger small ml-3">',' </div>')  ?>
</div>


<div class="form-group ml-2">
    <label>Tanggal Pinjam</label>
    <input type="date" name="tgl_pinjam" class="form-control">
    <?php echo form_error('tgl_pinjam','<div class="text-danger small ml-3">',' </div>')  ?>
</div>

<div class="form-group ml-2">
    <label>Catatan</label>
    <input type="text" name="catatan" class="form-control" autocomplete="off" >
    <?php echo form_error('catatan','<div class="text-danger small ml-3">',' </div>')  ?>
</div>

<?php echo anchor('administrator/peminjaman','<div class="btn btn-danger ">Kembali</div>') ?>
<button type="submit" class="btn btn-primary ml-2"> Simpan </button>
</form>
</div>
<br><br>