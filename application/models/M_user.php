<?php

class M_user extends CI_Model{
    protected $_table = 'm_user';

    public function lihat(){
        $this->db->order_by('id_user', 'DESC');
		return $this->db->from('m_user')
			->get()
			->result();
    }
    public function jumlah(){
        $query = $this->db->get($this->_table);
        return $query->num_rows();
    }
    public function lihat_id($id_user) {
        $query = $this->db->get_where($this->_table, ['id' => $id_user]);
        return $query->row();
    }
    public function lihat_username($username){
        $query = $this->db->get_where($this->_table, ['username' => $username]);
        return $query->row();
    }
    public function lihat_nama_pekerjaan($nama_pekerjaan) {
        $query = $this->db->get_where($this->_table, ['nama_pekerjaan' => $nama_pekerjaan]);
        return $query->row();
    }
    public function tambah($data){
        return $this->db->insert($this->_table, $data);
    }
    public function ubah($data, $id_user){
        $query = $this->db->set($data);
        $query = $this->db->where('id_user' , $id_user);
        $query = $this->db->update($this->_table);
        return $query;
    }
    public function hapus($id_user){
        return $this->db->delete($this->_table, ['id_user' => $id_user]);
    }
}
?>