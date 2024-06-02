<div class="container-fluid mt-4">
     <div class="alert alert-success" role="alert">
<i class="fas fa-building"></i> PRESENSI SISWA LBB
</div>

<?php echo $this->session->flashdata('pesan')?>

<div class="d-flex justify-content-between mb-3">
      <div class="d-flex m-2">

<?php echo anchor ('administrator/presensi/tambah_presensi_siswa','<button class="btn btn-sm btn-primary mb-2 mr-2"> <i class=
            "fas fa-plus fa-sm"></i> Tambah Presensi  </button>') ?>

  </div>
        <div class="col-md-4">
            <form action="<?php base_url('presensi');?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Presensi Siswa..." 
                    name="keyword"autocomplete="off" autofocus >
                    <div class="input-group-append">
                        <input class="btn btn-info" type="submit"
                        name="submit" >
                    </div>
                </div>
            </form>
        </div>
    </div>

<div class="container">
    <div class="table-responsive">
   <Table class="table table-stripped table-warning table-hover table-bordered"  >
        <thead>
        <tr>
            <th  style='text-align:center;' width=20px>NO</th>
            <th  style='text-align:center;'>NAMA SISWA</th>
            <th  style='text-align:center;'>NAMA UNIT</th>
            <th  style='text-align:center;'>TANGGAL</th>
            <th  style='text-align:center;'>JAM MASUK</th>
            <th  style='text-align:center;'>JAM KELUAR</th>
            <th  style='text-align:center;'>KETERANGAN</th>
            <th colspan="2">AKSI</th>
        </tr>
        </thead>

         <tbody>
             <?php if(empty($presensi)) :?>
            <tr>
                <td colspan="8">
                    <div class="alert alert-danger" role="alert">
                        Data Tidak Ada 

                    </div>
                </td>
            </tr>
            <?php endif ?>
      <?php
        foreach($presensi as $prs) : ?>

        <tr>
             <tr>
     
              <td style='text-align:center;'><?= ++$start?></td>
               <td style='text-align:center;'><?= $prs['nama_siswa']?></td>
               <td style='text-align:center;'><?= $prs['nama_unit']?></td>
               <td style='text-align:center;'><?= $prs['tgl']?></td>
               <td style='text-align:center;'><?= $prs['jam_msk']?></td>
               <td style='text-align:center;'><?= $prs['jam_klr']?></td>
               <td style='text-align:center;'><?= $prs['ket']?></td>
            <td width="20px"><?php echo anchor('administrator/presensi/update/'.$prs['id'],
            '<div class="btn btn-sm btn-info"><i class="fas fa-pencil-alt fa-sm"></i></div>')  ?> </td>
        </tr>
        

        <?php  endforeach; ?>
                       
                    </table>
 <?= $this->pagination->create_links(); ?>

</div>