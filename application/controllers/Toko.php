<?php
class Toko extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->login['role'] != 'kasir' && $this->session->login['role'] != 'admin') redirect();
        $this->data['aktif'] = 'toko';
        $this->load->model('M_toko','m_toko');
    }

    public function index()
    {
        $this->data['title'] = 'Data Toko';
        $this->data['data_toko'] = $this->m_toko->lihat();
        $this->data['no'] = 1;

        $this->load->view('toko/lihat',$this->data);
    }  

    public function proses_ubah($id = '1')
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Ubah data hanya untuk admin!');
            redirect('penjualan');
        }

        $data = [
            'nama_toko' => $this->input->post('nama_toko'),
            'nama_pemilik' => $this->input->post('nama_pemilik'),
            'no_telepon' => $this->input->post('no_telepon'),
            'alamat' => $this->input->post('alamat'),
        ];

        if ($this->m_toko->ubah($data, $id)){
            $this->session->set_flashdata('success','Profil Toko <strong>Berhasil</strong> Diubah!');
            redirect('toko');
        }
    }

}
?>