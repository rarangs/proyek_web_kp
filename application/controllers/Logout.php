<?php

Class Logout extends CI_Controller{
    public function index()
    {
        $this->session->sess_destroy();
        // null the session (just in case):
       // $this->session->set_userdata(array('kode' => '', 'nama' => '', 'username' => '', 'password' => '', 'role' => '', 'jam_masuk' => ''));
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        //var_dump($this->session->userdata()); die;
        redirect();
    }
}
?>