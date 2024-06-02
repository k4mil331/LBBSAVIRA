<div class="container-fluid mt-4">
<div class="alert alert-success" role="alert">
<i class="fas fa-eye"></i> Detail Siswa 
</div>

<table class="table table-hover table-stripped table-bordered">

<?php foreach($detail as $dt) : ?>

    <img class="mb-4" src="<?php echo base_url('assets/upload/').$dt->foto ?>" style="width: 20%">
<tr>
    <td>NIS</td>
    <td><?php echo $dt->nis; ?></td>
</tr>

<tr>
    <td>NAMA SISWA</td>
    <td><?php echo $dt->nama_siswa; ?></td>
</tr>

<tr>
    <td>ALAMAT</td>
    <td><?php echo $dt->alamat; ?></td>
</tr>

<tr>
    <td>KELAS</td>
    <td><?php echo $dt->kelas; ?></td>
</tr>

<tr>
    <td>JENIS KELAMIN</td>
    <td><?php echo $dt->jenis_kelamin; ?></td>
</tr>

<tr>
    <td>NAMA PROGRAM </td>
    <td><?php echo $dt->program; ?></td>
</tr>

<tr>
    <td>UNIT</td>
    <td><?php echo $dt->nama_unit; ?></td>
</tr>

<tr>
    <td>NAMA TUTOR HANDLE</td>
    <td><?php echo $dt->nama_tutor; ?></td>
</tr>


<?php endforeach; ?>
</table>

<?php echo anchor('administrator/siswa_tutor','<div class="btn btn-danger ">Kembali</div>') ?><br><br><br><br>

</div>