<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

    public $Siswa_model; // Tambahkan baris ini

    public function __construct()
    {
        parent::__construct();
        // Memuat model
        // Memuat library input
        $this->load->model('menu_model', 'menu');
        $this->load->model('Siswa_model');
        $this->load->library('session'); // Memuat library session
    }
    public function index()
    {
        $kelas = $this->input->post('kelas'); // Mengambil parameter kelas dari query string
        $this->load->model('Siswa_model');
        $data['data_siswa'] = $this->Siswa_model->get_data_by_kelas($kelas);

        if (!empty($kelas)) {
            $data['data_siswa'] = $this->Siswa_model->get_by_kelas($kelas); // Memuat data berdasarkan kelas
        } else {
            $data['data_siswa'] = $this->Siswa_model->get_all_siswa(); // Memuat semua data pelajaran jika tidak ada filter kelas
        }
        // $data['data_guru'] = $this->JadwalPelajaran_model->get_all_jadwal();
        $data['data_siswa'] = $this->Siswa_model->get_all_siswa(); // Metode 'get_all_siswa' harus ada di model Anda
        $data['title']        = 'Data Siswa';
        $data['page']        = 'siswa/index'; // Sesuaikan path sesuai dengan struktur direktori Anda
        $this->load->view('back/layouts/main', $data);
    }
    public function add() {
        // Cek jika metode yang digunakan adalah POST
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Ambil data dari form
            $namasiswa = $this->input->post('nama_siswa');
            $kelas = $this->input->post('kelas');
        
    
            // Data array untuk insert
            $data = array(
                'nama_siswa' => $namasiswa,
                'kelas' => $kelas,
                
            );
    
            // Simpan data ke database melalui model
            if ($this->Siswa_model->insert_data($data)) {
                $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan data.');
            }
    
            // Redirect ke halaman yang diinginkan
            redirect('siswa/index');
        }
    }
    public function filter()
    {
        $selected_kelas = $this->input->get('kelas');

        // Lakukan pengambilan data dari model berdasarkan kelas yang dipilih
        $data['data_siswa'] = $this->Siswa_model->get_data_by_kelas($selected_kelas);

        $data['page']        = 'siswa/index'; // Sesuaikan path sesuai dengan struktur direktori Anda
        $this->load->view('back/layouts/main', $data);
    }

    
}
