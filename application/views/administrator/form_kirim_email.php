<div class="container-fluid">

<div class="alert alert-success">
    <i class="fas fa-comment-dots"></i> FORM BALAS PESAN
</div>

<?php foreach($hubungi as $hub): ?>

    <form method="post" action="<?php echo base_url('administrator/hubungi_kami/kirim_email_aksi') ?>">

    <div class="form-group">
        <label>Email</label>
        <input type="hidden" name="id_hubungi"  value="<?php echo $hub->id_hubungi ?>">
        <input type="text" name="email" class="form-control" autocomplete="off" value="<?php echo $hub->email ?>" readonly>
    </div>

    <div class="form-group">
        <label>Subjek</label>

        <input type="text" autocomplete="off" name="subjek" class="form-control" >
    </div>

    <div class="form-group">
        <label>Pesan</label>
       <textarea type="text" name="pesan" class="form-control"  rows="5"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Kirim</button>

</form>

    <?php endforeach; ?>
</div>