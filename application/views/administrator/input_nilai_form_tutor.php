<div class="container-fluid mt-4">
    <div class="alert alert-success " role="alert" >
        <i class="fas fa-university"></i> FORM MASUK HALAMAN INPUT NILAI
    </div>

    <form method="post" action="<?php echo base_url('administrator/nilai_tutor/input_nilai_aksi') ?>">

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
            <select name="kode_matapelajaran" class="form-control">
                <option value="">--Pilih Kode Mata Pelajaran--</option>
                <?php foreach ($matapelajaran as $mapel) : ?>
                    <option value="<?php echo $mapel->kode_matapelajaran ?>"><?php echo $mapel->kode_matapelajaran; ?></option>
                <?php endforeach; ?>
            </select>
            <?php echo form_error('kode_matapelajaran', '<div class="text-danger small ml-3">', '</div>'); ?>
        </div>

    <button type="submit" class="btn btn-primary">Proses</button>

</form>
</div>