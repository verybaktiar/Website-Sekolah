<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PrestasiSiswaNon extends CI_Controller
{

    public $PrestasiSiswaNon_model; // Tambahkan baris ini

    public function __construct()
    {
        parent::__construct();
        // Memuat model
        $this->load->model('menu_model', 'menu');
        $this->load->model('PrestasiSiswaNon_model');
        $this->load->library('session'); // Memuat library session
    }
    public function index()
    {

        $this->load->model('PrestasiSiswaNon_model'); // Pastikan nama model ini benar
        $data['data_siswa'] = $this->PrestasiSiswaNon_model->get_all_siswa();
        // $data['data_siswa'] = $this->Progres_model->get_all_siswa(); // Metode 'get_all_siswa' harus ada di model Anda
        $data['title']        = 'Prestasi';
        $data['page']        = 'prestasisiswanon/index'; // Sesuaikan path sesuai dengan struktur direktori Anda
        $this->load->view('back/layouts/main', $data);
    }
    public function add()
    {

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Ambil data dari form
            
            $namasiswa = $this->input->post('namasiswa');
            $bidanglomba = $this->input->post('bidanglomba');
            $namalomba = $this->input->post('namalomba');
            $tingkatlomba = $this->input->post('tingkatlomba');
            $tanggal = $this->input->post('tanggal');
            $penyelenggara = $this->input->post('penyelenggara');
            $peringkat = $this->input->post('peringkat');

            // Data array untuk insert
            $data = array(
                'namasiswa' => $namasiswa,
                'bidanglomba' => $bidanglomba,
                'namalomba' => $namalomba,
                'tingkatlomba' => $tingkatlomba,
                'tanggal' => $tanggal,
                'penyelenggara' => $penyelenggara,
                'peringkat' => $peringkat
            );

            // Simpan data ke database melalui model
            if ($this->PrestasiSiswaNon_model->insert_data($data)) {
                $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan data.');
            }

            // Redirect ke halaman yang diinginkan
            redirect('prestasisiswanon/index');
        }
    }

    public function update_data()
    {

        $id_siswa = $this->input->post('id_siswa');
        $namasiswa = $this->input->post('namasiswa');
        $bidanglomba = $this->input->post('bidanglomba');
        $namalomba = $this->input->post('namalomba');
        $tingkatlomba = $this->input->post('tingkatlomba');
        $tanggal = $this->input->post('tanggal');
        $penyelenggara = $this->input->post('penyelenggara');
        $peringkat = $this->input->post('peringkat');

        $this->load->model('PrestasiSiswaNon_model');
        $this->PrestasiSiswaNon_model->update_data($id_siswa, $namasiswa, $bidanglomba, $namalomba, $tingkatlomba, $tanggal, $penyelenggara, $peringkat);

        // Redirect or show success message
        redirect('prestasisiswanon/index');
    }

    public function delete($id)
    {
        $this->load->model('PrestasiSiswaNon_model');
        if ($this->PrestasiSiswaNon_model->delete_data($id)) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus.');
        }
        redirect('prestasisiswanon');
    }
}
