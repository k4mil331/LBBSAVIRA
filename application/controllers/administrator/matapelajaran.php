<?php 

class Matapelajaran extends CI_Controller {

    public function index ()
    {
        $this->load->model('matapelajaran_model','matapelajaran');
        $this->load->library('pagination');

        if($this->input->post('submit')){
           $data['keyword']=$this->input->post('keyword');
           $this->session->set_userdata('keyword',$data['keyword']);
        } else {
            $data['keyword'] =null;
        }

        $config['base_url'] ='http://localhost/tugasakhirfiks/administrator/matapelajaran/index';
        $this->db->like('kode_matapelajaran',$data['keyword']);
        $this->db->or_like('nama_matapelajaran',$data['keyword']);
        $this->db->or_like('nama_tutor',$data['keyword']);
        
        $this->db->from('matapelajaran');
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
        $data['matapelajaran'] = $this->matapelajaran->getMatapelajaran($config['per_page'],$data['start'],$data['keyword']);


        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/matapelajaran',$data);
        $this->load->view('template_administrator/footer');
    }

    public function tambah_matapelajaran()
    {
        $data['kelolatutor'] = $this->matapelajaran_model->tampil_data('kelolatutor')->
            result();
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/matapelajaran_form',$data);
        $this->load->view('template_administrator/footer');
        
    }

    public function tambah_matapelajaran_aksi()
    {
    $this-> _rules();
        if($this->form_validation->run() == FALSE)
        {
            $this->tambah_matapelajaran();
        }else {

              $kode_matapelajaran  = $this->input->post('kode_matapelajaran');
        $nama_matapelajaran  = $this->input->post('nama_matapelajaran');

        $existing_mapel = $this->matapelajaran_model->get_mapel_by_kode($kode_matapelajaran);
        $existing_nama_mapel = $this->matapelajaran_model->get_mapel_by_nama($nama_matapelajaran);

        if($existing_mapel) {
            $this->session->set_flashdata('error','<div class="alert alert-danger" role="alert">
               Kode Mapel sudah ada! </div>' );
            redirect('administrator/matapelajaran');
        }

        if($existing_nama_mapel) {
            $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
                Nama Mapel sudah ada! </div>');
            redirect('administrator/matapelajaran');
        }

            $kode_matapelajaran = $this->input->post('kode_matapelajaran');
            $nama_matapelajaran = $this->input->post('nama_matapelajaran');
            $jumlah_jam = $this->input->post('jumlah_jam');
            $nama_tutor = $this->input->post('nama_tutor');

            $data = array (
                'kode_matapelajaran'  => $kode_matapelajaran,
                'nama_matapelajaran'  => $nama_matapelajaran,
                'jumlah_jam'  => $jumlah_jam,
                'nama_tutor'  => $nama_tutor,
            );

            $this->matapelajaran_model->insert_data($data,'matapelajaran');
              $this->session->set_flashdata('pesan','<div class="alert alert-primary" role="alert">
            Data Mata Pelajaran Berhasil Ditambah ! </div>');
        redirect('administrator/matapelajaran');

           
        }
    }
     public function _rules()
    {
        $this->form_validation->set_rules('kode_matapelajaran','kode_matapelajaran','required',[
            'required' => 'kode mata pelajaran wajib diisi!'
    ]);
        $this->form_validation->set_rules('nama_matapelajaran','nama_matapelajaran','required',[
            'required' => 'nama mata pelajaran wajib diisi!'
    ]);
     $this->form_validation->set_rules('jumlah_jam','jumlah_jam','required',[
            'required' => 'jumlah jam pelajaran wajib diisi!'
    ]);
     $this->form_validation->set_rules('nama_tutor','nama_tutor','required',[
            'required' => 'nama tutor pelajaran wajib diisi!'
    ]);
}

public  function update($id)
{
    $where = array('kode_matapelajaran' => $id);

    $data ['matapelajaran'] = $this->db->query("select * from matapelajaran mp, kelolatutor klt 
    where mp.nama_tutor = klt.nama_tutor and mp.kode_matapelajaran='$id'")
      -> result();
      $data['kelolatutor'] = $this->matapelajaran_model->tampil_data('kelolatutor')->result();
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/matapelajaran_update',$data);
        $this->load->view('template_administrator/footer');
}
    public function update_aksi()
 {
     $id = $this->input->post('kode_matapelajaran');
     $kode_matapelajaran = $this->input->post('kode_matapelajaran');
        $nama_matapelajaran = $this->input->post('nama_matapelajaran');
        $jumlah_jam = $this->input->post('jumlah_jam');
        $nama_tutor = $this->input->post('nama_tutor');
        
    
        $data = array(
            'kode_matapelajaran' => $kode_matapelajaran,
            'nama_matapelajaran' => $nama_matapelajaran,
            'jumlah_jam' => $jumlah_jam,
            'nama_tutor' => $nama_tutor,
        );
        $where =array(
            'kode_matapelajaran' => $id 
        );

        $this->matapelajaran_model->update_data($where,$data,'matapelajaran');
        $this->session->set_flashdata('pesan','<div class="alert alert-primary" role="alert">
            Data Mata Pelajaran Berhasil Diupdate ! </div>');
        redirect('administrator/matapelajaran');
}
public function delete($id) {
        $where = array ('kode_matapelajaran' => $id);
        $this->matapelajaran_model->hapus_data($where,'matapelajaran');
         $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
            Data Mata Pelajaran Berhasil Dihapus! </div>');
        redirect('administrator/matapelajaran');
}

}