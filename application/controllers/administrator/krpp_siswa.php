<?php 

class Krpp_siswa extends CI_Controller {
    public function index()
    {
        $data = array (
            'nis' =>set_value('nis'),
            'id_thn_ajaran' =>set_value('id_thn_ajaran'),
        );
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar_walmur');
        $this->load->view('administrator/masuk_krppsiswa',$data);
        $this->load->view('template_administrator/footer');
    }
    


    public function krpp_aksi()
    {
        $this->_rulesKrpp();

        if ($this->form_validation->run() == FALSE ){
            $this->index();
        }else {
            $nis = $this->input->post('nis', TRUE );
            $thn_ajaran = $this->input->post('id_thn_ajaran', TRUE );
        }

        if ($this->siswa_model->get_by_id($nis)== null)
        {
             $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
            Data Siswa Yang Diinput Tidak Ada </div>');
        redirect('administrator/krpp_siswa');
        }

        $data = array(
            'nis' => $nis,
            'id_thn_ajaran' =>$thn_ajaran,
            'nama_siswa' =>$this->siswa_model->get_by_id($nis)->nama_siswa,
            'program' =>$this->siswa_model->get_by_id($nis)->program
        );

        $dataKrpp =array(
            'krpp_data' => $this->baca_krpp($nis,$thn_ajaran),
            'nis'       => $nis,
            'id_thn_ajaran'  => $thn_ajaran,
            'tahun_ajaran'  => $this->tahunajaran_model->get_by_id($thn_ajaran)
            ->tahun_ajaran,
            'semester'  => $this->tahunajaran_model->get_by_id($thn_ajaran)
            ->semester=='Genap'?'Ganjil':'Genap',
            'nama_siswa'  => $this->siswa_model->get_by_id($nis)->nama_siswa,
             'nama_unit'  => $this->siswa_model->get_by_id($nis)->nama_unit,
             'program'  => $this->siswa_model->get_by_id($nis)->program,
            
        );

         $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar_walmur');
        $this->load->view('administrator/krpp_listsiswa',$dataKrpp);
        $this->load->view('template_administrator/footer');
    }

    public function baca_krpp($nis,$thn_ajaran)
    {
        $this->db->select('k.id_krpp,k.kode_matapelajaran,m.nama_matapelajaran,m.jumlah_jam');
        $this->db->from('krpp as k');
        $this->db->where('k.nis',$nis);
        $this->db->where('k.id_thn_ajaran',$thn_ajaran);
        $this->db->join('matapelajaran as m','m.kode_matapelajaran = k.kode_matapelajaran');

        $krpp =$this->db->get()->result();
        return $krpp;
    }

    public function _rulesKrpp()
    {
        $this->form_validation->set_rules('nis','nis','required');
        $this->form_validation->set_rules('id_thn_ajaran','id_thn_ajaran','required');
    }

  

    public function _rules()
    {
        $this->form_validation->set_rules('id_thn_ajaran','id_thn_ajaran','required');
        $this->form_validation->set_rules('nis','nis','required');
        $this->form_validation->set_rules('kode_matapelajaran','kode_matapelajaran','required');
    }

}