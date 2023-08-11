<?php 

class Login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        if($this->session->login) redirect('dashboard');
        // $this->load->model('M_kasir','m_kasir');
        $this->load->model('M_user','m_user');
    }
    public function index(){
        $this->load->view('login');
    }
    public function proses_login(){
        // if($this->input->post('role') === 'kasir') $this->_proses_login_kasir($this->input->post('username'));
        if($this->input->post('role') === 'admin') $this->_proses_login_admin($this->input->post('username'));
        else{
            ?>
            <script>
                alert('role tidak tersedia!')
            </script>
            <?php
        }
    }
    // protected function _proses_login_kasir($username){
    //     $get_kasir = $this->m_kasir->lihat_username($username);
    //     if($get_kasir){
    //         if($get_kasir->password_kasir == $this->input->post('password')){
    //             $session = [
    //                 'kode' => $get_kasir->kode_kasir,
    //                 'nama' => $get_kasir->nama_kasir,
    //                 'username' => $get_kasir->username_kasir,
    //                 'password' => $get_kasir->password_kasir,
    //                 'role' => $this->input->post('role'),
    //                 'jam_masuk' => date('H:i:s')
    //             ];
    //             $this->session->set_userdata('login',$session);
    //             $this->session->set_flashdata('success','<strong>Login</strong> Berhasil!');
    //             redirect('dashboard');
    //         } else {
    //             $this->session->set_flashdata('error','Password Salah!');
    //             redirect();
    //         }
    //     } else {
    //         $this->session->set_flashdata('error','Username Salah!');
    //         redirect();
    //     }
    // }
    protected function _proses_login_admin($username){
        $get_pengguna = $this->m_user->lihat_username($username);
        if($get_pengguna){
            if($get_pengguna->password == $this->input->post('password')){
                $session = [
                    'id_user' => $get_pengguna->id_user,
                    'nama' => $get_pengguna->username,
                    'username' => $get_pengguna->username,
                    'password' => $get_pengguna->password,
                    'role' => $this->input->post('role'),
                    'jam_masuk' => date('H:i:s')
                ];
                $this->session->set_userdata('login',$session);
                $this->session->set_flashdata('success','<strong>Login</strong> Berhasil!');
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error','Password Salah!');
                redirect();
            }
        } else {
            $this->session->set_flashdata('error','Username Salah!');
            redirect();
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        // null the session (just in case):
        $this->session->set_userdata(array('id_user' => '', 'username' => '', 'password' => ''));
        var_dump($this->session->userdata()); die;
        redirect();
    }
}
?>