<div class="container-fluid mt-4">
     <div class="alert alert-success" role="alert">
<i class="fas fa-building"></i> Siswa LBB SAVIRA 
</div>
   <?php if ($this->session->flashdata('error')): ?>
        <?= $this->session->flashdata('error') ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('pesan')): ?>
        <?= $this->session->flashdata('pesan') ?>
    <?php endif; ?>
    
    <div class="d-flex justify-content-between mb-3">
      <div class="d-flex m-2">

<?php echo anchor ('administrator/siswa/tambah_siswa','<button class="btn btn-sm btn-primary mb-2 mr-2"> <i class=
            "fas fa-plus-circle fa-sm"></i> Tambah Siswa </button>') ?>

 <a class="btn btn-sm btn-info mb-2" href="<?php echo base_url('administrator/siswa/cetak')?>"> 
 <i class="fa fa-print">Print</i>
</a>

      </div>
        <div class="col-md-4">
            <form action="<?php base_url('siswa');?>" method="post">
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
    <Table class="table table-stripped table-success table-hover table-bordered"  >
        <thead>
        <tr>
            <th>NO</th>
            <th>NIS</th>
            <th>NAMA SISWA</th>
            <th>KELAS</th>
            <th>PROGRAM</th>
            <th colspan="3">AKSI</th>
        </tr>
        </thead>
        <tbody>
             <?php if(empty($siswa)) :?>
            <tr>
                <td colspan="6">
                    <div class="alert alert-danger" role="alert">
                        Data Tidak Ada 

                    </div>
                </td>
            </tr>
            <?php endif ?>

        <?php  foreach($siswa as $sws) : ?>

        <tr>
           <td><?= ++$start?></td>
            <td><?= $sws['nis']?></td>
            <td><?= $sws['nama_siswa']?></td>
            <td><?= $sws['kelas']?></td>
            <td><?= $sws['program']?></td>

            <td width="20px"><?php echo anchor('administrator/siswa/detail/'.$sws['id'],
            '<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>')  ?> </td>
            <td width="20px"><?php echo anchor('administrator/siswa/update/'.$sws['id'],
            '<div class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt fa-sm"></i></div>')  ?> </td>
            <td width="20px"><?php echo anchor('administrator/siswa/delete/'.$sws['id'],
            '<div class="btn btn-sm btn-danger"><i class="fas fa-trash-alt fa-sm"></i></div>')  ?> </td>
        </tr>

        <?php  endforeach; ?>
        
    </Table>
     <?= $this->pagination->create_links(); ?>

    </div>
</div>

</div>