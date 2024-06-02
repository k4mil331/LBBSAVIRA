<?php 

class Presensi extends CI_Controller {

    public function index()
    {

        $this->load->model('presensi_model','presensi');
        $this->load->library('pagination');

        if($this->input->post('submit')){
           $data['keyword']=$this->input->post('keyword');
           $this->session->set_userdata('keyword',$data['keyword']);
        } else {
            $data['keyword'] =null;
        }

        $config['base_url'] ='http://localhost/tugasakhirfiks/administrator/presensi/index';
        $this->db->like('nama_siswa',$data['keyword']);
        $this->db->or_like('tgl',$data['keyword']);
        $this->db->or_like('nama_unit',$data['keyword']);

            $this->db->from('presensi');
        $config['total_rows'] =$this->db->count_all_results();
        $config['per_page'] =10;
        $config['num_link'] =5;

        $config['full_tag_open'] ='<nav> <ul class="pagination justify-content-center">';
        $config['full_tag_close'] ='</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] ='&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] ='&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class ="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item ">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);
        
        $data['start'] =$this->uri->segment(4);
        $data['presensi'] = $this->presensi->getPresensi($config['per_page'],$data['start'],$data['keyword']);

        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar_tutor');
        $this->load->view('administrator/presensi',$data);
        $this->load->view('template_administrator/footer');
    }

    

    public function detail($id)
    {
          $data['presensi']  = $this->presensi_model->tampil_data('presensi')->result();
        $data['detail']  = $this->presensi_model->ambil_id_siswa ($id);
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar_tutor');
        $this->load->view('administrator/presensi_detail',$data);
        $this->load->view('template_administrator/footer');
    }

      public function tambah_presensi_siswa()
    {
        $data['siswa'] =$this->presensi_model->tampil_data('siswa')->result();
         $data['unit'] =$this->presensi_model->tampil_data('unit')->result();
          $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar_tutor');
        $this->load->view('administrator/tambah_presensi_siswa',$data);
        $this->load->view('template_administrator/footer');
    }

      public function tambah_presensi_siswa_aksi()
    {
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->tambah_presensi_siswa();
        }else{
           
            $nama_siswa  = $this->input->post('nama_siswa');
            $nama_unit  = $this->input->post('nama_unit');
            $tgl  = $this->input->post('tgl');
            $jam_msk  = $this->input->post('jam_msk');
            $jam_klr  = $this->input->post('jam_klr');
            $ket  = $this->input->post('ket');
           
            $data = array(
                'nama_siswa'       =>$nama_siswa,
                'nama_unit'       =>$nama_unit,
                'tgl'       =>$tgl,
                'jam_msk'       =>$jam_msk,
                'jam_klr'       =>$jam_klr,
                'ket'       =>$ket,
                
            );

            $this->presensi_model->insert_data($data,'presensi');
            $this->session->set_flashdata('pesan','<div class="alert alert-info" role="alert">
            Data Siswa Presensi Berhasil Ditambah! </div>');
        redirect('administrator/presensi');
        }
    }

     public function _rules()
    {
        $this->form_validation->set_rules('nama_siswa','nama_siswa','required' , [
            'required' => 'nama siswa Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('nama_unit','nama_unit','required' , [
            'required' => 'nama unit Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('tgl','tgl','required' , [
            'required' => 'tanggal Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('jam_msk','jam_msk','required' , [
            'required' => 'jam masuk Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('jam_klr','jam_klr','required' , [
            'required' => 'keluar Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('ket','ket','required' , [
            'required' => 'keterangan Wajib Diisi!'
        ]);

    }
    public function delete($id) {
        $where = array ('id' => $id);
        $this->siswa_model->hapus_data($where,'presensi');
         $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
            Data Siswa Berhasil Dihapus! </div>');
        redirect('administrator/presensi');
}

 public function form_cetak_presensi() {
        $data['unit'] =$this->presensi_model->tampil_data('unit')->result();
         $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar_tutor');
        $this->load->view('administrator/form_cetak_presensi');
        $this->load->view('template_administrator/footer');
    }

    public function cetak_presensi() {
        $tgl = $this->input->get('tgl');
        
        if (empty($tgl)) {
            redirect('administrator/presensi/form_cetak_presensi');
        }
        $data['presensi'] = $this->presensi_model->get_presensi_by_date($tgl);

        $this->load->view('administrator/cetak_presensi', $data);
    }

    public function update($id)
{
    $data['presensi'] = $this->db->query("
        SELECT prs.*, unt.nama_unit, sws.nama_siswa 
        FROM presensi prs
        JOIN unit unt ON prs.nama_unit = unt.nama_unit
        JOIN siswa sws ON prs.nama_siswa = sws.nama_siswa
        WHERE prs.id = '$id'
    ")->result();

    $data['unit'] = $this->siswa_model->tampil_data('unit')->result();
    $data['siswa'] = $this->siswa_model->tampil_data('siswa')->result();
    $data['detail'] = $this->presensi_model->ambil_id_siswa($id);

    $this->load->view('template_administrator/header');
    $this->load->view('template_administrator/sidebar_tutor');
    $this->load->view('administrator/presensi_update', $data);
    $this->load->view('template_administrator/footer');
}

    public function update_presensi_aksi()
{
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
        $id = $this->input->post('id');
        $this->update($id);
    } else {
        $id = $this->input->post('id');
        $nama_siswa = $this->input->post('nama_siswa');
        $nama_unit = $this->input->post('nama_unit');
        $tgl = $this->input->post('tgl');
        $jam_msk = $this->input->post('jam_msk');
        $jam_klr = $this->input->post('jam_klr');
        $ket = $this->input->post('ket');

        $data = array(
            'nama_siswa' => $nama_siswa,
            'nama_unit' => $nama_unit,
            'tgl' => $tgl,
            'jam_msk' => $jam_msk,
            'jam_klr' => $jam_klr,
            'ket' => $ket,
        );

        $where = array('id' => $id);

        $this->presensi_model->update_data($where, $data, 'presensi');

        $this->session->set_flashdata('pesan', '<div class="alert alert-info" role="alert">Data presensi Berhasil Diupdate!</div>');
        redirect('administrator/presensi');
    }
        }
    
        
        
}