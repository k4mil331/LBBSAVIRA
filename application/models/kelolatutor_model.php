<?php

class Kelolatutor_model extends CI_Model
{
    public function tampil_data($table)
    {
       return $this->db->get($table);
    }
     public function getAllkelolatutor(){
        return $this->db->get('kelolatutor')->result_array();
    }
       public function get_tutor_by_kode($kode_tutor) {
        return $this->db->get_where('kelolatutor', array('kode_tutor' => $kode_tutor))->row();
    }

    public function get_tutor_by_nama($nama_tutor) {
        return $this->db->get_where('kelolatutor', array('nama_tutor' => $nama_tutor))->row();
    }
    public function getKelolatutor($limit,$start,$keyword =null){

        if($keyword) {
            $this->db->like('nama_tutor',$keyword);
            $this->db->like('nama_unit',$keyword);
        }
        $this->db->order_by('nama_tutor', 'ASC');
            return $this->db->get('kelolatutor',$limit,$start)->result_array();
    }
    

    public function insert_data ($data,$table){
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
    
public function get_jumlah_tutor()
{
   
    $query = $this->db->get('kelolatutor');
 
    return $query->result();
}
   public function get_tutor1()
    {
        $this->db->select('*');
        $this->db->from('kelolatutor');
        $this->db->like('nama_tutor');

        return $this->db->get()->num_rows();
    }

}