<?php

class M_stok extends CI_Model{
    protected $_table = 'm_stok';

    public function lihat(){
        $this->db->order_by('stokid', 'DESC');
		return $this->db->from('m_stok')
			->get()
			->result();
    }
    public function jumlah(){
        $query = $this->db->get($this->_table);
        return $query->num_rows();
    }
    public function lihat_id($stokid) {
        $query = $this->db->get_where($this->_table, ['stokid' => $stokid]);
        return $query->row();
    }
    public function lihat_username($nama_barang) {
        $query = $this->db->get_where($this->_table, ['nama_barang' => $nama_barang]);
        return $query->row();
    }
    public function tambah($data){
        return $this->db->insert($this->_table, $data);
    }
    public function ubah($data, $stokid){
        $query = $this->db->set($data);
        $query = $this->db->where(['stokid' => $stokid]);
        $query = $this->db->update($this->_table);
        return $query;
    }
    public function hapus($stokid){
        return $this->db->delete($this->_table, ['stokid' => $stokid]);
    }
}
?>