<?php  

class Nilai_siswa extends CI_Controller{
    public function index()
    {
        $data = array (
            'nis'  =>set_value('nis'),
            'id_thn_ajaran'  =>set_value('id_thn_ajaran'),
        );
         $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar_walmur');
        $this->load->view('administrator/masuk_lhbsiswa',$data);
        $this->load->view('template_administrator/footer');
    }

    public function nilai_aksi()
    
    {
        $this->_rulesLhb();
        if ($this->form_validation->run() == FALSE ){
            $this->index();
        }else {
            $nis = $this->input->post('nis', TRUE);
            $thn_ajaran = $this->input->post('id_thn_ajaran', TRUE);
            
        $query = "SELECT krpp.id_thn_ajaran
                        ,krpp.kode_matapelajaran
                        ,matapelajaran.nama_matapelajaran
                        ,matapelajaran.jumlah_jam
                        ,krpp.nilai
                        FROM 
                        krpp 
                        INNER JOIN matapelajaran 
                        ON (krpp.kode_matapelajaran = matapelajaran.kode_matapelajaran)
                        WHERE krpp.nis =$nis AND krpp.id_thn_ajaran =$thn_ajaran ";

                        $sql = $this->db->query($query)->result();
                        $smt =$this->db->select('tahun_ajaran','semester')
                                        ->from('tahun_ajaran')
                                        ->where(array('id_thn_ajaran'=>$thn_ajaran))->get()->row();

                     
                        $query_str ="SELECT siswa.nis
                                            , siswa.nama_siswa
                                            ,kelolatutor.nama_tutor
                                            ,siswa.program
                                           
                                            FROM
                                            siswa
                                            INNER JOIN kelolatutor
                                            ON (siswa.nama_tutor  =kelolatutor.nama_tutor);";

                        $siswa = $this->db->query($query_str)->row();

         if ($this->siswa_model->get_by_id($nis)== null)
        {
             $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
            Data Siswa Yang Diinput Tidak Ada </div>');
        redirect('administrator/nilai_siswa');
        }
        

        $data = array (
            'siswa_data' =>$sql,
            'siswa_nis' =>$nis,
            'siswa_nama' =>$this->siswa_model->get_by_id($nis)->nama_siswa,
            'siswa_program' =>$this->siswa_model->get_by_id($nis)->program,
            'siswa_nama_tutor' =>$this->siswa_model->get_by_id($nis)->nama_tutor,
            'siswa_nama_unit' =>$this->siswa_model->get_by_id($nis)->nama_unit,
            'semester' =>$this->tahunajaran_model->get_by_id($thn_ajaran)->semester =='Genap'?'Ganjil':'Genap',
             'tahun_ajaran'  => $this->tahunajaran_model->get_by_id($thn_ajaran)
            ->tahun_ajaran,
           
        );
         $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar_walmur');
        $this->load->view('administrator/lhb_siswa',$data);
        $this->load->view('template_administrator/footer');
    }
} 
    public function _rulesLhb()
    {
        $this->form_validation->set_rules('nis','nis','required');
        $this->form_validation->set_rules('id_thn_ajaran','id_thn_ajaran','required');

    }
    public function input_nilai()
    {
        $data = array(
            'kode_matapelajaran'  => set_value('kode_matapelajaran'),
            'id_thn_ajaran'  => set_value('id_thn_ajaran')
        );
         $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/input_nilai_form',$data);
        $this->load->view('template_administrator/footer');
    }

    public function input_nilai_aksi()
    {
        $this->_rulesInputNilai();

        if($this->form_validation->run() == FALSE ) {
            $this->input_nilai();
        }else{
            $kode_matapelajaran =$this->input->post('kode_matapelajaran', TRUE);
            $id_thn_ajaran =$this->input->post('id_thn_ajaran', TRUE);

            $this->db->select('k.id_krpp,k.nis,m.nama_siswa,k.nilai, d.nama_matapelajaran');
            $this->db->from('krpp as k');
            $this->db->join('siswa as m','m.nis =k.nis');
            $this->db->join('matapelajaran as d', 'k.kode_matapelajaran = d.kode_matapelajaran');
            $this->db->where('k.id_thn_ajaran',$id_thn_ajaran);
            $this->db->where('k.kode_matapelajaran',$kode_matapelajaran);
            $query =$this->db->get()->result();

            $data = array (

                'list_nilai'   => $query,
                'kode_matapelajaran'  => $kode_matapelajaran,
                'id_thn_ajaran'  => $id_thn_ajaran
            );
             $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/form_nilai',$data);
        $this->load->view('template_administrator/footer');
        }
    }

    public function _rulesInputNilai()
    {
        $this->form_validation->set_rules('kode_matapelajaran','Kode Mata Pelajaran','required');
        $this->form_validation->set_rules('id_thn_ajaran','Tahun Ajaran','required');
    }

    public function simpan_nilai()
    {
        $query = array ();
        $id_krpp    =$_POST['id_krpp'];
        $nilai    = $_POST['nilai'];
        
        

        for($i=0; $i<sizeof($id_krpp); $i++)
        {
            $this->db->set('nilai',$nilai[$i]) ->where('id_krpp',$id_krpp[$i])->update('krpp');
        }

        $data  = array (
            'id_krpp' => $id_krpp
        );
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/daftar_nilai',$data);
        $this->load->view('template_administrator/footer');

    }

}
