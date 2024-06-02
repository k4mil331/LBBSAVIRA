<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hal_depan extends CI_Controller {

	public function index()
	{
		$data ['identitas'] = $this->identitas_model->tampil_data('identitas')->result();
		$data ['tentang'] = $this->tentang_model->tampil_data('tentang_savira')->result();
		$data ['informasi'] = $this->informasi_model->tampil_data('informasi')->result();
		$data ['hubungi'] = $this->hubungi_model->tampil_data('hubungi')->result();
		$this->load->view('template_administrator/header');
        $this->load->view('hal_depan',$data);
        $this->load->view('template_administrator/footer');
	}

	 public function kirim_pesan()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
            $id  = $this->input->post('id_hubungi');
            $nama  = $this->input->post('nama');
            $email  = $this->input->post('email');
            $pesan  = $this->input->post('pesan');
           
            $data = array(
                'nama'       =>$nama,
                'email'       =>$email,
                'pesan'       =>$pesan,
            );

            $this->hubungi_model->insert_data($data,'hubungi');
            $this->session->set_flashdata('pesan','<div class="alert alert-info" role="alert">
            Pesan Berhasil Dikirim ! </div>');
        redirect('hal_depan/index');
        }
    }

	 public function _rules()
    {
        $this->form_validation->set_rules('nama','nama','required' , [
            'required' => 'nama Wajib Diisi!'
        ]);

          $this->form_validation->set_rules('email','email','required' , [
            'required' => ' email Wajib Diisi!'
        ]);
          $this->form_validation->set_rules('pesan','pesan','required' , [
            'required' => 'Pesan Wajib Diisi!'
        ]);
    
    }


}
