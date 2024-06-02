<?php 

$nilai = get_instance();
$nilai->load->model('matapelajaran_model');
$nilai->load->model('tahunajaran_model');
?>

<div class="container-fluid mt-4">

    <?php 
        if($list_nilai ==null)
        {
            $thn = $nilai->tahunajaran_model->get_by_id($id_thn_ajaran);
            $semester = $thn->semester == 1;

            if($semester == 1)
            {
                $tampilSemester = "Ganjil";
            }else {
                $tampilSemester = "Genap";
            }

       
    ?>

    <div class="alert alert-danger">
   KODE MAPEL TIDAK MEMILIKI DATA SISWA <strong> TAMBAHKAN DATA SISWA </strong> 
    </div>

    <?php echo anchor('administrator/nilai_tutor/input_nilai','<div class="btn btn-danger">Kembali</div>')?>

    <?php 
 }else{

    ?>
    
    <center>
        <legend><strong>MASUKKAN NILAI AKHR</strong></legend>
        <table>
            <tr>
                <td>Kode Mata Pelajaran</td>
                <td>: <?php echo $kode_matapelajaran; ?></td>
            </tr>

             <tr>
                <td>Nama Mata Pelajaran</td>
                <td>: <?php echo $nilai->matapelajaran_model->get_by_id($kode_matapelajaran)
                ->nama_matapelajaran; ?></td>
            </tr>

              <tr>
                <td>Jumlah Jam</td>
                <td>: <?php echo $nilai->matapelajaran_model->get_by_id($kode_matapelajaran)
                ->jumlah_jam; ?></td>
            </tr>
                <?php 
                $thn = $nilai->tahunajaran_model->get_by_id($id_thn_ajaran);
                $semester =$thn->semester == 1;
                
            if($semester == 1)
            {
                $tampilSemester = "Ganjil";
            }else {
                $tampilSemester = "Genap";
            }


                ?>

            <tr>
                <td>
                    Tahun Ajaran (Semester)
                    <td>: <?php echo $thn->tahun_ajaran ."(". $tampilSemester .")"?></td>
                </td>
            </tr>
        </table>
    </center>

    <form method="post" action="<?php echo base_url('administrator/nilai_tutor/simpan_nilai'); ?>">

    <table class="table table-stripped table-info table-hover table-bordered mt-4">
        <tr>
            <td width="25px">NO </td>
            <td>NIS </td>
            <td>NAMA SISWA</td>
            <td>NILAI</td>
        </tr>
        <?php 
        $no = 1;
        foreach($list_nilai as $row ) : ?>
    
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row->nis; ?></td>
                <td><?php echo $row->nama_siswa; ?></td>
                <input type="hidden" name="id_krpp[]" value="<?php echo $row->id_krpp;?>">
                <td width ="90px"><input type="text" name="nilai[]" class="form-control" value="<?php echo $row->nilai; ?>"</td>
            </tr>
    <?php endforeach;  ?>
    </table>

    <button type="submit" class="btn btn-primary">Simpan</button>

    </form>

    <?php }?>
</div>