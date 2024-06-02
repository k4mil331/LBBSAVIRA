<div class="container-fluid mt-4">
    <div class="alert alert-success " role="alert" >
        <i class="fas fa-university"></i> FORM MASUK HALAMAN INPUT NILAI
    </div>

    <form method="post" action="<?php echo base_url('administrator/nilai/input_nilai_aksi') ?>">

    <div class="form-group">
        <label>Tahun Ajaran (Semester)</label>
        <?php 
        $query =$this->db->query('SELECT id_thn_ajaran, semester, CONCAT (tahun_ajaran,"/") AS 
        ta_semester FROM tahun_ajaran');

        $dropdowns = $query->result();
        
        foreach($dropdowns as $dropdown)
        {
            if($dropdown->semester =='Genap')
            {
                $tampilSemester ="Ganjil";
            }else {
                $tampilSemester ="Genap";
            }

            $dropDownList[$dropdown->id_thn_ajaran] =$dropdown->ta_semester ." ".$tampilSemester;
        }

        echo form_dropdown('id_thn_ajaran', $dropDownList, '','class="form-control"')

        ?>
    </div>

    <div class="form-group">
        <label>Kode Mata Pelajaran</label>
        <input type="text" name="kode_matapelajaran" autocomplete="off" class="form-control" placeholder="Masukkan Kode Mata Pelajaran">
    </div>

    <button type="submit" class="btn btn-primary">Proses</button>

</form>
</div>