<?php 

class Presensi_admin extends CI_Controller {

    public function index()
    {
         $this->load->model('unit_model'); 
        $this->load->model('presensi_model','presensi');
        $this->load->library('pagination');

        if($this->input->post('submit')){
           $data['keyword']=$this->input->post('keyword');
           $this->session->set_userdata('keyword',$data['keyword']);
        } else {
            $data['keyword'] =null;
        }

        $config['base_url'] ='http://localhost/tugasakhirfiks/administrator/presensi_admin/index';
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
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/presensi_admin',$data);
        $this->load->view('template_administrator/footer');
    }

    public function detail($id)
    {
          $data['presensi']  = $this->presensi_model->tampil_data('presensi')->result();
        $data['detail']  = $this->presensi_model->ambil_id_siswa ($id);
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/presensi_detail_admin',$data);
        $this->load->view('template_administrator/footer');
    }

    public function delete($id) {
        $where = array ('id' => $id);
        $this->siswa_model->hapus_data($where,'presensi');
         $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
            Data Siswa Berhasil Dihapus! </div>');
        redirect('administrator/presensi_admin');
}
    public function __construct() {
        parent::__construct();
        $this->load->model('presensi_model');
        $this->load->model('unit_model'); 
    }

    public function form_cetak_presensi() {
    $data['units'] = $this->unit_model->get_all_units();
    
    $this->load->view('template_administrator/header');
    $this->load->view('template_administrator/sidebar');
    $this->load->view('administrator/form_cetak_presensi', $data);
    $this->load->view('template_administrator/footer');
}

public function cetak_presensi() {
    $bulan = $this->input->get('bulan');
    $unit = $this->input->get('nama_unit');

     if (empty($bulan)) {
        $this->session->set_flashdata('error', 'Bulan Wajib Diisi !!!');
        redirect('administrator/presensi_admin/form_cetak_presensi');
    }
    
    $tahun = date('Y', strtotime($bulan));
    $bulan = date('m', strtotime($bulan));

    $data['presensi'] = $this->presensi_model->get_presensi_by_month_and_unit($tahun, $bulan, $unit);
    
    $this->load->view('administrator/cetak_presensi', $data);
}
}