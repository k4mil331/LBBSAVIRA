<?php 

class Peminjaman extends CI_Controller{
    
    public function index()
    {
         $this->load->model('peminjaman_model','peminjaman');
        $this->load->library('pagination');

        if($this->input->post('submit')){
           $data['keyword']=$this->input->post('keyword');
           $this->session->set_userdata('keyword',$data['keyword']);
        } else {
            $data['keyword'] =null;
        }

        $config['base_url'] ='http://localhost/tugasakhirfiks/administrator/peminjaman/index';
        $this->db->like('nama_tutor',$data['keyword']);
        
        $this->db->from('peminjaman');
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
        $data['peminjaman'] = $this->peminjaman->getPeminjaman($config['per_page'],$data['start'],$data['keyword']);

        $data['kelolatutor'] = $this->kelolatutor_model->tampil_data('kelolatutor')->
            result();
      
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar_pemilik');
        $this->load->view('administrator/peminjaman',$data);
        $this->load->view('template_administrator/footer');
    }
      public function tambah_peminjaman()
    {
        $data['kelolatutor'] =$this->peminjaman_model->tampil_data('kelolatutor')->result();
          $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar_pemilik');
        $this->load->view('administrator/tambah_peminjaman',$data);
        $this->load->view('template_administrator/footer');
    }
    
    public function tambah_peminjaman_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->tambah_peminjaman();
        }else{
            $nama_tutor  = $this->input->post('nama_tutor');
            $tgl_pinjam  = $this->input->post('tgl_pinjam');
            $catatan = $this->input->post('catatan');
           
            $data = array(

                'nama_tutor'       =>$nama_tutor,
                'tgl_pinjam'       =>$tgl_pinjam,
                'catatan'       =>$catatan,
            );

            $this->peminjaman_model->insert_data($data,'peminjaman');
            $this->session->set_flashdata('pesan','<div class="alert alert-info" role="alert">
            Data peminjaman Berhasil Ditambah! </div>');
        redirect('administrator/peminjaman');
        }
    }
     public function _rules()
    {
        $this->form_validation->set_rules('nama_tutor','nama_tutor','required' , [
            'required' => 'Nama Tutor Wajib Diisi!'
        ]);

          $this->form_validation->set_rules('tgl_pinjam','tgl_pinjam','required' , [
            'required' => 'tanggal pinjam Wajib Diisi!'
        ]);
          $this->form_validation->set_rules('catatan','catatan','required' , [
            'required' => 'Catatan Wajib Diisi!'
        ]);
    }
       public function delete($id) {
        $where = array ('id' => $id);
        $this->peminjaman_model->hapus_data($where,'peminjaman');
         $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
            Data Peminjaman Berhasil Dihapus! </div>');
        redirect('administrator/peminjaman');
}

public function cetak()
{
        $data['peminjaman'] = $this->peminjaman_model->tampil_data('peminjaman')->result();
        $this->load->view('administrator/print_peminjaman',$data);
}

}