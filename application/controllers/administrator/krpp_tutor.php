<?php 

class Krpp_tutor extends CI_Controller {
    public function index()
    {
        $data = array (
            'nis' =>set_value('nis'),
            'id_thn_ajaran' =>set_value('id_thn_ajaran'),
        );
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar_tutor');
        $this->load->view('administrator/masuk_krpp_tutor',$data);
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
        redirect('administrator/krpp_tutor');
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
        $this->load->view('template_administrator/sidebar_tutor');
        $this->load->view('administrator/krpp_list_tutor',$dataKrpp);
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

    public function tambah_krpp($nis,$thn_ajaran)
    {
        $data = array (
            'id_krpp'  =>set_value('id_krpp'),
            'id_thn_ajaran'  => $thn_ajaran,
            'thn_ajaran_smt'  => $this->tahunajaran_model->
            get_by_id($thn_ajaran)->tahun_ajaran,
             'semester'  => $this->tahunajaran_model->get_by_id($thn_ajaran)
            ->semester=='Genap'?'Ganjil':'Genap',
            
            'nis'   => $nis,
            'kode_matapelajaran'   => set_value('kode_matapelajaran')
        );

         $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/krpp_form',$data);
        $this->load->view('template_administrator/footer');
    }

    public function tambah_krpp_aksi()
    {
        $this->_rules();
        if($this->form_validation->run() == FALSE ) {
            $this->tambah_krpp($this->input->post('nis',TRUE),
            $this->input->post('id_thn_ajaran', TRUE ));

        }else {
            $nis  = $this->input->post('nis',TRUE);
            $id_thn_ajaran  = $this->input->post('id_thn_ajaran',TRUE);
            $kode_matapelajaran  = $this->input->post('kode_matapelajaran',TRUE);

            $data = array (
                'id_thn_ajaran'   => $id_thn_ajaran,
                'nis'   => $nis,
                'kode_matapelajaran'   => $kode_matapelajaran,
                
            );

            $this->krpp_model->insert($data);
             $this->session->set_flashdata('pesan','<div class="alert alert-info" role="alert">
            Data KRPP Berhasil Ditambahkan </div>');
            redirect('administrator/krpp/index');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_thn_ajaran','id_thn_ajaran','required');
        $this->form_validation->set_rules('nis','nis','required');
        $this->form_validation->set_rules('kode_matapelajaran','kode_matapelajaran','required');
    }

    public function update($id)
    {
        $row = $this->krpp_model->get_by_id($id);
        $th = $row->id_thn_ajaran;

        if($row){
            $data =array (

                'id_krpp'   =>set_value('id_krpp', $row->id_krpp),
                'id_thn_ajaran'   =>set_value('id_thn_ajaran', $row->id_thn_ajaran),
                'nis'   =>set_value('nis', $row->nis),
                'kode_matapelajaran'   =>set_value('kode_matapelajaran', $row->kode_matapelajaran),
                'thn_ajaran_smt'   =>$this->tahunajaran_model->get_by_id($th)->tahun_ajaran,
                'semester'   =>$this->tahunajaran_model->get_by_id($th)->semester=='Genap'?'Ganjil':'Genap',
            );
             $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/krpp_update',$data);
        $this->load->view('template_administrator/footer');
        }else {
            echo "Data Tidak Ada !";
        }
    }
    public function update_aksi()
    {
        $id_krpp= $this->input->post('id_krpp', TRUE);
        $nis= $this->input->post('nis', TRUE);
        $id_thn_ajaran= $this->input->post('id_thn_ajaran', TRUE);
        $kode_matapelajaran= $this->input->post('kode_matapelajaran', TRUE);

        $data = array (
            'id_krpp'  =>$id_krpp,
            'id_thn_ajaran'  =>$id_thn_ajaran,
            'nis'  =>$nis,
            'kode_matapelajaran'  =>$this->input->post('kode_matapelajaran',TRUE)
        );

        $this->krpp_model->update($id_krpp,$data);
          $this->session->set_flashdata('pesan','<div class="alert alert-info" role="alert">
            Data KRPP Berhasil Diupdate </div>');
            redirect('administrator/krpp/index');
            
    }public function delete($id) {
        $where = array ('id_krpp' => $id);
        $this->krpp_model->hapus_data($where,'krpp');
         $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
            Data krpp Berhasil Dihapus! </div>');
        redirect('administrator/krpp/index');
}

    public function cetak()
    {
        $data['krpp'] = $this->krpp_model->tampil_data("krpp")->result();
        $this->load->view('administrator/print_krpp', $data);
    }
   
}