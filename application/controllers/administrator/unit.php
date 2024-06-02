<?php

class Unit extends CI_Controller {
    public function index()
    {
        
        $data['unit']  = $this->unit_model->
        tampil_data()->result();
         $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/unit',$data);
        $this->load->view('template_administrator/footer');
    }

   


    public function input()
    {
        $data = array (
            'id_unit'    => set_value('id_unit'),
            'kode_unit'  => set_value('kode_unit'),
            'nama_unit'  => set_value('nama_unit'),
        );
         $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/unit_form',$data);
        $this->load->view('template_administrator/footer');
    }

    public function input_aksi() {
        $this->_rules();

        if($this->form_validation->run() == FALSE ) {
            $this->input();
        } else {
            $kode_unit = $this->input->post('kode_unit', TRUE);
            $nama_unit = $this->input->post('nama_unit', TRUE);

            if ($this->unit_model->is_kode_unit_exists($kode_unit)) {
                $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
                Kode Unit sudah ada! </div>');
                redirect('administrator/unit');
                $this->input();
            } else {
                $data = array(
                    'kode_unit'  => $kode_unit,
                    'nama_unit'  => $nama_unit,
                );
                $this->unit_model->input_data($data,'unit');
                $this->session->set_flashdata('pesan','<div class="alert alert-info" role="alert">
            Data Unit Berhasil Ditambah! </div>');
                redirect('administrator/unit');
            }
        }
    }
 
    public function _rules()
    {
        $this->form_validation->set_rules('kode_unit','kode_unit','required',[
            'required' => 'kode unit wajib diisi!'
    ]);
        $this->form_validation->set_rules('nama_unit','nama_unit','required',[
            'required' => 'nama unit wajib diisi!'
    ]);
    }

    public function update($id) {
        $where = array ('id_unit' => $id);
        $data['unit'] = $this->unit_model->edit_data($where,'unit')->result();
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/unit_update',$data);
        $this->load->view('template_administrator/footer');
    }

    public function update_aksi()
    {
        $id = $this->input->post('id_unit');
        $kode_unit = $this->input->post('kode_unit');
        $nama_unit = $this->input->post('nama_unit');
    
        $data = array(
            'kode_unit' => $kode_unit,
            'nama_unit' => $nama_unit
        );
        $where =array(
            'id_unit' =>$id 
        );

        $this->unit_model->update_data($where,$data,'unit');
        $this->session->set_flashdata('pesan','<div class="alert alert-primary" role="alert">
            Data Unit Berhasil Ditambahkan ! </div>');
        redirect('administrator/unit');
        
    }

    public function delete($id) {
        $where = array ('id_unit' => $id);
        $this->unit_model->hapus_data($where,'unit');
         $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
            Data Unit Berhasil Dihapus! </div>');
        redirect('administrator/unit');
        
    }

    public function cetak()
{
    $data['unit'] = $this->unit_model->tampil_data('unit')->result();
    $this->load->view('administrator/print_unit',$data);
}



}