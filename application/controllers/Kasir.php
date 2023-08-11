<?php

use Dompdf\Dompdf;

class Kasir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->login['role'] != 'kasir' && $this->session->login['role'] != 'admin') redirect();
        $this->data['aktif'] = 'kasir';
        $this->load->model('M_kasir','m_kasir');
    }
    public function index()
    {
        $this->data['title'] = 'Data Kasir';
        $this->data['all_kasir'] = $this->m_kasir->lihat();
        $this->data['no'] = 1;

        $this->load->view('kasir/lihat',$this->data);
    }
    public function tambah()
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Tambah data hanya untuk admin!');
            redirect('penjualan');
        }
        $this->data['title'] = 'Tambah Kasir';

        $this->load->view('kasir/tambah',$this->data);
    }
    public function proses_tambah()
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Tambah data hanya untuk admin!');
            redirect('penjualan');
        }
        $data =[
            'kode_kasir' => $this->input->post('kode_kasir'),
            'nama_kasir' => $this->input->post('nama_kasir'),
            'username_kasir' => $this->input->post('username_kasir'),
            'password_kasir' => $this->input->post('password_kasir'),
        ];
        // var_dump($data);die;
        if ($this->m_kasir->tambah($data)){
            $this->session->set_flashdata('success','Data Kasir <strong>Berhasil</strong> Ditambahkan!');
            redirect('kasir');
        } else {
            $this->session->set_flashdata('error','Data Kasir <strong>Gagal</strong> Ditambahkan!');
            redirect('kasir');
        }
    }
    public function ubah($kode_kasir)
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Ubah data hanya untuk admin!');
            redirect('penjualan');
        }
        $this->data['title'] = 'Ubah Kasir';
        $this->data['kasir'] = $this->m_kasir->lihat_id($kode_kasir);
        // var_dump($this->db->last_query());die;

        $this->load->view('kasir/ubah', $this->data);
    }
    public function proses_ubah($kode_kasir)
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Ubah data hanya untuk admin!');
            redirect('penjualan');
        }

        $data = [
            'kode_kasir' => $this->input->post('kode_kasir'),
            'nama_kasir' => $this->input->post('nama_kasir'),
            'username_kasir' => $this->input->post('username_kasir'),
            'password_kasir' => $this->input->post('password_kasir'),
        ];

        if ($this->m_kasir->ubah($data, $kode_kasir)){
            $this->session->set_flashdata('success','Data Kasir <strong>Berhasil</strong> Diubah!');
            redirect('kasir');
        }
    }
    public function hapus($kode_kasir)
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Hapus data hanya untuk admin!');
            redirect('penjualan');
        }

        if ($this->m_kasir->hapus($kode_kasir)){
            $this->session->set_flashdata('success','Data Kasir <strong>Berhasil</strong> Diubah!');
            redirect('kasir');  
        } else {
            $this->session->set_flashdata('error','Data Kasir <strong>Gagal</strong> Ditambahkan!');
            redirect('kasir');
        }
    }
    public function export()
    {
        $dompdf = new Dompdf();
        $this->data['all_kasir'] = $this->m_kasir->lihat();
        $this->data['title'] = 'Laporan Data Kasir';
        $this->data['no'] = 1;

        $dompdf->setPaper('A4','Landscape');
        $html = $this->load->view('kasir/report', $this->data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Data Kasir Tanggal ' . date('d F Y'), array("Attachment" => false));
    }
}

?>