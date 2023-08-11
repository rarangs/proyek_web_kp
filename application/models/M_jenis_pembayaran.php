<?php

class M_jenis_pembayaran extends CI_Model{
    protected $_table = 'm_jenis_pembayaran';

    public function lihat(){
        $this->db->order_by('id_pembayaran', 'DESC');
		return $this->db->from('m_jenis_pembayaran')
			->get()
			->result();
    }
    public function jumlah(){
        $query = $this->db->get($this->_table);
        return $query->num_rows();
    }
    public function lihat_id($id_pembayaran) {
        $query = $this->db->get_where($this->_table, ['id' => $id_pembayaran]);
        return $query->row();
    }
    public function lihat_username($jenis_pembayaran) {
        $query = $this->db->get_where($this->_table, ['username' => $jenis_pembayaran]);
        return $query->row();
    }
    public function tambah($data){
        return $this->db->insert($this->_table, $data);
    }
    public function ubah($data, $id_pembayaran){
        $query = $this->db->set($data);
        $query = $this->db->where('id_user' , $id_pembayaran);
        $query = $this->db->update($this->_table);
        return $query;
    }
    public function hapus($id_pembayaran){
        return $this->db->delete($this->_table, ['id_pembayaran' => $id_pembayaran]);
    }
}
?>