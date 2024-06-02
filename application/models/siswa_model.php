<?php 

class Siswa_model extends CI_Model{

    public function getAllSiswa(){
        return $this->db->get('siswa')->result_array();
    }
      public function get_siswa_by_nis($nis) {
        return $this->db->get_where('siswa', array('nis' => $nis))->row();
    }

    public function get_siswa_by_nama($nama_siswa) {
        return $this->db->get_where('siswa', array('nama_siswa' => $nama_siswa))->row();
    }


    public function getSiswa($limit,$start,$keyword =null){

        if($keyword) {
            $this->db->like('nama_siswa',$keyword);
            $this->db->or_like('program',$keyword);
            $this->db->or_like('nama_unit',$keyword);
        }
        $this->db->order_by('nis', 'DESC');
            return $this->db->get('siswa',$limit,$start)->result_array();
    }
    
    public function countAllSiswa() {
        return $this->db->get('siswa')->num_rows();
    }

    
    public function get_total_siswa() {
        return $this->db->count_all('siswa');
    }

    public function get_data_siswa() {
        $query = $this->db->get('siswa');
        return $query->result();
    }
    public function tampil_data($table)
    {
        return $this->db->get($table);
    }

    public function ambil_id_siswa($id)
    {
            $hasil = $this->db->where('id',$id)->get('siswa')
            ;
            if($hasil ->num_rows() > 0 ) {
                return $hasil->result();
            }  else{
                return false;
            }
    }


    public function insert_data($data,$table)
    {
        $this->db->insert($table,$data);
    }

     public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function hapus_data($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public $table ='siswa';
    public $id ='nis';

    public function get_by_id($id)
    {
        $this->db->where($this->id,$id);
        return $this->db->get($this->table)->row();
    }
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
     public function get_data_siswa1()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->like('kelas', '1');

        return $this->db->get()->num_rows();
    }
    public function get_data_siswa2()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->like('kelas', '2');

        return $this->db->get()->num_rows();
    }
    public function get_data_siswa3()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->like('kelas', '3');

        return $this->db->get()->num_rows();
    }
    public function get_data_siswa4()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->like('kelas', '4');

        return $this->db->get()->num_rows();
    }
    public function get_data_siswa5()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->like('kelas', '5');

        return $this->db->get()->num_rows();
    }
    public function get_data_siswa6()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->like('kelas', '6');

        return $this->db->get()->num_rows();
    }
     public function get_data_siswa7()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->like('kelas', '7');

        return $this->db->get()->num_rows();
    }
     public function get_data_siswa8()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->like('kelas', '8');

        return $this->db->get()->num_rows();
    }

     public function get_data_siswa9()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->like('kelas', '9');

        return $this->db->get()->num_rows();
    }
   public function get_by_id1($nis) {
        $this->db->where('nis', $nis);
        $query = $this->db->get('siswa');
        return $query->row(); 
    }
}

