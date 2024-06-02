<?php 

class Matapelajaran_tutor extends CI_Controller {

    public function index ()
    {
        $data['matapelajaran'] = $this->matapelajaran_model->tampil_data('matapelajaran')->result();

        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar_tutor');
        $this->load->view('administrator/matapelajaran_tutor',$data);
        $this->load->view('template_administrator/footer');
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
public function delete($id) {
        $where = array ('kode_matapelajaran' => $id);
        $this->matapelajaran_model->hapus_data($where,'matapelajaran');
         $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
            Data Mata Pelajaran Berhasil Dihapus! </div>');
        redirect('administrator/matapelajaran');
}

}