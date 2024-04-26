<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Progres extends CI_Controller {

public $Progres_model; // Tambahkan baris ini

public function __construct() {
    parent::__construct();
    // Memuat model
    $this->load->model('menu_model', 'menu');
    $this->load->model('Progres_model');
    $this->Progres_model = new Progres_model(); // Inisialisasi model
    $this->load->library('session'); // Memuat library session
}

public function index() {
    
    $this->load->model('Progres_model'); // Pastikan nama model ini benar
    $data['data_siswa'] = $this->Progres_model->get_all_siswa(); // Metode 'get_all_siswa' harus ada di model Anda
    $data['title']		= 'Progres';
    $data['page']		= 'progres/index';// Sesuaikan path sesuai dengan struktur direktori Anda
    $this->load->view('back/layouts/main', $data);
}

public function add() {
    // Cek jika metode yang digunakan adalah POST
    if ($this->input->server('REQUEST_METHOD') === 'POST') {
        // Ambil data dari form
        $namaSiswa = $this->input->post('namaSiswa');
        $kelas = $this->input->post('kelas');
        $progresHafalan = $this->input->post('progresHafalan');

        // Data array untuk insert
        $data = array(
            'nama_siswa' => $namaSiswa,
            'kelas' => $kelas,
            'progres_hafalan' => $progresHafalan
        );

        // Simpan data ke database melalui model
        if ($this->Progres_model->insert_data($data)) {
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan data.');
        }

        // Redirect ke halaman yang diinginkan
        redirect('progres/index');
    }
}

public function update_data() {
    $id = $this->input->post('id');
    $namaSiswa = $this->input->post('namaSiswa');
    $kelas = $this->input->post('kelas');
    $progresHafalan = $this->input->post('progresHafalan');

    $this->load->model('Progres_model');
    $this->Progres_model->update_data($id, $namaSiswa, $kelas, $progresHafalan);

    // Redirect or show success message
    redirect('progres/index');
}



}