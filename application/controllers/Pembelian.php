<?php

use Dompdf\Dompdf;

class Pembelian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->login['role'] != 'kasir' && $this->session->login['role'] != 'admin') redirect();
        $this->data['aktif'] = 'pembelian';
        $this->load->model('M_pembelian','m_pembelian');
    }

    public function index()
    {
        $this->data['title'] = 'Riwayat Pembelian';
        $this->data['all_pembelian'] = $this->m_pembelian->lihat();
        $this->data['no'] = 1;

        $this->load->view('pembelian/lihat',$this->data);
    }

    public function tambah()
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Tambah data hanya untuk admin!');
            redirect('penjualan');
        }
        $this->data['title'] = 'Tambah Data Pembelian';

        $this->load->view('pembelian/tambah',$this->data);
    }

    public function proses_tambah()
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Tambah data hanya untuk admin!');
            redirect('penjualan');
        }
        $data =[
            'no_faktur' => $this->input->post('no_faktur'),
            'total_item' => $this->input->post('total_item'),
            'user' => $this->input->post('user'),
            'tgl_beli' => $this->input->post('tgl_beli'),
            'total' => $this->input->post('total'),
        ];
        if ($this->m_pembelian->tambah($data)){
            $this->session->set_flashdata('success','Data Pembelian <strong>Berhasil</strong> Ditambahkan!');
            redirect('pembelian');
        } else {
            $this->session->set_flashdata('error','Data Pembelian <strong>Gagal</strong> Ditambahkan!');
            redirect('pembelian');
        }
    }

    public function ubah($no_faktur)
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Ubah data hanya untuk admin!');
            redirect('pembelian');
        }
        $this->data['title'] = 'Ubah Pembelian';
        $this->data['pembelian'] = $this->m_pembelian->lihat_id($no_faktur);

        $this->load->view('master/pembelian/detail', $this->data);
    }

    public function proses_ubah($no_faktur)
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Ubah data hanya untuk admin!');
            redirect('pembelian');
        }

        $data = [
            'no_faktur' => $this->input->post('no_faktur'),
            'total_item' => $this->input->post('total_item'),
            'user' => $this->input->post('user'),
            'tgl_beli' => $this->input->post('tgl_beli'),
            'total' => $this->input->post('total'),
        ];

        if ($this->m_pembelian->ubah($data, $no_faktur)){
            $this->session->set_flashdata('success','Data Pembelian <strong>Berhasil</strong> Diubah!');
            redirect('pembelian');
        }
    }

    public function hapus($no_faktur)
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Hapus data hanya untuk admin!');
            redirect('pembelian');
        }

        if ($this->m_pembelian->hapus($no_faktur)){
            $this->session->set_flashdata('success','Data Pembelian <strong>Berhasil</strong> Dihapus!');
            redirect('pembelian');  
        } else {
            $this->session->set_flashdata('error','Data Pembelian <strong>Gagal</strong> Ditambahkan!');
            redirect('pembelian');
        }
    }

    public function export()
    {
        $dompdf = new Dompdf();
        $this->data['all_pembelian'] = $this->m_pembelian->lihat();
        $this->data['title'] = 'Laporan Data Pembelian';
        $this->data['no'] = 1;

        $dompdf->setPaper('A4','Landscape');
        $html = $this->load->view('pembelian/report', $this->data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Data Pembelian Tanggal ' . date('d F Y'), array("Attachment" => false));
    }
}

?>