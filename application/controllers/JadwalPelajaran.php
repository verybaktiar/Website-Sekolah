<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JadwalPelajaran extends CI_Controller
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
        $this->load->view('back/layouts/main', $data);
    }
    public function filter()
    {
        $selected_kelas = $this->input->get('kelas');

        // Lakukan pengambilan data dari model berdasarkan kelas yang dipilih
        $data['data_pelajaran'] = $this->JadwalPelajaran_model->get_data_by_kelas($selected_kelas);

        $data['page']        = 'jadwalpelajaran/index'; // Sesuaikan path sesuai dengan struktur direktori Anda
        $this->load->view('back/layouts/main', $data);
    }

    public function add()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $hari = $this->input->post('hari');
            $matapelajaran = $this->input->post('matapelajaran');
            $kelas = $this->input->post('kelas');

            // Menggabungkan semua mata pelajaran menjadi satu string dengan nomor urut dan newline sebagai pemisah
            $matapelajaran_string = '';
            foreach ($matapelajaran as $index => $mp) {
                $matapelajaran_string .= ($index + 1) . '. ' . $mp . "\n";
            }

            // Data array untuk insert
            $data = array(
                'hari' => $hari,
                'matapelajaran' => $matapelajaran_string,
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

    public function update_data()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id_pelajaran = $this->input->post('id_pelajaran'); // Pastikan Anda mengirimkan ID sebagai bagian dari form
            $hari = $this->input->post('hari');
            $matapelajaran = $this->input->post('matapelajaran');
            $kelas = $this->input->post('kelas');

            // Menggabungkan semua mata pelajaran menjadi satu string dengan nomor urut dan newline sebagai pemisah
            $matapelajaran_string = '';
            $matapelajaran_array = explode("\n", $matapelajaran);
            foreach ($matapelajaran_array as $index => $mp) {
                $matapelajaran_string .= ($index + 1) . '. ' . trim($mp) . "\n";
            }

            // Data array untuk update
            $data = array(
                'hari' => $hari,
                'matapelajaran' => $matapelajaran_string,
                'kelas' => $kelas,
            );

            // Update data ke database melalui model
            if ($this->JadwalPelajaran_model->update_data($id_pelajaran, $data)) {
                $this->session->set_flashdata('success', 'Data berhasil diperbarui.');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui data.');
            }

            // Redirect ke halaman yang diinginkan
            redirect('jadwalpelajaran/index');
        }
    }
}
