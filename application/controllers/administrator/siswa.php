<?php 

class Siswa extends CI_Controller {


    public function index()
    {
        $this->load->model('siswa_model','siswa');
        $this->load->library('pagination');

        if($this->input->post('submit')){
           $data['keyword']=$this->input->post('keyword');
           $this->session->set_userdata('keyword',$data['keyword']);
        } else {
            $data['keyword'] =null;
        }

        $config['base_url'] ='http://localhost/tugasakhirfiks/administrator/siswa/index';
        $this->db->like('nama_siswa',$data['keyword']);
        $this->db->or_like('program',$data['keyword']);
        $this->db->or_like('nama_unit',$data['keyword']);
        
        $this->db->from('siswa');
        $config['total_rows'] =$this->db->count_all_results();
        $config['per_page'] =7;
        $config['num_link'] =5;

        $config['full_tag_open'] ='<nav> <ul class="pagination justify-content-center">';
        $config['full_tag_close'] ='</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] ='&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] ='&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class ="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item ">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);



        $data['start'] =$this->uri->segment(4);
        $data['siswa'] = $this->siswa->getSiswa($config['per_page'],$data['start'],$data['keyword']);


         $data['unit']  = $this->kelolatutor_model->tampil_data('unit')->result();
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/siswa',$data);
        $this->load->view('template_administrator/footer');
    }


    public function detail($id)
    {
        $data['detail']  = $this->siswa_model->ambil_id_siswa ($id);
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/siswa_detail',$data);
        $this->load->view('template_administrator/footer');
    }

    
    public function tambah_siswa()
    {
        $data['kelolatutor'] =$this->siswa_model->tampil_data('kelolatutor')->result();
        $data['unit'] =$this->siswa_model->tampil_data('unit')->result();
      
          $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/siswa_form',$data);
        $this->load->view('template_administrator/footer');
    }

    public function tambah_siswa_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->tambah_siswa();
        }else{
        $nis  = $this->input->post('nis');
        $nama_siswa  = $this->input->post('nama_siswa');

        $existing_siswa = $this->siswa_model->get_siswa_by_nis($nis);
        $existing_nama_siswa = $this->siswa_model->get_siswa_by_nama($nama_siswa);

        if($existing_siswa) {
            $this->session->set_flashdata('error','<div class="alert alert-danger" role="alert">
                Nis Siswa sudah ada! </div>' );
            redirect('administrator/siswa');
        }

        if($existing_nama_siswa) {
            $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
                Nama Siswa sudah ada! </div>');
            redirect('administrator/siswa');
        }
        
            $nis  = $this->input->post('nis');
            $nama_siswa  = $this->input->post('nama_siswa');
            $alamat  = $this->input->post('alamat');
            $kelas  = $this->input->post('kelas');
            $jenis_kelamin  = $this->input->post('jenis_kelamin');
            $program  = $this->input->post('program');
            $nama_unit  = $this->input->post('nama_unit');
            $nama_tutor  = $this->input->post('nama_tutor');
            $foto  = $_FILES['foto'];
            if ($foto='') {}else {
                $config['upload_path'] = './assets/upload';
                $config['allowed_types'] ='jpg|png|gif|tifff|jpeg';

                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('foto')){
                    echo "Gagal Upload"; die();
                }else {
                    $foto=$this->upload->data('file_name');
                }
            }

            $data = array(
                'nis'       =>$nis,
                'nama_siswa'       =>$nama_siswa,
                'alamat'       =>$alamat,
                'kelas'       =>$kelas,
                'jenis_kelamin'       =>$jenis_kelamin,
                'program'       =>$program,
                'nama_unit'       =>$nama_unit,
                'nama_tutor'       =>$nama_tutor,
                'foto'       =>$foto,
            );

            $this->siswa_model->insert_data($data,'siswa');
            $this->session->set_flashdata('pesan','<div class="alert alert-info" role="alert">
            Data Siswa Berhasil Ditambah! </div>');
        redirect('administrator/siswa');
        }
    }

    public function update($id)
    {
        $where = array ('id ' => $id);

         $data['siswa']= $this->db->query("select * from siswa sws, unit unt
         where sws.nama_unit=unt.nama_unit and sws.id='$id' ")->result();
        $data['siswa']= $this->db->query("select * from siswa sws, kelolatutor klt
         where sws.nama_tutor=klt.nama_tutor and sws.id='$id' ")->result();

        $data['unit'] = $this->siswa_model->tampil_data('unit')->result();
        $data['kelolatutor'] = $this->siswa_model->tampil_data('kelolatutor')->result();
        $data['detail'] =$this->siswa_model->ambil_id_siswa($id);
         $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/siswa_update',$data);
        $this->load->view('template_administrator/footer');
    }

    public function update_siswa_aksi ()
        {
            $this->_rules();

            if($this->form_validation->run() == FALSE )
            {
                $this->update();
        }else {

            $id  = $this->input->post('id');
            $nis  = $this->input->post('nis');
            $nama_siswa  = $this->input->post('nama_siswa');
            $alamat  = $this->input->post('alamat');
            $kelas  = $this->input->post('kelas');
            $jenis_kelamin  = $this->input->post('jenis_kelamin');
            $program  = $this->input->post('program');
            $nama_unit  = $this->input->post('nama_unit');
            $nama_tutor  = $this->input->post('nama_tutor');
            $foto  = $_FILES['userfile']['name'];
             if ($foto){
                $config['upload_path'] = './assets/upload';
                $config['allowed_types'] ='jpg|png|gif|tifff|jpeg';

                $this->load->library('upload',$config);
                if($this->upload->do_upload('userfile')){
                    $userfile = $this->upload->data('file_name');
                    $this->db->set('foto',$userfile);
                }else {
                    echo "Gagal upload";
                }
        }

         $data = array(
                'nis'       =>$nis,
                'nama_siswa'       =>$nama_siswa,
                'alamat'       =>$alamat,
                'kelas'       =>$kelas,
                'jenis_kelamin'       =>$jenis_kelamin,
                'program'       =>$program,
                'nama_unit'       =>$nama_unit,
                'nama_tutor'       =>$nama_tutor,
            );

            $where = array (

                'id' => $id
            );

            $this->siswa_model->update_data($where,$data,'siswa');
            $this->session->set_flashdata('pesan','<div class="alert alert-info" role="alert">
            Data Siswa Berhasil Diupdate! </div>');
        redirect('administrator/siswa');
        }
        }

    public function _rules()
    {
        $this->form_validation->set_rules('nis','nis','required' , [
            'required' => 'NIS Wajib Diisi!'
        ]);

          $this->form_validation->set_rules('nama_siswa','nama_siswa','required' , [
            'required' => 'Nama Siswa Wajib Diisi!'
        ]);
          $this->form_validation->set_rules('alamat','alamat','required' , [
            'required' => 'Alamat Siswa Wajib Diisi!'
        ]);

          $this->form_validation->set_rules('kelas','kelas','required' , [
            'required' => 'Kelas Wajib Diisi!'
        ]);

          $this->form_validation->set_rules('jenis_kelamin','jenis_kelamin','required' , [
            'required' => 'Jenis Kelamin Wajib Diisi!'
        ]);

          $this->form_validation->set_rules('program','program','required' , [
            'required' => 'Program Wajib Diisi!'
        ]);

          $this->form_validation->set_rules('nama_unit','nama_unit','required' , [
            'required' => ' Unit Wajib Diisi!'
        ]);

          $this->form_validation->set_rules('nama_tutor','nama_tutor','required' , [
            'required' => 'Tutor Wajib Diisi!'
        ]);
    }

    public function delete($id) {
        $where = array ('id' => $id);
        $this->siswa_model->hapus_data($where,'siswa');
         $this->session->set_flashdata('error','<div class="alert alert-danger" role="alert">
            Data Siswa Berhasil Dihapus! </div>');
        redirect('administrator/siswa');
}

public function cetak()
{
    $data['siswa'] = $this->siswa_model->tampil_data('siswa')->result();
    $this->load->view('administrator/print_siswa',$data);
}



}