<?php

class M_pelanggan extends CI_Model{
    protected $_table = 'm_pelanggan';

    public function lihat(){
        $this->db->order_by('id_cust', 'DESC');
		return $this->db->from('m_pelanggan')
			->get()
			->result();
    }
    public function jumlah(){
        $query = $this->db->get($this->_table);
        return $query->num_rows();
    }
    public function lihat_id($id_cust) {
        $query = $this->db->get_where($this->_table, ['id_cust' => $id_cust]);
        return $query->row();
    }
    public function lihat_username($nama_cust){
        $query = $this->db->get_where($this->_table, ['username' => $nama_cust]);
        return $query->row();
    }
    public function tambah($data){
        return $this->db->insert($this->_table, $data);
    }
    public function ubah($data, $id_cust){
        $query = $this->db->set($data);
        $query = $this->db->where('id_cust' , $id_cust);
        $query = $this->db->update($this->_table);
        return $query;
    }
    public function hapus($id_cust){
        return $this->db->delete($this->_table, ['id_cust' => $id_cust]);
    }
}
?>