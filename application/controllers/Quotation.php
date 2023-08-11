<?php

use Dompdf\Dompdf;

class Quotation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->login['role'] != 'finance' && $this->session->login['role'] != 'admin') redirect();
        $this->data['aktif'] = 'quotation';
        $this->load->model('M_quotation','m_quotation');
    }

    public function index()
    {
        $this->data['title'] = 'Quotation';
        $this->data['all_quotation'] = $this->m_quotation->lihat();
        $this->data['no'] = 1;

        $this->load->view('master/quotation',$this->data);
    }

    public function tambah()
    {
        if ($this->session->login['role'] == 'finance'){
            $this->session->set_flashdata('error','Tambah data hanya untuk admin!');
            redirect('dashboard');
        }
        $this->data['title'] = 'Tambah Quotation';

        $this->load->view('quotation/tambah',$this->data);
    }

    public function proses_tambah()
    {
        if ($this->session->login['role'] == 'finance'){
            $this->session->set_flashdata('error','Tambah data hanya untuk admin!');
            redirect('dashboard');
        }
        $data =[
            'q_no' => $this->input->post('q_no'),
            'id_cust' => $this->input->post('id_cust'),
            'creation_date' => $this->input->post('creation_date'),
            'expiration_date' => $this->input->post('expiration_date'),
            'payment_term' => $this->input->post('payment_term'),
            'status' => $this->input->post('status'),
            'total' => $this->input->post('total'),
        ];
        if ($this->quotation->tambah($data)){
            $this->session->set_flashdata('success','Quotation <strong>Berhasil</strong> Ditambahkan!');
            redirect('quotation');
        } else {
            $this->session->set_flashdata('error','Quotation <strong>Gagal</strong> Ditambahkan!');
            redirect('quotation');
        }
    }

    public function ubah($q_no)
    {
        if ($this->session->login['role'] == 'finance'){
            $this->session->set_flashdata('error','Ubah data hanya untuk admin!');
            redirect('dashboard');
        }
        $this->data['title'] = 'Ubah Quotation';
        $this->data['quotation'] = $this->quotation->lihat_id($q_no);

        $this->load->view('quotation/ubah', $this->data);
    }

    public function proses_ubah($q_no)
    {
        if ($this->session->login['role'] == 'finance'){
            $this->session->set_flashdata('error','Ubah data hanya untuk admin!');
            redirect('dashboard');
        }

        $data = [
            'q_no' => $this->input->post('q_no'),
            'id_cust' => $this->input->post('id_cust'),
            'creation_date' => $this->input->post('creation_date'),
            'expiration_date' => $this->input->post('expiration_date'),
            'payment_term' => $this->input->post('payment_term'),
            'status' => $this->input->post('status'),
            'total' => $this->input->post('total'),
        ];

        if ($this->quotation->ubah($data, $q_no)){
            $this->session->set_flashdata('success','Quotation <strong>Berhasil</strong> Diubah!');
            redirect('quotation');
        }
    }

    public function hapus($q_no)
    {
        if ($this->session->login['role'] == 'finance'){
            $this->session->set_flashdata('error','Hapus data hanya untuk admin!');
            redirect('dashboard');
        }

        if ($this->quotation->hapus($q_no)){
            $this->session->set_flashdata('success','Quotation <strong>Berhasil</strong> Dihapus!');
            redirect('quotation');  
        } else {
            $this->session->set_flashdata('error','Quotation <strong>Gagal</strong> Ditambahkan!');
            redirect('quotation');
        }
    }

    public function export()
    {
        $dompdf = new Dompdf();
        $this->data['all_quotation'] = $this->quotation->lihat();
        $this->data['title'] = 'Laporan Quotation';
        $this->data['no'] = 1;

        $dompdf->setPaper('A4','Landscape');
        $html = $this->load->view('quotation/report', $this->data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Quotation ' . date('d F Y'), array("Attachment" => false));
    }
}

?>