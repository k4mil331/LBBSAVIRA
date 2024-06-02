<?php  

class hubungi_kami extends CI_Controller {

    public function index()
    {
        $data['hubungi'] = $this->hubungi_model->tampil_data('hubungi')
        ->result();
         $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/hubungi_kami',$data);
        $this->load->view('template_administrator/footer');
    }

    public function kirim_email($id)
    {
            $where = array('id_hubungi'  =>$id);
            $data['hubungi'] =$this->hubungi_model->kirim_data($where,'hubungi')->result();
             $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/form_kirim_email',$data);
        $this->load->view('template_administrator/footer');

    }

    public function kirim_email_aksi()
    {
        $to_email  =$this->input->post('email');
        $subject  =$this->input->post('subject');
        $message  =$this->input->post('pesan');

        $config = [
            'mailtype' =>'html',
            'charset'  =>'utf-8',
            'protocol'  =>'smtp',
            'smtp_host'  =>'ssl://smtp.gmail.com',
            'smtp_user'  =>'nasrudinkamil12@gmail.com',
            'smpt_app'  =>'tugasakhir',
            'smtp_pass'  =>'wczm qwzq dwtl vtzk',
            'smtp_port'  =>465,
            'crlf'    =>"\r\n",
            'newline'    =>"\r\n",
        ];

        $this->load->library('email',$config);

        $this->email->from('nasrudinkamil12@gmail.com', 'LBB SAVIRA');

        $this->email->to($to_email);

        $this->email->subject($subject);

        $this->email->message($message);

        if ($this->email->send())
        {
              $this->session->set_flashdata('pesan','<div class="alert alert-info" role="alert">
            Pesan Terkirim </div>');
        redirect('administrator/hubungi_kami');
        }else {
              $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
            Pesan Tidak Terkirim</div>');
        redirect('administrator/hubungi_kami');
        }
    }
    
    public function delete($id) {
        $where = array ('id_hubungi' => $id);
        $this->hubungi_model->hapus_data($where,'hubungi');
         $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
            Pesan Berhasil Dihapus! </div>');
        redirect('administrator/hubungi_kami');
}

}