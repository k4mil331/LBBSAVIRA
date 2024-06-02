<div class="container-fluid mt-4">

<div class="alert alert-success" role="alert">
<i class="fas fa-plus"></i>FORM UPDATE DATA KRPP
</div>

<form method="post" action="<?php echo base_url('administrator/krpp/update_aksi')?>">

    <div class="form-group">
        <label>Tahun Ajaran</label>
        <input type="hidden" name="id_thn_ajaran" class="form-control" value="<?php echo $id_thn_ajaran; ?>">
        <input type="hidden" name="id_krpp" class="form-control"  value="<?php echo $id_krpp; ?>">
        <input type="text" name="thn_ajaran_smt" class="form-control"  value="<?php echo $thn_ajaran_smt. '/' .$semester; ?>" readonly/>
    </div>

     <div class="form-group">
        <label>NIS SISWA </label>
        <input type="text" name="nis" class="form-control" autocomplete="off" value="<?php echo $nis; ?>" readonly/>
    </div>

    <div class="form-group">
    <label> MATA PELAJARAN </label>
    <?php 
    $query = $this->db->query('SELECT kode_matapelajaran,nama_matapelajaran FROM matapelajaran');

    $dropdowns = $query ->result();
    foreach($dropdowns as $dropdown) {
        $dropDownList[$dropdown->kode_matapelajaran] =$dropdown->nama_matapelajaran;
    }

    echo form_dropdown('kode_matapelajaran', $dropDownList,$kode_matapelajaran,'class="form-control" id="kode_matapelajaran"');
    ?>
    </div>

     <?php echo anchor('administrator/krpp/index','<div class="btn btn-danger  ">Kembali</div>') ?> 
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>