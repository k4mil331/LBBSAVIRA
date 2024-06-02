<?php

class Unit_model extends CI_Model {
    public function tampil_data()
    {
       return $this->db->get('unit');
    }

    
    public function is_kode_unit_exists($kode_unit) {
        $this->db->where('kode_unit', $kode_unit);
        $query = $this->db->get('unit');
        return $query->num_rows() > 0;
    }
      public function get_all_units() {
        $query = $this->db->get('unit');
        return $query->result();
    }

    
    public function input_data($data)
    {
        $this->db->insert('unit', $data);
    }
    public function edit_data($where,$table)
    {
       return $this->db->get_where($table,$where);
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
       
public function get_jumlah_unit()
{
   
    $query = $this->db->get('unit');
 
    return $query->result();
}
   public function get_unit()
    {
        $this->db->select('*');
        $this->db->from('unit');
        $this->db->like('nama_unit');

        return $this->db->get()->num_rows();
    }
}