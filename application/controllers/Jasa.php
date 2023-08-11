<?php

use Dompdf\Dompdf;

class Jasa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->login['role'] != 'kasir' && $this->session->login['role'] != 'admin') redirect();
        $this->data['aktif'] = 'jasa';
        $this->load->model('M_jasa','m_jasa');
    }

    public function index()
    {
        $this->data['title'] = 'Daftar Layanan Jasa';
        $this->data['all_jasa'] = $this->m_jasa->lihat();
        $this->data['no'] = 1;

        $this->load->view('master/jasa/lihat',$this->data);
    }

    public function tambah()
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Tambah data hanya untuk admin!');
            redirect('penjualan');
        }
        $this->data['title'] = 'Tambah Data jasa';

        $this->load->view('jasa/tambah',$this->data);
    }

    public function proses_tambah()
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Tambah data hanya untuk admin!');
            redirect('penjualan');
        }
        $data =[
            'id_jasa' => $this->input->post('id_jasa'),
            'nama_jasa' => $this->input->post('nama_jasa'),
            'kategori_jasa' => $this->input->post('kategori_jasa'),
            'harga' => $this->input->post('harga'),
            'deskripsi' => $this->input->post('deskripsi'),
            ];
        if ($this->m_jasa->tambah($data)){
            $this->session->set_flashdata('success','Data Layanan Jasa <strong>Berhasil</strong> Ditambahkan!');
            redirect('jasa');
        } else {
            $this->session->set_flashdata('error','Data Layanan Jasa <strong>Gagal</strong> Ditambahkan!');
            redirect('jasa');
        }
    }

    public function ubah($id_jasa)
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Ubah data hanya untuk admin!');
            redirect('jasa');
        }
        $this->data['title'] = 'Ubah Jasa';
        $this->data['jasa'] = $this->m_jasa->lihat_id($id_jasa);

        $this->load->view('master/jasa/detail', $this->data);
    }

    public function proses_ubah($id_jasa)
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Ubah data hanya untuk admin!');
            redirect('jasa');
        }

        $data = [
            'id_jasa' => $this->input->post('id_jasa'),
            'nama_jasa' => $this->input->post('nama_jasa'),
            'kategori_jasa' => $this->input->post('kategori_jasa'),
            'harga' => $this->input->post('harga'),
            'deskripsi' => $this->input->post('deskripsi'),
        ];

        if ($this->m_jasa->ubah($data, $id_jasa)){
            $this->session->set_flashdata('success','Data jasa <strong>Berhasil</strong> Diubah!');
            redirect('jasa');
        }
    }

    public function hapus($id_jasa)
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Hapus data hanya untuk admin!');
            redirect('jasa');
        }

        if ($this->m_jasa->hapus($id_jasa)){
            $this->session->set_flashdata('success','Data Jasa Layanan <strong>Berhasil</strong> Dihapus!');
            redirect('jasa');  
        } else {
            $this->session->set_flashdata('error','Data Jasa Layanan <strong>Gagal</strong> Ditambahkan!');
            redirect('jasa');
        }
    }

    public function export()
    {
        $dompdf = new Dompdf();
        $this->data['all_jasa'] = $this->m_jasa->lihat();
        $this->data['title'] = 'Laporan Layanan Jasa';
        $this->data['no'] = 1;

        $dompdf->setPaper('A4','Landscape');
        $html = $this->load->view('jasa/report', $this->data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Layanan Jasa Tanggal ' . date('d F Y'), array("Attachment" => false));
    }
}

?>