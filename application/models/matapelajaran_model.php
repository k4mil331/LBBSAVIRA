<?php

class Matapelajaran_model extends CI_Model {

    public function tampil_data($table)
    {
        return $this->db->get($table);
        
    }
     public function get_mapel_by_kode($kode_matapelajaran) {
        return $this->db->get_where('matapelajaran', array('kode_matapelajaran' => $kode_matapelajaran))->row();
    }

    public function get_mapel_by_nama($nama_matapelajaran) {
        return $this->db->get_where('matapelajaran', array('nama_matapelajaran' => $nama_matapelajaran))->row();
    }

     public function getMatapelajaran($limit,$start,$keyword =null){

        if($keyword) {
            $this->db->like('kode_matapelajaran',$keyword);
            $this->db->or_like('nama_matapelajaran',$keyword);
            $this->db->or_like('nama_tutor',$keyword);
        }
        $this->db->order_by('nama_matapelajaran', 'ASC');
            return $this->db->get('matapelajaran',$limit,$start)->result_array();
    }

    public function insert_data($data,$table)
    {
        $this->db->insert($table,$data);
    }

    public function ambil_kode_matapelajaran($kode)
    {
        $result = $this->db->where('kode_matapelajaran',$kode)
        ->get('matapelajaran');
        if($result->num_rows() > 0) {
            return $result->result();
        }else {
            return false;
        }
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

      public $table ='matapelajaran';
    public $id ='kode_matapelajaran';
    public function get_by_id($id)
    {
        $this->db->where($this->id,$id);
        return $this->db->get($this->table)->row();
    } 

    public function get_matapelajaran()
{
    return $this->db->get('matapelajaran')->result();
}
}