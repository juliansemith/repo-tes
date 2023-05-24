<?php

class Operator extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     // cek session login, jika session status tidak sama dengan session admin_login, maka halaman akan redirect ke halaman login
    //     if ($this->session->userdata('status') != "admin_login") {
    //         redirect(base_url() . 'login?alert=belum_login');
    //     }
    // }

    public function index()
    {
        $data_session['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $data['judul'] = "Dashboard - UPTD Labkesda | Dinas Kesehatan";
        $data['title'] = "Dashboard";
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data_session);
        $this->load->view('operator/index');
        $this->load->view('templates/v_footer', $data);
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'login?alert=logout');
    }
}
