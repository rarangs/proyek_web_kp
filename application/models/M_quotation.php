<?php

class M_Quotation extends CI_Model{
    protected $_table = 'quotation';

    public function lihat(){
        $this->db->order_by('q_no', 'DESC');
		return $this->db->from('quotation')
			->get()
			->result();
    }
    public function jumlah(){
        $query = $this->db->get($this->_table);
        return $query->num_rows();
    }
public function lihat_q_no($q_no) {
        $query = $this->db->get_where($this->_table, ['q_no' => $q_no]);
        return $query->row();
    }
    public function lihat_id_cust($id_cust) {
        $query = $this->db->get_where($this->_table, ['id_cust' => $id_cust]);
        return $query->row();
    }
    public function tambah($data){
        return $this->db->insert($this->_table, $data);
    }
    public function ubah($data, $q_no){
        $query = $this->db->set($data);
        $query = $this->db->where('q_no' , $q_no);
        $query = $this->db->update($this->_table);
        return $query;
    }
    public function hapus($q_no){
        return $this->db->delete($this->_table, ['q_no' => $q_no]);
    }
}
?>