<div class="container-fluid mt-4">
    <div class="alert alert-success" role="alert">
<i class="fas fa-eye"></i>  FORM INPUT DATA INFORMASI PROGRAM
</div>

<form method="post" action="<?php echo base_url('administrator/informasi/tambah_informasi_aksi')  ?>">

<div class="form-group ml-2">
    <label>ICON</label>
    <input type="hidden" name="id_informasi" class="form-control">
    <input type="text" name="icon" class="form-control" autocomplete="off">

    <?php echo form_error('icon','<div class="text-danger small ml-3">',' </div>')  ?>
</div>

<div class="form-group ml-2">
    <label>JUDUL INFORMASI PROGRAM</label>
    <input type="text" name="judul_informasi" class="form-control" autocomplete="off">

    <?php echo form_error('judul_informasi','<div class="text-danger small ml-3">',' </div>')  ?>
</div>

<div class="form-group ml-2">
    <label>ISI INFOMASI PROGRAM</label>
   <textarea type="text" name="isi_informasi" autocomplete="off" class="form-control" rows="3"></textarea>
    <?php echo form_error('isi_informasi','<div class="text-danger small ml-3">',' </div>')  ?>
</div>


<?php echo anchor('administrator/informasi','<div class="btn btn-danger ">Kembali</div>') ?>
<button type="submit" class="btn btn-primary ml-2">Simpan </button>
</form>
</div>