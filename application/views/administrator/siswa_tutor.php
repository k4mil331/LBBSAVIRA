<div class="container-fluid mt-4">
     <div class="alert alert-success" role="alert">
<i class="fas fa-building"></i> Siswa LBB SAVIRA 
</div>

<?php echo $this->session->flashdata('pesan')?>
<div class="row">
        <div class="col-md-4">
            <form action="<?php base_url('siswa_tutor');?>" method="post">
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
    <Table class="table table-stripped table-success table-hover table-bordered">
        <tr>
            <th>NO</th>
            <th>NIS</th>
            <th>NAMA SISWA</th>
            <th>KELAS</th>
            <th>PROGRAM</th>
            <th>NAMA UNIT</th>
            <th colspan="1">AKSI</th>
        </tr>
          <tbody>
             <?php if(empty($siswa)) :?>
            <tr>
                <td colspan="7">
                    <div class="alert alert-danger" role="alert">
                        Data Tidak Ada 

                    </div>
                </td>
            </tr>
            <?php endif ?>

        <?php 
        foreach($siswa as $sws) : ?>

        <tr>
            <td><?= ++$start?></td>
            <td><?= $sws['nis']?></td>
            <td><?= $sws['nama_siswa']?></td>
            <td><?= $sws['kelas']?></td>
            <td><?= $sws['program']?></td>
            <td><?= $sws['nama_unit']?></td>
            
            <td width="20px"><?php echo anchor('administrator/siswa_tutor/detail/'.$sws['id'],
            '<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>')  ?> </td>
        </tr>

        <?php  endforeach; ?>
        
    </Table>

    <?= $this->pagination->create_links(); ?>
</div>