<?php

class M_jasa extends CI_Model{
    protected $_table = 'm_jasa';

    public function lihat(){
        $this->db->order_by('id_jasa', 'DESC');
		return $this->db->from('m_jasa')
			->get()
			->result();
    }
    public function jumlah(){
        $query = $this->db->get($this->_table);
        return $query->num_rows();
    }
    public function lihat_id($id_jasa) {
        $query = $this->db->get_where($this->_table, ['id_jasa' => $id_jasa]);
        return $query->row();
    }
    public function lihat_username($nama_jasa) {
        $query = $this->db->get_where($this->_table, ['nama_jasa' => $nama_jasa]);
        return $query->row();
    }
    public function tambah($data){
        return $this->db->insert($this->_table, $data);
    }
    public function ubah($data, $id_jasa){
        $query = $this->db->set($data);
        $query = $this->db->where(['id_jasa' => $id_jasa]);
        $query = $this->db->update($this->_table);
        return $query;
    }
    public function hapus($id_jasa){
        return $this->db->delete($this->_table, ['id_jasa' => $id_jasa]);
    }
}
?>