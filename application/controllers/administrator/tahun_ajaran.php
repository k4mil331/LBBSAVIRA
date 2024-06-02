<?php 

class Tahun_ajaran extends CI_Controller{

    public function index()
    {
        $data['tahun_ajaran'] = $this->tahunajaran_model->tampil_data('tahun_ajaran') ->result();
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/tahun_ajaran',$data);
        $this->load->view('template_administrator/footer');
    }


    public function tambah_tahun_ajaran()
    { 
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/tahunajaran_form');
        $this->load->view('template_administrator/footer');

    }

    public function tambah_tahunajaran_aksi()
         {
    $this-> _rules();
        if($this->form_validation->run() == FALSE)
        {
            $this->tambah_tahun_ajaran();
        }else {
            $tahun_ajaran = $this->input->post('tahun_ajaran');
            $semester = $this->input->post('semester');

            $data = array (
                'tahun_ajaran'  => $tahun_ajaran,
                'semester'  => $semester,
            );

            $this->tahunajaran_model->insert_data($data,'tahun_ajaran');
             redirect('administrator/tahun_ajaran');

            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert"
            Data Tahun Ajaran Berhasil Ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden= "true"> &times;</span></button></div>');

    }
}
  public function _rules()
    {
        $this->form_validation->set_rules('tahun_ajaran','tahun_ajaran','required',[
            'required' => 'tahun ajaran wajib diisi!'
    ]);
        $this->form_validation->set_rules('semester','semester','required',[
            'required' => 'semester wajib diisi!'
    ]);
    
}

public  function update($id)
{
    $where = array('id_thn_ajaran' => $id);
    $data ['tahun_ajaran'] = $this->tahunajaran_model->edit_data($where,'tahun_ajaran') ->result ();
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/tahun_ajaran_update',$data);
        $this->load->view('template_administrator/footer');
}

    public function update_aksi()
    {
        $id = $this->input->post('id_thn_ajaran');
        $tahun_ajaran = $this->input->post('tahun_ajaran');
        $semester = $this->input->post('semester');
    

        $data = array(

            'tahun_ajaran'  => $tahun_ajaran,
            'semester'  => $semester,
         
        );

        $where = array(
            'id_thn_ajaran' =>$id
        );

        $this->tahunajaran_model->update_data($where,$data,'tahun_ajaran');
            $this->session->set_flashdata('pesan','<div class="alert alert-info" role="alert">
            Data Tahun Ajaran Berhasil Diupdate! </div>');
        redirect('administrator/tahun_ajaran');

    }
    public function delete($id) {
        $where = array ('id_thn_ajaran' => $id);
        $this->tahunajaran_model->hapus_data($where,'tahun_ajaran');
         $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
            Data Tahun Ajaran Berhasil Dihapus! </div>');
        redirect('administrator/tahun_ajaran');
    }
}