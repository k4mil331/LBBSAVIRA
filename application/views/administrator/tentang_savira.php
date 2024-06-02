<div class="container-fluid mt-4">

    <div class="alert alert-success" role="alert">
<i class="fas fa-building"></i>TENTANG SAVIRA
</div>

<?php echo $this->session->flashdata('pesan')?>

<div class="container">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-info table-stripped">
            <tr>
                <th>NO</th>
                <th>PENGERTIAN</th>
                <th>VISI</th>
                <th>MISI</th>
                <th>AKSI</th>
            </tr>

            <?php 
        $no=1;
        foreach($tentang as  $ttg) :?>

        <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $ttg->pengertian ?></td>
            <td><?php echo $ttg->visi ?></td>
            <td><?php echo $ttg->misi ?></td>
            
            <td width="20px"><?php echo anchor('administrator/tentang_savira/update/'.$ttg->id,
        '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>')  ?> </td>
        </tr>

        <?php endforeach;?>
        </table>

</div>