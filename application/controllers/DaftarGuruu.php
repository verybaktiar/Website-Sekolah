<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DaftarGuruu extends CI_Controller
{

    public $Guru_model; // Tambahkan baris ini

    public function __construct()
    {
        parent::__construct();
        // Memuat model
        $this->load->model('menu_model', 'menu');
        $this->load->model('Guru_model');
        $this->load->library('session'); // Memuat library session
    }
    public function index()
    {

        $this->load->model('Guru_model'); // Pastikan nama model ini benar
        $data['data_guru'] = $this->Guru_model->get_all_guru();
        // $data['data_siswa'] = $this->Progres_model->get_all_siswa(); // Metode 'get_all_siswa' harus ada di model Anda
        $data['title']        = 'Data Guru';
        $data['page']        = 'guru/index'; // Sesuaikan path sesuai dengan struktur direktori Anda
        $this->load->view('front/layouts/main', $data);
    }
}
