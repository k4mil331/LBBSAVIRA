<nav class="navbar bg-body-tertiary bg-white text-dark">
  <div class="container-fluid">
    <?php foreach ($identitas as $id) : ?>
    <a class="navbar-brand"><strong><?php echo $id->judul_website ?></strong></a>
    <span class="small"><strong><?php echo $id->alamat ?> - <?php echo $id->email ?> - <?php echo $id->telp?></span></strong>

    <?php endforeach;?>
  
  </div>
</nav>

<nav class="navbar navbar-expand-lg bg-body-tertiary bg-info text-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="margin-left: 1100px;">
      <div class="navbar-nav mx-auto ">
        <a class="nav-link ml-3" aria-current="page" href="#"><strong>BERANDA</strong></a>
        <a class="nav-link ml-3" href="<?php echo base_url('administrator/auth')  ?>"><strong>LOGIN</strong></a>
     
      </div>
    </div>
  </div>
</nav>

<div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url('assets/img/lbbsavira.jpg') ?>" class="d-block w-100" alt="...">
    </div>
  </div>
</div>



<div class="card text-center m-2">
  <div class="card-header bg-info text-white" style="font-size: 27px;">
    <strong>TENTANG SAVIRA</strong>
  </div>
  <div class="card-body">
    
    <p class="card-text">
      <?php foreach($tentang as $ttg) : ?>

  <?php echo $ttg->pengertian ?>
<?php endforeach; ?>
    </p>
  </div>

   <div class="card-body">
     <div class="card-header bg-info text-white">
    <strong>VISI LBB SAVIRA</strong>
  </div>
    
    <p class="card-text">
      <?php foreach($tentang as $ttg) : ?>

  <?php echo $ttg->visi ?>
<?php endforeach; ?>
    </p>
  </div>
   <div class="card-body">
    <div class="card-header bg-info text-white">
    <strong>MISI LBB SAVIRA</strong>
  </div>
    
    <p class="card-text">
      <?php foreach($tentang as $ttg) : ?>

  <?php echo $ttg->misi ?>
<?php endforeach; ?>
    </p>
  </div>
  
</div>


<div class="card text-center mt-4">
  <div class="card-header bg-info text-white"    style="font-size: 27px;">
    <strong>PROGRAM SAVIRA</strong>
  </div>
</div>
<div class="row m-4">
<?php foreach($informasi as $info): ?>
<div class="card" style="width: 20rem;">
  <span class="display-2 text-center text-info"><i class="<?php  echo $info->icon ?>"></i></span>
  <div class="card-body text-center">
    <h5 class="card-title"><?php  echo $info->judul_informasi ?></h5>
    <p class="card-text"><?php  echo $info->isi_informasi ?></p>
  
  </div>
</div>
<?php endforeach;?>
</div>
     <div class="card text-center mt-4">
        <div class="section-header text-center bg-info text-white"  style="font-size: 27px;">
        <h2 ><strong>TUTOR SAVIRA</strong></h2>
        </div>
        <p class="text-center">Tutor kami merupakan tutor yang kompeten di bidangnya dimana tutor kami juga lulusan dan 
            masih menempuh di Perguruan tinggi tutor kami diantaranya adalah sebagai berikut </p>
      </div>
      <div class="container">

        <div class="row gy-5">

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
            <div class="member-img">
              <img src="assets/img/nabila.jpeg" class="img-fluid" alt="">
            </div>
            <div class="member-info text-center ">
              <h4><strong>KAK NABILA </strong></h4>
             <h5><strong>LULUSAN UMM 2024</strong></h5>
              <p>Merupakan tutor admin sekaligus pengajar mapel khusunya bahasa inggris. Kak Nabila 
                sangat fasih dalam berbicara bahasa inggris
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="200">
            <div class="member-img">
              <img src="assets/img/albara.jpeg" class="img-fluid" alt="">
             
            </div>
            <div class="member-info text-center">
              <h4><strong>KAK ALBARA  </strong></h4>
              <h5><strong>MENEMPUH KULIAH DI UPM</strong></h5>
              <p>Merupakan tutor admin sekaligus pengajar mapel kelas tinggi yaitu SMP khususnya matematika.
                Kak Albara sangat ramah loh orangnya
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="300">
            <div class="member-img">
              <img src="assets/img/yulia.jpeg" class="img-fluid" alt="">
              
            </div>
            <div class="member-info text-center">
              <h4><strong>KAK YULIA</strong></h4>
              <h5><strong>MENEMPUH KULIAH DI UT</strong></h5>
              <p>Merupakan seorang tutor berpengalaman di bidang calistung. mampu mengajar anak sampai bisa 
                membaca, berhitung dan menulis.
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="400">
            <div class="member-img">
              <img src="assets/img/cosim.jpeg" class="img-fluid" alt="">
             
            </div>
            <div class="member-info text-center">
              <h4><strong> KAK KOSIM </strong></h4>
              <h5><strong>LULUSAN POLIJE JEMBER 2022</strong></h5>
              <p>Merupakan tutor PRISMA Kalkulator tangan yang sudah berkompeten di bidangnya 
                lulusan polije jember dengan predikat comlaude.
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="500">
            <div class="member-img">
              <img src="assets/img/maula.jpeg" class="img-fluid" alt="">
              
            </div>
            <div class="member-info text-center">
              <h4><strong>KAK MAULA</strong></h4>
             <h5><strong>LULUSAN TRUNOJOYO MADURA</strong></h5>
              <p>Merupakan tutor suhu yang sekarang juga menagajar di sekolah di Probolinggo
                harapannya ilmu yang didapat di sekolah bisa diimplementasikan di Savira
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="600">
            <div class="member-img">
              <img src="assets/img/salsa.jpeg" class="img-fluid" alt="">
             
            </div>
            <div class="member-info text-center">
            <h4><strong>KAK SALSA</strong></h4>
              <h5><strong>LULUS SMA DAN PONDOKAN</strong></h5>
          <p>Merupakan tutor baca dan tulis yang dikenal karena kesabarannya dan keuletannya dalam mengajar anak
         Kak Salsa juga dikenal pinter bercanda dan mampu mengusir kebosenan anak dalam belajar
                
              </p>
      </div>
       </div>

        </div>

      </div>

    </section>

  </main>

<form method="post" action="<?php echo base_url('hal_depan/kirim_pesan') ?>">

<div class="row  justify-content-center m-4 ">
  <div class="col-md-8">
    <div class="alert alert-primary text-center">
      <i class="fas fa-envelope-open-text "></i> HUBUNGI TERKAIT KRITIK, SARAN DAN PENDAFTARAN SAVIRA
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <div class="form-group">
      <label>Nama</label>
      <input type="text" name="nama" class="form-control">
      <?php  echo form_error('nama','<div class="text-danger small">','</div>') ?>
    </div>

     <div class="form-group">
      <label>Email</label>
      <input type="text" name="email" class="form-control">
      <?php  echo form_error('email','<div class="text-danger small">','</div>') ?>
    </div>

     <div class="form-group">
      <label>Pesan</label>
      <textarea type="text" name="pesan" class="form-control " rows="5"></textarea>
      <?php  echo form_error('pesan','<div class="text-danger small">','</div>') ?>
    </div>

    <button type="submit" class="btn btn-primary">Kirim</button>
  </div>
</div>

</form>


 <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

<footer class="footer mt-auto py-3 bg-dark">
  <div class="container text-center">
    
    <strong><span class="text-white mb-3">SOSIAL MEDIA LBB SAVIRA </span></strong>
    <div class="icon"  style="margin-top: 20px;" >
      <a href="https://www.tiktok.com/@bang._.ahmad?_t=8m9S44Owy85&_r=1"><i class="fa-brands fa-tiktok fa-2x" style="margin-right: 20px;"></i></a>
      <a href="https://wa.me/62895379906042/?text=hello"><i class="fa-brands fa-whatsapp fa-2x" style="margin-right: 20px;"></i></a>
      <a href="https://www.facebook.com/profile.php?id=100018149648830&mibextid=4J2JsaAoA4Cm3TUo"><i class="fab fa-facebook fa-2x"></i></a>
    </div>
    <div class="text"  style="margin-top: 20px;"> 
      <strong><span class="text-white">&copy; 2024 AHMAD NASRUDIN KAMIL</span></strong>
    </div>
  </div>
</footer>


  </html>


