<?php

class M_pegawai extends CI_Model{
    protected $_table = 'm_pegawai';

    public function lihat(){
        $this->db->order_by('id_pegawai', 'DESC');
		return $this->db->from('m_pegawai')
			->get()
			->result();
    }
    public function jumlah(){
        $query = $this->db->get($this->_table);
        return $query->num_rows();
    }
    public function lihat_id($id_pegawai) {
        $query = $this->db->get_where($this->_table, ['id_pegawai' => $id_pegawai]);
        return $query->row();
    }
    public function lihat_username($username) {
        $query = $this->db->get_where($this->_table, ['username' => $username]);
        return $query->row();
    }
    public function tambah($data){
        return $this->db->insert($this->_table, $data);
    }
    public function ubah($data, $id_pegawai){
        $query = $this->db->set($data);
        $query = $this->db->where(['id_pegawai' => $id_pegawai]);
        $query = $this->db->update($this->_table);
        return $query;
    }
    public function hapus($id_pegawai){
        return $this->db->delete($this->_table, ['id_pegawai' => $id_pegawai]);
    }
}
?>