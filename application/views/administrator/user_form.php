<div class="container-fluid mt-4">
 <div class="alert alert-success" role="alert">
<i class="fas fa-building"></i>FORM TAMBAH USERS
</div>

<form method="post" action="<?php echo base_url('administrator/user/tambah_user_aksi')?>">
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" placeholder="masukkan Username" autocomplete="off" class="form-control">
        <?php echo form_error('username','<div class="text-danger small" ml-3>') ?>
    </div>
    
 
 <div class="form-group">
        <label>Password</label>
        <input type="text" name="password" placeholder="masukkan Password" autocomplete="off" class="form-control">
        <?php echo form_error('password','<div class="text-danger small" ml-3>') ?>
    </div>

        <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" placeholder="masukkan Email" autocomplete="off" class="form-control">
        <?php echo form_error('email','<div class="text-danger small" ml-3>') ?>
    </div>  

    <div class="form-group">
        <label>Level</label>
       <select name="level" class="form-control">
       <?php 
        if($level == 'admin'){
        ?>
        <option value="admin" selected>Admin</option>
        <option value="user">User</option>
        <option value="pemilik">Pemilik</option>
        <option value="tutor">Tutor</option>


        <?php
        }elseif($level == 'user'){
        ?>
        <option value="admin">Admin</option>
        <option value="user" selected>User</option>
        <option value="pemilik">Pemilik</option>
        <option value="tutor">Tutor</option>

         <?php
        }elseif($level == 'pemilik'){
        ?>
        <option value="admin">Admin</option>
        <option value="user" >User</option>
        <option value="pemilik " selected>Pemilik</option>
        <option value="tutor">Tutor</option>

         <?php
        }elseif($level == 'tutor'){
        ?>
        <option value="admin">Admin</option>
        <option value="user" >User</option>
        <option value="pemilik ">Pemilik</option>
        <option value="tutor"  selected>Tutor</option>

        <?php 
        }else{
        ?>
        <option value="admin">Admin</option>
        <option value="user" >User</option>
        <option value="pemilik" >Pemilik</option>
        <option value="tutor" >Tutor</option>

            <?php } ?>
</select>
        <?php echo form_error('level','<div class="text-danger small" ml-3>') ?>
    </div>


   
    <?php echo anchor('administrator/user','<div class="btn btn-danger mt-3">Kembali</div>') ?>
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>

</div>