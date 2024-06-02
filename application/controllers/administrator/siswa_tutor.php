<?php 

class Siswa_tutor extends CI_Controller {

    public function index()
    {

         $this->load->model('siswa_model','siswa');
        $this->load->library('pagination');

        if($this->input->post('submit')){
           $data['keyword']=$this->input->post('keyword');
           $this->session->set_userdata('keyword',$data['keyword']);
        } else {
            $data['keyword'] =null;
        }

        $config['base_url'] ='http://localhost/tugasakhirfiks/administrator/siswa_tutor/index';
        $this->db->like('nama_siswa',$data['keyword']);
        $this->db->or_like('program',$data['keyword']);
        $this->db->or_like('nama_unit',$data['keyword']);
        
        $this->db->from('siswa');
        $config['total_rows'] =$this->db->count_all_results();
        $config['per_page'] =6;
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
        $data['siswa'] = $this->siswa->getSiswa($config['per_page'],$data['start'],$data['keyword']);
       
         $data['unit']  = $this->kelolatutor_model->tampil_data('unit')->result();
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar_tutor');
        $this->load->view('administrator/siswa_tutor',$data);
        $this->load->view('template_administrator/footer');
    }

    public function detail($id)
    {
         $data['detail']  = $this->siswa_model->ambil_id_siswa ($id);
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar_tutor');
        $this->load->view('administrator/siswa_tutor_detail',$data);
        $this->load->view('template_administrator/footer');
    }

  

    public function delete($id) {
        $where = array ('id' => $id);
        $this->siswa_model->hapus_data($where,'siswa');
         $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
            Data Siswa Berhasil Dihapus! </div>');
        redirect('administrator/siswa_tutor');
}



}