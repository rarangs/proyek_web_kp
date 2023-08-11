<?php

use Dompdf\Dompdf;

class Diskon extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->login['role'] != 'kasir' && $this->session->login['role'] != 'admin') redirect();
        $this->data['aktif'] = 'diskon';
        $this->load->model('M_diskon','m_diskon');
    }

    public function index()
    {
        $this->data['title'] = 'Data Diskon';
        $this->data['all_diskon'] = $this->m_diskon->lihat();
        $this->data['no'] = 1;

        $this->load->view('master/diskon/lihat',$this->data);
    }

    public function tambah()
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Tambah data hanya untuk admin!');
            redirect('penjualan');
        }
        $this->data['title'] = 'Tambah Data Diskon';

        $this->load->view('diskon/tambah',$this->data);
    }

    public function proses_tambah()
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Tambah data hanya untuk admin!');
            redirect('penjualan');
        }
        $data =[
            'id_diskon' => $this->input->post('id_diskon'),
            'nama_diskon' => $this->input->post('nama_diskon'),
            'jenis_diskon' => $this->input->post('jenis_diskon'),
            'harga_diskon' => $this->input->post('harga_diskon'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        if ($this->m_diskon->tambah($data)){
            $this->session->set_flashdata('success','Data Diskon <strong>Berhasil</strong> Ditambahkan!');
            redirect('diskon');
        } else {
            $this->session->set_flashdata('error','Data Diskon <strong>Gagal</strong> Ditambahkan!');
            redirect('diskon');
        }
    }

    public function ubah($id_diskon)
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Ubah data hanya untuk admin!');
            redirect('penjualan');
        }
        $this->data['title'] = 'Ubah Diskon';
        $this->data['diskon'] = $this->m_diskon->lihat_id($id_diskon);

        $this->load->view('master/diskon/detail', $this->data);
    }

    public function proses_ubah($id_diskon)
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Ubah data hanya untuk admin!');
            redirect('penjualan');
        }

        $data = [
            'id_diskon' => $this->input->post('id_diskon'),
            'nama_diskon' => $this->input->post('nama_diskon'),
            'jenis_diskon' => $this->input->post('jenis_diskon'),
            'harga_diskon' => $this->input->post('harga_diskon'),
            'keterangan' => $this->input->post('keterangan'),
        ];

        if ($this->m_diskon->ubah($data, $id_diskon)){
            $this->session->set_flashdata('success','Data Diskon <strong>Berhasil</strong> Diubah!');
            redirect('diskon');
        }
    }

    public function hapus($id_diskon)
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Hapus data hanya untuk admin!');
            redirect('penjualan');
        }

        if ($this->m_diskon->hapus($id_diskon)){
            $this->session->set_flashdata('success','Data Diskon <strong>Berhasil</strong> Dihapus!');
            redirect('diskon');  
        } else {
            $this->session->set_flashdata('error','Data Diskon <strong>Gagal</strong> Ditambahkan!');
            redirect('diskon');
        }
    }

    public function export()
    {
        $dompdf = new Dompdf();
        $this->data['all_diskon'] = $this->m_diskon->lihat();
        $this->data['title'] = 'Laporan Data Diskon';
        $this->data['no'] = 1;

        $dompdf->setPaper('A4','Landscape');
        $html = $this->load->view('diskon/report', $this->data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Data Diskon Tanggal ' . date('d F Y'), array("Attachment" => false));
    }
}

?>