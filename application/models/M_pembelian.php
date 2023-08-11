<?php

class M_pembelian extends CI_Model{
    protected $_table = 'm_pembelian';

    public function lihat(){
        $this->db->order_by('no_faktur', 'DESC');
		return $this->db->from('pembelian')
			->get()
			->result();
    }
    public function jumlah(){
        $query = $this->db->get($this->_table);
        return $query->num_rows();
    }
    public function lihat_id($no_faktur) {
        $query = $this->db->get_where($this->_table, ['id' => $no_faktur]);
        return $query->row();
    }
    public function lihat_username($user) {
        $query = $this->db->get_where($this->_table, ['ussername' => $user]);
        return $query->row();
    }
    public function tambah($data){
        return $this->db->insert($this->_table, $data);
    }
    public function ubah($data, $no_faktur){
        $query = $this->db->set($data);
        $query = $this->db->where('no_faktur' , $no_faktur);
        $query = $this->db->update($this->_table);
        return $query;
    }
    public function hapus($no_faktur){
        return $this->db->delete($this->_table, ['no_faktur' => $no_faktur]);
    }
}
?>