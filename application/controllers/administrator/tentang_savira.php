<?php 

class Tentang_savira extends CI_Controller {

    public function index ()
    {
        $data['tentang'] = $this->tentang_model->tampil_data('tentang_savira')->result();

        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/tentang_savira',$data);
        $this->load->view('template_administrator/footer');
    }


    public function update($id)
    {
        $where = array ('id' => $id);

        $data['tentang'] = $this->tentang_model->edit_data($where,'tentang_savira')->result();
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/tentang_update',$data);
        $this->load->view('template_administrator/footer');
    }

    public function update_aksi()
    {
        $id   = $this->input->post('id');
        $pengertian = $this->input->post('pengertian');
        $visi   = $this->input->post('visi');
        $misi   = $this->input->post('misi');

        $data = array (
            'pengertian'  =>$pengertian,
            'visi'  =>$visi,
            'misi'  =>$misi,
            
        );

        $where = array (
            'id' =>$id
        );

         $this->tentang_model->update_data($where,$data,'tentang_savira');
        $this->session->set_flashdata('pesan','<div class="alert alert-primary" role="alert">
            Data Tentang Savira Berhasil Diupdate ! </div>');
        redirect('administrator/tentang_savira');
    }

    public function hapus($id) {
        $where = array ('id' => $id);
        $this->user_model->hapus_data($where,'user');
         $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
            Data User Berhasil Dihapus! </div>');
        redirect('administrator/user');
}
}