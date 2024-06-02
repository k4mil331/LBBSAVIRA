<?php 

class User extends CI_Controller {

    public function index ()
    {
        $data['user'] = $this->user_model->tampil_data('user')->result();

        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/daftar_user',$data);
        $this->load->view('template_administrator/footer');
    }

    
    public function tambah_user()
    {
        $data =array(

            'username'  =>set_value('username'),
            'password'  =>set_value('password'),
            'email'  =>set_value('email'),
            'level'  =>set_value('level'),
          
        );
        
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/user_form',$data);
        $this->load->view('template_administrator/footer');

    }

    public function tambah_user_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE )
        {
            $this->tambah_user();
        }else{
            $data =array (
                'username'  =>$this->input->post('username',TRUE),
                'password'  =>MD5($this->input->post('password',TRUE)),
                'email'  =>$this->input->post('email',TRUE),
                'level'  =>$this->input->post('level',TRUE),
               
                'id_session'  =>MD5($this->input->post('id_session',TRUE)),
            );

            
            $this->user_model->insert_data($data,'user');
            redirect('administrator/user');

            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert"
            Data User Berhasil Ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden= "true"> &times;</span></button></div>');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('username','username','required',['required' => 'username 
        wajib diisi']);
         $this->form_validation->set_rules('password','password','required',['required' => 'password 
        wajib diisi']);
         $this->form_validation->set_rules('email','email','required',['required' => 'Email 
        wajib diisi']);
         $this->form_validation->set_rules('level','level','required',['required' => 'Level 
        wajib diisi']);
      
        
    }

    public function update($id)
    {
        $where = array ('id' => $id);

        $data['user'] = $this->user_model->edit_data($where,'user')->result();
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/user_update',$data);
        $this->load->view('template_administrator/footer');
    }

    public function update_aksi()
    {
        $id   = $this->input->post('id');
        $username  = $this->input->post('username');
        $password   = MD5($this->input->post('password'));
        $email   = $this->input->post('email');
        $level   = $this->input->post('level');
      
        $id_session   = $this->input->post('id_session');

        $data = array (
            'username'  =>$username,
            'password'  =>$password,
            'email'  =>$email,
            'level'  =>$level,
         
        );

        $where = array (
            'id' =>$id
        );

         $this->user_model->update_data($where,$data,'user');
        $this->session->set_flashdata('pesan','<div class="alert alert-primary" role="alert">
            Data User Berhasil Diupdate ! </div>');
        redirect('administrator/user');
    }

    public function hapus($id) {
        $where = array ('id' => $id);
        $this->user_model->hapus_data($where,'user');
         $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
            Data User Berhasil Dihapus! </div>');
        redirect('administrator/user');
}
}