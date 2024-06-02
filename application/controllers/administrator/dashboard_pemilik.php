<?php

class Dashboard_pemilik extends CI_Controller{

          public function __construct() {
        parent::__construct();
        $this->load->model('Siswa_model');
    }

    public function index()
    {
        $data['total_siswa'] = $this->siswa_model->get_total_siswa();
        $data['tutor'] = $this->kelolatutor_model->get_jumlah_tutor();
        $data['unit'] = $this->unit_model->get_jumlah_unit();
        $data['tutor'] = $this->kelolatutor_model->get_tutor1();
        $data['unit'] = $this->unit_model->get_unit();
        $data['siswa1'] = $this->siswa_model->get_data_siswa1();
        $data['siswa2'] = $this->siswa_model->get_data_siswa2();
        $data['siswa3'] = $this->siswa_model->get_data_siswa3();
        $data['siswa4'] = $this->siswa_model->get_data_siswa4();
        $data['siswa5'] = $this->siswa_model->get_data_siswa5();
        $data['siswa6'] = $this->siswa_model->get_data_siswa6();
        $data['siswa7'] = $this->siswa_model->get_data_siswa7();
        $data['siswa8'] = $this->siswa_model->get_data_siswa8();
        $data['siswa9'] = $this->siswa_model->get_data_siswa9();
   

   $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar_pemilik');
        $this->load->view('administrator/dashboard_pemilik', $data);
        $this->load->view('template_administrator/footer');
        
      
        
       
      
    }
   

      
    }
