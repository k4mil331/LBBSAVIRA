<?php

class Dashboard extends CI_Controller{

     

    public function index()
    {
        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $data = array (
            'username'  => $data->username,
            'level'     => $data->level,
        );
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/dashboard',$data);
        $this->load->view('template_administrator/footer');
    }

    
}