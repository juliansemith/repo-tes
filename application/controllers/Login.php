<?php

#[AllowDynamicProperties]
class Login extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    // }

    // menampilkan halaman login
    public function index()
    {
        $data['judul'] = "Login | UPTD Labkesda Lhokseumawe";
        $this->load->view('templates/login_header', $data);
        $this->load->view('templates/login', $data);
        $this->load->view('templates/login_footer');
    }

    // validasi login
    public function login_aksi()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $sebagai = $this->input->post('sebagai');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() != false) {
            $where = array(
                'username' => $username,
                'password' => sha1($password)
            );


            $cek = $this->M_data->cek_login('pengguna', $where)->num_rows();
            $data = $this->M_data->cek_login('pengguna', $where)->row();

            if ($cek > 0) {
                $data_session = array(
                    'id' => $data->id,
                    'username' => $data->username,
                    'status' => 'op_login'
                );

                $this->session->set_userdata($data_session);

                redirect(base_url() . 'operator');
            } else {
                redirect(base_url() . 'login?alert=gagal');
            }
        } else {
            $this->load->view('login');
        }
    }
}
