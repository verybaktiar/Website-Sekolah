<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PrestasiGuru extends CI_Controller
{

    public $PrestasiGuru_model; // Tambahkan baris ini

    public function __construct()
    {
        parent::__construct();
        // Memuat model
        $this->load->model('menu_model', 'menu');
        $this->load->model('PrestasiGuru_model');
        $this->load->library('session'); // Memuat library session
    }
    public function index()
    {

        $this->load->model('PrestasiGuru_model'); // Pastikan nama model ini benar
        $data['data_guru'] = $this->PrestasiGuru_model->get_all_guru();
        // $data['data_siswa'] = $this->Progres_model->get_all_siswa(); // Metode 'get_all_siswa' harus ada di model Anda
        $data['title']        = 'Prestasi';
        $data['page']        = 'prestasiguru/index'; // Sesuaikan path sesuai dengan struktur direktori Anda
        $this->load->view('back/layouts/main', $data);
    }
    public function add()
    {

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Ambil data dari form
            $namaguru = $this->input->post('namaguru');
            $bidangkegiatan = $this->input->post('bidangkegiatan');
            $namakegiatan = $this->input->post('namakegiatan');
            $tingkatkegiatan = $this->input->post('tingkatkegiatan');
            $tanggal = $this->input->post('tanggal');
            $penyelenggara = $this->input->post('penyelenggara');
            $keterangan = $this->input->post('keterangan');

            // Data array untuk insert
            $data = array(
                'namaguru' => $namaguru,
                'bidangkegiatan' => $bidangkegiatan,
                'namakegiatan' => $namakegiatan,
                'tingkatkegiatan' => $tingkatkegiatan,
                'tanggal' => $tanggal,
                'penyelenggara' => $penyelenggara,
                'keterangan' => $keterangan
            );

            // Simpan data ke database melalui model
            if ($this->PrestasiGuru_model->insert_data($data)) {
                $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan data.');
            }

            // Redirect ke halaman yang diinginkan
            redirect('prestasiguru/index');
        }
    }

    public function update_data()
    {

        $id_guru = $this->input->post('id_guru');
        $namaguru = $this->input->post('namaguru');
        $bidangkegiatan = $this->input->post('bidangkegiatan');
        $namakegiatan = $this->input->post('namakegiatan');
        $tingkatkegiatan = $this->input->post('tingkatkegiatan');
        $tanggal = $this->input->post('tanggal');
        $penyelenggara = $this->input->post('penyelenggara');
        $keterangan = $this->input->post('keterangan');

        $this->load->model('PrestasiGuru_model');
        $this->PrestasiGuru_model->update_data($id_guru, $namaguru, $bidangkegiatan, $namakegiatan, $tingkatkegiatan, $tanggal, $penyelenggara, $keterangan);

        // Redirect or show success message
        redirect('prestasiguru/index');
    }

    public function delete($id_guru)
    {
        $id_guru = $this->input->post('id_guru');

        if ($this->PrestasiGuru_model->delete($id_guru)) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data.');
        }

        redirect('prestasiguru/index');
    }
}
