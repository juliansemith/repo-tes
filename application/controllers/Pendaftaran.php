<?php

class Pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if ($this->session->userdata('status') != "pakar_login") {
        //     redirect(base_url() . 'login?alert=belum_login');
        // }
        // load model kerusakan
        $this->load->model('M_data');
    }

    public function index()
    {
        $data_session['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $data['judul'] = "Pendaftaran Pemeriksaan Sampel";
        $data['pendaftaran'] = $this->M_data->get_data('pemeriksaan_sampel')->result_array();
        if ($this->input->post('keyword')) {
            $data['pendaftaran'] = $this->M_data->cari_kerusakan();
        }
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data_session);
        $this->load->view('pendaftaran/index');
        $this->load->view('templates/v_footer', $data);
    }

    public function tambah_aksi()
    {
        $nomor_regis = $this->input->post('nomor_regis');
        $nama_customer = $this->input->post('nama_customer');
        $alamat_customer = $this->input->post('alamat_customer');
        $tgl_regis = $this->input->post('tgl_regis');
        $operator_penerima = $this->input->post('operator_penerima');
        $parameter = $this->input->post('parameter');
        $qty = $this->input->post('qty');
        $tarif = $this->input->post('tarif');
        $jumlah = $this->input->post('jumlah');

        $data = array(
            'nomor_regis' => $nomor_regis,
            'nama_customer' => $nama_customer,
            'alamat_customer' => $alamat_customer,
            'tgl_regis' => $tgl_regis,
            'operator_penerima' => $operator_penerima,
            'parameter' => $parameter,
            'qty' => $qty,
            'tarif' => $tarif,
            'jumlah' => $jumlah,

        );

        // insert ke database
        $this->M_data->insert_data($data, 'pemeriksaan_sampel');

        // alihkan ke halaman kerusakan
        $this->session->set_flashdata('flash', ' ditambahkan.');
        redirect(base_url() . 'pendaftaran');
    }

    public function edit($id)
    {
        // mengambil session
        $data_session['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $where = array('nomor_regis' => $id);

        $data['judul'] = "Edit Data Pemeriksaan Sampel | UPTD Labkesda";
        // mengambil data dari db sesuai id
        $data['alat'] = $this->M_data->edit_data($where, 'pemeriksaan_sampel')->result_array();
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data_session);
        $this->load->view('pendaftaran/edit');
        $this->load->view('templates/v_footer', $data);
    }


    public function hapus($id)
    {
        $where = array(
            'nomor_regis' => $id
        );

        // hapus data gejala dari db sesuai id
        $this->M_data->delete_data($where, 'pemeriksaan_sampel');

        // redirect kembali ke halaman gejala
        $this->session->set_flashdata('flash', ' dihapus.');
        redirect(base_url() . 'pendaftaran');
    }
}
