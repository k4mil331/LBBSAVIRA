<div class="container-fluid mt-4">

    <div class="alert alert-success" role="alert">
<i class="fas fa-building"></i>DAFTAR USER
</div>

<?php echo $this->session->flashdata('pesan')?>
<?php echo anchor ('administrator/user/tambah_user','<button class="btn btn-sm btn-primary mb-3"> <i class=
            "fas fa-plus-circle fa-sm"></i> Tambah Users </button>') ?>

<div class="container">
    <div class="table-responsive">
        <table class="table table-bordered table-warning table-hover table-stripped">
            <tr>
                <th>NO</th>
                <th>USERNAME</th>
                <th>EMAIL</th>
                <th>LEVEL</th>
          
                <th colspan="2">AKSI</th>
            </tr>

            <?php 
        $no=1;
        foreach($user as $user) :?>

        <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $user->username ?></td>
            <td><?php echo $user->email ?></td>
            <td><?php echo $user->level ?></td>
          
            <td width="20px"><?php echo anchor('administrator/user/update/'.$user->id,
        '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>')  ?> </td>
        <td width="20px"><?php echo anchor('administrator/user/hapus/'.$user->id,
        '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>')  ?> </td>
        </tr>

        <?php endforeach;?>
        </table>

</div>