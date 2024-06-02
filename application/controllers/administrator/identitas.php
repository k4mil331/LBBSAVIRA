<?php 

class Identitas extends CI_Controller {

    public function index ()
    {
        $data['identitas'] = $this->identitas_model->tampil_data('identitas')->result();

        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/identitas',$data);
        $this->load->view('template_administrator/footer');
    }

    public function update($id)
    {
        $where = array ('id_identitas' => $id);

        $data['identitas'] = $this->identitas_model->edit_data($where,'identitas')->result();
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/identitas_update',$data);
        $this->load->view('template_administrator/footer');
    }

    public function update_aksi()
    {
        $id   = $this->input->post('id_identitas');
        $judul_website = $this->input->post('judul_website');
        $alamat   = $this->input->post('alamat');
        $telp   = $this->input->post('telp');
        $level   = $this->input->post('level');
        $email   = $this->input->post('email');

        $data = array (
            'judul_website'  =>$judul_website,
            'alamat'  =>$alamat,
            'email'  =>$email,
            'telp'  =>$telp,
            
        );

        $where = array (
            'id_identitas' =>$id
        );

         $this->identitas_model->update_data($where,$data,'identitas');
        $this->session->set_flashdata('pesan','<div class="alert alert-primary" role="alert">
            Data Identitas Berhasil Diupdate ! </div>');
        redirect('administrator/identitas');
    }

    public function hapus($id) {
        $where = array ('id' => $id);
        $this->user_model->hapus_data($where,'user');
         $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
            Data User Berhasil Dihapus! </div>');
        redirect('administrator/user');
}
}