<?php

class M_Diskon extends CI_Model{
    protected $_table = 'm_diskon';

    public function lihat(){
        $this->db->order_by('id_diskon', 'DESC');
		return $this->db->from('m_diskon')
			->get()
			->result();
    }
    public function jumlah(){
        $query = $this->db->get($this->_table);
        return $query->num_rows();
    }
    public function lihat_id($id_diskon) {
        $query = $this->db->get_where($this->_table, ['id_diskon' => $id_diskon]);
        return $query->row();
    }
    public function lihat_username($nama_diskon){
        $query = $this->db->get_where($this->_table, ['username' => $nama_diskon]);
        return $query->row();
    }
    public function tambah($data){
        return $this->db->insert($this->_table, $data);
    }
    public function ubah($data, $id_diskon){
        $query = $this->db->set($data);
        $query = $this->db->where('id_diskon' , $id_diskon);
        $query = $this->db->update($this->_table);
        return $query;
    }
    public function hapus($id_diskon){
        return $this->db->delete($this->_table, ['id_diskon' => $id_diskon]);
    }
}
?>