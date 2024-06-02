<div class="container-fluid mt-4">
     <div class="alert alert-success" role="alert">
<i class="fas fa-building"></i> PEMINJAMAN BUKU OLEH TUTOR
</div>

<?php echo $this->session->flashdata('pesan')?>

  <div class="d-flex justify-content-between mb-3">
      <div class="d-flex m-2">
<?php echo anchor ('administrator/peminjaman/tambah_peminjaman','<button class="btn btn-sm btn-primary mb-2 mr-2"> <i class=
            "fas fa-plus fa-sm"></i> Tambah pinjam </button>') ?>
            
 <a class="btn btn-sm btn-danger mb-2" href="<?php echo base_url('administrator/peminjaman/cetak')?>"> 
 <i class="fa fa-print">Print</i>
</a>
      </div>

        <div class="col-md-4">
            <form action="<?php base_url('peminjaman');?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Data Siswa..." 
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
    <Table class="table table-stripped table-warning table-hover table-bordered">
        <tr>
            <th>NO</th>
            <th>NAMA TUTOR</th>
            <th>TANGGAL PINJAM</th>
            <th>CATATAN</th>
            <th colspan="1">AKSI</th>
        </tr>

          <tbody>
             <?php if(empty($peminjaman)) :?>
            <tr>
                <td colspan="8">
                    <div class="alert alert-danger" role="alert">
                        Data Tidak Ada 

                    </div>
                </td>
            </tr>
            <?php endif ?>

        <?php 
        foreach($peminjaman as $pjm) : ?>

        <tr>
             <td><?= ++$start?></td>
            <td><?= $pjm['nama_tutor']?></td>
            <td><?= $pjm['tgl_pinjam']?></td>
            <td><?= $pjm['catatan']?></td>

            
            <td width="20px"><?php echo anchor('administrator/peminjaman/delete/'.$pjm['id'],
            '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>')  ?> </td>
        </tr>

        <?php  endforeach; ?>
        
    </Table>
     <?= $this->pagination->create_links(); ?>
</div>