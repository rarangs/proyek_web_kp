<?php

use Dompdf\Dompdf;

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->login['role'] != 'kasir' && $this->session->login['role'] != 'admin') redirect();
        $this->data['aktif'] = 'user';
        $this->load->model('M_user','m_user');
    }

    public function index()
    {
        $this->data['title'] = 'Data User';
        $this->data['all_user'] = $this->m_user->lihat();
        $this->data['no'] = 1;

        $this->load->view('master/user',$this->data);
    }

    public function tambah()
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Tambah data hanya untuk admin!');
            redirect('penjualan');
        }
        $this->data['title'] = 'Tambah User';

        $this->load->view('user/tambah',$this->data);
    }

    public function proses_tambah()
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Tambah data hanya untuk admin!');
            redirect('penjualan');
        }
        $data =[
            'id_user' => $this->input->post('id_user'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
        ];
        if ($this->m_user->tambah($data)){
            $this->session->set_flashdata('success','Data User <strong>Berhasil</strong> Ditambahkan!');
            redirect('user');
        } else {
            $this->session->set_flashdata('error','Data User <strong>Gagal</strong> Ditambahkan!');
            redirect('user');
        }
    }

    public function ubah($id_user)
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Ubah data hanya untuk admin!');
            redirect('penjualan');
        }
        $this->data['title'] = 'Ubah User';
        $this->data['user'] = $this->m_user->lihat_id($id_user);

        $this->load->view('user/ubah', $this->data);
    }

    public function proses_ubah($id_user)
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Ubah data hanya untuk admin!');
            redirect('penjualan');
        }

        $data = [
            'id_user' => $this->input->post('id_user'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
        ];

        if ($this->m_user->ubah($data, $id_user)){
            $this->session->set_flashdata('success','Data User <strong>Berhasil</strong> Diubah!');
            redirect('user');
        }
    }

    public function hapus($id_user)
    {
        if ($this->session->login['role'] == 'kasir'){
            $this->session->set_flashdata('error','Hapus data hanya untuk admin!');
            redirect('penjualan');
        }

        if ($this->m_user->hapus($id_user)){
            $this->session->set_flashdata('success','Data User <strong>Berhasil</strong> Dihapus!');
            redirect('user');  
        } else {
            $this->session->set_flashdata('error','Data User <strong>Gagal</strong> Ditambahkan!');
            redirect('user');
        }
    }

    public function export()
    {
        $dompdf = new Dompdf();
        $this->data['all_user'] = $this->m_user->lihat();
        $this->data['title'] = 'Laporan Data User';
        $this->data['no'] = 1;

        $dompdf->setPaper('A4','Landscape');
        $html = $this->load->view('user/report', $this->data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Data User Tanggal ' . date('d F Y'), array("Attachment" => false));
    }
}

?>