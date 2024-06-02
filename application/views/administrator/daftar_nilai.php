<?php 

$nilai = get_instance();
$nilai->load->model('krpp_model');
$nilai->load->model('siswa_model');
$nilai->load->model('matapelajaran_model');
$nilai->load->model('tahunajaran_model');

$krpp = $nilai->krpp_model->get_by_id($id_krpp[0]);
$kode_matapelajaran = $krpp->kode_matapelajaran;
$id_thn_ajaran = $krpp->id_thn_ajaran;
?>

<div class="container-fluid mt-4">
    <div class="alert alert-success">
        <i class="fas fa-university"></i> DAFTAR NILAI SISWA
    </div>
    <center>
        <legend><strong>DAFTAR NILAI SISWA</strong></legend>
        <table>
                <tr>
                    <td>Kode Mata Pelajaran</td>
                    <td>: <?php echo $kode_matapelajaran; ?></td>
                </tr>

                <tr>
                    <td>Nama Mata Pelajaran</td>
                      <td>: <?php echo $nilai->matapelajaran_model->get_by_id($kode_matapelajaran)->nama_matapelajaran; ?></td>
                </tr>

                <tr>
                    <td>Jumlah Jam</td>
                    <td>: <?php echo $nilai->matapelajaran_model->get_by_id($kode_matapelajaran)->jumlah_jam; ?></td>
                </tr>
                <?php 
                    
                    $thn = $nilai->tahunajaran_model->get_by_id($id_thn_ajaran);
                    $semester = $thn->id_thn_ajaran == 1;

                    if($semester){
                        $tampilSemester = "Ganjil";
                    }else {
                        $tampilSemester = "Genap";
                    }
                    ?>

                <tr>

                <td>
                    Tahun Ajaran (Semester)
                </td>
                    <td>
                        : <?php echo $thn->tahun_ajaran."(".$tampilSemester.")" ?>
                    </td>
                </tr>
        </table>
    </center>

    <table class="table table-hover table-success  table-stripped table-bordered">
                    <tr>
                        <td>NO</td>
                        <td>NIS</td>
                        <td>NIS</td>
                        <td>NILAI</td>
                    </tr>

                    <?php 
            $no= 1;
            for($i=0; $i<sizeof($id_krpp); $i++)
            {
            ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <?php  $nis=$nilai->krpp_model->get_by_id($id_krpp[$i])->nis; ?>
                <td><?php echo $nis; ?></td>
                <td><?php echo $nilai->siswa_model->get_by_id($nis)->nama_siswa ?></td>
                <td><?php echo $nilai->krpp_model->get_by_id($id_krpp[$i])->nilai ?></td>
              
            </tr>

            <?php } ?>
        </table>
        <?php echo anchor('administrator/nilai_tutor/input_nilai_aksi','<div class="btn btn-danger mt-3 ">Kembali</div>') ?>
</div>