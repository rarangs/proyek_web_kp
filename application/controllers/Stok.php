<?php

use Dompdf\Dompdf;

class Stok extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->login['role'] != 'kasir' && $this->session->login['role'] != 'admin') redirect();
        $this->data['aktif'] = 'stok';
        $this->load->model('M_stok','m_stok');
    }

    public function index()
    {
        $this->data['title'] = 'Daftar Stok';
        $this->data['all_stok'] = $this->m_stok->lihat();
        $this->data['no'] = 1;

        $this->load->view('master/stok/lihat',$this->data);
    }

    public function tambah()
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Tambah data hanya untuk admin!');
            redirect('penjualan');
        }
        $this->data['title'] = 'Tambah Data Stok';

        $this->load->view('stok/tambah',$this->data);
    }

    public function proses_tambah()
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Tambah data hanya untuk admin!');
            redirect('penjualan');
        }
        $data =[
            'stokid' => $this->input->post('stokid'),
            'nama_barang' => $this->input->post('nama_barang'),
            'satuan' => $this->input->post('satuan'),
            'kategori' => $this->input->post('kategori'),
            'harga_modal' => $this->input->post('harga_modal'),
            'harga_jual' => $this->input->post('harga_jual'),
            'stok_masuk' => $this->input->post('stok_masuk'),
            'stok_minimal' => $this->input->post('stok_minimal'),
            ];
        if ($this->m_stok->tambah($data)){
            $this->session->set_flashdata('success','Data Stok <strong>Berhasil</strong> Ditambahkan!');
            redirect('stok');
        } else {
            $this->session->set_flashdata('error','Data Stok <strong>Gagal</strong> Ditambahkan!');
            redirect('stok');
        }
    }

    public function ubah($stokid)
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Ubah data hanya untuk admin!');
            redirect('stok');
        }
        $this->data['title'] = 'Ubah Stok';
        $this->data['stok'] = $this->m_stok->lihat_id($stokid);

        $this->load->view('master/stok/detail', $this->data);
    }

    public function proses_ubah($stokid)
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Ubah data hanya untuk admin!');
            redirect('stok');
        }

        $data = [
            'stokid' => $this->input->post('stokid'),
            'nama_barang' => $this->input->post('nama_barang'),
            'satuan' => $this->input->post('satuan'),
            'kategori' => $this->input->post('kategori'),
            'harga_modal' => $this->input->post('harga_modal'),
            'harga_jual' => $this->input->post('harga_jual'),
            'stok_masuk' => $this->input->post('stok_masuk'),
            'stok_minimal' => $this->input->post('stok_minimal'),
        ];

        if ($this->m_stok->ubah($data, $stokid)){
            $this->session->set_flashdata('success','Data Stok <strong>Berhasil</strong> Diubah!');
            redirect('stok');
        }
    }

    public function hapus($stokid)
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Hapus data hanya untuk admin!');
            redirect('stok');
        }

        if ($this->m_stok->hapus($stokid)){
            $this->session->set_flashdata('success','Data Stok <strong>Berhasil</strong> Dihapus!');
            redirect('stok');  
        } else {
            $this->session->set_flashdata('error','Data Stok <strong>Gagal</strong> Ditambahkan!');
            redirect('detail');
        }
    }

    public function export()
    {
        $dompdf = new Dompdf();
        $this->data['all_stok'] = $this->m_stok->lihat();
        $this->data['title'] = 'Laporan Daftar Stok';
        $this->data['no'] = 1;

        $dompdf->setPaper('A4','Landscape');
        $html = $this->load->view('stok/report', $this->data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Daftar Stok Tanggal ' . date('d F Y'), array("Attachment" => false));
    }
}

?>