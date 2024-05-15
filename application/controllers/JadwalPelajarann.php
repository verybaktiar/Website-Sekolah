<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JadwalPelajarann extends CI_Controller
{

    public $JadwalPelajaran_model; // Tambahkan baris ini

    public function __construct()
    {
        parent::__construct();
        // Memuat model
        // Memuat library input
        $this->load->model('menu_model', 'menu');
        $this->load->model('JadwalPelajaran_model');
        $this->load->library('session'); // Memuat library session
    }
    public function index()
    {
        $kelas = $this->input->post('kelas'); // Mengambil parameter kelas dari query string
        $this->load->model('jadwalpelajaran_model');
        $data['data_pelajaran'] = $this->jadwalpelajaran_model->get_data_by_kelas($kelas);

        if (!empty($kelas)) {
            $data['data_pelajaran'] = $this->JadwalPelajaran_model->get_by_kelas($kelas); // Memuat data berdasarkan kelas
        } else {
            $data['data_pelajaran'] = $this->JadwalPelajaran_model->get_all_pelajaran(); // Memuat semua data pelajaran jika tidak ada filter kelas
        }
        // $data['data_guru'] = $this->JadwalPelajaran_model->get_all_jadwal();
        $data['data_pelajaran'] = $this->JadwalPelajaran_model->get_all_pelajaran(); // Metode 'get_all_siswa' harus ada di model Anda
        $data['title']        = 'Jadwal Pelajaran';
        $data['page']        = 'jadwalpelajaran/index'; // Sesuaikan path sesuai dengan struktur direktori Anda
        $this->load->view('front/layouts/main', $data);
    }
    public function filter()
    {
        $selected_kelas = $this->input->get('kelas');
        $data['data_pelajaran'] = $this->JadwalPelajaran_model->get_all_pelajaran();
        // Lakukan pengambilan data dari model berdasarkan kelas yang dipilih
        $data['data_pelajaran'] = $this->JadwalPelajaran_model->get_data_by_kelas($selected_kelas);
        $data['title']        = 'Jadwal Pelajaran';
        $data['page']        = 'jadwalpelajaran/index'; // Sesuaikan path sesuai dengan struktur direktori Anda
        $this->load->view('front/layouts/main', $data);
    }

}
