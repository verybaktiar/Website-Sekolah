<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
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
        $this->load->view('back/layouts/main', $data);
    }
    public function add()
    {

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Ambil data dari form
            $nama_guru = $this->input->post('nama_guru');
            $jabatan = $this->input->post('jabatan');
            $daftar_pelajaran = $this->input->post('daftar_pelajaran');

            // Konfigurasi upload
            $config['upload_path'] =  './img/guru';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = TRUE; // Enkripsi nama file

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto_guru')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);
            } else {
                $file_data = $this->upload->data();
                $foto_guru = $file_data['file_name'];

                // Data array untuk insert
                $data = array(
                    'nama_guru' => $nama_guru,
                    'jabatan' => $jabatan,
                    'daftar_pelajaran' => $daftar_pelajaran,
                    'foto_guru' => $foto_guru
                );

                // Simpan data ke database melalui model
                if ($this->Guru_model->insert_data($data)) {
                    $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambahkan data.');
                }
            }

            // Redirect ke halaman yang diinginkan
            redirect('guru/index');
        }
    }

    public function update_data()
    {

        $id_guru = $this->input->post('id_guru');
        $nama_guru = $this->input->post('nama_guru');
        $jabatan = $this->input->post('jabatan');
        $daftar_pelajaran = $this->input->post('daftar_pelajaran');
      

        $this->load->model('Guru_model');
        $this->Guru_model->update_data($id_guru, $nama_guru, $jabatan, $daftar_pelajaran);

        // Redirect or show success message
        redirect('guru/index');
    }

    public function delete($id_guru)
    {
        $id_guru = $this->input->post('id_guru');

        if ($this->Guru_model->delete($id_guru)) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data.');
        }

        redirect('guru/index');
    }
}
