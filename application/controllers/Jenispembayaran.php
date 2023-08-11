<?php

use Dompdf\Dompdf;

class Jenispembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->login['role'] != 'kasir' && $this->session->login['role'] != 'admin') redirect();
        $this->data['aktif'] = 'jenis_pembayaran';
        $this->load->model('M_jenis_pembayaran','m_jenis_pembayaran');
    }

    public function index()
    {
        $this->data['title'] = 'Data Jenis Pembayaran';
        $this->data['all_jenis_pembayaran'] = $this->m_jenis_pembayaran->lihat();
        $this->data['no'] = 1;

        $this->load->view('master/jenispembayaran',$this->data);
    }

    public function tambah()
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Tambah data hanya untuk admin!');
            redirect('penjualan');
        }
        $this->data['title'] = 'Tambah Jenis Pembayaran';

        $this->load->view('jenispembayaran/tambah',$this->data);
    }

    public function proses_tambah()
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Tambah data hanya untuk admin!');
            redirect('penjualan');
        }
        $data =[
            'id_pembayaran' => $this->input->post('id_pembayaran'),
            'jenis_pembayaran' => $this->input->post('jenis_pembayaran'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        if ($this->m_jenis_pembayaran->tambah($data)){
            $this->session->set_flashdata('success','Data Jenis Pembayaran <strong>Berhasil</strong> Ditambahkan!');
            redirect('jenispembayaran');
        } else {
            $this->session->set_flashdata('error','Data Jenis Pembayaran <strong>Gagal</strong> Ditambahkan!');
            redirect('jenispembayaran');
        }
    }

    public function ubah($id_pembayaran)
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Ubah data hanya untuk admin!');
            redirect('penjualan');
        }
        $this->data['title'] = 'Ubah Jenis Pembayaran';
        $this->data['jenis_pembayaran'] = $this->m_jenis_pembayaran->lihat_id($id_pembayaran);

        $this->load->view('jenispembayaran/ubah', $this->data);
    }

    public function proses_ubah($id_pembayaran)
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Ubah data hanya untuk admin!');
            redirect('penjualan');
        }

        $data = [
            'id_pembayaran' => $this->input->post('id_pembayaran'),
            'jenis_pembayaran' => $this->input->post('jenis_pembayaran'),
            'keterangan' => $this->input->post('keterangan'),
        ];

        if ($this->m_jenis_pembayaran->ubah($data, $id_pembayaran)){
            $this->session->set_flashdata('success','Data Jenis Pembayaran <strong>Berhasil</strong> Diubah!');
            redirect('jenispembayaran');
        }
    }

    public function hapus($id_pembayaran)
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Hapus data hanya untuk admin!');
            redirect('penjualan');
        }

        if ($this->m_jenis_pembayaran->hapus($id_pembayaran)){
            $this->session->set_flashdata('success','Data Jenis Pembayaran <strong>Berhasil</strong> Dihapus!');
            redirect('jenispembayaran');  
        } else {
            $this->session->set_flashdata('error','Data Jenis Pembayaran <strong>Gagal</strong> Ditambahkan!');
            redirect('jenispembayaran');
        }
    }

    public function export()
    {
        $dompdf = new Dompdf();
        $this->data['all_jenis_pembayaran'] = $this->m_jenis_pembayaran->lihat();
        $this->data['title'] = 'Laporan Jenis Pembayaran';
        $this->data['no'] = 1;

        $dompdf->setPaper('A4','Landscape');
        $html = $this->load->view('user/report', $this->data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Data User Tanggal ' . date('d F Y'), array("Attachment" => false));
    }
}

?>