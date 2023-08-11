<?php

use Dompdf\Dompdf;

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->login['role'] != 'kasir' && $this->session->login['role'] != 'admin') redirect();
        $this->data['aktif'] = 'pelanggan';
        $this->load->model('M_pelanggan','m_pelanggan');
    }

    public function index()
    {
        $this->data['title'] = 'Daftar Pelanggan';
        $this->data['all_pelanggan'] = $this->m_pelanggan->lihat();
        $this->data['no'] = 1;

        $this->load->view('master/pelanggan/lihat',$this->data);
    }

    public function tambah()
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Tambah data hanya untuk admin!');
            redirect('penjualan');
        }
        $this->data['title'] = 'Tambah Data Pelanggan';

        $this->load->view('pelanggan/tambah',$this->data);
    }

    public function proses_tambah()
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Tambah data hanya untuk admin!');
            redirect('penjualan');
        }
        $data =[
            'id_cust' => $this->input->post('id_cust'),
            'nama_cust' => $this->input->post('nama_cust'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'no_telp' => $this->input->post('no_telp'),
            'alamat' => $this->input->post('alamat'),
            'register_date' => $this->input->post('register_date'),
            ];
        if ($this->m_pelanggan->tambah($data)){
            $this->session->set_flashdata('success','Data Pelanggan <strong>Berhasil</strong> Ditambahkan!');
            redirect('pelanggan');
        } else {
            $this->session->set_flashdata('error','Data Pelanggan <strong>Gagal</strong> Ditambahkan!');
            redirect('pelanggan');
        }
    }

    public function ubah($id_cust)
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Ubah data hanya untuk admin!');
            redirect('pelanggan');
        }
        $this->data['title'] = 'Ubah Data Pelanggan';
        $this->data['pelanggan'] = $this->m_pelanggan->lihat_id($id_cust);

        $this->load->view('master/pelanggan/detail', $this->data);
    }

    public function proses_ubah($id_cust)
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Ubah data hanya untuk admin!');
            redirect('pelanggan');
        }

        $data = [
            'id_cust' => $this->input->post('id_cust'),
            'nama_cust' => $this->input->post('nama_cust'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'no_telp' => $this->input->post('no_telp'),
            'alamat' => $this->input->post('alamat'),
            'register_date' => $this->input->post('register_date'),
        ];

        if ($this->m_pelanggan->ubah($data, $id_cust)){
            $this->session->set_flashdata('success','Data Customer <strong>Berhasil</strong> Diubah!');
            redirect('pelanggan');
        }
    }

    public function hapus($id_cust)
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Hapus data hanya untuk admin!');
            redirect('pelanggan');
        }

        if ($this->m_pelanggan->hapus($id_cust)){
            $this->session->set_flashdata('success','Data Customer <strong>Berhasil</strong> Dihapus!');
            redirect('pelanggan');  
        } else {
            $this->session->set_flashdata('error','Data Customer <strong>Gagal</strong> Ditambahkan!');
            redirect('pelanggan');
        }
    }

    public function export()
    {
        $dompdf = new Dompdf();
        $this->data['all_pelanggan'] = $this->m_pelanggan->lihat();
        $this->data['title'] = 'Laporan Daftar Pelanggan';
        $this->data['no'] = 1;

        $dompdf->setPaper('A4','Landscape');
        $html = $this->load->view('pelanggan/report', $this->data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Daftar Pelanggan Tanggal ' . date('d F Y'), array("Attachment" => false));
    }
}

?>