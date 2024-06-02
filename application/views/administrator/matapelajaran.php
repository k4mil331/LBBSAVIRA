<div class="container-fluid mt-4">
    <div class="alert alert-success" role="alert">
<i class="fas fa-building"></i> MATA PELAJARAN LBB SAVIRA 
</div>
<?php if ($this->session->flashdata('error')): ?>
        <?= $this->session->flashdata('error') ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('pesan')): ?>
        <?= $this->session->flashdata('pesan') ?>
    <?php endif; ?>
    <div class="d-flex justify-content-between mb-3">
<?php echo anchor ('administrator/matapelajaran/tambah_matapelajaran','<button class="btn btn-sm btn-primary mb-3"> <i class=
            "fas fa-plus-circle fa-sm"></i> Tambah Mata Pelajaran </button>') ?>

        <div class="col-md-4">
            <form action="<?php base_url('matapelajaran');?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Data Mata Pelajaran..." 
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
 <table class="table table-bordered  table-primary table-hover table-striped">

     <tr>
        <th>NO</th>
        <th>KODE MATA PELAJARAN</th>
        <th>NAMA MATA PELAJARAN </th>
        <th>JUMLAH JAM</th>
        <th>TUTOR HANDLE</th>
        <th colspan="2">AKSI</th>
     </tr>
      <tbody>
             <?php if(empty($matapelajaran)) :?>
            <tr>
                <td colspan="8">
                    <div class="alert alert-danger" role="alert">
                        Data Tidak Ada 

                    </div>
                </td>
            </tr>
             
            <?php endif ?>
     <?php 
     $no=1;
     foreach($matapelajaran as $mp ) : ?>
        <tr>
              <td><?= ++$start?></td>
            <td><?= $mp['kode_matapelajaran']?></td>
            <td><?= $mp['nama_matapelajaran']?></td>
            <td><?= $mp['jumlah_jam']?></td>
            <td><?= $mp['nama_tutor']?></td>
           
             <td width="20px"><?php echo anchor('administrator/matapelajaran/update/'.$mp['kode_matapelajaran'],
        '<div class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt fa-sm"></i></div>')  ?> </td>
        <td width="20px"><?php echo anchor('administrator/matapelajaran/delete/'.$mp['kode_matapelajaran'],
        '<div class="btn btn-sm btn-danger"><i class="fas fa-trash-alt fa-sm"></i></div>')  ?> </td>
        </tr>

     <?php  endforeach;?>
 </table>
 <?= $this->pagination->create_links(); ?>
</div>