<?php

class Kelolatutor extends CI_Controller {

    public function index()
    {
         $this->load->model('kelolatutor_model','kelolatutor');
        $this->load->library('pagination');

        if($this->input->post('submit')){
           $data['keyword']=$this->input->post('keyword');
           $this->session->set_userdata('keyword',$data['keyword']);
        } else {
            $data['keyword'] =null;
        }

        $config['base_url'] ='http://localhost/tugasakhirfiks/administrator/kelolatutor/index';
        $this->db->like('nama_tutor',$data['keyword']);
        $this->db->or_like('nama_unit',$data['keyword']);
        
        $this->db->from('kelolatutor');
        $config['total_rows'] =$this->db->count_all_results();
        $config['per_page'] =7;
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
        $data['kelolatutor'] = $this->kelolatutor->getKelolatutor($config['per_page'],$data['start'],$data['keyword']);

        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/kelolatutor',$data);
        $this->load->view('template_administrator/footer');
    }

    public function tambah_tutor()
    {
        $data['unit']  = $this->kelolatutor_model->tampil_data('unit')->result();
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/kelolatutor_form',$data);
        $this->load->view('template_administrator/footer');

    }

    public function tambah_tutor_aksi()
    {
        $this-> _rules();
        if($this->form_validation->run() == FALSE)
        {
            $this->tambah_tutor();
        }else {
             $kode_tutor  = $this->input->post('kode_tutor');
        $nama_tutor  = $this->input->post('nama_tutor');

        $existing_tutor = $this->kelolatutor_model->get_tutor_by_kode($kode_tutor);
        $existing_nama_tutor = $this->kelolatutor_model->get_tutor_by_nama($nama_tutor);

        if($existing_tutor) {
            $this->session->set_flashdata('error','<div class="alert alert-danger" role="alert">
               Kode tutor sudah ada! </div>' );
            redirect('administrator/kelolatutor');
        }

        if($existing_nama_tutor) {
            $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
                Nama Tutor sudah ada! </div>');
            redirect('administrator/kelolatutor');
        }
            
            $kode_tutor = $this->input->post('kode_tutor');
            $nama_tutor = $this->input->post('nama_tutor');
            $nama_unit = $this->input->post('nama_unit');
            $catatan = $this->input->post('catatan');
            
            
            $data = array (
                'kode_tutor'  => $kode_tutor,
                'nama_tutor'  => $nama_tutor,
                'nama_unit'  => $nama_unit,
                'catatan'  => $catatan,
            );

            $this->kelolatutor_model->insert_data($data,'kelolatutor');
           $this->session->set_flashdata('pesan','<div class="alert alert-primary" role="alert">
            Data Tutor Berhasil Ditambah ! </div>');
        redirect('administrator/kelolatutor');
        }
    }
     public function _rules()
    {
        $this->form_validation->set_rules('kode_tutor','kode_tutor','required',[
            'required' => 'kode tutor wajib diisi!'
    ]);
        $this->form_validation->set_rules('nama_tutor','nama_tutor','required',[
            'required' => 'nama tutor wajib diisi!'
    ]);
        $this->form_validation->set_rules('nama_unit','nama_unit','required',[
            'required' => 'nama unit wajib diisi!'
    ]);
        $this->form_validation->set_rules('catatan','catatan','required',[
            'required' => 'catatan wajib diisi!'
    ]);
}

public function update($id)
{
    $where = array('id_tutor' => $id);
    $data ['kelolatutor'] = $this->db->query("select * from kelolatutor klt, unit unt where klt.nama_unit=unt.nama_unit and klt.id_tutor='$id'")
      -> result();

      $data['unit'] = $this->kelolatutor_model->tampil_data('unit')->result();
     $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/kelolatutor_update',$data);
        $this->load->view('template_administrator/footer');
}

 public function update_aksi()
 {
        $id = $this->input->post('id_tutor');
        $kode_tutor = $this->input->post('kode_tutor');
        $nama_tutor = $this->input->post('nama_tutor');
        $nama_unit = $this->input->post('nama_unit');
        $catatan = $this->input->post('catatan');
        
    
        $data = array(
            'kode_tutor' => $kode_tutor,
            'nama_tutor' => $nama_tutor,
            'nama_unit' => $nama_unit,
            'catatan' => $catatan,
        );
        $where =array(
            'id_tutor' => $id 
        );

        $this->kelolatutor_model->update_data($where,$data,'kelolatutor');
        $this->session->set_flashdata('pesan','<div class="alert alert-primary" role="alert">
            Data Tutor Berhasil Diupdate ! </div>');
        redirect('administrator/kelolatutor');
 }
 public function delete($id) {
        $where = array ('id_tutor' => $id);
        $this->kelolatutor_model->hapus_data($where,'kelolatutor');
         $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
            Data Tutor Berhasil Dihapus! </div>');
        redirect('administrator/kelolatutor');
}

public function cetak()
{
    $data['kelolatutor'] = $this->kelolatutor_model->tampil_data('kelolatutor')->result();
    $this->load->view('administrator/print_kelolatutor',$data);
}


 
}