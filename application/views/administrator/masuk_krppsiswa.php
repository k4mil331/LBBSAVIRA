<div class="container-fluid mt-4">
 <div class="alert alert-success" role="alert">
<i class="fas fa-building"></i> FORM MASUK KRPP SISWA 
</div>

<?php echo $this->session->flashdata('pesan')?>

<form method="post" action="<?php echo base_url('administrator/krpp_siswa/krpp_aksi')?>">

<div class="form-group" >
    <label>NIS SISWA</label>
    <input type="text" name="nis" placeholder="masukkan nis siswa" class="form-control" autocomplete="off">
    <?php echo form_error('nis','<div class="text-danger small ml-2">','</div>') ?>
</div>

<div class="form-group">
    <label>Tahun Ajaran / Semester </label>
    <?php 
        $query  = $this->db->query('SELECT id_thn_ajaran,semester,CONCAT(tahun_ajaran,"/")
        AS thn_semester
        FROM tahun_ajaran');

        $dropdowns  = $query->result();
        foreach($dropdowns as $dropdown ){
            if($dropdown->semester == 'Genap' ){
                $tampilSemester ="Ganjil";
            }else{
                $tampilSemester ="Genap";
            }
            $dropDownList[$dropdown->id_thn_ajaran] =$dropdown ->thn_semester ." " .$tampilSemester ;      
        }

        echo form_dropdown('id_thn_ajaran',$dropDownList,'','class="form-control" id="id_thn_ajaran"');
    ?>
</div>
<button type="submit" class="btn btn-primary">Proses</button>
</form>
</div>