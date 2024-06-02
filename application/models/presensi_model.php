<?php 

class Presensi_model extends CI_Model{

    public function tampil_data($table)
    {
        return $this->db->get($table);
    }

    public function ambil_id_siswa($id)
    {
            $hasil = $this->db->where('id',$id)->get('presensi')
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


    public function hapus_data($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public $table ='presensi';
    public $id ='id';

    public function get_by_id($id)
    {
        $this->db->where($this->id,$id);
        return $this->db->get($this->table)->row();
    }
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    
    public function getPresensi($limit,$start,$keyword =null){

        if($keyword) {
            $this->db->like('nama_siswa',$keyword);
            $this->db->or_like('tgl',$keyword);
            $this->db->or_like('nama_unit',$keyword);
        }
        $this->db->order_by('nama_siswa', 'ASC');
            return $this->db->get('presensi',$limit,$start)->result_array();
    }

 
    public function get_presensi_by_month($tahun, $bulan) {
        $this->db->where('YEAR(tgl)', $tahun);
        $this->db->where('MONTH(tgl)', $bulan);
        $query = $this->db->get('presensi');
        return $query->result();
    }

    public function get_all_units() {
    $query = $this->db->get('unit');
    return $query->result();
}
  public function get_presensi_by_month_and_unit($tahun, $bulan, $unit) {
    $this->db->where('YEAR(tgl)', $tahun);
    $this->db->where('MONTH(tgl)', $bulan);
    if ($unit) {
        $this->db->where('nama_unit', $unit); 
    }
    $query = $this->db->get('presensi');
    return $query->result();
}

       public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    
    
}

