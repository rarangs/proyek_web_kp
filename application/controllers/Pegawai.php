<?php

use Dompdf\Dompdf;

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->login['role'] != 'kasir' && $this->session->login['role'] != 'admin') redirect();
        $this->data['aktif'] = 'pegawai';
        $this->load->model('M_pegawai','m_pegawai');
    }

    public function index()
    {
        $this->data['title'] = 'Daftar Pegawai';
        $this->data['all_pegawai'] = $this->m_pegawai->lihat();
        $this->data['no'] = 1;

        $this->load->view('master/pegawai/lihat',$this->data);
    }

    public function tambah()
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Tambah data hanya untuk admin!');
            redirect('penjualan');
        }
        $this->data['title'] = 'Tambah Data Pegawai';

        $this->load->view('pegawai/tambah',$this->data);
    }

    public function proses_tambah()
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Tambah data hanya untuk admin!');
            redirect('penjualan');
        }
        $data =[
            'id_pegawai' => $this->input->post('id_pegawai'),
            'nama_pegawai' => $this->input->post('nama_pegawai'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp'),
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
            'tanggal_resign' => $this->input->post('tanggal_resign'),
            'nama_bank' => $this->input->post('nama_bank'),
            'no_rek' => $this->input->post('no_rek'),
            'gapok' => $this->input->post('gapok'),
            'uang_makan' => $this->input->post('uang_makan'),
            'persentase' => $this->input->post('persentase'),
        ];
        if ($this->m_pegawai->tambah($data)){
            $this->session->set_flashdata('success','Data Pegawai <strong>Berhasil</strong> Ditambahkan!');
            redirect('pegawai');
        } else {
            $this->session->set_flashdata('error','Data Pegawai <strong>Gagal</strong> Ditambahkan!');
            redirect('pegawai');
        }
    }

    public function ubah($id_pegawai)
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Ubah data hanya untuk admin!');
            redirect('pegawai');
        }
        $this->data['title'] = 'Ubah Pegawai';
        $this->data['pegawai'] = $this->m_pegawai->lihat_id($id_pegawai);

        $this->load->view('master/pegawai/detail', $this->data);
    }

    public function proses_ubah($id_pegawai)
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Ubah data hanya untuk admin!');
            redirect('pegawai');
        }

        $data = [
            'nama_pegawai' => $this->input->post('nama_pegawai'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp'),
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
            'tanggal_resign' => $this->input->post('tanggal_resign'),
            'nama_bank' => $this->input->post('nama_bank'),
            'no_rek' => $this->input->post('no_rek'),
            'gapok' => $this->input->post('gapok'),
            'uang_makan' => $this->input->post('uang_makan'),
            'persentase' => $this->input->post('persentase'),
        ];

        if ($this->m_pegawai->ubah($data, $id_pegawai)){
            $this->session->set_flashdata('success','Data Pegawai <strong>Berhasil</strong> Diubah!');
            redirect('pegawai');
        }
    }

    public function hapus($id_pegawai)
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Hapus data hanya untuk admin!');
            redirect('penjualan');
        }

        if ($this->m_pegawai->hapus($id_pegawai)){
            $this->session->set_flashdata('success','Data Pegawai <strong>Berhasil</strong> Dihapus!');
            redirect('pegawai');  
        } else {
            $this->session->set_flashdata('error','Data Pegawai <strong>Gagal</strong> Ditambahkan!');
            redirect('detail_pegawai');
        }
    }

    public function export()
    {
        $dompdf = new Dompdf();
        $this->data['all_pegawai'] = $this->m_pegawai->lihat();
        $this->data['title'] = 'Laporan Daftar Pegawai';
        $this->data['no'] = 1;

        $dompdf->setPaper('A4','Landscape');
        $html = $this->load->view('pegawai/report', $this->data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Daftar Pegawai Tanggal ' . date('d F Y'), array("Attachment" => false));
    }
}

?>