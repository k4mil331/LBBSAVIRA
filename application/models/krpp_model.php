<?php 

class Krpp_model extends CI_Model{

     public function tampil_data($table)
    {
        return $this->db->get($table);
    }

    public $table ='krpp';
    public $id = 'id_krpp';

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

     public function get_by_id($id)
    {
        $this->db->where($this->id,$id);
        return $this->db->get($this->table)->row();
    }

    public function update($id,$data)
    {
        $this->db->where($this->id,$id);
        $this->db->update($this->table,$data);
    }

    public function hapus_data($where,$table)
    {
          $this->db->where($where);
          $this->db->delete($table);
    }
     

    

}