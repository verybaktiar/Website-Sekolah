<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JadwalPelajaran extends CI_Controller
{

    public $JadwalPelajaran_model; // Tambahkan baris ini

    public function __construct()
    {
        parent::__construct();
        // Memuat model
        $this->load->model('menu_model', 'menu');
        $this->load->model('JadwalPelajaran_model');
        $this->load->library('session'); // Memuat library session
    }
    public function index()
    {

        $this->load->model('JadwalPelajaran_model'); // Pastikan nama model ini benar
        // $data['data_guru'] = $this->JadwalPelajaran_model->get_all_jadwal();
        $data['data_pelajaran'] = $this->JadwalPelajaran_model->get_all_pelajaran(); // Metode 'get_all_siswa' harus ada di model Anda
        $data['title']        = 'Jadwal Pelajaran';
        $data['page']        = 'jadwalpelajaran/index'; // Sesuaikan path sesuai dengan struktur direktori Anda
        $this->load->view('back/layouts/main', $data);
    }
    public function add()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Ambil data dari form
            $hari = $this->input->post('hari');
            $matapelajaran = $this->input->post('matapelajaran');
            $kelas = $this->input->post('kelas');
        

            // Data array untuk insert
            $data = array(
                'hari' => $hari,
                'matapelajaran' => $matapelajaran,
                'kelas' => $kelas,
               
            );

            // Simpan data ke database melalui model
            if ($this->JadwalPelajaran_model->insert_data($data)) {
                $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan data.');
            }

            // Redirect ke halaman yang diinginkan
            redirect('jadwalpelajaran/index');
        }

    }
}
