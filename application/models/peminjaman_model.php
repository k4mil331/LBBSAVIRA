<?php 

class Peminjaman_model extends CI_Model{
    
    public function getAllPeminjaman(){
        return $this->db->get('peminjaman')->result_array();
    }

    public function getPeminjaman($limit,$start,$keyword =null){

        if($keyword) {
            $this->db->like('nama_tutor',$keyword);
        }
        $this->db->order_by('nama_tutor', 'ASC');
            return $this->db->get('peminjaman',$limit,$start)->result_array();
    }
    
    public function tampil_data($table)
    {
        return $this->db->get($table);
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

}