<?php

class Dashboard_tutor extends CI_Controller{

      public function __construct() {
        parent::__construct();
        $this->load->model('siswa_model');

    }
    public function index()
    {
        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $data = array (
            'username'  => $data->username,
            'level'     => $data->level,
        );
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar_tutor');
        $this->load->view('administrator/dashboard_tutor',$data);
        $this->load->view('template_administrator/footer');
    }
   

      
    }
